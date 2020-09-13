const messages = require('../messages.json');
var user = require('../models/user')
var user_ref = require('../models/user_ref')


var mongo = require('mongodb');

exports.add_user = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
        
        let user_name       =req.body.user_name       
        let password        =req.body.password        
        let name            =req.body.name            
        let role            =req.body.role            
        let email_id        =req.body.email_id  
        let ref_id          =req.body.ref_id 

        data = {
            "user_name":user_name,
            "name":name,
            "role":role,
            "email_id":email_id
        }
        let promises = [];
        promises[0]=add_user_table(data,password)
        Promise.all(promises).then(function(values){
            let added_user_id   =values[0];
            console.log(added_user_id)
            adde_user_ref(added_user_id,ref_id)
            .then(function(values){
                res.status(messages.status.OK).json({ "msg":"user added succefully"});
                return;
            }).catch(function(error){
                res.status(messages.status.dbError).json({ errors: error });
                return;
            });
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

function add_user_table(data,password){
    return new Promise(function(resolve, reject) {
        var new_user = new user(data);
        new_user.password = new_user.generateHash(password);
        new_user.save(function (err) {  
            if(err){
                reject(err)
            }
            else{
                resolve(new_user._id);
            }
        });
    });
}

function adde_user_ref(user_id,user_ref_id){
    return new Promise(function(resolve, reject) {
        user_id      = new mongo.ObjectID(user_id)
        user_ref_id      = new mongo.ObjectID(user_ref_id)
        var user_ref_t = new user_ref({
            "user_id":user_id,
            "user_ref_id":user_ref_id

        })
        user_ref_t.save(function (err) {  
            if(err){
                reject(err)
            }
            else{
                resolve(user_ref_t._id);
            }
        });

    })
}
function search_user(keyword) { 
    return new Promise(function(resolve, reject) {        
        user.aggregate([
            { $addFields: { results: { $regexMatch: { input: "$user_name", regex: keyword }  } } },
            {$match : { results : true }}
        ]).exec(function (err,result) {
        if(err){
            reject(err)
        }
        else{
            resolve(result);
        }
        });
    });
}