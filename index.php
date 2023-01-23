
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
    <div class="welcome-head">
      <div class="fa-useur">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
      </div>
      <div class="part-middle">
        <p>Username: Benj</p>
        <p>Email: Benj@gmail.com</p>
        <button>S'abonné</button>
      </div>
      <div class="part-btn">
        <button>New post</button>
      </div>
    </div>
    <div class="welcome-p">
      <p>Mes posts</p>
    </div>
    <div class="cards">
      <div class="card-body">
        <a href="#">
          <img src="images/5.jpg " width="100%">
          <div class="content-card">
            <div>
              <p>Par Benjamin</p>
            </div>
            <div>
              <p>17/12/2022</p>
            </div>
          </div>
          <div class="content-card">
            <div class="card-col">
              <p>10</p><i class="fa fa-heart" aria-hidden="true"></i>
            </div>
            <div class="card-col">
              <p>10</p> <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
          </div>
        </a>
      </div>
      <div class="card-body">
        <a href="#">
          <img src="images/6.jpg " width="100%">
          <div class="content-card">
            <div>
              <p>Par Benjamin</p>
            </div>
            <div>
              <p>17/12/2022</p>
            </div>
          </div>
          <div class="content-card">
            <div class="card-col">
              <p>10</p><i class="fa fa-heart" aria-hidden="true"></i>
            </div>
            <div class="card-col">
              <p>10</p> <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
          </div>
        </a>
      </div>
      <div class="card-body">
        <a href="#">
          <img src="images/7.jpg " width="100%">
          <div class="content-card">
            <div>
              <p>Par Benjamin</p>
            </div>
            <div>
              <p>17/12/2022</p>
            </div>
          </div>
          <div class="content-card">
            <div class="card-col">
              <p>10</p><i class="fa fa-heart" aria-hidden="true"></i>
            </div>
            <div class="card-col">
              <p>10</p> <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <section class="pass">

  </section>
  <footer>
    <p>Footer</p>
  </footer>

</body>

</html>