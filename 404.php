<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Erreur, 404, pistons&boulons" />
    <meta name="description" content="Page personnalisée en cas d'erreur 404" />
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
    <section class="banner_section min-vh-100 ">

        <div class="banner_container">
            <div class="container">

                <div class="detail-box">
                    <h1>
                        Oups, Erreur 404 <br>
                        cette page n'existe plus ou pas.
                    </h1>
                    <p>
                        Excusez-nous pour la gêne occasionnée. <br>
                        Rendez-vous sur la page d'accueil pour poursuivre votre visite.
                    </p>
                    <div class="btn-box">
                        <a href="index.php" class="btn-1"> Revenir à la page d'accueil ! </a>
                    </div>
                </div>
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