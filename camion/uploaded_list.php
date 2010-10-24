<?php
  require_once('security.php');
  if ($admin){
    $user_list = scandir(UPLOAD_BASE);
    if(!$user_list){
      exit(0);
    }
    echo "<h3>Files uploaded by users:</h3><ul>";
    foreach ($user_list as $u){
      $files = scandir(UPLOAD_BASE . $u);
      if (!$files){
        continue;
      }
      if ($u == '.' || $u == '..') continue;
      echo "<li><h4>User: $u</h4>";
      echo "<ul>";
      foreach ($files as $f){
        if ($f != '.' && $f != '..'){
          ?>  <li><a href="admin_download_file.php?type=user&amp;file=<?= $f ?>&amp;user=<?= $u ?>"><?= $f ?></a></li>
          <?php
        }
      }
      echo "</ul></li>";
    }
    echo "</ul>";
  }else{
    $dir_list = scandir(UPLOAD_BASE . $user);
    if(!$dir_list){
      exit(0);
    }
    echo "<h3>Already uploaded by you:</h3>\n";
    echo "<ul>\n";
    foreach ($dir_list as $value){
      if ($value != '.' && $value != '..'){
        ?>  <li><a href="download_file.php?type=user&amp;file=<?= $value ?>"><?= $value ?></a></li>
        <?php
      }
    }
    echo "</ul>\n";
  }