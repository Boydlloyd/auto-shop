<?php
session_start();
//unset($_SESSION["id"]);
//unset($_SESSION["username"]);
//session_destroy();
//header("location:index.php?login=");

if(isset($_SESSION['id'])){
	unset($_SESSION["id"]);
	session_destroy();
	echo "<script>location.href='index.php'</script>";
}else{
	echo "<script>location.href='index.php'</script>";
}
?>
