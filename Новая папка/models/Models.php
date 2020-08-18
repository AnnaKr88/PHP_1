<?php require_once "../config/dbconfig.php";

// Каталог товара
function getAll($connect, $table, $orderby = 'id') {
    $query = "SELECT * FROM {$table} order by {$orderby} desc";
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

function getOne($connect, $id, $table) {
    $query = sprintf("SELECT * FROM {$table} where id=%d", (int)$id);
    $result = mysqli_query($connect, $query);

    if (!$result)
        die(mysqli_error($connect));

    $res = mysqli_fetch_assoc($result);

    return $res;
}



// Пользователи

function newUser($connect, $name, $login, $email, $pass)
{

    $nu = "INSERT INTO users (name, login, email, pass, rights) VALUES ('%s','%s','%s','%s', 1)";

    $query = sprintf($nu, mysqli_real_escape_string($connect, $name), mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $email), mysqli_real_escape_string($connect, $pass));

    $result = mysqli_query($connect, $query);

    if (!$result) {
        die(mysqli_error($connect));
    }

    return true;
}

function user($connect, $login) {
    
$user = "SELECT * FROM users where login= '$login'";

$result = mysqli_query($connect, $user);

if (!$result) {
        die(mysqli_error($connect));
    }
    
    return $result;
}

//Comments

function newComment($connect, $table, $login, $name, $email, $tel, $post) {
    $com="INSERT INTO {$table} (login, name, email, tel, text) VALUES ('%s', '%s', '%s', '%d', '%s')";
    $query = sprintf($com, mysqli_real_escape_string($connect, $login), mysqli_real_escape_string($connect, $name), mysqli_real_escape_string($connect, $email), mysqli_real_escape_string($connect, $tel), mysqli_real_escape_string($connect, $post));
    
    $res = mysqli_query($connect, $query);
    if(!$res) {
        die(mysqli_error($connect));
    }
    else {
        header("Location: ../public/reviews.php");
    }
}

function changeProduct($connect, $id, $title, $price, $img, $shortInfo, $fullInfo, $genre) {
    $res = "UPDATE goods SET title='$title', price='$price', img='$img', short_info='$shortInfo', full_info='$fullInfo', genre='$genre' WHERE id = '$id'";
    $sql = mysqli_query($connect, $res);
    if(!$sql) {
        die(mysqli_error($connect));
    }
    
   return true;
}

function removeOne($connect, $table, $id) {
    $res = "DELETE FROM {$table} WHERE id = '$id'";
    $sql = mysqli_query($connect, $res);
    if(!$sql) {
        die(mysqli_error($connect));
    }
    
   return true;
}

function addNewGood($connect, $title, $price, $img, $shortInfo, $fullInfo, $genre){
    $res = "INSERT INTO goods (title, price, img, short_info, full_info, genre) VALUES ('$title', '$price', '$img', '$shortInfo', '$fullInfo', '$genre')";
    $sql = mysqli_query($connect, $res);
    if(!$sql) {
        die(mysqli_error($connect));
    }
    
   return true;
}

function changeUser($connect, $id, $login, $name, $email, $pass, $rights) {
    $res = "UPDATE users SET login='$login',name='$name',email='$email',pass='$pass',rights='$rights' WHERE id = '$id'";
    $sql = mysqli_query($connect, $res);
    if(!$sql) {
        die(mysqli_error($connect));
    }
    
   return true;
}