<?php 
//proteksi halaman
if($this->session->userdata('username')== "" && $this->session->userdata('akses_level')== "" ){
	$this->session->set_flashdata('error', ' Silahkan login terlebih dulu');
	redirect(base_url('login'),'refresh');
}


//gabungkan semua bagian layout
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
?>