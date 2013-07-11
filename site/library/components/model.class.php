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
		$data = $this->_controller->Request->getData();
		$objectName = $data["_object_name"];
		echo "<br />";
		$object = $this->_controller->Model->$objectName->getById($data["_object_id"]);
		foreach ($object->getShema() as $key => $shema) {
			if(!in_array($key, array("id", "deleted")) && is_array($shema["Link"]) && !array_key_exists("editable", $shema["Link"])) {
				echo $key." : ";
				if($shema["Link"]=="")
					echo "a normal type";
				elseif($shema["Link"]["link"]=="OneToOne" || $shema["Link"]["link"]=="ManyToOne") {
					if($object->get($key)->isType()) {
						
						echo "is a spécial type";
					} else {
						echo "is a liaison toOne";
					}
				}
				elseif($shema["Link"]["link"]=="OneToMany" || $shema["Link"]["link"]=="ManyToMany") {
					echo "is a laison toMany";
				}
				echo "[";
				if(array_key_exists($key, $data))
					print_r($data[$key]);
				else
					echo "NULL";
				echo "]<br />";
			}
			
		}
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