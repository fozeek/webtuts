<pre style="padding: 30px;border: 1px solid #E5E5E5;background: #F9F9F9;width: 400px;margin: auto;margin-top: 40px;border-radius: 5px;">
<span style="font-size: 1.2em;font-weight: bold;"><?= $message; ?></span>
<?php switch ($code) {
	case 1:
		echo '<span style="color: grey;">function</span> '.$function;
		break;
	
	case 2:
		echo '<span style="color: grey;">class</span> '.$controller;
		break;
	
	default:
		# code...
		break;
} ?>
</pre>