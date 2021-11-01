<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_StockOut extends CI_Model {

	public function tampil_data(){
		$this->db->select('tbl_stockOut.*, tbl_item.nama_barang as nama_item, tbl_supplier.nama as nama_supplier, tbl_user.nama_lengkap as nama_user');
		$this->db->from('tbl_stockout');
		$this->db->join('tbl_item', 'tbl_item.id = tbl_stockout.id_item');
		$this->db->join('tbl_supplier', 'tbl_supplier.id = tbl_stockout.id_supplier');
		$this->db->join('tbl_user', 'tbl_user.id = tbl_stockout.id_user');

		$result = $this->db->get();
		return $result->result_array();
	}

	public function simpan_data($tbl,$data){
		$result = $this->db->insert($tbl,$data);
		return $result;
	}

}
