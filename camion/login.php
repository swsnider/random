<?php
  require_once('config.php');
  session_start();
  if(isset($_POST['username']) && isset($_POST['password'])){
    $password = $USERS[$_POST['username']];
    if ($password == $_POST['password']){
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['username'] = $_POST['username'];
      header('Location: index.php');
      die();
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cami&oacute;n Login</title>
  </head>
  <body>
    <form action="" method="POST">
      <table>
        <tr><td>Username: </td><td><input type="text" name="username" /></td></tr>
        <tr><td>Password: </td><td><input type="password" name="password" /></td></tr>
        <tr><td><input type="submit" value="Login" /></td><td>&nbsp;</td></tr>
      </table>
    </form>
  </body>
</html>