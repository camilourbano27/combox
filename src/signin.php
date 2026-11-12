<?php 
require ('../config/database.php');

session_start();

if(isset($_SESSION['userId'])){
    header('refresh:0;url=home.php');

}



$e_mail = $_POST['email'];
$passwd = $_POST['passwd'];
$pass_enc= md5($p_assword);

$sql = "
SELECT
u.*,
u.firstname || '' u.lastname as fullname   
FROM users u WHERE email ='$email' and password = '$pass_enc'";

$res = pg_query ($supa_conn, $sql);
if(pg_num_rows ($res) > 0){
    $row =pg_fetch_assoc($res);

    $_SESSION['userId'] = $row['id'];
    $_SESSION['FName'] = $row['firstname'];
    $_SESSION['Iname'] = $row['lastname'];

    header('refresh:0;url=home.php');
}else{
    echo"<script>alert('invalid email or password:::')</script>";
    header('refresh:0;url=signin.html');
}

?>