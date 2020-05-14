<?php
require '../partials/header.php';
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col s12 offset-s1 col m8 offset-m2">
                <!-- recup de la photo cliquée et de ses infos (likes, caption, comm) et possibilité de faire
                    les likes, les comm et mis à jour suivant les req. php-->
                <div class=profile-card>
                    <div class="card">
                        <div id="imgzoomphoto" class="card-image">
                            <a href="../photos/photo.php"><img src="../pictures/divers1.jfif"></a>
                        </div>
                        <div>
                            <a href="../photos/add-like.php"><i class="material-icons black-text left">favorite_border</i></a>

                            <a href="../photos/add-commentary.php"><i class="material-icons black-text left">insert_comment</i></a>
                            </br>
                            <a href="../photos/add-like.php" class="black-text left">Count likes</a>
                            </br>
                            <!-- mis à jour en même temps que les images -->
                            <span id="caption" class="card-caption black-text left">Caption</span>
                        </div>
                        <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                        <div class="card-content">
                            <span id="lastcomment" class="card-caption black-text left">Last Commentary</span>
                        </div>
                    </div>
                </div>
                <div>
                </div>
</section>

<?php
require '../partials/footer.php';
?>

</body>

</html>