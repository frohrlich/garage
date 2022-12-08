<?php

class Acte extends Bdd
{
  private $id;
  private $userId;
  private $clientId;
  private $prestaId;
  private $date;

  public function getId()
  {
    return $this->id;
  }

  public function getUserId()
  {
    return $this->userId;
  }

  public function setUserId($userId)
  {
    $this->userId = $userId;
  }

  public function getClientId()
  {
    return $this->clientId;
  }

  public function setClientId($clientId)
  {
    $this->clientId = $clientId;
  }

  public function getPrestaId()
  {
    return $this->prestaId;
  }

  public function setPrestaId($prestaId)
  {
    $this->prestaId = $prestaId;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function __construct($id = null)
  {
    parent::__construct();

    if ($id) {
      $this->find($id);
    }
  }

  // Creates an acte in database
  public function create()
  {
    $sql = 'INSERT INTO acte (user_id, client_id, prestation_id, date) 
            VALUES (?, ?, ?, ?)';
    try {
      $statement = $this->getConnection()->prepare($sql);
      $statement->execute([
        $this->userId,
        $this->clientId,
        $this->prestaId,
        $this->date,
      ]);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    return true;
  }

  // Update an acte in database
  public function update()
  {
    $sql = "UPDATE acte SET user_id= ?, client_id= ?, prestation_id= ?, date= ? WHERE id= " . $this->getId();

    try {
      $statement = $this->getConnection()->prepare($sql);
      $args = [
        $this->userId,
        $this->clientId,
        $this->prestaId,
        $this->date,
      ];
      $statement->execute($args);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    return true;
  }

  // Finds a acte with an ID and fetches its data
  public function find($id)
  {
    $sql = 'SELECT id, user_id, client_id, prestation_id, date FROM acte WHERE id = ?';

    try {
      $statement = $this->getConnection()->prepare($sql);
      $statement->execute([$id]);
      $user = $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }

    if ($user) {
      $this->id = $user['id'];
      $this->userId = $user['user_id'];
      $this->clientId = $user['client_id'];
      $this->prestaId = $user['prestation_id'];
      $this->date = user['date'];
    }
  }

  // Returns data of a acte in json format
  public function dataActe()
  {
    return json_encode([
      'userId' => $this->userId,
      'clientId' => $this->clientId,
      'prestaId' => $this->prestaId,
      'date' => $this->date,
    ]);
  }
}
