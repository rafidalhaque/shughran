<?php defined('BASEPATH') or exit('No direct script access allowed');

class Publication extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 13) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 13) { //
            $this->departmentuser = true;
        }

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 13
        $this->data['department_id'] = 13;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (13)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>13), 'id desc', 1, 0);

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

    public function publication_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/publication-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/publication-page-one/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('d_u_shong_porichiti_num');
        $this->db->select_sum('d_u_shong_porichiti_bikri');
        $this->db->select_sum('d_u_shong_porichiti_bitoron');
        $this->db->select_sum('d_u_poster_num');
        $this->db->select_sum('d_u_poster_bikri');
        $this->db->select_sum('d_u_poster_bitoron');
        $this->db->select_sum('d_u_sticker_num');
        $this->db->select_sum('d_u_sticker_bikri');
        $this->db->select_sum('d_u_sticker_bitoron');
        $this->db->select_sum('d_u_key_ring_num');
        $this->db->select_sum('d_u_key_ring_bikri');
        $this->db->select_sum('d_u_key_ring_bitoron');
        $this->db->select_sum('d_u_t_shirt_num');
        $this->db->select_sum('d_u_t_shirt_bikri');
        $this->db->select_sum('d_u_t_shirt_bitoron');
        $this->db->select_sum('d_u_namaj_rojar_sthayi_time_num');
        $this->db->select_sum('d_u_namaj_rojar_sthayi_time_bikri');
        $this->db->select_sum('d_u_namaj_rojar_sthayi_time_bitoron');
        $this->db->select_sum('d_u_shutraboli_num');
        $this->db->select_sum('d_u_shutraboli_bikri');
        $this->db->select_sum('d_u_shutraboli_bitoron');
        $this->db->select_sum('d_u_tense_num');
        $this->db->select_sum('d_u_tense_bikri');
        $this->db->select_sum('d_u_tense_bitoron');
        $this->db->select_sum('d_u_word_card_num');
        $this->db->select_sum('d_u_word_card_bikri');
        $this->db->select_sum('d_u_word_card_bitoron');
        $this->db->select_sum('d_u_class_routine_num');
        $this->db->select_sum('d_u_class_routine_bikri');
        $this->db->select_sum('d_u_class_routine_bitoron');
        $this->db->select_sum('d_u_school_routine_num');
        $this->db->select_sum('d_u_school_routine_bikri');
        $this->db->select_sum('d_u_school_routine_bitoron');
        $this->db->select_sum('d_u_court_pin_num');
        $this->db->select_sum('d_u_court_pin_bikri');
        $this->db->select_sum('d_u_court_pin_bitoron');
        $this->db->select_sum('d_u_paper_weight_num');
        $this->db->select_sum('d_u_paper_weight_bikri');
        $this->db->select_sum('d_u_paper_weight_bitoron');
        $this->db->select_sum('d_u_shuveccha_card_num');
        $this->db->select_sum('d_u_shuveccha_card_bikri');
        $this->db->select_sum('d_u_shuveccha_card_bitoron');
        $this->db->select_sum('d_u_notebook_num');
        $this->db->select_sum('d_u_notebook_bikri');
        $this->db->select_sum('d_u_notebook_bitoron');
        $this->db->select_sum('d_p_hons_1st_borso_num');
        $this->db->select_sum('d_p_hons_1st_borso_bikri');
        $this->db->select_sum('d_p_hons_1st_borso_bitoron');
        $this->db->select_sum('d_p_ssc_general_num');
        $this->db->select_sum('d_p_ssc_general_bikri');
        $this->db->select_sum('d_p_ssc_general_bitoron');
        $this->db->select_sum('d_p_ssc_a_plus_num');
        $this->db->select_sum('d_p_ssc_a_plus_bikri');
        $this->db->select_sum('d_p_ssc_a_plus_bitoron');
        $this->db->select_sum('s_u_shomorthok_form_num');
        $this->db->select_sum('s_u_shomorthok_form_bikri');
        $this->db->select_sum('s_u_shomorthok_form_bitoron');
        $this->db->select_sum('s_u_boi_reprot_num');
        $this->db->select_sum('s_u_boi_reprot_bikri');
        $this->db->select_sum('s_u_boi_reprot_bitoron');
        $this->db->select_sum('s_u_month_porik_report_num');
        $this->db->select_sum('s_u_month_porik_report_bikri');
        $this->db->select_sum('s_u_month_porik_report_bitoron');
        $this->db->select_sum('s_u_month_report_num');
        $this->db->select_sum('s_u_month_report_bikri');
        $this->db->select_sum('s_u_month_report_bitoron');
        $this->db->select_sum('s_u_per_report_form_num');
        $this->db->select_sum('s_u_per_report_form_bikri');
        $this->db->select_sum('s_u_per_report_form_bitoron');
        $this->db->select_sum('s_u_per_protibedon_num');
        $this->db->select_sum('s_u_per_protibedon_bikri');
        $this->db->select_sum('s_u_per_protibedon_bitoron');
        $this->db->select_sum('s_u_ortho_protibedon_num');
        $this->db->select_sum('s_u_ortho_protibedon_bikri');
        $this->db->select_sum('s_u_ortho_protibedon_bitoron');
        $this->db->select_sum('s_u_biodata_num');
        $this->db->select_sum('s_u_biodata_bikri');
        $this->db->select_sum('s_u_biodata_bitoron');
        $this->db->select_sum('s_u_voucher_num');
        $this->db->select_sum('s_u_voucher_bikri');
        $this->db->select_sum('s_u_voucher_bitoron');
        $this->db->select_sum('s_u_reg_khata_num');
        $this->db->select_sum('s_u_reg_khata_bikri');
        $this->db->select_sum('s_u_reg_khata_bitoron');
        $this->db->select_sum('s_u_cash_memo_num');
        $this->db->select_sum('s_u_cash_memo_bikri');
        $this->db->select_sum('s_u_cash_memo_bitoron');
        $this->db->select_sum('s_u_roshid_boi_num');
        $this->db->select_sum('s_u_roshid_boi_bikri');
        $this->db->select_sum('s_u_roshid_boi_bitoron');
        $this->db->select_sum('s_u_sw_box_num');
        $this->db->select_sum('s_u_sw_box_bikri');
        $this->db->select_sum('s_u_sw_box_bitoron');
        $this->db->select_sum('s_u_mem_can_dairy_num');
        $this->db->select_sum('s_u_mem_can_dairy_bikri');
        $this->db->select_sum('s_u_mem_can_dairy_bitoron');
        $this->db->select_sum('is_sa_dawati_boi_num');
        $this->db->select_sum('is_sa_dawati_boi_bikri');
        $this->db->select_sum('is_sa_dawati_boi_bitoron');
        $this->db->select_sum('is_sa_other_boi_num');
        $this->db->select_sum('is_sa_other_boi_bikri');
        $this->db->select_sum('is_sa_other_boi_bitoron');
        $this->db->select_sum('qu_ha_tafhimul_19_num');
        $this->db->select_sum('qu_ha_tafhimul_19_bikri');
        $this->db->select_sum('qu_ha_tafhimul_19_bitoron');
        $this->db->select_sum('qu_ha_tafhimul_10_num');
        $this->db->select_sum('qu_ha_tafhimul_10_bikri');
        $this->db->select_sum('qu_ha_tafhimul_10_bitoron');
        $this->db->select_sum('qu_ha_tafsir_ibn_kasir_num');
        $this->db->select_sum('qu_ha_tafsir_ibn_kasir_bikri');
        $this->db->select_sum('qu_ha_tafsir_ibn_kasir_bitoron');
        $this->db->select_sum('qu_ha_tafsir_fi_zilalil_quran_num');
        $this->db->select_sum('qu_ha_tafsir_fi_zilalil_quran_bikri');
        $this->db->select_sum('qu_ha_tafsir_fi_zilalil_quran_bitoron');
        $this->db->select_sum('qu_ha_bukhari_num');
        $this->db->select_sum('qu_ha_bukhari_bikri');
        $this->db->select_sum('qu_ha_bukhari_bitoron');
        $this->db->select_sum('qu_ha_muslim_num');
        $this->db->select_sum('qu_ha_muslim_bikri');
        $this->db->select_sum('qu_ha_muslim_bitoron');
        $this->db->select_sum('syl_set_high_syl_num');
        $this->db->select_sum('syl_set_high_syl_bikri');
        $this->db->select_sum('syl_set_high_syl_bitoron');
        $this->db->select_sum('syl_set_shodossho_syl_num');
        $this->db->select_sum('syl_set_shodossho_syl_bikri');
        $this->db->select_sum('syl_set_shodossho_syl_bitoron');
        $this->db->select_sum('syl_set_sathi_syl_num');
        $this->db->select_sum('syl_set_sathi_syl_bikri');
        $this->db->select_sum('syl_set_sathi_syl_bitoron');
        $this->db->select_sum('syl_set_kormi_syl_num');
        $this->db->select_sum('syl_set_kormi_syl_bikri');
        $this->db->select_sum('syl_set_kormi_syl_bitoron');
        $this->db->select_sum('syl_set_school_syl_num');
        $this->db->select_sum('syl_set_school_syl_bikri');
        $this->db->select_sum('syl_set_school_syl_bitoron');
        $this->db->select_sum('nobo_proka_3_page_cal_num');
        $this->db->select_sum('nobo_proka_3_page_cal_bikri');
        $this->db->select_sum('nobo_proka_3_page_cal_bitoron');
        $this->db->select_sum('nobo_proka_1_page_cal_big_num');
        $this->db->select_sum('nobo_proka_1_page_cal_big_bikri');
        $this->db->select_sum('nobo_proka_1_page_cal_big_bitoron');
        $this->db->select_sum('nobo_proka_1_page_cal_small_num');
        $this->db->select_sum('nobo_proka_1_page_cal_small_bikri');
        $this->db->select_sum('nobo_proka_1_page_cal_small_bitoron');
        $this->db->select_sum('nobo_proka_desk_cal_num');
        $this->db->select_sum('nobo_proka_desk_cal_bikri');
        $this->db->select_sum('nobo_proka_desk_cal_bitoron');
        $this->db->select_sum('nobo_proka_bang_dairy_num');
        $this->db->select_sum('nobo_proka_bang_dairy_bikri');
        $this->db->select_sum('nobo_proka_bang_dairy_bitoron');
        $this->db->select_sum('nobo_proka_eng_dairy_num');
        $this->db->select_sum('nobo_proka_eng_dairy_bikri');
        $this->db->select_sum('nobo_proka_eng_dairy_bitoron');
        $this->db->select_sum('nobo_proka_med_dairy_num');
        $this->db->select_sum('nobo_proka_med_dairy_bikri');
        $this->db->select_sum('nobo_proka_med_dairy_bitoron');
        $this->db->select_sum('nobo_proka_pocket_dairy_num');
        $this->db->select_sum('nobo_proka_pocket_dairy_bikri');
        $this->db->select_sum('nobo_proka_pocket_dairy_bitoron');
        $this->db->select_sum('rom_proka_cal_num');
        $this->db->select_sum('rom_proka_cal_bikri');
        $this->db->select_sum('rom_proka_cal_bitoron');
        $this->db->select_sum('rom_proka_cp_nosihot_num');
        $this->db->select_sum('rom_proka_cp_nosihot_bikri');
        $this->db->select_sum('rom_proka_cp_nosihot_bitoron');
        $this->db->select_sum('rom_proka_shadharon_student_ahban_num');
        $this->db->select_sum('rom_proka_shadharon_student_ahban_bikri');
        $this->db->select_sum('rom_proka_shadharon_student_ahban_bitoron');
        $this->db->select_sum('rom_proka_hotel_malik_ahban_num');
        $this->db->select_sum('rom_proka_hotel_malik_ahban_bikri');
        $this->db->select_sum('rom_proka_hotel_malik_ahban_bitoron');
        $this->db->select_sum('rom_proka_eid_card_num');
        $this->db->select_sum('rom_proka_eid_card_bikri');
        $this->db->select_sum('rom_proka_eid_card_bitoron');
        $this->db->select_sum('rom_proka_ramadan_kormo_plan_num');
        $this->db->select_sum('rom_proka_ramadan_kormo_plan_bikri');
        $this->db->select_sum('rom_proka_ramadan_kormo_plan_bitoron');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['publication_kendro_hote_prokashona'] = $this->db->get('publication_kendro_hote_prokashona')->first_row('array');


        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publication_kendro_hote_prokashona');
            $this->data['publication_kendro_hote_prokashona'] = $query->first_row('array');
        }


        $this->data['m'] = 'publication';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/publication/publication_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/publication/publication_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function publication_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/publication-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/publication-page-two/' . $this->session->userdata('branch_id'));
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
        $this->data['publication_bibidh'] = $this->db->get('publication_bibidh');

        $this->db->select_sum('odh_shakhar_bikroy_amount');
        $this->db->select_sum('odh_shakhar_bikroy_com');
        $this->db->select_sum('odh_shakhar_bahire_bikroy_amount');
        $this->db->select_sum('odh_shakhar_bahire_bikroy_com');
        $this->db->select_sum('pro_hote_total_ay_amount');
        $this->db->select_sum('pro_hote_total_ay_com');
        $this->db->select_sum('pro_hote_total_bay_amount');
        $this->db->select_sum('pro_hote_total_bay_com');
        $this->db->select_sum('publicationProfit_amount');
        $this->db->select_sum('publicationProfit_com');
        $this->db->select_sum('shakaLoss_amount');
        $this->db->select_sum('shakaLoss_com');


        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['publication_ay_bey'] = $this->db->get('publication_ay_bey')->first_row('array');
       
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

        $this->data['publication_training_program'] = $this->db->get('publication_training_program')->first_row('array');
  }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publication_training_program');
            $this->data['publication_training_program'] = $query->first_row('array');
    
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');
            
            $query = $this->db->get('publication_bibidh');
            $this->data['publication_bibidh'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publication_ay_bey');
            $this->data['publication_ay_bey'] = $query->first_row('array');
        }


        $this->data['m'] = 'publication';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/publication/publication_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/publication/publication_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }
    function add_publication_bibidh($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-publication-bibidh/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-publication-bibidh/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('publication_bibidh'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['upokoron']=$this->input->post('upokoron');
			$data['number']=$this->input->post('number');
            $data['bikri']=$this->input->post('bikri');
			$data['bitoron']=$this->input->post('bitoron');
			$this->site->insertData('publication_bibidh',$data);
            header("Location: ".admin_url('departmentsreport/publication-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('publication_bibidh_update'))
		{ 
            $data['upokoron']=$this->input->post('upokoron');
			$data['number']=$this->input->post('number');
            $data['bikri']=$this->input->post('bikri');
			$data['bitoron']=$this->input->post('bitoron');
			$this->site->updateData('publication_bibidh',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/publication-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['publication_bibidh'] = $this->db->get('publication_bibidh')->first_row('array');

        }

        $this->data['m'] = 'publication';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/publication/add_publication_bibidh', $meta, $this->data,'leftmenu/departmentsreport');
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
