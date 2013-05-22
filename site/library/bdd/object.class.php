<?php


class ObjectModel {

	private $_attributs;
	protected $_links;
	protected $_rules;

	public function __construct(array $attributs, array $links, array $rules) {
		$this->_attributs = $attributs;
		$this->_links = $links;
		$this->_rules = $rules;
	}

	public function get($attributName) {
		if(array_key_exists($attributName, $this->_links) && (!isset($this->_attributs[$attributName]) || (isset($this->_attributs[$attributName]) && !is_object($this->_attributs[$attributName])))) {
			import("model", strtolower($this->_links[$attributName]["reference"])."object");
			import("model", strtolower($this->_links[$attributName]["reference"])."table");
			$objectTable = ucfirst($this->_links[$attributName]["reference"])."Table";
			$link = (isset($this->_links[$attributName]["link"])) ? $this->_links[$attributName]["link"] : null ;
			$value = (isset($this->_attributs[$attributName])) ? $this->_attributs[$attributName] : $this->get("id");
			$code = (isset($this->_links[$attributName]["code"])) ? $this->_links[$attributName]["code"] : null ;
			$this->_attributs[$attributName] = TableModel::getLinkTo($objectTable, str_replace("Object", "", get_class($this))."Table", $link, $value, $code);
		}
		if(isset($this->_attributs[$attributName]))
			return $this->_attributs[$attributName];
		else
			return null;
	}

}