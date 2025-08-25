<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ChatroAndolon extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=14) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==14) {  //ChatroAndolon
			$this->departmentuser = true; 
		}
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 14
        $this->data['department_id'] = 14;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  14)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>14), 'id desc', 1, 0);

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

    function chatro_andolon_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/chatro-andolon-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/chatro-andolon-bivag/'.$this->session->userdata('branch_id'));
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

            $this->db->select_sum('side_ss');
            $this->db->select_sum('side_reg');
            $this->db->select_sum('side_n_reg');
            $this->db->select_sum('side_inc');
            $this->db->select_sum('side_dec');
            $this->db->select_sum('side_act');
            $this->db->select_sum('social_ss');
            $this->db->select_sum('social_reg');
            $this->db->select_sum('social_n_reg');
            $this->db->select_sum('social_inc');
            $this->db->select_sum('social_dec');
            $this->db->select_sum('social_act');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['chatroandolon_songothon'] = $this->db->get('chatroandolon_songothon')->first_row('array');
        
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');  
            $this->data['chatroandolon_institution'] = $this->db->get('chatroandolon_institution');
        
            $this->db->select_sum('kj_shi');
            $this->db->select_sum('kj_kmkt');
            $this->db->select_sum('kj_koca');
            $this->db->select_sum('kj_assu');
            $this->db->select_sum('kj_bnsgsa');
            $this->db->select_sum('kb_shi');
            $this->db->select_sum('kb_kmkt');
            $this->db->select_sum('kb_koca');
            $this->db->select_sum('kb_assu');
            $this->db->select_sum('kb_bnsgsa');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
            $this->data['chatroandolon_bivag_jogajog'] = $this->db->get('chatroandolon_bivag_jogajog')->first_row('array');
        
     
            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');  
            $this->data['chatroandolon_sonsod'] = $this->db->get('chatroandolon_sonsod');
        
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

			$this->data['chatroandolon_training_program'] = $this->db->get('chatroandolon_training_program')->first_row('array');
	 
		}
		else{
			$this->db->select('*');
			$this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('chatroandolon_training_program');
			$this->data['chatroandolon_training_program'] = $query->first_row('array');	

                $this->db->select('*');
                $this->db->where('branch_id',$branch_id);
                $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
 
                $query = $this->db->get('chatroandolon_songothon');
                $this->data['chatroandolon_songothon'] = $query->first_row('array');
        
                $this->db->select('*');
                $this->db->where('branch_id',$branch_id);
                $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
 
                $query = $this->db->get('chatroandolon_institution');
                $this->data['chatroandolon_institution'] = $query;

                $this->db->select('*');
                $this->db->where('branch_id',$branch_id);
                $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
                $query = $this->db->get('chatroandolon_bivag_jogajog');
                $this->data['chatroandolon_bivag_jogajog'] = $query->first_row('array');
                
                $this->db->select('*');
                $this->db->where('branch_id',$branch_id);
                $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
                $query = $this->db->get('chatroandolon_sonsod');
                $this->data['chatroandolon_sonsod'] = $query;
        
        
             }
        

		$this->data['m'] = 'chatro_andolon';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/chatroAndolon/chatro_andolon_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/chatroAndolon/chatro_andolon_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function add_chatroandolon_institution($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-chatroandolon-institution/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-chatroandolon-institution/'.$this->session->userdata('branch_id'));
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

        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();
        
		if($this->input->post('chatroandolon_institution'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['ins_name']=$this->input->post('ins_name');
			$data['son_type']=$this->input->post('son_type');
			$data['comm_lig']=$this->input->post('comm_lig');
            $data['comm_dol']=$this->input->post('comm_dol');
            $data['comm_left']=$this->input->post('comm_left');
			$this->site->insertData('chatroandolon_institution',$data);
            header("Location: ".admin_url('departmentsreport/chatro-andolon-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('chatroandolon_institution_update'))
		{ 
            $data['ins_name']=$this->input->post('ins_name');
			$data['son_type']=$this->input->post('son_type');
			$data['comm_lig']=$this->input->post('comm_lig');
            $data['comm_dol']=$this->input->post('comm_dol');
            $data['comm_left']=$this->input->post('comm_left');
			$this->site->updateData('chatroandolon_institution',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/chatro-andolon-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['chatroandolon_institution'] = $this->db->get('chatroandolon_institution')->first_row('array');

        }

        $this->data['m'] = 'chatro_andolon';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/chatroAndolon/add_chatroandolon_institution', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_chatroandolon_sonsod($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-chatroandolon-sonsod/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-chatroandolon-sonsod/'.$this->session->userdata('branch_id'));
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

        $last_year =  date("Y",strtotime("-1 year"));
        $report_type = $this->report_type();
        
		if($this->input->post('chatroandolon_sonsod'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['imp_ins']=$this->input->post('imp_ins');
			$data['sonsod_act']=$this->input->post('sonsod_act');
            $data['sonsod_vote']=$this->input->post('sonsod_vote');
			$data['sonsod_rulling_party']=$this->input->post('sonsod_rulling_party');
			$data['next_sonsod_panel']=$this->input->post('next_sonsod_panel');
			$this->site->insertData('chatroandolon_sonsod',$data);
            header("Location: ".admin_url('departmentsreport/chatro-andolon-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('chatroandolon_sonsod_update'))
		{ 
            $data['imp_ins']=$this->input->post('imp_ins');
			$data['sonsod_act']=$this->input->post('sonsod_act');
            $data['sonsod_vote']=$this->input->post('sonsod_vote');
			$data['sonsod_rulling_party']=$this->input->post('sonsod_rulling_party');
			$data['next_sonsod_panel']=$this->input->post('next_sonsod_panel');
			$this->site->updateData('chatroandolon_sonsod',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/chatro-andolon-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['chatroandolon_sonsod'] = $this->db->get('chatroandolon_sonsod')->first_row('array');

        }

        $this->data['m'] = 'chatro_andolon';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/chatroAndolon/add_chatroandolon_sonsod', $meta, $this->data,'leftmenu/departmentsreport');
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
