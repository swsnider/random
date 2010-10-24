<?php
  require_once('config.php');
  session_start();
  if (!isset($_SESSION['logged_in'])){
    header('Location: login.php');
    die();
  }
  if (isset($_SESSION['admin_user']) && $_SESSION['admin_user'])
    $admin = true;
  else
    $admin = false;
  $user = $_SESSION['username'];