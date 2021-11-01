<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function tampil_user(){
		$result = $this->db->get('tbl_user');
		return $result->result_array();
	}

	public function simpan_data($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function hapus_data($tbl,$where){
		$result = $this->db->delete($tbl,$where);
		return $result;
	}

	public function edit_user($where){
		$result = $this->db->get_where('tbl_user',$where);
		return $result->result_array();
	}

	public function update_user($tbl,$data,$where){
		$result = $this->db->update($tbl,$data,$where);
		return $result;
	}

}
