<?php

class Article {
    public $id;
    public $title;
    public $content;
    public $date;
    public $author;
    public $category;
    
    public function __construct($id = '', $title = '', $content = '', $author = '', $date = '', $category = '') {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;
        $this->category = $category;
    }

    public function getDateFr() {
        return date('d/m/Y', strtotime($this->date));
    }
}