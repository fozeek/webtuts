<?php 


class ImageObject extends ObjectModel {

	protected $_isType = true;

	public function __toString() {
		return $this->get("nom").".".$this->get("type");
	}

	public function __printForm($shema) {
		$html = '<div style="border-radius: 2px;border: 1px solid #B9B9B9;"><div style="padding: 4px;">'.$this.'</div><div style="background: #F9F9F9;padding :4px;">';
		$html .= FormHelper::getInstance()->file($shema["Field"], array("id" => $shema["Field"]));
		$html .= '</div></div>';
		return $html;
	}

	public function __executeForm(array $options) {
		
	}

}