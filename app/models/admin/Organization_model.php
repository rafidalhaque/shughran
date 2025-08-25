<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

	
	 public function getMemberByID($id) {
        $q = $this->db->get_where('member', array('manpower_id' => $id,'is_member_now'=>1), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }
	
	
    public function getAllInstitution($type=1)
    {
       // $q = $this->db->get('institution');
       $this->db->order_by('priority', 'ASC');
	   $q = $this->db->get_where('institution', array('type' =>$type,'is_active' =>1));
       
       
	   if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }

       
        return FALSE;
    }


    


    
    public function getInstitutionType()
    {
       // $q = $this->db->get('institution');
       $this->db->order_by('priority', 'ASC');
	   $q = $this->db->get('institution_type');
       
       
	   if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }

       
        return FALSE;
    }
    





    public function getCategoryProducts($category_id)
    {
        $q = $this->db->get_where('products', array('category_id' => $category_id));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    } 

    

    public function getProductDetail($id)
    {
        $this->db->select($this->db->dbprefix('products') . '.*, ' . $this->db->dbprefix('tax_rates') . '.name as tax_rate_name, '.$this->db->dbprefix('tax_rates') . '.code as tax_rate_code, c.code as category_code, sc.code as subcategory_code', FALSE)
            ->join('tax_rates', 'tax_rates.id=products.tax_rate', 'left')
            ->join('categories c', 'c.id=products.category_id', 'left')
            ->join('categories sc', 'sc.id=products.subcategory_id', 'left');
        $q = $this->db->get_where('products', array('products.id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

   
      
    

    // public function addInstitution($data)
    // {
    //     if ($this->db->insert('institution_without_org', $data)) {
    //         $product_id = $this->db->insert_id();
    //         return true;
    //     }
    //     return false;
    // }

    

    // public function deleteInstitution($id)
    // {
    //     if ($this->db->delete('institution_without_org', array('id' => $id)) ) {
    //          return true;
    //     }
    //     return FALSE;
    // }

     
    public function addInstitution($data)
    {
        if ($this->db->insert('institutionlist', $data)) {
            $id = $this->db->insert_id();
            return true;
        }
        return false;
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
