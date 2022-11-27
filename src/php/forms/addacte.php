<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'add_list_client':
      if (!empty($value)) {
        $formData[$field] = htmlspecialchars($value);
      } else {
        $errors[$field] = 'Veuillez choisir un client.';
      }
      break;
    case 'add_list_presta':
      if (!empty($value)) {
        $formData[$field] = htmlspecialchars($value);
      } else {
        $errors[$field] = 'Veuillez choisir une prestation.';
      }
      break;
    case 'add_datetime':
      if (!empty($value)) {
        if (!isDateTimeValid($value)) {
          $errors[$field] = 'Veuillez entrer une date valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer une date.';
      }
      break;
    default:
      break;
  }
}

if (!empty($errors)) {
  // Redirection vers le formulaire
  Header(
    'Location: ../../../pdfgenerator.php?errors=' . array_values($errors)[0]
  );
} else {
  // Ajout d'un acte en base de données
  $acte = new Acte();
  $acte->setUserId(getAuthenticatedUserId());
  $acte->setClientId($formData['add_list_client']);
  $acte->setPrestaId($formData['add_list_presta']);
  $acte->setDate($formData['add_datetime']);
  $return = $acte->create();
  if ($return) {
    Header(
      'Location: ../../../pdfgenerator.php?result=' . "Devis généré !"
    );
  } else {
    Header(
      'Location: ../../../pdfgenerator.php?errors=' .
        "Erreur dans la génération du devis."
    );
  }
}
