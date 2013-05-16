<?php

spl_autoload_register(function ($class) {
	if (strstr($class, "Controller")) { // Autoloader des controller
		$url = Kernel::path("app").str_replace("controller", "", mb_strtolower($class)).'/index.php';
		(file_exists($url)) ?
			require_once($url) :
			Error::render(1, $class);
	}
});

?>