compteJ.addEventListener('onsubmit', function Submit() {
    var pickedOne = false;
    var inputs = document.getElementsByClassName('text');
    for (var i = 0, l = inputs.length; i < l; ++i) {
        if (inputs[i].value) {
            pickedOne = true;
            break;
        }
    }
    if (!pickedOne) {
        alert('Remplissez tous les champs !');
    } else {
        alert('Donnees envoyees');
    }
    return pickedOne;
});


const pwd1 = document.getElementById('pwd1');
const pwd2 = document.getElementById('pwd2');

compteJ.addEventListener('submit', (e) => {
    /*e.preventDefault();*/
    const inputs1 = document.getElementsByTagName("input");
    var erreur1 = false;
    checkPasswordsMatch(pwd1, pwd2);
    for (input1 of inputs1) {
        if (!input1.value) {
            erreur1 = true;
        }
    }
    if (erreur1) {
        e.preventDefault();
        return false;
    }
});