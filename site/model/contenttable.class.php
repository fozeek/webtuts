<?php 


class ContentTable extends TableModel {

	protected function afterFind($data) {
		$collection = array();
		$data = Sql::create()
				->select("B.id", "B.deleted", "B.node", "A.value", "C.attribut", "C.link", "C.reference")
				->from("_cms_node_attribut_content_value", "content", "_cms_node_attribut")
				->where("C.id", "=", "A.id_attribut", false)
				->andWhere("A.id_content", "=", "B.id", false)
				->fetch();
		$array = array();
		foreach ($data as $key => $value) {
			// Attributs communs aux contents
			if(!isset($array[$value["id"]]["id"])) {
				$array[$value["id"]]["id"] = $value["id"];
				$array[$value["id"]]["deleted"] = $value["deleted"];
				$array[$value["id"]]["node"] = $value["node"];
			}
			// Attributs avec references
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