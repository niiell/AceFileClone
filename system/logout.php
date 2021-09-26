<?php require_once(realpath($_SERVER['DOCUMENT_ROOT']).'/library/autoload.php');

session_unset();
session_destroy();
revokeToken($_COOKIE['g_token']);

$urlredirect = (isset($_REQUEST['r'])) ? base64_decode($_REQUEST['r']) : BASE_HOST;

if (isset($_COOKIE)) {
    unset($_COOKIE['g_token']);
    unset($_COOKIE['refresh_token']);
    unset($_COOKIE['user']);
    setcookie('g_token', null, -1, '/');
    setcookie('refresh_token', null, -1, '/');
    setcookie('user', null, -1, '/');
}
redirect($urlredirect);

?>