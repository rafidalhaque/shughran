<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Others_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	  
	
    public function getAllProgram()
    {
        
        
        $this->db->order_by('priority ASC, id ASC');
        $q = $this->db->get_where("program", array('is_active' => 1));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

       
	 public function getAllCentralTraining()
    {
        $q = $this->db->get('cental_training');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
   

  public function getAllOrganizationInfo()
    {
        $q = $this->db->get('organizationinfo');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
   
    
  public function getAllAdministration()
    {

        $this->db->order_by('priority ASC');
        $q = $this->db->get('administration');
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












	public function addIncreasedBranch($data)
    {
        if ($this->db->insert('other_increase_branch', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }

public function adddecreasedbranch($data)
    {
        if ($this->db->insert('other_decrease_branch', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }


public function adddeficitorginstitute($data)
    {
        if ($this->db->insert('other_institute_org_deficit', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	
public function addincreasedsubbranch($data)
    {
        if ($this->db->insert('other_increase_subbranch', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }	



public function adddecreasedsubbranch($data)
    {
        if ($this->db->insert('other_decrease_subbranch', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }	
	
	
	
public function addstudentunionelection($data)
    {
        if ($this->db->insert('other_student_union_election', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }	
	
	
	public function addhighereducationmanpower($data)
    {
        if ($this->db->insert('international_higher_education', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	
	public function addembassyjob($data)
    {
        if ($this->db->insert('international_embassy_job', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	
	public function addsciencemagazine($data)
    {
        if ($this->db->insert('science_magazine', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	public function addallmedia($data)
    {
        if ($this->db->insert('media_all_type', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	public function addsocialorganization($data)
    {
        if ($this->db->insert('social_socialorganization', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	public function addlibraryincreasedecrease($data)
    {
        if ($this->db->insert('library_increase_decrease', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	
	public function addfoundationinfo($data)
    {
        if ($this->db->insert('foundation_info', $data)) {
            $product_id = $this->db->insert_id();
            return true;
        }
        return false;
    }
	

	 
	
}
