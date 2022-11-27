<?php
require_once '../include.php';

$id = $_POST['id'];
$presta = new Prestation($id);
echo $presta->dataPrestation();