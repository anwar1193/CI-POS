<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('m_item','m_kategori','m_unit'));
		$this->load->library('form_validation');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$data = $this->m_item->tampil_data();
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_item',array('result'=>$data));
		$this->load->view('footer');
	}

	public function tambah_data(){

		$data_kategori = $this->m_kategori->tampil_data();
		$data_unit = $this->m_unit->tampil_data();

		$this->form_validation->set_rules('barcode','Barcode','required|is_unique[tbl_item.barcode]');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');

		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong');
		$this->form_validation->set_message('is_unique','{field} Sudah Ada di Sistem');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_tambah_item',array('res_kategori'=>$data_kategori, 'res_unit'=>$data_unit));
			$this->load->view('footer');
		}else{

			// Upload Gambar
			$config['upload_path']          = './uploads/product';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']			= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            if($_FILES['gambar']['name'] != null){
            	if($this->upload->do_upload('gambar')){

            		$_FILES['gambar'] = $this->upload->data('file_name');

            		$result = $this->m_item->tambah_data('tbl_item',array(
					'barcode' => $this->input->post('barcode'),
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('kategori'),
					'id_unit' => $this->input->post('unit'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok'),
					'gambar' => $_FILES['gambar']
					));

					if($result>0){

						$this->session->set_flashdata('pesan_sukses','
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Sukses !</strong> Simpan Data Berhasil
							</div>
						');
						redirect('item/index');

					}
            	}else{
            		$error = $this->upload->display_errors();
            		$this->session->set_flashdata('error', $error);
            		redirect('item/index');
            	}
            }else{
            	$_FILES['gambar'] = null;
            	$result = $this->m_item->tambah_data('tbl_item',array(
					'barcode' => $this->input->post('barcode'),
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('kategori'),
					'id_unit' => $this->input->post('unit'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok')
					));

					if($result>0){

						$this->session->set_flashdata('pesan_sukses','
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Sukses !</strong> Simpan Data Berhasil
							</div>
						');
						redirect('item/index');

					}
            }

		}

		
	}

	public function hapus_data($id){

		//ambil data untuk hapus gambar
		$data = $this->m_item->edit_data('tbl_item',array('id'=>$id));

		$result = $this->m_item->hapus_data('tbl_item',array('id'=>$id));

		if($result>0){

			// jika hapus data, gambar di folder juga dihapus
			foreach($data as $row){
				$gambar_lama = $row['gambar'];
    			$target_file = './uploads/product/'.$gambar_lama;
    			unlink($target_file);
			}

			$this->session->set_flashdata('pesan_sukses','
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Sukses !</strong> Hapus Data Berhasil
				</div>
			');
			redirect('item/index');
		}
	}

	public function edit_data($id){
		$data = $this->m_item->edit_data('tbl_item',array('id'=>$id));
		$data_kategori = $this->m_kategori->tampil_data();
		$data_unit = $this->m_unit->tampil_data();

		$this->form_validation->set_rules('barcode','Barcode','required');
		$this->form_validation->set_rules('nama_barang','Nama Barang','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		$this->form_validation->set_rules('unit','Unit','required');
		$this->form_validation->set_rules('harga','Harga','required');
		$this->form_validation->set_rules('stok','Stok','required');

		$this->form_validation->set_message('required','{field} Tidak Boleh Kosong');

		$this->form_validation->set_error_delimiters('<span class="help-block">','</span>');

		if($this->form_validation->run()==FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('v_edit_item',array('result'=>$data, 'res_kategori'=>$data_kategori, 'res_unit'=>$data_unit));
			$this->load->view('footer');
		}else{

			// Upload Gambar
			$config['upload_path']          = './uploads/product';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']			= 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);

            if($_FILES['gambar']['name'] != null){
            	if($this->upload->do_upload('gambar')){

            		$_FILES['gambar'] = $this->upload->data('file_name');

            		//jika gambar diganti, gambar lama akan ter-replace (di folder)
            		if($_FILES['gambar'] != null){
            			foreach($data as $row){
            				$gambar_lama = $row['gambar'];
	            			$target_file = './uploads/product/'.$gambar_lama;
	            			unlink($target_file);
            			}
            		}

            		$result = $this->m_item->update_data('tbl_item',array(
						'barcode' => $this->input->post('barcode'),
						'nama_barang' => $this->input->post('nama_barang'),
						'id_kategori' => $this->input->post('kategori'),
						'id_unit' => $this->input->post('unit'),
						'harga' => $this->input->post('harga'),
						'stok' => $this->input->post('stok'),
						'gambar' => $_FILES['gambar']
					),array('id'=>$id));

					if($result>0){
						$this->session->set_flashdata('pesan_sukses','
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Sukses !</strong> Update Data Berhasil
							</div>
						');
						redirect('item/index');
					}

            		
            	}else{
            		$error = $this->upload->display_errors();
            		$this->session->set_flashdata('error', $error);
            		redirect('item/index');
            	}
            }else{
            	$result = $this->m_item->update_data('tbl_item',array(
					'barcode' => $this->input->post('barcode'),
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('kategori'),
					'id_unit' => $this->input->post('unit'),
					'harga' => $this->input->post('harga'),
					'stok' => $this->input->post('stok')
				),array('id'=>$id));

				if($result>0){
					$this->session->set_flashdata('pesan_sukses','
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <strong>Sukses !</strong> Update Data Berhasil
						</div>
					');
					redirect('item/index');
				}
            }


			
		}
	}

	function barcode($id){
		$data = $this->m_item->tampil_id('tbl_item',array('id'=>$id));
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('v_item_barcode',array('result'=>$data));
		$this->load->view('footer');
	}

	function barcode_print($id){
		$this->load->library('lib_dompdf');

		$data = $this->m_item->tampil_id('tbl_item',array('id'=>$id));
		$html = $this->load->view('v_item_barcodePrint',array('result'=>$data),true);

		$this->lib_dompdf->pdfGenerator($html,'Barcode', 'A4', 'landscape');


	}
}
