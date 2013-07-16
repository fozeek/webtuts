<?php
	// FR
	Router::add("fr", "home", "index", "/accueil.html");
	
	Router::add("fr", "blog", "articles", "/les-articles.html");
	Router::add("fr", "blog", "article", "/categorie-{category}/article-{article}~{id}.html");
	Router::add("fr", "blog", "categories", "/les-categories.html");
	Router::add("fr", "blog", "category", "/categorie-{category}~{id}.html");
	Router::add("fr", "blog", "actualites", "/les-actualites.html");
	Router::add("fr", "blog", "actualite", "/actualite-{news}~{id}.html");
	Router::add("fr", "blog", "tags", "/les-tags.html");
	Router::add("fr", "blog", "tag", "/tag-{tag}~{id}.html");
	
	Router::add("fr", "user", "profil", "/profil-{user}.html");
	Router::add("fr", "user", "subscription", "/inscription-webtuts.html");	
	Router::add("fr", "user", "connection", "/connexion-webtuts.html");
	Router::add("fr", "user", "compte", "/compte.html");
	
	Router::add("fr", "error", "http", "/404.html");
	
	Router::add("fr", "page", "index", "/page-{page}~{id}.html");
	Router::add("fr", "page", "contact", "/contactez-nous.html");
	Router::add("fr", "page", "about", "/a-propos-de-webtuts.html");
	Router::add("fr", "page", "sitemap", "/plan-du-site.html");
	Router::add("fr", "page", "partners", "/tous-les-partenaires-de-webtuts.html");

	// EN
	Router::add("en", "home", "index", "/home.html");
	
	Router::add("en", "blog", "articles", "/articles.html");
	Router::add("en", "blog", "article", "/category-{category}/article-{article}~{id}.html");
	Router::add("en", "blog", "categories", "/categories.html");
	Router::add("en", "blog", "category", "/category-{category}~{id}.html");
	Router::add("en", "blog", "actualites", "/news.html");
	Router::add("en", "blog", "actualite", "/news-{news}~{id}.html");
	Router::add("en", "blog", "tags", "/tags.html");
	Router::add("en", "blog", "tag", "/tag-{tag}~{id}.html");
	
	Router::add("en", "user", "profil", "/profile-{user}.html");
	Router::add("en", "user", "subscription", "/webtuts-subscription.html");	
	Router::add("en", "user", "connection", "/webtuts-connection.html");
	Router::add("en", "user", "compte", "/account.html");
	
	Router::add("en", "error", "http", "/404.html");
	
	Router::add("en", "page", "index", "/page-{page}~{id}.html");
	Router::add("en", "page", "contact", "/contact-us.html");
	Router::add("en", "page", "about", "/about-webtuts.html");
	Router::add("en", "page", "sitemap", "/sitemap.html");
	Router::add("en", "page", "partners", "/all-webtuts-partners.html");
 ?>