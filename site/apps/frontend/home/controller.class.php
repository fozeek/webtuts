<?php

class HomeController extends Controller {
    public function IndexAction() {
	$cats = $this->Model->Category->getAll(array('limit' => 6));
	$news = $this->Model->News->getAll(array('limit' => 5, 'orderBy' => array('date', 'desc')));
	$articles = $this->Model->Tutorial->getAll(array('orderBy' => array('date', 'desc'), 'limit' => 5));
	
	$this->render(compact('cats', 'news', 'articles'));
    }
}

?>