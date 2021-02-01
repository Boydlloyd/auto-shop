<?php
require "init.php";
$test=$_GET["test"];
$skipped=$_GET["skipped"];
//$query="SELECT category_paper.id,`number`,category,duration,testdate,category_categorypaper.questions FROM category_categorypaper JOIN category_maincategory ON category_categorypaper.category_id=category_maincategory.id;";
$query="SELECT category_paper.id,categorypaper_id,`number`,question_id,question FROM category_paper JOIN category_questionbank ON category_paper.question_id=category_questionbank.id WHERE categorypaper_id='$test' AND isskipped='$skipped' LIMIT 1";

//$catid=$_GET["catid"];
//$author=$_GET["author"];
//$papercode=$_GET["papercode"];
//$query="SELECT * FROM category_paper WHERE categorypaper_id='$catid' AND isskipped='$skipped' AND `number` NOT IN (SELECT qnum FROM tester_paperresult WHERE author_id='$author' AND testcode='$papercode') LIMIT 1;";
$response=array();
$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)>0){
		
		$row = $result->fetch_assoc();
		$myarray=array();
	    $myarray['id']=$row['id'];
		$myarray['questnum']=$row['number'];
		$myarray['testid']=$row['categorypaper_id'];
		$myarray['questid']=$row['question_id'];
		$myarray['question']=$row['question'];
		array_push($response, $myarray);
	}

echo json_encode($response);
//echo $result;
//echo $query;
//echo $query2;
//echo $response;
 $con->close();
?>
