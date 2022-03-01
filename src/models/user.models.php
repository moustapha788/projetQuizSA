<?php
/***
 * !Toutes les requêtes d'informations par rapport à l'utilisateur
*/

/* 
! Recherche d'un utilisateur dans le fichier json(notre base de données) 
*/
function find_user_login_password(string $login,string $password):array{
    // travail de l'orm
    $users=json_to_array("users");
    foreach ($users as $user) {
    if( $user['login']==$login && $user['password']==$password)
        return $user;
    }
    return [];
}

function find_users_by_role(string $role):array{
    // discussion avec l'orm
    $users=json_to_array("users");
    $result=[];
    foreach ($users as $user) {
        if( $user['role']==$role){
            $result[]= $user;
        }
    }
    return $result;
}

