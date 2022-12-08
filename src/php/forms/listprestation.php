<?php

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

    // Then list all the prestations
    echo "
      <div class='row h-100'>
        <div class='col my-auto list_text' id='" .
      $prestationsArray[$i]->getId() .
      "'>" .
      $prestationsArray[$i]->getName() .
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
