<?php
require './upload-photos.php';
require '../partials/header.php';


// if(isset($_GET['edit'])){
//     $id = $_GET['edit'];
//     $editProfile = $bdd-> ;
// }

?>

<section class="container">
    <div class="row">
        <div class="col s12 offset-s1 m6 offset-m2 l5 offset-l3">
            <form action="upload-photos.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
                <input type="text" name="nickname" value="<?=$_SESSION['nickname']?>">

                <input type="file" name="fileToUpload" class="input-yellow" id="fileToUpload" accept="image/png, image/jpeg, image/jpg, image/gif" capture><br>
                
                <button class="btn waves-effect waves-light purple right" type="submit" name="submit">Edit Profile
                    <i class="material-icons right">chevron_right</i>
                </button>
            </form>
        </div>
    </div>
</section>

<footer>
    <?php
    require '../partials/footer.php';
    ?>
</footer>
</body>

</html>