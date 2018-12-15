var fs = require('fs');
var youtubedl = require('youtube-dl');
var a;
var video = youtubedl('http://www.youtube.com/watch?v=90AiXO1pAiA',
  // Optional arguments passed to youtube-dl.
  ['--format=18'],
  // Additional options can be given for calling `child_process.execFile()`.
  { cwd: __dirname });
// Will be called when the download starts.
video.on('info', function(info) {
	a=info.filename;
  console.log('Download started');
  console.log('filename: ' + info.filename);
  console.log('size: ' + info.size);
   console.log('file '+info._filename+' successfully downloaded');
});
 
//video.pipe(fs.createWriteStream('video.mp4'));
video.pipe(fs.createWriteStream('video.mp4'));