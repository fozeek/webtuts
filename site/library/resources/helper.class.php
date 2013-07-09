<?php

class Helper {
	
	protected $_view;

	public function __construct($view, $params = null) {
		$this->setView($view);
	}

	public function setView($view) {
		$this->_view = $view;
	}

	public function getView($view) {
		return $this->_view;
	}

}

?>