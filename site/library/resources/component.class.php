<?php

class Component {
	
	protected $_controller;

	public function __construct($controller, $params = null) {
		$this->setController($controller);
	}

	public function setController($controller) {
		$this->_controller = $controller;
	}

	public function getController($controller) {
		return $this->_controller;
	}

	public function _transmit($params) {
		return array();
	}

}

?>