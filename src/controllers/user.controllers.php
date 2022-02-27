<?php
/***
* ! LE CONTROLLER D'UTLISATEUR( gère toutes les actions de l'utilisateur(admin et/ou joueur) )
*/


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
            require_once(PATH_VIEWS."user".DIRECTORY_SEPARATOR."accueil.html.php");
        }
    }else{
        header("location:".WEB_ROOT);
        exit();;
    }
}


function lister_joueur():array{
    return find_users_by_role(ROLE_JOUEUR);
}
