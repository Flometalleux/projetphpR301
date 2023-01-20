<?php
/**
 * Verify if user is logged in
 *
 * @return boolean
 */
function isLoggedIn(): bool
{
    return !empty($_SESSION['email']);
}

if (!empty($_COOKIE['remember'])) {
    $_SESSION['email'] = $_COOKIE['remember'];
}
?>