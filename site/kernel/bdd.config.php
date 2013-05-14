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

	Sql::addUser("tests", "2", array(
			"host"		=> "localhost",
			"user"		=> "root",
			"password"	=> "root",
			"prefix"	=> "",
			"database"	=> "webtutsv2",
		));