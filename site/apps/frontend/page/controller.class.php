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
		$this->Mail->from($email);
		$this->Mail->to("contact@webtuts.fr");
		$this->Mail->subject($object);
		$this->Mail->buildHeaders();
		$this->Mail->fromName($pseudo);
		$this->Mail->text($message);
		$this->Mail->send();
	    }
	}
	$this->render(null);
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