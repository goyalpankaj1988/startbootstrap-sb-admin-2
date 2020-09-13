
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

user_ref = new Schema (
    {   
        user_id :{type: Schema.Types.ObjectId, ref: 'user'},
        user_ref_id :{type: Schema.Types.ObjectId, ref: 'user'}
    }
);
user_ref.index({ user_id: 1, user_ref_id: 1}, { unique: true });

//Export model
module.exports = mongoose.model('user_ref', user_ref);