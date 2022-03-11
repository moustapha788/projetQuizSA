<?php
// front controller
//Demarrage de la sesion s'il n'existe
if ( session_status() == PHP_SESSION_NONE ) {
    session_start();
}

//inclusion des constantes
require_once dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'constantes.php';
//inclusion du Validator
require_once dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'validator.php';
//inclusion de l'ORM
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."orm.php";
//inclusion des roles
require_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."role.php";
//Chargement du router toujour au dernier
require_once dirname( dirname( __FILE__ ) ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'router.php';