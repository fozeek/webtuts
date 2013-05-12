<?php
	/* Routes */
	require_once('route.php');

	foreach (glob(__library_dir__.'resources/*') as $file)
		require_once($file);

	/* Component class */
	include('bdd.config.php');

	/* Fichier config */
	include('config.php');

	// Lancement du kernel
	Kernel::setup($_SERVER['REQUEST_URI']);