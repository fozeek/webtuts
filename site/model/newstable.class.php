<?php

class NewsTable extends TableModel {
	
	public static $_links = array(
			"image" => array(
					"link" => "OneToOne",
					"reference" => "image",
				),
			"comments" => array(
					"link" => "OneToMany",
					"reference" => "comment",
					"code" => 2
				),
		);

}