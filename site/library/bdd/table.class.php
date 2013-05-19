<?php


class TableModel implements Iterator, Countable {

	private $_key = 0;// For Iterator implement
	private $_collection;
	protected $_links = array(); // Defined by childs

	public function __construct() {
		$this->setCollection();
	}

	public function getName() {
		return strtolower(str_replace("Table", "", get_class($this)));
	}

	public function __call($name, $params) {
		// Traitement du nom de la fonction
		$function = array();
		$tmp = "";
		foreach (str_split($name) as $key => $value) {
			if(ord($value)>=65 && ord($value)<=90) {
				array_push($function, strtolower($tmp));
				$tmp = "";
			}
			$tmp .= $value;
		}
		array_push($function, strtolower($tmp));

		//traitement des parametres
		$param = $params[0];
		$options = (isset($params[1])) ? $params[1]: null;

		if($function[0] == "get" && $function[1] == "by") {
			$return = array();
			foreach ($this->_collection as $key => $value) {
				if(in_array($value->get($function[2]), $param))
					array_push($return, $value);
			}
			if(isset($options["orderBy"])) {
				$return = $return;
			}
			if(isset($options["limit"])) {
				$start = (is_array($options["limit"])) ? $options["limit"][0] : 0 ;
				$stop = (is_array($options["limit"])) ? $options["limit"][1] : $options["limit"] ;
				$return = array_slice($return, $start, $stop, false);
			}
			return $return;
		}
		else
			return false;
	}

	public function get($rang) {
		return (is_integer($rang)) ? 
			$this->_collection[$rang]:
			false;
	}

	public static function getLinkTo($referenceTable, $callerTable, $link, $param, $code) {
		$table = new $referenceTable();
		if($link == "OneToOne" || $link == "ManyToOne") {
			$return = $table->getById($param);
			return (count($return) == 0) ? false : $return[0];
		}
		else {
			$linkTableName = str_replace("table" , "", strtolower($callerTable))."_".str_replace("table" , "", strtolower($referenceTable));
			$res = Sql::create()
					->select()
					->from($linkTableName)
					->where("id_caller", "=", $param, false)
					->andWhere("code", "=", $code, false)
					->fetch();
			$ids = array();
			foreach ($res as $key => $value)
				array_push($ids, $value["id_reference"]);
			$return = $table->getById($ids);
			if(count($return) == 0)
				return false;
			elseif(count($return) == 1)
				return $return[0];
			else
				return $return;
		}
	}

	private function setCollection() {
		$data = Sql::create()
					->from($this->getName())
					->fetch();
		$data = $this->afterFind($data); // Traitement par la classe fille
		$objectName = ucfirst($this->getName())."Object";
		$collection = array();
		foreach ($data as $key => $value)
			array_push($collection, new $objectName($value, $this->_links));
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