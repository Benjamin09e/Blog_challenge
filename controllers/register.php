<?php
include "../config/db.php";

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])){
  
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nom = validate($_POST['nom']);
  $prenom = validate($_POST['prenom']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if(empty($nom)){
    header('');
    exit();
  }
  else if(empty($prenom)){
    header('');
    exit();
  }
  else if(empty($email)){
    header('');
    exit();
  }
  else if(empty($password)){
    header('');
    exit();
  }
  else{
    $sql = "SELECT * FORM users WHERE email ='$email'";
  }

}
else{
  header('');
    exit();
}