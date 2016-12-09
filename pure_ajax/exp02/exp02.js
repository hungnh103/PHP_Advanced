function create_obj() {
  var browser = navigator.appName;
  if (browser == "Microsoft Internet Explorer") {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  } else {
    obj = new XMLHttpRequest();
  }
  return obj;
}

var new_obj = create_obj();

function login() {
  document.getElementById("result").innerHTML = "<img src='loading.gif'>";
  var u = encodeURI(document.getElementById("txtuser").value);
  var p = encodeURI(document.getElementById("txtpass").value);
  new_obj.open("get", "exp02_process.php?u="+u+"&p="+p, true);
  new_obj.onreadystatechange = process;
  new_obj.send(null);
}

function process() {
  if (new_obj.readyState == 4 && new_obj.status == 200) {
    var result = new_obj.responseText;
    if (result == 1) {
      document.getElementById("result").innerHTML = "welcome back, admin";
      document.getElementById("form_login").style.display = "none";
    } else {
      document.getElementById("result").innerHTML = "wrong username or password";
      document.getElementById("txtuser").value = "";
      document.getElementById("txtpass").value = "";
    }
  }
}
