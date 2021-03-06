<?php
  require_once('security.php');
  if ($admin){
    header('Location: admin.php');
    exit(0);
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cami&oacute;n</title>
    <link href="swfupload/default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
    <script type="text/javascript" src="swfupload/swfupload.js"></script>
    <script type="text/javascript" src="swfupload/swfupload.queue.js"></script>
    <script type="text/javascript" src="swfupload/fileprogress.js"></script>
    <script type="text/javascript" src="swfupload/handlers.js"></script>
    <script type="text/javascript">
  		var swfu;

  		$(document).ready(function() {
  			var settings = {
  				flash_url : "swfupload/swfupload.swf",
  				flash9_url : "swfupload/swfupload_fp9.swf",
  				upload_url: "upload.php",
  				post_params: {"PHPSESSID" : "<?php echo session_id(); ?>"},
  				file_size_limit : "1000 MB",
  				file_types : "*.*",
  				file_types_description : "All Files",
  				file_upload_limit : 100,
  				file_queue_limit : 0,
  				custom_settings : {
  					progressTarget : "fsUploadProgress",
  					cancelButtonId : "btnCancel"
  				},
  				debug: false,

  				// Button settings
  				button_image_url: "swfupload/button.png",
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
  			};

  			swfu = new SWFUpload(settings);
  			
  			fetchUploaded();
  			fetchDownload();
      });
  	</script>
  </head>
  <body>
  <div id="content">
  	<h2>Cami&oacute;n (User: <?= $user ?>)</h2>
  	<a href="logout.php">Logout</a>
  	<form id="form1" action="index.php" method="post" enctype="multipart/form-data">
  		<p>This page allows you to upload files to <?= COMPANY_NAME ?>'s servers.</p>

  			<div class="fieldset flash" id="fsUploadProgress">
  			<span class="legend">Upload Queue</span>
  			</div>
  		<div id="divStatus">0 Files Uploaded</div>
  			<div>
  				<span id="spanButtonPlaceHolder"></span>
  				<input id="btnCancel" type="button" value="Cancel All Uploads" onclick="swfu.cancelQueue();" disabled="disabled" style="margin-left: 2px; font-size: 8pt; height: 29px;" />
  			</div>

  	</form>
  	<?php if ($admin): ?>
  	<br />
  	<a href="admin.php">Upload to another user</a>
  	<?php endif; ?>
  	<br />
  	<div id="download_list">
	  </div>
	  <br />
  	<div id="uploaded_list">
	  </div>
  </div>
  </body>
</html>
