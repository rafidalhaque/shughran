<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manpower extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=12) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==12) {  //Manpower
			$this->departmentuser = true; 
		}
				             
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 12
        $this->data['department_id'] = 12;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (12)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>12), 'id desc', 1, 0);

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

    function manpower_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/manpower-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/manpower-bivag/'.$this->session->userdata('branch_id'));
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


            $this->db->select_sum('exam_sonkha');
            $this->db->select_sum('exam_uposthiti');
            $this->db->select_sum('exam_gor');
            

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['manpower_planing'] = $this->db->get('manpower_planing')->first_row('array');

        
            $this->db->select_sum('job_coaching');
            $this->db->select_sum('job_batch');
            $this->db->select_sum('job_student');
            

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_coaching_manob'] = $this->db->get('education_coaching_manob')->first_row('array');

            $this->db->select_sum('4to10_coaching');
            $this->db->select_sum('4to10_batch');
            $this->db->select_sum('4to10_student');
            $this->db->select_sum('11_12_coaching');
            $this->db->select_sum('11_12_batch');
            $this->db->select_sum('11_12_student');
            $this->db->select_sum('university_coaching');
            $this->db->select_sum('university_batch');
            $this->db->select_sum('university_student');
            $this->db->select_sum('medical_coaching');
            $this->db->select_sum('medical_batch');
            $this->db->select_sum('medical_student');
            $this->db->select_sum('eng_coaching');
            $this->db->select_sum('eng_batch');
            $this->db->select_sum('eng_student');
            $this->db->select_sum('job_coaching');
            $this->db->select_sum('job_batch');
            $this->db->select_sum('job_student');
            $this->db->select_sum('other_coaching');
            $this->db->select_sum('other_batch');
            $this->db->select_sum('other_student');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_coaching'] = $this->db->get('education_coaching')->first_row('array');

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

            $this->db->select_sum('sorkari_num');
            $this->db->select_sum('sorkari_pres');


            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['education_motivational_program'] = $this->db->get('education_motivational_program')->first_row('array');

            $this->db->select_sum('sorkari_h_prev');
            $this->db->select_sum('sorkari_h_pres');
            $this->db->select_sum('sorkari_h_bri');
            $this->db->select_sum('sorkari_h_gha');
            $this->db->select_sum('sorkari_s_prev');
            $this->db->select_sum('sorkari_s_pres');
            $this->db->select_sum('sorkari_s_bri');
            $this->db->select_sum('sorkari_s_gha');
            
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
            $this->db->select_sum('m_t4_tar');
            $this->db->select_sum('m_t4_a');
            $this->db->select_sum('m_t4_pri');
            $this->db->select_sum('m_t4_li');
            $this->db->select_sum('m_t4_vi');

            $this->db->select_sum('m_t5_tar');
            $this->db->select_sum('m_t5_a');
            $this->db->select_sum('m_t5_pri');
            $this->db->select_sum('m_t5_li');
            $this->db->select_sum('m_t5_vi');

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
            $this->db->select_sum('a_t4_tar');
            $this->db->select_sum('a_t4_a');
            $this->db->select_sum('a_t4_pri');
            $this->db->select_sum('a_t4_li');
            $this->db->select_sum('a_t4_vi');

            $this->db->select_sum('a_t5_tar');
            $this->db->select_sum('a_t5_a');
            $this->db->select_sum('a_t5_pri');
            $this->db->select_sum('a_t5_li');
            $this->db->select_sum('a_t5_vi');

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
            $this->db->select_sum('w_t4_tar');
            $this->db->select_sum('w_t4_a');
            $this->db->select_sum('w_t4_pri');
            $this->db->select_sum('w_t4_li');
            $this->db->select_sum('w_t4_vi');

            $this->db->select_sum('w_t5_tar');
            $this->db->select_sum('w_t5_a');
            $this->db->select_sum('w_t5_pri');
            $this->db->select_sum('w_t5_li');
            $this->db->select_sum('w_t5_vi');

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
            $this->db->select_sum('s_t4_tar');
            $this->db->select_sum('s_t4_a');
            $this->db->select_sum('s_t4_pri');
            $this->db->select_sum('s_t4_li');
            $this->db->select_sum('s_t4_vi');

            $this->db->select_sum('s_t5_tar');
            $this->db->select_sum('s_t5_a');
            $this->db->select_sum('s_t5_pri');
            $this->db->select_sum('s_t5_li');
            $this->db->select_sum('s_t5_vi');

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

            $this->db->select_sum('sodosso_s');
            $this->db->select_sum('sathi_s');
            $this->db->select_sum('kormi_s');
            $this->db->select_sum('sodosso_p');
            $this->db->select_sum('sathi_p');
            $this->db->select_sum('kormi_p');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_management_jonosokti_biodata'] = $this->db->get('human_management_jonosokti_biodata')->first_row('array');

            $this->db->select_sum('bidai_so');
            $this->db->select_sum('bidai_sa');
            $this->db->select_sum('bidai_ko');

            $this->db->select_sum('cv_so');
            $this->db->select_sum('cv_sa');
            $this->db->select_sum('cv_ko');

            $this->db->select_sum('sorkari_so');
            $this->db->select_sum('sorkari_sa');
            $this->db->select_sum('sorkari_ko');
            
            $this->db->select_sum('besorkari_so');
            $this->db->select_sum('besorkari_sa');
            $this->db->select_sum('besorkari_ko');

            $this->db->select_sum('kormo_so');
            $this->db->select_sum('kormo_sa');
            $this->db->select_sum('kormo_ko');
            
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['human_management_bidai_jonosokti'] = $this->db->get('human_management_bidai_jonosokti')->first_row('array');


        $this->db->select_sum('coun_team');
        $this->db->select_sum('bivag_com_meeting');
        $this->db->select_sum('bivag_com_meeting_upos');
        $this->db->select_sum('per_biodata');
      

         // branch_committee
         $this->db->select("
         SUM(CASE WHEN branch_committee = 'yes' THEN 1 ELSE 0 END) as branch_committee_yes
         ");
 
         $this->db->select("
         SUM(CASE WHEN branch_committee = 'no' THEN 1 ELSE 0 END) as branch_committee_no
         ");

         // sec_man_month
         $this->db->select("
         SUM(CASE WHEN sec_man_month = 'yes' THEN 1 ELSE 0 END) as sec_man_month_yes
         ");
 
         $this->db->select("
         SUM(CASE WHEN sec_man_month= 'no' THEN 1 ELSE 0 END) as sec_man_month_no
         ");
 
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['human_management_songothon'] = $this->db->get('human_management_songothon')->first_row('array');

        
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $query = $this->db->get('human_management_songothon');
        $this->data['human_management_songothon_row'] = $query->num_rows();
       
        $this->db->select_sum('jonosheba_terget');
        $this->db->select_sum('jonosheba_bachai');
        $this->db->select_sum('jonosheba_num');
        $this->db->select_sum('jonosheba_pre');
        $this->db->select_sum('jonosheba_sang');
        $this->db->select_sum('jonosheba_shadha');
        $this->db->select_sum('jonosheba_ongsho');
        $this->db->select_sum('jonosheba_uttirno');

        $this->db->select_sum('shomajsheba_terget');
        $this->db->select_sum('shomajsheba_bachai');
        $this->db->select_sum('shomajsheba_num');
        $this->db->select_sum('shomajsheba_pre');
        $this->db->select_sum('shomajsheba_sang');
        $this->db->select_sum('shomajsheba_shadha');
        $this->db->select_sum('shomajsheba_ongsho');
        $this->db->select_sum('shomajsheba_uttirno');

        $this->db->select_sum('manobsheba_terget');
        $this->db->select_sum('manobsheba_bachai');
        $this->db->select_sum('manobsheba_num');
        $this->db->select_sum('manobsheba_pre');
        $this->db->select_sum('manobsheba_sang');
        $this->db->select_sum('manobsheba_shadha');
        $this->db->select_sum('manobsheba_ongsho');
        $this->db->select_sum('manobsheba_uttirno');


        $this->db->select_sum('law_terget');
        $this->db->select_sum('law_bachai');
        $this->db->select_sum('law_num');
        $this->db->select_sum('law_pre');
        $this->db->select_sum('law_sang');
        $this->db->select_sum('law_shadha');
        $this->db->select_sum('law_ongsho');
        $this->db->select_sum('law_uttirno');

        $this->db->select_sum('totthosheba_terget');
        $this->db->select_sum('totthosheba_bachai');
        $this->db->select_sum('totthosheba_num');
        $this->db->select_sum('totthosheba_pre');
        $this->db->select_sum('totthosheba_sang');
        $this->db->select_sum('totthosheba_shadha');
        $this->db->select_sum('totthosheba_ongsho');
        $this->db->select_sum('totthosheba_uttirno');

        $this->db->select_sum('uni_teacher_govt_terget');
        $this->db->select_sum('uni_teacher_govt_bachai');
        $this->db->select_sum('uni_teacher_govt_num');
        $this->db->select_sum('uni_teacher_govt_pre');
        $this->db->select_sum('uni_teacher_govt_sang');
        $this->db->select_sum('uni_teacher_govt_shadha');
        $this->db->select_sum('uni_teacher_govt_ongsho');
        $this->db->select_sum('uni_teacher_govt_uttirno');

        $this->db->select_sum('uni_teacher_private_terget');
        $this->db->select_sum('uni_teacher_private_bachai');
        $this->db->select_sum('uni_teacher_private_num');
        $this->db->select_sum('uni_teacher_private_pre');
        $this->db->select_sum('uni_teacher_private_sang');
        $this->db->select_sum('uni_teacher_private_shadha');
        $this->db->select_sum('uni_teacher_private_ongsho');
        $this->db->select_sum('uni_teacher_private_uttirno');

        $this->db->select_sum('medi_teacher_terget');
        $this->db->select_sum('medi_teacher_bachai');
        $this->db->select_sum('medi_teacher_num');
        $this->db->select_sum('medi_teacher_pre');
        $this->db->select_sum('medi_teacher_sang');
        $this->db->select_sum('medi_teacher_shadha');
        $this->db->select_sum('medi_teacher_ongsho');
        $this->db->select_sum('medi_teacher_uttirno');

        $this->db->select_sum('college_teacher_terget');
        $this->db->select_sum('college_teacher_bachai');
        $this->db->select_sum('college_teacher_num');
        $this->db->select_sum('college_teacher_pre');
        $this->db->select_sum('college_teacher_sang');
        $this->db->select_sum('college_teacher_shadha');
        $this->db->select_sum('college_teacher_ongsho');
        $this->db->select_sum('college_teacher_uttirno');

        $this->db->select_sum('karigori_teacher_terget');
        $this->db->select_sum('karigori_teacher_bachai');
        $this->db->select_sum('karigori_teacher_num');
        $this->db->select_sum('karigori_teacher_pre');
        $this->db->select_sum('karigori_teacher_sang');
        $this->db->select_sum('karigori_teacher_shadha');
        $this->db->select_sum('karigori_teacher_ongsho');
        $this->db->select_sum('karigori_teacher_uttirno');

        $this->db->select_sum('maddhomik_teacher_terget');
        $this->db->select_sum('maddhomik_teacher_bachai');
        $this->db->select_sum('maddhomik_teacher_num');
        $this->db->select_sum('maddhomik_teacher_pre');
        $this->db->select_sum('maddhomik_teacher_sang');
        $this->db->select_sum('maddhomik_teacher_shadha');
        $this->db->select_sum('maddhomik_teacher_ongsho');
        $this->db->select_sum('maddhomik_teacher_uttirno');

        $this->db->select_sum('madrasah_teacher_terget');
        $this->db->select_sum('madrasah_teacher_bachai');
        $this->db->select_sum('madrasah_teacher_num');
        $this->db->select_sum('madrasah_teacher_pre');
        $this->db->select_sum('madrasah_teacher_sang');
        $this->db->select_sum('madrasah_teacher_shadha');
        $this->db->select_sum('madrasah_teacher_ongsho');
        $this->db->select_sum('madrasah_teacher_uttirno');

        $this->db->select_sum('cultural_worker_terget');
        $this->db->select_sum('cultural_worker_bachai');
        $this->db->select_sum('cultural_worker_num');
        $this->db->select_sum('cultural_worker_pre');
        $this->db->select_sum('cultural_worker_sang');
        $this->db->select_sum('cultural_worker_shadha');
        $this->db->select_sum('cultural_worker_ongsho');
        $this->db->select_sum('cultural_worker_uttirno');

        $this->db->select_sum('player_terget');
        $this->db->select_sum('player_bachai');
        $this->db->select_sum('player_num');
        $this->db->select_sum('player_pre');
        $this->db->select_sum('player_sang');
        $this->db->select_sum('player_shadha');
        $this->db->select_sum('player_ongsho');
        $this->db->select_sum('player_uttirno');

        $this->db->select_sum('banker_tar');
        $this->db->select_sum('banker_bac');
        $this->db->select_sum('banker_san');
        $this->db->select_sum('banker_sad');

        $this->db->select_sum('anto_tar');
        $this->db->select_sum('anto_bac');
        $this->db->select_sum('anto_san');
        $this->db->select_sum('anto_sad');

        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        
        $this->data['human_managemant_jonobol_shorboraho'] = $this->db->get('human_managemant_jonobol_shorboraho')->first_row('array');
      
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
        $this->data['human_management_training_program'] = $this->db->get('human_management_training_program')->first_row('array');

        $this->db->select_sum('pub_t_m_abe');
        $this->db->select_sum('pub_t_m_orj');
        $this->db->select_sum('pub_t_a_abe');
        $this->db->select_sum('pub_t_a_orj');
        $this->db->select_sum('pub_t_w_abe');
        $this->db->select_sum('pub_t_w_orj');
        $this->db->select_sum('pub_t_s_abe');
        $this->db->select_sum('pub_t_s_orj');

       
        $this->db->select_sum('isbk_t_m_abe');
        $this->db->select_sum('isbk_t_m_orj');
        $this->db->select_sum('isbk_t_a_abe');
        $this->db->select_sum('isbk_t_a_orj');
        $this->db->select_sum('isbk_t_w_abe');
        $this->db->select_sum('isbk_t_w_orj');
        $this->db->select_sum('isbk_t_s_abe');
        $this->db->select_sum('isbk_t_s_orj');

        $this->db->select_sum('mon_t_m_abe');
        $this->db->select_sum('mon_t_m_orj');
        $this->db->select_sum('mon_t_a_abe');
        $this->db->select_sum('mon_t_a_orj');
        $this->db->select_sum('mon_t_w_abe');
        $this->db->select_sum('mon_t_w_orj');
        $this->db->select_sum('mon_t_s_abe');
        $this->db->select_sum('mon_t_s_orj');

        $this->db->select_sum('bnbk_t_m_abe');
        $this->db->select_sum('bnbk_t_m_orj');
        $this->db->select_sum('bnbk_t_a_abe');
        $this->db->select_sum('bnbk_t_a_orj');
        $this->db->select_sum('bnbk_t_w_abe');
        $this->db->select_sum('bnbk_t_w_orj');
        $this->db->select_sum('bnbk_t_s_abe');
        $this->db->select_sum('bnbk_t_s_orj');
        

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

       
        $this->db->select_sum('office_course_shakha');
        $this->db->select_sum('office_course_kendro');
        $this->db->select_sum('office_deligat_shakha');
        $this->db->select_sum('office_deligat_kendro');
        $this->db->select_sum('office_terminate_shakha');
        $this->db->select_sum('office_terminate_kendro');
        $this->db->select_sum('office_certificate_shakha');
        $this->db->select_sum('office_certificate_kendro');

        $this->db->select_sum('library_course_shakha');
        $this->db->select_sum('library_course_kendro');
        $this->db->select_sum('library_delegate_shakha');
        $this->db->select_sum('library_delegate_kendro');
        $this->db->select_sum('library_terminate_shakha');
        $this->db->select_sum('library_terminate_kendro');
        $this->db->select_sum('library_certificate_shakha');
        $this->db->select_sum('library_certificate_kendro');

        $this->db->select_sum('cv_course_shakha');
        $this->db->select_sum('cv_course_kendro');
        $this->db->select_sum('cv_delegate_shakha');
        $this->db->select_sum('cv_delegate_kendro');
        $this->db->select_sum('cv_terminate_shakha');
        $this->db->select_sum('cv_terminate_kendro');
        $this->db->select_sum('cv_certificate_shakha');
        $this->db->select_sum('cv_certificate_kendro');

        $this->db->select_sum('computer_course_shakha');
        $this->db->select_sum('computer_course_kendro');
        $this->db->select_sum('computer_delegate_shakha');
        $this->db->select_sum('computer_delegate_kendro');
        $this->db->select_sum('computer_terminate_shakha');
        $this->db->select_sum('computer_terminate_kendro');
        $this->db->select_sum('computer_certificate_shakha');
        $this->db->select_sum('computer_certificate_kendro');

        $this->db->select_sum('graphics_course_shakha');
        $this->db->select_sum('graphics_course_kendro');
        $this->db->select_sum('graphics_delegate_shakha');
        $this->db->select_sum('graphics_delegate_kendro');
        $this->db->select_sum('graphics_terminate_shakha');
        $this->db->select_sum('graphics_terminate_kendro');
        $this->db->select_sum('graphics_certificate_shakha');
        $this->db->select_sum('graphics_certificate_kendro');

        $this->db->select_sum('english_course_shakha');
        $this->db->select_sum('english_course_kendro');
        $this->db->select_sum('english_delegate_shakha');
        $this->db->select_sum('english_delegate_kendro');
        $this->db->select_sum('english_terminate_shakha');
        $this->db->select_sum('english_terminate_kendro');
        $this->db->select_sum('english_certificate_shakha');
        $this->db->select_sum('english_certificate_kendro');

        $this->db->select_sum('car_course_shakha');
        $this->db->select_sum('car_course_kendro');
        $this->db->select_sum('car_delegate_shakha');
        $this->db->select_sum('car_delegate_kendro');
        $this->db->select_sum('car_terminate_shakha');
        $this->db->select_sum('car_terminate_kendro');
        $this->db->select_sum('car_certificate_shakha');
        $this->db->select_sum('car_certificate_kendro');

        $this->db->select_sum('other_course_shakha');
        $this->db->select_sum('other_course_kendro');
        $this->db->select_sum('other_delegate_shakha');
        $this->db->select_sum('other_delegate_kendro');
        $this->db->select_sum('other_terminate_shakha');
        $this->db->select_sum('other_terminate_kendro');
        $this->db->select_sum('other_certificate_shakha');
        $this->db->select_sum('other_certificate_kendro');


         $this->db->select_sum('digitalMarketing_course_shakha');
         $this->db->select_sum('digitalMarketing_course_kendro');
         $this->db->select_sum('digitalMarketing_delegate_shakha');
         $this->db->select_sum('digitalMarketing_delegate_kendro');
         $this->db->select_sum('digitalMarketing_terminate_shakha');
         $this->db->select_sum('digitalMarketing_terminate_kendro');
         $this->db->select_sum('digitalMarketing_certificate_shakha');
         $this->db->select_sum('digitalMarketing_certificate_kendro');

         $this->db->select_sum('cyberSecurity_course_shakha');
         $this->db->select_sum('cyberSecurity_course_kendro');
         $this->db->select_sum('cyberSecurity_delegate_shakha');
         $this->db->select_sum('cyberSecurity_delegate_kendro');
         $this->db->select_sum('cyberSecurity_terminate_shakha');
         $this->db->select_sum('cyberSecurity_terminate_kendro');
         $this->db->select_sum('cyberSecurity_certificate_shakha');
         $this->db->select_sum('cyberSecurity_certificate_kendro');

          $this->db->select_sum('englishSpokenCourse_course_shakha');
            $this->db->select_sum('englishSpokenCourse_course_kendro');
            $this->db->select_sum('englishSpokenCourse_delegate_shakha');
            $this->db->select_sum('englishSpokenCourse_delegate_kendro');
            $this->db->select_sum('englishSpokenCourse_terminate_shakha');
            $this->db->select_sum('englishSpokenCourse_terminate_kendro');  
            $this->db->select_sum('englishSpokenCourse_certificate_shakha');
            $this->db->select_sum('englishSpokenCourse_certificate_kendro');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['manob_babostapona_dokkhota_prosikkhon'] = $this->db->get('manob_babostapona_dokkhota_prosikkhon')->first_row('array');
   
    }
        else{
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('manob_babostapona_dokkhota_prosikkhon');
            $this->data['manob_babostapona_dokkhota_prosikkhon'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_coaching');
            $this->data['education_coaching'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('manpower_planing');
            $this->data['manpower_planing'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_coaching_manob');
            $this->data['education_coaching_manob'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('education_motivational_program');
            $this->data['education_motivational_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['education_ideal_home'] = $this->db->get('education_ideal_home')->first_row('array');


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
            $this->data['education_pro_output_4'] = $this->db->get('education_pro_output_4')->first_row('array');


            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_training_program');
            $this->data['human_management_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_managemant_jonobol_shorboraho');
            $this->data['human_managemant_jonobol_shorboraho'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_songothon');
            $this->data['human_management_songothon'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_jonosokti_biodata');
            $this->data['human_management_jonosokti_biodata'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('human_management_bidai_jonosokti');
            $this->data['human_management_bidai_jonosokti'] = $query->first_row('array');
        }

		$this->data['m'] = 'manpower';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/manpower/manpower_bivag_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/manpower/manpower_bivag', $meta, $this->data,'leftmenu/departmentsreport');
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
