<?php include_once "../controllers/Admin.php";
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
    <title>Оформление заказа</title>
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
          <h3>Ваш заказ:</h3>
          <hr>
           <table class="cart-order">
            <tr class="order-title">
                <th class="order-num">№</th>
                <th class="order-title">Наименование</th>
                <th class="order-price">Стоимость</th>
                <th class="order-amount">Количество</th>
                <th class="order-total">Общая стоимость</th>
            </tr>   
            
        <?php 
    $num = 1;
    $sum = 0;
    $amoumt = 0;
        foreach($basket as $basketItem):?> 
                <tr class="productCart productCart<?=$basketItem['id_product']?>">
                    <th class="cart-num"><?=($num++)?></th>
                    <td class="cart-title"><?=$basketItem['title']?></td>
                    <td class="cart-price"><?=$basketItem['price']?></td>
                    <td class="cart-count"><?=$basketItem['count']?></td>
                    <td class="productTotalPrice<?=$basketItem['id_product']?>">Total: <?=$basketItem['count']*$basketItem['price']?>$</td>
                </tr>
    <?php
    $sum+= $basketItem['count']*$basketItem['price'];
    $amoumt+=  $basketItem['count'];             
    endforeach;
                ?>
                
            </table>
            <div class="totalQ">Количество: <?=$amoumt?></div>
        <div class="totalP">Стоимость: <?=$sum?></div> 
        <hr>
        <h4>Оформление заказа</h4>
        <form method="post" action="orderEnd.php">
            <input type="text" name="name" placeholder="Name" autofocus required>
            <input type="text" name="secondName" placeholder="Second name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="tel" placeholder="Phone" required>
            <textarea name="adress" placeholder="Adress" required></textarea>
            <lable for="orderPay">Способ оплаты:</lable>
            <select name="pay" id="orderPay">
                <option value="0">Кредитной картой</option>
                <option value="1">Переводом</option>
            </select>
            <textarea name="orderCom" id="orderCom" cols="30" rows="10" placeholder="Your comment."></textarea>
            <input type="submit" name="orderSubmit" value="Оформить">
        </form>
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    <script src="../js/my.js" defer></script>
</body>

</html>