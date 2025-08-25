<?php defined('BASEPATH') or exit('No direct script access allowed');

class Others extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
        // the department actual id to 45 but it will be check by Office department which id 4 
        // Changed only for checking purpose.
        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 45) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 45) {  //Others id 45 but This department will checked by Office department which id 4
            $this->departmentuser = true;
        }

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // the department actual id to 45  
         $this->data['department_id'] = 45;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (45)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>45), 'id desc', 1, 0);


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

    function others_page_one($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-one/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('total_uposakha');
            $this->db->select_sum('bortoman_shokriyo');
            $this->db->select_sum('durbol_shokriyou_hoyeche	');
            $this->db->select_sum('durbol_ache');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['other_uposhakha_mojbuti'] = $this->db->get('other_uposhakha_mojbuti')->first_row('array');





            $this->db->select_sum('shod_shomabesh_num');
            $this->db->select_sum('shod_shomabesh_pre');
            $this->db->select_sum('sathi_shomabesh_num');
            $this->db->select_sum('sathi_shomabesh_pre');
            $this->db->select_sum('kormi_shomabesh_num');
            $this->db->select_sum('kormi_shomabesh_pre');
            $this->db->select_sum('shudhi_shomabesh_num');
            $this->db->select_sum('shudhi_shomabesh_pre');
            $this->db->select_sum('cup_pre_num');
            $this->db->select_sum('cup_other_pre_num');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['other_shang_sofor'] = $this->db->get('other_shang_sofor')->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_e_briddhi_ward'] = $this->db->get('other_e_briddhi_ward');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_e_ghatti_ward'] = $this->db->get('other_e_ghatti_ward');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_e_briddhi_thana'] = $this->db->get('other_e_briddhi_thana');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_e_ghatti_thana'] = $this->db->get('other_e_ghatti_thana');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_uposhakha_mojbuti');
            $this->data['other_uposhakha_mojbuti'] = $query->first_row('array');;


            

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_shang_sofor');
            $this->data['other_shang_sofor'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_e_briddhi_ward');
            $this->data['other_e_briddhi_ward'] = $query;
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_e_ghatti_ward');
            $this->data['other_e_ghatti_ward'] = $query;
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_e_briddhi_thana');
            $this->data['other_e_briddhi_thana'] = $query;
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_e_ghatti_thana');
            $this->data['other_e_ghatti_thana'] = $query;
        }
        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_e_briddhi_ward($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other_e-briddhi-ward/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other_e-briddhi-ward/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_briddhi_ward')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['ward_name'] = $this->input->post('ward_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->insertData('other_e_briddhi_ward', $data);

            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_briddhi_ward_update')) {
            $data['ward_name'] = $this->input->post('ward_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->updateData('other_e_briddhi_ward', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_briddhi_ward'] = $this->db->get('other_e_briddhi_ward')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_briddhi_ward', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_e_ghatti_ward($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-ghatti-ward/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-ghatti-ward/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_ghatti_ward')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['ward_name'] = $this->input->post('ward_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->insertData('other_e_ghatti_ward', $data);

            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_ghatti_ward_update')) {
            $data['ward_name'] = $this->input->post('ward_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->updateData('other_e_ghatti_ward', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_ghatti_ward'] = $this->db->get('other_e_ghatti_ward')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_ghatti_ward', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_e_briddhi_thana($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-briddhi-thana/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-briddhi-thana/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_briddhi_thana')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['thana_name'] = $this->input->post('thana_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->insertData('other_e_briddhi_thana', $data);

            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_briddhi_thana_update')) {
            $data['thana_name'] = $this->input->post('thana_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->updateData('other_e_briddhi_thana', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_briddhi_thana'] = $this->db->get('other_e_briddhi_thana')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_briddhi_thana', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_e_ghatti_thana($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-ghatti-thana/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-ghatti-thana/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_ghatti_thana')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['thana_name'] = $this->input->post('thana_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->insertData('other_e_ghatti_thana', $data);

            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_ghatti_thana_update')) {
            $data['thana_name'] = $this->input->post('thana_name');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->updateData('other_e_ghatti_thana', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_ghatti_thana'] = $this->db->get('other_e_ghatti_thana')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_ghatti_thana', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function others_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-two/' . $this->session->userdata('branch_id'));
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
            $this->data['other_e_sathi_shakha_briddhi'] = $this->db->get('other_e_sathi_shakha_briddhi');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_e_sathi_shakha_ghatti'] = $this->db->get('other_e_sathi_shakha_ghatti');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $this->data['other_s_protishthan_shong_ghatti'] = $this->db->get('other_s_protishthan_shong_ghatti');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_e_sathi_shakha_briddhi');
            $this->data['other_e_sathi_shakha_briddhi'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_e_sathi_shakha_ghatti');
            $this->data['other_e_sathi_shakha_ghatti'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_s_protishthan_shong_ghatti');
            $this->data['other_s_protishthan_shong_ghatti'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_e_sathi_shakha_briddhi($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-sathi-shakha-briddhi/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-sathi-shakha-briddhi/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_sathi_shakha_briddhi')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['sathi_shakhar_nam'] = $this->input->post('sathi_shakhar_nam');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->insertData('other_e_sathi_shakha_briddhi', $data);

            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_sathi_shakha_briddhi_update')) {
            $data['sathi_shakhar_nam'] = $this->input->post('sathi_shakhar_nam');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $this->site->updateData('other_e_sathi_shakha_briddhi', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_sathi_shakha_briddhi'] = $this->db->get('other_e_sathi_shakha_briddhi')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_sathi_shakha_briddhi', $meta, $this->data, 'leftmenu/departmentsreport');
    }


    function add_other_e_sathi_shakha_ghatti($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-sathi-shakha-ghatti/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-sathi-shakha-ghatti/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_sathi_shakha_ghatti')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['sathi_shakhar_nam'] = $this->input->post('sathi_shakhar_nam');

            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->insertData('other_e_sathi_shakha_ghatti', $data);

            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_sathi_shakha_ghatti_update')) {
            $data['sathi_shakhar_nam'] = $this->input->post('sathi_shakhar_nam');

            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->updateData('other_e_sathi_shakha_ghatti', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_sathi_shakha_ghatti'] = $this->db->get('other_e_sathi_shakha_ghatti')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_sathi_shakha_ghatti', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_s_protishthan_shong_ghatti($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-s-protishthan-shong-ghatti/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-s-protishthan-shong-ghatti/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_s_protishthan_shong_ghatti')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');


            $data['s_protishthaner_name'] = $this->input->post('s_protishthaner_name');

            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            var_dump($data);
            $this->site->insertData('other_s_protishthan_shong_ghatti', $data);

            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_s_protishthan_shong_ghatti_update')) {

            $data['s_protishthaner_name'] = $this->input->post('s_protishthaner_name');

            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->updateData('other_s_protishthan_shong_ghatti', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_s_protishthan_shong_ghatti'] = $this->db->get('other_s_protishthan_shong_ghatti')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_s_protishthan_shong_ghatti', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function others_page_three($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-three/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('total_uposakha');
            $this->db->select_sum('bortoman_shokriyo');
            $this->db->select_sum('durbol_shokriyou_hoyeche	');
            $this->db->select_sum('durbol_ache');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['other_uposhakha_mojbuti'] = $this->db->get('other_uposhakha_mojbuti')->first_row('array');



            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $query = $this->db->get('other_e_uposhakha_briddhi');
            $this->data['other_e_uposhakha_briddhi'] = $query;

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $query = $this->db->get('other_e_uposhakha_ghatti');
            $this->data['other_e_uposhakha_ghatti'] = $query;
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_uposhakha_mojbuti');
            $this->data['other_uposhakha_mojbuti'] = $query->first_row('array');;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_e_uposhakha_briddhi');
            $this->data['other_e_uposhakha_briddhi'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_e_uposhakha_ghatti');
            $this->data['other_e_uposhakha_ghatti'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
    }


    function add_other_e_uposhakha_briddhi($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-uposhakha-briddhi/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-uposhakha-briddhi/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_uposhakha_briddhi')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['uposhakhar_nam'] = $this->input->post('uposhakhar_nam');
            $data['abashik_pratishthanik'] = $this->input->post('abashik_pratishthanik');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');

            $this->site->insertData('other_e_uposhakha_briddhi', $data);

            header("Location: " . admin_url('departmentsreport/others-page-three/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_uposhakha_briddhi_update')) {
            $data['uposhakhar_nam'] = $this->input->post('uposhakhar_nam');
            $data['abashik_pratishthanik'] = $this->input->post('abashik_pratishthanik');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');

            $this->site->updateData('other_e_uposhakha_briddhi', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-three/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_uposhakha_briddhi'] = $this->db->get('other_e_uposhakha_briddhi')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_uposhakha_briddhi', $meta, $this->data, 'leftmenu/departmentsreport');
    }


    function add_other_e_uposhakha_ghatti($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-e-uposhakh-ghatti/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-e-uposhakh-ghatti/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_e_uposhakha_ghatti')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['uposhakhar_nam'] = $this->input->post('uposhakhar_nam');
            $data['abashik_pratishthanik'] = $this->input->post('abashik_pratishthanik');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            var_dump($data);
            $this->site->insertData('other_e_uposhakha_ghatti', $data);

            header("Location: " . admin_url('departmentsreport/others-page-three/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_e_uposhakha_ghatti_update')) {
            $data['uposhakhar_nam'] = $this->input->post('uposhakhar_nam');
            $data['abashik_pratishthanik'] = $this->input->post('abashik_pratishthanik');
            $data['shodossho'] = $this->input->post('shodossho');
            $data['sathi'] = $this->input->post('sathi');
            $data['kormi'] = $this->input->post('kormi');
            $data['ghattir_karon'] = $this->input->post('ghattir_karon');
            $this->site->updateData('other_e_uposhakha_ghatti', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-three/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_e_uposhakha_ghatti'] = $this->db->get('other_e_uposhakha_ghatti')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_e_uposhakha_ghatti', $meta, $this->data, 'leftmenu/departmentsreport');
    }



    function others_page_four($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-four/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-four/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('online_dawati_d_hoyeche');
            $this->db->select_sum('online_dawati_d_karon');
            $this->db->select_sum('kawmi_hafeji_dawat_w_hoyeche');
            $this->db->select_sum('kawmi_hafeji_dawat_w_karon');
            $this->db->select_sum('school_dawat_p_hoyeche');
            $this->db->select_sum('school_dawat_p_karon');
            $this->db->select_sum('uni_col_dawat_d_hoyeche');
            $this->db->select_sum('uni_col_dawat_d_karon');
            $this->db->select_sum('madrasah_dawat_d_hoyeche');
            $this->db->select_sum('madrasah_dawat_d_karon');
            $this->db->select_sum('diploma_dawat_d_hoyeche');
            $this->db->select_sum('diploma_dawat_d_karon');
            $this->db->select_sum('culture_dawat_w_hoyeche');
            $this->db->select_sum('culture_dawat_w_karon');
            $this->db->select_sum('shadharon_dawat_p_hoyeche');
            $this->db->select_sum('shadharon_dawat_p_karon');
            $this->db->select_sum('onno_dhormo_dawat_w_hoyeche');
            $this->db->select_sum('onno_dhormo_dawat_w_karon');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['other_shopta_doshok_pokkho_palon'] = $this->db->get('other_shopta_doshok_pokkho_palon')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['row_other_shopta_doshok_pokkho_palon'] = $this->db->get('other_shopta_doshok_pokkho_palon')->num_rows();

            $this->db->select_sum('academic_output_hoyeche');
            $this->db->select_sum('academic_output_karon');
            $this->db->select_sum('pro_output_hoyeche');
            $this->db->select_sum('pro_output_karon');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['other_output_plan'] = $this->db->get('other_output_plan')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['row_other_output_plan'] = $this->db->get('other_output_plan')->num_rows();

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');
            $query = $this->db->get('other_chatro_sonshod');
            $this->data['other_chatro_sonshod'] = $query;
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_shopta_doshok_pokkho_palon');
            $this->data['other_shopta_doshok_pokkho_palon'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_output_plan');
            $this->data['other_output_plan'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_chatro_sonshod');
            $this->data['other_chatro_sonshod'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_four_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_four', $meta, $this->data, 'leftmenu/departmentsreport');
    }


    function add_other_chatro_sonshod($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-chatro-sonshod/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-chatro-sonshod/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_chatro_sonshod')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['name'] = $this->input->post('name');
            $data['sin_election'] = $this->input->post('sin_election');
            $data['comb_election'] = $this->input->post('comb_election');
            $data['attend_poth_s'] = $this->input->post('attend_poth_s');
            $data['gain_s'] = $this->input->post('gain_s');
            $this->site->insertData('other_chatro_sonshod', $data);

            header("Location: " . admin_url('departmentsreport/others-page-four/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_chatro_sonshod_update')) {
            $data['name'] = $this->input->post('name');
            $data['sin_election'] = $this->input->post('sin_election');
            $data['comb_election'] = $this->input->post('comb_election');
            $data['attend_poth_s'] = $this->input->post('attend_poth_s');
            $data['attend_poth_s'] = $this->input->post('attend_poth_s');
            $data['gain_s'] = $this->input->post('gain_s');
            $this->site->updateData('other_chatro_sonshod', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-four/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_chatro_sonshod'] = $this->db->get('other_chatro_sonshod')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_chatro_sonshod', $meta, $this->data, 'leftmenu/departmentsreport');
    }


    function others_page_five($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-five/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-five/' . $this->session->userdata('branch_id'));
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

            if ($branch_id){
                $this->db->select('*');
                $this->db->where('branch_id', $branch_id);                
            }else{
                $this->db->select('person_name, SUM(sofor_bar) as bar');
                $this->db->group_by('person_name');
            }               
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');           
            $query = $this->db->get('other_sofor_report');
            $this->data['other_sofor_report'] = $query;



            if ($branch_id){
                $this->db->select('*');
                $this->db->where('branch_id', $branch_id);                
            }else{
                $this->db->select('person_name, SUM(sofor_bar) as bar');
                $this->db->group_by('person_name');
            }     
           
                
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
           
            $query = $this->db->get('other_sofor_nayebe_amir');
            $this->data['other_sofor_nayebe_amir'] = $query;

            $this->db->select('*');
            $this->data['other_sofor_list_1'] = $this->db->get('other_sofor_list_1');

            $this->db->select('*');
            $this->data['other_sofor_list_2'] = $this->db->get('other_sofor_list_2');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('other_sofor_report');
            $this->data['other_sofor_report'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_sofor_nayebe_amir');
            $this->data['other_sofor_nayebe_amir'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        // $this->sma->print_arrays($this->data['other_sofor_nayebe_amir']->result_array()); 

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_five_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_five', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_sofor_list_1($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-sofor-list-1/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-sofor-list-1/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_sofor_list_1')) {

            $data['created_at'] = date("Y-m-d");
            $data['user_id'] = $this->session->userdata('user_id');
            $data['person_name'] = $this->input->post('person_name');

            $this->site->insertData('other_sofor_list_1', $data);

            header("Location: " . admin_url('departmentsreport/others-page-five'));
        }
        if ($this->input->post('other_sofor_list_1_update')) {
            $data['created_at'] = date("Y-m-d");
            $data['user_id'] = $this->session->userdata('user_id');
            $data['person_name'] = $this->input->post('person_name');
            $this->site->updateData('other_sofor_list_1', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-five'));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_sofor_list_1'] = $this->db->get('other_sofor_list_1')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);


        $this->page_construct('departmentsreport/others/add_other_sofor_list_1', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_sofor_list_2($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-sofor-list-2/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-sofor-list-2/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_sofor_list_2')) {
            $data['created_at'] = date("Y-m-d");
            $data['user_id'] = $this->session->userdata('user_id');
            $data['person_name'] = $this->input->post('person_name');
            $this->site->insertData('other_sofor_list_2', $data);

            header("Location: " . admin_url('departmentsreport/others-page-five'));
        }
        if ($this->input->post('other_sofor_list_2_update')) {
            $data['created_at'] = date("Y-m-d");
            $data['user_id'] = $this->session->userdata('user_id');
            $data['person_name'] = $this->input->post('person_name');
            $this->site->updateData('other_sofor_list_2', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-five'));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_sofor_list_2'] = $this->db->get('other_sofor_list_2')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        $this->page_construct('departmentsreport/others/add_other_sofor_list_2', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_sofor_report($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-sofor-report/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-sofor-report/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_sofor_report')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['person_name'] = $this->input->post('person_name');
            $data['sofor_bar'] = $this->input->post('sofor_bar');
            $data['sofor_type'] = $this->input->post('sofor_type');
            $this->site->insertData('other_sofor_report', $data);

            header("Location: " . admin_url('departmentsreport/others-page-five/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_sofor_report_update')) {
            $data['person_name'] = $this->input->post('person_name');
            $data['sofor_bar'] = $this->input->post('sofor_bar');
            $data['sofor_type'] = $this->input->post('sofor_type');
            $this->site->updateData('other_sofor_report', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-five/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_sofor_report'] = $this->db->get('other_sofor_report')->first_row('array');
        }
        $this->db->select('*');
        $query = $this->db->get('other_sofor_list_1');
        $this->data['other_sofor_list_1'] = $query;

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_sofor_report', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_sofor_nayebe_amir($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-sofor-nayebe-amir/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-sofor-nayebe-amir/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_sofor_nayebe_amir')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['person_name'] = $this->input->post('person_name');
            $data['sofor_bar'] = $this->input->post('sofor_bar');
            $data['sofor_type'] = $this->input->post('sofor_type');
            $this->site->insertData('other_sofor_nayebe_amir', $data);

            header("Location: " . admin_url('departmentsreport/others-page-five/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_sofor_nayebe_amir_update')) {
            $data['person_name'] = $this->input->post('person_name');
            $data['sofor_bar'] = $this->input->post('sofor_bar');
            $data['sofor_type'] = $this->input->post('sofor_type');

            $this->site->updateData('other_sofor_nayebe_amir', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-five/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_sofor_nayebe_amir'] = $this->db->get('other_sofor_nayebe_amir')->first_row('array');
        }
        $this->db->select('*');
        $query = $this->db->get('other_sofor_list_2');
        $this->data['other_sofor_list_2'] = $query;

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_sofor_nayebe_amir', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    ///////////////////////////////////////////////
    ///////////////////////////////////////////////
    ///////////brriddhi_shakha_nam starts///////////
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////


    function others_page_six($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-six/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-six/' . $this->session->userdata('branch_id'));
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
            $this->data['other_others_songothon'] = $this->db->get('other_others_songothon');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_others_songothon');
            $this->data['other_others_songothon'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_six_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_six', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_songothon_name($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-songothon-name/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-songothon-name/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_songothon_name')) {
            $data['sn_name'] = $this->input->post('sn_name');
            $this->site->insertData('other_songothon_name', $data);
        }
        if ($this->input->post('other_songothon_name_update')) {
            $data['sn_name'] = $this->input->post('sn_name');
            $this->site->updateData('other_songothon_name', $data, array('id' => $this->input->get('id')));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_songothon_name'] = $this->db->get('other_songothon_name')->first_row('array');
        }
        $this->db->select('*');
        $this->data['other_songothon_name'] = $this->db->get('other_songothon_name');

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        $this->page_construct('departmentsreport/others/add_other_songothon_name', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_other_others_songothon($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-others-songothon/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-others-songothon/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_others_songothon')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['sn_name'] = $this->input->post('sn_name');
            $data['sn_activity'] = $this->input->post('sn_activity');
            $this->site->insertData('other_others_songothon', $data);

            header("Location: " . admin_url('departmentsreport/others-page-six/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_others_songothon_update')) {
            $data['sn_name'] = $this->input->post('sn_name');
            $data['sn_activity'] = $this->input->post('sn_activity');
            $this->site->updateData('other_others_songothon', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-six/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_others_songothon'] = $this->db->get('other_others_songothon')->first_row('array');
        }
        $this->db->select('*');
        $query = $this->db->get('other_songothon_name');
        $this->data['other_songothon_name'] = $query;

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_others_songothon', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function others_page_seven($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/others-page-seven/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/others-page-seven/' . $this->session->userdata('branch_id'));
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
            $this->data['other_comments'] = $this->db->get('other_comments');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('other_comments');
            $this->data['other_comments'] = $query;
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/others_page_seven_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/others/others_page_seven', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function add_other_comments($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-other-comments/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-other-comments/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('other_comments')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');

            $data['comments'] = $this->input->post('comments');
            $this->site->insertData('other_comments', $data);

            header("Location: " . admin_url('departmentsreport/others-page-seven/' . $this->data['branch_id']));
        }
        if ($this->input->post('other_comments_update')) {
            $data['comments'] = $this->input->post('comments');
            $this->site->updateData('other_comments', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/others-page-seven/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['other_comments'] = $this->db->get('other_comments')->first_row('array');
        }

        $this->data['m'] = 'others';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/others/add_other_comments', $meta, $this->data, 'leftmenu/departmentsreport');
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
