<?php

require_once './src/php/include.php';

if (!getAuthenticatedUserId()) {
  Header('Location: ' . TL_BASE . '/connexion.php');
}

// Get data to fill the form
require_once './src/php/forms/fillaccount.php';
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
  <meta name="keywords" content="collaborateur, garage, pistons&boulons" />
  <meta name="description" content="Page à accès restreint, comprenant un formulaire de gestion des informations collaborateurs" />
  <meta name="author" content="Web Agence" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Mon compte - Garage Pistons & Boulons</title>

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="./js/moncompte.js" type="module" defer></script>

</head>

<body class="">
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php'; ?>

    <!-- Navigation bar -->
    <?php include 'navbar_back.php'; ?>

    <section class="crud_section py-3 min-vh-100">
      <div class="heading_container heading_center d-flex m-3">
        <h1 class="text-center">Mon compte</h1>
      </div>
      <?php if (isset($_GET['errors'])): ?>
      <p class="text-danger text-center font-weight-bold mb-4"><?php echo htmlspecialchars(
        $_GET['errors']
      ); ?></p>
      <?php elseif (isset($_GET['result'])): ?>
      <p class="text-success text-center font-weight-bold mb-4"><?php echo htmlspecialchars(
        $_GET['result']
      ); ?></p>
      <?php endif; ?>
      <!-- List/modify section -->
      <div class="container d-flex justify-content-center">
        <div class="form_container">
          <div class="heading_container heading_center mb-4">
            <h2 class="text-center">Modifier mes informations</h2>
          </div>
          <div class="container list">
            <form action="src/php/forms/modinfos.php" class="mb-5" id="form" method="POST">
              <div>
                <label for="firstname">Prénom :</label>
                <input type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="lastname">Nom :</label>
                <input type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="email">Adresse email :</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="password" class="label">Mot de passe (facultatif) :</label>
                <input type="password" id="password" name="password" />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="password_verif" class="label">Vérifiez le mot de passe :</label>
                <input type="password" id="password_verif" name="password_verif" />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="birthdate">Date de naissance :</label>
                <input type="date" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="secu">Numéro de sécurité sociale :</label>
                <input type="text" id="secu" name="secu" value="<?php echo $secu; ?>" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div class="d-flex justify-content-center">
                <button class="btn-add" type="submit">Enregistrer</button>
              </div>
            </form>
          </div>
          <div class="text-center w-75 w-md-25 m-auto">
            <a class="btn btn-primary" href="#logo">
              Revenir en haut
            </a>
          </div>
        </div>
    </section>

    <!-- footer section -->
    <?php include 'footer_white.php'; ?>
  </div>


  <!-- jQery -->
  <script src="node_modules\jquery\dist\jquery.min.js"></script>
  <!-- popper js -->
  <script src="node_modules\popper.js\dist\umd\popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>


</body>

</html>