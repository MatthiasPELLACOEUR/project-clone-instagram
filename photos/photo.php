<?php
session_start();
// connect bdd
require '../connection.php';
// research all messages
$photoid = $_GET['id'];
$allcommentsshow = $bdd->query(
    'SELECT comments.*,users.nickname, photos.id AS photo_id,photos.caption
                              FROM comments
                              INNER JOIN photos 
                                ON photos.id = comments.photos_id 
                                INNER JOIN users
                                ON users.id = comments.users_id
                              ORDER BY comments.created_at ASC'
);
$allcomments = $allcommentsshow->fetchAll(PDO::FETCH_ASSOC);
$reqPhotos = $bdd->query('SELECT photos.*, users.nickname FROM photos INNER JOIN users WHERE photos.id=' . $photoid . '');

$photo = $reqPhotos->fetch(PDO::FETCH_ASSOC);
// var_dump($photo)


include '../partials/header.php';

?>

<section>
    <div class="container">
        <div class="row zoomall">
            <div class="col s12 offset s4">
                <div class="card-image">
                    <!-- mis à jour en même temps que les images -->
                    <img class="zoomimg" src="../pictures/<?php echo $photo['urlphoto'] ?>">
                </div>
                <div class="section caption-zoom">
                    <h5><?= $photo['nickname'] ?></h5>
                    <p><?= $photo['caption'] ?></p>
                </div>
            </div>
        </div>

        <div class="divider grey darken-3"></div>

        <div class="row" id="allcomments">
            <?php foreach ($allcomments as $comment) {
                if ($comment['photos_id'] == $photoid) { ?>
                    <div class="update_comments">
                        <span class="textarea1  left"><?= $comment['nickname'] ?></span>
                        <span class="textarea1"> : <?= $comment['comment'] ?></span>
                        <span class="textarea1 right"> <?= $comment['created_at'] ?></span>
                    </div><br>
            <?php }
            }; ?>
        </div>
    </div>

    <div class="container">
        <div class="row fixed-bottom" id="add-comment">
            <form action="add-commentary.php" method="POST">
                <div class="input-message">
                    <input type="hidden" name="photosid" value="<?= $photo['id'] ?>">
                    <!--  recup the $photoid to send into comments -->
                    <input type="hidden" name="nickname" class="validate" value="<?= $_SESSION['nickname'] ?>">
                    <input name="comment" class="materialize add-comment input-pink col l11 white-text" placeholder="Let a Comment">
                    <button class="btn-floating btn-small black waves-light  right btnsubmit" type="submit" name="submit"><i class="material-icons small right">chevron_right</i></button>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include '../partials/footer.php'
?>

</body>

</html>