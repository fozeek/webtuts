-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 14 Juillet 2013 à 17:40
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
(1, 0, '2013-05-23 09:29:17', 1, 'Ceci est un com'' de fou !'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Contenu de la table `lang`
--

INSERT INTO `lang` (`id`, `fr`, `en`) VALUES
(1, 'Titre français TEST:D', 'English title '),
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
(36, 'qzdqzdLOLqzd', 'qzdzqd'),
(37, 'qzdqzdLOL', 'qzdqzd'),
(38, 'qzdqzdlolqzd', 'qzdzqd'),
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
(58, 'titre-français-test-d', 'english-title');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `access` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `deleted`, `banned`, `pseudo`, `name`, `surname`, `mail`, `image`, `date`, `civility`, `password`, `country`, `city`, `site`, `language`, `access`) VALUES
(1, 0, 0, 'fozeek', 'Deneuve', 'Quentin', 'dark.quent@free.fr', 2, '2013-02-17 09:31:39', 'mal', 'e1d75b9a8b4d045d96180b6ec6f5e686', 'France', 'Paris', 'fozeek.com', 'fr', 0);

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
(4, 3, 2);
