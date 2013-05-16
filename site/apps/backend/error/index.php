<?php
class ErrorController extends Controller {
	public function HttpAction($codeError) {
		header("HTTP/1.0 404 Not Found");
		$this->render(compact($codeError));
	}
	public function KernelAction($codeError, $param1) {
		header("HTTP/1.0 503 Service Unavailable");
		switch ($codeError) {
			case 1:
				$this->render(array("code" => 1, "message" => "Action not found.", "function" => $param1));
				break;
			
			case 2:
				$this->render(array("code" => 2, "message" => "Controller not found.", "controller" => $param1));
				break;
			
			default:
				# code...
				break;
		}
	}
}
?>