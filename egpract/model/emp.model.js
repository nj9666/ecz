const mongoose = require('mongoose');
const Schema = mongoose.Schema;

var EmpSchema = new Schema({
    name:{
        type: String,
        required: true
    },
    city:{
        type:String,
        required:true
    },
    image:{
        type:String,
        required:true
    }
})

module.exports = mongoose.model('employee', EmpSchema); 
//employee name table will be created in mongodb.
