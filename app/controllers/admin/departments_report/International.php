<?php defined('BASEPATH') OR exit('No direct script access allowed');

class International extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
		
		$this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=10) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==10) {  //International
			$this->departmentuser = true; 
		}
		
      
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
  
        // Set the department id to 10
        $this->data['department_id'] = 10;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (10)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>10), 'id desc', 1, 0);
      

        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
		$this->load->helper('report');
        $this->load->admin_model('manpower_model');
		$this->load->admin_model('others_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function international_page_one($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/international-page-one/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/international-page-one/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('cgps_number');
        $this->db->select_sum('cgps_present');
        $this->db->select_sum('cgpsac_number');
        
        $this->db->select_sum('cgpsac_present');
        $this->db->select_sum('cgpsao_number');
        $this->db->select_sum('cgpsao_present');
        
        $this->db->select_sum('intconf_number');
        $this->db->select_sum('intconf_present');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['international_higher_study_program'] = $this->db->get('international_higher_study_program')->first_row('array');


        $this->db->select_sum('arabic_c_number');
        $this->db->select_sum('arabic_a_number');
        $this->db->select_sum('arabic_aa_number');
        $this->db->select_sum('arabic_ap_number');
     
        $this->db->select_sum('english_c_number');
        $this->db->select_sum('english_a_number');
        $this->db->select_sum('english_aa_number');
        $this->db->select_sum('english_ap_number');

        $this->db->select_sum('chin_c_number');
        $this->db->select_sum('chin_a_number');
        $this->db->select_sum('chin_aa_number');
        $this->db->select_sum('chin_ap_number');

        $this->db->select_sum('hindi_c_number');
        $this->db->select_sum('hindi_a_number');
        $this->db->select_sum('hindi_aa_number');
        $this->db->select_sum('hindi_ap_number');
        
        $this->db->select_sum('urdu_c_number');
        $this->db->select_sum('urdu_a_number');
        $this->db->select_sum('urdu_aa_number');
        $this->db->select_sum('urdu_ap_number');
        
        $this->db->select_sum('farsi_c_number');
        $this->db->select_sum('farsi_a_number');
        $this->db->select_sum('farsi_aa_number');
        $this->db->select_sum('farsi_ap_number');
        
        $this->db->select_sum('span_c_number');
        $this->db->select_sum('span_a_number');
        $this->db->select_sum('span_aa_number');
        $this->db->select_sum('span_ap_number');

        $this->db->select_sum('fren_c_number');
        $this->db->select_sum('fren_a_number');
        $this->db->select_sum('fren_aa_number');
        $this->db->select_sum('fren_ap_number');

        $this->db->select_sum('german_c_number');
        $this->db->select_sum('german_a_number');
        $this->db->select_sum('german_aa_number');
        $this->db->select_sum('german_ap_number');

        $this->db->select_sum('turkey_c_number');
        $this->db->select_sum('turkey_a_number');
        $this->db->select_sum('turkey_aa_number');
        $this->db->select_sum('turkey_ap_number');

        $this->db->select_sum('other_c_number');
        $this->db->select_sum('other_a_number');
        $this->db->select_sum('other_aa_number');
        $this->db->select_sum('other_ap_number');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['international_language_learn'] = $this->db->get('international_language_learn')->first_row('array');

        
 
        $this->db->select('*');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->order_by('branch_id');
        $query = $this->db->get('international_bideshe_study');
        $this->data['international_bideshe_study'] = $query;


    
        $this->db->select('*');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->order_by('branch_id');
        $query = $this->db->get('international_language_interested');
        $this->data['international_language_interested'] = $query;
        	

       
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
        $this->data['international_training_program'] = $this->db->get('international_training_program')->first_row('array');
    
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_training_program');
        $this->data['international_training_program'] = $query->first_row('array');	
    
        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_higher_study_program');
        $this->data['international_higher_study_program'] = $query->first_row('array');

       
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_language_learn');
        $this->data['international_language_learn'] = $query->first_row('array');

        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_bideshe_study');
        $this->data['international_bideshe_study'] = $query;

        
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_language_interested');
        $this->data['international_language_interested'] = $query;


        }
		$this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
       
		if($branch_id)
		$this->page_construct('departmentsreport/international/international_page_one_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/international/international_page_one', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function international_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/international-page-two/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/international-page-two/'.$this->session->userdata('branch_id'));
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

       
        $this->db->select('*');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->order_by('branch_id');
        $query = $this->db->get('international_shabek_embassy');
        $this->data['international_shabek_embassy'] = $query;
			
        $this->db->select_sum('content_share');
        $this->db->select_sum('int_realtion_student');
        $this->db->select_sum('foreigner_shabek_contact');
        $this->db->select_sum('foreigner_student');
        $this->db->select_sum('foreign_interested_scholarship');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['international_others'] = $this->db->get('international_others')->first_row('array');



        $this->db->select('*');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->order_by('branch_id');
        $query = $this->db->get('international_manpower_course');
        $this->data['international_manpower_course'] = $query;
			
        	
        $this->db->select_sum('m_mp_target');
        $this->db->select_sum('m_mp_orjon');
        $this->db->select_sum('m_phd_target');
        $this->db->select_sum('m_phd_orjon');
        $this->db->select_sum('m_f_hs_target');
        $this->db->select_sum('m_f_hs_orjon');
        $this->db->select_sum('m_f_phd_target');
        $this->db->select_sum('m_f_phd_orjon');
        $this->db->select_sum('m_f_s_target');
        $this->db->select_sum('m_f_s_orjon');
        $this->db->select_sum('m_f_t_target');
        $this->db->select_sum('m_f_t_orjon');
        $this->db->select_sum('m_btl_target');
        $this->db->select_sum('m_btl_target');

        $this->db->select_sum('a_mp_target');
        $this->db->select_sum('a_mp_orjon');
        $this->db->select_sum('a_phd_target');
        $this->db->select_sum('a_phd_orjon');
        $this->db->select_sum('a_f_hs_target');
        $this->db->select_sum('a_f_hs_orjon');
        $this->db->select_sum('a_f_phd_target');
        $this->db->select_sum('a_f_phd_orjon');
        $this->db->select_sum('a_f_s_target');
        $this->db->select_sum('a_f_s_orjon');
        $this->db->select_sum('a_f_t_target');
        $this->db->select_sum('a_f_t_orjon');
        $this->db->select_sum('a_btl_target');
        $this->db->select_sum('a_btl_orjon');

        $this->db->select_sum('w_mp_target');
        $this->db->select_sum('w_mp_orjon');
        $this->db->select_sum('w_phd_target');
        $this->db->select_sum('w_phd_orjon');
        $this->db->select_sum('w_f_hs_target');
        $this->db->select_sum('w_f_hs_orjon');
        $this->db->select_sum('w_f_phd_target');
        $this->db->select_sum('w_f_phd_orjon');
        $this->db->select_sum('w_f_s_target');
        $this->db->select_sum('w_f_s_orjon');
        $this->db->select_sum('w_f_t_target');
        $this->db->select_sum('w_f_t_orjon');
        $this->db->select_sum('w_btl_target');
        $this->db->select_sum('w_btl_orjon');

        $this->db->select_sum('s_mp_target');
        $this->db->select_sum('s_mp_orjon');
        $this->db->select_sum('s_phd_target');
        $this->db->select_sum('s_phd_orjon');
        $this->db->select_sum('s_f_hs_target');
        $this->db->select_sum('s_f_hs_orjon');
        $this->db->select_sum('s_f_phd_target');
        $this->db->select_sum('s_f_phd_orjon');
        $this->db->select_sum('s_f_s_target');
        $this->db->select_sum('s_f_s_orjon');
        $this->db->select_sum('s_f_t_target');
        $this->db->select_sum('s_f_t_orjon');
        $this->db->select_sum('s_btl_target');
        $this->db->select_sum('s_btl_orjon');    
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['international_pro_outuput'] = $this->db->get('international_pro_outuput')->first_row('array');


        }
        else{

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_shabek_embassy');
        $this->data['international_shabek_embassy'] = $query;

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_manpower_course');
        $this->data['international_manpower_course'] = $query;
  
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_others');
        $this->data['international_others'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('international_pro_outuput');
        $this->data['international_pro_outuput'] = $query->first_row('array');



        }

        $this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/international/international_page_two_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/international/international_page_two', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_international_bideshe_study($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-international-bideshe-study/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-international-bideshe-study/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('international_bideshe_study'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['name']=$this->input->post('name');
			$data['country']=$this->input->post('country');
            $data['last_sang_man']=$this->input->post('last_sang_man');
			$data['last_dayitto']=$this->input->post('last_dayitto');
            $data['education']=$this->input->post('education');
            $data['online_number']=$this->input->post('online_number');
			$this->site->insertData('international_bideshe_study',$data);
            header("Location: ".admin_url('departmentsreport/international-page-one/'.$this->data['branch_id']));
        }
        if($this->input->post('international_bideshe_study_update'))
		{ 
            $data['name']=$this->input->post('name');
			$data['country']=$this->input->post('country');
            $data['last_sang_man']=$this->input->post('last_sang_man');
			$data['last_dayitto']=$this->input->post('last_dayitto');
            $data['education']=$this->input->post('education');
            $data['online_number']=$this->input->post('online_number');
			$this->site->updateData('international_bideshe_study',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/international-page-one/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['international_bideshe_study'] = $this->db->get('international_bideshe_study')->first_row('array');

        }

        $this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/international/add_international_bideshe_study', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_international_language_interested($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-international-language-interested/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-international-language-interested/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('international_language_interested'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['name']=$this->input->post('name');
			$data['sang_man']=$this->input->post('sang_man');
            $data['bivag']=$this->input->post('bivag');
			$data['target_country']=$this->input->post('target_country');
            $data['online_number']=$this->input->post('online_number');
			$this->site->insertData('international_language_interested',$data);
            header("Location: ".admin_url('departmentsreport/international-page-one/'.$this->data['branch_id']));
        }
        if($this->input->post('international_language_interested_update'))
		{ 
            $data['name']=$this->input->post('name');
			$data['sang_man']=$this->input->post('sang_man');
            $data['bivag']=$this->input->post('bivag');
			$data['target_country']=$this->input->post('target_country');
            $data['online_number']=$this->input->post('online_number');
			$this->site->updateData('international_language_interested',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/international-page-one/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['international_language_interested'] = $this->db->get('international_language_interested')->first_row('array');

        }

        $this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/international/add_international_language_interested', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_international_shabek_embassy($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-international-shabek-embassy/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-international-shabek-embassy/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('international_shabek_embassy'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['name']=$this->input->post('name');
			$data['embassy']=$this->input->post('embassy');
            $data['last_dayitto']=$this->input->post('last_dayitto');;
			$this->site->insertData('international_shabek_embassy',$data);
            header("Location: ".admin_url('departmentsreport/international-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('international_shabek_embassy_update'))
		{ 
            $data['name']=$this->input->post('name');
			$data['embassy']=$this->input->post('embassy');
            $data['last_dayitto']=$this->input->post('last_dayitto');
			$this->site->updateData('international_shabek_embassy',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/international-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['international_shabek_embassy'] = $this->db->get('international_shabek_embassy')->first_row('array');

        }

        $this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/international/add_international_shabek_embassy', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function add_international_manpower_course($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-international-manpower-course/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-international-manpower-course/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('international_manpower_course'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['name']=$this->input->post('name');
			$data['type']=$this->input->post('type');
            $data['ielts_result']=$this->input->post('ielts_result');
			$data['comment']=$this->input->post('comment');
			$this->site->insertData('international_manpower_course',$data);
            header("Location: ".admin_url('departmentsreport/international-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('international_manpower_course_update'))
		{ 
            $data['name']=$this->input->post('name');
			$data['type']=$this->input->post('type');
            $data['ielts_result']=$this->input->post('ielts_result');
			$data['comment']=$this->input->post('comment');
			$this->site->updateData('international_manpower_course',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/international-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['international_manpower_course'] = $this->db->get('international_manpower_course')->first_row('array');

        }

        $this->data['m'] = 'international';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/international/add_international_manpower_course', $meta, $this->data,'leftmenu/departmentsreport');
    }



function delete_row(){
    $this->db->where("id", $this->input->get('id'));
    $this->db->delete($this->input->get('table'));
    return true;

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
