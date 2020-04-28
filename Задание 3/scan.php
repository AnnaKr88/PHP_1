
<?php
$big = scandir("images/big");
$small = scandir("images/small");
$path= $_GET['DOCUMENT_ROOT']."images/big/";
//print_r($big);
//print_r($small);
for($i=2;$i<count($small);$i++) {
    if(in_array($small[$i], $big)):?>
<div class="img" id="img_<?=$i?>">
    <a href="<?=$path.$small[$i]?>" data-imagelightbox="c">
        <img src="images/small/<?=$small[$i]?>">
    </a>
</div>
<?php 
endif;
};
?>