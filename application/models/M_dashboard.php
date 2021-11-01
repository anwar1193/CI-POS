<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function jumlah_item(){
		$result = $this->db->get('tbl_item');
		return $result->num_rows();
	}

	public function jumlah_supplier(){
		$result = $this->db->get('tbl_supplier');
		return $result->num_rows();
	}

	public function jumlah_customer(){
		$result = $this->db->get('tbl_customer');
		return $result->num_rows();
	}

	public function jumlah_user(){
		$result = $this->db->get('tbl_user');
		return $result->num_rows();
	}

}
