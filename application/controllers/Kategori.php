<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_kategori');
	}

	public function index()
	{
		$data = $this->m_kategori->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_kategori',array('result' => $data));
		$this->load->view('footer');
	}

	public function tambah_data(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'required');
		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong !');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_tambah_kategori');
			$this->load->view('footer');
		}else{
			$result = $this->m_kategori->tambah_data('tbl_kategori',array('nama' => $this->input->post('nama')));
			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Simpan Data Berhasil
					</div>
				');

				redirect('kategori/index');
			}
		}
		
	}

	public function hapus_data($id){
		$result = $this->m_kategori->hapus_data('tbl_kategori',array('id' => $id));
		if($result>0){
			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Hapus Data Berhasil
				</div>
			');

			redirect('kategori/index');
		}
	} 

	public function edit_data($id){
		$data = $this->m_kategori->edit_data('tbl_kategori',array('id' => $id));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama Kategori', 'required');
		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong !');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_edit_kategori',array('row'=>$data));
			$this->load->view('footer');
		}else{
			
			$result = $this->m_kategori->update_data('tbl_kategori',array(
				'nama'=>$this->input->post('nama')
			),array('id' => $id));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Update Data Berhasil
					</div>
				');

				redirect('kategori/index');
			}
		}

		
	}
}
