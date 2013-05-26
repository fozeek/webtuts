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
		if(import("model", strtolower($table)."table") && import("model", strtolower($table)."object")) {
			$name = ucfirst($table)."Table";
			$this->_tables[$table] = new $name();
			return $this->_tables[$table];
		}
		else {
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

	private function createTable($table, $attributs) {
		//
	}

	private function setTable($table) {
		//
	}
}