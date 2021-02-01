<?php
$db = "d1l8hcsnv1q2ol";
$user ="jtdmhrhesrgotj";
$password = "c2151a0bc70f754f58934f0dabd7ce48e3594107c91301ebe01a2b871561f5fc";
$server = "ec2-54-216-155-253.eu-west-1.compute.amazonaws.com";
//$con=mysqli_connect($server,$user,$password);
//$mydb=mysqli_select_db($con,$db);

// Connecting, selecting database
$con = pg_connect("host=$server dbname=$db user=$user password=$password")
    or die('Could not connect: ' . pg_last_error());

  if(!$con){
      echo "No Server connection established: ".mysqli_connect_error();
    } elseif(!$mydb){
      echo "No Database Connection established: ".mysqli_connect_error();
    } elseif($con && $mydb){
      echo "Connection... Hoory!!! ";
    }else{
      echo "Something went wrong... ";
    }
?>



