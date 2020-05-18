<?php
session_start();

require '../connection.php';

$reqPhotos = $bdd->query('SELECT photos.*, users.nickname FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id ORDER BY photos.created_at DESC');


// echo '<pre>';
// echo var_export($photos, true);exit;

if(isset($_GET['t'], $_GET['id'], $_SESSION['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
    $getId = intval($_GET['id']);
    $getLike = intval($_GET['t']);

    $check = $bdd->prepare('SELECT id FROM photos WHERE id = ?');
    $check->execute(array($getId));

    if($check->rowCount() == 1) {
        if($getLike == 1) {
            $checkLike = $bdd->prepare('SELECT id FROM likes WHERE photos_id = ? AND users_id = ? AND ipaddress = ?');
            $checkLike->execute(array($getId, $_SESSION['id'], getIp()));

            if($checkLike->rowCount() == 1){
                $deleteLike = $bdd->prepare('DELETE FROM likes WHERE photos_id = ? AND users_id = ? AND ipaddress = ?');
                $deleteLike->execute(array($getId, $_SESSION['id'], getIp()));
            }else{
                $insLike = $bdd->prepare('INSERT INTO likes (photos_id, users_id, ipaddress) VALUES (?, ?, ?)');
                $insLike->execute(array($getId, $_SESSION['id'], getIp()));
            }
        }elseif($getLike !== 1) {
            echo 'petit chenapan';
        }
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }else {
        echo "t'es nul";
    }
}else {
    exit;
}