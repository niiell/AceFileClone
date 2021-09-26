<?php
if(!isset($_SESSION)) session_start();
require_once('config.php');
require_once('fpdo/autoload.php');
require_once('file/core.php');
require_once('file/function.php');
require_once('file/class.php');

$WiClass = new Wimember\Wimember_db();

if(!empty($_COOKIE['g_token'])) {
	$_user = json_decode($_COOKIE['user'], true);
	$refresh = refresh_token($_SESSION['refresh_token']);
	$_SESSION['token'] = $refresh->access_token;
}
if($app['debug']==0) error_reporting(0);
?>