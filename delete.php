<?php
session_start();

include "./config/db.php";

$id = $_GET['articleId'];

if (isset($id)) {
  $sql = "select * from article where id={$id} and id_user={$_SESSION['id_user']}";

  $result = mysqli_query($connexion, $sql);
  if (mysqli_num_rows($result) === 1) {
    $sql = "delete from article where id={$id}";

    $result = mysqli_query($connexion, $sql);
    if ($result) {
      header('Location: ./profil.php');
      exit();
    } else {
      $status = "erreur produit a nouveau !";
    }
  } else {
    $status = "erreur produit a nouveau !";
  }
} else {
  $status = "erreur produit!";
}
