<?php
session_start();

require './connection.php';

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile">' . $_SESSION['nickname'] . '</a></li>';
} else {
    header('Location: ./login.php');
}

require 'partials/bdd-queries.php';

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
    <title>Clone Instagram</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <nav class="row">
                <div id="navbar" class="nav-wrapper grey darken-4 col s12 col m7 l4">
                    <div class="container">
                        <span class="appname white-text text-darken-2 ">Clone Instagram</span>
                        <ul class="right hide-on-med-and-down">
                            <?php echo $username ?>
                            <li><a href="../profile/add-photos.php" id="btnaddphoto"><i class="medium material-icons white-text center-align">add_to_photos</i></a></li>
                            <li><a href="/logout.php">Disconnect</a></li>
                        </ul>
                        <ul class="right hide-on-large-only" id="test">

                            <!-- Dropdown Trigger -->
                            <li>
                                <button class="btn waves-effect waves-light dropdown-trigger red accent-3" data-target='dropdown-menu' href='#'><?php echo $_SESSION['nickname'] ?>
                                    <i class="dropdown-arrow material-icons right">arrow_drop_down</i>
                                </button>
                            </li>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown-menu' class='dropdown-content'>
                                <li class="dropdown-color"><a href="/profile/profile-user.php"><?= $_SESSION['nickname'] ?></a></li>
                                <li class="dropdown-color"><a href="/profile/add-photos.php">Add Photo</a></li>
                                <li class="dropdown-color"><a href="logout.php">Disconnect</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div id="main" class="col s12 offset-s1 m6 l4">
                    <!-- le fil d'actualité sera mis à jour à chq fois q'un user mettra de nouvelles photos-->
                    <?php foreach ($photos as $photo) : ?>
                        <h6 class="card-title" id="nickname"><?= $photo['nickname'] ?></h6>
                        <div class="card">
                            <div class="card-image">
                                <!-- mis à jour en même temps que les images -->
                                <img id="postimg" src="./pictures/<?php echo $photo['urlphoto'] ?>">
                            </div>
                            <div class="card-content ">
                                <div class="fav">
                                    <!--les likes se feront sur cette page   -->
                                    <a href="./photos/add-like.php"><i class="material-icons black-text left">favorite_border</i></a>
                                    <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                                    <i class="material-icons left"><a href="./photos/add-commentary.php?id=<?= $photo['photo_id'] ?>" class="material-icons black-text left">insert_comment</a></i><br>
                                    <a href="./photos/add-like.php" class="black-text left"><?= $like['total'] ?> likes</a><br>
                                </div>

                                <div class="caption-content">
                                    <span class="caption card-caption black-text left"><?= $photo['caption'] ?></span><br>
                                </div>
                                <div class="comment">
                                <?php foreach ($comments as $comment) {
                                     if($photo['photo_id'] == $comment['photos_id']){ ?>
                                        <span class="nickname card-caption black-text left"><?= $comment['nickname'] ?></span>
                                        <span class="lastcomment card-caption black-text left">: <?= $comment['comment'] ?></span><br>
                                    <?php }}; ?>
                                    <!-- rajout vero bton show more -->
                                    <i class="material-icons right"><a href="./photos/showallcomments.php" class="material-icons black-text right">textsms</a></i><br>
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
</body>

</html>