<?php
session_start();

require '../connection.php';

if ($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile">' . $_SESSION['nickname'] . '</a></li>';
} else {
    header('Location: ./login.php');
}

$reqPhotos = $bdd->query('SELECT photos.*, users.nickname, users.profile_photo AS photoProf FROM photos INNER JOIN users ON photos.user_id = users.id WHERE photos.user_id = users.id ORDER BY photos.created_at DESC');

$photos = $reqPhotos->fetchAll();

include '../partials/header.php';
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col s12 offset-s1 m7 offset-m2 l6 offset-l2">
                <div class="chip chip-profile">
                    <?php foreach ($photos as $photo) : //isset + else avec valeur de notre compte
                        if ($photo['photoProf'] == 0) {
                            if($_GET['userid'] == $_SESSION['id']) {?>
                            <a href="../profile/edit-profile.php?edit=<?=$_SESSION['id']?>">
                                <i class="material-icons white-text left">edit</i>
                            </a>
                            <?php } ?>
                            <img src="../pictures/picture_default.png" class="card-title" alt="Contact Person">
                            <span class="card-title right" id="nicknameprofile"><?= $_GET['nickname'] ?></span>
                            <?php $i = 0;
                            if (++$i == 1) break;
                        } elseif ($photo['photoProf'] == 1) { ?>
                        <?php if($_GET['userid'] == $_SESSION['id']) {?>
                            <a href="../profile/edit-profile.php">
                                <i class="material-icons white-text left">edit</i>
                            </a>
                            <?php } ?>
                            <img src="../pictures/<?php echo $photo['photoProf'] ?>" alt="Contact Person">
                            <span class="card-title right" id="nicknameprofile"><?= $_SESSION['nickname'] ?></span>
                            <?php $i = 0;
                            if (++$i == 1) break;
                        }
                    endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row photos-profile">
            <!-- <div class="col s12 offset-s1 m7 offset-m2 l10 offset-l1"> -->
                <?php foreach ($photos as $photo) :
                    if ($photo['user_id'] == $_GET['userid']) { ?>
                        <div class="col s12 m6 l4">
                            <div class="nickname-profile">
                                <div class="card photo-profile">
                                    <a href="../photos/photo.php?id=<?= $photo['id'] ?>">
                                        <img class="max-width" src="../pictures/<?php echo $photo['urlphoto'] ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php }
                endforeach; ?>
            <!-- </div> -->
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