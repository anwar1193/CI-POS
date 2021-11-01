<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sales extends CI_Model {

	public function no_invoice(){
		$result = $this->db->query(
			"SELECT MAX(MID(invoice,9,4)) AS no_invoice
			 FROM tbl_sales
			 WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')"
		);

		if($result->num_rows() > 0){
			$row = $result->row_array();
			$n = ((int)$row['no_invoice'] + 1);
			$no = sprintf("%'.04d", $n);
		}else{
			$no = "0001";
		}
		date_default_timezone_set("Asia/Jakarta");
		$invoice = "TR".date('ymd').$no;
		return $invoice;
	}


	public function get_cart($params = null){
		$this->db->select('*, tbl_item.nama_barang as nama, tbl_cart.harga as harga_barang');
		$this->db->from('tbl_cart');
		$this->db->join('tbl_item', 'tbl_cart.id_item = tbl_item.id');

		if($params != null){
			$this->db->where($params);
		}

		$this->db->where('user', $this->session->userdata('id'));
		$query = $this->db->get();
		return $query;
	}


	public function add_cart($post){
		// buat counter untuk cart (jangan auto increment karena bakal sering dihapus)
		$q_count = $this->db->query("SELECT MAX(id_cart) AS no_cart FROM tbl_cart");
		
		if($q_count->num_rows() > 0){
			$row = $q_count->row();
			$cart_no = ((int)$row->no_cart) + 1;
		}else{
			$cart_no = "1";
		}

		$params = array(
			'id_cart' => $cart_no,
			'id_item' => $post['id_item'],
			'harga' => $post['harga'],
			'qty' => $post['qty'],
			'discount' => 0,
			'total' => ($post['harga'] * $post['qty']),
			'user' => $this->tampil_user->user_login()->id
		);

		$this->db->insert('tbl_cart', $params);
	}

	function update_cart_qty($post){
		$query = $this->db->query("UPDATE tbl_cart SET harga = '$post[harga]',
					qty = qty + '$post[qty]',
					total = '$post[harga]' * qty
					WHERE id_item = '$post[id_item]'");
		return $query;
	}

	public function hapus_cart($params = null){
		if($params != null){
			$this->db->where($params);
		}
		$this->db->delete('tbl_cart');
	}

	public function edit_cart($post){
		$params = array(
			'harga' => $post['harga'],
			'qty' => $post['qty'],
			'discount' => $post['discount'],
			'total' => $post['total']
		);
		$this->db->where('id_cart', $post['id_cart']);
		$this->db->update('tbl_cart', $params);
	}

	public function simpan_sale($post){
		$params = array(
			'invoice' => $this->no_invoice(),
			'id_customer' => $post['customer_id'] == "" ? null : $post['customer_id'], //kalo customer yg dipilih = umum (kosong), maka kembalikan nilai null
			'total_price' => $post['subtotal'],
			'discount' => $post['discount'],
			'final_price' => $post['grandtotal'],
			'cash' => $post['cash'],
			'remaining' => $post['change'],
			'note' => $post['note'],
			'date' => date('Y-m-d',strtotime($post['date'])),
			'id_user' => $this->session->userdata('id')
		);

		$this->db->insert('tbl_sales', $params);

		// mengembalikan/mengamblil nilai id yang terakhir diinput (dari query builder CI)
		return $this->db->insert_id();
	}

	public function simpan_sale_detail($params){
		//insert_batch = insert multiple/insert ke dua setelah proses simpan sebelumnya (simpan_sale) supaya bisa satu controller/perintah saja (baca di query builder CI)
		$this->db->insert_batch('tbl_sale_detail', $params);
	}


	public function get_sale($id = null){
		$this->db->select('*, tbl_customer.nama as nama_customer, tbl_user.nama_lengkap as nama_user, tbl_sales.created as created_sale');
		$this->db->from('tbl_sales');
		$this->db->join('tbl_customer', 'tbl_sales.id_customer = tbl_customer.id', 'left');
		$this->db->join('tbl_user', 'tbl_sales.id_user = tbl_user.id');
		
		if($id != null){
			$this->db->where('tbl_sales.id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

	public function get_sale_detail($sale_id = null){
		$this->db->from('tbl_sale_detail');
		$this->db->join('tbl_item', 'tbl_sale_detail.item_id = tbl_item.id');
		if($sale_id != null){
			$this->db->where('tbl_sale_detail.sale_id', $sale_id);
		}
		$query = $this->db->get();
		return $query;
	}


}
