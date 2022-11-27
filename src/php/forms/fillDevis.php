<?php

// ------ CLIENTS ------

// Select all client IDs in table client
$sql = 'SELECT id FROM client';

try {
  $statement = (new Bdd())->getConnection()->prepare($sql);
  $statement->execute();
  $clients = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
  var_dump($exception);
  exit();
}

// Then find all clients and put them in an array of Client() objects
if ($clients) {
  $clientsArray = [];
  for ($i = 0; $i < count($clients); $i++) {
    $clientsArray[$i] = new Client();
    $clientsArray[$i]->find($clients[$i]['id']);
  }
}

// ------ PRESTATIONS ------

// Select all prestation IDs in table prestation
$sql = 'SELECT id FROM prestation';

try {
  $statement = (new Bdd())->getConnection()->prepare($sql);
  $statement->execute();
  $prestations = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
  var_dump($exception);
  exit();
}

// Then find all prestations and put them in an array of Prestation() objects
if ($prestations) {
  $prestationsArray = [];
  for ($i = 0; $i < count($prestations); $i++) {
    $prestationsArray[$i] = new Prestation();
    $prestationsArray[$i]->find($prestations[$i]['id']);
  }
}
?>
