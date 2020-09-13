const messages = require('../messages.json');
var product_list = require('../models/product_list')


var mongo = require('mongodb');

exports.add_product = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
        
        let product_name        =req.body.product_name       
        let quantity            =req.body.quantity        
        let mrp                 =req.body.mrp            
        let dp                  =req.body.dp            
        
        data = {
            "product_name":product_name,
            "quantity":quantity,
            "mrp":mrp,
            "dp":dp
        }
        
        add_product_table(data)
        .then(function(values){
            res.status(messages.status.OK).json({ "msg":"Product added succefully"});
            return;
        }).catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
        });
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
};


function add_product_table(data){
    return new Promise(function(resolve, reject) {
        var result = new product_list(data);
        result.save(function (err) {  
            if(err){
                reject(err)
            }
            else{
                resolve(result._id);
            }
        });
    });
}