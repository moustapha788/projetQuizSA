<?php
/***
* VALIDATOR (les fonctions de validation)
*/

// ! fonction champ_obligatoire
function champ_obligatoire(string $key,string $data,array &$errors,string $message="ce champ est obligatoire"){
    if(empty($data)){
        $errors[$key]=$message;
    }
}

// ! fonction valid_email
function valid_email(string $key,string $data,array &$errors,string $message="email invalid"){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
        $errors[$key]=$message;
    }
}

// fonction qui permet de nettoyer une chaine des carartères indésirables
function nettoyer_chaine(string &$chaine):string{
    $chaine=strip_tags(htmlspecialchars(trim($chaine)));
    return $chaine;
}



// ! fonction valid_password
function valid_password(string $key,string $data,array &$errors,string $message="entrer un mot de passe valide"){
    if(empty($data)){
        $errors[$key]=$message;
    }else{
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z]{6,}$/', $data)){
            $errors[$key]='format invalide';
        }
    }
}

function mathced_required(string $password1,string $password2,array &$errors,string $key,string $message):void{
    if(!is_matched_password($password1,$password2,)){
        $errors[$key]=$message;
    }
}

function is_matched_password(string $password1,string $password2,):bool{
    return $password1===$password2;
}

function uploadPhotoUser(string $avatar){
    if($_SESSION[KEY_USER_CONNECT][$avatar]===''){
        return 'generatedPhotos.png';
    }else{
        return $_SESSION[KEY_USER_CONNECT][$avatar];
    }
}
