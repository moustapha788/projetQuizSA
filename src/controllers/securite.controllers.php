<?php
/***
* !LE CONTROLLER DE SECURITE( gère tout ce qui est connexion et deconnexion)
*/
// !chargement du modèle car il en a besoin
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
        }elseif($_REQUEST['action']=="inscription"){
            if(isset($_POST)){
                $prenom=$_POST['prenom'];
                $nom=$_POST['nom'];
                $login=$_POST['login'];
                $password1=$_POST['password1'];
                $password2=$_POST['password2'];
                $file=$_POST['file'];
                if(is_valid_inscription()){
                    header("location:".WEB_ROOT."?controller=securite&action=inscription" );
                    exit();
                }
                register_user($prenom,$nom,$login,$password1,$password2,$file);
                // inscription_jeu();                    
            }
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
            presentation_connexion();
        }elseif($_REQUEST['action']=="deconnexion"){
            log_out();
        }elseif($_REQUEST['action']=="inscription"){
            presentation_inscription();
        }
    }else{
        presentation_connexion();
        /* 
        if(isset($_SESSION[KEY_USER_CONNECT])){
            presentation_connexion();
        }else{
            echo "pour l'instant on n'utlise pas de cookies pour stocker l'information de connexion.Veillez vous rediriger vers votre accueil";
        } 
         */
    }
}





// ! fonction pour la connexion

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



    if(count($errors)==0){
        // todo contraintes de validation front réussie
        // Appel d'une fonction du models
        $user=find_user_login_password($login,$password);
        if(count($user)!=0){
            // existence de l'utilisateur
            $_SESSION[KEY_USER_CONNECT]=$user;
            header('location:'.WEB_ROOT.'?controller=user&action=accueil');
            exit();
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

// ! fonction pour la déconnexion
function log_out(){
    session_destroy();
    session_unset();
    header('location:'.WEB_ROOT);
    exit();
}

// ! fonction pour l'inscription d'un joueur
function register_user(string $prenom, string $nom,string $login, string $password1, string $password2,$file):void{
    $errors=[];

    // todo vérification s'ils sont des champs vides
    champ_obligatoire("prenom",$prenom,$errors,'Login obligatoire');
    champ_obligatoire("nom",$nom,$errors,'Login obligatoire');
    champ_obligatoire("login",$login,$errors,'Login obligatoire');
    champ_obligatoire("password1",$password1,$errors,'Login obligatoire');
    champ_obligatoire("password2",$password2,$errors,'Login obligatoire');


    save_a_new_user();
}

function save_a_new_user(){
   

}




// !fonction presenter le jeu
function inscription_jeu(){
    ob_start();
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."inscription.html.php");   
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}


// !fonction presenter page de connexion
function presentation_connexion(){
    ob_start();
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");   
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}

function presentation_inscription(){
    // if(!is_connect()){
        ob_start();
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."inscription.html.php");   
        $content_for_views=ob_get_clean();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
    // }
}