<?php
  require_once('security.php');
  if(!isset($_GET['type']) || !isset($_GET['file'])){
    echo "Unable to find the requested file.";
    exit(0);
  }
  $type = $_GET['type'];
  $file = $_GET['file'];
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