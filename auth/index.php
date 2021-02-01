<?php
session_start();
require "init.php";
if(isset($_SESSION['id'])){
	echo "<script>location.href='home.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="width:40%">
	<img src="image/login.jpg"/>

	<?php
		if(@$_GET['login']==true){
	?>		

		<div class="alert-light text-danger">
			<?php echo $_GET['login'] ?>
		</div>

	<?php
		}else{

		}
	?>

		<form method="POST" action="login.php">
		<div align="center">
				<input type="text" name="username" placeholder="Enter Username" class="form-control"/>	
				<input type="password" name="password" placeholder="Password" class="form-control"/>
		</div>
			<input type="submit" name="submit" value="LOGIN" class="btn btn-success"/>
		</form>
	</div>
</body>
</html>