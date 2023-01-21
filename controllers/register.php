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
    $result = mysqli_query($connexion, $sql);

    if(mysqli_num_rows($result)){
      header('Location: ../inscription/inscription.php?error=Email ou Mot de passe incorrect !');
      exit();
    }
    else{
      $admin = false;
      $password = password_hash($password, PASSWORD_BCRYPT);
      $sql = "insert into users (nom, prenom, email, password, admin) value('{$nom}','{$prenom}','{$email}','{$password}','{$admin}')";
      $result = mysqli_query($connexion, $sql);

      if($result){
        header('Location: ../inscription/inscription.php?succes=utilisateur creer !');
        exit();
      }
      else{
        header('Location: ../connexion/connexion.php?error=Error de creation !');
        exit();
      }
    }
  }

}
else{
  header('../inscription/inscription.php');
    exit();
}