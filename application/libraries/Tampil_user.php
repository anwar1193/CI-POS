<?php

Class Tampil_user{
	protected $ci;

	function __construct(){
		$this->ci =& get_instance();
	}

	function user_login(){
		$this->ci->load->model('m_login');
		$id = $this->ci->session->userdata('id');
		$user_data = $this->ci->m_login->ambil_session($id)->row();
		return $user_data;
	}
}