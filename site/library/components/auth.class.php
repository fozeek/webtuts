<?php

class AuthComponent extends Component {

    private $_user = null;

    public function __construct($controller, $params = null) {
	parent::__construct($controller, $params);
    }

<<<<<<< HEAD
	public function __transmit($params) {
		return array("user" => $this->getUser());
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
		return ($this->_user == null && $this->_controller->Session->read("Auth")) ?
			$this->_user = $this->_controller->Model->User->getById($this->_controller->Session->read("Auth")):
			false;
	}
=======
    public function __transmit($params) {
	return array("user" => $this->getUser());
    }
>>>>>>> d4a7fcc08a16bc6847b4f3fa4a1b4f30791579c0

    public function connect($pseudo, $pwd) {
	$user = $this->_controller->Model->User->getByPseudo($pseudo);
	if ($user->get("password") == md5($pwd)) {
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
	if ($this->_user == null)
	    $this->_user = $this->_controller->Model->User->getById($this->_controller->Session->read("Auth"));
	return $this->_user;
    }
    
    public function setFirstConnection(){
	$this->_controller->Session->write("first_connection", true);
    }
    
    public function getFirstConnection(){
	$this->_controller->Session->read("first_connection");
    }
    
    public function persist() {
	// fait une connexion persistant en cookie (cf. tuto grafikart)
    }

}