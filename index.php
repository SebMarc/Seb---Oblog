<?php

// index.php - point d'entrée pour la page d'accueil



// Inclusion des classes nécessaires au fonctionnement du site.
require 'inc/classes/Article.php';
require 'inc/classes/Category.php';
require 'inc/classes/Author.php';
require 'inc/classes/DBData.php';

// La classe Data va chercher les données pour nous, on l'instancie.
$dataObject = new DBData();

$categories = $dataObject->getCategories();
$authors = $dataObject->getAuthors();
$articles = $dataObject->getArticles();


//--------------------------------------HOME-----------------------------------------

// Une page spécifique a t-elle été demandée ? Si non, considérer qu'on
// va afficher la page d'accueil par défaut.
if (!empty($_GET['page'])) {
    $page = trim($_GET['page']);
}
else {
    $page = 'home';
    
}

// Initialisation de la variable contenant le nom du template central
// correspondant à la page demandée. À déterminer concrètement…
$templateName = '';



//--------------------------------------AUTHORS-----------------------------------------


// Page auteur.
if ($page == 'author') {
    $templateName = 'author';
}


//--------------------------------------CATEGORIES-----------------------------------------


// Page catégorie.
else if ($page == 'category') {
    // récupérer l'id fournit en paramètre de l'URL
    if (!empty($_GET['id'])) {
        $categoryId = intval(trim($_GET['id']));
    }
    else {
        $categoryId = 0;
    }

    // récupérer l'objet article pour l'id fourni
    // $category = $dataObject->getCategory($categoryId);

    $articlesList = $dataObject->getArticlesByCategoryId($_GET['id']);
    $categories = $dataObject->getCategories();
    $article = $dataObject->getArticle($_GET['id']);
    $templateName = 'category';
}



//--------------------------------------POSTS-----------------------------------------

// Page article.
else if ($page == 'article') {
    // récupérer l'id fournit en paramètre de l'URL
    if (!empty($_GET['id'])) {
        $articleId = intval(trim($_GET['id']));
    }
    else {
        $articleId = 0;
    }

    // version condensée (condition ternaire) :
    // $articleId = !empty($_GET['id']) ? intval(trim($_GET['id'])) : 0;

    // récupérer l'objet article pour l'id fourni
    $article = $dataObject->getArticle($_GET['id']);
    
    $templateName = 'article';
}


//--------------------------------------ACCUEIL-----------------------------------------


// Page d'accueil.
else if ($page == 'home') {
    // récupérer le tableau des articles
    $articlesList = $dataObject->getArticles();
    
    // debug pour vérifier le contenu de la variable
    // print_r($articlesList); exit; // à commenter une fois vérifié
    $templateName = 'home';
}

//---------------------------------PREPARATION CONTENU-------------------------------

// Préparation finale du contenu de la réponse HTTP.
require __DIR__.'/inc/templates/header.tpl.php';
require __DIR__.'/inc/templates/'.$templateName.'.tpl.php';
require __DIR__.'/inc/templates/footer.tpl.php';