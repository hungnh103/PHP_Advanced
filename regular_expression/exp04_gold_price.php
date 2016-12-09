<?php
$file = file_get_contents("https://eximbank.com.vn/WebsiteExrate/Gold_vn_2012.aspx");

$end = "<\/span>";
$start = "<span id=\"lblQUOTETM\">";
$start2 = "<span id=\"GoldRateRepeater_lblGold_Name_0\">";
$start3 = "<span id=\"GoldRateRepeater_lblCSHBUYRT_0\">";
$start4 = "<span id=\"GoldRateRepeater_lblCSHSELLRT_0\">";

$rule = "/$start(.*)$end.*$start2(.*)$end.*$start3(.*)$end.*$start4(.*)$end/msU";
// su dung luat $rule de chi phai quet du lieu 1 lan (thay vi 4 lan), han che lam giam toc do load website
// them "msU" de loai bo cac khoang trang giua cac the HTML khi quet du lieu, tranh bi loi

preg_match($rule, $file, $result);

$date = substr($result[1], 0, 10);
$buy_price = str_replace(",", ".", $result[3]);
$sell_price = str_replace(",", ".", $result[4]);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Get gold price</title>
  <link rel="stylesheet" href="">
</head>
<body>
  <table border="1" cellspacing="0" cellpadding="5">
    <tr>
      <td colspan="3">Tỷ giá ngày: <?php echo $date; ?></td>
    </tr>
    <tr>
      <td></td>
      <td>Giá mua (VNĐ/chỉ)</td>
      <td>Giá bán (VNĐ/chỉ)</td>
    </tr>
    <tr>
      <td><?php echo $result[2]; ?></td>
      <td align="center"><?php echo $buy_price; ?></td>
      <td align="center"><?php echo $sell_price; ?></td>
    </tr>
  </table>

</body>
</html>
