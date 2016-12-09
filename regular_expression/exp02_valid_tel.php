<form action="exp02_valid_tel.php" method="post">
  Input telephone: <input type="text" name="tel">
  <input type="submit" name="ok" value="Check">
</form>
<br>

<?php
if (isset($_POST['ok'])) {
  if (empty($_POST['tel'])) {
    echo "input telephone";
  } else {
    $tel = $_POST['tel'];
    $pattern = "/^[0-9]{3}\.[0-9]{2}\.[0-9]{7,10}$/";
    if (preg_match($pattern, $tel)) {
      echo "VALID !";
    } else {
      $pattern2 = "/^\([0-9]{3}\)\.\([0-9]{2}\)\.[0-9]{7,10}$/";
      if (preg_match($pattern2, $tel)) {
        echo "VALID !";
      } else {
        echo "invalid";
      }
    }
  }
}
?>
