<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_auth');
	}

    public function auth_multi()
    {
        $username        = strip_tags(str_replace("'", "", $this->input->post('email')));
        $pra_password    = strip_tags(str_replace("'", "", $this->input->post('pass')));
        $password 		 = md5($pra_password);

        $check_admin     = $this->m_auth->is_admin($username, $password);
        $check_casier    = $this->m_auth->is_casier($username, $password);

        if($check_admin->num_rows() > 0){
            $row = $check_admin->row_array();
            $userdata = array(
                                    'online'        => true,
                                    'email'      	=> $username,
                                    'hak_access'    => 3,
                                    'level'         => $row['level_users'],
                                    'name'       	=> $row['name_users'],
                                    'id_users'      => $row['id_users']
                                );
            $this->session->set_userdata($userdata);
        }else if($check_casier->num_rows() > 0){
            $row = $check_casier->row_array();
            $userdata = array(
                                    'online'     	=> true,
                                    'email'     	=> $username,
                                    'hak_access'    => 2,
                                    'level'         => $row['level_users'],
                                    'name'       	=> $row['name_users'],
                                    'id_users'      => $row['id_users']
                                );
            $this->session->set_userdata($userdata);
        }else{
            $this->session->set_userdata('online',false);
        }
        
        if($this->session->userdata('online') == true){
            redirect('true-login');
        }else{
            redirect('false-login');
        }
    }

    public function true_login()
    {
    	$users_id = $this->session->userdata('id_users');
    	$this->m_auth->set_status($users_id);

    	if($this->session->userdata('level' == "admin")){
    		redirect(site_url('my-product'));
    	}else{
    		redirect(site_url('entry-penjualan'));
    	}
    }

    public function false_login(){
            $url=base_url();
            echo $this->session->set_flashdata('msg','Email atau Password yang anda masukan salah!');
            redirect($url);
    }
    
    public function logout(){
            $kopel=$this->session->userdata('id_users');
    		$this->m_auth->reset_status($users_id);
            $this->session->sess_destroy();
            $url=base_url('');
            redirect($url);
    }



}