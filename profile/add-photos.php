<?php
require '../partials/header.php'
?>
<section class="container">
    <form action="upload-photos.php" method="post" enctype="multipart/form-data">
        <label for="photo">Select image to upload:</label>
        <input type="file" name="fileToUpload" class="input-yellow" id="fileToUpload"><br>
        <label for="caption">Caption :</label>
        <input type="text" name="caption" class="input-pink">
        <button class="btn waves-effect waves-light purple right" type="submit" name="submit">Upload Image
            <i class="material-icons right">chevron_right</i>
        </button>
        <form action="#">
            <div class="file-field input-field">
                <div class="btn">
                    <span>File</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
        </form>
    </form>
</section>

<footer>
    <?php
    include '../partials/footer.php'
    ?>
</footer>
</body>

</html>