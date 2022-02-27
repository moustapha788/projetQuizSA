<?php
/***
 * !Toutes les requêtes d'informations par rapport à l'utilisateur
*/

/* 
! Recherche d'un utilisateur dans le fichier json(notre base de données) 
*/
function find_user_login_password(string $login,string $password):array{
    $users=json_to_array("users");
    foreach ($users as $user) {
    if( $user['login']==$login && $user['password']==$password)
        return $user;
    }
    return [];
}