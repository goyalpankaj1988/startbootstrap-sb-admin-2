// Attach a submit handler to the form
$( "#add_payment" ).submit(function( event ) {
 
    // Stop form from submitting normally
    event.preventDefault();
    
    // Get some values from elements on the page:
    var $form = $( this ),
        amount = $form.find( "input[name='amount']" ).val(),
        transaction= $form.find( "input[name='transaction']" ).val(),
        remark= $form.find( "textarea[name='remark']" ).val(),
        account_number= $form.find( "input[name='account_number']" ).val(),
        ifsc= $form.find( "input[name='ifsc']" ).val(),
      url = $form.attr( "action" );
        data = {
            "purcheser_id":purcheser_id,
            "amount":amount,
            "miscellaneous":{
                "transaction":transaction,
                "remark":remark,
                "account_number":account_number,
                "ifsc":ifsc
            }
        }
        // console.log(data)
    //   console.log(amount, transaction, remark,url,purcheser_id,paying_amount)
   
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
        window.location.href = "add_payment.php";
    })
  });