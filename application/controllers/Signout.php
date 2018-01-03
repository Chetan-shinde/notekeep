<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signout extends CI_Controller {

	public function index()
	{
		
		$this->session->unset_userdata('user_id');
		$this->session->sess_destroy();
		redirect(base_url()."home");
	}

}

/* End of file Signout.php */
/* Location: ./application/controllers/Signout.php */