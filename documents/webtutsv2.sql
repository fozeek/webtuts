-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 17 Juillet 2013 à 23:11
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `webtutsv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `title` text NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id`, `deleted`, `title`, `description`) VALUES
(1, 0, 'ACCESS_BO', 1),
(2, 0, 'ACCESS_SITE', 1);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` int(255) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `text` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `image` int(10) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"image"}',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `tutorials` int(10) DEFAULT NULL COMMENT '{"link" : "OneToMany", "reference":"tutorial", "editable":false,"code":9}',
  `slug` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `title`, `text`, `image`, `deleted`, `tutorials`, `slug`) VALUES
(1, 1, 2, 2, 0, 0, 47),
(2, 5, 6, 4, 0, NULL, 48),
(5, 7, 8, 3, 0, NULL, 49),
(6, 11, 12, 7, 0, 0, 50),
(7, 13, 14, 5, 0, NULL, 51),
(8, 15, 16, 6, 0, NULL, 52);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `author` int(11) NOT NULL COMMENT '{"link":"OneToOne", "reference":"user"}',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `deleted`, `date`, `author`, `text`) VALUES
(1, 0, '2013-07-16 00:00:00', 1, 'Sympa ce tuto !'),
(2, 0, '2013-07-16 00:00:00', 1, 'J''ai beaucoup appris, merci !'),
(3, 0, '2013-07-17 22:56:08', 2, 'J''aime bien');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `width` int(4) NOT NULL DEFAULT '80',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `date`, `nom`, `type`, `width`) VALUES
(1, '2013-05-26 00:00:00', 'fitz-lucassen', 'png', 80),
(2, '2013-07-12 00:00:00', 'puzzle', 'png', 54),
(3, '2013-07-12 00:00:00', 'ecusson', 'png', 80),
(4, '2013-07-12 00:00:00', 'etoile', 'png', 75),
(5, '2013-07-12 00:00:00', 'coupe', 'png', 100),
(6, '2013-07-12 00:00:00', 'dossier', 'png', 56),
(7, '2013-07-12 00:00:00', 'outils', 'png', 90),
(8, '2013-07-12 00:00:00', 'lancement-webtuts', 'jpg', 339),
(9, '2013-07-12 00:00:00', 'positionnement-css', 'jpg', 339),
(10, '2013-07-12 00:00:00', 'session-php', 'jpg', 339);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE IF NOT EXISTS `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fr` text NOT NULL,
  `en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `fr`, `en`) VALUES
