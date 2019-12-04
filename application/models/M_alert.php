<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_alert extends CI_Model {

	public function success(){
		$this->session->set_flashdata('message', '
	<div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text">Success ! </span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>');
	}

	public function failed(){
		$this->session->set_flashdata('message', '
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text">Failure ! </span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>');	
	}

	public function alreadyExist(){
		$this->session->set_flashdata('message', '
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <span class="alert-icon"><i class="ni ni-like-2"></i></span>
          <span class="alert-text">Alerdy Exist ! </span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>');
	}

}
