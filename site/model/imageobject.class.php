<?php 


class ImageObject extends ObjectModel {

	public static $isType = true;

	public function __toString() {
		return $this->get("nom").".".$this->get("type");
	}

	public function __printForm($shema) {
		$html = '<div style="border-radius: 2px;border: 1px solid #B9B9B9;"><div style="padding: 4px;">'.$this.'</div><div style="background: #F9F9F9;padding :4px;">';
		$html .= FormHelper::getInstance()->file($shema["Field"], array("id" => $shema["Field"]));
		$html .= '</div></div>';
		return $html;
	}

	public static function __printFormNew($shema) {
		$html = '<div style="border-radius: 2px;border: 1px solid #B9B9B9;"><div style="background: #F9F9F9;padding :4px;">';
		$html .= FormHelper::getInstance()->file($shema["Field"], array("id" => $shema["Field"]));
		$html .= '</div></div>';
		return $html;
	}

	public function __executeForm($model, array $data) {
		return $this::__executeFormNew($model, $data);
	}
	public static function __executeFormNew($model, array $data) {

		$dossier = Kernel::path("uploads");
		$fichier = basename($data['name']);
		$taille_maxi = 100000;
		//$taille = filesize($data['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($data['name'], '.'); 
		//Début des vérifications de sécurité...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
		      return false;
		}
		/*if($taille>$taille_maxi)
		{
		      return false;
		}*/
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
		     //On formate le nom du fichier ici...
		     $fichier = strtr($fichier, 
		          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
		          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		     if(move_uploaded_file($data['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		     {
		      	$image = $model->Image->save(array("nom" => str_replace($extension, "", $fichier), "type" => str_replace(".", "", $extension), "width" => "1000")) ;  
		        return $image;
		     }
		     else //Sinon (la fonction renvoie FALSE).
		     {
		          return false;
		     }
		}
		else
		{
			return false;
		}
	}

}