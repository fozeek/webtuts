<?php


class ParametersController extends Controller {
	public function IndexAction() {
 		if($this->Request->is("post")) {
 			$this->Params->setParam("title", $this->Request->getData("title"));
 			$this->Params->setParam("description", $this->Request->getData("description"));
 		}
 		$this->render();
 	}
}

?>