<?php


class TableModel {
	public function beforeSave($params) {
		return true;
	}

	public function afterSave($params) {
		return true;
	}

	public function beforeFind($queries) {
		return $true;
	}

	public function AfterFind($resutls) {
		return $results;
	}


	public function save($attributs) {

	}

	public function update($id, $attributs = null) {
		if($attributs == null) {
			if(is_array($id))
				$attributs = $id;
			else return false;
		}
		else {
			if(!is_integer($id) || !is_array($attributs))
				return false;
		}


	}

	/*
		Un objet ou un id
	*/
	public function delete($id) {
		if(is_object($id)) $id = $id->get("id");

	}

	public function find($query, $options = null) {
		if($query == "all") {
			return true;
		}
		elseif($query == "first") {
			return true;
		}
		elseif($query == "last") {
			return true;
		}
	}

	public function __call($name, $params) {

	}


}