<?php


class ViewComponent extends Component {

	private $_helpers = array();
	private $_defaultTheme = "default";

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);

		$this->_defaultTheme = $params["themeName"];

		// Autoloads
		foreach ($params["helpers"] as $key => $value) {
			if(is_numeric($key))
				$this->load($value);
			else
				$this->load($key, $value);
		}
	}

	public function render($vars = null) {
		if($vars != null)
			extract($vars);
		include(_host_.kernel::get("app")."/themes/".$this->_defaultTheme.'/index.php');
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
			if($params!==null)
				$helper = new $helperName($this, $params);
			else
				$helper = new $helperName($this);
			$this->_helpers[strtolower($short_name)] = $helper;
			return $helper;
		}
		else
			return $this->_helpers[strtolower($short_name)];
	}
}