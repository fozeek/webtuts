<?php

/*
	Class :		SessionComponent
	Lien : 		site/library/components/session.class.php
	Déscription :
				Permet de gérer les données de session
*/
class SessionHelper extends Helper {
	
	private $_vars;										// Tableau					Tableau des données de session

	/*
		Constructeur
	*/
	public function __construct() {
	    $this->_vars = $_SESSION;
	}

	/*
		read
			Lire une donnée en session
	*/
	public function read($key){
	    return (array_key_exists($key, $_SESSION)) ?
		$_SESSION[$key] :
		false;
	}

	/*
		containsKey
			Retourne vrai si une clé existe en session
	*/
	public function containsKey($key){
	    return (isset($_SESSION[$key]));
	}
}




?>