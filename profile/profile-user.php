<?php
session_start();

require '../connection.php';

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile">' . $_SESSION['nickname'] . '</a></li>';
} else {
    header('Location: ./login.php');
}

$reqPhotos = $bdd->query('SELECT photos.*, users.* FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id ='.$_SESSION['id'].' ORDER BY photos.created_at DESC');

$photos = $reqPhotos->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Profile</title>
</head>

<body>
    <header>
        <?php
        include '../partials/header.php';
        ?>
    </header>
    <section>
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col s12 m4">
                        <div class="chip chip-profile">                    
                            <!-- chip here -->
                            <span class="card-title" id="nicknameprofile"><?= $_SESSION['nickname'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($photos as $photo) : ?>
                    <div class="col s4 m4 l4">
                        <div class="card photos-profile">
                            <a href="../photos/photo.php">
                                <img class="max-width" src="../pictures/<?php echo $photo['urlphoto'] ?>">
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <?php
        include '../partials/footer.php'
        ?>
    </footer>
    <script href="./js/materialize.min.js"></script>
    <script href="./js/main.js"></script>
</body>

</html>