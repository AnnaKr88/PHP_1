<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
</head>

<body style="display: flex; padding: 10px 0; background: #FFFFE0;">
    <div class="content"><?php include "scan.php"?></div>


    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="JQ/imagelightbox.min.js"></script>
    <script>
        $(function() {
            $('a').imageLightbox();           
        });

    </script>
</body>

</html>
