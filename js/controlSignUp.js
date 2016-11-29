
/* global nom, email, adress, address, phone, userpwrepeat, dateNaissance */
//verif username de medecine
function verifNom() {
    var Vnom = document.getElementById('username');
    if (Vnom.value.length < 3) {
        (username).style.background = "#fba";
        return false;
    }
    else
    {
        (username).style.backgroundColor = "#FFF";
        return true;
    }
}

//verif le prenom de patient 
function verifPrenom() {
    var Vnom = document.getElementById('prenom');
    if (Vnom.value.length < 3) {
        (prenom).style.background = "#fba";
        return false;
    }
    else
    {
        (prenom).style.backgroundColor = "#FFF";
        return true;
    }
}
//verif la CIN de patient
function verifCIN() {
    var Vadresse = document.getElementById('CIN');
    if (Vadresse.value.length != 8) {
        (CIN).style.background = "#fba";
        return false;
    }
    else
    {
        (CIN).style.backgroundColor = "#FFF";
        return true;
    }
}
function verifEmail() {
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


//verifier la date
function verifDate() {
    var date_pas_sure = document.getElementById('dateNaissance').value;
    var format = /^(\d{1,2}\/){2}\d{4}$/;
    if (!format.test(date_pas_sure)) {
        dateNaissance.style.background = "#fba";
        return false;
    }
    else {
        var date_temp = date_pas_sure.split('/');
        //date_temp[1] -= 1;        // On rectifie le mois !!!
        if (date_temp[2] < 1000 || date_temp[2] > 9999 || date_temp[1] < 1 || date_temp[1] > 12 || date_temp[0] < 1 || date_temp[0] > 31) {
            dateNaissance.style.background = "#fba";
            return false;
        }
        else {
            dateNaissance.style.backgroundColor = "#FFF";
            return true;
        }
    }
}
//verifier l'adresse
function verifAdresse() {
    var Vadresse = document.getElementById('address');
    if (Vadresse.value.length < 2) {
        (address).style.background = "#fba";
        return false;
    }
    else
    {
        (address).style.backgroundColor = "#FFF";
        return true;
    }
}

function verifPhone() {
    var Vphone = document.getElementById('phone');
    if (Vphone.value.length < 8) {
        (phone).style.background = "#fba";
        return false;
    }
    else
    {
        (phone).style.backgroundColor = "#FFF";
        return true;
    }
}

function verifSpecialty() {
    var Vspecialty = document.getElementById('specialty');
    if (Vspecialty.value.length < 3) {
        (specialty).style.background = "#fba";
        return false;
    }
    else
    {
        (specialty).style.backgroundColor = "#FFF";
        return true;
    }
}

function verifPassword() {
    var Vuserpw = document.getElementById('userpw');
    if (Vuserpw.value.length < 5) {
        (userpw).style.background = "#fba";
        return false;
    }
    else
    {
        (userpw).style.backgroundColor = "#FFF";
        return true;
    }
}

function verifPasswordRepeat() {
    var Vuserpwrepeat = document.getElementById('userpwrepeat');
    var Vuserpw = document.getElementById('userpw');
    if (Vuserpwrepeat.value != Vuserpw.value) {
        (userpwrepeat).style.background = "#fba";
        return false;
    }
    else
    {
        (userpwrepeat).style.backgroundColor = "#FFF";
        return true;
    }
}
//verif les donnees de Medecine
function verifInscription() {

    if (verifNom() == false || verifEmail() == false || verifAdresse() == false || verifPhone() == false || verifSpecialty() == false || verifPassword() == false || verifPasswordRepeat() == false) {
        return(false);
    }
    else {
        document.getElementById("redirection").action = "pagesPHP/sign_up.php";
    }
}
// verif les donnees de patient
function ajoutPatient() {
    if (verifNom() == false || verifPrenom() == false || verifPhone() == false || verifCIN() == false || verifDate() == false || verifAdresse() == false) {
        return(false);
    }
    else {
            document.getElementById("redirection").action = "pagesPHP/Ajouter_Patient.php";
    }
}
// modifier les donnees de patient
function modifierPatient() {
    if (verifNom() == false || verifPrenom() == false || verifPhone() == false || verifCIN() == false || verifDate() == false ||  verifAdresse() == false) {
        return(false);
    }
    else {
        document.getElementById("redirection").action = "pagesPHP/Modifier_Patient.php";     
    }
}
