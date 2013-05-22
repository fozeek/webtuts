<?php 


class ContentTable extends TableModel {

	protected $_rules = array(
			"node" => array(
					"required" => true
				)
		);

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
			// À améliorer
			foreach ($data as $key2 => $value2) {
				if($value2["id"]==$value["id"]) {
					$data[$key2][$value["attribut"]] = $value["value"];
					break;
				}
			}
			
		}
		return $data;
	}
}
?>