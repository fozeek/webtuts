<?php

Class RequestComponent extends Component {

	private $_data;

	public function __construct($controller) {
		parent::__construct($controller);
		$files = array();
		foreach ($_FILES as $value) {
			if($value["name"] != "")
				array_push($files, $value);
		}
		$data = array_merge($_REQUEST, $files);
		unset($data["url"]);
		unset($data["PHPSESSID"]);
		$this->_data = $data;
	}

	public function __get($attribut) {
		return $this->_data[$attribut];
	}

	public function getData($attribut = null) {
		return ($attribut === null) ? $this->_data : ((isset($this->_data[$attribut])) ? $this->_data[$attribut] : false ) ;
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