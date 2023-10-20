<?php

class Movie{

    public $name;
    public $icon;
    public $rating;
    public $themes;
    public $isStar;

    public function __construct($name, $icon, $rating, $themes, $isStar = false)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->rating = $rating;
        $this->themes = $themes;
        $this->isStar = $isStar;
    }
}







$currentFilms = [
    new Movie("Saw 2048","",86,["horror","adventure"]),
    new Movie("Harry Pot de beurre","",4,["fantasy","comic"],true),
    new Movie("Titanic 2","",589,["drama"]),
    new Movie("Fast and happy","",1687,["race","action"])
];