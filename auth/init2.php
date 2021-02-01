<?php
$db = "autoshop";
$user ="root";
$password = "";
$server = "localhost";
$con=mysqli_connect($server,$user,$password);
$mydb=mysqli_select_db($con,$db);

  if(!$con){
      echo "No Server connection established: ".mysqli_connect_error();
    } elseif(!$mydb){
      echo "No Database Connection established: ".mysqli_connect_error();
    } elseif($con && $mydb){
      //echo "Connection... Hoory!!! ";
    }else{
      echo "Something went wrong... ";
    }
?>


