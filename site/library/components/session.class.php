<?php

/*
	Class :		SessionComponent
	Lien : 		site/library/components/session.class.php
	Déscription :
				Permet de gérer les données de session
*/
class SessionComponent extends Component {

	/*
		Constructeur
	*/
	public function __construct($controller) {
		parent::__construct($controller);
	}

	/*
		write
			Enegistrer une donnée en session
	*/
	public function write($key, $value){
	    $_SESSION[$key] = $value;
	}

	/*
		read
			Lire une donnée en session
	*/
	public function read($key){
	    return isset($_SESSION[$key]) ? false : $_SESSION[$key];
	}

	/*
		read
			Lire une donnée en session
	*/
	public function clear($key){
	    unset($_SESSION[$key]);
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