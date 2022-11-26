<?php
require_once '../include.php';

// Récupération des données
$formData = $_POST;

// Initialisation du tableau d'erreurs de validation
$errors = [];

// Validation et nettoyage des champs
foreach ($formData as $field => $value) {
  switch ($field) {
    case 'mod_id':
      if (!empty($value)) {
        $formData[$field] = htmlspecialchars($value);
      } else {
        $errors[$field] = 'Erreur : veuillez réessayer.';
      }
      break;
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
    case 'mod_email':
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
    case 'mod_password':
      if (!empty($value)) {
        if (!isPasswordValid($value)) {
          $errors[$field] =
            'Le mot de passe doit faire 8 caractères minimum avec au moins une lettre et un chiffre.';
        } else {
          $formData[$field] = strip_tags($value);
        }
      }
      break;
    case 'mod_password_verif':
      if (!empty($value)) {
        if (!isSamePassword($formData['mod_password'], $value)) {
          $errors[$field] = 'Les mots de passe doivent être identiques.';
        }
      } elseif (!empty($formData['mod_password'])) {
        $errors[$field] = 'Veuillez confirmer le mot de passe.';
      }
      break;
    case 'mod_birthdate':
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
    case 'mod_entry_date':
      if (!empty($value)) {
        if (!isDateValid($value)) {
          $errors[$field] = 'Veuillez entrer une date valide (YYYY-MM-DD)';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] =
          'Veuillez entrer une date d\'entrée dans l\'entreprise.';
      }
      break;
    case 'mod_secu':
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
    case 'mod_contract_type':
      if (!empty($value)) {
        if (!isContractTypeValid($value)) {
          $errors[$field] = 'Veuillez entrer un type de contrat valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un type de contrat.';
      }
      break;
    case 'mod_work_time':
      if (!empty($value)) {
        if (!isWorkTimeValid($value)) {
          $errors[$field] = 'Veuillez entrer un temps de travail valide.';
        } else {
          $formData[$field] = htmlspecialchars($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un temps de travail.';
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
  // Modification de l'utilisateur en base de données
  $user = new User($formData['mod_id']);
  $user->setFirstname($formData['mod_firstname']);
  $user->setLastname($formData['mod_lastname']);
  $user->setEmail($formData['mod_email']);
  if (!empty($formData['mod_password'])) {
    $user->setPassword(
      password_hash($formData['mod_password'], PASSWORD_DEFAULT)
    );
  }
  $user->setBirthDate($formData['mod_birthdate']);
  $user->setEntryDate($formData['mod_entry_date']);
  $user->setSecuNumber($formData['mod_secu']);
  $user->setContractType($formData['mod_contract_type']);
  $user->setWorkTimeWeek($formData['mod_work_time']);
  $return = $user->modify();
  if ($return) {
    Header('Location: ../../../admin.php?result=' . "Utilisateur modifié !");
  } else {
    Header(
      'Location: ../../../admin.php?errors=' .
        "Erreur dans la modification de l'utilisateur."
    );
  }
}