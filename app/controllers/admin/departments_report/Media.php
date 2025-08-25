<?php defined('BASEPATH') or exit('No direct script access allowed');

class Media extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 24) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 24) { //Media
            $this->departmentuser = true;
        }
		             
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 24
        $this->data['department_id'] = 24;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (24)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>24), 'id desc', 1, 0);

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

    public function media_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/media-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/media-page-one/' . $this->session->userdata('branch_id'));
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


            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->db->order_by('branch_id');

            if ($branch_id)
            $this->data['media'] = $this->db->get('media')->first_row('array');
            else
            $this->data['media'] = $this->db->get('media');


           // $this->sma->print_arrays( $this->data['media']);
            // জনশক্তি

            $this->db->select_sum('admin_prev');
            $this->db->select_sum('admin_pres');
            $this->db->select_sum('admin_mot');
            $this->db->select_sum('admin_man_unnoyon');
            $this->db->select_sum('admin_man_agomon');
            $this->db->select_sum('admin_total_gha');
            $this->db->select_sum('admin_gha_man_unnoyon');
            $this->db->select_sum('admin_gha_sthanantor');
            $this->db->select_sum('admin_gha_high_study');
            $this->db->select_sum('admin_gha_study_finish');
            $this->db->select_sum('admin_gha_shangbadik');
            $this->db->select_sum('sub_admin_prev');
            $this->db->select_sum('sub_admin_pres');
            $this->db->select_sum('sub_admin_mot');
            $this->db->select_sum('sub_admin_man_unnoyon');
            $this->db->select_sum('sub_admin_man_agomon');
            $this->db->select_sum('sub_admin_total_gha');
            $this->db->select_sum('sub_admin_gha_man_unnoyon');
            $this->db->select_sum('sub_admin_gha_sthanantor');
            $this->db->select_sum('sub_admin_gha_high_study');
            $this->db->select_sum('sub_admin_gha_study_finish');
            $this->db->select_sum('sub_admin_gha_shangbadik');
            $this->db->select_sum('programmer_prev');
            $this->db->select_sum('programmer_pres');
            $this->db->select_sum('programmer_mot');
            $this->db->select_sum('programmer_man_unnoyon');
            $this->db->select_sum('programmer_man_agomon');
            $this->db->select_sum('programmer_total_gha');
            $this->db->select_sum('programmer_gha_man_unnoyon');
            $this->db->select_sum('programmer_gha_sthanantor');
            $this->db->select_sum('programmer_gha_high_study');
            $this->db->select_sum('programmer_gha_study_finish');
            $this->db->select_sum('programmer_gha_shangbadik');
            $this->db->select_sum('shikkhanbish_prev');
            $this->db->select_sum('shikkhanbish_pres');
            $this->db->select_sum('shikkhanbish_mot');
            $this->db->select_sum('shikkhanbish_man_unnoyon');
            $this->db->select_sum('shikkhanbish_man_agomon');
            $this->db->select_sum('shikkhanbish_total_gha');
            $this->db->select_sum('shikkhanbish_gha_man_unnoyon');
            $this->db->select_sum('shikkhanbish_gha_sthanantor');
            $this->db->select_sum('shikkhanbish_gha_high_study');
            $this->db->select_sum('shikkhanbish_gha_study_finish');
            $this->db->select_sum('shikkhanbish_gha_shangbadik');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['media_manpower'] = $this->db->get('media_manpower')->first_row('array');

            // যোগাযোগ

            $this->db->select_sum('shangbadik_num');
            $this->db->select_sum('shangbadik_bar');
            $this->db->select_sum('bondhu_num');
            $this->db->select_sum('bondhu_bar');
            $this->db->select_sum('student_num');
            $this->db->select_sum('student_bar');
            $this->db->select_sum('malik_num');
            $this->db->select_sum('malik_bar');
            $this->db->select_sum('shompadok_num');
            $this->db->select_sum('shompadok_bar');
            $this->db->select_sum('collamist_num');
            $this->db->select_sum('collamist_bar');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_contact'] = $this->db->get('media_contact')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("media");
            $this->data['media'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("media_manpower");
            $this->data['media_manpower'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("media_contact");
            $this->data['media_contact'] = $query->first_row('array');
        }


        $this->data['m'] = 'media';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);



         




        if ($branch_id) {
            $this->page_construct('departmentsreport/media/media_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/media/media_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function media_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/media-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/media-page-two/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('admin_shova_num');
            $this->db->select_sum('admin_shova_pre');
            $this->db->select_sum('prgrammer_shova_num');
            $this->db->select_sum('prgrammer_shova_pre');
            $this->db->select_sum('shikkhanbish_shova_num');
            $this->db->select_sum('shikkhanbish_shova_pre');
            $this->db->select_sum('shadharon_shova_num');
            $this->db->select_sum('shadharon_shova_pre');
            $this->db->select_sum('songbordhona_num');
            $this->db->select_sum('songbordhona_pre');
            $this->db->select_sum('setup_num');
            $this->db->select_sum('setup_pre');
            $this->db->select_sum('edu_tour_num');
            $this->db->select_sum('edu_tour_pre');
            $this->db->select_sum('interested_on_journalism_num');
            $this->db->select_sum('interested_on_journalism_pre');
            $this->db->select_sum('shang_shomabesh_num');
            $this->db->select_sum('shang_shomabesh_pre');
            $this->db->select_sum('working_shang_meeting_num');
            $this->db->select_sum('working_shang_meeting_pre');
            $this->db->select_sum('iftar_mahfil_num');
            $this->db->select_sum('iftar_mahfil_pre');
            $this->db->select_sum('course_num');
            $this->db->select_sum('course_pre');
            $this->db->select_sum('workshop_num');
            $this->db->select_sum('workshop_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_shova'] = $this->db->get('media_shova')->first_row('array');

            // প্রশিক্ষণ কোর্স

            $this->db->select_sum('presentation_num');
            $this->db->select_sum('presentation_pre');
            $this->db->select_sum('photography_num');
            $this->db->select_sum('photography_pre');
            $this->db->select_sum('reporting_num');
            $this->db->select_sum('reporting_pre');
            $this->db->select_sum('mo_ja_num');
            $this->db->select_sum('mo_ja_pre');
            $this->db->select_sum('video_editin_num');
            $this->db->select_sum('video_editin_pre');
            $this->db->select_sum('graphics_design_num');
            $this->db->select_sum('graphics_design_pre');
            $this->db->select_sum('eng_journalism_num');
            $this->db->select_sum('eng_journalism_pre');
            $this->db->select_sum('shuddhu_uccharon_num');
            $this->db->select_sum('shuddhu_uccharon_pre');
            $this->db->select_sum('feature_writing_num');
            $this->db->select_sum('feature_writing_pre');
            $this->db->select_sum('bit_vittik_num');
            $this->db->select_sum('bit_vittik_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_training_course'] = $this->db->get('media_training_course')->first_row('array');

            // প্রশিক্ষণ কর্মশালা

            $this->db->select_sum('presentation_num');
            $this->db->select_sum('presentation_pre');
            $this->db->select_sum('photography_num');
            $this->db->select_sum('photography_pre');
            $this->db->select_sum('reporting_num');
            $this->db->select_sum('reporting_pre');
            $this->db->select_sum('mo_ja_num');
            $this->db->select_sum('mo_ja_pre');
            $this->db->select_sum('video_editin_num');
            $this->db->select_sum('video_editin_pre');
            $this->db->select_sum('graphics_design_num');
            $this->db->select_sum('graphics_design_pre');
            $this->db->select_sum('eng_journalism_num');
            $this->db->select_sum('eng_journalism_pre');
            $this->db->select_sum('shuddhu_uccharon_num');
            $this->db->select_sum('shuddhu_uccharon_pre');
            $this->db->select_sum('feature_writing_num');
            $this->db->select_sum('feature_writing_pre');
            $this->db->select_sum('bit_vittik_num');
            $this->db->select_sum('bit_vittik_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_training_workshop'] = $this->db->get('media_training_workshop')->first_row('array');


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


            $this->data['media_training_program'] = $this->db->get('media_training_program')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_training_program');
            $this->data['media_training_program'] = $query->first_row('array');


            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_shova');
            $this->data['media_shova'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_training_course');
            $this->data['media_training_course'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_training_workshop');
            $this->data['media_training_workshop'] = $query->first_row('array');
        }

        $this->data['m'] = 'media';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/media/media_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/media/media_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function media_page_three($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/media-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/media-page-three/' . $this->session->userdata('branch_id'));
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

            // আন্তঃর্জাতিক গণমাধ্যম

            $this->db->select_sum('reporter_elect');
            $this->db->select_sum('reporter_print');
            $this->db->select_sum('reporter_online');
            $this->db->select_sum('reporter_a');
            $this->db->select_sum('reporter_b');
            $this->db->select_sum('reporter_c');
            $this->db->select_sum('protinidhi_elect');
            $this->db->select_sum('protinidhi_print');
            $this->db->select_sum('protinidhi_online');
            $this->db->select_sum('protinidhi_a');
            $this->db->select_sum('protinidhi_b');
            $this->db->select_sum('protinidhi_c');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['media_int_media'] = $this->db->get('media_int_media')->first_row('array');

            // জাতীয় গণমাধ্যম -> ইলেক্ট্রনিক

            $this->db->select_sum('uposthapok_jon');
            $this->db->select_sum('uposthapok_radio');
            $this->db->select_sum('uposthapok_a');
            $this->db->select_sum('uposthapok_b');
            $this->db->select_sum('uposthapok_c');
            $this->db->select_sum('reporter_jon');
            $this->db->select_sum('reporter_radio');
            $this->db->select_sum('reporter_a');
            $this->db->select_sum('reporter_b');
            $this->db->select_sum('reporter_c');
            $this->db->select_sum('camera_jon');
            $this->db->select_sum('camera_radio');
            $this->db->select_sum('camera_a');
            $this->db->select_sum('camera_b');
            $this->db->select_sum('camera_c');
            $this->db->select_sum('video_editor_jon');
            $this->db->select_sum('video_editor_radio');
            $this->db->select_sum('video_editor_a');
            $this->db->select_sum('video_editor_b');
            $this->db->select_sum('video_editor_c');
            $this->db->select_sum('protinidhi_jon');
            $this->db->select_sum('protinidhi_radio');
            $this->db->select_sum('protinidhi_a');
            $this->db->select_sum('protinidhi_b');
            $this->db->select_sum('protinidhi_c');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_nation_media_electronic'] = $this->db->get('media_nation_media_electronic')->first_row('array');

            // জাতীয় গণমাধ্যম -> প্রিন্ট

            $this->db->select_sum('reporter_potrika');
            $this->db->select_sum('reporter_samoyiki');
            $this->db->select_sum('reporter_other');
            $this->db->select_sum('reporter_a');
            $this->db->select_sum('reporter_b');
            $this->db->select_sum('reporter_c');
            $this->db->select_sum('b_chief_potrika');
            $this->db->select_sum('b_chief_samoyiki');
            $this->db->select_sum('b_chief_other');
            $this->db->select_sum('b_chief_a');
            $this->db->select_sum('b_chief_b');
            $this->db->select_sum('b_chief_c');
            $this->db->select_sum('s_editor_potrika');
            $this->db->select_sum('s_editor_samoyiki');
            $this->db->select_sum('s_editor_other');
            $this->db->select_sum('s_editor_a');
            $this->db->select_sum('s_editor_b');
            $this->db->select_sum('s_editor_c');
            $this->db->select_sum('protinidhi_potrika');
            $this->db->select_sum('protinidhi_samoyiki');
            $this->db->select_sum('protinidhi_other');
            $this->db->select_sum('protinidhi_a');
            $this->db->select_sum('protinidhi_b');
            $this->db->select_sum('protinidhi_c');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_nation_media_print'] = $this->db->get('media_nation_media_print')->first_row('array');

            // জাতীয় গণমাধ্যম -> অনলাইন

            $this->db->select_sum('reporter_tv');
            $this->db->select_sum('reporter_radio');
            $this->db->select_sum('reporter_news_portal');
            $this->db->select_sum('reporter_a');
            $this->db->select_sum('reporter_b');
            $this->db->select_sum('reporter_c');
            $this->db->select_sum('s_editor_tv');
            $this->db->select_sum('s_editor_radio');
            $this->db->select_sum('s_editor_news_portal');
            $this->db->select_sum('s_editor_a');
            $this->db->select_sum('s_editor_b');
            $this->db->select_sum('s_editor_c');
            $this->db->select_sum('protinidhi_tv');
            $this->db->select_sum('protinidhi_radio');
            $this->db->select_sum('protinidhi_news_portal');
            $this->db->select_sum('protinidhi_a');
            $this->db->select_sum('protinidhi_b');
            $this->db->select_sum('protinidhi_c');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_nation_media_online'] = $this->db->get('media_nation_media_online')->first_row('array');

            // মফস্বল

            $this->db->select_sum('reporter_print');
            $this->db->select_sum('reporter_news');
            $this->db->select_sum('reporter_community');
            $this->db->select_sum('reporter_a');
            $this->db->select_sum('reporter_b');
            $this->db->select_sum('reporter_c');
            $this->db->select_sum('s_editor_print');
            $this->db->select_sum('s_editor_news');
            $this->db->select_sum('s_editor_community');
            $this->db->select_sum('s_editor_a');
            $this->db->select_sum('s_editor_b');
            $this->db->select_sum('s_editor_c');
            $this->db->select_sum('protinidhi_print');
            $this->db->select_sum('protinidhi_news');
            $this->db->select_sum('protinidhi_community');
            $this->db->select_sum('protinidhi_a');
            $this->db->select_sum('protinidhi_b');
            $this->db->select_sum('protinidhi_c');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_mofosshol_media'] = $this->db->get('media_mofosshol_media')->first_row('array');

            // একনজরে সাংবাদিক বৃদ্ধি

            $this->db->select_sum('shang_prev');
            $this->db->select_sum('shang_pres');
            $this->db->select_sum('shang_bri');
            $this->db->select_sum('shang_gha');
            $this->db->select_sum('shang_a');
            $this->db->select_sum('shang_b');
            $this->db->select_sum('shang_c');
            $this->db->select_sum('shang_int');
            $this->db->select_sum('shang_tv');
            $this->db->select_sum('shang_radio');
            $this->db->select_sum('shang_print');
            $this->db->select_sum('shang_online');
            $this->db->select_sum('nobin_prev');
            $this->db->select_sum('nobin_pres');
            $this->db->select_sum('nobin_bri');
            $this->db->select_sum('nobin_gha');
            $this->db->select_sum('nobin_a');
            $this->db->select_sum('nobin_b');
            $this->db->select_sum('nobin_c');
            $this->db->select_sum('nobin_int');
            $this->db->select_sum('nobin_tv');
            $this->db->select_sum('nobin_radio');
            $this->db->select_sum('nobin_print');
            $this->db->select_sum('nobin_online');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['media_eknojore'] = $this->db->get('media_eknojore')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_int_media');
            $this->data['media_int_media'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_nation_media_electronic');
            $this->data['media_nation_media_electronic'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_nation_media_print');
            $this->data['media_nation_media_print'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_nation_media_online');
            $this->data['media_nation_media_online'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_mofosshol_media');
            $this->data['media_mofosshol_media'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('media_eknojore');
            $this->data['media_eknojore'] = $query->first_row('array');
        }



        $this->data['m'] = 'media';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/media/media_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/media/media_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
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

            }
        } else {
            $msg = 'failed';
        }

        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }
}
