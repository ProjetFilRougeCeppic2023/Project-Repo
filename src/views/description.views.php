
<header>
    <?php require('views/partials/header.php') ?>
</header>



<main>
    <h1>Film number <?=$movie->id?> : <?=$movie->name?></h1>
    <a href=<?=$movie->icon?>></a>
    <p>Rating <?=$movie->rating?></p>
</main>



<footer>
    <?php require('views/partials/footer.php') ?>
</footer>