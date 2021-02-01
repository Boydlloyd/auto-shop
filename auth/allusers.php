<?php
require "init.php";
$query="SELECT * FROM auth_user;";
$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		//$response['mytests']=array();
		$response=array();
		while($row = $result->fetch_assoc()){
		$myarray=array();
	    $myarray['id']=$row['id'];
		$myarray['username']=$row['username'];
		$myarray['email']=$row['email'];
		$myarray['datecreated']=$row['date_joined'];
		array_push($response, $myarray);
	}
}
	
 echo json_encode($response);
//echo $result;
 //echo $query;
 $con->close();
?>
