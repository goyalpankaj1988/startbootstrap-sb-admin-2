// Attach a submit handler to the form
$(document).ready(function(){
$( "#user_password" ).submit(function( event ) {
 
    // Stop form from submitting normally
    event.preventDefault();
    
    // Get some values from elements on the page:
    var $form = $( this );
    var password = $("#password").val();
    var cpassword= $("#cpassword").val();
    console.log(password);
    console.log(cpassword);
    var data = {
            "password":password
        };
    var user_id = $('#user_id').val();
    var error = '';
    if(!password)
    {
        error += 'empty password';
    }
    if(!cpassword)
    {
        error += 'empty confirm password';
    }
    if(password != cpassword)
    {
        error += 'password and confirm password not same';
    }
    if(error)
    {
        console.log(error);
        $("#password").addClass('border border-danger');
        $("#cpassword").addClass('border border-danger');
    }
    else
    {

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
        window.location.href = "update_password.php";
        })
        $("#password").removeClass('border border-danger');
        $("#cpassword").removeClass('border border-danger');

    }
    
        
  });
});