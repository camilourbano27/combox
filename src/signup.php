<?php

//get data base connection
require('../config/database.php');
//get data from html form (client)
$f_name = $_POST['fname'];
$l_name = $_POST['lname'];
$m_phone = $_POST['fphone'];
$e_mail = $_POST['email'];
$p_assword = $_POST['pswd'];
$pass_enc = md5($p_assword);
$photo = 'photos/users'


// sql to validate if users already exists
$sql_validation = "

SELECT
   u.email
   FROM
   users u
   WHERE
   u.email = '$e_mail'

"; 
//prepare query

$sql="
 INSERT INTO users(
 firstname, lastname, mobile_phone, email, password, photo_url
 )
 VALUES(
  '$f_name','$l_name','$m_phone','$e_mail','$pass_enc', '$photo'
  )
  ";
  //$local_res = pg_query($local_conn, $sql);
  $supa_res = pg_query($supa_conn, $sql_validation);
  $total = pg_fetch_result($supa_res, 0, 0); 

  if($total > 0){
   
  echo "<script>alert('User email alrrready exists :::')</script>";
   HEADER('refresh:0;url=signin.html');
  
   }else{
   
   //prepare query

$sql="
 INSERT INTO users(
 firstname, lastname, mobile_phone, email, password
 )
 VALUES(
  '$f_name','$l_name','$m_phone','$e_mail','$pass_enc'
  )
  ";

  
 
  if (!$supa_res){
    echo "User has been created successfully into supa database!!!";
 } else{
    echo "User hasn't been created into supa database !!!";
 }
 echo "<script>('User hasn't been created successfully :::')</script>";
 HEADER('refresh:0;url=signin.html');

  }
  

 
  if (!$supa_res){
    echo "User has been created successfully into supa database!!!";
 } else{
    echo "User hasn't been created into supa database !!!";
 }
 echo "<script>('User hasn't been created successfully :::')</script>";
 HEADER('refresh:0;url=signin.html');
  
?>