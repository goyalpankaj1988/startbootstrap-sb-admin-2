
var mongoose = require('mongoose');

var Schema = mongoose.Schema;

product = new Schema (
    {  
        product_name       : {type: String, required: true},
        quantity           : {type: String, required: true},
        mrp                : {type: Number, required: true},
        dp                 : {type: Number, required: true},
        type               : {type: String, enum:['free','paid'], default: 'paid'},
        status             : {type: String, enum:['active','inactive'], default: 'active'},
        img                :{data: Buffer, contentType: String } ,
        created_time       : {type: Date, default: Date.now}  
    }
);
//Export model
module.exports = mongoose.model('product', product);