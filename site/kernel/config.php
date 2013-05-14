<?php

	/*
		Fichier de configuration : 
		Contient toutes les informations necessaires à fournir par l'administrateur et à écrire en dur.
	*/

	/*
		Routes par défaut
		Regex : Les caractères acceptés pour les parametres passés dans l'url
	*/
	Router::setDefaultsRoutes("home", "index");
	Router::setRegex("A-Za-z0-9");

	/*
		Routes personalisées
	*/
	Router::add("home", "index", "/{lol}-tcouhou-{biloute}-test");
 	Router::add("pages", "sponsors", "/sponsors");

 	/*
		Mode de transmission des parametres
		[linear|array]
			linear	: envoi les parametres de façon standart (par défaut)
			array	: envoi les parametres dans un tableau indexé par les noms fournis dans les urls personnalisées
 	*/
	Kernel::setParamsToControllerMode("linear");

	/* 
		Définition de l'application
	*/
	Kernel::setApp("backend");

	/*
		Paths files
	*/
	Kernel::loadPaths(array(
			"root" => "site/",
			"library" => "{root}library/",
			"resources" => "{library}resources/",
			"components" => "{library}components/",
			"helpers" => "{library}helpers/",
			"model" => "{root}model/",
			"app" => "{root}apps/".Kernel::getApp()."/",
			"webroot" => "{root}".Kernel::getApp()."/",
			"themes" => "{webroot}themes/",
			"uploads" => "{root}uploads/",
			"cache" => "{root}cache/",
		));

	/*
		Connection à la BDD
			Les differents users de bdd sont dans bdd.config.php
	*/
	Sql::connect("default");

	/* 
		Autoloads Components for Controllers
	*/
	Kernel::write("autoloads_controller", array(
			"Cache" => Kernel::path("cache"),
			"Session",
			"Request",
			"Model",
			"View" => array(
					"helpers" => array(
							"Html",
							"Image",
							"Form",
							"Session",
						),
					"themeName" => "default",
				),
			"Auth" => array(
					"object" => "user",
					"fields" => array(
							"pseudo",
							"pwd"
						),
					"provided" => array(
							"active" => true
						)
				),
		));


	/*
		Langues
	*/
	Kernel::setDefaultLang("fr");
	Kernel::setLangs(array("fr", "en"));

	/* 
		DEBUG MODE 
		Commentaires :
			- Permet de passer le kernel en mode débug ou non : affichage de page d'erreurs.
		Possibilités :
			true		active le mode débug
			false		désative le mode débug
	*/
	Kernel::write("debug", true);