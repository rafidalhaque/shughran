<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Training_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	 
	
    public function getAllTraining()
    {
        $q = $this->db->get('training');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

      
    public function getTrainingByType($type)
    {   
	    $this->db->where('type',$type); 
		$this->db->order_by('priority','ASC');		
        $q = $this->db->get('training');
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
