<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_gaji');
		$this->load->model('m_pegawai');
	}

	public function index()
	{
		$data = array('title' => 'Halaman Gaji',
					  'gaji'	=> $this->m_gaji->listing(),
					   'isi'  => 'admin/gaji/list');	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{				
		$valid = $this->form_validation;

		$valid->set_rules('id_pegawai','id_pegawai','required',
				array(	'required'	 	=>	'Nama harus diisi')) ;

		if ($valid->run()===FALSE) {
		$data = array(		'title' 		=> 'Tambah Gaji',
							'jabatan'		=> $this->m_gaji->jabatan(),
							'pegawai'	=> $this->m_pegawai->listing(),
							'isi' 			=> 'admin/gaji/tambah');
		$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
			$data = array(		'id_pegawai'				=>	$i->post('id_pegawai'),								
								'id_gaji'				=>	$i->post('id_gaji'),		
								'tanggal_gajian'		=>	$i->post('tanggal_gajian')												

								);
			$this->m_gaji->tambah($data);
			$this->session->set_flashdata('sukses', ' Data telah ditambah');
			redirect(base_url('admin/gaji'), 'refresh');
		}		
	} 

	public function laporancetakperiode()
	{
			
			$tgl1 = $this->input->post('tgl_a');
			$tgl2 = $this->input->post('tgl_b');				
			$pegawai = $this->m_gaji->tampil_tgl($tgl1, $tgl2);
			// $total = $this->m_gaji->total_tgl($tgl1, $tgl2);
			
			$data = array('title'		=> 'Laporan Inventaris',
						  'pegawai' 	=> $pegawai,
						  // 'total'		=> $total,
						  'tgl1'		=> date('d M Y', strtotime($tgl1)),
    					  'tgl2'		=> date('d M Y', strtotime($tgl2)));
			
			$this->load->view('admin/gaji/cetak_laporan_periode',$data);	
	}	

	//Delete
	public function delete($id_gaji){
		//proteksi hapus disini
		//proteksi halaman
	 if($this->session->userdata('username')== ""){
	 $this->session->set_flashdata('sukses', 'Silahkan Login terlebih dulu');
	 redirect(base_url('login'),'refresh');
	 }
		//end proteksi
				
		$data = array('id_gaji_pegawai'		=> $id_gaji);
		$this->m_gaji->delete($data);
		$this->session->set_flashdata('terhapus', 'Data Gaji telah dihapus');
		redirect(base_url('admin/gaji'),'refresh');
	}

	public function edit($id_gaji)
	{
		$gaji = $this->m_gaji->detail($id_gaji);

		//validasi		
		$valid= $this->form_validation;
		$valid->set_rules('nama_gaji','nama_gaji','required',
				array(	'required'	 	=>	'Judul harus diisi')) ;

		if ($valid->run()===FALSE) {
		//End Validasi

		$data = array(	'title' 		=> 'Edit Gaji : ' . $gaji->nama_gaji,
						'gaji'			=> $gaji,						
						'isi' 			=> 'admin/gaji/edit');
			$this->load->view('admin/layout/wrapper', $data, FALSE);	
		//Jika tidak error, maka masuk database
		}else{
			$i = $this->input;
				$data = array(	'id_gaji'		=>  $id_gaji,
								'nik'				=>	$i->post('nik'),								
								'nama_gaji'		=>	$i->post('nama_gaji'),		
								'tanggal_masuk_kerja'=>  $i->post('tanggal_masuk_kerja'),	
								'tanggal_lahir'	=>  $i->post('tanggal_lahir'),	
								'id_jabatan'	=>  $i->post('id_jabatan'),									
								);
			$this->m_gaji->edit($data);
			$this->session->set_flashdata('sukses', ' Data telah diupdate');
			redirect(base_url('admin/gaji'), 'refresh');
		}
		//End masuk database
	}

	function get_pegawai()
	{
		$id = $this->input->get('id_pegawai');
		$info = $this->db->select("tbl_pegawai.*,tbl_jabatan.nama_jabatan")
										 ->from("tbl_pegawai")
										 ->where("id_pegawai",$id)
										 ->join('tbl_jabatan','tbl_jabatan.id_jabatan = tbl_pegawai.id_jabatan','LEFT')
										 ->get()
										 ->row();
		echo json_encode($info);
										 
	}

}

/* End of file Gaji.php */
/* Location: ./application/controllers/admin/Gaji.php */