<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>json and php</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
  $data = array(
            "name" => "milu",
            "email" => "abc@demo.com",
            "website" => "http://milu.org.net"
          );
  echo "<pre>";
  print_r($data);
  echo "</pre>";

  $str = json_encode($data);
  echo $str;
  echo "<br>";

  $str2 = serialize($data);
  echo $str2;
  echo "<hr>";

  $data2 = json_decode($str); // $data2 is an object
  $data3 = json_decode($str, true); // $data3 is an array
  $data4 = unserialize($str2); // $data4 is an array
  echo "<pre>";
  print_r($data2);
  echo "</pre>";
  echo $data2->email;
  echo "<br>";
  echo json_encode($data2);
  echo "<hr>";

  echo "<pre>";
  print_r($data3);
  echo "</pre>";
  echo "<hr>";

  echo "<pre>";
  print_r($data4);
  echo "</pre>";
  ?>
</body>
</html>
