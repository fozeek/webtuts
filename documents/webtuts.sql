-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 09 Juillet 2013 à 14:51
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
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `text` text COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `image` int(10) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"image"}',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `articles` int(10) DEFAULT NULL COMMENT '{"link" : "OneToMany", "reference":"tutorial"}',
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `title`, `text`, `image`, `deleted`, `articles`, `slug`) VALUES
(1, '1', '2', 0, 0, 0, '');

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
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `nom` text NOT NULL,
  `type` text NOT NULL,
  `width` int(4) NOT NULL DEFAULT '80',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `date`, `nom`, `type`, `width`) VALUES
(1, '2013-05-26 00:00:00', 'fitz-lucassen', 'png', 80);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fr` text NOT NULL,
  `en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `fr`, `en`) VALUES
(1, 'Titre français', 'English title '),
(2, 'Contenu français', 'English Content');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `author` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"user"}',
  `date` datetime NOT NULL,
  `title` text NOT NULL,
  `text` text NOT NULL,
  `image` int(11) NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"comment","code":2}',
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `deleted`, `author`, `date`, `title`, `text`, `image`, `comments`, `slug`) VALUES
(1, 0, 1, '2013-05-08 05:07:15', '\n    \n    Une news fraiche !', '\n      \n      zdizqlhdlzqid qzih dqli dlqdhqlidhlq dlq dhlq dilz ql dqz CONTENNNNNNT !!!<div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div><br></div><div>FRAIS !</div>', 1, 0, ''),
(2, 0, 1, '2013-05-15 11:28:29', 'zqdqzdqzdqzd l', 'qzdqzdqzdqzqzdqzdqzdqzqzdqzdqzdqz qzdqzdqzdqzqzdqzdqzdqzqzdqzdqzdqz', 1, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text,
  `articles` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"article", "code":3}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

CREATE TABLE `tutorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `comments` int(10) DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"comment","code":2}',
  `slug` varchar(255) NOT NULL,
  `category` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToOne", "reference":"category"}',
  `author` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToOne", "reference":"user"}',
  `tags` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany","reference":"tag","code":4}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tutorial`
--

INSERT INTO `tutorial` (`id`, `deleted`, `date`, `title`, `text`, `image`, `comments`, `slug`, `category`, `author`, `tags`) VALUES
(1, 0, '2013-05-08 00:00:00', '\n   \n    \n    \n    \n    \n    Un titre super            ', '\n      \n      \n      <div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.</div></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.</div></div><div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.<br></div><div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati porro ducimus ab neque dolorem iure illum molestias deserunt consectetur cupiditate alias doloribus ipsam ea placeat dignissimos corporis perferendis quo! Rerum.</div></div>                   ', 1, NULL, '', 1, 1, 0),
(2, 1, '2013-05-29 12:17:00', 'Un tuto supprimé, et sur deux lignes !', '\n     \n      \n      \n      YZDQOZDU Dqz odjqzdp zqdip hzpd iqzidqz d qzpdh pzq doziqqd ozdod qizd qzd :D f', 0, NULL, '', 1, 1, 0),
(3, 0, '2013-05-16 00:00:00', '\n   Faire le buzz MaJ', 'lorem', 1, NULL, '', 1, 1, 0),
(4, 1, '2013-05-31 04:26:38', 'Apple  for ∞ !', '<font color="#333333" face="Lucida Grande, Lucida Sans Unicode, Helvetica, Arial, Verdana, sans-serif"><span style="font-size: 12px; line-height: 18px;">Text !</span></font><br>', 1, NULL, '', 1, 1, 0),
(5, 1, '2013-05-15 04:22:40', 'Un titre', 'Un text', 1, NULL, '', 1, 1, 0),
(6, 0, '2013-05-15 17:20:12', 'UN autre tilte', 'LOLILOL', 1, NULL, '', 1, 1, 0);

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
