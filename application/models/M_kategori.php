<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function tampil_data(){
		$result = $this->db->get('tbl_kategori');
		return $result->result_array();
	}

	public function tambah_data($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function hapus_data($tbl,$id){
		$result = $this->db->delete($tbl,$id);
		return $result;
	}

	public function edit_data($tbl,$id){
		$result = $this->db->get_where($tbl,$id);
		return $result->row_array(); //jika hanya ambil 1 data
	}

	public function update_data($tbl,$data,$id){
		$result = $this->db->update($tbl,$data,$id);
		return $result;
	}

}
