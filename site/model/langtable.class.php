<?php


class LangTable extends TableModel {

	public static $_links = array(
			"author" => array(
					"link" => "OneToOne",
					"reference" => "user",
				),
		);

}