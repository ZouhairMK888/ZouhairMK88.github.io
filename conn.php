<?php 
  $db_server = "localhost";
  $db_user = "root";
  $db_pass =  "";
  $db_name = "gestion_des_salles";
  $conn = mysqli_connect($db_server,$db_user,$db_pass,$db_name,3309);
  if($conn -> connect_error){
    die("connection failed".$conn->connect_error);
  }
  
?>