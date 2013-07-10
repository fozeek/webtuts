<?php

function get_title_from_url($controller, $action) {
    $title = "";
    if ($controller == "home") {

	// HOME TITLES	    

	if ($action == "index") {
	    $title = "Webtuts - Le site des meilleurs tutoriaux du web, sur le web";
	}
    } else if ($controller == "blog") {

	// BLOG TITLES

	if ($action == "categories") {
	    $title = "Les catégories de Webtuts - Les meilleurs tutoriaux du web";
	} else if ($action == "articles") {
	    $title = "Les articles de Webtuts - Les meilleurs tutoriaux du web";
	} else if ($action == "category") {
	    $title = "Catégorie";
	} else if ($action == "article") {
	    $title = "Article";
	} else if ($action == "actualites") {
	    $title = "Les actualités de Webtuts - Les meilleurs tutoriaux du web";
	} else if ($action == "actualite") {
	    $title = "Actualité";
	} else if ($action == "tags") {
	    $title = "Les tags de Webtuts - Les meilleurs tutoriaux du web";
	} else if ($action == "tag") {
	    $title = "Tag";
	} else {
	    $title = "Page de Webtuts";
	}
    } else if ($controller == "user") {

	// USER TITLES

	if ($action == "connection") {
	    $title = "Connectez vous à votre compte Webtuts";
	} else if ($action == "subscription") {
	    $title = "Inscrivez-vous sur Webtuts - Accéder à la communauté";
	} else if ($action == "profil") {
	    $title = "Le profil de";
	} else if ($action == "compte") {
	    $title = "Votre compte utilisateur";
	}
    } else if ($controller == "page") {

	// PAGES TITLES

	if ($action == "contact") {
	    $title = "Contactez l'équipe de Webtuts";
	} else if ($action == "about") {
	    $title = "Présentation du projet Webtuts - Les meilleurs tutoriaux du web";
	} else if ($action == "partners") {
	    $title = "Tous les partenaires de Webtuts";
	} else if ($action == "sitemap") {
	    $title = "Le plan du site de Webtuts - Retrouvez vos tutoriaux";
	}
    }
    return $title;
}

function get_url_image($object) {
    if ($object->get("image")) {
	$url_image = Kernel::path("uploads", true) . $object->get("image");
    } else {
	$url_image = _theme_path_ . 'images/' . 'article-image.png';
    }
    return $url_image;
}

function format_date($date) {

    $months = array("fr" => array("January" => "janvier",
	    "February" => "fevrier",
	    "March" => "mars",
	    "April" => "avril",
	    "May" => "mai",
	    "June" => "juin",
	    "July" => "juillet",
	    "August" => "aout",
	    "September" => "septembre",
	    "October" => "octobre",
	    "November" => "novembre",
	    "December" => "décembre"),
	"en" => array("January" => "january",
	    "February" => "february",
	    "March" => "march",
	    "April" => "april",
	    "May" => "may",
	    "June" => "june",
	    "July" => "july",
	    "August" => "august",
	    "September" => "september",
	    "October" => "october",
	    "November" => "november",
	    "December" => "december"));

    $date_without_time = current(explode(' ', $date));
    $date_array = explode('-', $date_without_time);
    $date = date("j F Y", mktime(0, 0, 0, $date_array[1], $date_array[2], $date_array[0]));

    $date_array = explode(' ', $date);
    $date = implode(' ', array($date_array[0], $months[Kernel::getCurrentLang()][$date_array[1]], $date_array[2]));
    return $date;
}

function short_description($description, $size = 280) {
    if (strlen(strip_tags(strip_style($description))) > $size) {
	$description = substr(strip_tags(strip_style($description)), 0, $size) . "...";
    }
    return $description;
}

function replace_lang_in_url($url) {
    $url_replaced = str_replace("en/", "", $url);
    $url_replaced = str_replace("fr/", "", $url_replaced);

    return $url_replaced;
}

function format_for_url($string) {
    return strtolower(str_replace('--', '-', str_replace(' ', '-', str_replace(',', '-', $string))));
}

function strip_style($string) {
    if (strpos($string, "<style>") === 0 || strpos($string, "<style>") > 0) {
	$begin = substr($string, 0, strpos($string, "<style>"));
	$end = substr($string, strpos($string, "</style>") + 8);

	return $begin . $end;
    }

    return $string;
}

?>
