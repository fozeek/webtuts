<?php



class Bundles {

	static public $bundles = array();

	public static function initializeBundles() {
		self::$bundles = get_object_vars(json_decode(file_get_contents(Kernel::path("config")."bundles.config.json")));
		foreach (self::$bundles as $key => $value)
			self::$bundles[$key] = get_object_vars($value);
	}

	public static function addBundle(array $bundle) {
		array_push(self::$bundles, $bundle);
	}

	public static function removeBundle(array $bundle) {
		unset(self::$bundles[$bundle]);
	}

	public static function setBundle($bundle, array $attributs) {
		self::$bundles[$bundle] = $attributs;
	}

	public static function getBundle($bundle) {
		return self::$bundles[$bundle];
	}

	public static function getBundles() {
		return self::$bundles;
	}

	public static function saveBundles() {
		self::$bundles[$bundle] = $attributs;
	}

}