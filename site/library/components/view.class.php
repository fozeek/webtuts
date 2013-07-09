<?php


class ViewComponent extends Component {

	private $_helpers = array();
	private $_defaultTheme = "default";
	private $_params;

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
		$this->_params = $params;
		$this->_defaultTheme = $params["themeName"];
	}

	public function render($vars = null) {
		// Autoloads
		// juste avant l'affichage pour que les components soit tous déjà chargés pour les transmitions aux helpers
		foreach ($this->_params["helpers"] as $key => $value) {
			if(is_numeric($key))
				$this->load($value);
			else
				$this->load($key, $value);
		}

		if($vars != null)
			extract($vars);
		if(file_exists(Kernel::path("themes").$this->_defaultTheme.'/index.php'))
			include(Kernel::path("themes").$this->_defaultTheme.'/index.php');
		else
			Error::render(3, $this->_defaultTheme);
	}

	public function __get($attribut) {
		if(isset($this->$attribut))
			return $this->$attribut;
		else
			return $this->_helpers[strtolower($attribut)];
	}

	public function load($helper, $params = null) {
		$short_name = $helper;
		if(!isset($this->_helpers[strtolower($short_name)])) {
			if(!import("helpers", strtolower($helper)))
				return false;
			$helperName = $helper."Helper";

			$component = ucfirst($helper);
			$transmit = array();
			if($this->_controller->existComponent($component) == true)
				$transmit = $this->_controller->$component->__transmit($params);

			($params!==null) ?
				$helper = new $helperName($this, array_merge($params, $transmit)) :
				$helper = new $helperName($this, $transmit);
			$this->_helpers[strtolower($short_name)] = $helper;
			return $helper;
		}
		else
			return $this->_helpers[strtolower($short_name)];
	}
}