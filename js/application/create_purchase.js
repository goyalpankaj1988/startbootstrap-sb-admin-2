

function updateQnt(id, type){
    for(i=0; i<dataJason.length; i++){
        
        if(String(id)===String(dataJason[i]._id)){
            if(type=='plus'){
                dataJason[i].unit=dataJason[i].unit+1
                dataJason[i].amount =dataJason[i].dp * dataJason[i].unit;
                
            }
            else if(type=='minus'){
                if(dataJason[i].unit > 0){
                    dataJason[i].unit=dataJason[i].unit-1
                    dataJason[i].amount =dataJason[i].dp * dataJason[i].unit;
                }
            }
            
            
        }
    }
}

$(".fa-plus-square-td").click(function(){
    var data_id = $(this).attr('data_id')
    var qntVal = Number($('#'+data_id+'_qnt').text())
    var dpVal = Number($('#'+data_id+'_dp').text())
    var total_qnt = Number($('#total_qnt').text())
    var total_amt = Number($('#total_amt').text())
    updateQnt(data_id,'plus')
    qntVal = qntVal +  1
    var amount = dpVal * qntVal
    total_qnt = total_qnt + 1
    total_amt = total_amt + dpVal
    $('#'+data_id+'_qnt').text(qntVal)
    $('#'+data_id+'_amt').text(amount)
    $('#total_qnt').text(total_qnt)
    $('#total_amt').text(total_amt)
    $('#total_amt_1').text(total_amt)
    if(total_amt > 1999){
        $('#purchase_button').show("slow")
        
    }
    console.log('plus',amount,qntVal,dpVal)
    
})

$('.fa-minus-square-td').click(function(){
    var data_id = $(this).attr('data_id')
    var qntVal = Number($('#'+data_id+'_qnt').text())
    var dpVal = Number($('#'+data_id+'_dp').text())
    var total_qnt = Number($('#total_qnt').text())
    var total_amt = Number($('#total_amt').text())
    if(qntVal>0){
        updateQnt(data_id,'minus')
        qntVal = qntVal -  1
        var amount = dpVal * qntVal
        total_qnt = total_qnt - 1
        total_amt = total_amt - dpVal
        $('#total_qnt').text(total_qnt)
        $('#total_amt').text(total_amt)
        $('#'+data_id+'_qnt').text(qntVal)
        $('#'+data_id+'_amt').text(amount)
        $('#total_amt_1').text(total_amt)
        console.log('minus',amount,qntVal,dpVal)
        if(total_amt < 2000){
            $('#purchase_button').hide("slow")
            
        }
    }
})
$('body').on('click','#purchase_button',function(){
    $('#purchase_button').hide();
    $('#dataTable').hide();
    
    $('.spinner-border').show();  
    
    // var purcheser_id= "5f5fa13b177efc6765af5405";
    var finlItem = []
    var t_amount = 0;
    for(i=0; i<dataJason.length; i++){
        t_amount = t_amount + dataJason[i].amount
        if(dataJason[i].unit > 0){
            finlItem.push(dataJason[i])
        }
    }
    var data = {
        "purcheser_id":purcheser_id,
        "item":finlItem,
        "amount":t_amount
    }
    
    $.post( "controller/add_purchase.php",data )
        .done(function(res) {
            window.location.href = "user_list.php";
        })
        .fail(function() {
            window.location.href = "create_purchase.php";
        })
    
})



