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
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <title>Mon compte - Garage Pistons & Boulons</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

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
                <h1 class="text-center">Mon compte</h1>
            </div>
            <!-- List/modify section -->
            <div class="container d-flex justify-content-center">
                <div class="form_container">
                    <div class="heading_container heading_center mb-4">
                        <h2 class="text-center">Modifier mes informations</h2>
                    </div>
                    <div class="container list">
                        <div class="row h-100">
                            <div class="col my-auto list_text">
                                Mathilde Example
                            </div>
                            <div class="col d-flex">
                                <button class="btn-mod my-auto" type="button">Modifier</button>
                            </div>
                        </div>

                        <form action="#" class="d-none mb-5" id="modForm" method="">
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
                                <label for="mod_password" class="label">Mot de passe :</label>
                                <input type="password" id="mod_password" name="mod_password" required />
                                <span class="text-danger err-msg"></span><br>
                            </div>
                            <div>
                                <label for="mod_password_verif" class="label">Vérifiez le mot de passe :</label>
                                <input type="password" id="mod_password_verif" name="mod_password_verif" required />
                                <span class="text-danger err-msg"></span><br>
                            </div>
                            <div>
                                <label for="mod_birthdate">Date de naissance :</label>
                                <input type="date" id="mod_birthdate" name="mod_birthdate" required />
                                <span class="text-danger err-msg"></span><br>
                            </div>
                            <div>
                                <label for="mod_secu">Numéro de sécurité sociale :</label>
                                <input type="text" id="mod_secu" name="mod_secu" required />
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