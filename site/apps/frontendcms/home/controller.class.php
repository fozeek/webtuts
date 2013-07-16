<?php

class HomeController extends Controller {

	public function IndexAction($page = 1) {
 		$contents = $this->Model->bundle("content", array("orderBy" => array("date", "DESC")));
 		$this->render(compact("contents", "page"));
	}

	public function GobackendAction() {
		$this->Session->write("__app_name", "backend");
		$this->redirect("/");
	}

}