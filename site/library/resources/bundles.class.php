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

	public static function addToBundle($bundle, $new) {
		array_push(self::$bundles[$bundle]["tables"], $new);
		file_put_contents(Kernel::path("config")."bundles.config.json", json_encode(self::$bundles));
	}

	public static function removeToBundle($bundle, $new) {
		if(in_array($new, self::$bundles[$bundle]["tables"])) {
			foreach (self::$bundles[$bundle]["tables"] as $key => $value) {
				if($value == $new)
					unset(self::$bundles[$bundle]["tables"][$key]);
			}
			self::$bundles[$bundle]["tables"] = array_values(self::$bundles[$bundle]["tables"]);
			file_put_contents(Kernel::path("config")."bundles.config.json", json_encode(self::$bundles));
		}
	}

}