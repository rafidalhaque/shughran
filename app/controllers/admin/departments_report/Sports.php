<?php defined('BASEPATH') or exit('No direct script access allowed');

class Sports extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 28) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 28) { //Sports
            $this->departmentuser = true;
        }

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 28
        $this->data['department_id'] = 28;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (28)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>28), 'id desc', 1, 0);

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
    public function sports_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/sports-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/sports-page-one/' . $this->session->userdata('branch_id'));
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



        $this->db->select_sum('thana_tour_num');
        $this->db->select_sum('thana_football_match');
        $this->db->select_sum('thana_football_atten');
        $this->db->select_sum('thana_cricket_match');
        $this->db->select_sum('thana_cricket_atten');
        $this->db->select_sum('thana_badminton_match');
        $this->db->select_sum('thana_badminton_atten');
        $this->db->select_sum('thana_volleyball_match');
        $this->db->select_sum('thana_volleyball_atten');
        $this->db->select_sum('thana_hadudu_match');
        $this->db->select_sum('thana_hadudu_atten');
        $this->db->select_sum('thana_handball_match');
        $this->db->select_sum('thana_handball_atten');
        $this->db->select_sum('thana_other_match');
        $this->db->select_sum('thana_other_atten');
        $this->db->select_sum('ward_tour_num');
        $this->db->select_sum('ward_football_match');
        $this->db->select_sum('ward_football_atten');
        $this->db->select_sum('ward_cricket_match');
        $this->db->select_sum('ward_cricket_atten');
        $this->db->select_sum('ward_badminton_match');
        $this->db->select_sum('ward_badminton_atten');
        $this->db->select_sum('ward_volleyball_match');
        $this->db->select_sum('ward_volleyball_atten');
        $this->db->select_sum('ward_hadudu_match');
        $this->db->select_sum('ward_hadudu_atten');
        $this->db->select_sum('ward_handball_match');
        $this->db->select_sum('ward_handball_atten');
        $this->db->select_sum('ward_other_match');
        $this->db->select_sum('ward_other_atten');
        $this->db->select_sum('uposhakha_tour_num');
        $this->db->select_sum('uposhakha_football_match');
        $this->db->select_sum('uposhakha_football_atten');
        $this->db->select_sum('uposhakha_cricket_match');
        $this->db->select_sum('uposhakha_cricket_atten');
        $this->db->select_sum('uposhakha_badminton_match');
        $this->db->select_sum('uposhakha_badminton_atten');
        $this->db->select_sum('uposhakha_volleyball_match');
        $this->db->select_sum('uposhakha_volleyball_atten');
        $this->db->select_sum('uposhakha_hadudu_match');
        $this->db->select_sum('uposhakha_hadudu_atten');
        $this->db->select_sum('uposhakha_handball_match');
        $this->db->select_sum('uposhakha_handball_atten');
        $this->db->select_sum('uposhakha_other_match');
        $this->db->select_sum('uposhakha_other_atten');
        $this->db->select_sum('univer_tour_num');
        $this->db->select_sum('univer_football_match');
        $this->db->select_sum('univer_football_atten');
        $this->db->select_sum('univer_cricket_match');
        $this->db->select_sum('univer_cricket_atten');
        $this->db->select_sum('univer_badminton_match');
        $this->db->select_sum('univer_badminton_atten');
        $this->db->select_sum('univer_volleyball_match');
        $this->db->select_sum('univer_volleyball_atten');
        $this->db->select_sum('univer_hadudu_match');
        $this->db->select_sum('univer_hadudu_atten');
        $this->db->select_sum('univer_handball_match');
        $this->db->select_sum('univer_handball_atten');
        $this->db->select_sum('univer_other_match');
        $this->db->select_sum('univer_other_atten');
        $this->db->select_sum('college_tour_num');
        $this->db->select_sum('college_football_match');
        $this->db->select_sum('college_football_atten');
        $this->db->select_sum('college_cricket_match');
        $this->db->select_sum('college_cricket_atten');
        $this->db->select_sum('college_badminton_match');
        $this->db->select_sum('college_badminton_atten');
        $this->db->select_sum('college_volleyball_match');
        $this->db->select_sum('college_volleyball_atten');
        $this->db->select_sum('college_hadudu_match');
        $this->db->select_sum('college_hadudu_atten');
        $this->db->select_sum('college_handball_match');
        $this->db->select_sum('college_handball_atten');
        $this->db->select_sum('college_other_match');
        $this->db->select_sum('college_other_atten');
        $this->db->select_sum('school_tour_num');
        $this->db->select_sum('school_football_match');
        $this->db->select_sum('school_football_atten');
        $this->db->select_sum('school_cricket_match');
        $this->db->select_sum('school_cricket_atten');
        $this->db->select_sum('school_badminton_match');
        $this->db->select_sum('school_badminton_atten');
        $this->db->select_sum('school_volleyball_match');
        $this->db->select_sum('school_volleyball_atten');
        $this->db->select_sum('school_hadudu_match');
        $this->db->select_sum('school_hadudu_atten');
        $this->db->select_sum('school_handball_match');
        $this->db->select_sum('school_handball_atten');
        $this->db->select_sum('school_other_match');
        $this->db->select_sum('school_other_atten');
        $this->db->select_sum('madrasah_tour_num');
        $this->db->select_sum('madrasah_football_match');
        $this->db->select_sum('madrasah_football_atten');
        $this->db->select_sum('madrasah_cricket_match');
        $this->db->select_sum('madrasah_cricket_atten');
        $this->db->select_sum('madrasah_badminton_match');
        $this->db->select_sum('madrasah_badminton_atten');
        $this->db->select_sum('madrasah_volleyball_match');
        $this->db->select_sum('madrasah_volleyball_atten');
        $this->db->select_sum('madrasah_hadudu_match');
        $this->db->select_sum('madrasah_hadudu_atten');
        $this->db->select_sum('madrasah_handball_match');
        $this->db->select_sum('madrasah_handball_atten');
        $this->db->select_sum('madrasah_other_match');
        $this->db->select_sum('madrasah_other_atten');
        $this->db->select_sum('protishthan_tour_num');
        $this->db->select_sum('protishthan_football_match');
        $this->db->select_sum('protishthan_football_atten');
        $this->db->select_sum('protishthan_cricket_match');
        $this->db->select_sum('protishthan_cricket_atten');
        $this->db->select_sum('protishthan_badminton_match');
        $this->db->select_sum('protishthan_badminton_atten');
        $this->db->select_sum('protishthan_volleyball_match');
        $this->db->select_sum('protishthan_volleyball_atten');
        $this->db->select_sum('protishthan_hadudu_match');
        $this->db->select_sum('protishthan_hadudu_atten');
        $this->db->select_sum('protishthan_handball_match');
        $this->db->select_sum('protishthan_handball_atten');
        $this->db->select_sum('protishthan_other_match');
        $this->db->select_sum('protishthan_other_atten');
        $this->db->select_sum('other_tour_num');
        $this->db->select_sum('other_football_match');
        $this->db->select_sum('other_football_atten');
        $this->db->select_sum('other_cricket_match');
        $this->db->select_sum('other_cricket_atten');
        $this->db->select_sum('other_badminton_match');
        $this->db->select_sum('other_badminton_atten');
        $this->db->select_sum('other_volleyball_match');
        $this->db->select_sum('other_volleyball_atten');
        $this->db->select_sum('other_hadudu_match');
        $this->db->select_sum('other_hadudu_atten');
        $this->db->select_sum('other_handball_match');
        $this->db->select_sum('other_handball_atten');
        $this->db->select_sum('other_other_match');
        $this->db->select_sum('other_other_atten');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['sports_tournament'] = $this->db->get('sports_tournament')->first_row('array');

        $this->db->select_sum('shaka_sports_group');
        $this->db->select_sum('shaka_program_num');
        $this->db->select_sum('shaka_attendence');
        $this->db->select_sum('shaka_kria_shamogri_bitoron');
        $this->db->select_sum('thana_sports_group');
        $this->db->select_sum('thana_program_num');
        $this->db->select_sum('thana_attendence');
        $this->db->select_sum('thana_kria_shamogri_bitoron');
        $this->db->select_sum('ward_sports_group');
        $this->db->select_sum('ward_program_num');
        $this->db->select_sum('ward_attendence');
        $this->db->select_sum('ward_kria_shamogri_bitoron');
        $this->db->select_sum('uposhakha_sports_group');
        $this->db->select_sum('uposhakha_program_num');
        $this->db->select_sum('uposhakha_attendence');
        $this->db->select_sum('uposhakha_kria_shamogri_bitoron');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['sports_program'] = $this->db->get('sports_program')->first_row('array');

        $this->db->select_sum('mem_total_num');
        $this->db->select_sum('mem_cycle');
        $this->db->select_sum('mem_motorcycle');
        $this->db->select_sum('mem_karate');
        $this->db->select_sum('mem_swim');
        $this->db->select_sum('sathi_total_num');
        $this->db->select_sum('sathi_cycle');
        $this->db->select_sum('sathi_motorcycle');
        $this->db->select_sum('sathi_karate');
        $this->db->select_sum('sathi_swim');
        $this->db->select_sum('kormi_total_num');
        $this->db->select_sum('kormi_cycle');
        $this->db->select_sum('kormi_motorcycle');
        $this->db->select_sum('kormi_karate');
        $this->db->select_sum('kormi_swim');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['sports_bektigoto_dokkhota'] = $this->db->get('sports_bektigoto_dokkhota')->first_row('array');

        $this->db->select_sum('mem_kria_manpower');
        $this->db->select_sum('mem_cricket');
        $this->db->select_sum('mem_football');
        $this->db->select_sum('mem_other');
        $this->db->select_sum('mem_inter_school');
        $this->db->select_sum('mem_bksp');
        $this->db->select_sum('mem_division');
        $this->db->select_sum('mem_jela_porjay');
        $this->db->select_sum('mem_bivag_porjay');
        $this->db->select_sum('mem_under_15');
        $this->db->select_sum('mem_under_16');
        $this->db->select_sum('mem_under_17');
        $this->db->select_sum('mem_under_18');
        $this->db->select_sum('mem_under_19');
        $this->db->select_sum('mem_under_20');
        $this->db->select_sum('mem_under_21');
        $this->db->select_sum('mem_national_team');
        $this->db->select_sum('sathi_kria_manpower');
        $this->db->select_sum('sathi_cricket');
        $this->db->select_sum('sathi_football');
        $this->db->select_sum('sathi_other');
        $this->db->select_sum('sathi_inter_school');
        $this->db->select_sum('sathi_bksp');
        $this->db->select_sum('sathi_division');
        $this->db->select_sum('sathi_jela_porjay');
        $this->db->select_sum('sathi_bivag_porjay');
        $this->db->select_sum('sathi_under_15');
        $this->db->select_sum('sathi_under_16');
        $this->db->select_sum('sathi_under_17');
        $this->db->select_sum('sathi_under_18');
        $this->db->select_sum('sathi_under_19');
        $this->db->select_sum('sathi_under_20');
        $this->db->select_sum('sathi_under_21');
        $this->db->select_sum('sathi_national_team');
        $this->db->select_sum('kormi_kria_manpower');
        $this->db->select_sum('kormi_cricket');
        $this->db->select_sum('kormi_football');
        $this->db->select_sum('kormi_other');
        $this->db->select_sum('kormi_inter_school');
        $this->db->select_sum('kormi_bksp');
        $this->db->select_sum('kormi_division');
        $this->db->select_sum('kormi_jela_porjay');
        $this->db->select_sum('kormi_bivag_porjay');
        $this->db->select_sum('kormi_under_15');
        $this->db->select_sum('kormi_under_16');
        $this->db->select_sum('kormi_under_17');
        $this->db->select_sum('kormi_under_18');
        $this->db->select_sum('kormi_under_19');
        $this->db->select_sum('kormi_under_20');
        $this->db->select_sum('kormi_under_21');
        $this->db->select_sum('kormi_national_team');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['sports_kria_jonoshoktir_porishokngkhan'] = $this->db->get('sports_kria_jonoshoktir_porishokngkhan')->first_row('array');
        }
        else{
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_tournament');
            $this->data['sports_tournament'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_program');
            $this->data['sports_program'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_bektigoto_dokkhota');
            $this->data['sports_bektigoto_dokkhota'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_kria_jonoshoktir_porishokngkhan');
            $this->data['sports_kria_jonoshoktir_porishokngkhan'] = $query->first_row('array');
        }
      
    

        $this->data['m'] = 'sports';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/sports/sports_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/sports/sports_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }
    public function sports_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/sports-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/sports-page-two/' . $this->session->userdata('branch_id'));
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
            $this->db->select_sum('club_num');
            $this->db->select_sum('registard_num');
            $this->db->select_sum('committee_te_koto_ti');
            $this->db->select_sum('niyojito_manpower');
            $this->db->select_sum('player_num');
            $this->db->select_sum('program_num');
            $this->db->select_sum('attendence');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['sports_club'] = $this->db->get('sports_club')->first_row('array');
    
            $this->db->select_sum('math_num');
            $this->db->select_sum('team_num');
            $this->db->select_sum('manpower_num');
            $this->db->select_sum('mathe_team_kototi');
            $this->db->select_sum('math_kendrik_kormo');
            $this->db->select_sum('present');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['sports_team_number'] = $this->db->get('sports_team_number')->first_row('array');
    
            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['sports_contact'] = $this->db->get('sports_contact');
    
            $this->db->select_sum('hatahati_group_num');
            $this->db->select_sum('hatahati_attendance');
            $this->db->select_sum('shochetonota_num');
            $this->db->select_sum('shochetonota_attendance');
            $this->db->select_sum('kototi_fast_aid');
            $this->db->select_sum('kototi_shochetonotonota_video');
            $this->db->select_sum('kototi_shochetonotonota_sticker');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['sports_sastho_shochetonota'] = $this->db->get('sports_sastho_shochetonota')->first_row('array');
    
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
            $this->data['sports_training_program'] = $this->db->get('sports_training_program')->first_row('array');
        
        }
        else{
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_training_program');
            $this->data['sports_training_program'] = $query->first_row('array');	
        
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_club');
            $this->data['sports_club'] = $query->first_row('array');
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_team_number');
            $this->data['sports_team_number'] = $query->first_row('array');
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_contact');
            $this->data['sports_contact'] = $query;
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('sports_sastho_shochetonota');
            $this->data['sports_sastho_shochetonota'] = $query->first_row('array');
        }
     

        $this->data['m'] = 'sports';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/sports/sports_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/sports/sports_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }
    function add_sports_contact($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-sports-contact/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-sports-contact/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('sports_contact'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['kria_bektir_nam']=$this->input->post('kria_bektir_nam');
			$data['khelar_nam']=$this->input->post('khelar_nam');
            $data['dhoron']=$this->input->post('dhoron');
			$data['kotobar']=$this->input->post('kotobar');
			$this->site->insertData('sports_contact',$data);
            header("Location: ".admin_url('departmentsreport/sports-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('sports_contact_update'))
		{ 
            $data['kria_bektir_nam']=$this->input->post('kria_bektir_nam');
			$data['khelar_nam']=$this->input->post('khelar_nam');
            $data['dhoron']=$this->input->post('dhoron');
			$data['kotobar']=$this->input->post('kotobar');
			$this->site->updateData('sports_contact',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/sports-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['sports_contact'] = $this->db->get('sports_contact')->first_row('array');

        }

        $this->data['m'] = 'sports';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/sports/add_sports_contact', $meta, $this->data,'leftmenu/departmentsreport');
    }


    public function report_type11()
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
