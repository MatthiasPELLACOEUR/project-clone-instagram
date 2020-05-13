<?php
session_start();

require 'connection.php';
// $login = boolval($_SESSION['nickname'])->rowCount();
// var_dump((bool) $_SESSION['nickname']);

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile grey darken-4 ">' . $_SESSION['nickname'] . '</a></li>';
} else {
    header('Location: ./login.php');
}

$reqPhotos = $bdd->query('SELECT photos.*, users.* FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id');

$photos = $reqPhotos->fetchAll();


$reqLikes = $bdd->query('SELECT COUNT(photos_id) as total FROM likes INNER JOIN photos ON photos.id = likes.photos_id WHERE photos.id = likes.photos_id');

$like = $reqLikes->fetch(PDO::FETCH_ASSOC);

$reqComments = $bdd->query('SELECT comments.*, users.* FROM comments INNER JOIN photos ON photos.id = comments.photos_id INNER JOIN users ON users.id = comments.users_id ORDER BY comments.created_at LIMIT 2');

$comments = $reqComments->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>clone-instagram</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <nav class="row">
                <div class="nav-wrapper grey darken-4 col s12 offset-s1 col m7 offset-m2">
                    <span class="appname white-text text-darken-2 ">Clone Instagram</span>
                    <ul class="right hide-on-med-and-down">
                        <?php echo $username ?>
                        <li><a href="/logout.php">Disconnect</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 offset-s2 m6 offset-m3 ">

                    <!-- le fil d'actualité sera mis à jour à chq fois q'un user mettra de nouvelles photos-->
                    <?php foreach ($photos as $photo): ?>
                        <h6 class="card-title" id="nickname"><?= $photo['nickname'] ?></h6>
                        <div class="card">
                            <div class="card-image">
                                <!-- mis à jour en même temps que les images -->
                                <img id="postimg" src="./pictures/<?php echo $photo['urlphoto']?>">
                            </div>
                            <div class="card-content ">
                                <div class="fav">
                                    <!--les likes se feront sur cette page   -->
                                    <a href="./photos/add-like.php"><i class="material-icons black-text left">favorite_border</i></a>
                                    <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                                    <i class="material-icons left"><a href="./photos/add-commentary.php" class="material-icons black-text left">insert_comment</a></i><br>
                                    <a href="./photos/add-like.php" class="black-text left"><?= $like['total'] ?> likes</a><br>
                                </div>

                                <div class="caption-content">
                                    <span class="caption card-caption black-text left"><?= $photo['caption'] ?></span><br>
                                </div>
                                <div class="comment">
                                    <?php foreach ($comments as $comment): ?>
                                        <span class="nickname card-caption black-text left"><?= $comment['nickname'] ?>: </span>
                                        <span class="lastcomment card-caption black-text left"><?= $comment['comment'] ?></span><br>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>



    <?php
    include './partials/footer.php'
    ?>


    <script src="./js/materialize.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>