<?php
class ErrorController extends Controller {
	public function HttpAction($codeError) {
		$errorHeaders = array(
				404 => "HTTP/1.0 404 Not Found",
			);
		header($errorHeaders[$codeError]);
		$this->render(array("code" =>$codeError));
	}
}
?>