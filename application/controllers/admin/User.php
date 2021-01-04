<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user');
	}

	public function index()
	{
		$data = array('title' 	=> 'User',
					  'user'  	=> $this->m_user->listing(),
					  'isi' 	=> 'admin/user/list');
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{				
		$valid = $this->form_validation;

		$valid->set_rules('username','username','required',
				array(	'required'	 	=>	'Username harus diisi')) ;

		if ($valid->run()===FALSE) {
		$data = array(		'title' 		=> 'Tambah User',
							'isi' 			=> 'admin/user/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
			$data = array(		'username'				=>	$i->post('username'),								
								'password'		=>	md5($i->post('password')),
								);
			$this->m_user->tambah($data);
			$this->session->set_flashdata('sukses', ' Data telah ditambah');
			redirect(base_url('admin/user'), 'refresh');
		}		
	} 

	public function delete($id_user){
		//proteksi hapus disini
		//proteksi halaman
	 if($this->session->userdata('username')== ""){
	 $this->session->set_flashdata('sukses', 'Silahkan Login terlebih dulu');
	 redirect(base_url('login'),'refresh');
	 }
		//end proteksi
				
		$data = array('id_user'		=> $id_user);
		$this->m_user->delete($data);
		$this->session->set_flashdata('terhapus', 'Data Pegawai telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

	public function edit($id_user)
	{
		$user = $this->m_user->detail($id_user);

		//validasi		
		$valid= $this->form_validation;
		$valid->set_rules('username','username','required',
				array(	'required'	 	=>	'Judul harus diisi')) ;

		if ($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title' 		=> 'Edit User : ' . $user->username,
						'user'			=> $user,						
						'isi' 			=> 'admin/user/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
				$data = array(	'id_user'		=>  $id_user,
								'username'		=>	$i->post('username'),								
								'password'		=>	md5($i->post('password'))									
								);
			$this->m_user->edit($data);
			$this->session->set_flashdata('sukses', ' Data telah diupdate');
			redirect(base_url('admin/user'), 'refresh');
		}
		//End masuk database
	}

}
