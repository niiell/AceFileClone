<?php header('Access-Control-Allow-Origin: *');
include(realpath($_SERVER['DOCUMENT_ROOT']).'/template/header.php');
include(realpath($_SERVER['DOCUMENT_ROOT']).'/system/send-mail.php');

if (@$_GET['token'] == @$_SESSION['file_token']) {
	$file_id 	= $_REQUEST['id'];
	$file 		= $WiClass->get_file($file_id);
	@$copy 		= copyFile_createFolder($file['file_id']);
	//$direct     = str_replace('&gd=true', '', @$copy['downloadUrl']);
	if(isset($copy['error'])) {
		if($copy['error'] == '404') {
			kirim_email($file['file_owner_mail'], $file['file_name'], $_SERVER['HTTP_REFERER']);
			$WiClass->broken_file(array(
				'id' => $file_id,
				'file_owner_mail' => $file['file_owner_mail'],
				'created_date' => $WiClass->DATETIME,
				'type' => 1
			));
		} elseif($copy['error'] == '401') {
			redirect(BASE_HOST.'/OAuth?r='.base64_encode(BASE_URL));
		}
		$msg = '<i class="fa fa-warning"></i> '.errorText($copy['error']); goto lewat;
	} else {
		if($file['file_size'] <= 1500) {
			kirim_email($file['file_owner_mail'], $file['file_name'], $_SERVER['HTTP_REFERER'], false);
			$WiClass->broken_file(array(
				'id' => $file_id,
				'file_owner_mail' => $file['file_owner_mail'],
				'created_date' => $WiClass->DATETIME,
				'type' => 2
			));
		}
		get_token_file();
		$WiClass->update_dls($file['downloads'], $file_id);
		$WiClass->update_last_dls(array(
			'id' => $file_id,
			'file_name' => $file['file_name'],
			'user' => $_user['email'],
			'date_dls' => $WiClass->DATETIME
		));
		redirect($copy['webContentLink']);
		exit();
	}
} else {
	header("HTTP/1.1 400 Forbidden");
	$msg = "Invalid Token! <small><a href='$_SERVER[HTTP_REFERER]'>Click here</a></small> to download again..";
}
lewat:
?>
<div class="container" style="margin-top: 40px;">
	<div class="alert alert-danger" style="padding: 30px;text-align: center;font-size: 13pt;">
		<h2 class="lead text-white"><?php echo $msg; ?></h2>
	</div>
</div>
<?php include(realpath($_SERVER['DOCUMENT_ROOT']).'/template/footer.php'); ?>