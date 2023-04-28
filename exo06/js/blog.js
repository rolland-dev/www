function setCookie(cname,cvalue) {
    var d = new Date();
    d.setTime(d.getTime() + (30*24*60*60*1000)); // 30jours
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie() {
    var st=getCookie("xstyle");
    if (st != "") {
        setStyle(st);
    } 
}


function setStyle(nomstyle){
    document.getElementById('xstyle').href=nomstyle;
    setCookie("xstyle", nomstyle)

}