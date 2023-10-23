<?php


require 'movie.php';

// $db = new Database();
$id = $_GET['id'];
// $queryArticle = 'SELECT * FROM post where id = :id';
// $article = $db->query($queryArticle, [':id' => $id])->find();

$movie = null;

for ($i = 0; $i < count($currentFilms);$i++)
{
    if ($currentFilms[$i]->id === $id )
    {
        $movie = $currentFilms[$i];
        break;
    }
}

if (! $movie) {
    abort();
}
else
{
    echo $movie->name;
}

include 'views/description.views.php';
?>