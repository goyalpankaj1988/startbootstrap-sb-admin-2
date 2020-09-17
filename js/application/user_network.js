
$(document).ready(function(){

	
	$('body').on('click', '.user_network', function(event) {
		var layer_count = parseInt($(this).attr('layer_count'));
		var layer_class ='layer_'+layer_count;
		if( layer_count < 3 )
		{
	    

			var url = "controller/user_network_ae.php";
			var user_id = $(this).attr('user_id');
			var user_name = $(this).attr('user_name');
			$(".highlight").css('background-color','');
			$(this).closest(".highlight").css('background-color','blue');
			
			var next_layer = layer_count+1;
			if(layer_count == 1)
			{
				$(".layer_2").html(' ');
				$(".layer_3").html(' ');
			}
			else
			{
				$(".layer_"+next_layer).html(' ');

			}
			

			$.ajax({
			type: "POST",
				url: url,
				data: { id: user_id} , // serializes the form's elements.
				success: function(data)
				{
					
					var obj = jQuery.parseJSON(data);
					console.log(obj.user_count);
					var html = '';
					if( obj.user_count > 0)
					{
						
						
						// var layer_count = $("#layer").val();
						
						console.info(next_layer);
						html +='<div id="ajay">';
						html += '<div class="d-sm-flex align-items-center justify-content-between mb-4">';
						html += '<h1 class="h3 mb-0 text-gray-800 text-capitalize">'+user_name+"'s Network</h1>";
						html += '</div>';
						html += '<div class="row">';
						$.each(obj, function(key,value) {
							if(key != 'user_count')
							{
								html += '<div class="col-xl-3 col-md-6 mb-4 highlight '+layer_class+'">';
								html += '<div class="card border-left-primary shadow h-100 py-2">';
								html += '<div class="card-body">';
								html += '<div class="row no-gutters align-items-center">';
								html += '<div class="col mr-2">';
								html += '<div class="h5 mb-0 font-weight-bold text-gray-800 user_network text-capitalize" user_id="'+value.id+'" user_name="'+value.name+'" layer_count="'+next_layer+'">'+value.name+'</div>';
								html += '<div class="text-xs font-weight-bold text-primary mb-1">';
								html += '<a href="">Transaction history</a><br/>';
								html += '<a href="">Purchase history</a><br/>';
								// html += '<span>User count - 2</span>';
								html +=  '</div>';

								html += '</div>';

								html += '</div>';
								html +=  '</div>';
								html += '</div>';
								html += '</div>';
							}
							

						});
						html +='</div>';
						
						
					}
					else
					{
						html +='<div id="ajay">';
						html += '<div class="d-sm-flex align-items-center justify-content-between mb-4">';
						html += '<h1 class="h3 mb-0 text-gray-800 text-capitalize">'+user_name+"'s Network</h1>";
						html += '</div>';
						html += '<div class="row">';
						html += '<div class="col-xl-3 col-md-6 mb-4 highlight_ajay">';
						html += '<div class="card border-left-primary shadow h-100 py-2">';
						html += '<div class="card-body">';
						html += '<div class="row no-gutters align-items-center">';
						html += '<div class="col mr-2">';
						html += '<div class="h5 mb-0 font-weight-bold text-gray-800 user_network"">No user Found</div>';
						html +=  '</div>';

						html += '</div>';

						html += '</div>';
						html +='</div>';
								
					}
					$(".layer_"+next_layer).html(html);

				  // var layer_count = $("#layer").val();
				  // layer_count ++;
				  // $("#layer").val(layer_count)

				}
			});


		}

		
	});
});
