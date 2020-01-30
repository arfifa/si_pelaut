<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//cek login
		if ($this->session->userdata('status') != 'login') {
			redirect(base_url() . 'Login');
		}
	}

	public function index()
	{
		$data['judul'] = "Beranda";
		$this->load->view('member/header', $data);
		$this->load->view('member/v_beranda');
		$this->load->view('member/footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'Login?pesan=logout');
	}

	public function bookingLapangan()
	{

		$data['judul'] = "Booking Lapangan";
		$data['lapangan'] = $this->M_pelaut->get_data('lapangan')->result();
		$data['jadwal'] = $this->db->query("SELECT * FROM jadwal J, harga H WHERE J.id_harga = H.id_harga")->result();
		$data['user'] = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
		$data['keranjang'] = $this->M_pelaut->edit_data($where = array('id_member' => $data['user']['id_member']), 'keranjang_booking')->result();

		htmlspecialchars($id_lapangan = $this->input->post('id_lapangan', true));
		htmlspecialchars($tgl_booking = $this->input->post('tgl_booking', true));
		$this->form_validation->set_rules('id_lapangan', 'ID Lapangan', 'trim|required');
		$this->form_validation->set_rules('tgl_booking', 'Tanggal Booking', 'trim|required');

		if ($this->form_validation->run() == true) {
			$cari = array(
				'tgl_cari' => $tgl_booking,
				'id_lapangan' => $id_lapangan
			);

			$this->session->set_userdata($cari);
			redirect(base_url() . 'Member/bookingLapanganForm');
		}

		$this->load->view('member/header', $data);
		$this->load->view('member/v_bookingLapangan');
		$this->load->view('member/footer');
	}

	public function bookingLapanganForm()
	{

		$data['judul'] = "Booking Lapangan";
		$data['user'] = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
		$data['tgl_cari'] = $this->session->userdata('tgl_cari');
		$id_lapangan = $this->session->userdata('id_lapangan');
		$tgl_booking = $this->session->userdata('tgl_cari');
		$data['lapangan'] = $this->db->query("SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan' ")->row_array();
		$data['booking'] = $this->db->query("SELECT * FROM booking WHERE id_lapangan = '$id_lapangan' AND tgl_booking = '$tgl_booking' ")->result();
		$data['jadwal'] = $this->db->query("SELECT * FROM jadwal J, harga H WHERE J.id_harga = H.id_harga")->result();
		$data['keranjang'] = $this->M_pelaut->edit_data($where = array('id_member' => $data['user']['id_member']), 'keranjang_booking')->result();

		htmlspecialchars($id_lapangan = $this->input->post('id_lapangan', true));
		htmlspecialchars($tgl_booking = $this->input->post('tgl_booking', true));
		htmlspecialchars($id_jadwal = $this->input->post('id_jadwal', true));
		htmlspecialchars($jams = $this->input->post('jams', true));
		htmlspecialchars($nama_lapangan = $this->input->post('nama_lapangan', true));
		htmlspecialchars($harga = $this->input->post('harga', true));

		$this->form_validation->set_rules('id_lapangan', 'ID Lapangan', 'trim|required');
		$this->form_validation->set_rules('tgl_booking', 'Tanggal Booking', 'trim|required');

		if ($this->form_validation->run() == true) {

			if (isset($id_jadwal) && isset($jams)) {
				$data = array(
					'id_lapangan' => $id_lapangan,
					'id_member' => $data['user']['id_member'],
					'id_jadwal' => $id_jadwal,
					'nama_lapangan' => $nama_lapangan,
					'tgl_booking' => $tgl_booking,
					'jam' => $jams,
					'harga' => $harga
				);

				$periksa = $this->db->query("SELECT * FROM keranjang_booking WHERE id_lapangan = '$id_lapangan' AND id_jadwal = '$id_jadwal' AND tgl_booking = '$tgl_booking' ")->num_rows();
				if ($periksa == 0) {
					$this->M_pelaut->insert_data($data, 'keranjang_booking');
				}

				$data['judul'] = "Booking Lapangan";
				$data['user'] = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
				$data['tgl_cari'] = $this->session->userdata('tgl_cari');
				$data['lapangan'] = $this->db->query("SELECT * FROM lapangan WHERE id_lapangan = '$id_lapangan' ")->row_array();
				$data['booking'] = $this->db->query("SELECT * FROM booking WHERE id_lapangan = '$id_lapangan' AND tgl_booking = '$tgl_booking' ")->result();
				$data['jadwal'] = $this->db->query("SELECT * FROM jadwal J, harga H WHERE J.id_harga = H.id_harga")->result();
				$data['keranjang'] = $this->M_pelaut->edit_data($where = array('id_member' => $data['user']['id_member']), 'keranjang_booking')->result();

			}
		}

		$this->load->view('member/header', $data);
		$this->load->view('member/v_formBookingLapangan');
		$this->load->view('member/footer');

	}

	public function hapusBooking($id, $page)
	{
		$where = array('id_keranjang_booking' => $id);
		$this->M_pelaut->delete_data($where, 'keranjang_booking');
		if ($page == "1") {
			redirect(base_url() . 'Member/bookingLapangan');
		} else {
			redirect(base_url() . 'Member/bookingLapanganForm');
		}
	}

	public function myBooking()
	{
		$data['judul'] = "My Booking";
		$user = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
		$data['daftarBooking'] = $this->M_pelaut->edit_data($where = array('id_member' => $user['id_member']), 'booking')->result();

		$this->load->view('member/header', $data);
		$this->load->view('member/v_daftarBooking');
		$this->load->view('member/footer');
	}

	public function bookingAct()
	{
		$user = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
		$id_member = $user['id_member'];
		$keranjang = $this->db->query("SELECT * FROM keranjang_booking WHERE id_member = '$id_member' ")->result_array();

		$jumlahbooking = $this->db->query("SELECT * FROM keranjang_booking WHERE id_member = '$id_member' ")->num_rows();

		foreach ($keranjang as $k) {
			for ($i = 0; $i < $jumlahbooking; $i++) {
				$no_booking = $this->M_pelaut->nomor_booking();
				$data = array(
					'id_lapangan' => $k['id_lapangan'],
					'id_member' => $k['id_member'],
					'id_admin' => '0',
					'id_jadwal' => $k['id_jadwal'],
					'no_booking' => $no_booking,
					'nama' => $user['nama'],
					'nama_klub' => $user['nama_club'],
					'alamat' => $user['alamat'],
					'no_telpon' => $user['no_telp'],
					'tgl_booking' => $k['tgl_booking'],
					'jam' => $k['jam'],
					'harga' => $k['harga'],
					'dp' => 0,
					'sisa' => $k['harga'],
					'status' => 0
				);

			}

			$this->M_pelaut->insert_data($data, 'booking');
			$this->M_pelaut->delete_data($where = array('id_member' => $id_member), 'keranjang_booking');
		}

		$this->session->set_flashdata('berhasilBooking', 'Booking berhasil dilakukan. Silahkan lakukan tranfer biaya booking sesuai ketentuan dibawah ini.');
		redirect(base_url() . 'Member/myBooking');
	}

	function printBuktiBayar($id = 0)
	{
		$data['judul'] = "Cetak Bukti Pembayaran Booking";

		if ($id != 0) {
			$data['booking'] = $this->M_pelaut->edit_data($where = array('id_booking' => $id), 'booking')->result();
		} else {
			$user = $this->db->get_where('member', ['username' => $this->session->userdata('username')])->row_array();
			$id_member = $user['id_member'];
			$data['booking'] = $this->db->query("SELECT * FROM booking WHERE id_member = '$id_member' AND status = 1 ")->result();
		}

		$this->load->view('member/v_cetakBuktiBayar', $data);
	}
}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */