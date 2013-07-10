<?php

class MailComponent extends Component {

    private $_from;
    private $_subject;
    private $_to;
    private $_header;
    private $_text;
    private $_carriage_return;

    public function __construct($params = null) {
	if ($params !== null && is_array($params)) {
	    if (array_key_exists("from", $params))
		from($params["from"]);
	    elseif (array_key_exists("to", $params))
		to($params["to"]);
	    elseif (array_key_exists("header", $params))
		header($params["header"]);
	    elseif (array_key_exists("text", $params))
		text($params["text"]);
	    elseif (array_key_exists("subject", $params))
		subject($params["subject"]);
	}
	return $this;
    }

    public function from($from) {
	$this->_from = $from;
	return $this;
    }

    public function to($to) {
	$this->_to = $to;
	return $this;
    }
    
    public function subject($subject) {
	$this->_subject = $subject;
	return $this;
    }

    public function header($header, $value) {
	$this->setCarriageReturn();
	if ($header == "from")
	    $this->_headers = "From: \"" . $value["name"] . "\"" . $value["mail"] . $this->_carriage_return;
	return $this;
    }

    /*
      $header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
      $header .= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
      $header .= "MIME-Version: 1.0".$passage_ligne;
      $header .= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
     */

    public function text($text) {
	$this->_text = $text;
	return $this;
    }


    private function setCarriageReturn() {
	if (!empty($this->_to)) {
	    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $this->_to))
		$this->_carriage_return = "\r\n";
	    else
		$this->_carriage_return = "\n";
	}
    }

    public function send($params) {
	mail($this->_to, $this->_subject, $this->_text, $this->_header);
    }

}

?>