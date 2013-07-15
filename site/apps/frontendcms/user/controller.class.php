<?php

class UserController extends Controller {
	public function ConnectAction() {
 		if($this->Request->is("post")) {
 			if($this->Auth->connect($this->Request->getData("pseudo"), $this->Request->getData("password")))
 				$this->redirect(Router::getUrl("home", "index"));
 			else
 				$this->render(array("error" => "BAD LOGIN"));
 		}
 		else
 			$this->render();
	}

	public function SigninAction() {
 		$this->Form->setForm($user = $this->Model->User);
 		$this->render(compact("user"));
	}

	public function DisconnectAction() {
		$this->Auth->disconnect();
 		$this->redirect(Router::getUrl("home", "index"));
	}

	public function MyaccountAction() {
		$this->Form->setForm($user = $this->Auth->getUser());
 		$this->render(compact("user"));
	}
}