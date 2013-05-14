<?php

class Kernel {

	public static $_app;
	public static $LANG;
	public static $LANGS;
	public static $LANG_DEFAULT;
	public static $DEBUG;
	public static $AUTOLOADS_CONTROLLER;
	public static $_route;
	public static $_paramsToControllerMode;
	public static $_paths;

	static public function get($attr) {
		if($attr=="lang")
			return self::$LANG;
		elseif($attr=="autoloads_controller")
			return self::$AUTOLOADS_CONTROLLER;
		elseif($attr=="langs")
			return self::$LANGS;
		elseif($attr=="langdefault")
			return self::$LANG_DEFAULT;
		elseif($attr=="params")
			return self::$PARAMS;
		else
			return false;
	}

	static public function run($url) {
		$kernel = new Kernel();
		return $kernel->dispatcher($kernel->parse($url));
	}

	static public function setApp($app) {
		self::$_app = $app;
	}

	static public function getApp() {
		return self::$_app;
	}

	static public function loadPaths($paths) {
		foreach ($paths as $key => $value) {
			$pathTmp = array_values(array_filter(explode("%", preg_replace("#{([".Router::$_regex."]+)}#i", "%*$1*%", $value))));
			foreach ($pathTmp as $key2 => $value2) {
				if(preg_match("#\*([".Router::$_regex."]+)\*#i", $value2))
					$pathTmp[$key2] = $paths[str_replace("*", "", $value2)];
			}
			$paths[$key] = implode("", $pathTmp);
		}
		self::$_paths = $paths;
	}

	static public function path($name) {
		return (isset(self::$_paths[$name])) ? self::$_paths[$name] : false ;
	}

	static public function write($attr, $value) {
		if($attr == "debug")
			self::$DEBUG = $value;
		elseif($attr == "lang_default") {
			self::$LANG_DEFAULT = $value;
			self::$LANG = $value;
		}
		elseif($attr == "langs")
			self::$LANGS = $value;
		elseif($attr=="autoloads_controller")
			self::$AUTOLOADS_CONTROLLER = $value;
		else
			return false;
	}

	public static function route($attribut = null) {
		if($attribut !== null)
			return self::$_route[$attribut];
		else
			return self::$_route;
	}

	static public function setParamsToControllerMode($mode) {
		self::$_paramsToControllerMode = $mode;
	}

	private function parse($url) {
		$parseUrl = array_slice(explode("/", $url), 1, null, false); // On supprime le premier vide
		
		// Gestion de la langue
		if(!in_array($parseUrl[0], self::$LANGS)) {
			header("Location:/".self::$LANG_DEFAULT.$url);
			die();
		}
		self::$LANG = $parseUrl[0];
		$parseUrl = array_slice($parseUrl, 1, null, false); // On supprime la langue de l'url

		return Router::getRoute("/".implode("/", $parseUrl));
	}

	private function dispatcher($route) {
		self::$_route = array("controller" => $route["controller"], "action" => $route["action"]);
		$ControllerName = ucfirst($route["controller"])."Controller";
		$Controller = new $ControllerName();
		call_user_func_array(
				array($Controller, ucfirst($route["action"]."Action")),
				(self::$_paramsToControllerMode=="array") ? array("0" => $route["params"]) : $route["params"]
			);
	}
}

?>