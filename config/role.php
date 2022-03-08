<?php
/***
* ! LES RÔLES: Gestion des autorisations (ADMIN ET JOUEUR)
*/

/***
* ! fonction qui permet de savoir si un  individu est connecté au site ou non
***/
function is_connect():bool{
    return isset($_SESSION[KEY_USER_CONNECT]);
}

/***
* ! fonction qui permet de savoir si un utilisateur est un joueur
***/
function is_player():bool{
    return is_connect() &&  $_SESSION[KEY_USER_CONNECT]['role']==ROLE_JOUEUR;
}

/***
 * ! fonction qui permet de savoir si un utilisateur est un admin
 ***/
function is_admin():bool{
    return is_connect() &&  $_SESSION[KEY_USER_CONNECT]['role']==ROLE_ADMIN;
}
