<?php

function calc($arg1, $arg2, $operation) {
    if($arg2 == 0 && $operation == '/') {
        return "Error";
    }
    else {
    switch($operation) {
        case '+':
            return $arg1+$arg2;
        case '-':
            return $arg1-$arg2;
        case '*':
            return $arg1*$arg2;
        case '/':
            return $arg1/$arg2;
    }
    };
}

if($_POST["sub"]) {
    
   $ans = calc($_POST["arg1"], $_POST["arg2"], $_POST["sign"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    Калькулятор
    <form action="#" method="post">

        <input type="text" style="display: inline-block; width: 20px" name="arg1">

        <input type="text" style="display: inline-block; width: 10px" name="sign">

        <input type="text" style="display: inline-block; width: 20px" name="arg2">
        <input type="submit" style="display: inline-block; width: 20px; padding: 0;" name="sub" value="=">
        <div style="display: inline-block; width: 100px"><?=$ans?></div>
    </form>

</body>

</html>
