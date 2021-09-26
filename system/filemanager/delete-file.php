<?php require_once(realpath($_SERVER['DOCUMENT_ROOT']).'/library/autoload.php');

$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

if($isAjax) {
	$file_id = $_REQUEST['file_id'];
	if(check_access($file_id)) {
		$delete = $WiClass->delete_file($file_id);
		if($delete) {
			print json_encode(array(
				'success' => true
			));
		} else {
			print json_encode(array(
				'success' => false
			));
		}
	} else {
		return print json_encode(array("success" => false, "msg" => "Error (403) you can't access this!"));
	}
}

?>