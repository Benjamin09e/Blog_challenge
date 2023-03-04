<?php session_start();

if (empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

include "../config/db.php";
$status = '';


$id = $_GET['articleId'];

if (!isset($id)) {
  header('Location: ../profil.php');
  exit();
}

$article = $connexion->query("select * from article where id={$id} and id_user={$_SESSION['id_user']}");
$row = mysqli_fetch_assoc($article);

if (isset($_POST['send'])) {

  $descrip = $_POST['description'];
  if ($descrip === $row['description']) {
    $status = "aucune modification ";
  } else {
    $sql = "update article set description='{$descrip}' where id={$id}";
    $result = mysqli_query($connexion, $sql);
    if ($result) {
      header('Location: ../profil.php');
      exit();
    }
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="article.css">
  <title>Blog Challenge</title>
</head>

<body>

  <header class="head">

    <div class="logo">
      <a href="../blog/blog.php">Blog</a>
    </div>
    <div class="nav">
      <div class="flex-nav">
        <a href="../index.php">Accueil</a>
        <a href="#">A propos</a>
      </div>
    </div>
  </header>

  <section class="connexion">
    <?php foreach ($article as $article) { ?>
      <form class="from" method="POST" action="./edit.php?articleId=<?php echo $article['id'] ?>">
        <h1>Nouvelle article</h1>
        <?php
        if ($status != '') { ?>
          <p><?php echo $status ?></p>
        <?php } ?>

        <div class="group">
          <div class="left-part">
            <label for="">Description</label>
            <textarea name="description" cols="30" rows="10"><?php echo $article['description']; ?></textarea>
          </div>
        </div>

        <div class="btn-center">
          <button class="btn" name="send">Envoyer</button>
        </div>
      </form>

    <?php } ?>
  </section>

  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>