<?php


class HomeController extends Controller {
	public function IndexAction() {
		echo "<pre>";
		//print_r($this->Model->User);
		print_r($this->Model->Content->getById(array(1,2), array(
			"limit" => 1,
			"orderBy" => "id",
		)));//->get("author")->get("images"));
		//print_r($this->Model->Content->get(1));
		print_r(Sql::$_historique);
		echo "</pre>";
		die();
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