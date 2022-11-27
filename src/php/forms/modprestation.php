<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'mod_presta':
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
    case 'mod_reatime':
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
    case 'mod_cost':
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
  // Modification d'un prestation en base de données
  $prestation = new Prestation($formData['mod_id']);
  $prestation->setName($formData['mod_presta']);
  $prestation->setCost($formData['mod_cost']);
  $prestation->setTime($formData['mod_reatime']);
  $return = $prestation->update();
  if ($return) {
    Header(
      'Location: ../../../prestations.php?result=' . "Prestation modifiée !"
    );
  } else {
    Header(
      'Location: ../../../prestations.php?errors=' .
        "Erreur dans la modification de la prestation."
    );
  }
}
