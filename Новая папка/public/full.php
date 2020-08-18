<?php include_once "../controllers/Products.php";
include_once "../models/ModelBasket.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $good['title']?></title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/packages/font/poppins/poppins.css">
    <link rel="stylesheet" href="../public/packages/font/poppinssemibold/poppins_semibold.css">
    <link rel="stylesheet" href="../public/packages/font/robotocondensed/robotocondensed.css">
    
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
            <div class="prodFull">
           <h2><?=$good['title']?></h2>
           <div class="l-block"><img src="../public/img/big/<?=$good['img']?>" alt="">
            <span>Price: <?=$good['price']?></span>
            <?php if(!isset($_SESSION['login'])):?>
            <p>Вы не зарегистрированы!</p>
            <?php else:?>
            <input type="button" class="buy-btn" value="BUY" onclick="buy(<?=$good['id']?>)" data-id="<?=$good['id']?>">
            <?php endif;?>
            </div>
            <div class="r-block"><p><?=$good['full_info']?></p></div>           
            </div>
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    
    <script src="../js/my.js"></script>
</body>

</html>