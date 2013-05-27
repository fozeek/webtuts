<?php

class UserTable extends TableModel {
	
	public static $_links = array(
			"image" => array(
					"link" => "OneToOne",
					"reference" => "image",
				),
			"images" => array(
					"link" => "OneToMany",
					"reference" => "content",
					"code" => 1,
				),
		);

}