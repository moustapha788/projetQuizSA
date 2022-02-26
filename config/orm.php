<?php
/***
* ? L'ORM (OBJECT RELATIONAL MAPPING)
*/

//! Recuperation des donnees du fichier JSON avec la fonction json_to_array(find_data)
function json_to_array(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $dataArray=json_decode($dataJson,true);
    return $dataArray[$key];
}

//! Enregistrement et Mis a jour des donnees du fichier avec la fonction array_to_json (save_data)
function array_to_json(string $key,array $dataArray):int{
    $dataArray[$key];
    $dataJson=json_encode($dataArray,JSON_FORCE_OBJECT);
    file_put_contents(PATH_DB,$dataJson,LOCK_EX);
    return 1;
}
