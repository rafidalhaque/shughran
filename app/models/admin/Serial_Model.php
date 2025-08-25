<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Serial_Model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
    

    // get serial by branch id
	
    public function getSerials($branch_id)
    {
        $q = $this->db->get_where('serial_reports', array('branch_id' => $branch_id));

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
		
	
    // get all serial by branch id
	
    public function getAllSerial($branch_id = NULL)
    {
        // $q = $this->db->get_where('serial_reports', array('branch_id' => $branch_id));

        $q = $this->db->get('serial_reports');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
		
	
    public function getSerialDepartment($branch_id = NULL)
    {
        $q = $this->db->get_where('departments_all', array('for_serial' => 1));

        // $q = $this->db->get('serial_reports');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }
	
    
}