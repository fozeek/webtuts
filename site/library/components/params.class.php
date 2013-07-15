<?php

class ParamsComponent extends Component {

	public function __transmit($params) {
		return array("data" => Sql::create()->query("SELECT * FROM _params"));
	}

	public function setParam($param, $value) {
		Sql::create()->exec("UPDATE _params SET ".$param." = '".$value."'");
	}

}