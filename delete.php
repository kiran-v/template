<?php
//Db Connection
$con = mysqli_connect('localhost','root','','template');
//check connection

if (mysqli_connect_errno()){
	
	echo "Failed to connect MySql: " .mysqli_connect_error();
	
}
if(isset($_GET['qn'])){
	
	$qn = $_GET['qn'];
	
	$qry = mysqli_query($con,"DELETE FROM quest_name WHERE ID = '".$qn."'");
	$qry1 = mysqli_query($con,"Select ID FROM question WHERE ID = '".$qn."'");
	while($row = mysqli_fetch_array($qry1)){
		$qry2 = mysqli_query($con,"DELETE FROM field_option WHERE QS_ID_FK = '".$row['ID']."'");
	}
	$qry = mysqli_query($con,"DELETE FROM answer WHERE QN_ID_FK = '".$qn."'");
	
}


	header("location:index.php");

?>