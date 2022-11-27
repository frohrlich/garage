<?php

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

    // Then list all the clients
    echo "
      <div class='row h-100'>
        <div class='col my-auto list_text' id='" .
      $clientsArray[$i]->getId() .
      "'>" .
      $clientsArray[$i]->getFirstname() .
      " " .
      $clientsArray[$i]->getLastname() .
      "</div>
        <div class='col d-flex'>
          <button class='btn-mod my-auto' type='button'>Modifier</button>
        </div>
        <div class='col d-flex'>
          <button class='btn-del my-auto' type='button'>Supprimer</button>
        </div>
      </div>
    ";
  }
}
