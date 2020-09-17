const messages = require('../messages.json');
var purches_history = require('../models/purches_history')
var user_ref = require('../models/user_ref')
var commission_log = require('../models/commission_log')
var user = require('../models/user')
var panding_amount_paid_log = require('../models/panding_amount_paid_log');


var mongo = require('mongodb');

exports.panding_amount_paid_payment = async function(req, res) {
    if(req.role && req.name && req.user_id){
        
        let purcheser_id            = new mongo.ObjectID(req.body.purcheser_id)
        let paid_by            = new mongo.ObjectID(req.user_id)
        let amount       = req.body.amount
        let miscellaneous       = req.body.miscellaneous
        data = {
            "purcheser_id": purcheser_id,
            "paid_by":paid_by,
            "amount":amount,
            "miscellaneous":miscellaneous
        }
        panding_amount_paid_payment_add(data)
        .then(function(values){
            res.status(messages.status.OK).json({"message":"amount paid succesfully"});
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 

exports.panding_amount_paid_payment_list = async function(req, res) {
    if(req.role && req.name && req.user_id){
        
        let purcheser_id            = new mongo.ObjectID(req.body.purcheser_id)
        data = {
            "purcheser_id": purcheser_id
        }
        getpanding_amount_paid_payment_list(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 


exports.purche_commission_log = async function(req, res) {
    if(req.role && req.name && req.user_id){
        
        let purches_id            = new mongo.ObjectID(req.body.purches_id)       
        data = {
            "purches_id": purches_id
        }
        getpurche_commission_log(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 

exports.purche_bill = async function(req, res) {
    if(req.role && req.name && req.user_id){
        
        let purches_id            = new mongo.ObjectID(req.body.purches_id)       
        data = {
            "_id": purches_id
        }
        getpurche_bill(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 

exports.user_commission_history = async function(req, res) {
    if(req.role && req.name && req.user_id){
        // console.log(req)
        let agent_id            = new mongo.ObjectID(req.body.agent_id)       
        // console.log(req.body.agent_id)
        data = {
            "agent_id": agent_id
        }
        getuser_commission_history(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 

exports.user_purches_history = async function(req, res) {
    if(req.role && req.name && req.user_id){
        // console.log(req.body)
        let purcheser_id            = new mongo.ObjectID(req.body.purcheser_id)       
        data = {
            "purcheser_id": purcheser_id
        }
        getuser_purches_history(data)
        .then(function(values){
            res.status(messages.status.OK).json(values);
            return
        })
        .catch(function(err){
            res.status(messages.status.dbError).json({ errors: err });
            return;
        })
    }
    else{
        res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
        return;
    }
}; 


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
        
        let promises = [];
        

        promises[0]=add_purches_history_table(data)
        promises[1]=getRefUserList(req.body.purcheser_id)
        

        Promise.all(promises).then(function(values){
            let purches_history_id   =values[0];
            let user_level_list =  values[1];
            giveCommision(user_level_list,amount,purches_history_id,purcheser_id)
            .then(function(){
                res.status(messages.status.OK).json(values);
                return
            })
            .catch(function(err){
                res.status(messages.status.dbError).json({ errors: err });
                return;
            })
            
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
function panding_amount_paid_payment_add(data){
    return new Promise(function(resolve, reject) {
        var result = new panding_amount_paid_log(data);
        result.save(function (err) {  
            if(err){
                reject(err)
            }
            else{
                user.findByIdAndUpdate({
                    "_id":data.purcheser_id
                },{
                    $inc:{paid_amonut:data.amount}
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
        });
    });
}




function getpanding_amount_paid_payment_list(data){
    return new Promise(function(resolve, reject) {
        panding_amount_paid_log
        .find(data)
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                resolve(result)
            }
        })
    });
}

function getuser_commission_history(data){
    return new Promise(function(resolve, reject) {
        console.log(data)
        commission_log
        .find(data)
        .populate('purchaser_id')
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                console.log(result)
                resolve(result)
            }
        })
    });
}

function getpurche_commission_log(data){
    return new Promise(function(resolve, reject) {
        commission_log
        .find(data)
        .populate('agent_id')
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                console.log(result)
                resolve(result)
            }
        })
    });
}

function getpurche_bill(data){
    return new Promise(function(resolve, reject) {
        purches_history
        .find(data)
        .populate('purcheser_id')
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                console.log(result)
                resolve(result)
            }
        })
    });
}
function getuser_purches_history(data){
    return new Promise(function(resolve, reject) {
        purches_history
        .find(data)
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                console.log(result)
                resolve(result)
            }
        })
    });
}



async function giveCommision(user_level_list,amount,purches_history_id,purcheser_id){
    return new Promise(function(resolve, reject) {
        var level_n = 0
        let promises = [];
        user_level_list.forEach(element=>{
            level_n++
            if(level_n==1){
                commision_per = 6
                per_amount = (amount/100)*commision_per
                data = {
                    "purchaser_id":purcheser_id,
                    "agent_id":new mongo.ObjectID(element),
                    "purches_id":new mongo.ObjectID(purches_history_id),
                    "purchaser_level":level_n,
                    "commision_amount":per_amount,
                    "commision_per":commision_per
                }
                promises.push(add_commission_log_table(data))
            }
            if(level_n==2){
                commision_per = 3
                per_amount = (amount/100)*commision_per
                data = {
                    "purchaser_id":purcheser_id,
                    "agent_id":new mongo.ObjectID(element),
                    "purches_id":new mongo.ObjectID(purches_history_id),
                    "purchaser_level":level_n,
                    "commision_amount":per_amount,
                    "commision_per":commision_per
                }
                promises.push(add_commission_log_table(data))
            }
            if(level_n==3){
                commision_per = 1
                per_amount = (amount/100)*commision_per
                data = {
                    "purchaser_id":purcheser_id,
                    "agent_id":new mongo.ObjectID(element),
                    "purches_id":new mongo.ObjectID(purches_history_id),
                    "purchaser_level":level_n,
                    "commision_amount":per_amount,
                    "commision_per":commision_per
                }
                promises.push(add_commission_log_table(data))
            }
            
            
        })
        Promise.all(promises).then(function(values){
            resolve(values)
        })
        .catch(function(error){
            reject(error)
        })

    });
}

function add_commission_log_table(data){
    return new Promise(function(resolve, reject) {
        var result = new commission_log(data);
        result.save(function (err) {  
            if(err){
                reject(err)
            }
            else{
                user.findByIdAndUpdate({
                    "_id":data.agent_id
                },{
                    $inc:{earned_amonut:data.commision_amount}
                })
                .exec(function (err,result1) {
                    if(err){
                        reject(err)
                    }
                    else{
                        resolve(result1)
                    }
                })
                // resolve(result._id);
            }
        });
    });
}

async function getRefUserList(id){
    return new Promise(function(resolve, reject) {
        let level_id = [];
        console.log(id)
        getRefUser(new mongo.ObjectID(id))        
        .then(function(level_1){
            console.log('level_1',level_1)          
            if(String(level_1.user_id)!=String(level_1.user_ref_id)){
                level_id.push(level_1.user_ref_id)                
                getRefUser(new mongo.ObjectID(level_1.user_ref_id))
                .then(function(level_2){
                    console.log("level_2",level_2)
                    if(String(level_2.user_id)!=String(level_2.user_ref_id)){
                        level_id.push(level_2.user_ref_id)
                        getRefUser(new mongo.ObjectID(level_2.user_ref_id))
                        .then(function(level_3){
                            console.log("level_3",level_3)
                            if(String(level_3.user_id)!=String(level_3.user_ref_id)){
                                level_id.push(level_3.user_ref_id)
                                resolve(level_id)
                            }
                            else{
                                resolve(level_id)
                            }
                        })
                        .catch(function(err){
                            reject(err)
                        })
                    }else{
                        resolve(level_id)
                    }
                })
                .catch(function(err){
                    reject(err)
                })
            }else{
                resolve(level_id)
            } 
            
        })
        .catch(function(error){
            reject(error)
        })
    })
}



function getRefUser(id){
    return new Promise(function(resolve, reject) {
        user_ref
        .findOne({
            "user_id":id
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

