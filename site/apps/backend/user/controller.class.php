<?php

class UserController extends Controller {
	public function IndexAction() {
		$users = $this->Model->User->getAll(array(
			"orderBy" => array("date", "DESC"),
		));
		$this->render(compact("users"));
	}
}