<?php

class Movie{

    public $id;
    public $name;
    public $icon;
    public $rating;
    public $themes;
    public $isStar;

    public function __construct($id, $name, $icon, $rating, $themes, $isStar = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->icon = $icon;
        $this->rating = $rating;
        $this->themes = $themes;
        $this->isStar = $isStar;
    }
}







$currentFilms = [
    new Movie(1,"Saw 2048","",86,["horror","adventure"]),
    new Movie(2,"Harry Pot de beurre","",4,["fantasy","comic"],true),
    new Movie(3,"Titanic 2","",589,["drama"]),
    new Movie(4,"Fast and happy","",1687,["race","action"])
];