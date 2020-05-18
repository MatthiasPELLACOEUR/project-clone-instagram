<?php
session_start();

require './connection.php';

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="/profile/profile-user.php?userid='.$_SESSION['id'].'&nickname='.$_SESSION['nickname'].'" class="linkprofile">' . $_SESSION['nickname'] . '</a></li>';
} else {
    header('Location: ./login.php');
}

// require 'partials/bdd-queries.php';

$reqPhotos = $bdd->query('SELECT photos.*, users.nickname FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id ORDER BY photos.created_at DESC');

$photos = $reqPhotos->fetchAll(PDO::FETCH_ASSOC);


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
                                <li class="dropdown-color"><a href="/profile/profile-user.php?userid=<?= $_SESSION['id'] ?>&nickname=<?= $_SESSION['nickname'] ?>"><?= $_SESSION['nickname'] ?></a></li>
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
                        <a href="./profile/profile-user.php?userid=<?= $photo['user_id'] ?>&nickname=<?=$photo['nickname']?>">
                            <h6 class="card-title white-text" id="nickname"><?= $photo['nickname'] ?></h6>
                        </a>
                        <div class="card">
                            <div class="card-image">
                                <!-- mis à jour en même temps que les images -->
                                <a href="./photos/photo.php?id=<?= $photo['id'] ?>">
                                    <img id="postimg" src="./pictures/<?php echo $photo['urlphoto'] ?>">
                                </a>
                            </div>
                            <div class="card-content black">
                                <div class="fav">
                                    <!--les likes se feront sur cette page   -->
                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $currentUserHasLikedStatement = $bdd->prepare('SELECT id FROM likes WHERE photos_id = ? AND users_id = ?');
                                        $currentUserHasLikedStatement->execute(array($photo['id'], $_SESSION['id']));
                                        $currentUserHasLiked = (bool) $currentUserHasLikedStatement->rowCount();

                                        if ($currentUserHasLiked == TRUE) {
                                            echo '<a href="./photos/add-like.php?t=1&id=' . $photo['id'] . '"><i class="material-icons red-text left">favorite</i></a>';
                                        } else {
                                            $currentUserHasLiked = false;
                                            echo '<a href="./photos/add-like.php?t=1&id=' . $photo['id'] . '"><i class="material-icons white-text left">favorite_border</i></a>';
                                        }
                                    }
                                    ?>
                                    <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                                    <i class="material-icons left"><a href="./photos/add-commentary.php?id=<?= $photo['id'] ?>" class="material-icons white-text left">insert_comment</a></i><br>
                                    <?php $likes = $bdd->prepare('SELECT id FROM likes WHERE photos_id = ?');
                                    $likes->execute(array($photo['id']));
                                    $likes = $likes->rowCount();
                                    ?>
                                    <span class="white-text left"><?= $likes ?> like(s)</span><br>
                                </div>

                                <div class="caption-content">
                                    <span class="caption card-caption white-text left"><?= $photo['caption'] ?></span><br>
                                </div>
                                <div class="comment">
                                    <?php
                                    $reqComments = $bdd->query('SELECT comments.*, users.nickname FROM comments INNER JOIN photos ON photos.id = comments.photos_id INNER JOIN users ON users.id = comments.users_id ORDER BY comments.created_at DESC');

                                    $comments = $reqComments->fetchAll(PDO::FETCH_ASSOC);

                                    $i = 0;

                                    foreach ($comments as $comment) {
                                        if ($photo['id'] == $comment['photos_id']) {
                                            $countComments = $reqComments->rowCount();

                                            $reqCommentsByPhoto = $bdd->query('SELECT * FROM comments WHERE photos_id = ' . $photo['id'] . '') ?>
                                            <span class="nickname card-caption white-text left"><?= $comment['nickname'] ?>: </span>
                                            <span class="lastcomment card-caption white-text left"><?= $comment['comment'] ?></span><br>
                                    <?php if (++$i == 2) break;
                                        }
                                    }; ?>
                                </div>
                                <!-- VF -->
                                <a href="./photos/photo.php?id=<?= $photo['id'] ?>" class="black white-text left show-more">Show more comments</a><br>
                                <div class="row row-comment">
                                    <form action="/photos/add-commentary.php" method="POST">
                                        <div class="nickname">
                                            <input type="hidden" name="photosid" value="<?= $photo['id'] ?>">
                                            <!--  recup the $photoid to send into comments -->
                                            <input type="hidden" name="nickname" class="validate" value="<?= $_SESSION['nickname'] ?>">
                                        </div>
                                        <!-- to send comment into comments-->
                                        <div class="input-field">
                                            <input type="text" name="comment" class="materialize input-red white-text input-comment" placeholder="Let a Comment">
                                            <button class="btn-floating btn-small black waves-light  right btnsubmit" type="submit" name="submit"><i class="material-icons small right">chevron_right</i></button>
                                        </div>
                                    </form>
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