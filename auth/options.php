<?php
require "init.php";
//$query="SELECT category_categorypaper.id,papercode,category,duration,testdate,category_categorypaper.questions FROM category_categorypaper JOIN category_maincategory ON category_categorypaper.category_id=category_maincategory.id;";
$questid=$_GET["questid"];

		$query="SELECT * FROM tester_option WHERE question_id='$questid'";
		$result=mysqli_query($con,$query);
		$response=array();
		if(mysqli_num_rows($result)>0){
			while($row = $result->fetch_assoc()){
			$myarray=array();
		    $myarray['optid']=$row['id'];
			$myarray['option']=$row['option'];
			$myarray['answer']=$row['answer'];
			$myarray['optquestid']=$row['question_id'];
			//$myarray['paper']=$paper;
			array_push($response, $myarray);
		}
		echo json_encode($response);
	}else{
	$response='[{"optid":"0","option":"NONE","answer":"0","optquestid":"0","paper":"0"}]';
	echo $response;
}

 //echo json_encode($response);
 
 #echo $query;
 $con->close();
?>
