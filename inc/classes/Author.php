<?php

class Author {

    private $name;
    private $image;
    private $email;

    /**
     * Constructeur de la classe Author
     * 
     * @param $name Le nom de l'auteur
     */
    public function __construct($name, $image, $email) {
        $this->name = $name;
        $this->image = $image;
        $this->email = $email;
    }

    /**
     * Renvoi le nom de la auteur
     * 
     * @return string 
     */
    public function getName() {
        return $this->name;
    }
}