
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

panding_amount_paid_log = new Schema (
    {  
        purcheser_id        : {type: Schema.Types.ObjectId, ref: 'user'},
        paid_by          : {type: Schema.Types.ObjectId, ref: 'user'},
        amount              : {type: Number, required: true},
        miscellaneous              : [],
        paymet_mode         : {type: String, enum:['online','offline'], default: 'offline'},
        created_time        : {type: Date, default: Date.now}  
    }
);
//Export model
module.exports = mongoose.model('panding_amount_paid_log', panding_amount_paid_log);