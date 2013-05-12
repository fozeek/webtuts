<?php

	
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }

	function import($folder, $file) {
		($path = Kernel::path($folder)) ? null : $path = Kernel::path("library").$folder."/";
		if(file_exists($path.$file.".class.php")) {
			require_once($path.$file.".class.php");
			return true;
		}
		else 
			return false;
	}
	
?>