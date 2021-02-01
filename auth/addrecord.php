<?php
require "init.php";
$name = $_POST["name"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$query="INSERT INTO `student` (`name`,`email`,`contact`,`address`) VALUES ('$name','$email','$contact','$address');";
	if(mysqli_query($con,$query)){
			$response="Record Added Successfully!!";
		}else{
			$response="Error:".mysqli_error($con);
	}
	echo $response;
	$con->close();
?>