<?php
session_start();

require 'connection.php';
// $login = boolval($_SESSION['nickname'])->rowCount();
// var_dump((bool) $_SESSION['nickname']);

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile">' . $_SESSION['nickname'] . '</a></li>';
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
                <div id="navbar" class="nav-wrapper grey darken-4 col s12 col m7 l4">
                    <div class="container">
                        <span class="appname white-text text-darken-2 ">Clone Instagram</span>
                        <ul class="right hide-on-med-and-down">
                            <?php echo $username ?>
                            <li><a href="/logout.php">Disconnect</a></li>
                        </ul>
                        <ul class="right hide-on-large-only" id="test">

                            <!-- Dropdown Trigger -->
                            <li>
                                <button class='btn waves-effect waves-light dropdown-trigger red accent-3' data-target='dropdown-menu' href='#'><?php echo $_SESSION['nickname'] ?>
                                    <i class="dropdown-arrow material-icons right">keyboard_arrow_down</i>
                                </button>
                            </li>

                            <!-- Dropdown Structure -->
                            <ul id='dropdown-menu' class='dropdown-content'>
                                <li><a href="#!">one</a></li>
                                <li><a href="#!">two</a></li>
                                <li class="divider" tabindex="-1"></li>
                                <li><a href="#!">three</a></li>
                                <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
                                <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
                            </ul>
                        </ul>
                    </div>
                </div>
            </nav>  
        </div>
    </header>

    <section>
        <div  class="container-fluid">
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
                                    <i class="material-icons left"><a href="./photos/add-commentary.php" class="material-icons black-text left">insert_comment</a></i><br>
                                    <a href="./photos/add-like.php" class="black-text left"><?= $like['total'] ?> likes</a><br>
                                </div>

                                <div class="caption-content">
                                    <span class="caption card-caption black-text left"><?= $photo['caption'] ?></span><br>
                                </div>
                                <div class="comment">
                                    <?php foreach ($comments as $comment) : ?>
                                        <span class="nickname card-caption black-text left"><?= $comment['nickname'] ?>: </span>
                                        <span class="lastcomment card-caption black-text left"><?= $comment['comment'] ?></span><br>
                                    <?php endforeach; ?>
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