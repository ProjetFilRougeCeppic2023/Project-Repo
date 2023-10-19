<?php

class Movie{

    public $name;
    public $icon;
    public $rating;
    public $themes;

    public function __construct($name, $icon, $rating, $themes)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->rating = $rating;
        $this->themes = $themes;
    }
}







$currentFilms = [
    new Movie("Saw 2048","",86,["horror","adventure"]),
    new Movie("Harry Pot de beurre","",4,["fantasy","comic"]),
    new Movie("Titanic 2","",589,["drama"]),
    new Movie("Fast and happy","",1687,["race","action"])
];