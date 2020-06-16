<?php 
include_once "../controllers/User.php";
include_once "../controllers/Basket.php";

$data = mysqli_fetch_assoc(user($connect, $login));

if(!isset($login)):?>


<a href="../public/login.php?name=in" id="in">Войти</a>|<a href="../public/reg.php?name=reg" id="reg">Регистрация</a>

<?php //admin
elseif ($data['rights']==0):?>

<a href="../public/admin.php">Админка</a>
<form method="post">
    <input type="submit" name="logout" id="logout" value="Выйти">
</form>


<?php //user

elseif ($data['rights']>0) :?>
   
<?php $basket = basketUser($connect, $data['id']);?>

<div id="basket">
    <button class="btn-cart" type="button" @click="showCart = !showCart" onclick="renderBasket(<?=$data['id']?>)">
        BASKET
    </button>
   <div class="cart-block" v-show="showCart">
   <div class="basket">
<?php 
        foreach($basket as $basketItem):?>   
        
        <div class="cart-item cart-item<?=$basketItem['id_product']?>">
            <div class="product-bio">
                <img src="../public/img/small/<?=$basketItem['img']?>" alt="img" width="90px">
                <div class="product-desc">
                    <div class="product-title"><?=$basketItem['title']?></div>
                    <div>
                        <div class="product-quantity">Quantity: <input type="button" name="minus" class="minus" value="-" onclick="deleteFromBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>"><p class="itemQ<?=$basketItem['id_product']?>"></p><input type="button" name="plus" class="plus" value="+" onclick="addToBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>"></div>
                        <div class="product-single-price">$ <?=$basketItem['price']?> each</div>
                        <div class="productTotalPrice<?=$basketItem['id_product']?>"></div>
                    </div>
                </div>
            </div>
            <div class="right-block">
                <div class="product-price"></div>
                <input type="button" class="del-btn" name="delete" value="" onclick="deleteGoodBasket(<?=$basketItem['id_product']?>)" data-id="<?=$basketItem['id_product']?>">
            </div>
        </div>
        
        <?php endforeach;
        ?>
        </div>
        <div class="totalQ">Количество: </div>
        <div class="totalP">Стоимость: </div>
        <a href="../public/basket.php">Перейти в корзину</a>
    </div>
</div>
<form method="post">
    <input type="submit" name="logout" id="logout" value="Выйти">
</form>


<?php
endif;?>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    const basket = new Vue({
        el: '#basket',
        data: {
            showCart: false
        }
    })

</script>