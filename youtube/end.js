var http=require("http");
var express=require("express");
var bodyParser = require('body-parser');
var app=express();

app.use(bodyParser());

app.post("/url",function(req,res){
	var urllink=req.body.link;
	//console.log('Hello Link'+a);
	// var li=JSON.stringify(req.body);
	// var obj = JSON.parse(li);
	// var link=obj['url']['link'];
	console.log('data sending From '+urllink);
		res.send('data senting from '+urllink);
		//res.send('data is downloading');
var fs = require('fs');

var youtubedl = require('youtube-dl');
var a;
var video = youtubedl(urllink,
  // Optional arguments passed to youtube-dl.
  ['--format=18'],
  // Additional options can be given for calling `child_process.execFile()`.
  { cwd: __dirname });
// Will be called when the download starts.
video.on('info', function(info) {
	a=info.filename;

  console.log('Download started');
  console.log('File Downloaded on '+__dirname+'/ directory')
  console.log('filename: ' + info.filename);
  console.log('size: ' + info.size);
   console.log('file '+info._filename+' successfully downloaded');
   video.pipe(fs.createWriteStream(info._filename));
   
});

// var vidl = require('vimeo-downloader');
// // vidl('https://vimeo.com/183482793')
// //   .pipe(fs.createWriteStream('video.mp4'));
// a=info.filename;

//   vidl(link, { quality: '360p' })
//   .pipe(fs.createWriteStream('vide.mp4'));
//   console.log('your File is downloaded having name'+a)
 
res.send('sending Back info of video'+urllink);

		
});
app.post("/data",function(req,res){
	var user = {};
	console.log('data Sent');
	res.send('<h2>Hello express</h2>');
 //    user.u_name = req.body.u_name;
 //    user.u_pass = req.body.u_pass;
 //    db('user').create(user, function(err, model) {
 //        if (err)
 //            console.log("Error occurred " + err);
 //        res.json(model)
 //    });
	// res.json(req.params.body);
	
	
});
app.post("/video",function(req,res){
var na=req.body.url;
console.log('we have found your data from '+na);
res.json('We have received data from '+na);


// 	var li=JSON.stringify(req.body);
// 	var obj = JSON.parse(li);
// 	var link=obj['url']['link'];
// 	console.log('its video end point');
// 	console.log('data sent From '+link);
// 	var dlvid = require('dlvid-core').Youtube;
// var download = dlvid.download(link, { filter: 'mp4', quality: 'highest'});

// download.done(function(file){
//     file.pipe(fs.createWriteStream('movie.mp4'));
// });
// var info = dlvid.info(link).done(function(data){
// console.log('file downloading complete');
// });

});
app.get("/get",function(req,res){
	//var data={""}
var a={"Name":"Muzaffar","Class":"IT"};
	//res.json(req.params.body);
	console.log('getted');
	res.send('Hello express '+a['Name']+'  Your Class '+a['Class']);
});
app.listen("4000");
console.log("Server is alive at port 4000");
