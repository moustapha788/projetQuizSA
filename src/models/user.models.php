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
        if( $user['login']==$login && $user['password']==$password){
            return $user;
        }
    }
    return [];
}
/* 
! trouver des utilisateurs par leur rôle
 */
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
/* 
! trouver l'avatar d'un utilisateur
 */
function find_avatar_user(array $key_user_connected):string{
    if($key_user_connected['avatar']===''){
        return "generatedPhotos";
    }else{
        return $key_user_connected['avatar'];
    }
}

/* 
! Rechercher si un utilisateur est déjà inscrit
 */
function is_user_in_file(array $infos_of_new_user):bool{
    $the_login_of_new_user=$infos_of_new_user["login"];
    $users=json_to_array("users");
    foreach($users as $user){        
        if($user['login']==$the_login_of_new_user){
            return true;
        }
    }
    return false;
}




