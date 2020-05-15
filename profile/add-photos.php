<?php
session_start();

require '../partials/header.php';
?>
<section class="container">
    <div class="row">
        <div class="col s12 offset-s1 m6 offset-m2 l5 offset-l3">
            <form action="upload-photos.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="user_id" value="<?=$_SESSION['id']?>">
                <label for="photo">Select image to upload:</label>
                <input type="file" name="fileToUpload" class="input-yellow" id="fileToUpload"><br>
                <label for="caption">Caption :</label>
                <input type="text" name="caption" class="input-pink">
                <button class="btn waves-effect waves-light purple right" type="submit" name="submit">Upload Image
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