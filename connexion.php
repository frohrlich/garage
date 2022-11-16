<?php
require_once './src/php/helpers/auth.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Contact - Garage Pistons & Boulons</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="./js/scripts.js" type="module" defer></script>

</head>

<body class="">
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php' ?>

    <!-- Navigation bar -->
    <?php include 'navbar.php' ?>

    <!-- contact section -->
    <section class="login_section py-3 min-vh-100">
      <div class="container d-flex justify-content-center">
        <div class="form_container">
          <div class="heading_container heading_center">
            <h1 class="text-center">Se connecter</h1>
          </div>
          <form action="src/php/forms/loginform.php" id="connectForm" method="post">
            <div>
              <label for="Email">Email :</label>
              <input type="email" id="Email" name="email" required />
              <p class="error">Adresse e-mail invalide</p>
            </div>
            <div>
              <label for="Mot de passe" class="label">Mot de passe :</label>
              <input type="password" id="Mot de passe" name="Mot de passe" required />
              <p class="error">Mot de passe invalide</p>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- footer section -->
    <?php include 'footer.php' ?>
  </div>


  <!-- jQery -->
  <script src="node_modules\jquery\dist\jquery.min.js"></script>
  <!-- popper js -->
  <script src="node_modules\popper.js\dist\umd\popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>


</body>

</html>