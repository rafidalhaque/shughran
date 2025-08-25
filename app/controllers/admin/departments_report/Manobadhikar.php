<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manobadhikar extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=18) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==18) {  //Manobadhikar
			$this->departmentuser = true; 
		}
		             
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 18
        $this->data['department_id'] = 18;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (18)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>18), 'id desc', 1, 0);

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

    function manobadhikar_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/manobadhikar-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/manobadhikar-bivag/'.$this->session->userdata('branch_id'));
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
            $this->db->select_sum('human_rights_org_bool');
            $this->db->select_sum('manpower_active_bool');
            $this->db->select_sum('manpower_active_number');
            $this->db->select_sum('human_rights_committee');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_branch_info'] = $this->db->get('human_rights_branch_info')->first_row('array');
           
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_branch_info_row'] = $this->db->get('human_rights_branch_info')->num_rows();

            $this->db->select_sum('committee_member');
            $this->db->select_sum('member');
            $this->db->select_sum('associate');
            $this->db->select_sum('worker');
            $this->db->select_sum('supporter');
            $this->db->select_sum('shuva');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_branch_committee'] = $this->db->get('human_rights_branch_committee')->first_row('array');
    
            $this->db->select_sum('committee_meeting_num');
            $this->db->select_sum('committee_meeting_pre');
            $this->db->select_sum('representative_num');
            $this->db->select_sum('representative_pre');
            $this->db->select_sum('workshop_num');
            $this->db->select_sum('workshop_pre');
            $this->db->select_sum('shong_mot_num');
            $this->db->select_sum('shong_mot_pre');
            $this->db->select_sum('kormi_mot_num');
            $this->db->select_sum('kormi_mot_pre');
            $this->db->select_sum('seminer_num');
            $this->db->select_sum('seminer_pre');
            $this->db->select_sum('hr_days_num');
            $this->db->select_sum('hr_days_pre');
           
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_program'] = $this->db->get('human_rights_program')->first_row('array');

            $this->db->select_sum('bichar_bohi_num');
            $this->db->select_sum('bichar_bohi_murder');
            $this->db->select_sum('bichar_bohi_wound');
            $this->db->select_sum('bichar_bohi_atok');

            $this->db->select_sum('political_num');
            $this->db->select_sum('political_murder');
            $this->db->select_sum('political_wound');
            $this->db->select_sum('political_atok');

            $this->db->select_sum('rape_num');
            $this->db->select_sum('rape_murder');
            $this->db->select_sum('rape_wound');
            $this->db->select_sum('rape_atok');

            $this->db->select_sum('kid_num');
            $this->db->select_sum('kid_murder');
            $this->db->select_sum('kid_wound');
            $this->db->select_sum('kid_atok');

            $this->db->select_sum('gum_num');
            $this->db->select_sum('gum_murder');
            $this->db->select_sum('gum_wound');
            $this->db->select_sum('gum_atok');

            $this->db->select_sum('sangbadik_num');
            $this->db->select_sum('sangbadik_murder');
            $this->db->select_sum('sangbadik_wound');
            $this->db->select_sum('sangbadik_atok');

            $this->db->select_sum('border_num');
            $this->db->select_sum('border_murder');
            $this->db->select_sum('border_wound');
            $this->db->select_sum('border_atok');

            $this->db->select_sum('minority_num');
            $this->db->select_sum('minority_murder');
            $this->db->select_sum('minority_wound');
            $this->db->select_sum('minority_atok');
    
           
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_violation'] = $this->db->get('human_rights_violation')->first_row('array');

            $this->db->select_sum('hr_worker_num');
            $this->db->select_sum('hr_worker_count');
           
            $this->db->select_sum('hr_org_num');
            $this->db->select_sum('hr_org_count');
           
            $this->db->select_sum('shushil_num');
            $this->db->select_sum('shushil_count');
           
            $this->db->select_sum('lawyer_num');
            $this->db->select_sum('lawyer_count');
           
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_contact'] = $this->db->get('human_rights_contact')->first_row('array');

            $this->db->select_sum('law_help_num');
            $this->db->select_sum('law_help_count');
           
            $this->db->select_sum('hr_violation_num');
            $this->db->select_sum('hr_violation_count');
           
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_miscellaneous'] = $this->db->get('human_rights_miscellaneous')->first_row('array');

            $this->db->select_sum('officer_sec_ter');
            $this->db->select_sum('officer_sec_bachai');
            $this->db->select_sum('officer_mot_num');
            $this->db->select_sum('officer_mot_pre');
            $this->db->select_sum('officer_pra_shang');
            $this->db->select_sum('officer_pra_shadha');
            $this->db->select_sum('officer_xm_attend');
            $this->db->select_sum('officer_xm_pass');
            
            $this->db->select_sum('intern_sec_ter');
            $this->db->select_sum('intern_sec_bachai');
            $this->db->select_sum('intern_mot_num');
            $this->db->select_sum('intern_mot_pre');
            $this->db->select_sum('intern_pra_shang');
            $this->db->select_sum('intern_pra_shadha');
            $this->db->select_sum('intern_xm_attend');
            $this->db->select_sum('intern_xm_pass');
            
            $this->db->select_sum('volunteer_sec_ter');
            $this->db->select_sum('volunteer_sec_bachai');
            $this->db->select_sum('volunteer_mot_num');
            $this->db->select_sum('volunteer_mot_pre');
            $this->db->select_sum('volunteer_pra_shang');
            $this->db->select_sum('volunteer_pra_shadha');
            $this->db->select_sum('volunteer_xm_attend');
            $this->db->select_sum('volunteer_xm_pass');
            
           
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_rights_output'] = $this->db->get('human_rights_output')->first_row('array');

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
            $this->data['human_rights_training_program'] = $this->db->get('human_rights_training_program')->first_row('array');
        
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_training_program');
            $this->data['human_rights_training_program'] = $query->first_row('array');	
        

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_branch_info');
            $this->data['human_rights_branch_info'] = $query->first_row('array');
           
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_branch_committee');
            $this->data['human_rights_branch_committee'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_violation');
            $this->data['human_rights_violation'] = $query->first_row('array');
           
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_program');
            $this->data['human_rights_program'] = $query->first_row('array');
           
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_contact');
            $this->data['human_rights_contact'] = $query->first_row('array');
           
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_miscellaneous');
            $this->data['human_rights_miscellaneous'] = $query->first_row('array');
             
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_rights_output');
            $this->data['human_rights_output'] = $query->first_row('array');
               
        }

		$this->data['m'] = 'manobadhikar';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/manobadhikar/manobadhikar_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/manobadhikar/manobadhikar_bivag', $meta, $this->data,'leftmenu/departmentsreport');
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
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		
	   
	   
	   

	
	
	
}
