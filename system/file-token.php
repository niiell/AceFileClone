<?php
function generateID() {
	$res = '';
	$pattrn = '0123456789abcdefghijklmnopqrstuvwxzy';
	for ($i=0; $i <=150; $i++) { 
		$res .= $pattrn[mt_rand(0, strlen($pattrn) - 1)];
	} return $res;
}
function get_token_file() {
	$file_token = generateID();
	$_SESSION['file_token'] = $file_token;	
}

?>