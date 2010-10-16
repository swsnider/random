<?php
	
?>

<html>
  <head>
    <title>Camion</title>
    <script type="text/javascript" src="swfupload.js"></script>
    <script type="text/javascript">
      var swfu;
      window.onload = function() {
        swfu = new SWFUpload({
          upload_url: "upload.php",
          flash_url: "swfupload.swf",
          flash9_url: "swfupload_fp9.swf",
          file_size_limit: "1000 MB"
        });
        
      }
    </script>
  </head>
  <body>
    
  </body>
</html>