
function verifPassword() {
    var Vident = document.getElementById('mdp');
    if (Vident.value.length < 8) {
        mdp.style.backgroundColor = "#fba";
        return false;
    }
    else
    {
        mdp.style.backgroundColor = "#FFF";
        return true;
    }
}
function VerifEmail() {
    var Vemail = document.getElementById('email');
    var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    if (reg.test(Vemail.value) == false) {
        email.style.backgroundColor = "#fba";
        return false;
    }
    else
    {
        email.style.backgroundColor = "#FFF";
        return true;
    }
}
function verifConnexion() {
    //verifEmail() == false || 
    if (verifPassword() == false || VerifEmail() == false) {
        return(false);
    }
    else {
        document.getElementById("redirection").action = "pagesPHP/sign_in.php";
    }
}


