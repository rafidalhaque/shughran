<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Worker_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	 
	
     

   

   
    public function getWorkerByID($id)
    {
        $q = $this->db->get_where('worker_martyr', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

              

    public function updateManpower($id, $data)
    {
        if ($this->db->update('manpower', $data, array('id' => $id))) {

          
            
            return true;
        } else {
            return false;
        }
    }

    

    public function deleteWorker($id)
    {
        if ($this->db->delete('worker_martyr', array('id' => $id)) ) {
            return true;
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
