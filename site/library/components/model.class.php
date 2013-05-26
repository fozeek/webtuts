<?php

import("bdd", "model");
import("bdd", "object");
import("bdd", "table");
import("bdd", "shema");
import("bdd", "stdobject");
import("bdd", "stdtable");

class ModelComponent extends Component {

	private $_tables = array();
	
	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
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
			if(array_key_exists($table, $this->_tables))
				return $this->_tables[$table];
			else
				return $this->getTable($table);
		}
		else
			return $this->$table;
	}

	public function union($tables, $fields, $options) {
		$requete = Sql::create()->select(array_merge($fields, array("'".$tables[0]."' AS _object")))->from($tables[0]);
		foreach (array_slice($tables, 1, null, false) as $table)
			$requete->union($table, array_merge($fields, array("'".$table."' AS _object")));
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
		$return = array();
		foreach ($requete->fetch() as $object) {
			$objectName = $object["_object"]."Object";
			$name = $object["_object"];
			unset($object["_object"]);
			if(!class_exists($objectName))
				$objectName = "StdObject";
			array_push($return, new $objectName($object, $name, array(), array()));
		}
		return $return;
	}

	private function createTable($table, $attributs) {
		//
	}

	private function setTable($table) {
		//
	}
}