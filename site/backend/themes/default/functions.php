<?php
	
	function image($image) {
		return Kernel::path("uploads", true).$image;
	}

	function imageTheme($image) {
		return Kernel::path("themes", true)."default/images/".$image;
	}

	function createLink($link) {
		if(Kernel::getDefaultLang()!=Kernel::get("lang"))
			return "/".Kernel::getCurrentLang().$link;
		else
			return $link;
	}

	function partial($page, $params = null) {
		if($params!=null)
			extract($params);
		include("partials/".$page.".php");
	}
	function img($name) {
		echo '/'.Kernel::path("themes"). 'images/'.$name;
	}
	function lang($lang){
		if($lang != "")
			return $lang;
		else
			return "This text doesn't has its traduction !";
	}

	function tmpDate($date) {
		$dateExpl = explode(' ', $date);
		$day = explode('-', $dateExpl[0]);
		return $day[2].$day[1].$day[0];
	}
	
	function printDate($date, $bool = 0){
		$dateExpl = explode(' ', $date);
		$day = explode('-', $dateExpl[0]);
		$time = explode(':', $dateExpl[1]);
		
		$month = array(	"01"=>"january",
						"02"=>"february",
						"03"=>"march",
						"04"=>"april",
						"05"=>"may",
						"06"=>"june",
						"07"=>"july",
						"08"=>"august",
						"09"=>"september",
						"10"=>"october",
						"11"=>"november",
						"12"=>"december"					
					);
		
		if ($bool == 0)
			return $day[2]." ".$month[$day[1]]." ".$day[0]." at ".$time[0]."h".$time[1];
		elseif ($bool == 1)
			return $day[2]." ".$month[$day[1]]." ".$day[0];
		elseif ($bool == 2)
			return $time[0]."h".$time[1];
	}
	
	function minifyText($title, $size_max = 25){	
		if(strlen($title) > $size_max){
			return substr($title, 0, $size_max)."...";
		}
		else{
			return $title;
		}
	}
?>