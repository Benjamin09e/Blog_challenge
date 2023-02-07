<?php
session_start();
if (empty($_SESSION['id_user'])) {
  header("Location: index.php");
  exit();
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

  <section class="welcome">
    <div class="profil">
      <div class="welcome-head">
        <div class="fa-useur">
          <i class="fa fa-user-circle" aria-hidden="true"></i>
        </div>
        <div class="part-middle">
          <button>S'abonné</button>
        </div>
      </div>
      <div>
        <h3>Nom: <?php echo $_SESSION['nom'] ?></h3>
        <h3>Prenom: <?php echo $_SESSION['prenom'] ?></h3>
        <h3>Email: <?php echo $_SESSION['email'] ?></h3>
        <button class="btn-link"><a href="./pageFrom/article.php" class="link">New article</a></button>
      </div>
    </div>
  </section>



  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>