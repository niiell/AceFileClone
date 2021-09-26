<?php require_once(realpath($_SERVER['DOCUMENT_ROOT']) . '/library/autoload.php');

$email = $_GET['user'];

$cekEksis = $WiMemberAPI->get_data($email);
if($cekEksis) return print json_encode(array('success'=>false,'msg'=>'Data exist'));
$generate = $WiMemberAPI->new_api($email);
if($generate) {
	print json_encode(array(
		'success' => true,
		$generate
	), JSON_PRETTY_PRINT);
} else {
	print json_encode(array('success'=>false));
}