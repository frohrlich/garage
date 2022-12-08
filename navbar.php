<?php

require_once './src/php/include.php';

?>
<div class="custom_nav2">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">Nos services </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Nous contacter</a>
            </li>
            <?php if (getAuthenticatedUserId()) : ?>
              <li class="nav-item">
                <a class="nav-link active" href="moncompte.php">Espace collaborateurs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo TL_BASE; ?>/src/php/forms/deconnexion.php" onclick="return window.confirm('Voulez-vous vous déconnecter ?')">Déconnexion</a>
              </li>
            <?php else : ?>
              <li class="nav-item">
                <a class="nav-link active" href="connexion.php">Espace collaborateurs</a>
              </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>