<?php
session_start();
require "init.php";
	if(isset($_SESSION['id'])){
		header('location:home.php');
	}else{
		if(isset($_POST['submit'])){
			if(empty($_POST['username']) || empty($_POST['password'])){
				header("Location:index.php?login=Input Username and Password to Proceed!!");
			}else{
				$username=$_POST["username"];
				$pass=$_POST["password"];
				//$username='admin';
				//$pass='admin';
				$password=md5($pass);
				$response=array();
				$query="SELECT * FROM user WHERE username = '$username' AND password ='$password';";
				$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						$row = $result->fetch_assoc();
						$_SESSION['id']=$row['id'];
						$_SESSION['username']=$row['username'];
						$response['success']=true;
						$response['id']=$row['id'];
						$response['message']="Login Success";
						header('location:home.php');
					}else{
						$response['success']=false;
						$response['message']="Incorrect Credentials";
						header("Location:index.php?login=Incorrect Login Credentials!!");
						exit();
					}
				echo json_encode($response);
				//echo $query;
				}
			}
	}
?>
