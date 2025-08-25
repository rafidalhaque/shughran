<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Poriklpona extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=20) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==20) {  //Poricolpona
			$this->departmentuser = true; 
		}
		
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 20
        $this->data['department_id'] = 20;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (20)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>20), 'id desc', 1, 0);

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
    }

    function poriklpona_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/poriklpona-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/poriklpona-bivag/'.$this->session->userdata('branch_id'));
		}

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

		if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
		    $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

		$report_type = $this->report_type();
        if ($report_type == false)
            admin_redirect();
        $this->data['report_info'] = $report_type;

		if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {
			$this->db->select_sum('shakhay_porikolpona_comitte');
			$this->db->select_sum('porikolpona_boithok');
			$this->db->select_sum('dirghomeyadi_plan');
			$this->db->select_sum('academic_output');
			$this->db->select_sum('professional_output');
			$this->db->select_sum('uni_maner_college');
			$this->db->select_sum('5_year_plan');
			$this->db->select_sum('year_plan_porjalochona');
			$this->db->select_sum('output_plan');
			$this->db->select_sum('uposhakah_s');
			$this->db->select_sum('up_p_sathi_maner');
			$this->db->select_sum('nishkriyo_theke_shokriyo');
			$this->db->select_sum('nishkriyo_up');
			$this->db->select_sum('word_num');
			$this->db->select_sum('word_p_shodossho_maner');
			$this->db->select_sum('union_num');
			$this->db->select_sum('uni_p_shodossho_maner');
			$this->db->select_sum('thana_num');
			$this->db->select_sum('2_member_at_least');
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
			$this->data['planning_shakha_plan'] = $this->db->get('planning_shakha_plan')->first_row('array');

			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
			$this->data['planning_shakha_plan_row'] = $this->db->get('planning_shakha_plan')->num_rows();

			$this->db->select_sum('mem_num');
			$this->db->select_sum('mem_plan');
			$this->db->select_sum('associate_num');
			$this->db->select_sum('associate_plan');
			$this->db->select_sum('worker_num');
			$this->db->select_sum('worker_plan');
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
			$this->data['planning_jonoshokti_plan'] = $this->db->get('planning_jonoshokti_plan')->first_row('array');
		
		
			$this->db->select_sum('shikkha_central_s');
			$this->db->select_sum('shikkha_central_p');
			$this->db->select_sum('shikkha_shakha_s');
			$this->db->select_sum('shikkha_shakha_p'); 
			$this->db->select_sum('kormoshala_central_s');
			$this->db->select_sum('kormoshala_central_p');
			$this->db->select_sum('kormoshala_shakha_s');
			$this->db->select_sum('kormoshala_shakha_p'); 
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
			$this->data['planning_training_program'] = $this->db->get('planning_training_program')->first_row('array');
	 
		}
		else{
			$this->db->select('*');
			$this->db->where('branch_id',$branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('planning_training_program');
			$this->data['planning_training_program'] = $query->first_row('array');	

			$this->db->select('*');
			$this->db->where('branch_id',$branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get("planning_shakha_plan");
			$this->data['planning_shakha_plan'] = $query->first_row('array');

			$this->db->select('*');
			$this->db->where('branch_id',$branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get("planning_jonoshokti_plan");
			$this->data['planning_jonoshokti_plan'] = $query->first_row('array');
	
		}

		$this->data['m'] = 'poriklpona';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/poriklpona/poriklpona_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/poriklpona/poriklpona_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}


function report_type1(){
	
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
	

 
 
	   

	
	
	
}
