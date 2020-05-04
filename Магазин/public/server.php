<?php
include "config.php";

include "config.php";



if($_POST["sub"]) {    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $content = $_POST['content'];
    $date = date("d.m.Y");
    $sql = "insert into reviews (name, email, topic, content) values ('$name', '$email', '$topic', '$content')";
    
    if(mysqli_query($connect,$sql)){
       
    }
    else{
        echo "Error";
    };
}
 
$sql = "select * from reviews";
$res = mysqli_query($connect,$sql);

while($data = mysqli_fetch_assoc($res)){
   $post = '
   <div class="name">'.$data['name'].'</div>
            <div class="topic">'.$data['topic'].'</div>
            <div class="post">'.$data['content'].'</div>
   ' ;    
}

mysqli_close($connect);