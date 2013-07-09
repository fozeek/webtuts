<?php


class AuthHelper extends Helper {

	private $_user;

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
		$this->_user = $params["user"];
	}

	public function getUser() {
		return $this->_user;
	}

}

?>