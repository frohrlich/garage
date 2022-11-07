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

    <!-- bootstrap core css -->
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.css" /> -->

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

    <!-- contact section -->
    <section class="contact_section">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="form_container">
              <div class="heading_container">
                <h1>Contact Us</h1>
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
                  <button>SEND</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-7">
            <div class="img-box">
              <img src="images/contact-img.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end contact section -->

    <!-- map section -->

    <section class="map_section">
      <div class="map_container">
        <div class="map">
          <div id="googleMap"></div>
        </div>
      </div>
    </section>

    <!-- end map section -->

    <!-- info section -->

    <section class="info_section">
      <div class="info_container">
        <div class="container">
          <div class="info_contact">
            <a href="#" class="link-box">
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              <span> Location </span>
            </a>
            <a href="#" class="link-box">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span> Call +01 1234567890 </span>
            </a>
            <a href="#" class="link-box">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span> demo@gmail.com </span>
            </a>
          </div>
          <div class="social_container">
            <div class="heading_container heading_center">
              <h2>Follow Us</h2>
              <p class="col-md-6 col-lg-5 mx-auto px-0">
                Aliquam, aut. Quam adipisci error nulla repellendus nihil
                asperiores, deserunt sed veritatis. Dolores magnam aperiam
                omnis! Architecto odit consectetur maxime consequatur ipsum.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end info section -->

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
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->
  </body>
</html>
