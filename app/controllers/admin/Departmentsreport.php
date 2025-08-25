<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Departmentsreport extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        
        $this->load->helper('serial_form_helper'); // serial form load 

        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
		$this->load->helper('report');
        $this->load->admin_model('manpower_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');

        // load session library 
        $this->load->library('session');
    }

function index(){



    if (!($this->Owner || $this->Admin)) {
    // $this->sma->print_arrays("৩ ডিসেম্বর সকাল ১০ টা থেকে বিভাগীয় রিপোর্ট গ্রহণ শুরু হবে । নির্ধারিত সময়ে প্রবেশ করুন। ");
    }
    

    $branch_id = $this->input->get('branch_id');


    if ($this->Owner || $this->Admin || $this->session->userdata('group_id') == 8  || !$this->session->userdata('branch_id')) {
        $this->data['branches'] = $this->site->getAllBranches();
        $this->data['branch_id'] = $branch_id;
        $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
    } else {
        $this->data['branches'] = NULL;
        $this->data['branch_id'] = $this->session->userdata('branch_id');
        $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
    }

       $this->sma->checkPermissions();

       $report_type = $this->report_type();


      //$this->sma->print_arrays($report_type);

      $type =  $report_type['type'];
      $year = $report_type['year'];
      $branch_id = $this->input->get('branch_id');

       $string = " SELECT *  FROM sma_serial_reports  where
        report_year = $year   AND report_type = '".$type."' ";





       if($this->session->userdata('group_id') == 8 ){       

            $this->data['departments'] = $this->site->getAllDepartments($this->session->userdata('department_id'));

            $string =  $string . ' AND dept_id = '.$this->session->userdata('department_id') ;

            if($branch_id) 
            $string =  $string . ' AND branch_id = '.$branch_id ;

            // $string =  $string . ' order by created_at desc';
            // $string =  $string . ' order by created_at asc';

            $this->data['serial_records'] = $this->site->query($string );

            if($branch_id)
            $this->data['branch_list'] =  $this->site->getAllBranches($branch_id);

            else 
            $this->data['branch_list'] = $this->data['branches'];

       }elseif($this->Owner || $this->Admin ){
            
            $this->data['departments'] = $this->site->getAllDepartments(null, null,1);

            $this->data['serial_records'] = null;
            
            $this->data['branch_list'] = null;



            if($branch_id) {
            $string =  $string . ' AND  branch_id = '.$branch_id ;

            $string =  $string . ' order by created_at asc';
            $this->data['serial_records'] = $this->site->query($string );
            $this->data['branch_list'] =  $this->site->getAllBranches($branch_id);
            }
        
       }else {       

            $this->data['departments'] = $this->site->getAllDepartments(null, null,1);
            
            $string =  $string . ' AND branch_id = '.$this->session->userdata('branch_id') ;

            $string =  $string . ' order by created_at asc';

            $this->data['serial_records'] = $this->site->query($string );
    
            $this->data['branch_list'] =  $this->site->getAllBranches($this->session->userdata('branch_id'));
            $branch_id = $this->session->userdata('branch_id');

       }








     //  $this->data['serial_records'] = $this->site->query($string );
       // echo $string;

      
     //  $this->sma->print_arrays($this->data['serial_records']);





    //    select d.`name`, s.*   from `sma_serial_reports` s left join `sma_departments`  d 
    //    on  s.dept_id = d.id 
    //    where d.for_serial = 1 AND report_year = 2024 and report_type = 'annual' and s.dept_id = 10




    $this->data['branch_id'] = $branch_id;


	    //$this->sma->print_arrays($';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('departmentsreport'), 'bc' => $bc);
        
		$this->page_construct('departmentsreport/departmentsreport', $meta, $this->data,'leftmenu/departmentsreport');

}


    function potrikar_grahok_briddi($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/shakhar-uddege-shahitto-prokash/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		    admin_redirect('departmentsreport/shakhar-uddege-shahitto-prokash/'.$this->session->userdata('branch_id'));
		}

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
		    $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

		
		$last_year =  date("Y",strtotime("-1 year"));
		$report_type = $this->report_type();

        /*$this->db->from('potrikar_grahok_briddhi');
        $this->db->select('potrikar_grahok_briddhi');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['total_potrikar_grahok_briddhi'] = $query->first_row('array');*/

        $this->db->select_sum('bkp_pn_before');
        $this->db->select_sum('bkp_pn_present');
        $this->db->select_sum('bkp_gn_before');
        $this->db->select_sum('bkp_gn_present');
        $this->db->select_sum('bkp_bt_potrika');
        $this->db->select_sum('bkp_bt_grahok');
        $this->db->select_sum('bkp_briddhi_potrika');
        $this->db->select_sum('bkp_briddhi_grahok');
        $this->db->select_sum('bkp_ghatti_potrika');
        $this->db->select_sum('bkp_ghatti_grahok');
        $this->db->select_sum('nbkp_pn_before');
        $this->db->select_sum('nbkp_pn_present');
        $this->db->select_sum('nbkp_gn_before');
        $this->db->select_sum('nbkp_gn_present');
        $this->db->select_sum('nbkp_bt_potrika');
        $this->db->select_sum('nbkp_bt_grahok');
        $this->db->select_sum('nbkp_briddhi_potrika	');
        $this->db->select_sum('nbkp_briddhi_grahok');
        $this->db->select_sum('nbkp_ghatti_potrika');
        $this->db->select_sum('nbkp_ghatti_grahok');
        $this->db->select_sum('ekp_pn_before');
        $this->db->select_sum('ekp_pn_present');
        $this->db->select_sum('ekp_gn_before');
        $this->db->select_sum('ekp_gn_present');
        $this->db->select_sum('ekp_bt_potrika');
        $this->db->select_sum('ekp_bt_grahok');
        $this->db->select_sum('ekp_briddhi_potrika');
        $this->db->select_sum('ekp_briddhi_grahok');
        $this->db->select_sum('ekp_ghatti_potrika');
        $this->db->select_sum('ekp_ghatti_grahok');
        $this->db->select_sum('cs_pn_before');
        $this->db->select_sum('cs_pn_present');
        $this->db->select_sum('cs_gn_before');
        $this->db->select_sum('cs_gn_present');
        $this->db->select_sum('cs_bt_potrika');
        $this->db->select_sum('cs_bt_grahok');
        $this->db->select_sum('cs_briddhi_potrika');
        $this->db->select_sum('cs_briddhi_grahok');
        $this->db->select_sum('cs_ghatti_potrika');
        $this->db->select_sum('cs_ghatti_grahok');
        $this->db->select_sum('bep_pn_before');
        $this->db->select_sum('bep_pn_after');
        $this->db->select_sum('bep_gn_before');
        $this->db->select_sum('bep_gn_present');
        $this->db->select_sum('bep_bt_potrika');
        $this->db->select_sum('bep_bt_grahok');
        $this->db->select_sum('bep_briddhi_potrika');
        $this->db->select_sum('bep_briddhi_grahok');
        $this->db->select_sum('bep_ghatti_potrika');
        $this->db->select_sum('bep_ghatti_grahok');
        $this->db->select_sum('skpp_pn_before');
        $this->db->select_sum('skpp_pn_present');
        $this->db->select_sum('skpp_gn_before');
        $this->db->select_sum('skpp_gn_present');
        $this->db->select_sum('skpp_bt_potrika');
        $this->db->select_sum('skpp_bt_grahok');
        $this->db->select_sum('skpp_briddhi_potrika');
        $this->db->select_sum('skpp_briddhi_grahok');
        $this->db->select_sum('skpp_ghatti_potrika');
        $this->db->select_sum('skpp_ghatti_grahok');
        $this->db->select_sum('sp_pn_before');
        $this->db->select_sum('sp_pn_present');
        $this->db->select_sum('sp_gn_before');
        $this->db->select_sum('sp_gn_present');
        $this->db->select_sum('sp_bt_potrika');
        $this->db->select_sum('sp_bt_grahok');
        $this->db->select_sum('sp_briddhi_potrika');
        $this->db->select_sum('sp_briddhi_grahok');
        $this->db->select_sum('sp_ghatti_potrika');
        $this->db->select_sum('sp_ghatti_grahok');
        $this->db->select_sum('bkp_pn_present');

        $this->data['Total_potrikar_grahok_briddhi'] = $this->db->get('potrikar_grahok_briddhi')->first_row('array');



        $this->db->from('potrikar_grahok_briddhi');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['potrikar_grahok_briddhi'] = $query->first_row('array');


		$this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/potrikar_grahok_briddi_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/potrikar_grahok_briddi', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function shakhar_uddege_shahitto_prokash($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
            admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->db->select_sum('kusp_somoykal');
        $this->data['total_shakhar_uddege_shahitto_prokash'] = $this->db->get('shakhar_uddege_shahitto_prokash')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('shakhar_uddege_shahitto_prokash');
        $this->data['shakhar_uddege_shahitto_prokash'] = $query->first_row('array');


        $this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/shakhar_uddege_shahitto_prokash_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/shakhar_uddege_shahitto_prokash', $meta, $this->data,'leftmenu/departmentsreport');
    }
    
    
    function sahitto_somporkito_dawati_program($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
            admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->db->select_sum('kusp_somoykal');
        $this->data['total_sahitto_somporkito_dawati_program'] = $this->db->get('sahitto_somporkito_dawati_program')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('sahitto_somporkito_dawati_program');
        $this->data['sahitto_somporkito_dawati_program'] = $query->first_row('array');


        $this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/sahitto_somporkito_dawati_program_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/sahitto_somporkito_dawati_program', $meta, $this->data,'leftmenu/departmentsreport');
    }
	
	
	
	function getmanpower_summary($report_type,$start_date, $end_date,$branch_id = NULL){

        if($branch_id)
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE `report_type` = ? AND branch_id = ? AND date BETWEEN ? AND ? ", array($report_type,$branch_id,$start_date,$end_date));
        else
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE `report_type` = ? AND date BETWEEN ? AND ? ", array($report_type,$start_date,$end_date));
        return $result;
  }	
	
	
	
	
	
