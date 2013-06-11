<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
<meta name="Description" content="Webtuts, un blog de tutoriels visant à enseigner la réalisation de son propre site web grâce à diverses astuces expliquées de façon détaillées." >
<meta name="Author" content="Webtuts, fitz_lucassen, Fozeek, Musha, Deak, Thibault, Quentin, Jonathan, Richard">

<meta name="Revisit-after" content="15 days">
<meta name="Publisher" content="Webtuts, Thibault DULON, Quentin DENEUVE, Richard ETTOU, Jonathan BICHEUX">
<meta name="Generator" content="PHP Engineer, HTML5/CSS3 Integrator">
<meta name="Robots" content="index, follow, all">
<meta name="Rating" content="general">
<meta name="Language" content="fr">
<meta name="Viewport" content="initial-scale=1.0">

<?php
    if(Kernel::route("action") != "article"){
?>
	<meta property="og:title" content="Webtuts" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?php echo $_SERVER['SERVER_NAME'] . '/'; ?>" />
	<meta property="og:image" content="<?php echo $_SERVER['SERVER_NAME'] . _theme_path_; ?>images/favicon.ico" />
	<meta property="og:description" content="Webtuts, un blog de tutoriels visant à enseigner la réalisation de son propre site web grâces à diverses astuces et techniques expliquées de façon détaillés." />
<?php
    }
    else {
?>
	<meta property="og:title" content="<?php echo $article->get("title"); ?>" />
	<meta property="og:url" content="<?php echo $_SERVER['SERVER_NAME'] . '/' . Kernel::get("url"); ?>" />
	<meta property="og:image" content="<?php echo $_SERVER['SERVER_NAME'] . get_url_image($article); ?>" />
<?php
    }
?>
<link rel="icon" type="images/png" href="<?php echo _theme_path_; ?>images/favicon.ico" />
<!--[if IE]>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo _theme_path_; ?>images/favicon.ico" />
<![endif]-->

<link rel="apple-touch-icon" href="<?php echo _theme_path_; ?>images/favicon57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo _theme_path_; ?>images/favicon72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo _theme_path_; ?>images/favicon114.png" />

<link type="text/css" rel="stylesheet" href="<?php echo _theme_path_; ?>css/style.css" />
<link type="text/css" rel="stylesheet" href="<?php echo _theme_path_ ?>css/<?php echo Kernel::route("controller"); ?>.css" />
<link type="text/css" rel="stylesheet" href="<?php echo _theme_path_; ?>css/animation.css" />
<link type="text/css" rel="stylesheet" href="<?php echo _theme_path_; ?>css/shCore.css" />
<link type="text/css" rel="Stylesheet" href="<?php echo _theme_path_; ?>css/shThemeRDark.css"/>
<link type="text/css" rel="Stylesheet" href="<?php echo _theme_path_; ?>css/responsive.css"/>

<!-- Required script -->
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo _theme_path_; ?>js/jfunction.js"></script>

<!--[if lt IE 9]>
	<script src="<?php echo _theme_path_; ?>js/html5shiv.js"></script>
<![endif]-->

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36540879-1']);
    _gaq.push(['_trackPageview']);
    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>