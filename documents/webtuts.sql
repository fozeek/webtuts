-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 27 Mai 2013 à 14:02
-- Version du serveur: 5.5.25
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `webtutsv2`
--

-- --------------------------------------------------------

--
-- Structure de la table `access`
--

CREATE TABLE `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `code` text NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `access`
--

INSERT INTO `access` (`id`, `deleted`, `code`, `description`) VALUES
(1, 0, 'ACCESS_BO', 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `date`, `author`, `text`) VALUES
(1, '2013-05-23 09:29:17', 1, 'Ceci est un com'' de fou !'),
(2, '2013-05-16 00:00:00', 1, 'Cooment Twou');

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `node` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `content`
--

INSERT INTO `content` (`id`, `deleted`, `node`) VALUES
(1, 1, 2),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `fucked`
--

CREATE TABLE `fucked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `textother` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fucked`
--

INSERT INTO `fucked` (`id`, `text`, `textother`) VALUES
(1, 'lol', 'loll'),
(2, 'efesf', 'esfesf');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `date`, `nom`, `type`) VALUES
(1, '2013-05-26 00:00:00', 'fitz-lucassen', 'png');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `titre` text NOT NULL,
  `text` text NOT NULL,
  `image` int(11) NOT NULL,
  `comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `date`, `titre`, `text`, `image`, `comments`) VALUES
