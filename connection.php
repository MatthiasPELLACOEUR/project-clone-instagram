<?php 

try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=clone_instagram;charset=utf8',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}
catch (Exception $e){
    die('Erreur : ' .$e->getMessage());
}

date_default_timezone_set('Europe/Paris');

function getIp(){
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}