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
   
    
    
     <style>
     </style>
</head>
<body>
 <?php
//Db Connection
$con = mysqli_connect('localhost','root','','template');
//check connection
if (mysqli_connect_errno()){
echo "Failed to connect MySql: " .mysqli_connect_error();
}

$qn = $_GET['qn'];

$qry = mysqli_query($con,"select * from quest_name where ID='".$qn."'");
while($row = mysqli_fetch_array($qry)){ 
 ?>                           
		
    <div id="login-overlay" class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel"><b>Custom Template</b></h4>
          </div>
          <div class="modal-body">
          <form id="template" method="POST" action="updation.php">	
              <div class="row" id="section">
              
                  
                  <div class="col-xs-12">
                   	<div class="well">
                  		<div class="form-group">
                                  <label for="Qname" class="control-label">Questionnaire Name</label>
                                  
                                  <input type="text" class="form-control" id="qname" class="qname" name="qname" value="<?php echo $row['q_name'];?>" required=""  placeholder="Questionnaire Name"/>
                                  <input type="hidden" name="qnid" class="qnid" id="qnid" value="<?php echo $row['ID']; } ?>"/>
                                  
                         </div>
                     </div>
                    </div>
                    <?php
					$pr="";
					$qry2 = mysqli_query($con,"select * from question q join field_option f on f.QS_ID_FK=q.ID where q.QN_ID_FK='".$qn."'"); 
					$c=0;
					while($row2 = mysqli_fetch_array($qry2)){
						if($pr!=$row2['Question']){
						$pr = $row2['Question'];
						
					?>	
                    <div id="field<?php echo $c;?>">
                       
                          <div class="col-xs-8">
                     	 	<div class="well">
                      		  <span class="close" id="<?php echo $c; ?>">X</span>
                          
                              <div class="form-group">
                              	<input type="hidden" name="num[]" id="num<?php echo $c; ?>" value="<?php echo $c; ?>">
                                  <label for="username" class="control-label">Question</label>
                                  <input type="hidden" name="qsid<?php echo $c; ?>" id="qsid<?php echo $c; ?>" value="<?php echo $row2['ID']; ?>">
                                  <input type="text" class="form-control quest" id="quest<?php echo $c; ?>" class="quest" name="question<?php echo $c; ?>" value="<?php echo $row2['Question']; ?>" required=""  placeholder="Question">
                                  
                              </div>
                              <div class="alert alert-danger">
                                  <strong>*Note !</strong> Queston Field Should not be Empty
                              </div>
                              <div class="form-group">
                                  <label for="Answer" class="control-label">Answer</label>
                                  <select id="answer<?php echo $c; ?>" class="form-control answer" name="answer<?php echo $c; ?>">
                                      <option value="0">Select your type</option>
                                      <option value="text" <?=$row2['Field_Name'] == 'text'||'password'||'number'||'email'||'date' ? ' selected="selected"' : '';?>>Text</option>
                                      <option value="dropdown" <?=$row2['Field_Name'] == 'dropdown' ? ' selected="selected"' : '';?>>Drop Down</option>
                                      <option value="radio" <?=$row2['Field_Name'] == 'radio' ? ' selected="selected"' : '';?>>Radio Button</option>
                                      <option value="checkbox" <?=$row2['Field_Name'] == 'checkbox' ? ' selected="selected"' : '';?>>Check Box</option>
                                      <option value="textarea" <?=$row2['Field_Name'] == 'textarea' ? ' selected="selected"' : '';?>>Text Area</option>
                                      <option value="file" <?=$row2['Field_Name'] == 'file' ? ' selected="selected"' : '';?>>File Upload</option>
                      		 	   </select>
                               </div>
                      </div>
                  </div>
                  <div class="col-xs-4"> 
                  	<div class="well" id="option<?php echo $c;?>"> 
                  	 	<?php
						if ($row2['Field_Name']=='text'||$row2['Field_Name']=='password'||$row2['Field_Name']=='number'||$row2['Field_Name']=='email'||$row2['Field_Name']=='date')
						{
							?>
                            <input type="radio" name="type<?php echo $c; ?>" value="text" <?=$row2['Field_Name'] == 'text' ? ' checked' : '';?>/>Text<br>
                            <input type="radio" name="type<?php echo $c; ?>" value="email" <?=$row2['Field_Name'] == 'email' ? ' checked' : '';?>/>Email id<br>
                            <input type="radio" name="type<?php echo $c; ?>" value="password" <?=$row2['Field_Name'] == 'password' ? ' checked' : '';?>/>Password<br>
                            <input type="radio" name="type<?php echo $c; ?>" value="date" <?=$row2['Field_Name'] == 'date' ? ' checked' : '';?>/>Date<br>
                            <input type="radio" name="type<?php echo $c; ?>" value="number" <?=$row2['Field_Name'] == 'number' ? ' checked' : '';?>/>Number<br>
                            <input type="checkbox" name="required" value="required" <?=$row2['Is_required'] == 'required' ? ' checked' : '';?>/>Is Required<br>
                            <?php
						}
						
						if ($row2['Field_Name'] == 'radio')
						{
							$qry3 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row2['QS_ID_FK']."'"); 
							
							while($row3 = mysqli_fetch_array($qry3)){
							?>
								<input type="radio" name="radvalue<?php echo $c; ?>" value="<?php echo $row3['Attributes'] ?>"/><?php echo $row3['Attributes'] ?><br>
							<?php
							}
						}
						
						if ($row2['Field_Name'] == 'checkbox')
						{
							$qry3 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row2['QS_ID_FK']."'"); 
								
							while($row3 = mysqli_fetch_array($qry3)){
							?>
                            	<input type="text" name="radvalue<?php echo $c; ?>"  class="form-control"  value="<?php echo $row3['Attributes'] ?>"/><br>
                            <?php
							}
						}
						if ($row2['Field_Name'] == 'dropdown')
						{
							$qry3 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row2['QS_ID_FK']."'"); 
							
							while($row3 = mysqli_fetch_array($qry3)){
							?>
                            	<div id="dropopt"><input type="text" name="dropoption<?php echo $c; ?>" value="<?php echo $row3['Attributes'] ?>" class="form-control" id="dropcount" placeholder="option"/></div><br>
                            <?php
							}
						}
						
						if ($row2['Field_Name'] == 'textarea')
						{
							
						}
						
						if ($row2['Field_Name'] == 'file')
						{
							
							$qry3 = mysqli_query($con,"select * from field_option where QS_ID_FK='".$row2['QS_ID_FK']."'"); 
						
							while($row3 = mysqli_fetch_array($qry3)){
								if($row3['Attributes']=="multiple"){
								//	echo "<input type='checkbox' name='multiple' multiple checked value='".$row3['Attributes']."'/>".$row3['Attributes']."<br>";
								}
								else{
                            		//echo "<input type='checkbox' name='filetype".$c."' multiple value='multiple'/>Multiple<br>";
								}
							}
						}
						?>
                    </div>
                  </div>
                 </div>
                 
                  <?php 
				  }
				   
				  $c++;
				  
					}
				  ?>
              
             </div>
              <input type="hidden" value="cnt<?php echo $c;?>" id="cnt">
              <button type="button" id="editadd" class="btn btn-primary">Add More</button>
               <button type="button"  class="btn btn-warning"><a href="index.php">Cancel</a></button>
              <div class="clearfix"></div>
               <input type="submit" id="submit" name="edit" value="Update" class="btn btn-success save"/>
               </form>
          </div>
          
      </div>

  </div>


                            
 </body>
 <footer>
  <script src="css/jquery.js" type="text/javascript"></script>
 </footer>
 </html>