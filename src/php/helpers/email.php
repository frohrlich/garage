<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($data = [])
{
  //Create an instance; passing `true` enables exceptions
  $mail = new PHPMailer(true);

  try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
    $mail->isSMTP(); //Send using SMTP
    $mail->CharSet = 'UTF-8';
    $mail->Host = 'smtp.mailtrap.io'; //Set the SMTP server to send through
    $mail->SMTPAuth = true; //Enable SMTP authentication
    $mail->Port = 2525; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Username = 'e35570faf77284'; //SMTP username
    $mail->Password = 'e5ce11f7aa992f'; //SMTP password

    //Recipients
    $mail->setFrom('client@pistonsetboulons.com');
    $mail->addAddress('contact@pistonsetboulons.com'); //Add a recipient

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'Message de ' . $data["name"];
    $mail->Body =
      'Un utilisateur vous a envoyé un message depuis le formulaire de contact du site Pistons & Boulons.<br>' .
      '<strong>Nom : </strong>' .
      $data["name"] .
      '<br>' .
      '<strong>Adresse mail : </strong>' .
      $data["email"] .
      '<br>' .
      '<strong>Numéro de téléphone : </strong>' .
      $data["phone"] .
      '<br>' .
      '<strong>Message : </strong>' .
      $data["message"];

    $mail->send();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}