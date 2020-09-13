const messages = require('../messages.json');
const { use } = require('../routes');
var jwt = require('jsonwebtoken');
module.exports = function role_validation(req, res, next) {
  if(req.role){
    if(req.role=='admin'){
        next()
    }else{
      res.status(messages.status.Unauthorized).json({ errors: messages.generic_messages.Unauthorized});
    }
  } 
  else{
    res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
      
  }
};
