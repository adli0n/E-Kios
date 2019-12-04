<?php
class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_menu');
		$this->load->model('m_order');
		$this->load->model('m_pelanggan');
		$this->load->model('m_diskon');
		$this->load->library('upload');

	}


	function index(){
		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 		=> 'Entry Penjualan',
					'title'			=> 'Semangat Dalam Berkeja adalah ibadah!',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'			=> $this->m_menu->all(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_home');
		$this->load->view('autoload/footer');
	}

	function hot_promo(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);
		$x = array(
					'judul' 	=> 'Entry Penjualan - Promo',
					'title'		=> 'Semangat Dalam Berkeja adalah ibadah!',
					'member' 	=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'		=> $this->m_menu->hot_promo(),
					'limit'	    => $this->m_menu->get_limit(),
					'limit_max'	=> $this->m_menu->get_limit_max(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_home');
		$this->load->view('autoload/footer');
	}

	function makanan(){
		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 		=> 'Entry Penjualan - Makanan',
					'title' 		=> 'Semangat Dalam Berkeja adalah ibadah!',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data'			=> $this->m_menu->makanan(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_home');
		$this->load->view('autoload/footer');
	}

	function minuman(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);

		$x = array(
					'judul' 		=> 'Entry Penjualan - Minuman',
					'title' 		=> 'Semangat Dalam Berkeja adalah ibadah!',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data'			=> $this->m_menu->minuman(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_home');
		$this->load->view('autoload/footer');
	}

	function diskon(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);

		$x = array(
					'judul' 		=> 'Entry Penjualan - Diskon',
					'title' 		=> 'Semangat Dalam Berkeja adalah ibadah!',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'data'			=> $this->m_menu->diskon(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_home');
		$this->load->view('autoload/footer');
	}

	function add_to_cart(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);

		$kode=$this->uri->segment(2);
		$produk=$this->m_menu->detail_menu($kode);
		$i=$produk->row_array();
        $diskon = $i['menu_a_diskon']/100*$i['menu_harga_baru'];
        $diskon_to = $i['menu_harga_baru']-$diskon;
        if (empty($i['menu_a_diskon'])) {
		$data = array(
               'id'               => $i['menu_id'],
               'qty'              => 1,
               'qty_awal'		  => $i['menu_qty'],
               'price'     	      => $i['menu_harga_baru'],
               'name'             => $i['menu_nama'],
               'image'	          => $i['menu_gambar'],
               'id_diskon'        => $i['menu_id_diskon'],
               'menu_nama_diskon' => $i['menu_nama_diskon'],
               'menu_a_diskon'	  => $i['menu_a_diskon']
               
            );
        }else{
        	$data = array(
               'id'               => $i['menu_id'],
               'qty'              => 1,
               'qty_awal'		  => $i['menu_qty'],
               'price_awal'       => $i['menu_harga_baru'],
               'price'            => $diskon_to,
               'name'             => $i['menu_nama'],
               'image'	          => $i['menu_gambar'],
               'id_diskon'        => $i['menu_id_diskon'],
               'menu_nama_diskon' => $i['menu_nama_diskon'],
               'menu_a_diskon'	  => $i['menu_a_diskon']
           );
        }

		$this->cart->insert($data); 
		redirect('entry-penjualan');
	}

	function cart(){
		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 		=> 'Keranjang Belanja',
					'title' 		=> 'Barang siapa yang meninggalkan sholat ashar maka akan hilang amal baik yang kita lakukan pada hari itu',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'			=> $this->m_menu->all(),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_cart');
		$this->load->view('autoload/footer');
	}

	function remove(){
		$row_id=$this->uri->segment(2);
		$this->cart->update(array(
               'rowid'   => $row_id,
               'qty'     => 0
            ));
		redirect('entry-penjualan');
	}
	function remove_link2(){
		$row_id=$this->uri->segment(2);
		$this->cart->update(array(
               'rowid'   => $row_id,
               'qty'     => 0
            ));
		redirect('keranjang-belanja');
	}
	
	function update(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);

		$this->cart->update($_POST);
        redirect('keranjang-belanja');
	}

	function check_out(){
		if($this->session->userdata('online') !=TRUE){
	            $url=base_url('login');
	            redirect($url);
            }else{
            	$no_invoice=$this->m_order->get_invoice();
				$total=$this->cart->total();

                $bayar=strip_tags(str_replace("'", "", $this->input->post('inv_bayar')));
				$this->session->set_userdata('no_invoice',$no_invoice);
				$order_proses=$this->m_order->order_produk($no_invoice,$total);
				$kembali = $bayar-$total;
				$no_invoice=$this->session->userdata('no_invoice');
				$this->m_order->set_pembayaran($no_invoice,$bayar,$kembali);
				if($order_proses){
					$this->cart->destroy();
					redirect('view_invoice');
				}else{
					redirect('keranjang-belanja');
				}
            }
		
	}

	function view_invoice(){
		$kode=$this->session->userdata('kopel');
		$no_invoice=$this->session->userdata('no_invoice');
		$x = array(
					'judul' 		=> 'Faktur Penjualan',
					'title' 		=> 'asdasdasdasdasdasdsadsadsad',
					'member' 		=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'			=> $this->m_menu->all(),
					'data_invoice'	=> $this->m_order->get_checkout($no_invoice),
					'limit'	    	=> $this->m_menu->get_limit(),
					'limit_max'		=> $this->m_menu->get_limit_max(),
					'no_diskon'		=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'	=> $this->m_diskon->get_diskon(),
					'diskon'		=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('member/v_status_order');
		$this->load->view('autoload/footer');
	}

	function cetak_invoice(){
		$kode=$this->session->userdata('kopel');
		$x['member']=$this->m_pelanggan->get_pelanggan_login($kode);

		$no_invoice=$this->input->post('no_invoice');
		$x['data']=$this->m_order->get_checkout($no_invoice);
		$x['judul']="Faktur Penjualan - $no_invoice";
		$x['title']="Lorem ipsum dolor sit amet";
		$this->load->view('autoload/no-header',$x);
		$this->load->view('member/v_print');
		$this->load->view('autoload/no-footer');
	}


}