<?php

require_once './src/php/include.php';

switch ($_GET['code']) {
    case '404':
        header('Location:' . TL_BASE . '/404.php');
        break;
    default:
        header('Location: ' . TL_BASE . '/index.php');
}
