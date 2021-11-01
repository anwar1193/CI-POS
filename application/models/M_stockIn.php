<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stockIn extends CI_Model {

	public function tampil_data(){
		$this->db->select('tbl_stockin.* ,
		tbl_item.nama_barang as nama_barang,
		tbl_supplier.nama as nama_supplier,
		tbl_user.nama_lengkap as nama_user');

		$this->db->from('tbl_stockin');
		$this->db->join('tbl_item','tbl_item.id = tbl_stockin.id_item');
		$this->db->join('tbl_supplier','tbl_supplier.id = tbl_stockin.id_supplier');
		$this->db->join('tbl_user','tbl_user.id = tbl_stockin.id_user');

		$result = $this->db->get();
		return $result->result_array();
		// $result = $this->db->get('tbl_stockin');
		// return $result->result_array();
	}

	public function tambah_data($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

	public function hapus_data($tbl,$id){
		$result = $this->db->delete($tbl,$id);
		return $result;
	}

}
