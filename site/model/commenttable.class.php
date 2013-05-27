<?php


class CommentTable extends TableModel {

	public static $_links = array(
			"author" => array(
					"link" => "OneToOne",
					"reference" => "user",
				),
		);

}