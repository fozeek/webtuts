<?php

abstract class Controler {

	private $_components = array();

	public function beforeFilter() {
	}

	public function __construct() {

		// Autoloads
		foreach (Kernel::getAutoloadsController() as $key => $value) {
			if(is_numeric($key))
				$this->load($value);
			else
				$this->load($key, $value);
		}
	}

	public function __get($attribut) {
		if($attribut[0]!="_")
			return $this->_components[strtolower($attribut)];
	}

	/*
		Pour renvoyer vers la vue avec les informations necessaires.
	*/
	public function render($vars = null, $route = null) {
		if($this->existComponent("View"))
			$this->View->render($vars);
		else
			echo "Le composant \"View\" n'est pas disponible.";
	}

	/*
		Pour faire une redirection
	*/
	public function redirect($url) {
		header("Location:".$url);
	}

	public function existComponent($component) {
		return (!isset($this->_components[ucfirst(strtolower($component))])) ? true : false;
	}

	/*
		Charge un composant
	*/
	public function load($component, $params = null) {
		$short_name = $component;
		if($this->existComponent($short_name)) {
			if(!import("components", strtolower($component)))
				return false;
			$componentName = $component."Component";
			if($params!=null)
				$component = new $componentName($this, $params);
			else
				$component = new $componentName($this);
			$this->_components[strtolower($short_name)] = $component;
			return $component;
		}
		else
			return $this->_components[strtolower($short_name)];
	}
}

?>