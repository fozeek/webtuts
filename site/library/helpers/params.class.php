<?php


class ParamsHelper extends Helper {

	private $_data;

	public function __construct($view, $params = null) {
		parent::__construct($view, $params);
		$this->_data = $params["data"][0];
	}

	public function getParam($param) {
		return $this->_data[$param];
	}

}