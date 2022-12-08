<?php
require_once '../include.php';

$id = $_POST['id'];
$user = new User($id);
echo $user->dataUser();