<?php include_once "../controllers/Products.php";?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="packages/font/poppins/poppins.css">
    <link rel="stylesheet" href="packages/font/poppinssemibold/poppins_semibold.css">
    <link rel="stylesheet" href="packages/font/robotocondensed/robotocondensed.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>

<body class="bgcolor">
    <div id="app" class="color">
        <div id="login">
            <?php include "../templates/profile.php"?>
        </div>
        <header>
            <?php include "../templates/header.php"?>
        </header>
        <nav class="menu">
            <?php include "../templates/menu.php"?>
        </nav>
        <main>
           <div class="category">
               
           </div>
            <div class="catalog_gallery">
                <h1>Our Gallery</h1>
                <div class="products">

                    <?php foreach ($goods as $good):?>

                    <div class="product-item">
                        <a href="full.php?id=<?=$good['id']?>" target="_blank"><img src="img/small/<?= $good['img']?>" alt="image" style="float: left; margin: 5px 10px 15px 5px;"></a>
                        <div class="desc">
                            <a href="full.php?id=<?=$good['id']?>" target="_blank"><h5><?= $good['title']?></h5></a>
                            <p><?= $good['short_info']?></p>
                            <p><b>Genre: </b> <?= $good['genre']?></p>
                            <span class="price">$ <?= $good['price']?></span> <a href="full.php?id=<?=$good['id']?>" target="_blank">More..</a>
                        </div>
                    </div>

                    <?php
                         endforeach; ?>
                </div>
            </div>
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    <script src="../js/my.js" defer></script>
    
</body>

</html>
