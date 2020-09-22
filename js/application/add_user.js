
$(document).ready(function(){


$( "#user" ).submit(function( event ) {
    

 	var validf = isvalidform();
	if(validf)
	{
		event.preventDefault(); // avoid to execute the actual submit of the form.

	    var form = $("#user");
	    var url = "controller/addUser.php";
	    
	    $.ajax({
	           type: "POST",
	           url: url,
	           data: form.serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	              if(data == 'success')
	              {
	              	window.location.href ='user_list.php';
	              } 
	           }
	         });

		}
	else
	{
		
	}
	
});
function isvalidform()
{
	var mobile = $("#mobile").val();
	var zipcode = $("#zipcode").val();
	var error = '';
	if(!isNaN(mobile) && mobile.length != 10)
	{
		error += 'mobile number should be number and of 10 digits';
		$("#mobile").addClass('border border-danger');
		
		
	}
	else
	{
		$("#mobile").removeClass('border border-danger');
	}
	if($.isNumeric(zipcode) == false)
	{
		error += 'postal code  should be number';
		$("#zipcode").addClass('border border-danger');
	}
	else
	{
		$("#zipcode").removeClass('border border-danger');
	}
	if ($("#state").val() === "") {
		error += 'please select state';
		$("#state").addClass('border border-danger');
   		
	}
	else
	{
		$("#state").removeClass('border border-danger');
	}
	if ($("#password").val() == $("#cpassword").val()) {
		
		$("#password").removeClass('border border-danger');
		$("#cpassword").removeClass('border border-danger');
   		
	}
	else
	{
		error += 'password and repeaat password should be same';
		$("#password").addClass('border border-danger');
		$("#cpassword").addClass('border border-danger');
	}
	if (!$("#reference_hidden").val()) {

		error += 'please add reference from';
		$("#reference").addClass('border border-danger');
   	
	}
	else
	{
		$("#reference").removeClass('border border-danger');

	}
	var msg_error = '';
	if ($("#valid_username").val() == "false") {

		msg_error += 'please validate user name';
		$("#email").addClass('border border-danger');
   	
	}
	else
	{
		var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(regex.test($("#email").val()))
		{
			$("#email").removeClass('border border-danger');
			msg_error = '';

		}
		else
		{
			msg_error += 'email not valid';
		}
  		
		

	}
	if(error || msg_error )
	{
		// event.preventDefault();
		return false;
	}
	else
	{
		return true;
	}

}

	$("#reference").keypress(function(event){
		var ref_name =$("#reference").val(); 
		$("#reference_hidden").val('');
		if(ref_name.length >= 3)
		{
			
			$.ajax({
		        url:"controller/getReferenceId.php",
		        data: { 
		        "refernce_name": ref_name
		   		},
		        type: "POST",
		        success:function(response) {
		            var obj = jQuery.parseJSON(response);
		            console.log(obj);
		            var html = '';
					$.each(obj, function(key,value) {
					  html += '<a class="dropdown-item border border-success reflist" id='+ key +' value='+ value +'>'+ value +'</a>';
					});
					
					$("#reference_list").empty();
					$("#reference_list").append(html);
					$("#reference_list").show();
		        }
	    	});
		}
	     
	});

	$("#validateemail").click(function(event){
		var email =$("#email").val(); 
		$('#email_valid').html(' ');
		$.ajax({
		        url:"controller/checkusername.php",
		        data: { 
		        "user_name": email
		   		},
		        type: "POST",
		        success:function(response) {
		           var obj = jQuery.parseJSON(response);
		           if(obj.available == true)
		           {
		           		$('#email_valid').html('&#10004;');
		           		$('#valid_username').val(true);
		           		
		           }
		           else
		           {
		           		$('#email_valid').html('&#10060;');
		           }
		            
		        }
    	});
	     
	});
	$("#reference").keypress(function(event){
		$("#reference_hidden").val( );
	});
	$('body').on('click', 'a.reflist', function() {
		var text_name = $(this).attr('value'); 
		console.log(text_name);
		$("#reference_list").hide();
		$("#reference").val(text_name);
		$("#reference_hidden").val(this.id);

	});

	function disablesubmit(action)
	{
		$('button#register').attr("disabled", action);
	}
});

