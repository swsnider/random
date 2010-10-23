<?php
  require_once('config.php');
  session_start();
  if (!isset($_SESSION['logged_in'])){
    header('Location: login.php');
    die();
  }
  $user = $_SESSION['username'];