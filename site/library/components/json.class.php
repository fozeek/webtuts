<?php



class JsonComponent extends Component {

	public function render(array $vars) {
		foreach ($vars as $key => $value)
			$vars[$key] = $value->getAttributs();
		echo json_encode($vars);
	}

}