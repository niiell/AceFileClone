<?php require_once(realpath($_SERVER['DOCUMENT_ROOT']).'/library/autoload.php');
if(!isset($_REQUEST['code'])) {
	@$redirect = $_REQUEST['r'];
	$_SESSION['call_url'] = $redirect;
	redirect(authURL());
} else {
	$urlredirect = (isset($_SESSION['call_url'])) ? base64_decode($_SESSION['call_url']) : BASE_HOST;
	$token = get_token($_REQUEST['code']);
	$gUser = get_user($token->access_token);
	if(isset($token->error)) {
		return print $token->msg;
	} elseif (isset($gUser->error)) {
		return print $gUser->msg;
	}
	$WiClass->addAccount(array(
		'id_user' => $gUser['sub'],
		'name' => $gUser['name'],
		'email' => $gUser['email'],
		'join_date' => $WiClass->CURRENT_DATE
	));
	setcookie("user", json_encode($gUser), time() + 3600);
	setcookie("g_token", $token->access_token, time() + 3600);
	//setcookie("refresh_token", $token->refresh_token, time() + 3600);
	redirect($urlredirect);
}
?>