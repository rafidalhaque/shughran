<?php defined('BASEPATH') or exit('No direct script access allowed');

class School extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->loggedIn) {
			$this->session->set_userdata('requested_page', $this->uri->uri_string());
			$this->sma->md('login');
		}

		$this->departmentuser = false;

		if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 23) {
			admin_redirect('welcome');
		}
		$this->sma->checkPermissions('index', TRUE, 'departmentsreport');

		if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 23) {  //school
			$this->departmentuser = true;
		}

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 23
        $this->data['department_id'] = 23;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (23)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>23), 'id desc', 1, 0);

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

	function school_page_one($branch_id = NULL)
	{
		//$this->sma->checkPermissions();

		if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('departmentsreport/school-page-one/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
			admin_redirect('departmentsreport/school-page-one/' . $this->session->userdata('branch_id'));
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

		$this->db->select_sum('member_prev');
		$this->db->select_sum('member_pres');
		$this->db->select_sum('member_bri');
		$this->db->select_sum('member_gha');

		$this->db->select_sum('member_prarthi_prev');
		$this->db->select_sum('member_prarthi_pres');
		$this->db->select_sum('member_prarthi_bri');
		$this->db->select_sum('member_prarthi_gha');

		$this->db->select_sum('associate_prev');
		$this->db->select_sum('associate_pres');
		$this->db->select_sum('associate_bri');
		$this->db->select_sum('associate_gha');

		$this->db->select_sum('associate_prarthi_prev');
		$this->db->select_sum('associate_prarthi_pres');
		$this->db->select_sum('associate_prarthi_bri');
		$this->db->select_sum('associate_prarthi_gha');

		$this->db->select_sum('worker_prev');
		$this->db->select_sum('worker_pres');
		$this->db->select_sum('worker_bri');
		$this->db->select_sum('worker_gha');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_manpower'] = $this->db->get('school_manpower')->first_row('array');


		$this->db->select_sum('supporter_prev');
		$this->db->select_sum('supporter_pres');
		$this->db->select_sum('supporter_bri');
		$this->db->select_sum('supporter_gha');

		$this->db->select_sum('bondhu_prev');
		$this->db->select_sum('bondhu_pres');
		$this->db->select_sum('bondhu_bri');
		$this->db->select_sum('bondhu_gha');

		$this->db->select_sum('omuslim_supporter_prev');
		$this->db->select_sum('omuslim_supporter_pres');
		$this->db->select_sum('omuslim_supporter_bri');
		$this->db->select_sum('omuslim_supporter_gha');

		$this->db->select_sum('omuslim_bondhu_prev');
		$this->db->select_sum('omuslim_bondhu_pres');
		$this->db->select_sum('omuslim_bondhu_bri');
		$this->db->select_sum('omuslim_bondhu_gha');

		$this->db->select_sum('shuvakankhi_prev');
		$this->db->select_sum('shuvakankhi_pres');
		$this->db->select_sum('shuvakankhi_bri');
		$this->db->select_sum('shuvakankhi_gha');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_dawat'] = $this->db->get('school_dawat')->first_row('array');

		$this->db->select_sum('thana_prev');
		$this->db->select_sum('thana_pres');
		$this->db->select_sum('thana_bri');
		$this->db->select_sum('thana_gha');

		$this->db->select_sum('word_prev');
		$this->db->select_sum('word_pres');
		$this->db->select_sum('word_bri');
		$this->db->select_sum('word_gha');

		$this->db->select_sum('uposhakah_prev');
		$this->db->select_sum('uposhakah_pres');
		$this->db->select_sum('uposhakah_bri');
		$this->db->select_sum('uposhakah_gha');

		$this->db->select_sum('ss_prev');
		$this->db->select_sum('ss_pres');
		$this->db->select_sum('ss_bri');
		$this->db->select_sum('ss_gha');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_shongothon'] = $this->db->get('school_shongothon')->first_row('array');

		$this->db->select_sum('sathi_tc_num');
		$this->db->select_sum('sathi_tc_pre');

		$this->db->select_sum('kormi_tc_num');
		$this->db->select_sum('kormi_tc_pre');

		$this->db->select_sum('sathi_shobbedari_num');
		$this->db->select_sum('sathi_shobbedari_pre');

		$this->db->select_sum('kormi_shobbedari_num');
		$this->db->select_sum('kormi_shobbedari_pre');

		$this->db->select_sum('somorthok_tc_num');
		$this->db->select_sum('somorthok_tc_pre');

		$this->db->select_sum('academic_tc_num');
		$this->db->select_sum('academic_tc_pre');

		$this->db->select_sum('sham_path_num');
		$this->db->select_sum('sham_path_pre');

		$this->db->select_sum('quran_talim_num');
		$this->db->select_sum('quran_talim_pre');

		$this->db->select_sum('alochona_num');
		$this->db->select_sum('alochona_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_proshikkhon'] = $this->db->get('school_proshikkhon')->first_row('array');


		$this->db->select_sum('tour_num');
		$this->db->select_sum('tour_pre');

		$this->db->select_sum('shongit_num');
		$this->db->select_sum('shongit_pre');


		$this->db->select_sum('gk_ashor_num');
		$this->db->select_sum('gk_ashor_pre');

		$this->db->select_sum('cha_chokro_num');
		$this->db->select_sum('cha_chokro_pre');

		$this->db->select_sum('boat_travel_num');
		$this->db->select_sum('boat_travel_pre');

		$this->db->select_sum('sadaron_shova_num');
		$this->db->select_sum('sadaron_shova_pre');

		$this->db->select_sum('other_num');
		$this->db->select_sum('other_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_dawat_program'] = $this->db->get('school_dawat_program')->first_row('array');
	
	}
	else{

		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get("school_dawat_program");
		$this->data['school_dawat_program'] = $query->first_row('array');
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get("school_manpower");
		$this->data['school_manpower'] = $query->first_row('array');
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get("school_dawat");
		$this->data['school_dawat'] = $query->first_row('array');
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get("school_shongothon");
		$this->data['school_shongothon'] = $query->first_row('array');
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get("school_proshikkhon");
		$this->data['school_proshikkhon'] = $query->first_row('array');
	}



		$this->data['m'] = 'school';
		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
		$meta = array('page_title' => lang('manpower'), 'bc' => $bc);

		if ($branch_id)
			$this->page_construct('departmentsreport/school/school_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
		else
			$this->page_construct('departmentsreport/school/school_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
	}



	function school_page_two($branch_id = NULL)
	{
		//$this->sma->checkPermissions();

		if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('departmentsreport/school-page-two/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
			admin_redirect('departmentsreport/school-page-two/' . $this->session->userdata('branch_id'));
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
		$this->db->select_sum('golpo_asor_num');
		$this->db->select_sum('golpo_asor_pre');

		$this->db->select_sum('kobita_asor_num');
		$this->db->select_sum('kobita_asor_pre');

		$this->db->select_sum('nobir_bani_num');
		$this->db->select_sum('nobir_bani_pre');

		$this->db->select_sum('sahosi_manus_num');
		$this->db->select_sum('sahosi_manus_pre');

		$this->db->select_sum('sahabi_num');
		$this->db->select_sum('sahabi_pre');

		$this->db->select_sum('muslim_giboni_num');
		$this->db->select_sum('muslim_giboni_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_dowati_asor'] = $this->db->get('school_dowati_asor')->first_row('array');

		$this->db->select_sum('hand_writing_com_num');
		$this->db->select_sum('hand_writing_com_pre');
		
		$this->db->select_sum('debate_com_num');
		$this->db->select_sum('debate_com_pre');

		$this->db->select_sum('memory_test_num');
		$this->db->select_sum('memory_test_pre');

		$this->db->select_sum('word_com_num');
		$this->db->select_sum('word_com_pre');

		$this->db->select_sum('drawing_com_num');
		$this->db->select_sum('drawing_com_pre');

		$this->db->select_sum('composition_com_num');
		$this->db->select_sum('composition_com_pre');

		$this->db->select_sum('story_com_num');
		$this->db->select_sum('story_com_pre');

		$this->db->select_sum('quiz_com_num');
		$this->db->select_sum('quiz_com_pre');

		$this->db->select_sum('writing_com_num');
		$this->db->select_sum('writing_com_pre');

		$this->db->select_sum('law_com_num');
		$this->db->select_sum('law_com_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_creative_search'] = $this->db->get('school_creative_search')->first_row('array');
		
		$this->db->select_sum('pec_num');
		$this->db->select_sum('pec_pre');

		$this->db->select_sum('jsc_num');
		$this->db->select_sum('jsc_pre');

		$this->db->select_sum('ssc_num');
		$this->db->select_sum('ssc_pre');

		$this->db->select_sum('single_digit_num');
		$this->db->select_sum('single_digit_pre');

		$this->db->select_sum('school_cabinet_num');
		$this->db->select_sum('school_cabinet_pre');

		$this->db->select_sum('scolorship_num');
		$this->db->select_sum('scolorship_pre');

		$this->db->select_sum('place_num');
		$this->db->select_sum('place_pre');

		$this->db->select_sum('fresher_num');
		$this->db->select_sum('fresher_pre');

		$this->db->select_sum('class_captain_num');
		$this->db->select_sum('class_captain_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_reception'] = $this->db->get('school_reception')->first_row('array');

		$this->db->select_sum('boi_path_num');
		$this->db->select_sum('boi_path_pre');

		$this->db->select_sum('kishor_path_num');
		$this->db->select_sum('kishor_path_pre');

		$this->db->select_sum('sirat_path_num');
		$this->db->select_sum('sirat_path_pre');

		$this->db->select_sum('literature_path_num');
		$this->db->select_sum('literature_path_pre');

		$this->db->select_sum('kobita_path_num');
		$this->db->select_sum('kobita_path_pre');

		$this->db->select_sum('quiz_num');
		$this->db->select_sum('quiz_pre');

		$this->db->select_sum('quiz_online_num');
		$this->db->select_sum('quiz_online_pre');

		$this->db->select_sum('speak_num');
		$this->db->select_sum('speak_pre');

		$this->db->select_sum('acting_num');
		$this->db->select_sum('acting_pre');

		$this->db->select_sum('debate_num');
		$this->db->select_sum('debate_pre');

		$this->db->select_sum('hasi_num');
		$this->db->select_sum('hasi_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_compition_dawati_program'] = $this->db->get('school_compition_dawati_program')->first_row('array');
		
		$this->db->select_sum('math_olympiad_num');
		$this->db->select_sum('math_olympiad_pre');

		$this->db->select_sum('science_olympiad_num');
		$this->db->select_sum('science_olympiad_pre');

		$this->db->select_sum('english_olympaid_num');
		$this->db->select_sum('english_olympaid_pre');

		$this->db->select_sum('somor_camp_num');
		$this->db->select_sum('somor_camp_pre');

		$this->db->select_sum('winter_camp_num');
		$this->db->select_sum('winter_camp_pre');

		$this->db->select_sum('boi_mela_num');
		$this->db->select_sum('boi_mela_pre');

		$this->db->select_sum('science_mela_num');
		$this->db->select_sum('science_mela_pre');

		$this->db->select_sum('drawing_show_num');
		$this->db->select_sum('drawing_show_pre');

		$this->db->select_sum('acting_show_num');
		$this->db->select_sum('acting_show_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_olympiad_camp'] = $this->db->get('school_olympiad_camp')->first_row('array');
		
	
		}
		else{

			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_dowati_asor');
			$this->data['school_dowati_asor'] = $query->first_row('array');

			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_creative_search');
			$this->data['school_creative_search'] = $query->first_row('array');

			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_reception');
			$this->data['school_reception'] = $query->first_row('array');

			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_compition_dawati_program');
			$this->data['school_compition_dawati_program'] = $query->first_row('array');

			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_olympiad_camp');
			$this->data['school_olympiad_camp'] = $query->first_row('array');
		}

	


		$this->data['m'] = 'school';
		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
		$meta = array('page_title' => lang('manpower'), 'bc' => $bc);

		if ($branch_id)
			$this->page_construct('departmentsreport/school/school_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
		else
			$this->page_construct('departmentsreport/school/school_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
	}

	function school_page_three($branch_id = NULL)
	{
		//$this->sma->checkPermissions();

		if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('departmentsreport/school-page-three/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
			admin_redirect('departmentsreport/school-page-three/' . $this->session->userdata('branch_id'));
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
		$this->db->select_sum('cricket_num');
		$this->db->select_sum('cricket_pre');

		$this->db->select_sum('football_num');
		$this->db->select_sum('football_pre');

		$this->db->select_sum('volleyball_num');
		$this->db->select_sum('volleyball_pre');

		$this->db->select_sum('badmintor_num');
		$this->db->select_sum('badmintor_pre');

		$this->db->select_sum('other_num');
		$this->db->select_sum('other_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_sports'] = $this->db->get('school_sports')->first_row('array');

		$this->db->select_sum('akash_sowa_num');
		$this->db->select_sum('akash_sowa_pre');

		$this->db->select_sum('deshtake_gorte_num');
		$this->db->select_sum('deshtake_gorte_pre');

		$this->db->select_sum('medhabi_num');
		$this->db->select_sum('medhabi_pre');

		$this->db->select_sum('free_test_num');
		$this->db->select_sum('free_test_pre');

		$this->db->select_sum('complex_tropice_num');
		$this->db->select_sum('complex_tropice_pre');

		$this->db->select_sum('a_plus_num');
		$this->db->select_sum('a_plus_pre');

		$this->db->select_sum('doctor_num');
		$this->db->select_sum('doctor_pre');

		$this->db->select_sum('enginner_num');
		$this->db->select_sum('enginner_pre');

		$this->db->select_sum('moral_development_num');
		$this->db->select_sum('moral_development_pre');

		$this->db->select_sum('sopken_english_num');
		$this->db->select_sum('sopken_english_pre');

		$this->db->select_sum('coumputer_course_num');
		$this->db->select_sum('coumputer_course_pre');

		$this->db->select_sum('academic_exam_num');
		$this->db->select_sum('academic_exam_pre');

		$this->db->select_sum('cg_prog_num');
		$this->db->select_sum('cg_prog_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_career_design'] = $this->db->get('school_career_design')->first_row('array');


		$this->db->select_sum('health_camp_num');
		$this->db->select_sum('health_camp_pre');

		$this->db->select_sum('cleaning_num');
		$this->db->select_sum('cleaning_pre');

		$this->db->select_sum('winter_num');
		$this->db->select_sum('winter_pre');

		$this->db->select_sum('day_num');
		$this->db->select_sum('day_pre');

		$this->db->select_sum('tree_plant_num');
		$this->db->select_sum('tree_plant_pre');

		$this->db->select_sum('blood_group_num');
		$this->db->select_sum('blood_group_pre');

		$this->db->select_sum('other_num');
		$this->db->select_sum('other_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_samajik_kaj'] = $this->db->get('school_samajik_kaj')->first_row('array');
		
		$this->db->select_sum('sathi_boithok_num');
		$this->db->select_sum('sathi_boithok_pre');

		$this->db->select_sum('sathi_prarthi_boithok_num');
		$this->db->select_sum('sathi_prarthi_boithok_pre');

		$this->db->select_sum('kormi_boithok_num');
		$this->db->select_sum('kormi_boithok_pre');

		$this->db->select_sum('school_protinidhi_num');
		$this->db->select_sum('school_protinidhi_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_boithok'] = $this->db->get('school_boithok')->first_row('array');

		$this->db->select_sum('associate_num');
		$this->db->select_sum('associate_pre');

		$this->db->select_sum('associate_can_num');
		$this->db->select_sum('associate_can_pre');

		$this->db->select_sum('worker_num');
		$this->db->select_sum('worker_pre');

		$this->db->select_sum('school_karjokrom_shompadok_num');
		$this->db->select_sum('school_karjokrom_shompadok_pre');

		$this->db->select_sum('school_sathi_num');
		$this->db->select_sum('school_sathi_pre');

		$this->db->select_sum('school_dayittoshil_num');
		$this->db->select_sum('school_dayittoshil_pre');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_workshop'] = $this->db->get('school_workshop')->first_row('array');
		
		$this->db->select_sum('eight_stu_center_manpower_num');
		$this->db->select_sum('eight_stu_center_manpower_pre');

		$this->db->select_sum('eight_stu_center_general_num');
		$this->db->select_sum('eight_stu_center_general_pre');

		$this->db->select_sum('eight_stu_shakha_manpower_num');
		$this->db->select_sum('eight_stu_shakha_manpower_pre');

		$this->db->select_sum('eight_stu_shakha_general_num');
		$this->db->select_sum('eight_stu_shakha_general_pre');

		$this->db->select_sum('nine_stu_center_manpower_num');
		$this->db->select_sum('nine_stu_center_manpower_pre');

		$this->db->select_sum('nine_stu_center_general_num');
		$this->db->select_sum('nine_stu_center_general_pre');

		$this->db->select_sum('nine_stu_shakha_manpower_num');
		$this->db->select_sum('nine_stu_shakha_manpower_pre');

		$this->db->select_sum('nine_stu_shakha_general_num');
		$this->db->select_sum('nine_stu_shakha_general_pre');

		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_summit'] = $this->db->get('school_summit')->first_row('array');	
		
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

        $this->data['school_training_program'] = $this->db->get('school_training_program')->first_row('array');
    
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
    	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('school_summit');
        $this->data['school_summit'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('school_training_program');
        $this->data['school_training_program'] = $query->first_row('array');	
    
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get('school_samajik_kaj');
		$this->data['school_samajik_kaj'] = $query->first_row('array');
		
		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get('school_workshop');
		$this->data['school_workshop'] = $query->first_row('array');

		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get('school_sports');
		$this->data['school_sports'] = $query->first_row('array');

		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get('school_boithok');
		$this->data['school_boithok'] = $query->first_row('array');

		$this->db->select('*');
		$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$query = $this->db->get('school_career_design');
		$this->data['school_career_design'] = $query->first_row('array');
	
		}

	

		$this->data['m'] = 'school';
		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
		$meta = array('page_title' => lang('manpower'), 'bc' => $bc);

		if ($branch_id)
			$this->page_construct('departmentsreport/school/school_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
		else
			$this->page_construct('departmentsreport/school/school_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
	}

	function school_page_four($branch_id = NULL)
	{
		//$this->sma->checkPermissions();

		if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
			$this->session->set_flashdata('warning', lang('access_denied'));
			admin_redirect('departmentsreport/school-page-four/' . $this->session->userdata('branch_id'));
		} else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
			admin_redirect('departmentsreport/school-page-four/' . $this->session->userdata('branch_id'));
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
			$this->db->select_sum('kishor_potrika_bn_prev');
			$this->db->select_sum('kishor_potrika_bn_pres');

			$this->db->select_sum('new_kishor_potrika_bn_prev');
			$this->db->select_sum('new_kishor_potrika_bn_pres');
	
			$this->db->select_sum('kishor_portrika_en_prev');
			$this->db->select_sum('kishor_portrika_en_pres');
	
			$this->db->select_sum('sticker_prev');
			$this->db->select_sum('sticker_pres');
	
			$this->db->select_sum('class_routine_prev');
			$this->db->select_sum('class_routine_pres');
	
			$this->db->select_sum('deyalika_prev');
			$this->db->select_sum('deyalika_pres');
	
			$this->db->select_sum('chora_pata_prev');
			$this->db->select_sum('chora_pata_pres');
	
			$this->db->select_sum('exam_routine_prev');
			$this->db->select_sum('exam_routine_pres');
	
			$this->db->select_sum('masik_shamoyiki_prev');
			$this->db->select_sum('masik_shamoyiki_pres');
	
			$this->db->select_sum('hashir_kagoj_prev');
			$this->db->select_sum('hashir_kagoj_pres');
	
			$this->db->select_sum('fulel_shuvechcha_prev');
			$this->db->select_sum('fulel_shuvechcha_pres');
	
			$this->db->select_sum('porchiti_prev');
			$this->db->select_sum('porchiti_pres');
	
			$this->db->select_sum('shahitto_prev');
			$this->db->select_sum('shahitto_pres');

			$this->db->select_sum('calendar_prev');
			$this->db->select_sum('calendar_pres');
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$this->data['school_bitoron'] = $this->db->get('school_bitoron')->first_row('array');
			
			$this->db->select_sum('circular_kendro_theke');
			$this->db->select_sum('circular_shaka_theke');
			$this->db->select_sum('circular_other');
	
			$this->db->select_sum('letter_kendro_theke');
			$this->db->select_sum('letter_shaka_theke');
			$this->db->select_sum('letter_other');
	
			$this->db->select_sum('email_kendro_theke');
			$this->db->select_sum('email_shaka_theke');
			$this->db->select_sum('email_other');
	
			$this->db->select_sum('sms_kendro_theke');
			$this->db->select_sum('sms_shaka_theke');
			$this->db->select_sum('sms_other');
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$this->data['school_contact'] = $this->db->get('school_contact')->first_row('array');
			
			$this->db->select_sum('central_sompadok');
			$this->db->select_sum('central_member');
			$this->db->select_sum('shakha_p_s');
			$this->db->select_sum('shakha_sec');
			if ($branch_id)
			$this->db->where('branch_id', $branch_id);
		$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$this->data['school_sofor'] = $this->db->get('school_sofor')->first_row('array');
			
				
		$this->db->select_sum('mem_mot_examine');
		$this->db->select_sum('mem_gpa_5');
		$this->db->select_sum('mem_a_grade');
		$this->db->select_sum('mem_a_minus');
		$this->db->select_sum('mem_b_grade');
		$this->db->select_sum('mem_c_grade');
		$this->db->select_sum('mem_d_grade');

		$this->db->select_sum('sathi_mot_examine');
		$this->db->select_sum('sathi_gpa_5');
		$this->db->select_sum('sathi_a_grade');
		$this->db->select_sum('sathi_a_minus');
		$this->db->select_sum('sathi_b_grade');
		$this->db->select_sum('sathi_c_grade');
		$this->db->select_sum('sathi_d_grade');

		$this->db->select_sum('kormi_mot_examine');
		$this->db->select_sum('kormi_gpa_5');
		$this->db->select_sum('kormi_a_grade');
		$this->db->select_sum('kormi_a_minus');
		$this->db->select_sum('kormi_b_grade');
		$this->db->select_sum('kormi_c_grade');
		$this->db->select_sum('kormi_d_grade');

		$this->db->select_sum('shomorthok_mot_examine');
		$this->db->select_sum('shomorthok_gpa_5');
		$this->db->select_sum('shomorthok_a_grade');
		$this->db->select_sum('shomorthok_a_minus');
		$this->db->select_sum('shomorthok_b_grade');
		$this->db->select_sum('shomorthok_c_grade');
		$this->db->select_sum('shomorthok_d_grade');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_jsc_result'] = $this->db->get('school_jsc_result')->first_row('array');

		$this->db->select_sum('shodossho_s_mot_examine');
		$this->db->select_sum('shodossho_s_gpa_5');
		$this->db->select_sum('shodossho_s_a_grade');
		$this->db->select_sum('shodossho_s_a_minus');
		$this->db->select_sum('shodossho_s_b_grade');
		$this->db->select_sum('shodossho_s_c_grade');
		$this->db->select_sum('shodossho_s_d_grade');

		$this->db->select_sum('shodossho_a_mot_examine');
		$this->db->select_sum('shodossho_a_gpa_5');
		$this->db->select_sum('shodossho_a_a_grade');
		$this->db->select_sum('shodossho_a_a_minus');
		$this->db->select_sum('shodossho_a_b_grade');
		$this->db->select_sum('shodossho_a_c_grade');
		$this->db->select_sum('shodossho_a_d_grade');

		$this->db->select_sum('shodossho_c_mot_examine');
		$this->db->select_sum('shodossho_c_gpa_5');
		$this->db->select_sum('shodossho_c_a_grade');
		$this->db->select_sum('shodossho_c_a_minus');
		$this->db->select_sum('shodossho_c_b_grade');
		$this->db->select_sum('shodossho_c_c_grade');
		$this->db->select_sum('shodossho_c_d_grade');

		// sathi
		$this->db->select_sum('sathi_s_mot_examine');
		$this->db->select_sum('sathi_s_gpa_5');
		$this->db->select_sum('sathi_s_a_grade');
		$this->db->select_sum('sathi_s_a_minus');
		$this->db->select_sum('sathi_s_b_grade');
		$this->db->select_sum('sathi_s_c_grade');
		$this->db->select_sum('sathi_s_d_grade');

		$this->db->select_sum('sathi_a_mot_examine');
		$this->db->select_sum('sathi_a_gpa_5');
		$this->db->select_sum('sathi_a_a_grade');
		$this->db->select_sum('sathi_a_a_minus');
		$this->db->select_sum('sathi_a_b_grade');
		$this->db->select_sum('sathi_a_c_grade');
		$this->db->select_sum('sathi_a_d_grade');

		$this->db->select_sum('sathi_c_mot_examine');
		$this->db->select_sum('sathi_c_gpa_5');
		$this->db->select_sum('sathi_c_a_grade');
		$this->db->select_sum('sathi_c_a_minus');
		$this->db->select_sum('sathi_c_b_grade');
		$this->db->select_sum('sathi_c_c_grade');
		$this->db->select_sum('sathi_c_d_grade');

		// kormi
		$this->db->select_sum('kormi_s_mot_examine');
		$this->db->select_sum('kormi_s_gpa_5');
		$this->db->select_sum('kormi_s_a_grade');
		$this->db->select_sum('kormi_s_a_minus');
		$this->db->select_sum('kormi_s_b_grade');
		$this->db->select_sum('kormi_s_c_grade');
		$this->db->select_sum('kormi_s_d_grade');

		$this->db->select_sum('kormi_a_mot_examine');
		$this->db->select_sum('kormi_a_gpa_5');
		$this->db->select_sum('kormi_a_a_grade');
		$this->db->select_sum('kormi_a_a_minus');
		$this->db->select_sum('kormi_a_b_grade');
		$this->db->select_sum('kormi_a_c_grade');
		$this->db->select_sum('kormi_a_d_grade');

		$this->db->select_sum('kormi_c_mot_examine');
		$this->db->select_sum('kormi_c_gpa_5');
		$this->db->select_sum('kormi_c_a_grade');
		$this->db->select_sum('kormi_c_a_minus');
		$this->db->select_sum('kormi_c_b_grade');
		$this->db->select_sum('kormi_c_c_grade');
		$this->db->select_sum('kormi_c_d_grade');

		// somorthiok
		$this->db->select_sum('shomorthok_s_mot_examine');
		$this->db->select_sum('shomorthok_s_gpa_5');
		$this->db->select_sum('shomorthok_s_a_grade');
		$this->db->select_sum('shomorthok_s_a_minus');
		$this->db->select_sum('shomorthok_s_b_grade');
		$this->db->select_sum('shomorthok_s_c_grade');
		$this->db->select_sum('shomorthok_s_d_grade');

		$this->db->select_sum('shomorthok_a_mot_examine');
		$this->db->select_sum('shomorthok_a_gpa_5');
		$this->db->select_sum('shomorthok_a_a_grade');
		$this->db->select_sum('shomorthok_a_a_minus');
		$this->db->select_sum('shomorthok_a_b_grade');
		$this->db->select_sum('shomorthok_a_c_grade');
		$this->db->select_sum('shomorthok_a_d_grade');

		$this->db->select_sum('shomorthok_c_mot_examine');
		$this->db->select_sum('shomorthok_c_gpa_5');
		$this->db->select_sum('shomorthok_c_a_grade');
		$this->db->select_sum('shomorthok_c_a_minus');
		$this->db->select_sum('shomorthok_c_b_grade');
		$this->db->select_sum('shomorthok_c_c_grade');
		$this->db->select_sum('shomorthok_c_d_grade');
		if ($branch_id)
		$this->db->where('branch_id', $branch_id);
	$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

		$this->data['school_ssc_result'] = $this->db->get('school_ssc_result')->first_row('array');

		}
		else{
			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_bitoron');
			$this->data['school_bitoron'] = $query->first_row('array');
			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_contact');
			$this->data['school_contact'] = $query->first_row('array');
			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_sofor');
			$this->data['school_sofor'] = $query->first_row('array');
			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_jsc_result');
			$this->data['school_jsc_result'] = $query->first_row('array');
			$this->db->select('*');
			$this->db->where('branch_id', $branch_id);
			$this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

			$query = $this->db->get('school_ssc_result');
			$this->data['school_ssc_result'] = $query->first_row('array');
		}

		


		$this->data['m'] = 'school';
		$bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
		$meta = array('page_title' => lang('manpower'), 'bc' => $bc);

		if ($branch_id)
			$this->page_construct('departmentsreport/school/school_page_four_entry', $meta, $this->data, 'leftmenu/departmentsreport');
		else
			$this->page_construct('departmentsreport/school/school_page_four', $meta, $this->data, 'leftmenu/departmentsreport');
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
