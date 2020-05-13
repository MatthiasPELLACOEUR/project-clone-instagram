<?php
session_start();
// connect bdd
require '../connection.php';
// research all messages
$allcommentsshow=$bdd->query('SELECT comments.*,users.*
                              FROM comments
                              INNER JOIN photos 
                                ON photos.id = comments.photos_id 
                                INNER JOIN users
                                ON users.id = comments.users_id'
                            );
$allcomments=$allcommentsshow->fetchAll(PDO :: FETCH_ASSOC); 

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
    <title>showallcomments</title>
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
                <div class="col s12 offset -s6 m10 offset -m4 l8 offset -l2">
                    
                    <div class=profile-card>
                        <img class="profilephoto circle responsive-img" src="../pictures/divers1.jfif" alt="photo-profile">
                        <span class="card-title " id="nicknameprofile"><?=$_SESSION['nickname']?></span>
                    </div>
                    
                    
                    <?php foreach($allcomments as $comment): ?>
                       <?php if ($comment['photos_id']==$photos['id']) { ?>
                        <div class="captioncomments">
                            <p class="textarea1 "><?=$comment['caption']?></p>
                            
                        </div> 
                        <div class="divider black"></div>    
                        <div>
                            <span class="textarea1  left strong"><?=$comment['nickname']?></span></br>
                            <span class="textarea1"><?=$comment['comment']?></span>
                        </div>   
                    <?php } 
                    endforeach;?>
                     
                <div>    
            </div>
        </div>        
    </section>
    <footer>
        <?php
        include '../partials/footer.php'
        ?>
    </footer>
  
</body>
</html>