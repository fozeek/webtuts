<?php

class UserTable extends TableModel {
	
	protected $_links = array(
			"image" => array(
					"link" => "OneToOne",
					"reference" => "content",
				),
			"images" => array(
					"link" => "OneToMany",
					"reference" => "content",
					"code" => 1,
				),
		);

}