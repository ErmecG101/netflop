
function buttonSelect(who) {
    var btn = document.getElementById('listbutton' + who);

    if (btn.className == "btn btn-secondary") {
        btn.classList.remove("btn-secondary");
        btn.classList.add("btn-outline-secondary");
    } else {
        btn.classList.remove("btn-outline-secondary");
        btn.classList.add("btn-secondary");
    }
    for (x = 1; x <= 5; x++) {
        if (x != who) {
            var btnFix = document.getElementById('listbutton' + x);
            btnFix.classList.remove("btn-secondary");
            btnFix.classList.add("btn-outline-secondary");
        }
    }

    setMaxNum(who);
}

function setMaxNum(maxnum){
    document.location='index.php?maxnum='+maxnum;
}

