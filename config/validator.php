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
function valid_password(string $key,string $data,array &$errors,string $message="password invalid"){
    if(empty($data)){
        $errors[$key]='entrez mot de passe';
    }else{
        $nettoie=nettoyer_chaine($data);
        if(strlen($nettoie)<=17){
            
        }
    }
}


function is_matched_password($password1,$password2):bool{
    return $password1===$password2;
}

function is_valid_inscription(){
    // valid_password();
    // is_matched_password();
}