<?php
include "../config/db.php";

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $nom = validate($_POST['nom']);
  $prenom = validate($_POST['prenom']);
  $email = validate($_POST['email']);
  $password = validate($_POST['password']);

  if (empty($nom)) {
    header('Location: ../inscription/inscription.php?error= data recommander !');
    exit();
  } else if (empty($prenom)) {
    header('Location: ../inscription/inscription.php?error= data recommander !');
    exit();
  } else if (empty($email)) {
    header('Location: ../inscription/inscription.php?error= data recommander !');
    exit();
  } else if (empty($password)) {
    header('Location: ../inscription/inscription.php?error= data recommander !');
    exit();
  } else {
    $sql = "select * from users WHERE email ='{$email}'";
    $result = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($result) === 1) {
      header('Location: ../inscription/inscription.php?error=Email ou Mot de passe incorrect !');
      exit();
    } else {
      $admin = false;
      $password_h = password_hash($password, PASSWORD_BCRYPT);
      $sql = "insert into users (nom, prenom, email, password, admin) values('{$nom}','{$prenom}','{$email}','{$password_h}','{$admin}')";
      $result = mysqli_query($connexion, $sql);

      if ($result) {
        header('Location: ../connexion/connexion.php?succes=utilisateur creer !');
        exit();
      } else {
        header('Location: ../inscription/inscription.php?error=Error de creation !');
        exit();
      }
    }
  }
} else {
  header('Location: ../inscription/inscription.php');
  exit();
}
