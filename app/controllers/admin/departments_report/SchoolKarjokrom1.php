<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolKarjokrom extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
		}
		
		$this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=32) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==32) {  //literature
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

    function school_karjokrom_bivag($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/school-karjokrom-bivag/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/school-karjokrom-bivag/'.$this->session->userdata('branch_id'));
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



		$report_info =  $report_type['info'];

		 
		if ($this->input->get('type') && ($this->input->get('type') == 'annual')){
			 
			 
			//$start = $report_info->startdate_half;
			//$end = $report_info->enddate_annual;
			
			$start = $report_type['start'];
			$end = $report_type['end'];
			
		}
		else if ($this->input->get('type') && ($this->input->get('type') == 'half_yearly')){
			 
			 
			$start = $report_info->startdate_half;
			$end = $report_info->enddate_half;
		}
		else{
			
			
			$start = $report_type['start'];
			$end = $report_type['end'];
		} 


			//$start = $report_type['start'];
			//$end = $report_type['end'];

        
		$this->db->select_sum('jonosokti_sodoso_ps');
		$this->db->select_sum('jonosokti_sodoso_bs');
		$this->db->select_sum('jonosokti_sodoso_ag');
		$this->db->select_sum('jonosokti_sodoso_mu');
		$this->db->select_sum('jonosokti_sodosop_ps');
		$this->db->select_sum('jonosokti_sodosop_bs');
		$this->db->select_sum('jonosokti_sodosop_ag');
		$this->db->select_sum('jonosokti_sodosop_mu');
		$this->db->select_sum('jonosokti_sathi_ps');
		$this->db->select_sum('jonosokti_sathi_bs');
		$this->db->select_sum('jonosokti_sathi_ag');
		$this->db->select_sum('jonosokti_sathi_mu');
		$this->db->select_sum('jonosokti_sathip_ps');
		$this->db->select_sum('jonosokti_ssathip_bs');
		$this->db->select_sum('jonosokti_sathip_ag');
		$this->db->select_sum('jonosokti_sathip_mu');
		$this->db->select_sum('jonosokti_k_ps');
		$this->db->select_sum('jonosokti_k_bs');
		$this->db->select_sum('jonosokti_k_ag');
		$this->db->select_sum('jonosokti_k_mu');
		$this->db->select_sum('bothok_sathib_sonka');
		$this->db->select_sum('bothok_sathipb_u');
		$this->db->select_sum('bothok_sathipb_sonka');
		$this->db->select_sum('bothok_spb_sonka');
		$this->db->select_sum('bothok__spb_u');
		$this->db->select_sum('bothok_sathipb_u');
		$this->db->select_sum('bothok_kb_sonka');
		$this->db->select_sum('bothok_kb_u');
		$this->db->select_sum('dawat_somthok_ps');
		$this->db->select_sum('dawat_somthok_bs');
		$this->db->select_sum('dawat_somthok_b');
		$this->db->select_sum('datwat_somthok_g');
		$this->db->select_sum('datwat_bondu_ps');
		$this->db->select_sum('dawat_bondu_bs');
		$this->db->select_sum('datwat_bondu_b');
		$this->db->select_sum('datwat_bondu_g');
		$this->db->select_sum('datwat_osomthok_ps');
		$this->db->select_sum('datwat_osomthok_bs');
		$this->db->select_sum('datwat_osomthok_b');
		$this->db->select_sum('datwat_osomthok_g');
		$this->db->select_sum('datwat_obondu_ps');
		$this->db->select_sum('datwat_obondu_bs');
		$this->db->select_sum('datwat_obondu_b');
		$this->db->select_sum('datwat_obonbu_g');
		$this->db->select_sum('datwat_subuk_ps');
		$this->db->select_sum('datwat_subuk_bs');
		$this->db->select_sum('datwat_subuk_b');
		$this->db->select_sum('datwat_subuk_g');
		$this->db->select_sum('songothon_uposaka_ps');
		$this->db->select_sum('songothon_uposaka_bs');
		$this->db->select_sum('songothon_uposaka_b');
		$this->db->select_sum('songothon_uposaka_g');
		$this->db->select_sum('songothon_somothoks_ps');
		$this->db->select_sum('songothon_somothks_bs');
		$this->db->select_sum('songothon_somothoks_b');
		$this->db->select_sum('songothon_somothoks_g');
		$this->db->select_sum('owatimulokpogam_spo_s');
		$this->db->select_sum('owatimulokpogam_mj_u');
		$this->db->select_sum('owatimulokpogam_potijogita_s');
		$this->db->select_sum('owatimulokpogam_potijogita_u');
		$this->db->select_sum('owatimulokpogam_shikasofor_s');
		$this->db->select_sum('owatimulokpogam_shikasofor_u');
		$this->db->select_sum('owatimulokpogam_su_s');
		$this->db->select_sum('owatimulokpogam_su_U');
		$this->db->select_sum('owatimulokpogam_chtop_u');
		$this->db->select_sum('owatimulokpogam_bmjap_s');
		$this->db->select_sum('owatimulokpogam_bmjap_u');
		$this->db->select_sum('owatimulokpogam_sk_s');
		$this->db->select_sum('owatimulokpogam_sk_u');
		$this->db->select_sum('owatimulokpogam_as_s');
		$this->db->select_sum('owatimulokpogam_as_u');
		$this->db->select_sum('owatimulokpogam_bm_s');
		$this->db->select_sum('owatimulokpogam_bm_u');
		$this->db->select_sum('owatimulokpogam_sgs_s');
		$this->db->select_sum('owatimulokpogam_sga_u');
		$this->db->select_sum('owatimulokpogam_chackro_s');
		$this->db->select_sum('owatimulokpogam_chackro_u');
		$this->db->select_sum('owatimulokpogam_onono_s');
		$this->db->select_sum('owatimulokpogam_onono_u');
		$this->db->select_sum('owatimulokpogam_uk_s');
		$this->db->select_sum('owatimulokpogam_uk_u');
		$this->db->select_sum('p_sathitcts_s');
		$this->db->select_sum('p_sathitcts_u');
		$this->db->select_sum('p_ktcts_s');
		$this->db->select_sum('p_ktcts_u');
		$this->db->select_sum('p_sathisdari_s');
		$this->db->select_sum('p_sathisdari_u');
		$this->db->select_sum('p_sts_s');
		$this->db->select_sum('p_sts_u');
		$this->db->select_sum('p_ats_s');
		$this->db->select_sum('p_ats_u');
		$this->db->select_sum('p_sp_s');
		$this->db->select_sum('p_sp_u');
		$this->db->select_sum('p_kt_s');
		$this->db->select_sum('p_kt_u');
		$this->db->select_sum('p_ackro_s');
		$this->db->select_sum('p_ackro_u');
		$this->db->select_sum('dsk_gs_s');
		$this->db->select_sum('dsk_gs_u');
		$this->db->select_sum('dsk_hc_s');
		$this->db->select_sum('dsk_hc_u');
		$this->db->select_sum('dsk_ppo_s');
		$this->db->select_sum('dsk_ppo_u');
		$this->db->select_sum('dsk_sbb_s');
		$this->db->select_sum('dsk_sbb_u');
		$this->db->select_sum('dsk_dp_s');
		$this->db->select_sum('dsk_dp_u');
		$this->db->select_sum('dsk_bro_s');
		$this->db->select_sum('dsk_bro_u');
		$this->db->select_sum('kd_msjm_s');
		$this->db->select_sum('kd_msjm_u');
		$this->db->select_sum('kd_amd_s');
		$this->db->select_sum('kd_amd_u');
		$this->db->select_sum('kd_se_s');
		$this->db->select_sum('kd_se_u');
		$this->db->select_sum('kd_cc_s');
		$this->db->select_sum('kd_cc_u');
		$this->db->select_sum('kd_ae_s');
		$this->db->select_sum('kd_ae_u');
		$this->db->select_sum('kd_cgd_s');
		$this->db->select_sum('kd_cgp_u');
		$this->db->select_sum('kd_dgchaibkpt_s');
		$this->db->select_sum('kd_dgchaibkpt_u');
		$this->db->select_sum('kd_shl_s');
		$this->db->select_sum('kd_shl_u');
		$this->db->select_sum('jogaj_sarkular_s');
		$this->db->select_sum('jogaj_sarkular_k');
		$this->db->select_sum('jogaj_sarkular_saka_');
		$this->db->select_sum('jogaj_sarkular_onn');
		$this->db->select_sum('jogaj_chithi_s');
		$this->db->select_sum('jogaj_chithi_k');
		$this->db->select_sum('jogaj_chithi_saka');
		$this->db->select_sum('jogaj_chithi_onn');
		$this->db->select_sum('jogaj_b_email_s');
		$this->db->select_sum('jogaj_b_email_k');
		$this->db->select_sum('jogaj_b_email_saka');
		$this->db->select_sum('jogaj_b_email_onn');
		$this->db->select_sum('jogaj_sms_s');
		$this->db->select_sum('jogaj_sms_k');
		$this->db->select_sum('jogaj_sms_saka');
		$this->db->select_sum('jogaj_sms_onn');
		$this->db->select_sum('sofor_k_kotobar');
		$this->db->select_sum('sofor_saka_kotobar');
		$this->db->select_sum('ks_sathi_s');
		$this->db->select_sum('ks_sathi_u');
		$this->db->select_sum('ks_sathip_s');
		$this->db->select_sum('ks_sathip_u');
		$this->db->select_sum('ks_kormi_S');
		$this->db->select_sum('ks_kormi_u');
		$this->db->select_sum('ks_sks_s');
		$this->db->select_sum('ks_sks_u');
		$this->db->select_sum('ks_ssathi_s');
		$this->db->select_sum('ks_ssathi_u');
		$this->db->select_sum('ks_sds_S');
		$this->db->select_sum('ks_sds_u');
		$this->db->select_sum('b_kpb_s');
		$this->db->select_sum('b_kpb_u');
		$this->db->select_sum('b_ss_s');
		$this->db->select_sum('b_ss_u');
		$this->db->select_sum('b_kpe_s');
		$this->db->select_sum('b_kpe_u');
		$this->db->select_sum('b_jfbhthrri_s');
		$this->db->select_sum('b_jfbhthrri_u');
		$this->db->select_sum('b_sk_s');
		$this->db->select_sum('b_sk_u');
		$this->db->select_sum('b_sr_s');
		$this->db->select_sum('b_sr_u');
		$this->db->select_sum('b_dlk_s');
		$this->db->select_sum('b_dlk_u');
		$this->db->select_sum('b_sp_s');
		$this->db->select_sum('b_sp_u');
		$this->db->select_sum('b_pr_s');
		$this->db->select_sum('b_pr_u');
		$this->db->select_sum('b_m2ms_s');
		$this->db->select_sum('b_m2ms_u');
		$this->db->select_sum('b_hkhbnad_s');
		$this->db->select_sum('b_hkhbnad_u');
		$this->db->select_sum('b_fsb_s');
		$this->db->select_sum('b_fsb_u');
		$this->db->select_sum('b_s_s');
		$this->db->select_sum('b_s_u');
		$this->db->select_sum('b_spt_s');
		$this->db->select_sum('b_spt_u');
		$this->db->select_sum('b_onn_s');
		$this->db->select_sum('b_onn_u');
		$this->db->select_sum('spt_kt_s');
		$this->db->select_sum('spt_kt_u');
		$this->db->select_sum('spt_fb_s');
		$this->db->select_sum('spt_fb_u');
		$this->db->select_sum('spt_bb_s');
		$this->db->select_sum('spt_bb_u');
		$this->db->select_sum('spt_bmtn_s');
		$this->db->select_sum('spt_bmtn_u');
		$this->db->select_sum('spt_onn_s');
		$this->db->select_sum('spt_onn_u');
		
		$this->db->select_sum('bothok_sathib_u');
		$this->db->select_sum('p_kormisdari_u');
		$this->db->select_sum('p_kormisdari_s');
		$this->db->select_sum('dsk_onnono_s');
		$this->db->select_sum('dsk_onnono_u');
		$this->db->select_sum('owatimulokpogam_spo_u');
		$this->db->select_sum('owatimulokpogam_mj_s');
		$this->db->select_sum('owatimulokpogam_chtop_s');
		
		
		$this->db->select('id');
		$this->db->where('creted_at >=', $start);
		$this->db->where('creted_at <=', $end);
		
		if($branch_id)
        $this->db->where('branch_id',$branch_id);
		

		$this->db->group_by('id');
		
        $this->data['total_school_karjokocom_bibag'] = $this->db->get('school_karjokocom_bibag')->first_row('array');

		//	$this->sma->print_arrays($this->data['total_school_karjokocom_bibag']);
		
		$this->data['school_karjokocom_bibag'] = $this->data['total_school_karjokocom_bibag'];
		 
		 


		$this->data['m'] = 'schoolkarjokrom';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/SchoolKarjokrom/school_karjokrom_bivag_entry', $meta, $this->data,'leftmenu/others');
        else
		$this->page_construct('departmentsreport/SchoolKarjokrom/school_karjokrom_bivag', $meta, $this->data,'leftmenu/others');
	}





	function report_type()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

        $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

        $type =  $this->input->get('type')=='annual' ?  'annual' : 'half_yearly';

        if ($type == 'half_yearly')
            return array('info'=>$entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
        else
            return array('info'=>$entrytimeinfo2, 'type' => 'annual', 'start' => $entrytimeinfo2->startdate_half, 'end' => $entrytimeinfo2->enddate_annual, 'year' => $entrytimeinfo2->year);
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
