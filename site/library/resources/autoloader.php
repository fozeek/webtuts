<?php

spl_autoload_register(function ($class) {
	(file_exists($url = Kernel::path("app").str_replace("controller", "", mb_strtolower($class)).'/index.php')) ?
		require_once($url) : Error::render(1, $class);
});