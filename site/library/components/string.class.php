<?php

/*
	Class :		StringComponent
	Lien : 		site/library/components/string.class.php
	Déscription :
				Permet de gérer les strings
*/
class StringComponent extends Component {
    
    public static function sanityze($string) {
	$string = strtolower($string);
	$string = str_replace(" ", "-", $string);
	$string = str_replace("'", "-", $string);
	$string = str_replace(",", "-", $string);
	$string = str_replace("?", "-", $string);
	$string = str_replace("!", "-", $string);
	$string = str_replace(":", "-", $string);
	$string = str_replace(";", "-", $string);
	$string = str_replace("é", "e", $string);
	$string = str_replace("è", "e", $string);
	$string = str_replace("ê", "e", $string);
	$string = str_replace("à", "a", $string);
	$string = str_replace("â", "a", $string);
	$string = str_replace("ù", "u", $string);
	$string = str_replace("û", "u", $string);
	$string = str_replace("ï", "i", $string);
	$string = str_replace("î", "i", $string);
	$string = str_replace("ì", "i", $string);
	$string = str_replace("ô", "o", $string);
	$string = str_replace("ö", "o", $string);
	$string = str_replace("--", "-", $string);
	$string = rtrim($string, "-");
	$string = ltrim($string, "-");
	return $string;
    }
}
?>
