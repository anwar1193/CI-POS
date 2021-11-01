<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_dashboard');
	}

	public function index()
	{
		belum_login();
		$res_jmlItem = $this->M_dashboard->jumlah_item();
		$res_jmlSupplier = $this->M_dashboard->jumlah_supplier();
		$res_jmlCustomer = $this->M_dashboard->jumlah_customer();
		$res_jmlUser = $this->M_dashboard->jumlah_user();

		$this->load->view('header');
		$this->load->view('sidebar');

		$this->load->view('v_dashboard',array(
			'jumlah_item' => $res_jmlItem,
			'jumlah_supplier' => $res_jmlSupplier,
			'jumlah_customer' => $res_jmlCustomer,
			'jumlah_user' => $res_jmlUser
		));

		$this->load->view('footer');
	}
}
