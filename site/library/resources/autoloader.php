<?php

spl_autoload_register(function ($class) {
	if (strstr($class, "Controller")) { // Autoloader des controller
		$url = Kernel::path("app").str_replace("controller", "", mb_strtolower($class)).'/index.php';
		if(file_exists($url))
			require_once($url);
		else {
			header("Location:".Router::getUrl("error", "http", array("code" => 404)));
			die();
		}
	}
});

?>