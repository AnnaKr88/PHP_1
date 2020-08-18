<?php
require_once "../config/dbconfig.php";

function newGoodBasket($connect, $id, $idUser, $title, $img, $genre, $price, $count) {
    $sql ="INSERT INTO basket (id_product, id_user, title, img, genre, price, count) VALUES ('$id', '$idUser', '$title', '$img', '$genre', '$price', '$count')";
    $res = mysqli_query($connect, $sql);
    
    if(!$res) {
        die(mysqli_error($connect));
    }
    
    return true;
}

function getOneBasket($connect, $id, $table) {
    $query = sprintf("SELECT * FROM {$table} where id_product=%d", (int)$id);
    $result = mysqli_query($connect, $query);

    if (!$result)
        die(mysqli_error($connect));

    $res = mysqli_fetch_assoc($result);

    return $res;
}

function basketUser($connect, $id) {
    $sql = "SELECT * FROM basket WHERE id_user=$id";
    $res = mysqli_query($connect, $sql);
    if(!$res) {
        die(mysqli_error($connect));
    }
    
    return $res;
}

function deleteFromBasketUser($connect, $id) {
    $sql = "DELETE FROM basket WHERE id_user=$id";
    $res = mysqli_query($connect, $sql);
    if(!$res) {
        die(mysqli_error($connect));
    }
    
    return $res;
}

function insertUserBasket($connect, $id, $idUser, $title, $img, $genre, $price, $count) {
    $sql ="INSERT INTO userbasket (id_product, id_user, title, img, genre, price, count) VALUES ('$id', '$idUser', '$title', '$img', '$genre', '$price', '$count')";
    $res = mysqli_query($connect, $sql);
    
    if(!$res) {
        die(mysqli_error($connect));
    }
    
    else {
        header("Location: ../public/orderEnd.php");
    }
}

function countGoodsOrder($connect)
{
    $query = "SELECT sum(`count`) AS count FROM `basket`";
    $result = mysqli_query($connect, $query);
    if (!$result)
        die(mysqli_error($connect));
    $countOrder = mysqli_fetch_assoc($result);
    return $countOrder['count'];
}

function countGoodsOrderItem($connect, $id)
{
    $query = "SELECT count FROM basket WHERE id_product = $id";
    $result = mysqli_query($connect, $query);
    if (!$result)
        die(mysqli_error($connect));
    $countOneOrder = mysqli_fetch_assoc($result);
    return $countOneOrder['count'];
}

function sumGoodsOrder($connect)
{
    $query = "SELECT sum(`count`*`price`) AS sum FROM `basket`";
    $result = mysqli_query($connect, $query);
    if (!$result)
        die(mysqli_error($connect));
    $sumOrder = mysqli_fetch_assoc($result);
    return $sumOrder['sum'];
}


function sumOneGoodsOrder($connect, $id)
{
    $query = sprintf("SELECT sum(`count`*`price`) AS sum FROM `basket` WHERE id_product='%d'", (int)$id);
    $result = mysqli_query($connect, $query);
    if (!$result)
        die(mysqli_error($connect));
    $sumOneOrder = mysqli_fetch_assoc($result);
    return $sumOneOrder['sum'];
}

function renderBasket($connect, $table, $id) {
    
    $query = "SELECT * FROM {$table} WHERE id_user = $id";
    $result = mysqli_query($connect, $query);

    if (!$result)
        die(mysqli_error($connect));

    $n = mysqli_num_rows($result);
    $res = array();

    for ($i = 0; $i < $n; $i++) {
        $row = mysqli_fetch_assoc($result);
        $res[] = $row;
    }

    return $res;
}



function newOrderBasket($connect, $id, $name, $secName, $email, $tel, $adress, $com='0', $pay, $product) {
    $res = "INSERT INTO basketorder (id_user, name, secondName, email, tel, adress, comment, pay, product) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '$product')";
    $sql = sprintf($res, mysqli_real_escape_string($connect, $id), mysqli_real_escape_string($connect, $name), mysqli_real_escape_string($connect, $secName), mysqli_real_escape_string($connect, $email), mysqli_real_escape_string($connect, $tel), mysqli_real_escape_string($connect, $adress), mysqli_real_escape_string($connect, $com), mysqli_real_escape_string($connect, $pay));
    $result = mysqli_query($connect, $sql);
    
    if (!$result)
        die(mysqli_error($connect));
    
    else {
        header("Location: ../public/orderEnd.php");
    }
}