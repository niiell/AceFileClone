<?php ob_start(); require_once(realpath($_SERVER['DOCUMENT_ROOT']) . '/library/autoload.php');
header('Access-Control-Allow-Origin: *'); 
// header("Content-Type: application/json;charset=utf-8");
if(!isset($_COOKIE['token'])) header('Location: /OAuth?r='.base64_encode(BASE_URL));

if(isset($_GET['file'])) {
	$file_id 	= $_GET['file'];
	@$copy 		= copyFile_createFolder($file_id);
	if(isset($copy['error'])) {
		print json_encode(array(
			'success'=>false,
			'code' => $copy['error']
		));
	} else {
		print json_encode(array(
			'success'=>true,
			'code' => 200,
			'msg' => "Download succeeded"
		));
		print "<script>setTimeout(function(){window.location.href='$copy[webContentLink]'},3000);</script>";
	}
} else {
	print 'Invalid Request!';
}
?>