<?php

/*
		Fonction isMessagePostValid
		Permet de vérifier la validité d'un message envoyé
		par formulaire
*/
function isMessagePostValid($_mess = [])
{
  if (
    $_mess &&
    count($_mess) &&
    array_key_exists('name', $_mess) &&
    array_key_exists('email', $_mess) &&
    array_key_exists('phone', $_mess) &&
    array_key_exists('message', $_mess) &&
    !empty($_mess['name']) &&
    !empty($_mess['email']) &&
    !empty($_mess['phone']) &&
    !empty($_mess['message']) &&
    isPhoneValid($_mess['phone']) &&
    isMessageValid($_mess['message']) &&
    filter_var($_mess['email'], FILTER_VALIDATE_EMAIL)
  ) {
    return true;
  } else {
    return false;
  }
}

/*
		Fonction isPhoneValid
		Permet de vérifier la validité d'un numéro de téléphone
*/
function isPhoneValid($phone)
{
  if (preg_match("#^[\s()+-]*([0-9][\s()+-]*){6,20}$#", $phone)) {
    return true;
  }
  return false;
}

/*
		Fonction isMessageValid
		Permet de vérifier la validité d'un message
*/
function isMessageValid($mess)
{
  if (preg_match("#^(?=.{10,1000}$).*#", $mess)) {
    return true;
  }
  return false;
}

// Validation du format du prénom ou nom
function isNameValid($value)
{
  return preg_match(
    "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/",
    $value
  );
}

// Validation du format de l'email
function isEmailValid($value)
{
  return preg_match("#^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$#", $value);
}

// Validation du format du mot de passe
function isPasswordValid($value)
{
  return preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $value);
}

// Validation de l'égalité des deux password
function isSamePassword($value1, $value2)
{
  return $value1 === $value2;
}

// Validation du format de la date
function isDateValid($value)
{
  return preg_match(
    "/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/",
    $value
  );
}

// Validation du format du numéro de sécu
function isSecuValid($value)
{
  return preg_match("/(^\d{13}$)|(^\d{15}$)/", $value);
}

// Validation du format du type de contrat
function isContractTypeValid($value)
{
  $contractTypes = ["CDI", "CDD", "Alternance", "Autre"];
  return in_array($value, $contractTypes);
}

// Validation du format du temps de travail
function isWorkTimeValid($value)
{
  return preg_match("/^\+?(0|[1-9]\d*)$/", $value);
}

// Validation du format du code postal
function isZipcodeValid($value)
{
  return preg_match("/^(?:0[1-9]|[1-8]\d|9[0-8])\d{3}$/", $value);
}

// Validation du format du type de véhicule
function isVehicleValid($value)
{
  return preg_match("/^(?=.{2,255}$).*/", $value);
}

/*
		Fonction addMessageAlert
		Ajoute un message en session qui sera affiché 
*/
function addMessageAlert($msg = "")
{
  if (!array_key_exists('msg', $_SESSION)) {
    $_SESSION['msg'] = "";
  }

  $_SESSION['msg'] = $msg;
}