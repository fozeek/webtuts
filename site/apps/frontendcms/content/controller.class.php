<?php

class ContentController extends Controller {

	public function ShowAction($name, $id) {
 		if($this->Request->is("post")) {
 			$comment = $this->Model->save();
 			$shema = $this->Model->$name->getShema();
 			$this->Model->addLink($shema["comments"]["Link"]["code"], $id, $comment->get("id"));
 		}
 		$content = $this->Model->$name->getById($id);
 		$this->render(compact("content"));
	}

	public function ListAction($name) {
 		$contents = $this->Model->$name->getAll();
 		$this->render(compact("contents"));
	}

}