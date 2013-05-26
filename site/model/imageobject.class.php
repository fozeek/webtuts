<?php 


class ImageObject extends ObjectModel {
	public function __toString() {
		return $this->get("nom").".".$this->get("type");
	}

}