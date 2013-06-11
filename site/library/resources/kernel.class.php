<?php

class Kernel {

	private static $_app;
	private static $_route;
	private static $_paramsToControllerMode;
	private static $_paths;
	private static $_defaultLang;
	private static $_langs;
	private static $_debugMode;
	private static $_currentLang;
	private static $_autoloadsController;
	private static $_url;

	static public function run($url) {
	    $kernel = new Kernel();
	    return $kernel->dispatcher($kernel->parse($url));
	}

	static public function setAutoloadsController($autoloads) {
	    self::$_autoloadsController = $autoloads;
	}

	static public function getAutoloadsController() {
	    return self::$_autoloadsController;
	}

	static public function setApp($app) {
	    self::$_app = $app;
	}

	static public function getApp() {
	    return self::$_app;
	}

	static public function setDebugMode($debugMode) {
	    self::$_debugMode = $debugMode;
	}

	static public function getDebugMode() {
	    return self::$_debugMode;
	}

	static public function setDefaultLang($lang) {
	    self::$_defaultLang = $lang;
	}

	static public function getDefaultLang() {
	    return self::$_defaultLang;
	}

	static public function setLangs($langs) {
	    self::$_langs = $langs;
	}

	static public function getLangs() {
	    return self::$_langs;
	}

	static public function setCurrentLang($lang) {
	    self::$_currentLang = $lang;
	}

	static public function getCurrentLang() {
	    return self::$_currentLang;
	}
	
	static public function getUrl(){
	    return self::$_url;
	}

	static public function loadPaths($paths) {
		foreach ($paths as $key => $value) {
			$pathTmp = array_values(array_filter(explode("%", preg_replace("#{([".Router::$_regex."]+)}#i", "%*$1*%", $value))));
			foreach ($pathTmp as $key2 => $value2)
				if(preg_match("#\*([".Router::$_regex."]+)\*#i", $value2))
					$pathTmp[$key2] = $paths[str_replace("*", "", $value2)];
			$paths[$key] = implode("", $pathTmp);
		}
		self::$_paths = $paths;
	}

	static public function path($name, $absolute = false) {
		$beforeLink = ($absolute) ? "/" : "";
		return (isset(self::$_paths[$name])) ? $beforeLink.self::$_paths[$name] : false ;
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
		if(!in_array($parseUrl[0], self::getLangs())) {
			header("Location:/".self::getDefaultLang().$url);
			die();
		}
		self::setCurrentLang($parseUrl[0]);
		$parseUrl = array_slice($parseUrl, 1, null, false); // On supprime la langue de l'url
		self::$_url = "/".implode('/', $parseUrl);
		return Router::getRoute(self::$_url);
	}

	private function dispatcher($route) {
		self::$_route = array("controller" => $route["controller"], "action" => $route["action"]);
		$ControllerName = ucfirst($route["controller"])."Controller";
		if(!import("app", $route["controller"]."/controller"))
			Error::render(1, $ControllerName);
		$Controller = new $ControllerName();
		$function = ucfirst($route["action"]."Action");
		if(method_exists($ControllerName, $function)) {
			$functionParameters = new ReflectionMethod($ControllerName, $function);
			$numberOfRequiredParameters = $functionParameters->getNumberOfRequiredParameters();
			if(self::$_paramsToControllerMode=="array" || $numberOfRequiredParameters <= count($route["params"]))
				call_user_func_array(
						array($Controller, $function),
						(self::$_paramsToControllerMode=="array") ? array("0" => $route["params"]) : $route["params"]
					);
			else
				Error::render(4, $ControllerName."::".$function."()");
		}		
		else
			Error::render(2, $ControllerName."::".$function."()");
	}
}

?>