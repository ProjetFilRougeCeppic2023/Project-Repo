<header>

    <?php require('views/partials/header.php') ?>
</header>


<section id="searchSpace">
    <form role="search">
        <input id="search" type="search" placeholder="Search..." />
    </form>
</section>


<section id="movieGrid">

    <?php foreach ($currentFilms as $currentFilm) { ?>


        <div class="movie">
            <div class="picture">
                <img src="<?= $currentFilm->icon ?>" alt="Film picture">
            </div>

            <a href="/description?id=<?= $currentFilm->id ?>">
                <div class="title">
                    <h2><?= $currentFilm->name ?></h2>
                </div>
            </a>

            <div class="specifications">
                <ul class="themesList">
                    <?php foreach ($currentFilm->themes as $theme) { ?>
                        <li><?= $theme ?></li>
                    <?php } ?>
                </ul>

                <div class="stats">
                    <div class="upvote">
                        <span><?= $currentFilm->rating ?></span>
                        <div>
                            <img src="assets/images/heart.png" alt="icon vote">
                        </div>
                    </div>
                    <div class="favorites">
                        <div>
                            <img src=<?= $currentFilm->isStar ? "assets/images/star_fill.png" : "assets/images/star_empty.png" ?> alt="favorite button">
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php } ?>
</section>



<footer>
    <?php require('views/partials/footer.php') ?>
</footer>