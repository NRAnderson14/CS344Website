window.onload = function() {
    var name = document.getElementById("name").innerHTML;
    var loc  = "Faculty/" + name + "/" + name + ".php";
    window.location.replace(loc);
}