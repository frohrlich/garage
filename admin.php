<?php

require_once './src/php/include.php';

if (!isAdmin()) {
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
  <meta name="keywords" content="administrateur, collaborateur, garage, pistons&boulons" />
  <meta name="description"
    content="Page à accès restreint pour l'administrateur du site, comprenant un formulaire de gestion de collaborateurs " />
  <meta name="author" content="Web Agence" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Espace administrateur - Garage Pistons & Boulons</title>

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
  <script src="./js/admin.js" type="module" defer></script>

</head>

<body class="">
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php'; ?>

    <!-- Navigation bar -->
    <?php include 'navbar_back.php'; ?>

    <section class="crud_section py-3 min-vh-100">
      <div class="heading_container heading_center d-flex m-3">
        <h1 class="text-center">Espace administrateur</h1>
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
            <h2 class="text-center">Ajouter un collaborateur</h2>
            <!-- Collapse button -->
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addForm"
              aria-expanded="false" aria-controls="collapseExample">
              Afficher/Cacher
            </button>
          </div>
          <form class="collapse show" action="src/php/forms/adduser.php" id="addForm" method="POST">
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
              <label for="add_email">Adresse email :</label>
              <input type="email" id="add_email" name="add_email" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_password" class="label">Mot de passe :</label>
              <input type="password" id="add_password" name="add_password" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_password_verif" class="label">Vérifiez le mot de passe :</label>
              <input type="password" id="add_password_verif" name="add_password_verif" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_birthdate">Date de naissance :</label>
              <input type="date" id="add_birthdate" name="add_birthdate" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_entry_date">Date d'entrée dans l'entreprise :</label>
              <input type="date" id="add_entry_date" name="add_entry_date" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_secu">Numéro de sécurité sociale :</label>
              <input type="text" id="add_secu" name="add_secu" required />
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_contract_type">Type de contrat :</label>
              <br>
              <select name="add_contract_type" id="add_contract_type" class="mb-4">
                <option value="">--Choisissez une option--</option>
                <option value="CDI">CDI</option>
                <option value="CDD">CDD</option>
                <option value="Alternance">Alternance</option>
                <option value="Autre">Autre</option>
              </select>
              <span class="text-danger err-msg"></span><br>
            </div>
            <div>
              <label for="add_work_time">Durée de travail hebdomadaire (en heures) :</label>
              <input type="number" id="add_work_time" name="add_work_time" required />
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
            <h2 class="text-center">Collaborateurs enregistrés</h2>
          </div>
          <div class="container list">

            <?php include 'src/php/forms/listuser.php'; ?>

            <form class="d-none mb-5" action="src/php/forms/moduser.php" id="modForm" method="POST">
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
                <label for="mod_email">Adresse email :</label>
                <input type="email" id="mod_email" name="mod_email" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_password" class="label">Mot de passe (facultatif) :</label>
                <input type="password" id="mod_password" name="mod_password" />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_password_verif" class="label">Vérifiez le mot de passe :</label>
                <input type="password" id="mod_password_verif" name="mod_password_verif" />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_birthdate">Date de naissance :</label>
                <input type="date" id="mod_birthdate" name="mod_birthdate" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_entry_date">Date d'entrée dans l'entreprise :</label>
                <input type="date" id="mod_entry_date" name="mod_entry_date" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_secu">Numéro de sécurité sociale :</label>
                <input type="text" id="mod_secu" name="mod_secu" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_contract_type">Type de contrat :</label>
                <br>
                <select name="mod_contract_type" id="mod_contract_type" class="mb-4">
                  <option value="">--Choisissez une option--</option>
                  <option value="CDI">CDI</option>
                  <option value="CDD">CDD</option>
                  <option value="Alternance">Alternance</option>
                  <option value="Autre">Autre</option>
                </select>
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_work_time">Durée de travail hebdomadaire (en heures) :</label>
                <input type="number" id="mod_work_time" name="mod_work_time" required />
                <span class="text-danger err-msg"></span><br>
              </div>
              <div>
                <label for="mod_lastco">Date de dernière connexion (non modifiable) :</label>
                <input type="datetime-local" id="mod_lastco" name="mod_lastco" disabled />
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