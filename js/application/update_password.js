// Attach a submit handler to the form
$('body').on('submit', '#user', function() { 
 
    event.preventDefault();
    var error = '';
    var password = $("#password").val();
    var cpassword= $("#cpassword").val();
    var user_id = $("#user_id").val();
    console.log(password);
    console.log(cpassword);
    if(password === cpassword)
    {
        
    }
    else
    {
        error += 'password and confirm password not same';

    }
    if(error != '')
    {
        
        $("#password").addClass('border border-danger');
        $("#cpassword").addClass('border border-danger');
    }
    else
    {

    
        // Get some values from elements on the page:
        $("#password").removeClass('border border-danger');
        $("#cpassword").removeClass('border border-danger');
        var $form = $( this );
        
        console.log(password);
        console.log(cpassword);
        var data = {
                "password":password,
                "user_id":user_id
            };
        
        
        var url = 'controller/update_password.php';
        // Send the data using post
        var posting = $.post( url, data );
        $('.btn-success').hide()
        // $('#purchase_button').hide();

        $('.spinner-border').show();  

        // Put the results in a div
        posting.done(function( data ) {
        window.location.href = "user_list.php";
        });
        posting.fail(function() {
        window.location.href = "update_password.php?id="+user_id;
        })
        

    }
   
    
        
  });
