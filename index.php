<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="garage, pistons&boulons, accueil, prestations" />
  <meta name="description" content="Page d'accueil du site du garage Pistons & Boulons" />
  <meta name="author" content="Web Agence" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Garage Pistons & Boulons</title>

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>
  <!-- header section -->
  <?php include 'header.php'; ?>

  <!-- Navigation bar -->
  <?php include 'navbar.php'; ?>

  <!-- Banner section -->
  <section class="banner_section ">

    <div class="banner_container">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <h1>
                Bienvenue au garage <br />
                Pistons & Boulons !
              </h1>
              <p>
                Spécialisé en véhicules Dacia depuis 2011
              </p>
              <p>
                Venez nous rencontrer au : <br>
                <span>
                  1 Quai des Mégisseries, <br>
                  87200 Saint-Junien
                </span>
              </p>
              <p>
                Téléphone : <br>
                <span> 05 55 02 10 23 </span>
              </p>
              <p>
                Horaires : <br>
                Lundi au vendredi de <span> 8h30 à 19h </span> <br>
                Le samedi de <span> 8h30 à 12h30 </span> <br>
                Fermé le dimanche et les jours fériés
              </p>
              <div class="btn-box">
                <a href="contact.php" class="btn-1"> Nous contacter </a>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-none d-md-block">
            <div class="img-box">
              <img src="images/accueil-kat-sazonova-i8DMKtMyfWM-unsplash.jpg" alt="Photo de mécanique" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2> Découvrir nos prestations </h2>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/s1.jpg" alt="" />
            </div>
            <div class="detail-box">
              <h3>Spécialisé véhicules Dacia</h3>
              <p>
                Notre garage est avant tout un centre technique pour la réparation et l’entretien de votre Dacia.
              </p>
              <div>
                <a href="about.php#dacia">
                  En savoir plus
                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/s2.jpg" alt="" />
            </div>
            <div class="detail-box">
              <h3>Accessoires et pièces détachées</h3>
              <p>
                Vitre, rétroviseur, <br> nous disposons de nombreuses pièces détachées.
              </p>
              <div>
                <a href="about.php#pieces">
                  En savoir plus
                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 mx-auto">
          <div class="box">
            <div class="img-box">
              <img src="images/s3.jpg" alt="" />
            </div>
            <div class="detail-box">
              <h3>Pose et entretien de vos boîtiers éthanol</h3>
              <p>
                Pour toutes vos voitures essence, nous vous aiderons à passer au bioéthanol.
              </p>
              <div>
                <a href="about.php#ethanol">
                  En savoir plus
                  <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="about.php"> Toutes nos prestations </a>
      </div>
    </div>
  </section>

  <!-- footer section -->
  <?php include 'footer_white.php'; ?>

  <!-- jQery -->
  <script src="node_modules\jquery\dist\jquery.min.js"></script>
  <!-- popper js -->
  <script src="node_modules\popper.js\dist\umd\popper.min.js"></script>
  <!-- bootstrap js -->
  <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>

</body>

</html>