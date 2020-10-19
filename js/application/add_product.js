// // Attach a submit handler to the form
// $( "#add_product" ).submit(function( event ) {
 
//     // Stop form from submitting normally
//     event.preventDefault();
    
//     // Get some values from elements on the page:
//     var $form = $( this ),
//         product_name = $form.find( "input[name='product_name']" ).val(),
//         quantity= $form.find( "input[name='quantity']" ).val(),
//         mrp= $form.find( "textarea[name='mrp']" ).val(),
//         dp= $form.find( "input[name='dp']" ).val(),
//         remark= $form.find( "input[name='remark']" ).val(),
//         file= $form.find( "input[name='file']" ).val(),
        
//         // files = $('#file')[0].files[0];

//         url = $form.attr( "action" );
//         // data = {
//         //     "product_name":product_name,
//         //     "quantity":quantity,
//         //     "mrp":mrp,
//         //     "dp":dp,
//         //     "remark":remark,
//         //     // "files":files
//         // }
//         // data = new FormData(this)
//         console.log($form)
//         $.ajax({
//             url: url,
//       type: "POST",
//       data:  $form
//     })
//     //   console.log(amount, transaction, remark,url,purcheser_id,paying_amount)
   
//     // Send the data using post
//     // var posting = $.post( url, data );
//     // $('.btn-success').hide()
//     // // $('#purchase_button').hide();
    
//     // $('.spinner-border').show();  
    
//     // // Put the results in a div
//     // posting.done(function( data ) {
//     //     window.location.href = "user_list.php";
//     // });
//     // posting.fail(function() {
//     //     window.location.href = "add_payment.php";
//     // })
//   });