-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 15 Juillet 2013 à 19:26
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

CREATE TABLE `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` int(255) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `text` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `image` int(10) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"image"}',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `tutorials` int(10) DEFAULT NULL COMMENT '{"link" : "OneToMany", "reference":"tutorial", "editable":false}',
  `slug` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `title`, `text`, `image`, `deleted`, `tutorials`, `slug`) VALUES
(1, 1, 2, 0, 0, 0, 58),
(2, 25, 26, 1, 0, NULL, 27),
(3, 55, 56, 0, 0, NULL, 57);

-- --------------------------------------------------------

--
-- Structure de la table `chedar`
--

CREATE TABLE `chedar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "big"}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `comments` int(11) NOT NULL COMMENT '{"link" : "OneToMany", "reference":"comment","size" : "small","editable" : "false","code" : "15"}',
  `essaistext` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  `tags` int(11) NOT NULL COMMENT '{"link" : "OneToMany", "reference":"tag","size" : "small","code" : "16"}',
  `something` text NOT NULL COMMENT '{"size" : "big"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `chedar`
--

INSERT INTO `chedar` (`id`, `deleted`, `date`, `title`, `text`, `image`, `comments`, `essaistext`, `tags`, `something`) VALUES
(1, 0, '2013-07-14 22:26:22', 63, 64, 0, 0, 65, 0, 'LOOOL'),
(2, 0, '2013-07-14 22:58:21', 66, 67, 0, 0, 68, 0, 'SPARTA'),
(3, 1, '2013-07-15 16:06:51', 69, 70, 0, 0, 71, 0, 'If you wanted to see my pussy');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `author` int(11) NOT NULL COMMENT '{"link":"OneToOne", "reference":"user"}',
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `deleted`, `date`, `author`, `text`) VALUES
(1, 1, '2013-05-23 09:29:17', 1, 'Ceci est un com'' de fou !'),
(2, 0, '2013-05-16 00:00:00', 1, 'Cooment Twou');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `date`, `nom`, `type`, `width`) VALUES
(1, '2013-05-26 00:00:00', 'fitz-lucassen', 'png', 80),
(2, '2013-07-02 00:00:00', 'lolilol', 'png', 80);

-- --------------------------------------------------------

--
-- Structure de la table `lang`
--

CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fr` text NOT NULL,
  `en` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `fr`, `en`) VALUES
