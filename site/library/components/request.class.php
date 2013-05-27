<?php

Class RequestComponent extends Component {

	private $_data;

	public function __construct($controller) {
		parent::__construct($controller);
		$data = $_REQUEST;
		unset($data["url"]);
		unset($data["PHPSESSID"]);
		$this->_data = $data;
	}

	public function __get($attribut) {
		return $this->_data[$attribut];
	}

	public function getData($attribut = null) {
		return ($attribut === null) ? $this->_data : $this->_data[$attribut] ;
	}

	public function is($type) {
		$type = strtolower($type);
		if(!empty($_POST) && $type=="post")
			return true;
		elseif(count($_GET)>0 && $type=="get")
			return true;
		else
			return false;
	}
}



?>