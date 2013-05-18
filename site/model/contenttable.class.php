<?php 


class ContentTable extends TableModel {

	protected function afterGet($data) {
		$collection = array();
		$data = Sql::create()
				->select("B.id", "A.value", "C.attribut", "C.link", "C.reference")
				->from("_cms_node_attribut_content_value", "content", "_cms_node_attribut")
				->where("C.id", "=", "A.id_attribut", false)
				->andWhere("A.id_content", "=", "B.id", false)
				->fetch();
		$array = array();
		foreach ($data as $key => $value) {
			if($value["link"]!==NULL) {
				$valueAttribut = array(
						"link" => $value["link"],
						"reference" => $value["reference"],
						"value" => $value["value"],
					);
			}
			else $valueAttribut = $value["value"];
			$array[$value["id"]][$value["attribut"]] = $valueAttribut;
		}
		foreach ($array as $key => $value)
			array_push($collection, new ContentObject($value));
		return $collection;
	}
	



}



?>