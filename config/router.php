<?php
/***
*! LE ROUTEUR ( Il  permet de définir les routes constituées d'informations qu'il commnuniquent au CONTROLLER )
*/

if ( isset( $_REQUEST[ 'controller' ] ) ) {
    switch ( $_REQUEST[ 'controller' ] ) {
        case 'securite' :
        require_once( PATH_SRC.'controllers'.DIRECTORY_SEPARATOR.'securite.controllers.php' );
        break;
        case 'user' :
        require_once( PATH_SRC.'controllers'.DIRECTORY_SEPARATOR.'user.controllers.php' );
        break;
        default :
        require_once( PATH_SRC.'controllers'.DIRECTORY_SEPARATOR.'error.controllers.php' );
        break;
    }
} else {
    require_once( PATH_SRC.'controllers'.DIRECTORY_SEPARATOR.'securite.controllers.php' );
}