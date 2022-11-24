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
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <title>Prestations - Garage Pistons & Boulons</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <script src="./js/prestations.js" type="module" defer></script>

</head>

<body class="">
    <div class="hero_area">
        <!-- header section -->
        <?php include 'header.php'; ?>

        <!-- Navigation bar -->
        <?php include 'navbar_back.php'; ?>

        <section class="crud_section py-3 min-vh-100">
            <div class="heading_container heading_center d-flex m-3">
                <h1 class="text-center">Espace prestations</h1>
            </div>
            <!-- Adding section -->
            <div class="container d-flex justify-content-center mb-4">
                <div class="form_container">
                    <div class="heading_container heading_center">
                        <h2 class="text-center">Ajouter une nouvelle prestation</h2>
                        <!-- Collapse button -->
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#addForm" aria-expanded="false" aria-controls="collapseExample">
                            Afficher/Cacher
                        </button>
                    </div>
                    <form class="collapse show" action="#" id="addForm" method="POST">
                        <div>
                            <label for="add_presta">Prestation :</label>
                            <input type="text" id="add_presta" name="add_presta" required />
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <div>
                            <label for="add_reatime">Temps de réalisation (en heures, 30min = 0,5) :</label>
                            <input type="number" id="add_reatime" name="add_reatime" step="0.01" required />
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <div>
                            <label for="add_cost">Coût HT :</label>
                            <input type="number" id="add_cost" name="add_cost" step="0.01" required />
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <?php if (isset($_GET['errors'])) : ?>
                            <span class="text-danger"><?php echo $_GET['errors']; ?></span>
                        <?php elseif (isset($_GET['result'])) : ?>
                            <span class="text-success"><?php echo $_GET['result']; ?></span>
                        <?php endif; ?>
                        <span class="text-danger err-msg"></span><br>
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
                        <div class="row h-100">
                            <div class="col my-auto list_text">
                                Mathilde Example
                            </div>
                            <div class="col d-flex">
                                <button class="btn-mod my-auto" type="button">Modifier</button>
                            </div>
                            <div class="col d-flex">
                                <button class="btn-del my-auto" type="button">Supprimer</button>
                            </div>
                        </div>

                        <div class="row h-100">
                            <div class="col my-auto list_text">
                                Hubert Luc-Mongrain
                            </div>
                            <div class="col d-flex">
                                <button class="btn-mod my-auto" type="button">Modifier</button>
                            </div>
                            <div class="col d-flex">
                                <button class="btn-del my-auto" type="button">Supprimer</button>
                            </div>
                        </div>

                        <div class="row h-100">
                            <div class="col my-auto list_text">
                                Clarisse Boustifaille
                            </div>
                            <div class="col d-flex">
                                <button class="btn-mod my-auto" type="button">Modifier</button>
                            </div>
                            <div class="col d-flex">
                                <button class="btn-del my-auto" type="button">Supprimer</button>
                            </div>
                        </div>

                        <div class="row h-100">
                            <div class="col my-auto list_text" id="item-4">
                                Hugues le Hugues
                            </div>
                            <div class="col d-flex">
                                <button class="btn-mod my-auto" type="button">Modifier</button>
                            </div>
                            <div class="col d-flex">
                                <button class="btn-del my-auto" type="button">Supprimer</button>
                            </div>
                        </div>

                        <form action="#" class="d-none mb-5" id="modForm" method="">
                            <div>
                                <label for="mod_presta">Prestation :</label>
                                <input type="text" id="mod_presta" name="mod_presta" required />
                                <span class="text-danger err-msg"></span><br>
                            </div>
                            <div>
                                <label for="mod_reatime">Temps de réalisation (en heures, 30min = 0,5) :</label>
                                <input type="number" id="mod_reatime" name="mod_reatime" step="0.01" required />
                                <span class="text-danger err-msg"></span><br>
                            </div>
                            <div>
                                <label for="mod_cost">Coût HT :</label>
                                <input type="number" id="mod_cost" name="mod_cost" step="0.01" required />
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