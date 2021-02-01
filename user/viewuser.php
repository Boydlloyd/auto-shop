<?php
session_start();
require "../auth/init.php";
if(!isset($_SESSION['id'])){
	echo "<script>location.href='../auth/index.php'</script>";
}else{
	include('../auth/template.php');
	
	echo '<br/><h3>Users</h3>';
	$query="SELECT * FROM user;";
	$result=mysqli_query($con,$query);
	$response=array();
	if(mysqli_num_rows($result)>0){
		while($row = $result->fetch_assoc()){
			$myarray=array();
			$myarray['id']=$row['id'];
			$myarray['username']=$row['username'];
			$myarray['fname']=$row['fname'];
			$myarray['lname']=$row['lname'];
			$myarray['role']=$row['role_id'];
			$myarray['active']=$row['is_active'];
			$myarray['email']=$row['email'];
			$myarray['datecreated']=$row['datecreated'];
			array_push($response, $myarray);	
	}
}else{
	$records = json_encode($response);	
}

//echo json_encode($response);
$records = json_encode($response);
//echo $records;
$records = json_decode($records);
//echo $records;
//print_r($records);
 //echo $query;
 $con->close();
}
?>

<div class="row">
<div class="col-2">
	<?php include('usermenu.html');?>
</div>
<div class="col-10">
    <div class="card">
        <div class="card-header" style="color:white;background-color: lightgrey;font-weight: bold;font-size: 1.0em;">
            <div class="row">
                <div class="col-6"></div>
                <div class="col-2"></div>
                <div class="col-2"></div>
                <div class="col-2">
				
				</div>
            </div>
        </div>
        <div class="card-body">
<?php
		echo '<table class="table table-striped table-hover">
		<thead>
			<th>#</th>
			<th>Username</th>
			<th>FName</th>
			<th>LName</th>
			<th>Email</th>
			<th>Role</th>
			<th>Status</th>
			<th>Datecreated</th>
			<th><a href="newuser.php" class="btn btn-success btn-sm">New User</a></th>
			
		</thead>';

		foreach($records as $record){
			echo '<tr>
					<td>'.$record->id.'</td>
					<td>'.$record->username.'</td>
					<td>'.$record->fname.'</td>
					<td>'.$record->lname.'</td>
					<td>'.$record->email.'</td>
					<td>'.$record->role.'</td>
					<td>'.$record->active.'</td>
					<td>'.$record->datecreated.'</td>
					<td><a href="newuser.php" class="btn btn-primary btn-sm">Edit</a></td>
				  </tr>';
			}
echo '</table>';
?>
        </div>
      </div>
</div>
</div>
