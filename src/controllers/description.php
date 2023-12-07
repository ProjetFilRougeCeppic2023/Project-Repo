<?php


require 'movie.php';

// $db = new Database();
$id = $_GET['id'];
// $queryArticle = 'SELECT * FROM post where id = :id';
// $article = $db->query($queryArticle, [':id' => $id])->find();

$movie = null;


//Loop to search movie -> to change when database is ready
for ($i = 0; $i < count($currentFilms);$i++)
{
    if ($currentFilms[$i]->id == $id )
    {
        $movie = $currentFilms[$i];
        break;
    }
}

if (! $movie) {
    abort();
}


routeToView("description",[
    'movie' => $movie
]);
?>