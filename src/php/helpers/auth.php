<?php

function getAuthenticatedUserId()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user'];
    } else {
        return false;
    }
}

function getAuthenticatedUserEmail()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['email'];
    } else {
        return false;
    }
}

// Validation du format de l'email
function validateEmail($value)
{
    return preg_match("/^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/", $value);
}

function getAuthenticatedUserRole()
{
    if (isset($_SESSION['user'])) {
        return $_SESSION['user']['role'];
    } else {
        return false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] === 'ROLE_ADMIN') {
            return true;
        }
    }

    return false;
}
