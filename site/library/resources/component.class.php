<?php

class Component {
	
	protected $_controller;

	public function __construct($controller, $params = null) {
		$this->setController($controller);
	}

	public function setController($controller) {
		$this->_controller = $controller;
	}

	public function getController() {
		return $this->_controller;
	}

	public function __transmit($params) {
		return array();
	}

}

?>