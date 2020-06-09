const form_conn = document.getElementById('oublie');
const login = document.getElementById('prenom');
const password = document.getElementById('nom');
const compteJ = document.getElementById('profil');
/*connexion*/
function checkRequired(inputArray) {
    inputArray.forEach((input) => {
        if (input.value.trim() === '') {
            showError(input, `${getFiedName(input)} est obligatoire !`);
        } else {
            showSuccess(input)
        }
    });
}

function getFiedName(input) {
    return (input.id + '').charAt(0).toUpperCase() + input.id.substr(1);
}

function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'oublie_p error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'oublie_p succes';
}
/*connexion*/

form_conn.addEventListener('submit', (e) => {
    const inputs = document.getElementsByTagName("input");
    var erreur = false;
    //verifier si les chaps ne sont pas vides
    checkRequired([login, password, compteJ]);
    for (input of inputs) {
        if (!input.value) {
            erreur = true;
        }
    }
    if (erreur) {
        e.preventDefault();
        return false;
    }
});