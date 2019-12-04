<?php
class History
 extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_order');
		$this->load->model('m_menu');
		$this->load->model('m_diskon');
		$this->load->library('upload');
	}

	function index(){
		$kode=$this->session->userdata('kopel');
		if ($this->session->userdata('status') === "Admin") {
			$x = array(
					'judul' 		=> 'Page Riwayat Transaksi Penjualan',
					'title' 		=> 'Percayalah allah selalu mendengar Do`a kita',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	   		=> $this->m_menu->all(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data_his' 		=> $this->m_order->get_all_histori(),
					'diskon'		=> $this->m_diskon->expired_diskon()
				);
            
        }else{
		$x = array(
					'judul' 		=> 'Page Riwayat Transaksi Penjualan',
					'title' 		=> 'Percayalah allah selalu mendengar Do`a kita',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	   		=> $this->m_menu->all(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data_his' 		=> $this->m_order->get_histori($kode),
					'diskon'		=> $this->m_diskon->expired_diskon()
				);
	}
		$this->load->view('autoload/header',$x);
		$this->load->view('admin/v_history_penjualan');
		$this->load->view('autoload/footer');
	}

	function detail(){
		$kode=$this->session->userdata('kopel');
		$no_invoice=$this->input->post('no_invoice');
		$x = array(
					'judul' 		=> 'Detail transaksi',
					'title' 		=> 'Ga perlu Bayar, Untuk berubah menjadi baik.',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	   		=> $this->m_menu->all(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data_invoice' 	=> $this->m_order->get_checkout($no_invoice),
					'diskon'		=> $this->m_diskon->expired_diskon()
				);

		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_status_order');
		$this->load->view('autoload/footer');
	}
}