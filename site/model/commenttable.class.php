<?php


class CommentTable extends TableModel {

	protected $_links = array(
			"author" => array(
					"link" => "OneToOne",
					"reference" => "user",
				),
		);

}