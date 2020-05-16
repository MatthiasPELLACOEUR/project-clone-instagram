<?php
$reqPhotos = $bdd->query('SELECT photos.*, users.nickname, users.profile_photo AS photoProf FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id ORDER BY photos.created_at DESC');

$photos = $reqPhotos->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

    <title>Document</title>
</head>

<body>

    <header>
        <div class="container-fluid">
            <nav class="row">
                <div class="nav-wrapper header grey darken-4 col s12 offset-s1 col m7 offset-m2">
                    <!-- <a href="../index.php" class="linkindex grey darken-4"><span class="appname white-text text-darken-2 ">Clone Instagram</span></a> -->
                    <ul>
                        <li>
                            <a href="../index.php" class="linkindex grey darken-4"><i class="material-icons left">home</i></a>
                        </li>
                    </ul>
                    <?php

                    foreach ($photos as $photo) : ?>
                        <ul class="right">
                            <li>
                                <?php if ($photo['photoProf'] == 0) { ?>
                                    <a href="../profile/profile-user.php">
                                        <div class="chip chip-profile">
                                            <img src="../pictures/picture_default.png" alt="Contact Person">
                                            <span class="card-title right" id="nicknameprofile"><?= $photo['nickname'] ?></span>
                                        </div>
                                    </a>
                                <?php $i = 0;
                                    if (++$i == 1) break;
                                } else { ?>
                                    <a href="../profile/profile-user.php">
                                        <div class="chip chip-profile">
                                            <img src="./pictures/<?php echo $photo['photoProf'] ?>" alt="Contact Person">
                                            <span class="card-title right" id="nicknameprofile"><?= $photo['user_id'] ?></span>
                                        </div>
                                    </a>
                            <?php if (++$i == 1) break;
                                }
                            endforeach; ?>
                            </li>
                        </ul>
                        <ul class="right">
                            <li>
                                <a href="../profile/add-photos.php" id="btnaddphoto"><i class="medium material-icons white-text center-align">add_to_photos</i></a>
                            </li>
                            <li>
                                <a href="../logout.php"><i class="medium material-icons white-text center-align">power_settings_new</i></a>
                            </li>
                        </ul>
                </div>
            </nav>
        </div>
    </header>