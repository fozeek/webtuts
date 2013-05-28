<?php

	/*
		Configuration des comptes de base de données
	*/

	Sql::addUser("default", array(
			"host"		=> "localhost",
			"user"		=> "root",
			"password"	=> "root",
			"prefix"	=> "",
			"database"	=> "webtutsv2",
		));

	Sql::addUser("wamp", array(
			"host"		=> "localhost",
			"user"		=> "root",
			"password"	=> "",
			"prefix"	=> "",
			"database"	=> "webtutsv2",
		));