<?php 


class StdTable extends TableModel {

	protected $_virtualName;

	public function __construct($name) {
		$this->setName(strtolower($name));
	}

}