<?php

class ObjectModel {

	protected $_name;
	protected $_attributs;

	public function __construct(array $attributs, $name) {
		$this->_attributs = $attributs;
		$this->_name = $name;
	}

	public function getName() {
		return $this->_name;
	}

	/*
		Recupérer les links
	*/
	private function _getLinks($attribut = null) {
		$table = ucfirst($this->getName())."Table";
		return ($attribut) ? $table::$_links[$attribut] : $table::$_links ;
	}

	/*
		Recupérer les rules
	*/
	private function _getRules($attribut = false) {
		$table = ucfirst($this->getName())."Table";
		return ($attribut) ? $table::$_rules[$attribut] : $table::$_rules ;
	}

	public function get($attributName) {
		$links = $this->_getLinks();
		if(array_key_exists($attributName, $links) && !is_object($this->_attributs[$attributName]) && !is_array($this->_attributs[$attributName])) {
			import("model", strtolower($links[$attributName]["reference"])."object");
			import("model", strtolower($links[$attributName]["reference"])."table");
			$this->_attributs[$attributName] = TableModel::getLinkTo(
				ucfirst($links[$attributName]["reference"])."Table", 
				str_replace("Object", "", get_class($this))."Table", 
				(isset($links[$attributName]["link"])) ? $links[$attributName]["link"] : null, 
				(isset($this->_attributs[$attributName])) ? $this->_attributs[$attributName] : $this->get("id"), 
				(isset($links[$attributName]["code"])) ? $links[$attributName]["code"] : null 
			);
		}
		return (isset($this->_attributs[$attributName])) ?
			$this->_attributs[$attributName] : false ;
	}

	public function __call($function, $params) {
		// Ajout dans un link (possibilité de cascade)
		// deleted dans un link (possibilité de cascade)
	}

}