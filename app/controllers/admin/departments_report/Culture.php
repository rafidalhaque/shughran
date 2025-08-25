<?php defined('BASEPATH') or exit('No direct script access allowed');

class Culture extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 16) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 16) { //culture
            $this->departmentuser = true;
        }
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 16
        $this->data['department_id'] = 16;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  16)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>16), 'id desc', 1, 0);

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

    public function culture_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/culture-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/culture-page-one/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('nokib_prev');
            $this->db->select_sum('nokib_pres');
            $this->db->select_sum('nokib_bri');
            $this->db->select_sum('nokib_bri_man');
            $this->db->select_sum('nokib_bri_ago');
            $this->db->select_sum('nokib_gha');
            $this->db->select_sum('nokib_gha_man');
            $this->db->select_sum('nokib_gha_sthan');
            $this->db->select_sum('nokib_gha_chattrotto');
            $this->db->select_sum('nokib_gha_batil');

            $this->db->select_sum('nokib_prarthi_prev');
            $this->db->select_sum('nokib_prarthi_pres');
            $this->db->select_sum('nokib_prarthi_bri');
            $this->db->select_sum('nokib_prarthi_bri_man');
            $this->db->select_sum('nokib_prarthi_bri_ago');
            $this->db->select_sum('nokib_prarthi_gha');
            $this->db->select_sum('nokib_prarthi_gha_man');
            $this->db->select_sum('nokib_prarthi_gha_sthan');
            $this->db->select_sum('nokib_prarthi_gha_chattrotto');
            $this->db->select_sum('nokib_prarthi_gha_batil');

            $this->db->select_sum('ogroj_prev');
            $this->db->select_sum('ogroj_pres');
            $this->db->select_sum('ogroj_bri');
            $this->db->select_sum('ogroj_bri_man');
            $this->db->select_sum('ogroj_bri_ago');
            $this->db->select_sum('ogroj_gha');
            $this->db->select_sum('ogroj_gha_man');
            $this->db->select_sum('ogroj_gha_sthan');
            $this->db->select_sum('ogroj_gha_chattrotto');
            $this->db->select_sum('ogroj_gha_batil');

            $this->db->select_sum('ogroj_prarthi_prev');
            $this->db->select_sum('ogroj_prarthi_pres');
            $this->db->select_sum('ogroj_prarthi_bri');
            $this->db->select_sum('ogroj_prarthi_bri_man');
            $this->db->select_sum('ogroj_prarthi_bri_ago');
            $this->db->select_sum('ogroj_prarthi_gha');
            $this->db->select_sum('ogroj_prarthi_gha_man');
            $this->db->select_sum('ogroj_prarthi_gha_sthan');
            $this->db->select_sum('ogroj_prarthi_gha_chattrotto');
            $this->db->select_sum('ogroj_prarthi_gha_batil');

            $this->db->select_sum('unmesh_prev');
            $this->db->select_sum('unmesh_pres');
            $this->db->select_sum('unmesh_bri');
            $this->db->select_sum('unmesh_bri_man');
            $this->db->select_sum('unmesh_bri_ago');
            $this->db->select_sum('unmesh_gha');
            $this->db->select_sum('unmesh_gha_man');
            $this->db->select_sum('unmesh_gha_sthan');
            $this->db->select_sum('unmesh_gha_chattrotto');
            $this->db->select_sum('unmesh_gha_batil');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_manpower'] = $this->db->get('culture_manpower')->first_row('array');

            $this->db->select_sum('porosh_prev');
            $this->db->select_sum('porosh_pres');
            $this->db->select_sum('porosh_bri');
            $this->db->select_sum('porosh_ghat');

            $this->db->select_sum('shongit_prev');
            $this->db->select_sum('shongit_pres');
            $this->db->select_sum('shongit_bri');
            $this->db->select_sum('shongit_ghat');

            $this->db->select_sum('ovinoy_prev');
            $this->db->select_sum('ovinoy_pres');
            $this->db->select_sum('ovinoy_bri');
            $this->db->select_sum('ovinoy_ghat');

            $this->db->select_sum('abritti_prev');
            $this->db->select_sum('abritti_pres');
            $this->db->select_sum('abritti_bri');
            $this->db->select_sum('abritti_ghat');

            $this->db->select_sum('uposthapok_prev');
            $this->db->select_sum('uposthapok_pres');
            $this->db->select_sum('uposthapok_bri');
            $this->db->select_sum('uposthapok_ghat');

            $this->db->select_sum('chitro_shilpi_prev');
            $this->db->select_sum('chitro_shilpi_pres');
            $this->db->select_sum('chitro_shilpi_bri');
            $this->db->select_sum('chitro_shilpi_ghat');

            $this->db->select_sum('calligrapher_prev');
            $this->db->select_sum('calligrapher_pres');
            $this->db->select_sum('calligrapher_bri');
            $this->db->select_sum('calligrapher_ghat');

            $this->db->select_sum('hosto_shilpi_prev');
            $this->db->select_sum('hosto_shilpi_pres');
            $this->db->select_sum('hosto_shilpi_bri');
            $this->db->select_sum('hosto_shilpi_ghat');

            $this->db->select_sum('fashion_designer_prev');
            $this->db->select_sum('fashion_designer_pres');
            $this->db->select_sum('fashion_designer_bri');
            $this->db->select_sum('fashion_designer_ghat');

            $this->db->select_sum('sthapotto_shilpo_prev');
            $this->db->select_sum('sthapotto_shilpo_pres');
            $this->db->select_sum('sthapotto_shilpo_bri');
            $this->db->select_sum('sthapotto_shilpo_ghat');

            $this->db->select_sum('shuva_kangkhi_prev');
            $this->db->select_sum('shuva_kangkhi_pres');
            $this->db->select_sum('shuva_kangkhi_bri');
            $this->db->select_sum('shuva_kangkhi_ghat');

            $this->db->select_sum('opodeshta_prev');
            $this->db->select_sum('opodeshta_pres');
            $this->db->select_sum('opodeshta_bri');
            $this->db->select_sum('opodeshta_ghat');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_dawat'] = $this->db->get('culture_dawat')->first_row('array');

            $this->db->select_sum('nokib_boithok_num');
            $this->db->select_sum('nokib_boithok_pre');

            $this->db->select_sum('porichalona_porishod_num');
            $this->db->select_sum('porichalona_porishod_pre');

            $this->db->select_sum('agroj_boithok_num');
            $this->db->select_sum('agroj_boithok_pre');

            $this->db->select_sum('unmesh_boithok_num');
            $this->db->select_sum('unmesh_boithok_pre');

            $this->db->select_sum('porosh_boithok_num');
            $this->db->select_sum('porosh_boithok_pre');

            $this->db->select_sum('porjalochona_shova_num');
            $this->db->select_sum('porjalochona_shova_pre');

            $this->db->select_sum('committee_gothon_num');
            $this->db->select_sum('committee_gothon_pre');

            $this->db->select_sum('ogroj_shomabesh_num');
            $this->db->select_sum('ogroj_shomabesh_pre');

            $this->db->select_sum('upodeshta_boithok_num');
            $this->db->select_sum('upodeshta_boithok_pre');

            $this->db->select_sum('shilpi_shomabesh_num');
            $this->db->select_sum('shilpi_shomabesh_pre');

            $this->db->select_sum('shongbordhona_num');
            $this->db->select_sum('shongbordhona_pre');

            $this->db->select_sum('sahitto_ashor_num');
            $this->db->select_sum('sahitto_ashor_pre');

            $this->db->select_sum('iftar_mahfil_num');
            $this->db->select_sum('iftar_mahfil_pre');

            $this->db->select_sum('dibosh_palon_num');
            $this->db->select_sum('dibosh_palon_pre');

            $this->db->select_sum('rally_num');
            $this->db->select_sum('rally_pre');

            $this->db->select_sum('cha_chokro_num');
            $this->db->select_sum('cha_chokro_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_shova'] = $this->db->get('culture_shova')->first_row('array');

            $this->db->select_sum('shilpi_prev');
            $this->db->select_sum('shilpi_pres');
            $this->db->select_sum('shilpi_bri');
            $this->db->select_sum('shilpi_gha');
            $this->db->select_sum('shilpi_jonoshokti');
            $this->db->select_sum('shilpi_thana_maner');
            $this->db->select_sum('shilpi_ward_maner');
            $this->db->select_sum('shilpi_uposhakha_maner');
            $this->db->select_sum('bivag_prev');
            $this->db->select_sum('bivag_pres');
            $this->db->select_sum('bivag_bri');
            $this->db->select_sum('bivag_gha');
            $this->db->select_sum('bivag_jonoshokti');
            $this->db->select_sum('bivag_thana_maner');
            $this->db->select_sum('bivag_ward_maner');
            $this->db->select_sum('bivag_uposhakha_maner');
            $this->db->select_sum('thanar_odhin_shilpi_prev');
            $this->db->select_sum('thanar_odhin_shilpi_pres');
            $this->db->select_sum('thanar_odhin_shilpi_bri');
            $this->db->select_sum('thanar_odhin_shilpi_gha');
            $this->db->select_sum('thanar_odhin_shilpi_jonoshokti');
            $this->db->select_sum('thanar_odhin_shilpi_thana_maner');
            $this->db->select_sum('thanar_odhin_shilpi_ward_maner');
            $this->db->select_sum('thanar_odhin_shilpi_uposhakha_maner');
            $this->db->select_sum('up_shongothon_prev');
            $this->db->select_sum('up_shongothon_pres');
            $this->db->select_sum('up_shongothon_bri');
            $this->db->select_sum('up_shongothon_gha');
            $this->db->select_sum('up_shongothon_jonoshokti');
            $this->db->select_sum('up_shongothon_thana_maner');
            $this->db->select_sum('up_shongothon_ward_maner');
            $this->db->select_sum('up_shongothon_uposhakha_maner');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_shongothon'] = $this->db->get('culture_shongothon')->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->order_by('branch_id');

            if ($branch_id){
                $this->data['culture_name'] = $this->db->get('culture_name')->first_row('array');
            } else {
                $this->data['culture_name'] = $this->db->get('culture_name');
            }
            

           


        } else {

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_name');
            $this->data['culture_name'] = $query->first_row('array');


            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_manpower');
            $this->data['culture_manpower'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_dawat');
            $this->data['culture_dawat'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_shova');
            $this->data['culture_shova'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_shongothon');
            $this->data['culture_shongothon'] = $query->first_row('array');
        }
        $this->data['m'] = 'culture';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/culture/culture_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/culture/culture_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function culture_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/culture-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/culture-page-two/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('gitikar_jon');
            $this->db->select_sum('gitikar_bar');

            $this->db->select_sum('shurokar_jon');
            $this->db->select_sum('shurokar_bar');

            $this->db->select_sum('nattokar_jon');
            $this->db->select_sum('nattokar_bar');

            $this->db->select_sum('nirdeshok_jon');
            $this->db->select_sum('nirdeshok_bar');

            $this->db->select_sum('shilpi_jon');
            $this->db->select_sum('shilpi_bar');

            $this->db->select_sum('ovineta_jon');
            $this->db->select_sum('ovineta_bar');

            $this->db->select_sum('kari_jon');
            $this->db->select_sum('kari_bar');

            $this->db->select_sum('abrittikar_jon');
            $this->db->select_sum('abrittikar_bar');

            $this->db->select_sum('uposthapok_jon');
            $this->db->select_sum('uposthapok_bar');

            $this->db->select_sum('kobi_jon');
            $this->db->select_sum('kobi_bar');

            $this->db->select_sum('lekhok_jon');
            $this->db->select_sum('lekhok_bar');

            $this->db->select_sum('shang_pri_jon');
            $this->db->select_sum('shang_pri_bar');

            $this->db->select_sum('shang_protishthan_jon');
            $this->db->select_sum('shang_protishthan_bar');

            $this->db->select_sum('shangbadik_jon');
            $this->db->select_sum('shangbadik_bar');

            $this->db->select_sum('electronic_media_jon');
            $this->db->select_sum('electronic_media_bar');

            $this->db->select_sum('ovivabok_jon');
            $this->db->select_sum('ovivabok_bar');

            $this->db->select_sum('upodeshta_jon');
            $this->db->select_sum('upodeshta_bar');

            $this->db->select_sum('onnanno_jon');
            $this->db->select_sum('onnanno_bar');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_contact'] = $this->db->get('culture_contact')->first_row('array');

            $this->db->select_sum('notun_gan_badha');
            $this->db->select_sum('notun_shurarop');
            $this->db->select_sum('natoker_pandulipi');
            $this->db->select_sum('chitronatto_pandulipi');
            $this->db->select_sum('natikar_pandulipi');
            $this->db->select_sum('koutuk_pandulipi');
            $this->db->select_sum('shortfilm_pandulipi');

            $this->db->select_sum('notun_gan_nirman');
            $this->db->select_sum('visual_natok');
            $this->db->select_sum('kobitar_pandulipi');
            $this->db->select_sum('video_album');
            $this->db->select_sum('audio_album');
            $this->db->select_sum('ganer_boi');
            $this->db->select_sum('natoker_boi');

            $this->db->select_sum('chora_kobitar_boi');
            $this->db->select_sum('shortflim_nirman');
            $this->db->select_sum('puthi_nirman');
            $this->db->select_sum('sahitto_potrika');
            $this->db->select_sum('calender');
            $this->db->select_sum('sharok');
            $this->db->select_sum('deyalika');

            $this->db->select_sum('magazine');
            $this->db->select_sum('prochar_potro');
            $this->db->select_sum('moncho_natok');
            $this->db->select_sum('calligraphy');
            $this->db->select_sum('chitrangkon');
            $this->db->select_sum('onnano');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_prokashona'] = $this->db->get('culture_prokashona')->first_row('array');

            $this->db->select_sum('shongit_class_num');
            $this->db->select_sum('shongit_class_pre');

            $this->db->select_sum('ovinoy_class_num');
            $this->db->select_sum('ovinoy_class_pre');

            $this->db->select_sum('abritti_presentation_class_num');
            $this->db->select_sum('abritti_presentation_class_pre');

            $this->db->select_sum('kirat_class_num');
            $this->db->select_sum('kirat_class_pre');

            $this->db->select_sum('rongtuli_class_num');
            $this->db->select_sum('rongtuli_class_pre');

            $this->db->select_sum('hostoshilpo_class_num');
            $this->db->select_sum('hostoshilpo_class_pre');

            $this->db->select_sum('calligraphy_class_num');
            $this->db->select_sum('calligraphy_class_pre');

            $this->db->select_sum('sthapotto_class_num');
            $this->db->select_sum('sthapotto_class_pre');

            $this->db->select_sum('fashion_class_num');
            $this->db->select_sum('fashion_class_pre');

            $this->db->select_sum('ogroj_quran_class_num');
            $this->db->select_sum('ogroj_quran_class_pre');

            $this->db->select_sum('ogroj_alochona_chokro_num');
            $this->db->select_sum('ogroj_alochona_chokro_pre');

            $this->db->select_sum('unmesh_alochona_chokro_num');
            $this->db->select_sum('unmesh_alochona_chokro_pre');

            $this->db->select_sum('shamoshtik_path_num');
            $this->db->select_sum('shamoshtik_path_pre');

            $this->db->select_sum('onushtha_prep_class_num');
            $this->db->select_sum('onushtha_prep_class_pre');

            $this->db->select_sum('shobbedari_num');
            $this->db->select_sum('shobbedari_pre');

            $this->db->select_sum('it_class_num');
            $this->db->select_sum('it_class_pre');

            $this->db->select_sum('other_num');
            $this->db->select_sum('other_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_regular_training'] = $this->db->get('culture_regular_training')->first_row('array');

            $this->db->select_sum('shongit_workshop_num');
            $this->db->select_sum('shongit_workshop_dur');
            $this->db->select_sum('shongit_workshop_pre');

            $this->db->select_sum('natto_workshop_num');
            $this->db->select_sum('natto_workshop_dur');
            $this->db->select_sum('natto_workshop_pre');

            $this->db->select_sum('abritti_workshop_num');
            $this->db->select_sum('abritti_workshop_dur');
            $this->db->select_sum('abritti_workshop_pre');

            $this->db->select_sum('kirat_workshop_num');
            $this->db->select_sum('kirat_workshop_dur');
            $this->db->select_sum('kirat_workshop_pre');

            $this->db->select_sum('ogroj_man_workshop_num');
            $this->db->select_sum('ogroj_man_workshop_dur');
            $this->db->select_sum('ogroj_man_workshop_pre');

            $this->db->select_sum('shishutosh_shong_workshop_num');
            $this->db->select_sum('shishutosh_shong_workshop_dur');
            $this->db->select_sum('shishutosh_shong_workshop_pre');

            $this->db->select_sum('shishutosh_natto_workshop_num');
            $this->db->select_sum('shishutosh_natto_workshop_dur');
            $this->db->select_sum('shishutosh_natto_workshop_pre');

            $this->db->select_sum('technical_workshop_num');
            $this->db->select_sum('technical_workshop_dur');
            $this->db->select_sum('technical_workshop_pre');

            $this->db->select_sum('cultural_workshop_num');
            $this->db->select_sum('cultural_workshop_dur');
            $this->db->select_sum('cultural_workshop_pre');

            $this->db->select_sum('unmesh_man_workshop_num');
            $this->db->select_sum('unmesh_man_workshop_dur');
            $this->db->select_sum('unmesh_man_workshop_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_workshop'] = $this->db->get('culture_workshop')->first_row('array');
        } else {
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_contact');
            $this->data['culture_contact'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_prokashona');
            $this->data['culture_prokashona'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_regular_training');
            $this->data['culture_regular_training'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_workshop');
            $this->data['culture_workshop'] = $query->first_row('array');
        }


        $this->data['m'] = 'culture';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/culture/culture_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/culture/culture_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function culture_page_three($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/culture-page-three/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/culture-page-three/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('cultural_onushthan_num');
            $this->db->select_sum('cultural_onushthan_pre');

            $this->db->select_sum('shongit_onushthan_num');
            $this->db->select_sum('shongit_onushthan_pre');

            $this->db->select_sum('abritti_onushthan_num');
            $this->db->select_sum('abritti_onushthan_pre');

            $this->db->select_sum('natok_monchayon_num');
            $this->db->select_sum('natok_monchayon_pre');

            $this->db->select_sum('tv_onushtahan_num');
            $this->db->select_sum('tv_onushtahan_pre');

            $this->db->select_sum('kobita_pather_ashor_num');
            $this->db->select_sum('kobita_pather_ashor_pre');

            $this->db->select_sum('puthi_pather_ashor_num');
            $this->db->select_sum('puthi_pather_ashor_pre');

            $this->db->select_sum('vrammoman_poribeshona_num');
            $this->db->select_sum('vrammoman_poribeshona_pre');

            $this->db->select_sum('sangsritik_add_num');
            $this->db->select_sum('sangsritik_add_pre');

            $this->db->select_sum('pothonatto_num');
            $this->db->select_sum('pothonatto_pre');

            $this->db->select_sum('mukavinoy_num');
            $this->db->select_sum('mukavinoy_pre');

            $this->db->select_sum('ekangkika_num');
            $this->db->select_sum('ekangkika_pre');

            $this->db->select_sum('prodorshoni_num');
            $this->db->select_sum('prodorshoni_pre');

            $this->db->select_sum('giti_alekkho_num');
            $this->db->select_sum('giti_alekkho_pre');

            $this->db->select_sum('shangsritik_utshob_num');
            $this->db->select_sum('shangsritik_utshob_pre');

            $this->db->select_sum('natto_utshob_num');
            $this->db->select_sum('natto_utshob_pre');

            $this->db->select_sum('prokashona_utshob_num');
            $this->db->select_sum('prokashona_utshob_pre');

            $this->db->select_sum('shangsritik_protijogita_num');
            $this->db->select_sum('shangsritik_protijogita_pre');

            $this->db->select_sum('chitrangkon_protijogita_num');
            $this->db->select_sum('chitrangkon_protijogita_pre');

            $this->db->select_sum('unmukto_shang_onushthan_num');
            $this->db->select_sum('unmukto_shang_onushthan_pre');

            $this->db->select_sum('others_num');
            $this->db->select_sum('others_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_poribeshona'] = $this->db->get('culture_poribeshona')->first_row('array');

            $this->db->select_sum('fb_upload_gan');
            $this->db->select_sum('fb_upload_ovinoy');
            $this->db->select_sum('fb_upload_abritti');
            $this->db->select_sum('fb_upload_tilawat');
            $this->db->select_sum('fb_upload_short_film');
            $this->db->select_sum('fb_upload_news');

            $this->db->select_sum('tw_post_gan');
            $this->db->select_sum('tw_post_ovinoy');
            $this->db->select_sum('tw_post_abritti');
            $this->db->select_sum('tw_post_tilawat');
            $this->db->select_sum('tw_post_short_film');
            $this->db->select_sum('tw_post_news');

            $this->db->select_sum('yt_gan');
            $this->db->select_sum('yt_ovinoy');
            $this->db->select_sum('yt_abritti');
            $this->db->select_sum('yt_tilawat');
            $this->db->select_sum('yt_short_film');
            $this->db->select_sum('yt_news');

            $this->db->select_sum('web_gan');
            $this->db->select_sum('web_ovinoy');
            $this->db->select_sum('web_abritti');
            $this->db->select_sum('web_tilawat');
            $this->db->select_sum('web_short_film');
            $this->db->select_sum('web_news');

            $this->db->select_sum('other_gan');
            $this->db->select_sum('other_ovinoy');
            $this->db->select_sum('other_abritti');
            $this->db->select_sum('other_tilawat');
            $this->db->select_sum('other_short_film');
            $this->db->select_sum('other_news');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_it_prochar_media_upload'] = $this->db->get('culture_it_prochar_media_upload')->first_row('array');

            $this->db->select_sum('jatio_potrika');
            $this->db->select_sum('sthanio_potrika');
            $this->db->select_sum('online_potrika');
            $this->db->select_sum('online_blog');
            $this->db->select_sum('wikipedia');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_it_prochar_media_news_prokash'] = $this->db->get('culture_it_prochar_media_news_prokash')->first_row('array');


            $this->db->select_sum('shilpi_shongroho_num');
            $this->db->select_sum('shilpi_shongroho_attend');
            $this->db->select_sum('shilpi_shongroho_meyad');

            $this->db->select_sum('bishes_protijogita_num');
            $this->db->select_sum('bishes_protijogita_attend');
            $this->db->select_sum('bishes_protijogita_meyad');

            $this->db->select_sum('quiz_protijogita_num');
            $this->db->select_sum('quiz_protijogita_attend');
            $this->db->select_sum('quiz_protijogita_meyad');

            $this->db->select_sum('rochona_protijogita_num');
            $this->db->select_sum('rochona_protijogita_attend');
            $this->db->select_sum('rochona_protijogita_meyad');

            $this->db->select_sum('bikroy_bitoron_karjokrom_num');
            $this->db->select_sum('bikroy_bitoron_karjokrom_attend');
            $this->db->select_sum('bikroy_bitoron_karjokrom_meyad');

            $this->db->select_sum('brikkhoropon_kormoshuchi_num');
            $this->db->select_sum('brikkhoropon_kormoshuchi_attend');
            $this->db->select_sum('brikkhoropon_kormoshuchi_meyad');

            $this->db->select_sum('rokto_kormoshuchi_num');
            $this->db->select_sum('rokto_kormoshuchi_attend');
            $this->db->select_sum('rokto_kormoshuchi_meyad');

            $this->db->select_sum('shikkha_sofor_num');
            $this->db->select_sum('shikkha_sofor_attend');
            $this->db->select_sum('shikkha_sofor_meyad');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_bishes_karjokrom'] = $this->db->get('culture_bishes_karjokrom')->first_row('array');

            $this->db->select_sum('gitikar');
            $this->db->select_sum('shurokar');
            $this->db->select_sum('nattokar');
            $this->db->select_sum('nirdeshok');
            $this->db->select_sum('shongit_shilpi');
            $this->db->select_sum('ovineta');
            $this->db->select_sum('abrittikar');
            $this->db->select_sum('uposthapok');
            $this->db->select_sum('kari');
            $this->db->select_sum('kobi');
            $this->db->select_sum('lekhok');
            $this->db->select_sum('shangbadik');
            $this->db->select_sum('video_editor');
            $this->db->select_sum('sound_engineer');
            $this->db->select_sum('bokta');
            $this->db->select_sum('bitarkik');
            $this->db->select_sum('proshikkhok');
            $this->db->select_sum('photographer');
            $this->db->select_sum('camreaman');
            $this->db->select_sum('makeupman');
            $this->db->select_sum('graphics_designer');
            $this->db->select_sum('set_designer');
            $this->db->select_sum('cartoonist');
            $this->db->select_sum('charu_shilpi');
            $this->db->select_sum('calligraphr');
            $this->db->select_sum('hosto_shilp');
            $this->db->select_sum('fashion_designer');
            $this->db->select_sum('sthapotto_shilpi');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_output_report'] = $this->db->get('culture_output_report')->first_row('array');

            $this->db->select_sum('culture_worker_central_s');
            $this->db->select_sum('culture_worker_central_p');
            $this->db->select_sum('culture_worker_shakha_s');
            $this->db->select_sum('culture_worker_shakha_p');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['culture_summit'] = $this->db->get('culture_summit')->first_row('array');

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
            $this->data['culture_training_program'] = $this->db->get('culture_training_program')->first_row('array');
        } else {
            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_summit');
            $this->data['culture_summit'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_training_program');
            $this->data['culture_training_program'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_poribeshona');
            $this->data['culture_poribeshona'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_it_prochar_media_upload');
            $this->data['culture_it_prochar_media_upload'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_it_prochar_media_news_prokash');
            $this->data['culture_it_prochar_media_news_prokash'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_bishes_karjokrom');
            $this->data['culture_bishes_karjokrom'] = $query->first_row('array');

            $this->db->select('*');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('culture_output_report');
            $this->data['culture_output_report'] = $query->first_row('array');
        }


        $this->data['m'] = 'culture';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/culture/culture_page_three_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/culture/culture_page_three', $meta, $this->data, 'leftmenu/departmentsreport');
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
}
