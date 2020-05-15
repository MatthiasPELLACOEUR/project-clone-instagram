<?php
session_start();
// connect bdd
require '../connection.php';
// names of variables


if (isset($_POST['nickname']) and isset($_POST['photosid']) and isset($_POST['comment'])) {
    $nickname = htmlspecialchars($_POST['nickname']);
    // var_dump($nickname); 
    // var_dump($photosid);
    $comment  =  $_POST['comment'];
    $dateTime = date('Y-m-d H:i:s');
    $ipadress = getIp();
    // association  users_id et nickname
    $userstatement = $bdd->prepare('SELECT * FROM users WHERE nickname=?');
    $userstatement->execute([$_POST['nickname']]);
    $user = $userstatement->fetch(PDO::FETCH_ASSOC);
    $usersid = intval($user['id']);
    // var_dump($usersid);
    // association id photos  et "input type hidden=photos id
    $photosstatement = $bdd->prepare('SELECT * FROM photos WHERE id=?');
    $photosstatement->execute([$_POST['photosid']]);
    $photo = $photosstatement->fetch(PDO::FETCH_ASSOC);
    $photosid = intval($_POST['photosid']);
    // var_dump($photosid);
    // insert comment into table 'comments'
    $requestinsertcomment = $bdd->PREPARE('INSERT INTO comments (photos_id,users_id,comment,created_at,ip_address) 
                                         VALUES(?,?,?,?,?)');
    $requestinsertcomment->EXECUTE([
        $photosid,
        $usersid,
        $comment,
        $dateTime,
        $ipadress
    ]);
        header('Location: index.php');
}

require '../partials/header.php';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col s12 offset-s6 m6 offset-m3 l6 offset-l3 center">
                <form action="" method="POST">
                    <input type="hidden" name="photosid" id="photosid" value="<?= $_GET['id'] ?>">
                    <div class="nickname">
                        <!--  recup the $photoid to send into comments -->
                        <i class="material-icons prefix">account_circle</i>
                        <input id="icon_prefix" type="text" name="nickname" class="validate white-text" placeholder="nickname" value="<?= $_SESSION['nickname'] ?>">
                    </div>
                    <!-- to send comment into comments-->
                    <div class="input-field white-text">
                        <textarea id="textarea1" name="comment" class="materialize-textarea white-text" placeholder="Let a Comment"></textarea>
                    </div>
                    <button class="btn waves-effect waves-light purple right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</section>
<footer>
    <?php
    include '../partials/footer.php'
    ?>
</footer>

</body>

</html>