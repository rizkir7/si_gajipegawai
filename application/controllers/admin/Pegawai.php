<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$data = array('title' => 'Halaman Pegawai',
					  'pegawai'	=> $this->m_pegawai->listing(),
					   'isi'  => 'admin/pegawai/list');	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{				
		$valid = $this->form_validation;

		$valid->set_rules('nama_pegawai','nama_pegawai','required',
				array(	'required'	 	=>	'Nama harus diisi')) ;

		if ($valid->run()===FALSE) {
		$data = array(		'title' 		=> 'Tambah Pegawai',
							'jabatan'		=> $this->m_pegawai->jabatan(),
							'isi' 			=> 'admin/pegawai/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
			$data = array(		'nik'				=>	$i->post('nik'),								
								'nama_pegawai'		=>	$i->post('nama_pegawai'),		
								'tanggal_masuk_kerja'=>  $i->post('tanggal_masuk_kerja'),	
								'tanggal_lahir'	=>  $i->post('tanggal_lahir'),
								'id_jabatan'	=>  $i->post('id_jabatan'),																						
								);
			$this->m_pegawai->tambah($data);
			$this->session->set_flashdata('sukses', ' Data telah ditambah');
			redirect(base_url('admin/pegawai'), 'refresh');
		}		
	} 

	//Delete
	public function delete($id_pegawai){
		//proteksi hapus disini
		//proteksi halaman
	 if($this->session->userdata('username')== ""){
	 $this->session->set_flashdata('sukses', 'Silahkan Login terlebih dulu');
	 redirect(base_url('login'),'refresh');
	 }
		//end proteksi
				
		$data = array('id_pegawai'		=> $id_pegawai);
		$this->m_pegawai->delete($data);
		$this->session->set_flashdata('terhapus', 'Data Pegawai telah dihapus');
		redirect(base_url('admin/pegawai'),'refresh');
	}

	public function edit($id_pegawai)
	{
		$pegawai = $this->m_pegawai->detail($id_pegawai);

		//validasi		
		$valid= $this->form_validation;
		$valid->set_rules('nama_pegawai','nama_pegawai','required',
				array(	'required'	 	=>	'Judul harus diisi')) ;

		if ($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title' 		=> 'Edit Pegawai : ' . $pegawai->nama_pegawai,
						'pegawai'			=> $pegawai,						
						'isi' 			=> 'admin/pegawai/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
				$data = array(	'id_pegawai'		=>  $id_pegawai,
								'nik'				=>	$i->post('nik'),								
								'nama_pegawai'		=>	$i->post('nama_pegawai'),		
								'tanggal_masuk_kerja'=>  $i->post('tanggal_masuk_kerja'),	
								'tanggal_lahir'	=>  $i->post('tanggal_lahir'),
								'id_jabatan'	=>  $i->post('id_jabatan')									
								);
			$this->m_pegawai->edit($data);
			$this->session->set_flashdata('sukses', ' Data telah diupdate');
			redirect(base_url('admin/pegawai'), 'refresh');
		}
		//End masuk database
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/admin/Pegawai.php */