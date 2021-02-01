<?php
require "init.php";
$query="SELECT category_categorypaper.id,`papercode`,category,duration,testdate,category_categorypaper.questions FROM category_categorypaper JOIN category_maincategory ON category_categorypaper.category_id=category_maincategory.id;";
//$query="SELECT * FROM category_categorypaper";
$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		$response=array();
		while($row = $result->fetch_assoc()){
		$myarray=array();
	    $myarray['id']=$row['id'];
		$myarray['papercode']=$row['papercode'];
		$myarray['category']=$row['category'];
		$myarray['duration']=$row['duration'];
		$myarray['questions']=$row['questions'];
		$myarray['testdate']=$row['testdate'];
		array_push($response, $myarray);
	}
}
	
 echo json_encode($response);
//echo $result;
 //echo $query;
 $con->close();
?>
