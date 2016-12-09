<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Get Data with Regex</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <?php
  // load content to get data
  $file = file_get_contents("data.html");
  $start = "<p id=\"test\">";
  $end = "<\/p>";;
  // $rule = "/$start.*$end/"; // get content and enclosed tags
  $rule = "/(?<=$start).*(?=$end)/"; // only get content
  preg_match($rule, $file, $result);

  echo "<pre>";
  print_r($result);
  echo "</pre>";

  echo $result[0];
  ?>
</body>
</html>
