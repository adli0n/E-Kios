<?php
class Diskon extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') ===TRUE){
			
			if ($this->session->userdata('status') === "Admin") {
        	}else{
        		$url=base_url('entry-penjualan');
            	redirect($url);
        	}
        };
		$this->load->model('m_diskon');
		$this->load->model('m_menu');
		$this->load->model('m_pelanggan');
		$this->load->model('m_order');
	}
	function index(){
		
		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 		=> 'Page Diskon',
					'title' 		=> 'Allah tidak pernah ragu untuk menaikan drajat manusia',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	   		=> $this->m_menu->all(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'diskon'		=> $this->m_diskon->expired_diskon()
				);


		$this->load->view('autoload/header',$x);
		$this->load->view('admin/v_diskon');
		$this->load->view('autoload/footer');
	}
	
	function simpan(){

    $nama_diskon=strip_tags(str_replace("'", "", $this->input->post('nama')));
    $a_diskon=strip_tags(str_replace("'", "", $this->input->post('a_diskon')));
    $tgl_mulai=strip_tags(str_replace("'", "", $this->input->post('mulai_diskon')));
    $tgl_exp=strip_tags(str_replace("'", "", $this->input->post('exp_diskon')));
	$this->m_diskon->add_diskon($nama_diskon,$a_diskon,$tgl_mulai,$tgl_exp);
	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data <b>'.$nama_diskon.'</b> Berhasil ditambahkan.</div>');
    redirect('view-diskon');
	}
	function update(){

    $kode_diskon=$this->input->post('kode');
    $nama_diskon=strip_tags(str_replace("'", "", $this->input->post('nama')));
    $a_diskon=strip_tags(str_replace("'", "", $this->input->post('a_diskon')));
    $tgl_mulai=strip_tags(str_replace("'", "", $this->input->post('mulai_diskon')));
    $tgl_exp=strip_tags(str_replace("'", "", $this->input->post('exp_diskon')));
	$this->m_diskon->upd_diskon($kode_diskon,$nama_diskon,$a_diskon,$tgl_mulai,$tgl_exp);
	$this->db->query("UPDATE tbl_menu SET menu_nama_diskon='$nama_diskon', menu_a_diskon='$a_diskon' where menu_id_diskon='$kode_diskon' ");
	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data <b>'.$nama_diskon.'</b> Berhasil diupdate.</div>');
    redirect('view-diskon');
	}

	function hapus(){
		$kode_diskon=$this->input->post('kode');
		$nama=$this->input->post('nama');
        $this->m_diskon->upd_expired_diskon($kode_diskon);
		$this->m_diskon->dell_diskon($kode_diskon);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('view-diskon');
	}

	function exp(){

			$kode_diskon=$this->input->post('kode');
			$diskon = $this->m_diskon->expired_diskon();
            foreach ($diskon->result_array() as $row){
            $this->m_diskon->upd_expired_diskon($kode_diskon);
            $this->m_diskon->dell_expired_diskon($kode_diskon);
			} 
  			echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Beberapa diskon berhasil dihapus karena telah memasuki expired.</div>');
  			redirect('produk');
	
	}
	function exp_auto(){

			$diskon = $this->m_diskon->expired_diskon();
			$count = count($diskon)-1;
			if (empty($count)) {
				

			echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Tidak ada diskon yang memasuki Tanggal expired .</div>');
			redirect('view-diskon');
           

			}else{
				 foreach ($diskon->result_array() as $row){
            $this->db->query("UPDATE tbl_menu SET menu_id_diskon = 0, menu_nama_diskon='', menu_a_diskon=0 where menu_id_diskon='$row[diskon_id]' ");
            $this->db->query("DELETE FROM tbl_diskon where diskon_id ='$row[diskon_id]'");
        	}
			echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Beberapa diskon yang telah memasuki expired sudah berhasil dihapus.</div>');
			redirect('view-diskon');
		}
	}

}