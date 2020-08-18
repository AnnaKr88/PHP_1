<?php
include_once "../models/ModelBasket.php";
include_once "../models/Models.php";

if(isset($_POST['goodInBasketId']) || isset($_POST['addToOrderid'])|| isset($_POST['buyGoodInBasketId'])) {
    if(isset($_POST['goodInBasketId'])) {
        $id = $_POST['goodInBasketId'];
    }
    if(isset($_POST['addToOrderid'])) {
        $id = $_POST['addToOrderid'];
    }
    if(isset($_POST['buyGoodInBasketId'])) {
        $id = $_POST['buyGoodInBasketId'];
    }
    
    $sql = "SELECT * FROM `goods` WHERE id = $id";
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);
    
    
    $title = $data['title'];
    $price = $data['price'];
    $img = $data['img'];
    $shortInfo = $data['short_info'];
    $fullInfo = $data['full_info'];
    $genre = $data['genre'];
    

    
            if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    $login = $_SESSION['login'];         
                    user($connect, $login);
                    $user = mysqli_fetch_assoc(user($connect, $login));
            };
    
    
            $goodBasket = getOneBasket($connect, $id, 'basket');
    
            if($goodBasket) {
                $sql = "UPDATE basket SET count=count+1 WHERE id_product=$id";
                $res = mysqli_query($connect, $sql);
            } 
            else {
                newGoodBasket($connect, $id, $user['id'], $title, $img, $genre, $price, '1');
            }
    
    $countGoodsOrder = countGoodsOrder($connect);
    $sumGoodsOrder = sumGoodsOrder($connect);
    $sumOneGoodsOrder = sumOneGoodsOrder($connect, $id);
    $countGoodsOrderItem = countGoodsOrderItem($connect, $id);
    $good = [$id, $user['id'], $title, $img, $genre, $price, '1'];
    
    
    $req = [$countGoodsOrder, $sumGoodsOrder, $sumOneGoodsOrder, $countGoodsOrderItem, $good];  
    echo json_encode($req);
}

if(isset($_POST['deleteFromBasket']) || isset($_POST['deleteToOrderid'])) {
    if(isset($_POST['deleteFromBasket'])) {
        $id = $_POST['deleteFromBasket'];
    }
    if(isset($_POST['deleteToOrderid'])) {
        $id = $_POST['deleteToOrderid'];
    }
    
    if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    $login = $_SESSION['login'];         
                    user($connect, $login);
                    $user = mysqli_fetch_assoc(user($connect, $login));
            };
    
    
    $goodBasket = getOneBasket($connect, $id, 'basket');
    
    if($goodBasket['count']>1) {
        $sql = "UPDATE basket SET count=count-1 WHERE id_product = $id";
        $res = mysqli_query($connect, $sql);
    }
    else {
        $sql = "DELETE FROM basket WHERE id_product = $id";
        $res = mysqli_query($connect, $sql);
    }
    
    $countGoodsOrder = countGoodsOrder($connect);
    $sumGoodsOrder = sumGoodsOrder($connect);
    $sumOneGoodsOrder = sumOneGoodsOrder($connect, $id);
    $countGoodsOrderItem = countGoodsOrderItem($connect, $id);
    
    $req = [$countGoodsOrder, $sumGoodsOrder, $sumOneGoodsOrder, $countGoodsOrderItem]; 
    echo json_encode($req);
    
}

if(isset($_POST['deleteGoodBasket']) || isset($_POST['deleteFromOrderid'])) {
    if(isset($_POST['deleteGoodBasket'])) {
        $id = $_POST['deleteGoodBasket'];
    }
    if(isset($_POST['deleteFromOrderid'])) {
        $id = $_POST['deleteFromOrderid'];
    }
    
    if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    $login = $_SESSION['login'];         
                    user($connect, $login);
                    $user = mysqli_fetch_assoc(user($connect, $login));
            };
    
    
    $goodBasket = getOneBasket($connect, $id, 'basket');
    
    if($goodBasket) {
        $sql = "DELETE FROM basket WHERE id_product = $id";
        $res = mysqli_query($connect, $sql);
    }
    
    $countGoodsOrder = countGoodsOrder($connect);
    $sumGoodsOrder = sumGoodsOrder($connect);
    $sumOneGoodsOrder = sumOneGoodsOrder($connect, $id);
    $countGoodsOrderItem = countGoodsOrderItem($connect, $id);
    
    $req = [$countGoodsOrder, $sumGoodsOrder, $sumOneGoodsOrder, $countGoodsOrderItem];   
    echo json_encode($req);
    
}

if(isset($_POST['renderBasket'])) {
    if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    $login = $_SESSION['login'];         
                    user($connect, $login);
                    $user = mysqli_fetch_assoc(user($connect, $login));
            };
    $res = renderBasket($connect,'basket', $user['id']);
    
    echo json_encode($res);
}

if(isset($_POST['orderSubmit'])) {
    if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
                    $login = $_SESSION['login'];         
                    user($connect, $login);
                    $user = mysqli_fetch_assoc(user($connect, $login));
            };
    $userId = $user['id'];
    $name = $_POST['name'];
    $secName = $_POST['secondName'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $adress = $_POST['adress'];
    $pay = $_POST['pay'];
    $com = $_POST['orderCom'];
    
    $basket = renderBasket($connect,'basket', $user['id']);
    $product;
    foreach($basket as $good){
        $product.= "| Наименование: ";
        $product.=$good['title'];
        $product.= " Стоимость: ";
        $product.=$good['price'];
        $product.= " Количество: ";
        $product.=$good['count'];
        insertUserBasket($connect, $good['id_product'], $user['id'], $good['title'], $good['img'], $good['genre'], $good['price'], $good['count']);
    }
    
    newOrderBasket($connect, $userId, $name, $secName, $email, $tel, $adress, $com, $pay, $product);
    
    deleteFromBasketUser($connect, $user['id']);
     
}