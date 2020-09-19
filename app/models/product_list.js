
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

product = new Schema (
    {  
        product_name       : {type: String, required: true, unique: true},
        quantity           : {type: String, required: true},
        mrp                : {type: Number, required: true},
        dp                 : {type: Number, required: true},
        created_time       : {type: Date, default: Date.now}  
    }
);
//Export model
module.exports = mongoose.model('product', product);