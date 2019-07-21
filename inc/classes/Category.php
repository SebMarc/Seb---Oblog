<?php

class Category {

    private $name;
    private $position;

    /**
     * Constructeur de la classe Category
     * 
     * @param $name Le nom de la catégorie
     */
    public function __construct($name, $position) {
        $this->name = $name; 
        $this->position = $position;
    }

    /**
     * Renvoi le nom de la catégorie
     * 
     * @return string 
     */
    public function getName() {
        return $this->name;
    }
}