

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
				window.location = "all_purchase_log.php?start_date="+$("#startdate").val()+"&end_date="+$("#enddate").val();
				

			}
			
			


		}
		else
		{
			
		}

	} 

	

	
});
