<?php


class AuthComponent extends Component {

	private $_user = null;

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
	}

	public function _transmit($params) {
		return array("user" => $this->_controller->Model->User->getById($this->_controller->Session->read("Auth")));
	}

	public function connect($pseudo, $pwd) {
		
		$user = $this->_controller->Model->User->getByPseudo($pseudo);
		if($user->get("password") == md5($pwd)) {
			$this->_controller->Session->write("Auth", $user->get("id"));
			return $user;
		}
		else
			return false;
	}

	public function disconnect() {
		$this->_controller->Session->clear("Auth");
	}

	public function getUser() {
		if($_user == null)
			$_user = $this->_controller->Model->User->getById($this->_controller->Session->read("Auth"));
		return $_user;
	}

	public function persist() {
		// fait une connexion persistant en cookie (cf. tuto grafikart)
	}

}