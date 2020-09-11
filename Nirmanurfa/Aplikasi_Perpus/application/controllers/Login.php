<?php

class Login extends CI_Controller{

	function__construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
		);
		$cek = $this->m_login->cek_login("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama'=> $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect('admin/index');

		}else{
			echo "username dan password salah !";
		}
	}
	function logout(){
		$this->session->session_destroy();
		redirect(base_url('Login'));
	}
}