<?php
  require_once('security.php');
  if (!$admin){
    echo "Insufficient Permissions";
    exit(0);
  }
  if(!isset($_GET['type']) || !isset($_GET['file']) || !isset($_GET['user'])){
    echo "Unable to find the requested file.";
    exit(0);
  }
  $type = $_GET['type'];
  $file = $_GET['file'];
  $u = $_GET['user'];
  header('Content-Type: application/octet-stream');
  header("Content-Disposition: attachment; filename=$file");
  if ($type == 'user'){
    $path = UPLOAD_BASE . $u . '/';
  }else{
    $path = DOWNLOAD_BASE . $u . '/';
  }
  $f = fopen($path . $file, 'r');
  while($line = fgets($f)){
    if($line === FALSE){
      exit(0);
    }
    print $line;
    flush();
  }