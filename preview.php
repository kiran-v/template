<?php
$con = mysqli_connect('localhost','root','','template');

//check connection

if (mysqli_connect_errno()){
	
	echo "Failed to connect MySql: " .mysqli_connect_error();
	
}
if(isset($_GET['qn'])){
$qn = $_GET['qn'];
}

$qry = mysqli_query($con,"select * from quest_name where ID='".$qn."'");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Snippet - Bootsnipp.com</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="css/jquery-1.9.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="css/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="css/bootstrap.min.js"></script>
    <script src="css/jquery.js" type="text/javascript"></script>
    
    
     <style>
     </style>
</head>
<body >
                            


    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel"><b><?php while($row = mysqli_fetch_array($qry)){ echo $row['q_name']; ?></b></h4>
          </div>
          <div class="modal-body">
          <form id="template" method="POST" action="" enctype="multipart/form-data">
              <div class="row" id="section">
                  <div id="field0">
                  <div class="col-xs-12">
                   	<div class="well">
                  		<div class="form-group">
                        <?php if (isset($_GET['success']))
						{ ?>
                                <div class="alert alert-success">
                                  <strong>*Success !</strong> Successfully create Form . back to <a href="index.php">home</a>
                                </div>
                                  <?php 
						}
								  echo "<input type='hidden' name='template' value='".$row['ID']."'/>";
								  $qry1 = mysqli_query($con,"select * from question where QN_ID_FK='".$row['ID']."'");
								  $cnt=0;
								  while($row1 = mysqli_fetch_array($qry1))
								  { 
								  		
								  		echo "<strong>".$row1['Question']."</strong></br>";
										echo "<input type='hidden' name='cnt[]' value='".$cnt."'/>";
										echo "<input type='hidden' name='question".$cnt."' value='".$row1['ID']."'/>";
										if($row1['Field_Name']=="text" || $row1['Field_Name']=="email"||$row1['Field_Name']=="password" || $row1['Field_Name']=="date" ||$row1['Field_Name']=="number"){
											$qry2 = mysqli_query($con,"select Is_required from field_option where QS_ID_FK='".$row1['ID']."'");
											$row2 = mysqli_fetch_array($qry2);
											if($row2['Is_required']!="")
											{
												echo "<input type='".$row1['Field_Name']."' class='form-control' name='answer".$cnt."' value='' required >";
											}
											else
											{
												echo "<input type='".$row1['Field_Name']."' class='form-control' name='answer".$cnt."' value='' >";
											}
											echo "</br>";
										}
										else if($row1['Field_Name']=="dropdown")
										{
										 	$qry2 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row1['ID']."'");	
											echo "<select name='answer".$cnt."' class='form-control'>";
											while($row2 = mysqli_fetch_array($qry2))
								 		 	{
												echo "<option value='".$row2['Attributes']."'>".$row2['Attributes']."</option>";
											}
											echo "</select>";
											echo "</br>";
										}
										
										else if($row1['Field_Name']=="radio")
										{
										 	$qry3 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row1['ID']."'");	
											
											while($row3 = mysqli_fetch_array($qry3))
								 		 	{
												echo "<span style='margin-right:25px'><input type='".$row1['Field_Name']."'name='answer".$cnt."' value='".$row3['Attributes']."'>".$row3['Attributes']."</span>";
											}
											echo "</br>";
										}
										
										else if($row1['Field_Name']=="checkbox")
										{
										 	$qry4 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row1['ID']."'");	
											
											while($row4 = mysqli_fetch_array($qry4))
								 		 	{
												echo "<input type='".$row1['Field_Name']."' name='answer".$cnt."[]' value='".$row4['Attributes']."'>".$row4['Attributes']."";
												echo "</br>";
											}
											echo "</br>";
										}
										
										else if($row1['Field_Name']=="textarea")
										{
										 	$qry5 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row1['ID']."'");	
											
											while($row5 = mysqli_fetch_array($qry5))
								 		 	{
												echo "<textarea name='answer".$cnt."' class='form-control'></textarea>";
											}
											echo "</br>";
										}
										else if($row1['Field_Name']=="file")
										{
										 	$qry6 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row1['ID']."'");	
											
											while($row6 = mysqli_fetch_array($qry6))
								 		 	{
												echo "<input type='".$row1['Field_Name']."' class='form-control' ".$row6['Attributes']." accept='image/*' capture='camera' name='answer".$cnt."[]'>";
											}
											echo "</br>";
										}
									$cnt++;	
								  }
								  ?> 
                                 <button type="button"  class="btn btn-warning"><a href="index.php">Cancel</a></button>     
                            <input type="submit" id="saveform" name="saveform" value="Submit" class="btn btn-success save"/> 
                            
                            <div class="alert alert-danger vaild">
                                  <strong>*Failed !</strong> Some fileds are not filed..!
                                </div> 
                         </div>
                     </div>
                    </div>
                    
              </div>
             </div>
              <?php } ?>
              <div class="clearfix"></div>
              
               </form>
          </div>
          
      </div>

  </div>
                            
 </body></html>
 <?php	
 if(isset($_POST['saveform']))
 {
	$template = $_POST['template'];
	$cnt = sizeof($_POST['cnt']);
	for ($i=0;$i<$cnt;$i++)
	{
		$question = $_POST['question'.$i];
		//$answer = $_POST['answer'.$i];
		
		if (sizeof($_POST['answer'.$i])>=2)
		{
			$answer =array();
			foreach($_POST['answer'.$i] as $ans)
			{
				$answer[] = $ans;
				
			}
			echo $answer = implode(",",$answer);
		}
		
		else if((isset($_FILES['answer'.$i])) && !empty( $_FILES['answer'.$i]["name"] ))
		{
			$answer =array();
			
			for ($j=0; $j<count($_FILES['answer'.$i]['name']); $j++) {
		 
				 $answer[] =  $_FILES['answer'.$i]['name'][$j];
				 
				 move_uploaded_file($_FILES['answer'.$i]['tmp_name'][$j],'uploads/'.$_FILES['answer'.$i]['name'][$j]);
			
			}
			echo $answer = implode(",",$answer);
			
		}
		
		else{
			
			$answer =$_POST['answer'.$i];
		}
		echo $question." -> ".$answer."</br>";
		
		
		$qry = mysqli_query($con,"insert into answers (QN_ID_FK,QS_ID_FK,Answer) values ('".$template."','".$question."','".$answer."')")or die(mysql_error());
	}
	header('location:index.php?success&qn='.$_GET["qn"].'');
 }
 ?>