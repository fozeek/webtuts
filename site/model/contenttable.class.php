<?php 


class ContentTable extends TableModel {

	/*public $belongsTo = array(
			"Content" => array(
					"foreignKey" = "content_id",
				);
		);*/
	public $hasMany = array(
			"Content" => array(
					"foreignKey" => "id",
				),
			"fields" => array(
					"*",
				),
			"limit" => 30,
			"OrderBy" => array("id", "DESC"),
		);/*
	public $hasOne = array(
			
		);
	public $hasAndBelongToMany = array(
			
		);*/


	public function getAll() {
		return Sql::create()
				->select("*")
				->from("content")
				->fetchArray();
	}
	



}



?>