<?php
  require_once('security.php');
  
  $dir_list = scandir(UPLOAD_BASE . $user);
  if(!$dir_list){
    exit(0);
  }
  echo "<h3>Already uploaded by you</h3>\n";
  echo "<ul>\n";
  foreach ($dir_list as $value){
    if ($value != '.' && $value != '..'){
?>  <li><a href="download_file.php?type=user&amp;file=<?= $value ?>"><?= $value ?></a></li>
<?php
    }
  }
  echo "</ul>\n";