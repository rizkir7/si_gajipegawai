<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username' => $username,
								'password' => md5($password)));
		$query = $this->db->get();
		return $query->row();
	}

	public function listing() {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail($id_user) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah
	public function tambah($data) {
		$this->db->insert('tbl_user',$data);
	}

	//Edit
	public function edit($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user',$data);
	}

	//Delete
	public function delete($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tbl_user',$data);
	}

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */