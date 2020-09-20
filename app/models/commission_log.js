
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

commission_log = new Schema (
    {  
        purchaser_id        : {type: Schema.Types.ObjectId, ref: 'user'},
        agent_id            : {type: Schema.Types.ObjectId, ref: 'user'},
        purches_id          : {type: Schema.Types.ObjectId, ref: 'purches_history'},
        purchaser_level     : {type: Number, required: true},
        commision_amount    : {type: Number, required: true},
        commision_per       : {type: Number, required: true},
        created_time        : {type: Date, default: Date.now}  
    }
);
//Export model
module.exports = mongoose.model('commission_log', commission_log);