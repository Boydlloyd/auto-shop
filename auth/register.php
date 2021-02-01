<?php
require "init.php";

$username = $_POST["username"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$password2 = $_POST["password2"];

$checkusername="SELECT * FROM auth_user WHERE username = '$username';";
$resultusername=mysqli_query($con,$checkusername);
$checkemail="SELECT * FROM auth_user WHERE email = '$email';";
$resultemail=mysqli_query($con,$checkemail);
$checkmobile="SELECT * FROM account_newuser WHERE mobile = '$mobile';";
$resultmobile=mysqli_query($con,$checkmobile);
	if(mysqli_num_rows($resultusername)>0){
		$message="Username '$username' is already in use";
	} elseif (mysqli_num_rows($resultemail)>0) {
		$message="Email address '$email' is already in use";
	} elseif (mysqli_num_rows($resultmobile)>0) {
		$message="Contact No. '$mobile' is already in use";
	}else{

	$query="INSERT INTO `auth_user` (`username`, `password`,`first_name`,`last_name`,`email`,`is_active`) 
	VALUES ('$username','$password','$fname','$lname','$email',1);";

	if(mysqli_query($con,$query)){
		$query="SELECT * FROM auth_user WHERE username='$username';";

		$result=mysqli_query($con,$query);
		$row = $result->fetch_assoc();
	    $userid=$row['id'];
		
		$query="INSERT INTO `account_newuser` (`userid`, `fname`, `lname`, `accesslevel`, `mobile`, `email`, `password1`, `password2`, `description`, `role_id`, `user_id`, `code`) 
		VALUES ('$username', '$fname', '$lname', 3, '$mobile', '$email', '$password', '$password2', 'Candidate', 3, '$userid', '$password');";

		$addgroup="INSERT INTO `auth_user_groups` (`user_id`, `group_id`) VALUES ('$userid', 3);";

		if(mysqli_query($con,$query) && mysqli_query($con,$addgroup)){
			$query="SELECT id FROM account_newuser WHERE userid='$username';";
			$result=mysqli_query($con,$query);
			$row = $result->fetch_assoc();
		    $newuserid=$row['id'];

		    $query="SELECT id FROM candidate_cycle WHERE is_active=1;";
			$result=mysqli_query($con,$query);
			$row = $result->fetch_assoc();
		    $cycleid=$row['id'];

				$query="INSERT INTO `candidate_candidate` (`fname`, `lname`, `email`, `status`, `mobile`, 
						`search`, `profilepic`, `is_active`, `author_id`, `cycle_id`, `newuser_id`) 
				VALUES ('$fname', '$lname', '$email', 'Registered','$mobile', '$username $fname $lname $mobile $email', 'profile/profile.jpg', 1, '$userid', '$cycleid', '$newuserid');";
			if(mysqli_query($con,$query)){
				$message="User Registered Successfully!!";
			}else{
				$message="Error:".mysqli_error($con);
			}
		}else{
			$message="Error:".mysqli_error($con);
		}

	}else{
		$message="Error:".mysqli_error($con);
	}

	}
	$response=array('message' =>$message);
	echo json_encode($response);
	$con->close();

?>