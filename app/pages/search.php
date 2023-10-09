<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/search.css">
    <title>Search</title>
</head>

<body>
    <header>
        <?php require_once('../header-footer/header.php') ?>
    </header>


    <section id="searchSpace">
        <form role="search">
            <input id="search" type="search" placeholder="Search..." />
        </form>
    </section>


    <section id="movieGrid">
        <div class="movie">
            <div class="picture">
                <img src="" alt="Film picture">
            </div>
            <h2>Title</h2>
            <div class="specifications">
                <ul class="themesList">
                    <li>Theme1</li>
                    <li>Theme2</li>
                    <li>Theme3</li>
                </ul>
                <div class="stats">
                    <div class="upvote">128</div>
                    <div class="favorites">O</div>
                </div>

            </div>
        </div>



    </section>



    <footer>
        <?php require_once('../header-footer/footer.php') ?>
    </footer>

</body>

</html>