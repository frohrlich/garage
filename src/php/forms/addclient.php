<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'add_firstname':
      if (!empty($value)) {
        if (!isNameValid($value)) {
          $errors[$field] = 'Veuillez entrer un prénom valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un prénom.';
      }
      break;
    case 'add_lastname':
      if (!empty($value)) {
        if (!isNameValid($value)) {
          $errors[$field] = 'Veuillez entrer un nom valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un nom.';
      }
      break;
    case 'add_address':
      if (!empty($value)) {
        $formData[$field] = htmlspecialchars($value);
      } else {
        $errors[$field] = 'Veuillez entrer une addresse.';
      }
      break;
    case 'add_postalcode':
      if (!empty($value)) {
        if (!isZipcodeValid($value)) {
          $errors[$field] = 'Veuillez entrer un code postal valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un code postal.';
      }
      break;
    case 'add_vehicle':
      if (!empty($value)) {
        if (!isVehicleValid($value)) {
          $errors[$field] = 'Veuillez entrer un nom de véhicule valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un nom de véhicule.';
      }
      break;
    default:
      break;
  }
}

if (!empty($errors)) {
  // Redirection vers le formulaire
  Header('Location: ../../../clients.php?errors=' . array_values($errors)[0]);
} else {
  // Ajout d'un utilisateur en base de données
  $client = new Client();
  $client->setFirstname($formData['add_firstname']);
  $client->setLastname($formData['add_lastname']);
  $client->setAddress($formData['add_address']);
  $client->setZipcode($formData['add_postalcode']);
  $client->setCreatedAt(date("Y-m-d H-i-s"));
  $client->setVehicle($formData['add_vehicle']);
  $return = $client->create();
  if ($return) {
    Header('Location: ../../../clients.php?result=' . "Client ajouté !");
  } else {
    Header('Location: ../../../clients.php?errors=' . "Erreur dans l'ajout du client.");
  }
}
