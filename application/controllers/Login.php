<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required',
		array('required' => '%s Harus diisi'));

		$this->form_validation->set_rules('password', 'Password', 'required',
		array('required' => '%s Harus diisi'));

		if ($this->form_validation->run() == FALSE) {
			$data = array('title' => 'Login User');
			$this->load->view('v_login', $data, FALSE);
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$check_login = $this->m_user->login($username,$password);

			if ($check_login) {
				$username  		= $check_login->username;

				$this->session->set_userdata('username', $username);

				redirect(base_url('admin/dasbor'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Username dan Password salah');
				redirect(base_url('login'),'refresh');
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('username');		
		$this->session->set_flashdata('sukses', 'Anda berhasil logout');		
		redirect(base_url('login'),'refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */