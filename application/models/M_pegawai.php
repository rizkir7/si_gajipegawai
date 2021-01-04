<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}	

	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->order_by('id_pegawai', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function jabatan()
	{
		$this->db->select('*');
		$this->db->from('tbl_jabatan');
		$this->db->order_by('id_jabatan', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_pegawai) {
		$this->db->select('*');
		$this->db->from('tbl_pegawai');
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->order_by('id_pegawai', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	public function buat_kode()
        {
            $this->db->select('RIGHT(pegawai.no_pegawai,2) as no_pegawai ',FALSE );
            $this->db->order_by('no_pegawai','DESC');
            $this->db->limit(1);
            $query = $this->db->get('pegawai');

            if ($query->num_rows() <> 0) {
                # code...
                $data = $query->row();
                $kode = intval($data->no_pegawai) + 1;
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
		$this->db->insert('tbl_pegawai',$data);
	}

	//Edit
	public function edit($data){
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->update('tbl_pegawai',$data);
	}

	//Delete
	public function delete($data){
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->delete('tbl_pegawai',$data);
	}


}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */