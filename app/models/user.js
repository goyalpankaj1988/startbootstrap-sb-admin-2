
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
        address1  : {type: String, required: true},
        address2  : {type: String},
        mobile          : {type: String, required: true},
        zipcode         : {type: String, required: true},
        state           : {type: String, required: true},
        country         : {type: String, required: true},
        account_number  : {type: String, required: true},
        ifsc             : {type: String, required: true},
        status          : {type: String, enum:['Y','N'], default: 'Y'},
        earned_amonut   : {type:Number, default:0},
        total_purchase_amonut   : {type:Number, default:0},
        paid_amonut     : {type:Number, default:0},
        user_ref_id :{type: Schema.Types.ObjectId, ref: 'user'},
        first_purches :{type: String, enum:['Y','N'], default: 'N'},
        membar_count :{type:Number, default:0, min:0, max:4},
        member_count_level2 :{type:Number, default:0, min:0, max:16},
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