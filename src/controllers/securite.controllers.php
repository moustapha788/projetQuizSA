<?php
/***
* !LE CONTROLLER DE SECURITE( gère tout ce qui est connexion et deconnexion )
*/
// !chargement du modèle car il en a besoin
require_once( PATH_SRC.'models'.DIRECTORY_SEPARATOR.'user.models.php' );
/**
*!Traitement des Requetes POST
*/
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {
    if ( isset( $_REQUEST[ 'action' ] ) ) {
        if ( $_REQUEST[ 'action' ] == 'connexion' ) {
            $login = $_POST[ 'login' ];
            $password = $_POST[ 'password' ];
            connexion( $login, $password );
        } elseif ( $_REQUEST[ 'action' ] == 'inscription' ) {
            $infos_new_user = [];
            collectInfos( $infos_new_user );
            register_user( $infos_new_user);

        }else{
            header( 'location'.WEB_ROOT);
            exit();
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
        }else{
            header("Location: " .WEB_ROOT);
            exit();
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
!#connexion d'un utilisateur ( admin ou nouveau joueur ) et
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

function connexion( string $login, string $password ):void {
    $errors = [];

    // todo vérification login
    champ_obligatoire( 'login', $login, $errors, 'Login obligatoire' );
    if ( !isset( $errors[ 'login' ] ) ) {
        valid_email( 'login', $login, $errors );
    }

    // todo vérification password
    champ_obligatoire( 'password', $password, $errors, 'Mot de passe obligatoire' );
    if ( !isset( $errors[ 'login' ] ) ) {
        // valid_password( 'password', $password, $errors );
    }

    if ( count( $errors ) == 0 ) {
        // todo contraintes de validation front réussie
        // Appel d'une fonction du models
        $user=find_user_login_password($login,$password);
        if(count($user)!=0){
            // existence de l'utilisateur
        $_SESSION[ KEY_USER_CONNECT ] = $user;
        header( 'location:'.WEB_ROOT.'?controller=user&action=accueil' );
        exit();
    } else {
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


// ! function pour collecter les infos de l'utilisateur
function collectInfos(array &$infos_new_user,int $score=15):array{
    $infos_new_user=[];
    $infos_new_user["nom"]=nettoyer_chaine($_POST['nom']);
    $infos_new_user["prenom"]=nettoyer_chaine($_POST['prenom']);
    $infos_new_user["login"]=nettoyer_chaine($_POST['login']);
    $infos_new_user["password"]=nettoyer_chaine($_POST['password1']);
    $infos_new_user["password2"]=nettoyer_chaine($_POST['password2']);
    $infos_new_user["role"]=is_admin()?ROLE_ADMIN:ROLE_JOUEUR;
    $extensions=strrchr($_FILES['fileUpload']['name'],".");
    $avatar=strtolower(preg_replace("/(@gmail.com)$/","",$infos_new_user['login']))."_".$infos_new_user["role"].$extensions;
    $infos_new_user["score"]=is_admin()?0:$score;
    $infos_new_user["avatar"]=(!empty($_FILES['fileUpload']['name']))? $avatar: "undefined_image";
    return $infos_new_user;
}

// ! fonction pour l'inscription d'un joueur
function register_user(array $infos_new_user):void{
    
    $errors=[];
    champ_obligatoire( 'nom', $infos_new_user['nom'], $errors, 'Nom obligatoire' );
    champ_obligatoire( 'prenom', $infos_new_user['prenom'], $errors, 'Prénom obligatoire' );
    champ_obligatoire( 'loginReg', $infos_new_user['login'], $errors, 'Login obligatoire' );
    champ_obligatoire( 'password1', $infos_new_user['password'], $errors, 'password1 obligatoire' );
    champ_obligatoire( 'password2', $infos_new_user['password2'], $errors, 'password2 obligatoire' );
    valid_password('password1',$infos_new_user['password'],$errors);
    valid_password('password2',$infos_new_user['password2'],$errors);
    matched_passwords_required($infos_new_user['password'],$infos_new_user['password2'],$errors,"password2","les 2 mots de passe  ne sont pas confondues");
    valid_email( 'loginReg', $infos_new_user['login'], $errors );
    if(is_user_in_file($infos_new_user)){
        $errors['already_log_in']="Cet utilisateur existe déjà.Choissisez un autre login";
    }

    // ! uploading files
    if ( $_FILES['fileUpload']['error']==0 ) {
        $file_name= $_FILES[ 'fileUpload' ][ 'name' ];
        $file_size= $_FILES[ 'fileUpload' ][ 'size' ];
        $file_tmp_name= $_FILES[ 'fileUpload' ][ 'tmp_name' ];
        $file_name=$infos_new_user["avatar"];
        $file_extension= strrchr($file_name,".");
        $extensions_autorisees=['.png','.jpg','.jpeg'];
        if(!in_array($file_extension, $extensions_autorisees)){/* test extension */
            $errors['upload'] ="Fichier non conforme ";
        }else if($file_size>1500000){/* test taille  */
            $errors['upload'] ="Fichier trop lourd";
        }else{
            move_uploaded_file( $file_tmp_name, ROOT."public".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$file_name );
        }
    }else{/* problème de chargement */
        $errors['upload'] ="Aucun photo chargé.Veillez choisir un photo";
    }


    if(count($errors)===0){
        collectInfos( $infos_new_user );
        unset($infos_new_user['password2']);
        $dataJson = array_to_json( $infos_new_user, 'users' );
        file_put_contents( PATH_DB, $dataJson );
        if ( !is_connect() ) {
            presenter_vue_bienvenue_nouveau_JOUEUR( $infos_new_user );
        }
        if (is_admin()) {
            connexion($infos_new_user['login'],$infos_new_user['password']);
        }
    }else{
        // erreur de registration
        $_SESSION[KEY_ERRORS]=$errors;
        if ( !is_connect()) {
            header( 'location:'.WEB_ROOT.'?controller=securite&action=inscription' );
            exit();
        }
        if ( is_admin() ) {
            header( 'location:'.WEB_ROOT.'?controller=user&action=dashboard&view=creer.admin' );
            exit();
        }
    }
}

