<?php

class UserController extends Controller {

    public function IndexAction($params) {

	$this->redirect(Kernel::getUrl(""));
    }

    public function ProfilAction($pseudo) {
	$user = $this->Model->User->getBy("login", strtolower($pseudo));

	if ($user) {

	    $image = "";

	    if ($user->get("image") != null) {
		$image = "IN_USER";
	    } else {
		$image = md5(strtolower(trim($user->get("mail"))));
	    }

	    $this->render(compact('user', 'image'));
	}
	else
	    $this->redirect(Router::getUrl("error", "http", array('codeError' => 404)));
    }

    public function SubscriptionAction() {
	if (!$this->Auth->getUser()) {
	    if ($this->Request->is("post")) {
		$data = $this->Request->getData();

		$languages = array("", "html", "css", "php", "csharp", "asp", "javascript", "jquery");
		$civility = array("homme", "femme");
		$mail = "/[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+/";
		$url = "/((http:\/\/|https:\/\/)(www.)?(([a-zA-Z0-9-]){2,}\.){1,4}([a-zA-Z]){2,6}(\/([a-zA-Z-_\/\.0-9#:?=&;,]*)?)?)/";

		$bool_error = false;
		$error = array();

		$attr = array();
		$attr["pseudo"] = strtolower(htmlspecialchars($data["pseudo"]));
		$attr["name"] = htmlspecialchars($data["name"]);
		$attr["surname"] = htmlspecialchars($data["firstname"]);
		$attr["mail"] = htmlspecialchars($data["email"]);
		$attr["datesignin"] = date("Y-m-d H:i:s");
		$attr["civility"] = htmlspecialchars($data["civilite"]);
		$attr["password"] = htmlspecialchars($data["password"]);
		$attr["country"] = htmlspecialchars($data["pays"]);
		$attr["city"] = htmlspecialchars($data["city"]);
		$attr["site"] = htmlspecialchars($data["site"]);
		$attr["deleted"] = 0;
		$attr["banned"] = 0;
		$attr["image"] = 0;
		$attr["access"] = 0;
		$attr["languages"] = htmlspecialchars($data["langage"]);

		$languages_array = explode(',', $attr["languages"]);

		if (count($error) > 0)
		    $bool_error = true;

		if (strlen($attr["pseudo"]) < 6) {
		    $bool_error = true;
		    $error["pseudo"] = "error";
		} else if ($this->Model->User->getBy("pseudo", strtolower($attr["pseudo"]))) {
		    $bool_error = true;
		    $error["pseudo_exist"] = "error";
		}
		if (strlen($attr["name"]) < 1) {
		    $bool_error = true;
		    $error["name"] = "error";
		}
		if (strlen($attr["surname"]) < 1) {
		    $bool_error = true;
		    $error["surname"] = "error";
		}
		if (!preg_match($mail, $attr["mail"])) {
		    $bool_error = true;
		    $error["mail"] = "error";
		}
		if (!in_array($attr["civility"], $civility)) {
		    $bool_error = true;
		    $error["civility"] = "error";
		}
		if (strlen($attr["password"]) < 6) {
		    $bool_error = true;
		    $error["password"] = "error";
		}
		if (!preg_match($url, $attr["site"]) && strlen($attr["site"]) > 0) {
		    $bool_error = true;
		    $error["site"] = "error";
		}
		foreach ($languages_array as $language) {
		    if (!in_array($language, $languages)) {
			$bool_error = true;
			$error["languages"] = "error";
		    }
		}
		if ($bool_error) {
		    $this->render(compact("error", "attr"));
		} else {
		    $attr["password"] = md5($attr["password"]);

		    if ($user = $this->Model->User->save($attr)) {
			$this->Auth->connect($user->get("pseudo"), $user->get("password"));
			$this->Auth->setFirstConnection();
			$this->redirect(Router::getUrl("user", "profil", array("pseudo" => $user->get("pseudo"))));
		    }
		    else
			$this->render(array("error" => "Vous n'avez pas bien rempli le formulaire"));
		}
	    }
	    else {
		$this->render(array('user' => null));
	    }
	} else {
	    $this->redirect(Router::getUrl("user", "profil", array("pseudo" => $this->Auth->getUser()->get("pseudo"))));
	}
    }

