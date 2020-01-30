<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index(){
		if ($this->session->userdata('username')) {
            redirect('Member');
        }
		$data['judul'] = "Kirana Futsal";
		$this->load->view('beranda/header', $data);
		$this->load->view('beranda/v_beranda');
		$this->load->view('beranda/footer');
	}




}