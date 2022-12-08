<?php
// Fichier nucléaire pour créer l'admin à nouveau (utiliser avec précaution)
require_once '../include.php';

$sql = 'INSERT INTO user (email, password, role) VALUES (?, ?, ?)';

$myBDD = new BDD();
$myConnection = $myBDD->getConnection();

$mdp = 'admin';
$user = 'admin@pistonsetboulons.com';
$role = 'ROLE_ADMIN';

try {
  $statement = $myConnection->prepare($sql);
  $statement->execute([$user, password_hash($mdp, PASSWORD_DEFAULT), $role]);
} catch (PDOException $exception) {
  var_dump($exception);
  exit();
}