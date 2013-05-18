<?php


class TableModel implements Iterator, Countable {

	// For Iterator implement
	private $_key = 0;
	private $_collection;

	public function __construct() {
		$this->setCollection();
	}

	public function getName() {
		return strtolower(str_replace("Table", "", get_class($this)));
	}

	public function __call($name, $params) {
			return false;
	}

	private function setCollection() {
		$data = Sql::create()
					->from($this->getName())
					->fetch();
		$data = $this->afterFind($data); // Traitement par la classe fille
		$objectName = ucfirst($this->getName())."Object";
		$collection = array();
		foreach ($data as $key => $value)
			array_push($collection, new $objectName($value));
		$this->_collection = $collection;
	}

	// Functions de la classe fille
	protected function beforeFind() {}
	protected function afterFind($data) { return $data; }
	protected function beforeSave($data) { return $data; }
	protected function afterSave() {}

	// For Iterator implement
	public function rewind() {
		$this->_key = 0;
	}
    public function valid() {
        return array_key_exists($this->_key, $this->_collection);
    }
    public function key() {
        return $this->_key;
    }
    public function current() {
        return $this->_collection[$this->_key];
    }
    public function next() {
        ++$this->_key;
    }

    // For Countable implement
    public function count() {
         return sizeof($this->_collection);
    }


}