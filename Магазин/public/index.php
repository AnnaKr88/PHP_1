<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="font/poppins/poppins.css">
    <link rel="stylesheet" href="font/poppinssemibold/poppins_semibold.css">
    <link rel="stylesheet" href="font/robotocondensed/robotocondensed.css">
</head>

<body class="bgcolor">
    <div id="app" class="color">
        <header>
            <div class="margin_header_center">
                <a href="#" class="logo_link">
                    <h1>Historical</h1>
                    <h3>games</h3>
                </a>
                <h4 class="header_text_tel">+123 456 7890</h4>
                <h4 class="header_text_email">info@example.com</h4>
                <form action="#" class="search-form search">
                    <input type="text" class="search-field" v-model="userSearch" placeholder="Search..">
                    <button type="submit" class="search_button">
                    </button>
                </form>
            </div>
        </header>
        <nav class="menu_catalog">
            <ul class="catalog_list clearfix">
                <li class="menu-catalog-list"><a href="index.php" class="menu-catalog-link">Gallery</a></li>
                <li class="menu-catalog-list"><a href="reviews.php" class="menu-catalog-link">Reviews</a></li>
            </ul>
        </nav>
        <div class="menu-line"></div>
        <div class="catalog_gallery">
            <h1>Our Gallery</h1>
            <div class="products">
                <?php include "content.php"?>
            </div>
        </div>
        <div class="reviews"></div>
        <footer class="footer_catalog">
            <h4>© 2017 Historical Games. All rights reserved | Design by <a href="#">W3layouts</a></h4>
        </footer>
    </div>
</body>

</html>
