<?php

	/*
		Configuration des comptes de base de données
	*/

	Sql::addUser("default", "1", array(
			"host"		=> "localhost",
			"user"		=> "root",
			"password"	=> "root",
			"prefix"	=> "",
			"database"	=> "webtutsv2",
		));

	Sql::addUser("titou", "2", array(
			"host"		=> "localhost",
			"user"		=> "root",
			"password"	=> "",
			"prefix"	=> "",
			"database"	=> "webtutsv2",
		));