    public function ConnectionAction() {
	if (!$this->Auth->getUser()) {
	    if ($this->Request->is("post")) {
		$data = $this->Request->getData();

		$bool_error = false;
		$error = array();

		$attr = array();
		$attr["pseudo"] = strtolower(htmlspecialchars($data["pseudo"]));
		$attr["password"] = htmlspecialchars($data["password"]);

		if (strlen($attr["pseudo"]) < 6) {
		    $bool_error = true;
		    $error["pseudo"] = "error";
		}
		if (strlen($attr["password"]) < 6) {
		    $bool_error = true;
		    $error["password"] = "error";
		}


		if ($bool_error) {
		    $this->render(compact("error", "attr"));
		} else {
		    if ($user = $this->Model->User->getBy("login", strtolower($attr["pseudo"]))) {
			if ($user->get("password") == md5($attr["password"])) {
			    $this->Auth->connect($user->get("pseudo"), $user->get("password"));
			    $this->redirect(Router::getUrl("user", "profil", array("pseudo" => $user->get("pseudo"))));
			} else {
			    $error["bad_login"] = "error";
			    $this->render(compact("error", "attr"));
			}
		    } else {
			$error["bad_login"] = "error";
			$this->render(compact("error", "attr"));
		    }
		}
	    }

	    $this->render(array('user' => null));
	} else {
	    $this->redirect(Router::getUrl("user", "profil", array("pseudo" => $this->Auth->getUser()->get("pseudo"))));
	}
    }

    public function DisconnectAction() {
	$this->Auth->disconnect();
	$this->redirect("/");
    }

    public function CompteAction() {
	if ($this->Auth->getUser() == false) {
	    $this->redirect(Router::getUrl("home", "index"));
	} else {
	    $user = $this->Auth->getUser();

	    if ($this->Request->is("post")) {
		$data = $this->Request->getData();

		$languages = array("", "html", "css", "php", "csharp", "asp", "javascript", "jquery");
		$civility = array("homme", "femme");
		$mail = "/[a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]+/";
		$url = "/((http:\/\/|https:\/\/)(www.)?(([a-zA-Z0-9-]){2,}\.){1,4}([a-zA-Z]){2,6}(\/([a-zA-Z-_\/\.0-9#:?=&;,]*)?)?)/";

		$bool_error = false;
		$error = array();

		$attr = array();
		$attr["pseudo"] = htmlspecialchars($data["pseudo"]);
		$attr["name"] = htmlspecialchars($data["name"]);
		$attr["surname"] = htmlspecialchars($data["firstname"]);
		$attr["mail"] = htmlspecialchars($data["email"]);
		$attr["civility"] = htmlspecialchars($data["civilite"]);
		$attr["country"] = htmlspecialchars($data["pays"]);
		$attr["city"] = htmlspecialchars($data["city"]);
		$attr["site"] = htmlspecialchars($data["site"]);
		//$attr["deleted"] = 0;
		//$attr["banned"] = 0;
		//$attr["image"] = 0;
		//$attr["access"] = 0;
		$attr["languages"] = htmlspecialchars($data["langage"]);

		$languages_array = explode(',', $attr["languages"]);

		if (strlen($attr["pseudo"]) < 6) {
		    $bool_error = true;
		    $error["pseudo"] = "error";
		} else if ($user_bis = $this->Model->User->getBy("login", strtolower($attr["pseudo"]))) {

		    if ($user->get("id") != $user_bis->get("id")) {
			$bool_error = true;
			$error["pseudo_exist"] = "error";
		    }
		}
		if (strlen($attr["name"]) < 1) {
		    $bool_error = true;
		    $error["name"] = "error";
		}
		if (strlen($attr["surname"]) < 1) {
		    $bool_error = true;
		    $error["surname"] = "error";
		}
		if (!preg_match($mail, $attr["mail"])) {
		    $bool_error = true;
		    $error["mail"] = "error";
		}
		if (!in_array($attr["civility"], $civility)) {
		    $bool_error = true;
		    $error["civility"] = "error";
		}
		if (!preg_match($url, $attr["site"]) && strlen($attr["site"]) > 0) {
		    $bool_error = true;
		    $error["site"] = "error";
		}
		foreach ($languages_array as $language) {
		    if (!in_array($language, $languages)) {
			$bool_error = true;
			$error["languages"] = "error";
		    }
		}
		if ($bool_error) {
		    $this->render(compact("user", "error", "attr"));
		} else {
		    $id = intval($data["id"]);
// TODO: update ?
		    if (App::getClass("user", $id)->set($attr)) {

			$this->redirect(Router::getUrl("user", "compte"));
		    } else {
			$this->render(compact("user", "attr"));
		    }
		}
	    } else {
		$attr["name"] = $user->get("name");
		$attr["surname"] = $user->get("surname");
		$attr["pseudo"] = $user->get("pseudo");
		$attr["mail"] = $user->get("mail");
		$attr["city"] = $user->get("city");
		$attr["site"] = $user->get("site");
	    }

	    $this->render(compact('user', "attr"));
	}
    }

}

?>