<?php

require_once('../include.php');

$formData = $_POST;

$auth = new Authentication();
$auth->login($formData);
