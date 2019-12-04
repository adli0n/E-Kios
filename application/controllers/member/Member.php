<?php
class Member extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pelanggan');
        $this->load->model('m_menu');
        $this->load->model('m_diskon');
		$this->load->library('upload');
	}


	function index(){

        if($this->session->userdata('online') != false){
            $url=base_url().'dashboard';
            redirect($url);
        };
        $x['judul']="Login";
        $this->load->view('autoload/header',$x);
        $this->load->view('member/v_login');
        $this->load->view('autoload/footer');
	}

    public function apa(){
        echo "ini";
    }

    function profile(){
        if($this->session->userdata('online') !=TRUE){
            $url=base_url();
            redirect($url);
        };
        $kode=$this->session->userdata('kopel');
        $x = array(
                    'judul'         => 'Profile',
                    'title'         => 'Semangat Dalam Berkeja adalah ibadah!',
                    'member'        => $this->m_pelanggan->get_pelanggan_login($kode),
                    'data'          => $this->m_menu->all(),
                    'limit'         => $this->m_menu->get_limit(),
                    'limit_max'     => $this->m_menu->get_limit_max(),
                    'no_diskon'     => $this->m_menu->get_no_diskon(),
                    'diskon'        => $this->m_diskon->expired_diskon(),
                    'tbl_diskon'    => $this->m_diskon->get_diskon()

                );
        $this->load->view('autoload/header',$x);
        $this->load->view('member/v_profile');
        $this->load->view('autoload/footer');
    }

function update_no(){
                $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
                $config['upload_path'] = './assets/gambar'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = '20480'; //maksimum besar file 2M
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
                            $pass = md5($pass1);

                             if ($pass1 <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('profile');

                            }else{
                                $this->m_pelanggan->update_1($kode,$nama,$jenkel,$kontak,$email,$pass,$gambar);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil diupdate.</div>');
                                redirect('profile');
                            }

                    }else{
                        echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Data tidak dapat di simpan, file gambar yang Anda masukkan terlalu besar.</div>');
                        redirect('profile');
                    }
                     
                }else{      
                            $kode=strip_tags(str_replace("'", "", $this->input->post('kode')));
                            $nama=strip_tags(str_replace("'", "", $this->input->post('nama')));
                            $jenkel=strip_tags(str_replace("'", "", $this->input->post('jenkel')));
                            $kontak=strip_tags(str_replace("'", "", $this->input->post('kontak')));
                            $email=strip_tags(str_replace("'", "", $this->input->post('email')));
                            $pass1=strip_tags(str_replace("'", "", $this->input->post('pass')));
                            $pass2=strip_tags(str_replace("'", "", $this->input->post('pass2')));
                            $pass = md5($pass1);

                    if ($pass1 <> $pass2) {
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button>Password yang Anda masukan tidak sama.</div>');
                                redirect('profile');

                            }else{
                                $this->m_pelanggan->update_2($kode,$nama,$jenkel,$kontak,$email,$pass);
                                echo $this->session->set_flashdata('msg','<div class="alert alert-primary"><button type="button" class="close" data-dismiss="alert">&times;</button> Data <b>'.$nama.'</b> Berhasil diupdate.</div>');
                                redirect('profile');
                            }
            }

    }

	function auth(){
        $username=strip_tags(str_replace("'", "", $this->input->post('email')));
        $password=strip_tags(str_replace("'", "", $this->input->post('pass')));
        $u=$username;
        $p=$password;
        $cadmin=$this->m_pelanggan->cek_login($u,$p);
        if($cadmin->num_rows > 0){
         $this->session->set_userdata('online',true);
         $this->session->set_userdata('pengguna',$u);
         $this->session->set_userdata('hakakses',3);
         $xcadmin=$cadmin->row_array();
         $this->session->set_userdata('nama_pel',$xcadmin['plg_nama']); 
         $this->session->set_userdata('kopel',$xcadmin['plg_id']); 
        }else{
                $this->session->set_userdata('online',false);
        }
        
        if($this->session->userdata('online')==true){
            redirect('member/member/berhasillogin');
        }else{
            redirect('member/member/gagallogin');
        }
    }

    function auth_multi_2(){
        $username        = strip_tags(str_replace("'", "", $this->input->post('email')));
        $password        = strip_tags(str_replace("'", "", $this->input->post('pass')));
        $cek_admin       = $this->m_pelanggan->cek_admin($username, $password);
        $cek_kasir       = $this->m_pelanggan->cek_kasir($username, $password);

        if($cek_admin->num_rows() > 0){
            $row = $cek_admin->row_array();
            $userdata = array(
                                    'online'         => true,
                                    'pengguna'       => $username,
                                    'hakakses'       => 3,
                                    'status'         => $row['plg_level'],
                                    'nama_pel'       => $row['plg_nama'],
                                    'kopel'          => $row['plg_id']
                                );
            $this->session->set_userdata($userdata);
        }else if($cek_kasir->num_rows() > 0){
            $row = $cek_kasir->row_array();
            $userdata = array(
                                    'online'         => true,
                                    'pengguna'       => $username,
                                    'hakakses'       => 3,
                                    'status'         => $row['plg_level'],
                                    'nama_pel'       => $row['plg_nama'],
                                    'kopel'          => $row['plg_id']
                                );
            $this->session->set_userdata($userdata);
        }else{
            $this->session->set_userdata('online',false);
        }
        
        if($this->session->userdata('online')==true){
            redirect('member/member/berhasillogin');
        }else{
            redirect('member/member/gagallogin');
        }
    }


    function berhasillogin(){
            if(empty($this->cart->total_items())){
                $kopel=$this->session->userdata('kopel');
                $this->db->query("update tbl_pelanggan set plg_status='1' where plg_id='$kopel'");
                if ($this->session->userdata('status') === "Admin") {
                $url=base_url('dashboard');
                redirect($url);
            }else{
                $url=base_url('entry-penjualan');
                redirect($url);
            }
            }else{
                redirect('dashboard');
            }
            
    }

    function gagallogin(){
            $url=base_url('login');
            echo $this->session->set_flashdata('msg','Email atau Password yang anda masukan salah!');
            redirect($url);
    }
    
    function logout(){
            $kopel=$this->session->userdata('kopel');
            $this->db->query("update tbl_pelanggan set plg_status='0' where plg_id='$kopel'");
            $this->session->sess_destroy();
            $url=base_url('');
            redirect($url);
    }


}