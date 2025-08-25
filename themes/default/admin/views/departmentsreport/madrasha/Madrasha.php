<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Madrasha extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=19) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==19) {  //literature
			$this->departmentuser = true; 
		}
		
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

    function madrasha_page_one($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/madrasha-page-one/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/madrasha-page-one/'.$this->session->userdata('branch_id'));
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

        $this->data['total_madrasah_jonoshokti'] = $this->db->get('madrasah_jonoshokti')->first_row('array');

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

        $this->data['total_madrasah_shongothon'] = $this->db->get('madrasah_shongothon')->first_row('array');

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
        $this->db->select_sum('quit_num');
        $this->db->select_sum('quiz_pre');
        $this->db->select_sum('shadharon_num');
        $this->db->select_sum('shadharon_pre');
        $this->db->select_sum('bitorko_num');
        $this->db->select_sum('bitorko_pre');
        $this->db->select_sum('waz_num');
        $this->db->select_sum('waz_pre');
        $this->db->select_sum('khutba_num');
        $this->db->select_sum('khutba_pre');

        $this->data['total_madrasah_dawat_program_1'] = $this->db->get('madrasah_dawat_program_1')->first_row('array');



        $this->db->from('ak_nojore_songothon');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['ak_nojore_songothon'] = $query->first_row('array');


		$this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/madrasha/madrasha_page_one_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/madrasha/madrasha_page_one', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function madrasha_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-two/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/madrasha-page-two/'.$this->session->userdata('branch_id'));
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

        $this->data['total_program_somuho'] = $this->db->get('program_somuho')->first_row('array');

        $this->db->select_sum('tarbiyat_num');
        $this->db->select_sum('tarbiyat_pre');
        $this->db->select_sum('arbi_nam');
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

        $this->data['total_madrasah_proshikkhon_program'] = $this->db->get('madrasah_proshikkhon_program')->first_row('array');

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

        $this->data['total_madrasah_eknojore_shongothon_1'] = $this->db->get('madrasah_eknojore_shongothon_1')->first_row('array');



        $this->db->from('ak_nojore_songothon');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['ak_nojore_songothon'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/madrasha_page_two_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/madrasha_page_two', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function madrasha_page_three($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-three/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/madrasha-page-three/'.$this->session->userdata('branch_id'));
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
        
        $this->data['total_madrasah_output'] = $this->db->get('madrasah_output')->first_row('array');

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
        
        $this->data['total_madrasah_jdc_result'] = $this->db->get('madrasah_jdc_result')->first_row('array');

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
        
        $this->data['total_madrasah_dakhil_result'] = $this->db->get('madrasah_dakhil_result')->first_row('array');


        $this->db->from('ak_nojore_songothon');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['ak_nojore_songothon'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/madrasha_page_three_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/madrasha_page_three', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function madrasha_page_four($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-four/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/madrasha-page-four/'.$this->session->userdata('branch_id'));
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
        
        $this->data['total_madrasah_alim_result'] = $this->db->get('madrasah_alim_result')->first_row('array');

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

        $this->db->select_sum('mayaid_bor_k');
        $this->db->select_sum('mayaid_bor_h');
        $this->db->select_sum('mayaid_bri_k');
        $this->db->select_sum('mayaid_bri_h');
        $this->db->select_sum('mayaid_ter_k');
        $this->db->select_sum('mayaid_ter_h');
        $this->db->select_sum('mayaid_gha_k');
        $this->db->select_sum('mayaid_gha_h');
        
        $this->data['total_madrasah_kowmi_1'] = $this->db->get('madrasah_kowmi_1')->first_row('array');

        $this->db->select_sum('khas_n');
        $this->db->select_sum('khas_p');
        $this->db->select_sum('puroshkar_n');
        $this->db->select_sum('puroshkar_p');
        $this->db->select_sum('mojlis_am_n');
        $this->db->select_sum('mojlis_am_p');
        $this->db->select_sum('moballig_mojlish_n');
        $this->db->select_sum('moballig_mojlish_p');
        $this->db->select_sum('mumtaj_songbordona_n');
        $this->db->select_sum('mumtaj_songbordona_p');
        $this->db->select_sum('dayi_mozlish_n');
        $this->db->select_sum('dayi_mozlish_p');
        $this->db->select_sum('kirat_protijogita_n');
        $this->db->select_sum('kirat_protijogita_p');
        $this->db->select_sum('muin_mojlish_n');
        $this->db->select_sum('muin_mojlish_p');
        $this->db->select_sum('muin_kormosala_n');
        $this->db->select_sum('muin_kormosala_p');
        $this->db->select_sum('protinidi_somabesh_n');
        $this->db->select_sum('protinidi_somabesh_p');
        $this->db->select_sum('hipjul_quran_protijogita_n');
        $this->db->select_sum('hipjul_quran_protijogita_p');
        $this->db->select_sum('talimul_kuran_n');
        $this->db->select_sum('talimul_kuran_p');
        $this->db->select_sum('inftar_mahfil_n');
        $this->db->select_sum('inftar_mahfil_p');
        $this->db->select_sum('talimul_hadish_n');
        $this->db->select_sum('talimul_hadish_p');
        $this->db->select_sum('utaj_jogajog_n');
        $this->db->select_sum('utaj_jogajog_p');
        $this->db->select_sum('sahitto_path_n');
        $this->db->select_sum('sahitto_path_p');
        $this->db->select_sum('shikha_upokoron_bitoron_n');
        $this->db->select_sum('shikha_upokoron_bitoron_p');
        $this->db->select_sum('islami_mojlise_am_n');
        $this->db->select_sum('islami_mojlise_am_p');
        $this->db->select_sum('madrasa_sofor_n');
        $this->db->select_sum('madrasa_sofor_p');
        $this->db->select_sum('cha_cokro_n');
        $this->db->select_sum('cha_cokro_p');
        $this->db->select_sum('dayi_somabesh_n');
        $this->db->select_sum('dayi_somabesh_p');
        $this->db->select_sum('sikkha_sofor_n');
        $this->db->select_sum('sikkha_sofor_p');
        $this->db->select_sum('arbi_khutba_path_protinidi_n');
        $this->db->select_sum('arbi_khutba_path_protinidi_p');
        $this->db->select_sum('kuran_class_n');
        $this->db->select_sum('kuran_class_p');
        $this->db->select_sum('moto_binimoy_sova_n');
        $this->db->select_sum('moto_binimoy_sova_p');
        $this->db->select_sum('tarbiyot_mojlish_n');
        $this->db->select_sum('tarbiyot_mojlish_p');
        $this->db->select_sum('report_porjalocona_n');
        $this->db->select_sum('report_porjalocona_p');
        
        $this->data['total_ak_nojore_songothon'] = $this->db->get('ak_nojore_songothon')->first_row('array');

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
        
        $this->data['total_madrasah_eknojore_shongothon_2'] = $this->db->get('madrasah_eknojore_shongothon_2')->first_row('array');

        $this->db->select_sum('nurani_mot');
        $this->db->select_sum('nurani_shang');
        $this->db->select_sum('nurani_birodhi');

        $this->db->select_sum('kowmi_mot');
        $this->db->select_sum('kowmi_shang');
        $this->db->select_sum('kowmi_birodhi');

        $this->db->select_sum('khotib_mot');
        $this->db->select_sum('khotib_shang');
        $this->db->select_sum('khotib_birodhi');

        $this->db->select_sum('wazin_mot');
        $this->db->select_sum('wazin_shang');
        $this->db->select_sum('wazin_birodhi');

        $this->db->select_sum('mufti_mot');
        $this->db->select_sum('mufti_shang');
        $this->db->select_sum('mufti_birodhi');

        $this->db->select_sum('muhtamim_mot');
        $this->db->select_sum('muhtamim_shang');
        $this->db->select_sum('muhtamim_birodhi');

        $this->db->select_sum('pir_mot');
        $this->db->select_sum('pir_shang');
        $this->db->select_sum('pir_birodhi');

        $this->db->select_sum('muhaddis_mot');
        $this->db->select_sum('muhaddis_shang');
        $this->db->select_sum('muhaddis_birodhi');
        
        $this->data['total_madrasah_eknojore_shongothon_3'] = $this->db->get('madrasah_eknojore_shongothon_3')->first_row('array');

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
        
        $this->data['total_madrasah_kowmi_result'] = $this->db->get('madrasah_kowmi_result')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('program_somuho');
        $this->data['program_somuho'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/madrasha_page_four_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/madrasha_page_four', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function madrasha_page_five($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/madrasha-page-five/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/madrasha-page-five/'.$this->session->userdata('branch_id'));
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
        $this->db->select_sum('quit_num');
        $this->db->select_sum('quiz_pre');
        $this->db->select_sum('shadharon_num');
        $this->db->select_sum('shadharon_pre');
        $this->db->select_sum('bitorko_num');
        $this->db->select_sum('bitorko_pre');
        $this->db->select_sum('waz_num');
        $this->db->select_sum('waz_pre');
        $this->db->select_sum('khutba_num');
        $this->db->select_sum('khutba_pre');
        
        $this->data['total_madrasah_dawat_program_1'] = $this->db->get('madrasah_dawat_program_1')->first_row('array');

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
        $this->data['total_madrasah_dawat_program_2'] = $this->db->get('madrasah_dawat_program_2')->first_row('array');

        $this->db->select_sum('tarbiyat_num');
        $this->db->select_sum('tarbiyat_pre');
        $this->db->select_sum('arbi_nam');
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
        $this->data['total_madrasah_proshikkhon_program'] = $this->db->get('madrasah_proshikkhon_program')->first_row('array');

        $this->db->from('islamik_skolars_porisonkhan');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get();
        $this->data['islamik_skolars_porisonkhan'] = $query->first_row('array');
        $data['islamik_skolars_porisonkhan'] = $query->result_array();


		$this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/madrasha/madrasha_page_five_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
        $this->page_construct('departmentsreport/madrasha/madrasha_page_five', $meta, $this->data,'leftmenu/departmentsreport');
        
		
    }


    function madrasha_page_six($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/madrasha-page-six/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/madrasha-page-six/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('ka_sa');
        $this->db->select_sum('ka_br1');
        $this->db->select_sum('ka_thm');
        $this->db->select_sum('ka_br2');
        $this->db->select_sum('ka_wjm');
        $this->db->select_sum('ka_br3');
        $this->db->select_sum('ka_upm');
        $this->db->select_sum('ka_br4');
        $this->db->select_sum('ka_ssm');
        $this->db->select_sum('ka_br5');
        $this->db->select_sum('ka_sn');
        $this->db->select_sum('fa_sa');
        $this->db->select_sum('fa_br1');
        $this->db->select_sum('fa_thm');
        $this->db->select_sum('fa_br2');
        $this->db->select_sum('fa_wjm');
        $this->db->select_sum('fa_br3');
        $this->db->select_sum('fa_upm');
        $this->db->select_sum('fa_br4');
        $this->db->select_sum('fa_ssm');
        $this->db->select_sum('fa_br5');
        $this->db->select_sum('fa_sn');
        $this->db->select_sum('a_sa');
        $this->db->select_sum('a_br1');
        $this->db->select_sum('a_thm');
        $this->db->select_sum('a_br2');
        $this->db->select_sum('a_wjm');
        $this->db->select_sum('a_br3');
        $this->db->select_sum('a_upm');
        $this->db->select_sum('a_br4');
        $this->db->select_sum('a_ssm');
        $this->db->select_sum('a_br5');
        $this->db->select_sum('a_sn');
        $this->db->select_sum('d_sa');
        $this->db->select_sum('d_br1');
        $this->db->select_sum('d_thm');
        $this->db->select_sum('d_br2');
        $this->db->select_sum('d_wjm');
        $this->db->select_sum('d_br3');
        $this->db->select_sum('d_upm');
        $this->db->select_sum('d_br4');
        $this->db->select_sum('d_ssm');
        $this->db->select_sum('d_br5');
        $this->db->select_sum('d_sn');
        $this->db->select_sum('pvt_sa');
        $this->db->select_sum('pvt_br1');
        $this->db->select_sum('pvt_thm');
        $this->db->select_sum('pvt_br2');
        $this->db->select_sum('pvt_wjm');
        $this->db->select_sum('pvt_br3');
        $this->db->select_sum('pvt_upm');
        $this->db->select_sum('pvt_br4');
        $this->db->select_sum('pvt_ssm');
        $this->db->select_sum('pvt_br5');
        $this->db->select_sum('pvt_sn');
        $this->db->select_sum('ko_sa');
        $this->db->select_sum('ko_br1');
        $this->db->select_sum('ko_thm');
        $this->db->select_sum('ko_br2');
        $this->db->select_sum('ko_wjm');
        $this->db->select_sum('ko_br3');
        $this->db->select_sum('ko_upm');
        $this->db->select_sum('ko_br4');
        $this->db->select_sum('ko_ssm');
        $this->db->select_sum('ko_br5');
        $this->db->select_sum('ko_sn');
        $this->db->select_sum('ha_sa');
        $this->db->select_sum('ha_br1');
        $this->db->select_sum('ha_thm');
        $this->db->select_sum('ha_br2');
        $this->db->select_sum('ha_wjm');
        $this->db->select_sum('ha_br3');
        $this->db->select_sum('ha_upm');
        $this->db->select_sum('ha_br4');
        $this->db->select_sum('ha_ssm');
        $this->db->select_sum('ha_br5');
        $this->db->select_sum('ha_sn');
        $this->data['total_ak_nojore_madrasa_somuho'] = $this->db->get('ak_nojore_madrasa_somuho')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('ak_nojore_madrasa_somuho');
        $this->data['ak_nojore_madrasa_somuho'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/madrasha_page_six_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/madrasha_page_six', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function jdc_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/jdc-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/jdc-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('sathi_b_mp');
        $this->db->select_sum('sathi_b_gpa5');
        $this->db->select_sum('sathi_b_agred');
        $this->db->select_sum('sathi_b_a_gred');
        $this->db->select_sum('sathi_b_bgred');
        $this->db->select_sum('sathi_b_cgred');
        $this->db->select_sum('sathi_b_dgred');
        $this->db->select_sum('sathi_m_mp');
        $this->db->select_sum('sathi_m_gpa5');
        $this->db->select_sum('sathi_m_agred');
        $this->db->select_sum('sathi_m_a_gred');
        $this->db->select_sum('sathi_m_bgred');
        $this->db->select_sum('sathi_m_cgred');
        $this->db->select_sum('sathi_m_dgred');
        $this->db->select_sum('kormi_b_mp');
        $this->db->select_sum('kormi_b_gpa5');
        $this->db->select_sum('kormi_b_agred');
        $this->db->select_sum('kormi_b_a_gred');
        $this->db->select_sum('kormi_b_bgred');
        $this->db->select_sum('kormi_b_cgred');
        $this->db->select_sum('kormi_b_dgred');
        $this->db->select_sum('kormi_m_mp');
        $this->db->select_sum('kormi_m_gpa5');
        $this->db->select_sum('kormi_m_agred');
        $this->db->select_sum('kormi_m_a_gred');
        $this->db->select_sum('kormi_m_bgred');
        $this->db->select_sum('kormi_m_cgred');
        $this->db->select_sum('kormi_m_dgred');
        $this->db->select_sum('somorthok_b_mp');
        $this->db->select_sum('somorthok_b_gpa5');
        $this->db->select_sum('somorthok_b_agred');
        $this->db->select_sum('somorthok_b_a_gred');
        $this->db->select_sum('somorthok_b_bgred');
        $this->db->select_sum('somorthok_b_cgred');
        $this->db->select_sum('somorthok_b_dgred');
        $this->db->select_sum('somorthok_m_mp');
        $this->db->select_sum('somorthok_m_gpa5');
        $this->db->select_sum('somorthok_m_agred');
        $this->db->select_sum('somorthok_m_a_gred');
        $this->db->select_sum('somorthok_m_bgred');
        $this->db->select_sum('somorthok_m_cgred');
        $this->db->select_sum('somorthok_m_dgred');
        $this->data['total_jdc_folafol_porisonkhan'] = $this->db->get('jdc_folafol_porisonkhan')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('jdc_folafol_porisonkhan');
        $this->data['jdc_folafol_porisonkhan'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/jdc_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/jdc_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }
    function dakhil_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/dakhil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/dakhil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('sodosso_b_mp');
        $this->db->select_sum('sodosso_b_gpa5');
        $this->db->select_sum('sodosso_b_agred');
        $this->db->select_sum('sodosso_b_a_gred');
        $this->db->select_sum('sodosso_b_bgred');
        $this->db->select_sum('sodosso_b_cgred');
        $this->db->select_sum('sodosso_b_dgred');
        $this->db->select_sum('sodosso_m_mp');
        $this->db->select_sum('sodosso_m_gpa5');
        $this->db->select_sum('sodosso_m_agred');
        $this->db->select_sum('sodosso_m_a_gred');
        $this->db->select_sum('sodosso_m_bgred');
        $this->db->select_sum('sodosso_m_cgred');
        $this->db->select_sum('sodosso_m_dgred');
        $this->db->select_sum('sathi_b_mp');
        $this->db->select_sum('sathi_b_gpa5');
        $this->db->select_sum('sathi_b_agred');
        $this->db->select_sum('sathi_b_a_gred');
        $this->db->select_sum('sathi_b_bgred');
        $this->db->select_sum('sathi_b_cgred');
        $this->db->select_sum('sathi_b_dgred');
        $this->db->select_sum('sathi_m_mp');
        $this->db->select_sum('sathi_m_gpa5');
        $this->db->select_sum('sathi_m_agred');
        $this->db->select_sum('sathi_m_a_gred');
        $this->db->select_sum('sathi_m_bgred');
        $this->db->select_sum('sathi_m_cgred');
        $this->db->select_sum('sathi_m_dgred');
        $this->db->select_sum('kormi_b_mp');
        $this->db->select_sum('kormi_b_gpa5');
        $this->db->select_sum('kormi_b_agred');
        $this->db->select_sum('kormi_b_a_gred');
        $this->db->select_sum('kormi_b_bgred');
        $this->db->select_sum('kormi_b_cgred');
        $this->db->select_sum('kormi_b_dgred');
        $this->db->select_sum('kormi_m_mp');
        $this->db->select_sum('kormi_m_gpa5');
        $this->db->select_sum('kormi_m_agred');
        $this->db->select_sum('kormi_m_a_gred');
        $this->db->select_sum('kormi_m_bgred');
        $this->db->select_sum('kormi_m_cgred');
        $this->db->select_sum('kormi_m_dgred');
        $this->db->select_sum('somorthok_b_mp');
        $this->db->select_sum('somorthok_b_gpa5');
        $this->db->select_sum('somorthok_b_agred');
        $this->db->select_sum('somorthok_b_a_gred');
        $this->db->select_sum('somorthok_b_bgred');
        $this->db->select_sum('somorthok_b_cgred');
        $this->db->select_sum('somorthok_b_dgred');
        $this->db->select_sum('somorthok_m_mp');
        $this->db->select_sum('somorthok_m_gpa5');
        $this->db->select_sum('somorthok_m_agred');
        $this->db->select_sum('somorthok_m_a_gred');
        $this->db->select_sum('somorthok_m_bgred');
        $this->db->select_sum('somorthok_m_cgred');
        $this->db->select_sum('somorthok_m_dgred');
        $this->data['total_dakhil_folafol_porisonkhan'] = $this->db->get('dakhil_folafol_porisonkhan')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('dakhil_folafol_porisonkhan');
        $this->data['dakhil_folafol_porisonkhan'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/dakhil_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/dakhil_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function alim_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/alim-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/alim-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('sodosso_b_mp');
        $this->db->select_sum('sodosso_b_gpa5');
        $this->db->select_sum('sodosso_b_agred');
        $this->db->select_sum('sodosso_b_a_gred');
        $this->db->select_sum('sodosso_b_bgred');
        $this->db->select_sum('sodosso_b_cgred');
        $this->db->select_sum('sodosso_b_dgred');
        $this->db->select_sum('sodosso_m_mp');
        $this->db->select_sum('sodosso_m_gpa5');
        $this->db->select_sum('sodosso_m_agred');
        $this->db->select_sum('sodosso_m_a_gred');
        $this->db->select_sum('sodosso_m_bgred');
        $this->db->select_sum('sodosso_m_cgred');
        $this->db->select_sum('sodosso_m_dgred');
        $this->db->select_sum('sathi_b_mp');
        $this->db->select_sum('sathi_b_gpa5');
        $this->db->select_sum('sathi_b_agred');
        $this->db->select_sum('sathi_b_a_gred');
        $this->db->select_sum('sathi_b_bgred');
        $this->db->select_sum('sathi_b_cgred');
        $this->db->select_sum('sathi_b_dgred');
        $this->db->select_sum('sathi_m_mp');
        $this->db->select_sum('sathi_m_gpa5');
        $this->db->select_sum('sathi_m_agred');
        $this->db->select_sum('sathi_m_a_gred');
        $this->db->select_sum('sathi_m_bgred');
        $this->db->select_sum('sathi_m_cgred');
        $this->db->select_sum('sathi_m_dgred');
        $this->db->select_sum('kormi_b_mp');
        $this->db->select_sum('kormi_b_gpa5');
        $this->db->select_sum('kormi_b_agred');
        $this->db->select_sum('kormi_b_a_gred');
        $this->db->select_sum('kormi_b_bgred');
        $this->db->select_sum('kormi_b_cgred');
        $this->db->select_sum('kormi_b_dgred');
        $this->db->select_sum('kormi_m_mp');
        $this->db->select_sum('kormi_m_gpa5');
        $this->db->select_sum('kormi_m_agred');
        $this->db->select_sum('kormi_m_a_gred');
        $this->db->select_sum('kormi_m_bgred');
        $this->db->select_sum('kormi_m_cgred');
        $this->db->select_sum('kormi_m_dgred');
        $this->db->select_sum('somorthok_b_mp');
        $this->db->select_sum('somorthok_b_gpa5');
        $this->db->select_sum('somorthok_b_agred');
        $this->db->select_sum('somorthok_b_a_gred');
        $this->db->select_sum('somorthok_b_bgred');
        $this->db->select_sum('somorthok_b_cgred');
        $this->db->select_sum('somorthok_b_dgred');
        $this->db->select_sum('somorthok_m_mp');
        $this->db->select_sum('somorthok_m_gpa5');
        $this->db->select_sum('somorthok_m_agred');
        $this->db->select_sum('somorthok_m_a_gred');
        $this->db->select_sum('somorthok_m_bgred');
        $this->db->select_sum('somorthok_m_cgred');
        $this->db->select_sum('somorthok_m_dgred');
        $this->data['total_alim_folafol_porisonkhan'] = $this->db->get('alim_folafol_porisonkhan')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('alim_folafol_porisonkhan');
        $this->data['alim_folafol_porisonkhan'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/alim_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/alim_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function fajil_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/fajil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/fajil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('sodosso_mp');
        $this->db->select_sum('sodosso_gpa5');
        $this->db->select_sum('sodosso_agred');
        $this->db->select_sum('sodosso_a_gred');
        $this->db->select_sum('sodosso_bgred');
        $this->db->select_sum('sodosso_cgred');
        $this->db->select_sum('sodosso_dgred');
        $this->db->select_sum('sathi_mp');
        $this->db->select_sum('sathi_gpa5');
        $this->db->select_sum('sathi_agred');
        $this->db->select_sum('sathi_a_gred');
        $this->db->select_sum('sathi_bgred');
        $this->db->select_sum('sathi_cgred');
        $this->db->select_sum('sathi_dgred');
        $this->db->select_sum('kormi_mp');
        $this->db->select_sum('kormi_gpa5');
        $this->db->select_sum('kormi_agred');
        $this->db->select_sum('kormi_a_gred');
        $this->db->select_sum('kormi_bgred');
        $this->db->select_sum('kormi_cgred');
        $this->db->select_sum('kormi_dgred');
        $this->db->select_sum('somorthok_mp');
        $this->db->select_sum('somorthok_gpa5');
        $this->db->select_sum('somorthok_agred');
        $this->db->select_sum('somorthok_a_gred');
        $this->db->select_sum('somorthok_bgred');
        $this->db->select_sum('somorthok_cgred');
        $this->db->select_sum('somorthok_dgred');
        $this->data['total_fajil_folafol_porisonkhan'] = $this->db->get('fajil_folafol_porisonkhan')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('fajil_folafol_porisonkhan');
        $this->data['fajil_folafol_porisonkhan'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/fajil_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/fajil_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function kamil_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/kamil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/kamil-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('ha_so_mp');
        $this->db->select_sum('ha_so_gpa5');
        $this->db->select_sum('ha_so_agred');
        $this->db->select_sum('ha_so_a_gred');
        $this->db->select_sum('ha_so_bgred');
        $this->db->select_sum('ha_so_cgred');
        $this->db->select_sum('ha_so_dgred');
        $this->db->select_sum('ha_sa_mp');
        $this->db->select_sum('ha_sa_gpa5');
        $this->db->select_sum('ha_sa_agred');
        $this->db->select_sum('ha_sa_a_gred');
        $this->db->select_sum('ha_sa_bgred');
        $this->db->select_sum('ha_sa_cgred');
        $this->db->select_sum('ha_sa_dgred');
        $this->db->select_sum('ha_ko_mp');
        $this->db->select_sum('ha_ko_gpa5');
        $this->db->select_sum('ha_ko_agred');
        $this->db->select_sum('ha_ko_a_gred');
        $this->db->select_sum('ha_ko_bgred');
        $this->db->select_sum('ha_ko_cgred');
        $this->db->select_sum('ha_ko_dgred');
        $this->db->select_sum('ha_som_mp');
        $this->db->select_sum('ha_som_gpa5');
        $this->db->select_sum('ha_som_agred');
        $this->db->select_sum('ha_som_a_gred');
        $this->db->select_sum('ha_som_bgred');
        $this->db->select_sum('ha_som_cgred');
        $this->db->select_sum('ha_som_dgred');
        $this->db->select_sum('ta_so_mp');
        $this->db->select_sum('ta_so_gpa5');
        $this->db->select_sum('ta_so_agred');
        $this->db->select_sum('ta_so_a_gred');
        $this->db->select_sum('ta_so_bgred');
        $this->db->select_sum('ta_so_cgred');
        $this->db->select_sum('ta_so_dgred');
        $this->db->select_sum('ta_sa_mp');
        $this->db->select_sum('ta_sa_gpa5');
        $this->db->select_sum('ta_sa_agred');
        $this->db->select_sum('ta_sa_a_gred');
        $this->db->select_sum('ta_sa_bgred');
        $this->db->select_sum('ta_sa_cgred');
        $this->db->select_sum('ta_sa_dgred');
        $this->db->select_sum('ta_ko_mp');
        $this->db->select_sum('ta_ko_gpa5');
        $this->db->select_sum('ta_ko_agred');
        $this->db->select_sum('ta_ko_a_gred');
        $this->db->select_sum('ta_ko_bgred');
        $this->db->select_sum('ta_ko_cgred');
        $this->db->select_sum('ta_ko_dgred');
        $this->db->select_sum('ta_som_mp');
        $this->db->select_sum('ta_som_gpa5');
        $this->db->select_sum('ta_som_agred');
        $this->db->select_sum('ta_som_a_gred');
        $this->db->select_sum('ta_som_bgred');
        $this->db->select_sum('ta_som_cgred');
        $this->db->select_sum('ta_som_dgred');
        $this->db->select_sum('fik_so_mp');
        $this->db->select_sum('fik_so_gpa5');
        $this->db->select_sum('fik_so_agred');
        $this->db->select_sum('fik_so_a_gred');
        $this->db->select_sum('fik_so_bgred');
        $this->db->select_sum('fik_so_cgred');
        $this->db->select_sum('fik_so_dgred');
        $this->db->select_sum('fik_sa_mp');
        $this->db->select_sum('fik_sa_gpa5');
        $this->db->select_sum('fik_sa_agred');
        $this->db->select_sum('fik_sa_a_gred');
        $this->db->select_sum('fik_sa_bgred');
        $this->db->select_sum('fik_sa_cgred');
        $this->db->select_sum('fik_sa_dgred');
        $this->db->select_sum('fik_ko_mp');
        $this->db->select_sum('fik_ko_gpa5');
        $this->db->select_sum('fik_ko_agred');
        $this->db->select_sum('fik_ko_a_gred');
        $this->db->select_sum('fik_ko_bgred');
        $this->db->select_sum('fik_ko_cgred');
        $this->db->select_sum('fik_ko_dgred');
        $this->db->select_sum('fik_som_mp');
        $this->db->select_sum('fik_som_gpa5');
        $this->db->select_sum('fik_som_agred');
        $this->db->select_sum('fik_som_a_gred');
        $this->db->select_sum('fik_som_bgred');
        $this->db->select_sum('fik_som_cgred');
        $this->db->select_sum('fik_som_dgred');
        $this->db->select_sum('adob_so_mp');
        $this->db->select_sum('adob_so_gpa5');
        $this->db->select_sum('adob_so_agred');
        $this->db->select_sum('adob_so_a_gred');
        $this->db->select_sum('adob_so_bgred');
        $this->db->select_sum('adob_so_cgred');
        $this->db->select_sum('adob_so_dgred');
        $this->db->select_sum('adob_sa_mp');
        $this->db->select_sum('adob_sa_gpa5');
        $this->db->select_sum('adob_sa_agred');
        $this->db->select_sum('adob_sa_a_gred');
        $this->db->select_sum('adob_sa_bgred');
        $this->db->select_sum('adob_sa_cgred');
        $this->db->select_sum('adob_sa_dgred');
        $this->db->select_sum('adob_ko_mp');
        $this->db->select_sum('adob_ko_gpa5');
        $this->db->select_sum('adob_ko_agred');
        $this->db->select_sum('adob_ko_a_gred');
        $this->db->select_sum('adob_ko_bgred');
        $this->db->select_sum('adob_ko_cgred');
        $this->db->select_sum('adob_ko_dgred');
        $this->db->select_sum('adob_som_mp');
        $this->db->select_sum('adob_som_gpa5');
        $this->db->select_sum('adob_som_agred');
        $this->db->select_sum('adob_som_a_gred');
        $this->db->select_sum('adob_som_bgred');
        $this->db->select_sum('adob_som_cgred');
        $this->db->select_sum('adob_som_dgred');
        
        $this->data['total_kamil_folafol_proisonkhan'] = $this->db->get('kamil_folafol_proisonkhan')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('kamil_folafol_proisonkhan');
        $this->data['kamil_folafol_proisonkhan'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/kamil_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/kamil_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }


    function qwami_folafol_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/qwami-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/qwami-folafol-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('sodosso_mp');
        $this->db->select_sum('sodosso_mt');
        $this->db->select_sum('sodosso_gagi');
        $this->db->select_sum('sodosso_ga');
        $this->db->select_sum('sodosso_mb');
        $this->db->select_sum('sathi_mp');
        $this->db->select_sum('sathi_mt');
        $this->db->select_sum('sathi_gagi');
        $this->db->select_sum('sathi_ga');
        $this->db->select_sum('sathi_mb');
        $this->db->select_sum('kormi_mp');
        $this->db->select_sum('kormi_mt');
        $this->db->select_sum('kormi_gagi');
        $this->db->select_sum('kormi_ga');
        $this->db->select_sum('kormi_mb');
        $this->db->select_sum('somorthok_mp');
        $this->db->select_sum('somorthok_mt');
        $this->db->select_sum('somorthok_gagi');
        $this->db->select_sum('somorthok_ga');
        $this->db->select_sum('somorthok_mb');
        $this->db->select_sum('bondu_mp');
        $this->db->select_sum('bondu_mt');
        $this->db->select_sum('bondu_gagi');
        $this->db->select_sum('bondu_ga');
        $this->db->select_sum('bondu_mb');
        $this->data['total_komi_folafol_porisonkhan_baoraye_hadis'] = $this->db->get('komi_folafol_porisonkhan_baoraye_hadis')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('komi_folafol_porisonkhan_baoraye_hadis');
        $this->data['komi_folafol_porisonkhan_baoraye_hadis'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/qwami_folafol_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/qwami_folafol_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function protisthanvittik_jonosokti_oddhoyoner_porisonkhan($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/protisthanvittik-jonosokti-oddhoyoner-porisonkhan/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('kobi_target');
        $this->db->select_sum('kobi_orjon');
        $this->db->select_sum('golpokar_target');
        $this->db->select_sum('golpokar_orjon');
        $this->db->select_sum('chorakar_target');
        $this->db->select_sum('chorakar_orjon');
        $this->db->select_sum('prabondhik_target');
        $this->db->select_sum('prabondhik_orjon');
        $this->db->select_sum('oponnasik_target');
        $this->db->select_sum('oponnasik_orjon');
        $this->data['total_output'] = $this->db->get('output')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $query = $this->db->get('output');
        $this->data['output'] = $query->first_row('array');


        $this->data['m'] = 'madrasha';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/madrasha/protisthanvittik_jonosokti_oddhoyoner_porisonkhan_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/madrasha/protisthanvittik_jonosokti_oddhoyoner_porisonkhan', $meta, $this->data,'leftmenu/departmentsreport');
    }
	
function report_type(){
	
	$entrytimeinfo = $this->site->getOneRecord('entry_settings','*',array('year'=>date('Y')),'id desc',1,0);	
	
	
	$current_date = strtotime(date('Y-m-d'));
	
	
	$annual_start = strtotime($entrytimeinfo->startdate_annual);
	$annual_end = strtotime($entrytimeinfo->enddate_annual);
  	
	$half_start = strtotime($entrytimeinfo->startdate_half);
	$half_end = strtotime($entrytimeinfo->enddate_half);
	
	$type =  ($current_date  >= $half_start && $current_date <= $half_end) ? 'half_yearly' : 'annual'; 
	if($type=='half_yearly') 
	  return array('type'=>'half_yearly','start'=>$entrytimeinfo->startdate_half,'end'=>$entrytimeinfo->enddate_half,'year'=>$entrytimeinfo->year);
    else 
	  return array('type'=>'annual','start'=>$entrytimeinfo->startdate_annual,'end'=>$entrytimeinfo->enddate_annual,'year'=>$entrytimeinfo->year);
}	
	

 
  function detailupdate()
    {
		 $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	//$this->site->check_confirm(6, date('Y-m-d'));
	 
	$is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
	
	$flag = 1; 	 
	$msg = 'done';
	if($is_changeable) {
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
	    $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name')=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($this->input->get_post('branch_id')){
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	} }  

 	else 
		$msg = 'failed';
	
	
	//$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);	
	
	
        echo json_encode(array('flag'=>$flag,'msg'=>$msg));
        exit;
		
	  
	}		
	   
	   
	   

	
	
	
}
