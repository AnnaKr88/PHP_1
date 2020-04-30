<?php 
include "config.php";

$sql = "select * from image";
$res = mysqli_query($connect,$sql);

?>
<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script>
    function amount(seen, id) {
    seen++;
    let str = "seen="+seen+"&id="+id;
       console.log(seen, id);
       $.ajax({
            type:'GET',//тип запроса
            url:'server.php',//файл, принимающий данные
            data:str,
            success: function(answer){
                console.log(answer);
            }            
        })  
        
    };

</script>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="display: flex; padding: 10px 0; background: #FFFFE0;">

    <div class="content">
        <?php 
    while($data = mysqli_fetch_assoc($res)):?>
        <div class="img">
            <a href="<?=$data['path']?>/big/<?=$data['name']?>" id="big_<?= $data['id']?>" onclick="amount(<?=$data['seen']?>, <?=$data['id']?>)" target="_blank">
                <img src="<?=$data['path']?>/small/<?=$data['name']?>">
            </a>
            <p class="oko"><?= $data['seen']?></p>
        </div>
        <?php 
endwhile;
?>
    </div>

    
   

</body>

</html>
