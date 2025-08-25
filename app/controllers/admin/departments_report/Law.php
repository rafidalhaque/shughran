<?php defined('BASEPATH') or exit('No direct script access allowed');

class Law extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 7) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 7) { //literature
            $this->departmentuser = true;
        }
       
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id to 7
        $this->data['department_id'] = 7;

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
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>7), 'id desc', 1, 0);
     
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

    public function law_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/law-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/law-page-one/' . $this->session->userdata('branch_id'));
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


            // আমাদের বিপক্ষে মামলা

            $this->db->select_sum('t1_total_mamla');
            $this->db->select_sum('t1_total_ashami');
            $this->db->select_sum('t1_total_todontadhin_mamla');
            $this->db->select_sum('t1_total_css');
            $this->db->select_sum('t1_total_css_gotohon');
            $this->db->select_sum('t1_total_obbahoti');
            $this->db->select_sum('t1_total_shakkhi');
            $this->db->select_sum('t1_total_jukti_torko');
            $this->db->select_sum('t1_total_stay');
            $this->db->select_sum('t1_total_kowashment');
            $this->db->select_sum('t1_rayer_jonno_opekkha');
            $this->db->select_sum('t1_rayer_remand_ti');
            $this->db->select_sum('t1_rayer_remand_jon');
            $this->db->select_sum('t2_total_mamla');
            $this->db->select_sum('t2_total_ashami');
            $this->db->select_sum('t2_total_todontadhin_mamla');
            $this->db->select_sum('t2_total_css');
            $this->db->select_sum('t2_total_css_gotohon');
            $this->db->select_sum('t2_total_obbahoti');
            $this->db->select_sum('t2_total_shakkhi');
            $this->db->select_sum('t2_total_jukti_torko');
            $this->db->select_sum('t2_total_stay');
            $this->db->select_sum('t2_total_kowashment');
            $this->db->select_sum('t2_rayer_jonno_opekkha');
            $this->db->select_sum('t2_rayer_remand_ti');
            $this->db->select_sum('t2_rayer_remand_jon');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['law_amader_bipokkhe_mamla'] = $this->db->get('law_amader_bipokkhe_mamla')->first_row('array');

            // সাজা সংক্রান্ত মামলার তথ্য

            $this->db->select('*');  
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['law_shaja_shongkranto_mamla'] = $this->db->get('law_shaja_shongkranto_mamla');

            // খালাস সংক্রান্ত(২০০৯-২০২১) ঃ মোট খালাসপ্রাপ্ত মামলা সংখ্যা=

            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['law_khalash_inffo'] = $this->db->get('law_khalash_inffo');

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

            $this->data['law_training_program'] = $this->db->get('law_training_program')->first_row('array');
        
        }
        else{
            $this->db->select('*');
            $this->db->where('branch_id',$branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_training_program');
            $this->data['law_training_program'] = $query->first_row('array');	
        

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_amader_bipokkhe_mamla');
            $this->data['law_amader_bipokkhe_mamla'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_shaja_shongkranto_mamla');
            $this->data['law_shaja_shongkranto_mamla'] = $query;
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_khalash_inffo');
            $this->data['law_khalash_inffo'] = $query;

        }
        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/law/law_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/law/law_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    public function law_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/law-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/law-page-two/' . $this->session->userdata('branch_id'));
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

                $this->db->select_sum('law_stu_center_manpower_num');
                $this->db->select_sum('law_stu_center_manpower_pre');
        
                $this->db->select_sum('law_stu_center_general_num');
                $this->db->select_sum('law_stu_center_general_pre');
        
                $this->db->select_sum('law_stu_shakha_manpower_num');
                $this->db->select_sum('law_stu_shakha_manpower_pre');
        
                $this->db->select_sum('law_stu_shakha_general_num');
                $this->db->select_sum('law_stu_shakha_general_pre');

                if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

                $this->data['law_summit'] = $this->db->get('law_summit')->first_row('array');	
    
            $this->db->select_sum('t1_member');
            $this->db->select_sum('t1_sathi');
            $this->db->select_sum('t1_kormi');
            $this->db->select_sum('t1_shomorthok');
            $this->db->select_sum('t2_member');
            $this->db->select_sum('t2_sathi');
            $this->db->select_sum('t2_kormi');
            $this->db->select_sum('t2_shomorthok');
            $this->db->select_sum('t3_member');
            $this->db->select_sum('t3_sathi');
            $this->db->select_sum('t3_kormi');
            $this->db->select_sum('t3_shomorthok');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['law_karagar_greftar'] = $this->db->get('law_karagar_greftar')->first_row('array');

            // আমাদের পক্ষে থেকে মামলা সংক্রান্তঃ

            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['law_amader_pokkhe_mamla'] = $this->db->get('law_amader_pokkhe_mamla');

            // গুম, খুন, হামলা নির্যাতন বিষয়ে আমাদের পক্ষে থেকে পত্রিকায় প্রচারসংক্রান্তঃ

      
            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['law_gum_khun_hamla'] = $this->db->get('law_gum_khun_hamla');

            // শাখার সংরক্ষণে মামলার নথি-সংক্রান্ত পরিসংখ্যানঃ

            $this->db->select('*');
            if ($branch_id)
            $this->db->where('branch_id', $branch_id);
        $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by('branch_id');
            $this->data['law_shakhar_shongrokkhon'] = $this->db->get('law_shakhar_shongrokkhon');

        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_summit');
            $this->data['law_summit'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_karagar_greftar');
            $this->data['law_karagar_greftar'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_amader_pokkhe_mamla');
            $this->data['law_amader_pokkhe_mamla'] = $query;

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_gum_khun_hamla');
            $this->data['law_gum_khun_hamla'] = $query;
            
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date BETWEEN "2023-06-18" and "' . $report_type['end'] . '"');

            $query = $this->db->get('law_shakhar_shongrokkhon');
            $this->data['law_shakhar_shongrokkhon'] = $query;

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id) {
            $this->page_construct('departmentsreport/law/law_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/law/law_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
        }

    }

    function add_law_shaja_shongkranto_mamla($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-law-shaja-shongkranto-mamla/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-law-shaja-shongkranto-mamla/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('law_shaja_shongkranto_mamla'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['mamla_num']=$this->input->post('mamla_num');
			$data['law_dhara']=$this->input->post('law_dhara');
            $data['kobe_shaja_hoyechilo']=$this->input->post('kobe_shaja_hoyechilo');
			$data['shajar_meyad']=$this->input->post('shajar_meyad');
            $data['total_ashami']=$this->input->post('total_ashami');
            $data['shaja_kheteche']=$this->input->post('shaja_kheteche');
            $data['ashami_pokkher_apil']=$this->input->post('ashami_pokkher_apil');
            $data['comments']=$this->input->post('comments');
			$this->site->insertData('law_shaja_shongkranto_mamla',$data);
            header("Location: ".admin_url('departmentsreport/law-page-one/'.$this->data['branch_id']));
        }
        if($this->input->post('law_shaja_shongkranto_mamla_update'))
		{ 
            $data['mamla_num']=$this->input->post('mamla_num');
			$data['law_dhara']=$this->input->post('law_dhara');
            $data['kobe_shaja_hoyechilo']=$this->input->post('kobe_shaja_hoyechilo');
			$data['shajar_meyad']=$this->input->post('shajar_meyad');
            $data['total_ashami']=$this->input->post('total_ashami');
            $data['shaja_kheteche']=$this->input->post('shaja_kheteche');
            $data['ashami_pokkher_apil']=$this->input->post('ashami_pokkher_apil');
            $data['comments']=$this->input->post('comments');
			$this->site->updateData('law_shaja_shongkranto_mamla',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/law-page-one/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['law_shaja_shongkranto_mamla'] = $this->db->get('law_shaja_shongkranto_mamla')->first_row('array');

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/law/add_law_shaja_shongkranto_mamla', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_law_khalash_inffo($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-law-khalash-inffo/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-law-khalash-inffo/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('law_khalash_inffo'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');           
			$data['khalash_mamla_num']=$this->input->post('khalash_mamla_num');
            $data['total_ashami']=$this->input->post('total_ashami');
			$data['khalash_prapto_ashami']=$this->input->post('khalash_prapto_ashami');
            $data['badi_pokkher_apil']=$this->input->post('badi_pokkher_apil');
            $data['comments']=$this->input->post('comments');
			$this->site->insertData('law_khalash_inffo',$data);
            header("Location: ".admin_url('departmentsreport/law-page-one/'.$this->data['branch_id']));
        }
        if($this->input->post('law_khalash_inffo_update'))
		{ 
           
			$data['khalash_mamla_num']=$this->input->post('khalash_mamla_num');
            $data['total_ashami']=$this->input->post('total_ashami');
			$data['khalash_prapto_ashami']=$this->input->post('khalash_prapto_ashami');
            $data['badi_pokkher_apil']=$this->input->post('badi_pokkher_apil');
            $data['comments']=$this->input->post('comments');
			$this->site->updateData('law_khalash_inffo',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/law-page-one/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['law_khalash_inffo'] = $this->db->get('law_khalash_inffo')->first_row('array');

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/law/add_law_khalash_inffo', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_law_amader_pokkhe_mamla($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-law-amader-pokkhe-mamla/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-law-amader-pokkhe-mamla/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('law_amader_pokkhe_mamla'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');

            $data['mamlar_number']=$this->input->post('mamlar_number');
			$data['tarikh']=$this->input->post('tarikh');
            $data['badir_name']=$this->input->post('badir_name');
			$data['ashami_num']=$this->input->post('ashami_num');
            $data['ashami_porichoy']=$this->input->post('ashami_porichoy');
            $data['ray_hoyeche']=$this->input->post('ray_hoyeche');
            $data['rayer_folafol']=$this->input->post('rayer_folafol');
            $data['bortoman']=$this->input->post('bortoman');
			$this->site->insertData('law_amader_pokkhe_mamla',$data);
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('law_amader_pokkhe_mamla_update'))
		{ 
            $data['mamlar_number']=$this->input->post('mamlar_number');
			$data['tarikh']=$this->input->post('tarikh');
            $data['badir_name']=$this->input->post('badir_name');
			$data['ashami_num']=$this->input->post('ashami_num');
            $data['ashami_porichoy']=$this->input->post('ashami_porichoy');
            $data['ray_hoyeche']=$this->input->post('ray_hoyeche');
            $data['rayer_folafol']=$this->input->post('rayer_folafol');
            $data['bortoman']=$this->input->post('bortoman');
			$this->site->updateData('law_amader_pokkhe_mamla',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['law_amader_pokkhe_mamla'] = $this->db->get('law_amader_pokkhe_mamla')->first_row('array');

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/law/add_law_amader_pokkhe_mamla', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_law_gum_khun_hamla($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-law-gum-khun-hamla/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-law-gum-khun-hamla/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('law_gum_khun_hamla'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['ghotonar_tarikh']=$this->input->post('ghotonar_tarikh');
			$data['procharer_tarikh']=$this->input->post('procharer_tarikh');
            $data['potrikar_nam']=$this->input->post('potrikar_nam');
			$data['jader_bepare_prochar']=$this->input->post('jader_bepare_prochar');
            $data['shong_shommelon']=$this->input->post('shong_shommelon');
			$this->site->insertData('law_gum_khun_hamla',$data);
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('law_gum_khun_hamla_update'))
		{ 
            $data['ghotonar_tarikh']=$this->input->post('ghotonar_tarikh');
			$data['procharer_tarikh']=$this->input->post('procharer_tarikh');
            $data['potrikar_nam']=$this->input->post('potrikar_nam');
			$data['jader_bepare_prochar']=$this->input->post('jader_bepare_prochar');
            $data['shong_shommelon']=$this->input->post('shong_shommelon');
			$this->site->updateData('law_gum_khun_hamla',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['law_gum_khun_hamla'] = $this->db->get('law_gum_khun_hamla')->first_row('array');

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/law/add_law_gum_khun_hamla', $meta, $this->data,'leftmenu/departmentsreport');
    }

    function add_law_shakhar_shongrokkhon($branch_id = NULL)
    { 
        //$this->sma->checkPermissions();

        if($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id')!=$branch_id)){
            $this->session->set_flashdata('warning', lang('access_denied'));

           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));
		    admin_redirect('departmentsreport/add-law-shakhar-shongrokkhon/'.$this->session->userdata('branch_id'));
        }else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser) ) {
           // admin_redirect('departmentsreport/potrikar-grahok-briddi/'.$this->session->userdata('branch_id'));

            admin_redirect('departmentsreport/add-law-shakhar-shongrokkhon/'.$this->session->userdata('branch_id'));
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
        
		if($this->input->post('law_shakhar_shongrokkhon'))
		{
            $data['report_type']=$report_type['type'];
            $data['report_year']=date("Y");
            $data['date']=date("Y-m-d"); 				
            $data['branch_id']=$branch_id;
            $data['user_id']=$this->session->userdata('user_id');
            $data['total_mamla']=$this->input->post('total_mamla');
			$data['forwarding']=$this->input->post('forwarding');
            $data['ejhar']=$this->input->post('ejhar');
			$data['chargeshit']=$this->input->post('chargeshit');
            $data['rayer_copy']=$this->input->post('rayer_copy');
			$this->site->insertData('law_shakhar_shongrokkhon',$data);
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->post('law_shakhar_shongrokkhon_update'))
		{ 
            $data['total_mamla']=$this->input->post('total_mamla');
			$data['forwarding']=$this->input->post('forwarding');
            $data['ejhar']=$this->input->post('ejhar');
			$data['chargeshit']=$this->input->post('chargeshit');
            $data['rayer_copy']=$this->input->post('rayer_copy');
			$this->site->updateData('law_shakhar_shongrokkhon',$data,array('id'=>$this->input->get('id')));
            header("Location: ".admin_url('departmentsreport/law-page-two/'.$this->data['branch_id']));
        }
        if($this->input->get('type')=='edit')
        {
            $this->db->select('*');
            $this->db->where('id',$this->input->get('id'));
            $this->data['law_shakhar_shongrokkhon'] = $this->db->get('law_shakhar_shongrokkhon')->first_row('array');

        }

        $this->data['m'] = 'law';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if($branch_id)
            $this->page_construct('departmentsreport/law/add_law_shakhar_shongrokkhon', $meta, $this->data,'leftmenu/departmentsreport');
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
                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'),
                    'branch_id' => $this->input->get_post('branch_id'), 'report_year' => date('Y'),
                    'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'), 'date' => date('Y-m-d')));
                $flag = 3; //new entry

            }} else {
            $msg = 'failed';
        }

        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;

    }

}
