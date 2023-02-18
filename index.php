<?php
session_start();

include "config/db.php";
include "./detail.php";

$articles = $connexion->query(
  'select * from article
INNER JOIN users ON article.id_user = users.id_users'

);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.0/css/all.min.css" integrity="sha512-3PN6gfRNZEX4YFyz+sIyTF6pGlQiryJu9NlGhu9LrLMQ7eDjNgudQoFDK3WSNAayeIKc6B8WXXpo4a7HqxjKwg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
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
        $like = $connexion->query(
          "select * from likes
        where id_article='{$articles['id']}'"
        );
        ?>
        <div class="card-body">
          <img src="./<?php echo $articles['image']; ?>" height="200px" />
          <a href="./post.php?articleId=<?php echo $articles['id'] ?>"><?php echo dimunier($articles['description'], 20); ?>
          </a>
          <p>Par <?php echo $articles['nom']; ?></p>
          <p><?php echo $articles['date']; ?></p>
          <br>
          <p> <?php echo mysqli_num_rows($like); ?> <a href="./like.php?id_article=<?php echo $articles['id'] ?>"><i class="fa fa-heart" aria-hidden="true">like</i></a></p>
          <p>14 <i class="fa fa-comments" aria-hidden="true">Messages</i></p>
        </div>
      <?php } ?>
    </div>

  </section>
  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>