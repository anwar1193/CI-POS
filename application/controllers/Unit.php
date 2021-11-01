<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_unit');
	}

	public function index()
	{
		$data = $this->m_unit->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_unit',array('result' => $data));
		$this->load->view('footer');
	}

	public function tambah_data(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama Unit','required');
		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong !');
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_tambah_unit');
			$this->load->view('footer');
		}else{
			$result = $this->m_unit->tambah_data('tbl_unit',array(
				'nama' => $this->input->post('nama')
			));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses', '
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Simpan Data Berhasil
					</div>
				');
				redirect('unit/index');
			}
		}
		
	}

	public function hapus_data($id){
		$result = $this->m_unit->hapus_data('tbl_unit',array('id'=>$id));
		if($result>0){
			$this->session->set_flashdata('pesan_sukses', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Hapus Data Berhasil
				</div>
			');
			redirect('unit/index');
		}
	}

	public function edit_data($id){
		$data = $this->m_unit->edit_data('tbl_unit',array('id'=>$id));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama','Nama Lengkap','required');
		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_edit_unit',array('result'=>$data));
			$this->load->view('footer');
		}else{
			$result = $this->m_unit->update_data('tbl_unit',array(
				'nama' => $this->input->post('nama')
			),array('id'=>$id));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Update Data Berhasil
					</div>
				');

				redirect('unit/index');
			}
		}

		
	}
}
