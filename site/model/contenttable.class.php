<?php 


class ContentTable extends TableModel {

	protected $_links = array();

	protected function afterFind($data) {
		$ids = array();
		foreach ($data as $key => $value)
			array_push($ids, $value["id"]);
		$attributs = Sql::create()
				->select("B.id", "C.attribut", "A.value", "C.link", "C.reference", "C.code")
				->from("_cms_node_attribut_content_value", "content", "_cms_node_attribut")
				->where("C.id", "=", "A.id_attribut", false)
				->andWhere("A.id_content", "=", "B.id", false)
				->andWhere("B.id", "IN", $ids)
				->fetch();
		foreach ($attributs as $key => $value) {
			if($value["link"]!==NULL)
				$this->_links[$value["attribut"]] = array(
						"link" => $value["link"],
						"reference" => $value["reference"],
						"code" => $value["code"]
					);
			$data[$value["id"]][$value["attribut"]] = $value["value"];
		}	
		return $data;
	}
}



?>