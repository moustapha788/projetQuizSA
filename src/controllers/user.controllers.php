<?php
/***
* ! LE CONTROLLER D'UTLISATEUR( gère toutes les actions de l'utilisateur(admin et/ou joueur) )
*/

// !chargement du modèle car il en le controler en a besoin
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.models.php");
/**
 * ? Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="accueil"){
            echo "Traiter ";
        }
    }
}


/**
* ! Traitement des Requetes GET
    *click sur un lien qui a été définie par le programmeur
    *renseigner sur l'url
    *redirection qui  charge une vue
*/
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(!is_connect()){
        header("location:".WEB_ROOT);
        exit();
    }
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="accueil"){
            if(is_admin()){
                // connexion d'un admin vue par défaut de l'admin: //!dashboard + lister_joueur
                presenter_vue_l_joueurs("liste.joueur.html.php","user");
            }else if(is_player()){
                // connexion d'un joueur
                presenter_jeu();
            }
        }elseif($_REQUEST['action']=="dashboard"){
            if(isset($_REQUEST['view'])){
                if(is_admin()){
                    switch($_REQUEST['view']){
                        // lister_joueur();
                        case "liste.joueurs":
                            presenter_vue_l_joueurs("liste.joueur.html.php","user");
                            break;
                        // Créer Admin;
                        case "creer.admin":
                            presenter_vue("inscription.html.php","securite");
                            break;
                        // Créer questions;
                        case "creer.questions":
                            presenter_vue("creer.questions.html.php","user");
                            break;
                        // lister questions
                        case "liste.questions":
                            presenter_vue("liste.questions.html.php","user");
                            break;
                        // default
                        default:
                            presenter_vue_l_joueurs("liste.joueur.html.php","user");
                            break;
                    }
                }
                if(is_player()){
                    header("location:".WEB_ROOT);
                    exit();
                }
            }else{
                presenter_vue_l_joueurs("liste.joueur.html.php","user");
            }
        }else{
            // header("location:".WEB_ROOT);
            // exit();
        }
    }else{
        // header("location:".WEB_ROOT);
        // exit();
    }
}





// !fonction presenter le jeu
function presenter_jeu(){
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
}

// !fonction presenter la vue lister questions
function presenter_vue_l_questions(string $view,string $the_controller):void{
    ob_start();
    // $tab_joueurs = find_users_by_role(ROLE_JOUEUR);
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");
}
// !fonction presenter la vue lister joueurs
function presenter_vue_l_joueurs(string $view,string $the_controller):void{
    ob_start();
    $tab_joueurs = find_users_by_role(ROLE_JOUEUR);
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");
}
// !fonction presenter la vue lister 
function presenter_vue(string $view,string $the_controller):void{
    ob_start();
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");
}

// // ! fonction activation class 

function active_class_color(string $view):string{
    if(isset($_GET['view']) ){
        if($_GET['view']===$view ){
            return "active-setting ";
        }else{
            return "";
        }
    }
}
// // ! fonction chahgement image

function change_image_when_active($view,$img_inactive,$img_active){
    if(isset($_GET['view']) ){
        if($_GET['view']===$view){
            return WEB_ICONES.$img_active;
        }else{
            return WEB_ICONES.$img_inactive;
        }
    }
}





