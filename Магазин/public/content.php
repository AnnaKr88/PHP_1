<?php

include "config.php";

$sql = "select * from shop";
$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)):?>
   <div class="product-item">
    <a href="full.php?id=<?=$data['id']?>" target="_blank"><img src="img/small/<?= $data['img']?>" alt="image" style="float: left; margin: 5px 10px 15px 5px;"></a>
    <div class="desc">
        <h5><?= $data['title']?></h5>
        <p><?= $data['short_info']?></p>
        <p><b>Genre: </b> <?= $data['genre']?></p>
        <span class="price">$ <?= $data['price']?></span> <a href="full.php?id=<?=$data['id']?>" target="_blank">More..</a>
    </div>
</div>


<?php
endwhile;
?>
