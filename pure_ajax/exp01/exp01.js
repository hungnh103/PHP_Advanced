function create_obj(){
  var browser = navigator.appName;
  if (browser == "Microsoft Internet Explorer") {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
  } else {
    obj = new XMLHttpRequest();
  }
  return obj;
}

var new_obj = create_obj();

function getdata(id) {
  new_obj.open("get", "exp01_process.php?data="+id, true);
  new_obj.onreadystatechange = process;
  new_obj.send(null);
}

function process() {
  if (new_obj.readyState == 4 && new_obj.status == 200) {
    var result = new_obj.responseText;
    document.getElementById("result").innerHTML = result;
  }
}
