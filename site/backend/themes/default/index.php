<?php 

	// Fonctions du thème 
	include("functions.php");

	// Appel de la template
	include("pages/".Kernel::route("controller").'/'.Kernel::route("action").".php");

?>