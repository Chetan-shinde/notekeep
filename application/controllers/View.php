<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {

	public function index()
	{
		$taguniquearray = array();
		$wherearray = array('user_id'=>$this->session->userdata('user_id'));
		$notes=$this->Dbcommon->getdata('tbl_notes',$wherearray);

		foreach ($notes as $key => $value) {
			$tags = $value->note_tags;
			$tagarray = explode(",",$tags);
			foreach($tagarray as $tagkey=>$tagvalue){
	            if(!in_array($tagvalue,$taguniquearray)){
	               $taguniquearray[] = $tagvalue;
	            }
			}
		}
		$data['notes']=$notes;
		$data['tags'] = $taguniquearray;
		$this->load->view('view',$data);
	}

    public function sharednotes(){
    	$wherearray = array('share_user_id'=>$this->session->userdata('user_id'));
    	$notes=$this->Dbcommon->getjoindata('tbl_notes','tbl_shares','note_id','share_note_id',$wherearray);
        $data['notes'] = $notes;
        $data['tags'] = array();
    	$this->load->view('view',$data);
    }

	public function ajaxresponse(){
		//$_POST['noteid'];
		@header( 'Content-Type: application/json; charset=utf-8');
		$wherearray = array('note_id'=>$_POST['noteid']);
		$notedetail=$this->Dbcommon->getdata('tbl_notes',$wherearray);
		$responsearray = array('note_title'=>$notedetail[0]->note_title,'note_content'=>$notedetail[0]->note_content,'note_tags'=>$notedetail[0]->note_tags,'note_id'=>$notedetail[0]->note_id);

		echo json_encode($responsearray);

	}

	public function insertnote(){
		$notetitle = $_POST['notetitle'];
		$notetext = $_POST['notetext'];
		$notetags = $_POST['notetags'];
		$userid = $_POST['userid'];
		$insertarray = array('note_title'=>$notetitle,'note_content'=>$notetext,'note_tags'=>$notetags,'user_id'=>$userid);
		$this->Dbcommon->adddata('tbl_notes',$insertarray);

	}

	public function updatecontent(){
		$notetitle = $_POST['notetitle'];
		$notetext = $_POST['notetext'];
		$notetags = $_POST['notetags'];
		$noteid = $_POST['noteid'];
		$updatearray = array('note_title'=>$notetitle,'note_content'=>$notetext,'note_tags'=>$notetags);
		$wherearray = array('note_id'=>$noteid);
		$this->Dbcommon->updatedata('tbl_notes',$updatearray,$wherearray);
	}

	public function getusers(){
		
		$userarray = array();

		$userdata=$this->Dbcommon->getdata('tbl_users');
		foreach ($userdata as $key => $value) {
			$useremail = $value->user_email;
            $userid = $value->user_id;

		    $userarray[] = array('useremail'=>$useremail,'userid'=>$userid);
		}
		echo json_encode($userarray);
	}

	public function sharenote(){
		$noteid = $_POST['noteid'];
		$permission = $_POST['permission'];
		$userid = $_POST['userid'];

		$insertarray = array('share_note_id'=>$noteid,'share_permission_id'=>$permission,'share_user_id'=>$userid);
		$this->Dbcommon->adddata('tbl_shares',$insertarray);
	}

}

/* End of file View.php */
/* Location: ./application/controllers/View.php */