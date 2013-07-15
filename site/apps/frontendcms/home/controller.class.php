<?php

class HomeController extends Controller {

	public function IndexAction($page = 1) {
 		$contents = $this->Model->bundle("content", array("orderBy" => array("date", "DESC"), "limit" => array(($page-1)*5, 5)));
 		$this->render(compact("contents", "page"));
	}
}