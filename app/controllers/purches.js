const messages = require('../messages.json');
var purches_history = require('../models/purches_history')


var mongo = require('mongodb');

exports.buy_product = async function(req, res) {
    if(req.role && req.name && req.user_id){
        let user_id = new mongo.ObjectID(req.user_id);
        
        let purcheser_id            = new mongo.ObjectID(req.body.purcheser_id)       
        let purched_by              =user_id        
        let item                    =req.body.item            
        let amount                  =req.body.amount            
        
        
        
        data = {
            "purcheser_id": purcheser_id, 
            "purched_by": purched_by  , 
            "item": item, 
            "amount": amount      
        }
        
        
        
        add_purches_history_table(data)
        .then(function(values){
            console.log(values)
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

function add_purches_history_table(data){
    return new Promise(function(resolve, reject) {
        var result = new purches_history(data);
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
