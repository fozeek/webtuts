<?php 


class LangObject extends ObjectModel {
	
	private $_currentLang = null;

	public static $isType = true;

	public function __toString() {
		return $this->get(($this->_currentLang==null) ? Kernel::getCurrentLang() : $this->_currentLang);
	}

	public function __setWithParams($params) {
		parent::__setWithParams($params);
		$this->_currentLang = $params;
	}

	public function __printForm($shema) {
		$string = array();
		$class = array();
		if($shema["Field"] == "text"){
		    $class = array("class" => "text-editable");
		}
		foreach (Kernel::getLangs() as $lang) {
			$this->__setWithParams($lang);
			$typeInput = (array_key_exists("size", $shema["Link"]) && $shema["Link"]["size"]=="small") ? "input":"textarea";
			array_push($string, FormHelper::getInstance()->$typeInput($shema["Field"]."[".$lang."]", array_merge($class, array("value" => $this))));
		}
		return $string;
	}

	public static function __printFormNew($shema) {
		$string = array();
		$class = array();
		if($shema["Field"] == "text"){
		    $class = array("class" => "text-editable");
		}
		foreach (Kernel::getLangs() as $lang) {
			$typeInput = (array_key_exists("size", $shema["Link"]) && $shema["Link"]["size"]=="small") ? "input":"textarea";
			array_push($string, FormHelper::getInstance()->$typeInput($shema["Field"]."[".$lang."]", $class));
		}
		return $string;
	}

	public function __executeForm($model, array $data) {
		$table = $this->getTable();
		$table->update($this->get("id"), $data);
		return false;
	}
	public static function __executeFormNew($model, array $data) {
		$lang = $model->Lang->save($data);
		return $lang;
	}

}