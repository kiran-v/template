<?php
$con = mysqli_connect('localhost','root','','template');

//check connection

if (mysqli_connect_errno()){
	
	echo "Failed to connect MySql: " .mysqli_connect_error();
	
}
$qry = mysqli_query($con,"select * from quest_name");
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Templates</title>
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
              <h4 class="modal-title" id="myModalLabel"><b>Custom Templates</b></h4>
          </div>
           
          <div class="modal-body">
        	 <button type="button" class="btn btn-success create"><a href="form-creation.php"> Create new Template</a></button>
              <div class="row" id="section">
                  <div id="field0">
                  <div class="col-xs-12">
                   	<div class="well">
                  		<div class="form-group">
                           <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Template</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
								$i=1;
								while($row=mysqli_fetch_array($qry))
								{
									echo "<tr>";
									echo "<td>".$i."</td><td>".$row['q_name']."</td><td><button type='button' class='btn btn-success'><a href='preview.php?qn=".$row['ID']."'>Start</a></button><button type='button' class='btn btn-primary'><a href='edit.php?qn=".$row['ID']."'>Edit</a></button><button type='button' class='btn btn-warning'><a href='answer_list.php?qn=".$row['ID']."'>Answers</a></button></button><button type='button' class='btn btn-danger'><a href='delete.php?qn=".$row['ID']."'>Delete</a></button></td>";
									echo "</tr>";
									$i++;	
								}
								?>
                                </tbody>
                           </table>     
                                  
                         </div>
                     </div>
                    </div>
                    
                                 
                  
              </div>
             </div>
              
              
             
          </div>
          
      </div>

  </div>
                            
 </body></html>