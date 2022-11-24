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
        if (!isEmailValid($value)) {
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
  Header('Location: ../../../admin.php?errors=' . array_values($errors)[0]);
} else {
  // Authentification de l'utilisateur
  $auth = new Authentication();
  $getAuth = $auth->login($formData);
  if ($getAuth && isAdmin()) {
    // Succès (et admin)
    Header('Location: ../../../admin.php');
  } elseif ($getAuth) {
    // Succès
    Header('Location: ../../../moncompte.php');
  } else {
    // Sinon redirection vers le formulaire
    Header('Location: ../../../connexion.php?errors=Identifiants incorrects');
  }
}