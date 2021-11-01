<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('m_customer');
	}

	public function index()
	{
		$data = $this->m_customer->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_customer',array('result' => $data));
		$this->load->view('footer');
	}

	public function tambah_data(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('telepon', 'Nomor Telepon', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong !');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_tambah_customer');
			$this->load->view('footer');
		}else{
			$result = $this->m_customer->tambah_data('tbl_customer',array(
					'nama' => $this->input->post('nama'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'telepon' => $this->input->post('telepon'),
					'alamat' => $this->input->post('alamat')
			));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Simpan Data Berhasil
					</div>
				');
				redirect('customer/index');
			}
		}

		
	}

	public function hapus_data($id){
		$result = $this->m_customer->hapus_data('tbl_customer',array('id'=>$id));
		if($result>0){
			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Hapus Data Berhasil
				</div>
			');

			redirect('customer/index');
		}
	}

	public function edit_data($id){
		$data = $this->m_customer->edit_data('tbl_customer',array('id' => $id));

		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong !');
		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run() == FALSE){

			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_edit_customer',array('result' => $data));
			$this->load->view('footer');

		}else{

			$result = $this->m_customer->update_data('tbl_customer',array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'telepon' => $this->input->post('telepon'),
				'alamat' => $this->input->post('alamat')
			),array('id' => $id));

			if($result>0){
				$this->session->set_flashdata('pesan_sukses','
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Update Data Berhasil
					</div>
				');

				redirect('customer/index');
			}

		}


		
	}

}
