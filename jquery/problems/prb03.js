$(document).ready(function(){
  $("#answer .item:first input[type='text']").focus();

  function countItem(){
    var items = $("#answer").children().length;
    return items;
  }

  $(document).on("keyup", "input[type='text']", function(){
    $(this).next("input[type='checkbox']").removeAttr("disabled");
    if ($(this).val() == "") {
      $(this).next("input[type='checkbox']").attr("disabled", "disabled").removeAttr("checked");
    }
  })


  $("#add").click(function(){
    n = countItem();
    if (n == 10) {
      alert("Number of answers isn't greater than 10");
    } else {
      n++;
      $("#answer").append("<div class='item'><label><span>Ans "+n+"</span> <input type='text'> <input type='checkbox' disabled='disabled'></label> <a href='javascript:void(0)' class='del'>del</a></div>");
    }
  })

  // if use jQuery version < 1.9.1, you can use live()
  // $("a.del").live("click", function(){
  //   $(this).parent().remove();
  // })

  $(document).on("click", "a.del", function(){
    n = countItem();
    if (n == 2) {
      alert("Number of answers isn't less than 2");
    } else {
      check = $(this).siblings().find("input").val();
      // alternative writing style
      // check = $(this).parent().find("label input").val();
      if (check != "") {
        alert("Cannot delete answer field has content");
      } else {
        $(this).parent().remove();
        for (i=0; i<n-1; i++) {
          $("#answer .item:eq("+i+") label span").html("Ans "+(parseInt(i)+1));
        }
      }
    }
  })

  $("#create").bind("click", function(){
    n = countItem();
    result = "";
    count = 0; // number of answers
    for (i=0; i<n; i++) {
      text = $("#answer .item:eq("+i+") label input[type='text']").val();
      if (text != "") {
        count++;
        if ($("#answer .item:eq("+i+") label input[type='checkbox']").prop("checked") == true) text = text + " ---> right!";
        result = result + "<p>Ans "+count+": " + text + "</p>";
      }
    }

    $("#result").addClass("blink_me");
    if (result == "") {
      result = "You haven't input any answer yet!";
      $("#answer .item:first input").focus();
    } else {
      // count right answers
      ra = $("#answer input[checked='checked']").length;
      if (ra == 0) {
        result = "Please choose at least one right answer";
      } else if (ra == count) {
        result = "Number of right answers must less than number of all answers";
      } else {
        $("#result").removeClass("blink_me");
        $("input[type='checkbox']").attr("disabled", "disabled").removeAttr("checked");
        $("input[type='text']").val("");
      }
    }

    $("#result").html(result);
  })

  $(document).on("change", "input[type='checkbox']", function(){
    v = $(this).prop("checked");
    if (v == true) $(this).attr("checked", "checked");
    else $(this).removeAttr("checked");
  })
})
