<?php
class Menu extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('online') ===TRUE){
			
			if ($this->session->userdata('status') === "Admin") {
        	}else{
        		$url=base_url('entry-penjualan');
            	redirect($url);
        	}
        };

		$this->load->model('m_menu');
		$this->load->model('m_order');
		$this->load->model('m_pelanggan');
		$this->load->model('m_kategori');
		$this->load->model('m_diskon');
		$this->load->library('upload');
	}


	function index(){

		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 	=> 'Page Menu',
					'title' 	=> 'Barang siapa yang Sholat Dhuha 12 Rakaat maka ia akan dibuatkan istana di surga!',
					'member' 	=> $this->m_pelanggan->get_pelanggan_login($kode),
					'data'	    => $this->m_menu->all(),
					'limit'	    => $this->m_menu->get_limit(),
					'limit_max'	=> $this->m_menu->get_limit_max(),
					'kat'		=> $this->m_kategori->get(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'diskon'	=> $this->m_diskon->expired_diskon()

				);
		$this->load->view('autoload/header',$x);
		$this->load->view('admin/v_produk');
		$this->load->view('autoload/footer');
	}

	function simpan(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/gambar'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '2048'; //maksimum besar file 2M
	            //$config['max_width']  = '1288'; //lebar maksimum 1288 px
	            //$config['max_height']  = '1000'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya
	            $config['overwrite'] = true;

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr 		=$this->upload->data();
	                        $gambar 	=$gbr['file_name'];
	                        $nama 		=str_replace("'", "", $this->input->post('nama'));
	                        $harga 		=str_replace("'", "", $this->input->post('harga'));
	                        $kategori 	=str_replace("'", "", $this->input->post('kategori_id'));
	                        $qty 		=str_replace("'", "", $this->input->post('qty'));
                            $get_query 	=$this->m_kategori->get_where($kategori);
                            $row 		=$get_query->row_array();
                            $kat_nama 	=$row['kategori_nama'];
	               			$this->m_menu->simpan_menu($nama,$harga,$kategori,$kat_nama,$qty,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil ditambahkan ke database.</div>');
	               			redirect('produk');

	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('produk');
	                }
	                 
	            }else{	
	                        $gambar 	="react.jpg";
	                        $nama 		=str_replace("'", "", $this->input->post('nama'));
	                        $harga 		=str_replace("'", "", $this->input->post('harga'));
	                        $kategori 	=str_replace("'", "", $this->input->post('kategori_id'));
	                        $qty 		=str_replace("'", "", $this->input->post('qty'));
                            $get_query 	=$this->m_kategori->get_where($kategori);
                            $row 		=$get_query->row_array();
                            $kat_nama 	=$row['kategori_nama'];
	               			$this->m_menu->simpan_menu($nama,$harga,$kategori,$kat_nama,$qty,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil ditambahkan ke database tanpa gambar.</div>');
	               			redirect('produk');

	            } 

	}

	function update(){
				$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
	            $config['upload_path'] = './assets/gambar'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['max_size'] = '2048'; //maksimum besar file 2M
	            //$config['max_width']  = '1288'; //lebar maksimum 1288 px
	            //$config['max_height']  = '1000'; //tinggi maksimu 1000 px
	            $config['file_name'] = $nmfile; //nama yang terupload nantinya
	            $config['overwrite'] = true;

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr 		=$this->upload->data();
	                        $gambar 	=$gbr['file_name'];
	                        $kode_menu 	=str_replace("'", "", $this->input->post('kode'));
	                        $nama 		=str_replace("'", "", $this->input->post('nama'));
	                        $harga 		=str_replace("'", "", $this->input->post('harga'));
	                        $kategori 	=str_replace("'", "", $this->input->post('kategori_id'));
	                        //kategori
                            $get_query 	=$this->m_kategori->get_where($kategori);
                            $row 		=$get_query->row_array();
                            $kat_nama 	=$row['kategori_nama'];
                            //get harga lama by id
                            $get_menu 	=$this->m_menu->get_menu_id($kode_menu);
                            $rows 		=$get_menu->row_array();
                            $harga_lama =$rows['menu_harga_baru'];

	               			$this->m_menu->update_menu_gambar($kode_menu,$nama,$harga_lama,$harga,$kategori,$kat_nama,$gambar);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               			redirect('produk');

	                }else{
	                    echo $this->session->set_flashdata('msg','<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu tidak dapat ditambahkan, file gambar yang Anda masukkan terlalu besar.</div>');
	                    redirect('produk');
	                }
	                 
	            }else{	

	                        $kode_menu 	=str_replace("'", "", $this->input->post('kode'));
	                        $nama 		=str_replace("'", "", $this->input->post('nama'));
	                        $harga 		=str_replace("'", "", $this->input->post('harga'));
	                        $kategori 	=str_replace("'", "", $this->input->post('kategori_id'));
	                        //kategori
                            $get_query 	=$this->m_kategori->get_where($kategori);
                            $row 		=$get_query->row_array();
                            $kat_nama 	=$row['kategori_nama'];
                            //get harga lama by id
                            $get_menu 	=$this->m_menu->get_menu_id($kode_menu);
                            $rows 		=$get_menu->row_array();
                            $harga_lama =$rows['menu_harga_baru'];
                            
	               			$this->m_menu->update_menu($kode_menu,$nama,$harga_lama,$harga,$kategori,$kat_nama);
	                    	echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil diupdate.</div>');
	               			redirect('produk');

	            } 

	}


	function update_menu_diskon(){
	    $kode_menu		= str_replace("'", "", $this->input->post('kode_menu'));
	    $kode_diskon	= str_replace("'", "", $this->input->post('kode_diskon'));
        $get_query  	= $this->m_diskon->get_diskon_id($kode_diskon);

        $a 				= $get_query->row_array();
        $nama_diskon	= $a['nama_diskon'];
        $a_diskon		= $a['a_diskon'];
     		$this->m_menu->update_menu_diskon($kode_menu,$kode_diskon,$nama_diskon,$a_diskon);
     		if (empty($nama_diskon)) {
	           echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu dengan kode <b>'.$kode_menu.'</b>, Diskon Berhasil dihapus.</div>');
	           redirect('produk');
     		}else{
	           echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu dengan kode <b>'.$kode_menu.'</b> Berhasil ditambahkan <b>'.$nama_diskon.'</b> .</div>');
	           redirect('produk');
	       }
	}

	function hapus_menu(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_menu->hapus_menu($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('produk');
	}

	function update_menu_qty(){
	    $kode_menu		= str_replace("'", "", $this->input->post('kode_menu'));
	    $in_qty			= str_replace("'", "", $this->input->post('in_qty'));
        $get_query  	= $this->m_menu->get_menu_id($kode_menu);

        $a 				= $get_query->row_array();
        $nama 		 	= $a['menu_nama'];
        $awal_qty		= $a['menu_qty'];
        $add_qty		= $in_qty+$awal_qty;
     		$this->m_menu->update_menu_qty($kode_menu,$add_qty);
	           echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Menu <b>'.$nama.'</b> Berhasil ditambahkan qty.</div>');
	           redirect('produk');    
	}

}