<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/search_style.css">
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

            <div class="title">
                <h2>Title</h2>
            </div>

            <div class="specifications">
                <ul class="themesList">
                    <li>Theme1</li>
                    <li>Theme2</li>
                    <li>Theme3</li>
                </ul>
                <div class="stats">
                    <div class="upvote">
                        <span>128</span>
                        <div>
                            <img src="../images/heart.png" alt="icon vote">
                        </div>
                    </div>
                    <div class="favorites">
                        <div>
                            <img src="../images/star_empty.png" alt="favorite button">
                        </div>
                    </div>
                </div>

            </div>
        </div>



    </section>



    <footer>
        <?php require_once('../header-footer/footer.php') ?>
    </footer>

</body>

</html>