
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

purches_history = new Schema (
    {  
        purcheser_id        : {type: Schema.Types.ObjectId, ref: 'user'},
        purched_by          : {type: Schema.Types.ObjectId, ref: 'user'},
        item                : {},
        amount              : {type: Number, required: true},
        paymet_mode         : {type: String, enum:['online','offline'], default: 'offline'},
        created_time        : {type: Date, default: Date.now}  
    }
);
//Export model
module.exports = mongoose.model('purches_history', purches_history);