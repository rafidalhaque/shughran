<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Highersyllabus_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	  
	 

       
	 public function getAllHigherSyllabus()
    {
		$this->db->where('is_active',1);
		$this->db->order_by('priority','asc');
        $q = $this->db->get('highersyllabus');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
  
    

       public function insertData($table, $data)
    {
        
        if ($this->db->insert($table, $data)) {
            
            return true;
        }
        return false;
    }

	
     

}
