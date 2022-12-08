<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'mod_firstname':
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
    case 'mod_lastname':
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
    case 'mod_address':
      if (!empty($value)) {
        $formData[$field] = htmlspecialchars($value);
      } else {
        $errors[$field] = 'Veuillez entrer une addresse.';
      }
      break;
    case 'mod_postalcode':
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
    case 'mod_vehicle':
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
  // Ajout d'un client en base de données
  $client = new Client($formData['mod_id']);
  $client->setFirstname($formData['mod_firstname']);
  $client->setLastname($formData['mod_lastname']);
  $client->setAddress($formData['mod_address']);
  $client->setZipcode($formData['mod_postalcode']);
  $client->setVehicle($formData['mod_vehicle']);
  $return = $client->update();
  if ($return) {
    Header('Location: ../../../clients.php?result=' . "Client modifié !");
  } else {
    Header('Location: ../../../clients.php?errors=' . "Erreur dans la modification du client.");
  }
}