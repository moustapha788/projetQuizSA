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
                // connexion d'un admin vue par défaut de l'admin: //!dashboard + lister_joueur
                // 
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
                        case "creer.questions":
                            presenter_vue("creer.questions.html.php","user");
                            break;
                        case "liste.questions":
                            presenter_vue("liste.questions.html.php","user");
                            break;
                    }
                }
                if(is_player()){
                    echo 'Attention  je peux vous porter pliante ! ';
                }
            }else{
                presenter_vue_l_joueurs("liste.joueur.html.php","user");
            }
        }else{
            echo "cette page n'existe pas";
        }
    }else{
        header("location:".WEB_ROOT);
        exit();;
    }
}





// !fonction presenter le jeu
function presenter_jeu(){
    ob_start();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."jeu.html.php");   
    $content_for_views=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}

// !fonction presenter la vue lister questions sur le tableau de bord de l'admin
function presenter_vue_l_questions(string $view,string $the_controller):void{
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
    ob_start();
    $tab_joueurs = find_users_by_role(ROLE_JOUEUR);
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);   
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");   
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}
// !fonction presenter la vue lister questions sur le tableau de bord de l'admin: vue par défaut
function presenter_vue_l_joueurs(string $view,string $the_controller):void{
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
    ob_start();
    $tab_joueurs = find_users_by_role(ROLE_JOUEUR);
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);   
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");   
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}
// !fonction presenter la vue lister questions sur le tableau de bord de l'admin: vue par défaut
function presenter_vue(string $view,string $the_controller):void{
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
    ob_start();
    require_once(PATH_VIEWS.$the_controller.DIRECTORY_SEPARATOR.$view);   
    $content_for_layout=ob_get_clean();
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."dashboard.html.php");   
    require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php"); 
}