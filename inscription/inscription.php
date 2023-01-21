<?php session_start();
  if(!empty($_SESSION['id_user'])){
    header("Location: ../index.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css"
    integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="inscription.css">
  <title>Blog Challenge</title>
</head>

<body>
  <header class="head">

    <div class="logo">
      <a href="../blog/blog.php">Blog</a>
    </div>
    <div class="nav">
      <div class="flex-nav">
        <a href="../index.php">A propos</a>
        <a href="./connexion/connexion.php">Connexion</a>
        <a href="#">Inscription</a>
        <a href="#">Profil</a>
      </div>
    </div>


  </header>

  <section class="connexion">
    <h1>Modifier mon profil</h1>
    <hr>
    <form class="flex-connexion" action="../controllers/register.php" method="POST">
      <div class="group">
        <div class="left-part">
          <label for=""> nom</label>
          <input type="text"  id="">
        </div>
      </div>

    

      <div class="group">
        <div class="left-part">
          <label for=""> Prenom</label>
          <input type="text"  id="">
        </div>
      </div>

      <div class="group">
        <div class="left-part">
          <label for=""> Email</label>
          <input type="email"  id="">
        </div>
      </div>

    

      <div class="group">
        <div class="left-part">
          <label for=""> mot de passe</label>
          <input type="password"  id="">
        </div>
      </div>

      <div class="group">
        <div class="left-part">
          <label for=""> Admin</label>
          <input type="text"  id="">
        </div>
      </div>
      
      <div class="btn-center">
        <button class="btn">Enregistrer</button>
      </div>
    </form>
  </section>

  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>