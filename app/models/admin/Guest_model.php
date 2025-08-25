<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Guest_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	 
	
    public function getAllGuest($type=null)
    {
		$this->db->where('is_active',1);
		
		if($type=='current')
		$this->db->where('is_current',1);
		
		$this->db->order_by('priority','asc');
        $q = $this->db->get('guest');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

       

    public function addGuest($data)
    {
        if ($this->db->insert('guest', $data)) {
            
            return true;
        }
        return false;
    }

    

    public function deleteInstitution($id)
    {
        if ($this->db->delete('institution_without_org', array('id' => $id)) ) {
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

    public function manpowerUpdate($table, $data, $where)
    {  
        
        if ($this->db->update($table, $data, $where)) {
             
            return true;
        }
        return false;
    } 
     

}
