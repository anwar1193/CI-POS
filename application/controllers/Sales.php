<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper(array('batasi_helper','fungsi_helper'));
		$this->load->library('tampil_user');
		$this->load->model(array('M_Sales','M_customer','M_item'));
	}

	public function index()
	{
		belum_login();

		// Ambil Data Customer
		$res_cust = $this->M_customer->tampil_data();

		// Ambil Data Item
		$res_item = $this->M_item->tampil_data();

		// Ambil Data Cart
		$cart = $this->M_Sales->get_cart();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_sales',array(
			'row_cust' => $res_cust, 
			'invoice' => $this->M_Sales->no_invoice(),
			'rows_item' => $res_item,
			'cart'=> $cart
		));
		$this->load->view('footer');
	}

	public function proses(){
		$data = $this->input->post(null, TRUE); //ambil semua yang di post (AJAX)

		// Script Tambah Cart
		if(isset($_POST['add_cart'])){

			// Cek apakah barang yang sama sudah ada di cart
			$id_item = $this->input->post('id_item');
			$cek_cart = $this->M_Sales->get_cart(array('tbl_cart.id_item' => $id_item))->num_rows();

			if($cek_cart > 0){ //jika ada barang sama di cart
				$this->M_Sales->update_cart_qty($data);
			}else{ //jika tidak ada barang sama di cart
				$this->M_Sales->add_cart($data);
			}


			if($this->db->affected_rows() > 0){ //jika berhasil
				$params = array("success" => true);
			}else{
				$params = array("success" => false);
			}

			echo json_encode($params);
		}

		// Script Edit Cart
		if(isset($_POST['edit_cart'])){
			$this->M_Sales->edit_cart($data);
			if($this->db->affected_rows() > 0){
				$params = array("success" => true);
			}else{
				$params = array("success" => false);
			}
			echo json_encode($params);
		}

		// Script Simpan Sales
		if(isset($_POST['process_payment'])){
			$sale_id = $this->M_Sales->simpan_sale($data); // ambil dari fungsi insert_id
			$cart = $this->M_Sales->get_cart()->result(); //ambil data dari tbl_cart
			$data_cart = [];

			foreach($cart as $c => $data){
				array_push($data_cart, array( //array_push = tambah data ke $data_cart
					'sale_id' => $sale_id,
					'item_id' => $data->id_item,
					'price' => $data->harga,
					'qty' => $data->qty,
					'discount_item' => $data->discount,
					'total' => $data->total
				));
			}

			$this->M_Sales->simpan_sale_detail($data_cart);
			$this->M_Sales->hapus_cart(array('user' => $this->session->userdata('id')));

			if($this->db->affected_rows() > 0){ //jika berhasil
				$params = array("success" => true, 'sale_id'=>$sale_id);
			}else{
				$params = array("success" => false);
			}

			echo json_encode($params);

		}

	}

	function cart_data(){
		$cart = $this->M_Sales->get_cart();
		$data['cart'] = $cart;
		$this->load->view('cart_data', $data);
	}


	public function hapus_cart(){
		if(isset($_POST['cancel_payment'])){
			$this->M_Sales->hapus_cart(array('user' => $this->session->userdata('id')));
		}else{
			$cart_id = $this->input->post('cart_id');
			$this->M_Sales->hapus_cart(array('id_cart' => $cart_id));
		}
		

		if($this->db->affected_rows() > 0){
			$params = array("success" => true);
		}else{
			$params = array("success" => false);
		}
		
		echo json_encode($params);
	}


	// function cetak struk
	public function cetak($id){
		$data = array(
			'sale' => $this->M_Sales->get_sale($id)->row(),
			'sale_detail' => $this->M_Sales->get_sale_detail($id)->result(),
		);
		$this->load->view('struk', $data);
	}

}
