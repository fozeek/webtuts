<?php

class PageController extends Controller {

    public function IndexAction($pageName) {
	if (!empty($pageName)) {
	    $page = $this->Model->Page->getBy("slug", $pageName);
	    if (!empty($page))
		$this->render(compact("page"));
	    else
		$this->redirect(Kernel::getUrl(""));
	}
	else
	    $this->redirect(Kernel::getUrl(""));
    }

    public function ContactAction() {
	$this->load("Mail");
		
	if ($this->Request->is("post")) {
	    $data = $this->Request->getData();
	    
	    $attr["pseudo"] = htmlspecialchars($data["nickname"]);
	    $attr["email"] = htmlspecialchars($data["mail"]);
	    $attr["object"] = htmlspecialchars($data["object"]);
	    $attr["message"] = htmlspecialchars($data["message"]);	    
	    
	    $mail_regex = "/[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+/";
	    $bool_error = false;
	    $error = array();
	    
	    if (!preg_match($mail_regex, $attr["email"])) {
		$bool_error = true;
		$error["email"] = "error";
	    }
	    if ($bool_error) {
		$this->render(compact("error", "attr"));
	    }
	    else {
		$this->Mail->from($attr["email"]);
		$this->Mail->to("contact@webtuts.fr");
		$this->Mail->subject($attr["object"]);
		$this->Mail->buildHeaders();
		$this->Mail->fromName($attr["pseudo"]);
		$this->Mail->text($attr["message"]);
		$this->Mail->send();
		
		$this->render(null);
	    }
	}
	else {
	    $this->render(null);
	}
    }

    public function SitemapAction() {
	$this->render(null);
    }

    public function AboutAction() {
	$this->render(null);
    }

    public function PartnersAction() {
	$this->render(null);
    }

}

?>