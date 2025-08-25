<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
		//26
		$this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=26) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==26) {  //Library
			$this->departmentuser = true; 
		}
       
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
		
        // Set the department id to 26
        $this->data['department_id'] = 26;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
 
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (5)
        
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>26), 'id desc', 1, 0);
         
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


  
    function pathagar_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/pathagar-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/pathagar-bivag/'.$this->session->userdata('branch_id'));
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
        $this->db->select_sum('total_s');
        $this->db->select_sum('now_p_s');
        $this->db->select_sum('reg_st_s');
        $this->db->select_sum('reg_st_t');
        $this->db->select_sum('reg_st_w');
        $this->db->select_sum('reg_st_u');
        $this->db->select_sum('reg_is_s');
        $this->db->select_sum('reg_is_t');
        $this->db->select_sum('reg_is_w');
        $this->db->select_sum('reg_is_u');
        $this->db->select_sum('reg_re_s');
        $this->db->select_sum('reg_re_t');
        $this->db->select_sum('reg_re_w');
        $this->db->select_sum('reg_re_u');
        $this->db->select_sum('boi_s_pre');
        $this->db->select_sum('boi_t_pre');
        $this->db->select_sum('boi_w_pre');
        $this->db->select_sum('boi_u_pre'); 
        $this->db->select_sum('pre_p_s');
        $this->db->select_sum('pre_p_t');
        $this->db->select_sum('pre_p_w');
        $this->db->select_sum('pre_p_u');

        $this->db->select_sum('total_t');
        $this->db->select_sum('t_boi_s');
        $this->db->select_sum('total_w');
        $this->db->select_sum('w_boi_s');
        $this->db->select_sum('total_u');
        $this->db->select_sum('u_boi_s');
        $this->db->select_sum('inc_p_s');
        $this->db->select_sum('inc_p_t');
        $this->db->select_sum('inc_p_w');
        $this->db->select_sum('inc_p_u');
        $this->db->select_sum('boi_s');
        $this->db->select_sum('boi_t');
        $this->db->select_sum('boi_w');
        $this->db->select_sum('boi_u');
        $this->db->select_sum('boi_inc_s');
        $this->db->select_sum('boi_inc_t');
        $this->db->select_sum('boi_inc_w');
        $this->db->select_sum('boi_inc_u');
        $this->db->select_sum('dec_p_s');
        $this->db->select_sum('dec_p_t');
        $this->db->select_sum('dec_p_w');
        $this->db->select_sum('dec_p_u');
        $this->db->select_sum('dec_boi_s');
        $this->db->select_sum('dec_boi_t');
        $this->db->select_sum('dec_boi_w');
        $this->db->select_sum('dec_boi_u');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['pathagar_birdhi_garthi'] = $this->db->get('pathagar_birdhi_garthi')->first_row('array');

        $this->db->select_sum('reg_st_s');
        $this->db->select_sum('reg_st_t');
        $this->db->select_sum('reg_st_w');
        $this->db->select_sum('reg_st_u');
        $this->db->select_sum('reg_is_s');
        $this->db->select_sum('reg_is_t');
        $this->db->select_sum('reg_is_w');
        $this->db->select_sum('reg_is_u');
        $this->db->select_sum('reg_re_s');
        $this->db->select_sum('reg_re_t');
        $this->db->select_sum('reg_re_w');
        $this->db->select_sum('reg_re_u');
        $this->db->select_sum('reg_boi_b_dowah');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
         $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		
        $this->data['pathagar_register'] = $this->db->get('pathagar_register')->first_row('array');

        $this->db->select_sum('mos_p_s');
        $this->db->select_sum('mos_boi_s');
        $this->db->select_sum('mos_inc_p');
        $this->db->select_sum('mos_inc_boi');


        $this->db->select_sum('mos_p_s_pre');
        $this->db->select_sum('dec_p_mos');
        $this->db->select_sum('mos_boi_s_pre');
        $this->db->select_sum('dec_boi_mos');

        $this->db->select_sum('lal_p_pre');
        $this->db->select_sum('lal_p_now');
        $this->db->select_sum('lal_p_inc');
        $this->db->select_sum('lal_p_dec');

        $this->db->select_sum('lal_bo_pre');
        $this->db->select_sum('lal_bo_now');
        $this->db->select_sum('lal_bo_inc');
        $this->db->select_sum('lal_bo_dec');

        $this->db->select_sum('ul_p_pre');
        $this->db->select_sum('ul_p_now');
        $this->db->select_sum('ul_p_inc');
        $this->db->select_sum('ul_p_dec');

        $this->db->select_sum('ul_bo_pre');
        $this->db->select_sum('ul_bo_now');
        $this->db->select_sum('ul_bo_inc');
        $this->db->select_sum('ul_bo_dec');

        $this->db->select_sum('sep_p_pre');
        $this->db->select_sum('sep_p_now');
        $this->db->select_sum('sep_p_inc');
        $this->db->select_sum('sep_p_dec');

        $this->db->select_sum('rip_p_pre');
        $this->db->select_sum('rip_p_now');
        $this->db->select_sum('rip_p_inc');
        $this->db->select_sum('rip_p_dec');

        $this->db->select_sum('op_p_pre');
        $this->db->select_sum('op_p_now');
        $this->db->select_sum('op_p_inc');
        $this->db->select_sum('op_p_dec');

        $this->db->select_sum('op_bo_pre');
        $this->db->select_sum('op_bo_now');
        $this->db->select_sum('op_bo_inc');
        $this->db->select_sum('op_bo_dec');

        $this->db->select_sum('sep_bo_pre');
        $this->db->select_sum('sep_bo_now');
        $this->db->select_sum('sep_bo_inc');
        $this->db->select_sum('sep_bo_dec');

        $this->db->select_sum('rip_bo_pre');
        $this->db->select_sum('rip_bo_now');
        $this->db->select_sum('rip_bo_inc');
        $this->db->select_sum('rip_bo_dec');

       
        
        
        
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		
        $this->data['pathagar_mosque'] = $this->db->get('pathagar_mosque')->first_row('array');

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

        $this->data['pathagar_training_program'] = $this->db->get('pathagar_training_program')->first_row('array');
   
       
       
       
        $this->db->select_sum('shakha_total');
        $this->db->select_sum('shakha_higher_ache');
        $this->db->select_sum('shakha_higher_briddi');
        $this->db->select_sum('shakha_member_ache');
        $this->db->select_sum('shakha_member_briddi');
        $this->db->select_sum('shakha_sathi_ache');
        $this->db->select_sum('shakha_sathi_briddi');
        $this->db->select_sum('shakha_kormi_ache');
        $this->db->select_sum('shakha_kormi_briddi');
        $this->db->select_sum('shakha_school_ache');
        $this->db->select_sum('shakha_school_briddi');

        $this->db->select_sum('thana_total');
        $this->db->select_sum('thana_higher_ache');
        $this->db->select_sum('thana_higher_briddi');
        $this->db->select_sum('thana_member_ache');
        $this->db->select_sum('thana_member_briddi');
        $this->db->select_sum('thana_sathi_ache');
        $this->db->select_sum('thana_sathi_briddi');
        $this->db->select_sum('thana_kormi_ache');
        $this->db->select_sum('thana_kormi_briddi');
        $this->db->select_sum('thana_school_ache');
        $this->db->select_sum('thana_school_briddi');

        $this->db->select_sum('oard_total');
        $this->db->select_sum('oard_higher_ache');
        $this->db->select_sum('oard_higher_briddi');
        $this->db->select_sum('oard_member_ache');
        $this->db->select_sum('oard_member_briddi');
        $this->db->select_sum('oard_sathi_ache');
        $this->db->select_sum('oard_sathi_briddi');
        $this->db->select_sum('oard_kormi_ache');
        $this->db->select_sum('oard_kormi_briddi');
        $this->db->select_sum('oard_school_ache');
        $this->db->select_sum('oard_school_briddi');

        $this->db->select_sum('uposhaka_total');
        $this->db->select_sum('uposhaka_higher_ache');
        $this->db->select_sum('uposhaka_higher_briddi');
        $this->db->select_sum('uposhaka_member_ache');
        $this->db->select_sum('uposhaka_member_briddi');
        $this->db->select_sum('uposhaka_sathi_ache');
        $this->db->select_sum('uposhaka_sathi_briddi');
        $this->db->select_sum('uposhaka_kormi_ache');
        $this->db->select_sum('uposhaka_kormi_briddi');
        $this->db->select_sum('uposhaka_school_ache');
        $this->db->select_sum('uposhaka_school_briddi');

       

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['pathagar_sthorvittik_pathagar'] = $this->db->get('pathagar_sthorvittik_pathagar')->first_row('array');

    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('pathagar_sthorvittik_pathagar');
        $this->data['pathagar_sthorvittik_pathagar'] = $query->first_row('array');	


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('pathagar_training_program');
        $this->data['pathagar_training_program'] = $query->first_row('array');	
    
         
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('pathagar_birdhi_garthi');
        $this->data['pathagar_birdhi_garthi'] = $query->first_row('array');
        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('pathagar_register');
        $this->data['pathagar_register'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('pathagar_mosque');
        $this->data['pathagar_mosque'] = $query->first_row('array');

		}
		$this->data['m'] = 'library';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/library/pathagar_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/library/pathagar_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}



