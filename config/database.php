<?php
//local connection
$local_host = "localhost";
$local_port = "5432";
$local_user = "postgres";
$local_dbname = "combox";
$local_password = "unicesmag";
//cloud connection

//supabase connection connection
$supa_host = "aws-0-us-east-1.pooler.supabase.com"; 
$supa_port = "6543";
$supa_user = "postgres.bbllqswkabxbdxlndjrh";
$supa_dbname = "postgres";
$supa_password = "unicesmag@@";

//cloud connection
$local_conn = pg_connect("
 host=$local_host
 port=$local_port
 dbname=$local_dbname
 user=$local_user
 password=$local_password
");

$supa_conn = pg_connect("
 host=$supa_host
 port=$supa_port
 dbname=$supa_dbname
 user=$supa_user
 password=$supa_password
");

 if (!$local_conn){
    die("Error local connection !!!");
 } else{
    echo "<br>local Connection successs!!!";
 }
 
 if (!$supa_conn){
    die("Error supa connection !!!");
 } else{
    echo "<br>supa Connection successs!!!";
 }


?>