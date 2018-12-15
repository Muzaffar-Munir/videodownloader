var fs = require('fs');
var vidl = require('vimeo-downloader');
// vidl('https://vimeo.com/183482793')
//   .pipe(fs.createWriteStream('video.mp4'));
  vidl('https://vimeo.com/183482793', { quality: '360p' })
  .pipe(fs.createWriteStream('vide.mp4'));