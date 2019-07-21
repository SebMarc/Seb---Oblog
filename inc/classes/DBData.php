<?php

class DBData
{
    public $pdo;

    public function __construct () {
        $user = 'oblog';
        $pass = 'oblog';
        $this->pdo = new PDO('mysql:host=localhost;dbname=oblog', $user, $pass);
    }

    /**
     * Méthode permettant de retourner un tableau de tous les objets Article.
     * 
     * @return  Article[]
     */ 
 
//--------------------------------------ARTICLES----------------------------------------- 


    public function getArticles() {
        // Creer la requete SQL @seb
        $sql = "SELECT * FROM posts";
        // executer la requete @kado
        $pdoStatement = $this->pdo->query($sql);
        // renvoyer les resultats @kevin
        $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        $articles = array();
        // Boucler sur les resultats @ Kadoc
        foreach ($resultat as $articleTableau) {
                    
            // Créer une objet Article pour chaque ligne de la BDD qui nous est renvoyé
            $articleObjet = new Article(
                                $articleTableau['id'],
                                $articleTableau['title'], 
                                $articleTableau['text'],
                                $articleTableau['authors_id'],
                                $articleTableau['published_date'],
                                $articleTableau['categories_id']
                            ); 
            $articles[$articleTableau['id']] = $articleObjet;
        }
        // var_dump($articles);
        return $articles;
    }



    public function getArticle($id) {
       $articles = $this->getArticles();
       $article = $articles[$id];
       return $article;            
    }
     
//--------------------------------------CATEGORIES---------------------------------------

    public function getCategories() {

        $sql = "SELECT * FROM categories";
        $pdoStatement = $this->pdo->query($sql);
        $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        

        $categories = array();

        foreach($resultat as $categoryTableau) {
            $categoryObjet = new Category(
                                $categoryTableau['name'], 
                                $categoryTableau['position']
            );

            $categories[$categoryTableau['id']] = $categoryObjet;    
        }
        // var_dump($categories);
        return $categories;
    }

    public function getArticlesbyCategoryId($id) {
        $articles = $this->getArticles();
        $articlesByCategory = $articles[$id];
        return $articlesByCategory;            
     }


//--------------------------------------AUTHORS----------------------------------------- 

    public function getAuthors() {

        $sql = "SELECT * FROM authors";
        $pdoStatement = $this->pdo->query($sql);
        $resultat = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
       

        $authors = array();

        foreach($resultat as $authorTableau) {
            $authorObjet = new Author(
                                $authorTableau['name'],
                                $authorTableau['image'],
                                $authorTableau['email']
            );
            $authors[$authorTableau['id']] = $authorObjet;
        }
        // var_dump($authors);
        return $authors;
    }

}