<html>
	<head>
		<title><?= $view->Params->getParam("title") ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
	<body style="margin: 0px;padding: 0px;font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;">
		<div style="background: #E5E5E5;border-bottom: 1px solid #ccc;">
			<div style="width: 900px;margin: auto;padding: 20px;">
				<div style="float: right;">
					<?php if(!$view->Auth->getUser()) : ?>
					<a href="<?= Router::getUrl("user", "connect"); ?>">Connect</a>
					 - <a href="<?= Router::getUrl("user", "signin"); ?>">Sign in</a>
					<?php else : ?>
					<a href="<?= Router::getUrl("user", "myaccount"); ?>">My account</a>
					 - <a href="<?= Router::getUrl("user", "disconnect"); ?>">Disconnect</a>
						<?php if(!$view->Auth->getUser()->haveAccess("ACCES_BO")) : ?>
						 - <a href="<?= Router::getUrl("home", "gobackend"); ?>">Administration</a>
						<?php endif ?>
					<?php endif ?>
				</div>
				<span style="font-size: 2em;"><a href="/"><?= $view->Params->getParam("title") ?></a></span>
			</div>
		</div>
		<div style="background: #F9F9F9;border-bottom: 1px solid #E5E5E5;">
			<div style="width: 900px;margin: auto;padding: 20px;">
				<?php $bundle = Bundles::getBundle("content"); ?>
				<?php foreach ($bundle["tables"] as $value): ?>
					<a href="<?= Router::getUrl("content", "list", array("name" => $value)) ?>"><?= ucfirst($value) ?></a> 
				<?php endforeach ?>
			</div>
		</div>
		<div style="">
			<div style="width: 900px;margin: auto;padding: 20px;">