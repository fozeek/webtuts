<?php 


class LangObject extends ObjectModel {
	
	private $_currentLang = null;
	protected $_isType = true;

	public function __toString() {
		return $this->get(($this->_currentLang==null) ? Kernel::getCurrentLang() : $this->_currentLang);
	}

	public function __setWithParams($params) {
		parent::__setWithParams($params);
		$this->_currentLang = $params;
	}

	public function __printForm($shema) {
		$string = array();
		foreach (Kernel::getLangs() as $lang) {
			$this->__setWithParams($lang);
			$typeInput = (array_key_exists("size", $shema["Link"]) && $shema["Link"]["size"]=="small") ? "input":"textarea";
			array_push($string, FormHelper::getInstance()->$typeInput($shema["Field"]."[".$lang."]", array("value" => $this)));
		}
		return $string;
	}

	public function __executeForm(array $options) {
		
	}

}