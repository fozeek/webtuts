<?php

class ContentController extends Controller {

	public function IndexAction() {
 		$this->redirect(Router::getUrl("content", "list", array("type" => "bundle", "name" => "content")));
	}

	public function ListAction($type, $name = null) {
		$options = array();
		if($type=="bundle") {
			$bundle = Bundles::getBundle($name);
			if(in_array("date", $bundle["fields"]))
				$options = array_merge($options, array("orderBy" => array("date", "DESC")));
			$contents = $this->Model->bundle($name, $options);
		}
		else {
			$shema = $this->Model->$type->getShema();
			if(array_key_exists("date", $shema))
				$options = array_merge($options, array("orderBy" => array("date", "DESC")));
			$contents = $this->Model->$type->getAll($options);
		}
		$this->render(compact("contents", "type", "name"));
	}

	public function ListajaxAction() {
		$type = $this->Request->getData("type");
		$name = $this->Request->getData("name");
		$query = $this->Request->getData("query");
		$options = array();
		if($type=="bundle") {
			$bundle = Bundles::getBundle($name);
			if(in_array("date", $bundle["fields"]))
				$options = array_merge($options, array("orderBy" => array("date", "DESC")));
			$contents = $this->Model->bundle($name, $options);
		}
		else {
			$shema = $this->Model->$type->getShema();
			if(array_key_exists("date", $shema))
				$options = array_merge($options, array("orderBy" => array("date", "DESC")));
			$contents = $this->Model->$type->getAll($options);
		}
		$this->render(compact("contents", "query"));
	}

	public function ShowajaxAction() {
		$node = $this->Request->getData("node");
		$content = $this->Model->$node->getById($this->Request->getData("id"));
		$this->Form->setForm($content);
		$this->render(compact("content"));
	}

	public function AddformajaxAction() {
		$node = $this->Request->getData("node");
		$table = $this->Model->$node;
		$this->Form->setForm($table);
		$this->render(compact("table", "node"));
	}

	public function UpdateajaxAction() {
		$this->Form->setForm($content = $this->Model->save());
		$this->render(array("content" => $content));
	}

