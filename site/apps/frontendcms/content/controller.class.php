<?php

class ContentController extends Controller {

	public function ShowAction($name, $id) {
 		$content = $this->Model->$name->getById($id);
 		$this->render(compact("content"));
	}

}