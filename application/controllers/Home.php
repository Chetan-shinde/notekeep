<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

   public function __construct()
   {
   	parent::__construct();
   	$this->load->library('form_validation');
   }
	public function index()
	{
		 

		$loginname = $this->input->post('username');
		$password = $this->input->post('password');
		$wherearray = array('user_email'=>$loginname,'user_password'=>$password);
        $admindata = $this->Dbcommon->getdata('tbl_users',$wherearray);

        $this->form_validation->set_rules('username', 'Username', 'required|callback_validateuser['.count($admindata).']');

         $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run() == FALSE)
            {
                 $this->load->view('home');
            }
            else
            {
                
            	 $sessionarray =array('user_id'=>$admindata[0]->user_id);
            	 $this->session->set_userdata($sessionarray);
                 redirect(base_url().'view');
            }
	}

	public function validateuser($str,$count){
       if($count > 0){
          return true;
       }
       else{
       	$this->form_validation->set_message('validateuser', 'Invalid %s or Password');
       	return false;
       }
	}
    
   
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */