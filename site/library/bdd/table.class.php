<?php


class TableModel implements Iterator, Countable {

	// For Iterator implement
	private $_key = 0;
	private $_collection = array();
	private $_initialized = false;

	public function update($id, $attributs = null) {
		if($attributs == null) {
			if(is_array($id))
				$attributs = $id;
			else return false;
		}
		else {
			if(!is_integer($id) || !is_array($attributs))
				return false;
		}


	}

	private function isInitialized() {
		return $this->_initialized;
	}

	private function setInitializedStatut() {
		$this->_initialized = true;
	}

	/*
		Un objet ou un id
	*/
	public function delete($id) {
		if(is_object($id)) $id = $id->get("id");

	}

	public function find($query, $options = null) {
		if($query == "all") {
			return true;
		}
		elseif($query == "first") {
			return true;
		}
		elseif($query == "last") {
			return true;
		}
	}

	public function __call($name, $params) {

	}

    public function getCollection() {
    	if (!$this->isInitialized())
        	$this->setCollection();
        return $this->_collection;
    }

    private function setCollection() {
    	$data = array();
    	$this->setInitializedStatut();
    	$this->_collection = $this->afterGet($data); // Traitement par la classe fille
    }


 	// For Iterator implement
    public function __construct() {
        $this->_key = 0;
    }
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