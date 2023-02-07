<?php session_start();

if (empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

include "../config/db.php";
$status = '';

if (isset($_POST['send'])) {

  $folderImage = '../images_article/';
  $folder = 'images_article/';
  $fileName = basename($_FILES['image']['name']);
  $link = $folderImage . $fileName;
  $linkData = $folder . $fileName;
  $type = pathinfo($link, PATHINFO_EXTENSION);
  $descrip = $_POST['description'];
  $typeExtension = array('jpg', 'png', 'jpeg', 'gif', 'PNG');

  if (in_array($type, $typeExtension)) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $link)) {
      $sql = "insert into article (id_user, date, image, description) values('{$_SESSION['id_user']}', NOW(),'{$linkData}','{$descrip}')";
      $result = mysqli_query($connexion, $sql);
      if ($result) {
        $status = 'Le type du fichier est correct';
      } else {
        $status = 'il y\'à une erreur à verifier';
      }
    }
  } else {
    $status = 'Le type du fichier est incorrect';
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


    <form class="from" method="POST" enctype="multipart/form-data">
      <h1>Nouvelle article</h1>
      <hr>
      <?php
      if ($status != '') { ?>
        <p><?php echo $status ?></p>
      <?php } ?>

      <div class="group">
        <div class="left-part">
          <label for="">Description</label>
          <textarea name="description" cols="30" rows="10"></textarea>
        </div>
      </div>

      <div class="group">
        <div class="left-part">
          <label for="">Image</label>
          <input type="file" name="image">
        </div>
      </div>
      <div class="btn-center">
        <button class="btn" name="send">Envoyer</button>
      </div>
    </form>
  </section>

  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>