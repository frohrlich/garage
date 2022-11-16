<?php
require_once '../classes/Authentication.php';

$formData = $_POST;

$auth = new Authentication();
$auth->login($formData);
