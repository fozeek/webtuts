<?php
	Router::add("fr", "home", "index", "accueil.html");
 	Router::add("fr", "pages", "sponsors", "/sponsors");
 	Router::add("fr", "user", "show", "/utilisateur-{id}.html");
 	Router::add("fr", "content", "show", "/{node}-{id}.html");

 ?>