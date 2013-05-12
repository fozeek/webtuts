<?php 


class ContentClass extends ClassModel {

	private $_attributes;

	public function __construct() {
		$attributs = Sql2::create()
							->select("*")
							->from("_cms_node_attribut", "content")
							->where("A.id_node", "=", "B.id", false)
							->andWhere("B.id", "=", 1)
							->fetchArray();
		foreach ($attributs as $key => $value) {
			$types_node[] = $value["attribut"];
		}
		print_r($types_node);
	}
	

}



?>