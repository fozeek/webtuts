<?php

class ContentController extends Controller {
	public function IndexAction() {
		$tutorials = $this->Model->bundle("content", array(
			"orderBy" => array("date", "DESC"),
		));
		$this->render(compact("tutorials"));
	}

	public function ListeajaxAction() {
		$this->load("json");
		$node = $this->Request->getData("node");
		$query = $this->Request->getData("query");
		$options["orderBy"] = array("date", "DESC");
		if($query)
				$options["where"][0] = array("title", "LIKE", "%".$query."%");
		$tutorials = ($node) ?
			$this->model->$node->getAll($options): 
			$this->Model->bundle("content", $options);
		foreach ($tutorials as $key => $value) {
			$tutorials[$key] = $value->getAttributs();
			$tutorials[$key]["link"] = Router::getUrl("content", "show", array("node" => $value->getName(), "id" => $value->get("id")), false);
			$tutorials[$key]["name"] = $value->getName();
		}
		$this->renderJson($tutorials);
	}

	public function ShowAction($node, $id) {
		$node = ucfirst($node);
		$tutorial = $this->Model->$node->getById($id);
		$this->render(compact("tutorial"));
	}

	public function UpdateAction($id) {
		if($this->Request->is("Post")) {
			$data = $this->Request->getData();
			$this->redirect(Router::getUrl("Content", "show", array("id" => $data["id"])));
		}
		else {
			$tutorial = $this->Model->Tutorial->getById($id);
			$this->render(compact("tutorial"));
		}
	}
	/*

	public function AddAction($params) {
		$categories = App::getClassArray("category");
		$nodes = App::getClassArray("node");
	
		$form = $this->getRequest();
		if($form->isMethod("post")) {
			$data = $form->getData();
			$title = array("fr" => $data["titlefr"], "en" => $data["titleen"]);
			$text = array("fr" => $data["textfr"], "en" => $data["texten"]);
			$attr["node"] = $data["node"];
			if($attr["node"]==1)
				$attr["category"] = $data['category'];
			
			$attr["tags"] = 0;
			$attr["image"] = 0;
			$attr["author"] = Kernel::get("user")->get("id");
			$attr["date"] = date("Y-m-d H:i:s");
			$attr["title"] = $title;
			$attr["text"] = $text;
			if($article = App::getClass("article")->hydrate($attr)->save()) {
				
				return $this->redirect(Kernel::getURL("article/show/".$article->get("id")));
			}
			else
				return $this->render(array("error" => "Vous n'avez pas bien rempli le formulaire"));
		}
		else {
			return $this->render(array('categories' => $categories, 'nodes' => $nodes));
		}
		return $this->render(null);
	}

	public function DeleteAction($params) {
		$form = $this->getRequest();
		if($form->isMethod("post")) {
			$data = $form->getData();
			$id = $data["id"];
			$article = App::getClass("article", $id);
			if($article->set(array("deleted" => true))) {
				return $this->redirect(Kernel::getURL("article/list"));
			}
			else
				return $this->redirect(Kernel::getURL("article/list"));
		}
		else
			return $this->redirect(Kernel::getURL("error/404"));
	}

	public function UpdateAction($params) {
		$form = $this->getRequest();
		if($form->isMethod("post")) {
			$data = $form->getData();
			$id = $data["id"];
			$title = array("fr" => $data["titlefr"], "en" => $data["titleen"]);
			$text = array("fr" => $data["textfr"], "en" => $data["texten"]);
			$attr = array("title" => $title, "text" => $text);
			$article = App::getClass("article", $id);
			if($article->set($attr))
				return $this->redirect(Kernel::getURL("article/show/".$id));
			else
				return $this->render(array('article' => $article));
		}
		else {
			$article = App::getClass("article", $params[3]);
			return $this->render(array('article' => $article));
		}
	}

	public function ListAction($params) {
		if(!empty($params[3]))
			$lang = $params[3];
		else
			$lang = $params[0];
		$articles = App::getClassArray("article", array("where" => "node != 4 AND deleted = false"));//, array("where" => "have category"));
		return $this->render(array('articles' => $articles, "lang" => $lang));
	}
	*/
}

?>