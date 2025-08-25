<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

		$this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=27) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==27) {  // Information
			$this->departmentuser = true; 
		}
		      
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id to 27
        $this->data['department_id'] = 27;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (27)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>27), 'id desc', 1, 0);
     

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

    function information_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/information-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/information-bivag/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('pk_bn');
        $this->db->select_sum('pk_sts');
        $this->db->select_sum('kdr_bn');
        $this->db->select_sum('kdr_sts');
        $this->db->select_sum('bul_bn');
        $this->db->select_sum('bul_sts');
        $this->db->select_sum('pt_bn');
        $this->db->select_sum('pt_sts');
        $this->db->select_sum('onnoanno_bn');
        $this->db->select_sum('onnoanno_sts');
   
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['information_nij_shakha_theke_prokashito_prokashona'] = $this->db->get('information_nij_shakha_theke_prokashito_prokashona')->first_row('array');

        $this->db->select('*');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"'); 
        $query = $this->db->get('information_sharok');
        $this->data['information_sharok'] = $query;

        $this->db->select_sum('shkh_bps');
        $this->db->select_sum('shkh_kpchshho');
        $this->db->select_sum('shkh_shichs');
        $this->db->select_sum('thnord_bps');
        $this->db->select_sum('thnord_kpchshho');
        $this->db->select_sum('thnord_shichs');
  
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');  
        $this->data['information_chobi_songroho'] = $this->db->get('information_chobi_songroho')->first_row('array');

        $this->db->select_sum('br_p_s');
        $this->db->select_sum('br_p_v_s');
        $this->db->select_sum('br_v_s');
        $this->db->select_sum('th_p_s');
        $this->db->select_sum('th_p_v_s');
        $this->db->select_sum('th_v_s');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"'); 
        
        $this->data['information_vedio_sonrokkhon'] = $this->db->get('information_vedio_sonrokkhon')->first_row('array');

        $this->db->select_sum('pk_potvs');
        $this->db->select_sum('pk_ns');
        $this->db->select_sum('pk_arc');
        $this->db->select_sum('onlinepk_potvs');
        $this->db->select_sum('onlinepk_ns');
        $this->db->select_sum('onlinepk_arc');
        $this->db->select_sum('tv_potvs');
        $this->db->select_sum('tv_ns');
        $this->db->select_sum('tv_arc');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');  
        
        $this->data['information_potrika_online_tv_kating_songroho'] = $this->db->get('information_potrika_online_tv_kating_songroho')->first_row('array');

          
  
        $this->db->select_sum('syb_s');
        $this->db->select_sum('syb_ss');
        $this->db->select_sum('sbkb_s');
        $this->db->select_sum('sbkb_ss');
        $this->db->select_sum('thoshts_s');
        $this->db->select_sum('thoshts_ss');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        
        $this->data['information_karjobiboroni_sonrokkhon'] = $this->db->get('information_karjobiboroni_sonrokkhon')->first_row('array');


        $this->db->select_sum('ch_ss');
        $this->db->select_sum('vdo_ss');
        $this->db->select_sum('shpnt_ss');
        $this->db->select_sum('dr_ss');
        $this->db->select_sum('shjbr_ss');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
         
        $this->data['information_shohid_vaideri_songrihito'] = $this->db->get('information_shohid_vaideri_songrihito')->first_row('array');
 
        $this->db->select('*');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->order_by('branch_id'); 
        $query = $this->db->get('information_file_sonrokkhon');
        $this->data['information_file_sonrokkhon'] = $query;

        $this->db->select_sum('info_house');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');  
        $query = $this->db->get('information_house');
        $this->data['information_house'] = $query->first_row('array');

        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"'); 
        $query = $this->db->get('information_house');
        $this->data['total_information_house_row'] = $query->num_rows();
  
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
        $this->data['information_training_program'] = $this->db->get('information_training_program')->first_row('array');
    
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('information_training_program');
        $this->data['information_training_program'] = $query->first_row('array');	
    
       
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
 
        $query = $this->db->get('information_nij_shakha_theke_prokashito_prokashona');
        $this->data['information_nij_shakha_theke_prokashito_prokashona'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

        $query = $this->db->get('information_sharok');
        $this->data['information_sharok'] = $query;

        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('information_chobi_songroho');
        $this->data['information_chobi_songroho'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
        $query = $this->db->get('information_vedio_sonrokkhon');
        $this->data['information_vedio_sonrokkhon'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('information_potrika_online_tv_kating_songroho');
        $this->data['information_potrika_online_tv_kating_songroho'] = $query->first_row('array');

        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
        $query = $this->db->get('information_karjobiboroni_sonrokkhon');
        $this->data['information_karjobiboroni_sonrokkhon'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
        $query = $this->db->get('information_shohid_vaideri_songrihito');
        $this->data['information_shohid_vaideri_songrihito'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
  
        $query = $this->db->get('information_file_sonrokkhon');
        $this->data['information_file_sonrokkhon'] = $query;

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
  
        $query = $this->db->get('information_house');
        $this->data['information_house'] = $query->first_row('array');

    }
  
      

// $this->sma->print_arrays($this->data);

      

		$this->data['m'] = 'information';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);


        // $this->sma->print_arrays($this->data['information_karjobiboroni_sonrokkhon']);



        
		if($branch_id)
		$this->page_construct('departmentsreport/information/information_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/information/information_bivag', $meta, $this->data,'leftmenu/departmentsreport');
	}


    function add_information_file_sonrokkhon($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-information-file-sonrokkhon/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-information-file-sonrokkhon/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('information_file_sonrokkhon'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['file_type']=$this->input->post('file_type');
			$data['file_des']=$this->input->post('file_des');
			$data['file_s']=$this->input->post('file_s');
            $data['file_scan']=$this->input->post('file_scan');
			$this->site->insertData('information_file_sonrokkhon',$data);
            header("Location: ".admin_url('departmentsreport/information-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('information_file_sonrokkhon_update'))
		{ 
            $data['user_id']=$this->session->userdata('user_id');
            $data['file_type']=$this->input->post('file_type');
			$data['file_des']=$this->input->post('file_des');
			$data['file_s']=$this->input->post('file_s');
            $data['file_scan']=$this->input->post('file_scan');
			$this->site->updateData('information_file_sonrokkhon',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/information-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['information_file_sonrokkhon'] = $this->db->get('information_file_sonrokkhon')->first_row('array');

        }

        $this->data['m'] = 'information';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/information/add_information_file_sonrokkhon', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_information_sharok($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-information-sharok/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-international-sharok/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('information_sharok'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['sharok_type']=$this->input->post('sharok_type');
			$data['sharok_name']=$this->input->post('sharok_name');
            $data['sharok_s']=$this->input->post('sharok_s');
			$data['sharok_ss']=$this->input->post('sharok_ss');
			$this->site->insertData('information_sharok',$data);
            header("Location: ".admin_url('departmentsreport/information-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('information_sharok_update'))
		{ 
            $data['user_id']=$this->session->userdata('user_id');
            $data['sharok_type']=$this->input->post('sharok_type');
			$data['sharok_name']=$this->input->post('sharok_name');
            $data['sharok_s']=$this->input->post('sharok_s');
			$data['sharok_ss']=$this->input->post('sharok_ss');
			$this->site->updateData('information_sharok',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/information-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['information_sharok'] = $this->db->get('information_sharok')->first_row('array');

        }

        $this->data['m'] = 'information';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/information/add_information_sharok', $meta, $this->data,'leftmenu/departmentsreport');
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
