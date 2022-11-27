<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'firstname':
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
    case 'lastname':
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
    case 'email':
      if (!empty($value)) {
        if (!isEmailValid($value)) {
          $errors[$field] = 'Veuillez entrer une adresse email valide.';
        } else {
          $formData[$field] = filter_var($value, FILTER_SANITIZE_EMAIL);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un email.';
      }
      break;
    case 'password':
      if (!empty($value)) {
        if (!isPasswordValid($value)) {
          $errors[$field] =
            'Le mot de passe doit faire 8 caractères minimum avec au moins une lettre et un chiffre.';
        } else {
          $formData[$field] = strip_tags($value);
        }
      }
      break;
    case 'password_verif':
      if (!empty($value)) {
        if (!isSamePassword($formData['password'], $value)) {
          $errors[$field] = 'Les mots de passe doivent être identiques.';
        }
      } elseif (!empty($formData['password'])) {
        $errors[$field] = 'Veuillez confirmer le mot de passe.';
      }
      break;
    case 'birthdate':
      if (!empty($value)) {
        if (!isDateValid($value)) {
          $errors[$field] = 'Veuillez entrer une date valide (AAAA-MM-DD)';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer une date de naissance.';
      }
      break;
    case 'secu':
      if (!empty($value)) {
        if (!isSecuValid($value)) {
          $errors[$field] =
            'Veuillez entrer un numéro de sécurité sociale valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un numéro de sécurité sociale.';
      }
      break;
    default:
      break;
  }
}

if (!empty($errors)) {
  // Redirection vers le formulaire
  Header('Location: ../../../moncompte.php?errors=' . array_values($errors)[0]);
} else {
  // Modification de l'utilisateur en base de données
  $user = new User(getAuthenticatedUserId());
  $user->setFirstname($formData['firstname']);
  $user->setLastname($formData['lastname']);
  $user->setEmail($formData['email']);
  if (!empty($formData['password'])) {
    $user->setPassword(password_hash($formData['password'], PASSWORD_DEFAULT));
  }
  $user->setBirthDate($formData['birthdate']);
  $user->setSecuNumber($formData['secu']);
  $return = $user->update();
  if ($return) {
    Header('Location: ../../../moncompte.php?result=' . "Utilisateur modifié !");
  } else {
    Header(
      'Location: ../../../moncompte.php?errors=' .
        "Erreur dans la modification de l'utilisateur."
    );
  }
}
