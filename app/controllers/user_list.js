const messages = require('../messages.json');
var user = require('../models/user')


var mongo = require('mongodb');

exports.user_list = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        if(req.role=='admin'){
            data = {}
        }
        else{
            data = {"_id":new mongo.ObjectID(req.user_id)}
        }
        getuser_list(data)
        .then(function(values){
            let resultData = []
            // console.log(values)
            for (i=0; i<values.length; i++){
                data_array = {
                    // "role":values[i].role,
                    "name":values[i].name,
                    "status":values[i].status,
                    "earned_amonut":values[i].earned_amonut,
                    "paid_amonut":values[i].paid_amonut,
                    "created_time":values[i].created_time,
                    "account_number":values[i].account_number,
                    "ifsc":values[i].ifsc,
                    "_id":values[i]._id
                }
                // console.log(data_array)
                resultData.push(data_array)
            }
            res.status(messages.status.OK).json(resultData);
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

function getuser_list(data){
    return new Promise(function(resolve, reject) {
        user
        .find(data)
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
