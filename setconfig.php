<?php



if(array_key_exists("host", $_POST)) {

		file_put_contents("site/kernel/bdd.config.php", '<?php

/*
  Configuration des comptes de base de données
 */

Sql::addUser("default", array(
    "host" => "'.$_POST["host"].'",
    "user" => "'.$_POST["user"].'",
    "password" => "'.$_POST["password"].'",
    "prefix" => "'.$_POST["prefix"].'",
    "database" => "'.$_POST["database"].'",
));

		?>');

		try {
		    $pdo = new PDO('mysql:host=' . $_POST["host"] . ';dbname=' . $_POST["database"], $_POST["user"], $_POST["password"], array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $pdo->exec(file_get_contents("site/kernel/data.sql"));
		    header("Location:/");
		    die();
		} catch (PDOException $e) {
		    echo "you failed";
		}

	}

?>
<!DOCTYPE html>
<html>			
	<head>
		<title>Configurator</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body style="margin: 0px;padding: 0px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">
		<div style="font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;padding: 30px;border: 1px solid #E5E5E5;background: #F9F9F9;width: 400px;margin: auto;margin-top: 40px;border-radius: 5px;">
			<span style="font-size: 1.2em;font-weight: bold;">Configurateur 3000</span><br />
			<form style="padding: 5px;margin-top: 10px;" method="post">
				<input type="text" name="host" placeholder="host" style="font-size: 1.2em;padding: 4px;display: block;margin-bottom: 10px;width: 300px;border: 1px solid #E5E5E5;border-radius: 4px;"/>
				<input type="text" name="user" placeholder="user" style="font-size: 1.2em;padding: 4px;display: block;margin-bottom: 10px;width: 300px;border: 1px solid #E5E5E5;border-radius: 4px;"/>
				<input type="text" name="password" placeholder="password" style="font-size: 1.2em;padding: 4px;display: block;margin-bottom: 10px;width: 300px;border: 1px solid #E5E5E5;border-radius: 4px;"/>
				<input type="text" name="prefix" placeholder="prefix" style="font-size: 1.2em;padding: 4px;display: block;margin-bottom: 10px;width: 300px;border: 1px solid #E5E5E5;border-radius: 4px;"/>
				<input type="text" name="database" placeholder="database" style="font-size: 1.2em;padding: 4px;display: block;margin-bottom: 10px;width: 300px;border: 1px solid #E5E5E5;border-radius: 4px;"/>
				<input type="submit" value="Configurer" style="font-size: 1.2em;padding: 4px;"/>
			</form>	

		</div>
	</body>
</html>