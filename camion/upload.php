<?php
  require_once('config.php');
  // Code for to workaround the Flash Player Session Cookie bug
	if (isset($_POST["PHPSESSID"])) {
		session_id($_POST["PHPSESSID"]);
	} else if (isset($_GET["PHPSESSID"])) {
		session_id($_GET["PHPSESSID"]);
	}

	session_start();
	if (!isset($_SESSION['logged_in'])){
    header('Location: login.php');
    die();
  }
  $user = $_SESSION['username'];

  // Check post_max_size (http://us3.php.net/manual/en/features.file-upload.php#73762)
	$POST_MAX_SIZE = ini_get('post_max_size');
	$unit = strtoupper(substr($POST_MAX_SIZE, -1));
	$multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

	if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
		header("HTTP/1.1 500 Internal Server Error"); // This will trigger an uploadError event in SWFUpload
		echo "POST exceeded maximum allowed size.";
		exit(0);
	}

	$upload_name = "Filedata";
	$save_path = UPLOAD_BASE . $user . '/';
	
  if (!file_exists($save_path)){
    if(!mkdir($save_path, 0770, true)){
      HandleError("File uploads have been disabled for $user");
      exit(0);
    }
  }
  
  if (file_exists($save_path) && !is_dir($save_path)){
    HandleError("File Uploads have been disabled for $user");
    exit(0);
  }
	
	
  // Other variables	
	$MAX_FILENAME_LENGTH = 260;
	$file_name = basename($_FILES[$upload_name]['name']);
	$file_extension = "";
	$uploadErrors = array(
    0=>"There is no error, the file uploaded successfully",
    1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
    2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
    3=>"The uploaded file was only partially uploaded",
    4=>"No file was uploaded",
    6=>"Missing a temporary folder"
	);


  // Validate the upload
	if (!isset($_FILES[$upload_name])) {
		HandleError("No upload found in \$_FILES for " . $upload_name);
		exit(0);
	} else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
		HandleError($uploadErrors[$_FILES[$upload_name]["error"]]);
		exit(0);
	} else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
		HandleError("Upload failed is_uploaded_file test.");
		exit(0);
	} else if (!isset($_FILES[$upload_name]['name'])) {
		HandleError("File has no name.");
		exit(0);
	}


  // Validate that we won't over-write an existing file
	if (file_exists($save_path . $file_name)) {
	  $file_counter = 1;
	  while (file_exists($save_path . "$file_counter__" . $file_name)){
	    $file_counter++;
	  }
	  $file_name = "$file_counter__" . $file_name;
	}

  // Process the file
	if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
		HandleError("File could not be saved.");
		exit(0);
	}

	exit(0);

  function HandleError($message) {
  	echo $message;
  }
?>