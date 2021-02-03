const express = require('express');
const router = new express.Router();
const MY = require('../models/MyModel');

router.get('/', (req, res) => {
  MY.find((err, data) => {
    if (!err) {
      res.render('index.ejs', { data: data });
      console.log(data);
    }
  });
});

router.post('/adddata', (req, res) => {
  const fname = req.body.fname;
  const lname = req.body.lname;
  const email = req.body.email;

  const one = new MY({
    fname: fname,
    lname: lname,
    email: email,
  });
  one.save((err, data) => {
    if (!err) {
      console.log(data);
    }
  });
  res.redirect('/');
});

// data get
router.get('/editdata', (req, res) => {
  const id = req.query.id;
  MY.findById(id, (err, data) => {
    if (!err) {
      res.render('edit', { data: data });
    }
  });
});

// data update
router.post('/updatedata', (req, res) => {
  const id = req.query.id;
  MY.findByIdAndUpdate(
    id,
    {
      fname: req.body.fname,
      lname: req.body.lname,
      email: req.body.email,
    },
    (err, data) => {
      if (!err) {
        console.log('updated');
        res.redirect('/');
      }
    }
  );
});

module.exports = router;
