<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <title>Contact - Garage Pistons & Boulons</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>

    <!--owl slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    
  </head>

  <body>
    <div class="hero_area">
      <!-- header section -->
      <?php include 'header.php' ?>

      <!-- Navigation bar -->
      <?php include 'navbar.php' ?>

      <h1>Contact</h1>

    <!-- info section -->
    <section class="pt-3 pl-2">
      <h2>Adresse :</h2>
      <p><a href="#map">1 Quai des Mégisseries, 87200 Saint-Junien</a>
      </p>
      <h3>Horaires :</h3>
      <p>Du lundi au vendredi : 8h30-19h</p>
      <p>Le samedi : 8h30-12h30</p>
      <p>Fermé le dimanche</p>

      <h2>Téléphone :</h2>
      <p>
      <a href="tel:+33555021023">+33 5 55 02 10 23</a>
      </p>

      <h2>Email :</h2>
      <p>
      <a href="mailto:contact@pistonsetboulons.com">contact@pistonsetboulons.com</a>
      </p>
    </section>

    <!-- contact section -->
    <section class="contact_section py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="form_container">
              <div class="heading_container">
              <h2>Nous contacter :</h2>
              </div>
              <form action="">
                <div>
                  <label for="name" class="label">Nom :</label>
                  <input type="text" id="name" name="name" />
                </div>
                <div>
                  <label for="email" class="label">Email :</label>
                  <input type="email" id="email" name="email" />
                </div>
                <div>
                  <label for="phone" class="label">Numéro de téléphone :</label>
                  <input type="tel" id="phone" name="phone" />
                </div>
                <div>
                  <label for="message" class="label">Message :</label>
                  <input
                    type="text"
                    class="message-box"
                    id="message"
                    name="message"
                  />
                </div>
                <div class="d-flex">
                  <button>Envoyer</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img src="images/illus_contact.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- map section -->

    <section class="map_section">
      <div class="map_container">
        <div class="map">
          <div id="map"></div>
        </div>
      </div>
    </section>

    <!-- end map section -->

    <!-- footer section -->
    <?php include 'footer.php' ?>

    <!-- jQery -->
    <script src="node_modules\jquery\dist\jquery.min.js"></script>
    <!-- popper js -->
    <script src="node_modules\popper.js\dist\umd\popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="node_modules\bootstrap\dist\js\bootstrap.min.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>
    <!-- OPM -->
    <script src="js/map.js"></script>
    <!-- OPM -->
  </body>
</html>
