<?php
/*


class SqlComponent extends Component {
	
	private $_PDO;

	static public function connect($name, $params) {

	}

	public function __construct($controller, $params = null) {
		parent::__construct($controller, $params);
		try { 
		    $this->_PDO = new PDO('mysql:host='.$params["host"].';dbname='.$params["database"], $params["user"], $params["password"], array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    $this->_PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		    echo 'ERREUR: ' . $e->getMessage(); 
		    die();
		}
	}
}

*/