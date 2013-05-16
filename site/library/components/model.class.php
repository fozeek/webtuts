<?php

import("bdd", "model");
import("bdd", "object");
import("bdd", "table");
import("bdd", "shema");

class ModelComponent extends Component {

	private $_tables = array();
	
	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
	}

	private function getTable($table, $options = null) {
		if(import("model", strtolower($table)."table") && import("model", strtolower($table)."class")) {
			$name = ucfirst($table)."Table";
			$this->_tables[$table] = new $name($options);
			return $this->_tables[$table];
		}
		else
			return false;
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
}