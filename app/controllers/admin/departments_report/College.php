<?php defined('BASEPATH') OR exit('No direct script access allowed');

class College extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;
		
		if(   $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id')!=21) {
			admin_redirect('welcome');
		}
		 $this->sma->checkPermissions('index', TRUE,'departmentsreport');
		 
		 if(  $this->session->userdata('group_id')== 8 && $this->session->userdata('department_id') ==21) {  //College
			$this->departmentuser = true; 
		}
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 21
        $this->data['department_id'] = 21;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  21)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>21), 'id desc', 1, 0);

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

    function college_page_one($branch_id = NULL)
    {  
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/college-page-one/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/college-page-one/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('col_shor_pr_num');
        $this->db->select_sum('col_shor_pr_bri');
        $this->db->select_sum('col_shor_pr_gha');
        $this->db->select_sum('col_shor_sn_num');
        $this->db->select_sum('col_shor_sn_nei');
        $this->db->select_sum('col_shor_sn_bri');
        $this->db->select_sum('col_shor_sn_gha');
        $this->db->select_sum('col_shor_th_num');
        $this->db->select_sum('col_shor_th_bri');
        $this->db->select_sum('col_shor_th_gha');
        $this->db->select_sum('col_shor_wa_num');
        $this->db->select_sum('col_shor_wa_bri');
        $this->db->select_sum('col_shor_wa_gha');
        $this->db->select_sum('col_shor_up_num');
        $this->db->select_sum('col_shor_up_bri');
        $this->db->select_sum('col_shor_up_gha');
        $this->db->select_sum('col_shor_ss_num');
        $this->db->select_sum('col_shor_ss_bri');
        $this->db->select_sum('col_shor_ss_gha');
        $this->db->select_sum('col_beshor_pr_num');
        $this->db->select_sum('col_beshor_pr_bri');
        $this->db->select_sum('col_beshor_pr_gha');
        $this->db->select_sum('col_beshor_sn_num');
        $this->db->select_sum('col_beshor_sn_nei');
        $this->db->select_sum('col_beshor_sn_bri');
        $this->db->select_sum('col_beshor_sn_gha');
        $this->db->select_sum('col_beshor_th_num');
        $this->db->select_sum('col_beshor_th_bri');
        $this->db->select_sum('col_beshor_th_gha');
        $this->db->select_sum('col_beshor_wa_num');
        $this->db->select_sum('col_beshor_wa_bri');
        $this->db->select_sum('col_beshor_wa_gha');
        $this->db->select_sum('col_beshor_up_num');
        $this->db->select_sum('col_beshor_up_bri');
        $this->db->select_sum('col_beshor_up_gha');
        $this->db->select_sum('col_beshor_ss_num');
        $this->db->select_sum('col_beshor_ss_bri');
        $this->db->select_sum('col_beshor_ss_gha');
        $this->db->select_sum('b_ed_col_pr_num');
        $this->db->select_sum('b_ed_col_pr_bri');
        $this->db->select_sum('b_ed_col_pr_gha');
        $this->db->select_sum('b_ed_col_sn_num');
        $this->db->select_sum('b_ed_col_sn_nei');
        $this->db->select_sum('b_ed_col_sn_bri');
        $this->db->select_sum('b_ed_col_sn_gha');
        $this->db->select_sum('b_ed_col_th_num');
        $this->db->select_sum('b_ed_col_th_bri');
        $this->db->select_sum('b_ed_col_th_gha');
        $this->db->select_sum('b_ed_col_wa_num');
        $this->db->select_sum('b_ed_col_wa_bri');
        $this->db->select_sum('b_ed_col_wa_gha');
        $this->db->select_sum('b_ed_col_up_num');
        $this->db->select_sum('b_ed_col_up_bri');
        $this->db->select_sum('b_ed_col_up_gha');
        $this->db->select_sum('b_ed_col_ss_num');
        $this->db->select_sum('b_ed_col_ss_bri');
        $this->db->select_sum('b_ed_col_ss_gha');
        $this->db->select_sum('aain_col_pr_num');
        $this->db->select_sum('aain_col_pr_bri');
        $this->db->select_sum('aain_col_pr_gha');
        $this->db->select_sum('aain_col_sn_num');
        $this->db->select_sum('aain_col_sn_nei');
        $this->db->select_sum('aain_col_sn_bri');
        $this->db->select_sum('aain_col_sn_gha');
        $this->db->select_sum('aain_col_th_num');
        $this->db->select_sum('aain_col_th_bri');
        $this->db->select_sum('aain_col_th_gha');
        $this->db->select_sum('aain_col_wa_num');
        $this->db->select_sum('aain_col_wa_bri');
        $this->db->select_sum('aain_col_wa_gha');
        $this->db->select_sum('aain_col_up_num');
        $this->db->select_sum('aain_col_up_bri');
        $this->db->select_sum('aain_col_up_gha');
        $this->db->select_sum('aain_col_ss_num');
        $this->db->select_sum('aain_col_ss_bri');
        $this->db->select_sum('aain_col_ss_gha');
        $this->db->select_sum('ideal_col_pr_num');
        $this->db->select_sum('ideal_col_pr_bri');
        $this->db->select_sum('ideal_col_pr_gha');
        $this->db->select_sum('ideal_col_sn_num');
        $this->db->select_sum('ideal_col_sn_nei');
        $this->db->select_sum('ideal_col_sn_bri');
        $this->db->select_sum('ideal_col_sn_gha');
        $this->db->select_sum('ideal_col_th_num');
        $this->db->select_sum('ideal_col_th_bri');
        $this->db->select_sum('ideal_col_th_gha');
        $this->db->select_sum('ideal_col_wa_num');
        $this->db->select_sum('ideal_col_wa_bri');
        $this->db->select_sum('ideal_col_wa_gha');
        $this->db->select_sum('ideal_col_up_num');
        $this->db->select_sum('ideal_col_up_bri');
        $this->db->select_sum('ideal_col_up_gha');
        $this->db->select_sum('ideal_col_ss_num');
        $this->db->select_sum('ideal_col_ss_bri');
        $this->db->select_sum('ideal_col_ss_gha');
        $this->db->select_sum('agri_col_pr_num');
        $this->db->select_sum('agri_col_pr_bri');
        $this->db->select_sum('agri_col_pr_gha');
        $this->db->select_sum('agri_col_sn_num');
        $this->db->select_sum('agri_col_sn_nei');
        $this->db->select_sum('agri_col_sn_bri');
        $this->db->select_sum('agri_col_sn_gha');
        $this->db->select_sum('agri_col_th_num');
        $this->db->select_sum('agri_col_th_bri');
        $this->db->select_sum('agri_col_th_gha');
        $this->db->select_sum('agri_col_wa_num');
        $this->db->select_sum('agri_col_wa_bri');
        $this->db->select_sum('agri_col_wa_gha');
        $this->db->select_sum('agri_col_up_num');
        $this->db->select_sum('agri_col_up_bri');
        $this->db->select_sum('agri_col_up_gha');
        $this->db->select_sum('agri_col_ss_num');
        $this->db->select_sum('agri_col_ss_bri');
        $this->db->select_sum('agri_col_ss_gha');
        $this->db->select_sum('com_col_pr_num');
        $this->db->select_sum('com_col_pr_bri');
        $this->db->select_sum('com_col_pr_gha');
        $this->db->select_sum('com_col_sn_num');
        $this->db->select_sum('com_col_sn_nei');
        $this->db->select_sum('com_col_sn_bri');
        $this->db->select_sum('com_col_sn_gha');
        $this->db->select_sum('com_col_th_num');
        $this->db->select_sum('com_col_th_bri');
        $this->db->select_sum('com_col_th_gha');
        $this->db->select_sum('com_col_wa_num');
        $this->db->select_sum('com_col_wa_bri');
        $this->db->select_sum('com_col_wa_gha');
        $this->db->select_sum('com_col_up_num');
        $this->db->select_sum('com_col_up_bri');
        $this->db->select_sum('com_col_up_gha');
        $this->db->select_sum('com_col_ss_num');
        $this->db->select_sum('com_col_ss_bri');
        $this->db->select_sum('com_col_ss_gha');
        $this->db->select_sum('sharirik_col_pr_num');
        $this->db->select_sum('sharirik_col_pr_bri');
        $this->db->select_sum('sharirik_col_pr_gha');
        $this->db->select_sum('sharirik_col_sn_num');
        $this->db->select_sum('sharirik_col_sn_nei');
        $this->db->select_sum('sharirik_col_sn_bri');
        $this->db->select_sum('sharirik_col_sn_gha');
        $this->db->select_sum('sharirik_col_th_num');
        $this->db->select_sum('sharirik_col_th_bri');
        $this->db->select_sum('sharirik_col_th_gha');
        $this->db->select_sum('sharirik_col_wa_num');
        $this->db->select_sum('sharirik_col_wa_bri');
        $this->db->select_sum('sharirik_col_wa_gha');
        $this->db->select_sum('sharirik_col_up_num');
        $this->db->select_sum('sharirik_col_up_bri');
        $this->db->select_sum('sharirik_col_up_gha');
        $this->db->select_sum('sharirik_col_ss_num');
        $this->db->select_sum('sharirik_col_ss_bri');
        $this->db->select_sum('sharirik_col_ss_gha');
        $this->db->select_sum('charukola_col_pr_num');
        $this->db->select_sum('charukola_col_pr_bri');
        $this->db->select_sum('charukola_col_pr_gha');
        $this->db->select_sum('charukola_col_sn_num');
        $this->db->select_sum('charukola_col_sn_nei');
        $this->db->select_sum('charukola_col_sn_bri');
        $this->db->select_sum('charukola_col_sn_gha');
        $this->db->select_sum('charukola_col_th_num');
        $this->db->select_sum('charukola_col_th_bri');
        $this->db->select_sum('charukola_col_th_gha');
        $this->db->select_sum('charukola_col_wa_num');
        $this->db->select_sum('charukola_col_wa_bri');
        $this->db->select_sum('charukola_col_wa_gha');
        $this->db->select_sum('charukola_col_up_num');
        $this->db->select_sum('charukola_col_up_bri');
        $this->db->select_sum('charukola_col_up_gha');
        $this->db->select_sum('charukola_col_ss_num');
        $this->db->select_sum('charukola_col_ss_bri');
        $this->db->select_sum('charukola_col_ss_gha');
        $this->db->select_sum('hsc_shor_pr_num');
        $this->db->select_sum('hsc_shor_pr_bri');
        $this->db->select_sum('hsc_shor_pr_gha');
        $this->db->select_sum('hsc_shor_sn_num');
        $this->db->select_sum('hsc_shor_sn_nei');
        $this->db->select_sum('hsc_shor_sn_bri');
        $this->db->select_sum('hsc_shor_sn_gha');
        $this->db->select_sum('hsc_shor_th_num');
        $this->db->select_sum('hsc_shor_th_bri');
        $this->db->select_sum('hsc_shor_th_gha');
        $this->db->select_sum('hsc_shor_wa_num');
        $this->db->select_sum('hsc_shor_wa_bri');
        $this->db->select_sum('hsc_shor_wa_gha');
        $this->db->select_sum('hsc_shor_up_num');
        $this->db->select_sum('hsc_shor_up_bri');
        $this->db->select_sum('hsc_shor_up_gha');
        $this->db->select_sum('hsc_shor_ss_num');
        $this->db->select_sum('hsc_shor_ss_bri');
        $this->db->select_sum('hsc_shor_ss_gha');
        $this->db->select_sum('hsc_beshor_pr_num');
        $this->db->select_sum('hsc_beshor_pr_bri');
        $this->db->select_sum('hsc_beshor_pr_gha');
        $this->db->select_sum('hsc_beshor_sn_num');
        $this->db->select_sum('hsc_beshor_sn_nei');
        $this->db->select_sum('hsc_beshor_sn_bri');
        $this->db->select_sum('hsc_beshor_sn_gha');
        $this->db->select_sum('hsc_beshor_th_num');
        $this->db->select_sum('hsc_beshor_th_bri');
        $this->db->select_sum('hsc_beshor_th_gha');
        $this->db->select_sum('hsc_beshor_wa_num');
        $this->db->select_sum('hsc_beshor_wa_bri');
        $this->db->select_sum('hsc_beshor_wa_gha');
        $this->db->select_sum('hsc_beshor_up_num');
        $this->db->select_sum('hsc_beshor_up_bri');
        $this->db->select_sum('hsc_beshor_up_gha');
        $this->db->select_sum('hsc_beshor_ss_num');
        $this->db->select_sum('hsc_beshor_ss_bri');
        $this->db->select_sum('hsc_beshor_ss_gha');
        $this->db->select_sum('text_eng_col_pr_num');
        $this->db->select_sum('text_eng_col_pr_bri');
        $this->db->select_sum('text_eng_col_pr_gha');
        $this->db->select_sum('text_eng_col_sn_num');
        $this->db->select_sum('text_eng_col_sn_nei');
        $this->db->select_sum('text_eng_col_sn_bri');
        $this->db->select_sum('text_eng_col_sn_gha');
        $this->db->select_sum('text_eng_col_th_num');
        $this->db->select_sum('text_eng_col_th_bri');
        $this->db->select_sum('text_eng_col_th_gha');
        $this->db->select_sum('text_eng_col_wa_num');
        $this->db->select_sum('text_eng_col_wa_bri');
        $this->db->select_sum('text_eng_col_wa_gha');
        $this->db->select_sum('text_eng_col_up_num');
        $this->db->select_sum('text_eng_col_up_bri');
        $this->db->select_sum('text_eng_col_up_gha');
        $this->db->select_sum('text_eng_col_ss_num');
        $this->db->select_sum('text_eng_col_ss_bri');
        $this->db->select_sum('text_eng_col_ss_gha');
        $this->db->select_sum('pol_ins_shor_pr_num');
        $this->db->select_sum('pol_ins_shor_pr_bri');
        $this->db->select_sum('pol_ins_shor_pr_gha');
        $this->db->select_sum('pol_ins_shor_sn_num');
        $this->db->select_sum('pol_ins_shor_sn_nei');
        $this->db->select_sum('pol_ins_shor_sn_bri');
        $this->db->select_sum('pol_ins_shor_sn_gha');
        $this->db->select_sum('pol_ins_shor_th_num');
        $this->db->select_sum('pol_ins_shor_th_bri');
        $this->db->select_sum('pol_ins_shor_th_gha');
        $this->db->select_sum('pol_ins_shor_wa_num');
        $this->db->select_sum('pol_ins_shor_wa_bri');
        $this->db->select_sum('pol_ins_shor_wa_gha');
        $this->db->select_sum('pol_ins_shor_up_num');
        $this->db->select_sum('pol_ins_shor_up_bri');
        $this->db->select_sum('pol_ins_shor_up_gha');
        $this->db->select_sum('pol_ins_shor_ss_num');
        $this->db->select_sum('pol_ins_shor_ss_bri');
        $this->db->select_sum('pol_ins_shor_ss_gha');
        $this->db->select_sum('pol_ins_beshor_pr_num');
        $this->db->select_sum('pol_ins_beshor_pr_bri');
        $this->db->select_sum('pol_ins_beshor_pr_gha');
        $this->db->select_sum('pol_ins_beshor_sn_num');
        $this->db->select_sum('pol_ins_beshor_sn_nei');
        $this->db->select_sum('pol_ins_beshor_sn_bri');
        $this->db->select_sum('pol_ins_beshor_sn_gha');
        $this->db->select_sum('pol_ins_beshor_th_num');
        $this->db->select_sum('pol_ins_beshor_th_bri');
        $this->db->select_sum('pol_ins_beshor_th_gha');
        $this->db->select_sum('pol_ins_beshor_wa_num');
        $this->db->select_sum('pol_ins_beshor_wa_bri');
        $this->db->select_sum('pol_ins_beshor_wa_gha');
        $this->db->select_sum('pol_ins_beshor_up_num');
        $this->db->select_sum('pol_ins_beshor_up_bri');
        $this->db->select_sum('pol_ins_beshor_up_gha');
        $this->db->select_sum('pol_ins_beshor_ss_num');
        $this->db->select_sum('pol_ins_beshor_ss_bri');
        $this->db->select_sum('pol_ins_beshor_ss_gha');
        $this->db->select_sum('text_ins_shor_pr_num');
        $this->db->select_sum('text_ins_shor_pr_bri');
        $this->db->select_sum('text_ins_shor_pr_gha');
        $this->db->select_sum('text_ins_shor_sn_num');
        $this->db->select_sum('text_ins_shor_sn_nei');
        $this->db->select_sum('text_ins_shor_sn_bri');
        $this->db->select_sum('text_ins_shor_sn_gha');
        $this->db->select_sum('text_ins_shor_th_num');
        $this->db->select_sum('text_ins_shor_th_bri');
        $this->db->select_sum('text_ins_shor_th_gha');
        $this->db->select_sum('text_ins_shor_wa_num');
        $this->db->select_sum('text_ins_shor_wa_bri');
        $this->db->select_sum('text_ins_shor_wa_gha');
        $this->db->select_sum('text_ins_shor_up_num');
        $this->db->select_sum('text_ins_shor_up_bri');
        $this->db->select_sum('text_ins_shor_up_gha');
        $this->db->select_sum('text_ins_shor_ss_num');
        $this->db->select_sum('text_ins_shor_ss_bri');
        $this->db->select_sum('text_ins_shor_ss_gha');
        $this->db->select_sum('text_ins_beshor_pr_num');
        $this->db->select_sum('text_ins_beshor_pr_bri');
        $this->db->select_sum('text_ins_beshor_pr_gha');
        $this->db->select_sum('text_ins_beshor_sn_num');
        $this->db->select_sum('text_ins_beshor_sn_nei');
        $this->db->select_sum('text_ins_beshor_sn_bri');
        $this->db->select_sum('text_ins_beshor_sn_gha');
        $this->db->select_sum('text_ins_beshor_th_num');
        $this->db->select_sum('text_ins_beshor_th_bri');
        $this->db->select_sum('text_ins_beshor_th_gha');
        $this->db->select_sum('text_ins_beshor_wa_num');
        $this->db->select_sum('text_ins_beshor_wa_bri');
        $this->db->select_sum('text_ins_beshor_wa_gha');
        $this->db->select_sum('text_ins_beshor_up_num');
        $this->db->select_sum('text_ins_beshor_up_bri');
        $this->db->select_sum('text_ins_beshor_up_gha');
        $this->db->select_sum('text_ins_beshor_ss_num');
        $this->db->select_sum('text_ins_beshor_ss_bri');
        $this->db->select_sum('text_ins_beshor_ss_gha');
        $this->db->select_sum('text_voc_pr_num');
        $this->db->select_sum('text_voc_pr_bri');
        $this->db->select_sum('text_voc_pr_gha');
        $this->db->select_sum('text_voc_sn_num');
        $this->db->select_sum('text_voc_sn_nei');
        $this->db->select_sum('text_voc_sn_bri');
        $this->db->select_sum('text_voc_sn_gha');
        $this->db->select_sum('text_voc_th_num');
        $this->db->select_sum('text_voc_th_bri');
        $this->db->select_sum('text_voc_th_gha');
        $this->db->select_sum('text_voc_wa_num');
        $this->db->select_sum('text_voc_wa_bri');
        $this->db->select_sum('text_voc_wa_gha');
        $this->db->select_sum('text_voc_up_num');
        $this->db->select_sum('text_voc_up_bri');
        $this->db->select_sum('text_voc_up_gha');
        $this->db->select_sum('text_voc_ss_num');
        $this->db->select_sum('text_voc_ss_bri');
        $this->db->select_sum('text_voc_ss_gha');
        $this->db->select_sum('surve_ins_pr_num');
        $this->db->select_sum('surve_ins_pr_bri');
        $this->db->select_sum('surve_ins_pr_gha');
        $this->db->select_sum('surve_ins_sn_num');
        $this->db->select_sum('surve_ins_sn_nei');
        $this->db->select_sum('surve_ins_sn_bri');
        $this->db->select_sum('surve_ins_sn_gha');
        $this->db->select_sum('surve_ins_th_num');
        $this->db->select_sum('surve_ins_th_bri');
        $this->db->select_sum('surve_ins_th_gha');
        $this->db->select_sum('surve_ins_wa_num');
        $this->db->select_sum('surve_ins_wa_bri');
        $this->db->select_sum('surve_ins_wa_gha');
        $this->db->select_sum('surve_ins_up_num');
        $this->db->select_sum('surve_ins_up_bri');
        $this->db->select_sum('surve_ins_up_gha');
        $this->db->select_sum('surve_ins_ss_num');
        $this->db->select_sum('surve_ins_ss_bri');
        $this->db->select_sum('surve_ins_ss_gha');
        $this->db->select_sum('agri_ins_shor_pr_num');
        $this->db->select_sum('agri_ins_shor_pr_bri');
        $this->db->select_sum('agri_ins_shor_pr_gha');
        $this->db->select_sum('agri_ins_shor_sn_num');
        $this->db->select_sum('agri_ins_shor_sn_nei');
        $this->db->select_sum('agri_ins_shor_sn_bri');
        $this->db->select_sum('agri_ins_shor_sn_gha');
        $this->db->select_sum('agri_ins_shor_th_num');
        $this->db->select_sum('agri_ins_shor_th_bri');
        $this->db->select_sum('agri_ins_shor_th_gha');
        $this->db->select_sum('agri_ins_shor_wa_num');
        $this->db->select_sum('agri_ins_shor_wa_bri');
        $this->db->select_sum('agri_ins_shor_wa_gha');
        $this->db->select_sum('agri_ins_shor_up_num');
        $this->db->select_sum('agri_ins_shor_up_bri');
        $this->db->select_sum('agri_ins_shor_up_gha');
        $this->db->select_sum('agri_ins_shor_ss_num');
        $this->db->select_sum('agri_ins_shor_ss_bri');
        $this->db->select_sum('agri_ins_shor_ss_gha');
        $this->db->select_sum('agri_in_beshor_pr_num');
        $this->db->select_sum('agri_in_beshor_pr_bri');
        $this->db->select_sum('agri_in_beshor_pr_gha');
        $this->db->select_sum('agri_in_beshor_sn_num');
        $this->db->select_sum('agri_in_beshor_sn_nei');
        $this->db->select_sum('agri_in_beshor_sn_bri');
        $this->db->select_sum('agri_in_beshor_sn_gha');
        $this->db->select_sum('agri_in_beshor_th_num');
        $this->db->select_sum('agri_in_beshor_th_bri');
        $this->db->select_sum('agri_in_beshor_th_gha');
        $this->db->select_sum('agri_in_beshor_wa_num');
        $this->db->select_sum('agri_in_beshor_wa_bri');
        $this->db->select_sum('agri_in_beshor_wa_gha');
        $this->db->select_sum('agri_in_beshor_up_num');
        $this->db->select_sum('agri_in_beshor_up_bri');
        $this->db->select_sum('agri_in_beshor_up_gha');
        $this->db->select_sum('agri_in_beshor_ss_num');
        $this->db->select_sum('agri_in_beshor_ss_bri');
        $this->db->select_sum('agri_in_beshor_ss_gha');
        $this->db->select_sum('glass_ins_pr_num');
        $this->db->select_sum('glass_ins_pr_bri');
        $this->db->select_sum('glass_ins_pr_gha');
        $this->db->select_sum('glass_ins_sn_num');
        $this->db->select_sum('glass_ins_sn_nei');
        $this->db->select_sum('glass_ins_sn_bri');
        $this->db->select_sum('glass_ins_sn_gha');
        $this->db->select_sum('glass_ins_th_num');
        $this->db->select_sum('glass_ins_th_bri');
        $this->db->select_sum('glass_ins_th_gha');
        $this->db->select_sum('glass_ins_wa_num');
        $this->db->select_sum('glass_ins_wa_bri');
        $this->db->select_sum('glass_ins_wa_gha');
        $this->db->select_sum('glass_ins_up_num');
        $this->db->select_sum('glass_ins_up_bri');
        $this->db->select_sum('glass_ins_up_gha');
        $this->db->select_sum('glass_ins_ss_num');
        $this->db->select_sum('glass_ins_ss_bri');
        $this->db->select_sum('glass_ins_ss_gha');
        $this->db->select_sum('fores_ins_pr_num');
        $this->db->select_sum('fores_ins_pr_bri');
        $this->db->select_sum('fores_ins_pr_gha');
        $this->db->select_sum('fores_ins_sn_num');
        $this->db->select_sum('fores_ins_sn_nei');
        $this->db->select_sum('fores_ins_sn_bri');
        $this->db->select_sum('fores_ins_sn_gha');
        $this->db->select_sum('fores_ins_th_num');
        $this->db->select_sum('fores_ins_th_bri');
        $this->db->select_sum('fores_ins_th_gha');
        $this->db->select_sum('fores_ins_wa_num');
        $this->db->select_sum('fores_ins_wa_bri');
        $this->db->select_sum('fores_ins_wa_gha');
        $this->db->select_sum('fores_ins_up_num');
        $this->db->select_sum('fores_ins_up_bri');
        $this->db->select_sum('fores_ins_up_gha');
        $this->db->select_sum('fores_ins_ss_num');
        $this->db->select_sum('fores_ins_ss_bri');
        $this->db->select_sum('fores_ins_ss_gha');
        $this->db->select_sum('live_stock_pr_num');
        $this->db->select_sum('live_stock_pr_bri');
        $this->db->select_sum('live_stock_pr_gha');
        $this->db->select_sum('live_stock_sn_num');
        $this->db->select_sum('live_stock_sn_nei');
        $this->db->select_sum('live_stock_sn_bri');
        $this->db->select_sum('live_stock_sn_gha');
        $this->db->select_sum('live_stock_th_num');
        $this->db->select_sum('live_stock_th_bri');
        $this->db->select_sum('live_stock_th_gha');
        $this->db->select_sum('live_stock_wa_num');
        $this->db->select_sum('live_stock_wa_bri');
        $this->db->select_sum('live_stock_wa_gha');
        $this->db->select_sum('live_stock_up_num');
        $this->db->select_sum('live_stock_up_bri');
        $this->db->select_sum('live_stock_up_gha');
        $this->db->select_sum('live_stock_ss_num');
        $this->db->select_sum('live_stock_ss_bri');
        $this->db->select_sum('live_stock_ss_gha');
        $this->db->select_sum('fish_shor_pr_num');
        $this->db->select_sum('fish_shor_pr_bri');
        $this->db->select_sum('fish_shor_pr_gha');
        $this->db->select_sum('fish_shor_sn_num');
        $this->db->select_sum('fish_shor_sn_nei');
        $this->db->select_sum('fish_shor_sn_bri');
        $this->db->select_sum('fish_shor_sn_gha');
        $this->db->select_sum('fish_shor_th_num');
        $this->db->select_sum('fish_shor_th_bri');
        $this->db->select_sum('fish_shor_th_gha');
        $this->db->select_sum('fish_shor_wa_num');
        $this->db->select_sum('fish_shor_wa_bri');
        $this->db->select_sum('fish_shor_wa_gha');
        $this->db->select_sum('fish_shor_up_num');
        $this->db->select_sum('fish_shor_up_bri');
        $this->db->select_sum('fish_shor_up_gha');
        $this->db->select_sum('fish_shor_ss_num');
        $this->db->select_sum('fish_shor_ss_bri');
        $this->db->select_sum('fish_shor_ss_gha');
        $this->db->select_sum('fish_beshor_pr_num');
        $this->db->select_sum('fish_beshor_pr_bri');
        $this->db->select_sum('fish_beshor_pr_gha');
        $this->db->select_sum('fish_beshor_sn_num');
        $this->db->select_sum('fish_beshor_sn_nei');
        $this->db->select_sum('fish_beshor_sn_bri');
        $this->db->select_sum('fish_beshor_sn_gha');
        $this->db->select_sum('fish_beshor_th_num');
        $this->db->select_sum('fish_beshor_th_bri');
        $this->db->select_sum('fish_beshor_th_gha');
        $this->db->select_sum('fish_beshor_wa_num');
        $this->db->select_sum('fish_beshor_wa_bri');
        $this->db->select_sum('fish_beshor_wa_gha');
        $this->db->select_sum('fish_beshor_up_num');
        $this->db->select_sum('fish_beshor_up_bri');
        $this->db->select_sum('fish_beshor_up_gha');
        $this->db->select_sum('fish_beshor_ss_num');
        $this->db->select_sum('fish_beshor_ss_bri');
        $this->db->select_sum('fish_beshor_ss_gha');
        $this->db->select_sum('marine_ins_pr_num');
        $this->db->select_sum('marine_ins_pr_bri');
        $this->db->select_sum('marine_ins_pr_gha');
        $this->db->select_sum('marine_ins_sn_num');
        $this->db->select_sum('marine_ins_sn_nei');
        $this->db->select_sum('marine_ins_sn_bri');
        $this->db->select_sum('marine_ins_sn_gha');
        $this->db->select_sum('marine_ins_th_num');
        $this->db->select_sum('marine_ins_th_bri');
        $this->db->select_sum('marine_ins_th_gha');
        $this->db->select_sum('marine_ins_wa_num');
        $this->db->select_sum('marine_ins_wa_bri');
        $this->db->select_sum('marine_ins_wa_gha');
        $this->db->select_sum('marine_ins_up_num');
        $this->db->select_sum('marine_ins_up_bri');
        $this->db->select_sum('marine_ins_up_gha');
        $this->db->select_sum('marine_ins_ss_num');
        $this->db->select_sum('marine_ins_ss_bri');
        $this->db->select_sum('marine_ins_ss_gha');
        $this->db->select_sum('gra_art_ins_pr_num');
        $this->db->select_sum('gra_art_ins_pr_bri');
        $this->db->select_sum('gra_art_ins_pr_gha');
        $this->db->select_sum('gra_art_ins_sn_num');
        $this->db->select_sum('gra_art_ins_sn_nei');
        $this->db->select_sum('gra_art_ins_sn_bri');
        $this->db->select_sum('gra_art_ins_sn_gha');
        $this->db->select_sum('gra_art_ins_th_num');
        $this->db->select_sum('gra_art_ins_th_bri');
        $this->db->select_sum('gra_art_ins_th_gha');
        $this->db->select_sum('gra_art_ins_wa_num');
        $this->db->select_sum('gra_art_ins_wa_bri');
        $this->db->select_sum('gra_art_ins_wa_gha');
        $this->db->select_sum('gra_art_ins_up_num');
        $this->db->select_sum('gra_art_ins_up_bri');
        $this->db->select_sum('gra_art_ins_up_gha');
        $this->db->select_sum('gra_art_ins_ss_num');
        $this->db->select_sum('gra_art_ins_ss_bri');
        $this->db->select_sum('gra_art_ins_ss_gha');
        $this->db->select_sum('h_it_shor_pr_num');
        $this->db->select_sum('h_it_shor_pr_bri');
        $this->db->select_sum('h_it_shor_pr_gha');
        $this->db->select_sum('h_it_shor_sn_num');
        $this->db->select_sum('h_it_shor_sn_nei');
        $this->db->select_sum('h_it_shor_sn_bri');
        $this->db->select_sum('h_it_shor_sn_gha');
        $this->db->select_sum('h_it_shor_th_num');
        $this->db->select_sum('h_it_shor_th_bri');
        $this->db->select_sum('h_it_shor_th_gha');
        $this->db->select_sum('h_it_shor_wa_num');
        $this->db->select_sum('h_it_shor_wa_bri');
        $this->db->select_sum('h_it_shor_wa_gha');
        $this->db->select_sum('h_it_shor_up_num');
        $this->db->select_sum('h_it_shor_up_bri');
        $this->db->select_sum('h_it_shor_up_gha');
        $this->db->select_sum('h_it_shor_ss_num');
        $this->db->select_sum('h_it_shor_ss_bri');
        $this->db->select_sum('h_it_shor_ss_gha');
        $this->db->select_sum('h_it_beshor_pr_num');
        $this->db->select_sum('h_it_beshor_pr_bri');
        $this->db->select_sum('h_it_beshor_pr_gha');
        $this->db->select_sum('h_it_beshor_sn_num');
        $this->db->select_sum('h_it_beshor_sn_nei');
        $this->db->select_sum('h_it_beshor_sn_bri');
        $this->db->select_sum('h_it_beshor_sn_gha');
        $this->db->select_sum('h_it_beshor_th_num');
        $this->db->select_sum('h_it_beshor_th_bri');
        $this->db->select_sum('h_it_beshor_th_gha');
        $this->db->select_sum('h_it_beshor_wa_num');
        $this->db->select_sum('h_it_beshor_wa_bri');
        $this->db->select_sum('h_it_beshor_wa_gha');
        $this->db->select_sum('h_it_beshor_up_num');
        $this->db->select_sum('h_it_beshor_up_bri');
        $this->db->select_sum('h_it_beshor_up_gha');
        $this->db->select_sum('h_it_beshor_ss_num');
        $this->db->select_sum('h_it_beshor_ss_bri');
        $this->db->select_sum('h_it_beshor_ss_gha');
        $this->db->select_sum('mat_shor_pr_num');
        $this->db->select_sum('mat_shor_pr_bri');
        $this->db->select_sum('mat_shor_pr_gha');
        $this->db->select_sum('mat_shor_sn_num');
        $this->db->select_sum('mat_shor_sn_nei');
        $this->db->select_sum('mat_shor_sn_bri');
        $this->db->select_sum('mat_shor_sn_gha');
        $this->db->select_sum('mat_shor_th_num');
        $this->db->select_sum('mat_shor_th_bri');
        $this->db->select_sum('mat_shor_th_gha');
        $this->db->select_sum('mat_shor_wa_num');
        $this->db->select_sum('mat_shor_wa_bri');
        $this->db->select_sum('mat_shor_wa_gha');
        $this->db->select_sum('mat_shor_up_num');
        $this->db->select_sum('mat_shor_up_bri');
        $this->db->select_sum('mat_shor_up_gha');
        $this->db->select_sum('mat_shor_ss_num');
        $this->db->select_sum('mat_shor_ss_bri');
        $this->db->select_sum('mat_shor_ss_gha');
        $this->db->select_sum('mat_beshor_pr_num');
        $this->db->select_sum('mat_beshor_pr_bri');
        $this->db->select_sum('mat_beshor_pr_gha');
        $this->db->select_sum('mat_beshor_sn_num');
        $this->db->select_sum('mat_beshor_sn_nei');
        $this->db->select_sum('mat_beshor_sn_bri');
        $this->db->select_sum('mat_beshor_sn_gha');
        $this->db->select_sum('mat_beshor_th_num');
        $this->db->select_sum('mat_beshor_th_bri');
        $this->db->select_sum('mat_beshor_th_gha');
        $this->db->select_sum('mat_beshor_wa_num');
        $this->db->select_sum('mat_beshor_wa_bri');
        $this->db->select_sum('mat_beshor_wa_gha');
        $this->db->select_sum('mat_beshor_up_num');
        $this->db->select_sum('mat_beshor_up_bri');
        $this->db->select_sum('mat_beshor_up_gha');
        $this->db->select_sum('mat_beshor_ss_num');
        $this->db->select_sum('mat_beshor_ss_bri');
        $this->db->select_sum('mat_beshor_ss_gha');
        $this->db->select_sum('nursing_ins_pr_num');
        $this->db->select_sum('nursing_ins_pr_bri');
        $this->db->select_sum('nursing_ins_pr_gha');
        $this->db->select_sum('nursing_ins_sn_num');
        $this->db->select_sum('nursing_ins_sn_nei');
        $this->db->select_sum('nursing_ins_sn_bri');
        $this->db->select_sum('nursing_ins_sn_gha');
        $this->db->select_sum('nursing_ins_th_num');
        $this->db->select_sum('nursing_ins_th_bri');
        $this->db->select_sum('nursing_ins_th_gha');
        $this->db->select_sum('nursing_ins_wa_num');
        $this->db->select_sum('nursing_ins_wa_bri');
        $this->db->select_sum('nursing_ins_wa_gha');
        $this->db->select_sum('nursing_ins_up_num');
        $this->db->select_sum('nursing_ins_up_bri');
        $this->db->select_sum('nursing_ins_up_gha');
        $this->db->select_sum('nursing_ins_ss_num');
        $this->db->select_sum('nursing_ins_ss_bri');
        $this->db->select_sum('nursing_ins_ss_gha');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
       
        $this->data['college_shongothon'] = $this->db->get('college_shongothon')->first_row('array');
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('college_shongothon');
            $this->data['college_shongothon'] = $query->first_row('array');
        }
        
		$this->data['m'] = 'college';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/college/college_page_one_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
		$this->page_construct('departmentsreport/college/college_page_one', $meta, $this->data,'leftmenu/departmentsreport');
	}

    function college_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/college-page-two/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
            admin_redirect('departmentsreport/college-page-two/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('shodossho_pres_num');
        $this->db->select_sum('shodossho_bri_mu');
        $this->db->select_sum('shodossho_ssc_a_plus');
        $this->db->select_sum('shodossho_ssc_a_grade');
        $this->db->select_sum('shodossho_science');
        $this->db->select_sum('shodossho_arts');
        $this->db->select_sum('shodossho_commerce');
        $this->db->select_sum('shodossho_poli');
        $this->db->select_sum('shodossho_marine_ins');
        $this->db->select_sum('shodossho_text_ins');
        $this->db->select_sum('shodossho_agri_ins');
        $this->db->select_sum('shodossho_hit_ins');
        $this->db->select_sum('shodossho_mats_ins');
        $this->db->select_sum('proshno_pres_num');
        $this->db->select_sum('proshno_bri_mu');
        $this->db->select_sum('proshno_ssc_a_plus');
        $this->db->select_sum('proshno_ssc_a_grade');
        $this->db->select_sum('proshno_science');
        $this->db->select_sum('proshno_arts');
        $this->db->select_sum('proshno_commerce');
        $this->db->select_sum('proshno_poli');
        $this->db->select_sum('proshno_marine_ins');
        $this->db->select_sum('proshno_text_ins');
        $this->db->select_sum('proshno_agri_ins');
        $this->db->select_sum('proshno_hit_ins');
        $this->db->select_sum('proshno_mats_ins');
        $this->db->select_sum('abedon_pres_num');
        $this->db->select_sum('abedon_bri_mu');
        $this->db->select_sum('abedon_ssc_a_plus');
        $this->db->select_sum('abedon_ssc_a_grade');
        $this->db->select_sum('abedon_science');
        $this->db->select_sum('abedon_arts');
        $this->db->select_sum('abedon_commerce');
        $this->db->select_sum('abedon_poli');
        $this->db->select_sum('abedon_marine_ins');
        $this->db->select_sum('abedon_text_ins');
        $this->db->select_sum('abedon_agri_ins');
        $this->db->select_sum('abedon_hit_ins');
        $this->db->select_sum('abedon_mats_ins');
        $this->db->select_sum('sathi_pres_num');
        $this->db->select_sum('sathi_bri_mu');
        $this->db->select_sum('sathi_ssc_a_plus');
        $this->db->select_sum('sathi_ssc_a_grade');
        $this->db->select_sum('sathi_science');
        $this->db->select_sum('sathi_arts');
        $this->db->select_sum('sathi_commerce');
        $this->db->select_sum('sathi_poli');
        $this->db->select_sum('sathi_marine_ins');
        $this->db->select_sum('sathi_text_ins');
        $this->db->select_sum('sathi_agri_ins');
        $this->db->select_sum('sathi_hit_ins');
        $this->db->select_sum('sathi_mats_ins');
        $this->db->select_sum('sathi_prarthi_pres_num');
        $this->db->select_sum('sathi_prarthi_bri_mu');
        $this->db->select_sum('sathi_prarthi_ssc_a_plus');
        $this->db->select_sum('sathi_prarthi_ssc_a_grade');
        $this->db->select_sum('sathi_prarthi_science');
        $this->db->select_sum('sathi_prarthi_arts');
        $this->db->select_sum('sathi_prarthi_commerce');
        $this->db->select_sum('sathi_prarthi_poli');
        $this->db->select_sum('sathi_prarthi_marine_ins');
        $this->db->select_sum('sathi_prarthi_text_ins');
        $this->db->select_sum('sathi_prarthi_agri_ins');
        $this->db->select_sum('sathi_prarthi_hit_ins');
        $this->db->select_sum('sathi_prarthi_mats_ins');
        $this->db->select_sum('kormi_pres_num');
        $this->db->select_sum('kormi_bri_mu');
        $this->db->select_sum('kormi_ssc_a_plus');
        $this->db->select_sum('kormi_ssc_a_grade');
        $this->db->select_sum('kormi_science');
        $this->db->select_sum('kormi_arts');
        $this->db->select_sum('kormi_commerce');
        $this->db->select_sum('kormi_poli');
        $this->db->select_sum('kormi_marine_ins');
        $this->db->select_sum('kormi_text_ins');
        $this->db->select_sum('kormi_agri_ins');
        $this->db->select_sum('kormi_hit_ins');
        $this->db->select_sum('kormi_mats_ins');
        $this->db->select_sum('shomorthok_pres_num');
        $this->db->select_sum('shomorthok_bri_mu');
        $this->db->select_sum('shomorthok_ssc_a_plus');
        $this->db->select_sum('shomorthok_ssc_a_grade');
        $this->db->select_sum('shomorthok_science');
        $this->db->select_sum('shomorthok_arts');
        $this->db->select_sum('shomorthok_commerce');
        $this->db->select_sum('shomorthok_poli');
        $this->db->select_sum('shomorthok_marine_ins');
        $this->db->select_sum('shomorthok_text_ins');
        $this->db->select_sum('shomorthok_agri_ins');
        $this->db->select_sum('shomorthok_hit_ins');
        $this->db->select_sum('shomorthok_mats_ins');
        $this->db->select_sum('bondhu_pres_num');
        $this->db->select_sum('bondhu_bri_mu');
        $this->db->select_sum('bondhu_ssc_a_plus');
        $this->db->select_sum('bondhu_ssc_a_grade');
        $this->db->select_sum('bondhu_science');
        $this->db->select_sum('bondhu_arts');
        $this->db->select_sum('bondhu_commerce');
        $this->db->select_sum('bondhu_poli');
        $this->db->select_sum('bondhu_marine_ins');
        $this->db->select_sum('bondhu_text_ins');
        $this->db->select_sum('bondhu_agri_ins');
        $this->db->select_sum('bondhu_hit_ins');
        $this->db->select_sum('bondhu_mats_ins');
        $this->db->select_sum('uposhakha_pres_num');
        $this->db->select_sum('uposhakha_bri_mu');
        $this->db->select_sum('uposhakha_ssc_a_plus');
        $this->db->select_sum('uposhakha_ssc_a_grade');
        $this->db->select_sum('uposhakha_science');
        $this->db->select_sum('uposhakha_arts');
        $this->db->select_sum('uposhakha_commerce');
        $this->db->select_sum('uposhakha_poli');
        $this->db->select_sum('uposhakha_marine_ins');
        $this->db->select_sum('uposhakha_text_ins');
        $this->db->select_sum('uposhakha_agri_ins');
        $this->db->select_sum('uposhakha_hit_ins');
        $this->db->select_sum('uposhakha_mats_ins');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['college_manpower_dawat'] = $this->db->get('college_manpower_dawat')->first_row('array');


        $this->db->select_sum('nobinboron_num');
        $this->db->select_sum('nobinboron_pre');
        $this->db->select_sum('edu_tour_num');
        $this->db->select_sum('edu_tour_pre');
        $this->db->select_sum('kriti_stu_num');
        $this->db->select_sum('kriti_stu_pre');
        $this->db->select_sum('quiz_num');
        $this->db->select_sum('quiz_pre');
        $this->db->select_sum('odommo_num');
        $this->db->select_sum('odommo_pre');
        $this->db->select_sum('edu_upokoron_num');
        $this->db->select_sum('edu_upokoron_pre');
        $this->db->select_sum('bitorko_num');
        $this->db->select_sum('bitorko_pre');
        $this->db->select_sum('kria_num');
        $this->db->select_sum('kria_pre');
        $this->db->select_sum('c_council_num');
        $this->db->select_sum('c_council_pre');
        $this->db->select_sum('c_guideline_num');
        $this->db->select_sum('c_guideline_pre');
        $this->db->select_sum('creative_search_program_num');
        $this->db->select_sum('creative_search_program_pre');
        $this->db->select_sum('sceience_olympiad_num');
        $this->db->select_sum('sceience_olympiad_pre');
        $this->db->select_sum('math_olympiad_num');
        $this->db->select_sum('math_olympiad_pre');
        $this->db->select_sum('dibos_palon_num');
        $this->db->select_sum('dibos_palon_pre');
        $this->db->select_sum('model_test_num');
        $this->db->select_sum('model_test_pre');
        $this->db->select_sum('language_num');
        $this->db->select_sum('language_pre');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_akorshon_program'] = $this->db->get('college_akorshon_program')->first_row('array');

        $this->db->select_sum('shodossho_s_mot_examine');
        $this->db->select_sum('shodossho_s_gpa_5');
        $this->db->select_sum('shodossho_s_a_grade');
        $this->db->select_sum('shodossho_s_a_minus');
        $this->db->select_sum('shodossho_s_b_grade');
        $this->db->select_sum('shodossho_s_c_grade');
        $this->db->select_sum('shodossho_s_d_grade');
        $this->db->select_sum('shodossho_a_mot_examine');
        $this->db->select_sum('shodossho_a_gpa_5');
        $this->db->select_sum('shodossho_a_a_grade');
        $this->db->select_sum('shodossho_a_a_minus');
        $this->db->select_sum('shodossho_a_b_grade');
        $this->db->select_sum('shodossho_a_c_grade');
        $this->db->select_sum('shodossho_a_d_grade');
        $this->db->select_sum('shodossho_c_mot_examine');
        $this->db->select_sum('shodossho_c_gpa_5');
        $this->db->select_sum('shodossho_c_a_grade');
        $this->db->select_sum('shodossho_c_a_minus');
        $this->db->select_sum('shodossho_c_b_grade');
        $this->db->select_sum('shodossho_c_c_grade');
        $this->db->select_sum('shodossho_c_d_grade');
        $this->db->select_sum('sathi_s_mot_examine');
        $this->db->select_sum('sathi_s_gpa_5');
        $this->db->select_sum('sathi_s_a_grade');
        $this->db->select_sum('sathi_s_a_minus');
        $this->db->select_sum('sathi_s_b_grade');
        $this->db->select_sum('sathi_s_c_grade');
        $this->db->select_sum('sathi_s_d_grade');
        $this->db->select_sum('sathi_a_mot_examine');
        $this->db->select_sum('sathi_a_gpa_5');
        $this->db->select_sum('sathi_a_a_grade');
        $this->db->select_sum('sathi_a_a_minus');
        $this->db->select_sum('sathi_a_b_grade');
        $this->db->select_sum('sathi_a_c_grade');
        $this->db->select_sum('sathi_a_d_grade');
        $this->db->select_sum('sathi_c_mot_examine');
        $this->db->select_sum('sathi_c_gpa_5');
        $this->db->select_sum('sathi_c_a_grade');
        $this->db->select_sum('sathi_c_a_minus');
        $this->db->select_sum('sathi_c_b_grade');
        $this->db->select_sum('sathi_c_c_grade');
        $this->db->select_sum('sathi_c_d_grade');
        $this->db->select_sum('kormi_s_mot_examine');
        $this->db->select_sum('kormi_s_gpa_5');
        $this->db->select_sum('kormi_s_a_grade');
        $this->db->select_sum('kormi_s_a_minus');
        $this->db->select_sum('kormi_s_b_grade');
        $this->db->select_sum('kormi_s_c_grade');
        $this->db->select_sum('kormi_s_d_grade');
        $this->db->select_sum('kormi_a_mot_examine');
        $this->db->select_sum('kormi_a_gpa_5');
        $this->db->select_sum('kormi_a_a_grade');
        $this->db->select_sum('kormi_a_a_minus');
        $this->db->select_sum('kormi_a_b_grade');
        $this->db->select_sum('kormi_a_c_grade');
        $this->db->select_sum('kormi_a_d_grade');
        $this->db->select_sum('kormi_c_mot_examine');
        $this->db->select_sum('kormi_c_gpa_5');
        $this->db->select_sum('kormi_c_a_grade');
        $this->db->select_sum('kormi_c_a_minus');
        $this->db->select_sum('kormi_c_b_grade');
        $this->db->select_sum('kormi_c_c_grade');
        $this->db->select_sum('kormi_c_d_grade');
        $this->db->select_sum('shomorthok_s_mot_examine');
        $this->db->select_sum('shomorthok_s_gpa_5');
        $this->db->select_sum('shomorthok_s_a_grade');
        $this->db->select_sum('shomorthok_s_a_minus');
        $this->db->select_sum('shomorthok_s_b_grade');
        $this->db->select_sum('shomorthok_s_c_grade');
        $this->db->select_sum('shomorthok_s_d_grade');
        $this->db->select_sum('shomorthok_a_mot_examine');
        $this->db->select_sum('shomorthok_a_gpa_5');
        $this->db->select_sum('shomorthok_a_a_grade');
        $this->db->select_sum('shomorthok_a_a_minus');
        $this->db->select_sum('shomorthok_a_b_grade');
        $this->db->select_sum('shomorthok_a_c_grade');
        $this->db->select_sum('shomorthok_a_d_grade');
        $this->db->select_sum('shomorthok_c_mot_examine');
        $this->db->select_sum('shomorthok_c_gpa_5');
        $this->db->select_sum('shomorthok_c_a_grade');
        $this->db->select_sum('shomorthok_c_a_minus');
        $this->db->select_sum('shomorthok_c_b_grade');
        $this->db->select_sum('shomorthok_c_c_grade');
        $this->db->select_sum('shomorthok_c_d_grade');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['college_hsc_result'] = $this->db->get('college_hsc_result')->first_row('array');

    }
    else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('college_manpower_dawat');
            $this->data['college_manpower_dawat'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('college_akorshon_program');
            $this->data['college_akorshon_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('college_hsc_result');
            $this->data['college_hsc_result'] = $query->first_row('array');
    }
       


        $this->data['m'] = 'college';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/college/college_page_two_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/college/college_page_two', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function college_page_three($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
		    $this->session->set_flashdata('warning', lang('access_denied'));
		    admin_redirect('departmentsreport/college-page-three/'.$this->session->userdata('branch_id'));
		}else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
		    admin_redirect('departmentsreport/college-page-three/'.$this->session->userdata('branch_id'));
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

        $this->db->select_sum('member_vorti__num');
        $this->db->select_sum('member_vorti__sv');
        $this->db->select_sum('member_vorti__mp_sv');
        $this->db->select_sum('member_med_vorticchu');
        $this->db->select_sum('member_med_chance');
        $this->db->select_sum('member_eng_vorticchu');
        $this->db->select_sum('member_eng_chance');
        $this->db->select_sum('member_var_vorticchu');
        $this->db->select_sum('member_var_chance');
        $this->db->select_sum('sathi_vorti__num');
        $this->db->select_sum('sathi_vorti__sv');
        $this->db->select_sum('sathi_vorti__mp_sv');
        $this->db->select_sum('sathi_med_vorticchu');
        $this->db->select_sum('sathi_med_chance');
        $this->db->select_sum('sathi_eng_vorticchu');
        $this->db->select_sum('sathi_eng_chance');
        $this->db->select_sum('sathi_var_vorticchu');
        $this->db->select_sum('sathi_var_chance');
        $this->db->select_sum('kormi_vorti__num');
        $this->db->select_sum('kormi_vorti__sv');
        $this->db->select_sum('kormi_vorti__mp_sv');
        $this->db->select_sum('kormi_med_vorticchu');
        $this->db->select_sum('kormi_med_chance');
        $this->db->select_sum('kormi_eng_vorticchu');
        $this->db->select_sum('kormi_eng_chance');
        $this->db->select_sum('kormi_var_vorticchu');
        $this->db->select_sum('kormi_var_chance');
        $this->db->select_sum('shomorthok_vorti__num');
        $this->db->select_sum('shomorthok_vorti__sv');
        $this->db->select_sum('shomorthok_vorti__mp_sv');
        $this->db->select_sum('shomorthok_med_vorticchu');
        $this->db->select_sum('shomorthok_med_chance');
        $this->db->select_sum('shomorthok_eng_vorticchu');
        $this->db->select_sum('shomorthok_eng_chance');
        $this->db->select_sum('shomorthok_var_vorticchu');
        $this->db->select_sum('shomorthok_var_chance');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_vorti_supervision'] = $this->db->get('college_vorti_supervision')->first_row('array');


        $this->db->select_sum('hsc_home_prev_num');
        $this->db->select_sum('hsc_home_pres_num');
        $this->db->select_sum('hsc_home_bri');
        $this->db->select_sum('hsc_home_gha');
        $this->db->select_sum('hsc_home_gha_karon');
        $this->db->select_sum('hsc_stu_prev_num');
        $this->db->select_sum('hsc_stu_pres_num');
        $this->db->select_sum('hsc_stu_bri');
        $this->db->select_sum('hsc_stu_gha');
        $this->db->select_sum('med_home_prev_num');
        $this->db->select_sum('med_home_pres_num');
        $this->db->select_sum('med_home_bri');
        $this->db->select_sum('med_home_gha');
        $this->db->select_sum('med_home_gha_karon');
        $this->db->select_sum('med_stu_prev_num');
        $this->db->select_sum('med_stu_pres_num');
        $this->db->select_sum('med_stu_bri');
        $this->db->select_sum('med_stu_gha');
        $this->db->select_sum('eng_home_prev_num');
        $this->db->select_sum('eng_home_pres_num');
        $this->db->select_sum('eng_home_bri');
        $this->db->select_sum('eng_home_gha');
        $this->db->select_sum('eng_home_gha_karon');
        $this->db->select_sum('eng_stu_prev_num');
        $this->db->select_sum('eng_stu_pres_num');
        $this->db->select_sum('eng_stu_bri');
        $this->db->select_sum('eng_stu_gha');
        $this->db->select_sum('var_home_prev_num');
        $this->db->select_sum('var_home_pres_num');
        $this->db->select_sum('var_home_bri');
        $this->db->select_sum('var_home_gha');
        $this->db->select_sum('var_home_gha_karon');
        $this->db->select_sum('var_stu_prev_num');
        $this->db->select_sum('var_stu_pres_num');
        $this->db->select_sum('var_stu_bri');
        $this->db->select_sum('var_stu_gha');
        $this->db->select_sum('agri_home_prev_num');
        $this->db->select_sum('agri_home_pres_num');
        $this->db->select_sum('agri_home_bri');
        $this->db->select_sum('agri_home_gha');
        $this->db->select_sum('agri_home_gha_karon');
        $this->db->select_sum('agri_stu_prev_num');
        $this->db->select_sum('agri_stu_pres_num');
        $this->db->select_sum('agri_stu_bri');
        $this->db->select_sum('agri_stu_gha');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_ideal_home'] = $this->db->get('college_ideal_home')->first_row('array');

        $this->db->select_sum('shakhar_jonoshokti_nijukto');
        $this->db->select_sum('target_member');
        $this->db->select_sum('target_sathi');
        $this->db->select_sum('target_kormi');
        $this->db->select_sum('target_shomorthok');
        $this->db->select_sum('s_vision_member');
        $this->db->select_sum('s_vision_sathi');
        $this->db->select_sum('s_vision_kormi');
        $this->db->select_sum('s_vision_shomorkthok');
        $this->db->select_sum('s_vision_contact_jon');
        $this->db->select_sum('s_vision_contact_bar');
        if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_bridging_1'] = $this->db->get('college_bridging_1')->first_row('array');

        $this->db->select_sum('hsc_first_mem');
        $this->db->select_sum('hsc_first_asso');
        $this->db->select_sum('hsc_first_worker');
        $this->db->select_sum('hsc_first_suppor');
        $this->db->select_sum('hsc_sec_mem');
        $this->db->select_sum('hsc_sec_asso');
        $this->db->select_sum('hsc_sec_worker');
        $this->db->select_sum('hsc_sec_suppor');
        $this->db->select_sum('bridging_pro');
        $this->db->select_sum('supervision');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_bridging_2'] = $this->db->get('college_bridging_2')->first_row('array');

        $this->db->select_sum('deploma_manpower_central_s');
        $this->db->select_sum('deploma_manpower_central_p');
        $this->db->select_sum('deploma_general_central_s');
        $this->db->select_sum('deploma_general_central_p'); 
        $this->db->select_sum('deploma_manpower_shakha_s');
        $this->db->select_sum('deploma_manpower_shakha_p');
        $this->db->select_sum('deploma_general_shakha_s');
        $this->db->select_sum('deploma_general_shakha_p'); 
        $this->db->select_sum('political_manpower_central_s');
        $this->db->select_sum('political_manpower_central_p');
        $this->db->select_sum('political_general_central_s');
        $this->db->select_sum('political_general_central_p'); 
        $this->db->select_sum('political_manpower_shakha_s');
        $this->db->select_sum('political_manpower_shakha_p');
        $this->db->select_sum('political_general_shakha_s');
        $this->db->select_sum('political_general_shakha_p'); 
        $this->db->select_sum('hsc_manpower_central_s');
        $this->db->select_sum('hsc_manpower_central_p');
        $this->db->select_sum('hsc_general_central_s');
        $this->db->select_sum('hsc_general_central_p'); 
        $this->db->select_sum('hsc_manpower_shakha_s');
        $this->db->select_sum('hsc_manpower_shakha_p');
        $this->db->select_sum('hsc_general_shakha_s');
        $this->db->select_sum('hsc_general_shakha_p'); 
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->data['college_summit'] = $this->db->get('college_summit')->first_row('array');

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
        $this->data['college_training_program'] = $this->db->get('college_training_program')->first_row('array');
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_summit');
        $this->data['college_summit'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_training_program');
        $this->data['college_training_program'] = $query->first_row('array');	

        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_vorti_supervision');
        $this->data['college_vorti_supervision'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_ideal_home');
        $this->data['college_ideal_home'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_bridging_1');
        $this->data['college_bridging_1'] = $query->first_row('array');
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('college_bridging_2');
        $this->data['college_bridging_2'] = $query->first_row('array');
    }
       


		$this->data['m'] = 'college';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        
		if($branch_id)
		$this->page_construct('departmentsreport/college/college_page_three_entry', $meta, $this->data,'leftmenu/departmentsreport');
        else
        $this->page_construct('departmentsreport/college/college_page_three', $meta, $this->data,'leftmenu/departmentsreport');
        
		
    }


    


	
function report_type1(){
	
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
