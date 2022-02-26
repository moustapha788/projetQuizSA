user
<?php
/***
* ! LE CONTROLLER D'UTLISATEUR( gère toutes les actions de l'utilisateur(admin et/ou joueur) )
*/


/** 
 * ? Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']==""){
            echo "Traiter ";
        }
    }
}


/**
Traitement des Requetes GET
    click sur un lien
    click sur un siasie dans l'url
    click sur un lien
*/
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']==""){
            echo "Charger la page ";
        }
    }else{
        echo "Charger la page";
    }
}