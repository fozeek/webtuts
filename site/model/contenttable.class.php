<?php 


class ContentTable extends TableModel {

	protected function afterFind($data) {
		$ids = array();
		foreach ($data as $key => $value)
			array_push($ids, $value["id"]);
		$attributs = Sql::create()
				->select("B.id", "C.attribut", "A.value", "C.link", "C.reference")
				->from("_cms_node_attribut_content_value", "content", "_cms_node_attribut")
				->where("C.id", "=", "A.id_attribut", false)
				->andWhere("A.id_content", "=", "B.id", false)
				->andWhere("B.id", "IN", $ids)
				->fetch();
		foreach ($attributs as $key => $value) {
			if($value["link"]!==NULL) {
				$valueAttribut = array(
						"link" => $value["link"],
						"reference" => $value["reference"],
						"value" => $value["value"],
					);
			}
			else $valueAttribut = $value["value"];
			$data[$value["id"]][$value["attribut"]] = $valueAttribut;
		}	
		return $data;
	}
}



?>