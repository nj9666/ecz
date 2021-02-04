const bodyParser = require('body-parser');
const express = require('express');
const mongoose = require('mongoose');
const app = express();
const port = 4400;
//specifying the api folder.
const homeroute = require('./route/empAPI');

//mongoose connection
mongoose.connect('mongodb://127.0.0.1:27017/egpractdata',{
     useNewUrlParser: true , useUnifiedTopology: true})
mongoose.connection.on("connected",()=>{
        console.log("Connection Succeed..");
    })
mongoose.connection.on("error",(err)=>{
        console.log("error",err);
    })

//Specifying the view engine
app.set('view engine', 'ejs');

app.use(express.static('images'));

app.use(bodyParser.urlencoded({extended:false}));

app.use('/',homeroute);

app.listen(port,()=>{
    console.log("server listening on 4400");
})

