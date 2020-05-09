<?php
$connect = mysqli_connect("localhost","root","root","ann");
$login = (!empty($_POST['login'])) ? $_POST['login'] : "";
$pass = (!empty($_POST['pass'])) ? $_POST['pass'] : "";
$name = (!empty($_POST['name'])) ? $_POST['name'] : "";
$email = (!empty($_POST['email'])) ? $_POST['email'] : "";

$sql = "INSERT INTO users (login, name, pass, rights, email) VALUES ('$login','$name','$pass','1','$email')";
$res = mysqli_query($connect,$sql) or die("Error:".mysqli_error($connect));

//echo $acc;

if(mysqli_query($res){
    
}
else {
       echo "Ошибка!";
}
