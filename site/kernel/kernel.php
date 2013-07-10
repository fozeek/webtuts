<?php

foreach (glob('site/library/resources/*') as $file)
    require_once($file);

/* Component class */
require('bdd.config.php');

/* Fichier config */
require('config.php');

// Lancement du kernel
Kernel::run($_SERVER['REQUEST_URI']);