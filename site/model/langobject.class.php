<?php 


class LangObject extends ObjectModel {
	public function __toString() {
		return $this->get(Kernel::getCurrentLang());
	}

}