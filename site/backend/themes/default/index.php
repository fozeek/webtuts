<?php 

	// Fonctions du thème 
	include("functions.php");

	// Appel de la template
	include(Kernel::get("theme_path")."pages/".Kernel::route("controller").'/'.Kernel::route("action").".php");

?>