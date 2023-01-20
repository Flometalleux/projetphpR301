<?php
session_start();
require_once 'global.php';

session_destroy();
setcookie('remember', '', time() - 3600);
unset($_COOKIE['remember']);

header('Location: index.php');