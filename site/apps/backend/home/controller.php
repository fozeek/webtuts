<?php


class HomeController extends Controler {
	public function IndexAction($param1, $param2) {
 		return $this->render(compact("param1", "param2"));
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
}

?>