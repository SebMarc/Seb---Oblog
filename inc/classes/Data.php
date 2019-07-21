<?php

class Data {
    /**
     * Docblocks en option
     * @see https://docs.phpdoc.org/getting-started/your-first-set-of-documentation.html
     * @var Article[]
     */
    private $articlesList;
    
    /**
     * @var Categorie[]
     */
    private $categoriesList;
    
    /**
     * @var Author[]
     */
    private $authorsList;

    /**
     * Au moment de la création d'un objet de la classe Data :
     */
    public function __construct() {
        // Inclure le fichier inc/data.php...
        require 'inc/data.php';
        // ... puis stocker chaque donnée dans une propriété de l'objet...
        $this->articlesList = $dataArticlesList;
        $this->categoriesList = $dataCategoriesList;
        $this->authorsList = $dataAuthorsList;
        // ... désormais, tout le contenu du fichier inc/data.php est incorporé dans l'objet créé.
    }

   

   

    public function getCategories()
    {
        return $this->categoriesList;
    }

    public function getAuthors()
    {
        return $this->authorsList;
    }

    
    /**
     * Méthode permettant de retourner un objet Category pour l'identifiant fourni en paramètre.
     * 
     * @param int $id ID de la categorie
     * @return Category
     */
    public function getCategory($id) {
        // On vérifie que l'id demandé existe...
        if (array_key_exists($id, $this->categoriesList)) {
            // Si oui, alors on retourne l'objet Category en valeur de la clé $id...
            return $this->categoriesList[$id];
            // puis le script sort de la méthode.
        }
        // Sinon, on retourne false.
        return false;
    }

    public function getArticlesByCategoryId($categoryId) {
        $articleList = array();

        // Je boucle sur la liste qui contient tout les articles
        foreach ($this->articlesList as $currentArticle) {
            // Si la catégorie de l'article correspond à la catégorie demandée
            if($currentArticle->category == $categoryId) {
                // Alors, j'ajoute cet article a la liste des article à renvoyer
                $articleList[] = $currentArticle;
            }
        }

        // Je renvoi la liste construite qui contient uniquement les articles dont la catégorie correspond à l'id fourni en parametre
        return $articleList;
    }

}