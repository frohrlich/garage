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
    $date = $acte->getDate();
    $date = date('d/m/Y H:i', strtotime($date));
    $currentDate = date('d/m/Y H:i:s');
    $user = new User($acte->getUserId());
    $userName = $user->getFirstName() . ' ' . $user->getLastName();
    $client = new Client($acte->getClientId());
    $clientName = $client->getFirstName() . ' ' . $client->getLastName();
    $vehicle = $client->getVehicle();
    $prestation = new Prestation($acte->getPrestaId());
    $prestationName = $prestation->getName();
    $cost = $prestation->getCost();

    $content = 
    "<h1 style='text-align: center'>Devis</h1>
     <h2 style='text-align: center'>Garage Pistons & Boulons</h2>
     <p style='text-align: center; font-style: italic'>$currentDate</p>
     <p><strong>Prestataire :</strong> $userName</p>
     <p><strong>Client :</strong> $clientName</p>
     <p><strong>Prestation :</strong> $prestationName</p>
     <p><strong>Véhicule :</strong> $vehicle</p>
     <p><strong>Date de l'intervention :</strong> $date</p>
     <p><strong>Coût :</strong> $cost €</p>
    ";

    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($content);
    $html2pdf->output();

  } else {
    Header(
      'Location: ../../../pdfgenerator.php?errors=' .
        "Erreur dans la génération du devis."
    );
  }
}
