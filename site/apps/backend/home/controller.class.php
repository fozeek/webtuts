<?php


class HomeController extends Controller {
	public function IndexAction() {
 		$this->redirect(Router::getUrl("content", "list", array("type" => "bundle", "name" => "content")));
	}

	public function ConnectAction() {
		$data = $this->Request->getData();
		if($this->Auth->connect($data["pseudo"], $data["pwd"]))
			$this->redirect(Router::getUrl("home", "index"));
		else
			$this->redirect(Router::getUrl("home", "connect"));
	}

	public function DisconnectAction($params) {
		$this->Auth->disconnect();
		$this->redirect(Router::getUrl("/"));
	}

	public function GofrontendAction() {
		$this->Session->clear("__app_name");
		$this->redirect("/");
	}
}

?>