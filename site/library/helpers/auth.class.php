<?php


class AuthHelper extends Helper {

	private $_user;

	public function __construct($view, $params = null) {
		parent::__construct($view, $params);
		$this->_user = $params["user"];
	}

	public function getUser() {
		return $this->_user;
	}
	public function getFirstConnection() {
	    return $this->getView()->Session->read("first_connection");
	}

}

?>