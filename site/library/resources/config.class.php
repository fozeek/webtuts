<?php


class Config {

	public static $array = array();

	public static function write($key, $value) {
		self::$array[$key] = $value;
	}

	public static function read($key) {
		return (isset(self::$array[$key])) ? self::$array[$key] : false ;
	}

}