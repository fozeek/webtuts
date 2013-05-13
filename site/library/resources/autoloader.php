<?php

spl_autoload_register(function ($class) {
	if (strstr($class, "Controller")) { // Autoloader des controller
		if(file_exists(Kernel::path("app").'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php')) // Debug for class_exists()
			require_once(Kernel::path("app").'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php');
		else {
			header("Location:".Route::getUrl("error/404"));
			die();
		}
	} 
	else { // Autoloader du modele
		if(file_exists(Kernel::path("library").'modele/'.mb_strtolower($class).'.class.php')) // Debug for class_exists()
			require_once(Kernel::path("library").'modele/'.mb_strtolower($class).'.class.php');
	}
});

?>