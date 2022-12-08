<?php

class Prestation extends Bdd
{
  private $id;
  private $name;
  private $cost;
  private $time;

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getCost()
  {
    return $this->cost;
  }

  public function setCost($cost)
  {
    $this->cost = $cost;
  }

  public function getTime()
  {
    return $this->time;
  }

  public function setTime($time)
  {
    $this->time = $time;
  }

  public function __construct($id = null)
  {
    parent::__construct();

    if ($id) {
      $this->find($id);
    }
  }

  // Creates a prestation in database
  public function create()
  {
    $sql = 'INSERT INTO prestation (name, price_ht, hours) 
            VALUES (?, ?, ?)';
    try {
      $statement = $this->getConnection()->prepare($sql);
      $statement->execute([
        $this->name,
        $this->cost,
        $this->time,
      ]);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    return true;
  }

  // Update a prestation in database
  public function update()
  {
    $sql = "UPDATE prestation SET name= ?, price_ht= ?, hours= ? WHERE id= " . $this->getId();

    try {
      $statement = $this->getConnection()->prepare($sql);
      $args = [
        $this->name,
        $this->cost,
        $this->time,
      ];
      $statement->execute($args);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    return true;
  }

  // Finds a prestation with an ID and fetches its data
  public function find($id)
  {
    $sql = 'SELECT id, name, price_ht, hours FROM prestation WHERE id = ?';

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
      $this->setName($user['name']);
      $this->setCost($user['price_ht']);
      $this->setTime($user['hours']);
    }
  }

  // Returns data of a prestation in json format
  public function dataPrestation()
  {
    return json_encode([
      'name' => $this->name,
      'cost' => $this->cost,
      'time' => $this->time,
    ]);
  }
}
