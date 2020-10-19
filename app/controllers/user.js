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
        // let email_id        =req.body.email_id  
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
            "email_id":user_name,
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
            if(values!=null  && values.membar_count<4){
                // console.log(values)
                let promises = [];
                promises[0]=add_user_table(data,password)
                Promise.all(promises).then(function(values){
                    let added_user_id   =values[0];
                    console.log(added_user_id)
                    adde_user_ref(added_user_id,ref_id)
                    .then(function(values){
                        res.status(messages.status.OK).json({ "msg":added_user_id});
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

exports.get_user = async function(req, res) {
  
    
    // let user_id = new mongo.ObjectID(req.user_id);
    
    let refernce_name       =req.body.refernce_name  

    data = {
        "user_name":refernce_name

    }
    console.log(data);
    getUser(refernce_name)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return;
        }).catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
        });
    
};
exports.validate_email = async function(req, res) {
  
    
    // let user_id = new mongo.ObjectID(req.user_id);
    
    let user_email       =req.body.user_email  

    data = {
        "user_email":user_email

    }
    checkEmail(user_email)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return;
        }).catch(function(error){
            res.status(messages.status.dbError).json({ errors: error });
            return;
        });
    
};

exports.registration = async function(req, res) {
  
   
        
        let user_name       =req.body.user_name       
        let password        =req.body.password        
        let name            =req.body.name            
        let role            =req.body.role            
        // let email_id        =req.body.email_id  
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
            "email_id":user_name,
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
            if(values!=null  && values.membar_count<4){
                console.log(values)
                let promises = [];
                promises[0]=add_user_table(data,password)
                Promise.all(promises).then(function(values){
                    let added_user_id   =values[0];
                    console.log(added_user_id)
                    adde_user_ref(added_user_id,ref_id)
                    .then(function(values){
                        res.status(messages.status.OK).json({ "msg":added_user_id});
                        return;
                    }).catch(function(error){
                        console.log('=========');
                        console.log(error);
                        res.status(messages.status.dbError).json({ errors: error });
                        return;
                    });
                }).catch(function(error){
                    console.log('>>>>>>');
                    console.log(error);
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
exports.update_user_password = async function(req, res) {
  
  if(req.role && req.name && req.user_id){
        // let user_id = new mongo.ObjectID(req.user_id);
                
        let password        =req.body.password

       
            updatePassword(req.body.user_id, password)
            .then(function(values){
                res.status(messages.status.OK).json({'msg':'success'});
                return;
            })
            .catch(function(err){
                console.log(err)
                res.status(messages.status.dbError).json({ errors: err });
                return;
            })
            
        
        
        
        
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 
function updatePassword(id, password){
    return new Promise(function(resolve, reject) {
        var new_user = new user();
        let password_new = new_user.generateHash(password);
        console.log(password_new,id);
        user.findByIdAndUpdate({
            "_id":new mongo.ObjectID(id)
        },{
            $set:{"password":password_new}
             
        })
        .exec(function (err,result1) {
            if(err){
                console.log(err);
                reject(err)
            }
            else{
                resolve(result1)
            }
        })
    });
}

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

async function updateMemberCount(request_data,level){
    return new Promise(function(resolve, reject) {
        level = level+1
        console.log(level)
        if(level<9 && String(request_data._id) != String(request_data.user_ref_id)){
            
            try{
                var a={}
            
                a['member_count_level'+level]=1
                user.findByIdAndUpdate({
                    "_id":new mongo.ObjectID(request_data.user_ref_id)
                },{
                    $inc:a
                    
                })
                .exec(function (err,result2) {
                    if(err){
                        reject(err)
                    }
                    else{
                        // console.log(result2);
                        updateMemberCount(result2,level)        
                    }
                })
            }
            catch{
                reject('error')
            }
            
            
        }
        else{
            resolve(level)
        }
        
    })
}

function updateChildCount(id, child_id){
    user.findByIdAndUpdate({
        "_id":id
    },
    { $inc: { "user_child_info.$[elem].child_count" : 1 } },
    { arrayFilters: [ { "elem._id": {$eq: child_id} } ] }
    )
    .exec(function (err,result1) {
        console.log(result1)
        if(err){
            // reject(err)
        }
        else{
            if(String(result1.user_ref_id)!=String(result1._id)){
                updateChildCount(result1.user_ref_id,result1._id)
            }
        }
    });
}
function updateWidthCount(id, child_id){
    user.findByIdAndUpdate({
        "_id":id
    },
    { $inc: { "user_child_info.$[elem].width" : 1 } },
    { arrayFilters: [ { "elem._id": {$eq: child_id} } ] }
    )
    .exec(function (err,result1) {
        // console.log(result1)
        if(err){
            // reject(err)
        }
        else{
            
        }
    });
}


function adde_user_ref(user_id,user_ref_id){
    return new Promise(function(resolve, reject) {
        let user_id_x = user_id
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

                // updateChildCount(user_ref_id,new mongo.ObjectID("5f79a6af5265f51f0552124b"))
                // updateWidthCount(user_ref_id,new mongo.ObjectID("5f79a6af5265f51f0552124b"))
                data = {
                    "_id":user_id_x,
                    "child_count":1,
                    "width":0
                }
                user.findByIdAndUpdate({
                    "_id":user_ref_id
                },{
                    $push:{"user_child_info":data}
                     
                })
                .exec(function (err,result1) {
                    // console.log(result1)
                    if(err){
                        // reject(err)
                    }
                    else{
                        if(String(result1.user_ref_id)!=String(result1._id)){
                            updateChildCount(result1.user_ref_id,result1._id)
                            updateWidthCount(result1.user_ref_id,result1._id)

                        }
                    }
                });

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
                                updateMemberCount(result1,1)
                                resolve(user_ref_t._id);
                                
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
function getUser(keyword) { 
    return new Promise(function(resolve, reject) {
        user
        .find({
            "user_serial_number":keyword,
            
        })
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
function checkEmail(keyword) { 
    return new Promise(function(resolve, reject) {
        user
        .find({
            "email_id":keyword,
            
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