function getLibraryIncreaseDecrease($branch_id = NULL)
    { 
	
       // $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin || !$this->departmentuser) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        
		$delete_link = "<a href='#' class='tip po' title='<b>" . "Delete" . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('departmentsreport/deleteLibraryIncreaseDecrease/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . "Delete" . "</a>";
         
		 $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';
              
        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';
		
		  
		
	 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('library_increase_decrease') . ".id as id,  thana_name,  {$this->db->dbprefix('branches')}.name as branch_name, increase_number,decrease_number,book_decrease,book_increase,report_type,report_year", FALSE)
				->from('library_increase_decrease');
		  $this->datatables->join('branches', 'branches.id=library_increase_decrease.branch_id', 'left')
                ->where('branches.id', $branch_id); 
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('library_increase_decrease') . ".id as id, thana_name,  {$this->db->dbprefix('branches')}.name as branch_name, increase_number,decrease_number,book_decrease,book_increase,report_type,report_year", FALSE)
				->from('library_increase_decrease');
		  $this->datatables->join('branches', 'branches.id=library_increase_decrease.branch_id', 'left') ; 
        }
		
		
		
		
		
		
				
		 
         $this->datatables->add_column("Actions", $action, "id");
          
		  echo $this->datatables->generate();
		 
    	
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
