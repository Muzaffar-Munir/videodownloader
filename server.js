var path = require('path');
var express = require('express');
var app=express();

var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

app.use(require("./controllers/uri3.js"));



 app.listen(3000);
	console.log("server is live at port 3000");

