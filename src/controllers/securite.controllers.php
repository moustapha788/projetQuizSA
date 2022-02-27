<?php
/***
* !LE CONTROLLER DE SECURITE( gère tout ce qui est connexion et deconnexion)
*/

require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
/**
*!Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
            $login=$_POST['login'];
            $password=$_POST['password'];
            connexion($login,$password);
        }
    }
}


/**
*!Traitement des Requetes GET
    *click sur un lien qui a été définie par le programmeur
    *renseigner sur l'url
    *redirection qui  charge une vue
*/
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
        }elseif($_REQUEST['action']=="deconnexion"){
            log_out();
        }
    }else{
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    }
}





// ! fonction de connexion

function connexion(string $login,string $password):void{
    $errors=[];

    // todo vérification login
    champ_obligatoire("login",$login,$errors,'Login obligatoire');
    if(!isset($errors['login'])){
        valid_email("login",$login,$errors);
    }

    // todo vérification password
    champ_obligatoire("password",$password,$errors,'Mot de passe obligatoire');
    if(!isset($errors['login'])){
        valid_password("password",$password,$errors);
    }



    // todo contraintes de validation front réussie
    if(count($errors)==0){
        // Appel d'une fonction du models
        $user=find_user_login_password($login,$password);
        if(count($user)!=0){
            // existence de l'utilisateur
            $_SESSION[KEY_USER_CONNECT]=$user;
            header('location:'.WEB_ROOT.'?controller=user&action=accueil');
        }else{
            // Inexistence de l'utilisateur
            $errors['connexion']='Login ou mot de passe incorrect';
            $_SESSION[KEY_ERRORS]=$errors;
            header("location:".WEB_ROOT);
            exit();
        }

    }else{
        // erreur de validation 
        $_SESSION[KEY_ERRORS]=$errors;
        header("location:".WEB_ROOT);
        exit();
    }
}

// ! fonction de deconnexion
function log_out(){
    session_destroy();
    session_unset();
    header('location:'.WEB_ROOT);
    exit();
}