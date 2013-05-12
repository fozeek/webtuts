<?php



class Shema {

	public static $TYPE_INT = "Int";
	public static $TYPE_TEXT = "Text";
	public static $TYPE_DATETIME = "Datetime";
	public static $TYPE_BOOL = "Bool";
	public static $TYPE_TIMESTAMP = "Timestamp";

	private $_shema;

	private $_Sql;

	private $_types;

	public function __construct($Sql, $shema = array()) {
		$this->_types = array(
				self::$TYPE_INT,
				self::$TYPE_TEXT,
				self::$TYPE_DATETIME,
				self::$TYPE_BOOL,
				self::$TYPE_TIMESTAMP,
			);
		if($this->checkShema($shema)) {
			$this->_shema = $shema;
			$this->_Sql = $Sql;
		}
		else
			return false;
	}

	private function checkShema($shema) {
		foreach ($shema as $key => $value) {
			if(!in_array($value, $this->_types) && !is_array($value))
				return false;
		}
		return true;
	}

	public function addAttribut($name, $type) {
		$_shema[$name] = $type;
	}

	public function removeAttribut($name) {
		unset($_shema[$name]);
	}

	public function setAttributName($name, $newName) {
		$_shema[$newName] = $_shema[$name];
		unset($_shema[$name]);
	}

	public function setAttributType($name, $newType) {
		$_shema[$name] = $newType;
	}




}