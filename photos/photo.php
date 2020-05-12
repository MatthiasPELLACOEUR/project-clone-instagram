<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>clone-instagram</title>
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
                <div class="col s12 offset-s1 col m8 offset-m2">
                    <!-- recup de la photo cliquée et de ses infos (likes, caption, comm) et possibilité de faire
                    les likes, les comm et mis à jour suivant les req. php-->
                    <div class=profile-card>
                        <div class="card">
                            <div id="imgzoomphoto" class="card-image">
                                <a href="../photos/photo.php"><img  src="../pictures/divers1.jfif"></a>
                            </div>
                            <div>
                            <a href="../photos/add-like.php" ><i class="material-icons black-text left">favorite_border</i></a>
                            
                            <a href="../photos/add-commentary.php" ><i class="material-icons black-text left">insert_comment</i></a>
                            </br>
                            <a href="../photos/add-like.php" class="black-text left">Count likes</a>
                            </br>
                            <!-- mis à jour en même temps que les images -->
                            <span id ="caption" class="card-caption black-text left">Caption</span>    
                        </div>
                        <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                        <div class="card-content">
                            <span id ="lastcomment" class="card-caption black-text left">Last Commentary</span>  
                        </div>
                    </div>
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