<?php 


class LangObject extends ObjectModel {
	
	private $_currentLang = null;

	public function __toString() {
		return $this->get(($this->_currentLang==null) ? Kernel::getCurrentLang() : $this->_currentLang);
	}

	public function __setWithParams($params) {
		parent::__setWithParams($params);
		$this->_currentLang = $params;
	}

}