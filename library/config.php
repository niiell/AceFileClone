<?php

/*
|--------------------------------------------------------------------------
| DEFINE Configuration
|--------------------------------------------------------------------------
*/

$site = "Your Domain";

define("_NAME", "Google Drive Share");
define("ROOT", dirname(dirname(__FILE__)));
define('BASE_DOMAIN', $_SERVER['HTTP_HOST']);
define("BASE_HOST", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://".BASE_DOMAIN);
define('BASE_URL', BASE_HOST.$_SERVER['REQUEST_URI']);
define('BASE_PAGE', basename($_SERVER['PHP_SELF']));

/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
*/
$dbinfo['host']     = 'localhost';
$dbinfo['db']       = 'dbname';
$dbinfo['user']     = 'dbuser';
$dbinfo['password'] = 'pass';

/*
|--------------------------------------------------------------------------
| APP Configuration
|--------------------------------------------------------------------------
*/
$app['name'] = _NAME;
$app['title'] = 'Ace File CLone';
$app['admin'] = 'streamyuu@gmail.com';
$app['description'] = _NAME.' Easy way to share your drive'; 
$app['desc'] =  'Easy way to share your drive'; 
$app['folder'] = 'Aoi Drive';
$app['debug'] = 1;
$app['public'] = 1;


/*
|--------------------------------------------------------------------------
| APP Plugins Configuration
|--------------------------------------------------------------------------
*/
$plugins['player']      = 1; // 1 is active 0 to deactive
$plugins['download']    = 1; // 1 is active 0 to deactive

/*
|--------------------------------------------------------------------------
| Ads Configuration
|--------------------------------------------------------------------------
*/
$ads['player1'] = '<a href="#" target="_blank" rel="nofollow"><img width="50%" border="0" src="https://img.akubebas.com/images/tsa.gif" /></a><a href="#" target="_blank" rel="nofollow"><img width="50%" border="0" src="https://img.akubebas.com/images/loker-backend.gif" /></a>';
$ads['player2'] = '<a href="#" target="_blank" rel="nofollow"><img width="100%" border="0" src="https://4.bp.blogspot.com/-iTTgkxlSVmA/WMBSV5G4TzI/AAAAAAAAAAM/HLRDdbLuBKkv1GcldBuMyce8ZVyhMzMlQCLcB/s1600/ads1.png" /></a>';
$ads['player3'] = '<a href="#" target="_blank" rel="nofollow"><img width="100%" border="0" src="https://img.akubebas.com/images/tsa.gif" /></a>';
$ads['left']    = '<a href="#" target="_blank" rel="nofollow"><img src="https://img.akubebas.com/images/idxbet/bn-slots.gif" width="160px" height="auto" /></a>';
$ads['right']   = '<a href="#" target="_blank" rel="nofollow"><img src="https://img.akubebas.com/images/idxbet/bn-slots.gif" width="160px" height="auto" /></a>';
$popads['player']   = '';
$popads['footer']   = '';

/*
|--------------------------------------------------------------------------
| Google Client Configuration
|--------------------------------------------------------------------------
*/
$google['developer_key'] = 'Paste Here';
$google['client_id'] = 'Paste Here';
$google['secret_key'] = 'Paste Here';
$google['redirect'] = urldecode(BASE_HOST.'/OAuth');
$google['access_type'] = 'offline';
$google['approval_prompt'] = 'force';
$google['scopes'] = array(
  'https://www.googleapis.com/auth/userinfo.profile',
  'email', 'https://www.googleapis.com/auth/drive'
);


?>