	public function AddsaveajaxAction() {
		
		$dossier = Kernel::path("uploads");
		$fichier = basename($_FILES['image']['name']);
		$taille_maxi = 100000;
		$taille = filesize($_FILES['image']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['image']['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...';
		}
		if($taille>$taille_maxi)
		{
		     $erreur = 'Le fichier est trop gros...';
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
		     //On formate le nom du fichier ici...
		     $fichier = strtr($fichier, 
		          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
		          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		          echo 'Upload effectué avec succès !';
		     }
		     else //Sinon (la fonction renvoie FALSE).
		     {
		          echo 'Echec de l\'upload !';
		     }
		}
		else
		{
		     echo $erreur;
		}

		//$this->Form->setForm($content = $this->Model->save());
		//$this->render(array("content" => $content));
	}


	public function PaneldeletedajaxAction() {
		$query = $this->Request->getData("query");
		$node = $this->Request->getData("node");
		$date =  $this->Request->getData("date");
		$dateExpl = explode(' ', $date);
		$options["orderBy"] = array("date", "DESC");
		$options["where"] = array();
		array_push($options["where"], array("deleted", "=", true));
		array_push($options["where"], array("date", ">=", $dateExpl[0]." 00:00:00"));
		array_push($options["where"], array("date", "<=", $dateExpl[0]." 24:59:59"));
		if($query) array_push($options["where"], array("title", "LIKE", "%".$query."%"));
		$contents = ($node) ?
			$this->Model->$node->getAll($options):
			$this->Model->bundle("content", $options);
		$this->render(compact("contents", "date", "query", "node"));
	}

	public function ListdeletedajaxAction() {
		$query = $this->Request->getData("query");
		$node = $this->Request->getData("node");
		$date =  $this->Request->getData("date");
		$dateExpl = explode(' ', $date);
		$options["orderBy"] = array("date", "DESC");
		$options["where"] = array();
		array_push($options["where"], array("deleted", "=", 1, false));
		array_push($options["where"], array("date", ">=", $dateExpl[0]." 00:00:00"));
		array_push($options["where"], array("date", "<=", $dateExpl[0]." 24:59:59"));
		if($query) array_push($options["where"], array("title", "LIKE", "%".$query."%"));
		$contents = ($node) ?
			$this->Model->$node->getAll($options):
			$this->Model->bundle("content", $options);
		$this->render(compact("contents", "date"));
	}
	
	public function RemoveajaxAction() {
		$node = $this->Request->getData("node");
		$this->Model->$node->update($this->Request->getData("id"), array("deleted" => true));
		$content = $this->Model->$node->getById($this->Request->getData("id"));
		$this->Form->setForm($content);
		$this->render(compact("content"));
	}

	public function RestoreajaxAction() {
		$node = $this->Request->getData("node");
		$this->Model->$node->update($this->Request->getData("id"), array("deleted" => 0));
		$content = $this->Model->$node->getById($this->Request->getData("id"));
		$this->Form->setForm($content);
		$this->render(compact("content"));
	}

	public function AddchoosebundleajaxAction() {
		$this->render(array("bundle" => $this->Request->getData("bundle")));
	}

	public function ManagerNodesajaxAction() {
		$bundle = Bundles::getBundle("content");
		foreach ($bundle["tables"] as $key => $value)
			$nodes[$value] = $this->Model->$value->getShema();
		$bundle = Bundles::getBundle("taxonomy");
		foreach ($bundle["tables"] as $key => $value)
			$taxonomies[$value] = $this->Model->$value->getShema();
		$this->render(compact("nodes", "taxonomies"));
	}

	public function ShowshemaajaxAction() {
		$name = $this->Request->getData("content");
		$shema = $this->Model->$name->getShema();
		$this->render(compact("shema", "name"));
	}

	public function addnodeformajaxAction() {
		$this->render();
	}

	public function addnodesaveajaxAction() {
		$requete = "CREATE TABLE ".strtolower($this->Request->getData("name"))." (";
		$requete .= " id int(11) NOT NULL AUTO_INCREMENT,";
		if($this->Request->getData("type")==0)  { // node
			$requete .= " deleted int(1) NOT NULL,";
			$requete .= " date datetime NOT NULL,";
			$requete .= " title int(11) NOT NULL COMMENT '{\"link\" : \"OneToOne\", \"reference\":\"lang\",\"size\" : \"small\"}',";
			$requete .= " text int(11) NOT NULL COMMENT '{\"link\" : \"OneToOne\", \"reference\":\"lang\",\"size\" : \"big\"}',";
			$requete .= " image int(11) NOT NULL COMMENT '{\"link\":\"OneToOne\",\"reference\":\"image\"}',";
			Bundles::addToBundle("content", $this->Request->getData("name"));
		}
		elseif ($this->Request->getData("type")==1) { // taxonomie
			$requete .= " deleted int(1) NOT NULL,";
			$requete .= " title int(11) NOT NULL COMMENT '{\"link\" : \"OneToOne\", \"reference\":\"lang\",\"size\" : \"small\"}',";
			$requete .= " text int(11) NOT NULL COMMENT '{\"link\" : \"OneToOne\", \"reference\":\"lang\",\"size\" : \"big\"}',";
			Bundles::addToBundle("taxonomy", $this->Request->getData("name"));
		}
		foreach ($this->Request->getData() as $key => $value) {
			if(!empty($value["name"])) {
				$requete .= " ".$value["name"];
				if($value["link"]=="0") {
					$requete .= " text NOT NULL COMMENT '{";
					if(!array_key_exists("editable", $value))
						$requete .= "\"editable\" : \"false\",";
					$requete .= "\"size\" : \"".$value["size"]."\"";
				}
				else {
					$requete .= " int(11) NOT NULL COMMENT '{\"link\" : \"".$value["link"]."\", \"reference\":\"".$value["ref"]."\",\"size\" : \"".$value["size"]."\"";
					if(!array_key_exists("editable", $value))
						$requete .= ",\"editable\" : \"false\"";
					if($value["link"]=="OneToMany" || $value["link"] == "ManyToMany") {
						$res = SQL::create()->query("SELECT link_number FROM _params");
						SQL::create()->exec("UPDATE _params SET link_number=link_number+1");
						$requete .= ",\"code\" : \"".$res[0]["link_number"]."\"";
					}
				}
				$requete .="}',";
			}
		}

		$requete .= " PRIMARY KEY (id) )";
		Sql::create()->exec($requete);
	}

	public function DeletenodeajaxAction() {
		$name = $this->Request->getData("name");
		Bundles::removeToBundle("content", $name);
		Bundles::removeToBundle("taxonomy", $name);
		Sql::create()->exec("DROP TABLE ".$name);
	}
}

?>