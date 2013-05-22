<?php


class TableModel{

	// Defined by childs
		// links
	protected $_links = array();
		// rules, id and deleted are allredy setted
	protected $_rules = array(); 

	public function __construct() {
	}

	public function getName() {
		return strtolower(str_replace("Table", "", get_class($this)));
	}

	public function save(array $attributs) {
		if(!$this->_validator($attributs))
			return false;
		return (Sql::create()
				->insert($this->getName())
				->columnsValues($attributs)
				->execute()
			) ?
			true : false;
	}

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

	protected function _validator($data) {
		foreach ($data as $key => $value) {
			$res = true;
			if(array_key_exists($key, $this->_rules)) {
				$rule = $this->_rules[$key];
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
		}
		return true;
	}

	public function remove($id) {
		return (Sql::create()
				->update($this->getName())
				->columnsValues(array("deleted" => true))
				->where("id", "=", $id)
				->execute()
			) ?
			true : false;
	}

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

		//traitement des parametres
		$param = $params[0];
		$options = (isset($params[1])) ? $params[1]: null;

		if($function[0] == "get" && $function[1] == "by") {
			$clause = (is_array($params[0])) ? $params[0] : array($params[0]) ;
			$requete = Sql::create()->from($this->getName())->where($function[2], "IN", $clause);
			$return = array();
			if(isset($options["orderBy"]))
				$requete->orderBy($options["orderBy"]);
			if(isset($options["limit"])) {
				$start = (is_array($options["limit"])) ? $options["limit"][0] : 0 ;
				$stop = (is_array($options["limit"])) ? $options["limit"][1] : $options["limit"] ;
				$requete->limit($start, $stop);
			}
			$data = $this->afterFind($requete->fetch()); // Traitement par la classe fille
			$objectName = ucfirst($this->getName())."Object";
			foreach ($data as $key => $value)
				array_push($return, new $objectName($value, $this->_links, $this->_rules));
			return $return;
		}
		else
			return false;
	}

	public static function getLinkTo($referenceTable, $callerTable, $link, $param, $code) {
		$table = new $referenceTable();
		if($link == "OneToOne" || $link == "ManyToOne") {
			$return = $table->getById($param);
			return (count($return) == 0) ? false : $return[0];
		}
		else {
			$linkTableName = str_replace("table" , "", strtolower($callerTable))."_".str_replace("table" , "", strtolower($referenceTable));
			$res = Sql::create()
					->select()
					->from($linkTableName)
					->where("id_caller", "=", $param, false)
					->andWhere("code", "=", $code, false)
					->fetch();
			$ids = array();
			foreach ($res as $key => $value)
				array_push($ids, $value["id_reference"]);
			$return = $table->getById($ids);
			if(count($return) == 0)
				return false;
			elseif(count($return) == 1)
				return $return[0];
			else
				return $return;
		}
	}

	public function getAll($options) {
		$return = array();
		$requete = Sql::create()
					->from($this->getName());
		if(isset($options["orderBy"]))
			$requete->orderBy($options["orderBy"]);
		if(isset($options["limit"])) {
			$start = (is_array($options["limit"])) ? $options["limit"][0] : 0 ;
			$stop = (is_array($options["limit"])) ? $options["limit"][1] : $options["limit"] ;
			$requete->limit($start, $stop);
		}
		$data = $this->afterFind($requete->fetch()); // Traitement par la classe fille
		$objectName = ucfirst($this->getName())."Object";
		foreach ($data as $key => $value)
			array_push($return, new $objectName($value, $this->_links, $this->_rules));
		return $return;
	}

	// Functions de la classe fille
	protected function beforeFind() {}
	protected function afterFind($data) { return $data; }
	protected function beforeSave($data) { return $data; }
	protected function afterSave() {}

}