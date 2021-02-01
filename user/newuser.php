<?php
session_start();
require "../auth/init.php";
if(!isset($_SESSION['id'])){
	echo "<script>location.href='../auth/index.php'</script>";
}else{
	include('../auth/template.php');
	echo '<br/>';
}

if(isset($_POST['newuser'])){
		echo '<br/>'.$username=$_POST["username"];
		echo '<br/>'.$fname=$_POST["fname"];
		echo '<br/>'.$lname=$_POST["lname"];
		echo '<br/>'.$email=$_POST["email"];
		echo '<br/>'.$password=md5($_POST["password"]);
		echo '<br/>'.$role=$_POST["role_id"];
		$query="INSERT INTO `user` (`username`, `fname`,`lname`,`email`,`password`,`role_id`) 
	VALUES ('$username','$fname','$lname','$email','$password','$role');";

	if(mysqli_query($con,$query)){
		header("Location:viewuser.php?success=User Created Successfully!!");
	}else{
		header("Location:newuser.php?success=Failure: ".mysqli_error($con));
	}
}
?>

<div class="row">
<div class="col-2">
	
</div>
<div class="col-8">
    <div class="card">
        <div class="card-header" style="color:white;background-color: lightgrey;font-weight: bold;font-size: 1.0em;">
            <div class="row">
                <div class="col-6" style="color:black;">Crate User</div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
            </div>
        </div>
        <div class="card-body">

		<form method="POST" action="">
			<div class="form-group row">
				<label for="colUsername" class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" name="username" class="form-control" id="colUsername" placeholder="Username">
				</div>
			</div>
			
			<div class="form-group row">
				<label for="colFname" class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" name="fname" class="form-control" id="colFname" placeholder="First Name">
				</div>
			</div>

			<div class="form-group row">
				<label for="colLname" class="col-sm-2 col-form-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" name="lname" class="form-control" id="colLname" placeholder="Last Name">
				</div>
			</div>

			<div class="form-group row">
				<label for="colEmail" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" id="colEmail" placeholder="Email Address">
				</div>
			</div>

			<div class="form-group row">
				<label for="colPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" id="colPassword" placeholder="Password">
				</div>
			</div>

			<div class="form-group row">
				<label for="colRole" class="col-sm-2 col-form-label">Role</label>
				<div class="col-sm-10">
					<select name="role_id" class="form-control" id="colRole" placeholder="User Role">
					<option value='0' disabled selected>User Role</option>
						<option value='1'>Admin</option>
						<option value='2'>Monitor</option>
					</select>
				</div>
			</div>
			
			<a href="http://localhost/autoshop/user/viewuser.php" class="btn btn-default">Back</a>
				<button class="btn btn-success" type="submit" name="newuser">Submit</button>
		</form>
	
        </div>
      </div>
</div>
</div>


