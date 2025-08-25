<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            admin_redirect('login');
        }

        if ($this->Customer || $this->Supplier) {
            redirect('/');
        }
        $this->lang->admin_load('sma', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('db_model');
    }




    public function index($branch_id = NULL)
    {


       // $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
      $report_type = $this->report_type();
      $this->data['confirmreport'] = $this->site->getOneRecord('confirmreport', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['end'], 0, 4), 'report_type' => $report_type['type']));
       
       //$this->data['confirmreport'] = $this->site->getOneRecord('confirmreport', "*", array('branch_id' => 13, 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
       
 



        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);


 
        // $this->sma->print_arrays($this->data);

        $this->page_construct('dashboard', $meta, $this->data);
    }











    public function index1($branch_id = NULL)
    {



        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        // $this->data['sales'] = $this->db_model->getLatestSales();
        // $this->data['quotes'] = $this->db_model->getLastestQuotes();
        // $this->data['purchases'] = $this->db_model->getLatestPurchases();
        //$this->data['transfers'] = $this->db_model->getLatestTransfers();
        //$this->data['customers'] = $this->db_model->getLatestCustomers();
        // $this->data['suppliers'] = $this->db_model->getLatestSuppliers();
        // $this->data['chatData'] = $this->db_model->getChartData();
        //$this->data['stock'] = $this->db_model->getStockValue();
        //$this->data['bs'] = $this->db_model->getBestSeller();


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





        $lmsdate = date('Y-m-d', strtotime('first day of last month')) . ' 00:00:00';
        $lmedate = date('Y-m-d', strtotime('last day of last month')) . ' 23:59:59';
        //$this->data['lmbs'] = $this->db_model->getBestSeller($lmsdate, $lmedate);
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('dashboard', $meta, $this->data);
    }



    public function mancomminglist($branch_id = NULL)
    {

        // $this->sma->print_arrays(111);

        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





         
        //$this->data['lmbs'] = $this->db_model->getBestSeller($lmsdate, $lmedate);
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
         //$this->sma->print_arrays($this->data);
        $this->page_construct('mancomminglist', $meta, $this->data);
    }

    public function memberpending($branch_id = NULL)
    {

        // $this->sma->print_arrays(111);

        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

           
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





       
        $bc = array(array('link' => '#', 'page' => lang('সদস্য ঘাটতি পেন্ডিং তালিকা')));
        $meta = array('page_title' => lang('সদস্য ঘাটতি পেন্ডিং তালিকা'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('memberpending', $meta, $this->data);
    }
    


    public function membercandidatepending($branch_id = NULL)
    {

        // $this->sma->print_arrays(111);

        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

           
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }




 
        $bc = array(array('link' => '#', 'page' => lang('সদস্যপ্রার্থী ঘাটতি পেন্ডিং তালিকা')));
        $meta = array('page_title' => lang('সদস্যপ্রার্থী ঘাটতি পেন্ডিং তালিকা'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('membercandidatepending', $meta, $this->data);
    }

    

    public function mantransferlist($branch_id = NULL)
    {

        // $this->sma->print_arrays(111);

        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


 


        $lmsdate = date('Y-m-d', strtotime('first day of last month')) . ' 00:00:00';
        $lmedate = date('Y-m-d', strtotime('last day of last month')) . ' 23:59:59';
        //$this->data['lmbs'] = $this->db_model->getBestSeller($lmsdate, $lmedate);
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('mantransferlist', $meta, $this->data);
    }







    public function dashboard($branch_id = NULL)
    {



        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        // $this->data['sales'] = $this->db_model->getLatestSales();
        // $this->data['quotes'] = $this->db_model->getLastestQuotes();
        // $this->data['purchases'] = $this->db_model->getLatestPurchases();
        //$this->data['transfers'] = $this->db_model->getLatestTransfers();
        //$this->data['customers'] = $this->db_model->getLatestCustomers();
        // $this->data['suppliers'] = $this->db_model->getLatestSuppliers();
        // $this->data['chatData'] = $this->db_model->getChartData();
        //$this->data['stock'] = $this->db_model->getStockValue();
        //$this->data['bs'] = $this->db_model->getBestSeller();


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





        $lmsdate = date('Y-m-d', strtotime('first day of last month')) . ' 00:00:00';
        $lmedate = date('Y-m-d', strtotime('last day of last month')) . ' 23:59:59';
        //$this->data['lmbs'] = $this->db_model->getBestSeller($lmsdate, $lmedate);
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('dashboard2', $meta, $this->data);
    }
    public function dashboardtransfer($branch_id = NULL)
    {



        if ($this->Settings->version == '2.3') {
            $this->session->set_flashdata('warning', 'Please complete your update by synchronizing your database.');
            admin_redirect('sync');
        }

        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        // $this->data['sales'] = $this->db_model->getLatestSales();
        // $this->data['quotes'] = $this->db_model->getLastestQuotes();
        // $this->data['purchases'] = $this->db_model->getLatestPurchases();
        //$this->data['transfers'] = $this->db_model->getLatestTransfers();
        //$this->data['customers'] = $this->db_model->getLatestCustomers();
        // $this->data['suppliers'] = $this->db_model->getLatestSuppliers();
        // $this->data['chatData'] = $this->db_model->getChartData();
        //$this->data['stock'] = $this->db_model->getStockValue();
        //$this->data['bs'] = $this->db_model->getBestSeller();


        if ($this->session->userdata('group_id') == 6) {
            $report_type = $this->report_type();
            $this->data['submitinfo'] = $this->site->getOneRecord('reportsubmit', "*", array('branch_id' => $this->session->userdata('branch_id'), 'year' => substr($report_type['start'], 0, 4), 'report_type' => $report_type['type']));
            $this->data['departments'] = $this->site->getAllDepartments();
        }



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





        $lmsdate = date('Y-m-d', strtotime('first day of last month')) . ' 00:00:00';
        $lmedate = date('Y-m-d', strtotime('last day of last month')) . ' 23:59:59';
        //$this->data['lmbs'] = $this->db_model->getBestSeller($lmsdate, $lmedate);
        $bc = array(array('link' => '#', 'page' => lang('dashboard')));
        $meta = array('page_title' => lang('dashboard'), 'bc' => $bc);
        //$this->sma->print_arrays($this->data);
        $this->page_construct('dashboardtransfer', $meta, $this->data);
    }





    function promotions()
    {
        $this->load->view($this->theme . 'promotions', $this->data);
    }

    function image_upload()
    {
        if (DEMO) {
            $error = array('error' => $this->lang->line('disabled_in_demo'));
            $this->sma->send_json($error);
            exit;
        }
        $this->security->csrf_verify();
        if (isset($_FILES['file'])) {
            $this->load->library('upload');
            $config['upload_path'] = 'assets/uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = '500';
            $config['max_width'] = $this->Settings->iwidth;
            $config['max_height'] = $this->Settings->iheight;
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = FALSE;
            $config['max_filename'] = 25;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $error = $this->upload->display_errors();
                $error = array('error' => $error);
                $this->sma->send_json($error);
                exit;
            }
            $photo = $this->upload->file_name;
            $array = array(
                'filelink' => base_url() . 'assets/uploads/images/' . $photo
            );
            echo stripslashes(json_encode($array));
            exit;
        } else {
            $error = array('error' => 'No file selected to upload!');
            $this->sma->send_json($error);
            exit;
        }
    }

    function set_data($ud, $value)
    {
        $this->session->set_userdata($ud, $value);
        echo true;
    }

    function hideNotification($id = NULL)
    {
        $this->session->set_userdata('hidden' . $id, 1);
        echo true;
    }

    function language($lang = false)
    {
        if ($this->input->get('lang')) {
            $lang = $this->input->get('lang');
        }
        //$this->load->helper('cookie');
        $folder = 'app/language/';
        $languagefiles = scandir($folder);
        if (in_array($lang, $languagefiles)) {
            $cookie = array(
                'name' => 'language',
                'value' => $lang,
                'expire' => '31536000',
                'prefix' => 'sma_',
                'secure' => false
            );
            $this->input->set_cookie($cookie);
        }
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function toggle_rtl()
    {
        $cookie = array(
            'name' => 'rtl_support',
            'value' => $this->Settings->user_rtl == 1 ? 0 : 1,
            'expire' => '31536000',
            'prefix' => 'sma_',
            'secure' => false
        );
        $this->input->set_cookie($cookie);
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function download($file)
    {
        if (file_exists('./files/' . $file)) {
            $this->load->helper('download');
            force_download('./files/' . $file, NULL);
            exit();
        }
        $this->session->set_flashdata('error', lang('file_x_exist'));
        redirect($_SERVER["HTTP_REFERER"]);
    }

    public function slug()
    {
        echo $this->sma->slug($this->input->get('title', TRUE), $this->input->get('type', TRUE));
        exit();
    }







    function report_typeOLD()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

        $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y') - 1), 'id desc', 1, 0);

        $type =  $this->input->get('type') == 'annual' ?  'annual' : 'half_yearly';

        if ($type == 'half_yearly')
            return array('info' => $entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
        else
            return array('info' => $entrytimeinfo2, 'type' => 'annual', 'start' => $entrytimeinfo2->startdate_half, 'end' => $entrytimeinfo2->enddate_annual, 'year' => $entrytimeinfo2->year);
    }
}
