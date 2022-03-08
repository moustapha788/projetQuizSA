<?php
/* 
================================
*****************************
! LES  CONSTANTES DE MON PROJET :
*****************************
l'uri ou les query params contiennent 2 informations qui nous permet de dire au routeur de  choisir une décision et au controller de choisir une acion à executer

le rôle du routeur est de choisir un controller
le rôle du controller est de choisir une action
================================
*/

/*
? Chemin sur dossier racine du projet
*/
define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER["SCRIPT_FILENAME"]));

/*
? Chemin sur dossier src qui contient les controllers et les modeles
*/
define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);

/*
? Chemin sur dossier templates du projet
*/
define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);

/*
? Chemin sur data qui contient le fichier Json db.json
*/
define("PATH_DB",ROOT."data".DIRECTORY_SEPARATOR."db.json");

/*
? Chemin sur le dossier public , pour inclusion des images,css et js
*/
define("WEB_ROOT","http://localhost/projetQuizSA/public/");

/* 
? URL pour charger les  images et les fichiers css
*/
define("WEB_PUBLIC",str_replace("index.php","",$_SERVER["SCRIPT_NAME"]));
/* 
? URL pour charger les  images uploadés pour les phots de profil
*/
define("WEB_PHOTOS",WEB_PUBLIC."uploads".DIRECTORY_SEPARATOR);

/* 
? Clé d'erreurs
*/
define("KEY_ERRORS","errors");

/* 
? Clé d'utilisateur connecté
*/
define("KEY_USER_CONNECT","user-connect");
/* 
? Clé d'utilisateur joueur
*/
define('ROLE_JOUEUR','ROLE_JOUEUR');
/* 
? Clé d'utilisateur admin
*/
define('ROLE_ADMIN','ROLE_ADMIN');