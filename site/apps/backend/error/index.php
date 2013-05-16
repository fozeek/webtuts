<?php
class ErrorController extends Controller {
	public function HttpAction($codeError) {
		header("HTTP/1.0 404 Not Found");
		$this->render(compact($codeError));
	}
}
?>