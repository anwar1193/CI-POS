<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_item extends CI_Model {

	public function tampil_data(){
		$this->db->select('tbl_item.* , tbl_kategori.nama as nama_kategori, tbl_unit.nama as nama_unit');
		$this->db->from('tbl_item');
		$this->db->join('tbl_kategori', 'tbl_kategori.id = tbl_item.id_kategori');
		$this->db->join('tbl_unit', 'tbl_unit.id = tbl_item.id_unit');

		$result = $this->db->get();
		return $result->result_array();
		// $result = $this->db->get('tbl_item');
		// return $result->result_array();
	}

	public function tampil_id($tbl,$id){
		$result = $this->db->get_where($tbl,$id);
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
		return $result->result_array();
	}

	public function update_data($tbl,$data,$id){
		$result = $this->db->update($tbl,$data,$id);
		return $result;
	}

}
