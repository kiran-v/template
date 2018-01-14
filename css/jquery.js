$(document).ready( function (){
	var clicks = $("#cnt").val().replace("cnt","");
	$(".vaild").css("display", "none");
	$(".alert-danger").css("display", "none");
	$(".alert-success").css("display", "block").fadeOut(10000);
    
	$('#add').on('click', function(){
		
		clicks++;
   		$('#section').append('<div id ="field'+clicks+'"><div class="col-xs-8"><div class="well remove"><div class="form-group"><input type="hidden" name="num[]" id="num'+clicks+'" value="'+clicks+'"><label for="Question" class="control-label">Question</label><input type="text" class="form-control quest" id="quest'+clicks+'" class="quest" name="question'+clicks+'" value="" required=""  placeholder="Question"></div><div class="alert alert-danger"><strong>*Note !</strong> Question Field Should not be Empty !</div><div class="form-group"><label for="Answer" class="control-label">Answer</label><select id="answer'+clicks+'" class="form-control answer" name="answer'+clicks+'"><option value="0">Select your type</option><option value="text">Text</option> <option value="dropdown">Drop Down</option><option value="radio">Radio Button</option><option value="checkbox">Check Box</option><option value="textarea">Text Area</option><option value="file">File Upload</option></select></div><button class="btn btn-danger" id="'+clicks+'">remove</button></div></div> <div class="col-xs-4"><div class="well" id="option'+clicks+'">Choose your Field </div></div></div>'); // append -> object
	//alert ('#field'+clicks+' #answer'+clicks+'');
	});
	
	
	
	$('#editadd').on('click', function(){
		
		
   		$('#section').append('<div id ="field'+clicks+'"><div class="col-xs-8"><div class="well remove"> <span class="close"id="'+clicks+'" >X</span><div class="form-group"><input type="hidden" name="num[]" id="num'+clicks+'" value="'+clicks+'"><label for="Question" class="control-label">Question</label><input type="text" class="form-control quest" id="quest'+clicks+'" class="quest" name="question'+clicks+'" value="" required=""  placeholder="Question"></div><div class="alert alert-danger"><strong>*Note !</strong> Question Field Should not be Empty !</div><div class="form-group"><label for="Answer" class="control-label">Answer</label><select id="answer'+clicks+'" class="form-control answer" name="answer'+clicks+'"><option value="0">Select your type</option><option value="text">Text</option> <option value="dropdown">Drop Down</option><option value="radio">Radio Button</option><option value="checkbox">Check Box</option><option value="textarea">Text Area</option><option value="file">File Upload</option></select></div></div></div> <div class="col-xs-4"><div class="well" id="option'+clicks+'">Choose your Field </div></div></div>'); // append -> object
	//alert ('#field'+clicks+' #answer'+clicks+'');
	clicks++;
	});
	

	//$("#option"+clicks+"").html("Choose your Field");
	$(document).on("change", ".answer", function(){
		    // alert($(this).attr("id"));
			var clickid =  $(this).attr("id").replace("answer", "");
			//alert (clickid);
			//alert("#option"+clicks+"");
			var opt = this.value;
			//alert (opt);
			//alert ("#field"+clickid+" #quest"+clickid+"");
			var qst = $("#field"+clickid+" #quest"+clickid+"").val();
			//alert(qst);
			if(qst!="")
			{
				if (opt==0){ 
					$("#field"+clickid+" #option"+clickid+"").html("");
					$("#field"+clickid+" #option"+clickid+"").html("Choose your Field"); 
				}
				
				if (opt=="text"){ 
					$("#field"+clickid+" #option"+clickid+"").html("");
					$("#field"+clickid+" #option"+clickid+"").append('<input type="radio" name="type'+clickid+'" value="text"/>Text<br>');
					$("#field"+clickid+" #option"+clickid+"").append('<input type="radio" name="type'+clickid+'" value="email"/>Email id<br>');
					$("#field"+clickid+" #option"+clickid+"").append('<input type="radio" name="type'+clickid+'" value="password"/>Password<br>');
					$("#field"+clickid+" #option"+clickid+"").append('<input type="radio" name="type'+clickid+'" value="date"/>Date<br>');
					$("#field"+clickid+" #option"+clickid+"").append('<input type="radio" name="type'+clickid+'" value="number"/>Number<br>');
					$("#field"+clickid+" #option"+clickid+"").append('<input type="checkbox" name="required'+clickid+'" value="required"/>Is Required<br>');
					
				}
				
				if(opt=="dropdown")
				{
					$("#field"+clickid+" #option"+clickid+"").html("");
					$("#field"+clickid+" #option"+clickid+"").append('<input type="text" name="roption" class="form-control" id="droption" placeholder="number of options"/>');
					$("#field"+clickid+" #droption").keyup(function (e) {
					
					$("#field"+clickid+" #option"+clickid+" #dropopt").remove();
						var count = $(this).val();
						for (var i=1 ; i<=count;i++)
						{
							
							$("#field"+clickid+" #option"+clickid+"").append('<div id="dropopt"><input type="text" name="dropoption'+clickid+'[]" class="form-control" id="dropcount" placeholder="option '+i+'"/></div>');
						}
					});
				}
				
				if (opt=="radio"){
					$("#field"+clickid+" #option"+clickid+"").html("");
					
					$("#field"+clickid+" #option"+clickid+"").append('<input type="text" name="rcount" class="form-control" id="rcount" placeholder="number of values"/>');
					
					$("#field"+clickid+" #rcount").keyup(function (e) {
						
						$("#field"+clickid+" #option"+clickid+" #radiovalues").remove();
						var count = $(this).val();
						for (var i=1 ; i<=count;i++)
						{
							
							$("#field"+clickid+" #option"+clickid+"").append('<div id="radiovalues"><input type="text" name="radvalue'+clickid+'[]" class="form-control" id="radiocount" placeholder="radio '+i+'"/></div>');
						}
					});
				}
				
				
				
				if (opt=="checkbox"){
					$("#field"+clickid+" #option"+clickid+"").html(""); 
					
					$("#field"+clickid+" #option"+clickid+"").append('<input type="text" name="chcount" class="form-control" id="chcount" placeholder="number of checkbox"/>');
					
					$("#field"+clickid+" #chcount").keyup(function (e) {
						
						$("#field"+clickid+" #option"+clickid+" #checkvalues").remove();
						var count = $(this).val();
						for (var i=1 ; i<=count;i++)
						{
							
							$("#field"+clickid+" #option"+clickid+"").append('<div id="checkvalues"><input type="text" name="chvalue'+clickid+'[]" class="form-control" id="checkcount" placeholder="checkbox '+i+'"/></div>');
						}
					});
					
				}
				
				
				if (opt=="textarea"){
					$("#field"+clickid+" #option"+clickid+"").html(""); 
				}
				
				if (opt=="file"){
					$("#field"+clickid+" #option"+clickid+"").html(""); 
					//$("#field"+clickid+" #option"+clickid+"").append('<input type="checkbox" name="multiple'+clickid+'" value="multiple" />Multiple Files<br>');
				
				}
			}
			else
			{
				$(".alert-danger").css("display", "block").fadeOut(3000);
				$("#answer"+clickid+"").val('0');
				//$(".alert-danger" ).fadeOut(3000);
				$("#field"+clickid+" #quest"+clickid+"").focus();
			}
			
	});
	
	$(document).on("click", ".btn-danger", function(){
		// alert($(this).attr("id"));
		var removeid = $(this).attr("id");
		$("#quest"+removeid+"").val('');
		$("#answer"+removeid+"").val('0');
		$("#field"+removeid+" #option"+removeid+"").html("");
		$("#field"+removeid+"").remove(); 
	});
	
	$('.save').click(function(){
		
		$('input').each(function() {
			if(!$(this).val()){
			$(".vaild").css("display", "block").fadeOut(5000);
			   return false;
			}
		});
		
		if($("div input").attr("type")=="radio"){
			if($('input[type="radio"]:checked').length<1)
			{
				$(".vaild").css("display", "block").fadeOut(5000);
				 return false;
			}
		}
		if($("div input").attr("type")=="checkbox"){
			if($('input[type="checkbox"]:checked').length<1)
			{
				$(".vaild").css("display", "block").fadeOut(5000);
				 return false;
			}
		}
	});
	
	
	$(document).on("click", ".close", function(){
		 //alert($(this).attr("id"));
		var removeid = $(this).attr("id");
		$("#quest"+removeid+"").val('');
		$("#answer"+removeid+"").val('0');
		$("#field"+removeid+" #option"+removeid+"").html("");
		$("#field"+removeid+"").remove(); 
	});

});
             