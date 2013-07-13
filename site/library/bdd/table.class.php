<?php


class TableModel{

	/*
		Nom de la table
	*/
	private $name;

	/*
		Récupérer le nom de la table
	*/
	public function getName() {
		return (isset($this->name)) ? $this->name : strtolower(str_replace("Table", "", get_class($this)));
	}

	/*
		Redefinir le nom de la table
	*/
	protected function setName($name) {
		$this->name = $name;
	}

	/*
		Ajouter un élément à la table
	*/
	public function save(array $attributs) {
		if(!$this->_validator($attributs))
			return false;
		if($returnId = Sql::create()
				->insert($this->getName())
				->columnsValues($attributs)
				->execute()
			) {
			return $returnId;
		}
		else
			return false;
	}

	/*
		Modifier un élément de la table
		À faire : 
			Pourvoir mettre un array d'IDs
	*/
	public function update($id, array $attributs) {
		if(!$this->_validator($attributs))
			return false;
		return (Sql::create()
				->update($this->getName())
				->columnsValues($attributs)
				->where("id", "=", $id)
				->execute()
			) ?
			true : false;
	}

	/*
		Vérifie les données selon les regles définies dans $this->_rules
	*/
	protected function _validator($data) {
		/*foreach ($data as $key => $value) {
			$res = true;
			if(array_key_exists($key, self::getRules())) {
				$rule = self::getRules($key);
				if(is_array($rule)) {
					if(array_key_exists("required", $rule) && empty($value))
						return false;
					if(array_key_exists("numeric", $rule) && !is_numeric($value))
						return false;
					if(array_key_exists("integer", $rule) && !is_integer($value))
						return false;
					if(array_key_exists("string", $rule) && !is_string($value))
						return false;
					if(array_key_exists("bool", $rule) && !is_bool($value))
						return false;
					if(array_key_exists("callable", $rule) && is_callable(array($this, $rule["callable"])))
						return call_user_method_array($rule["callable"], $this, $value);
				}
			}
			if(!$res) return false;
		}*/
		return true;
	}

	/*
		Supprime un élément de la table
		Met l'attribut "deleted" à true
	*/
	public function remove($id) {
		return ($this->update($id, array("deleted" => true))) ?
			true : false ;
	}

	/*
		Fonctions auto-générées
	*/
	public function __call($name, array $params) {
		// Traitement du nom de la fonction
		$function = array();
		$tmp = "";
		foreach (str_split($name) as $key => $value) {
			if(ord($value)>=65 && ord($value)<=90) {
				array_push($function, strtolower($tmp));
				$tmp = "";
			}
			$tmp .= $value;
		}
		array_push($function, strtolower($tmp));

		if($function[0] == "get" && ($function[1] == "by" || $function[1] == "all")) {
			$cptWhere = 0;
			$requete = Sql::create()->from($this->getName());
			if($function[1] == "by") {
				$options = (isset($params[1])) ? $params[1]: null;
				$requete->where($function[2], "IN", (is_array($params[0])) ? $params[0] : array($params[0]));
				$cptWhere++;
			}
			else
				$options = (isset($params[0])) ? $params[0]: null;
			$return = array();
			if(isset($options["orderBy"]))
				$requete->orderBy($options["orderBy"]);
			if(isset($options["limit"])) {
				$start = (is_array($options["limit"])) ? $options["limit"][0] : 0 ;
				$stop = (is_array($options["limit"])) ? $options["limit"][1] : $options["limit"] ;
				$requete->limit($start, $stop);
			}
			if(isset($options["where"])) {
				foreach ($options["where"] as $key => $value) {
					$nameFunctionWhere = ($cptWhere==0) ? "where" : "andWhere";
					$requete->$nameFunctionWhere($value[0], $value[1], $value[2]);
					$cptWhere++;
				}
			}
			$data = $this->afterFind($requete->fetch(), $options); // Traitement par la classe fille
			$objectName = ucfirst($this->getName())."Object";
			if(!class_exists($objectName))
				$objectName = "StdObject";
			foreach ($data as $key => $value)
				array_push($return, new $objectName($value, $this->getName()));
			if(count($return) > 0)
				return (count($return) > 1 || $function[1] == "all") ? $return : $return[0] ;
			else
				return ($function[1] == "all") ? array() : false ;
		}
		else
			return false;
	}

	/*
		Permet de récupérer les liens d'un objet
	*/
	public static function getLinkTo($referenceTable, $callerTable, $link, $param, $code) {
		if(!class_exists($referenceTable))
			$nameReferenceTable = "StdTable";
		else
			$nameReferenceTable = $referenceTable;
		$table = new $nameReferenceTable(str_replace("Table", "", $referenceTable));
		if($link == "OneToOne" || $link == "ManyToOne") {
			$return = $table->getById($param);
			$return = (count($return) == 0) ? false : $return;
		}
		else {
			//$linkTableName = str_replace("table" , "", strtolower($callerTable))."_".str_replace("table" , "", strtolower($referenceTable));
			$res = Sql::create()
					->select()
					->from("_links")
					->where("link_root", "=", $param, false)
					->andWhere("link_code", "=", $code, false)
					->fetch();
			if(count($res)==0)
				return array();
			$ids = array();
			foreach ($res as $key => $value)
				array_push($ids, $value["link_link"]);
			$return = $table->getById($ids);
			if(count($return) == 0)
				$return = array();
			elseif(!is_array($return))
				$return = array($return);
			else
				$return = $return;
		}
		return $return;
	}

	public function getShema() {
		if(!$shema = ModelComponent::$cache->read($this->getName()."_shema")) {	
			$res = Sql::create()->query("show full columns from ".$this->getName());
			$shema = array();
			foreach ($res as $key => $value) {
				$field = $value["Field"];
				$value["Link"] = json_decode($value["Comment"]);
				if($value["Link"] !== null)
					$value["Link"] = get_object_vars($value["Link"]);
				unset($value["Comment"]);
				unset($value["Privileges"]);
				$shema[$field] = $value;
			}
			ModelComponent::$cache->write($this->getName()."_shema", serialize($shema));
		}
		else
			$shema = unserialize($shema);
		return $shema;
	}

	// Fonctions à définir dans la classe fille
	protected function beforeFind($params) { return $params; }
	protected function afterFind($data, $params) { return $data; }
	protected function beforeSave($data) { return $data; }
	protected function afterSave() {}

}