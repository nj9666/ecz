const express = require('express');
const mongoose = require('mongoose');
const router = express.Router();
const multer = require('multer');

const upload = multer({
    dest:"images/"})

const Emp = require('../model/emp.model');

router.get('/',(req,res)=>{

    Emp.find((err,doc)=>{
        res.render('home',{employee:doc})
    })
})

router.post('/add',upload.single('image'),(req,res)=>{
    const {name, city} = req.body;
    const image = req.file.filename;
    const emp = new Emp({
        name, city , image
    })
    emp.save().then((err,data)=>{
        if(!err){
          
            console.log("succesfully Inserted..!");

        }
        else{
            res.redirect("/");
        }
        
    }).catch(err=>{
        console.log(err);
    })
})

//Delete
router.get("/del/:id",(req,res)=>{
    Emp.findByIdAndDelete({_id:req.params.id},(err)=>{
        if(!err)
        {
            res.redirect("/");
        }
    })
})

//update & edit
router.get("/finbyid/:id",(req,res)=>{
    Emp.findByIdAndUpdate({_id:req.params.id},req.body,{new:true},(err,data)=>{
        if(!err){
            res.render("edit",{emp1:data})
        }
    })
})

router.post("/edit/:id",(req,res)=>{
    Emp.findByIdAndUpdate({_id:req.params.id},req.body,(err)=>{
        if(!err){
            res.redirect("/")
        }
    })
})


module.exports = router;