<?php require_once(realpath($_SERVER['DOCUMENT_ROOT']).'/library/autoload.php');

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if($isAjax && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_COOKIE['g_token'])) {
	$folder = $_POST['select-folder']; 
	$files = $_POST['file'];
	$move = $WiClass->update_folder_files($folder, $files);
	if($move) {
		$data = array('success' => true);
	} else {
		$data = array('success' => false);
	}
	print json_encode($data, JSON_PRETTY_PRINT);
}
?>