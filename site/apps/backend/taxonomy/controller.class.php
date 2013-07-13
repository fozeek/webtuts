<?php

class TaxonomyController extends Controller {
	public function IndexAction() {
		$taxonomies = $this->Model->bundle("taxonomy");
		$this->render(compact("taxonomies"));
	}

	public function ShowAction($id) {
		$tutorial = $this->Model->Tutorial->getById($id);
		$this->render(compact("tutorial"));
	}
}