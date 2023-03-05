<?php
session_start();
if (empty($_SESSION['id_user'])) {
  header("Location: index.php");
  exit();
}

include "config/db.php";
include "./detail.php";

$articles = $connexion->query(
  "select * from article
where id_user ='{$_SESSION['id_user']}'"
);

$status = '';

if (isset($_POST['send'])) {

  $folderImage = "../images_article/{$_SESSION['nom']}_{$_SESSION['id_user']}/profil";
  $folder = "/images_article/{$_SESSION['nom']}_{$_SESSION['id_user']}/profil";
  $fileName = basename($_FILES['image']['name']);
  $link = $folderImage . $fileName;
  $linkData = $folder . $fileName;
  $type = pathinfo($link, PATHINFO_EXTENSION);
  $descrip = $_POST['description'];
  $typeExtension = array('jpg', 'png', 'jpeg', 'gif', 'PNG');

  if (!file_exists($folderImage)) {
    mkdir($folderImage, 0777, true);
  }

  if (in_array($type, $typeExtension)) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $link)) {
      $sqlOne = "update users set images ={$linkData} where id_users = {$_SESSION['id_user']}";

      $result = mysqli_query($connexion, $sqlOne);
      if ($result) {
        $sql = "insert into profil (id_user, link, date) values('{$_SESSION['id_user']}', NOW(),'{$linkData}')";
        $result = mysqli_query($connexion, $sql);
        if ($result) {
          $status = 'Le type du fichier est correct';
        } else {
          $status = 'il y\'à une erreur à verifier';
        }
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profil.css">
  <title>Blog Challenge</title>
</head>

<body>
  <?php
  require('./navigation.php');
  ?>

  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      z-index: 1;
      /* Sit on top */
      padding-top: 100px;
      /* Location of the box */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
    }

    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
  </style>

  <section class="welcome">
    <div class="profil">
      <div class="welcome-head">
        <div class="fa-useur">
          <i class="fa fa-user-circle" aria-hidden="true"></i>

          <!-- Trigger/Open The Modal -->
          <button class="btn-link" id="myBtn"> Profil</button>
          <!-- The Modal -->
          <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
              <span class="close">&times;</span>

              <form action="" method="post">
                <input type="file">
                <button class="btn-link">Changer son Profil</button>
              </form>
            </div>

          </div>
        </div>


      </div>
      <div>
        <h3>Nom: <?php echo $_SESSION['nom'] ?></h3>
        <h3>Prenom: <?php echo $_SESSION['prenom'] ?></h3>
        <h3>Email: <?php echo $_SESSION['email'] ?></h3>
        <button class="btn-link"><a href="./pageFrom/article.php" class="link">New article</a></button>
      </div>
    </div>


    <div class="cards">
      <?php foreach ($articles as $articles) { ?>
        <?php
        $like = $connexion->query(
          "select * from likes
        where id_article='{$articles['id']}'"
        );

        $message = $connexion->query(
          "select * from 
          commentaire where id_article = '{$articles['id']}'"
        );
        ?>
        <div class="card-body">
          <img src="./<?php echo $articles['image']; ?>" height="200px" />
          <a href="./post.php?articleId=<?php echo $articles['id'] ?>"><?php echo dimunier($articles['description'], 20); ?>
          </a>
          <p> </p>
          <p><?php echo $articles['date']; ?></p>
          <br>

          <a href="./PageFrom/edit.php?articleId=<?php echo $articles['id'] ?>"><i class="fa fa-pen" aria-hidden="true"></i></a>
          <a href="./delete.php?articleId=<?php echo $articles['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i> </a>


        </div>
      <?php } ?>
    </div>




  </section>

  <footer>
    <p>Footer</p>
  </footer>

  <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>
</body>

</html>