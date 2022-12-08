<?php

require_once './src/php/include.php';

if (!getAuthenticatedUserId()) {
  Header('Location: ' . TL_BASE . '/connexion.php');
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
  <meta name="keywords" content="client, garage" />
  <meta name="description" content="page à accèes restreint, comprenant un formulaire de gestion des clients " />
  <meta name="author" content="Web Agence" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Clients - Garage Pistons & Boulons</title>

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="./js/clients.js" type="module" defer></script>

</head>

<body class="">
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php'; ?>

    <!-- Navigation bar -->
    <?php include 'navbar_back.php'; ?>

    <section class="crud_section py-3 min-vh-100">
      <div class="heading_container heading_center d-flex m-3">
        <h1 class="text-center">Espace clients</h1>
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
      <!-- Adding section -->
      <div class="container d-flex justify-content-center mb-4">
        <div class="form_container">
          <div class="heading_container heading_center">
            <h2 class="text-center">Ajouter un nouveau client</h2>
            <!-- Collapse button -->
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addForm" aria-expanded="false" aria-controls="collapseExample">
              Afficher/Cacher
            </button>
          </div>
          <form class="collapse show" action="src/php/forms/addclient.php" id="addForm" method="POST">
            <div>
              <label for="add_firstname">Prénom :</label>
              <input type="text" id="add_firstname" name="add_firstname" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_lastname">Nom :</label>
              <input type="text" id="add_lastname" name="add_lastname" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_address">Adresse :</label> <br>
              <textarea name="add_address" id="add_address" rows="3" required></textarea>
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_postalcode">Code postal :</label>
              <input id="add_postalcode" name="add_postalcode" type="text" required>
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_vehicle">Type de véhicule :</label>
              <input type="text" id="add_vehicle" name="add_vehicle" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div class="d-flex justify-content-center">
              <button class="btn-add" type="submit">Ajouter</button>
            </div>
          </form>
        </div>
      </div>

      <!-- List/modify/delete section -->
      <div class="container d-flex justify-content-center">
        <div class="form_container">
          <div class="heading_container heading_center mb-4">
            <h2 class="text-center">Clients enregistrés</h2>
          </div>
          <div class="container list">

          <?php include 'src/php/forms/listclient.php'; ?>

            <form action="src/php/forms/modclient.php" class="d-none mb-5" id="modForm" method="POST">
            <input type="hidden" id="mod_id" name="mod_id" />
              <div>
                <label for="mod_firstname">Prénom :</label>
                <input type="text" id="mod_firstname" name="mod_firstname" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_lastname">Nom :</label>
                <input type="text" id="mod_lastname" name="mod_lastname" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_address">Adresse :</label> <br>
                <textarea name="mod_address" id="mod_address" rows="3" required></textarea>
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_postalcode">Code postal :</label>
                <input id="mod_postalcode" name="mod_postalcode" type="text" required>
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_vehicle">Type de véhicule :</label>
                <input type="text" id="mod_vehicle" name="mod_vehicle" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_createdat">Date de création (non modifiable) :</label>
                <input type="datetime-local" id="mod_createdat" name="mod_createdat" disabled />
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