<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockOut extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_item','m_supplier','m_stockOut'));
		$this->load->library('tampil_user');

	}

	public function index()
	{
		$data = $this->m_stockOut->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_stockOut',array('result'=>$data));
		$this->load->view('footer');
	}

	public function tambah_data(){
		$data_item = $this->m_item->tampil_data();
		$data_supl = $this->m_supplier->tampil_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_tambah_stockOut',array('result_item'=>$data_item, 'result_supl'=>$data_supl));
		$this->load->view('footer');
	}

	public function simpan_data(){
		$result = $this->m_stockOut->simpan_data('tbl_stockout',array(
			'id_item' => $this->input->post('id_item'),
			'type' => 'out',
			'detail' => $this->input->post('detail'),
			'id_supplier' => $this->input->post('supplier'),
			'qty' => $this->input->post('qty'),
			'date' => $this->input->post('date'),
			'id_user' => $this->tampil_user->user_login()->id
		));

		if($result>0){
			$id_item = $this->input->post('id_item');
			$pengurangan = $this->input->post('qty');

			$q_update = "UPDATE tbl_item SET stok = stok-$pengurangan WHERE id=$id_item";
			$this->db->query($q_update);

			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Data Stok Out Berhasil Ditambahkan
				</div>
			');

			redirect('stockOut/index');
		}
	}
}
