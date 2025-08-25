<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pages_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPages()
    {
        $q = $this->db->get('pages');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    
  
  
 

    public function getPageByID($id)
    {
        $q = $this->db->get_where('pages', array('id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

     
     

    public function getPageDetails($id)
    {
        $this->db->select($this->db->dbprefix('pages') . '.code, ' . $this->db->dbprefix('pages') . '.name, ' . $this->db->dbprefix('categories') . '.code as category_code, cost, price, quantity, alert_quantity')
            ->join('categories', 'categories.id=pages.category_id', 'left');
        $q = $this->db->get_where('pages', array('pages.id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getPageDetail($id)
    {
        $this->db->select($this->db->dbprefix('pages') . '.*, ' . $this->db->dbprefix('tax_rates') . '.name as tax_rate_name, '.$this->db->dbprefix('tax_rates') . '.code as tax_rate_code, c.code as category_code, sc.code as subcategory_code', FALSE)
            ->join('tax_rates', 'tax_rates.id=pages.tax_rate', 'left')
            ->join('categories c', 'c.id=pages.category_id', 'left')
            ->join('categories sc', 'sc.id=pages.subcategory_id', 'left');
        $q = $this->db->get_where('pages', array('pages.id' => $id), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function getSubCategories($parent_id) {
        $this->db->select('id as id, name as text')
        ->where('parent_id', $parent_id)->order_by('name');
        $q = $this->db->get("categories");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    public function getPageByCategoryID($id)
    {

        $q = $this->db->get_where('pages', array('category_id' => $id), 1);
        if ($q->num_rows() > 0) {
            return true;
        }
        return FALSE;
    }

     
 
    public function getPageByCode($code)
    {
        $q = $this->db->get_where('pages', array('code' => $code), 1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
        return FALSE;
    }

    public function addPage($data)
    {
        if ($this->db->insert('pages', $data)) {
            $page_id = $this->db->insert_id();
		return true;
        }
        return false;

    }

    

    public function addAjaxPage($data)
    {
        if ($this->db->insert('pages', $data)) {
            $page_id = $this->db->insert_id();
            return $this->getPageByID($page_id);
        }
        return false;
    }

    public function add_pages($pages = array())
    {
        if (!empty($pages)) {
            foreach ($pages as $page) {
                $variants = explode('|', $page['variants']);
                unset($page['variants']);
                if ($this->db->insert('pages', $page)) {
                    $page_id = $this->db->insert_id();
                    foreach ($variants as $variant) {
                        if ($variant && trim($variant) != '') {
                            $vat = array('page_id' => $page_id, 'name' => trim($variant));
                            $this->db->insert('page_variants', $vat);
                        }
                    }
                }
            }
            return true;
        }
        return false;
    }

    public function getPageNames($term, $limit = 5)
    {
        $this->db->select('' . $this->db->dbprefix('pages') . '.id, code, ' . $this->db->dbprefix('pages') . '.name as name, ' . $this->db->dbprefix('pages') . '.price as price, ' . $this->db->dbprefix('page_variants') . '.name as vname')
            ->where("type != 'combo' AND "
                . "(" . $this->db->dbprefix('pages') . ".name LIKE '%" . $term . "%' OR code LIKE '%" . $term . "%' OR
                concat(" . $this->db->dbprefix('pages') . ".name, ' (', code, ')') LIKE '%" . $term . "%')");
        $this->db->join('page_variants', 'page_variants.page_id=pages.id', 'left')
            ->where('' . $this->db->dbprefix('page_variants') . '.name', NULL)
            ->group_by('pages.id')->limit($limit);
        $q = $this->db->get('pages');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getQASuggestions($term, $limit = 5)
    {
        $this->db->select('' . $this->db->dbprefix('pages') . '.id, code, ' . $this->db->dbprefix('pages') . '.name as name')
            ->where("type != 'combo' AND "
                . "(" . $this->db->dbprefix('pages') . ".name LIKE '%" . $term . "%' OR code LIKE '%" . $term . "%' OR
                concat(" . $this->db->dbprefix('pages') . ".name, ' (', code, ')') LIKE '%" . $term . "%')")
            ->limit($limit);
        $q = $this->db->get('pages');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getPagesForPrinting($term, $limit = 5)
    {
        $this->db->select('' . $this->db->dbprefix('pages') . '.id, code, ' . $this->db->dbprefix('pages') . '.name as name, ' . $this->db->dbprefix('pages') . '.price as price')
            ->where("(" . $this->db->dbprefix('pages') . ".name LIKE '%" . $term . "%' OR code LIKE '%" . $term . "%' OR
                concat(" . $this->db->dbprefix('pages') . ".name, ' (', code, ')') LIKE '%" . $term . "%')")
            ->limit($limit);
        $q = $this->db->get('pages');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function updatePage($id, $data)
    {
        if ($this->db->update('pages', $data, array('id' => $id))) {
   
            return true;
        } else {
            return false;
        }
    }

    public function updatePageOptionQuantity($option_id, $warehouse_id, $quantity, $page_id)
    {
        if ($option = $this->getPageWarehouseOptionQty($option_id, $warehouse_id)) {
            if ($this->db->update('warehouses_pages_variants', array('quantity' => $quantity), array('option_id' => $option_id, 'warehouse_id' => $warehouse_id))) {
                $this->site->syncVariantQty($option_id, $warehouse_id);
                return TRUE;
            }
        } else {
            if ($this->db->insert('warehouses_pages_variants', array('option_id' => $option_id, 'page_id' => $page_id, 'warehouse_id' => $warehouse_id, 'quantity' => $quantity))) {
                $this->site->syncVariantQty($option_id, $warehouse_id);
                return TRUE;
            }
        }
        return FALSE;
    }

    public function updatePrice($data = array())
    {
        if ($this->db->update_batch('pages', $data, 'code')) {
            return true;
        }
        return false;
    }

    public function deletePage($id)
    {
        if ($this->db->delete('pages', array('id' => $id)) ) {
           
            return true;
        }
        return FALSE;
    }


     

    public function fetch_pages($category_id, $limit, $start, $subcategory_id = NULL)
    {

        $this->db->limit($limit, $start);
        if ($category_id) {
            $this->db->where('category_id', $category_id);
        }
        if ($subcategory_id) {
            $this->db->where('subcategory_id', $subcategory_id);
        }
        $this->db->order_by("id", "asc");
        $query = $this->db->get("pages");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

      
        

}
