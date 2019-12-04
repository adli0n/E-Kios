<?php
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') ===TRUE){
			
			if ($this->session->userdata('status') === "Admin") {
        	}else{
        		$url=base_url('entry-penjualan');
            	redirect($url);
        	}
        };
		$this->load->model('m_pelanggan');
		$this->load->model('m_order');
		$this->load->model('m_menu');
		$this->load->model('m_diskon');
	}

	function index(){

		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 		=> 'Dashboard',
					'kata_kata' 	=> 'asdasdasdasdasdasdsadsadsad',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	   		=> $this->m_menu->all(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'plg'			=> $this->m_pelanggan->get_all_pelanggan_terbaru(),
					'odr'			=> $this->m_order->get_all_order(),
					'statistik'		=> $this->m_order->get_grafik_penjualan(),
					'statistikplg'	=> $this->m_pelanggan->get_grafik_pelanggan(),
					'pen_now'		=> $this->m_order->get_total_penjualan_sekarang(),
					'pen_last'		=> $this->m_order->get_total_penjualan_bulan_lalu(),
					'pen_last_2'	=> $this->m_order->get_total_penjualan_bulan_lalu_2(),
					'tot_porsi'		=> $this->m_order->get_total_porsi_terjual_bulan_ini(),
					'tot_porsi_lalu'=> $this->m_order->get_total_porsi_terjual_bulan_lalu(),
					'tot_plg'		=> $this->m_order->get_tatal_pelanggan(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()
				);
		$this->load->view('autoload/header',$x);
		$this->load->view('admin/v_dashboard');
		$this->load->view('autoload/footer');
	}

}