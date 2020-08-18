<?php include "../controllers/Admin.php";
include "../controllers/User.php";
include "../controllers/Basket.php";
include "../controllers/Products.php";
$user = mysqli_fetch_assoc(user($connect, $login));

if(isset($_SESSION['login'])){
    
    if($user['rights']==0):?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="packages/font/poppins/poppins.css">
    <link rel="stylesheet" href="packages/font/poppinssemibold/poppins_semibold.css">
    <link rel="stylesheet" href="packages/font/robotocondensed/robotocondensed.css">
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>

<body class="bgcolor">
    <div id="app" class="color">
       <div id="login">
           <?php include "../templates/profile.php"?>
       </div>
        <header>
            <?php include "../templates/header.php"?>
        </header>
        <nav class="menu">
            <?php include "../templates/menu.php"?>
        </nav>
        <main>
            <h1>Админка</h1>
            <div class="buttons">
                <input type="button" value="Product" onclick="productRender()">
                <input type="button" value="Users" onclick="usersRender()">
          
           
            </div>
            <hr>
            <div class="field">
                	<script>
$(document).ready(function() {
	productRender();
});</script>
            </div>
        </main>
        <footer class="footer">
            <?php include "../templates/footer.php"?>
        </footer>
    </div>
    <script src="../js/my.js" defer></script>
</body>

</html>
<?php else:?>
<h1>Error</h1>
 <?php endif; }?>
