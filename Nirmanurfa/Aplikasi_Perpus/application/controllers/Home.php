<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
		$this->load->model('m_login');
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	public function aksi_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email'=> $email,
			'password'=> $password	
			 );
		$cek = $this->m_login->cek_login("tbl_pengurus",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);
			$this->session->set_userdata($data_session);

			redirect('admin/index');
		
		}else{
			echo"Username dan password salah !";
		}
	}

	private function set_session($user_data)
	{
		$this->load->model('tbl_calon_anggota', 'aplikasi_perpus');
		$this->session->set_userdata(
			'ID' -> $user_data->ID,
			'Email' -> $user_data->Email,
			'Password' ->$user_data->Password,
			'Nama_Lengkap' ->$user_data->Nama_Lengkap,
			'NIS' ->$user_data->NIS,
			'Kelas' ->$user_data->Kelas,
			'Jurusan' ->$user_data->Jurusan,
		);
		

	
	}
	public function login()
	{
		$this->load->view('login');
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}
	public function utama()
	{
		$this->load->view('home/index');
	}
}
