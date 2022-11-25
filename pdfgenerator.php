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
    <meta name="keywords" content="pdf, garage, pistons&boulons" />
    <meta name="description" content="Page permettant de générer un pdf à l'aide d'un formulaire" />
    <meta name="author" content="Web agence" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />
    <title>Générateur de PDF - Garage Pistons & Boulons</title>

    <!-- font awesome style -->
    <link href="<?php echo TL_BASE; ?>/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.min.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <script src="./js/pdfgenerator.js" type="module" defer></script>

</head>

<body>
    <div class="hero_area">
        <!-- header section -->
        <?php include 'header.php'; ?>

        <!-- Navigation bar -->
        <?php include 'navbar_back.php'; ?>

        <!-- contact section -->
        <section class="crud_section py-3 min-vh-100">
            <div class="container d-flex justify-content-center">
                <div class="form_container">
                    <div class="heading_container heading_center">
                        <h1 class="text-center">Générer un PDF</h1>
                    </div>
                    <form action="<?php echo TL_BASE; ?>/src/php/forms/loginform.php" id="connectForm" method="post">
                        <div class="padding_select">
                            <label for="add_list_user">Sélectionner un collaborateur :</label>
                            <br>
                            <select name="add_list_user" id="add_list_user" required>
                                <option value="">--Please choose an option--</option>
                                <option value="">Exemple 1</option>
                                <option value="">Exemple 2</option>
                            </select>
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <div class="padding_select">
                            <label for="add_list_client">Sélectionner un client :</label>
                            <br>
                            <select name="add_list_client" id="add_list_client" required>
                                <option value="">--Please choose an option--</option>
                                <option value="">Exemple 1</option>
                                <option value="">Exemple 2</option>
                            </select>
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <div class="padding_select">
                            <label for="add_list_presta">Sélectionner une prestation :</label>
                            <br>
                            <select name="add_list_presta" id="add_list_presta" required>
                                <option value="">--Please choose an option--</option>
                                <option value="">Exemple 1</option>
                                <option value="">Exemple 2</option>
                            </select>
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <div>
                            <label for="add_datetime">Choisir un jour et une date :</label>
                            <input type="datetime-local" id="add_datetime" name="add_datetime" required />
                            <span class="text-danger err-msg"></span><br>
                        </div>
                        <?php if (isset($_GET['errors'])) : ?>
                            <span class="text-danger"><?php echo $_GET['errors']; ?></span>
                        <?php endif; ?>
                        <div class="d-flex justify-content-center">
                            <button type="submit">Connexion</button>
                        </div>
                    </form>
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

</body>

</html>