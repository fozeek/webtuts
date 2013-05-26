<?php

class TutorialTable extends TableModel {
	
	protected $_links = array(
			"image" => array(
					"link" => "OneToOne",
					"reference" => "image",
				),
			"comments" => array(
					"link" => "OneToMany",
					"reference" => "comment",
					"code" => 1
				),
		);

}