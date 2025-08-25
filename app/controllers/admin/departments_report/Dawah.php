<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dawah extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 6) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', TRUE, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 6) {  //dawah
            $this->departmentuser = true;
        }
              
        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();

        // Set the department id  to 6
        $this->data['department_id'] = 6;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID  6)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>6), 'id desc', 1, 0);
        
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

    function dawah_page_one($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/dawah-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/dawah-page-one/' . $this->session->userdata('branch_id'));
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

            $this->db->select_sum('prev');
            $this->db->select_sum('present');
            $this->db->select_sum('bri');
            $this->db->select_sum('ghat');
            $this->db->select_sum('student');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_moktob'] = $this->db->get('dawah_moktob')->first_row('array');

            $this->db->select_sum('member_for_own');
            $this->db->select_sum('member_for_jonoshokti');
            $this->db->select_sum('member_for_general');
            $this->db->select_sum('asso_for_own');
            $this->db->select_sum('asso_for_jonoshokti');
            $this->db->select_sum('asso_for_general');
            $this->db->select_sum('worker_for_own');
            $this->db->select_sum('worker_for_jonoshokti');
            $this->db->select_sum('worker_for_general');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_jonoshokti_byktigoto_procheshta'] = $this->db->get('dawah_jonoshokti_byktigoto_procheshta')->first_row('array');

            $this->db->select_sum('upodeshta_number');
            $this->db->select_sum('upodeshta_present');
            $this->db->select_sum('karjonirbahi_number');
            $this->db->select_sum('karjonirbahi_present');
            $this->db->select_sum('kendrio_number');
            $this->db->select_sum('kendrio_present');
            $this->db->select_sum('iftar_number');
            $this->db->select_sum('iftar_present');
            $this->db->select_sum('dars_number');
            $this->db->select_sum('dars_present');
            $this->db->select_sum('dawat_number');
            $this->db->select_sum('dawat_present');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_shovashomuho'] = $this->db->get('dawah_shovashomuho')->first_row('array');


            // shefat end
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("dawah_moktob");
            $this->data['dawah_moktob'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("dawah_jonoshokti_byktigoto_procheshta");
            $this->data['dawah_jonoshokti_byktigoto_procheshta'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get("dawah_shovashomuho");
            $this->data['dawah_shovashomuho'] = $query->first_row('array');
        }

        $this->data['m'] = 'dawah';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/dawah/dawah_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/dawah/dawah_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
    }

    function dawah_page_two($branch_id = NULL)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/dawah-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/dawah-page-two/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('dayi_workshop_num');
            $this->db->select_sum('dayi_workshop_pre');
            $this->db->select_sum('dayi_course_num');
            $this->db->select_sum('dayi_course_pre');
            $this->db->select_sum('muallim_course_num');
            $this->db->select_sum('muallim_course_pre');
            $this->db->select_sum('seminer_num');
            $this->db->select_sum('seminer_pre');
            $this->db->select_sum('symposium_num');
            $this->db->select_sum('symposium_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_dayi_training'] = $this->db->get('dawah_dayi_training')->first_row('array');

            $this->db->select_sum('national_dayi_num');
            $this->db->select_sum('national_dayi_bar');
            $this->db->select_sum('international_dayi_num');
            $this->db->select_sum('international_dayi_bar');
            $this->db->select_sum('national_dawat_num');
            $this->db->select_sum('national_dawat_bar');
            $this->db->select_sum('international_dawat_num');
            $this->db->select_sum('international_dawat_bar');
            $this->db->select_sum('islamic_num');
            $this->db->select_sum('islamic_bar');
            $this->db->select_sum('alem_num');
            $this->db->select_sum('alem_bar');
            $this->db->select_sum('wayezin_num');
            $this->db->select_sum('wayezin_bar');
            $this->db->select_sum('khotib_num');
            $this->db->select_sum('khotib_bar');
            $this->db->select_sum('muajjin_num');
            $this->db->select_sum('muajjin_bar');
            $this->db->select_sum('torun_dayi_num');
            $this->db->select_sum('torun_dayi_bar');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_contact'] = $this->db->get('dawah_contact')->first_row('array');

            $this->db->select_sum('shakha');
            $this->db->select_sum('thana');
            $this->db->select_sum('ward');
            $this->db->select_sum('uposhakah');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_quran_bitoron'] = $this->db->get('dawah_quran_bitoron')->first_row('array');

            $this->db->select_sum('fb_live');
            $this->db->select_sum('fb_post');
            $this->db->select_sum('fb_post_share');
            $this->db->select_sum('fb_video_share');
            $this->db->select_sum('fb_other');
            $this->db->select_sum('twitter_live');
            $this->db->select_sum('twitter_post');
            $this->db->select_sum('twitter_post_share');
            $this->db->select_sum('twitter_video_share');
            $this->db->select_sum('twitter_other');
            $this->db->select_sum('youtube_live');
            $this->db->select_sum('youtube_post');
            $this->db->select_sum('youtube_post_share');
            $this->db->select_sum('youtube_video_share');
            $this->db->select_sum('youtube_other');
            $this->db->select_sum('website_live');
            $this->db->select_sum('website_post');
            $this->db->select_sum('website_post_share');
            $this->db->select_sum('website_video_share');
            $this->db->select_sum('website_other');
            $this->db->select_sum('insta_live');
            $this->db->select_sum('insta_post');
            $this->db->select_sum('insta_post_share');
            $this->db->select_sum('insta_video_share');
            $this->db->select_sum('insta_other');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_online'] = $this->db->get('dawah_online')->first_row('array');

            $this->db->select_sum('group');
            $this->db->select_sum('ongshogrohonkari');
            $this->db->select_sum('somorthok_bri');
            $this->db->select_sum('bondhu_bri');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_dawat_bar'] = $this->db->get('dawah_dawat_bar')->first_row('array');

            $this->db->select_sum('group');
            $this->db->select_sum('ongshogrohokari');
            $this->db->select_sum('dawat_prapto');
            $this->db->select_sum('somorthok_bri');
            $this->db->select_sum('bondhu_bri');
            $this->db->select_sum('shuva_bri');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['dawah_vinnordhormo'] = $this->db->get('dawah_vinnordhormo')->first_row('array');

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

            $this->data['dawah_training_program'] = $this->db->get('dawah_training_program')->first_row('array');
        } else {

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_dayi_training');
            $this->data['dawah_dayi_training'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_contact');
            $this->data['dawah_contact'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_quran_bitoron');
            $this->data['dawah_quran_bitoron'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_online');
            $this->data['dawah_online'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_dawat_bar');
            $this->data['dawah_dawat_bar'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_vinnordhormo');
            $this->data['dawah_vinnordhormo'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('dawah_training_program');
            $this->data['dawah_training_program'] = $query->first_row('array');
        }

        // shefat end

        $this->data['m'] = 'dawah';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        if ($branch_id)
            $this->page_construct('departmentsreport/dawah/dawah_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        else
            $this->page_construct('departmentsreport/dawah/dawah_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
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
