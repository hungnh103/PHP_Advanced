<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <style type="text/css">
    li{ line-height: 30px; }
  </style>
  <script type="text/javascript" src="../jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("a").click(function(){
        val = $(this).attr("data-link");
        // alternative writing style
        // val = this.getAttribute("data-link");
        $.ajax({
          url:"exp01_process.php",
          type:"post",
          data:"link="+val,
          async:true,
          success:function(result){
            $("#result").html(result);
          }
        })
      })
    })
  </script>
</head>

<body>
  <ul>
    <li><a href="javascript:void(0)" data-link="1">Link 1</a></li>
    <li><a href="javascript:void(0)" data-link="2">Link 2</a></li>
    <li><a href="javascript:void(0)" data-link="3">Link 3</a></li>
    <li><a href="javascript:void(0)" data-link="4">Link 4</a></li>
    <li><a href="javascript:void(0)" data-link="5">Link 5</a></li>
  </ul>

  <div id="result"></div>
</body>
</html>
