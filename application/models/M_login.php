<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	// Proses Login
	public function proses($post){
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}

	// Ambil Data yang Sedang Login (kirim ke libraries->Tampil_user())
	public function ambil_session($id = null){
		$this->db->from('tbl_user');
		if($id != null){
			$this->db->where('id', $id);
		}
		$query = $this->db->get();
		return $query;
	}

}
