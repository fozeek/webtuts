<?php


class ObjectModel {

	private $_attributs;

	protected function initializeAttributs(array $attributs) {
		$this->_attributs = $attributs;
	}

	public function get($attribut) {
		return $this->_attributs[$attribut];
	}

}