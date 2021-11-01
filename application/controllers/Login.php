<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		sudah_login();
		$this->load->view('v_login');
		
	}

	public function proses(){
		$post = $this->input->post(null, TRUE);
		if(isset($post['submit'])){
			$query = $this->m_login->proses($post);
			if($query->num_rows()>0){
				$row = $query->row();
				$params = array(
					'id' => $row->id,
					'level' => $row->level,
					'nama_lengkap' => $row->nama_lengkap
				);
				$this->session->set_userdata($params);
				$this->session->set_flashdata('pesan_sukses', '
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Login Sukses!</strong> Selamat Datang di AnP-Kasir
					</div>
				');
				redirect('dashboard/index');
			}else{
				$this->session->set_flashdata('pesan_error', '
					<div class="alert alert-danger alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Gagal Login!</strong> Kombinasi Usename dan Password Salah
					</div>
				');
				redirect('login/index');
			}
		}
	}

	public function sign_out(){
		$params = array('id', 'level', 'nama_lengkap');
		$this->session->unset_userdata($params);
		redirect('login/index');
	}
}
