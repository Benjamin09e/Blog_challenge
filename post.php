<?php session_start();

include "config/db.php";

$id = $_GET['articleId'];


$articles = $connexion->query(
  "select * from article
INNER JOIN users ON article.id_user = users.id_users
where id= '{$id}'"

);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <title>Blog Challenge</title>
</head>

<body>
  <?php
  require('./navigation.php');
  ?>

  <section class="welcome">

    <div class="welcome-p">
      <p>Mes posts</p>
    </div>
    <div class="cards">

      <?php foreach ($articles as $articles) { ?>

        <?php
        $like = $connexion->query("Select * from likes where id_article = '{$articles['id']}'");

        $description = $connexion->query("select* from commentaire inner join users on commentaire.id_user= users.id_users
        where id_article ='{$articles['id']}'
        ");

        ?>
        <div class="card-body">
          <img src="./<?php echo $articles['image']; ?>" height="200px" />
          <p>Par <?php echo $articles['nom']; ?></p>
          <p><?php echo $articles['date']; ?></p>
        </div>
        <p>Messages</p>
        <form class="from" method="POST" action="./commentaire.php?id_article=<?php echo $articles['id'] ?>">
          <div class="left-part">
            <textarea name="description" cols="30" rows="10"></textarea>
          </div>
          <div class="btn-center">
            <button class="btn" name="send">Envoyer</button>
          </div>
        </form>

        <div>
          <?php foreach ($description as $send) { ?>
            <div>
              <p><?php echo $send['nom']; ?><?php echo $send['prenom']; ?></p>
              <p><?php echo $send['description'] ?></p>
            </div>

          <?php } ?>
        </div>

      <?php } ?>

    </div>

  </section>
  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>