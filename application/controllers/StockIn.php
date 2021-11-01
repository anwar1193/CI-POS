<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockIn extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_item','m_supplier','m_user','m_stockIn'));
		$this->load->library('form_validation');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$data = $this->m_stockIn->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_stockIn',array('result'=>$data));
		$this->load->view('footer');
	}

	public function tambah_data(){
		$data_item = $this->m_item->tampil_data();
		$data_supl = $this->m_supplier->tampil_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_stockIn',array('result_item' => $data_item, 'result_supl' => $data_supl));
		$this->load->view('footer');

	}

	public function simpan_data(){
		$result = $this->m_stockIn->tambah_data('tbl_stockin',array(
			'id_item' => $this->input->post('id_item'),
			'type' 	  => 'in',
			'detail'  => $this->input->post('detail'),
			'id_supplier' => $this->input->post('supplier'),
			'qty'=> $this->input->post('qty'),
			'date' => $this->input->post('date'),
			'id_user' => $this->tampil_user->user_login()->id
		));

		if($result>0){
			$stok_tambahan = $this->input->post('qty');
			$id_item = $this->input->post('id_item');

			// Update tbl_item (tambah stok)
			$q_update = "UPDATE tbl_item SET stok=stok+'$stok_tambahan' WHERE id='$id_item'";
			$this->db->query($q_update);


			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Data Stok Berhasil Ditambahkan
				</div>
			');

			redirect('stockIn/index');
		}
	}

	public function hapus_data($id,$id_item,$qty){
		// Kurangi stok di item
		$q_update = "UPDATE tbl_item SET stok=stok-'$qty' WHERE id='$id_item'";
			$this->db->query($q_update);

		$result = $this->m_stockIn->hapus_data('tbl_stockin',array('id'=>$id));
		if($result>0){
			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Data Stok In Berhasil Dihapus
				</div>
			');
			redirect('stockIn/index');
		}
	}

}
