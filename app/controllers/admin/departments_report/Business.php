<?php defined('BASEPATH') or exit('No direct script access allowed');

class Business extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 44) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 44) { //Business
            $this->departmentuser = true;
        }

     
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 44
        $this->data['department_id'] = 44;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  44)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>44), 'id desc', 1, 0);
            

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

    public function business_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/business-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/business-page-one/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : null;
        } else {
            $this->data['branches'] = null;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : null;
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

            $this->db->select_sum('shikkha_shompadok');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies'] = $this->db->get('business_studies')->first_row('array');
            
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_row'] = $this->db->get('business_studies')->num_rows();
            
            $this->db->select_sum('member_total');
            $this->db->select_sum('member_bs_maddhomik');
            $this->db->select_sum('member_bs_uccho_maddhomik');
            $this->db->select_sum('member_bs_snatok');
            $this->db->select_sum('member_bs_snatokottor');
            $this->db->select_sum('member_orthoniti_snatok');
            $this->db->select_sum('member_orthoniti_snatokottor');
            $this->db->select_sum('member_ebochore');
            $this->db->select_sum('sathi_total');
            $this->db->select_sum('sathi_bs_maddhomik');
            $this->db->select_sum('sathi_bs_uccho_maddhomik');
            $this->db->select_sum('sathi_bs_snatok');
            $this->db->select_sum('sathi_bs_snatokottor');
            $this->db->select_sum('sathi_orthoniti_snatok');
            $this->db->select_sum('sathi_orthoniti_snatokottor');
            $this->db->select_sum('sathi_ebochore');
            $this->db->select_sum('kormi_total');
            $this->db->select_sum('kormi_bs_maddhomik');
            $this->db->select_sum('kormi_bs_uccho_maddhomik');
            $this->db->select_sum('kormi_bs_snatok');
            $this->db->select_sum('kormi_bs_snatokottor');
            $this->db->select_sum('kormi_orthoniti_snatok');
            $this->db->select_sum('kormi_orthoniti_snatokottor');
            $this->db->select_sum('kormi_ebochore');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_manpower'] = $this->db->get('business_studies_manpower')->first_row('array');
            
            $this->db->select_sum('bebsha_shikkha_total');
            $this->db->select_sum('bebsha_shikkha_kormi');
            $this->db->select_sum('bebsha_shikkha_sathi');
            $this->db->select_sum('bebsha_shikkha_shodossho');
            $this->db->select_sum('bebsha_shikkha_talika_kotojoner');
            $this->db->select_sum('sthanio_jatio_total');
            $this->db->select_sum('sthanio_jatio_kormi');
            $this->db->select_sum('sthanio_jatio_sathi');
            $this->db->select_sum('sthanio_jatio_shodossho');
            $this->db->select_sum('sthanio_jatio_talika_kotojoner');
            $this->db->select_sum('business_uddokta_total');
            $this->db->select_sum('business_uddokta_kormi');
            $this->db->select_sum('business_uddokta_sathi');
            $this->db->select_sum('business_uddokta_shodossho');
            $this->db->select_sum('business_uddokta_talika_kotojoner');
            $this->db->select_sum('orthoniti_bid_total');
            $this->db->select_sum('orthoniti_bid_kormi');
            $this->db->select_sum('orthoniti_bid_sathi');
            $this->db->select_sum('orthoniti_bid_shodossho');
            $this->db->select_sum('orthoniti_bid_talika_kotojoner');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_talika'] = $this->db->get('business_studies_talika')->first_row('array');
            
            $this->db->select_sum('high_study_prep');
            $this->db->select_sum('high_study_gomon');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_high_study_shomporkito'] = $this->db->get('business_studies_high_study_shomporkito')->first_row('array');
            
            $this->db->select_sum('amader_niyontrone');
            $this->db->select_sum('committe_ache');
            $this->db->select_sum('club_mem');
            $this->db->select_sum('onno_club_e_manpower');
            $this->db->select_sum('kotojon_manpower');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_business_club'] = $this->db->get('business_studies_business_club')->first_row('array');
            
            $this->db->select_sum('career_guidleline_pro_num');
            $this->db->select_sum('career_guidleline_pro_pre');
            $this->db->select_sum('career_guidleline_pro_com');
            $this->db->select_sum('bus_stu_quiz_num');
            $this->db->select_sum('bus_stu_quiz_pre');
            $this->db->select_sum('bus_stu_quiz_com');
            $this->db->select_sum('skill_dev_pre_num');
            $this->db->select_sum('skill_dev_pre_pre');
            $this->db->select_sum('skill_dev_pre_com');
            $this->db->select_sum('snatok_snatok_uttor_num');
            $this->db->select_sum('snatok_snatok_uttor_pre');
            $this->db->select_sum('snatok_snatok_uttor_com');
            $this->db->select_sum('bus_stu_olympiad_num');
            $this->db->select_sum('bus_stu_olympiad_pre');
            $this->db->select_sum('bus_stu_olympiad_com');
            $this->db->select_sum('sem_workshop_case_study_num');
            $this->db->select_sum('sem_workshop_case_study_pre');
          
            $this->db->select_sum('job_fear_num');
            $this->db->select_sum('job_fear_pre');
      
            $this->db->select_sum('bus_uddokta_num');
            $this->db->select_sum('bus_uddokta_pre');
          
            $this->db->select_sum('orthonitibid_create_workshop_num');
            $this->db->select_sum('orthonitibid_create_workshop_pre');
          
            $this->db->select_sum('orthonitibid_create_prog_num');
            $this->db->select_sum('orthonitibid_create_prog_pre');
            
            $this->db->select_sum('orthonitibid_motobinimoy_num');
            $this->db->select_sum('orthonitibid_motobinimoy_pre');
           
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
        
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['business_studies_bishesh_program'] = $this->db->get('business_studies_bishesh_program')->first_row('array');

            
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

            $this->data['business_studies_training_program'] = $this->db->get('business_studies_training_program')->first_row('array');
        
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_training_program');
            $this->data['business_studies_training_program'] = $query->first_row('array');	
        

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies');
            $this->data['business_studies'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_manpower');
            $this->data['business_studies_manpower'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_talika');
            $this->data['business_studies_talika'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_high_study_shomporkito');
            $this->data['business_studies_high_study_shomporkito'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_business_club');
            $this->data['business_studies_business_club'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('business_studies_bishesh_program');
            $this->data['business_studies_bishesh_program'] = $query->first_row('array');

        }

        $this->data['m'] = 'business';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/business/business_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/business/business_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function business_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/business-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/business-page-two/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || $this->departmentuser || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : null;
        } else {
            $this->data['branches'] = null;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : null;
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
  
   
        $this->db->select_sum('gpa_maddho_kormi_ter');
        $this->db->select_sum('gpa_maddho_kormi_orj');
        $this->db->select_sum('gpa_maddho_sathi_ter');
        $this->db->select_sum('gpa_maddho_sathi_orj');
        $this->db->select_sum('gpa_maddho_shod_ter');
        $this->db->select_sum('gpa_maddho_shod_orj');
        $this->db->select_sum('gpa_ucch_maddho_kormi_ter');
        $this->db->select_sum('gpa_ucch_maddho_kormi_orj');
        $this->db->select_sum('gpa_ucch_maddho_sathi_ter');
        $this->db->select_sum('gpa_ucch_maddho_sathi_orj');
        $this->db->select_sum('gpa_ucch_maddho_shod_ter');
        $this->db->select_sum('gpa_ucch_maddho_shod_orj');
        $this->db->select_sum('bus_1to5_snatok_kormi_ter');
        $this->db->select_sum('bus_1to5_snatok_kormi_orj');
        $this->db->select_sum('bus_1to5_snatok_sathi_ter');
        $this->db->select_sum('bus_1to5_snatok_sathi_orj');
        $this->db->select_sum('bus_1to5_snatok_shod_ter');
        $this->db->select_sum('bus_1to5_snatok_shod_orj');
        $this->db->select_sum('bus_1to5_snatok_uttor_kormi_ter');
        $this->db->select_sum('bus_1to5_snatok_uttor_kormi_orj');
        $this->db->select_sum('bus_1to5_snatok_uttor_sathi_ter');
        $this->db->select_sum('bus_1to5_snatok_uttor_sathi_orj');
        $this->db->select_sum('bus_1to5_snatok_uttor_shod_ter');
        $this->db->select_sum('bus_1to5_snatok_uttor_shod_orj');
        $this->db->select_sum('ortho_1to5_snatok_kormi_ter');
        $this->db->select_sum('ortho_1to5_snatok_kormi_orj');
        $this->db->select_sum('ortho_1to5_snatok_sathi_ter');
        $this->db->select_sum('ortho_1to5_snatok_sathi_orj');
        $this->db->select_sum('ortho_1to5_snatok_shod_ter');
        $this->db->select_sum('ortho_1to5_snatok_shod_orj');
        $this->db->select_sum('ortho_1to5_snatok_uttor_kormi_ter');
        $this->db->select_sum('ortho_1to5_snatok_uttor_kormi_orj');
        $this->db->select_sum('ortho_1to5_snatok_uttor_sathi_ter');
        $this->db->select_sum('ortho_1to5_snatok_uttor_sathi_orj');
        $this->db->select_sum('ortho_1to5_snatok_uttor_shod_ter');
        $this->db->select_sum('ortho_1to5_snatok_uttor_shod_orj');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['business_studies_academic_output'] = $this->db->get('business_studies_academic_output')->first_row('array');

        $this->db->select_sum('shod_m_phil');
        $this->db->select_sum('shod_phd');
        $this->db->select_sum('shod_ca');
        $this->db->select_sum('shod_acca');
        $this->db->select_sum('shod_cma');
        $this->db->select_sum('shod_cisa');
        $this->db->select_sum('shod_cfa');
        $this->db->select_sum('shod_bibm');
        $this->db->select_sum('shod_others');
        $this->db->select_sum('sathi_m_phil');
        $this->db->select_sum('sathi_phd');
        $this->db->select_sum('sathi_ca');
        $this->db->select_sum('sathi_acca');
        $this->db->select_sum('sathi_cma');
        $this->db->select_sum('sathi_cisa');
        $this->db->select_sum('sathi_cfa');
        $this->db->select_sum('sathi_bibm');
        $this->db->select_sum('sathi_others');
        $this->db->select_sum('kormi_m_phil');
        $this->db->select_sum('kormi_phd');
        $this->db->select_sum('kormi_ca');
        $this->db->select_sum('kormi_acca');
        $this->db->select_sum('kormi_cma');
        $this->db->select_sum('kormi_cisa');
        $this->db->select_sum('kormi_cfa');
        $this->db->select_sum('kormi_bibm');
        $this->db->select_sum('kormi_others');
        $this->db->select_sum('shomorthok_m_phil');
        $this->db->select_sum('shomorthok_phd');
        $this->db->select_sum('shomorthok_ca');
        $this->db->select_sum('shomorthok_acca');
        $this->db->select_sum('shomorthok_cma');
        $this->db->select_sum('shomorthok_cisa');
        $this->db->select_sum('shomorthok_cfa');
        $this->db->select_sum('shomorthok_bibm');
        $this->db->select_sum('shomorthok_others');
        $this->db->select_sum('shabek_m_phil');
        $this->db->select_sum('shabek_phd');
        $this->db->select_sum('shabek_ca');
        $this->db->select_sum('shabek_acca');
        $this->db->select_sum('shabek_cma');
        $this->db->select_sum('shabek_cisa');
        $this->db->select_sum('shabek_cfa');
        $this->db->select_sum('shabek_bibm');
        $this->db->select_sum('shabek_others');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['business_studies_pro_outpur_degree'] = $this->db->get('business_studies_pro_outpur_degree')->first_row('array');

        $this->db->select_sum('shod_m_phil_ter');
        $this->db->select_sum('shod_m_phil_orj');
        $this->db->select_sum('shod_phd_ter');
        $this->db->select_sum('shod_phd_orj');
        $this->db->select_sum('shod_ca_ter');
        $this->db->select_sum('shod_ca_orj');
        $this->db->select_sum('shod_acca_ter');
        $this->db->select_sum('shod_acca_orj');
        $this->db->select_sum('shod_cma_ter');
        $this->db->select_sum('shod_cma_orj');
        $this->db->select_sum('sathi_m_phil_ter');
        $this->db->select_sum('sathi_m_phil_orj');
        $this->db->select_sum('sathi_phd_ter');
        $this->db->select_sum('sathi_phd_orj');
        $this->db->select_sum('sathi_ca_ter');
        $this->db->select_sum('sathi_ca_orj');
        $this->db->select_sum('sathi_acca_ter');
        $this->db->select_sum('sathi_acca_orj');
        $this->db->select_sum('sathi_cma_ter');
        $this->db->select_sum('sathi_cma_orj');
        $this->db->select_sum('kormi_m_phil_ter');
        $this->db->select_sum('kormi_m_phil_orj');
        $this->db->select_sum('kormi_phd_ter');
        $this->db->select_sum('kormi_phd_orj');
        $this->db->select_sum('kormi_ca_ter');
        $this->db->select_sum('kormi_ca_orj');
        $this->db->select_sum('kormi_acca_ter');
        $this->db->select_sum('kormi_acca_orj');
        $this->db->select_sum('kormi_cma_ter');
        $this->db->select_sum('kormi_cma_orj');
        $this->db->select_sum('shomorthok_m_phil_ter');
        $this->db->select_sum('shomorthok_m_phil_orj');
        $this->db->select_sum('shomorthok_phd_ter');
        $this->db->select_sum('shomorthok_phd_orj');
        $this->db->select_sum('shomorthok_ca_ter');
        $this->db->select_sum('shomorthok_ca_orj');
        $this->db->select_sum('shomorthok_acca_ter');
        $this->db->select_sum('shomorthok_acca_orj');
        $this->db->select_sum('shomorthok_cma_ter');
        $this->db->select_sum('shomorthok_cma_orj');
        $this->db->select_sum('shabek_m_phil_ter');
        $this->db->select_sum('shabek_m_phil_orj');
        $this->db->select_sum('shabek_phd_ter');
        $this->db->select_sum('shabek_phd_orj');
        $this->db->select_sum('shabek_ca_ter');
        $this->db->select_sum('shabek_ca_orj');
        $this->db->select_sum('shabek_acca_ter');
        $this->db->select_sum('shabek_acca_orj');
        $this->db->select_sum('shabek_cma_ter');
        $this->db->select_sum('shabek_cma_orj');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['business_studies_pro_output_pro_degree'] = $this->db->get('business_studies_pro_output_pro_degree')->first_row('array');

        $this->db->select_sum('shod_banker_ter');
        $this->db->select_sum('shod_banker_orj');
        $this->db->select_sum('shod_porishongkhanbid_ter');
        $this->db->select_sum('shod_porishongkhanbid_orj');
        $this->db->select_sum('shod_orthonitibid_ter');
        $this->db->select_sum('shod_orthonitibid_orj');
        $this->db->select_sum('shod_uddokta_ter');
        $this->db->select_sum('shod_uddokta_orj');
        $this->db->select_sum('shod_businessman_ter');
        $this->db->select_sum('shod_businessman_orj');
        $this->db->select_sum('sathi_banker_ter');
        $this->db->select_sum('sathi_banker_orj');
        $this->db->select_sum('sathi_porishongkhanbid_ter');
        $this->db->select_sum('sathi_porishongkhanbid_orj');
        $this->db->select_sum('sathi_orthonitibid_ter');
        $this->db->select_sum('sathi_orthonitibid_orj');
        $this->db->select_sum('sathi_uddokta_ter');
        $this->db->select_sum('sathi_uddokta_orj');
        $this->db->select_sum('sathi_businessman_ter');
        $this->db->select_sum('sathi_businessman_orj');
        $this->db->select_sum('kormi_banker_ter');
        $this->db->select_sum('kormi_banker_orj');
        $this->db->select_sum('kormi_porishongkhanbid_ter');
        $this->db->select_sum('kormi_porishongkhanbid_orj');
        $this->db->select_sum('kormi_orthonitibid_ter');
        $this->db->select_sum('kormi_orthonitibid_orj');
        $this->db->select_sum('kormi_uddokta_ter');
        $this->db->select_sum('kormi_uddokta_orj');
        $this->db->select_sum('kormi_businessman_ter');
        $this->db->select_sum('kormi_businessman_orj');
        $this->db->select_sum('shomorthok_banker_ter');
        $this->db->select_sum('shomorthok_banker_orj');
        $this->db->select_sum('shomorthok_porishongkhanbid_ter');
        $this->db->select_sum('shomorthok_porishongkhanbid_orj');
        $this->db->select_sum('shomorthok_orthonitibid_ter');
        $this->db->select_sum('shomorthok_orthonitibid_orj');
        $this->db->select_sum('shomorthok_uddokta_ter');
        $this->db->select_sum('shomorthok_uddokta_orj');
        $this->db->select_sum('shomorthok_businessman_ter');
        $this->db->select_sum('shomorthok_businessman_orj');
        $this->db->select_sum('shabek_banker_ter');
        $this->db->select_sum('shabek_banker_orj');
        $this->db->select_sum('shabek_porishongkhanbid_ter');
        $this->db->select_sum('shabek_porishongkhanbid_orj');
        $this->db->select_sum('shabek_orthonitibid_ter');
        $this->db->select_sum('shabek_orthonitibid_orj');
        $this->db->select_sum('shabek_uddokta_ter');
        $this->db->select_sum('shabek_uddokta_orj');
        $this->db->select_sum('shabek_businessman_ter');
        $this->db->select_sum('shabek_businessman_orj');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['business_studies_pro_output_business'] = $this->db->get('business_studies_pro_output_business')->first_row('array');
       
        $this->db->select_sum('business_manpower_central_s');
        $this->db->select_sum('business_manpower_central_p');
        $this->db->select_sum('business_manpower_shakha_s');
        $this->db->select_sum('business_manpower_shakha_p');  
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['business_studies_summit'] = $this->db->get('business_studies_summit')->first_row('array');
    
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('business_studies_summit');
        $this->data['business_studies_summit'] = $query->first_row('array');	
        
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('business_studies_academic_output');
        $this->data['business_studies_academic_output'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('business_studies_pro_outpur_degree');
        $this->data['business_studies_pro_outpur_degree'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('business_studies_pro_output_pro_degree');
        $this->data['business_studies_pro_output_pro_degree'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('business_studies_pro_output_business');
        $this->data['business_studies_pro_output_business'] = $query->first_row('array');


      }

        $this->data['m'] = 'business';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/business/business_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/business/business_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

  

    public function report_type1()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

        $current_date = strtotime(date('Y-m-d'));

        $annual_start = strtotime($entrytimeinfo->startdate_annual);
        $annual_end = strtotime($entrytimeinfo->enddate_annual);

        $half_start = strtotime($entrytimeinfo->startdate_half);
        $half_end = strtotime($entrytimeinfo->enddate_half);

        $type = ($current_date >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual';
        if ($type == 'half_yearly') {
            return array('type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
        } else {
            return array('type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
        }

    }

    public function detailupdate()
    {
        $this->sma->checkPermissions('index', true);
        $report_type = $this->report_type();
        //$this->site->check_confirm(6, date('Y-m-d'));

        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));

        $flag = 1;
        $msg = 'done';
        if ($is_changeable) {
            if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
                $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
                $flag = 2; //update
            } elseif ($this->input->get_post('branch_id')) {
                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'), 'date' => date('Y-m-d')));
                $flag = 3; //new entry

            }} else {
            $msg = 'failed';
        }

        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;

    }

}
