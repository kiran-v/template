<?php
//Db Connection
$con = mysqli_connect('localhost','root','','template');
//check connection

if (mysqli_connect_errno()){
	
	echo "Failed to connect MySql: " .mysqli_connect_error();
	
}

if(isset($_POST['edit']))
{
	$qname = $_POST['qname'];
	$qnid = $_POST['qnid'];
	
	//DELETE ALL DATAS WITH THEIS ID//
    mysqli_query($con,"Delete from quest_name where ID= '".$qnid."' ");
	
	$qsid = mysqli_query($con,"Select ID from question where QN_ID_FK= '".$qnid."' ");
	while($row = mysqli_fetch_array($qsid)){
		$ID = $row['ID'];
		mysqli_query($con,"Delete from field_option where QS_ID_FK= '".$ID."' ");
	}
	mysqli_query($con,"Delete from question where QN_ID_FK= '".$qnid."' ");
	mysqli_query($con,"Delete from answers where QN_ID_FK= '".$qnid."' ");
	
	
	//INSERT QUESTIONAIRE NAME TO TABLE
	
	$qry = mysqli_query($con,"insert into quest_name (ID,q_name) values ('".$qnid."','".$qname."')")or die(mysql_error()); 
	
	$qnid = mysqli_insert_id($con);
	
	$totalnum = sizeof($_POST['num']);
	
	for($i=0;$i<$totalnum;$i++)
	{
		if(isset($_POST['question'.$i.'']) && $_POST['question'.$i.''] != "" )
		{
			 $question = $_POST['question'.$i.'']; 
			 
			 if ($_POST['answer'.$i.'']=="text"){$field_name = $_POST['type'.$i.''];}else{$field_name = $_POST['answer'.$i.''];}
			 
			 // INSERT QUESTIONARE ID , QUESTION AND THE INPUT FIELD TO TABLE
			 
			 $qry1 = mysqli_query($con,"insert into question (QN_ID_FK,Question,Field_Name) values ('".$qnid."','".$question."','".$field_name."')")or die(mysql_error()); 
			 
			 $qsid = mysqli_insert_id($con);
			 
			 $fname = "";
			 $req = "";
			 $type = "";
			 $row = "";
			 $col ="";
			 $multi = "xz";
			 
			 
			 if($field_name=="text" ||$field_name=="password"||$field_name=="number"||$field_name=="email"||$field_name=="date")
			 {
				 $type = $_POST['type'.$i.''];
				 if(isset($_POST['required'.$i.''])){ $req =$_POST['required'.$i.''];}
				
				 // INSERT THE QUESTION ID AND ITS ATTRIBUTES
				 $qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes,Is_required) values ('".$qsid."','".$type."','".$req."')")or die(mysql_error());
			 }
			 
			  if($field_name=="dropdown")
			 {
				  $radio_num = sizeof($_POST['dropoption'.$i.'']);
				  foreach($_POST['dropoption'.$i.''] as $dropoption) 
				 {
					 // INSERT THE QUESTION ID AND ITS ATTRIBUTES	
					 $qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes) values ('".$qsid."','".$dropoption."')")or die(mysql_error()); 
				 }	
			 }
			 
			 if($field_name=="radio")
			 {
				  $radio_num = sizeof($_POST['radvalue'.$i.'']);
				  foreach($_POST['radvalue'.$i.''] as $radio) 
				 {
					 // INSERT THE QUESTION ID AND ITS ATTRIBUTES	
					 $qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes) values ('".$qsid."','".$radio."')")or die(mysql_error()); 
				 }	
			 }
			 
			 if($field_name=="checkbox")
			 {
				 $check_num = sizeof($_POST['chvalue'.$i.'']);
				 foreach($_POST['chvalue'.$i.''] as $checkbox) 
				 {
					// INSERT THE QUESTION ID AND ITS ATTRIBUTES
					$qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes) values ('".$qsid."','".$checkbox."')")or die(mysql_error());	
					  
				 }
				 
			 }
			 
			 if($field_name=="textarea")
			 {
				 $fname = "textarea";
				 
				 // INSERT THE QUESTION ID AND ITS ATTRIBUTES
				 $qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes) values ('".$qsid."','".$fname."')")or die(mysql_error());
				 
			 }
			 
			 if($field_name=="file")
			 {
				//$multi = $_POST['multiple'.$i.''];
				$multi = "";
				// INSERT THE QUESTION ID AND ITS ATTRIBUTES
				$qry2 = mysqli_query($con,"insert into field_option (QS_ID_FK,Attributes) values ('".$qsid."','".$multi."')")or die(mysql_error());
			 }
			
		}
		
		
	}
	
	header("location:index.php");
}
?>