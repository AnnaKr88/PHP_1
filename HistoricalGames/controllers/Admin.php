<?php include_once "../models/ModelBasket.php";
include_once "../models/Models.php";

if(isset($_POST['productRenderId'])) {
    $product = getAll($connect, 'goods');
    
    echo json_encode($product);
}

if(isset($_POST['changeId'])){
    $id = $_POST['changeId'];
    $product = getOne($connect, $id, 'goods');
    
    echo json_encode($product);
}

if(isset($_POST['updateId'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $shortInfo = $_POST['shortInfo'];
    $fullInfo = $_POST['fullInfo'];
    $genre = $_POST['genre'];  
    
    changeProduct($connect, $id, $title, $price, $img, $shortInfo, $fullInfo, $genre);
    
}

if(isset($_POST['removeGood'])){
    $id = $_POST['removeGood'];
    
    $removeGood = removeOne($connect, 'goods', $id);
    
    echo json_encode($removeGood);
}

if(isset($_POST['addNewGood'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $shortInfo = $_POST['shortInfo'];
    $fullInfo = $_POST['fullInfo'];
    $genre = $_POST['genre'];  
    
    addNewGood($connect, $title, $price, $img, $shortInfo, $fullInfo, $genre);
    header('Location: admin.php');
    
}

if(isset($_POST['usersRenderId'])) {
    $product = getAll($connect, 'users');
    
    echo json_encode($product);
}

if(isset($_POST['changeUserId'])){
    $id = $_POST['changeUserId'];
    $product = getOne($connect, $id, 'users');
    
    echo json_encode($product);
}

if(isset($_POST['updateUserId'])){
    $id = $_POST['id'];
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rights = $_POST['rights'];  
    
    changeUser($connect, $id, $login, $name, $email, $pass, $rights);
    
}

if(isset($_POST['removeUser'])){
    $id = $_POST['removeUser'];
    
    $removeUser= removeOne($connect, 'users', $id);
    
    echo json_encode($removeUser);
}

if(isset($_POST['addNewUser'])){
    $login = $_POST['login'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $rights = $_POST['rights'];   
    
    newUser($connect, $name, $login, $email, md5($pass));
    header('Location: admin.php');
    
}