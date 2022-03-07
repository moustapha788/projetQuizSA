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
            $infos_new_user=[];
            collectInfos($infos_new_user);
            if(is_user_in_file($infos_new_user)){
                header("location:".WEB_ROOT."?controller=securite&action=inscription");
            }else{
                if (!is_connect()) {
                    collectInfos($infos_new_user);
                    $error_upload='';
                    upload_avatar($error_upload);
                    presenter_vue_bienvenue_nouveau_JOUEUR($infos_new_user);

                }
                if(is_connect() && $_SESSION[KEY_USER_CONNECT]['role']==ROLE_ADMIN){
                    collectInfos($infos_new_user,ROLE_ADMIN);
                    $error_upload='';
                    upload_avatar($error_upload);
                    presenter_vue_bienvenue_nouveau_ADMIN($infos_new_user);
                }
                register_user($infos_new_user/* $file */);
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
    }
}

/*
!===============================================================================================================================================
                            todo fonctions
!===============================================================================================================================================
 */
/*
*****************
****************
***************
**************
!#FONCTION
!#connexion d'un utilisateur (admin ou nouveau joueur) et
!#dnnexion d'un utilisateur (admin ou nouveau joueur)
!#presenter la page d'inscription
*************
************
***********
**********
*********
********
*******
******
*****
****
***
**
*/


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
        // valid_password("password",$password,$errors);
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
// !fonction presenter la page de connexion
function presentation_connexion(){
    ob_start();
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}
// !fonction presenter la vue de bienvenue du nouveau joueur
function presenter_vue_bienvenue_nouveau_JOUEUR($infos_new_user):void{
    ob_start();
    $theNewUser=$infos_new_user;
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."bienvenue.JOUEUR.html.php");
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}
// !fonction presenter la vue de bienvenue du nouveau admin
function presenter_vue_bienvenue_nouveau_ADMIN($infos_new_user):void{ 
    ob_start();
    $theNewUser=$infos_new_user;
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."bienvenue.ADMIN.html.php");
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");
}
/*
*****************
****************
***************
**************
!#fonction inscrire un utilisateur (admin ou nouveau joueur)
!#presenter la page d'inscription
*************
************
***********
**********
*********
********
*******
******
*****
****
***
**
*/

// !fonction presenter la page d'inscription
function presentation_inscription(){
    // if(!is_connect()){
        ob_start();
        require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."inscription.html.php");
        $content_for_views=ob_get_clean();
        require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    // }
}


// !fff
function collectInfos(array &$infos_new_user,string $role=ROLE_JOUEUR):array{
    $infos_new_user=[];
    $infos_new_user["nom"]=strip_tags(trim($_POST['nom']));
    $infos_new_user["prenom"]=strip_tags(trim($_POST['prenom']));
    $infos_new_user["login"]=strip_tags(trim($_POST['login']));
    $infos_new_user["password"]=strip_tags(trim($_POST['password1']));
    $infos_new_user["role"]=$role;
    $infos_new_user["score"]=0;
    // $file=$_POST['fileUpload'];
    return $infos_new_user;
}
// ! fonction pour l'inscription d'un joueur
function register_user(array $infos_new_user/* $file */):void{
    
    /* 
    $errors=[];
    // todo vérification s'ils sont des champs vides
    champ_obligatoire("prenom",$prenom,$errors,'Login obligatoire');
    champ_obligatoire("nom",$nom,$errors,'Login obligatoire');
    champ_obligatoire("login",$login,$errors,'Login obligatoire');
    champ_obligatoire("password1",$password1,$errors,'Login obligatoire');
    champ_obligatoire("password2",$password2,$errors,'Login obligatoire');
 */
    $dataJson=array_to_json($infos_new_user,'users');
    file_put_contents(PATH_DB,$dataJson);

}

function upload_avatar(&$error_upload=''){
    if($_FILES['fileUpload']['error']==0){
        // test taille
        if($_FILES['fileUpload']['error']>1500000){
            $error_upload="votre fichier est trop lourd";
        }
        // test extension
        $extension=strrchr($_FILES['fileUpload']['name'],'.');
        if($extension!='.jpg' || $extension!='.png' || $extension!='.png' || $extension!='.jpeg'){
            $error_upload="votre fichier n'est pas conforme";
        }
        // au final
        if($error_upload===''){
            move_uploaded_file($_FILES['fileUpload']['tmp_name'],WEB_PUBLIC."uploads".DIRECTORY_SEPARATOR.$_FILES['fileUpload']['tmp_name']);
        }
    }else{
        // problème de chargement
        $error_upload="problème de chargement";
    }    
}