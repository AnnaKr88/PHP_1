<?php
include "config.php";

$id = $_GET['id'];
$seen = $_GET['seen'];

//print_r($_GET);
$sql = "update image set seen = $seen where id = $id";

if(mysqli_query($connect,$sql)){
    echo "Success!!!";
}
else{
    echo "Error";
};
