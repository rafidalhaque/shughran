<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bm_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	  
	
    public function getAllSource()
    {
        $q = $this->db->get('bm_source');
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

	
     public function addAdministration($data)
    {
        if ($this->db->insert('administration_without_org', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }

}
