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
    <title></title>
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
              <h4 class="modal-title" id="myModalLabel"><b>Form : <?php while($row = mysqli_fetch_array($qry)){ echo $row['q_name']; }?></b></h4>
          </div>
          <div class="modal-body">
          <form id="template" method="POST" action="" enctype="multipart/form-data">
              <div class="row" id="section">
                  <div id="field0">
                  <div class="col-xs-12">
                   	<div class="well">
                    <?php $qry2 = mysqli_query($con,"select * from question where QN_ID_FK='".$qn."'"); ?>
                  		  <table class="table table-striped">
                                <thead>
                                  <tr>
                                 
                                    <?php while($row2 = mysqli_fetch_array($qry2))
									{ 
										echo "<th>".$row2['Question']."</th>"; 
									}
									?>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php 
								 $qry2 = mysqli_query($con,"select * from question where QN_ID_FK='".$qn."'");
								 $i = 1;
								 $cn=0;
								 $j=mysqli_num_rows($qry2);
								 $qry4 =  mysqli_query($con,"select count(*) cn from question where `QN_ID_FK`='".$qn."'");
								 $num = mysqli_fetch_array($qry4);
								 $num1=$num['cn'];
								
								 $qry3 = mysqli_query($con,"SELECT * FROM `answers` WHERE `QN_ID_FK`='".$qn."'");
								 echo "<tr>"; $cn= 1;
								 while($row2 = mysqli_fetch_array($qry3))
								 
									{ 
										
										echo "<td>".$row2['Answer']."</td>"; 
										
										if($cn==$num1)
										{
											 echo "</tr><tr>";
											 
											 $cn=0;
											 $i++;
										}
										$cn++;
										
									}
								?>
                                </tbody>
                               
                           </table>   
                     </div>
                    </div>
                    
              </div>
             </div>
             
              <div class="clearfix"></div>
              
               </form>
               <button type="button"  class="btn btn-warning"><a href="index.php">Back</a></button>
          </div>
          
      </div>

  </div>
                            
 </body></html>
