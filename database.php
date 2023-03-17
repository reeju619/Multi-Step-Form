<?php

$servername='localhost';
$username='root';
$password='';
$dbname = ''; 

$conn = mysqli_connect($servername,$username,$password,$dbname);

//$conn = mysqli_connect("139.59.9.223" , "root" ,"aU%V9W^H4T#4","Multistep-form");

if(!$conn){
    die('Could not Connect My Sql:' .mysql_error());
 }
 
 ?>