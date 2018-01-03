<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbcommon extends CI_Model {

 public function getdata($tablename,$where=null){
   if(isset($where)){
     $this->db->where($where);
   }
   $query = $this->db->get($tablename);
   return $query->result();
 }
 public function adddata($tablename,$data){
     $this->db->insert($tablename, $data);
   }
 public function updatedata($tablename,$data,$where){
     $this->db->update($tablename, $data, $where);
 }  

  public function getjoindata($table1,$table2,$key1,$key2,$where){
		 
     
		$this->db->select('*');
		$this->db->from(''.$table1.' t1');
		$this->db->join(''.$table2.' t2','t1.'.$key1.'=t2.'.$key2,'right');
		$this->db->where($where);
		
		
        //echo $offmulti;
		
		 $query=$this->db->get();
		// echo '<pre>';
		//print_r($query->result());
         return $query->result();
	}

}

/* End of file Dbcommon.php */
/* Location: ./application/models/Dbcommon.php */