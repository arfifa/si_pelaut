<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('username')) {
            redirect('Member');
        } 
	}

	public function index()
	{

		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = 'Halaman Login';
			$this->load->view('part/header', $data);
			$this->load->view('v_login');
			$this->load->view('part/footer');
		}else{
			$this->_login();
		}
		
	}

	private function _login()
	{
		htmlspecialchars($username = $this->input->post('username', TRUE) );
		$password = $this->input->post('password', TRUE);

		$check = $this->M_pelaut->edit_data(['username' => $username], 'member')->num_rows();
		$member = $this->M_pelaut->edit_data(['username' => $username], 'member')->row_array();

		if($check > 0){
			if(password_verify($password, $member['password'])){
			$data = [
				'username' => $member['username'],
				'nama'=> $member['nama'],
				'foto' => $member['foto'],
				'status'=> 'login'
			];

			$this->session->set_userdata($data);
			redirect( base_url().'Member');
			}else{
			$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Login Gagal. Password Salah!</div>');
			redirect(base_url().'Login');
			}
		}

		$check = $this->M_pelaut->edit_data(['username' => $username], 'admin')->num_rows();
		$admin = $this->M_pelaut->edit_data(['username' => $username], 'admin')->row_array();

		if($check > 0){
			if(password_verify($password, $member['password'])){
			$data = [
				'username' => $admin['username'],
				'nama'=> $admin['nama'],
			];

			$this->session->set_userdata($data);
			redirect( base_url().'Admin');	

			}else{
				$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Login Gagal. Password Salah!</div>');
				redirect(base_url().'Login');
			}
		}

		$this->session->set_flashdata('alert','<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
		redirect(base_url().'Login');

	}

	public function registrasiMember(){
		htmlspecialchars($nama = $this->input->post('nama', true));
		htmlspecialchars($nama_club = $this->input->post('nama_club', true));
		htmlspecialchars($email = $this->input->post('email', true));
		htmlspecialchars($alamat = $this->input->post('alamat', true));
		htmlspecialchars($tgl_lahir = $this->input->post('tgl_lahir', true));
		htmlspecialchars($no_telp = $this->input->post('no_telp', true));
		htmlspecialchars($username = $this->input->post('username', true));
		htmlspecialchars($password = $this->input->post('password', true));
		htmlspecialchars($password2 = $this->input->post('password2', true));

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nama_club', 'Nama Club', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|min_length[12]',[
			'min_length' => 'Alamat harus di isi lengkap.']);
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim|required|min_length[7]|numeric');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[member.username]',[
			'is_unique' => 'Username sudah ada mohon ganti nama username.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password2]',[
			'min_length' => 'Password minimal harus 6 karakter.',
			'matches' => 'password dan konfirmasi password tidak cocok.'
		]);
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required');


		if($this->form_validation->run() == False){
			$data['judul'] = 'Registrasi Member';
			$this->load->view('part/footer.php', $data);
			$this->load->view('v_registrasi');
			$this->load->view('part/header.php');
		}else{
			$data = array(
	        'username' => $username,
	        'password' => password_hash($password, PASSWORD_DEFAULT),
	        'nama' => $nama,
	        'nama_club' => $nama_club,
	        'email' => $email,
	        'tgl_lahir' => $tgl_lahir,
	        'no_telp' => $no_telp,
	        'alamat' => $alamat,
	        'foto' => 'default.png',
	        'date_created' => time()
      		);

      	$this->M_pelaut->insert_data($data, 'member');
      	$this->session->set_flashdata('pendaftaran', '<div class="alert alert-success" role="alert">
			Pendaftaran anda berhasil dilakukan. Silahkan Login dibawah ini!
			</div>');
      	redirect(base_url().'Login');
		}
		
	}

}
		

