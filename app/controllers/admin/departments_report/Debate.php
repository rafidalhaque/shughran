<?php defined('BASEPATH') or exit('No direct script access allowed');

class Debate extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 25) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 25) { //literature
            $this->departmentuser = true;
        }
        
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 25
        $this->data['department_id'] = 25;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  25)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>25), 'id desc', 1, 0);

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

    public function bitorko_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

      

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/bitorko-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/bitorko-page-one/' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays($report_type);

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {
            




            $this->db->select_sum('sodosso_pb_stha');
            $this->db->select_sum('sodosso_pb_ostha');
            $this->db->select_sum('sodosso_bm_stha');
            $this->db->select_sum('sodosso_bm_ostha');
            $this->db->select_sum('sodosso_br_stha');
            $this->db->select_sum('sodosso_br_ostha');
            $this->db->select_sum('sodosso_ght_stha');
            $this->db->select_sum('sodosso_ght_ostha');

            $this->db->select_sum('sathi_pb_stha');
            $this->db->select_sum('sathi_pb_ostha');
            $this->db->select_sum('sathi_bm_stha');
            $this->db->select_sum('sathi_bm_ostha');
            $this->db->select_sum('sathi_br_stha');
            $this->db->select_sum('sathi_br_ostha');
            $this->db->select_sum('sathi_ght_stha');
            $this->db->select_sum('sathi_ght_ostha');

            $this->db->select_sum('kormi_pb_stha');
            $this->db->select_sum('kormi_pb_ostha');
            $this->db->select_sum('kormi_bm_stha');
            $this->db->select_sum('kormi_bm_ostha');
            $this->db->select_sum('kormi_br_stha');
            $this->db->select_sum('kormi_br_ostha');
            $this->db->select_sum('kormi_ght_stha');
            $this->db->select_sum('kormi_ght_ostha');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_niojito_sangothonik_jonoshokti'] = $this->db->get('debate_niojito_sangothonik_jonoshokti')->first_row('array');

            // বিতার্কিক জনশক্তি
            $this->db->select_sum('pbk_pb_sod');
            $this->db->select_sum('pbk_pb_sat');
            $this->db->select_sum('pbk_pb_kor');
            $this->db->select_sum('pbk_bm_sod');
            $this->db->select_sum('pbk_bm_sat');
            $this->db->select_sum('pbk_bm_kor');
            $this->db->select_sum('pbk_br_sod');
            $this->db->select_sum('pbk_br_sat');
            $this->db->select_sum('pbk_br_kor');
            $this->db->select_sum('pbk_ght_sod');
            $this->db->select_sum('pbk_ght_sat');
            $this->db->select_sum('pbk_ght_kor');
            $this->db->select_sum('tlvnbk_pb_sod');
            $this->db->select_sum('tlvnbk_pb_sat');
            $this->db->select_sum('tlvnbk_pb_kor');
            $this->db->select_sum('tlvnbk_bm_sod');
            $this->db->select_sum('tlvnbk_bm_sat');
            $this->db->select_sum('tlvnbk_bm_kor');
            $this->db->select_sum('tlvnbk_br_sod');
            $this->db->select_sum('tlvnbk_br_sat');
            $this->db->select_sum('tlvnbk_br_kor');
            $this->db->select_sum('tlvnbk_ght_sod');
            $this->db->select_sum('tlvnbk_ght_sat');
            $this->db->select_sum('tlvnbk_ght_kor');
            $this->db->select_sum('jtobk_pb_sod');
            $this->db->select_sum('jtobk_pb_sat');
            $this->db->select_sum('jtobk_pb_kor');
            $this->db->select_sum('jtobk_bm_sod');
            $this->db->select_sum('jtobk_bm_sat');
            $this->db->select_sum('jtobk_bm_kor');
            $this->db->select_sum('jtobk_br_sod');
            $this->db->select_sum('jtobk_br_sat');
            $this->db->select_sum('jtobk_br_kor');
            $this->db->select_sum('jtobk_ght_sod');
            $this->db->select_sum('jtobk_ght_sat');
            $this->db->select_sum('jtobk_ght_kor');
            $this->db->select_sum('bk_pb_sod');
            $this->db->select_sum('bk_pb_sat');
            $this->db->select_sum('bk_pb_kor');
            $this->db->select_sum('bk_bm_sod');
            $this->db->select_sum('bk_bm_sat');
            $this->db->select_sum('bk_bm_kor');
            $this->db->select_sum('bk_br_sod');
            $this->db->select_sum('bk_br_sat');
            $this->db->select_sum('bk_br_kor');
            $this->db->select_sum('bk_ght_sod');
            $this->db->select_sum('bk_ght_sat');
            $this->db->select_sum('bk_ght_kor');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_bitarkik_jonoshokti'] = $this->db->get('debate_bitarkik_jonoshokti')->first_row('array');

            // বিতর্ক ক্লাবের বিবরন

            $this->db->select_sum('general_club_prev');
            $this->db->select_sum('general_club_pres');
            $this->db->select_sum('general_club_bri');
            $this->db->select_sum('general_club_gha');
            $this->db->select_sum('general_club_comments');

            $this->db->select_sum('general_club_komiti');
            $this->db->select_sum('general_club_club');

            $this->db->select_sum('shang_shakha_club_prev');
            $this->db->select_sum('shang_shakha_club_pres');
            $this->db->select_sum('shang_shakha_club_bri');
            $this->db->select_sum('shang_shakha_club_gha');
            $this->db->select_sum('shang_shakha_club_comments');

            $this->db->select_sum('shang_shakha_club_komiti');
            $this->db->select_sum('shang_shakha_club_club');

            $this->db->select_sum('shang_thana_prev');
            $this->db->select_sum('shang_thana_pres');
            $this->db->select_sum('shang_thana_bri');
            $this->db->select_sum('shang_thana_gha');
            $this->db->select_sum('shang_thana_comments');

            $this->db->select_sum('shang_thana_komiti');
            $this->db->select_sum('shang_thana_club');

            $this->db->select_sum('shang_thana_club_prev');
            $this->db->select_sum('shang_thana_club_pres');
            $this->db->select_sum('shang_thana_club_bri');
            $this->db->select_sum('shang_thana_club_gha');
            $this->db->select_sum('shang_thana_club_comments');

            $this->db->select_sum('shang_thana_club_komiti');
            $this->db->select_sum('shang_thana_club_club');

            $this->db->select_sum('university_prev');
            $this->db->select_sum('university_pres');
            $this->db->select_sum('university_bri');
            $this->db->select_sum('university_gha');
            $this->db->select_sum('university_comments');

            $this->db->select_sum('university_komiti');
            $this->db->select_sum('university_club');

            $this->db->select_sum('university_club_prev');
            $this->db->select_sum('university_club_pres');
            $this->db->select_sum('university_club_bri');
            $this->db->select_sum('university_club_gha');
            $this->db->select_sum('university_club_comments');

            $this->db->select_sum('university_club_komiti');
            $this->db->select_sum('university_club_club');

            $this->db->select_sum('college_prev');
            $this->db->select_sum('college_pres');
            $this->db->select_sum('college_bri');
            $this->db->select_sum('college_gha');
            $this->db->select_sum('college_comments');

            $this->db->select_sum('college_komiti');
            $this->db->select_sum('college_club');

            $this->db->select_sum('college_club_prev');
            $this->db->select_sum('college_club_pres');
            $this->db->select_sum('college_club_bri');
            $this->db->select_sum('college_club_gha');
            $this->db->select_sum('college_club_comments');

            $this->db->select_sum('college_club_komiti');
            $this->db->select_sum('college_club_club');

            $this->db->select_sum('madrasha_prev');
            $this->db->select_sum('madrasha_pres');
            $this->db->select_sum('madrasha_bri');
            $this->db->select_sum('madrasha_gha');
            $this->db->select_sum('madrasha_comments');

            $this->db->select_sum('madrasha_komiti');
            $this->db->select_sum('madrasha_club');

            $this->db->select_sum('madrasha_club_prev');
            $this->db->select_sum('madrasha_club_pres');
            $this->db->select_sum('madrasha_club_bri');
            $this->db->select_sum('madrasha_club_gha');
            $this->db->select_sum('madrasha_club_comments');

            $this->db->select_sum('madrasha_club_komiti');
            $this->db->select_sum('madrasha_club_club');

            $this->db->select_sum('school_prev');
            $this->db->select_sum('school_pres');
            $this->db->select_sum('school_bri');
            $this->db->select_sum('school_gha');
            $this->db->select_sum('school_comments');

            $this->db->select_sum('school_komiti');
            $this->db->select_sum('school_club');

            $this->db->select_sum('school_club_prev');
            $this->db->select_sum('school_club_pres');
            $this->db->select_sum('school_club_bri');
            $this->db->select_sum('school_club_gha');
            $this->db->select_sum('school_club_comments');

            $this->db->select_sum('school_club_komiti');
            $this->db->select_sum('school_club_club');

            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_bitorko_club_biboron'] = $this->db->get('debate_bitorko_club_biboron')->first_row('array');

            // প্রোগ্রামসমূহ
            $this->db->select_sum('pro_debate_s');
            $this->db->select_sum('tel_debate_s');
            $this->db->select_sum('nat_debate_s');
            $this->db->select_sum('debate_s');
            $this->db->select_sum('upodesta_s');
            $this->db->select_sum('suvakankhi_s');
            $this->db->select_sum('other_s');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_contact'] = $this->db->get('debate_contact')->first_row('array');

            // প্রোগ্রামসমূহ

            // $this->sma->print_arrays( $this->data['debate_niojito_sangothonik_jonoshokti']);

        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_contact');
            $this->data['debate_contact'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_niojito_sangothonik_jonoshokti');
            $this->data['debate_niojito_sangothonik_jonoshokti'] = $query->first_row('array');

            // $this->sma->print_arrays( $this->data['debate_niojito_sangothonik_jonoshokti']);

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_bitarkik_jonoshokti');
            $this->data['debate_bitarkik_jonoshokti'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_bitorko_club_biboron');
            $this->data['debate_bitorko_club_biboron'] = $query->first_row('array');
        }

        $this->data['m'] = 'debate';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

       



        if ($branch_id) {
            $this->page_construct('departmentsreport/debate/bitorko_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/debate/bitorko_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function bitorko_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/bitorko-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/bitorko-page-two/' . $this->session->userdata('branch_id'));
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

            // প্রোগ্রামসমূহ

            $this->db->select_sum('bangla_shang_num');
            $this->db->select_sum('bangla_shang_pre');
            $this->db->select_sum('bangla_shadha_num');
            $this->db->select_sum('bangla_shadha_pre');
            $this->db->select_sum('eng_shang_num');
            $this->db->select_sum('eng_shang_pre');
            $this->db->select_sum('eng_shadha_num');
            $this->db->select_sum('eng_shadha_pre');
            $this->db->select_sum('exec_meeting_num');
            $this->db->select_sum('exec_meeting_pre');
            $this->db->select_sum('university_shang_num');
            $this->db->select_sum('university_shang_pre');
            $this->db->select_sum('university_shadha_num');
            $this->db->select_sum('university_shadha_pre');
            $this->db->select_sum('college_shang_num');
            $this->db->select_sum('college_shang_pre');
            $this->db->select_sum('college_shadha_num');
            $this->db->select_sum('college_shadha_pre');
            $this->db->select_sum('school_shang_num');
            $this->db->select_sum('school_shang_pre');
            $this->db->select_sum('school_shadha_num');
            $this->db->select_sum('school_shadha_pre');
            $this->db->select_sum('madrasah_shang_num');
            $this->db->select_sum('madrasah_shang_pre');
            $this->db->select_sum('madrasah_shadha_num');
            $this->db->select_sum('madrasah_shadha_pre');
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_program'] = $this->db->get('debate_program')->first_row('array');

            // প্রতিযোগিতাসমূহ

            $this->db->select_sum('anto_s_s');
            $this->db->select_sum('anto_s_p');
            $this->db->select_sum('anto_s_c');
            $this->db->select_sum('anto_g_s');
            $this->db->select_sum('anto_g_p');
            $this->db->select_sum('anto_g_c');
            $this->db->select_sum('speak_s_s');
            $this->db->select_sum('speak_s_p');
            $this->db->select_sum('speak_s_c');
            $this->db->select_sum('speak_g_s');
            $this->db->select_sum('speak_g_p');
            $this->db->select_sum('speak_g_c');
            $this->db->select_sum('priti_s_s');
            $this->db->select_sum('priti_s_p');
            $this->db->select_sum('priti_s_c');
            $this->db->select_sum('priti_g_s');
            $this->db->select_sum('priti_g_p');
            $this->db->select_sum('priti_g_c');
            $this->db->select_sum('quiz_s_s');
            $this->db->select_sum('quiz_s_p');
            $this->db->select_sum('quiz_s_c');
            $this->db->select_sum('quiz_g_s');
            $this->db->select_sum('quiz_g_p');
            $this->db->select_sum('quiz_g_c');
            $this->db->select_sum('other_s_s');
            $this->db->select_sum('other_s_p');
            $this->db->select_sum('other_s_c');
            $this->db->select_sum('other_g_s');
            $this->db->select_sum('other_g_p');
            $this->db->select_sum('other_g_c');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_protijogita'] = $this->db->get('debate_protijogita')->first_row('array');

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
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $this->data['debate_training_program'] = $this->db->get('debate_training_program')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_training_program');
            $this->data['debate_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_program');
            $this->data['debate_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_bitorko_club_biboron');
            $this->data['debate_bitorko_club_biboron'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('report_type', $report_type['type']);
            $this->db->where('report_year', $report_type['year']);
            $query = $this->db->get('debate_protijogita');
            $this->data['debate_protijogita'] = $query->first_row('array');
        }

        $this->data['m'] = 'debate';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/debate/bitorko_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/debate/bitorko_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }



    public function report_type233()
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

            }
        } else {
            $msg = 'failed';
        }

        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }
}
