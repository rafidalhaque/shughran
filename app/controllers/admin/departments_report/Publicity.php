<?php defined('BASEPATH') or exit('No direct script access allowed');

class Publicity extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }

        $this->departmentuser = false;

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') != 9) {
            admin_redirect('welcome');
        }
        $this->sma->checkPermissions('index', true, 'departmentsreport');

        if ($this->session->userdata('group_id') == 8 && $this->session->userdata('department_id') == 9) { //
            $this->departmentuser = true;
        }

        // Retrieve the report type using the report_type method
        $report_type = $this->report_type();
          	
        // Set the department id to 9
        $this->data['department_id'] = 9;

        // Check user roles to determine the branch ID source
        if ($this->Owner || $this->Admin || $this->departmentuser) {
            // If the user is an Owner, Admin, or a department user, get the branch ID from the URI segment (4th segment)
            $branch_id = $this->uri->segment(4);
        } else {
            // For other users, get the branch ID from the session data
            $branch_id = $this->session->userdata('branch_id');
        }
        // Retrieve a single record from the 'serial_reports' table based on specific conditions
        // Conditions: The current year, the report type, branch ID, and department ID (9)
        $this->data['serial_info'] = $this->site->getOneRecord('serial_reports', '*', array('report_year' => date('Y'), 'report_type'=> $report_type['type'],'branch_id'=> $branch_id , 'dept_id'=>9), 'id desc', 1, 0);

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

    public function publicity_page_one($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/publicity-page-one/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/publicity-page-one/' . $this->session->userdata('branch_id'));
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


            $this->db->select_sum('shompadok_ache_kina');
            $this->db->select_sum('shodossho');
            $this->db->select_sum('sathi');
            $this->db->select_sum('kormi');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_manpower'] = $this->db->get('publicity_manpower')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->data['publicity_manpower_row'] = $this->db->get('publicity_manpower')->num_rows();

            $this->db->select_sum('tv_sat_total');
            $this->db->select_sum('tv_sat_prerito_news');
            $this->db->select_sum('tv_sat_prokashito_news');
            $this->db->select_sum('tv_sat_kototite_preron');
            $this->db->select_sum('tv_sat_kototite_prokash');
            $this->db->select_sum('tv_sat_prodan');
            $this->db->select_sum('tv_sat_prokashito');
            $this->db->select_sum('tv_online_total');
            $this->db->select_sum('tv_online_prerito_news');
            $this->db->select_sum('tv_online_prokashito_news');
            $this->db->select_sum('tv_online_kototite_preron');
            $this->db->select_sum('tv_online_kototite_prokash');
            $this->db->select_sum('tv_online_prodan');
            $this->db->select_sum('tv_online_prokashito');
            $this->db->select_sum('potrika_jatio_total');
            $this->db->select_sum('potrika_jatio_prerito_news');
            $this->db->select_sum('potrika_jatio_prokashito_news');
            $this->db->select_sum('potrika_jatio_kototite_preron');
            $this->db->select_sum('potrika_jatio_kototite_prokash');
            $this->db->select_sum('potrika_jatio_prodan');
            $this->db->select_sum('potrika_jatio_prokashito');
            $this->db->select_sum('potrika_ancholik_total');
            $this->db->select_sum('potrika_ancholik_prerito_news');
            $this->db->select_sum('potrika_ancholik_prokashito_news');
            $this->db->select_sum('potrika_ancholik_kototite_preron');
            $this->db->select_sum('potrika_ancholik_kototite_prokash');
            $this->db->select_sum('potrika_ancholik_prodan');
            $this->db->select_sum('potrika_ancholik_prokashito');
            $this->db->select_sum('online_jatio_total');
            $this->db->select_sum('online_jatio_prerito_news');
            $this->db->select_sum('online_jatio_prokashito_news');
            $this->db->select_sum('online_jatio_kototite_preron');
            $this->db->select_sum('online_jatio_kototite_prokash');
            $this->db->select_sum('online_jatio_prodan');
            $this->db->select_sum('online_jatio_prokashito');
            $this->db->select_sum('online_ancholik_total');
            $this->db->select_sum('online_ancholik_prerito_news');
            $this->db->select_sum('online_ancholik_prokashito_news');
            $this->db->select_sum('online_ancholik_kototite_preron');
            $this->db->select_sum('online_ancholik_kototite_prokash');
            $this->db->select_sum('online_ancholik_prodan');
            $this->db->select_sum('online_ancholik_prokashito');

            $this->db->select_sum('facebook_total');
            $this->db->select_sum('facebook_prerito_news');
            $this->db->select_sum('facebook_prokashito_news');
            $this->db->select_sum('facebook_kototite_preron');
            $this->db->select_sum('facebook_kototite_prokash');
            $this->db->select_sum('facebook_prodan');
            $this->db->select_sum('facebook_prokashito');
           
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_online_activity'] = $this->db->get('publicity_online_activity')->first_row('array');

            $this->db->select_sum('portal_ache_kina');
            $this->db->select_sum('nibondhon_krito_kina');
            $this->db->select_sum('niyojito_jonoshongkha');
            $this->db->select_sum('post_krito_news');
            $this->db->select_sum('page_ache_kina');
            $this->db->select_sum('fb_varrified_kina');
            $this->db->select_sum('like');
            $this->db->select_sum('follower');
            $this->db->select_sum('youtube_channel_ache_kina');
            $this->db->select_sum('yt_varrified_kina');
            $this->db->select_sum('subscriber');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_shakhar_online_news_media'] = $this->db->get('publicity_shakhar_online_news_media')->first_row('array');

            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_shakhar_row'] = $this->db->get('publicity_shakhar_online_news_media')->num_rows();

            $this->db->select_sum('bivagio_jonoshokti_num');
            $this->db->select_sum('bivagio_jonoshokti_pre');
            $this->db->select_sum('training_workshop_num');
            $this->db->select_sum('training_workshop_pre');
            $this->db->select_sum('motobinimoy_num');
            $this->db->select_sum('motobinimoy_pre');
            $this->db->select_sum('shong_shommelon_num');
            $this->db->select_sum('shong_shommelon_pre');

            $this->db->select_sum('bggth_num');
            $this->db->select_sum('bggth_pre');
            if ($branch_id)
                $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_shova_shomuho'] = $this->db->get('publicity_shova_shomuho')->first_row('array');
        } else {

            
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('publicity_manpower');
            $this->data['publicity_manpower'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publicity_online_activity');
            $this->data['publicity_online_activity'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publicity_shakhar_online_news_media');
            $this->data['publicity_shakhar_online_news_media'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publicity_shova_shomuho');
            $this->data['publicity_shova_shomuho'] = $query->first_row('array');
        }


        $this->data['m'] = 'publicity';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);

        // $this->sma->print_arrays($this->data);



        if ($branch_id) {
            $this->page_construct('departmentsreport/publicity/publicity_page_one_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/publicity/publicity_page_one', $meta, $this->data, 'leftmenu/departmentsreport');
        }
    }

    public function publicity_page_two($branch_id = null)
    {
        //$this->sma->checkPermissions();

        if ($branch_id != null && !($this->Owner || $this->Admin || $this->departmentuser) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('departmentsreport/publicity-page-two/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == null && !($this->Owner || $this->Admin || $this->departmentuser)) {
            admin_redirect('departmentsreport/publicity-page-two/' . $this->session->userdata('branch_id'));
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

            $this->data['publicity_training_program'] = $this->db->get('publicity_training_program')->first_row('array');



            if ($branch_id) {
                $this->db->select('*');
                $this->db->where('branch_id', $branch_id);
                
            } else {
                $this->db->select_sum('potrikar_shompadok_shovapoti');
                $this->db->select_sum('potrikar_shompadok_prochar');
                $this->db->select_sum('midea_bekti_shovapoti');
                $this->db->select_sum('midea_bekti_prochar');
                $this->db->select_sum('tv_satelite_jela_shovapoti');
                $this->db->select_sum('tv_satelite_jela_prochar');
                $this->db->select_sum('tv_satelite_stuff_shovapoti');
                $this->db->select_sum('tv_satelite_stuff_prochar');
                $this->db->select_sum('tv_satelite_thana_shovapoti');
                $this->db->select_sum('tv_satelite_thana_prochar');
                $this->db->select_sum('tv_online_jela_shovapoti');
                $this->db->select_sum('tv_online_jela_prochar');
                $this->db->select_sum('tv_online_stuff_shovapoti');
                $this->db->select_sum('tv_online_stuff_prochar');
                $this->db->select_sum('tv_online_thana_shovapoti');
                $this->db->select_sum('tv_online_thana_prochar');
                $this->db->select_sum('jatio_printing_jela_shovapoti');
                $this->db->select_sum('jatio_printing_jela_prochar');
                $this->db->select_sum('jatio_printing_stuff_shovapoti');
                $this->db->select_sum('jatio_printing_stuff_prochar');
                $this->db->select_sum('jatio_printing_thana_shovapoti');
                $this->db->select_sum('jatio_printing_thana_prochar');
                $this->db->select_sum('jatio_online_jela_shovapoti');
                $this->db->select_sum('jatio_online_jela_prochar');
                $this->db->select_sum('jatio_online_stuff_shovapoti');
                $this->db->select_sum('jatio_online_stuff_prochar');
                $this->db->select_sum('jatio_online_thana_shovapoti');
                $this->db->select_sum('jatio_online_thana_prochar');
                $this->db->select_sum('ancholik_printing_jela_shovapoti');
                $this->db->select_sum('ancholik_printing_jela_prochar');
                $this->db->select_sum('ancholik_printing_stuff_shovapoti');
                $this->db->select_sum('ancholik_printing_stuff_prochar');
                $this->db->select_sum('ancholik_printing_thana_shovapoti');
                $this->db->select_sum('ancholik_printing_thana_prochar');
                $this->db->select_sum('ancholik_online_jela_shovapoti');
                $this->db->select_sum('ancholik_online_jela_prochar');
                $this->db->select_sum('ancholik_online_stuff_shovapoti');
                $this->db->select_sum('ancholik_online_stuff_prochar');
                $this->db->select_sum('ancholik_online_thana_shovapoti');
                $this->db->select_sum('ancholik_online_thana_prochar');
                
               
            }           


            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');    
            $this->data['publicity_contact'] = $this->db->get('publicity_contact')->first_row('array');



            if ($branch_id){
                $this->db->select('*');
                $this->db->where('branch_id', $branch_id);
            }else{
                $this->db->select_sum('video_shakar_total');
                $this->db->select_sum('video_kendrer_total');
                $this->db->select_sum('photo_shakar_total');
                $this->db->select_sum('photo_kendrer_total');
                $this->db->select_sum('news_shakar_total');
                $this->db->select_sum('news_kendrer_total');
            }
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');


            $this->data['publicity_amader_collection'] = $this->db->get('publicity_amader_collection')->first_row('array');


            // $this->sma->print_arrays($this->db->last_query());

           
            if ($branch_id){
                $this->db->select('*');
                $this->db->where('branch_id', $branch_id);
            }else{
                $this->db->select_sum('shompadok_num');
                $this->db->select_sum('shompadok_bar');
                $this->db->select_sum('shangbadik_num');
                $this->db->select_sum('shangbadik_bar');
                $this->db->select_sum('collamist_num');
                $this->db->select_sum('collamist_bar');
                $this->db->select_sum('media_bektitto_num');
                $this->db->select_sum('media_bektitto_bar');
            }
           
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $this->data['publicity_shoujonno'] = $this->db->get('publicity_shoujonno')->first_row('array');
        } else {
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');

            $query = $this->db->get('publicity_training_program');
            $this->data['publicity_training_program'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('publicity_contact');
            $this->data['publicity_contact'] = $query->first_row('array');

            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('publicity_amader_collection');
            $this->data['publicity_amader_collection'] = $query->first_row('array');
            $this->db->select('*');
            $this->db->where('branch_id', $branch_id);
            $this->db->where('date between "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $query = $this->db->get('publicity_shoujonno');
            $this->data['publicity_shoujonno'] = $query->first_row('array');
        }


        $this->data['m'] = 'publicity';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('departmentsreport')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);



        //   $this->sma->print_arrays( $this->data['publicity_contact']['tv_satelite_jela_shovapoti']);




        if ($branch_id) {
            $this->page_construct('departmentsreport/publicity/publicity_page_two_entry', $meta, $this->data, 'leftmenu/departmentsreport');
        } else {
            $this->page_construct('departmentsreport/publicity/publicity_page_two', $meta, $this->data, 'leftmenu/departmentsreport');
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

            }
        } else {
            $msg = 'failed';
        }

        //$msg = $this->site->getOneRecord('confirmreport','*',array('branch_id'=>$this->input->get_post('branch_id'),'year'=>$report_type['year'],'report_type'=>$report_type['type']),'id desc',1,0);

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }
}
