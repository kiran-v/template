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
              <h4 class="modal-title" id="myModalLabel"><b>Custom Template</b></h4>
          </div>
          <div class="modal-body">
          <form id="template" method="POST" action="create.php">
              <div class="row" id="section">
                  <div id="field0">
                  <div class="col-xs-12">
                   	<div class="well">
                  		<div class="form-group">
                                  <label for="Qname" class="control-label">Questionnaire Name</label>
                                  <input type="text" class="form-control" id="qname" class="qname" name="qname" value="" required=""  placeholder="Questionnaire Name">
                                  
                         </div>
                     </div>
                    </div>
                    
                          
                              <div class="col-xs-8">
                      <div class="well">
                      		  
                          
                              <div class="form-group"><input type="hidden" name="num[]" id="num0" value="0">
                                  <label for="username" class="control-label">Question</label>
                                  <input type="text" class="form-control quest" id="quest0" class="quest" name="question0" value="" required=""  placeholder="Question">
                                  
                              </div>
                              <div class="alert alert-danger">
                                  <strong>*Note !</strong> Queston Field Should not be Empty
                                </div>
                              <div class="form-group">
                                  <label for="Answer" class="control-label">Answer</label>
                                  <select id="answer0" class="form-control answer" name="answer0">
                                      <option value="0">Select your type</option>
                                      <option value="text">Text</option>
                                       <option value="dropdown">Drop Down</option>
                                      <option value="radio">Radio Button</option>
                                      <option value="checkbox">Check Box</option>
                                      <option value="textarea">Text Area</option>
                                      <option value="file">File Upload</option>
                                  
                      		    </select>
                                  
                              </div>
                          
                      </div>
                  </div>
                  <div class="col-xs-4" >
                  	<div class="well sideoption" id="option0">
                  	 	Choose your Field
                    </div>
                  </div>
              </div>
             </div>
             <input type="hidden" value="0" id="cnt">
              <button type="button" id="add" class="btn btn-primary">Add More</button> <button type="button"  class="btn btn-warning"><a href="index.php">Cancel</a></button>
              <div class="clearfix"></div>
              
               <input type="submit" id="submit" name="submit" value="Save" class="btn btn-success save"/>
               </form>
               
          </div>
          
      </div>

  </div>
<script type="text/javascript">

</script>

                            
 </body></html>