(1, 'Intégration', 'Integration'),
(2, 'Ici vous verrez tous les secrets d''une bonne intégration en apprenant les bons réflexe à acquérir ainsi que certaines astuces importantes à connaître pour ne pas se torturer la tête pendant des heures !', 'Here you will find all the secrets of a successful integration in learning good reflex, as well as some important tips to know to not to torture your mind for hours!'),
(3, 'Article', 'Article'),
(4, 'Actualité', 'News'),
(5, 'Animation', 'Animation'),
(6, 'Ici vous apprendrez à dynamiser vos site web grace à des animations innovante ou utiles pour vos sites web ainsi que pour rendre design encore plus attractif !', 'Here you will learn how to boost your website thanks to innovative or useful animations for your webdesign and to make it even more attractive!'),
(7, 'Logiciels', 'Software'),
(8, 'Ici vous apprendrez à vous servir de certain logiciels très utiles pour faciliter vos développements. L''environnement de développement et les avantages qu''il peut apporter sont souvent négligés par la plupart des développeurs.', 'Here you will learn to use some useful software to help your development. The development environment and the benefits it can provide are often overlooked by most developers.'),
(9, 'PHP', 'PHP'),
(10, 'Tous les tutoriels utilisant le langage PHP', 'All tuts using PHP language'),
(11, 'Développement Fonctionnel', 'Functional development'),
(12, 'Ici vous apprendrez à gérez la partit fonctionnel de votre site, c''est à dire la partie "Intelligente" de celui-ci.\nC''est une partie importante d''un site car sans les langages serveurs, votre site ne pourrait être dynamique.', 'Here you will learn how to manage the functional part of your website, it''s the "Intelligent" part of it.\r\nThis is an important part of a website because without server languages, your website couldn''t be dynamic.'),
(13, 'Référencement', 'SEO'),
(14, 'Pour que votre site soit visible, il est essentiel d''accorder une grande importance au référencement de celui-ci afin de devenir "SEO friendly" ! Les robots de google sont intransigeant et il faut très vite acquérir les bons réflexes pour augmenter son référencement naturel !', 'To your website be visible, it is essential to give importance to SEO and becoming "SEO friendly"! Google bots are uncompromising and you must quickly acquire good habits to increase your SEO!'),
(15, 'Autres', 'Others'),
(16, 'Tous les tutoriels inclassable dans les autres catégories seront dans celle-ci. Vous pourrez donc trouver des articles divers sur le travail d''un web-developer par exemple.', 'All tutorials unclassifiable in other categories will be in it. So you can find various articles on the work of a web-developer for example.'),
(17, 'HTML', 'HTML'),
(18, 'Tous les tutoriels utilisant le langage HTML', 'All tuts using HTML language'),
(19, 'CSS', 'CSS'),
(20, 'Tous les tutoriels utilisant le langage CSS', 'All tuts using CSS language'),
(21, 'Javascript', 'Javascript'),
(22, 'Tous les tutoriels utilisant le langage javascript', 'All tuts using Javascript language'),
(23, 'JQuery', 'JQuery'),
(24, 'Tous les tutoriels utilisant la bibliothèque JQuery, basé sur javascript', 'All tuts using JQuery framework'),
(25, 'Webtuts se lance sur le web !', 'Webtuts on the web !'),
(26, 'webtuts', 'webtuts'),
(27, 'Notification backoffice', ''),
(28, 'Les notifications pour la page d''accueil du Backoffice', ''),
(29, 'Liste des fonctionalités de la class App', ''),
(30, 'App::getClass("article", $id); // retourne l''objet d''id $id\r\nApp::getClass("article"); // retourne l''objet vierge\r\nApp::getClass("article")->getTypages(); // retourne un tableau de tous les coulons et leurs typages\r\nApp::getClass("article")->hydrate($array); // hydrate un article avec $array le tableau de toutes les colonnes. Pour les langues il faut : \r\n…., "title" => array("fr" => "le titre", "en" => "the title"), ….\r\nPour les liens vers un objet, on met l''id, pour les liens OneToMany, on ne met rien.\r\nApp::getClass("article")->hydrate($array)->save(); //enregistre en BDD\r\nApp::getClass("article")->hydrate($array)->checkData(); regarde si l''hydrate est bon (renvoie tirs true pour le moment)\r\n\r\nApp::getClassArray("article", array( // sans second paramètre, ils sont tous retourné\r\n  "where" => $condition, // "nothave category" pour n''ayant aucune categories\r\n  "orderBy" => array($attribut, $way), // "orderBy" => $attribut // ASC par defaut\r\n  "limit" => array($start, $nb) // "limit" => $nb\r\n));\r\nJe travail actuellement pour mettre des "where", "and" et "or" de façon simple, pour ''instant vous êtes bloqué à une condition "where" :D', ''),
(31, 'Liste des fonctionalités de la class Kernel', ''),
(32, 'Kernel::get("app") // Nom de l''app\r\nKernel::get("controller") // Nom du controller\r\nKernel::get("action") // Nom de l''action\r\nKernel::get("session") // Retourne l''objet Session\r\n  Kernel::get("session")->connect($id, md5($mdp));\r\n  Kernel::get("session")->disconnect();\r\nKernel::get("lang") // Nom de la lang\r\nKernel::get("langs") // Tableau de toutes les langues dispo\r\nKernel::get("langdefault") // lang par default\r\nKernel::get("params") // Tableau des paramètres du site\r\nKernel::get("cache") // Retourne l''objet Cache du kernel\r\nKernel::get("user") // retourne l''utilisateur connecté. Pareil que Kernel::get("session")->getUser();', ''),
(34, 'Backend notification', 'Notification for the backend home'),
(36, 'Pages', 'Pages'),
(37, 'à propos', 'about'),
(38, 'nous contacter', 'contact us'),
(39, '<div class="title">Contact</div>', '<div class="title">Contact</div>'),
(40, 'tous les partenaires', 'all partners'),
(41, '<div class="title">Partenaires</div>', '<div class="title">Partners</div>'),
(42, 'Savoir gérer les sessions sur son site web !', 'How to manage sessions in your website !'),
(43, '<p><span>Sur un site, il peut parfois être nécessaire de transmettre des informations sur un utilisateur d’une page à une autre. Pour cela on utilise en PHP les variables session.</span></p>\r\n<p><span>Les informations contenues dans ces variables sont stockées dans des fichiers sur le serveur, contrairement aux cookies qui stockent les informations sur la machine de l’utilisateur, ce qui offre donc un plus haut niveau de sécurité.</span></p>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<h1><span style="font-family: ''Segoe UI light'', verdana; font-size: 20px; color: #335681;">1 )    Ouverture d’une session</span></h1>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<p><span>On créé une nouvelle session à l’aide de la fonction session_start(). Il suffit d’implémenter cette fonction au début de votre page, avant le code HTML, afin d’avoir accès aux variables de session.</span></p>\r\n<p> </p>\r\n\r\n<pre class="brush: php">\r\n<?php\r\n	session_start();\r\n?>\r\n</pre>\r\n\r\n<p><span>Si un fichier existe sur le serveur pour cette session, les variables seront récupérées, sinon le fichier sera créé.</span></p>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<h1><span style="font-family: ''Segoe UI light'', verdana; font-size: 22px; color: #335681;">2 )    Utilisation des variables de session</span></h1>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<p><span>Les variables sont accessibles via un tableau superglobal : $_SESSION.</span></p>\r\n\r\n<pre class="brush: php">\r\n<?php\r\n	session_start();\r\n	$_SESSION[‘pseudo’] = ‘Muusha’;\r\n	echo ‘L’utilisateur actuel est : ‘ . $_SESSION[‘pseudo’] ;\r\n?>\r\n</pre>\r\n\r\n<p><span>Une fois la session démarrée, nous pouvons commencer à créer nos variables. Dans ce cas, la variable créée est « pseudo » et elle contiendra la valeur que l’on souhaite.</span><br /><span>Les noms de ces variables ne sont pas définis, on peut donc donner n’importe quelle clé au tableau $_SESSION.</span></p>\r\n<p><span>Ensuite, pour accéder aux informations, il suffit de récupérer la valeur contenue dans le tableau $_SESSION en précisant la clé.</span></p>\r\n\r\n<p><span>Les sessions ont une durée limitée de 30 minutes par défaut. Il est donc plus prudent de vérifier si elle existe toujours. Pour cela il faut utiliser la fonction isset().</span></p>\r\n\r\n<pre class="brush: php">\r\n<?php\r\n	if(isset($_SESSION[‘pseudo’]))\r\n		echo ‘La variable existe.’ ;\r\n?>\r\n</pre>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<h1><span style="font-family: ''Segoe UI light'', verdana; font-size: 22px; color: #335681;">3 )    Détruire les variables et fermer une session.</span></h1>\r\n<p> </p>\r\n<p> </p>\r\n\r\n<p><span>Il existe 2 fonctions pour détruire les variables d’une session.</span></p>\r\n\r\n<pre class="brush: php">\r\n<?php\r\n	session_unset() ;\r\n	unset($_SESSION[‘pseudo’]) ;\r\n?>\r\n</pre>\r\n\r\n<p><span>Le premier code a pour but de supprimer toutes les variables de la session en cours alors que le second permet de supprimer uniquement la variable pseudo de notre session.</span></p>\r\n<p><span>Pour fermer une session, il faut utiliser la fonction session_destroy().</span></p>\r\n\r\n<pre class="brush: php">\r\n<?php\r\n	session_destroy() ;\r\n?>\r\n</pre>\r\n\r\n<p><span>A noter, les sessions sont détruites lors de la fermeture du navigateur.</span></p>', '<p>Soon</p>'),
(44, 'Après plusieurs mois de durs labeurs, l''équipe de Webtuts lance enfin son site web.\nVoué aux amateurs de développement web, Webtuts se veut être un site d’entraide et, bientôt, un site communautaire.\nActuellement en version beta, l''équipe vous avertit qu''il est encore possible que vous rencontriez des bugs, des anomalies ou autres choses paranormales du genre. De plus, beaucoup d''améliorations vont voir le jour très prochainement. En attendant, profitez de cette petite version pour explorer les tréfonds des méandres des abysses de Webtuts !\n\nPour tout retour, avis, suggestion, signalement, n''hésitez pas à user et abuser de notre page facebook !\nL''équipe s''efforcera de vous répondre ainsi que de régler les bugs signalés.\n\nL''équipe vous souhaite bon courage !', 'Soon...'),
(45, 'Les positionnements en CSS', 'Positioning in CSS'),
(46, '<style>.images-demo{margin:10px auto;display:block;}</style><p style="font-family: Ubuntu-C, arial;font-size: 14px;"> Un des aspects important mais assez délicat du travail de l’intégrateur est le positionnement des éléments. C’est pour cette raison que je vais tenter d’éclaircir ce point ici. Pour ce faire, je vais prendre l’exemple du header de Webtuts. Il faut distinguer trois propriétés CSS ici.</p>\n<p>&nbsp;</p>\n<ul><li>Display : [ block – none – inline – inline-block ]</li><li>Position : [ static – absolute – relative – fixed ]</li><li>Float : [ none – left – right ]</li></ul>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<h1 style="font-family: ''Segoe UI light'', verdana; font-size: 22px; color: #335681;">La propriété Display</h1>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;"> La première propriété ( display ) permet de donner à l’élément son rôle dans la page. Lui assigner « block » lui imposera de prendre par défaut toute la largeur de son conteneur. L’élément pourra aussi implémenter les propriétés « width » (largeur de l’élément si elle doit être autre que la largeur du conteneur), « height » (la hauteur de la div), margin (marge extérieur de l’élément) et padding (marge intérieur de l’élément). A savoir, tel quel, un élément de type « block » empêchera l’alignement horizontal.</p>\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;"> Lui assigner « none » « effacera » en quelque sorte votre élément. Il sera bien présent dans le DOM mais vous ne le verrez pas et les autres éléments agiront comme s’il n’existait pas.</p><p style="font-family: Ubuntu-C, arial;font-size: 14px;">Lui assigner « inline » permettra d’aligner plusieurs éléments sur la même ligne mais dans ce cas, il perdra toutes les propriétés propres aux éléments de type block énoncés plus haut (width, height, margin et padding).</p>\n<p>&nbsp;</p>\n\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">Quant au petit dernier, « inline-block » est un type hybride entre « inline » et « block » (Cap’tain obvious !), apparu au début du CSS3. Il permet de combiner le comportement de la valeur « inline » tout en acceptant les propriétés de « block ». Génial n’est-ce pas ? Mais il y a un hic… (Il y en a toujours un…). Comme toute propriété du CSS3, « inline-block » est mal interprété par certain navigateurs (pour ne citer personne…). </p>\n<p>&nbsp;</p>\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;"> Mais alors comment faire pour aligner des éléments de type block sans utiliser cette dernière valeur me direz-vous ? (Dites-le !)<br/> Eh bien j’y viens justement…</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<h1 style="font-family: ''Segoe UI light'', verdana; font-size: 22px; color: #335681;">La propriété Float</h1>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">La deuxième propriété (float) s’avère d’une grand aide lorsqu’il est question d’alignement de plusieurs éléments. Par défaut, la valeur est « none » et n’implique donc aucun comportement supplémentaire. Ainsi, lui assigné « left » mettra l’élément le plus à gauche du conteneur.</p>\n<p>Et « right »… (Devinez ?) Le placera le plus à droite !\nTrois choses importantes à savoir sur cette propriété… La première est que si un conteneur contient plusieurs éléments en float, ils seront adjacents dans leur ordre de déclaration du DOM. Ainsi : </p>\n<p>&nbsp;</p>\n\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: css">&lt;style&gt;\n	div {\n		float: left;\n		width: 150px;\n		height: 150px;\n	}\n	.green{\n		background: green;\n	}\n	.pink {\n		background: pink;\n	}\n	.blue {\n		background: blue;\n	}\n</pre>\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: xml">\n&lt;div class="green"&gt;&lt;/div&gt;\n&lt;div class="pink"&gt;&lt;/div&gt;\n&lt;div class="blue"&gt;&lt;/div&gt;\n</pre>\n\n<p>&nbsp;</p>\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;"> Ressemblera à ceci :\n<img src="/site/uploads/test1.PNG" alt="positionnement css illustration 1" class="images-demo" />\nTandis que remplacer « left » à la propriété « float » par « right » donnera ceci\n<img src="/site/uploads/test3.png" alt="positionnement css illustration 2" class="images-demo"/>\n</p><p style="font-family: Ubuntu-C, arial;font-size: 14px;">Ensuite, il faut savoir qu’un élément en « float » ne pourra pas recevoir la propriété « margin :auto » (si vous ne savez pas ce que c’est laissez ça pour plus tard). La dernière chose à savoir est qu’un conteneur ne prendra pas en compte la hauteur de ses éléments fils étant en « float ». Ceci est assez gênant mais il y a une solution vous vous en doutez bien… Il suffit de mettre juste après la fin de vos éléments en « float » :</p>\n<p>&nbsp;</p>\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: xml">&lt;div style="clear:both"&gt;&lt;/div&gt;</pre>\n<p>&nbsp;</p>\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">Cette propriété est bien pratique pour insérer des images au milieu d’un texte ou même pour le responsiv design, mais ça c’est pour plus tard !</p>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<h1 style="font-family: ''Segoe UI light'', verdana; font-size: 22px; color: #335681;">La propriété Position</h1>\n<p>&nbsp;</p>\n<p>&nbsp;</p>\n\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">Ce qui nous amène à notre dernière propriété… « Position » !\nCette propriété prend par défaut la valeur « static ».</p>\n<p>Lui assigner « absolute » retire votre élément du flux du DOM. Pratique lorsque vous souhaitez faire chevaucher des éléments par exemple. Dans le cas d’un positionnement en « absolute », votre élément se mettra par défaut dans le coin supérieur gauche de votre premier parent étant en « position » « relative » soit, par défaut, la balise « body », et il se positionnera via les propriétés « top » et « left » ou « right ».</p>\n<p>&nbsp;</p>\n<p>Et position « relative » c’est quoi exactement ?</p>\n<p>Eh bien en position relative, un élément a cette spécificité de pouvoir être décalé verticalement et/ou horizontalement via les propriétés « top », « left » ou « right », contrairement aux flux normal du DOM. De plus, il sert de référence aux fils étant en position « absolute ».</p>\n<p>&nbsp;</p>\n\n<p>Enfin, donner la valeur « fixed » donnera le même comportement à votre élément que la valeur « absolute » à la différence prêt qu’il sera insensible au « scroll » de la page.</p>\n<p>Je pense qu’un petit exemple est de mise pour illustrer cette propriété.</p>\n<p>&nbsp;</p>\n<p>Par exemple pour faire ceci :\n<img src="/site/uploads/test2.png" alt="positionnement css illustration 3" class="images-demo"/>\nOn a un conteneur en position relative qui contient trois blocks en position absolute et on positionne ces trois blocks en paramétrant leur « top » et leur « left ». Voici le code :</p>\n<p>&nbsp;</p>\n\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: css">\n		div.container{\n			position: relative;\n			width: 600px;\n			height: 600px;\n			background: yellow;\n		}\n		div.container &gt; div{\n			position: absolute;\n			width: 200px;\n			height: 200px;\n		}\n		div.container &gt; div.premier{\n			top: 50px;\n			left: 50px;\n			background: purple;\n		}\n		div.container &gt; div.deuxieme{\n			top: 200px;\n			left: 200px;\n			background: pink;\n		}\n		div.container &gt; div.troisieme{\n			top: 350px;\n			left: 350px;\n			background: blue;\n		}\n</pre>\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: xml">\n	&lt;div class="container"&gt;\n		&lt;div class="premier"&gt;&lt;/div&gt;\n				\n		&lt;div class="deuxieme"&gt;&lt;/div&gt;\n				\n		&lt;div class="troisieme"&gt;&lt;/div&gt;\n	&lt;/div&gt;\n</pre>\n\n<p>&nbsp;</p>\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">Voilà vous savez tout. Alors… Comment auriez-vous fait le header de Webtuts maintenant que vous savez tout cela ?\nAllez essayez avant de jeter un œil au code…\nVoilà le HTML que l’on peut découper en deux parties.</p>\n\n<pre style="font-family: ''courier new''; font-size: 12px;" class="brush: xml">\n	&lt;!-- Header --&gt;\n	&lt;header&gt;\n		&lt;div id="top-header"&gt;\n			&lt;div id="oiseau-anime"&gt;\n				&lt;img src="oeuil-oiseau.png" alt="oeil de l''oiseau" class="bird-eye" id="left-eye"/&gt;\n				&lt;img src="oeuil-oiseau.png" alt="oeil de l''oiseau" class="bird-eye" id="right-eye"/&gt;\n			&lt;/div&gt;\n			&lt;div id="login-box"&gt;\n				&lt;a href="#"&gt;Connexion&lt;/a&gt;\n				&lt;span&gt;&nbsp;/&nbsp;&lt;/span&gt;\n				&lt;a href="#"&gt;Inscription&lt;/a&gt;\n			&lt;/div&gt;\n			&lt;div class="right search-flag-container"&gt;\n				&lt;div id="flag-box"&gt;\n					&lt;a href="#"&gt;\n						&lt;img src="flag_fr.png" alt="Traduire le site en français" /&gt;\n						&lt;span class="flag-caption"&gt;FR&lt;/span&gt;\n					&lt;/a&gt;\n					&lt;a href="#"&gt;\n						&lt;img src="flag_en.png" alt="Traduire le site en anglais" /&gt;\n						&lt;span class="flag-caption"&gt;EN&lt;/span&gt;\n					&lt;/a&gt;\n				&lt;/div&gt;\n				&lt;div id="search-box"&gt;\n					&lt;span&gt;Recherche rapide :&lt;/span&gt;\n					&lt;input type="text" value="" class="input-template" placeholder="Rechercher" /&gt;\n					&lt;input type="submit" value="" class="button-search" /&gt;\n				&lt;/div&gt;\n			&lt;/div&gt;\n			&lt;div class="cl"&gt;&lt;/div&gt;\n		&lt;/div&gt;\n		&lt;!-- Navigation --&gt;\n		&lt;nav&gt;\n			&lt;ul id="left-nav"&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Accueil&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Catégories&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Articles&lt;/a&gt;&lt;/li&gt;\n			&lt;/ul&gt;\n			&lt;div id="logo"&gt;\n				&lt;a href="#"&gt;\n					&lt;img src="logo.png" alt="logo de webtuts, retour accueil" /&gt;\n				&lt;/a&gt;\n			&lt;/div&gt;\n			&lt;ul id="right-nav"&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Actus&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Rechercher&lt;/a&gt;&lt;/li&gt;\n				&lt;li&gt;&lt;a href="#"&gt;Contact&lt;/a&gt;&lt;/li&gt;			\n			&lt;/ul&gt;\n		&lt;/nav&gt;\n	&lt;/header&gt;\n</pre>\n\n\n<p style="font-family: Ubuntu-C, arial;font-size: 14px;">Et enfin voici une partie du CSS pour la mise en forme de la structure du header :</p><pre style="font-family: ''courier new''; font-size: 12px;" class="brush: css">\n/** HEADER **/\nheader, nav{\n	width: 1024px;\n	margin: auto;\n}\nheader #top-header{\n	width: 100%;\n	height: 113px;\n	position: relative;\n	border-bottom: 1px solid #666;\n}\nheader #top-header #login-box{\n	float: left;\n	margin: 10px 0 0 20px;\n}\n\nheader #top-header .search-flag-container{\n	text-align: right;\n	margin: 10px 20px 0 0;\n}\nheader #top-header .search-flag-container #flag-box{\n	margin-bottom: 15px;\n}\nheader #top-header .search-flag-container #flag-box img{\n	width: 18px;\n	height: 14px;\n	margin-left: 10px;\n	vertical-align: middle;\n}\nheader #top-header #search-box{\n	position: relative;\n}\nheader #top-header #search-box .input-template{\n	width: 150px;\n	height: 24px;\n	background-color: #ddd;\n	border: none;\n}\nheader #top-header #search-box .button-search{\n	border: none;\n	width: 19px;\n	height: 18px;\n	position: absolute;\n	right: 5px;\n	top: 3px;\n}\n/** NAV **/\nnav{\n	height: 51px;\n	position: relative;\n	border-bottom: 1px solid #666;\n}\nnav ul{\n	position: absolute;\n	top: 0;\n	height: 100%;\n}\nnav ul#left-nav{\n	left: 50px;\n}\nnav ul#right-nav{\n	right: 50px;\n}\nnav #logo{\n	margin: auto;\n	width: 195px;\n	height: 95px;\n	position: relative;\n}\nnav #logo img{\n	position: absolute;\n	top: 0;\n	left: 30px;\n}\nnav ul &gt; li {\n	float: left;\n	display: block;\n	width: 120px;\n	height: 36px;\n	text-align: center;\n}\nnav ul &gt; li a{\n	color: #555;\n}\n#oiseau-anime {\n	background: #000;\n	width: 73px;\n	height: 84px;\n	position: absolute;\n	bottom: -1px;\n	left: 0;\n	z-index: 999;\n}</pre>\n', 'Soon...'),
(47, 'integration', 'integration'),
(48, 'animation', 'animation'),
(49, 'logiciels', 'software'),
(50, 'developpement-fonctionnel', 'functional-development'),
(51, 'referencement', 'seo'),
(52, 'autres', 'others'),
(53, 'webtuts-se-lance-sur-le-web', 'webtuts-on-the-web'),
(54, 'savoir-gerer-les-sessions-sur-son-site-web', 'how-to-manage-sessions-in-your-website'),
(55, 'les-positionnements-en-css', 'positioning-in-css');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `author` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"user"}',
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `comments` int(11) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"comment","code":2,"editable":false}',
  `slug` text NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `deleted`, `author`, `date`, `title`, `text`, `image`, `comments`, `slug`) VALUES
