<?php

import("bdd", "model");
import("bdd", "object");
import("bdd", "table");
import("bdd", "shema");
import("bdd", "stdobject");
import("bdd", "stdtable");

class ModelComponent extends Component {

	private $_tables = array();
	public static $cache;
	
	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
		self::$cache = new Cache("bdd", 60);
	}

	private function getTable($table) {
		if(import("model", strtolower($table)."table")) {
			import("model", strtolower($table)."object");
			$name = ucfirst($table)."Table";
			$this->_tables[$table] = new $name();
			return $this->_tables[$table];
		}
		else {
			import("model", strtolower($table)."object");
			$this->_tables[$table] = new StdTable($table);
			return $this->_tables[$table];
		}
	}

	public function __get($table) {
		if($table[0]!="_") {
			return (array_key_exists($table, $this->_tables)) ? $this->_tables[$table] : $this->getTable($table) ;
		}
		else
			return $this->$table;
	}

	public function save() {
		$objectName = ucfirst($this->_controller->Request->getData("_object_name"));
		return $this->$objectName->getById(($this->_controller->Request->getData("_object_id")) ?
			$this->update():
			$this->insert());
	}

	private function insert() {
		$data = $this->_controller->Request->getData();
		$objectName = ucfirst($data["_object_name"]);
		$hasSlug = false;
		$hasDate = false;
		foreach ($this->$objectName->getShema() as $key => $shema) {
			if($key == "slug")
				$hasSlug = true;
			if($key == "date")
				$hasDate = true;
			if(!in_array($key, array("id", "deleted", "slug")) && array_key_exists($key, $data) && is_array($shema["Link"]) && !array_key_exists("editable", $shema["Link"])) {
				if($shema["Link"]=="")
					$attrToUpdate[$key] = $data[$key];
				elseif($shema["Link"]["link"]=="OneToOne" || $shema["Link"]["link"]=="ManyToOne") {
					$classOfKey = ucfirst($shema["Link"]["reference"])."Object";
					$ref = $shema["Link"]["reference"];
					$this->_controller->Model->$ref;
					
					if(class_exists($classOfKey) && property_exists($classOfKey, "isType"))
						$attrToUpdate[$key] = $classOfKey::__executeFormNew($this, $data[$key]);
					else
						$attrToUpdate[$key] = $data[$key];
				}
				elseif($shema["Link"]["link"]=="OneToMany" || $shema["Link"]["link"]=="ManyToMany") {
					/*foreach ($data[$key] as $id_ref)
						Sql::create()
							->insert("_links")
							->columnsValues(array("link_root" => $object->get("id"), "link_code" => $shema["Link"]["code"], "link_link" => $id_ref))
							->execute();
							*/
				}
			}
			elseif(!in_array($key, array("id", "deleted", "slug"))) {
				$attrToUpdate[$key] = $data[$key];
			}
			
		}
		if($hasSlug && array_key_exists("title", $data)) {
			foreach (Kernel::getLangs() as $lang)
				$slug[$lang] = $this->_controller->String->sanitize($data["title"][$lang]);
			$attrToUpdate["slug"] = LangObject::__executeFormNew($this, $slug);
		}
		if($hasDate) {
			$attrToUpdate["date"] = date("Y-m-d H:i:s");
		}
		return $this->$objectName->save($attrToUpdate);
	}

	private function update() {
		$data = $this->_controller->Request->getData();
		$objectName = $data["_object_name"];
		$attrToUpdate = array();
		$hasSlug = false;
		$object = $this->_controller->Model->$objectName->getById($data["_object_id"]);
		foreach ($object->getShema() as $key => $shema) {
			if($key == "slug")
				$hasSlug = true;
			if(!in_array($key, array("id", "deleted", "slug")) && array_key_exists($key, $data) && is_array($shema["Link"]) && !array_key_exists("editable", $shema["Link"])) {
				if($shema["Link"]=="")
					$attrToUpdate[$key] = $data[$key];
				elseif($shema["Link"]["link"]=="OneToOne" || $shema["Link"]["link"]=="ManyToOne") {
					$classOfKey = ucfirst($shema["Link"]["reference"])."Object";
					$ref = $shema["Link"]["reference"];
					$this->_controller->Model->$ref;
					if(class_exists($classOfKey) && property_exists($classOfKey, "isType"))
						$object->get($key)->__executeForm($data[$key]);
					else
						$attrToUpdate[$key] = $data[$key];
				}
				elseif($shema["Link"]["link"]=="OneToMany" || $shema["Link"]["link"]=="ManyToMany") {
					Sql::create()
						->delete("_links")
						->where("link_root", "=", $object->get("id"), false)
						->andWhere("link_code", "=", $shema["Link"]["code"], false)
						->execute();
					foreach ($data[$key] as $id_ref)
						Sql::create()
							->insert("_links")
							->columnsValues(array("link_root" => $object->get("id"), "link_code" => $shema["Link"]["code"], "link_link" => $id_ref))
							->execute();
				}
			}
			elseif(!in_array($key, array("id", "deleted", "slug")) && array_key_exists($key, $data)) {
				$attrToUpdate[$key] = $data[$key];
			}
			
		}
		if($hasSlug && array_key_exists("title", $data)) {
			foreach (Kernel::getLangs() as $lang)
				$slug[$lang] = $this->_controller->String->sanitize($data["title"][$lang]);
			$this->Lang->update($object->get("slug")->get("id"), $slug);
		}
		if(count($attrToUpdate)>0)
			$this->$objectName->update($object->get("id"), $attrToUpdate);
		return $object->get("id");
	}

	public function bundle($bundle, $options = null) {
		$bundle = Bundles::getBundle($bundle);
		$tables = $bundle["tables"];
		$fields = $bundle["fields"];
		import("model", strtolower($tables[0])."table");
		import("model", strtolower($tables[0])."table");
		$requete = Sql::create()->select(array_merge($fields, array("'".$tables[0]."' AS _object")))->from($tables[0]);
		foreach (array_slice($tables, 1, null, false) as $table) {
			$requete->union($table, array_merge($fields, array("'".$table."' AS _object")));
			import("model", strtolower($table)."table");
			import("model", strtolower($table)."table");
		}
		if($options !== null) {
			if(isset($options["orderBy"]))
					$requete->orderBy($options["orderBy"]);
			if(isset($options["limit"])) {
				$start = (is_array($options["limit"])) ? $options["limit"][0] : 0 ;
				$stop = (is_array($options["limit"])) ? $options["limit"][1] : $options["limit"] ;
				$requete->limit($start, $stop);
			}
			$cptWhere = 0;
			if(isset($options["where"])) {
				foreach ($options["where"] as $key => $value) {
					$nameFunctionWhere = ($cptWhere==0) ? "where" : "andWhere";
					$requete->$nameFunctionWhere($value[0], $value[1], $value[2]);
					$cptWhere++;
				}
			}
		}
		$return = array();
		foreach ($requete->fetch() as $object) {
			$objectName = $object["_object"]."Object";
			$name = $object["_object"];
			unset($object["_object"]);
			if(!class_exists($objectName))
				$objectName = "StdObject";
			array_push($return, new $objectName($object, $name));
		}
		return $return;
	}
}