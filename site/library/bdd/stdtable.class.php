<?php 


class StdTable extends TableModel {

	protected $_virtualName;

	public function __construct($name) {
		parent::__construct();
		$this->setName(strtolower($name));
	}

}