<?php

class CommentController extends Controller {
	public function IndexAction() {
		$comments = $this->Model->Comment->getAll(array(
			"orderBy" => array("date", "DESC"),
		));
		$this->render(compact("comments"));
	}
}