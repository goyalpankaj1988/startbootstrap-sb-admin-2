const messages = require('../messages.json');
var product_list = require('../models/product_list')


var mongo = require('mongodb');

exports.add_product = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
        console.log(req)
        let product_name        =req.body.product_name       
        let quantity            =req.body.quantity        
        let mrp                 =req.body.mrp            
        let dp                  =req.body.dp
        let type                  =req.body.type
        // let img                  =req.body.img            
        
        data = {
            "product_name":product_name,
            "quantity":quantity,
            "mrp":mrp,
            "dp":dp,
            "type":type,
            // "img":img
        }
        console.log(data)
        add_product_table(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
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

exports.update_product = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        let product_id = new mongo.ObjectID(req.body.product_id);
        let product_name        =req.body.product_name       
        let quantity            =req.body.quantity        
        let mrp                 =req.body.mrp            
        let dp                  =req.body.dp
        let type                  =req.body.type
        let status                  =req.body.status
        // let img                  =req.body.img            
        
        data = {
            "product_name":product_name,
            "quantity":quantity,
            "mrp":mrp,
            "dp":dp,
            "type":type,
            "status":status
            // "img":img
        }
        console.log(data)
        update_product_table(product_id,data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
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



exports.list_product = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        getlist_product()
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return;
        }).catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
        });
    }else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
    
}

function getlist_product(){
    return new Promise(function(resolve, reject) {
        product_list
        .find()
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                resolve(result)
            }
        })
    })
}

function update_product_table(id,data){
    return new Promise(function(resolve, reject) {
        product_list.findByIdAndUpdate({
            "_id":new mongo.ObjectID(id)
        },{
            $set:data
        })
        .exec(function (err,result1) {
            if(err){
                reject(err)
            }
            else{
                console.log(result1)
                
                resolve(result1)
            }
        })
    });
}


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
