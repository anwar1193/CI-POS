<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_supplier');
	}

	public function index()
	{
		$data = $this->m_supplier->tampil_data();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_supplier',array('result' => $data));
		$this->load->view('footer');
	}

	public function hapus_data($id){
		$result = $this->m_supplier->hapus_data('tbl_supplier',array('id' => $id));

		// Cek jika data mempunyai relasi
		$error = $this->db->error();
		if($error['code'] != 0){
			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Warning !</strong> Data Tidak Dapat Dihapus Karena Sudah Berelasi
				</div>
			');

				redirect('supplier/index');
		}else{
			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Hapus Data Berhasil
					</div>
				');

				redirect('supplier/index');
			}
		}

	}

	public function tambah_data(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('telepon', 'No Telepon', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong ');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_tambah_supplier');
			$this->load->view('footer');
		}else{
			$result = $this->m_supplier->tambah_data('tbl_supplier', array(
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'deskripsi' => $this->input->post('deskripsi')
			));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Simpan Data Berhasil
					</div>
				');

				redirect('supplier/index');
			}
		}

		
	}

	public function edit_data($id){
		$data = $this->m_supplier->edit_data('tbl_supplier',array('id'=>$id));
		

		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('telepon', 'No Telepon', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong ');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_edit_supplier',array('result'=>$data));
			$this->load->view('footer');
		}else{
			$result = $this->m_supplier->update_data('tbl_supplier',array(
				'nama' => $this->input->post('nama'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat'),
				'deskripsi' => $this->input->post('deskripsi')
			),array('id'=>$id));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Update Data Berhasil
					</div>
				');

				redirect('supplier/index');
			}
		}
	}

}
