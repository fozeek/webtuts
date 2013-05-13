<?php


class AuthComponent extends Component {

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
	}

	public function connect($pseudo, $pwd) {
		$this->_controller->Session->write("Auth", array(
				"pseudo" => $pseudo,
				"pwd" => $pwd,
			));
	}

	public function disconnect() {
		$this->_controller->Session->clear("Auth");
	}

	public function crypt($pwd) {
		return md5(sha1(md5($pwd)));
	}

	public function persist() {
		// fait une connexion persistant en cookie (cf. tuto grafikart)
	}

}