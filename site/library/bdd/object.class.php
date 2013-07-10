<?php

class ObjectModel {

	protected $_name;
	protected $_attributs;
	protected $_isType = false;

	public function __construct(array $attributs, $name) {
		$this->_attributs = $attributs;
		$this->_name = $name;
	}

	public function isType() {
		return $this->_isType;
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

	public function __call($function, $params) {
		// Ajout dans un link (possibilité de cascade)
		// deleted dans un link (possibilité de cascade)
	}

}