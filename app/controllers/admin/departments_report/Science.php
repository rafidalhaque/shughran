<?php defined('BASEPATH') or exit('No direct script access allowed');

class Science extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 17) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 17) {  //Science
            $this->departmentuser = true;
        }
        
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 17
        $this->data['department_id'] = 17;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (17)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>17), 'id desc', 1, 0);

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
        $this->popup_attributes = array('width' => '1700', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function science_page_one($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/science-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/science-page-one/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('mem_ssc');
            $this->db->select_sum('mem_hsc');
            $this->db->select_sum('mem_hons');
            $this->db->select_sum('mem_shakha_shova');
            $this->db->select_sum('mem_shakha_sec');
            $this->db->select_sum('mem_thana_shova');
            $this->db->select_sum('associate_ssc');
            $this->db->select_sum('associate_hsc');
            $this->db->select_sum('associate_hons');
            $this->db->select_sum('associate_shakha_shova');
            $this->db->select_sum('associate_shakha_sec');
            $this->db->select_sum('associate_thana_shova');
            $this->db->select_sum('worker_ssc');
            $this->db->select_sum('worker_hsc');
            $this->db->select_sum('worker_hons');
            $this->db->select_sum('worker_shakha_shova');
            $this->db->select_sum('worker_shakha_sec');
            $this->db->select_sum('worker_thana_shova');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_only_science_manpower'] = $this->db->get('science_only_science_manpower')->first_row('array');

            $this->db->select_sum('shaka_shompadok');
            $this->db->select_sum('biggan_shompadok');
            $this->db->select_sum('meeting_number');
            $this->db->select_sum('meeting_presence');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_biggan_shompadok'] = $this->db->get('science_biggan_shompadok')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['row_total_science_biggan_shompadok'] = $this->db->get('science_biggan_shompadok')->num_rows();

            $this->db->select_sum('interested_manpower_num');
            $this->db->select_sum('interested_manpower_talika');
            $this->db->select_sum('interested_manpower_jogajog');
            $this->db->select_sum('lekhalekhi_kore_num');
            $this->db->select_sum('lekhalekhi_kore_talika');
            $this->db->select_sum('lekhalekhi_kore_jogajog');
            $this->db->select_sum('jonopriyo_num');
            $this->db->select_sum('jonopriyo_talika');
            $this->db->select_sum('jonopriyo_jogajog');
            $this->db->select_sum('shongothok_num');
            $this->db->select_sum('shongothok_talika');
            $this->db->select_sum('shongothok_jogajog');
            $this->db->select_sum('quiz_ayojon_num');
            $this->db->select_sum('quiz_ayojon_talika');
            $this->db->select_sum('quiz_ayojon_jogajog');
            $this->db->select_sum('attend_manpower_num');
            $this->db->select_sum('attend_manpower_talika');
            $this->db->select_sum('attend_manpower_jogajog');
            $this->db->select_sum('puroshkar_prapto_manpower_num');
            $this->db->select_sum('puroshkar_prapto_manpower_talika');
            $this->db->select_sum('puroshkar_prapto_manpower_jogajog');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_manpower_protibedon'] = $this->db->get('science_manpower_protibedon')->first_row('array');

            $this->db->select_sum('hs_prostuti_nicche');
            $this->db->select_sum('hs_gomonkari');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_high_study_protibedon'] = $this->db->get('science_high_study_protibedon')->first_row('array');

            $this->db->select_sum('biggan_comittee_gothon');
            $this->db->select_sum('comittee_member');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_biggan_magazine_circulation'] = $this->db->get('science_biggan_magazine_circulation')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['row_total_science_biggan_magazine_circulation'] = $this->db->get('science_biggan_magazine_circulation')->num_rows();

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

            $this->data['science_training_program'] = $this->db->get('science_training_program')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_training_program');
            $this->data['science_training_program'] = $query->first_row('array');


            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_only_science_manpower');
            $this->data['science_only_science_manpower'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_biggan_shompadok');
            $this->data['science_biggan_shompadok'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_manpower_protibedon');
            $this->data['science_manpower_protibedon'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_high_study_protibedon');
            $this->data['science_high_study_protibedon'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_biggan_magazine_circulation');
            $this->data['science_biggan_magazine_circulation'] = $query->first_row('array');
        }

        $this->data['m'] = 'science';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id){
            $this->data['departments'] = $this->site->getAllDepartments();
            $this->page_construct('departmentsreport/science/science_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        }else{
            $this->data['departments'] = $this->site->getAllDepartments();
            $this->page_construct('departmentsreport/science/science_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    function science_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/science-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/science-page-two/' . $this->session->userdata('branch_id'));
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



            $this->db->select("*");
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['science_biggan_school_magazine_circulation'] = $this->db->get('science_biggan_school_magazine_circulation');

            $this->db->select_sum('school_forum_gothito');
            $this->db->select_sum('forum_purnago_comittee');
            $this->db->select_sum('committee_mem_num');
            $this->db->select_sum('registration_num');
            $this->db->select_sum('teacher_num');
            $this->db->select_sum('sthanio_protinidhi');
            $this->db->select_sum('mot_protinidhi');
            $this->db->select_sum('program');
            $this->db->select_sum('t-shirt');
            $this->db->select_sum('magazine');
            $this->db->select_sum('pathon_shommelon_num');
            $this->db->select_sum('pathon_shommelon_pre');
            $this->db->select_sum('science_workshop_num');
            $this->db->select_sum('science_workshop_pre');
            $this->db->select_sum('mothly_meeting_num');
            $this->db->select_sum('mothly_meeting_pre');
            $this->db->select_sum('magazine_num');
            $this->db->select_sum('magazine_pre');
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_pathok_forum_report'] = $this->db->get('science_pathok_forum_report')->first_row('array');

            $this->db->select_sum('our_control_club');
            $this->db->select_sum('our_scienece_club');
            $this->db->select_sum('registration_scienece_club');
            $this->db->select_sum('manpower_of_club');
            $this->db->select_sum('general_member');
            $this->db->select_sum('career_guideline_num');
            $this->db->select_sum('career_guideline_pre');
            $this->db->select_sum('meritorious_num');
            $this->db->select_sum('meritorious_pre');
            $this->db->select_sum('hate_kolome_num');
            $this->db->select_sum('hate_kolome_pre');
            $this->db->select_sum('workshop_num');
            $this->db->select_sum('workshop_pre');
            $this->db->select_sum('lab_num');
            $this->db->select_sum('lab_pre');
            $this->db->select_sum('seminer_num');
            $this->db->select_sum('seminer_pre');
            $this->db->select_sum('olympiad_num');
            $this->db->select_sum('olympiad_pre');
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_club_protibedon'] = $this->db->get('science_club_protibedon')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_biggan_school_magazine_circulation');
            $this->data['science_biggan_school_magazine_circulation'] = $query;
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_club_protibedon');
            $this->data['science_club_protibedon'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_pathok_forum_report');
            $this->data['science_pathok_forum_report'] = $query->first_row('array');
        }

        $this->data['m'] = 'science';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/science/science_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/science/science_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_science_biggan_school_magazine_circulation($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-science-biggan-school-magazine-circulation/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-science-biggan-school-magazine-circulation/' . $this->session->userdata('branch_id'));
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

        $last_year =  date("Y", strtotime("-1 year"));
        $report_type = $this->report_type();

        if ($this->input->post('science_biggan_school_magazine_circulation')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['protishan_name'] = $this->input->post('protishan_name');
            $data['pathokforum'] = $this->input->post('pathokforum');
            $data['class_protinidhi'] = $this->input->post('class_protinidhi');
            $data['mg_circulation_num'] = $this->input->post('mg_circulation_num');
            $this->site->insertData('science_biggan_school_magazine_circulation', $data);

            header("Location: " . admin_url('departmentsreport/science-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->post('science_biggan_school_magazine_circulation_update')) {
            $data['protishan_name'] = $this->input->post('protishan_name');
            $data['pathokforum'] = $this->input->post('pathokforum');
            $data['class_protinidhi'] = $this->input->post('class_protinidhi');
            $data['mg_circulation_num'] = $this->input->post('mg_circulation_num');
            $this->site->updateData('science_biggan_school_magazine_circulation', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/science-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['science_biggan_school_magazine_circulation'] = $this->db->get('science_biggan_school_magazine_circulation')->first_row('array');
        }

        $this->data['m'] = 'science';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/science/add_science_biggan_school_magazine_circulation', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function science_page_three($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/science-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/science-page-three/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('career_guideline_num');
            $this->db->select_sum('career_guideline_pre');
            $this->db->select_sum('career_adda_num');
            $this->db->select_sum('career_adda_pre');
            $this->db->select_sum('career_summit_num');
            $this->db->select_sum('career_summit_pre');
            $this->db->select_sum('quiz_num');
            $this->db->select_sum('quiz_pre');
            $this->db->select_sum('olympiad_num');
            $this->db->select_sum('olympiad_pre');
            $this->db->select_sum('biggan_mela_num');
            $this->db->select_sum('biggan_mela_pre');
            $this->db->select_sum('day_udjapon_num');
            $this->db->select_sum('day_udjapon_pre');
            $this->db->select_sum('document_num');
            $this->db->select_sum('document_pre');
            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_program_protibedon'] = $this->db->get('science_program_protibedon')->first_row('array');

            $this->db->select_sum('aca_coaching_ache');
            $this->db->select_sum('aca_coaching_num');
            $this->db->select_sum('aca_coaching_stu_num');
            $this->db->select_sum('ict_coaching_ache');
            $this->db->select_sum('ict_coaching_num');
            $this->db->select_sum('ict_coaching_stu_num');
            $this->db->select_sum('ideal_home_ache');
            $this->db->select_sum('ideal_home_num');
            $this->db->select_sum('ideal_home_stu_num');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_aca_help_protibedon'] = $this->db->get('science_aca_help_protibedon')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['row_total_science_aca_help_protibedon'] = $this->db->get('science_aca_help_protibedon')->num_rows();

            $this->db->select_sum('shompadok_off');
            $this->db->select_sum('shompadok_on');
            $this->db->select_sum('bivag_off');
            $this->db->select_sum('bivag_on');
            $this->db->select_sum('contact_off');
            $this->db->select_sum('contact_on');
            $this->db->select_sum('secretary_off');
            $this->db->select_sum('secretary_on');
            $this->db->select_sum('thana_off');
            $this->db->select_sum('thana_on');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_sofor_protibedon'] = $this->db->get('science_sofor_protibedon')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_program_protibedon');
            $this->data['science_program_protibedon'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_aca_help_protibedon');
            $this->data['science_aca_help_protibedon'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_sofor_protibedon');
            $this->data['science_sofor_protibedon'] = $query->first_row('array');
        }


        $this->data['m'] = 'science';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/science/science_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/science/science_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
    }




    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////bigyan_magazine_songkranto starts///////////
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////




    function science_page_four($branch_id = NULL)
    {

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/science-page-four/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/science-page-four/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('series_jon');
            $this->db->select_sum('series_ti');
            $this->db->select_sum('paper_jon');
            $this->db->select_sum('paper_ti');
            $this->db->select_sum('book_jon');
            $this->db->select_sum('book_ti');
            $this->db->select_sum('documentory_jon');
            $this->db->select_sum('documentory_ti');
            $this->db->select_sum('other_jon');
            $this->db->select_sum('other_ti');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_bitoron'] = $this->db->get('science_bitoron')->first_row('array');

            $this->db->select_sum('khude_biggani_jon');
            $this->db->select_sum('khude_biggani_bar');
            $this->db->select_sum('biggan_bekti_jon');
            $this->db->select_sum('biggan_bekti_bar');
            $this->db->select_sum('biggan_lekhok_jon');
            $this->db->select_sum('biggan_lekhok_bar');
            $this->db->select_sum('uddokta_jon');
            $this->db->select_sum('uddokta_bar');
            $this->db->select_sum('udiyouman_lekhok_jon');
            $this->db->select_sum('udiyouman_lekhok_bar');
            $this->db->select_sum('interested_manpower_jon');
            $this->db->select_sum('interested_manpower_bar');
            $this->db->select_sum('medical_stu_jon');
            $this->db->select_sum('medical_stu_bar');
            $this->db->select_sum('sci_stu_jon');
            $this->db->select_sum('sci_stu_bar');
            $this->db->select_sum('other_jon');
            $this->db->select_sum('other_bar');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_output_contact'] = $this->db->get('science_output_contact')->first_row('array');

            $this->db->select_sum('lekhok_ter');
            $this->db->select_sum('lekhok_bachai');
            $this->db->select_sum('lekhok_number');
            $this->db->select_sum('lekhok_present');
            $this->db->select_sum('lekhok_shang');
            $this->db->select_sum('lekhok_shadharon');
            $this->db->select_sum('lekhok_attend');
            $this->db->select_sum('lekhok_pass');
            $this->db->select_sum('uddokta_ter');
            $this->db->select_sum('uddokta_bachai');
            $this->db->select_sum('uddokta_number');
            $this->db->select_sum('uddokta_present');
            $this->db->select_sum('uddokta_shang');
            $this->db->select_sum('uddokta_shadharon');
            $this->db->select_sum('uddokta_attend');
            $this->db->select_sum('uddokta_pass');
            $this->db->select_sum('shongothok_ter');
            $this->db->select_sum('shongothok_bachai');
            $this->db->select_sum('shongothok_number');
            $this->db->select_sum('shongothok_present');
            $this->db->select_sum('shongothok_shang');
            $this->db->select_sum('shongothok_shadharon');
            $this->db->select_sum('shongothok_attend');
            $this->db->select_sum('shongothok_pass');
            $this->db->select_sum('prokousholi_ter');
            $this->db->select_sum('prokousholi_bachai');
            $this->db->select_sum('prokousholi_number');
            $this->db->select_sum('prokousholi_present');
            $this->db->select_sum('prokousholi_shang');
            $this->db->select_sum('prokousholi_shadharon');
            $this->db->select_sum('prokousholi_attend');
            $this->db->select_sum('prokousholi_pass');
            $this->db->select_sum('it_ter');
            $this->db->select_sum('it_bachai');
            $this->db->select_sum('it_number');
            $this->db->select_sum('it_present');
            $this->db->select_sum('it_shang');
            $this->db->select_sum('it_shadharon');
            $this->db->select_sum('it_attend');
            $this->db->select_sum('it_pass');
            $this->db->select_sum('biggani_ter');
            $this->db->select_sum('biggani_bachai');
            $this->db->select_sum('biggani_number');
            $this->db->select_sum('biggani_present');
            $this->db->select_sum('biggani_shang');
            $this->db->select_sum('biggani_shadharon');
            $this->db->select_sum('biggani_attend');
            $this->db->select_sum('biggani_pass');
            $this->db->select_sum('it_bisheshoggo_ter');
            $this->db->select_sum('it_bisheshoggo_bachai');
            $this->db->select_sum('it_bisheshoggo_number');
            $this->db->select_sum('it_bisheshoggo_present');
            $this->db->select_sum('it_bisheshoggo_shang');
            $this->db->select_sum('it_bisheshoggo_shadharon');
            $this->db->select_sum('it_bisheshoggo_attend');
            $this->db->select_sum('it_bisheshoggo_pass');
            $this->db->select_sum('other_ter');
            $this->db->select_sum('other_bachai');
            $this->db->select_sum('other_number');
            $this->db->select_sum('other_present');
            $this->db->select_sum('other_shang');
            $this->db->select_sum('other_shadharon');
            $this->db->select_sum('other_attend');
            $this->db->select_sum('other_pass');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_output_report'] = $this->db->get('science_output_report')->first_row('array');


            $this->db->select_sum('hons_central_manpower_s');
            $this->db->select_sum('hons_central_manpower_p');
            $this->db->select_sum('hons_central_general_s');
            $this->db->select_sum('hons_central_general_p');
            $this->db->select_sum('hons_shakha_manpower_s');
            $this->db->select_sum('hons_shakha_manpower_p');
            $this->db->select_sum('hons_shakha_general_s');
            $this->db->select_sum('hons_shakha_general_p');
            $this->db->select_sum('eng_central_manpower_s');
            $this->db->select_sum('eng_central_manpower_p');
            $this->db->select_sum('eng_central_general_s');
            $this->db->select_sum('eng_central_general_p');
            $this->db->select_sum('eng_shakha_manpower_s');
            $this->db->select_sum('eng_shakha_manpower_p');
            $this->db->select_sum('eng_shakha_general_s');
            $this->db->select_sum('eng_shakha_general_p');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['science_summit'] = $this->db->get('science_summit')->first_row('array');
        } else {


            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_summit');
            $this->data['science_summit'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_bitoron');
            $this->data['science_bitoron'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_output_contact');
            $this->data['science_output_contact'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('science_output_report');
            $this->data['science_output_report'] = $query->first_row('array');
        }


        $this->data['m'] = 'science';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        if ($branch_id)
            $this->page_construct('departmentsreport/science/science_page_four_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/science/science_page_four', $meta, $this->data, 'leftmenu/departmentsreport');
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
