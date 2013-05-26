<?php

class ObjectModel {

	protected $_name;
	protected $_attributs;
	protected $_links;
	protected $_rules;

	public function __construct(array $attributs, $name, array $links, array $rules) {
		$this->_attributs = $attributs;
		$this->_name = $name;
		$this->_links = $links;
		$this->_rules = $rules;
	}

	public function getName() {
		return $this->_name;
	}

	public function get($attributName) {
		if(array_key_exists($attributName, $this->_links) && !is_object($this->_attributs[$attributName]) && !is_array($this->_attributs[$attributName])) {
			import("model", strtolower($this->_links[$attributName]["reference"])."object");
			import("model", strtolower($this->_links[$attributName]["reference"])."table");
			$this->_attributs[$attributName] = TableModel::getLinkTo(
				ucfirst($this->_links[$attributName]["reference"])."Table", 
				str_replace("Object", "", get_class($this))."Table", 
				(isset($this->_links[$attributName]["link"])) ? $this->_links[$attributName]["link"] : null, 
				(isset($this->_attributs[$attributName])) ? $this->_attributs[$attributName] : $this->get("id"), 
				(isset($this->_links[$attributName]["code"])) ? $this->_links[$attributName]["code"] : null 
			);
		}
		return (isset($this->_attributs[$attributName])) ?
			$this->_attributs[$attributName] : false ;
	}
}