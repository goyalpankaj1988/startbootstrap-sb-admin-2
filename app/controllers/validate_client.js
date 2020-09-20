const messages = require('../messages.json')
const client_info = require('../models/client_info');
var mongo = require('mongodb');


exports.validate_apikey = async function(api_key) {
    return new Promise(function(resolve, reject) {
        client_info.find({iv:api_key})
        .exec(function (err,result) {
            if(err){
                reject(err)
            }
            else{
                resolve(result);
            }
        });
    });
}

