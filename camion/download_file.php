<?php
  require_once('security.php');
  if(!isset($_POST['type']) || !isset($_POST['file'])){
    echo "Unable to find the requested file.";
    exit(0);
  }
  $type = $_POST['type'];
  $file = $_POST['file'];
  if ($type == 'user'){
    $path = UPLOAD_BASE . $user . '/';
  }else{
    $path = DOWNLOAD_BASE . $user . '/';
  }
  $f = fopen($path . $file, 'r');
  while($line = fgets($f)){
    if($line === FALSE){
      exit(0);
    }
    print $line;
    flush();
  }