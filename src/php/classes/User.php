<?php

class User extends Bdd
{
  private $id;
  private $firstname;
  private $lastname;
  private $email;
  private $password;
  private $birthDate;
  private $entryDate;
  private $secuNumber;
  private $contractType;
  private $workTimeWeek;
  private $role;
  private $lastLogin;

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

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getBirthDate()
  {
    return $this->$birthDate;
  }

  public function setBirthDate($birthDate)
  {
    $this->birthDate = $birthDate;
  }

  public function getEntryDate()
  {
    return $this->$entryDate;
  }

  public function setEntryDate($entryDate)
  {
    $this->entryDate = $entryDate;
  }

  public function getSecuNumber()
  {
    return $this->$secuNumber;
  }

  public function setSecuNumber($secuNumber)
  {
    $this->secuNumber = $secuNumber;
  }

  public function getContractType()
  {
    return $this->$contractType;
  }

  public function setContractType($contractType)
  {
    $this->contractType = $contractType;
  }

  public function getWorkTimeWeek()
  {
    return $this->$workTimeWeek;
  }

  public function setWorkTimeWeek($workTimeWeek)
  {
    $this->workTimeWeek = $workTimeWeek;
  }

  public function getRole()
  {
    return $this->role;
  }

  public function setRole($role)
  {
    $this->role = $role;
  }

  public function getLastLogin()
  {
    return $this->$lastLogin;
  }

  public function setLastLogin($lastLogin)
  {
    $this->lastLogin = $lastLogin;
  }

  public function __construct($id = null)
  {
    parent::__construct();

    if ($id) {
      $this->find($id);
    }
  }

  public function create()
  {
    if (!$this->checkEmailExists()) {
      $sql = 'INSERT INTO user (prenom, nom, email, password, birthdate, 
                                date_entry, social_sec, contract_type, worktime_week, 
                                role, last_login) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
      try {
        $statement = $this->getConnection()->prepare($sql);
        $statement->execute([
          $this->firstname,
          $this->lastname,
          $this->email,
          password_hash($this->password, PASSWORD_DEFAULT),
          $this->birthDate,
          $this->entryDate,
          $this->secuNumber,
          $this->contractType,
          $this->workTimeWeek,
          $this->role,
          $this->lastLogin,
        ]);
      } catch (PDOException $exception) {
        var_dump($exception);
        exit();
      }

      return true;
    } else {
      return ['email' => 'Cet adresse email est déjà utilisée.'];
    }
  }

  public function checkEmailExists()
  {
    $sql = 'SELECT id FROM user WHERE email = ?';

    try {
      $statement = $this->getConnection()->prepare($sql);
      $statement->execute([$this->email]);
      $user = $statement->fetch(PDO::FETCH_ASSOC);

      return $user;
    } catch (PDOException $exception) {
      var_dump($exception);
      exit();
    }
  }

  public function find($id)
  {
    $sql = 'SELECT id, firstname, lastname, email, password, birthDate, 
                   entryDate, secuNumber, contractType, workTimeWeek, 
                   role, lastLogin FROM user WHERE id = ?';

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
      $this->setFirstname($user['firstname']);
      $this->setLastname($user['lastname']);
      $this->setEmail($user['email']);
      $this->setPassword($user['password']);
      $this->setBirthDate($user['birthDate']);
      $this->setEntryDate($user['entryDate']);
      $this->setSecuNumber($user['secuNumber']);
      $this->setContractType($user['contractType']);
      $this->setWorkTimeWeek($user['workTimeWeek']);
      $this->setRole($user['role']);
      $this->setLastLogin($user['lastLogin']);
    }
  }
}