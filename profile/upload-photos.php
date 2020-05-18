<?php
session_start();

require '../connection.php';

$target_dir = "../pictures/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$uploadBdd = basename($_FILES["fileToUpload"]["name"]);
$caption = $_POST['caption'];
$userId = $_POST['user_id'];

// print_r($userId);exit;
// insert into
// $ 

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
    echo "File is not an image.";
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  $uploadOk = 0;
  $erreur = "Sorry, your file is too large.";
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
  $erreur = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $erreur = "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $insertPhoto = $bdd->prepare('INSERT INTO photos(user_id, urlphoto, created_at, caption, ip_address) VALUES(?, ?, ?, ?, ?)');
    $insertPhoto->execute(array($userId, $uploadBdd, $dateTime, $caption, getIp()));
    // $erreur = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    header('Location: ../index.php');
  } else {
    $erreur = "Sorry, there was an error uploading your file.";
  }
}

if(isset($erreur)){
    echo '<font color="red">'.$erreur.'</font>';
}

?>