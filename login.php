<?php 
session_start();

require 'connection.php';

if(isset($_POST['formConnect'])){
    $nicknameConnect = htmlspecialchars($_POST['nicknameConnect']);
    $passwordConnect = sha1($_POST['passwordConnect']);
    if(!empty($nicknameConnect) && !empty($passwordConnect)) {
        $reqUser = $bdd->prepare('SELECT * FROM users WHERE nickname = ? AND password = ?');
        $reqUser->execute(array($nicknameConnect, $passwordConnect));
        $userExist = $reqUser->rowCount();
        if($userExist == 1){
            $userInfo = $reqUser->fetch();
            $_SESSION['id'] = $userInfo['id'];
            $_SESSION['nickname'] = $userInfo['nickname'];
            $_SESSION['mail'] = $userInfo['mail'];
            header('Location: index.php');
        }else{
            $erreur = 'Wrong nickname or password';
        }
    }else {
        $erreur = 'All fields must be completed.';
    }

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>Login</title>
</head>

<body>

    <section class="container row register">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h1 class="appname white-text">Login</h1>
            <br><br><br>
            <form action="" method="post">
                <label for="nickname">Nickname :</label><input type="text" name="nicknameConnect" class="input-yellow" value="<?php if(isset($nickname)) { echo $nickname; }?>"><br>
                <!-- <label for="mail">Mail :</label><input type="email" name="mail" class="input-red" value="<?php if(isset($mail)) { echo $mail; }?>"><br> -->
                <label for="password">Password :</label><input type="password" name="passwordConnect" class="input-pink"><br>
                <button class="btn waves-effect waves-light purple right" type="submit" name="formConnect">Login
                    <i class="material-icons right">chevron_right</i>
                </button>
            </form>
            <?php
                if(isset($erreur)){
                    echo '<font color="red">'.$erreur.'</font>';
                }
            ?>
        </div>
    </section>


</body>

</html>