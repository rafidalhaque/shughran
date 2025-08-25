<?php defined('BASEPATH') or exit('No direct script access allowed');

class Social extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 30) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 30) { //Environment & Social
            $this->departmentuser = true;
        }

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 30
        $this->data['department_id'] = 30;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (30)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>30), 'id desc', 1, 0);

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


    function social_welfare_bivag($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/social-welfare-bivag/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/social-welfare-bivag/' . $this->session->userdata('branch_id'));
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

    
        $this->db->select_sum('chara_ropor');
        $this->db->select_sum('chara_bitoron');
        $this->db->select_sum('koto_joner_majhe');
        $this->db->select_sum('koto_jonoshokti');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_brikkho_ropon'] = $this->db->get('social_welfare_brikkho_ropon')->first_row('array');
        
        $this->db->select_sum('total_roktodata_shongothon');
        $this->db->select_sum('total_donor');
        $this->db->select_sum('donor_briddhi');
        $this->db->select_sum('kotojon_k_blood_deya');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_roktodata'] = $this->db->get('social_welfare_roktodata')->first_row('array');
        
        $this->db->select_sum('program');
        $this->db->select_sum('present');
        $this->db->select_sum('upokoron');
        $this->db->select_sum('shikhece');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_shakhorota_ovijan'] = $this->db->get('social_welfare_shakhorota_ovijan')->first_row('array');
        
        $this->db->select_sum('free_medical_camp_ti');
        $this->db->select_sum('free_medical_camp_pre');
        $this->db->select_sum('free_blood_grouping_ti');
        $this->db->select_sum('free_blood_grouping_pre');
        $this->db->select_sum('porishkar_poricchonnota_ti');
        $this->db->select_sum('porishkar_poricchonnota_pre');
        $this->db->select_sum('sastho_shochetonota_ti');
        $this->db->select_sum('sastho_shochetonota_pre');
        $this->db->select_sum('poribesh_o_shamajik_ti');
        $this->db->select_sum('poribesh_o_shamajik_pre');
        $this->db->select_sum('shamajik_dayittobodh_ti');
        $this->db->select_sum('shamajik_dayittobodh_pre');
        $this->db->select_sum('shubidha_bonchito_ti');
        $this->db->select_sum('shubidha_bonchito_pre');
        $this->db->select_sum('school_madrasah_ti');
        $this->db->select_sum('school_madrasah_pre');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_shebamulok_program'] = $this->db->get('social_welfare_shebamulok_program')->first_row('array');
        
        $this->db->select_sum('binamulle_boi_bitoron_jon');
        $this->db->select_sum('binamulle_boi_bitoron_ti');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_shikkha_upokoron'] = $this->db->get('social_welfare_shikkha_upokoron')->first_row('array');
        
        $this->db->select_sum('shikkha_britti_jon');
        $this->db->select_sum('shikkha_britti_ti');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_arthik_shohayota'] = $this->db->get('social_welfare_arthik_shohayota')->first_row('array');
        
        $this->db->select_sum('yatim_o_onath');
        $this->db->select_sum('bonna_ba_onnanno');
        $this->db->select_sum('qurbanir_goshto');
        $this->db->select_sum('eid_shamogri');
        $this->db->select_sum('shitbotsro');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_upohar'] = $this->db->get('social_welfare_upohar')->first_row('array');
           
        $this->db->select('*');
        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->db->order_by('branch_id');
        $query = $this->db->get('social_welfare_shamajik_shong');
        $this->data['social_welfare_shamajik_shong'] = $query;

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

        $this->data['social_welfare_training_program'] = $this->db->get('social_welfare_training_program')->first_row('array');
       
        $this->db->select_sum('agri_stu_center_manpower_num');
        $this->db->select_sum('agri_stu_center_manpower_pre');
        $this->db->select_sum('agri_stu_center_general_num');
        $this->db->select_sum('agri_stu_center_general_pre');
        $this->db->select_sum('agri_stu_shakha_manpower_num');
        $this->db->select_sum('agri_stu_shakha_manpower_pre');
        $this->db->select_sum('agri_stu_shakha_general_num');
        $this->db->select_sum('agri_stu_shakha_general_pre');
        $this->db->select_sum('medical_stu_center_manpower_num');
        $this->db->select_sum('medical_stu_center_manpower_pre');
        $this->db->select_sum('medical_stu_center_general_num');
        $this->db->select_sum('medical_stu_center_general_pre');
        $this->db->select_sum('medical_stu_shakha_manpower_num');
        $this->db->select_sum('medical_stu_shakha_manpower_pre');
        $this->db->select_sum('medical_stu_shakha_general_num');
        $this->db->select_sum('medical_stu_shakha_general_pre');

        if ($branch_id)
        $this->db->where('branch_id', $branch_id);
    $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $this->data['social_welfare_summit'] = $this->db->get('social_welfare_summit')->first_row('array');	
    }
    else{
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_summit');
        $this->data['social_welfare_summit'] = $query->first_row('array');	
    
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_training_program');
        $this->data['social_welfare_training_program'] = $query->first_row('array');	
    
        $this->db->select('*');
        $this->db->where('branch_id',$branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_training_program');
        $this->data['social_welfare_training_program'] = $query->first_row('array');	
    
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_brikkho_ropon');
        $this->data['social_welfare_brikkho_ropon'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_roktodata');
        $this->data['social_welfare_roktodata'] = $query->first_row('array');
        
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_shakhorota_ovijan');
        $this->data['social_welfare_shakhorota_ovijan'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_shebamulok_program');
        $this->data['social_welfare_shebamulok_program'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_shikkha_upokoron');
        $this->data['social_welfare_shikkha_upokoron'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_arthik_shohayota');
        $this->data['social_welfare_arthik_shohayota'] = $query->first_row('array');

        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_upohar');
        $this->data['social_welfare_upohar'] = $query->first_row('array');
        
        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

        $query = $this->db->get('social_welfare_shamajik_shong');
        $this->data['social_welfare_shamajik_shong'] = $query;


    }
       
        $this->data['m'] = 'social';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/social/social_welfare_bivag_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/social/social_welfare_bivag', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }
    function add_social_welfare_shamajik_shong($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-social-welfare-shamajik-shong/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-social-welfare-shamajik-shong/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('social_welfare_shamajik_shong'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['shong_name']=$this->input->post('shong_name');
			$data['reg_non_reg']=$this->input->post('reg_non_reg');
            $data['protishtha_shal']=$this->input->post('protishtha_shal');
            $data['cholti_session_kormoshuchi']=$this->input->post('cholti_session_kormoshuchi');
			$this->site->insertData('social_welfare_shamajik_shong',$data);
            header("Location: ".admin_url('departmentsreport/social-welfare-bivag/'.$this->data['branch_id']));
        }
        if($this->input->post('social_welfare_shamajik_shong_update'))
		{ 
;
            $data['shong_name']=$this->input->post('shong_name');
			$data['reg_non_reg']=$this->input->post('reg_non_reg');
            $data['protishtha_shal']=$this->input->post('protishtha_shal');
            $data['cholti_session_kormoshuchi']=$this->input->post('cholti_session_kormoshuchi');
			$this->site->updateData('social_welfare_shamajik_shong',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/social-welfare-bivag/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['social_welfare_shamajik_shong'] = $this->db->get('social_welfare_shamajik_shong')->first_row('array');

        }

        $this->data['m'] = 'social';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/social/add_social_welfare_shamajik_shong', $meta, $this->data,'leftmenu/departmentsreport');
    }


 

    ///////////////////////////////////////////////
///////////////////////////////////////////////
///////////register_non_register starts///////////
///////////////////////////////////////////////
///////////////////////////////////////////////

///////////////////////////////////////////////
///////////////////////////////////////////////
///////////register_non_register ends///////////
///////////////////////////////////////////////
///////////////////////////////////////////////

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
