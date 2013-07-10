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
	if ($this->Request->is("post")) {
	    $data = $this->Request->getData();
	    
	    $pseudo = htmlspecialchars($data["nickname"]);
	    $email = htmlspecialchars($data["mail"]);
	    $object = htmlspecialchars($data["object"]);
	    $message = htmlspecialchars($data["message"]);
	    
	    $mail_regex = "/[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+/";
	    $bool_error = false;
	    $error = array();
	    
	    if (!preg_match($mail, $attr["mail"])) {
		$bool_error = true;
		$error["mail"] = "error";
	    }
	    if ($bool_error) {
		$this->render(compact("error", "attr"));
	    }
	    else {
		
	    }
	    
	}
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