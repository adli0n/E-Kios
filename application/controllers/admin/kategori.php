<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') ===TRUE){
			
			if ($this->session->userdata('status') === "Admin") {
        	}else{
        		$url=base_url('entry-penjualan');
            	redirect($url);
        	}
        };
		$this->load->model('m_kategori');
	}

	function simpan_kategori(){
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->insert($kategori);
		echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil ditambahkan ke database.</div>');
	    redirect('produk');
	}

	function update_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->update($kode,$kategori);
		echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil diupdate.</div>');
	    redirect('produk');
	}
	function hapus_kategori(){
		$kode=$this->input->post('kode');
		$kategori=str_replace("'", "", $this->input->post('kategori'));
		$this->m_kategori->delete($kode);
		echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Kategori <b>'.$kategori.'</b> Berhasil dihapus.</div>');
	    redirect('produk');
	}


}