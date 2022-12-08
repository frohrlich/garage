<?php

require_once './src/php/include.php';

$msg_form = ""; // Message lors de la soumission du formulaire

//~ Lors de la soumission du formulaire
if ($_POST && count($_POST)) {
  if (isMessagePostValid($_POST)) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

    $data = [
      'name' => $name,
      'email' => $email,
      'phone' => $phone,
      'message' => $message,
    ];

    sendMail($data);

    //~ Message succès
    $msg_form = "<span class='text-success'>Message envoyé !</span>";
  } else {
    //~ Message echec
    $msg_form =
      "<span class='text-danger'>Erreur : vérifiez votre saisie.</span>";
  }
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
  <meta name="keywords" content="contact, mail, saint-junien, adresse, horaire, téléphone, map, garage, pistons&boulons" />
  <meta name="description" content="Page de contact permettant l'envoi d'un mail à l'entreprise et présentation des différentes informations pour trouver et contacter l'entreprise" />
  <meta name="author" content="Web Agence" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
  <title>Contact - Garage Pistons & Boulons</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.min.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

  <script src="./js/contact.js" type="module" defer></script>

</head>

<body>
  <div class="hero_area">
    <!-- header section -->
    <?php include 'header.php'; ?>

    <!-- Navigation bar -->
    <?php include 'navbar.php'; ?>

    <!-- contact section -->
    <section class="contact_section py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-5">
            <div class="form_container">
              <div class="heading_container">
                <h1>Nous contacter :</h1>
              </div>
              <form method="POST" action="#mess_form" id="mess_form">
                <div>
                  <label for="name" class="label">Nom :</label>
                  <input type="text" id="name" name="name" required />
                  <span class="text-danger err-msg"></span><br>
                </div>
                <div>
                  <label for="email" class="label">Email :</label>
                  <input type="email" id="email" name="email" required />
                  <span class="text-danger err-msg"></span><br>
                </div>
                <div>
                  <label for="phone" class="label">Numéro de téléphone :</label>
                  <input type="tel" id="phone" name="phone" required />
                  <span class="text-danger err-msg"></span><br>
                </div>
                <div>
                  <label for="message" class="label">Message :</label>
                  <input type="text" class="message-box" id="message" name="message" required />
                  <span class="text-danger err-msg"></span><br>
                </div>
                <?php echo $msg_form; ?>
                <div class="d-flex m-0">
                  <button class="m-0 mt-1">Envoyer</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-7 d-none d-md-block">
            <div class="img-box ">
              <img src="images/illus_contact.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- info section -->
    <section class="container pt-3 pl-2 text-center">
      <h2>Adresse :</h2>
      <p><a href="#map">1 Quai des Mégisseries, 87200 Saint-Junien</a>
      </p>
      <h3>Horaires :</h3>
      <p>Du lundi au vendredi : 8h30-19h</p>
      <p>Le samedi : 8h30-12h30</p>
      <p>Fermé le dimanche et les jours fériés</p>

      <h2>Téléphone :</h2>
      <p>
        <a href="tel:+33555021023">+33 5 55 02 10 23</a>
      </p>

      <h2>Email :</h2>
      <p>
        <a href="mailto:contact@pistonsetboulons.com">contact@pistonsetboulons.com</a>
      </p>
    </section>

    <!-- map section -->
    <section class="map_section">
      <div class="map_container">
        <div class="map">
          <div id="map"></div>
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

  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>
  <!-- Open Street Map -->
  <script src="js/map.js"></script>
</body>

</html>