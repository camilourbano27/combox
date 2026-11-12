<?php 


session_start();

if(!isset($_SESSION['userId'])){
    header('refresh:0;url=signin.html');

}else{
    $full_name = $_SESSION['fName'];
}
?>



<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UFT-8">
    <META name="viewport"content="width=device-width, initial-scale=1.0">
</head>
<body>
    username: <?php echo $full_name; ?>
    <a href="logout.php">logout</a>
    </body>
    </html>

