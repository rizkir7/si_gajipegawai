<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_gaji extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

	public function listing() {
		$this->db->select('tbl_gaji_pegawai.*,tbl_pegawai.nama_pegawai,tbl_gaji.gaji_pokok,tbl_gaji.uang_makan,tbl_gaji.tunjangan_jabatan,tbl_gaji.potongan_pph');
		$this->db->from('tbl_gaji_pegawai');
		$this->db->join('tbl_pegawai', 'tbl_gaji_pegawai.id_pegawai = tbl_pegawai.id_pegawai', 'left');
		// $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_pegawai.id_jabatan', 'left');
		// $this->db->join('tbl_jabatan', 'tbl_gaji.id_jabatan = tbl_jabatan.id_jabatan', 'left');
		$this->db->join('tbl_gaji', 'tbl_gaji_pegawai.id_gaji = tbl_gaji.id_gaji', 'left');
		$this->db->order_by('id_gaji_pegawai', 'DESC');
		$this->db->group_by('id_gaji_pegawai', 'DESC');	
		$query = $this->db->get();
		return $query->result();
	}

	public function tampil_tgl($tgl1, $tgl2){
		$this->db->select('tbl_gaji_pegawai.*,tbl_pegawai.nama_pegawai,tbl_gaji.gaji_pokok,tbl_gaji.uang_makan,tbl_gaji.tunjangan_jabatan,tbl_gaji.potongan_pph');
		$this->db->from('tbl_gaji_pegawai');
		$this->db->join('tbl_pegawai', 'tbl_gaji_pegawai.id_pegawai = tbl_pegawai.id_pegawai', 'left');
		// $this->db->join('tbl_jabatan', 'tbl_jabatan.id_jabatan = tbl_pegawai.id_jabatan', 'left');
		// $this->db->join('tbl_jabatan', 'tbl_gaji.id_jabatan = tbl_jabatan.id_jabatan', 'left');
		$this->db->join('tbl_gaji', 'tbl_gaji_pegawai.id_gaji = tbl_gaji.id_gaji', 'left');
		$this->db->where('tanggal_gajian >=', $tgl1);
		$this->db->where('tanggal_gajian <=', $tgl2);
		$this->db->order_by('id_gaji_pegawai', 'DESC');
		$this->db->group_by('id_gaji_pegawai', 'DESC');	
		$query = $this->db->get();
		return $query->result();
	}

	public function jabatan()
	{
		$this->db->select('*');
		$this->db->from('tbl_jabatan');
		$this->db->order_by('id_jabatan', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_gaji) {
		$this->db->select('*');
		$this->db->from('tbl_gaji');
		$this->db->where('id_gaji',$id_gaji);
		$this->db->order_by('id_gaji', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function buat_kode()
        {
            $this->db->select('RIGHT(gaji.no_gaji,2) as no_gaji ',FALSE );
            $this->db->order_by('no_gaji','DESC');
            $this->db->limit(1);
            $query = $this->db->get('gaji');

            if ($query->num_rows() <> 0) {
                # code...
                $data = $query->row();
                $kode = intval($data->no_gaji) + 1;
            }
            else {

                $kode  = 1; //cek jika  kode belum terdapat ditabel    

            }

            $kodemax= str_pad($kode,4,"0", STR_PAD_LEFT);
            $tahun = date('Y');
            $kodejadi= $tahun.$kodemax; //FORMAT kode
            return $kodejadi;    
        }


	//Tambah
	public function tambah($data) {
		$this->db->insert('tbl_gaji_pegawai',$data);
	}

	//Edit
	public function edit($data){
		$this->db->where('id_gaji', $data['id_gaji']);
		$this->db->update('tbl_gaji_pegawai',$data);
	}

	//Delete
	public function delete($data){
		$this->db->where('id_gaji_pegawai', $data['id_gaji_pegawai']);
		$this->db->delete('tbl_gaji_pegawai',$data);
	}


}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */