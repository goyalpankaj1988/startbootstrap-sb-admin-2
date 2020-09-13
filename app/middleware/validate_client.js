const messages = require('../messages.json');
const { use } = require('../routes');
var jwt = require('jsonwebtoken');
module.exports = function validate_client_token(req, res, next) {
  if(req.headers.token){
    let token     = req.headers.token  ;
    try {
      var decoded = jwt.verify(token, 'secret');
      let decoded_data = decoded.data.split("|")
      let role = decoded_data[0]
      let name = decoded_data[1]
      let user_id = decoded_data[2]
      req.role = role
      req.name = name
      req.user_id = user_id
      next()
      
    } catch(err) {
      res.status(messages.status.Unauthorized).json({ errors: messages.generic_messages.Unauthorized});
    }
  } 
  else{
    res.status(messages.status.BadRequest).json({ errors: messages.generic_messages.all_field});
      
  }
};
