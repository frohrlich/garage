<?php

// Select all user IDs in table user
$sql = 'SELECT id FROM user';

try {
  $statement = (new Bdd())->getConnection()->prepare($sql);
  $statement->execute();
  $users = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
  var_dump($exception);
  exit();
}

// Then find all users and put them in an array of User() objects
if ($users) {
  $usersArray = [];
  for ($i = 0; $i < count($users); $i++) {
    $usersArray[$i] = new User();
    $usersArray[$i]->find($users[$i]['id']);

    // Then list all the non-admin users
    if ($usersArray[$i]->getRole() == 'ROLE_USER') {
      echo "
      <div class='row h-100'>
        <div class='col my-auto list_text' id='item-" .
        $usersArray[$i]->getId() .
        "'>" .
        $usersArray[$i]->getFirstname() .
        " " .
        $usersArray[$i]->getLastname() .
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
}