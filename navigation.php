<!DOCTYPE html>
<html lang="en">

<body>
  <header class="head">
    <div class="logo">
      <a href="./blog/blog.php">Blog</a>
    </div>

    <div class="nav">
      <div class="flex-nav">
        <a href="#">Accueil</a>
        <a href="#">A propos</a>
        <?php if (!empty($_SESSION['id_user'])) { ?>
          <a href="profil.php"><?php echo $_SESSION['prenom'] ?><?php echo $_SESSION['nom'] ?></a>
          <a href="./controllers/logout.php">Logout</a>
        <?php } else { ?>
          <a href="./connexion/connexion.php">Connexion</a>
          <a href="./inscription/inscription.php">Inscription</a>
        <?php } ?>

      </div>
    </div>

  </header>
</body>

</html>