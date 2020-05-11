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
    <div class="container">
           
        <nav>
            <div class="nav-wrapper  white">
            
                <img src="../pictures/instaminiat.png" class="imginsta" alt="logoinsta"> 
                <span class="appname blue-grey-text text-darken-2">Clone Instagram</span>
                <ul class="right hide-on-med-and-down ">
                <li><a href="../index.php" class="linkindex blue-grey lighten-3"><i class="material-icons left">home</i>Home</a></li>
              </ul>
            </div>
        </nav>
    </div>
    </header>
    <section>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class=profile-card>
                <div class="card">
                    <div id="imgzoomphoto" class="card-image">
                        <a href="../photos/photo.php"><img  src="../pictures/divers1.jfif"></a>
                    </div>
                    <div>
                        <a href="./photos/add-like.php" class="waves-effect waves-light btn"><i class="material-icons left">sentiment_very_satisfied</i>Add Like</a>
                            <a href="./photos/add-like.php" class="waves-effect waves-light btn">Count likes</a>
                            </br>
                            <span id ="caption" class="card-caption">Caption</span>    
                        </div>
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
        <div class="container">
            <div class="nav-wrapper  white">    
                <div class="footer-copyright">
                © 2020 Copyright Matthias Vero clone Instagram
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
                
            </div>
        </div>
    </footer>
   <script href="./js/materialize.min.js"></script>
    <script href="./js/main.js"></script>
</body>
</html>