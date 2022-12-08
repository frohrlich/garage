<?php
require_once '../include.php';

$id = $_POST['id'];
$client = new Client($id);
echo $client->dataClient();