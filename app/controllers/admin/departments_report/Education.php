<?php defined('BASEPATH') or exit('No direct script access allowed');

class Education extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 11) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 11) {  //literature
            $this->departmentuser = true;
        }
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 11
        $this->data['department_id'] = 11;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  11)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>11), 'id desc', 1, 0);

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




    function shikha_page_one($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/shikha-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/shikha-page-one/' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays($report_type);


        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {
            $this->db->select_sum('edu_committee');
            $this->db->select_sum('edu_committee_member');
            $this->db->select_sum('edu_committee_program_number');
            $this->db->select_sum('edu_committee_program_present');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_edu_committee'] = $this->db->get('education_edu_committee')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['total_row'] = $this->db->get('education_edu_committee')->num_rows();

            $this->db->select_sum('ssc_h_prev');
            $this->db->select_sum('ssc_h_pres');
            $this->db->select_sum('ssc_h_bri');
            $this->db->select_sum('ssc_h_gha');
            $this->db->select_sum('ssc_s_prev');
            $this->db->select_sum('ssc_s_pres');
            $this->db->select_sum('ssc_s_bri');
            $this->db->select_sum('ssc_s_gha');

            $this->db->select_sum('hsca_h_prev');
            $this->db->select_sum('hsca_h_pres');
            $this->db->select_sum('hsca_h_bri');
            $this->db->select_sum('hsca_h_gha');
            $this->db->select_sum('hsca_s_prev');
            $this->db->select_sum('hsca_s_pres');
            $this->db->select_sum('hsca_s_bri');
            $this->db->select_sum('hsca_s_gha');

            $this->db->select_sum('hsc_h_prev');
            $this->db->select_sum('hsc_h_pres');
            $this->db->select_sum('hsc_h_bri');
            $this->db->select_sum('hsc_h_gha');
            $this->db->select_sum('hsc_s_prev');
            $this->db->select_sum('hsc_s_pres');
            $this->db->select_sum('hsc_s_bri');
            $this->db->select_sum('hsc_s_gha');

            $this->db->select_sum('med_h_prev');
            $this->db->select_sum('med_h_pres');
            $this->db->select_sum('med_h_bri');
            $this->db->select_sum('med_h_gha');
            $this->db->select_sum('med_s_prev');
            $this->db->select_sum('med_s_pres');
            $this->db->select_sum('med_s_bri');
            $this->db->select_sum('med_s_gha');

            $this->db->select_sum('eng_h_prev');
            $this->db->select_sum('eng_h_pres');
            $this->db->select_sum('eng_h_bri');
            $this->db->select_sum('eng_h_gha');
            $this->db->select_sum('eng_s_prev');
            $this->db->select_sum('eng_s_pres');
            $this->db->select_sum('eng_s_bri');
            $this->db->select_sum('eng_s_gha');

            $this->db->select_sum('uni_h_prev');
            $this->db->select_sum('uni_h_pres');
            $this->db->select_sum('uni_h_bri');
            $this->db->select_sum('uni_h_gha');
            $this->db->select_sum('uni_s_prev');
            $this->db->select_sum('uni_s_pres');
            $this->db->select_sum('uni_s_bri');
            $this->db->select_sum('uni_s_gha');

            $this->db->select_sum('ideal_h_prev');
            $this->db->select_sum('ideal_h_pres');
            $this->db->select_sum('ideal_h_bri');
            $this->db->select_sum('ideal_h_gha');
            $this->db->select_sum('ideal_s_prev');
            $this->db->select_sum('ideal_s_pres');
            $this->db->select_sum('ideal_s_bri');
            $this->db->select_sum('ideal_s_gha');

            $this->db->select_sum('hons_h_prev');
            $this->db->select_sum('hons_h_pres');
            $this->db->select_sum('hons_h_bri');
            $this->db->select_sum('hons_h_gha');
            $this->db->select_sum('hons_s_prev');
            $this->db->select_sum('hons_s_pres');
            $this->db->select_sum('hons_s_bri');
            $this->db->select_sum('hons_s_gha');

            $this->db->select_sum('teacher_h_prev');
            $this->db->select_sum('teacher_h_pres');
            $this->db->select_sum('teacher_h_bri');
            $this->db->select_sum('teacher_h_gha');
            $this->db->select_sum('teacher_s_prev');
            $this->db->select_sum('teacher_s_pres');
            $this->db->select_sum('teacher_s_bri');
            $this->db->select_sum('teacher_s_gha');

            $this->db->select_sum('j_she_h_prev');
            $this->db->select_sum('j_she_h_pres');
            $this->db->select_sum('j_she_h_bri');
            $this->db->select_sum('j_she_h_gha');
            $this->db->select_sum('j_she_s_prev');
            $this->db->select_sum('j_she_s_pres');
            $this->db->select_sum('j_she_s_bri');
            $this->db->select_sum('j_she_s_gha');

            $this->db->select_sum('s_she_h_prev');
            $this->db->select_sum('s_she_h_pres');
            $this->db->select_sum('s_she_h_bri');
            $this->db->select_sum('s_she_h_gha');
            $this->db->select_sum('s_she_s_prev');
            $this->db->select_sum('s_she_s_pres');
            $this->db->select_sum('s_she_s_bri');
            $this->db->select_sum('s_she_s_gha');

            $this->db->select_sum('m_she_h_prev');
            $this->db->select_sum('m_she_h_pres');
            $this->db->select_sum('m_she_h_bri');
            $this->db->select_sum('m_she_h_gha');
            $this->db->select_sum('m_she_s_prev');
            $this->db->select_sum('m_she_s_pres');
            $this->db->select_sum('m_she_s_bri');
            $this->db->select_sum('m_she_s_gha');

            $this->db->select_sum('t_she_h_prev');
            $this->db->select_sum('t_she_h_pres');
            $this->db->select_sum('t_she_h_bri');
            $this->db->select_sum('t_she_h_gha');
            $this->db->select_sum('t_she_s_prev');
            $this->db->select_sum('t_she_s_pres');
            $this->db->select_sum('t_she_s_bri');
            $this->db->select_sum('t_she_s_gha');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_ideal_home'] = $this->db->get('education_ideal_home')->first_row('array');

            // $this->sma->print_arrays($this->db->last_query());

            $this->db->select_sum('5_to_10_number');
            $this->db->select_sum('5_to_10_taka');
            $this->db->select_sum('hsc_number');
            $this->db->select_sum('hsc_taka');
            $this->db->select_sum('hons_number');
            $this->db->select_sum('hons_taka');
            $this->db->select_sum('masters_number');
            $this->db->select_sum('masters_taka');
            $this->db->select_sum('landing_number');
            $this->db->select_sum('landing_taka');
            $this->db->select_sum('free_number');
            $this->db->select_sum('free_taka');

            $this->db->select_sum('ps_u_s');
            $this->db->select_sum('ps_u_a');
            $this->db->select_sum('h_u_s');
            $this->db->select_sum('h_u_a');


            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['education_scholarship'] = $this->db->get('education_scholarship')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
             
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_edu_committee'] = $this->db->get('education_edu_committee')->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_ideal_home'] = $this->db->get('education_ideal_home')->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_scholarship'] = $this->db->get('education_scholarship')->first_row('array');
        }

        $this->data['m'] = 'education';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/education/shikha_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/education/shikha_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function shikha_page_three($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/shikha-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/shikha-page-three/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('m_t1_tar');
            $this->db->select_sum('m_t1_a');
            $this->db->select_sum('m_t1_pri');
            $this->db->select_sum('m_t1_li');
            $this->db->select_sum('m_t1_vi');
            $this->db->select_sum('m_t2_tar');
            $this->db->select_sum('m_t2_a');
            $this->db->select_sum('m_t2_pri');
            $this->db->select_sum('m_t2_li');
            $this->db->select_sum('m_t2_vi');
            $this->db->select_sum('m_t3_tar');
            $this->db->select_sum('m_t3_a');
            $this->db->select_sum('m_t3_pri');
            $this->db->select_sum('m_t3_li');
            $this->db->select_sum('m_t3_vi');

            $this->db->select_sum('a_t1_tar');
            $this->db->select_sum('a_t1_a');
            $this->db->select_sum('a_t1_pri');
            $this->db->select_sum('a_t1_li');
            $this->db->select_sum('a_t1_vi');
            $this->db->select_sum('a_t2_tar');
            $this->db->select_sum('a_t2_a');
            $this->db->select_sum('a_t2_pri');
            $this->db->select_sum('a_t2_li');
            $this->db->select_sum('a_t2_vi');
            $this->db->select_sum('a_t3_tar');
            $this->db->select_sum('a_t3_a');
            $this->db->select_sum('a_t3_pri');
            $this->db->select_sum('a_t3_li');
            $this->db->select_sum('a_t3_vi');

            $this->db->select_sum('w_t1_tar');
            $this->db->select_sum('w_t1_a');
            $this->db->select_sum('w_t1_pri');
            $this->db->select_sum('w_t1_li');
            $this->db->select_sum('w_t1_vi');
            $this->db->select_sum('w_t2_tar');
            $this->db->select_sum('w_t2_a');
            $this->db->select_sum('w_t2_pri');
            $this->db->select_sum('w_t2_li');
            $this->db->select_sum('w_t2_vi');
            $this->db->select_sum('w_t3_tar');
            $this->db->select_sum('w_t3_a');
            $this->db->select_sum('w_t3_pri');
            $this->db->select_sum('w_t3_li');
            $this->db->select_sum('w_t3_vi');

            $this->db->select_sum('s_t1_tar');
            $this->db->select_sum('s_t1_a');
            $this->db->select_sum('s_t1_pri');
            $this->db->select_sum('s_t1_li');
            $this->db->select_sum('s_t1_vi');
            $this->db->select_sum('s_t2_tar');
            $this->db->select_sum('s_t2_a');
            $this->db->select_sum('s_t2_pri');
            $this->db->select_sum('s_t2_li');
            $this->db->select_sum('s_t2_vi');
            $this->db->select_sum('s_t3_tar');
            $this->db->select_sum('s_t3_a');
            $this->db->select_sum('s_t3_pri');
            $this->db->select_sum('s_t3_li');
            $this->db->select_sum('s_t3_vi');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_pro_output_1'] = $this->db->get('education_pro_output_1')->first_row('array');


            $this->db->select_sum('m_t1_tar');
            $this->db->select_sum('m_t1_a');
            $this->db->select_sum('m_t1_pri');
            $this->db->select_sum('m_t1_li');
            $this->db->select_sum('m_t1_vi');
            $this->db->select_sum('m_t2_tar');
            $this->db->select_sum('m_t2_a');
            $this->db->select_sum('m_t2_pri');
            $this->db->select_sum('m_t2_li');
            $this->db->select_sum('m_t2_vi');

            $this->db->select_sum('a_t1_tar');
            $this->db->select_sum('a_t1_a');
            $this->db->select_sum('a_t1_pri');
            $this->db->select_sum('a_t1_li');
            $this->db->select_sum('a_t1_vi');
            $this->db->select_sum('a_t2_tar');
            $this->db->select_sum('a_t2_a');
            $this->db->select_sum('a_t2_pri');
            $this->db->select_sum('a_t2_li');
            $this->db->select_sum('a_t2_vi');


            $this->db->select_sum('w_t1_tar');
            $this->db->select_sum('w_t1_a');
            $this->db->select_sum('w_t1_pri');
            $this->db->select_sum('w_t1_li');
            $this->db->select_sum('w_t1_vi');
            $this->db->select_sum('w_t2_tar');
            $this->db->select_sum('w_t2_a');
            $this->db->select_sum('w_t2_pri');
            $this->db->select_sum('w_t2_li');
            $this->db->select_sum('w_t2_vi');

            $this->db->select_sum('s_t1_tar');
            $this->db->select_sum('s_t1_a');
            $this->db->select_sum('s_t1_pri');
            $this->db->select_sum('s_t1_li');
            $this->db->select_sum('s_t1_vi');
            $this->db->select_sum('s_t2_tar');
            $this->db->select_sum('s_t2_a');
            $this->db->select_sum('s_t2_pri');
            $this->db->select_sum('s_t2_li');
            $this->db->select_sum('s_t2_vi');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_pro_output_2'] = $this->db->get('education_pro_output_2')->first_row('array');

            $this->db->select_sum('m_k_s_tar');
            $this->db->select_sum('m_k_s_orj');
            $this->db->select_sum('m_k_n_tar');
            $this->db->select_sum('m_k_n_orj');
            $this->db->select_sum('m_k_b_tar');
            $this->db->select_sum('m_k_b_orj');
            $this->db->select_sum('m_s_s_tar');
            $this->db->select_sum('m_s_s_orj');
            $this->db->select_sum('m_s_n_tar');
            $this->db->select_sum('m_s_n_orj');
            $this->db->select_sum('m_s_b_tar');
            $this->db->select_sum('m_s_b_orj');

            $this->db->select_sum('a_k_s_tar');
            $this->db->select_sum('a_k_s_orj');
            $this->db->select_sum('a_k_n_tar');
            $this->db->select_sum('a_k_n_orj');
            $this->db->select_sum('a_k_b_tar');
            $this->db->select_sum('a_k_b_orj');
            $this->db->select_sum('a_s_s_tar');
            $this->db->select_sum('a_s_s_orj');
            $this->db->select_sum('a_s_n_tar');
            $this->db->select_sum('a_s_n_orj');
            $this->db->select_sum('a_s_b_tar');
            $this->db->select_sum('a_s_b_orj');

            $this->db->select_sum('w_k_s_tar');
            $this->db->select_sum('w_k_s_orj');
            $this->db->select_sum('w_k_n_tar');
            $this->db->select_sum('w_k_n_orj');
            $this->db->select_sum('w_k_b_tar');
            $this->db->select_sum('w_k_b_orj');
            $this->db->select_sum('w_s_s_tar');
            $this->db->select_sum('w_s_s_orj');
            $this->db->select_sum('w_s_n_tar');
            $this->db->select_sum('w_s_n_orj');
            $this->db->select_sum('w_s_b_tar');
            $this->db->select_sum('w_s_b_orj');

            $this->db->select_sum('s_k_s_tar');
            $this->db->select_sum('s_k_s_orj');
            $this->db->select_sum('s_k_n_tar');
            $this->db->select_sum('s_k_n_orj');
            $this->db->select_sum('s_k_b_tar');
            $this->db->select_sum('s_k_b_orj');
            $this->db->select_sum('s_s_s_tar');
            $this->db->select_sum('s_s_s_orj');
            $this->db->select_sum('s_s_n_tar');
            $this->db->select_sum('s_s_n_orj');
            $this->db->select_sum('s_s_b_tar');
            $this->db->select_sum('s_s_b_orj');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_pro_output_3'] = $this->db->get('education_pro_output_3')->first_row('array');

            $this->db->select_sum('pub_t_m_abe');
            $this->db->select_sum('pub_t_m_orj');
            $this->db->select_sum('pub_t_a_abe');
            $this->db->select_sum('pub_t_a_orj');
            $this->db->select_sum('pub_t_w_abe');
            $this->db->select_sum('pub_t_w_orj');
            $this->db->select_sum('pub_t_s_abe');
            $this->db->select_sum('pub_t_s_orj');
            $this->db->select_sum('mon_t_m_abe');
            $this->db->select_sum('mon_t_m_orj');
            $this->db->select_sum('mon_t_a_abe');
            $this->db->select_sum('mon_t_a_orj');
            $this->db->select_sum('mon_t_w_abe');
            $this->db->select_sum('mon_t_w_orj');
            $this->db->select_sum('mon_t_s_abe');
            $this->db->select_sum('mon_t_s_orj');
    

            $this->db->select_sum('pri_t_m_abe');
            $this->db->select_sum('pri_t_m_orj');
            $this->db->select_sum('pri_t_a_abe');
            $this->db->select_sum('pri_t_a_orj');
            $this->db->select_sum('pri_t_w_abe');
            $this->db->select_sum('pri_t_w_orj');
            $this->db->select_sum('pri_t_s_abe');
            $this->db->select_sum('pri_t_s_orj');

            $this->db->select_sum('pol_m_abe');
            $this->db->select_sum('pol_m_orj');
            $this->db->select_sum('pol_a_abe');
            $this->db->select_sum('pol_a_orj');
            $this->db->select_sum('pol_w_abe');
            $this->db->select_sum('pol_w_orj');
            $this->db->select_sum('pol_s_abe');
            $this->db->select_sum('pol_s_orj');

            $this->db->select_sum('bc_t_m_abe');
            $this->db->select_sum('bc_t_m_orj');
            $this->db->select_sum('bc_t_a_abe');
            $this->db->select_sum('bc_t_a_orj');
            $this->db->select_sum('bc_t_w_abe');
            $this->db->select_sum('bc_t_w_orj');
            $this->db->select_sum('bc_t_s_abe');
            $this->db->select_sum('bc_t_s_orj');

            $this->db->select_sum('ps_t_m_abe');
            $this->db->select_sum('ps_t_m_orj');
            $this->db->select_sum('ps_t_a_abe');
            $this->db->select_sum('ps_t_a_orj');
            $this->db->select_sum('ps_t_w_abe');
            $this->db->select_sum('ps_t_w_orj');
            $this->db->select_sum('ps_t_s_abe');
            $this->db->select_sum('ps_t_s_orj');

            $this->db->select_sum('bm_t_m_abe');
            $this->db->select_sum('bm_t_m_orj');
            $this->db->select_sum('bm_t_a_abe');
            $this->db->select_sum('bm_t_a_orj');
            $this->db->select_sum('bm_t_w_abe');
            $this->db->select_sum('bm_t_w_orj');
            $this->db->select_sum('bm_t_s_abe');
            $this->db->select_sum('bm_t_s_orj');

            $this->db->select_sum('bs_t_m_abe');
            $this->db->select_sum('bs_t_m_orj');
            $this->db->select_sum('bs_t_a_abe');
            $this->db->select_sum('bs_t_a_orj');
            $this->db->select_sum('bs_t_w_abe');
            $this->db->select_sum('bs_t_w_orj');
            $this->db->select_sum('bs_t_s_abe');
            $this->db->select_sum('bs_t_s_orj');

            $this->db->select_sum('em_t_m_abe');
            $this->db->select_sum('em_t_m_orj');
            $this->db->select_sum('em_t_a_abe');
            $this->db->select_sum('em_t_a_orj');
            $this->db->select_sum('em_t_w_abe');
            $this->db->select_sum('em_t_w_orj');
            $this->db->select_sum('em_t_s_abe');
            $this->db->select_sum('em_t_s_orj');

            $this->db->select_sum('besh_m_abe');
            $this->db->select_sum('besh_m_orj');
            $this->db->select_sum('besh_a_abe');
            $this->db->select_sum('besh_a_orj');
            $this->db->select_sum('besh_w_abe');
            $this->db->select_sum('besh_w_orj');
            $this->db->select_sum('besh_s_abe');
            $this->db->select_sum('besh_s_orj');

            $this->db->select_sum('int_m_abe');
            $this->db->select_sum('int_m_orj');
            $this->db->select_sum('int_a_abe');
            $this->db->select_sum('int_a_orj');
            $this->db->select_sum('int_w_abe');
            $this->db->select_sum('int_w_orj');
            $this->db->select_sum('int_s_abe');
            $this->db->select_sum('int_s_orj');

            $this->db->select_sum('ism_b_m_abe');
            $this->db->select_sum('ism_b_m_orj');
            $this->db->select_sum('ism_b_a_abe');
            $this->db->select_sum('ism_b_a_orj');
            $this->db->select_sum('ism_b_w_abe');
            $this->db->select_sum('ism_b_w_orj');
            $this->db->select_sum('ism_b_s_abe');
            $this->db->select_sum('ism_b_s_orj');

            $this->db->select_sum('other_m_abe');
            $this->db->select_sum('other_m_orj');
            $this->db->select_sum('other_a_abe');
            $this->db->select_sum('other_a_orj');
            $this->db->select_sum('other_w_abe');
            $this->db->select_sum('other_w_orj');
            $this->db->select_sum('other_s_abe');
            $this->db->select_sum('other_s_orj');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_pro_output_4'] = $this->db->get('education_pro_output_4')->first_row('array');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_pro_output_1'] = $this->db->get('education_pro_output_1')->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_pro_output_2'] = $this->db->get('education_pro_output_2')->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_pro_output_3'] = $this->db->get('education_pro_output_3')->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_pro_output_4'] = $this->db->get('education_pro_output_4')->first_row('array');
        }

        $this->data['m'] = 'education';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/education/shikha_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/education/shikha_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function shikha_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/shikha-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/shikha-page-two/' . $this->session->userdata('branch_id'));
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
        $this->db->select_sum('so_1_t');
        $this->db->select_sum('so_1_o');
        $this->db->select_sum('so_2_t');
        $this->db->select_sum('so_2_o');
        $this->db->select_sum('so_3_t');
        $this->db->select_sum('so_3_o');
        $this->db->select_sum('so_4_t');
        $this->db->select_sum('so_4_o');
        $this->db->select_sum('so_5_t');
        $this->db->select_sum('so_5_o');
        $this->db->select_sum('so_6_t');
        $this->db->select_sum('so_6_o');
        $this->db->select_sum('so_7_t');
        $this->db->select_sum('so_7_o');
        $this->db->select_sum('so_8_t');
        $this->db->select_sum('so_8_o');

        $this->db->select_sum('sa_1_t');
        $this->db->select_sum('sa_1_o');
        $this->db->select_sum('sa_2_t');
        $this->db->select_sum('sa_2_o');
        $this->db->select_sum('sa_3_t');
        $this->db->select_sum('sa_3_o');
        $this->db->select_sum('sa_4_t');
        $this->db->select_sum('sa_4_o');
        $this->db->select_sum('sa_5_t');
        $this->db->select_sum('sa_5_o');
        $this->db->select_sum('sa_6_t');
        $this->db->select_sum('sa_6_o');
        $this->db->select_sum('sa_7_t');
        $this->db->select_sum('sa_7_o');
        $this->db->select_sum('sa_8_t');
        $this->db->select_sum('sa_8_o');

        $this->db->select_sum('ko_1_t');
        $this->db->select_sum('ko_1_o');
        $this->db->select_sum('ko_2_t');
        $this->db->select_sum('ko_2_o');
        $this->db->select_sum('ko_3_t');
        $this->db->select_sum('ko_3_o');
        $this->db->select_sum('ko_4_t');
        $this->db->select_sum('ko_4_o');
        $this->db->select_sum('ko_5_t');
        $this->db->select_sum('ko_5_o');
        $this->db->select_sum('ko_6_t');
        $this->db->select_sum('ko_6_o');
        $this->db->select_sum('ko_7_t');
        $this->db->select_sum('ko_7_o');
        $this->db->select_sum('ko_8_t');
        $this->db->select_sum('ko_8_o');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_professionaloutput_teacher'] = $this->db->get('education_professionaloutput_teacher')->first_row('array');

            $this->db->select_sum('sik_bri_s');
            $this->db->select_sum('sik_bri_u');
            $this->db->select_sum('pla_son_s');
            $this->db->select_sum('pla_son_u');
            $this->db->select_sum('med_son_s');
            $this->db->select_sum('med_son_u');
            $this->db->select_sum('dua_s');
            $this->db->select_sum('dua_u');
            $this->db->select_sum('sorno_s');
            $this->db->select_sum('sorno_u');
            $this->db->select_sum('sik_upo_s');
            $this->db->select_sum('sik_upo_u');
            $this->db->select_sum('nobin_s');
            $this->db->select_sum('nobin_u');
            $this->db->select_sum('sik_sof_s');
            $this->db->select_sum('sik_sof_u');
            $this->db->select_sum('other_s');
            $this->db->select_sum('other_u');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_honers_masters_program'] = $this->db->get('education_honers_masters_program')->first_row('array');
           
           
            $this->db->select_sum('cc_jon_num');
            $this->db->select_sum('cc_jon_pre');
            $this->db->select_sum('cc_man_num');
            $this->db->select_sum('cc_man_pre');
            $this->db->select_sum('cc_sho_num');
            $this->db->select_sum('cc_sho_pre');
            $this->db->select_sum('cc_info_num');
            $this->db->select_sum('cc_info_pre');
            $this->db->select_sum('cc_tea_num');
            $this->db->select_sum('cc_tea_pre');
            $this->db->select_sum('ideal_cc_num');
            $this->db->select_sum('ideal_cc_pre');
            $this->db->select_sum('mot_pro_ssc_num');
            $this->db->select_sum('mot_pro_ssc_pre');
            $this->db->select_sum('mot_pro_hsc_num');
            $this->db->select_sum('mot_pro_hsc_pre');
            $this->db->select_sum('mot_pro_uni_num');
            $this->db->select_sum('mot_pro_uni_pre');
            $this->db->select_sum('eng_course_num');
            $this->db->select_sum('eng_course_pre');
            $this->db->select_sum('com_course_num');
            $this->db->select_sum('com_course_pre');
            $this->db->select_sum('meritorious_num');
            $this->db->select_sum('meritorious_pre');
            $this->db->select_sum('dowa_num');
            $this->db->select_sum('dowa_pre');
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_motivational_program'] = $this->db->get('education_motivational_program')->first_row('array');


            $this->db->select_sum('4to10_coaching');
            $this->db->select_sum('4to10_coachingname');
            $this->db->select_sum('4to10_batch');
            $this->db->select_sum('4to10_student');
            $this->db->select_sum('11_12_coaching');
            $this->db->select_sum('11_12_coachingname');
            $this->db->select_sum('11_12_batch');
            $this->db->select_sum('11_12_student');
            $this->db->select_sum('university_coaching');
            $this->db->select_sum('university_coachingname');
            $this->db->select_sum('university_batch');
            $this->db->select_sum('university_student');
            $this->db->select_sum('medical_coaching');
            $this->db->select_sum('medical_coachingname');
            $this->db->select_sum('medical_batch');
            $this->db->select_sum('medical_student');
            $this->db->select_sum('eng_coaching');
            $this->db->select_sum('eng_coachingname');
            $this->db->select_sum('eng_batch');
            $this->db->select_sum('eng_student');
            $this->db->select_sum('job_coaching');
            $this->db->select_sum('job_coachingname');
            $this->db->select_sum('job_batch');
            $this->db->select_sum('job_student');
            $this->db->select_sum('other_coaching');
            $this->db->select_sum('other_coachingname');
            $this->db->select_sum('other_batch');
            $this->db->select_sum('other_student');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_coaching'] = $this->db->get('education_coaching')->first_row('array');

            $this->db->select_sum('hons_central_manpower_s');
            $this->db->select_sum('hons_central_manpower_p');
            $this->db->select_sum('hons_central_general_s');
            $this->db->select_sum('hons_central_general_p');
            $this->db->select_sum('hons_shakha_manpower_s');
            $this->db->select_sum('hons_shakha_manpower_p');
            $this->db->select_sum('hons_shakha_general_s');
            $this->db->select_sum('hons_shakha_general_p');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_summit'] = $this->db->get('education_summit')->first_row('array');

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
            $this->data['education_training_program'] = $this->db->get('education_training_program')->first_row('array');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_professionaloutput_teacher');
            $this->data['education_professionaloutput_teacher'] = $query->first_row('array');

           
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_honers_masters_program');
            $this->data['education_honers_masters_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_training_program');
            $this->data['education_training_program'] = $query->first_row('array');


            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_summit');
            $this->data['education_summit'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_motivational_program');
            $this->data['education_motivational_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_coaching');
            $this->data['education_coaching'] = $query->first_row('array');
        }




        $this->data['m'] = 'education';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/education/shikha_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/education/shikha_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
    }



    function report_type1()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);


        $current_date = strtotime(date('Y-m-d'));


        $annual_start = strtotime($entrytimeinfo->startdate_annual);
        $annual_end = strtotime($entrytimeinfo->enddate_annual);

        $half_start = strtotime($entrytimeinfo->startdate_half);
        $half_end = strtotime($entrytimeinfo->enddate_half);

        $type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual';
        if ($type == 'half_yearly')
            return array('type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
        else
            return array('type' => 'annual', 'start' => $entrytimeinfo->startdate_annual, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
    }



    function detailupdate()
    {
        $this->sma->checkPermissions('index', TRUE);
        $report_type = $this->report_type();
        //$this->site->check_confirm(6, date('Y-m-d'));

        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));

        $flag = 1;
        $msg = 'done';
        if ($is_changeable) {
            if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
                $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
                $flag = 2;  //update
            } elseif ($this->input->get_post('branch_id')) {
                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'),   'date' => date('Y-m-d')));
                $flag = 3;  //new entry

            }
        } else
            $msg = 'failed';


        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	


        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }
}
