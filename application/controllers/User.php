<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		//dari helper untuk cek login dan batasi hak aksses
		belum_login();
		cek_admin();
		$data = $this->m_user->tampil_user();

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_user',array('result' => $data));
		$this->load->view('footer');
	}

	public function tambah(){
		// Form Validation (Lihat Di Dokumentasi CI : library->form_validation)
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Usename', 'required|min_length[5]|is_unique[tbl_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('pass_conf', 'Password Konfirmasi', 'required|matches[password]');
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '{field} Tidak Boleh Kosong !!');
		$this->form_validation->set_message('min_length', '{field} Minimal 5 Karakter !!');
		$this->form_validation->set_message('is_unique', '{field} Sudah Ada Di Sistem !!');
		$this->form_validation->set_message('matches', '{field} dan Password Tidak Sama !!');

		// Membuat Pesan di Form Validation Berwarna Merah Saat Ada Error
		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('header');
				$this->load->view('sidebar');
				$this->load->view('v_tambah_user');
				$this->load->view('footer');
        }
        else //jika validasi sudah lewat, jalankan proses simpan
        {
               $result = $this->m_user->simpan_data('tbl_user',array(
               		'nama_lengkap' => $this->input->post('nama_lengkap'),
               		'username' => $this->input->post('username'),
               		'password' => sha1($this->input->post('password')),
               		'level' => $this->input->post('level')
               ));

               if($result > 0){
               		$this->session->set_flashdata('pesan_sukses', '<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Sukses !</strong> Simpan Data Berhasil
					</div>');	

					redirect('user/index');
               }
        }
	}

	public function hapus_data($id){
		$result = $this->m_user->hapus_data('tbl_user',array('id' => $id));
		if($result>0){
			$this->session->set_flashdata('pesan_sukses', '
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Hapus Data Berhasil
				</div>
			');
			redirect('user/index');
		}else{
			echo 'hapus gagal';
		}
	}

	public function edit_user($id){
		$data = $this->m_user->edit_user(array('id' => $id));

		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_edit_user',array('result' => $data));
		$this->load->view('footer');
	}

	public function update_user(){
		$result = $this->m_user->update_user('tbl_user',array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
			'level' => $this->input->post('level')
		),array('id' => $this->input->post('id')));

		if($result > 0){
			$this->session->set_flashdata('pesan_sukses', '
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Update Data Berhasil
				</div>
			');
			redirect('user/index');
		}
	}

}