function getManpower($branch_id = NULL)
    {
	$this->sma->checkPermissions('index', TRUE);	
	if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }	
	if ($branch_id) {
		
	}

	else {
		
		
	}	
		
		return "mok";
		
	}
	
	
	
	
	function postlog($orgstatus,$start,$end,$branch_id){
	
	
		$this->db
                ->select("COUNT(id) as number", FALSE)
				->from('postponelog');
				
		 
		$this->db->where('postpone_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->where('orgstatus_id', $orgstatus); 
		$this->db->where('in_out', 1);
		
		if ($branch_id)
	    $this->db->where('branch', $branch_id); 
		  

		$q = $this->db->get();
            
		  
		 if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE; 
	    
		} 
	
	
	
	
	
	
	function memberlog($type, $start,$end,$branch_id){
	
	
		$this->db
                ->select("COUNT(id) as member_number,process_id,in_out ", FALSE)
				->from('memberlog');
				
		 
		$this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');
	    
		if ($branch_id)
	    $this->db->where('branch', $branch_id); 
		  

		$q = $this->db->get();
            
		  
		 if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE; 
	    
		}   
		   
	
	
	
	
	
	function assolog($type, $start,$end,$branch_id){
	
	
		$this->db
                ->select("COUNT(id) as associate_number,process_id,in_out ", FALSE)
				->from('associatelog');
				
		 
		$this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');
	    
		if ($branch_id)
	    $this->db->where('branch', $branch_id); 
		  

		$q = $this->db->get();
            
		  
		 if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE; 
	    
		} 
	
	
	
	
	function workerlog($type, $start,$end,$branch_id){
	
	
		$this->db
                ->select("COUNT(id) as worker_number,process_id,in_out  ", FALSE)
				->from('worker_decrease');
				
		 
		$this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');
	    
		if ($branch_id)
	    $this->db->where('branch_id', $branch_id); 
		  

		$q = $this->db->get();
            
		  
		 if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE; 
	    
		} 
	
	
	
	
	
	function membercandidatelog($type, $start,$end,$branch_id){
	
	
		$this->db
                ->select("COUNT(id) as member_candidate_number,process_id,in_out ", FALSE)
				->from('member_candidatelog');
				
		 
		$this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');
	    
		if ($branch_id)
	    $this->db->where('branch', $branch_id); 
		  

		$q = $this->db->get();
            
		  
		 if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE; 
	    
		}   
	
	
	
	
	
	
	
	function member($branch_id = NULL)
    {
       
	   
	   
	   $this->sma->checkPermissions('index', TRUE);
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('manpower/member/'.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('manpower/member/'.$this->session->userdata('branch_id'));	  
		  }
	   

		
		//$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>1)); 
		
		 
		
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
        
         
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/member', $meta, $this->data,'leftmenu/manpower');
    }
	
	
	
	function memberincreaselist($process_id=NULL)
    {
        
	

		$branch_id = $this->input->get('branch_id');
		$process = $this->site->getByID('process','id', $process_id);
 
		
			
		 $this->sma->checkPermissions('index', TRUE);
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('manpower/memberincreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('manpower/memberincreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
		  }
	   
		
		
		
		
		
		
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
        
         
		// $this->sma->print_arrays($this->data);
		 
		 $this->data['process'] = $process; 
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/member/increase', $meta, $this->data,'leftmenu/manpower');
    }
	

	
function getIncreaseMember($process_id,$branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         
		 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog');
		$this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1);		
        $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog');
		$this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1);		
        $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		 
           
		  echo $this->datatables->generate();
		 
    	
	}
	
	




	function memberdecreaselist($process_id=NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

		$branch_id = $this->input->get('branch_id');
		$process = $this->site->getByID('process','id', $process_id);
 
		
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
        
         
		// $this->sma->print_arrays($this->data);
		 
		 $this->data['process'] = $process; 
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/member/decrease', $meta, $this->data,'leftmenu/manpower');
    }
	

	
function getDecreaseMember($process_id,$branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         
		 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog');
		$this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2);		
        $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog');
		$this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2);		
        $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		 
           
		  echo $this->datatables->generate();
		 
    	
	}
	
	
	
function postponelist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('manpower/postponelist/'.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('manpower/postponelist/'.$this->session->userdata('branch_id'));	  
		  }
		 
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
        
         
        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'Member'), array('link' => '#', 'page' => 'Postpone'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/postpone/postponelist', $meta, $this->data,'leftmenu/manpower');
    }	
	



	
public function decreaselist($process_id = null)
    {
   $this->sma->checkPermissions();

		$process_id = $this->input->get('process_id');
		$process = $this->site->getByID('process','id', $process_id);
 
   
        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
        
        $this->data['process'] = $process;
		
        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'Member'), array('link' => '#', 'page' => $process->process));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/decrease/decreaselist', $meta, $this->data,'leftmenu/manpower');
 
	}	
	
	


function getPostpone($branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        
         
		  
		  
		
		
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('postpone');
		$this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
				->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1);		
        $this->datatables->join('branches', 'branches.id=postpone.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('postpone');
		$this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
				->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1);			
        $this->datatables->join('branches', 'branches.id=postpone.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		 
        }
		
		
		
		
		
		
				
		 
           
           $this->datatables->add_column("Postpone", "<a class=\"tip\" title='" . 'Postpone' . "' href='" . admin_url('manpower/memberpostponewithdraw/$1') . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-minus\"></i></a>", "id");
          // $this->datatables->unset_column("manpowerid"); 
		   $this->datatables->unset_column("id"); 
		  echo $this->datatables->generate();
    	
	}






	
	
