<?php

$reqPhotos = $bdd->query('SELECT photos.*, users.*, photos.id AS photo_id FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id ORDER BY photos.created_at DESC');

$photos = $reqPhotos->fetchAll(PDO::FETCH_ASSOC);

// echo '<pre>';
// echo var_export($photos, true);exit;

$reqLikes = $bdd->query('SELECT COUNT(photos_id) as total FROM likes INNER JOIN photos ON photos.id = likes.photos_id WHERE photos.id = likes.photos_id ORDER BY photos.created_at DESC');

$like = $reqLikes->fetch(PDO::FETCH_ASSOC);

$reqComments = $bdd->query('SELECT comments.*, users.* FROM comments INNER JOIN photos ON photos.id = comments.photos_id INNER JOIN users ON users.id = comments.users_id ORDER BY comments.created_at');

$comments = $reqComments->fetchAll(PDO::FETCH_ASSOC);

?>