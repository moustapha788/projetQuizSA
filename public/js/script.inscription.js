const formReg = document.getElementById('connexion-form-inscrip');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const email = document.getElementById('email');
const password1 = document.getElementById('password1');
const password2 = document.getElementById('password2');
const elmPFileError = document.getElementById("upload-file");
//todo Functions-------------------------------------------------------------
// ! showErrorReg
function showErrorReg(input, message) { //Afficher les messages d'erreur
    const formControlReg = input.parentElement;
    formControlReg.className = 'forms-group-inscrip  error';
    const small = formControlReg.querySelector('small');
    small.innerText = message;
}
// ! showSuccessReg
function showSuccessReg(input) {
    const formControlReg = input.parentElement;
    formControlReg.className = 'forms-group-inscrip  success';
}
// ! showErrorFile
function showErrorFile($message) {
    elmPFileError.className = 'error-of-upload-file text-center RED-ERROR';
    elmPFileError.innerText = $message;
}
// ! showSuccessFile
function showSuccessFile() {
    elmPFileError.className = 'invisible';
}

// ! getFieldNameReg
function getFieldNameReg(input) {
    //Retour le nom de chaque input en se basant sur son id
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}


// !
function isValidEmail(email) {
    //Tester si l'email est valide
    const reGmail = /(@gmail.com)$/;
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase()) && reGmail.test(String(login));
}

// todo Even listeners--------------------------------------------------------
window.addEventListener('load', () => {
    const theinput = document.querySelectorAll(".control-group-inscription input");
    theinput.forEach(input => {
        input.value = '';
    });
});
formReg.addEventListener('submit', function(e) {
    e.preventDefault(); //Bloquer la soumission du formulaire
    // ! compte le nombre d'rreurs
    var cptErrors = 0;

    // ! checkRequired
    function checkRequired(inputArray) { // Tester si les champs ne sont pas vides
        inputArray.forEach(input => {
            if (input.value === '') {
                showErrorReg(input, `${getFieldNameReg(input)} est obligatoire`);
                cptErrors++;
            } else {
                showSuccessReg(input);
            }
        });
    }
    // ! checkEmailReg
    function checkEmailReg(input) { //Tester si l'email est valide :  javascript : valid email
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if (re.test(input.value.trim().toLowerCase())) {
            showSuccessReg(input);
        } else {
            showErrorReg(input, "L'email est invalide!");
            cptErrors++;
        }
    }


    checkRequired([prenom, nom, email, password1, password2]);
    checkEmailReg(email);
    // ! isValidPasswordReg
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
    // ! vérifierLongueurEtFormat
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
    // !fonction checkPasswordMatch
    function checkPasswordMatch(input1, input2) {
        if (input1.value !== input2.value) {
            showErrorReg(input2, 'Les mots de passe ne correspondent pas!');
            cptErrors++;
        }
    }
    // ! checkChooseFile
    function checkChooseFile(fileUpload) {
        if (fileUpload.value === '') {
            showErrorFile("Aucun photo chargé,veillez choisir un fichier de format .png, .jpeg, .jpg");
            cptErrors++;
        } else {
            showSuccessFile();
        }
    }
    // ! Prenom
    vérifierLongueurEtFormat(prenom, 3, 30, cptErrors);
    // ! Nom
    vérifierLongueurEtFormat(nom, 2, 15, cptErrors);
    // ! Password 1
    isValidPasswordReg(password1);
    // ! Password 2
    isValidPasswordReg(password2);
    // ! confirmité des 2 mots de passe
    checkPasswordMatch(password1, password2);
    // ! choix avatar
    checkChooseFile(fileUpload);

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
    console.log(cptErrors);
    console.log(fileUpload.value);
    console.log(fileUpload);
    console.log(elmPFileError);
    // ! SOUMISSION DU FORMULAIRE SI PAS D'ERREUR ( toutes les 9 erreurs n'existe plus);
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
// const l;
btnUpload.addEventListener('click', () => {
    fileUpload.click();
    fileUpload.addEventListener("change", getImage, false);
});
labelConnexion.addEventListener('click', () => {
    fileUpload.click();
    fileUpload.addEventListener("change", getImage, false);
});
chooseAvatar.addEventListener('click', () => {
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
        const theElements = document.querySelectorAll('#choose-avatar img,#choose-avatar small');
        theElements.forEach(elt => {
            chooseAvatar.removeChild(elt);
        })
        getImage();
    }
    btnUpload.style.backgroundColor = "var(--success-color)";
    btnUpload.innerText = "fichier chargé avec succés";
}