function getMember($branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $detail_link = anchor('admin/products/view/$1', '<i class="fa fa-file-text-o"></i> ' . lang('manpower_details'));
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('manpower/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_manpower') . "</a>";
         
		 $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('manpowerlist/edit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';
        
        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';
		
		$process_list = array(
		 8=>'ছাত্রত্ব শেষ',
		  15=>'স্থানান্তর',
		   12=>'বাতিল',
		    11=>'উচ্চ শিক্ষা',
			 14=>'বিদেশে চাকুরি',
			  9=>'ইন্তেকাল',
			   10=>'শাহাদাৎ' 
		   );
       
	   $li = "";
foreach($process_list as $key=>$process){
	
	$li .="<li><a class=\"tip\" title='" . $process . "' href='" . admin_url('manpower/memberdecrease/$1/'.$key) . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-edit\"></i>".$process."</a></li>";
		// $li .='<li><a href="' . admin_url('manpower/memberdecrease/$1'.'/'.$key) . '"><i class="fa fa-edit"></i> ' . $process . '</a></li>';
		}		
		
		$decrease_button = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . 'ঘাটতি' . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';
        
        $decrease_button .= $li.' </ul>
        </div></div>';
		
	 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('member');
		$this->datatables->join('manpower', 'manpower.id=member.manpower_id', 'left')
				->where('member.is_member_now', 1);		
        $this->datatables->join('branches', 'branches.id=member.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('member');
		$this->datatables->join('manpower', 'manpower.id=member.manpower_id', 'left')
				->where('member.is_member_now', 1);		
        $this->datatables->join('branches', 'branches.id=member.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		
		
		
		
				
		 
           $this->datatables->add_column("Decrease", $decrease_button, "manpowerid");
           $this->datatables->add_column("Postpone", "<a class=\"tip\" title='" . 'Postpone' . "' href='" . admin_url('manpower/memberpostpone/$1') . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-minus\"></i></a>", "manpowerid");
           $this->datatables->add_column("Actions", $action, "manpowerid");
          
		  echo $this->datatables->generate();
		 
    	
	}
	
	
	 
	
function memberdecrease($manpower_id = NULL,$process_id= NULL)
    {
		
		//admin_redirect('manpower/member');
        // $this->sma->print_arrays($_POST);
	   
        
		 $this->sma->checkPermissions('index', TRUE);
	 
		if( !($this->Owner || $this->Admin) ) 
		   $where = array();
		
		else  
			$where = array('branch_id'=>$this->session->userdata('branch_id'));
				 
	   
		
		
		
		
		  $this->load->helper('security');
        
        $manpower = $this->manpower_model->getManpowerByID($manpower_id);
        $process = $this->site->getByID('process','id', $process_id);

		
		
		
		
		
        $this->form_validation->set_rules('date', lang("date"), 'required');
        if($process_id==15)
		$this->form_validation->set_rules('new_branch_id', 'Branch', 'required');
        
		
        if ($this->form_validation->run() == true) {
            $manpowerid = $this->input->post('manpower_id');
            $processid = $this->input->post('process_id'); 
            $branchid =  ($this->Owner || $this->Admin) ?  $this->input->post('branch_id') : $this->session->userdata('branch_id');
			$note = $this->input->post('note');
		    $newbranchid = $this->input->post('new_branch_id') ? $this->input->post('new_branch_id') : NULL;
		   
		   $date = $this->sma->fld($this->input->post('date').' 00:00:00');
		    
		   $data_member = array(
                'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
                'is_member_now' => 2
            );
			$member_where = array(
                'manpower_id' => $manpowerid,
                'branch' => $branchid
            );
			
			
			$data_member_log = array(
                'process_date' => $date,
                
				'manpower_id' => $manpowerid,
				'in_out' => 2,
				'user_id' => $this->session->userdata('user_id'),
				'process_id' => $processid,
				'branch' => $branchid,
				'note' => $note 
            );
			 
            
        } elseif ($this->input->post('memberdecrease')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('manpower/member');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('member',$data_member,$member_where) && $this->manpower_model->insertData('memberlog',$data_member_log)) {
			
			if($processid!=15)
			$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>$manpowerid));           
		    else {
			$this->manpower_model->manpowerUpdate('manpower',array('branch'=>$newbranchid),array('id'=>$manpowerid));           
		    $data_newbranch_member_log = array(
                'process_date' => $date,
                'manpower_id' => $manpowerid,
				'in_out' => 1,
				'user_id' => $this->session->userdata('user_id'),
				'process_id' => $processid,
				'branch' => $newbranchid,
				'note' => $note 
            );
			
			//log table
			$this->manpower_model->insertData('memberlog',$data_newbranch_member_log);
			
			//member table
			$data_newbranch_member = array(
                'start_date' => $date,
                'manpower_id' => $manpowerid,
				'user_id' => $this->session->userdata('user_id'),
				'branch' => $newbranchid 
			 );
			$this->manpower_model->insertData('member',$data_newbranch_member);
			
			
			}
			
			
			
			$this->session->set_flashdata('message', 'Decrease successfully');
            admin_redirect("manpower/member");
        } 
		else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
			$this->data['process'] = $process;
			 
			$this->data['branches'] = $this->site->getAllBranches();
		 
		    if($process_id==15)
			if ($this->Owner || $this->Admin) {
			   
				$this->data['own_branch_id'] = NULL;
				$this->data['own_branch'] = NULL;
			} else {
				 
				$this->data['own_branch_id'] = $this->session->userdata('branch_id');
				$this->data['own_branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
			} 
			 
			 
            $this->load->view($this->theme . 'manpower/decrease/decrease_user', $this->data);
        }
	   
	   
	   
             
    }	
	
	
	
 


function memberpostpone($manpower_id = NULL)
    {
		 
          $this->sma->checkPermissions('index', TRUE);
		  
		  $this->load->helper('security');
        
        $manpower = $this->manpower_model->getManpowerByID($manpower_id);
        
		
		
		
		
        $this->form_validation->set_rules('date', lang("date"), 'required');
        $this->form_validation->set_rules('manpower_id', 'Member', 'required|callback_check_member['.$this->input->post('branch_id').']');

		
        if ($this->form_validation->run() == true) {
            $manpowerid = $this->input->post('manpower_id');
            $branchid = $this->input->post('branch_id');
			$note = $this->input->post('note');
		    
		    $date = $this->sma->fld($this->input->post('date').' 00:00:00');
		    
		   $postpone_member = array(
                'start_date' => $date,
                'branch' => $branchid,
				'manpower_id' => $manpowerid,
				'user_id' => $this->session->userdata('user_id'),
				'orgstatus_id' => 1
            );
			 
			
			$postpone_member_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
				'in_out' => 1,
				'user_id' => $this->session->userdata('user_id'),
				'manpower_id' => $manpowerid,
				'note' => $note ,
				'orgstatus_id' => 1
            );
			 
            
        } elseif ($this->input->post('memberpostpone')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('manpower/member');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->insertData('postpone',$postpone_member) && $this->manpower_model->insertData('postponelog',$postpone_member_log)) {
			
			 
			
			$this->session->set_flashdata('message', 'Postponed successfully');
            admin_redirect("manpower/postponelist");
        } 
		else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
			 
			 
		 
            $this->load->view($this->theme . 'manpower/postpone/memberpostpone', $this->data);
        }
	   
	   
	   
             
    }	
	 
 
 
 
 
 
 
 function memberpostponewithdraw($id = NULL)
    {
		 
          $this->sma->checkPermissions('index', TRUE);
		  $this->load->helper('security');
        
          $info = $this->site->getByID('postpone','id',$id);
        
		  $manpower = $this->manpower_model->getManpowerByID($info->manpower_id);
        
		
		
		
        $this->form_validation->set_rules('date', lang("date"), 'required');
        
		
        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $branchid = $info->branch;
			$note = $this->input->post('note');
		    
		    $date = $this->sma->fld($this->input->post('date').' 00:00:00');
		    
		     
		   $data_postpone = array(
                'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date)))
            );
			$postpone_where = array(
                'id' => $id 
            );
			 
			
			$postpone_member_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
				'in_out' => 2,
				'user_id' => $this->session->userdata('user_id'),
				'manpower_id' => $manpower->id,
				'note' => $note ,
				'orgstatus_id' => 1
            );
			 
            
        } elseif ($this->input->post('memberpostponewithdraw')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('manpower/member');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('postpone',$data_postpone,$postpone_where) && $this->manpower_model->insertData('postponelog',$postpone_member_log)) {
		 	
			$this->session->set_flashdata('message', 'Postpone withdrawn successfully');
            admin_redirect("manpower/postponelist");
        } 
		else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
			$this->data['info'] = $info; 
			 
		 
            $this->load->view($this->theme . 'manpower/postpone/memberpostponewithdraw', $this->data);
        }
	   
	   
	   
             
    }	
	 
 
 
 
 
 
 function check_member($member_id,$branch)
 {
  
   
   $info = $this->site->getcolumn('postpone','id', array('manpower_id'=>$member_id,'orgstatus_id'=>1,'end_date'=>'2050-12-31','branch'=>$branch),'id DESC',1,0);
	 	
    
  if ($info!=NULL)
  {
	 $this->form_validation->set_message('check_member', 'Already postponed!');
	return false; 
   
  
  }
  else{
	 
	  return true; 
	
 	 }
 
 }	
 

       

    /* ------------------------------------------------------- */

    function add($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
       // $branches = $this->site->getAllBranches();
        
		$this->form_validation->set_rules('manpower_id', 'Member Candidate', 'required');
        $this->form_validation->set_rules('date', 'Oath date', 'required');
        

		if ($this->form_validation->run() == true) {
            
			$manpower = $this->site->getByID('manpower','id', $this->input->post('manpower_id'));
			$branch = $this->site->getByID('branches','id', $manpower->branch);
			 
			
			$data = array(
                'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'start_date' => $this->sma->fsd($this->input->post('date')),
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
				'user_id' => $this->session->userdata('user_id'),
                'notes' => $this->input->post('notes')
              );
               
          $datalog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'process_id' => 2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
				'user_id' => $this->session->userdata('user_id'),
                'note' => $this->input->post('notes')
              );
			  
			  
		 	  
			  
                   // $this->sma->print_arrays($data, $warehouse_qty, $product_attributes);
        }

        if ($this->form_validation->run() == true) {
			
			
			//new member
			$return_id = $this->site->insertData('member',$data,'id'); 
			
			
			//new memberlog
			$this->site->insertData('memberlog',$datalog);
			
			
			
			//update manpower
			$manpower_update = array(
                'member_oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'orgstatus_id' => 1,
                'membercode' => date('y').$branch->code.$return_id
              );
			  
			$this->site->updateData('manpower',$manpower_update, array('id'=>$this->input->post('manpower_id')));  
			  
			  
			
			//decrease mc log
			$mclog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'in_out' => 2,
				'process_id' =>2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
				'user_id' => $this->session->userdata('user_id')
              );
			 $this->site->insertData('member_candidatelog',$mclog);  
			 
			
			//update mc
			$mc = array(
                'end_date' =>  $this->sma->fsd($this->input->post('date')),
                'is_member_candidate_now'=>2               
					);
			$this->site->updateData('member_candidate',$mc, array('is_member_candidate_now'=>1,'branch'=>$manpower->branch,'manpower_id'=>$this->input->post('manpower_id')));  
			 


			 
			 //decrease asso log
			$assolog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'in_out' => 2,
				'process_id' =>2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
				'user_id' => $this->session->userdata('user_id')
              );
			 $this->site->insertData('associatelog',$assolog);  
			 
			
			//update asso
			$asso = array(
                'end_date' =>  $this->sma->fsd($this->input->post('date')),
                'is_associate_now'=>2               
					);
			$this->site->updateData('associate',$asso, array('is_associate_now'=>1,'branch'=>$manpower->branch,'manpower_id'=>$this->input->post('manpower_id')));  
			 
			
			
            $this->session->set_flashdata('message', 'Added');
            admin_redirect('manpower/member');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

          //  $this->data['branches'] = $branches;
            
			$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/memberlist'), 'page' => 'Member'), array('link' => '#', 'page' => 'Member Improve'));
            $meta = array('page_title' => 'Member Improve', 'bc' => $bc);
            $this->page_construct('manpower/member/improve', $meta, $this->data);
        }
    }

    function suggestions($id = null)
    {
		
		
		if($id!=null)
		 $this->sma->send_json(array('id'=>1, 'text'=>'Mong'));
	
       $term = $this->input->get('term', TRUE);
	   
        if (strlen($term) < 1 || !$term) {
          //  die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->manpower_model->getManpowerNames($term);
		

        if ($rows) {
            foreach ($rows as $row) {
                $pr[] = array('id' => $row->id, 'text' => $row->name .'('.$row->associatecode.')');
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'text' => 'Not found')));
        }
    }
	
	
	

    function get_suggestions()
    {
        $term = $this->input->get('term', TRUE);
        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->products_model->getProductsForPrinting($term);
        if ($rows) {
            foreach ($rows as $row) {
                $variants = $this->products_model->getProductOptions($row->id);
                $pr[] = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'name' => $row->name, 'price' => $row->price, 'qty' => 1, 'variants' => $variants);
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }

    function addByAjax()
    {
        if (!$this->mPermissions('add')) {
            exit(json_encode(array('msg' => lang('access_denied'))));
        }
        if ($this->input->get('token') && $this->input->get('token') == $this->session->userdata('user_csrf') && $this->input->is_ajax_request()) {
            $product = $this->input->get('product');
            if (!isset($product['code']) || empty($product['code'])) {
                exit(json_encode(array('msg' => lang('product_code_is_required'))));
            }
            if (!isset($product['name']) || empty($product['name'])) {
                exit(json_encode(array('msg' => lang('product_name_is_required'))));
            }
            if (!isset($product['category_id']) || empty($product['category_id'])) {
                exit(json_encode(array('msg' => lang('product_category_is_required'))));
            }
            if (!isset($product['unit']) || empty($product['unit'])) {
                exit(json_encode(array('msg' => lang('product_unit_is_required'))));
            }
            if (!isset($product['price']) || empty($product['price'])) {
                exit(json_encode(array('msg' => lang('product_price_is_required'))));
            }
            if (!isset($product['cost']) || empty($product['cost'])) {
                exit(json_encode(array('msg' => lang('product_cost_is_required'))));
            }
            if ($this->products_model->getProductByCode($product['code'])) {
                exit(json_encode(array('msg' => lang('product_code_already_exist'))));
            }
            if ($row = $this->products_model->addAjaxProduct($product)) {
                $tax_rate = $this->site->getTaxRateByID($row->tax_rate);
                $pr = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'qty' => 1, 'cost' => $row->cost, 'name' => $row->name, 'tax_method' => $row->tax_method, 'tax_rate' => $tax_rate, 'discount' => '0');
                $this->sma->send_json(array('msg' => 'success', 'result' => $pr));
            } else {
                exit(json_encode(array('msg' => lang('failed_to_add_product'))));
            }
        } else {
            json_encode(array('msg' => 'Invalid token'));
        }

    }


    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
         $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $branches = $this->site->getAllBranches();
        $manpower = $this->site->getManpowerByID($id);
        if (!$id || !$manpower) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
         
         
        $this->form_validation->set_rules('product_image', lang("product_image"), 'xss_clean');
         
        if ($this->form_validation->run('manpower/add') == true) {

            $data = array(
                'name' => $this->input->post('name'),
                'studentlife' => $this->input->post('studentlife'),
                'education' => $this->input->post('education'),
                'sessionyear' => $this->input->post('sessionyear') 
             );
             
            $this->load->library('upload');
            
 
       
            
            if ($_FILES['manpower_image']['size'] > 0) {

                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = $this->image_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('manpower_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("manpower/edit/" . $id);
                }
                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload_path . $photo;
                $config['new_image'] = $this->thumbs_path . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $this->Settings->twidth;
                $config['height'] = $this->Settings->theight;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }
                 
                $this->image_lib->clear();
                $config = NULL;
            }

             
            }
 // $this->sma->print_arrays($data,$_POST);
        if ($this->form_validation->run() == true && $this->manpower_model->updateManpower($id, $data)) {
            $this->session->set_flashdata('message', lang("manpower_updated"));
            admin_redirect('manpower/member');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'member'), array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('manpower/edit', $meta, $this->data);
        }
    }

    /* ---------------------------------------------------------------- */

    function import_csv()
    {
        $this->sma->checkPermissions('csv');
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');

        if ($this->form_validation->run() == true) {

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("products/import_csv");
                }

                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 5000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);
                $updated = 0; $items = array();
                foreach ($arrResult as $key => $value) {
                    $item = [
                        'name'              => isset($value[0]) ? trim($value[0]) : '',
                        'code'              => isset($value[1]) ? trim($value[1]) : '',
                        'barcode_symbology' => isset($value[2]) ? mb_strtolower(trim($value[2]), 'UTF-8') : '',
                        'brand'             => isset($value[3]) ? trim($value[3]) : '',
                        'category_code'     => isset($value[4]) ? trim($value[4]) : '',
                        'unit'              => isset($value[5]) ? trim($value[5]) : '',
                        'sale_unit'         => isset($value[6]) ? trim($value[6]) : '',
                        'purchase_unit'     => isset($value[7]) ? trim($value[7]) : '',
                        'cost'              => isset($value[8]) ? trim($value[8]) : '',
                        'price'             => isset($value[9]) ? trim($value[9]) : '',
                        'alert_quantity'    => isset($value[10]) ? trim($value[10]) : '',
                        'tax_rate'          => isset($value[11]) ? trim($value[11]) : '',
                        'tax_method'        => isset($value[12]) ? (trim($value[12]) == 'exclusive' ? 1 : 0) : '',
                        'image'             => isset($value[13]) ? trim($value[13]) : '',
                        'subcategory_code'  => isset($value[14]) ? trim($value[14]) : '',
                        'variants'          => isset($value[15]) ? trim($value[15]) : '',
                        'cf1'               => isset($value[16]) ? trim($value[16]) : '',
                        'cf2'               => isset($value[17]) ? trim($value[17]) : '',
                        'cf3'               => isset($value[18]) ? trim($value[18]) : '',
                        'cf4'               => isset($value[19]) ? trim($value[19]) : '',
                        'cf5'               => isset($value[20]) ? trim($value[20]) : '',
                        'cf6'               => isset($value[21]) ? trim($value[21]) : '',
                        'hsn_code'          => isset($value[22]) ? trim($value[22]) : '',
                        'second_name'       => isset($value[23]) ? trim($value[23]) : '',
                    ];

                    if ($catd = $this->products_model->getCategoryByCode($item['category_code'])) {
                        $tax_details = $this->products_model->getTaxRateByName($item['tax_rate']);
                        $prsubcat = $this->products_model->getCategoryByCode($item['subcategory_code']);
                        $brand = $this->products_model->getBrandByName($item['brand']);
                        $unit = $this->products_model->getUnitByCode($item['unit']);
                        $base_unit = $unit ? $unit->id : NULL;
                        $sale_unit = $base_unit;
                        $purcahse_unit = $base_unit;
                        if ($base_unit) {
                            $units = $this->site->getUnitsByBUID($base_unit);
                            foreach ($units as $u) {
                                if ($u->code == $item['sale_unit']) {
                                    $sale_unit = $u->id;
                                }
                                if ($u->code == $item['purchase_unit']) {
                                    $purcahse_unit = $u->id;
                                }
                            }
                        } else {
                            $this->session->set_flashdata('error', lang("check_unit") . " (" . $item['unit'] . "). " . lang("unit_code_x_exist") . " " . lang("line_no") . " " . ($key+1));
                            admin_redirect("products/import_csv");
                        }

                        unset($item['category_code'], $item['subcategory_code']);
                        $item['unit'] = $base_unit;
                        $item['sale_unit'] = $sale_unit;
                        $item['category_id'] = $catd->id;
                        $item['purchase_unit'] = $purcahse_unit;
                        $item['brand'] = $brand ? $brand->id : NULL;
                        $item['tax_rate'] = $tax_details ? $tax_details->id : NULL;
                        $item['subcategory_id'] = $prsubcat ? $prsubcat->id : NULL;

                        if ($product = $this->products_model->getProductByCode($item['code'])) {
                            if ($product->type == 'standard') {
                                if ($item['variants']) {
                                    $vs = explode('|', $item['variants']);
                                    foreach ($vs as $v) {
                                        $variants[] = ['product_id' => $product->id, 'name' => trim($v)];
                                    }
                                }
                                unset($item['variants']);
                                if ($this->products_model->updateProduct($product->id, $item, null, null, null, null, $variants)) {
                                    $updated++;
                                }
                            }
                            $item = false;
                        }
                    } else {
                        $this->session->set_flashdata('error', lang("check_category_code") . " (" . $item['category_code'] . "). " . lang("category_code_x_exist") . " " . lang("line_no") . " " . ($key+1));
                        admin_redirect("products/import_csv");
                    }

                    if ($item) {
                        $items[] = $item;
                    }
                }
            }

            // $this->sma->print_arrays($items);
        }

        if ($this->form_validation->run() == true && !empty($items)) {
            if ($this->products_model->add_products($items)) {
                $updated = $updated ? '<p>'.sprintf(lang("products_updated"), $updated).'</p>' : '';
                $this->session->set_flashdata('message', sprintf(lang("products_added"), count($items)).$updated);
                admin_redirect('products');
            }
        } else {
            if (isset($items) && empty($items)) {
                if ($updated) {
                    $this->session->set_flashdata('message', sprintf(lang("products_updated"), $updated));
                    admin_redirect('products');
                } else {
                    $this->session->set_flashdata('warning', lang('csv_issue'));
                }
                admin_redirect('products/import_csv');
            }

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['userfile'] = array('name' => 'userfile',
                'id' => 'userfile',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userfile')
            );

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => lang('import_products_by_csv')));
            $meta = array('page_title' => lang('import_products_by_csv'), 'bc' => $bc);
            $this->page_construct('products/import_csv', $meta, $this->data);

        }
    }

    
    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
		admin_redirect('manpower');
		
        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->products_model->deleteProduct($id)) {
            if($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("manpower_deleted")));
            }
            $this->session->set_flashdata('message', lang('manpower_deleted'));
            admin_redirect('welcome');
        }

    }

    
   
    
    /* --------------------------------------------------------------------------------------------- */

    function modal_view($id = NULL,$status=NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $pr_details = $this->site->getManpowerByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            $this->sma->md();
        }
        
        $this->data['manpower'] = $pr_details;
		if($status==1) {
        $this->data['member'] = $this->manpower_model->getMemberByID($id);
		$this->data['status'] =  'Member';
		}
        $this->load->view($this->theme.'manpower/modal_view', $this->data);
    }

    function view($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);
        $this->data['sold'] = $this->products_model->getSoldQty($id);
        $this->data['purchased'] = $this->products_model->getPurchasedQty($id);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => $pr_details->name));
        $meta = array('page_title' => $pr_details->name, 'bc' => $bc);
        $this->page_construct('products/view', $meta, $this->data);
    }

    function pdf($id = NULL, $view = NULL)
    {
        $this->sma->checkPermissions('index');

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);

        $name = $pr_details->code . '_' . str_replace('/', '_', $pr_details->name) . ".pdf";
        if ($view) {
            $this->load->view($this->theme . 'products/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'products/pdf', $this->data, TRUE);
            if (! $this->Settings->barcode_img) {
                $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
            }
            $this->sma->generate_pdf($html, $name);
        }
    }

    
	function memberincreaseexport($process_id, $branch = NULL)
    {
		
		 $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
           // $this->session->set_flashdata('warning', lang('access_denied'));
           // redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
     
		$process = $this->site->getByID('process','id', $process_id);
 
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog')
				->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1)
				->join('branches', 'branches.id=memberlog.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.member_oath_date ASC');
		  
		  /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    */ 
			if ($branch_id)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);
            
            
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
  //$this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Member Increase list');
				
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Member Increase :'.$process->process);
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_increase_report'.str_replace(" ","",$process->process);
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

    
	
	
	
	function memberdecreaseexport($process_id, $branch = NULL)
    {
		
		
		 $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
          //  $this->session->set_flashdata('warning', lang('access_denied'));
           // redirect($_SERVER["HTTP_REFERER"]);
        }

      if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
     
		$process = $this->site->getByID('process','id', $process_id);
 
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('memberlog')
				->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
				->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2)
				->join('branches', 'branches.id=memberlog.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.member_oath_date ASC');
		  
		  /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    */ 
			if ($branch_id)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);
            
            
            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
  //$this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Member Decrease list');
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Member Decrease :'.$process->process);
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

 
 
 
                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_increase_report'.str_replace(" ","",$process->process);
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

	
function report_type(){
	
	$entrytimeinfo = $this->site->getOneRecord('entry_settings','*',array('year'=>date('Y')),'id desc',1,0);	
	
	
	$current_date = strtotime(date('Y-m-d'));
	
	
	$annual_start = strtotime($entrytimeinfo->startdate_annual);
	$annual_end = strtotime($entrytimeinfo->enddate_annual);
  	
	$half_start = strtotime($entrytimeinfo->startdate_half);
	$half_end = strtotime($entrytimeinfo->enddate_half);
	
	$type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual'; 
	if($type=='half_yearly') 
	  return array('type'=>'half_yearly','start'=>$entrytimeinfo->startdate_half,'end'=>$entrytimeinfo->enddate_half,'year'=>$entrytimeinfo->year);
    else 
	  return array('type'=>'annual','start'=>$entrytimeinfo->startdate_annual,'end'=>$entrytimeinfo->enddate_annual,'year'=>$entrytimeinfo->year);
}	
	




