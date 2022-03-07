const formReg = document.getElementById('connexion-form-inscrip');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const email = document.getElementById('email');
const password1 = document.getElementById('password1');
const password2 = document.getElementById('password2');

//todo Functions-------------------------------------------------------------
function showErrorReg(input, message) { //Afficher les messages d'erreur
    const formControlReg = input.parentElement;
    formControlReg.className = 'forms-group-inscrip  error';
    const small = formControlReg.querySelector('small');
    small.innerText = message;
}
// !
function showSuccessReg(input) {
    const formControlReg = input.parentElement;
    formControlReg.className = 'forms-group-inscrip  success';
}
// !
function checkEmailReg(input) { //Tester si l'email est valide :  javascript : valid email
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    if (re.test(input.value.trim().toLowerCase())) {
        showSuccessReg(input);
    } else {
        showErrorReg(input, "L'email est invalide!");
    }
}
// !
function checkRequired(inputArray) { // Tester si les champs ne sont pas vides
    inputArray.forEach(input => {
        if (input.value === '') {
            showErrorReg(input, `${getFieldNameReg(input)} est obligatoire`);
        } else {
            showSuccessReg(input);
        }
    });
}

// !
function getFieldNameReg(input) {
    //Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}

// ! 
function checkPasswordMatch(input1, input2) {
    if (input1.value !== input2.value) {
        showErrorReg(input2, 'Les mots de passe ne correspondent pas !');
    }
}
// !
function isValidEmail(email) {
    //Tester si l'email est valide
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// todo Even listeners--------------------------------------------------------
window.addEventListener('load', () => {
    const theinput = document.querySelectorAll(".control-group-inscription input");
    theinput.forEach(input => {
        input.value = '';
    });
})
formReg.addEventListener('submit', function(e) {
    e.preventDefault(); //Bloquer la soumission du formulaire
    // ! compte le nombre d'rreurs
    var cptErrors = 0;

    checkRequired([prenom, nom, email, password1, password2]);
    checkEmailReg(email);
    // !
    function isValidPasswordReg(password) {
        motif = password.value.trim();
        re = /^(?=.*\d).{6,}$/;
        if (password.value === '') {
            showErrorReg(password, 'le mot de passe  est obligatoire!');
            cptErrors++;
        } else if (password.value.trim().length < 6) {
            showErrorReg(password, 'Mettez 6 caractères au moins');
            cptErrors++;
        } else if (!(re.test(motif))) {
            showErrorReg(password, 'respectez le format: au moins 1 lettre et une chiffre');
            cptErrors++;
        } else {
            showSuccessReg(password);
        }
    }
    // !
    function vérifierLongueurEtFormat(input, min, max, cptErrors) {
        if (input.value === '') {
            showErrorReg(input, `Le ${getFieldNameReg(input)} est obligatoire!`);
            cptErrors++;
        } else {
            if (input.value.trim().length < min) {
                showErrorReg(input, `Le ${getFieldNameReg(input)} doit étre au minimum ${min} caractères!`);
                cptErrors++;
            } else if (input.value.trim().length > max) {
                showErrorReg(input, `Le ${getFieldNameReg(input)} doit étre au maximum ${max} caractères!`);
            } else {
                showSuccessReg(input);
            }
        }
    }
    // ! Prenom
    vérifierLongueurEtFormat(prenom, 3, 15, cptErrors);
    // ! Nom
    vérifierLongueurEtFormat(nom, 3, 15, cptErrors);
    // ! Password 1
    isValidPasswordReg(password1);
    // ! Password 2
    isValidPasswordReg(password2);
    // ! Email
    if (email.value === '') {
        showErrorReg(email, "L'email est obligatoire!");
        cptErrors++;
    } else if (email.value.trim().length === 0) {
        showErrorReg(email, "Le prénom ne peut être composé d'espace vide!");
    } else if (!isValidEmail(email.value)) {
        showErrorReg(email, "L'email est invalide!");
        cptErrors++;
    } else {
        showSuccessReg(email);
    }

    // ! SOUMISSION DU FORMULAIRE SI PAS D'ERREUR
    if (cptErrors === 0) {
        e.target.submit();
    }
});


/*********************
 ********************
//! upload de fichier
 *******************
 *******************/
const fileUpload = document.getElementById('fileUpload');
const chooseAvatar = document.querySelector('.choose-avatar figure');
const btnUpload = document.getElementById('btn-upload');
const labelConnexion = document.getElementById("label-connexion");
btnUpload.addEventListener('click', () => {
    fileUpload.click();
    fileUpload.addEventListener("change", getImage, false);
});
labelConnexion.addEventListener('click', () => {
    fileUpload.click();
    fileUpload.addEventListener("change", getImage, false);
});

function getImage() {
    if (chooseAvatar.children.length === 0) {
        const imageACharger = fileUpload.files[0];
        let newImg = new Image(imageACharger.width, imageACharger.height);
        newImg.src = URL.createObjectURL(imageACharger);
        newImg.id = "new-image";
        chooseAvatar.appendChild(newImg);
    } else {
        const theElements = document.querySelectorAll('#choose-avatar img');
        theElements.forEach(elt => {
            chooseAvatar.removeChild(elt);
        })
        getImage();
    }
}