<?php
require "init.php";
$id = $_POST["id"];
$value=$_POST["value"];
$query="UPDATE `category_paper` SET `isskipped`='$value' WHERE id='$id';";
	if(mysqli_query($con,$query)){
			$response="Question Skipped!!";
		}else{
			$response="Error:".mysqli_error($con);
	}
	echo $response;
	//echo $query;
	$con->close();
?>