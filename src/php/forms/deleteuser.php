<?php
require_once '../include.php';

$id = $_POST['id'];

// Delete user corresponding to this ID
$sql = "DELETE FROM user WHERE id = ?";

try {
  $statement = (new Bdd())->getConnection()->prepare($sql);
  $statement->execute([$id]);
} catch (PDOException $exception) {
  var_dump($exception);
  exit();
}
?>