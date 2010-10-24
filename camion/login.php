<?php
  require_once('config.php');
  session_start();
  if(isset($_POST['username']) && isset($_POST['password'])){
    if($ENABLE_GUEST && $_POST['username'] == 'guest'){
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['username'] = $_POST['username'];
      header('Location: index.php');
      exit(0);
    }
    $user = strtolower($_POST['username']);
    $password = $USERS[$user];
    if ($password == $_POST['password']){
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['username'] = $user;
      if (in_array($user, $ADMINS)){
        $_SESSION['admin_user'] = TRUE;
      }
      header('Location: index.php');
      exit(0);
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cami&oacute;n Login</title>
    <link href="swfupload/default.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="content">
      <h2>Login to <?= COMPANY_NAME ?>'s Cami&oacute;n</h2><br />
      <form action="" method="POST">
        <table>
          <tr><td>Username: </td><td><input type="text" name="username" /></td></tr>
          <tr><td>Password: </td><td><input type="password" name="password" /></td></tr>
          <tr><td><input type="submit" value="Login" /></td><td>&nbsp;</td></tr>
        </table>
      </form>
    </div>
  </body>
</html>