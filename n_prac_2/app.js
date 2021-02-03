// express get
const express = require('express');
const app = express();
const path = require('path');
const bodyparser = require('body-parser');

//import
const router = require('./routers/Myroute');
const connectDb = require('./db/Connect');

// ejs and view setup
const npath = path.join(__dirname, 'views');
app.set('view engine', 'ejs');
app.set('views', npath);

//body parser setup
app.use(bodyparser.urlencoded({ extended: false }));
app.use(bodyparser.json());

connectDb();
app.use(router);

app.listen(4040, () => {
  console.log('app is running on 4040');
});
