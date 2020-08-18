<?php
session_start();
require_once "config.php";

$connect = mysqli_connect(SERVER,LOGIN,PASS,DB) or die("Error: ".mysqli_error($connect));

mysqli_query($connect, "SET NAMES 'utf8'"); 
mysqli_query($connect, "SET CHARACTER SET 'utf8'");

if(!mysqli_set_charset($connect, "utf8")){
    printf("Error: ".mysqli_error($connect));
}