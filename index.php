<?php
session_start();

// $login = boolval($_SESSION['nickname'])->rowCount();
// var_dump((bool) $_SESSION['nickname']);

if($_SESSION['nickname'] == TRUE) {
    $username = '<li><a href="./profile/profile-user.php" class="linkprofile grey darken-4 ">'.$_SESSION['nickname'].'</a></li>';
}else {
    $username = '<li><a href="/login.php" class="linkprofile grey darken-4 ">Login</a></li>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>clone-instagram</title>
</head>
<body>
    <header>
        <div class="container-fluid">
            <nav class="row">
                <div class="nav-wrapper grey darken-4 col s12 offset-s1 col m7 offset-m2">
                
                    
                    <span class="appname white-text text-darken-2 ">Clone Instagram</span>
                    <ul class="right hide-on-med-and-down ">
                        <?php echo $username ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 offset-s2 m6 offset-m3 ">
                     <!--le nick name sera complétée en remplaçant la variable  -->
                    <h6 class="card-title" id="nickname">Nickname</h6>
                    <div class="card">
                    <!-- le fil d'actualité sera mis à jour à chq fois q'un user mettra de nouvelles photos-->
                        <!--les likes se feront sur cette page   -->
                        <div class="card-image">
                            <img id ="postimg" src="./pictures/divers1.jfif">
                            <a href="./photos/add-like.php" ><i class="material-icons black-text left">favorite_border</i></a>
                            
                            <a href="./photos/add-commentary.php" ><i class="material-icons black-text left">insert_comment</i></a>
                            </br>
                            <a href="./photos/add-like.php" class="black-text left">Count likes</a>
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
        include './partials/footer.php'
        ?>
    </footer>

    <script href="./js/materialize.min.js"></script>
    <script href="./js/main.js"></script>
</body>
</html>