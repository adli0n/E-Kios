<?php
class Pengguna extends CI_Controller{
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
		$this->load->library('upload');
		$this->load->model('m_menu');
		$this->load->model('m_diskon');
	}


	function index(){
		$kode=$this->session->userdata('kopel');
		$x = array(
					'judul' 	=> 'Page Pengguna',
					'title'     => 'Pergunakanlah nyawamu dengan baik',
					'member' 	=> $this->m_pelanggan->get_pelanggan_login($kode),
					'limit'	    => $this->m_menu->get_limit(),
					'limit_max'	=> $this->m_menu->get_limit_max(),
					'no_diskon'	=> $this->m_menu->get_no_diskon(),
					'tbl_diskon'=> $this->m_diskon->get_diskon(),
					'tbl_pe'	=> $this->m_pelanggan->get_all(),
					'diskon'	=> $this->m_diskon->expired_diskon(),
					'data'	    => $this->m_menu->all()

				);


		$this->load->view('autoload/header',$x);
		$this->load->view('admin/v_pengguna');
		$this->load->view('autoload/footer');
	}

	function hapus(){
		$kode=$this->input->post('kode');
		$nama=$this->input->post('nama');
		$this->m_pelanggan->hapus_pelanggan($kode);
	    echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Pengguna <b>'.$nama.'</b> Berhasil dihapus dari database.</div>');
	    redirect('pengguna');
	}


	 function simpan_pelanggan(){
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
                            $gbr = $this->upload->data();
                            $gambar=$gbr['file_name'];
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $pass=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));

                             if ($pass <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('pengguna');

                            }else{
                                $this->m_pelanggan->simpan_pelanggan_dengan_gambar($nama,$jenkel,$kontak,$email,$pass,$gambar);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil ditambahkan.</div>');
                                redirect('pengguna');
                            }

                    }else{
                        echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data tidak dapat di simpan, file gambar yang Anda masukkan terlalu besar.</div>');
                        redirect('pengguna');
                    }
                     
                }else{      $gambar = "react.jpg";
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $pass=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                    if ($pass <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('pengguna');

                            }else{
                                $this->m_pelanggan->simpan_pelanggan_dengan_gambar($nama,$jenkel,$kontak,$email,$pass,$gambar);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil ditambahkan tanpa gambar.</div>');
                                redirect('pengguna');
                            }
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
                            $gbr = $this->upload->data();
                            $gambar=$gbr['file_name'];
                            $kode=strip_tags(str_replace("'", "", $this->input->post('kode')));
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $pass1=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                            $level=strip_tags(str_replace("'", "", $this->input->post('level')));
                            $pass = md5($pass1);

                             if ($pass1 <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('pengguna');

                            }else{
                                $this->m_pelanggan->update_pelanggan_dengan_gambar($kode,$nama,$jenkel,$kontak,$email,$pass,$gambar,$level);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil diupdate.</div>');
                                redirect('pengguna');
                            }

                    }else{
                        echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data tidak dapat di simpan, file gambar yang Anda masukkan terlalu besar.</div>');
                        redirect('pengguna');
                    }
                     
                }else{      
                            $kode=strip_tags(str_replace("'", "", $this->input->post('kode')));
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $pass1=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                            $level=strip_tags(str_replace("'", "", $this->input->post('level')));
                            $pass = md5($pass1);

                    if ($pass1 <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('pengguna');

                            }else{
                                $this->m_pelanggan->update_pelanggan_tanpa_gambar($kode,$nama,$jenkel,$kontak,$email,$pass,$level);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil diupdate.</div>');
                                redirect('pengguna');
                            }
            }

    }
     

}