(1, 0, 2, '2013-07-12 00:00:00', 25, 44, 8, 0, '53');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"big"}',
  `date` datetime NOT NULL,
  `slug` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","editable":false}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"small"}',
  `text` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"big"}',
  `tutorials` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"tutorial", "code":3, "editable":false}',
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `title`, `text`, `tutorials`, `deleted`) VALUES
(1, 17, 18, 0, 0),
(2, 19, 20, 0, 0),
(3, 21, 22, 0, 0),
(4, 23, 24, 0, 0),
(5, 9, 10, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"big"}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `comments` int(10) DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"comment","code":2,"editable":false}',
  `slug` varchar(255) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"small"}',
  `category` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToOne", "reference":"category"}',
  `author` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToOne", "reference":"user"}',
  `tags` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany","reference":"tag","code":4}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tutorial`
--

INSERT INTO `tutorial` (`id`, `deleted`, `date`, `title`, `text`, `image`, `comments`, `slug`, `category`, `author`, `tags`) VALUES
(1, 0, '2013-05-13 23:05:05', 42, 43, 10, NULL, '54', 6, 2, 0),
(2, 0, '2013-07-12 00:00:00', 45, 46, 9, NULL, '55', 1, 2, 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `banned` tinyint(4) NOT NULL,
  `pseudo` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mail` text NOT NULL,
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `date` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `site` text NOT NULL,
  `language` text NOT NULL,
  `access` int(11) DEFAULT NULL COMMENT '{"link":"OneToMany", "reference":"access","code":5}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `date`, `civility`, `password`, `country`, `city`, `site`, `language`, `access`) VALUES
(1, 0, 0, 'fozeek', 'Deneuve', 'Quentin', 'dark.quent@free.fr', 0, '2013-02-17 09:31:39', 'homme', 'e1d75b9a8b4d045d96180b6ec6f5e686', 'France', 'Paris', 'http://fozeek.com', 'html,css,php', 0),
(2, 0, 0, 'fitzlucassen', 'Thibault', 'Dulon', 'thibault.dulon@gmail.com', 1, '2013-07-11 21:29:39', 'homme', 'ce0608b1cb5f1b15c59f9344f53729fd', 'France', 'Paris', 'http://fitz.hebergratuit.com/portfolio', 'asp,html,javascript,css,csharp,jquery,php', 0),
(3, 0, 0, 'muusha', 'Jonathan', 'Bicheux', 'jonathan.bicheux@gmail.com', 0, '2013-07-15 21:02:11', 'homme', 'b4b8daf4b8ea9d39568719e1e320076f', 'France', 'Paris', '', 'php,html,css,javascript', 0),
(4, 0, 0, 'richard', 'Richard', 'Ettou', 'richard.ettou@gmail.com', 0, '2013-07-15 21:03:49', 'homme', 'b4b8daf4b8ea9d39568719e1e320076f', 'France', 'Paris', '', 'php,html,css', 0);

-- --------------------------------------------------------

--
-- Structure de la table `_links`
--

CREATE TABLE IF NOT EXISTS `_links` (
  `link_code` int(11) NOT NULL,
  `link_root` int(11) NOT NULL,
  `link_link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_links`
--

INSERT INTO `_links` (`link_code`, `link_root`, `link_link`) VALUES
(1, 1, 2),
(1, 1, 1),
(2, 1, 1),
(2, 2, 2),
(5, 1, 1),
(5, 1, 2),
(5, 2, 1),
(5, 2, 2),
(4, 7, 1),
(4, 3, 2),
(4, 2, 1),
(4, 2, 2),
(4, 1, 5),
(9, 1, 2),
(9, 6, 1),
(3, 1, 2),
(3, 2, 2),
(3, 5, 1),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `_params`
--

CREATE TABLE IF NOT EXISTS `_params` (
  `link_number` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_params`
--

INSERT INTO `_params` (`link_number`, `title`, `description`) VALUES
(20, 'Webtuts CMS', 'Ceci est votre nouveau site');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
