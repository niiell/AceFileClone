<?php

/**
 * ====================================================================================
 * @author MuhBayu
 * @link https://github.com/MuhBayu
 * @package WiMember Database Library
 */

namespace Wimember;
use PDO;
use FluentPDO;
class Wimember_db
{
	private $max_file_id = 5;
	public $CURRENT_DATE;
	public $DATETIME;
	public function __construct()
	{
		global $dbinfo;
		$pdo = new PDO("mysql:dbname=$dbinfo[db]", "$dbinfo[user]", "$dbinfo[password]");
		$this->db = new FluentPDO($pdo);
		date_default_timezone_set("Asia/Jakarta");
		$this->DATETIME = date("Y-m-d H:i:s");
		$this->CURRENT_DATE 	= date("Y-m-d");
	}
/*
|--------------------------------------------------------------------------
| GET Function
|--------------------------------------------------------------------------
*/
	public function insert_file($data) {
		$query = $this->db
				 ->insertInto('tb_file')
				 ->values($data)->execute();
		return Self::get_file($data['id']);
	}
	public function addAccount($data) {
		$query = $this->db
				->insertInto('tb_user')
				->values($data);
		return $query->execute();
	}
	public function getUser($email) {
		$query = $this->db
				->from('tb_user')
				->where('email', $email)
				->execute();
		return $query->fetch();
	}

/*
|--------------------------------------------------------------------------
| GET Function
|--------------------------------------------------------------------------
*/
	public function get_file_exist($file_id) {
		$query = $this->db
				 ->from('tb_file')
				 ->select(null)
				 ->select('id')
				 ->select('file_name')
				 ->where('file_id', $file_id);
		return ($query->execute()) ? $query->fetch() : false;
	}
	public function get_file($file_id) {
		$query = $this->db
				 ->from('tb_file')
				 ->where('id', $file_id);
		return $query->execute()->fetch();
	}
	public function get_all_files($offset = 0, $limit = 20) {
		$query = $this->db
				 ->from('tb_file')
				 ->offset($offset)
				 ->limit($limit)
				 ->orderBy('created_date DESC')
				 ->execute();
		$datas['count'] = $query->rowCount();
		$datas['files'] = $query->fetchAll();
		return $datas;
	}
	public function get_file_from_user($email, $offset = 0, $limit = 20) {
		$query = $this->db
				 ->from('tb_file')
				 ->offset($offset)
				 ->limit($limit)
				 ->orderBy('created_date DESC')
				 ->where('file_owner_mail', $email)
				 ->execute();
		$file['count'] = $query->rowCount();
		$file['files'] = $query->fetchAll();
		return $file;
	}
	public function get_last_dls() {
		$query = $this->db
				 ->from('tb_lastdls')
				 ->orderBy('date_dls')
				 ->execute();
		return $query->fetch();
	}
	public function get_count($tbl, $user='') {
		$where='';
		if($user) $where = "file_owner_mail";
		$query = $this->db
				 ->from($tbl)
				 ->where($where, $user)
				 ->execute();
		return $query->rowCount();
	}
	public function get_all_filesize($user='') {
		$where="";
		if($user) $where = "file_owner_mail";
		$query = $this->db
				 ->from('tb_file')
				 ->select(null)
				 ->select('file_size')
				 ->where($where, $user)
				 ->execute();
		foreach ($query->fetchAll() as $key => $r) {
			$data[] = $r['file_size'];
		}
		return (@$data) ? array_sum($data) : 0;
	}
	public function get_all_downloaded() {
		$query = $this->db
				 ->from('tb_file')
				 ->select(null)
				 ->select('downloads')
				 ->execute();
		foreach ($query->fetchAll() as $key => $r) {
			$data[] = $r['downloads'];
		}
		return (@$data) ? array_sum($data) : 0;
	}
	public function broken_file($data) {
		$query = $this->db
				 ->insertInto('tb_broken')
				 ->values($data);
		return $query->execute();
	}
	public function get_broken_file($file_owner) {
		$query = $this->db->from('tb_file')
				->innerJoin('tb_broken ON tb_broken.id = tb_file.id')
				->select('tb_broken.created_date')
				->select('tb_broken.type')
				->where(null)
				->where('tb_file.file_owner_mail', $file_owner)
				->orderBy('tb_broken.created_date DESC')
				->execute();
		$broken['count'] = $query->rowCount();
		$broken['files'] = $query->fetchAll();
		return $broken;
	}

/*
|--------------------------------------------------------------------------
| UPDATE Function
|--------------------------------------------------------------------------
*/
	public function update_filename($file_id, $new_name) {
		$new_name = $this->sanitizeString($new_name);
		$query = $this->db
				->update('tb_file')
				->set(array('file_name' => $new_name))
				->where('id', $file_id);
		return $query->execute();
	}
	public function update_dls($last_view, $file_id) {
		$view = $last_view + 1;
		$query = $this->db
				->update('tb_file')
				->set(array('downloads' => $view))
				->where('id', $file_id);
		return $query->execute();
	}
	public function update_last_dls($data) {
		$query = $this->db
				->update('tb_lastdls')
				->set($data)
				->where(null)
				->where(1);
		return $query->execute();
	}

/*
|--------------------------------------------------------------------------
| DELETE Function
|--------------------------------------------------------------------------
*/
	public function delete_file($file_id) {
		$query = $this->db->deleteFrom('tb_file', $file_id);
		$this->db->deleteFrom('tb_broken', $file_id)->execute();
		return $query->execute();
	}

/*
|--------------------------------------------------------------------------
| Other Function
|--------------------------------------------------------------------------
*/
	public function generateID() {
		$res = '';
		$pattrn = '0123456789abcdefghijklmnopqrstuvwxzyABCDEFGHIJKLMNOPQRSTUVWXZY';
		for ($i=0; $i <= $this->max_file_id; $i++) { 
			$res .= $pattrn[mt_rand(0, strlen($pattrn) - 1)];
		} return $res;
	}
	function sanitizeString($var) {
        $var = stripslashes($var);
        $var = strip_tags($var);
        $var = htmlentities($var);
        return $var;
    }
}

?>