<?php header("Content-Type: application/json;charset=utf-8");
require_once(realpath($_SERVER['DOCUMENT_ROOT']).'/library/autoload.php');
$countUser = $WiClass->get_count('tb_user');
$countFile = $WiClass->get_count('tb_file');
$countSize = filesize_formatted($WiClass->get_all_filesize());
$countDls  = $WiClass->get_all_downloaded();
$json = array(
	'users'=>$countUser,
	'files' => $countFile,
	'space' => $countSize,
	'downloads' => $countDls
);
print json_encode($json);
?>