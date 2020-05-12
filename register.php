<?php

require 'connection.php';


if(isset($_POST['action'])) {
    $nickname = htmlspecialchars($_POST['nickname']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    $password = sha1($_POST['password']);
    $password2 = sha1($_POST['password2']);
    $dateTime = date('Y-m-d H:i:s');

    if(!empty($_POST['nickname']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['password']) && !empty($_POST['password2'])){

        $nicknameLen = strlen($nickname);
        if($nicknameLen <= 255) {
            if($mail == $mail2) {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    if($password == $password2) {
                        $insertUser = $bdd->prepare('INSERT INTO users(nickname, password, mail, created_at, ip_address) VALUES (?, ?, ?, ?, ?)');
                        $insertUser->execute(array($nickname, $password, $mail, $dateTime, getIp()));
                        $erreur = "Your account has been successfully created.";
                    }else {
                        $erreur = 'Your passwords do not match.';
                    }
                }
                else {
                    $erreur = 'Your email address is not valid.';
                }
            }else {
                $erreur = 'Your email addresses do not match.';
            }
        }else {
            $erreur = 'Your nickname must not exceed 255 characters.';
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
    <title>Register</title>
</head>

<body>

    <section class="container row register">
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <h1 class="appname white-text">Register</h1>
            <br><br><br>
            <form action="" method="post">
                <label for="nickname">Nickname :</label><input type="text" name="nickname" class="input-yellow" value="<?php if(isset($nickname)) { echo $nickname; }?>"><br>
                <label for="mail">Mail :</label><input type="email" name="mail" class="input-red" value="<?php if(isset($mail)) { echo $mail; }?>"><br>
                <label for="mail2">Mail Confirmation :</label><input type="email" name="mail2" class="input-red" value="<?php if(isset($mail2)) { echo $mail2; }?>"><br>
                <label for="password">Password :</label><input type="password" name="password" class="input-pink"><br>
                <label for="password2">Password confirmation :</label><input type="password" name="password2" class="input-pink"><br><br>
                <button class="btn waves-effect waves-light purple right" type="submit" name="action">Register
                    <i class="material-icons right">save</i>
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