

$('body').on('click', '.userinfo', function() { 
// $('.userinfo').click(function() { 
  var modalId = $('#userdetailsModal');
  
  var html = '';
  $("#user_details").html('');
html += '<p class="mb-1"><span class="font-weight-bold">Name: </span><span class="font-weight-normal text-capitalize">'+$(this).attr('name')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Mobile: </span><span class="font-weight-normal">'+$(this).attr('mobile')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Email: </span><span class="font-weight-normal">'+$(this).attr('email_id')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Account no: </span><span class="font-weight-normal">'+$(this).attr('account')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">IFSC: </span><span class="font-weight-normal">'+$(this).attr('ifsc')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Adddress: </span><span class="font-weight-normal">'+$(this).attr('address1')+',</span><span class="font-weight-normal">'+$(this).attr('address2')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Zipcode: </span><span class="font-weight-normal">'+$(this).attr('zip')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">State: </span><span class="font-weight-normal">'+$(this).attr('state')+'</span></p>';
html += '<p class="mb-1"><span class="font-weight-bold">Country: </span><span class="font-weight-normal">'+$(this).attr('country')+'</span></p>';

  $("#user_details").html(html);

  $(modalId).modal('show');

});


$('body').on('click', '#search', function() {
	if($('#role').val() == 'admin')
	{
		var startdate = $("#startdate").val();
		var enddate = $("#enddate").val();
		var valid_date = true;
		if(!startdate)
		{
			$("#startdate").addClass('border border-danger');
			valid_date = false;

		}
		else
		{
			$("#startdate").removeClass('border border-danger');
			valid_date = true;

		}

		if(!enddate)
		{
			$("#enddate").addClass('border border-danger');
			valid_date = false;
		}
		else
		{
			$("#enddate").removeClass('border border-danger');
			valid_date = true;

		}
		

		if(valid_date)
		{
			if(Date.parse(startdate) > Date.parse(enddate)){
				$("#enddate").addClass('border border-danger');
				$("#startdate").addClass('border border-danger');
				$("#error").append('<span class="text-danger">End date should be greater than equal to start date</span>');
			}
			else
			{
				$("#enddate").removeClass('border border-danger');
				$("#startdate").removeClass('border border-danger');
				window.location = "user_list.php?start_date_param="+$("#startdate").val()+"&end_date_param="+$("#enddate").val();
				

			}
			
			


		}
		else
		{
			
		}

	} 

	

	
});


$('body').on('click', '#all_users', function() {
	if($('#role').val() == 'admin')
	{
		window.location = "user_list.php?all_users=true";
	} 

	

	
});