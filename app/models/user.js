
var mongoose = require('mongoose');

var Schema = mongoose.Schema;
var bcrypt = require('bcrypt-nodejs');

userSchema = new Schema (
    {  
        user_name       : {type: String, required: true, unique: true},
        password        : {type: String, required: true},
        name            : {type: String, required: true},
        role            : {type: String, enum:['user','admin'], default: 'user'},
        email_id        : {type: String, required: true, unique: true},
        address_line_1  : {type: String},
        address_line_2  : {type: String},
        state           : {type: String},
        country         : {type: String},
        account_number  : {type: String},
        ifc_code        : {type: String},
        status          : {type: String, enum:['Y','N'], default: 'Y'},
        created_time    : {type: Date, default: Date.now}  
    }
);
// hash the password
userSchema.methods.generateHash = function(password) {
    return bcrypt.hashSync(password, bcrypt.genSaltSync(8), null);
};
  
// checking if password is valid
userSchema.methods.validPassword = function(password) {
    return bcrypt.compareSync(password, this.password);
};
//Export model
module.exports = mongoose.model('user', userSchema);