(1, '2013-05-08 05:07:15', 'Une news', 'zdizqlhdlzqid qzih dqli dlqdhqlidhlq dlq dhlq dilz ql dqz', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `node`
--

CREATE TABLE `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `contents` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `node`
--

INSERT INTO `node` (`id`, `deleted`, `name`, `description`, `contents`) VALUES
(1, 0, 2, 3, NULL),
(2, 0, 4, 5, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `taxonomy`
--

CREATE TABLE `taxonomy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `taxonomy`
--

INSERT INTO `taxonomy` (`id`, `deleted`, `name`, `description`) VALUES
(1, 0, 6, 7),
(2, 0, 8, 9);

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `titre` text NOT NULL,
  `text` text NOT NULL,
  `image` int(11) NOT NULL,
  `comments` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `tutorial`
--

INSERT INTO `tutorial` (`id`, `date`, `titre`, `text`, `image`, `comments`) VALUES
(1, '2013-05-08 00:00:00', 'Un titre super', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.', 1, NULL),
(2, '2013-05-29 12:17:00', 'Un autre super titre', 'YZDQOZDU Dqz odjqzdp zqdip hzpd iqzidqz d qzpdh pzq doziqqd ozdod qizd qzd ', 0, NULL),
(3, '2013-05-16 00:00:00', 'Faire le buzz', 'blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla blabla bla ', 1, NULL),
(4, '2013-05-31 04:26:38', 'Comment se faire des biatchs !', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices aliquam eros ut interdum. Nunc porttitor, tellus at tempor tincidunt, dui ante porttitor lacus, ut adipiscing tortor felis et tellus. Sed sit amet enim ut lectus dignissim lacinia sed at enim. Aliquam venenatis risus non purus placerat in egestas diam fermentum. Aliquam eros augue, porttitor at bibendum vitae, rutrum sed justo. Donec bibendum hendrerit sem quis ultrices. Nullam ac arcu quis sapien lacinia vehicula sit amet et neque. Cras auctor tortor nec augue tempus vitae hendrerit enim ornare. Cras consequat pretium elit et eleifend. In hac habitasse platea dictumst. Duis lobortis metus non turpis facilisis sodales. Integer tincidunt interdum arcu at ornare. Nam convallis, risus vitae congue scelerisque, erat elit tempus nunc, id feugiat nunc mi vel risus. Nulla quis imperdiet sapien.\r\n\r\nAliquam bibendum posuere pharetra. Curabitur laoreet, quam vel tempus mollis, massa arcu fringilla mauris, in luctus neque nunc sit amet urna. Donec odio ligula, vehicula sit amet adipiscing sed, dignissim id neque. Nunc lobortis facilisis adipiscing. Curabitur pharetra turpis vel elit egestas consequat. Nulla facilisi. Etiam condimentum consequat nunc, id dignissim sapien porttitor ac. Phasellus a condimentum mi. Phasellus elementum pretium nunc a tempus. Mauris consectetur molestie elit ac dictum. Ut eget justo leo. Mauris vestibulum erat sodales erat mollis pharetra. Duis hendrerit tempor elit, id luctus elit vulputate vel. Phasellus odio lectus, feugiat vitae pulvinar id, suscipit eget velit. Quisque lectus enim, hendrerit congue hendrerit a, consectetur sed nibh.\r\n\r\nDonec eget urna mauris. Integer mauris tellus, bibendum sagittis posuere eget, dictum et magna. Praesent tincidunt justo augue. Suspendisse convallis lacus eu mi fringilla sed interdum tortor tincidunt. Aenean lectus enim, hendrerit sit amet ultrices at, mollis ac metus. Nunc vitae ullamcorper ipsum. Proin eget magna a erat fermentum vehicula eu sed dolor. Etiam pellentesque dignissim ornare. In hac habitasse platea dictumst. Ut sed arcu et odio varius viverra id in tortor. Quisque hendrerit malesuada ipsum fermentum lobortis.\r\n\r\nCurabitur quam est, varius porta suscipit non, euismod id nisl. Nulla facilisi. Cras facilisis vulputate nunc, id commodo lectus scelerisque nec. Vivamus auctor est quis arcu malesuada auctor. Aliquam tincidunt turpis adipiscing lectus facilisis egestas. Quisque tempor bibendum consectetur. Phasellus viverra purus nisl, sed vulputate felis. Donec fringilla magna et mi tincidunt ac ultrices sapien vulputate. Aenean dignissim blandit mauris, id mollis nisl ornare eu. Morbi cursus, purus euismod bibendum semper, sem purus condimentum magna, non lobortis nibh leo facilisis felis. Suspendisse ligula magna, faucibus eu lacinia vel, iaculis sodales dui. Aliquam eget pharetra augue. Quisque urna ante, scelerisque in semper ut, egestas eget dui.\r\n\r\nEtiam molestie rutrum sem vitae luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus quis nisl risus, a consequat felis. Nullam nisl arcu, vehicula eu tincidunt quis, dictum vitae purus. Cras et libero orci, facilisis ultricies neque. Nulla ipsum mi, pellentesque et consequat ac, commodo eu sapien. Donec pellentesque auctor hendrerit. Fusce aliquam dictum sem, nec fringilla libero tincidunt a. In urna nisi, blandit eget mollis sed, feugiat at lectus. Sed lacus lacus, bibendum eu ultricies vitae, euismod ut mauris. Praesent blandit urna quis felis dapibus a commodo orci vulputate. Proin eu enim non diam venenatis egestas eu ut justo.', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `urlrewriting`
--

CREATE TABLE `urlrewriting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` text NOT NULL,
  `app` text NOT NULL,
  `controller` text NOT NULL,
  `action` text NOT NULL,
  `matchurl` text NOT NULL,
  `routeorder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` tinyint(4) NOT NULL,
  `banned` tinyint(4) NOT NULL,
  `pseudo` text NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `mail` text NOT NULL,
  `image` int(11) NOT NULL,
  `datesignin` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `site` text NOT NULL,
  `language` text NOT NULL,
  `access` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `datesignin`, `civility`, `password`, `country`, `city`, `site`, `language`, `access`) VALUES
(1, 0, 0, 'fozeek', 'Deneuve', 'Quentin', 'dark.quent@free.fr', 2, '2013-02-17 09:31:39', 'mal', 'e1d75b9a8b4d045d96180b6ec6f5e686', 'France', 'Paris', 'fozeek.com', 'fr', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_access`
--

CREATE TABLE `user_access` (
  `code_link` int(11) NOT NULL,
  `root` int(11) NOT NULL,
  `linked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_access`
--

INSERT INTO `user_access` (`code_link`, `root`, `linked`) VALUES
(29, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_content`
--

CREATE TABLE `user_content` (
  `code` int(11) NOT NULL,
  `id_reference` int(11) NOT NULL,
  `id_caller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user_content`
--

INSERT INTO `user_content` (`code`, `id_reference`, `id_caller`) VALUES
(1, 1, 1),
(1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `_cms_node_attribut`
--

CREATE TABLE `_cms_node_attribut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_node` int(11) NOT NULL,
  `attribut` text NOT NULL,
  `link` text,
  `reference` text,
  `code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `_cms_node_attribut`
--

INSERT INTO `_cms_node_attribut` (`id`, `id_node`, `attribut`, `link`, `reference`, `code`) VALUES
(1, 1, 'author', 'ManyToOne', 'user', NULL),
(2, 1, 'text', NULL, NULL, NULL),
(3, 1, 'date', NULL, NULL, NULL),
(4, 1, 'category', NULL, NULL, NULL),
(5, 1, 'tags', NULL, NULL, NULL),
(6, 1, 'comments', NULL, NULL, NULL),
(7, 1, 'image', NULL, NULL, NULL),
(8, 1, 'title', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `_cms_node_attribut_content_value`
--

CREATE TABLE `_cms_node_attribut_content_value` (
  `id_node` int(11) NOT NULL,
  `id_attribut` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_cms_node_attribut_content_value`
--

INSERT INTO `_cms_node_attribut_content_value` (`id_node`, `id_attribut`, `id_content`, `value`) VALUES
(1, 1, 1, '1'),
(1, 2, 1, 'Valeur 2');

-- --------------------------------------------------------

--
-- Structure de la table `_links`
--

CREATE TABLE `_links` (
  `code` int(11) NOT NULL,
  `root` int(11) NOT NULL,
  `link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_links`
--

INSERT INTO `_links` (`code`, `root`, `link`) VALUES
(1, 1, 2),
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `_orm_column_type`
--

CREATE TABLE `_orm_column_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_table` text NOT NULL,
  `name_column` text NOT NULL,
  `type` text NOT NULL,
  `class` text NOT NULL,
  `null` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `_orm_column_type`
--

INSERT INTO `_orm_column_type` (`id`, `name_table`, `name_column`, `type`, `class`, `null`) VALUES
(1, 'content', 'deleted', 'type', 'boolean', 0),
(2, 'content', 'node', 'class', 'node', 0),
(3, 'access', 'deleted', 'type', 'boolean', 0),
(4, 'access', 'code', 'type', 'text', 0),
(5, 'access', 'description', 'type', 'lang', 0),
(6, 'taxonomy', 'deleted', 'type', 'boolean', 0),
(7, 'taxonomy', 'name', 'type', 'lang', 0),
(8, 'taxonomy', 'description', 'type', 'lang', 0),
(9, 'urlrewriting', 'lang', 'type', 'text', 0),
(10, 'urlrewriting', 'app', 'type', 'text', 0),
(11, 'urlrewriting', 'controller', 'type', 'text', 0),
(12, 'urlrewriting', 'action', 'type', 'text', 0),
(13, 'urlrewriting', 'matchurl', 'type', 'text', 0),
(14, 'urlrewriting', 'routeorder', 'type', 'integer', 0),
(15, 'user', 'deleted', 'type', 'boolean', 0),
(16, 'user', 'banned', 'type', 'boolean', 0),
(17, 'user', 'pseudo', 'type', 'text', 0),
(18, 'user', 'name', 'type', 'text', 0),
(19, 'user', 'surname', 'type', 'text', 0),
(20, 'user', 'mail', 'type', 'text', 0),
(21, 'user', 'image', 'class', 'content', 0),
(22, 'user', 'datesignin', 'type', 'date', 0),
(23, 'user', 'civility', 'type', 'text', 0),
(24, 'user', 'password', 'type', 'text', 0),
(25, 'user', 'country', 'type', 'text', 0),
(26, 'user', 'city', 'type', 'text', 0),
(27, 'user', 'site', 'type', 'text', 0),
(28, 'user', 'language', 'type', 'text', 0),
(29, 'user', 'access', 'collection', 'access', 1),
(30, 'content', 'author', 'class', 'user', 0),
(31, 'content', 'text', 'type', 'lang', 0),
(32, 'content', 'date', 'type', 'date', 0),
(33, 'content', 'category', 'class', 'category', 0),
(34, 'content', 'tags', 'collection', 'taxonomy', 0),
(35, 'content', 'comments', 'collection', 'content', 0),
(36, 'content', 'image', 'class', 'content', 0),
(37, 'content', 'title', 'type', 'lang', 0);

-- --------------------------------------------------------

--
-- Structure de la table `_orm_lang`
--

CREATE TABLE `_orm_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL,
  `lang` text NOT NULL,
  `translation` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `_orm_lang`
--

INSERT INTO `_orm_lang` (`id`, `id_lang`, `lang`, `translation`) VALUES
(1, 1, 'fr', 'Accès au backoffice'),
(2, 1, 'en', 'Acces to the backend'),
(3, 2, 'fr', 'Tutoriaux'),
(4, 2, 'en', 'Tuts'),
(5, 3, 'fr', 'Tous les tutoriaux'),
(6, 3, 'en', 'All tuts'),
(7, 4, 'fr', 'Pages'),
(8, 4, 'en', 'Pages'),
(9, 5, 'fr', 'Toutes les pages'),
(10, 5, 'en', 'All pages'),
(11, 6, 'fr', 'PHP'),
(12, 6, 'en', 'PHP'),
(13, 7, 'fr', 'Tout sur PHP'),
(14, 7, 'en', 'All about PHP'),
(15, 8, 'fr', 'HTML'),
(16, 8, 'en', 'HTML'),
(17, 9, 'fr', 'Tout sur HTML'),
(18, 9, 'en', 'All about HTML');
