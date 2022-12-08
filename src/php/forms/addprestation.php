<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'add_presta':
      if (!empty($value)) {
        if (!isPrestaValid($value)) {
          $errors[$field] = 'Veuillez entrer un nom entre 5 et 255 caractères.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un nom de prestation.';
      }
      break;
    case 'add_reatime':
      if (!empty($value)) {
        if (!isReaTimeValid($value)) {
          $errors[$field] = 'Veuillez entrer un temps de réalisation valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un temps de réalisation.';
      }
      break;
    case 'add_cost':
      if (!empty($value)) {
        if (!isCostValid($value)) {
          $errors[$field] = 'Veuillez entrer un coût valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un coût.';
      }
      break;
    default:
      break;
  }
}

if (!empty($errors)) {
  // Redirection vers le formulaire
  Header(
    'Location: ../../../prestations.php?errors=' . array_values($errors)[0]
  );
} else {
  // Ajout d'un prestation en base de données
  $prestation = new Prestation();
  $prestation->setName($formData['add_presta']);
  $prestation->setCost($formData['add_cost']);
  $prestation->setTime($formData['add_reatime']);
  $return = $prestation->create();
  if ($return) {
    Header('Location: ../../../prestations.php?result=' . "Prestation ajoutée !");
  } else {
    Header(
      'Location: ../../../prestations.php?errors=' .
        "Erreur dans l'ajout du prestation."
    );
  }
}
