<?php



class JsonComponent extends Component {

	public function render(array $vars) {
		header('Content-type: application/json');
		echo json_encode($vars);
	}

}