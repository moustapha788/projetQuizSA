<?php
/***
* LE CONTROLLER DE SECURITE( gère tout ce qui est connexion et deconnexion)
*/


/**
Traitement des Requetes POST
*/
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
            echo "Traiter le formulaire de connexion";
        }
    }
}


/**
Traitement des Requetes GET
    click sur un lien
    click sur un lien
    click sur un lien
*/
if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_REQUEST['action'])){
        if($_REQUEST['action']=="connexion"){
            echo "Charger la page de connexion";
        }
    }else{
        echo "Charger la page de connexion";
    }
}