<?php
session_start();
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
        <div class="row">
            <div class="col s12 m12">
                <!-- mis à jour avec une req php avec recup des variables -->
                <div class=profile-card>
                <img class="profilephoto circle responsive-img" src="../pictures/divers1.jfif" alt="photo-profile">
                <span class="card-title" id="nicknameprofile"><?=$_SESSION['nickname']?></span>
                </div>
                <!-- insert into table photos et affichage et mis à jour suivant ces requetes -->
                <div class="card">
                    <div id="imgregprofile" class="card-image">
                        <a href="../photos/photo.php"><img   src="../pictures/divers1.jfif"></a>
                    </div>
                   
                </div>
                <a href="../profile/add-photos.php" id="btnaddphoto" ><i class="medium material-icons white-text center-align">add_to_photos</i></a>
            </div>
        <div>    
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