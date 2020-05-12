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
        <div class="container">
                    
            <nav>
                <div class="nav-wrapper  white">
                
                    <img src="../pictures/instaminiat.png" class="imginsta" alt="logoinsta"> 
                    <span class="appname blue-grey-text text-darken-2">Clone Instagram</span>
                    <ul class="right hide-on-med-and-down ">
                    <li><a href="./profile/profile-user.php" class="linkprofile blue-grey lighten-3">Profile Nickname</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                     <!--le nick name sera complétée en remplaçant la variable  -->
                    <h6 class="card-title" id="nickname">Nickname</h6>
                    <div class="card">
                    <!-- le fil d'actualité sera mis à jour à chq fois q'un user mettra de nouvelles photos-->
                        <!--les likes se feront sur cette page   -->
                        <div class="card-image">
                            <img id ="postimg" src="./pictures/divers1.jfif">
                            <a href="./photos/add-like.php" class="waves-effect waves-light btn"><i class="material-icons left">sentiment_very_satisfied</i>Add Like</a>
                            <a href="./photos/add-like.php" class="waves-effect waves-light btn">Count likes</a>
                            </br>
                            <!-- mis à jour en même temps que les images -->
                            <span id ="caption" class="card-caption">Caption</span>    
                        </div>
                        <!-- ajout de comm de cette page possible, seul le  dernier commentaire apparait suite à mis à jour-->
                        <div class="card-content">
                            <a href="./photos/add-commentary.php" class="waves-effect waves-light btn"><i class="material-icons left">insert_comment</i>Let a Comment</a>
                            </br>
                            <span id ="lastcomment" class="card-caption">last Commentary</span>  
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