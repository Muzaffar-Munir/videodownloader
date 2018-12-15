var http = require('http');
var express=require("express");
var shell = require('shelljs');
var natural = require('natural');
var fs = require('fs');
var app=express();
var routerUser=express.Router();

routerUser.route("/video")
	.post(function(req,res){
var t='video';
req.body.type=t;
		if(req.body.type=='video'){

	
	var urli=req.body.url;
 var randnumber = Math.floor((Math.random() * 99000000000) );
console.log('hello Video source is '+urli);
			//var urli ="'http://www.facebook.com/video.php?v="+req.body+"'"; 
			//var name = shell.exec("youtube-dl "+urli+" --get-filename",{silent:true,async:false}).stdout;
			//shell.exec('youtube-dl -o '+'/var/www/html/ssdfdf.mp4 '+urli, {async: true, silent: false}, function(data){
	shell.exec("youtube-dl --get-title "+urli, {async: true, silent: false}, function(data,next){
	
	shell.exec('youtube-dl -o '+'/var/www/html/"'+next+'.mp4" '+urli, {async: true, silent: false}, function(da,resp){
var fe=da.toString();
var se=resp.toString();
		
		

		//da.pipe(res);
		
/*
console.log('data coming from the given is '+se+'ffffff'+fe);
req.on('data', (chunk) => {
  		  body += chunk;
 			 });
*/
	//sendingdata.pipe(data);
/*
shell.exec('youtube-dl --get-thumbnail '+urli, {async: true, silent: false}, function(img){
		
		console.log('response sent from '+next+'image'+img);
});//end of thumbnail
*/

			})
			
		res.json({'sucesss':true,'data':next,'link':urli,'random':randnumber});
		
		

				var generat='http://extendgen.ml/public/'+req.body+'.mp4';
				// db("video").create({"name":name,"url":generat,"type":req.body.type,"username":req.body.username}).exec(function(err,data){
					
				// });
				//res.json({"status":"success","data":generat});
			});
			
		}
		if(req.body.type=='file'){
			var urli ="'"+req.body.url+"'"; 
			var names = shell.exec("youtube-dl "+urli+" --get-filename",{silent:true,async:false}).stdout;
			var name=names.substring(0,names.length - 1);
			name=name.split(' ').join('_');
			shell.exec('youtube-dl -o public/'+name+' '+urli, {async: true, silent: false}, function(data){
				var generat='http://extendgen.ml/public/'+name;
				// db("video").create({"name":name,"url":generat,"type":req.body.type,"username":req.body.username}).exec(function(err,data){
					// res.json({"status":"success","data":"File Capture Success!"});
				// });
				
				 res.json({"status":"success","data":generat});
			});
			
		}
	});


module.exports=routerUser;