(1, 'Titre français TEST:D F', 'English title '),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur asperiores sit enim consectetur molestias explicabo ullam officiis nobis optio totam aperiam non quas assumenda consequatur dolorem neque molestiae. Natus nihil.', 'English Content'),
(3, 'Titre Article Français', 'English Article Title'),
(4, 'Contenu Article Français', 'English Article Content'),
(5, 'Titre Article Français', 'English Article Title'),
(6, 'Contenu Article Français', 'English Article Content'),
(7, 'Titre Article Français UP', 'English Article Title UP'),
(8, 'Contenu Article Français TE', 'English Article Content TE'),
(9, 'Titre Article Français', 'English Article Title'),
(10, 'Contenu Article Français', 'English Article Content'),
(11, 'Titre Article Français', 'English Article Title'),
(12, 'Contenu Article Français', 'English Article Content'),
(13, 'Titre Article Français', 'English Article Title'),
(14, 'Contenu Article Français', 'English Article Content'),
(15, 'Titre Article Français', 'English Article Title'),
(16, 'Contenu Article Français', 'English Article Content'),
(17, 'Titre Article Français YEAH !!!', 'English Article Title'),
(18, 'Contenu Article Français', 'English Article Content'),
(19, 'azd', 'qzd'),
(20, 'qzd', 'qzd'),
(21, 'titre-article-français-updd', 'english-article-title-up'),
(22, 'qzd', 'qzd'),
(23, 'qzdzqd', 'qzdqzd'),
(24, 'qzdqzdq', 'zdqzdqz'),
(25, 'Titre cat 2 LOL', 'Cat tilte two'),
(26, 'desc', 'desc'),
(27, 'titre-cat-2-lol', 'cat-tilte-two'),
(28, 'aS', 'QZDQZD'),
(29, 'titre-article-français-yeah', 'english-article-title'),
(30, 'NEW TITRE ! TESTOUfff :D LOL BESTAH <3', 'qzdqzd POUET :D'),
(31, 'qzdqzd', 'qzdzqd'),
(32, 'new-titre--testoufff-d-lol-bestah-<3', 'qzdqzd-pouet-d'),
(33, 'qzdqzd', 'qzdqzd'),
(34, 'qzdqzd', 'qzdzqd'),
(35, 'qzdqzd', 'qzdqzd'),
(36, 'qzdqzdLOLqzd :D', 'qzdzqd :D'),
(37, 'qzdqzdLOL', 'qzdqzd'),
(38, 'qzdqzdlolqzd-d', 'qzdzqd-d'),
(39, 'DATA 1 FUCKED UP DOWN ZUP', 'DATA 2'),
(40, 'DATA 3', 'DATA 4'),
(41, 'data-1-fucked-up-down-zup', 'data-2'),
(42, 'UNE NEWs', 'A NEWs'),
(43, 'qzdqzdzqd', 'qzdqzdqzd'),
(44, 'une-news', 'a-news'),
(45, 'NEWSLOL', 'DDSO'),
(46, 'ODODODs L', 'DODODOD'),
(47, 'newslol', 'ddso'),
(48, 'THIS IS SPARTA !!!!!MMMM', 'zdq'),
(49, 'qzdqzd', 'qzdqzdd'),
(50, 'this-is-sparta', 'zdq'),
(51, 'Un tag', 'One tag'),
(52, 'Desc', 'Desc'),
(53, 'AUTRE tag MAJ', 'ANOTHER tag'),
(54, 'DE', 'cddd'),
(55, 'Newcat LOL', 'Newcat'),
(56, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem atque perferendis voluptate nam dolores incidunt illum dignissimos praesentium rerum aut est numquam autem quo aliquid animi voluptatem libero deleniti soluta.', 'Newcat'),
(57, 'newcat-lol', 'newcat'),
(58, 'titre-français-test-d-f', 'english-title'),
(59, 'Test', 'Test'),
(60, 'Test', 'Test'),
(61, 'qzqdqzd c''est cool ;D', 'zdqdqzd'),
(62, 'dqzzdqzd', 'dqzqzzq'),
(63, 'C''est cool', 'C''est cool'),
(64, 'C''est cool', 'C''est cool'),
(65, 'C''est cool', 'C''est cool'),
(66, 'SPARTA', 'SPARTA'),
(67, '<?php echo "lol"; ?>', 'SPARTA'),
(68, 'SPARTA', 'SPARTA'),
(69, 'zdqdqz :D', 'If you wanted to see my pussy'),
(70, 'If you wanted to see my pussy', 'If you wanted to see my pussy'),
(71, 'If you wanted to see my pussy', 'If you wanted to see my pussy'),
(72, 'qzdqz', 'qzdzqdqz'),
(73, 'zqdzqd', 'qzdqzdzq'),
(74, 'qzdqzd', 'zqdqzd');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(11) NOT NULL,
  `author` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"user"}',
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  `image` int(11) NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"comment","code":2,"editable":false}',
  `slug` text NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `deleted`, `author`, `date`, `title`, `text`, `image`, `comments`, `slug`) VALUES
(1, 0, 1, '2013-05-08 05:07:15', 15, 16, 1, 0, '28'),
(2, 0, 1, '2013-05-15 11:28:29', 17, 18, 1, 0, '29'),
(3, 1, 1, '2013-07-19 07:44:26', 39, 40, 0, 0, '41'),
(4, 1, 1, '2013-07-13 17:49:58', 42, 43, 0, 0, '44'),
(5, 1, 1, '2013-07-13 18:28:07', 45, 46, 0, 0, '47');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size":"big"}',
  `date` datetime NOT NULL,
  `slug` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","editable":false}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `deleted`, `title`, `text`, `date`, `slug`, `image`) VALUES
