<?php
	
?>
<html>
  <head>
    <title>Camion</title>
    <link href="default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="swfupload.js"></script>
    <script type="text/javascript" src="swfupload.queue.js"></script>
    <script type="text/javascript" src="fileprogress.js"></script>
    <script type="text/javascript" src="handlers.js"></script>
    <script type="text/javascript">
      var swfu;
      window.onload = function() {
        swfu = new SWFUpload({
          upload_url: "upload.php",
          flash_url: "swfupload.swf",
          flash9_url: "swfupload_fp9.swf",
          file_size_limit: "1000 MB",
          button_image_url: "button.png",
  				button_width: "65",
  				button_height: "29",
  				button_placeholder_id: "spanButtonPlaceHolder",
  				button_text: '<span class="theFont">Upload</span>',
  				button_text_style: ".theFont { font-size: 16; }",
  				button_text_left_padding: 12,
  				button_text_top_padding: 3,
  				// The event handler functions are defined in handlers.js
  				swfupload_preload_handler : preLoad,
  				swfupload_load_failed_handler : loadFailed,
  				file_queued_handler : fileQueued,
  				file_queue_error_handler : fileQueueError,
  				file_dialog_complete_handler : fileDialogComplete,
  				upload_start_handler : uploadStart,
  				upload_progress_handler : uploadProgress,
  				upload_error_handler : uploadError,
  				upload_success_handler : uploadSuccess,
  				upload_complete_handler : uploadComplete,
  				queue_complete_handler : queueComplete	// Queue plugin event
        });
      }
    </script>
  </head>
  <body>
    <div id="content">
      <h2>Camion</h2>
      <form action="index.php" method="post" enctype="multipart/form-data">
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