function getPrev($report_type,$last_year,$branch_id = NULL){
		
	 
if($branch_id) 
	$result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type,$branch_id,$last_year));

else 	
	$result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type,$last_year));
		
	 
	return $result;
	}


	
	function calculate($data,$process_id,$in_out,$return){
		 
		if($data)
		 foreach($data as $row){
			if($row->in_out==$in_out && $row->process_id==$process_id)
				return isset($row->{$return}) ? $row->{$return} : 0;
		}
		
		return 0;
	}
	
	
	
	
	
	
	
	
	 function exportsummary($branch_id = NULL)
    {
         
     $this->sma->checkPermissions('index', TRUE);
	
	 if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branch_id'] = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
	
	
	
	
	
    $last_year =  date("Y",strtotime("-1 year"));
	$report_type = $this->report_type(); 
		
		$prev_manpower = $this->getPrev($report_type['type'],$last_year,$branch_id);	 
		
		$this->db
                ->select("COUNT(id) as member_number,process_id,in_out ", FALSE)
				->from('memberlog');
		$this->db->where('process_date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->group_by('in_out, process_id');
	    if ($branch_id)
		$this->db->where('branch', $branch_id); 
            

            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
			
			
		$postpone = $this->postlog(1,$report_type['start'],$report_type['end'],$branch_id);	 
		$datamc = $this->membercandidatelog($report_type['type'],$report_type['start'],$report_type['end'],$branch_id);	 
		$manpower_record = $this->getmanpower_summary($report_type['type'],$report_type['start'],$report_type['end'], $branch_id);	 
		$postponemc = $this->postlog(12,$report_type['start'],$report_type['end'],$branch_id);	 
		
		$dataasso = $this->assolog($report_type['type'],$report_type['start'],$report_type['end'],$branch_id);	 
		$postponeasso = $this->postlog(2,$report_type['start'],$report_type['end'],$branch_id);	 
		$postponeac = $this->postlog(13,$report_type['start'],$report_type['end'],$branch_id);	 
			
		$dataworker = $this->workerlog($report_type['type'],$report_type['start'],$report_type['end'],$branch_id);	 
			
			
			

            if ( 1 || !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Manpower Summary');
         
		 
		 
				
				$this->excel->getActiveSheet()->mergeCells('A1:T1');
				$this->excel->getActiveSheet()->mergeCells('A2:T2');
				$this->excel->getActiveSheet()->mergeCells('A3:T3');
				$this->excel->getActiveSheet()->mergeCells('A4:T4');
				$this->excel->getActiveSheet()->mergeCells('A5:T5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:T4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:T4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']).' Manpower Report: from '.$report_type['start'].' to '.$report_type['end']);
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch_id ? $branch->name : lang('all_branches')));
				  
				
				
				
				
		        $this->excel->getActiveSheet()->mergeCells('B11:B13');
				$this->excel->getActiveSheet()->SetCellValue('B11', 'জনশক্তি');
				
				$this->excel->getActiveSheet()->mergeCells('C11:C13');
				$this->excel->getActiveSheet()->SetCellValue('C11', 'পূর্বের সংখ্যা ');
				
				$this->excel->getActiveSheet()->mergeCells('D11:D13');
				$this->excel->getActiveSheet()->SetCellValue('D11', 'বর্তমান সংখ্যা');
				
				
				$this->excel->getActiveSheet()->mergeCells('E11:G11');
				$this->excel->getActiveSheet()->SetCellValue('E11', 'বৃদ্ধি');
				
				$this->excel->getActiveSheet()->mergeCells('E12:E13');
				$this->excel->getActiveSheet()->SetCellValue('E12', 'সংখ্যা');
				
				$this->excel->getActiveSheet()->mergeCells('F12:F13');
				$this->excel->getActiveSheet()->SetCellValue('F12', 'মানোন্নয়ন');
				
				
				$this->excel->getActiveSheet()->mergeCells('G12:G13');
				$this->excel->getActiveSheet()->SetCellValue('G12', 'আগমন');
				
				
               
                $this->excel->getActiveSheet()->mergeCells('H11:H13');
				$this->excel->getActiveSheet()->SetCellValue('H11', 'টার্গেট');
				
				
				$this->excel->getActiveSheet()->mergeCells('I11:I13');
				$this->excel->getActiveSheet()->SetCellValue('I11', 'বাস্তবায়ন হার');
				  

				  
				  
				$this->excel->getActiveSheet()->mergeCells('J11:T11');
				$this->excel->getActiveSheet()->SetCellValue('J11', 'ঘাটতি');
				
				
				
				$this->excel->getActiveSheet()->mergeCells('J12:J13');
				$this->excel->getActiveSheet()->SetCellValue('J12', 'সংখ্যা');
				 
				$this->excel->getActiveSheet()->mergeCells('K12:K13');
				$this->excel->getActiveSheet()->SetCellValue('K12', 'মানোন্নয়ন');
				
				$this->excel->getActiveSheet()->mergeCells('L12:L13');
				$this->excel->getActiveSheet()->SetCellValue('L12', 'ছাত্রত্ব শেষ ');
				 
				  
                $this->excel->getActiveSheet()->mergeCells('M12:M13');
				$this->excel->getActiveSheet()->SetCellValue('M12', 'স্থানান্তর');
				
				$this->excel->getActiveSheet()->mergeCells('N12:N13');
				$this->excel->getActiveSheet()->SetCellValue('N12', 'বাতিল');
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('O12:P12');
				$this->excel->getActiveSheet()->SetCellValue('O12', 'বিদেশ');
				
				 
				$this->excel->getActiveSheet()->SetCellValue('O13', 'উচ্চ শিক্ষা');
				$this->excel->getActiveSheet()->SetCellValue('P13', 'বাতিল');
				 
				
				
				  
				$this->excel->getActiveSheet()->mergeCells('Q12:Q13');
				$this->excel->getActiveSheet()->SetCellValue('Q12', 'ইন্তেকাল ');
				
				$this->excel->getActiveSheet()->mergeCells('R12:R13');
				$this->excel->getActiveSheet()->SetCellValue('R12', 'শাহাদাত');
				 
				  
                $this->excel->getActiveSheet()->mergeCells('S12:S13');
				$this->excel->getActiveSheet()->SetCellValue('S12', 'কর্মী মান অবনতি');
				
				$this->excel->getActiveSheet()->mergeCells('T12:T13');
				$this->excel->getActiveSheet()->SetCellValue('T12', 'postpone');
				
			 
				$this->excel->getActiveSheet()->SetCellValue('B14', 'সদস্য');
				$this->excel->getActiveSheet()->SetCellValue('B15', 'সদস্য প্রার্থী');
				$this->excel->getActiveSheet()->SetCellValue('B16', 'সাথী');
				$this->excel->getActiveSheet()->SetCellValue('B17', 'সাথী প্রার্থী');
				$this->excel->getActiveSheet()->SetCellValue('B18', 'কর্মী');
				$this->excel->getActiveSheet()->SetCellValue('B19', 'মোট');
				
				
				$this->excel->getActiveSheet()->getStyle("B11:T13")->getFont()->setBold( true );
            
				$this->excel->getActiveSheet()->getStyle("B11:T13")
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setRGB('03bb85');
				
				$total_pre = 0;
				
				
				////member
				$row=14;
				$org_name = 'member';
				$total_pre += $prev_manpower[0][$org_name];  
			    $member_prev = $prev_manpower[0][$org_name];
				$improvement = $this->calculate($data,2,1, $org_name.'_number');  //record, process, in 
			    $improvement_m = $improvement;
				$arrival = $this->calculate($data,15,1, $org_name.'_number');  //record, process, in 
			    $endstd = $this->calculate($data,8,2, $org_name.'_number');  //record, process, in 
			    $transfer = $this->calculate($data,15,2, $org_name.'_number');  //record, process, in 
			    $cancel = $this->calculate($data,12,2, $org_name.'_number');  //record, process, in 
				$study_abroad = $this->calculate($data,11,2, $org_name.'_number');  //record, process, in 
			    $job_abroad = $this->calculate($data,14,2, $org_name.'_number');  //record, process, in 
			    $death = $this->calculate($data,9,2, $org_name.'_number');  //record, process, in 
			    $martyr = $this->calculate($data,10,2, $org_name.'_number');  //record, process, in 
			    $demotion = $this->calculate($data,13,2, $org_name.'_number');  //record, process, in 
			    $demotion = $this->calculate($data,13,2, $org_name.'_number');  //record, process, in 
			    
				$total_member_decrease = $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
				$current_member = $member_prev + $improvement + $arrival - $total_member_decrease;
	
			  
			  
				$this->excel->getActiveSheet()->SetCellValue('C'.$row, $member_prev);  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, $current_member);
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, $improvement + $arrival);
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, $improvement);
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, $arrival);
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, $member_prev);
				$this->excel->getActiveSheet()->SetCellValue('I'.$row, ($member_prev>0) ? round(100*$improvement/$member_prev,2) : 0);
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, $total_member_decrease);
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, '');
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, $endstd);
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, $transfer);
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, $cancel);
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, $study_abroad);
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, $job_abroad);
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, $death);
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, $martyr);
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, $demotion);
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, $postpone[0]->number);
				 
				///member ends
				
				
				
				
				
				//mc starts
				$row=15;
				$org_name = 'member_candidate';
				//$total_pre += $prev_manpower[0][$org_name];  
			    $mc_prev = $prev_manpower[0][$org_name];
				$improvement = $this->calculate($datamc,2,1, $org_name.'_number');  //record, process, in 
			    $arrival = $this->calculate($datamc,15,1, $org_name.'_number');  //record, process, in 
			    $mc_improvement_d = $improvement_m;
				$endstd = $this->calculate($datamc,8,2, $org_name.'_number');  //record, process, in 
			    $transfer = $this->calculate($datamc,15,2, $org_name.'_number');  //record, process, in 
			    $cancel = $this->calculate($datamc,12,2, $org_name.'_number');  //record, process, in 
				$study_abroad = $this->calculate($datamc,11,2, $org_name.'_number');  //record, process, in 
			    $job_abroad = $this->calculate($datamc,14,2, $org_name.'_number');  //record, process, in 
			    $death = $this->calculate($datamc,9,2, $org_name.'_number');  //record, process, in 
			    $martyr = $this->calculate($datamc,10,2, $org_name.'_number');  //record, process, in 
			    $demotion = $this->calculate($datamc,13,2, $org_name.'_number');  //record, process, in 
			     
				$total_mc_decrease = $mc_improvement_d +  $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
				$current_mc = $mc_prev + $improvement + $arrival - $total_mc_decrease;
				$mc_target = $this->sum_manpower($manpower_record,'member_candidate_candidate_target');
				 
			    $this->excel->getActiveSheet()->SetCellValue('C'.$row, $mc_prev);  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, $current_mc);
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, $improvement + $arrival);
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, $improvement);
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, $arrival);
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, $mc_target);
				$this->excel->getActiveSheet()->SetCellValue('I'.$row, ($mc_target>0) ? round(100*$improvement/$mc_target,2) : 0);
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, $total_mc_decrease);
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, $improvement_m);
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, $endstd);
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, $transfer);
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, $cancel);
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, $study_abroad);
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, $job_abroad);
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, $death);
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, $martyr);
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, $demotion);
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, $postponemc[0]->number);
				
				//mc ends
				
				
				
				
				
				
				
			 
				//$org_name = 'associate_candidate';
				//$org_name = 'worker';
				
				 			
				//asso starts
				$row=16;
				$org_name = 'associate';
				$total_pre += $prev_manpower[0][$org_name];  
			    $asso_prev = $prev_manpower[0][$org_name];
				$improvement = $this->calculate($dataasso,2,1, $org_name.'_number');  //record, process, in 
			    $arrival = $this->calculate($dataasso,15,1, $org_name.'_number');  //record, process, in 
			    $asso_improvement_d = $improvement_m;
				$endstd = $this->calculate($dataasso,8,2, $org_name.'_number');  //record, process, in 
			    $transfer = $this->calculate($dataasso,15,2, $org_name.'_number');  //record, process, in 
			    $cancel = $this->calculate($dataasso,12,2, $org_name.'_number');  //record, process, in 
				$study_abroad = $this->calculate($dataasso,11,2, $org_name.'_number');  //record, process, in 
			    $job_abroad = $this->calculate($dataasso,14,2, $org_name.'_number');  //record, process, in 
			    $death = $this->calculate($dataasso,9,2, $org_name.'_number');  //record, process, in 
			    $martyr = $this->calculate($dataasso,10,2, $org_name.'_number');  //record, process, in 
			    $demotion = $this->calculate($dataasso,13,2, $org_name.'_number');  //record, process, in 
			     
				$total_asso_decrease = $asso_improvement_d +  $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
				$current_asso = $asso_prev + $improvement + $arrival - $total_asso_decrease;
				$asso_target = $asso_prev + $member_prev;
				$asso_improvement  = $improvement;
			    $this->excel->getActiveSheet()->SetCellValue('C'.$row, $asso_prev);  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, $current_asso);
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, $improvement + $arrival);
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, $improvement);
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, $arrival);
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, $asso_target);
				$this->excel->getActiveSheet()->SetCellValue('I'.$row, ($asso_target>0) ? round(100*$improvement/$asso_target,2) : 0);
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, $total_asso_decrease);
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, $improvement_m);
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, $endstd);
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, $transfer);
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, $cancel);
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, $study_abroad);
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, $job_abroad);
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, $death);
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, $martyr);
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, $demotion);
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, $postponeasso[0]->number);
				//asso ends
				
				
				
				
				
				
				
				 
			 	 			
				//ac starts
				$row=17;
				$org_name = 'associate_candidate';
				//$total_pre += $prev_manpower[0][$org_name];  
			    $ac_prev = $prev_manpower[0][$org_name];
				$improvement = $this->sum_manpower($manpower_record,'associate_candidate_improvement');
				$arrival = $this->sum_manpower($manpower_record,   'associate_candidate_arrival');
	
				
				$endstd = $this->sum_manpower($manpower_record,   'associate_candidate_endstd');
				$transfer = $this->sum_manpower($manpower_record,   'associate_candidate_transfer');
				$cancel = $this->sum_manpower($manpower_record,   'associate_candidate_cancel');
				$study_abroad = $this->sum_manpower($manpower_record,  'associate_candidate_abroad_study');
				$job_abroad = $this->sum_manpower($manpower_record,   'associate_candidate_abroad_job');
				$death = $this->sum_manpower($manpower_record,  'associate_candidate_death');
				$martyr = $this->sum_manpower($manpower_record,   'associate_candidate_martyr');
				$demotion = $this->sum_manpower($manpower_record,   'associate_candidate_demotion');
				
				$ac_improvement_d = $asso_improvement;
				$total_ac_decrease = $ac_improvement_d + $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
				$current_ac = $ac_prev + $improvement + $arrival - $total_ac_decrease;
				
				$ac_target = $this->sum_manpower($manpower_record,'associate_candidate_improvement_target');
				  
				    
				 
			    $this->excel->getActiveSheet()->SetCellValue('C'.$row, $ac_prev);  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, $current_ac);
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, $improvement + $arrival);
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, $improvement);
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, $arrival);
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, $ac_target);
				$this->excel->getActiveSheet()->SetCellValue('I'.$row, ($ac_target>0) ? round(100*$improvement/$ac_target,2) : 0);
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, $total_ac_decrease);
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, $ac_improvement_d);
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, $endstd);
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, $transfer);
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, $cancel);
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, $study_abroad);
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, $job_abroad);
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, $death);
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, $martyr);
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, $demotion);
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, $postponeac[0]->number);
				//ac ends
				
				
				
				
				
				
				//worker starts
				$row=18;
				$org_name = 'worker';
				$total_pre += $prev_manpower[0][$org_name];  
			    $worker_prev = $prev_manpower[0][$org_name];
				
				
				$worker_improvement = $this->sum_manpower($manpower_record,'worker_improvement');
				$worker_arrival = $this->sum_manpower($manpower_record,   'worker_arrival');
				
				$worker_endstd = $this->sum_manpower($manpower_record,   'worker_endstd');
				$worker_transfer = $this->sum_manpower($manpower_record,   'worker_transfer');
				$worker_cancel = $this->sum_manpower($manpower_record,   'worker_cancel');
				
				
				
				$worker_study_abroad = $this->calculate($dataworker,11,2, $org_name.'_number');  //record, process, in 
				$worker_job_abroad = $this->calculate($dataworker,14,2, $org_name.'_number');  //record, process, in 
				$worker_death = $this->calculate($dataworker,9,2, $org_name.'_number');  //record, process, in 
				$worker_martyr = $this->calculate($dataworker,10,2, $org_name.'_number');  //record, process, in 
				
				 
				
				
				
				$worker_demotion = $this->sum_manpower($manpower_record,   'worker_demotion');
				
				$worker_improvement_d = $asso_improvement;
				$total_worker_decrease = $worker_improvement_d + $worker_endstd  + $worker_transfer  + $worker_cancel  + $worker_study_abroad + $worker_job_abroad + $worker_death + $worker_martyr + $worker_demotion;
				
				$worker_target = $worker_prev  + $member_prev  + $asso_prev ;
				
				$current_worker = $worker_prev + $worker_improvement + $worker_arrival - $total_ac_decrease;
				  
				 
				 
				    
				 
			    $this->excel->getActiveSheet()->SetCellValue('C'.$row, $worker_prev);  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, $current_worker);
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, $worker_improvement + $worker_arrival);
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, $worker_improvement);
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, $worker_arrival);
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, $worker_target);
				$this->excel->getActiveSheet()->SetCellValue('I'.$row, ($worker_target>0) ? round(100*$worker_improvement/$worker_target,2) : 0);
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, $total_worker_decrease);
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, $worker_improvement_d);
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, $worker_endstd);
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, $worker_transfer);
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, $worker_cancel);
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, $worker_study_abroad);
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, $worker_job_abroad);
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, $worker_death);
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, $worker_martyr);
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, $worker_demotion);
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, '');
				//worker ends
				
				
				$row=19; 
				$this->excel->getActiveSheet()->SetCellValue('C'.$row, '=SUM(C14,C16,C18)');  
				$this->excel->getActiveSheet()->SetCellValue('D'.$row, '=SUM(D14,D16,D18)');  
				$this->excel->getActiveSheet()->SetCellValue('E'.$row, '=SUM(E14,E16,E18)');  
				$this->excel->getActiveSheet()->SetCellValue('F'.$row, '=SUM(F14,F16,F18)');  
				$this->excel->getActiveSheet()->SetCellValue('G'.$row, '=SUM(G14,G16,G18)');  
				$this->excel->getActiveSheet()->SetCellValue('H'.$row, '=SUM(H14,H16,H18)');  
				//$this->excel->getActiveSheet()->SetCellValue('I'.$row, '=SUM(I14,I16,I18)');  
				$this->excel->getActiveSheet()->SetCellValue('J'.$row, '=SUM(J14,J16,J18)');  
				$this->excel->getActiveSheet()->SetCellValue('K'.$row, '=SUM(K14,K16,K18)');  
				$this->excel->getActiveSheet()->SetCellValue('L'.$row, '=SUM(L14,L16,L18)');  
				$this->excel->getActiveSheet()->SetCellValue('M'.$row, '=SUM(M14,M16,M18)');  
				$this->excel->getActiveSheet()->SetCellValue('N'.$row, '=SUM(N14,N16,N18)');  
				$this->excel->getActiveSheet()->SetCellValue('O'.$row, '=SUM(O14,O16,O18)');  
				$this->excel->getActiveSheet()->SetCellValue('P'.$row, '=SUM(P14,P16,P18)');  
				$this->excel->getActiveSheet()->SetCellValue('Q'.$row, '=SUM(Q14,Q16,Q18)');  
				$this->excel->getActiveSheet()->SetCellValue('R'.$row, '=SUM(R14,R16,R18)');  
				$this->excel->getActiveSheet()->SetCellValue('S'.$row, '=SUM(S14,S16,S18)');  
				$this->excel->getActiveSheet()->SetCellValue('T'.$row, '=SUM(T14,T16,T18)');  
				 
				$this->excel->getActiveSheet()->getStyle("B" . $row . ":T" . $row)->getBorders()
                 ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            
			
                $filename = 'manpower_report';
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

    
	
	
    function export($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

    
    

		
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('member')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('member')
				->join('manpower', 'manpower.id=member.manpower_id', 'left')
				->join('branches', 'branches.id=member.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.member_oath_date ASC');
		  
		  
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    
			if ($branch)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch);
            

            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
 //$this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Member list');
                $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');
 

                $row = 2;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_report';
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

    
	
	
	 function exportpostpone($branch = NULL)
    {
       
 $this->sma->checkPermissions('index', TRUE);
	   if (!$this->Owner) {
           // $this->session->set_flashdata('warning', lang('access_denied'));
           // redirect($_SERVER["HTTP_REFERER"]);
        }

    
	 if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }
		
	
	
	
 
       $this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('postpone')
				->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
				->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1) 			
                ->join('branches', 'branches.id=postpone.branch', 'left') 
		        ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
		         ->order_by('postpone.id ASC');
		
		 //  $this->db->where($this->db->dbprefix('postpone') . ".end_date", '2050-12-31');
		        $this->db->where($this->db->dbprefix('manpower') . ".orgstatus_id", 1);
		    
			if ($branch)
			    $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);
            

            $q = $this->db->get();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }
 //$this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Postpone list');
				
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Postpone List');
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->start_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'postpone_report';
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

	
	
	
	  

   function sum_manpower($data, $field) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }

    function detailupdate2($branch_id = NULL)
    {
		//  $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	//$this->site->check_confirm(6, date('Y-m-d'));
	 
	$is_changeable = $this->site->check_confirm($branch_id, date('Y-m-d'));
 
	$flag = 1;
	$msg = 'done';
	if($is_changeable ) {  //&& (int)$this->input->get('value')<2
       
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
        $data=explode("@",$this->input->get_post('name'));
	   $this->site->updateData($data[1], array($data[0]=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($branch_id){

        //edu_committee@education_edu_committee

        $data=explode("@",$this->input->get_post('name'));
       
		$this->site->insertData($data[1], array('user_id'=>$this->session->userdata('user_id'),'report_year'=>date('Y'),'branch_id'=>$branch_id, 'report_type'=>$report_type['type'],$data[0]=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
         
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	   
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		    
 
  function detailupdate()
    {
		 $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	//$this->site->check_confirm(6, date('Y-m-d'));
	 
	$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
	
	$flag = 1; 	 
	$msg = 'done';
	if($is_changeable) {
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
	    $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name')=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($this->input->get_post('branch_id')){
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'report_year'=>date('Y'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	// $flag = 5;
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		
	   
	   
	   
 function getName($id = NULL)
    {
         
        $row = $this->site->getByID('manpower','id',$id);
        $this->sma->send_json(array(array('id' => $row->id, 'text' => $row->name.'('.$row->associatecode.')' )));
    }
	
	
	
}