<?php

	foreach (glob('site/library/resources/*') as $file)
		require_once($file);

	/* Component class */
	include('bdd.config.php');

	/* Fichier config */
	include('config.php');

	// Lancement du kernel
	Kernel::run($_SERVER['REQUEST_URI']);