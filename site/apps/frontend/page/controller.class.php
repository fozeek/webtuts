<?php

class PageController extends Controller {

    public function IndexAction($pageParam) {
	if (!empty($params[3])) {
	    $page = $this->Model->Page->getBy("slug", $pageParam);
	    if (!empty($page))
		$this->render(compact("page"));
	    else
		$this->redirect(Kernel::getUrl(""));
	}
	else
	    $this->redirect(Kernel::getUrl(""));
    }

    public function ContactAction($params) {
	$this->render(null);
    }

    public function SitemapAction($params) {
	$this->render(null);
    }

    public function AboutAction($params) {
	$this->render(null);
    }

    public function PartnersAction($params) {
	$this->render(null);
    }

}

?>