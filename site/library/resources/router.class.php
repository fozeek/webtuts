<?php

class Router {

	public static $_routes = array();
	public static $_defaultController = "home";
	public static $_defaultAction = "index";
	public static $_regex = "A-Za-z0-9\-";

	public static function setDefaultsRoutes($defaultController, $defaultAction) {
		self::$_defaultController = $defaultController;
		self::$_defaultAction = $defaultAction;
	}

	public static function setRegex($regex) {
		self::$_regex = $regex;
	}

	public static function getRoutes($key = null, $lang = null) {
		if($lang === null)
			$lang = Kernel::getCurrentLang();
		return ($key === null) ?
			((isset(self::$_routes[$lang])) ? self::$_routes[$lang] : array() ) : 
			((isset(self::$_routes[$lang][$key])) ? self::$_routes[$lang][$key] : false );
	}

	public static function add($lang, $controller, $action, $pattern) {
		if(!isset(self::$_routes[$lang]))
			self::$_routes[$lang] = array();
		array_push(self::$_routes[$lang], array("controller" => $controller, "action" => $action, "pattern" => $pattern));
	}

	public static function findRoute($controller, $action, $lang) {
		foreach (self::getRoutes(null, $lang) as $key => $value) {
			if($value["controller"] == $controller && $value["action"] == $action)
				return self::getRoutes($key, $lang);
		}
		return false;
	}

	public static function findPattern($pattern, $method = false) { // method is for anonymous params
		if(!$method) {
			foreach (self::getRoutes() as $key => $value) {
				if($value["pattern"] == $pattern)
					return self::getRoutes($key);
			}
		}
		else {
			foreach (self::getRoutes() as $key => $value) {
				$regex = "#".preg_replace("#{([".self::$_regex."]+)}#i", "([".self::$_regex."]+)", $value["pattern"])."#i";
				
				if(preg_match($regex, $pattern))
					return self::getRoutes($key);
			}
		}
		return false;
	}

	public static function getUrl($controller, $action, $params = null, $lang = null) {
		if($lang===null)
			$lang = Kernel::getCurrentLang();
		if($route = self::findRoute($controller, $action, $lang)) {
			$url = $route["pattern"];
			if($params!==null)	
				foreach ($params as $key => $value)
					$url = str_replace("{".$key."}", $value, $url);
			return "/".$lang.$url;
		}
		else {

			$url = "/".$controller."/".$action;
			if($params!==null)
				foreach ($params as $value)
					$url .= "/".$value;
			return "/".$lang.$url;
		}
	}

	public static function getRoute($pattern) {
		$pattern = explode("?", $pattern);
		$pattern = $pattern[0];
		
		if($route = self::findPattern(preg_replace("#{([".self::$_regex."]+)}#i", "{}", $pattern), true)) {
			$tab = preg_split("#[{}]#i", $route["pattern"]);
			if(count($tab) > 1) {
				foreach ($tab as $key => $value) {
					if($key%2 == 1)
						$paramsName[] = $value;
					else
						$pattern = str_replace($value, "%", $pattern);
				}
				$paramsValue = explode("%", $pattern);
				foreach ($paramsName as $key => $value)
					$params[$value] = $paramsValue[$key+1];
			}
			else
				$params = array();
			return array("controller" => $route["controller"], "action" => $route["action"], "params" => $params);
		}
		else {
			$route = array_values(array_filter(explode("/", $pattern)));
			return array(
					"controller" => (array_key_exists(0, $route)) ? $route[0] : self::$_defaultController,
					"action" => (array_key_exists(1, $route)) ? $route[1] : self::$_defaultAction,
					"params" => array_slice($route, 2),
				);
		}
	}


}