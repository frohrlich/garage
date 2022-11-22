<?php

require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'email':
      if (!empty($value)) {
        if (!validateEmail($value)) {
          $errors[$field] = 'Merci d\'entrer une adresse mail valide';
        } else {
          $formData[$field] = filter_var($value, FILTER_SANITIZE_EMAIL);
        }
      } else {
        $errors[$field] = 'Merci d\'entrer une adresse mail';
      }
      break;
    case 'password':
      if (!empty($value)) {
      } else {
        $errors[$field] = 'Merci d\'entrer un mot de passe';
      }
      break;
    default:
      break;
  }
}
if (!empty($errors)) {
  // Redirection vers le formulaire
  // Header('Location: ../../../');
} else {
  // Authentification de l'utilisateur
  $auth = new Authentication();
  $getAuth = $auth->login($formData);
  if (!is_array($getAuth)) {
    // Header('Location: ../mon-compte.php');
  } else {
    // Redirection vers le formulaire
    unset($formData['password']);
    // Header('Location: ../connexion.php?errors=' . json_encode($getAuth) . '&formdata=' . json_encode($formData));
  }
}