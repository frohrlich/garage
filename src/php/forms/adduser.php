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
    case 'add_email':
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
    case 'add_password':
      if (!empty($value)) {
        if (!isPasswordValid($value)) {
          $errors[$field] =
            'Le mot de passe doit faire 8 caractères minimum avec au moins une lettre et un chiffre.';
        } else {
          $formData[$field] = strip_tags($value);
        }
      } else {
        $errors[$field] = 'Veuillez entrer un mot de passe.';
      }
      break;
    case 'add_password_verif':
      if (!empty($value)) {
        if (!isSamePassword($formData['add_password'], $value)) {
          $errors[$field] = 'Les mots de passe doivent être identiques.';
        }
      } else {
        $errors[$field] = 'Veuillez confirmer le mot de passe.';
      }
      break;
    case 'add_birthdate':
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
    case 'add_entry_date':
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
    case 'add_secu':
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
    case 'add_contract_type':
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
    case 'add_work_time':
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
  // Ajout d'un utilisateur en base de données
  $user = new User();
  $user->setFirstname($formData['add_firstname']);
  $user->setLastname($formData['add_lastname']);
  $user->setEmail($formData['add_email']);
  $user->setPassword($formData['add_password']);
  $user->setBirthDate($formData['add_birthdate']);
  $user->setEntryDate($formData['add_entry_date']);
  $user->setSecuNumber($formData['add_secu']);
  $user->setContractType($formData['add_contract_type']);
  $user->setWorkTimeWeek($formData['add_work_time']);
  $user->setRole('ROLE_USER');
  $user->setLastLogin(date("Y-m-d H-i-s"));
  $return = $user->create();
  if (!is_array($return)) {
    Header('Location: ../../../admin.php?result=' . "Utilisateur ajouté !");
  } else {
    Header('Location: ../../../admin.php?errors=' . $return['email']);
  }
}