<?php
$connect = mysqli_connect("localhost","root","root","ann");
$login = (!empty($_POST['login'])) ? strip_tags($_POST['login']) : "";
$pass = (!empty($_POST['pass'])) ? strip_tags($_POST['pass']) : "";

$user = file_get_contents('accountUser.tpl');
$admin = file_get_contents('accountAdmin.tpl');

$acc = "select * from users where login='$login' and pass = '$pass'";
$res = mysqli_query($connect,$acc) or die("Error:".mysqli_error($connect));

//echo $acc;

if(mysqli_num_rows($res)>0){
    $data = mysqli_fetch_assoc($res);
    setcookie("login",$login);
    setcookie("pass",$pass);
    $title = $login;
    if($data['rights']>0) {
        $content= "Добро пожаловать, ".$data['name']."!<br> <h1>User</h1>";
        $patterns = array( '/{title}/', '/{content}/' );
        $replace = array( $title, $content );
        echo preg_replace( $patterns, $replace, $user );
    }
    else {
        $content= "Добро пожаловать, ".$data['name']."! <br> <h1>Админка</h1>";
        $patterns = array( '/{title}/', '/{content}/' );
        $replace = array( $title, $content );
        echo preg_replace( $patterns, $replace, $admin );
    }
}
else {
       echo "Ошибка авторизации!";
}
