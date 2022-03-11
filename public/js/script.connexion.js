const formCon = document.getElementById('connexion-form');
const login = document.getElementById('login');
const password = document.getElementById('password');


//Functions-------------------------------------------------------------

function showError(input, message) {
    //Afficher les messages d'erreur
    const formControl = input.parentElement;
    formControl.className = 'forms-group error';
    const p = formControl.nextElementSibling;
    p.innerHTML = message;
    p.className = "RED-ERROR  ERROR-LAY";
}

// !fonction showSuccess
function showSuccess(input) {
    const formControl = input.parentElement;
    formControl.className = 'forms-group success';
    const p = formControl.nextElementSibling;
    p.style.display = 'none';
}

// !fonction checkEmail
function checkEmail(input) {
    //Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccess(input);
    } else {
        showError(input, `L'email est invalide!`);
    }
}

// !fonction isValidEmail
function isValidEmail(login) {
    //Tester si l'email est valide
    const reGmail = /(@gmail.com)$/;
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(login).toLowerCase()) && reGmail.test(String(login));
}

// !fonction isValidPassword
function isValidPassword(password) {
    validity = false;
    if (password.value.trim().length < 6) {
        validity = false;
    } else {
        motif = password.value.trim();;
        re = /^(?=.*\d).{6,}$/;
        if (re.test(motif)) {
            validity = true;
        }
    }
    return validity;
}


//Even listeners--------------------------------------------------------
formCon.addEventListener('submit', function(e) {
    //Blocage de la soumission du formulaire
    e.preventDefault();

    checkEmail(login);
    isValidPassword(password);

    if (login.value === '') {
        showError(login, "Login obligatoire!");
    } else if (!isValidEmail(login.value)) {
        showError(login, "L'email est invalide!");
    } else {
        showSuccess(login);
    }

    if (password.value === '') {
        showError(password, 'Password  obligatoire ');
    } else {
        if (!isValidPassword(password)) {
            showError(password, 'le mot doit être au moins 6 caractères et doit contenir au moins une lettre et une majuscule ');
        } else {
            showSuccess(password);
        }
    }
    if (isValidEmail(login.value) && isValidPassword(password)) {
        e.target.submit();
    }
});