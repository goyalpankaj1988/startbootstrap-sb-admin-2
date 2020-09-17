// Attach a submit handler to the form
$( "#add_payment" ).submit(function( event ) {
 
    // Stop form from submitting normally
    event.preventDefault();
    
    // Get some values from elements on the page:
    var $form = $( this ),
        amount = $form.find( "input[name='amount']" ).val(),
        transaction= $form.find( "input[name='transaction']" ).val(),
        remark= $form.find( "textarea[name='remark']" ).val(),
      url = $form.attr( "action" );
        data = {
            "purcheser_id":purcheser_id,
            "amount":amount,
            "miscellaneous":{
                "transaction":transaction,
                "remark":remark
            }
        }
    //   console.log(amount, transaction, remark,url,purcheser_id,paying_amount)
   
    // Send the data using post
    var posting = $.post( url, data );
   
    // Put the results in a div
    posting.done(function( data ) {
        window.location.href = "user_list.php";
    });
  });