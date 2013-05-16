<?php

spl_autoload_register(function ($class) {
	if (strstr($class, "Controller")) { // Autoloader des controller
		$url = Kernel::path("app").str_replace("controller", "", mb_strtolower($class)).'/index.php';
		if(file_exists($url))
			require_once($url);
		else
			Error::render(1, $class);
	}
});

?>