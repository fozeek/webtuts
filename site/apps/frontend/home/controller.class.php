<?php

class HomeController extends Controller {
    public function IndexAction() {
	/*$cats = App::getClassArray("category", array("limit" => 6));
	$news = App::getClassArray("article", array("where" => "node = " . BlogControler::$ID_NODE_NEWS, "limit" => 5));
	$articles = App::getClassArray("article", array("where" => "node = " . BlogControler::$ID_NODE_ARTICLE, "limit" => 5));
	return $this->render(array('cats' => $cats, 'articles' => $articles, 'news' => $news));*/
	
	$cats = $this->Model->Category->getAll(array('limit' => 6));
	$news = $this->Model->News->getAll(array('limit' => 5, 'orderBy' => 'date'));
	$articles = $this->Model->Tutorial->getAll(array('limit' => 5));
	
	$this->render(compact('cats', 'news', 'articles'));
    }
}

?>