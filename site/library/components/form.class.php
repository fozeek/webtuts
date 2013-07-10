<?php


class FormComponent extends Component {

	private $_form = null;

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
	}

	public function __transmit($params) {
		return array("form" => $this->_form);
	}

	public function setForm($object) {
		$form = array();
		foreach ($object->getShema() as $key => $shema) {
			if(!in_array($key, array("id", "deleted")) && is_array($shema["Link"]) && !array_key_exists("editable", $shema["Link"])) {
				if(($shema["Link"]!="" && ($shema["Link"]["link"]=="OneToOne" || $shema["Link"]["link"]=="ManyToOne")) && !$object->get($key)->isType()) {
					$ref = $shema["Link"]["reference"];
					$form[$key] = $this->_controller->Model->$ref->getAll();
				}
				elseif($shema["Link"]!="" && ($shema["Link"]["link"]=="OneToMany" || $shema["Link"]["link"]=="ManyToMany")) {
					$ref = $shema["Link"]["reference"];
					$form[$key] = $this->_controller->Model->$ref->getAll();
				}
			}
		}
		$this->_form = $form;
	}

}