const messages = require('../messages.json');
const { use } = require('../routes');
var jwt = require('jsonwebtoken');
var access_log= require('../models/access_log')
module.exports = function validate_client_token(req, res, next) {
  if(req.headers.token){
    let token     = req.headers.token  ;
    let ip     = req.headers.ip  ;
    try {
      var decoded = jwt.verify(token, 'secret');
      let decoded_data = decoded.data.split("|")
      let role = decoded_data[0]
      let name = decoded_data[1]
      let user_id = decoded_data[2]
      req.role = role
      req.name = name
      req.user_id = user_id
      req.ip = ip
      
      data = {
        "url":req.originalUrl,
        "ip":ip,
        "param":req.body,
        "user_id":user_id
      }
      add_access_log(data)
      .then(function(){
        next()
      })
      .catch(function(error){
        console.log(error)
        res.status(messages.status.dbError).json({ errors: error });
        return;

    });
      
      
    } catch(err) {
      res.status(messages.status.Unauthorized).json({ errors: messages.generic_messages.Unauthorized});
    }
  } 
  else{
    res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
      
  }
};

function add_access_log(data){
  return new Promise(function(resolve, reject) {
    var access_log_a = new access_log(data);
    access_log_a.save(function (err) {  
        if(err){
            reject(err)
        }
        else{
            resolve(access_log._id);
        }
    });
  });
}