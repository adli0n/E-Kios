<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
	public function index(){

        if($this->session->userdata('online') != false){
            $url=base_url().'dashboard';
            redirect($url);
        };
        $x['judul']="Login";
        $this->load->view('autoload/header',$x);
        $this->load->view('member/v_login');
        $this->load->view('autoload/footer');
	}
}
