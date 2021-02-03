const mongoose = require('mongoose');
// mongoose connect
const connectDb = () => {
  mongoose
    .connect('mongodb://localhost:27017/exam', {
      useCreateIndex: true,
      useFindAndModify: true,
      useNewUrlParser: true,
      useUnifiedTopology: true,
    })
    .then(() => {
      console.log('DB Connect');
    })
    .catch((e) => {
      console.log(e);
    });
};

module.exports = connectDb;
