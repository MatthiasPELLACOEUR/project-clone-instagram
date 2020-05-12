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
        <form class="col s12">
            <div class="row">
                <div class="input-field col s4">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" class="validate white-text" placeholder="nickname">
                
            </div>
            
        
            <div class="row col s12">    
                <div class="input-field col white-text s12">
                <textarea id="textarea1" class="materialize-textarea" placeholder="Let a Comment"></textarea>
                </div>
            </div>
    </form>
  </div>
        </form>
        
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