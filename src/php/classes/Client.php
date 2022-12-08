<?php

class Client extends Bdd
{
  private $id;
  private $firstname;
  private $lastname;
  private $address;
  private $zipcode;
  private $createdAt;
  private $vehicle;

  public function getId()
  {
    return $this->id;
  }

  public function getFirstname()
  {
    return $this->firstname;
  }

  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;
  }

  public function getLastname()
  {
    return $this->lastname;
  }

  public function setLastname($lastname)
  {
    $this->lastname = $lastname;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getZipcode()
  {
    return $this->zipcode;
  }

  public function setZipcode($zipcode)
  {
    $this->zipcode = $zipcode;
  }

  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;
  }

  public function getVehicle()
  {
    return $this->vehicle;
  }

  public function setVehicle($vehicle)
  {
    $this->vehicle = $vehicle;
  }

  public function __construct($id = null)
  {
    parent::__construct();

    if ($id) {
      $this->find($id);
    }
  }

  // Creates a client in database
  public function create()
  {
    $sql = 'INSERT INTO client (prenom, nom, address, zipcode, created_at, vehicle) 
            VALUES (?, ?, ?, ?, ?, ?)';
    try {
      $statement = $this->getConnection()->prepare($sql);
      $statement->execute([
        $this->firstname,
        $this->lastname,
        $this->address,
        $this->zipcode,
        $this->createdAt,
        $this->vehicle,
      ]);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }

    return true;
  }

  // Update a client in database
  public function update()
  {
    $sql = "UPDATE client SET prenom= ?, nom= ?, address= ?, zipcode= ?, vehicle= ? WHERE id= " . $this->getId();

    try {
      $statement = $this->getConnection()->prepare($sql);
      $args = [
        $this->firstname,
        $this->lastname,
        $this->address,
        $this->zipcode,
        $this->vehicle,
      ];
      $statement->execute($args);
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
    return true;
  }

  // Finds a client with an ID and fetches its data
  public function find($id)
  {
    $sql = 'SELECT id, prenom, nom, address, zipcode, created_at, vehicle FROM client WHERE id = ?';

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
      $this->setFirstname($user['prenom']);
      $this->setLastname($user['nom']);
      $this->setAddress($user['address']);
      $this->setZipcode($user['zipcode']);
      $this->setCreatedAt($user['created_at']);
      $this->setVehicle($user['vehicle']);
    }
  }

  // Returns data of a client in json format
  public function dataClient()
  {
    return json_encode([
      'firstname' => $this->firstname,
      'lastname' => $this->lastname,
      'address' => $this->address,
      'zipcode' => $this->zipcode,
      'created_at' => $this->createdAt,
      'vehicle' => $this->vehicle,
    ]);
  }
}
