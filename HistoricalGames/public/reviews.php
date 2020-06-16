<?php include_once "../controllers/User.php";?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
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
           <div id="reviews">
               <?php
                foreach($com as $post):?>
                <div class="postUser">
                    <h5>Логин: <?= $post['login']?></h5>
                    <p>Имя: <?= $post['name']?></p>
                    <h4><?= $post['text']?></h4>
                </div>
                <?php endforeach;?>
           </div>
            
            <form method="post">
                <input type="text" name="login" placeholder="Login" autofocus required>
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="tel" placeholder="Tel">
                <textarea name="post" id="post" cols="30" rows="10" placeholder="Text" required></textarea>
                <input type="submit" name="reviews">
            </form>
            
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    <script src="../js/my.js" defer></script>
</body>

</html>
