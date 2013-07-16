<?php

class BlogController extends Controller {

    public function IndexAction() {
	return $this->redirect(Kernel::getUrl(""));
    }

    public function ArticleAction($category, $article, $id) {
	$this->load("String");
	
	if ($article = $this->Model->Tutorial->getById($id)) {

	    if ($this->Request->is("post")) {
		$data = $this->Request->getData();

		$pseudo = htmlspecialchars($data["user"]);
		$message = htmlspecialchars($data["message-text"]);
		$article_id = intval($data["article"]);

		if (isset($message) && !empty($message)) {
		    if ($user = $this->Model->User->getBy("pseudo", $this->String->sanityze($pseudo))) {

			$attr = array();
			$attr["article"] = $article_id;
			$attr["author"] = $user->get("id");
			$attr["text"] = $message;
			$attr["deleted"] = 0;
			$attr["date"] = date("Y-m-d H:i:s");

			if ($comment = $this->Model->Comment->save($attr)) {
			    $this->render(compact('article', 'link'));
			}
		    }
		}
	    }
	    $this->render(compact('article', 'link'));
	}
	else
	    $this->redirect(Router::getUrl("error", "http", array('codeError' => '404')));
    }

    public function CategoryAction($category, $id) {
	if ($category = $this->Model->Category->getById($id)) {

	    $this->render(compact('category', 'link'));
	}
	else
	    $this->redirect(Router::getUrl("error", "http", array('codeError' => 404)));
    }

    public function ArticlesAction() {
	$news = $this->Model->News->getAll(array('limit' => 5, 'orderBy' => array('date', 'desc')));
	$articles = $this->Model->Tutorial->getAll(array('orderBy' => array('date', 'desc')));
	$this->render(compact("articles", "news"));
    }

    public function CategoriesAction() {
	$cats = $this->Model->Category->getAll();
	$news = $this->Model->News->getAll(array('orderBy' => array('date', 'desc')));
	$this->render(compact("cats", "news"));
    }

    public function ActualitesAction() {
	$news = $this->Model->News->getAll(array('orderBy' => array('date', 'desc')));
	$articles = $this->Model->Tutorial->getAll(array('limit' => 5, 'orderBy' => array('date', 'desc')));
	$this->render(compact("news", "articles"));
    }

    /*
      Action : Actualite
      Description : Retourne un article selon le titre passé en paramêtre
     */

    public function ActualiteAction($actualite, $id) {
	// Récupère l'article
	if ($news = $this->Model->News->getById($id)) {

	    // Retourne à la vue l'article et les liens
	    $this->render(array("news" => $news, 'link' => $link));
	}
	else // Si aucun article n'est trouvé : page 404
	    $this->redirect(Router::getUrl("error", "http", array('codeError' => 404)));
    }

    public function TagsAction() {
	$tags = $this->Model->Tag->getAll();
	$this->render(compact("tags"));
    }

    public function TagAction($tagParam, $id) {
	if ($tag_target = $this->Model->Tag->getById($id)) {
	    $tags = $this->Model->Tag->getAll();

	    // TODO: QUENTIN GESTION DES LANGUES!!!!!
//	    $link = array(
//		"en" => Kernel::getUrl("en/" . $params[1] . "/" . $params[2] . "/" . Kernel::sanitize($tag_target->get("name", "en"))),
//		"fr" => Kernel::getUrl("fr/" . $params[1] . "/" . $params[2] . "/" . Kernel::sanitize($tag_target->get("name", "fr")))
//	    );
	    $this->render(compact("tag_target", "tags"));
	}
	else
	    $this->redirect(Router::getUrl("error", "http", array('codeError' => 404)));
    }

    public function RssAction() {
	$this->load("Rss");
	
	$articles = $this->Model->Tutorial->getAll(array('orderBy' => array('date', 'desc')));
	$return = array();

	$this->Rss->setTitle("Webtuts");
	$this->Rss->setLink("http://www.webtuts.fr");
	$this->Rss->setDescription("Les tutoriaux de webtuts");

	foreach ($articles as $article) {
	    $link = Router::getUrl("blog", "article", array("category" => $article->get("category")->get("title"), "article" => $article->get("title")));
	    $return[] = array("title" => $article->get("title"), "link" => $link, "guid" => $link, "description" => $article->get("text"), "date" => $article->get("date"));
	}
	$this->Rss->setItems($return);
    }

}

?>