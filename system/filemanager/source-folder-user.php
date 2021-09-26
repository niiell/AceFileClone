<?php header("Content-Type: application/json;charset=utf-8");
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/library/autoload.php');

if(!isset($_user)) {
	$json['success'] = false;
	$json['msg'] = "Credential invalid";
	return print json_encode($json, JSON_PRETTY_PRINT);
}
@$folder = $WiClass->get_folder_from_user($_user['sub']);

$json['count'] = $folder['count'];
$json['data'] = array();

if(isset($folder['folders'])) {
	foreach ($folder['folders'] as $key => $value) {
		$files_count = $WiClass->get_count_file_form_folder($value['id_folder']);
		$filelink = "<a href=\"/folder/$value[slug]\">".$value['folder_name']."</a>";
		$data[] = array(
			'id_folder' => $value['id_folder'],
			'folder_name' => $value['folder_name'],
			'folder_link' => $filelink,
			'folder_date' => date('d/m/Y, H:i A', strtotime($value['folder_date'])),
			'total_files' => $files_count
		);
	}
} else {
	$data = array();
}
$json['data'] = $data;
print json_encode($json, JSON_PRETTY_PRINT);
?>