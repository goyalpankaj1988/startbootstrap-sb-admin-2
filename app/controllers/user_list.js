const messages = require('../messages.json');
var user = require('../models/user')


var mongo = require('mongodb');
const { data } = require('jquery');

exports.user_list = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        let data = {}
        if(req.role=='admin'){
            if(req.body.start_date && req.body.end_date){
                let start_date            = new Date(req.body.start_date)      
                let end_date            = new Date(req.body.end_date)     
                data = {
                    "created_time" : 
                    {
                        "$gte" : start_date, 
                        "$lt" : end_date 
                    }
                }
            }
            else{
                data={}
            }
            
        }
        else{
            data = {"_id":new mongo.ObjectID(req.user_id)}
        }
        getuser_list(data)
        .then(function(values){
            let resultData = []
            // console.log(values)
            // for (i=0; i<values.length; i++){
            //     console.log(values[i].user_ref_id.name)
            //     data_array = {
            //         // "role":values[i].role,
            //         "name":values[i].name,
            //         "status":values[i].status,
            //         "earned_amonut":values[i].earned_amonut,
            //         "paid_amonut":values[i].paid_amonut,
            //         "created_time":values[i].created_time,
            //         "account_number":values[i].account_number,
            //         "ifsc":values[i].ifsc,
            //         "user_ref_id":values[i].user_ref_id._id,
            //         "user_ref_name":values[i].user_ref_id.name,
            //         "membar_count":values[i].membar_count,
            //         "_id":values[i]._id
            //     }
            //     console.log(data_array)
            //     resultData.push(data_array)
            // }
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

function getuser_list(data){
    return new Promise(function(resolve, reject) {
        user
        .find(data)
        .populate('user_ref_id')
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
