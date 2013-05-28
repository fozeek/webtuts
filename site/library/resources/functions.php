<?php

	
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }

	function import($folder, $file) {
		($path = Kernel::path($folder)) ? null : $path = Kernel::path("library").$folder."/";
		$ext = (preg_match("/\b.config\b/", $file)) ? "" : ".class" ;
		if(file_exists($path.$file.$ext.".php")) {
			require_once($path.$file.$ext.".php");
			return true;
		}
		else 
			return false;
	}
	
?>