
<?php
//$big = scandir("images/big");
//$small = scandir("images/small");
//$path= $_GET['DOCUMENT_ROOT']."images/big/";
////print_r($big);
////print_r($small);


const SERVER = "localhost";
const DB = "ann";
const LOGIN = "root";
const PASS = "root";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Ошибка соединения с базой данных!");


?>
