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
        let address1        =req.body.address1       
        let address2        =req.body.address2        
        let mobile          =req.body.mobile            
        let zipcode         =req.body.zipcode            
        let state           =req.body.state  
        let country         =req.body.country 
        let account_number  =req.body.account_number  
        let ifsc            =req.body.ifsc

        data = {
            "user_name":user_name,
            "name":name,
            "role":role,
            "email_id":email_id,
            "ref_id":ref_id,
            "address1":address1,
            "address2":address2,
            "mobile":mobile,
            "zipcode":zipcode,
            "state":state,
            "country":country,
            "account_number":account_number,
            "ifsc":ifsc

        }
        check_user_ref(ref_id)
        .then(function(values){
            if(values!=null && values.first_purches=='Y' && values.membar_count<4){
                // console.log(values)
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
                console.log(error)
                res.status(messages.status.dbError).json({ errors: error });
                return;
            }
            
        })
        .catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
    
        });
        
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
};

exports.search_user = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
        
        let refernce_name       =req.body.refernce_name  

        data = {
            "user_name":refernce_name

        }
        search_userByName(refernce_name)
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

exports.get_usernetwork = async function(req, res) {
  
    if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
        
        let id       =req.body.id  

        data = {
            "id":id

        }
        getUserNetwork(new mongo.ObjectID(id))  
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


function check_user_ref(user_ref_id){
    return new Promise(function(resolve, reject) {
        user_ref_id      = new mongo.ObjectID(user_ref_id)
        
        user.findOne({
            "_id":user_ref_id
        })
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
                user.findByIdAndUpdate({
                    "_id":user_id
                },{
                    $set:{"user_ref_id":user_ref_id}
                     
                })
                .exec(function (err,result1) {
                    if(err){
                        reject(err)
                    }
                    else{
                        user.findByIdAndUpdate({
                            "_id":user_ref_id
                        },{
                            $inc:{membar_count:1}
                             
                        })
                        .exec(function (err,result1) {
                            if(err){
                                reject(err)
                            }
                            else{
                                resolve(result1)
                            }
                        })
                    }
                })
                // resolve(user_ref_t._id);
            }
        });

    })
}
function search_userByName(keyword) { 
    return new Promise(function(resolve, reject) {        
        user.aggregate([
            { $addFields: { results: { $regexMatch: { input: "$user_name", regex: keyword }  } } },
            {
                $match : { 
                    results : true,
                    "status":"Y",
                    "membar_count":{$lt:4}
                    
                }
            }
            
        ]).exec(function (err,result) {
        if(err){
            reject(err)
        }
        else{
            if(result == null)
            {
                result = {};
                resolve(result);
            }
            else
            {
                resolve(result);
            }
            
        }
        });
    });
}
function getUserNetwork(id){
    return new Promise(function(resolve, reject) {
        user_ref
        .find({
            "user_ref_id":id,
            "user_id":{$ne:new mongo.ObjectID("5f5d137ac7ab285533b75277")}
        })
        .populate('user_id')
        .limit(4)
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
