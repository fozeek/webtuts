<?php

class TaxonomyController extends Controller {
	public function IndexAction() {
		$tutorials = $this->Model->Tutorial->getAll(array(
				"orderBy" => array("date", "ASC")
			));
		$this->render(compact("tutorials"));
	}

	public function ShowAction($id) {
		$tutorial = $this->Model->Tutorial->getById($id);
		$this->render(compact("tutorial"));
	}
}