<?php
session_start();
$u = $_GET['u'];
$p = $_GET['p'];

// connect to databse
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("ajax_login", $conn);
$sql = "SELECT * FROM users WHERE username='$u' AND password='$p'";
$query = mysql_query($sql);
if (mysql_num_rows($query) == 1) {
  $data = mysql_fetch_assoc($query);
  $_SESSION['username'] = $data['username'];
  echo $_SESSION['username'];
} else {
  echo "0";
}
