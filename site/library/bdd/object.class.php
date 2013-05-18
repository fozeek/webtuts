<?php


class ObjectModel {

	private $_attributs;

	public function __construct($attributs) {
		$this->initializeAttributs($attributs);
	}

	protected function initializeAttributs(array $attributs) {
		$this->_attributs = $attributs;
	}

	public function get($attributName) {
		if(is_array($attribut = $this->_attributs[$attributName])) {
			import("model", strtolower($attribut["reference"])."object");
			import("model", strtolower($attribut["reference"])."table");
			$this->_attributs[$attributName] = $objectTable->getLinkTo(get_class($this), $attribut["link"], $attribut["value"]);
		}
		return $this->_attributs[$attributName];
	}

}