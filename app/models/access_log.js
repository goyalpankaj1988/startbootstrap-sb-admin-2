
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

access_log = new Schema (
    {  
        ip:{type:String},
        url:{type:String},
        user_id :{type: Schema.Types.ObjectId, ref: 'user'},
        param:[],
        created_time : {type: Date, default: Date.now, expires: 7776000}  
    }
);
//Export model
module.exports = mongoose.model('access_log', access_log);