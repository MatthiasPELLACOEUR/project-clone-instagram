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

include '../partials/header.php';
?>
    <section>
        <div class="container">
            <div class="main">
                <div class="row">
                    <?php foreach ($photos as $photo) : //isset + else avec valeur de notre compte
                        if($photo['user_id'] == $_GET['userid']) { ?>
                            <div class="chip chip-profile">
                                <img src="../pictures/picture_default.png" alt="Contact Person">
                                <span class="card-title right" id="nicknameprofile"><?= $_GET['nickname'] ?></span>
                            </div>
                            <div class="col s12 m6 l3 offset-l1">
                                <div class="nickname-profile">
                                </div>
                                <div class="card photos-profile">
                                    <a href="../photos/photo.php?id=<?= $photo['id']?>">
                                        <img class="max-width" src="../pictures/<?php echo $photo['urlphoto'] ?>">
                                    </a>
                                </div>
                            </div>
                        <?php }
                    endforeach; ?>
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