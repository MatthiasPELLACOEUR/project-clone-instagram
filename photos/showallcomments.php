<?php
session_start();
// connect bdd
require '../connection.php';
// research all messages
$photoid= $_GET['id'];
$allcommentsshow=$bdd->query('SELECT comments.*,users.nickname, photos.id AS photo_id,photos.caption
                              FROM comments
                              INNER JOIN photos 
                                ON photos.id = comments.photos_id 
                                INNER JOIN users
                                ON users.id = comments.users_id
                              ORDER BY comments.created_at ASC'
                            );
$allcomments=$allcommentsshow->fetchAll(PDO :: FETCH_ASSOC); 
$reqPhotos = $bdd->query('SELECT * FROM photos WHERE id='.$photoid.'');

$photos = $reqPhotos->fetchAll(PDO::FETCH_ASSOC);


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
   
    <?php
    include '../partials/header.php';
    ?>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    
                    <div class="profile-card">
                        <span class="card-title " id="nicknameprofile"><?=$_SESSION['nickname']?></span>
                    </div>
                    <?php foreach($photos as $photo){?>
                        <div class="captioncomments">
                            <p class="textarea1 "><?=$photo['caption']?></p>
                        </div> 
                        <div class="divider grey darken-3"></div> 
                    <?php }; ?> 
                   
                    <?php foreach($allcomments as $comment){
                        if ($comment['photos_id']==$photoid){?>
                           
                            <div class="update_comments">
                                <span class="textarea1  left"><?=$comment['nickname']?></span>
                                <span class="textarea1"> : <?=$comment['comment']?></span>
                                <span class="textarea1 right"> <?=$comment['created_at']?></span>
                            </div>   
                    <?php }}; ?> 
                    
                     
                <div>    
            </div>
        </div>        
    </section>
   
    <?php
    include '../partials/footer.php'
    ?>
   
  
</body>
</html>