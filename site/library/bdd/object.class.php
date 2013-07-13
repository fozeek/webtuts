<?php

class ObjectModel {

	protected $_table = null;
	protected $_name;
	protected $_attributs;

	public function __construct(array $attributs, $name) {
		$this->_attributs = $attributs;
		$this->_name = $name;
	}

	public function getName() {
		return $this->_name;
	}

	public function __setWithParams($params) {
		return null;
	}

	public function __tostring() {
		return "ObjectModel#".$this->getName().":".$this->get("id");
	}

	public function getAttributs() {
		return $this->_attributs;
	}

	public function get($attributName, $params = null) {
		$shema = $this->getShema();
		$link = $shema[$attributName]["Link"];
		if(!empty($link) && !is_object($this->_attributs[$attributName]) && !is_array($this->_attributs[$attributName])) {
			import("model", strtolower($link["reference"])."object");
			import("model", strtolower($link["reference"])."table");
			$this->_attributs[$attributName] = TableModel::getLinkTo(
				ucfirst($link["reference"])."Table", 
				str_replace("Object", "", get_class($this))."Table", 
				(isset($link["link"])) ? $link["link"] : null, 
				(isset($this->_attributs[$attributName])) ? $this->_attributs[$attributName] : $this->get("id"), 
				(isset($link["code"])) ? $link["code"] : null
			);
		}
		if($params != null)
			$this->_attributs[$attributName]->__setWithParams($params);
		return (isset($this->_attributs[$attributName])) ?
			$this->_attributs[$attributName] : false ;
	}

	public function getShema() {
		return $this->getTable()->getShema();
	}

	public function getTable() {
		if($this->_table == null) {
			$nameTable = (class_exists($this->getName()."Table")) ? $this->getName()."Table" : "StdTable";
			$this->_table = new $nameTable($this->getName());
		}
		return $this->_table;
	}

	public function __call($function, $params) {
		// Ajout dans un link (possibilité de cascade)
		// deleted dans un link (possibilité de cascade)
	}

}