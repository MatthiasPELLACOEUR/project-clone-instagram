<?php
session_start();
// connect bdd
require '../connection.php';
// names of variables

if (isset($_POST['nickname']) and isset($_POST['photosid']) and isset($_POST['comment']))
{
    $nickname = htmlspecialchars($_POST['nickname']);
    var_dump($nickname); 
    $photosid =3;
    var_dump($photosid);
    $comment  =  $_POST['comment'];
    $dateTime = date('Y-m-d H:i:s');
    $ipadress = getIp();
    // association  users_id et nickname
    $userstatement=$bdd->prepare('SELECT * FROM users WHERE nickname=?');
    $userstatement->execute([$_POST['nickname']]);
    $user=$userstatement->fetch(PDO :: FETCH_ASSOC);
    $usersid=$user['id'];
    var_dump($usersid);
    // association id photos  et "input type hidden=photos id
    $photosstatement=$bdd->prepare('SELECT * FROM photos WHERE id=?');
    $photosstatement->execute([$_POST['photosid']]);
    $photo=$photosstatement->fetch(PDO :: FETCH_ASSOC);
    $photosid=$photo['id'];
    var_dump($photosid);
    // insert comment into table 'comments'
    $requestinsertcomment=$bdd->PREPARE('INSERT INTO comments (photos_id,users_id,comment,created_at,ip_address) 
                                         VALUES(?,?,?,?,?)');
    $requestinsertcomment->EXECUTE([
                    $photosid,
                    $usersid,
                    $comment,
                    $dateTime,
                    $ipadress
                    ]);
}
  
?>
<!DOCTYPE html>$
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>addcomments</title>
</head>
<body>
    <header>
    <?php
    include '../partials/header.php';
    ?>
    </header>
    <section>
    <div class="container">
        
        
        <form action="../photos/add-commentary.php" method="POST" class="formaddcomm col s12 m8 offset -m2">
            <div class="row">
                <!--  recup the $photoid to send into comments -->
                <div>
                <input type="hidden" name="photosid" id="photosid" value="<?php $photosid?>">
                </div>

                <div class="input-field col s4 offset -s4">
                <i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nickname" class="validate white-text" placeholder="nickname" value="<?= $_SESSION['nickname'] ?>">
                </div>
            </div>    
            <!-- to send comment into comments-->
        
            <div class="row col s12 m10">    
                <div class="input-field col white-text s8">
                    <textarea id="textarea1" name ="comment" class="materialize-textarea white-text" placeholder="Let a Comment"></textarea>
                </div>
                
            </div>
            <button class="btn waves-effect waves-light blue-grey lighten-3 col s1 m2" type="submit" name="action">Submit
                <i class="material-icons right">send</i>
            </button>
                
        </form>
    
    </div>    
        
    </section>
    <footer>
        <?php
        include '../partials/footer.php'
        ?>
    </footer>
  
</body>
</html>