<?php defined('BASEPATH') or exit('No direct script access allowed');

class Literature extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 5) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 5) {  //literature
            $this->departmentuser = true;
        }
       
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 5
        $this->data['department_id'] = 5;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (5)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>5), 'id desc', 1, 0);

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

    function literature_page_one($branch_id = NULL)
    {


      

        //$this->sma->checkPermissions();

        // $this->sma->print_arrays($this->input->get());
      
        

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            //  admin_redirect('departmentsreport/shakhar-uddege-shahitto-prokash/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/literature-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            //  admin_redirect('departmentsreport/shakhar-uddege-shahitto-prokash/'.$this->session->userdata('branch_id'));



            admin_redirect('departmentsreport/literature-page-one/' . $this->session->userdata('branch_id'));
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

        // $departments = $this->site->getAllDepartments();
        
        // $this->sma->print_arrays($this->data);

        $report_type = $this->report_type();

        
        // print_r($report_type);

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;


        // $this->sma->print_arrays($report_type);


        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {

            $this->db->select_sum('bkp_pn_before');
            $this->db->select_sum('bkp_pn_present');
            $this->db->select_sum('bkp_gn_before');
            $this->db->select_sum('bkp_gn_present');
            $this->db->select_sum('bkp_bt_potrika');
            $this->db->select_sum('bkp_bt_grahok');
            $this->db->select_sum('bkp_briddhi_potrika');
            $this->db->select_sum('bkp_briddhi_grahok');
            $this->db->select_sum('bkp_ghatti_potrika');
            $this->db->select_sum('bkp_ghatti_grahok');
            
            $this->db->select_sum('bkp_bmn');
            $this->db->select_sum('bkp_bbkry');
            $this->db->select_sum('bkp_bbitrn');


            $this->db->select_sum('nbkp_pn_before');
            $this->db->select_sum('nbkp_pn_present');
            $this->db->select_sum('nbkp_gn_before');
            $this->db->select_sum('nbkp_gn_present');
            $this->db->select_sum('nbkp_bt_potrika');
            $this->db->select_sum('nbkp_bt_grahok');
            $this->db->select_sum('nbkp_briddhi_potrika	');
            $this->db->select_sum('nbkp_briddhi_grahok');
            $this->db->select_sum('nbkp_ghatti_potrika');
            $this->db->select_sum('nbkp_ghatti_grahok');

            $this->db->select_sum('nbkp_bmn');
            $this->db->select_sum('nbkp_bbkry');
            $this->db->select_sum('nbkp_bbitrn');

            $this->db->select_sum('ekp_pn_before');
            $this->db->select_sum('ekp_pn_present');
            $this->db->select_sum('ekp_gn_before');
            $this->db->select_sum('ekp_gn_present');
            $this->db->select_sum('ekp_bt_potrika');
            $this->db->select_sum('ekp_bt_grahok');
            $this->db->select_sum('ekp_briddhi_potrika');
            $this->db->select_sum('ekp_briddhi_grahok');
            $this->db->select_sum('ekp_ghatti_potrika');
            $this->db->select_sum('ekp_ghatti_grahok');

            $this->db->select_sum('ekp_bmn');
            $this->db->select_sum('ekp_bbkry');
            $this->db->select_sum('ekp_bbitrn');

            $this->db->select_sum('cs_pn_before');
            $this->db->select_sum('cs_pn_present');
            $this->db->select_sum('cs_gn_before');
            $this->db->select_sum('cs_gn_present');
            $this->db->select_sum('cs_bt_potrika');
            $this->db->select_sum('cs_bt_grahok');
            $this->db->select_sum('cs_briddhi_potrika');
            $this->db->select_sum('cs_briddhi_grahok');
            $this->db->select_sum('cs_ghatti_potrika');
            $this->db->select_sum('cs_ghatti_grahok');

            $this->db->select_sum('cs_bmn');
            $this->db->select_sum('cs_bbkry');
            $this->db->select_sum('cs_bbitrn');

            $this->db->select_sum('bep_pn_before');
            $this->db->select_sum('bep_pn_after');
            $this->db->select_sum('bep_gn_before');
            $this->db->select_sum('bep_gn_present');
            $this->db->select_sum('bep_bt_potrika');
            $this->db->select_sum('bep_bt_grahok');
            $this->db->select_sum('bep_briddhi_potrika');
            $this->db->select_sum('bep_briddhi_grahok');
            $this->db->select_sum('bep_ghatti_potrika');
            $this->db->select_sum('bep_ghatti_grahok');

            $this->db->select_sum('bep_bmn');
            $this->db->select_sum('bep_bbkry');
            $this->db->select_sum('bep_bbitrn');

            $this->db->select_sum('skpp_pn_before');
            $this->db->select_sum('skpp_pn_present');
            $this->db->select_sum('skpp_gn_before');
            $this->db->select_sum('skpp_gn_present');
            $this->db->select_sum('skpp_bt_potrika');
            $this->db->select_sum('skpp_bt_grahok');
            $this->db->select_sum('skpp_briddhi_potrika');
            $this->db->select_sum('skpp_briddhi_grahok');
            $this->db->select_sum('skpp_ghatti_potrika');
            $this->db->select_sum('skpp_ghatti_grahok');

            $this->db->select_sum('skpp_bmn');
            $this->db->select_sum('skpp_bbkry');
            $this->db->select_sum('skpp_bbitrn');

            $this->db->select_sum('sp_pn_before');
            $this->db->select_sum('sp_pn_present');
            $this->db->select_sum('sp_gn_before');
            $this->db->select_sum('sp_gn_present');
            $this->db->select_sum('sp_bt_potrika');
            $this->db->select_sum('sp_bt_grahok');
            $this->db->select_sum('sp_briddhi_potrika');
            $this->db->select_sum('sp_briddhi_grahok');
            $this->db->select_sum('sp_ghatti_potrika');
            $this->db->select_sum('sp_ghatti_grahok');

            $this->db->select_sum('sp_bmn');
            $this->db->select_sum('sp_bbkry');
            $this->db->select_sum('sp_bbitrn');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);

                
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['potrikar_grahok_briddhi'] = $this->db->get('literature_potrikar_grahok_briddhi')->first_row('array');


            //    $this->sma->print_arrays( $this->db->last_query());


            $this->db->select('*');
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);

            $this->db->order_by('branch_id');
            $this->data['shakhar_literature_publish'] = $this->db->get('literature_shakhar_literature_publish');




            $this->db->select_sum('ssdu_sonkha');
            $this->db->select_sum('ssdu_ta');
            $this->db->select_sum('ssdu_aa');
            $this->db->select_sum('ssdu_date');
            $this->db->select_sum('ls_sonkha');
            $this->db->select_sum('ls_ta');
            $this->db->select_sum('ls_aa');
            $this->db->select_sum('ls_date');
            $this->db->select_sum('gs_sonkha');
            $this->db->select_sum('gs_ta');
            $this->db->select_sum('gs_aa');
            $this->db->select_sum('gs_date');
            $this->db->select_sum('im_sonkha');
            $this->db->select_sum('im_ta');
            $this->db->select_sum('im_aa');
            $this->db->select_sum('im_date');
            $this->db->select_sum('sp_sonkha');
            $this->db->select_sum('sp_ta');
            $this->db->select_sum('sp_aa');
            $this->db->select_sum('nlp_sonkha');
            $this->db->select_sum('nlp_ta');
            $this->db->select_sum('sp_date');

            $this->db->where('date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);

            $this->data['sahitto_somporkito_dawati_program'] = $this->db->get('literature_sahitto_somporkito_dawati_program')->first_row('array');
        } else {

            $this->db->from('literature_potrikar_grahok_briddhi');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get();
            $this->data['potrikar_grahok_briddhi'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['shakhar_literature_publish'] = $this->db->get('literature_shakhar_literature_publish');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('literature_sahitto_somporkito_dawati_program');
            $this->data['sahitto_somporkito_dawati_program'] = $query->first_row('array');
        }
        $this->data['m'] = 'literature';
       
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => 'Literature', 'bc' => $bc);

        // $this->sma->print_arrays($this->data);

      
       
        if ($branch_id ){
            $this->page_construct('departmentsreport/literature/literature_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        }else{
            $this->page_construct('departmentsreport/literature/literature_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }


    }

    function literature_page_two($branch_id = NULL)
    {




        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/literature-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/literature-page-two/' . $this->session->userdata('branch_id'));
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
            $this->data['literature_songothon_one'] = $this->db->get('literature_songothon_one');


            $this->db->select_sum('s_s_sonkha');
            $this->db->select_sum('s_s_name');
            $this->db->select_sum('s_m_sonkha');
            $this->db->select_sum('t_s_sonkha');
            $this->db->select_sum('t_s_name');
            $this->db->select_sum('t_m_sonkha');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['literature_songothon_two'] = $this->db->get('literature_songothon_two')->first_row('array');

            $this->db->select_sum('kj_tg_sonkha');
            $this->db->select_sum('kj_p_sonkha');
            $this->db->select_sum('kj_t_upostit');

            $this->db->select_sum('saso_tg_sonkha');
            $this->db->select_sum('saso_p_sonkha');
            $this->db->select_sum('saso_t_upostit');

            $this->db->select_sum('guso_tg_sonkha');
            $this->db->select_sum('guso_p_sonkha');
            $this->db->select_sum('guso_t_upostit');

            $this->db->select_sum('ifpur_tg_sonkha');
            $this->db->select_sum('ifpur_p_sonkha');
            $this->db->select_sum('ifpur_t_upostit');

            $this->db->select_sum('sapro_tg_sonkha');
            $this->db->select_sum('sapro_p_sonkha');
            $this->db->select_sum('sapro_t_upostit');

            $this->db->select_sum('noso_tg_sonkha');
            $this->db->select_sum('noso_p_sonkha');
            $this->db->select_sum('noso_t_upostit');

            $this->db->select_sum('saud_tg_sonkha');
            $this->db->select_sum('saud_p_sonkha');
            $this->db->select_sum('saud_t_upostit');

            $this->db->select_sum('leso_tg_sonkha');
            $this->db->select_sum('leso_p_sonkha');
            $this->db->select_sum('leso_t_upostit');

            $this->db->select_sum('sd_tg_sonkha');
            $this->db->select_sum('sd_p_sonkha');
            $this->db->select_sum('sd_t_upostit');
            $this->db->select_sum('sk_tg_sonkha');
            $this->db->select_sum('sk_p_sonkha');
            $this->db->select_sum('sk_t_upostit');
            $this->db->select_sum('ssp_tg_sonkha');
            $this->db->select_sum('ssp_p_sonkha');
            $this->db->select_sum('ssp_t_upostit');
            $this->db->select_sum('su_tg_sonkha');
            $this->db->select_sum('su_p_sonkha');
            $this->db->select_sum('su_t_upostit');
            $this->db->select_sum('sp_tg_sonkha');
            $this->db->select_sum('sp_p_sonkha');
            $this->db->select_sum('sp_t_upostit');
            $this->db->select_sum('ck_tg_sonkha');
            $this->db->select_sum('ck_p_sonkha');
            $this->db->select_sum('ck_t_upostit');
            $this->db->select_sum('bs_tg_sonkha');
            $this->db->select_sum('bs_p_sonkha');
            $this->db->select_sum('bs_t_upostit');
            $this->db->select_sum('ts_tg_sonkha');
            $this->db->select_sum('ts_p_sonkha');
            $this->db->select_sum('ts_t_upostit');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['literature_program'] = $this->db->get('literature_program')->first_row('array');

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
            $this->data['literature_training_program'] = $this->db->get('literature_training_program')->first_row('array');

            $this->db->select_sum('kb_j_p');
            $this->db->select_sum('kb_j_n');
            $this->db->select_sum('kb_o_t');
            $this->db->select_sum('kb_o_a');
            $this->db->select_sum('gl_j_p');
            $this->db->select_sum('gl_j_n');
            $this->db->select_sum('gl_o_t');
            $this->db->select_sum('gl_o_a');
            $this->db->select_sum('ch_j_p');
            $this->db->select_sum('ch_j_n');
            $this->db->select_sum('ch_o_t');
            $this->db->select_sum('ch_o_a');
            $this->db->select_sum('pro_j_p');
            $this->db->select_sum('pro_j_n');
            $this->db->select_sum('pro_o_t');
            $this->db->select_sum('pro_o_a');
            $this->db->select_sum('op_j_p');
            $this->db->select_sum('op_j_n');
            $this->db->select_sum('op_o_t');
            $this->db->select_sum('op_o_a');
            $this->db->select_sum('sm_j_p');
            $this->db->select_sum('sm_j_n');
            $this->db->select_sum('sm_o_t');
            $this->db->select_sum('sm_o_a');
            $this->db->select_sum('pb_j_p');
            $this->db->select_sum('pb_j_n');
            $this->db->select_sum('pb_o_t');
            $this->db->select_sum('pb_o_a');
            $this->db->select_sum('bs_j_p');
            $this->db->select_sum('bs_j_n');
            $this->db->select_sum('bs_o_t');
            $this->db->select_sum('bs_o_a');
            $this->db->select_sum('cs_j_p');
            $this->db->select_sum('cs_j_n');
            $this->db->select_sum('cs_o_t');
            $this->db->select_sum('cs_o_a');
            $this->db->select_sum('ot_j_p');
            $this->db->select_sum('ot_j_n');
            $this->db->select_sum('ot_o_t');
            $this->db->select_sum('ot_o_a');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['literature_gogajok_output'] = $this->db->get('literature_gogajok_output')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);

            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['literature_songothon_one'] = $this->db->get('literature_songothon_one');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('literature_songothon_two');
            $this->data['literature_songothon_two'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('literature_program');
            $this->data['literature_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('literature_training_program');
            $this->data['literature_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('literature_gogajok_output');
            $this->data['literature_gogajok_output'] = $query->first_row('array');
        }
        $this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/literature/literature_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/literature/literature_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
    }



    function add_literature_publication($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-literature-publication/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-literature-publication/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('literature_publish')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');
            $data['literature_type'] = $this->input->post('literature_type');
            $data['literature_time'] = $this->input->post('literature_time');
            $data['literature_name'] = $this->input->post('literature_name');
           // $data['literature_term'] = $this->input->post('literature_term');
            $data['literature_amount'] = $this->input->post('literature_amount');
            $this->site->insertData('literature_shakhar_literature_publish', $data);
            header("Location: " . admin_url('departmentsreport/literature-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->post('literature_publish_update')) {
            $data['literature_type'] = $this->input->post('literature_type');
            $data['literature_time'] = $this->input->post('literature_time');
            $data['literature_name'] = $this->input->post('literature_name');
           // $data['literature_term'] = $this->input->post('literature_term');
            $data['literature_amount'] = $this->input->post('literature_amount');
            $this->site->updateData('literature_shakhar_literature_publish', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/literature-page-one/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['shakhar_literature_publish'] = $this->db->get('literature_shakhar_literature_publish')->first_row('array');
        }

        $this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/literature/add_literature_publication', $meta, $this->data, 'leftmenu/departmentsreport');
    }
    function add_literature_songothon($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));

            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
            admin_redirect('departmentsreport/add-literature-songothon/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-literature-songothon/' . $this->session->userdata('branch_id'));
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

        if ($this->input->post('literature_songothon')) {
            $data['report_type'] = $report_type['type'];
            $data['report_year'] = date("Y");
            $data['date'] = date("Y-m-d");
            $data['branch_id'] = $branch_id;
            $data['user_id'] = $this->session->userdata('user_id');
            $data['s_name'] = $this->input->post('s_name');
            $data['s_m_p'] = $this->input->post('s_m_p');
            $data['s_m_b'] = $this->input->post('s_m_b');
            $data['s_a_p'] = $this->input->post('s_a_p');
            $data['s_a_b'] = $this->input->post('s_a_b');
            $data['s_w_p'] = $this->input->post('s_w_p');
            $data['s_w_b'] = $this->input->post('s_w_b');
            $data['s_s_p'] = $this->input->post('s_s_p');
            $data['s_s_b'] = $this->input->post('s_s_b');
            $data['s_f_p'] = $this->input->post('s_f_p');
            $data['s_f_b'] = $this->input->post('s_f_b');

            $data['s_m'] = $this->input->post('s_m');
            $data['s_a'] = $this->input->post('s_a');
            $data['s_w'] = $this->input->post('s_w');
            $data['s_s'] = $this->input->post('s_s');
            $data['s_f'] = $this->input->post('s_f');

            $this->site->insertData('literature_songothon_one', $data);
            header("Location: " . admin_url('departmentsreport/literature-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->post('literature_songothon_update')) {
            $data['s_name'] = $this->input->post('s_name');
            $data['s_m_p'] = $this->input->post('s_m_p');
            $data['s_m_b'] = $this->input->post('s_m_b');
            $data['s_a_p'] = $this->input->post('s_a_p');
            $data['s_a_b'] = $this->input->post('s_a_b');
            $data['s_w_p'] = $this->input->post('s_w_p');
            $data['s_w_b'] = $this->input->post('s_w_b');
            $data['s_s_p'] = $this->input->post('s_s_p');
            $data['s_s_b'] = $this->input->post('s_s_b');
            $data['s_f_p'] = $this->input->post('s_f_p');
            $data['s_f_b'] = $this->input->post('s_f_b');

            $data['s_m'] = $this->input->post('s_m');
            $data['s_a'] = $this->input->post('s_a');
            $data['s_w'] = $this->input->post('s_w');
            $data['s_s'] = $this->input->post('s_s');
            $data['s_f'] = $this->input->post('s_f');


            $this->site->updateData('literature_songothon_one', $data, array('id' => $this->input->get('id')));
            header("Location: " . admin_url('departmentsreport/literature-page-two/' . $this->data['branch_id']));
        }
        if ($this->input->get('type') == 'edit') {
            $this->db->select('*');
            $this->db->where('id', $this->input->get('id'));
            $this->data['literature_songothon_one'] = $this->db->get('literature_songothon_one')->first_row('array');
        }

        $this->data['m'] = 'literature';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/literature/add_literature_songothon', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function delete_row()
    {

        // $this->sma->print_arrays($this->input->get());

        $this->db->where("id", $this->input->get('id'));
        $this->db->delete($this->input->get('table'));
        return true;
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

    function detailupdate2($branch_id = NULL)
    {
        //  $this->sma->checkPermissions('index', TRUE);
        $report_type = $this->report_type();
        //$this->site->check_confirm(6, date('Y-m-d'));

        $is_changeable = $this->site->check_confirm($branch_id, date('Y-m-d'));

        $flag = 1;
        $msg = 'done';
        if ($is_changeable && (int)$this->input->get('value') < 2) {

            if ($this->input->get('pk') && $this->input->get('pk') > 0) {
                $data = explode("@", $this->input->get('name'));
                $this->site->updateData($data[1], array($data[0] => $this->input->get('value')), array('id' => $this->input->get('pk')));
                $flag = 2;  //update
            } elseif ($branch_id) {
                $data = explode("@", $this->input->get('name'));
                $this->site->insertData($data[1], array('user_id' => $this->session->userdata('user_id'), 'report_year' => date('Y'), 'branch_id' => $branch_id, 'report_type' => $report_type['type'], $data[0] => $this->input->get('value'),   'date' => date('Y-m-d')));
                $flag = 3;  //new entry


            }
        } else
            $msg = 'failed';


        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	


        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
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
                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'report_year' => date('Y'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'),   'date' => date('Y-m-d')));
                $flag = 3;  //new entry

            }
        } else
            $msg = 'failed';


        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	


        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }
}
