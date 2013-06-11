<?php


class FormHelper extends Helper {

	public function start($action = "#", $method = "POST", $enctype = "text/plain") {
		return '<form action="'.$action.'" method="'.$method.'" enctype="'.$enctype.'">';
	}

	public function end() {
		return '</form>';
	}

	public function model($model) {
		$shema = $model->getShema();
		return false;

		// A FINIR
	}

	public function input($name, array $options = array()) {
		$html = '<input name="'.$name.'" ';
		if(isset($options["type"]))
			$html .= 'type="'.$options["type"].'" ';
		else
			$html .= 'type="text" ';
		if(isset($options["value"]))
			$html .= 'value="'.$options["value"].'" ';
		if(isset($options["size"]))
			$html .= 'size="'.$options["size"].'" ';
		if(isset($options["maxlength"]))
			$html .= 'maxlength="'.$options["maxlength"].'" ';
		if(isset($options["placeholder"]))
			$html .= 'placeholder="'.$options["placeholder"].'" ';
		if(isset($options["id"]))
			$html .= 'id="'.$options["id"].'" ';
		if(isset($options["class"]))
			$html .= 'class="'.$options["class"].'" ';
		if(isset($options["checked"]) && isset($options["type"]) && ($options["type"] == "radio" || $options["type"] == "checkbox") && $options["checked"])
			$html .= 'checked ';
		if(isset($options["style"]))
			$html .= 'style="'.$options["style"].'" ';
		$html .= '/>';
		return $html;
	}

	public function textarea($name, array $options = array()) {
		$html = '<textarea ';
		if(isset($options["name"]))
			$html .= 'name="'.$options["name"].'" ';
		if(isset($options["placeholder"]))
			$html .= 'placeholder="'.$options["placeholder"].'" ';
		if(isset($options["rows"]))
			$html .= 'rows="'.$options["rows"].'" ';
		if(isset($options["cols"]))
			$html .= 'cols="'.$options["cols"].'" ';
		if(isset($options["id"]))
			$html .= 'id="'.$options["id"].'" ';
		if(isset($options["class"]))
			$html .= 'class="'.$options["class"].'" ';
		if(isset($options["style"]))
			$html .= 'style="'.$options["style"].'" ';
		if(isset($options["readonly"]) && $options["readonly"])
			$html .= 'readonly ';
		$html .= '>';
		if(isset($options["value"]))
			$html .= $options["value"];
		$html .= '</textarea>';
		return $html;
	}

	public function checkbox($name, $value, $options = array()) {
		$options["type"] = "checkbox";
		$options["value"] = $value;
		return $this->input($name, $options);
	}

	public function radio($name, $value, array $options = array()) {
		$options["type"] = "radio";
		$options["value"] = $value;
		return $this->input($name, $options);
	}

	public function select($name, $collection, array $options = array()) {
		$html = '<select name="'.$name.'" ';
		if(isset($options["size"]))
			$html .= 'size="'.$options["size"].'" ';
		if(isset($options["multiple"]) && $options["multiple"])
			$html .= 'multiple ';
		if(isset($options["id"]))
			$html .= 'id="'.$options["id"].'" ';
		if(isset($options["class"]))
			$html .= 'class="'.$options["class"].'" ';
		if(isset($options["style"]))
			$html .= 'style="'.$options["style"].'" ';
		$html .= '>';
		foreach ($collection as $key => $value) {
			$selected = (isset($options["selected"]) && $options["selected"] == $key) ? "selected": null ;
			$html .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
		}
		$html .= '</select>';
		return $html;
	}

	public function submit($value = "Envoyer", array $options = array()) {
		$html = '<input type="submit" value="'.$value.'" ';
		if(isset($options["id"]))
			$html .= 'id="'.$options["id"].'" ';
		if(isset($options["class"]))
			$html .= 'class="'.$options["class"].'" ';
		if(isset($options["style"]))
			$html .= 'style="'.$options["style"].'" ';
		$html .= '/>';
		return $html;
	}

	public function getForm($object, array $options = array()) {
		$html = $this->start((array_key_exists("start", $options)) ? $options["start"] : null);
		foreach ($object->getShema() as $attribut => $params) {
			if($params["Extra"] != "auto_increment" && empty($params["Link"])) {
				if($params["Type"]=="text")
					$html .= $this->textarea((array_key_exists("textarea", $options)) ? $options["textarea"] : null );
				elseif(preg_match("/varchar/i", $params["Type"])) {
					$tmp = explode("(", $params["Type"]);
					$html .= $this->input((array_key_exists("input", $options)) ? array_merge($options["input"], array("maxlength" => $tmp[1])) : null );
				}
			}
		}
		$html .= $this->submit((array_key_exists("submit", $options)) ? $options["submit"] : null);
	}
}