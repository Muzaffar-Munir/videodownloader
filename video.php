<?php
include"header.php";
 
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                
                                          <div class="container">
            <div class="row">
                  <div class="col-md-6" style="margin-left: 20%">
                    <div id="status"></div>
                   <form method="post" >
                        <input type="url" name="link" autofocus="" class="form-control" required="" placeholder="Video URL" style="border: 1px solid #ccc;border-radius: 4px; color: black">
                        <br>
                        <input type="submit" name="submit" class="form-control btn btn-info" style="background:#5bc0de;color: white;border-color: #46b8da;">
              </form>
              <br>       
                  </div>
            </div>
      </div>
      <center>
        <span id="image" ></span><br>
        
        <h5 id="title"></h5> 
        
      </center>
      

                        		
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
<?php
include"footer.php";
?>
<?php
if (isset($_POST['submit'])) 
{
  ?>
  <script>
  setTimeout(function()
  {
   $('#status').html("<div class='alert alert-success'><strong>Please Wait !</strong> Video is Loading.</div>");
  }, 2000);</script>
<?php
            include 'post.php';     
            include 'database/connection.php';

            if (isset($_POST['link']) && !empty($_POST['link'])) 
            {
                  $url=$_POST['link'];
                  $uid=$_SESSION['id'];  
            $data  = post('http://192.168.252.142:3000/video',array('url'=>$url));
             $name=$data->data;
              $link=$data->link;
             $ran=$data->random;
             $ext='mp4';
             echo "<script>$('#title').html('".trim($name)."');</script>";

             $check=mysqli_query($con,"SELECT * FROM `filetable` WHERE flink='$url'");
           if ($check) 
           {
               if(mysqli_num_rows($check)>0)
               {
               // echo "<script>alert('Video already exists');</script>";
                 
               }
               else
               {
                // echo "<script>alert('hekk');</script>";
                  $q=mysqli_query($con,"INSERT INTO `filetable`( `owner_id`,`filename`, `flink`,`filepath`, `fileextension`,`type`) VALUES  ('$uid','$name','$link','$ran','$ext','2')");
                  if ($q) 
                    {
                        // echo "<script>alert('inserted');</script>";
                    }
               }

           }

if (strpos($url, 'youtube.com')!==false)
                  {
                   
                   $fetch=explode("v=", $url);
                   $videoid=$fetch[1];        
        ?>
        <script type="text/javascript">
          $('#image').html("<img src=' http://img.youtube.com/vi/<?=$videoid;?>/0.jpg ' width='200' height='200' class='img img-thumbnail'>");
        </script>
          <?php
               }
               else{
                ?>
                <script>
                   $('#image').html("<img src='images/video.jpg ' width='200' height='200' class='img img-thumbnail'>");
                </script>
                <?php
               }

               file_put_contents('images/'.$ran, fopen("http://192.168.252.142/$ran", 'r'));

      // $path_parts=pathinfo($link);
      // $file_name=$path_parts['basename'];
      // $file_extension=$path_parts['extension'];
      // $allowed_file= array('mp3','mp4','flv','WEBM','3GP','mkv','AVI');
      // $file_size=round(strlen(file_get_contents($link))*le-6,2);
      // $check_file=in_array($file_extension, $allowed_file);
      // $max_size=3;
      // $download_file_name="images/$file_name";
      // echo "$file_size MB";
      // echo $file_name; 
      // $file=file_put_contents($download_file_name, file_get_contents($link)) ;        








        // $ch = curl_init ("http://192.168.252.142/$name");
        // curl_setopt($ch, CURLOPT_HEADER, 0);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        // $rawdata = curl_exec($ch);
        // // Check if any error occured 

        // if(curl_errno($ch)) 
        // { 
        //   $fp = fopen('C:\wamp\www\ ', 'w');
        //   fwrite($fp, $rawdata);
        //   fclose($fp);
        // }
        // curl_close ($ch);
        // ob_flush();
        // flush();
             
         
             
        }
      
}

?>