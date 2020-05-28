//recuperation des elements

const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

//functions
//tester si un champ est vide
//=== verifie l'egalite et le type des deux objets en meme temps
//`${}` alt gr 7... cest pour afficher une variable

function checkRequired(inputArray) {
    inputArray.forEach((input) => {
        if (input.value.trim() === '') {
            showError(input, `${getFiedName(input)} est obligatoire !`);
        } else {
            showSuccess(input)
        }
    });

}

function showError(input, message) {
    const formControl = input.parentElement;
    formControl.className = 'form-control error';
    const small = formControl.querySelector('small');
    small.innerText = message;
}
//
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-control succes';
}

//il met la premiere lettre en majuscule
//chartAt donne un caractere 
//slice donne le reste de la chaine sans...

function getFiedName(input) {
    return input.id.chartAt(0).toUpperCase() + input.id.slice(1);
}

function checkLength(input, min, max) {
    if (input.value.length < min) {
        showError(input, `${getFiedName(input)} doit être superieur à ${min} caractere`);
    } else if (input.value.length > max) {
        showError(input, `${getFiedName(input)} doit être inférieur à ${max} caractere`);
    } else {
        showSuccess(input);
    }
}

function checkPasswordsMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showError(input2, 'mot de passe non identique !');
    }
}

function checkEmail(input) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input)
    } else {
        showError(input, 'Format Email incorrect !')
    }
}

//Events
form.addEventListener('submit', (e) => {
    e.preventDefault();
    //verifier si les chaps ne sont pas vides
    checkRequired([username, email, password, password2]);
    //la longueur des chaines
    checkLength(username, 3, 15);
    checkLength(password, 6, 30);
    //password identique
    checkPasswordsMatch(password, password2);
    //email valide
    checkEmail(email);
});