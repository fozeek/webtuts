<?php

/*
 A FAIRE : mettre l'id du message d'erreur lors de l'instanciation
 Et créer une base de tous les message d'erreur (en Json c'est mieux (si pb avec la BDD))

*/

class Error {

	var $code;

	public function __construct($code) {
		$this->code = $code;
	}

	static public function render($code, $params) {
		header("HTTP/1.0 503 Service Unavailable");
		?>
			<div style="font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;padding: 30px;border: 1px solid #E5E5E5;background: #F9F9F9;width: 400px;margin: auto;margin-top: 40px;border-radius: 5px;">
			
			<?php switch ($code) {
				case 1:
					$message = "Controller not found";
					$origin = "class";
					break;

				case 2:
					$message = "Action not found";
					$origin = "function";
					break;

				case 3:
					$message = "Theme not found";
					$origin = "theme :";
					break;

				case 4:
					$message = "Number of required parameters for action has not been reached";
					$origin = "function :";
					break;
				
				default:
					# code...
					break;
			} ?>
				<span style="font-size: 1.2em;font-weight: bold;"><?= $message; ?></span>
				<pre style="margin-bottom: 0px;"><span style="color: grey;"><?= $origin; ?></span> <?= $params; ?></pre>
			</div>
		<?php
		die();
	}

	public function __toString() {
		return "<span class=\"kernel_error_log\">An error was occured : \"".$this->code."\"</span>";
	}

	public function get($attr) {
		return $this->code;
	}

}

?>