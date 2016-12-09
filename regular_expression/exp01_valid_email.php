<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Valid Email</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <form action="exp01_valid_email.php" method="post">
    Input email: <input type="text" name="txtemail">
    <input type="submit" name="ok" value="check">
  </form>
  <br>
</body>
</html>

<?php
if (isset($_POST['ok'])) {
  if (empty($_POST['txtemail'])) {
    echo "Please input email";
  } else {
    $email = $_POST['txtemail'];
    $pattern = "/^[a-zA-Z]{1}[a-zA-Z0-9._]*\@[a-zA-Z0-9]{3,}\.[a-zA-Z.]{2,8}$/";
    $check = preg_match($pattern, $email);
    if ($check == true) {
      echo "<span style='color:green;'>VALID !!!</span>";
    } else {
      echo "<span style='color:red;'>invalid</span>";
    }
  }
}
?>
