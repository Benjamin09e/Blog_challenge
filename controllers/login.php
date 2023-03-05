<?php

session_start();
include "../config/db.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

  function validate($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $email = validate($_POST['email']);
  $password = validate($_POST['password']);


  if (empty($email)) {
    header('Location: ../connexion/connexion.php');
    exit();
  } else if (empty($password)) {
    header('Location: ../connexion/connexion.php');
    exit();
  } else {
    $sql = "select * from users WHERE email ='{$email}'";

    $result = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($result) === 1) {
      $ligne = mysqli_fetch_assoc($result);
      $verification = password_verify($password, $ligne['password']);

      if ($verification) {
        $_SESSION['nom'] = $ligne['nom'];
        $_SESSION['prenom'] = $ligne['prenom'];
        $_SESSION['email'] = $ligne['email'];
        $_SESSION['id_user'] = $ligne['id_users'];
        $_SESSION['admin'] = $ligne['admin'];
        $_SESSION['images'] = $ligne['images'];

        header('Location: ../index.php');
        exit();
      } else {
        header('Location: ../connexion/connexion.php?error= Password incorrect !');
        exit();
      }
    } else {
      header('Location: ../connexion/connexion.php?error=Email ou Mot de passe incorrect !');
      exit();
    }
  }
} else {
  header('Location: ../connexion/connexion.php');
  exit();
}

?>
