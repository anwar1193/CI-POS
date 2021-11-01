<?php

function sudah_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id');
	if($user_session){
		redirect('dashboard/index');
	}
}

function belum_login(){
	$ci =& get_instance();
	$user_session = $ci->session->userdata('id');
	if(!$user_session){
		redirect('login/index');
	}
}

function cek_admin(){
	$ci =& get_instance();
	$ci->load->library('tampil_user');
	if($ci->tampil_user->user_login()->level != 'admin'){
		redirect('dashboard');
	}
}