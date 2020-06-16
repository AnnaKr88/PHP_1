<?php 
include_once "../controllers/User.php";
include_once "../controllers/Basket.php"; 
$user = mysqli_fetch_assoc(user($connect, $login));
$basket = basketUser($connect, $user['id']);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basket</title>
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
            <table class="table-cart">
                <tr class="title">
                    <th class="cart-num">№</th>
                    <th class="cart-img">Товар</th>
                    <th class="cart-title">Наименование</th>
                    <th class="cart-price">Стоимость(за шт)</th>
                    <th class="cart-count">Количество</th>
                    <th class="cart-total">Общая стоимость</th>
                    <th class="cart-del"></th>
                </tr>
    <?php 
    $num = 1;
    $sum = 0;
    $amoumt = 0;
        foreach($basket as $basketItem):?> 
                <tr class="productCart productCart<?=$basketItem['id_product']?>">
                    <th class="cart-num"><?=($num++)?></th>
                    <td class="cart-img"><img src="img/small/<?=$basketItem['img']?>" alt="<?=$basketItem['title']?>" width="35%"></td>
                    <td class="cart-title"><?=$basketItem['title']?></td>
                    <td class="cart-price"><?=$basketItem['price']?></td>
                    <td class="cart-count"><input type="button" name="minus" class="minus" value="-" onclick="deleteFromBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>"><p class="itemQ<?=$basketItem['id_product']?>"><?=$basketItem['count']?></p><input type="button" name="plus" class="plus" value="+" onclick="addToBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>"></td>
                    <td class="productTotalPrice<?=$basketItem['id_product']?>">Total: <?=$basketItem['count']*$basketItem['price']?>$</td>
                    <td class="prodDel"><input type="button" class="del-btn" name="delete" value="" onclick="deleteGoodBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>"></td>
                </tr>
    <?php
    $sum+= $basketItem['count']*$basketItem['price'];
    $amoumt+=  $basketItem['count'];             
    endforeach;
                ?>
                
            </table>
            <div class="totalQ">Количество: <?=$amoumt?></div>
        <div class="totalP">Стоимость: <?=$sum?></div>
        <a href="order.php?id=<?= $user['id']?>">Оформить заказ</a>
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    <script src="../js/my.js" defer></script>
</body>

</html>
