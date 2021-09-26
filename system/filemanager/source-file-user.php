<?php header("Content-Type: application/json;charset=utf-8");
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/library/autoload.php');

if(!isset($_user)) {
	$json['success'] = false;
	$json['msg'] = "Credential invalid";
	return print json_encode($json, JSON_PRETTY_PRINT);
}
@$parse = $WiClass->get_file_from_user($_user['email'], 0, 99);
$json['count'] = $parse['count'];
$json['data'] = array();
if(isset($parse['files'])) {
	foreach ($parse['files'] as $key => $value) {
		$sanitize = sanitize_filename($value['file_name']);
		$filelink = "<a href=\"/$value[id]/$sanitize\">".$value['file_name']."</a>";
		$data[] = array(
			'id' => $value['id'],
			'filename' => $filelink,
			'filesize' => filesize_formatted($value['file_size']),
			'filedls' => "$value[downloads]x",
			'created_date' => date('d/m/Y, H:i A', strtotime($value['created_date']))
		);
	}
} else {
	$data = array();
}
$json['data'] = $data;
print json_encode($json, JSON_PRETTY_PRINT);
?>