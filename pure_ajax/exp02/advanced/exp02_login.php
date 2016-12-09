<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AJAX Login</title>
  <script type="text/javascript" src="exp02.js"></script>
</head>
<body>
  <?php
  if (isset($_SESSION['username'])) {
    echo "Welcome back by php, $_SESSION[username]";
  } else {
  ?>
  <div id="result" style="height: 50px;"></div>

  <form action="javascript:login()" method="post" id="form_login">
    <label>Username: <input type="text" id="txtuser"></label><br><br>
    <label>Password: <input type="password" id="txtpass"></label><br><br>
    <input type="submit" value="Login">
  </form>
  <?php
  }
  ?>
</body>
</html>
