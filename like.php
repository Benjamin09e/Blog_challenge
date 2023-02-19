<?php
session_start();

include "./config/db.php";

$id = $_GET['id_article'];


if (isset($id)) {
  $sql = "select * from likes where id_article={$id} and id_user={$_SESSION['id_user']}";
  $result = mysqli_query($connexion, $sql);

  if (mysqli_num_rows($result) === 1) {
    $sql = "delete from likes where id_article={$id} and id_user={$_SESSION['id_user']}";

    $result = mysqli_query($connexion, $sql);
    if ($result) {
      header('Location: ./index.php');
      exit();
    } else {
      $status = "erreur produit a nouveau !";
    }
  } else {
    $sql = "Insert into likes (id_article, id_user) values('{$id}', '{$_SESSION['id_user']}')";

    $result = mysqli_query($connexion, $sql);
    if ($result) {
      header('Location: ./index.php');
      exit();
    } else {
      echo $result;
      $status = "erreur produit!";
    }
  }
} else {
  $status = "erreur produit!";
}
