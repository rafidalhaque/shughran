<?php defined('BASEPATH') or exit('No direct script access allowed');

class Chatrokollan extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }


        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 15) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 15) {  //Chatrokollan
            $this->departmentuser = true;
        }
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 15
        $this->data['department_id'] = 15;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  15)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>15), 'id desc', 1, 0);

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

    function chatrokollan_bivag($branch_id = NULL)
    {
        
       
        
        
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/chatrokollan-bivag/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/chatrokollan-bivag/' . $this->session->userdata('branch_id'));
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
        
         

        //

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }

        if ((!$branch_id)  || ($branch_id && $report_type['is_current'] == false)) {

            $this->db->select_sum('manpower_niyo_s_shaka');
            $this->db->select_sum('manpower_niyo_s_kendro');
            $this->db->select_sum('manpower_niyo_p_shaka');
            $this->db->select_sum('manpower_niyo_p_kendro');
            $this->db->select_sum('manpower_ekkal_s_shaka');
            $this->db->select_sum('manpower_ekkal_s_kendro');
            $this->db->select_sum('manpower_ekkal_p_shaka');
            $this->db->select_sum('manpower_ekkal_p_kendro');
            $this->db->select_sum('general_niyo_s_shaka');
            $this->db->select_sum('general_niyo_s_kendro');
            $this->db->select_sum('general_niyo_p_shaka');
            $this->db->select_sum('general_niyo_p_kendro');
            $this->db->select_sum('general_ekkal_s_shaka');
            $this->db->select_sum('general_ekkal_s_kendro');
            $this->db->select_sum('general_ekkal_p_shaka');
            $this->db->select_sum('general_ekkal_p_kendro');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['stu_wellfare_shikkha_shohojogita'] = $this->db->get('stu_wellfare_shikkha_shohojogita')->first_row('array');

            $this->db->select_sum('member_s_total');
            $this->db->select_sum('member_s_new_this_year');
            $this->db->select_sum('member_p_total');
            $this->db->select_sum('member_p_new_this_year');
            $this->db->select_sum('member_p_treatment');
            $this->db->select_sum('member_p_bortoman');
            $this->db->select_sum('member_a_total');
            $this->db->select_sum('member_a_new_this_year');
            $this->db->select_sum('member_a_treatment');
            $this->db->select_sum('member_a_shushtho');
            $this->db->select_sum('member_a_bortoman');
            $this->db->select_sum('asscociate_s_total');
            $this->db->select_sum('asscociate_s_new_this_year');
            $this->db->select_sum('asscociate_p_total');
            $this->db->select_sum('asscociate_p_new_this_year');
            $this->db->select_sum('asscociate_p_treatment');
            $this->db->select_sum('asscociate_p_bortoman');
            $this->db->select_sum('asscociate_a_total');
            $this->db->select_sum('asscociate_a_new_this_year');
            $this->db->select_sum('asscociate_a_treatment');
            $this->db->select_sum('asscociate_a_shushtho');
            $this->db->select_sum('asscociate_a_bortoman');
            $this->db->select_sum('worker_s_total');
            $this->db->select_sum('worker_s_new_this_year');
            $this->db->select_sum('worker_p_total');
            $this->db->select_sum('worker_p_new_this_year');
            $this->db->select_sum('worker_p_treatment');
            $this->db->select_sum('worker_p_bortoman');
            $this->db->select_sum('worker_a_total');
            $this->db->select_sum('worker_a_new_this_year');
            $this->db->select_sum('worker_a_treatment');
            $this->db->select_sum('worker_a_shushtho');
            $this->db->select_sum('worker_a_bortoman');
            $this->db->select_sum('supporter_s_total');
            $this->db->select_sum('supporter_s_new_this_year');
            $this->db->select_sum('supporter_p_total');
            $this->db->select_sum('supporter_p_new_this_year');
            $this->db->select_sum('supporter_p_treatment');
            $this->db->select_sum('supporter_p_bortoman');
            $this->db->select_sum('supporter_a_total');
            $this->db->select_sum('supporter_a_new_this_year');
            $this->db->select_sum('supporter_a_treatment');
            $this->db->select_sum('supporter_a_shushtho');
            $this->db->select_sum('supporter_a_bortoman');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['stu_wellfare_shohid'] = $this->db->get('stu_wellfare_shohid')->first_row('array');

            $this->db->select('*');

            if ($branch_id) {
                $this->db->where('branch_id', $branch_id);
            }

            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->db->order_by("branch_id");

            if ($branch_id) {
                $this->data['stu_wellfare_shohid_list'] = $this->db->get('stu_wellfare_shohid_list')->first_row('array');
            } else
                $this->data['stu_wellfare_shohid_list'] = $this->db->get('stu_wellfare_shohid_list');

            $this->db->select_sum('s_ni_arthik_s_shaka');
            $this->db->select_sum('s_ni_arthik_s_kendro');
            $this->db->select_sum('s_ni_arthik_p_shaka');
            $this->db->select_sum('s_ni_arthik_p_kendro');
            $this->db->select_sum('s_ni_treat_s_shaka');
            $this->db->select_sum('s_ni_treat_s_kendro');
            $this->db->select_sum('s_ni_treat_p_shaka');
            $this->db->select_sum('s_ni_treat_p_kendro');
            $this->db->select_sum('s_ni_cotact_num');
            $this->db->select_sum('s_ni_cotact_bar');
            $this->db->select_sum('s_ekkalin_arthik_s_shaka');
            $this->db->select_sum('s_ekkalin_arthik_s_kendro');
            $this->db->select_sum('s_ekkalin_arthik_p_shaka');
            $this->db->select_sum('s_ekkalin_arthik_p_kendro');
            $this->db->select_sum('s_ekkalin_treat_s_shaka');
            $this->db->select_sum('s_ekkalin_treat_s_kendro');
            $this->db->select_sum('s_ekkalin_treat_p_shaka');
            $this->db->select_sum('s_ekkalin_treat_p_kendro');
            $this->db->select_sum('s_ekkalin_cotact_num');
            $this->db->select_sum('s_ekkalin_cotact_bar');
            $this->db->select_sum('ahoto_ni_arthik_s_shaka');
            $this->db->select_sum('ahoto_ni_arthik_s_kendro');
            $this->db->select_sum('ahoto_ni_arthik_p_shaka');
            $this->db->select_sum('ahoto_ni_arthik_p_kendro');
            $this->db->select_sum('ahoto_ni_treat_s_shaka');
            $this->db->select_sum('ahoto_ni_treat_s_kendro');
            $this->db->select_sum('ahoto_ni_treat_p_shaka');
            $this->db->select_sum('ahoto_ni_treat_p_kendro');
            $this->db->select_sum('ahoto_ni_cotact_num');
            $this->db->select_sum('ahoto_ni_cotact_bar');
            $this->db->select_sum('ahoto_ekkalin_arthik_s_shaka');
            $this->db->select_sum('ahoto_ekkalin_arthik_s_kendro');
            $this->db->select_sum('ahoto_ekkalin_arthik_p_shaka');
            $this->db->select_sum('ahoto_ekkalin_arthik_p_kendro');
            $this->db->select_sum('ahoto_ekkalin_treat_s_shaka');
            $this->db->select_sum('ahoto_ekkalin_treat_s_kendro');
            $this->db->select_sum('ahoto_ekkalin_treat_p_shaka');
            $this->db->select_sum('ahoto_ekkalin_treat_p_kendro');
            $this->db->select_sum('ahoto_ekkalin_cotact_num');
            $this->db->select_sum('ahoto_ekkalin_cotact_bar');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['stu_wellfare_shohojogita'] = $this->db->get('stu_wellfare_shohojogita')->first_row('array');

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

            $this->data['stu_wellfare_training_program'] = $this->db->get('stu_wellfare_training_program')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('stu_wellfare_training_program');
            $this->data['stu_wellfare_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('stu_wellfare_shikkha_shohojogita');
            $this->data['stu_wellfare_shikkha_shohojogita'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('stu_wellfare_shohid');
            $this->data['stu_wellfare_shohid'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('stu_wellfare_shohid_list');
            $this->data['stu_wellfare_shohid_list'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('stu_wellfare_shohojogita');
            $this->data['stu_wellfare_shohojogita'] = $query->first_row('array');
        }
        
        
       
        
        
        


        $this->data['m'] = 'chatrokollan';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/chatrokollan/chatrokollan_bivag_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/chatrokollan/chatrokollan_bivag', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function chatrokollan_sahajjo($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/chatrokollan-sahajjo/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/chatrokollan-sahajjo/' . $this->session->userdata('branch_id'));
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

        $this->db->select_sum('soho_niyo_sonkha');
        $this->db->select_sum('soho_niyo_poriman');
        $this->db->select_sum('chikit_niyo_sonkha');
        $this->db->select_sum('chikit_niyo_poriman');
        $this->db->select_sum('joga_sohi_sonkha');
        $this->db->select_sum('joga_sohi_poriman');
        $this->db->select_sum('soho_oniyo_sonkha');
        $this->db->select_sum('soho_oniyo_poriman');
        $this->db->select_sum('chikit_oniyo_sonkha');
        $this->db->select_sum('chikit_oniyo_poriman');
        $this->db->select_sum('joga_ahoto_sonkha');
        $this->db->select_sum('joga_ahoto_poriman');
        $this->db->select_sum('soho_ekkal_sonkha');
        $this->db->select_sum('soho_ekkal_poriman');
        $this->db->select_sum('chikit_ekkal_sonkha');
        $this->db->select_sum('chikit_ekkal_poriman');
        $this->db->select_sum('joga_pongu_sonkha');
        $this->db->select_sum('joga_pongu_poriman');



        $this->data['chatrokollan_sahajjo'] = $this->db->get('chatrokollan_sahajjo')->first_row('array');


        $this->db->select('*');
        $this->db->where('branch_id', $branch_id);
        $query = $this->db->get('chatrokollan_sahajjo');
        $this->data['chatrokollan_sahajjo'] = $query->first_row('array');


        $this->data['m'] = 'chatrokollan';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/chatrokollan/chatrokollan_sahajjo_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/chatrokollan/chatrokollan_sahajjo', $meta, $this->data, 'leftmenu/departmentsreport');
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