(1, 0, 30, 31, '2013-07-13 06:34:22', 32, 1),
(2, 0, 48, 49, '2013-07-13 18:29:03', 50, 0);

-- --------------------------------------------------------

--
-- Structure de la table `prout`
--

CREATE TABLE `prout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "big"}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  `tags` int(11) NOT NULL COMMENT '{"link" : "OneToMany", "reference":"tag","size" : "small","code" : "17"}',
  `textou` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `prout`
--

INSERT INTO `prout` (`id`, `deleted`, `date`, `title`, `text`, `image`, `tags`, `textou`) VALUES
(1, 0, '2013-07-15 16:09:25', 72, 73, 0, 0, 74);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"small"}',
  `text` int(11) DEFAULT NULL COMMENT '{"link" : "OneToOne", "reference":"lang", "size":"big"}',
  `tutorials` int(10) NOT NULL DEFAULT '0' COMMENT '{"link":"OneToMany", "reference":"tutorial", "code":3, "editable":false}',
  `deleted` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`id`, `title`, `text`, `tutorials`, `deleted`) VALUES
(1, 51, 52, 0, 0),
(2, 53, 54, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deleted` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `title` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "small"}',
  `text` int(11) NOT NULL COMMENT '{"link" : "OneToOne", "reference":"lang","size" : "big"}',
  `image` int(11) NOT NULL COMMENT '{"link":"OneToOne","reference":"image"}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `deleted`, `date`, `title`, `text`, `image`) VALUES
(1, 0, '2013-07-14 18:03:34', 59, 60, 0),
(2, 0, '2013-07-14 18:52:34', 61, 62, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tutorial`
--

CREATE TABLE `tutorial` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `tutorial`
--

INSERT INTO `tutorial` (`id`, `deleted`, `date`, `title`, `text`, `image`, `comments`, `slug`, `category`, `author`, `tags`) VALUES
(1, 0, '2013-05-08 00:00:00', 3, 4, 1, NULL, '19', 1, 1, 0),
(2, 1, '2013-05-29 12:17:00', 5, 6, 0, NULL, '20', 1, 1, 0),
(3, 0, '2013-05-16 00:00:00', 7, 8, 2, NULL, '21', 1, 1, 0),
(4, 0, '2013-05-31 04:26:38', 9, 10, 1, NULL, '22', 1, 1, 0),
(5, 1, '2013-05-15 04:22:40', 11, 12, 1, NULL, '23', 1, 1, 0),
(6, 0, '2013-05-15 17:20:12', 13, 14, 1, NULL, '24', 1, 1, 0),
(7, 0, '2013-07-14 07:37:46', 36, 37, 0, 0, '38', 3, 1, 0);

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
  `date` datetime NOT NULL,
  `civility` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `site` text NOT NULL,
  `language` text NOT NULL,
  `access` int(11) DEFAULT NULL COMMENT '{"link":"OneToMany", "reference":"access","code":5}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `date`, `civility`, `password`, `country`, `city`, `site`, `language`, `access`) VALUES
(1, 0, 0, 'fozeek', 'Deneuve', 'Quentin', 'dark.quent@free.fr', 2, '2013-02-17 09:31:39', 'mal', '', 'France', 'Paris', 'fozeek.com', 'html,css', 0);

-- --------------------------------------------------------

--
-- Structure de la table `_links`
--

CREATE TABLE `_links` (
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
(4, 3, 2),
(4, 7, 1),
(16, 1, 1),
(16, 3, 1),
(16, 3, 2),
(5, 1, 1),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `_params`
--

CREATE TABLE `_params` (
  `link_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `_params`
--

INSERT INTO `_params` (`link_number`) VALUES
(18);