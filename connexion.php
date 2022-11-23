<?php

require_once './src/php/include.php';

if (getAuthenticatedUserId()) {
  Header('Location: ' . TL_BASE . '/index.php');
}
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
  <title>Espace connexion - Garage Pistons & Boulons</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- font awesome style -->
  <link href="<?php echo TL_BASE; ?>/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="./js/connexion.js" type="module" defer></script>

</head>

<body>
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php'; ?>

    <!-- Navigation bar -->
    <?php include 'navbar.php'; ?>

    <!-- contact section -->
    <section class="login_section py-3 min-vh-100">
      <div class="container d-flex justify-content-center">
        <div class="form_container">
          <div class="heading_container heading_center">
            <h1 class="text-center">Se connecter</h1>
          </div>
          <form action="<?php echo TL_BASE; ?>/src/php/forms/loginform.php" id="connectForm" method="post">
            <div>
              <label for="email">Email :</label>
              <input type="email" id="email" name="email" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="password">Mot de passe :</label>
              <input type="password" id="password" name="password" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <?php if (isset($_GET['error']) && $_GET['error'] == true) : ?>
              <span class='text-danger'>
                Identifiants incorrects
              </span>
            <?php endif ?>
            <div class="d-flex justify-content-center">
              <button type="submit">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- footer section -->
    <?php include 'footer.php'; ?>
  </div>

  <!-- jQery -->
  <script src="node_modules\jquery\dist\jquery.min.js"></script>
  <!-- popper js -->
  <script src="node_modules\popper.js\dist\umd\popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>