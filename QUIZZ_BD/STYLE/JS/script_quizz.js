const form_conn = document.getElementById('connexion');
const login = document.getElementById('login');
const password = document.getElementById('password');
const compteJ = document.getElementById('compteJ');
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
    formControl.className = 'form_form_user error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}

function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form_form_user succes';
}
/*connexion*/
function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'mot de passe non identique !');
    }
}
form_conn.addEventListener('submit', (e) => {
    const inputs = document.getElementsByTagName("input");
    var erreur = false;
    //verifier si les chaps ne sont pas vides
    checkRequired([login, password]);
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