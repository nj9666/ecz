const mongoose = require('mongoose');

const my_model = new mongoose.Schema({
  fname: String,
  lname: String,
  email: String,
});

const MY = new mongoose.model('MY', my_model);

module.exports = MY;
