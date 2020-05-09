<?php
if($_GET['name']=='in'):?>

<form action="in.php" method="post">
    <input type="text" id="login" name="login" placeholder="Login">
    <input type="password" id="pass" name="pass" placeholder="Password">
    <input type="submit" name="in" value="Войти">
</form>

<?php
elseif($_GET['name']=='reg'):?>

<form action="reg.php" method="post">
    <input type="text" name="login" placeholder="Login">
    <input type="text" name="name" placeholder="Name">
    <input type="password" name="pass" placeholder="Password">
    <input type="email" name="email" placeholder="Email">
    <input type="submit" name="reg" value="Регистрация">
</form>

<?php
endif;
?>
<a href="?name=in">Войти</a>|<a href="?name=reg">Регистрация</a>
