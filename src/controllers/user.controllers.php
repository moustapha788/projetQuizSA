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
    if(isset($_REQUEST['action'])){
        if(!is_connect()){
            header("location:".WEB_ROOT);
            exit();
        }
        if($_REQUEST['action']=="accueil"){
            if(is_admin()){
                // connexion d'un admin
                lister_joueur();
            }else if(is_player()){
                // connexion d'un joueur
                presenter_jeu();
            }
        }elseif($_REQUEST['action']=="liste.joueur"){
            lister_joueur();
        }else{
            echo "cette page n'existe pas";
        }
    }else{
        header("location:".WEB_ROOT);
        exit();;
    }
}

// !fonction lister les joueurs
function lister_joueur(){
    // Appel du model pour chercher les joueurs
    ob_start();
    $tab_joueurs = find_users_by_role(ROLE_JOUEUR);
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."liste.joueur.html.php");   
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}

// !fonction presenter le jeu
function presenter_jeu(){
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");   
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}

