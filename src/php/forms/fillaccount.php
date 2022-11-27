<?php

$id = getAuthenticatedUserId();
$user = new User($id);
$firstname = $user->getFirstName();
$lastname = $user->getLastName();
$email = $user->getEmail();
$birthdate = $user->getBirthDate();
$secu = $user->getSecuNumber();

?>