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
          file_size_limit: "1000 MB",
  				button_width: "65",
  				button_height: "29",
  				button_placeholder_id: "spanButtonPlaceHolder",
  				button_text: '<span class="theFont">Hello</span>',
  				button_text_style: ".theFont { font-size: 16; }",
  				button_text_left_padding: 12,
  				button_text_top_padding: 3,
        });
      }
    </script>
  </head>
  <body>
    <div id="content">
      <h2>Camion</h2>
      <form>
        <div class="fieldset flash" id="fsUploadProgress">
          <span class="legend">Upload Queue</span>
        </div>
        <div id="divStatus">0 Files Uploaded</div>
  			<div>
  				<span id="spanButtonPlaceHolder"></span>
  				<input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
  			</div>
      </form>
    </div>
  </body>
</html>