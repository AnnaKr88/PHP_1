<?php include_once "../models/Models.php";


$goods = getAll($connect, 'goods');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
};

$good = getOne($connect, $id, 'goods');
