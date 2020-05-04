<?php
include 'config.php';
    
$tpl = file_get_contents('full.tpl');
$id = $_GET['id'];

$sql = "select * from shop where id = $id";
$res = mysqli_query($connect,$sql);
$data = mysqli_fetch_assoc($res);

$title = $data['title'];

$content = '<div class="prodFull">
           <h2>'.$data['title'].'</h2>
           <div class="l-block"><img src="img/big/'.$data['img'].'" alt="">
            <span>Price: '.$data['price'].'</span><button>Buy</button></div>
            <div class="r-block"><p>'.$data['full_info'].'</p></div>           
            </div>';

$patterns = array( '/{title}/', '/{content}/' );
$replace = array( $title, $content );
echo preg_replace( $patterns, $replace, $tpl );
