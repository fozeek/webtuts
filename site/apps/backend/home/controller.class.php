<?php


class HomeController extends Controller {
	public function IndexAction() {
		//echo "<pre>";
		//print_r($this->Model->User);
		/*print_r($this->Model->Fucked->getAll(array(
				"orderBy" => array("textother", "ASC"),
				"limit" => 2
			)));
*/
		//	->getByNode(array(1,2), array(
		//	"limit" => 2,
		//	"orderBy" => array("id", "ASC"),
		//)));
		/*var_dump($this->Model->Content->update(1, array(
				//"date" => new Date(),
				"node" => 0
			)));*/
		/*, array(
			"limit" => 1,
			"orderBy" => array("id", "DESC"),
		)));
		*/
		//[0]->get("node"));//->get("author")->get("images"));
		//print_r($this->Model->Content->get(1));
		/*print_r(Sql::$_historique);
		echo "</pre>";
		die();
		*/
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