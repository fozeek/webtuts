<?php 


class CommentObject extends ObjectModel {
	


	public function get($attributName, $params = null) {
		return ($attributName=="title") ?
			$this->get("author")->get("pseudo") : 
			parent::get($attributName, $params);
	}
}