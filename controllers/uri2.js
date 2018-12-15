var express=require("express");
var shell = require('shelljs');
var natural = require('natural');
var app=express();
var routerUser=express.Router();

routerUser.route("/video")
	.post(function(req,res){
 //var t='video';
//req.body.type=t
		//if(req.body.type==t){
			//var urli ="'http://www.facebook.com/video.php?v="+req.body.url+"'"; 

	
	//var li=JSON.stringify(req.body);
	//var obj = JSON.parse(li);
//	var urli=obj['url']['id'];
var urli=req.body.url;
	console.log('Request from '+urli); 
			var name = shell.exec("youtube-dl "+urli+" --get-filename",{silent:true,async:false}).stdout;
			shell.exec('youtube-dl -o '+'/var/www/html/dd.mp4 '+urli, {async: true, silent: false}, function(data){
				var generat='http://extendgen.ml/public/'+req.body+'.mp4';
				// db("video").create({"name":name,"url":generat,"type":req.body.type,"username":req.body.username}).exec(function(err,data){
					
				// });
				res.json({"status":"success","data":generat});
			});
			
	//	}
	/*	if(req.body.type=='file'){
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
			
		}*/
	});


module.exports=routerUser;
