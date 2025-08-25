<?php defined('BASEPATH') or exit('No direct script access allowed');

class Madrasha extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 19) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 19) { //Madrasa
            $this->departmentuser = true;
        }
               
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 19
        $this->data['department_id'] = 19;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (19)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>19), 'id desc', 1, 0);

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
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    public function madrasha_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-one/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('m_prev');
        $this->db->select_sum('m_pres');
        $this->db->select_sum('m_bri');
        $this->db->select_sum('m_ter');
        $this->db->select_sum('m_gha');
        $this->db->select_sum('a_prev');
        $this->db->select_sum('a_pres');
        $this->db->select_sum('a_bri');
        $this->db->select_sum('a_ter');
        $this->db->select_sum('a_gha');
        $this->db->select_sum('w_prev');
        $this->db->select_sum('w_pres');
        $this->db->select_sum('w_bri');
        $this->db->select_sum('w_ter');
        $this->db->select_sum('w_gha');
        $this->db->select_sum('s_prev');
        $this->db->select_sum('s_pres');
        $this->db->select_sum('s_bri');
        $this->db->select_sum('s_ter');
        $this->db->select_sum('s_gha');
        $this->db->select_sum('f_prev');
        $this->db->select_sum('f_pres');
        $this->db->select_sum('f_bri');
        $this->db->select_sum('f_ter');
        $this->db->select_sum('f_gha');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_jonoshokti'] = $this->db->get('madrasah_jonoshokti')->first_row('array');


        $this->db->select_sum('th_prev');
        $this->db->select_sum('th_pres');
        $this->db->select_sum('th_bri');
        $this->db->select_sum('th_ter');
        $this->db->select_sum('th_gha');
        $this->db->select_sum('wo_prev');
        $this->db->select_sum('wo_pres');
        $this->db->select_sum('wo_bri');
        $this->db->select_sum('wo_ter');
        $this->db->select_sum('wo_gha');
        $this->db->select_sum('up_prev');
        $this->db->select_sum('up_pres');
        $this->db->select_sum('up_bri');
        $this->db->select_sum('up_ter');
        $this->db->select_sum('up_gha');
        $this->db->select_sum('ss_prev');
        $this->db->select_sum('ss_pres');
        $this->db->select_sum('ss_bri');
        $this->db->select_sum('ss_ter');
        $this->db->select_sum('ss_gha');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_shongothon'] = $this->db->get('madrasah_shongothon')->first_row('array');
      
        $this->db->select_sum('physio_manpower_central_s');
        $this->db->select_sum('physio_manpower_central_p');
        $this->db->select_sum('physio_general_central_s');
        $this->db->select_sum('physio_general_central_p'); 
        $this->db->select_sum('physio_manpower_shakha_s');
        $this->db->select_sum('physio_manpower_shakha_p');
        $this->db->select_sum('physio_general_shakha_s');
        $this->db->select_sum('physio_general_shakha_p'); 
        $this->db->select_sum('kowmi_manpower_central_s');
        $this->db->select_sum('kowmi_manpower_central_p');
        $this->db->select_sum('kowmi_general_central_s');
        $this->db->select_sum('kowmi_general_central_p'); 
        $this->db->select_sum('kowmi_manpower_shakha_s');
        $this->db->select_sum('kowmi_manpower_shakha_p');
        $this->db->select_sum('kowmi_general_shakha_s');
        $this->db->select_sum('kowmi_general_shakha_p'); 
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_summit'] = $this->db->get('madrasah_summit')->first_row('array');

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

        $this->data['madrasah_training_program'] = $this->db->get('madrasah_training_program')->first_row('array');
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_summit');
        $this->data['madrasah_summit'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_training_program');
        $this->data['madrasah_training_program'] = $query->first_row('array');	

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('madrasah_jonoshokti');
            $this->data['madrasah_jonoshokti'] = $query->first_row('array');
            
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('madrasah_shongothon');
            $this->data['madrasah_shongothon'] = $query->first_row('array');
        }

        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function madrasha_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-two/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('ayat_proti_num');
        $this->db->select_sum('ayat_proti_pre');
        $this->db->select_sum('a_plus_num');
        $this->db->select_sum('a_plus_pre');
        $this->db->select_sum('hafej_num');
        $this->db->select_sum('hafej_pre');
        $this->db->select_sum('rochona_num');
        $this->db->select_sum('rochona_pre');
        $this->db->select_sum('merit_num');
        $this->db->select_sum('merit_pre');
        $this->db->select_sum('career_num');
        $this->db->select_sum('career_pre');
        $this->db->select_sum('quiz_num');
        $this->db->select_sum('quiz_pre');
        $this->db->select_sum('shadharon_num');
        $this->db->select_sum('shadharon_pre');
        $this->db->select_sum('bitorko_num');
        $this->db->select_sum('bitorko_pre');
        $this->db->select_sum('waz_num');
        $this->db->select_sum('waz_pre');
        $this->db->select_sum('khutba_num');
        $this->db->select_sum('khutba_pre');
        $this->db->select_sum('alem_num');
        $this->db->select_sum('alem_pre');
        $this->db->select_sum('ustad_num');
        $this->db->select_sum('ustad_pre');
        $this->db->select_sum('hadia_num');
        $this->db->select_sum('hadia_pre');
        $this->db->select_sum('quran_num');
        $this->db->select_sum('quran_pre');
        $this->db->select_sum('shikkha_num');
        $this->db->select_sum('shikkha_pre');
        $this->db->select_sum('kirat_num');
        $this->db->select_sum('kirat_pre');
        $this->db->select_sum('mot_num');
        $this->db->select_sum('mot_pre');
        $this->db->select_sum('iftar_num');
        $this->db->select_sum('iftar_pre');
        $this->db->select_sum('dars_num');
        $this->db->select_sum('dars_pre');
        $this->db->select_sum('cha_num');
        $this->db->select_sum('cha_pre');
        $this->db->select_sum('other_num');
        $this->db->select_sum('other_pre');
        $this->db->select_sum('sadaron_gan_pre');
        $this->db->select_sum('sadaron_gan_num');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_dawat_program_1'] = $this->db->get('madrasah_dawat_program_1')->first_row('array');

  

        $this->db->select_sum('tarbiyat_num');
        $this->db->select_sum('tarbiyat_pre');
        $this->db->select_sum('alem_num');
        $this->db->select_sum('alem_pre');
        $this->db->select_sum('arbi_num');
        $this->db->select_sum('arbi_pre');
        $this->db->select_sum('talimul_num');
        $this->db->select_sum('talimul_pre');
        $this->db->select_sum('protinidhi_num');
        $this->db->select_sum('protinidhi_pre');
        $this->db->select_sum('kormi_num');
        $this->db->select_sum('kormi_pre');
        $this->db->select_sum('quran_num');
        $this->db->select_sum('quran_pre');
        $this->db->select_sum('sathi_boithok_num');
        $this->db->select_sum('sathi_boithok_pre');
        $this->db->select_sum('noisho_num');
        $this->db->select_sum('noisho_pre');
        $this->db->select_sum('shamoshtik_num');
        $this->db->select_sum('shamoshtik_pre');
        $this->db->select_sum('alochona_num');
        $this->db->select_sum('alochona_pre');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_proshikkhon_program'] = $this->db->get('madrasah_proshikkhon_program')->first_row('array');
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('madrasah_dawat_program_1');
            $this->data['madrasah_dawat_program_1'] = $query->first_row('array');
            
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('madrasah_proshikkhon_program');
            $this->data['madrasah_proshikkhon_program'] = $query->first_row('array');
        }

        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function madrasha_page_three($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-three/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('kamil_mot');
        $this->db->select_sum('kamil_shongothon');
        $this->db->select_sum('kamil_shongothon_bri');
        $this->db->select_sum('kamil_thana');
        $this->db->select_sum('kamil_thana_bri');
        $this->db->select_sum('kamil_word');
        $this->db->select_sum('kamil_word_bri');
        $this->db->select_sum('kamil_up');
        $this->db->select_sum('kamil_up_bri');
        $this->db->select_sum('kamil_ss');
        $this->db->select_sum('kamil_ss_bri');
        $this->db->select_sum('kamil_s_nei');

        $this->db->select_sum('fajil_mot');
        $this->db->select_sum('fajil_shongothon');
        $this->db->select_sum('fajil_shongothon_bri');
        $this->db->select_sum('fajil_thana');
        $this->db->select_sum('fajil_thana_bri');
        $this->db->select_sum('fajil_word');
        $this->db->select_sum('fajil_word_bri');
        $this->db->select_sum('fajil_up');
        $this->db->select_sum('fajil_up_bri');
        $this->db->select_sum('fajil_ss');
        $this->db->select_sum('fajil_ss_bri');
        $this->db->select_sum('fajil_s_nei');

        $this->db->select_sum('alim_mot');
        $this->db->select_sum('alim_shongothon');
        $this->db->select_sum('alim_shongothon_bri');
        $this->db->select_sum('alim_thana');
        $this->db->select_sum('alim_thana_bri');
        $this->db->select_sum('alim_word');
        $this->db->select_sum('alim_word_bri');
        $this->db->select_sum('alim_up');
        $this->db->select_sum('alim_up_bri');
        $this->db->select_sum('alim_ss');
        $this->db->select_sum('alim_ss_bri');
        $this->db->select_sum('alim_s_nei');

        $this->db->select_sum('dakhil_mot');
        $this->db->select_sum('dakhil_shongothon');
        $this->db->select_sum('dakhil_shongothon_bri');
        $this->db->select_sum('dakhil_thana');
        $this->db->select_sum('dakhil_thana_bri');
        $this->db->select_sum('dakhil_word');
        $this->db->select_sum('dakhil_word_bri');
        $this->db->select_sum('dakhil_up');
        $this->db->select_sum('dakhil_up_bri');
        $this->db->select_sum('dakhil_ss');
        $this->db->select_sum('dakhil_ss_bri');
        $this->db->select_sum('dakhil_s_nei');

        $this->db->select_sum('private_mot');
        $this->db->select_sum('private_shongothon');
        $this->db->select_sum('private_shongothon_bri');
        $this->db->select_sum('private_thana');
        $this->db->select_sum('private_thana_bri');
        $this->db->select_sum('private_word');
        $this->db->select_sum('private_word_bri');
        $this->db->select_sum('private_up');
        $this->db->select_sum('private_up_bri');
        $this->db->select_sum('private_ss');
        $this->db->select_sum('private_ss_bri');
        $this->db->select_sum('private_s_nei');

        $this->db->select_sum('ibte_mot');
        $this->db->select_sum('ibte_shongothon');
        $this->db->select_sum('ibte_shongothon_bri');
        $this->db->select_sum('ibte_thana');
        $this->db->select_sum('ibte_thana_bri');
        $this->db->select_sum('ibte_word');
        $this->db->select_sum('ibte_word_bri');
        $this->db->select_sum('ibte_up');
        $this->db->select_sum('ibte_up_bri');
        $this->db->select_sum('ibte_ss');
        $this->db->select_sum('ibte_ss_bri');
        $this->db->select_sum('ibte_s_nei');

        $this->db->select_sum('hafeji_mot');
        $this->db->select_sum('hafeji_shongothon');
        $this->db->select_sum('hafeji_shongothon_bri');
        $this->db->select_sum('hafeji_thana');
        $this->db->select_sum('hafeji_thana_bri');
        $this->db->select_sum('hafeji_word');
        $this->db->select_sum('hafeji_word_bri');
        $this->db->select_sum('hafeji_up');
        $this->db->select_sum('hafeji_up_bri');
        $this->db->select_sum('hafeji_ss');
        $this->db->select_sum('hafeji_ss_bri');
        $this->db->select_sum('hafeji_s_nei');

        $this->db->select_sum('nurani_mot');
        $this->db->select_sum('nurani_shongothon');
        $this->db->select_sum('nurani_shongothon_bri');
        $this->db->select_sum('nurani_thana');
        $this->db->select_sum('nurani_thana_bri');
        $this->db->select_sum('nurani_word');
        $this->db->select_sum('nurani_word_bri');
        $this->db->select_sum('nurani_up');
        $this->db->select_sum('nurani_up_bri');
        $this->db->select_sum('nurani_ss');
        $this->db->select_sum('nurani_ss_bri');
        $this->db->select_sum('nurani_s_nei');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_eknojore_shongothon_1'] = $this->db->get('madrasah_eknojore_shongothon_1')->first_row('array');

        $this->db->select_sum('prin_mot');
        $this->db->select_sum('prin_shang');
        $this->db->select_sum('prin_other');
        $this->db->select_sum('prin_new');
       
        $this->db->select_sum('v_prin_mot');
        $this->db->select_sum('v_prin_shang');
        $this->db->select_sum('v_prin_other');
        $this->db->select_sum('v_prin_new');
       
        $this->db->select_sum('muhaddis_mot');
        $this->db->select_sum('muhaddis_shang');
        $this->db->select_sum('muhaddis_other');
        $this->db->select_sum('muhaddis_new');
       
        $this->db->select_sum('pir_mot');
        $this->db->select_sum('pir_shang');
        $this->db->select_sum('pir_other');
        $this->db->select_sum('pir_new');
       
        $this->db->select_sum('lec_mot');
        $this->db->select_sum('lec_shang');
        $this->db->select_sum('lec_other');
        $this->db->select_sum('lec_new');
       
        $this->db->select_sum('prova_mot');
        $this->db->select_sum('prova_shang');
        $this->db->select_sum('prova_other');
        $this->db->select_sum('prova_new');
       
        $this->db->select_sum('super_mot');
        $this->db->select_sum('super_shang');
        $this->db->select_sum('super_other');
        $this->db->select_sum('super_new');
       
        $this->db->select_sum('wazin_mot');
        $this->db->select_sum('wazin_shang');
        $this->db->select_sum('wazin_other');
        $this->db->select_sum('wazin_new');
       
        $this->db->select_sum('moulovi_mot');
        $this->db->select_sum('moulovi_shang');
        $this->db->select_sum('moulovi_other');
        $this->db->select_sum('moulovi_new');
       
        $this->db->select_sum('khotib_mot');
        $this->db->select_sum('khotib_shang');
        $this->db->select_sum('khotib_other');
        $this->db->select_sum('khotib_new');
       
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_output'] = $this->db->get('madrasah_output')->first_row('array');
}
else{
    $this->db->select('*');
    $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $query = $this->db->get('madrasah_eknojore_shongothon_1');
    $this->data['madrasah_eknojore_shongothon_1'] = $query->first_row('array');

    $this->db->select('*');
    $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

    $query = $this->db->get('madrasah_output');
    $this->data['madrasah_output'] = $query->first_row('array');
}


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function madrasha_page_four($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-four/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-four/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('a_total');
        $this->db->select_sum('a_a_plus');
        $this->db->select_sum('a_a');
        $this->db->select_sum('a_a_minus');
        $this->db->select_sum('a_b');
        $this->db->select_sum('a_c');
        $this->db->select_sum('a_d');
        $this->db->select_sum('a_fail');

        $this->db->select_sum('w_total');
        $this->db->select_sum('w_a_plus');
        $this->db->select_sum('w_a');
        $this->db->select_sum('w_a_minus');
        $this->db->select_sum('w_b');
        $this->db->select_sum('w_c');
        $this->db->select_sum('w_d');
        $this->db->select_sum('w_fail');

        $this->db->select_sum('s_total');
        $this->db->select_sum('s_a_plus');
        $this->db->select_sum('s_a');
        $this->db->select_sum('s_a_minus');
        $this->db->select_sum('s_b');
        $this->db->select_sum('s_c');
        $this->db->select_sum('s_d');
        $this->db->select_sum('s_fail');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_jdc_result'] = $this->db->get('madrasah_jdc_result')->first_row('array');

      
        $this->db->select_sum('m_s_total');
        $this->db->select_sum('m_s_a_plus');
        $this->db->select_sum('m_s_a');
        $this->db->select_sum('m_s_a_minus');
        $this->db->select_sum('m_s_b');
        $this->db->select_sum('m_s_c');
        $this->db->select_sum('m_s_d');
        $this->db->select_sum('m_s_fail');
        
        $this->db->select_sum('m_a_total');
        $this->db->select_sum('m_a_a_plus');
        $this->db->select_sum('m_a_a');
        $this->db->select_sum('m_a_a_minus');
        $this->db->select_sum('m_a_b');
        $this->db->select_sum('m_a_c');
        $this->db->select_sum('m_a_d');
        $this->db->select_sum('m_a_fail');
        $this->db->select_sum('a_s_total');
        $this->db->select_sum('a_s_a_plus');
        $this->db->select_sum('a_s_a');
        $this->db->select_sum('a_s_a_minus');
        $this->db->select_sum('a_s_b');
        $this->db->select_sum('a_s_c');
        $this->db->select_sum('a_s_d');
        $this->db->select_sum('a_s_fail');
        $this->db->select_sum('a_a_total');
        $this->db->select_sum('a_a_a_plus');
        $this->db->select_sum('a_a_a');
        $this->db->select_sum('a_a_a_minus');
        $this->db->select_sum('a_a_b');
        $this->db->select_sum('a_a_c');
        $this->db->select_sum('a_a_d');
        $this->db->select_sum('a_a_fail');
        $this->db->select_sum('w_s_total');
        $this->db->select_sum('w_s_a_plus');
        $this->db->select_sum('w_s_a');
        $this->db->select_sum('w_s_a_minus');
        $this->db->select_sum('w_s_b');
        $this->db->select_sum('w_s_c');
        $this->db->select_sum('w_s_d');
        $this->db->select_sum('w_s_fail');
        $this->db->select_sum('w_a_total');
        $this->db->select_sum('w_a_a_plus');
        $this->db->select_sum('w_a_a');
        $this->db->select_sum('w_a_a_minus');
        $this->db->select_sum('w_a_b');
        $this->db->select_sum('w_a_c');
        $this->db->select_sum('w_a_d');
        $this->db->select_sum('w_a_fail');
        $this->db->select_sum('s_s_total');
        $this->db->select_sum('s_s_a_plus');
        $this->db->select_sum('s_s_a');
        $this->db->select_sum('s_s_a_minus');
        $this->db->select_sum('s_s_b');
        $this->db->select_sum('s_s_c');
        $this->db->select_sum('s_s_d');
        $this->db->select_sum('s_s_fail');
        $this->db->select_sum('s_a_total');
        $this->db->select_sum('s_a_a_plus');
        $this->db->select_sum('s_a_a');
        $this->db->select_sum('s_a_a_minus');
        $this->db->select_sum('s_a_b');
        $this->db->select_sum('s_a_c');
        $this->db->select_sum('s_a_d');
        $this->db->select_sum('s_a_fail');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_dakhil_result'] = $this->db->get('madrasah_dakhil_result')->first_row('array');

        $this->db->select_sum('m_s_total');
        $this->db->select_sum('m_s_a_plus');
        $this->db->select_sum('m_s_a');
        $this->db->select_sum('m_s_a_minus');
        $this->db->select_sum('m_s_b');
        $this->db->select_sum('m_s_c');
        $this->db->select_sum('m_s_d');
        $this->db->select_sum('m_s_fail');
        $this->db->select_sum('m_a_total');
        $this->db->select_sum('m_a_a_plus');
        $this->db->select_sum('m_a_a');
        $this->db->select_sum('m_a_a_minus');
        $this->db->select_sum('m_a_b');
        $this->db->select_sum('m_a_c');
        $this->db->select_sum('m_a_d');
        $this->db->select_sum('m_a_fail');
        $this->db->select_sum('a_s_total');
        $this->db->select_sum('a_s_a_plus');
        $this->db->select_sum('a_s_a');
        $this->db->select_sum('a_s_a_minus');
        $this->db->select_sum('a_s_b');
        $this->db->select_sum('a_s_c');
        $this->db->select_sum('a_s_d');
        $this->db->select_sum('a_s_fail');
        $this->db->select_sum('a_a_total');
        $this->db->select_sum('a_a_a_plus');
        $this->db->select_sum('a_a_a');
        $this->db->select_sum('a_a_a_minus');
        $this->db->select_sum('a_a_b');
        $this->db->select_sum('a_a_c');
        $this->db->select_sum('a_a_d');
        $this->db->select_sum('a_a_fail');
        $this->db->select_sum('w_s_total');
        $this->db->select_sum('w_s_a_plus');
        $this->db->select_sum('w_s_a');
        $this->db->select_sum('w_s_a_minus');
        $this->db->select_sum('w_s_b');
        $this->db->select_sum('w_s_c');
        $this->db->select_sum('w_s_d');
        $this->db->select_sum('w_s_fail');
        $this->db->select_sum('w_a_total');
        $this->db->select_sum('w_a_a_plus');
        $this->db->select_sum('w_a_a');
        $this->db->select_sum('w_a_a_minus');
        $this->db->select_sum('w_a_b');
        $this->db->select_sum('w_a_c');
        $this->db->select_sum('w_a_d');
        $this->db->select_sum('w_a_fail');
        $this->db->select_sum('s_s_total');
        $this->db->select_sum('s_s_a_plus');
        $this->db->select_sum('s_s_a');
        $this->db->select_sum('s_s_a_minus');
        $this->db->select_sum('s_s_b');
        $this->db->select_sum('s_s_c');
        $this->db->select_sum('s_s_d');
        $this->db->select_sum('s_s_fail');
        $this->db->select_sum('s_a_total');
        $this->db->select_sum('s_a_a_plus');
        $this->db->select_sum('s_a_a');
        $this->db->select_sum('s_a_a_minus');
        $this->db->select_sum('s_a_b');
        $this->db->select_sum('s_a_c');
        $this->db->select_sum('s_a_d');
        $this->db->select_sum('s_a_fail');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_alim_result'] = $this->db->get('madrasah_alim_result')->first_row('array');
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_jdc_result');
        $this->data['madrasah_jdc_result'] = $query->first_row('array');
    
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_dakhil_result');
        $this->data['madrasah_dakhil_result'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_alim_result');
        $this->data['madrasah_alim_result'] = $query->first_row('array');
    }
    
        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_four_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_four', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function madrasha_page_five($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-five/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-five/' . $this->session->userdata('branch_id'));
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

        
        $this->db->select_sum('muballig_bor_k');
        $this->db->select_sum('muballig_bor_h');
        $this->db->select_sum('muballig_bri_k');
        $this->db->select_sum('muballig_bri_h');
        $this->db->select_sum('muballig_ter_k');
        $this->db->select_sum('muballig_ter_h');
        $this->db->select_sum('muballig_gha_k');
        $this->db->select_sum('muballig_gha_h');
        $this->db->select_sum('dayi_bor_k');
        $this->db->select_sum('dayi_bor_h');
        $this->db->select_sum('dayi_bri_k');
        $this->db->select_sum('dayi_bri_h');
        $this->db->select_sum('dayi_ter_k');
        $this->db->select_sum('dayi_ter_h');
        $this->db->select_sum('dayi_gha_k');
        $this->db->select_sum('dayi_gha_h');
        $this->db->select_sum('muin_bor_k');
        $this->db->select_sum('muin_bor_h');
        $this->db->select_sum('muin_bri_k');
        $this->db->select_sum('muin_bri_h');
        $this->db->select_sum('muin_ter_k');
        $this->db->select_sum('muin_ter_h');
        $this->db->select_sum('muin_gha_k');
        $this->db->select_sum('muin_gha_h');
        $this->db->select_sum('muid_bor_k');
        $this->db->select_sum('muid_bor_h');
        $this->db->select_sum('muid_bri_k');
        $this->db->select_sum('muid_bri_h');
        $this->db->select_sum('muid_ter_k');
        $this->db->select_sum('muid_ter_h');
        $this->db->select_sum('muid_gha_k');
        $this->db->select_sum('muid_gha_h');
        $this->db->select_sum('sadiq_bor_k');
        $this->db->select_sum('sadiq_bor_h');
        $this->db->select_sum('sadiq_bri_k');
        $this->db->select_sum('sadiq_bri_h');
        $this->db->select_sum('sadiq_ter_k');
        $this->db->select_sum('sadiq_ter_h');
        $this->db->select_sum('sadiq_gha_k');
        $this->db->select_sum('sadiq_gha_h');
        $this->db->select_sum('thana_bor_k');
        $this->db->select_sum('thana_bor_h');
        $this->db->select_sum('thana_bri_k');
        $this->db->select_sum('thana_bri_h');
        $this->db->select_sum('thana_ter_k');
        $this->db->select_sum('thana_ter_h');
        $this->db->select_sum('thana_gha_k');
        $this->db->select_sum('thana_gha_h');
        $this->db->select_sum('word_bor_k');
        $this->db->select_sum('word_bor_h');
        $this->db->select_sum('word_bri_k');
        $this->db->select_sum('word_bri_h');
        $this->db->select_sum('word_ter_k');
        $this->db->select_sum('word_ter_h');
        $this->db->select_sum('word_gha_k');
        $this->db->select_sum('word_gha_h');
        $this->db->select_sum('up_bor_k');
        $this->db->select_sum('up_bor_h');
        $this->db->select_sum('up_bri_k');
        $this->db->select_sum('up_bri_h');
        $this->db->select_sum('up_ter_k');
        $this->db->select_sum('up_ter_h');
        $this->db->select_sum('up_gha_k');
        $this->db->select_sum('up_gha_h');
        $this->db->select_sum('muid_s_bor_k');
        $this->db->select_sum('muid_s_bor_h');
        $this->db->select_sum('muid_s_bri_k');
        $this->db->select_sum('muid_s_bri_h');
        $this->db->select_sum('muid_s_ter_k');
        $this->db->select_sum('muid_s_ter_h');
        $this->db->select_sum('muid_s_gha_k');
        $this->db->select_sum('muid_s_gha_h');

        $this->db->select_sum('khas_n');
        $this->db->select_sum('khas_p');
        $this->db->select_sum('am_n');
        $this->db->select_sum('am_p');
        $this->db->select_sum('muballig_n');
        $this->db->select_sum('muballig_p');
        $this->db->select_sum('dayi_s_n');
        $this->db->select_sum('dayi_s_p');
        $this->db->select_sum('muin_n');
        $this->db->select_sum('muin_p');
        $this->db->select_sum('protinidhi_n');
        $this->db->select_sum('protinidhi_p');
        $this->db->select_sum('t_quran_n');
        $this->db->select_sum('t_quran_p');
        $this->db->select_sum('t_hadis_n');
        $this->db->select_sum('t_hadis_p');
        $this->db->select_sum('sahitto_n');
        $this->db->select_sum('sahitto_p');
        $this->db->select_sum('islahi_n');
        $this->db->select_sum('islahi_p');
        $this->db->select_sum('cha_n');
        $this->db->select_sum('cha_p');
        $this->db->select_sum('shikkha_n');
        $this->db->select_sum('shikkha_p');
        $this->db->select_sum('quran_n');
        $this->db->select_sum('quran_p');
        $this->db->select_sum('tarbiyat_n');
        $this->db->select_sum('tarbiyat_p');

        $this->db->select_sum('puroshkar_n');
        $this->db->select_sum('puroshkar_p');
        $this->db->select_sum('hafej_n');
        $this->db->select_sum('hafej_p');
        $this->db->select_sum('mumtaj_n');
        $this->db->select_sum('mumtaj_p');
        $this->db->select_sum('kirat_n');
        $this->db->select_sum('kirat_p');
        $this->db->select_sum('muin_w_n');
        $this->db->select_sum('muin_w_p');
        $this->db->select_sum('hifjul_n');
        $this->db->select_sum('hifjul_p');
        $this->db->select_sum('iftar_n');
        $this->db->select_sum('iftar_p');
        $this->db->select_sum('ustad_n');
        $this->db->select_sum('ustad_p');
        $this->db->select_sum('shikkha_u_n');
        $this->db->select_sum('shikkha_u_p');
        $this->db->select_sum('madrasa_n');
        $this->db->select_sum('madrasa_p');
        $this->db->select_sum('dayi_n');
        $this->db->select_sum('dayi_p');
        $this->db->select_sum('khutba_n');
        $this->db->select_sum('khutba_p');
        $this->db->select_sum('mot_n');
        $this->db->select_sum('mot_p');
        $this->db->select_sum('report_n');
        $this->db->select_sum('report_p');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_kowmi_1'] = $this->db->get('madrasah_kowmi_1')->first_row('array');
        

        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('madrasah_kowmi_1');
            $this->data['madrasah_kowmi_1'] = $query->first_row('array');
        
        }
        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_five_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_five', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function madrasha_page_six($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-six/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/madrasha-page-six/' . $this->session->userdata('branch_id'));
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

        
        $this->db->select_sum('ifta_mot');
        $this->db->select_sum('ifta_shong');
        $this->db->select_sum('ifta_shong_bri');
        $this->db->select_sum('ifta_thana');
        $this->db->select_sum('ifta_thana_bri');
        $this->db->select_sum('ifta_word');
        $this->db->select_sum('ifta_word_bri');
        $this->db->select_sum('ifta_up');
        $this->db->select_sum('ifta_up_bri');
        $this->db->select_sum('ifta_muid');
        $this->db->select_sum('ifta_muid_bri');
        $this->db->select_sum('ifta_s_nei');
        $this->db->select_sum('dawra_mot');
        $this->db->select_sum('dawra_shong');
        $this->db->select_sum('dawra_shong_bri');
        $this->db->select_sum('dawra_thana');
        $this->db->select_sum('dawra_thana_bri');
        $this->db->select_sum('dawra_word');
        $this->db->select_sum('dawra_word_bri');
        $this->db->select_sum('dawra_up');
        $this->db->select_sum('dawra_up_bri');
        $this->db->select_sum('dawra_muid');
        $this->db->select_sum('dawra_muid_bri');
        $this->db->select_sum('dawra_s_nei');
        $this->db->select_sum('meshkat_mot');
        $this->db->select_sum('meshkat_shong');
        $this->db->select_sum('meshkat_shong_bri');
        $this->db->select_sum('meshkat_thana');
        $this->db->select_sum('meshkat_thana_bri');
        $this->db->select_sum('meshkat_word');
        $this->db->select_sum('meshkat_word_bri');
        $this->db->select_sum('meshkat_up');
        $this->db->select_sum('meshkat_up_bri');
        $this->db->select_sum('meshkat_muid');
        $this->db->select_sum('meshkat_muid_bri');
        $this->db->select_sum('meshkat_s_nei');
        $this->db->select_sum('jalalain_mot');
        $this->db->select_sum('jalalain_shong');
        $this->db->select_sum('jalalain_shong_bri');
        $this->db->select_sum('jalalain_thana');
        $this->db->select_sum('jalalain_thana_bri');
        $this->db->select_sum('jalalain_word');
        $this->db->select_sum('jalalain_word_bri');
        $this->db->select_sum('jalalain_up');
        $this->db->select_sum('jalalain_up_bri');
        $this->db->select_sum('jalalain_muid');
        $this->db->select_sum('jalalain_muid_bri');
        $this->db->select_sum('jalalain_s_nei');
        $this->db->select_sum('kafia_mot');
        $this->db->select_sum('kafia_shong');
        $this->db->select_sum('kafia_shong_bri');
        $this->db->select_sum('kafia_thana');
        $this->db->select_sum('kafia_thana_bri');
        $this->db->select_sum('kafia_word');
        $this->db->select_sum('kafia_word_bri');
        $this->db->select_sum('kafia_up');
        $this->db->select_sum('kafia_up_bri');
        $this->db->select_sum('kafia_muid');
        $this->db->select_sum('kafia_muid_bri');
        $this->db->select_sum('kafia_s_nei');
        $this->db->select_sum('hafezia_mot');
        $this->db->select_sum('hafezia_shong');
        $this->db->select_sum('hafezia_shong_bri');
        $this->db->select_sum('hafezia_thana');
        $this->db->select_sum('hafezia_thana_bri');
        $this->db->select_sum('hafezia_word');
        $this->db->select_sum('hafezia_word_bri');
        $this->db->select_sum('hafezia_up');
        $this->db->select_sum('hafezia_up_bri');
        $this->db->select_sum('hafezia_muid');
        $this->db->select_sum('hafezia_muid_bri');
        $this->db->select_sum('hafezia_s_nei');
        $this->db->select_sum('nurani_mot');
        $this->db->select_sum('nurani_shong');
        $this->db->select_sum('nurani_shong_bri');
        $this->db->select_sum('nurani_thana');
        $this->db->select_sum('nurani_thana_bri');
        $this->db->select_sum('nurani_word');
        $this->db->select_sum('nurani_word_bri');
        $this->db->select_sum('nurani_up');
        $this->db->select_sum('nurani_up_bri');
        $this->db->select_sum('nurani_muid');
        $this->db->select_sum('nurani_muid_bri');
        $this->db->select_sum('nurani_s_nei');

        $this->db->select_sum('muhaddis_mot');
        $this->db->select_sum('muhaddis_shang');
        $this->db->select_sum('muhaddis_birodhi');
        $this->db->select_sum('pir_mot');
        $this->db->select_sum('pir_shang');
        $this->db->select_sum('pir_birodhi');
        $this->db->select_sum('muhtamim_mot');
        $this->db->select_sum('muhtamim_shang');
        $this->db->select_sum('muhtamim_birodhi');
        $this->db->select_sum('mufti_mot');
        $this->db->select_sum('mufti_shang');
        $this->db->select_sum('mufti_birodhi');
        $this->db->select_sum('wazin_mot');
        $this->db->select_sum('wazin_shang');
        $this->db->select_sum('wazin_birodhi');
        $this->db->select_sum('khotib_mot');
        $this->db->select_sum('khotib_shang');
        $this->db->select_sum('khotib_birodhi');
        $this->db->select_sum('kowmi_mot');
        $this->db->select_sum('kowmi_shang');
        $this->db->select_sum('kowmi_birodhi');
        $this->db->select_sum('nurani_s_mot');
        $this->db->select_sum('nurani_s_shang');
        $this->db->select_sum('nurani_s_birodhi');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_eknojore_shongothon_2'] = $this->db->get('madrasah_eknojore_shongothon_2')->first_row('array');


        $this->db->select_sum('m_total');
        $this->db->select_sum('m_mumtaj');
        $this->db->select_sum('m_jj');
        $this->db->select_sum('m_mokbul');
        $this->db->select_sum('m_fail');
        $this->db->select_sum('a_total');
        $this->db->select_sum('a_mumtaj');
        $this->db->select_sum('a_jj');
        $this->db->select_sum('a_mokbul');
        $this->db->select_sum('a_fail');
        $this->db->select_sum('w_total');
        $this->db->select_sum('w_mumtaj');
        $this->db->select_sum('w_jj');
        $this->db->select_sum('w_mokbul');
        $this->db->select_sum('w_fail');
        $this->db->select_sum('s_total');
        $this->db->select_sum('s_mumtaj');
        $this->db->select_sum('s_jj');
        $this->db->select_sum('s_mokbul');
        $this->db->select_sum('s_fail');
        $this->db->select_sum('f_total');
        $this->db->select_sum('f_mumtaj');
        $this->db->select_sum('f_jj');
        $this->db->select_sum('f_mokbul');
        $this->db->select_sum('f_fail');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['madrasah_kowmi_result'] = $this->db->get('madrasah_kowmi_result')->first_row('array');

        }else{
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_eknojore_shongothon_2');
        $this->data['madrasah_eknojore_shongothon_2'] = $query->first_row('array');
    
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('madrasah_kowmi_result');
        $this->data['madrasah_kowmi_result'] = $query->first_row('array');
    
    }
        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_six_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/madrasha/madrasha_page_six', $meta, $this->data, 'leftmenu/departmentsreport');
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
