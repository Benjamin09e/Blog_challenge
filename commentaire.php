<?php
session_start();

include "./config/db.php";

//$id_user = $_GET[$_SESSION['id_user']];
$id_article = $_GET['id_article'];
$message = $_POST['description'];

if (isset($message)) {
  $sql = "Insert into commentaire (id_article, id_user, description ) values('{$id_article}', '{$_SESSION['id_user']}', '{$message}')";
  $result = mysqli_query($connexion, $sql);
  if ($result) {
    header("Location: ./post.php?articleId={$id_article}");
    exit();
  } else {
    echo $result;
    $status = "erreur produit!";
  }
} else {
  $status = "erreur produit!";
}
