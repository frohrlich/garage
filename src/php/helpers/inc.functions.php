<?php
/*
		Fonction isMessagePostValid
		Permet de vérifier la validité d'un lien envoyé
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
  if (preg_match("#^(?=.{50,1000}$).*#", $mess)) {
    return true;
  }
  return false;
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
?>