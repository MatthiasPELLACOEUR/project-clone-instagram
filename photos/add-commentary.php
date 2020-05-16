<?php
session_start();
// connect bdd
require '../connection.php';
// names of variables


if(isset($_POST['nickname']) and isset($_POST['photosid']) and isset($_POST['comment'])) {
    $nickname = htmlspecialchars($_POST['nickname']);
    
    $comment  =  $_POST['comment'];
    $ipadress = getIp();

    $userstatement = $bdd->prepare('SELECT * FROM users WHERE nickname=?');
    $userstatement->execute([$_POST['nickname']]);

    $user = $userstatement->fetch(PDO::FETCH_ASSOC);

    $usersid = intval($user['id']);

    $photosstatement = $bdd->prepare('SELECT * FROM photos WHERE id=?');
    $photosstatement->execute([$_POST['photosid']]);

    $photo = $photosstatement->fetch(PDO::FETCH_ASSOC);

    $photosid = intval($_POST['photosid']);

    $requestinsertcomment = $bdd->prepare('INSERT INTO comments (photos_id,users_id,comment,created_at,ip_address) 
                                         VALUES(?,?,?,?,?)');
    $requestinsertcomment->execute([
        $photosid,
        $usersid,
        $comment,
        $dateTime,
        $ipadress
    ]);

    header('Location: '.$_SERVER['HTTP_REFERER']);
}
?>

