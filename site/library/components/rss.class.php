<?php

/*
	Class :		RssComponent
	Lien : 		site/library/components/rss.class.php
	Déscription :
				Permet de générer un flux RSS.
*/
class RssComponent extends Component {

	private $_title;									// String				Titre du flux RSS.
	private $_link;										// String				Lien du flux RSS.
	private $_description;								// String				Description du flux RSS.
	private $_items;									// String				Collection des items du flux.
	private $_attributs = array(						// String				Liste des attributs du flux. Si faux, il n'est pas affiché.
				"title" => "title",
				"link" => "link",
				"guid" => "guid",
				"ispermalink" => "True",
				"description" => "description",
				"pubDate" => "pubDate"
			);

	/*
		Constructeur
	*/
	public function __construct($params = null) {
		if($params !== null && is_array($params)) {
			if(array_key_exists("title", $params))
				$this->_title = $params["title"];
			elseif(array_key_exists("link", $params))
				$this->_link = $params["link"];
			elseif(array_key_exists("description", $params))
				$this->_description = $params["description"];
			elseif(array_key_exists("items", $params))
				$this->_items = $params["items"];
			elseif(array_key_exists("attributs", $params))
				$this->_attributs = $params["attributs"];
		}
	}

	/*
		Setters
	*/
	public function setTitle($title) {
		$this->_title = $title;
	}
	public function setLink($link) {
		$this->_link = $link;
	}
	public function setDescription($description) {
		$this->_description = $description;
	}
	public function setItems($items) {
		$this->_items = $items;
	}
	public function setAttribut($attribut, $value) {
		$this->_attributs[$attribut] = $value;
	}
	public function setAllAttributs($attributs) {
		$this->_attributs = $attributs;
	}

	public function __toString() {
		$this->print();
	}

	/*
		toPrint()	
			Permet d'afficher le flux
	*/
	public function toPrint() {
		header('Content-type: text/xml');
		echo "<rss version=\"2.0\">\n<channel>\n<title>".$this->_title."</title>\n<link>".$this->_link."</link>\n<description>".$this->_description."</description>\n";
		$title = $this->_attributs["title"];
		$link = $this->_attributs["link"];
		$guid = $this->_attributs["guid"];
		$ispermalink = $this->_attributs["ispermalink"];
		$description = $this->_attributs["description"];
		$pubDate = $this->_attributs["pubDate"];
		foreach ($this->items as $item) {
			if(is_array($item)) {
				$title = $item->$title;
				$link = $item->$link;
				$guid = $item->$guid;
				$description = $item->$description;
				$pubDate = $item->$pubDate;
			}
			elseif(is_object($item)) {
				$title = $item[$title];
				$link = $item[$link];
				$guid = $item[$guid];
				$description = $item[$description];
				$pubDate = $item[$pubDate];
			}
			echo"\t<item>\n";
			if($title)
				echo"\t\t<title>".$item->$title."</title>\n";
			if($link)
				echo"\t\t<link>".$item->$link."</link>\n";
			if($guid)
				echo"\t\t<guid isPermaLink=\"".$ispermalink."\">".$item->$guid."</guid>\n";
			if($description)
				echo"\t\t<description><![CDATA[".strip_tags($item->$description)."]]></description>\n";
			if($pubDate)
				echo"\t\t<pubDate>".$item->$pubDate."</pubDate>\n";
			echo "\t<item>\n";
		}
		echo  "</channel>\n</rss>";
	}
}