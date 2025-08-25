<?php defined('BASEPATH') or exit('No direct script access allowed');

class Dawat extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->admin_load('manpower', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->helper('report');
        $this->load->admin_model('manpower_model');
        $this->load->admin_model('organization_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function index($branch_id = NULL)
    {

        $this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        }


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $report_type_get = $this->report_type();

        if ($report_type_get == false)
            admin_redirect();

        $this->data['report_info'] = $report_type_get;





        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];





        // $this->sma->print_arrays( $report_start, $report_end ,$report_type);

        $this->data['lastyeardawat'] = $this->getLastDawat('annual', $report_type_get['last_year'], $branch_id);

        //$this->sma->print_arrays($this->data['lastyeardawat']);

        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);

        if ($branch_id)
            $this->getEntryDawatSummary($this->data['institutiontype'], $report_type_get, $branch_id);




        $this->data['dawat_summary'] = $this->getdawatsummary($report_type_get, $branch_id);
        $this->data['dawat_decrease_target'] = $this->getdawat_decrease_target($report_type_get, $branch_id);


        // $this->sma->print_arrays($this->data['lastyeardawat']);


        //$this->data['m'] = 'manpowersummary';

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Dawat'));
        $meta = array('page_title' => lang('dawat'), 'bc' => $bc);




        if ($branch_id) {
            //  $this->sma->print_arrays($this->data['detailinfo']);
            $this->page_construct('dawat/index_entry', $meta, $this->data, 'leftmenu/dawat');
        } else
            $this->page_construct('dawat/index', $meta, $this->data, 'leftmenu/dawat');


    }





    function getEntryDawatSummary($institutiontype, $report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false) {



            if ($report_type == 'half_yearly') {



                $dawatinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);



                if (!$dawatinfo) {


                    foreach ($institutiontype as $row) {

                        $this->site->insertData('dawat_summary', array('institution_type_id' => $row->id, 'branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                    }

                }


                $dawat_decrease_target = $this->site->getOneRecord('dawat_decrease_target', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawat_decrease_target) {
                    $this->site->insertData('dawat_decrease_target', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                }



            } else {



                $dawatinfo = $this->site->getOneRecord('dawat_summary', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawatinfo) {

                    foreach ($institutiontype as $row) {
                        $this->site->insertData('dawat_summary', array('institution_type_id' => $row->id, 'branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                    }
                }



                $dawat_decrease_target = $this->site->getOneRecord('dawat_decrease_target', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawat_decrease_target) {
                    $this->site->insertData('dawat_decrease_target', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                }


            }
        }


    }







    function other($branch_id = NULL)
    {

         $this->sma->checkPermissions('index', TRUE);

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/other/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/other/' . $this->session->userdata('branch_id'));
        }


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $report_type_get = $this->report_type();

        if ($report_type_get == false)
            admin_redirect();

        $this->data['report_info'] = $report_type_get;





        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];





        // $this->sma->print_arrays( $report_start, $report_end ,$report_type);


        //$this->sma->print_arrays($this->data['lastyeardawat']);

        $this->data['dawat_category'] = $this->site->getAll('dawat_category', date("Y"));





        //$this->sma->print_arrays($this->data['dawah_activity']);


        if ($branch_id)
            $this->getEntryGroupDawahActivity($report_type_get, $branch_id);




        $this->data['dawah_activity'] = $this->getDawahActivity($report_type_get, $branch_id);


        if ($branch_id)
            $this->getEntrytDawahProgram($this->data['dawat_category'], $report_type_get, $branch_id);




        $this->data['dawah_group'] = $this->getDawahProgram($report_type_get, $branch_id);



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Dawat'));
        $meta = array('page_title' => lang('dawat'), 'bc' => $bc);




        if ($branch_id) {
            //  $this->sma->print_arrays($this->data['detailinfo']);
            $this->page_construct('dawat/other_entry', $meta, $this->data, 'leftmenu/dawat');
        } else
            $this->page_construct('dawat/other', $meta, $this->data, 'leftmenu/dawat');


    }







    function getLastDawat($report_type, $last_year, $branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id)
            $result = $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));
        else
            $result = $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));

        // $this->sma->print_arrays($this->db->last_query());

        return $result;
    }
























    function detail($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;



        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        if ($branch_id) {
            $this->data['detailinfo'] = $this->getEntryInfo($report_type, $branch_id);
        } else
            $this->data['detailinfo'] = $this->getEntryInfoSUM($report_type, $branch_id);

        //  $this->sma->print_arrays($this->data['detailinfo']);


        //$this->data['m'] = 'manpowersummary';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Dawat Detail'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        if ($branch_id)
            $this->page_construct('dawat/detail_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/detail', $meta, $this->data, 'leftmenu/dawat');
    }

    function detail_export($branch_id)
    {


        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/detail/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $report_info = $report_type;



        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

            $branch_id = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

            $branch_id = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        // $detailinfo = $this->getEntryInfoSUM($report_type, $branch_id);

        // $this->sma->print_arrays($report_type['year']);

        $detailinfo = $this->getEntryInfo($report_type, $branch_id);

        // $this->sma->print_arrays(1111);



        if ($detailinfo) {
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Dawat Detail');




            $this->excel->getActiveSheet()->mergeCells('A1:S1');
            $this->excel->getActiveSheet()->mergeCells('A2:S2');
            $this->excel->getActiveSheet()->mergeCells('A3:S3');
            $this->excel->getActiveSheet()->mergeCells('A4:S4');
            $this->excel->getActiveSheet()->mergeCells('A5:S5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:S4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:S4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');






            $this->excel->getActiveSheet()->SetCellValue('A3', 'বিস্তারিত দাওয়াত' . strtoupper($report_type['type']) . ' Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);


            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));


            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP
                )
            );

            $this->excel->getActiveSheet()->getStyle("A7:R7")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle("A12:R12")->applyFromArray($style);

            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);


            $this->excel->getActiveSheet()->mergeCells('A7:L7');
            $this->excel->getActiveSheet()->SetCellValue('A7', '১। দাওয়াতী গ্রুপ প্রেরণ');
            $this->excel->getActiveSheet()->mergeCells('M7:R7');
            $this->excel->getActiveSheet()->SetCellValue('M7', '২। চলো গ্রামে যাই');



            $this->excel->getActiveSheet()->SetCellValue('A8', 'গ্রুপ সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('B8', 'সদস্য সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('C8', 'দাওয়াত প্রাপ্ত');
            $this->excel->getActiveSheet()->mergeCells('C8:D8');

            $this->excel->getActiveSheet()->SetCellValue('E8', 'সমাবেশ');
            $this->excel->getActiveSheet()->mergeCells('E8:F8');

            $this->excel->getActiveSheet()->mergeCells('G8:G9');



            $this->excel->getActiveSheet()->SetCellValue('G8', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('H8:H9');
            $this->excel->getActiveSheet()->SetCellValue('H8', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('I8:I9');
            $this->excel->getActiveSheet()->SetCellValue('I8', 'সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('J8:J9');
            $this->excel->getActiveSheet()->SetCellValue('J8', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K8:K9');
            $this->excel->getActiveSheet()->SetCellValue('K8', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('L8:L9');
            $this->excel->getActiveSheet()->SetCellValue('L8', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M8:M9');
            $this->excel->getActiveSheet()->SetCellValue('M8', 'কতজন গিয়েছেন');
            $this->excel->getActiveSheet()->mergeCells('N8:N9');
            $this->excel->getActiveSheet()->SetCellValue('N8', 'কর্মী যোগাযোগ');
            $this->excel->getActiveSheet()->mergeCells('O8:O9');
            $this->excel->getActiveSheet()->SetCellValue('O8', 'সুধী যোগাযোগ');
            $this->excel->getActiveSheet()->mergeCells('P8:P9');
            $this->excel->getActiveSheet()->SetCellValue('P8', 'শুভাকাঙ্খী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q8:Q9');
            $this->excel->getActiveSheet()->SetCellValue('Q8', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R8:R9');
            $this->excel->getActiveSheet()->SetCellValue('R8', 'সমর্থক বৃদ্ধি');


            $this->excel->getActiveSheet()->mergeCells('A8:A9');
            $this->excel->getActiveSheet()->mergeCells('B8:B9');
            $this->excel->getActiveSheet()->SetCellValue('C9', 'ছাত্র সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D9', 'জনসংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('E9', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F9', 'গড় উপঃ');


            $dawatgroupsend = isset($detailinfo['dawatgroupsendinfo']) ? $detailinfo['dawatgroupsendinfo'] : NULL;

            // $this->sma->print_arrays($dawatgroupsend);   

            $this->excel->getActiveSheet()->SetCellValue('A10', $dawatgroupsend->group_number);
            $this->excel->getActiveSheet()->SetCellValue('B10', $dawatgroupsend->member_number);
            $this->excel->getActiveSheet()->SetCellValue('C10', $dawatgroupsend->dawat_received_std);
            $this->excel->getActiveSheet()->SetCellValue('D10', $dawatgroupsend->dawat_received_people);
            $this->excel->getActiveSheet()->SetCellValue('E10', $dawatgroupsend->gather_number);
            $this->excel->getActiveSheet()->SetCellValue('F10', $dawatgroupsend->gather_avg);

            $this->excel->getActiveSheet()->SetCellValue('G10', $dawatgroupsend->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('H10', $dawatgroupsend->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('I10', $dawatgroupsend->organization_increase);
            $this->excel->getActiveSheet()->SetCellValue('J10', $dawatgroupsend->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('K10', $dawatgroupsend->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('L10', $dawatgroupsend->ww_increase);



            $letgotovillage = isset($detailinfo['letgotovillageinfo']) ? $detailinfo['letgotovillageinfo'] : NULL;


            // $this->sma->print_arrays($letgotovillage);

            $this->excel->getActiveSheet()->SetCellValue('M10', $letgotovillage->number_went);
            $this->excel->getActiveSheet()->SetCellValue('N10', $letgotovillage->worker_communication);
            $this->excel->getActiveSheet()->SetCellValue('O10', $letgotovillage->ww_communication);
            $this->excel->getActiveSheet()->SetCellValue('P10', $letgotovillage->ww_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q10', $letgotovillage->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('R10', $letgotovillage->supporter_increase);


            // স্কুল দাওয়াতী দশক রিপোর্ট
            $this->excel->getActiveSheet()->mergeCells('A12:R12');

            $this->excel->getActiveSheet()->SetCellValue('A12', '৩। স্কুল দাওয়াতী দশক রিপোর্ট');

            $this->excel->getActiveSheet()->SetCellValue('A13', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B13', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C13', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C13:D13');
            $this->excel->getActiveSheet()->SetCellValue('E13', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E13:F13');
            $this->excel->getActiveSheet()->mergeCells('G13:G14');
            $this->excel->getActiveSheet()->SetCellValue('G13', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H13:H14');
            $this->excel->getActiveSheet()->SetCellValue('H13', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I13:I14');
            $this->excel->getActiveSheet()->SetCellValue('I13', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J13:J14');
            $this->excel->getActiveSheet()->SetCellValue('J13', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K13:K14');
            $this->excel->getActiveSheet()->SetCellValue('K13', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L13:L14');
            $this->excel->getActiveSheet()->SetCellValue('L13', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M13:M14');
            $this->excel->getActiveSheet()->SetCellValue('M13', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N13:N14');
            $this->excel->getActiveSheet()->SetCellValue('N13', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O13:O14');
            $this->excel->getActiveSheet()->SetCellValue('O13', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P13:P14');
            $this->excel->getActiveSheet()->SetCellValue('P13', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q13:Q14');
            $this->excel->getActiveSheet()->SetCellValue('Q13', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R13:R14');
            $this->excel->getActiveSheet()->SetCellValue('R13', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S13:S14');
            $this->excel->getActiveSheet()->SetCellValue('S13', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A13:A14');
            $this->excel->getActiveSheet()->mergeCells('B13:B14');
            $this->excel->getActiveSheet()->SetCellValue('C14', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D14', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E14', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F14', 'গড় উপঃ');

            $school_dawat_reportinfo = isset($detailinfo['school_dawat_reportinfo']) ? $detailinfo['school_dawat_reportinfo'] : NULL;

            $this->excel->getActiveSheet()->SetCellValue('A15', $school_dawat_reportinfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B15', $school_dawat_reportinfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C15', $school_dawat_reportinfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D15', $school_dawat_reportinfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E15', $school_dawat_reportinfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F15', $school_dawat_reportinfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G15', $school_dawat_reportinfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H15', $school_dawat_reportinfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I15', $school_dawat_reportinfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J15', $school_dawat_reportinfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K15', $school_dawat_reportinfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L15', $school_dawat_reportinfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M15', $school_dawat_reportinfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N15', $school_dawat_reportinfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O15', $school_dawat_reportinfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P15', $school_dawat_reportinfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q15', $school_dawat_reportinfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R15', $school_dawat_reportinfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S15', $school_dawat_reportinfo->ww_increase);



            // অনলাইন দাওয়াতি সপ্তাহ  রিপোর্ট

            $this->excel->getActiveSheet()->getStyle("A17:R17")->applyFromArray($style);
            $this->excel->getActiveSheet()->mergeCells('A17:R17');
            $this->excel->getActiveSheet()->SetCellValue('A17', '৪। অনলাইন দাওয়াতি সপ্তাহ  রিপোর্ট');
            $this->excel->getActiveSheet()->getStyle('A17')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A18', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B18', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C18', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C18:D18');
            $this->excel->getActiveSheet()->SetCellValue('E18', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E18:F18');
            $this->excel->getActiveSheet()->mergeCells('G18:G19');
            $this->excel->getActiveSheet()->SetCellValue('G18', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H18:H19');
            $this->excel->getActiveSheet()->SetCellValue('H18', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I18:I19');
            $this->excel->getActiveSheet()->SetCellValue('I18', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J18:J19');
            $this->excel->getActiveSheet()->SetCellValue('J18', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K18:K19');
            $this->excel->getActiveSheet()->SetCellValue('K18', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L18:L19');
            $this->excel->getActiveSheet()->SetCellValue('L18', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M18:M19');
            $this->excel->getActiveSheet()->SetCellValue('M18', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N18:N19');
            $this->excel->getActiveSheet()->SetCellValue('N18', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O18:O19');
            $this->excel->getActiveSheet()->SetCellValue('O18', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P18:P19');
            $this->excel->getActiveSheet()->SetCellValue('P18', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q18:Q19');
            $this->excel->getActiveSheet()->SetCellValue('Q18', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R18:R19');
            $this->excel->getActiveSheet()->SetCellValue('R18', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S18:S19');
            $this->excel->getActiveSheet()->SetCellValue('S18', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A18:A19');
            $this->excel->getActiveSheet()->mergeCells('B18:B19');
            $this->excel->getActiveSheet()->SetCellValue('C19', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D19', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E19', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F19', 'গড় উপঃ');

            $madrashainfo = isset($detailinfo['madrashainfo']) ? $detailinfo['madrashainfo'] : NULL;

            $this->excel->getActiveSheet()->SetCellValue('A20', $madrashainfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B20', $madrashainfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C20', $madrashainfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D20', $madrashainfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E20', $madrashainfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F20', $madrashainfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G20', $madrashainfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H20', $madrashainfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I20', $madrashainfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J20', $madrashainfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K20', $madrashainfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L20', $madrashainfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M20', $madrashainfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N20', $madrashainfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O20', $madrashainfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P20', $madrashainfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q20', $madrashainfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R20', $madrashainfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S20', $madrashainfo->ww_increase);

            // ৫। উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি সপ্তাহ   রিপোর্ট   17 23 24 25         
            $this->excel->getActiveSheet()->getStyle("A22:R22")->applyFromArray($style);
            $this->excel->getActiveSheet()->mergeCells('A22:R22');
            $this->excel->getActiveSheet()->getStyle('A22')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A22', '৫। উচ্চমাধ্যমিক ও ডিপ্লোমা দাওয়াতি সপ্তাহ   রিপোর্ট');

            $this->excel->getActiveSheet()->SetCellValue('A23', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B23', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C23', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C23:D23');
            $this->excel->getActiveSheet()->SetCellValue('E23', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E23:F23');
            $this->excel->getActiveSheet()->mergeCells('G23:G24');
            $this->excel->getActiveSheet()->SetCellValue('G23', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H23:H24');
            $this->excel->getActiveSheet()->SetCellValue('H23', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I23:I24');
            $this->excel->getActiveSheet()->SetCellValue('I23', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J23:J24');
            $this->excel->getActiveSheet()->SetCellValue('J23', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K23:K24');
            $this->excel->getActiveSheet()->SetCellValue('K23', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L23:L24');
            $this->excel->getActiveSheet()->SetCellValue('L23', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M23:M24');
            $this->excel->getActiveSheet()->SetCellValue('M23', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N23:N24');
            $this->excel->getActiveSheet()->SetCellValue('N23', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O23:O24');
            $this->excel->getActiveSheet()->SetCellValue('O23', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P23:P24');
            $this->excel->getActiveSheet()->SetCellValue('P23', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q23:Q24');
            $this->excel->getActiveSheet()->SetCellValue('Q23', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R23:R24');
            $this->excel->getActiveSheet()->SetCellValue('R23', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S23:S24');
            $this->excel->getActiveSheet()->SetCellValue('S23', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A23:A24');
            $this->excel->getActiveSheet()->mergeCells('B23:B24');
            $this->excel->getActiveSheet()->SetCellValue('C24', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D24', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E24', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F24', 'গড় উপঃ');

            $college_dawat_reportinfo = isset($detailinfo['college_dawat_reportinfo']) ? $detailinfo['college_dawat_reportinfo'] : NULL;

            $this->excel->getActiveSheet()->SetCellValue('A25', $college_dawat_reportinfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B25', $college_dawat_reportinfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C25', $college_dawat_reportinfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D25', $college_dawat_reportinfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E25', $college_dawat_reportinfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F25', $college_dawat_reportinfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G25', $college_dawat_reportinfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H25', $college_dawat_reportinfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I25', $college_dawat_reportinfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J25', $college_dawat_reportinfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K25', $college_dawat_reportinfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L25', $college_dawat_reportinfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M25', $college_dawat_reportinfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N25', $college_dawat_reportinfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O25', $college_dawat_reportinfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P25', $college_dawat_reportinfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q25', $college_dawat_reportinfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R25', $college_dawat_reportinfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S25', $college_dawat_reportinfo->ww_increase);


            // ৬। দাওয়াতী পক্ষ/ দশক রিপোর্ট   27 28 29 30         
            $this->excel->getActiveSheet()->getStyle("A27:R27")->applyFromArray($style);
            $this->excel->getActiveSheet()->mergeCells('A27:R27');
            $this->excel->getActiveSheet()->SetCellValue('A27', '৬। দাওয়াতী পক্ষ/ দশক রিপোর্ট');
            $this->excel->getActiveSheet()->getStyle('A27')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A28', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B28', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C28', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C28:D28');
            $this->excel->getActiveSheet()->SetCellValue('E28', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E28:F28');
            $this->excel->getActiveSheet()->mergeCells('G28:G29');
            $this->excel->getActiveSheet()->SetCellValue('G28', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H28:H29');
            $this->excel->getActiveSheet()->SetCellValue('H28', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I28:I29');
            $this->excel->getActiveSheet()->SetCellValue('I28', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J28:J29');
            $this->excel->getActiveSheet()->SetCellValue('J28', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K28:K29');
            $this->excel->getActiveSheet()->SetCellValue('K28', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L28:L29');
            $this->excel->getActiveSheet()->SetCellValue('L28', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M28:M29');
            $this->excel->getActiveSheet()->SetCellValue('M28', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N28:N29');
            $this->excel->getActiveSheet()->SetCellValue('N28', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O28:O29');
            $this->excel->getActiveSheet()->SetCellValue('O28', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P28:P29');
            $this->excel->getActiveSheet()->SetCellValue('P28', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q28:Q29');
            $this->excel->getActiveSheet()->SetCellValue('Q28', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R28:R29');
            $this->excel->getActiveSheet()->SetCellValue('R28', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S28:S29');
            $this->excel->getActiveSheet()->SetCellValue('S28', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A28:A29');
            $this->excel->getActiveSheet()->mergeCells('B28:B29');
            $this->excel->getActiveSheet()->SetCellValue('C29', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D29', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E29', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F29', 'গড় উপঃ');

            $fortnight_dawat_reportinfo = isset($detailinfo['fortnight_dawat_reportinfo']) ? $detailinfo['fortnight_dawat_reportinfo'] : NULL;

            $this->excel->getActiveSheet()->SetCellValue('A30', $fortnight_dawat_reportinfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B30', $fortnight_dawat_reportinfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C30', $fortnight_dawat_reportinfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D30', $fortnight_dawat_reportinfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E30', $fortnight_dawat_reportinfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F30', $fortnight_dawat_reportinfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G30', $fortnight_dawat_reportinfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H30', $fortnight_dawat_reportinfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I30', $fortnight_dawat_reportinfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J30', $fortnight_dawat_reportinfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K30', $fortnight_dawat_reportinfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L30', $fortnight_dawat_reportinfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M30', $fortnight_dawat_reportinfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N30', $fortnight_dawat_reportinfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O30', $fortnight_dawat_reportinfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P30', $fortnight_dawat_reportinfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q30', $fortnight_dawat_reportinfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R30', $fortnight_dawat_reportinfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S30', $fortnight_dawat_reportinfo->ww_increase);


            //27 28 29 30

            //    $this->sma->print_arrays($detailinfo);

            // ৭। বিশ্ববিদ্যালয় ও অনার্স কলেজ দাওয়াতি সপ্তাহ  রিপোর্ট   32 33 34 35         
            $this->excel->getActiveSheet()->getStyle("A32:R32")->applyFromArray($style);
            $this->excel->getActiveSheet()->mergeCells('A32:R32');
            $this->excel->getActiveSheet()->SetCellValue('A32', '৭। বিশ্ববিদ্যালয় ও অনার্স কলেজ দাওয়াতি সপ্তাহ  রিপোর্ট');
            $this->excel->getActiveSheet()->getStyle('A32')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A33', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B33', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C33', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C33:D33');
            $this->excel->getActiveSheet()->SetCellValue('E33', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E33:F33');
            $this->excel->getActiveSheet()->mergeCells('G33:G34');
            $this->excel->getActiveSheet()->SetCellValue('G33', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H33:H34');
            $this->excel->getActiveSheet()->SetCellValue('H33', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I33:I34');
            $this->excel->getActiveSheet()->SetCellValue('I33', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J33:J34');
            $this->excel->getActiveSheet()->SetCellValue('J33', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K33:K34');
            $this->excel->getActiveSheet()->SetCellValue('K33', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L33:L34');
            $this->excel->getActiveSheet()->SetCellValue('L33', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M33:M34');
            $this->excel->getActiveSheet()->SetCellValue('M33', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N33:N34');
            $this->excel->getActiveSheet()->SetCellValue('N33', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O33:O34');
            $this->excel->getActiveSheet()->SetCellValue('O33', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P33:P34');
            $this->excel->getActiveSheet()->SetCellValue('P33', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q33:Q34');
            $this->excel->getActiveSheet()->SetCellValue('Q33', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R33:R34');
            $this->excel->getActiveSheet()->SetCellValue('R33', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S33:S34');
            $this->excel->getActiveSheet()->SetCellValue('S33', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A33:A34');
            $this->excel->getActiveSheet()->mergeCells('B33:B34');
            $this->excel->getActiveSheet()->SetCellValue('C34', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D34', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E34', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F34', 'গড় উপঃ');

            $university_dawat_reportinfo = isset($detailinfo['university_dawat_reportinfo']) ? $detailinfo['university_dawat_reportinfo'] : NULL;

            $this->excel->getActiveSheet()->SetCellValue('A35', $university_dawat_reportinfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B35', $university_dawat_reportinfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C35', $university_dawat_reportinfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D35', $university_dawat_reportinfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E35', $university_dawat_reportinfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F35', $university_dawat_reportinfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G35', $university_dawat_reportinfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H35', $university_dawat_reportinfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I35', $university_dawat_reportinfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J35', $university_dawat_reportinfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K35', $university_dawat_reportinfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L35', $university_dawat_reportinfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M35', $university_dawat_reportinfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N35', $university_dawat_reportinfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O35', $university_dawat_reportinfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P35', $university_dawat_reportinfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q35', $university_dawat_reportinfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R35', $university_dawat_reportinfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S35', $university_dawat_reportinfo->ww_increase);






            // মাধ্যমিক (স্কুল ও মাদ্রাসা) দাওয়াতী দশক রিপোর্ট
            $this->excel->getActiveSheet()->mergeCells('A37:R37');
            $this->excel->getActiveSheet()->getStyle("A37:R37")->applyFromArray($style);
            $this->excel->getActiveSheet()->SetCellValue('A37', '৮। মাধ্যমিক (স্কুল ও মাদ্রাসা) দাওয়াতী দশক রিপোর্ট');
            $this->excel->getActiveSheet()->getStyle('A37')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A38', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('B38', 'বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('C38', 'সাধারণ সভা');
            $this->excel->getActiveSheet()->mergeCells('C38:D38');
            $this->excel->getActiveSheet()->SetCellValue('E38', 'অন্যান্য বৈঠক');
            $this->excel->getActiveSheet()->mergeCells('E38:F38');
            $this->excel->getActiveSheet()->mergeCells('G38:G39');
            $this->excel->getActiveSheet()->SetCellValue('G38', 'দাওয়াতী কার্ড, বুকলেট');
            $this->excel->getActiveSheet()->mergeCells('H38:H39');
            $this->excel->getActiveSheet()->SetCellValue('H38', 'পরিচিতি বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('I38:I39');
            $this->excel->getActiveSheet()->SetCellValue('I38', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->mergeCells('J38:J39');
            $this->excel->getActiveSheet()->SetCellValue('J38', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('K38:K39');
            $this->excel->getActiveSheet()->SetCellValue('K38', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->mergeCells('L38:L39');
            $this->excel->getActiveSheet()->SetCellValue('L38', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('M38:M39');
            $this->excel->getActiveSheet()->SetCellValue('M38', 'ছাত্র সংবাদ বিতরণ');
            $this->excel->getActiveSheet()->mergeCells('N38:N39');
            $this->excel->getActiveSheet()->SetCellValue('N38', 'গ্রাহক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('O38:O39');
            $this->excel->getActiveSheet()->SetCellValue('O38', 'প্রেরিত গ্রুপ');
            $this->excel->getActiveSheet()->mergeCells('P38:P39');
            $this->excel->getActiveSheet()->SetCellValue('P38', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('Q38:Q39');
            $this->excel->getActiveSheet()->SetCellValue('Q38', 'অমুসলিম সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('R38:R39');
            $this->excel->getActiveSheet()->SetCellValue('R38', 'অমুসলিম বন্ধু বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('S38:S39');
            $this->excel->getActiveSheet()->SetCellValue('S38', 'শুভাকাংখী বৃদ্ধি');
            $this->excel->getActiveSheet()->mergeCells('A38:A39');
            $this->excel->getActiveSheet()->mergeCells('B38:B39');
            $this->excel->getActiveSheet()->SetCellValue('C39', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D39', 'গড় উপঃ');
            $this->excel->getActiveSheet()->SetCellValue('E39', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F39', 'গড় উপঃ');

            $secondary_dawat_reportinfo = isset($detailinfo['secondary_dawat_reportinfo']) ? $detailinfo['secondary_dawat_reportinfo'] : NULL;

            // $this->sma->print_arrays($detailinfo);

            $this->excel->getActiveSheet()->SetCellValue('A40', $secondary_dawat_reportinfo->supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('B40', $secondary_dawat_reportinfo->friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('C40', $secondary_dawat_reportinfo->number_general_gather);
            $this->excel->getActiveSheet()->SetCellValue('D40', $secondary_dawat_reportinfo->avg_presence);
            $this->excel->getActiveSheet()->SetCellValue('E40', $secondary_dawat_reportinfo->number_other_meeting);
            $this->excel->getActiveSheet()->SetCellValue('F40', $secondary_dawat_reportinfo->other_avg);
            $this->excel->getActiveSheet()->SetCellValue('G40', $secondary_dawat_reportinfo->card_booklet);
            $this->excel->getActiveSheet()->SetCellValue('H40', $secondary_dawat_reportinfo->porichiti);
            $this->excel->getActiveSheet()->SetCellValue('I40', $secondary_dawat_reportinfo->kishore);
            $this->excel->getActiveSheet()->SetCellValue('J40', $secondary_dawat_reportinfo->kishore_client_increase);
            $this->excel->getActiveSheet()->SetCellValue('K40', $secondary_dawat_reportinfo->kishore_eng);
            $this->excel->getActiveSheet()->SetCellValue('L40', $secondary_dawat_reportinfo->kishore_eng_increase);
            $this->excel->getActiveSheet()->SetCellValue('M40', $secondary_dawat_reportinfo->chhatrasongbad);
            $this->excel->getActiveSheet()->SetCellValue('N40', $secondary_dawat_reportinfo->chhatrasongbad_increase);
            $this->excel->getActiveSheet()->SetCellValue('O40', $secondary_dawat_reportinfo->group_sent);
            $this->excel->getActiveSheet()->SetCellValue('P40', $secondary_dawat_reportinfo->supporter_org_increase);
            $this->excel->getActiveSheet()->SetCellValue('Q40', $secondary_dawat_reportinfo->nonmuslim_supporter_increase);
            $this->excel->getActiveSheet()->SetCellValue('R40', $secondary_dawat_reportinfo->nonmuslim_friend_increase);
            $this->excel->getActiveSheet()->SetCellValue('S40', $secondary_dawat_reportinfo->ww_increase);

            //32 33 34 35

            //    $this->sma->print_arrays($detailinfo);



            // $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);


            $filename = 'Dawat_detail_' . $branch->name . '_' . $this->input->get('year');

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }



        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function getEntryInfoSUM($report_type_get, $branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/' . $this->session->userdata('branch_id'));
        }




        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];



        $param = array($report_start, $report_end);
        $madrasha_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_madrasha_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $online_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_online_dawat_report WHERE  date BETWEEN ? AND ? ", $param);

        $dawatgroupsendinfo = $this->site->query_binding("SELECT * FROM sma_dawatgroupsend WHERE  date BETWEEN ? AND ? ", $param);
        $letgotovillageinfo = $this->site->query_binding("SELECT * FROM sma_letgotovillage WHERE  date BETWEEN ? AND ? ", $param);
        $school_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_school_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $college_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_college_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $fortnight_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_fortnight_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $university_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_university_dawat_report WHERE  date BETWEEN ? AND ? ", $param);
        $secondary_dawat_reportinfo = $this->site->query_binding("SELECT * FROM sma_secondary_dawat_report WHERE  date BETWEEN ? AND ? ", $param);





        return array(
            "madrasha_dawat_reportinfo" => $madrasha_dawat_reportinfo,
            "online_dawat_reportinfo" => $online_dawat_reportinfo,
            "dawatgroupsendinfo" => $dawatgroupsendinfo,
            "letgotovillageinfo" => $letgotovillageinfo,
            "school_dawat_reportinfo" => $school_dawat_reportinfo,
            "college_dawat_reportinfo" => $college_dawat_reportinfo,
            "fortnight_dawat_reportinfo" => $fortnight_dawat_reportinfo,
            "university_dawat_reportinfo" => $university_dawat_reportinfo,
            "secondary_dawat_reportinfo" => $secondary_dawat_reportinfo,
        );
    }





    function getEntryInfo($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false && ($report_type_get['last_half'] || $report_type == 'half_yearly')) {


            $type = ($report_type == 'half_yearly') ? 'half_yearly' : 'annual';

            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);


            // $this->sma->print_arrays($madrashainfo );
            if (!$madrashainfo) {
                $this->site->insertData('madrasha_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


            $onlineinfo = $this->site->getOneRecord('online_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);


            // $this->sma->print_arrays($onlineinfo );
            if (!$onlineinfo) {
                $this->site->insertData('madrasha_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$dawatgroupsendinfo) {
                $this->site->insertData('dawatgroupsend', array('branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$letgotovillageinfo) {
                $this->site->insertData('letgotovillage', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }



            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);



            if (!$school_dawat_reportinfo) {
                $this->site->insertData('school_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$college_dawat_reportinfo) {
                $this->site->insertData('college_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }

            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$fortnight_dawat_reportinfo) {
                $this->site->insertData('fortnight_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }

            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

            if (!$university_dawat_reportinfo) {
                $this->site->insertData('university_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }


            $secondary_dawat_reportinfo = $this->site->getOneRecord('secondary_dawat_report', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);


            if (!$secondary_dawat_reportinfo) {
                $this->site->insertData('secondary_dawat_report', array('branch_id' => $branch_id, 'report_type' => $type, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }
        }




        if ($report_type == 'annual' && $report_type_get['last_half']) {
            $start = $report_start;
            $end = $report_end;

            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);

            $onlineinfo = $this->site->getOneRecord('online_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);


            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $secondary_dawat_reportinfo = $this->site->getOneRecord('secondary_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
        } else if ($report_type && $report_type == 'annual') {

            $param = array($branch_id, $report_start, $report_end);


            $result = $this->site->query_binding("SELECT * FROM sma_madrasha_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $madrashainfo = (object) $final;
            $madrashainfo->id = 999999999999;



            $result = $this->site->query_binding("SELECT * FROM sma_online_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $onlineinfo = (object) $final;
            $onlineinfo->id = 999999999999;





            $result = $this->site->query_binding("SELECT * FROM sma_dawatgroupsend WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $dawatgroupsendinfo = (object) $final;
            $dawatgroupsendinfo->id = 999999999999;

            $result = $this->site->query_binding("SELECT * FROM sma_letgotovillage WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $letgotovillageinfo = (object) $final;
            $letgotovillageinfo->id = 999999999999;

            $result = $this->site->query_binding("SELECT * FROM sma_school_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $school_dawat_reportinfo = (object) $final;
            $school_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_college_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $college_dawat_reportinfo = (object) $final;
            $college_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_fortnight_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $fortnight_dawat_reportinfo = (object) $final;
            $fortnight_dawat_reportinfo->id = 999999999999;


            $result = $this->site->query_binding("SELECT * FROM sma_university_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);


            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });

            //$this->sma->print_arrays($final);



            $university_dawat_reportinfo = (object) $final;
            $university_dawat_reportinfo->id = 999999999999;





            $result = $this->site->query_binding("SELECT * FROM sma_secondary_dawat_report WHERE  branch_id = ? AND date BETWEEN ? AND ? ", $param);
            $final = array();
            array_walk_recursive($result, function ($item, $key) use (&$final) {
                $final[$key] = isset($final[$key]) ? $item + $final[$key] : $item;
            });
            $secondary_dawat_reportinfo = (object) $final;
            $secondary_dawat_reportinfo->id = 999999999999;


        } else if ($report_type && $report_type == 'half_yearly') {

            $start = $report_start;
            $end = $report_end;

            $madrashainfo = $this->site->getOneRecord('madrasha_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $onlineinfo = $this->site->getOneRecord('online_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);

            $dawatgroupsendinfo = $this->site->getOneRecord('dawatgroupsend', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $letgotovillageinfo = $this->site->getOneRecord('letgotovillage', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $school_dawat_reportinfo = $this->site->getOneRecord('school_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $college_dawat_reportinfo = $this->site->getOneRecord('college_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $fortnight_dawat_reportinfo = $this->site->getOneRecord('fortnight_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $university_dawat_reportinfo = $this->site->getOneRecord('university_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);
            $secondary_dawat_reportinfo = $this->site->getOneRecord('secondary_dawat_report', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);


        }







        return array(
            'madrashainfo' => $madrashainfo,
            'onlineinfo' => $onlineinfo,
            'dawatgroupsendinfo' => $dawatgroupsendinfo,
            'letgotovillageinfo' => $letgotovillageinfo,
            'school_dawat_reportinfo' => $school_dawat_reportinfo,
            'college_dawat_reportinfo' => $college_dawat_reportinfo,
            'fortnight_dawat_reportinfo' => $fortnight_dawat_reportinfo,
            'university_dawat_reportinfo' => $university_dawat_reportinfo,
            'secondary_dawat_reportinfo' => $secondary_dawat_reportinfo,
        );
    }



    function increased_output($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/increased_output/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/increased_output/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
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

        if ($branch_id)   //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoOutput($report_type, $branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoOutputSUM($report_type, $branch_id);
        }




        $this->data['assooutput'] = $this->getAssoOutput($report_type, $branch_id);
        $this->data['memberoutput'] = $this->getMemberOutput($report_type, $branch_id);




        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'বৃদ্ধিকৃতদের আউটপুট'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/increased_output_entry', $meta, $this->data, 'leftmenu/manpower');
        else
            $this->page_construct('dawat/increased_output', $meta, $this->data, 'leftmenu/manpower');
    }







    function getEntryInfoOutput($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

        if ($report_type_get['is_current'] != false) {
            if ($report_type == 'half_yearly') {


                ///half_yearly starts
                $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$increase_outputinfo) {
                    $this->site->insertData('increase_output', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///half_yearly ends


            } else {


                ///annual starts
                $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$increase_outputinfo) {
                    $this->site->insertData('increase_output', array('branch_id' => $branch_id, 'report_type' => 'annual', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///annual ends

            }
        }


        if ($report_type == 'annual' && $report_type_get['last_half']) {
            $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } else if ($report_type && $report_type == 'annual') {



            $increaseoutputinfo = $this->site->query_binding("SELECT 
        SUM(`member_single_digit`) as member_single_digit ,SUM(`member_jsc_jdc`) as member_jsc_jdc,SUM(`member_ssc_dhakil`) as member_ssc_dhakil,SUM(`member_hsc_alim`) as member_hsc_alim,SUM(`member_science`) as member_science,SUM(`member_arts`) as member_arts, SUM(`member_business`) as member_business, SUM(`member_madrasha`) as member_madrasha,SUM(`member_department_position`) as member_department_position, SUM(`member_medical_college`) as member_medical_college, SUM(`member_engineeering`) as member_engineeering, SUM(`member_public_university`) as member_public_university,
        SUM(`asso_single_digit`) as asso_single_digit ,SUM(`asso_jsc_jdc`) as asso_jsc_jdc,SUM(`asso_ssc_dhakil`) as asso_ssc_dhakil,SUM(`asso_hsc_alim`) as asso_hsc_alim,SUM(`asso_science`) as asso_science,SUM(`asso_arts`) as asso_arts, SUM(`asso_business`) as asso_business, SUM(`asso_madrasha`) as asso_madrasha,SUM(`asso_department_position`) as asso_department_position, SUM(`asso_medical_college`) as asso_medical_college, SUM(`asso_engineeering`) as asso_engineeering, SUM(`asso_public_university`) as asso_public_university,
        SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
        SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university, SUM(`member_influential`) as member_influential, SUM(`asso_influential`) as asso_influential,SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential, SUM(`member_hc_science`) as member_hc_science, SUM(`asso_hc_science`) as asso_hc_science,SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science,SUM(`member_agri`) as member_agri, SUM(`asso_agri`) as asso_agri,SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,SUM(`member_improvement`) as member_improvement,SUM(`asso_improvement`) as asso_improvement,SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement,SUM(`member_department_position_private`) as member_department_position_private, SUM(`asso_department_position_private`) as asso_department_position_private, SUM(`worker_department_position_private`) as worker_department_position_private, SUM(`supporter_department_position_private`) as supporter_department_position_private,SUM(`member_ideal_college`) as member_ideal_college, SUM(`asso_ideal_college`) as asso_ideal_college, SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college
        FROM `sma_increase_output` where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
            //$increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);	


            $increase_outputinfo = (object) $increaseoutputinfo[0];
            $increase_outputinfo->id = 999999999999;

            //    $increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$entrytimeinfo->enddate_annual,'date >= '=>$entrytimeinfo->startdate_half),'id desc',1,0);	

        } else if ($report_type && $report_type == 'half_yearly') {

            $increase_outputinfo = $this->site->getOneRecord('increase_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }




        return array(
            'increase_outputinfo' => isset($increase_outputinfo) ? $increase_outputinfo : ''
        );
    }



    function detailupdate($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);


        $flag = 1;

        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
        $msg = '';

        if ($is_changeable) {
            $flag = 100;
            $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
        } else
            $msg = 'failed';




        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }













    function getManpower($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        if ($branch_id) {
        } else {
        }

        return "mok";
    }




    function getAssoOutput($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT SUM(`asso_single_digit`) AS single_digit , 
            SUM(`asso_jsc_jdc`) AS `jsc_jdc` ,
            SUM(`asso_ssc_dhakil`) AS  `ssc_dhakil`,
            SUM(`asso_hsc_alim`)  AS `hsc_alim`,
            SUM(`asso_department_position`)  AS `department_position`,
            SUM(`asso_department_position_private`)  AS `department_position_private`,
            SUM(`asso_influential`)  AS `influential`,
            SUM(`asso_hc_science`)  AS `hc_science`,
            SUM(`asso_madrasha`)  AS `madrasha`,
            SUM(`asso_medical_college`)  AS `medical_college`,
            SUM(`asso_ideal_college`)  AS `ideal_college`,
            SUM(`asso_engineeering`)  AS `engineeering`,
            SUM(`asso_agri`)  AS `agri`,
            SUM(`asso_science`)  AS `science`,
            SUM(`asso_business`)  AS `business`,
            SUM(`asso_arts`)  AS `arts` FROM `sma_associatelog` where  branch  = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT SUM(`asso_single_digit`) AS single_digit , 
        SUM(`asso_jsc_jdc`) AS `jsc_jdc` ,
        SUM(`asso_ssc_dhakil`) AS  `ssc_dhakil`,
        SUM(`asso_hsc_alim`)  AS `hsc_alim`,
        SUM(`asso_department_position`)  AS `department_position`,
        SUM(`asso_department_position_private`)  AS `department_position_private`,
        SUM(`asso_influential`)  AS `influential`,
        SUM(`asso_hc_science`)  AS `hc_science`,
        SUM(`asso_madrasha`)  AS `madrasha`,
        SUM(`asso_medical_college`)  AS `medical_college`,
        SUM(`asso_ideal_college`)  AS `ideal_college`,
        SUM(`asso_engineeering`)  AS `engineeering`,
        SUM(`asso_agri`)  AS `agri`,
        SUM(`asso_science`)  AS `science`,
        SUM(`asso_business`)  AS `business`,
        SUM(`asso_arts`)  AS `arts` FROM `sma_associatelog` where    process_date BETWEEN ? AND ? ", array($report_start, $report_end));




        return $result;
    }

    function getMemberOutput($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT SUM(`member_single_digit`) AS single_digit , 
            SUM(`member_jsc_jdc`) AS `jsc_jdc` ,
            SUM(`member_ssc_dhakil`) AS  `ssc_dhakil`,
            SUM(`member_hsc_alim`)  AS `hsc_alim`,
            SUM(`member_department_position`)  AS `department_position`,
            SUM(`member_department_position_private`)  AS `department_position_private`,
            SUM(`member_influential`)  AS `influential`,
            SUM(`member_hc_science`)  AS `hc_science`,
            SUM(`member_madrasha`)  AS `madrasha`,
            SUM(`member_medical_college`)  AS `medical_college`,
            SUM(`member_ideal_college`)  AS `ideal_college`,
            SUM(`member_engineeering`)  AS `engineeering`,
            SUM(`member_agri`)  AS `agri`,
            SUM(`member_science`)  AS `science`,
            SUM(`member_business`)  AS `business`,
            SUM(`member_arts`)  AS `arts` FROM `sma_memberlog` where  branch  = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT SUM(`member_single_digit`) AS single_digit , 
        SUM(`member_jsc_jdc`) AS `jsc_jdc` ,
        SUM(`member_ssc_dhakil`) AS  `ssc_dhakil`,
        SUM(`member_hsc_alim`)  AS `hsc_alim`,
        SUM(`member_department_position`)  AS `department_position`,
        SUM(`member_department_position_private`)  AS `department_position_private`,
        SUM(`member_influential`)  AS `influential`,
        SUM(`member_hc_science`)  AS `hc_science`,
        SUM(`member_madrasha`)  AS `madrasha`,
        SUM(`member_medical_college`)  AS `medical_college`,
        SUM(`member_ideal_college`)  AS `ideal_college`,
        SUM(`member_engineeering`)  AS `engineeering`,
        SUM(`member_agri`)  AS `agri`,
        SUM(`member_science`)  AS `science`,
        SUM(`member_business`)  AS `business`,
        SUM(`member_arts`)  AS `arts` FROM `sma_memberlog` where    process_date BETWEEN ? AND ? ", array($report_start, $report_end));




        return $result;
    }


    function getEntryInfoOutputSUM($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        $result = $this->site->query_binding("SELECT 
SUM(`member_single_digit`) as member_single_digit ,SUM(`member_jsc_jdc`) as member_jsc_jdc,SUM(`member_ssc_dhakil`) as member_ssc_dhakil,SUM(`member_hsc_alim`) as member_hsc_alim,SUM(`member_science`) as member_science,SUM(`member_arts`) as member_arts, SUM(`member_business`) as member_business, SUM(`member_madrasha`) as member_madrasha,SUM(`member_department_position`) as member_department_position,SUM(`member_department_position_private`) as member_department_position_private, SUM(`member_medical_college`) as member_medical_college, SUM(`member_ideal_college`) as member_ideal_college, SUM(`asso_ideal_college`) as asso_ideal_college, SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college,  SUM(`member_engineeering`) as member_engineeering, SUM(`member_public_university`) as member_public_university,
SUM(`asso_single_digit`) as asso_single_digit ,SUM(`asso_jsc_jdc`) as asso_jsc_jdc,SUM(`asso_ssc_dhakil`) as asso_ssc_dhakil,SUM(`asso_hsc_alim`) as asso_hsc_alim,SUM(`asso_science`) as asso_science,SUM(`asso_arts`) as asso_arts, SUM(`asso_business`) as asso_business, SUM(`asso_madrasha`) as asso_madrasha,SUM(`asso_department_position`) as asso_department_position, SUM(`asso_department_position_private`) as asso_department_position_private, SUM(`asso_medical_college`) as asso_medical_college, SUM(`asso_engineeering`) as asso_engineeering, SUM(`asso_public_university`) as asso_public_university,
SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_department_position_private`) as worker_department_position_private,  SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position,  SUM(`supporter_department_position_private`) as supporter_department_position_private, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university, SUM(`member_influential`) as member_influential, SUM(`asso_influential`) as asso_influential,SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential, SUM(`member_hc_science`) as member_hc_science, SUM(`asso_hc_science`) as asso_hc_science,SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science,SUM(`member_agri`) as member_agri, SUM(`asso_agri`) as asso_agri,SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,SUM(`member_improvement`) as member_improvement,SUM(`asso_improvement`) as asso_improvement,SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement
FROM `sma_increase_output` where   date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }








    function extra($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
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


        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoExtra($report_type, $branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoExtraSUM($report_type, $branch_id);
        }



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'অতিরিক্ত দাওয়াত'));
        $meta = array('page_title' => 'Dawat', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/extra_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/extra', $meta, $this->data, 'leftmenu/dawat');
    }



    function dawat_extra_export($branch_id)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/extra/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $report_info = $report_type;


        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $detailinfo = $this->getEntryInfoExtra($report_type, $branch_id);
        } else {
            $detailinfo = $this->getEntryInfoExtraSUM($report_type, $branch_id);
        }


        if ($detailinfo) {
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Dawat Extra');




            $this->excel->getActiveSheet()->mergeCells('A1:K1');
            $this->excel->getActiveSheet()->mergeCells('A2:K2');
            $this->excel->getActiveSheet()->mergeCells('A3:K3');
            $this->excel->getActiveSheet()->mergeCells('A4:K4');
            $this->excel->getActiveSheet()->mergeCells('A5:K5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:K4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:K4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');






            $this->excel->getActiveSheet()->SetCellValue('A3', 'অতিরিক্ত দাওয়াত ' . strtoupper($report_type['type']) . ' Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);


            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));


            $this->excel->getActiveSheet()->mergeCells('A7:A8');
            $this->excel->getActiveSheet()->mergeCells('B7:E7');
            //$this->excel->getActiveSheet()->mergeCells('E7:E8');
            $this->excel->getActiveSheet()->mergeCells('F7:F8');
            $this->excel->getActiveSheet()->mergeCells('G7:G8');
            $this->excel->getActiveSheet()->mergeCells('H7:H8');
            $this->excel->getActiveSheet()->mergeCells('I7:I9');
            $this->excel->getActiveSheet()->mergeCells('J7:J9');
            $this->excel->getActiveSheet()->mergeCells('K7:K9');


            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP
                )
            );

            $this->excel->getActiveSheet()->getStyle("A7:J7")->applyFromArray($style);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(45);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);

            $this->excel->getActiveSheet()->SetCellValue('A7', 'অতিরিক্ত দাওয়াত');
            $this->excel->getActiveSheet()->SetCellValue('B7', 'অংশগ্রহনকারী');
            $this->excel->getActiveSheet()->SetCellValue('F7', 'দাওয়াত প্রাপ্ত');
            $this->excel->getActiveSheet()->SetCellValue('G7', 'বন্ধু বৃদ্ধি');


            $this->excel->getActiveSheet()->SetCellValue('H7', 'সমর্থক বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('I7', 'অতিরিক্ত দাওয়াত');
            $this->excel->getActiveSheet()->SetCellValue('J7', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('K7', 'বৃদ্ধি');



            $this->excel->getActiveSheet()->SetCellValue('B8', 'পূর্বের সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('C8', 'বর্তমান সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('D8', 'বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('E8', 'ঘাটতি');




            //  $this->sma->print_arrays($detailinfo['extra_dawatinfo']);



            $this->excel->getActiveSheet()->SetCellValue('A9', 'ব্যক্তিগত দাওয়াতী কাজ');
            $this->excel->getActiveSheet()->SetCellValue('B9', $detailinfo['extra_dawatinfo']->personal_dawat_prev);
            $this->excel->getActiveSheet()->SetCellValue('C9', $detailinfo['extra_dawatinfo']->personal_dawat_current);
            $this->excel->getActiveSheet()->SetCellValue('D9', $detailinfo['extra_dawatinfo']->personal_dawat_increase);
            $this->excel->getActiveSheet()->SetCellValue('E9', $detailinfo['extra_dawatinfo']->personal_dawat_decrease);

            $this->excel->getActiveSheet()->SetCellValue('F9', $detailinfo['extra_dawatinfo']->personal_dawat_person);

            $this->excel->getActiveSheet()->SetCellValue('G9', $detailinfo['extra_dawatinfo']->personal_dawat_friend);
            $this->excel->getActiveSheet()->SetCellValue('H9', $detailinfo['extra_dawatinfo']->personal_dawat_supporter);


            $this->excel->getActiveSheet()->SetCellValue('A10', 'গ্রুপ দাওয়াতী কাজ');
            $this->excel->getActiveSheet()->SetCellValue('B10', $detailinfo['extra_dawatinfo']->group_dawat_prev);
            $this->excel->getActiveSheet()->SetCellValue('C10', $detailinfo['extra_dawatinfo']->group_dawat_current);
            $this->excel->getActiveSheet()->SetCellValue('D10', $detailinfo['extra_dawatinfo']->group_dawat_increase);
            $this->excel->getActiveSheet()->SetCellValue('E10', $detailinfo['extra_dawatinfo']->group_dawat_decrease);

            $this->excel->getActiveSheet()->SetCellValue('F10', $detailinfo['extra_dawatinfo']->group_dawat_person);
            $this->excel->getActiveSheet()->SetCellValue('G10', $detailinfo['extra_dawatinfo']->group_dawat_friend);
            $this->excel->getActiveSheet()->SetCellValue('H10', $detailinfo['extra_dawatinfo']->group_dawat_supporter);
            $this->excel->getActiveSheet()->SetCellValue('I10', 'দাওয়াতী গ্রুপ');
            $this->excel->getActiveSheet()->SetCellValue('J10', $detailinfo['extra_dawatinfo']->dawat_group);
            $this->excel->getActiveSheet()->SetCellValue('K10', $detailinfo['extra_dawatinfo']->dawat_group_increase);


            $this->excel->getActiveSheet()->SetCellValue('A11', 'মুহরামাদের মাঝে কাজ');
            $this->excel->getActiveSheet()->SetCellValue('B11', $detailinfo['extra_dawatinfo']->muharrama_dawat_prev);
            $this->excel->getActiveSheet()->SetCellValue('C11', $detailinfo['extra_dawatinfo']->muharrama_dawat_current);
            $this->excel->getActiveSheet()->SetCellValue('D11', $detailinfo['extra_dawatinfo']->muharrama_dawat_increase);
            $this->excel->getActiveSheet()->SetCellValue('E11', $detailinfo['extra_dawatinfo']->muharrama_dawat_decrease);

            $this->excel->getActiveSheet()->SetCellValue('F11', $detailinfo['extra_dawatinfo']->muharrama_dawat_person);
            $this->excel->getActiveSheet()->SetCellValue('G11', $detailinfo['extra_dawatinfo']->muharrama_dawat_friend);
            $this->excel->getActiveSheet()->SetCellValue('H11', $detailinfo['extra_dawatinfo']->muharrama_dawat_supporter);
            $this->excel->getActiveSheet()->SetCellValue('I11', 'জনশক্তিদের মোট মুহাররমা কতজন');
            $this->excel->getActiveSheet()->SetCellValue('J11', $detailinfo['extra_dawatinfo']->muharram_number);
            $this->excel->getActiveSheet()->SetCellValue('K11', $detailinfo['extra_dawatinfo']->muharram_number_increase);

            $this->excel->getActiveSheet()->SetCellValue('A12', 'আত্মীয় ও প্রতিবেশী');
            $this->excel->getActiveSheet()->SetCellValue('B12', $detailinfo['extra_dawatinfo']->relative_dawat_prev);
            $this->excel->getActiveSheet()->SetCellValue('C12', $detailinfo['extra_dawatinfo']->relative_dawat_current);
            $this->excel->getActiveSheet()->SetCellValue('D12', $detailinfo['extra_dawatinfo']->relative_dawat_increase);
            $this->excel->getActiveSheet()->SetCellValue('E12', $detailinfo['extra_dawatinfo']->relative_dawat_decrease);

            $this->excel->getActiveSheet()->SetCellValue('F12', $detailinfo['extra_dawatinfo']->relative_dawat_person);
            $this->excel->getActiveSheet()->SetCellValue('G12', $detailinfo['extra_dawatinfo']->relative_dawat_friend);
            $this->excel->getActiveSheet()->SetCellValue('H12', $detailinfo['extra_dawatinfo']->relative_dawat_supporter);
            $this->excel->getActiveSheet()->SetCellValue('I12', 'জনশক্তিদের মোট আত্মীয় ও প্রতিবেশী কতজন');
            $this->excel->getActiveSheet()->SetCellValue('J12', $detailinfo['extra_dawatinfo']->relative_number);
            $this->excel->getActiveSheet()->SetCellValue('K12', $detailinfo['extra_dawatinfo']->relative_number_increase);



            $filename = 'dawat_extra_' . $branch->name . '_' . $this->input->get('year');

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }



        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }





    function getEntryInfoExtra($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false) {
            if ($report_type == 'half_yearly') {


                ///half_yearly starts
                $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);



                if (!$extra_dawatinfo) {
                    $this->site->insertData('extra_dawat', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///half_yearly ends


            } else {


                ///annual starts
                $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$extra_dawatinfo) {
                    $this->site->insertData('extra_dawat', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///annual ends

            }
        }

        if ($report_type == 'annual' && $report_type_get['last_half']) {
            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } else if ($report_type && $report_type == 'annual') {
            $result1 = $this->site->query_binding("SELECT  SUM(id) id,  SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter ,    SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,  SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter ,   SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter , SUM(`dawat_group_increase`) as dawat_group_increase , SUM(`muharram_number_increase`) as muharram_number_increase , SUM(`relative_number_increase`) as relative_number_increase , SUM(`personal_dawat_decrease`) as personal_dawat_decrease , SUM(`group_dawat_decrease`) as group_dawat_decrease , SUM(`muharrama_dawat_decrease`) as muharrama_dawat_decrease , SUM(`relative_dawat_decrease`) as relative_dawat_decrease FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));


            //last half
            $result2 = $this->site->query_binding("SELECT SUM(id) id,  SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`group_dawat_prev`) as group_dawat_prev,
		 SUM(`muharrama_dawat_prev`) as  muharrama_dawat_prev,
		 SUM(`relative_dawat_prev`) as relative_dawat_prev , SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`group_dawat_current`) as group_dawat_current,		 
        SUM(`muharrama_dawat_current`) as muharrama_dawat_current,  SUM(`relative_dawat_current`) as relative_dawat_current, SUM(`dawat_group`) as dawat_group,  SUM(`muharram_number`) as muharram_number,  SUM(`relative_number`) as relative_number   FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));

            $result = array_replace_recursive($result1, $result2);

            $extra_dawatinfo = (object) $result[0];
            $extra_dawatinfo->id = 999999999999;
        } else if ($report_type && $report_type == 'half_yearly') {

            $extra_dawatinfo = $this->site->getOneRecord('extra_dawat', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }


        //$extra_dawatinfo = $this->site->getOneRecord('extra_dawat','*',array('report_type'=>$report_type,'branch_id'=>$branch_id),'id desc',1,0);	

        //   $this->sma->print_arrays($extra_dawatinfo);
        return array(
            'extra_dawatinfo' => $extra_dawatinfo
        );
    }




    function getEntryInfoExtraSUM($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter , SUM(`group_dawat_prev`) as group_dawat_prev , SUM(`group_dawat_current`) as group_dawat_current , SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,
 SUM(`muharrama_dawat_prev`) as muharrama_dawat_prev , SUM(`muharrama_dawat_current`) as muharrama_dawat_current , SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter , SUM(`relative_dawat_prev`) as  relative_dawat_prev, SUM(`relative_dawat_current`) as  relative_dawat_current, SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter ,SUM(`dawat_group`) as dawat_group ,SUM(`dawat_group_increase`) as dawat_group_increase ,SUM(`muharram_number`) as muharram_number ,SUM(`muharram_number_increase`) as muharram_number_increase ,SUM(`relative_number`) as relative_number ,SUM(`relative_number_increase`) as relative_number_increase FROM `sma_extra_dawat` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT SUM(`personal_dawat_prev`) as personal_dawat_prev ,SUM(`personal_dawat_current`) as personal_dawat_current , SUM(`personal_dawat_increase`) as  personal_dawat_increase, SUM(`personal_dawat_person`) as personal_dawat_person , SUM(`personal_dawat_friend`) as personal_dawat_friend , SUM(`personal_dawat_supporter`) as personal_dawat_supporter , SUM(`group_dawat_prev`) as group_dawat_prev , SUM(`group_dawat_current`) as group_dawat_current , SUM(`group_dawat_increase`) as group_dawat_increase , SUM(`group_dawat_person`) as group_dawat_person , SUM(`group_dawat_friend`) as  group_dawat_friend, SUM(`group_dawat_supporter`) as group_dawat_supporter ,
 SUM(`muharrama_dawat_prev`) as muharrama_dawat_prev , SUM(`muharrama_dawat_current`) as muharrama_dawat_current , SUM(`muharrama_dawat_increase`) as muharrama_dawat_increase , SUM(`muharrama_dawat_person`) as muharrama_dawat_person , SUM(`muharrama_dawat_friend`) as  muharrama_dawat_friend, SUM(`muharrama_dawat_supporter`) as muharrama_dawat_supporter , SUM(`relative_dawat_prev`) as  relative_dawat_prev, SUM(`relative_dawat_current`) as  relative_dawat_current, SUM(`relative_dawat_increase`) as relative_dawat_increase , SUM(`relative_dawat_person`) as  relative_dawat_person, SUM(`relative_dawat_friend`) as  relative_dawat_friend,SUM(`relative_dawat_supporter`) as relative_dawat_supporter ,SUM(`dawat_group`) as dawat_group ,SUM(`dawat_group_increase`) as dawat_group_increase ,SUM(`muharram_number`) as muharram_number ,SUM(`muharram_number_increase`) as muharram_number_increase ,SUM(`relative_number`) as relative_number ,SUM(`relative_number_increase`) as relative_number_increase, SUM(`personal_dawat_decrease`) as personal_dawat_decrease , SUM(`group_dawat_decrease`) as group_dawat_decrease , SUM(`muharrama_dawat_decrease`) as muharrama_dawat_decrease , SUM(`relative_dawat_decrease`) as relative_dawat_decrease  FROM `sma_extra_dawat` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }


    function getDawahProgram($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id) {
            if ($report_type == 'annual' && $report_type_get['last_half']) {
                $result = $this->site->query_binding("SELECT * FROM `sma_dawah_program` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));

            } else if ($report_type && $report_type == 'annual') {
                $dawahprogram = $this->site->query_binding("SELECT SUM(group_dawah_number) group_dawah_number,            
SUM(participant_manpower) participant_manpower,       
SUM(supporter_increase) supporter_increase,     
SUM(friend_increase) friend_increase,
SUM(non_muslim_supporter_increase) non_muslim_supporter_increase,
SUM(non_muslim_friend_increase) non_muslim_friend_increase,
SUM(wellwisher_increase) wellwisher_increase,   
SUM(general_program_number) general_program_number,   
SUM(avg_presence) avg_presence,
SUM(identity_distribution) identity_distribution,
SUM(teen_magazine) teen_magazine,
SUM(receiver_increase) receiver_increase,
SUM(supporter_org_increase) supporter_org_increase,
dawah_category_id FROM `sma_dawah_program` WHERE branch_id = ? AND date BETWEEN ? AND ? group by dawah_category_id", array($branch_id, $report_start, $report_end));

                $result = (object) $dawahprogram[0];
                $result->id = 999999999999;

            } else if ($report_type && $report_type == 'half_yearly') {
                $result = $this->site->query_binding("SELECT * FROM `sma_dawah_program` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));

            }

        } else
            $result = $this->site->query_binding("SELECT SUM(group_dawah_number) group_dawah_number,            
SUM(participant_manpower) participant_manpower,       
SUM(supporter_increase) supporter_increase,     
SUM(friend_increase) friend_increase,
SUM(non_muslim_supporter_increase) non_muslim_supporter_increase,
SUM(non_muslim_friend_increase) non_muslim_friend_increase,
SUM(wellwisher_increase) wellwisher_increase,   
SUM(general_program_number) general_program_number,   
SUM(avg_presence) avg_presence,
SUM(identity_distribution) identity_distribution,
SUM(teen_magazine) teen_magazine,
SUM(receiver_increase) receiver_increase,
SUM(supporter_org_increase) supporter_org_increase,
dawah_category_id FROM `sma_dawah_program` WHERE date BETWEEN ? AND ? group by dawah_category_id", array($report_start, $report_end));



        return $result;
    }




    function getdawatsummary($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT * FROM `sma_dawat_summary` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT institution_type_id,
             SUM(supporter)  supporter, SUM(friend)  friend, SUM(non_muslim_supporter)  non_muslim_supporter, SUM(non_muslim_friend)  non_muslim_friend, SUM(wellwisher)  wellwisher
             FROM `sma_dawat_summary` WHERE date BETWEEN ? AND ? group by institution_type_id", array($report_start, $report_end));



        return $result;
    }





    function getdawat_decrease_target($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT * FROM `sma_dawat_decrease_target` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT 
             SUM(supporter_target)  supporter_target, SUM(friend_target)  friend_target, SUM(non_muslim_supporter_target)  non_muslim_supporter_target, SUM(non_muslim_friend_target)  non_muslim_friend_target, SUM(wellwisher_target)  wellwisher_target,
             SUM(supporter_decrease)  supporter_decrease, SUM(friend_decrease)  friend_decrease, SUM(non_muslim_supporter_decrease)  non_muslim_supporter_decrease, SUM(non_muslim_friend_decrease)  non_muslim_friend_decrease, SUM(wellwisher_decrease)  wellwisher_decrease
             , SUM(wellwisher_increase)  wellwisher_increase FROM `sma_dawat_decrease_target` WHERE date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }






    function getEntryGroupDawahActivity($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false) {



            if ($report_type == 'half_yearly') {

                $groupDawahActivity = $this->site->getOneRecord('group_dawah_activity', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$groupDawahActivity) {
                    $this->site->insertData('group_dawah_activity', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                }



            } else {


                $groupDawahActivity = $this->site->getOneRecord('group_dawah_activity', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$groupDawahActivity) {
                    $this->site->insertData('group_dawah_activity', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                }


            }
        }


    }


    function getEntrytDawahProgram($category, $report_type_get, $branch_id = NULL)
    {



        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false) {



            if ($report_type == 'half_yearly') {



                $dawatinfo = $this->site->getOneRecord('dawah_program', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);



                if (!$dawatinfo) {


                    foreach ($category as $row) {

                        $this->site->insertData('dawah_program', array('dawah_category_id' => $row->id, 'branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));

                    }

                }




            } else {



                $dawatinfo = $this->site->getOneRecord('dawah_program', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawatinfo) {

                    foreach ($category as $row) {
                        $this->site->insertData('dawah_program', array('institution_type_id' => $row->id, 'branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                    }
                }


            }
        }


    }


    function getDawahActivity($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($branch_id)
            $result = $this->site->query_binding("SELECT * FROM `sma_group_dawah_activity` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
        else
            $result = $this->site->query_binding("SELECT 
             SUM(group_number)  group_number, SUM(group_increase)  group_increase, SUM(dawah_times)  dawah_times, SUM(supporter_increase)  supporter_increase, SUM(friend_increase)  friend_increase ,
             SUM(number_groups_sent)  number_groups_sent, SUM(community_based_program_number)  community_based_program_number, SUM(community_based_program_avg_presence)  community_based_program_avg_presence,  
SUM(supporter_org_increase)  supporter_org_increase, SUM(total_mosque)  total_mosque,  SUM(mosque_activity_prev)  mosque_activity_prev,  
SUM(mosque_activity_current)  mosque_activity_current, SUM(mosque_activity_increase)  mosque_activity_increase,  SUM(mosque_activity_program)  mosque_activity_program  
  FROM `sma_group_dawah_activity` WHERE date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }





    function mosque($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoMosque($report_type, $branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoMosqueSUM($report_type, $branch_id);
        }

        //    $this->sma->print_arrays($this->data['detailinfo']);


        $report_type_get = $this->report_type();

        $report_type = $report_type_get['type'];






        $this->data['lastyearmosque'] = $this->prevmosque('annual', $report_type_get['last_year'], $branch_id);
        $cal_type = 'annual';



        //  $this->sma->print_arrays($this->data['lastyearmosque']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'মসজিদ ভিত্তিক কাজ'));
        $meta = array('page_title' => 'Dawat', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/mosque_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/mosque', $meta, $this->data, 'leftmenu/dawat');
    }




    function mosque_export($branch_id)
    {
        $this->sma->checkPermissions('index', TRUE);


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $report_info = $report_type;


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/mosque/' . $this->session->userdata('branch_id'));
        }

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

            $branch_id = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

            $branch_id = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $detailinfo = $this->getEntryInfoMosque($report_type, $branch_id);
        } else {
            $detailinfo = $this->getEntryInfoMosqueSUM($report_type, $branch_id);
        }

        //    $this->sma->print_arrays($this->data['detailinfo']);


        $report_type_get = $this->report_type();

        $report_type = $report_type_get['type'];






        $lastyearmosque = $this->prevmosque('annual', $report_type_get['last_year'], $branch_id);
        $cal_type = 'annual';

        if (!empty($detailinfo)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('mosque');




            $this->excel->getActiveSheet()->mergeCells('A1:J1');
            $this->excel->getActiveSheet()->mergeCells('A2:J2');
            $this->excel->getActiveSheet()->mergeCells('A3:J3');
            $this->excel->getActiveSheet()->mergeCells('A4:J4');
            $this->excel->getActiveSheet()->mergeCells('A5:J5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:J4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:J4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
            $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type_get['type']) . 'মসজিদ ভিত্তিক কাজ  রিপোর্ট: from ' . $report_type_get['start'] . ' to ' . $report_type_get['end']);
            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));





            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);


            $this->excel->getActiveSheet()->mergeCells('A6:A7');
            $this->excel->getActiveSheet()->getStyle('A6:J6')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A6', 'মসজিদ ভিত্তিক কাজ');
            $this->excel->getActiveSheet()->SetCellValue('B6', 'মোট মসজিদ সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('C6', 'পূর্বে কাজ হতো কতটিতে');
            $this->excel->getActiveSheet()->SetCellValue('D6', 'কাজ হয় কতটি মসজিদে');
            $this->excel->getActiveSheet()->SetCellValue('E6', 'কাজ বৃদ্ধি কতটিতে');
            $this->excel->getActiveSheet()->SetCellValue('F6', 'কাজ ঘাটতি কতটিতে');
            $this->excel->getActiveSheet()->SetCellValue('G6', 'দারসে কুরআন');
            $this->excel->getActiveSheet()->SetCellValue('H6', 'হাদীস পাঠ');
            $this->excel->getActiveSheet()->SetCellValue('I6', 'বক্তব্য');
            $this->excel->getActiveSheet()->SetCellValue('J6', 'অন্যান্য');

            $prev = $lastyearmosque[0]['mosque_number'];
            $this->excel->getActiveSheet()->SetCellValue('B7', $detailinfo['mosquebaseworkinfo']->mosque_number);
            $this->excel->getActiveSheet()->SetCellValue('C7', $prev);
            $this->excel->getActiveSheet()->SetCellValue('D7', $prev + $detailinfo['mosquebaseworkinfo']->work_increase_mosque - $detailinfo['mosquebaseworkinfo']->work_decrease_mosque);
            $this->excel->getActiveSheet()->SetCellValue('E7', $detailinfo['mosquebaseworkinfo']->work_increase_mosque);
            $this->excel->getActiveSheet()->SetCellValue('F7', $detailinfo['mosquebaseworkinfo']->work_decrease_mosque);
            $this->excel->getActiveSheet()->SetCellValue('G7', $detailinfo['mosquebaseworkinfo']->dars_quran);
            $this->excel->getActiveSheet()->SetCellValue('H7', $detailinfo['mosquebaseworkinfo']->dars_hadith);
            $this->excel->getActiveSheet()->SetCellValue('I7', $detailinfo['mosquebaseworkinfo']->lecture);
            $this->excel->getActiveSheet()->SetCellValue('J7', $detailinfo['mosquebaseworkinfo']->other);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
            $filename = 'mosque_' . $branch->name . '_' . $this->input->get('year');

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }




        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }





    function prevmosque($report_type, $last_year, $branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id)
            $result = $this->site->query_binding("SELECT SUM(`mosque_number`) as  mosque_number          
FROM `sma_mosque_calculated` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));
        else
            $result = $this->site->query_binding("SELECT SUM(`mosque_number`) as  mosque_number FROM `sma_mosque_calculated` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));

        // $this->sma->print_arrays($this->db->last_query());

        return $result;
    }


    function getEntryInfoMosque($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

        if ($report_type_get['is_current'] != false) {
            if ($report_type && $report_type == 'half_yearly') {

                ///half_yearly starts
                $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                //  $this->sma->print_arrays($mosquebaseworkinfo);

                if (!$mosquebaseworkinfo) {
                    $this->site->insertData('mosquebasework', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                    //  $this->sma->print_arrays($mosquebaseworkinfo);

                }



                ///half_yearly ends


            } else {


                ///annual starts
                $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$mosquebaseworkinfo) {

                    $this->site->insertData('mosquebasework', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///annual ends

            }
        }

        // echo $report_type.' >> '.$report_type_get['last_half'];
        // exit();

        if ($report_type == 'annual' && $report_type_get['last_half']) {
            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } else if ($report_type && $report_type == 'annual') {
            //work_increase_mosque,work_decrease_mosque,dars_quran,dars_hadith,lecture,other


            $result1 = $this->site->query_binding("SELECT  sum(id) id, SUM(`work_increase_mosque`) as work_increase_mosque , SUM(`work_decrease_mosque`) as work_decrease_mosque , SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
        FROM `sma_mosquebasework` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_half, $report_type_get['info']->enddate_annual));


            //last half
            $result2 = $this->site->query_binding("SELECT sum(id) id, SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active  
        FROM `sma_mosquebasework` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));


            $result = array_replace_recursive($result1, $result2);


            $mosquebaseworkinfo = (object) $result[0];
            $mosquebaseworkinfo->id = 999999999999;
        } else if ($report_type && $report_type == 'half_yearly') {


            $mosquebaseworkinfo = $this->site->getOneRecord('mosquebasework', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }

        //  $this->sma->print_arrays($mosquebaseworkinfo);

        return array(
            'mosquebaseworkinfo' => $mosquebaseworkinfo
        );
    }



    function getEntryInfoMosqueSUM($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];

        $report_info = $report_type_get['info'];








        if ($report_type == 'annual' && $report_type_get['last_half']) {

            $result = $this->site->query_binding("SELECT SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active , SUM(`work_increase_mosque`) as work_increase_mosque ,  SUM(`work_decrease_mosque`) as work_decrease_mosque, SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
        }

        if ($report_type && $this->input->get('type') == 'annual') {


            //full
            $result1 = $this->site->query_binding("SELECT  SUM(id) id,  SUM(`work_increase_mosque`) as work_increase_mosque ,   SUM(`work_decrease_mosque`) as work_decrease_mosque,  SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
            //last half
            $result2 = $this->site->query_binding("SELECT  SUM(id) id,  SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active  
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_type_get['info']->startdate_annual, $report_type_get['info']->enddate_annual));



            $result = array_replace_recursive($result1, $result2);
        } else if ($report_type && $report_type == 'half_yearly') {


            $result = $this->site->query_binding("SELECT SUM(`mosque_number`) as mosque_number ,SUM(`mosque_active`) as mosque_active , SUM(`work_increase_mosque`) as work_increase_mosque ,   SUM(`work_decrease_mosque`) as work_decrease_mosque, SUM(`dars_quran`) as dars_quran , SUM(`dars_hadith`) as dars_hadith ,SUM(`lecture`) as lecture , SUM(`other`) as  other
FROM `sma_mosquebasework` WHERE   date BETWEEN ? AND ? ", array($report_start, $report_end));
        }

        //$this->sma->print_arrays($this->db->last_query());


        return $result;
    }


    function element($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        }

        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoElement($report_type, $branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoElementSUM($report_type, $branch_id);
        }



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'দাওয়াতী উপকরণ'));
        $meta = array('page_title' => 'Dawat Element', 'bc' => $bc);
        if ($branch_id)  // && (  !$this->Owner && !$this->Admin  )
            $this->page_construct('dawat/element_entry', $meta, $this->data, 'leftmenu/dawat');
        else
            $this->page_construct('dawat/element', $meta, $this->data, 'leftmenu/dawat');
    }



    function element_export($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('dawat/element/' . $this->session->userdata('branch_id'));
        }

        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $report_info = $report_type;


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        if ($branch_id)  //&& (  !$this->Owner && !$this->Admin  )
        {
            $detailinfo = $this->getEntryInfoElement($report_type, $branch_id);
        } else {
            $detailinfo = $this->getEntryInfoElementSUM($report_type, $branch_id);
        }




        if (!empty($detailinfo)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Element');




            $this->excel->getActiveSheet()->mergeCells('A1:H1');
            $this->excel->getActiveSheet()->mergeCells('A2:H2');
            $this->excel->getActiveSheet()->mergeCells('A3:H3');
            $this->excel->getActiveSheet()->mergeCells('A4:H4');
            $this->excel->getActiveSheet()->mergeCells('A5:H5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:H4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:H4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
            $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . 'দাওয়াতী উপকরণ  রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));




            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




            $this->excel->getActiveSheet()->getStyle('A6:H6')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A6', 'দাওয়াতী উপকরণ');
            $this->excel->getActiveSheet()->SetCellValue('B6', 'বিক্রয়');
            $this->excel->getActiveSheet()->SetCellValue('C6', 'বিতরণ');
            $this->excel->getActiveSheet()->SetCellValue('D6', 'দাওয়াতী উপকরণ');
            $this->excel->getActiveSheet()->SetCellValue('E6', 'সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('F6', 'বিক্রয়');
            $this->excel->getActiveSheet()->SetCellValue('G6', 'বিতরণ');
            $this->excel->getActiveSheet()->SetCellValue('H6', 'গ্রাহক বৃদ্ধি');



            $this->excel->getActiveSheet()->SetCellValue('A7', 'কুরআন');
            $this->excel->getActiveSheet()->SetCellValue('A8', 'হাদীস');
            $this->excel->getActiveSheet()->SetCellValue('A9', 'পরিচিতি');
            $this->excel->getActiveSheet()->SetCellValue('A10', 'সাহিত্য');
            $this->excel->getActiveSheet()->SetCellValue('A11', 'স্টীকার/কার্ড');
            $this->excel->getActiveSheet()->SetCellValue('A12', 'রুটিন');
            $this->excel->getActiveSheet()->SetCellValue('A13', 'ক্যালেন্ডার');
            $this->excel->getActiveSheet()->SetCellValue('A14', 'ডায়েরী/নোটবুক');
            $this->excel->getActiveSheet()->SetCellValue('A15', 'অন্যান্য');


            $this->excel->getActiveSheet()->SetCellValue('D7', 'কিশোর পত্রিকা বাংলা');
            $this->excel->getActiveSheet()->SetCellValue('D8', 'কিশোর পত্রিকা ইংরেজী');
            $this->excel->getActiveSheet()->SetCellValue('D9', 'ছাত্রসংবাদ');
            $this->excel->getActiveSheet()->SetCellValue('D10', 'ইংরেজী ম্যাগাজিন');
            $this->excel->getActiveSheet()->SetCellValue('D11', 'সসাস পত্রিকা');
            $this->excel->getActiveSheet()->SetCellValue('D12', 'মাদ্রাসা পত্রিকা');
            $this->excel->getActiveSheet()->SetCellValue('D13', 'স্টুডেন্ট ভিউজ');
            $this->excel->getActiveSheet()->SetCellValue('D14', 'বিজ্ঞান ম্যাগাজিন');
            $this->excel->getActiveSheet()->SetCellValue('D15', 'শাখা থেকে প্রকাশিত পত্রিকা');



            $this->excel->getActiveSheet()->SetCellValue('B7', $detailinfo['dawatelementinfo']->quran_sale);
            $this->excel->getActiveSheet()->SetCellValue('C7', $detailinfo['dawatelementinfo']->quran_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E7', $detailinfo['dawatelementinfo']->kishore_bn_number);
            $this->excel->getActiveSheet()->SetCellValue('F7', $detailinfo['dawatelementinfo']->kishore_bn_sale);
            $this->excel->getActiveSheet()->SetCellValue('G7', $detailinfo['dawatelementinfo']->kishore_bn_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H7', $detailinfo['dawatelementinfo']->kishore_bn_client);


            $this->excel->getActiveSheet()->SetCellValue('B8', $detailinfo['dawatelementinfo']->hadith_sale);
            $this->excel->getActiveSheet()->SetCellValue('C8', $detailinfo['dawatelementinfo']->hadith_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E8', $detailinfo['dawatelementinfo']->kishore_en_number);
            $this->excel->getActiveSheet()->SetCellValue('F8', $detailinfo['dawatelementinfo']->kishore_en_sale);
            $this->excel->getActiveSheet()->SetCellValue('G8', $detailinfo['dawatelementinfo']->kishore_en_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H8', $detailinfo['dawatelementinfo']->kishore_en_client);

            $this->excel->getActiveSheet()->SetCellValue('B9', '');
            $this->excel->getActiveSheet()->SetCellValue('C9', $detailinfo['dawatelementinfo']->porichiti_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E9', $detailinfo['dawatelementinfo']->chhatrasangbad_number);
            $this->excel->getActiveSheet()->SetCellValue('F9', $detailinfo['dawatelementinfo']->chhatrasangbad_sale);
            $this->excel->getActiveSheet()->SetCellValue('G9', $detailinfo['dawatelementinfo']->chhatrasangbad_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H9', $detailinfo['dawatelementinfo']->chhatrasangbad_client);

            $this->excel->getActiveSheet()->SetCellValue('B10', $detailinfo['dawatelementinfo']->literature_sale);
            $this->excel->getActiveSheet()->SetCellValue('C10', $detailinfo['dawatelementinfo']->literature_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E10', $detailinfo['dawatelementinfo']->eng_mag_number);
            $this->excel->getActiveSheet()->SetCellValue('F10', $detailinfo['dawatelementinfo']->eng_mag_sale);
            $this->excel->getActiveSheet()->SetCellValue('G10', $detailinfo['dawatelementinfo']->eng_mag_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H10', $detailinfo['dawatelementinfo']->eng_mag_client);

            $this->excel->getActiveSheet()->SetCellValue('B11', $detailinfo['dawatelementinfo']->sticker_sale);
            $this->excel->getActiveSheet()->SetCellValue('C11', $detailinfo['dawatelementinfo']->sticker_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E11', $detailinfo['dawatelementinfo']->sosas_number);
            $this->excel->getActiveSheet()->SetCellValue('F11', $detailinfo['dawatelementinfo']->sosas_sale);
            $this->excel->getActiveSheet()->SetCellValue('G11', $detailinfo['dawatelementinfo']->sosas_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H11', $detailinfo['dawatelementinfo']->sosas_client);

            $this->excel->getActiveSheet()->SetCellValue('B12', $detailinfo['dawatelementinfo']->routine_sale);
            $this->excel->getActiveSheet()->SetCellValue('C12', $detailinfo['dawatelementinfo']->routine_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E12', $detailinfo['dawatelementinfo']->madrasha_number);
            $this->excel->getActiveSheet()->SetCellValue('F12', $detailinfo['dawatelementinfo']->madrasha_sale);
            $this->excel->getActiveSheet()->SetCellValue('G12', $detailinfo['dawatelementinfo']->madrasha_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H12', $detailinfo['dawatelementinfo']->madrasha_client);

            $this->excel->getActiveSheet()->SetCellValue('B13', $detailinfo['dawatelementinfo']->calendar_sale);
            $this->excel->getActiveSheet()->SetCellValue('C13', $detailinfo['dawatelementinfo']->calendar_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E13', $detailinfo['dawatelementinfo']->std_view_number);
            $this->excel->getActiveSheet()->SetCellValue('F13', $detailinfo['dawatelementinfo']->std_view_sale);
            $this->excel->getActiveSheet()->SetCellValue('G13', $detailinfo['dawatelementinfo']->std_view_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H13', $detailinfo['dawatelementinfo']->std_view_client);


            $this->excel->getActiveSheet()->SetCellValue('B14', $detailinfo['dawatelementinfo']->diary_sale);
            $this->excel->getActiveSheet()->SetCellValue('C14', $detailinfo['dawatelementinfo']->diary_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E14', $detailinfo['dawatelementinfo']->sci_mag_number);
            $this->excel->getActiveSheet()->SetCellValue('F14', $detailinfo['dawatelementinfo']->sci_mag_sale);
            $this->excel->getActiveSheet()->SetCellValue('G14', $detailinfo['dawatelementinfo']->sci_mag_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H14', $detailinfo['dawatelementinfo']->sci_mag_client);


            $this->excel->getActiveSheet()->SetCellValue('B15', $detailinfo['dawatelementinfo']->cd_sale);
            $this->excel->getActiveSheet()->SetCellValue('C15', $detailinfo['dawatelementinfo']->cd_distribution);
            $this->excel->getActiveSheet()->SetCellValue('E15', $detailinfo['dawatelementinfo']->branch_paper_number);
            $this->excel->getActiveSheet()->SetCellValue('F15', $detailinfo['dawatelementinfo']->branch_paper_sale);
            $this->excel->getActiveSheet()->SetCellValue('G15', $detailinfo['dawatelementinfo']->branch_paper_distribution);
            $this->excel->getActiveSheet()->SetCellValue('H15', $detailinfo['dawatelementinfo']->branch_paper_client);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);



            $filename = 'Element_' . $branch->name . '_' . $this->input->get('year');

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }




        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function getEntryInfoElement($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        if ($report_type_get['is_current'] != false) {
            if ($report_type == 'half_yearly') {


                ///half_yearly starts
                $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawatelementinfo) {
                    $this->site->insertData('dawatelement', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///half_yearly ends


            } else {


                ///annual starts
                $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$dawatelementinfo) {
                    $this->site->insertData('dawatelement', array('branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $report_year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///annual ends

            }
        }


        if ($report_type == 'annual' && $report_type_get['last_half']) {
            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } else if ($report_type == 'annual') {


            $result = $this->site->query_binding("SELECT 
        SUM(`quran_sale`)  as quran_sale, SUM(`quran_distribution`)  as quran_distribution, SUM(`hadith_sale`)  as hadith_sale, SUM(`hadith_distribution`)  as hadith_distribution, SUM(`porichiti_sale`)  as porichiti_sale, SUM(`porichiti_distribution`)  as porichiti_distribution, SUM(`literature_sale`)  as literature_sale, SUM(`literature_distribution`)  as literature_distribution , SUM(`sticker_sale`)  as sticker_sale, SUM(`sticker_distribution`)  as sticker_distribution, SUM(`routine_sale`)  as routine_sale, SUM(`routine_distribution`)  as routine_distribution, SUM(`calendar_sale`)  as calendar_sale, SUM(`calendar_distribution`)  as calendar_distribution, SUM(`diary_sale`)  as diary_sale, SUM(`diary_distribution`)  as diary_distribution, SUM(`cd_sale`)  as cd_sale, SUM(`cd_distribution`)  as cd_distribution, SUM(`kishore_bn_number`)  as kishore_bn_number, SUM(`kishore_bn_sale`)  as kishore_bn_sale, SUM(`kishore_bn_distribution`)  as kishore_bn_distribution, SUM(`kishore_bn_client`)  as kishore_bn_client, SUM(`kishore_en_number`)  as kishore_en_number, SUM(`kishore_en_sale`)  as kishore_en_sale, SUM(`kishore_en_distribution`)  as kishore_en_distribution, SUM(`kishore_en_client`)  as kishore_en_client , SUM(`chhatrasangbad_number`)  as chhatrasangbad_number, SUM(`chhatrasangbad_sale`)  as chhatrasangbad_sale, SUM(`chhatrasangbad_distribution`)  as chhatrasangbad_distribution, SUM(`chhatrasangbad_client`)  as chhatrasangbad_client, SUM(`eng_mag_number`)  as eng_mag_number, SUM(`eng_mag_sale`)  as eng_mag_sale, SUM(`eng_mag_distribution`)  as eng_mag_distribution , SUM(`eng_mag_client`)  as eng_mag_client, SUM(`sosas_number`)  as sosas_number, SUM(`sosas_sale`)  as sosas_sale, SUM(`sosas_distribution`)  as sosas_distribution, SUM(`sosas_client`)  as sosas_client, SUM(`madrasha_number`)  as madrasha_number, SUM(`madrasha_sale`)  as madrasha_sale, SUM(`madrasha_distribution`)  as madrasha_distribution, SUM(`madrasha_client`)  as madrasha_client, SUM(`std_view_number`)  as std_view_number, SUM(`std_view_sale`)  as std_view_sale, SUM(`std_view_distribution`)  as std_view_distribution, SUM(`std_view_client`)  as std_view_client, SUM(`sci_mag_number`)  as sci_mag_number, SUM(`sci_mag_sale`)  as sci_mag_sale, SUM(`sci_mag_distribution`)  as sci_mag_distribution, SUM(`sci_mag_client`)  as sci_mag_client, SUM(`branch_paper_number`)  as branch_paper_number, SUM(`branch_paper_sale`)  as branch_paper_sale, SUM(`branch_paper_distribution`)  as branch_paper_distribution, SUM(`branch_paper_client`)  as branch_paper_client
        FROM `sma_dawatelement` WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
            $dawatelementinfo = (object) $result[0];
            $dawatelementinfo->id = 999999999999;
        } else if ($report_type == 'half_yearly') {

            $dawatelementinfo = $this->site->getOneRecord('dawatelement', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }


        //$dawatelementinfo = $this->site->getOneRecord('dawatelement','*',array('report_type'=>$report_type,'branch_id'=>$branch_id),'id desc',1,0);	

        return array(
            'dawatelementinfo' => $dawatelementinfo
        );
    }




    function getEntryInfoElementSUM($report_type_get, $branch_id = NULL)
    {

        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];


        $result = $this->site->query_binding("SELECT 
SUM(`quran_sale`)  as quran_sale, SUM(`quran_distribution`)  as quran_distribution, SUM(`hadith_sale`)  as hadith_sale, SUM(`hadith_distribution`)  as hadith_distribution, SUM(`porichiti_sale`)  as porichiti_sale, SUM(`porichiti_distribution`)  as porichiti_distribution, SUM(`literature_sale`)  as literature_sale, SUM(`literature_distribution`)  as literature_distribution , SUM(`sticker_sale`)  as sticker_sale, SUM(`sticker_distribution`)  as sticker_distribution, SUM(`routine_sale`)  as routine_sale, SUM(`routine_distribution`)  as routine_distribution, SUM(`calendar_sale`)  as calendar_sale, SUM(`calendar_distribution`)  as calendar_distribution, SUM(`diary_sale`)  as diary_sale, SUM(`diary_distribution`)  as diary_distribution, SUM(`cd_sale`)  as cd_sale, SUM(`cd_distribution`)  as cd_distribution, SUM(`kishore_bn_number`)  as kishore_bn_number, SUM(`kishore_bn_sale`)  as kishore_bn_sale, SUM(`kishore_bn_distribution`)  as kishore_bn_distribution, SUM(`kishore_bn_client`)  as kishore_bn_client, SUM(`kishore_en_number`)  as kishore_en_number, SUM(`kishore_en_sale`)  as kishore_en_sale, SUM(`kishore_en_distribution`)  as kishore_en_distribution, SUM(`kishore_en_client`)  as kishore_en_client , SUM(`chhatrasangbad_number`)  as chhatrasangbad_number, SUM(`chhatrasangbad_sale`)  as chhatrasangbad_sale, SUM(`chhatrasangbad_distribution`)  as chhatrasangbad_distribution, SUM(`chhatrasangbad_client`)  as chhatrasangbad_client, SUM(`eng_mag_number`)  as eng_mag_number, SUM(`eng_mag_sale`)  as eng_mag_sale, SUM(`eng_mag_distribution`)  as eng_mag_distribution , SUM(`eng_mag_client`)  as eng_mag_client, SUM(`sosas_number`)  as sosas_number, SUM(`sosas_sale`)  as sosas_sale, SUM(`sosas_distribution`)  as sosas_distribution, SUM(`sosas_client`)  as sosas_client, SUM(`madrasha_number`)  as madrasha_number, SUM(`madrasha_sale`)  as madrasha_sale, SUM(`madrasha_distribution`)  as madrasha_distribution, SUM(`madrasha_client`)  as madrasha_client, SUM(`std_view_number`)  as std_view_number, SUM(`std_view_sale`)  as std_view_sale, SUM(`std_view_distribution`)  as std_view_distribution, SUM(`std_view_client`)  as std_view_client, SUM(`sci_mag_number`)  as sci_mag_number, SUM(`sci_mag_sale`)  as sci_mag_sale, SUM(`sci_mag_distribution`)  as sci_mag_distribution, SUM(`sci_mag_client`)  as sci_mag_client, SUM(`branch_paper_number`)  as branch_paper_number, SUM(`branch_paper_sale`)  as branch_paper_sale, SUM(`branch_paper_distribution`)  as branch_paper_distribution, SUM(`branch_paper_client`)  as branch_paper_client
FROM `sma_dawatelement` WHERE date BETWEEN ? AND ? ", array($report_start, $report_end));



        return $result;
    }














    function check_member($member_id, $branch)
    {


        $info = $this->site->getcolumn('postpone', 'id', array('manpower_id' => $member_id, 'orgstatus_id' => 1, 'end_date' => '2050-12-31', 'branch' => $branch), 'id DESC', 1, 0);


        if ($info != NULL) {
            $this->form_validation->set_message('check_member', 'Already postponed!');
            return false;
        } else {

            return true;
        }
    }




    /* ------------------------------------------------------- */









    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);




        $this->load->helper('security');
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $branches = $this->site->getAllBranches();
        $manpower = $this->site->getManpowerByID($id);
        if (!$id || !$manpower) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }


        $this->form_validation->set_rules('product_image', lang("product_image"), 'xss_clean');

        if ($this->form_validation->run('manpower/add') == true) {

            $data = array(
                'name' => $this->input->post('name'),
                'studentlife' => $this->input->post('studentlife'),
                'education' => $this->input->post('education'),
                'sessionyear' => $this->input->post('sessionyear')
            );

            $this->load->library('upload');




            if ($_FILES['manpower_image']['size'] > 0) {

                $config['upload_path'] = $this->upload_path;
                $config['allowed_types'] = $this->image_types;
                $config['max_size'] = $this->allowed_file_size;
                $config['max_width'] = $this->Settings->iwidth;
                $config['max_height'] = $this->Settings->iheight;
                $config['overwrite'] = FALSE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('manpower_image')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("manpower/edit/" . $id);
                }
                $photo = $this->upload->file_name;
                $data['image'] = $photo;
                $this->load->library('image_lib');
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload_path . $photo;
                $config['new_image'] = $this->thumbs_path . $photo;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = $this->Settings->twidth;
                $config['height'] = $this->Settings->theight;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $this->image_lib->clear();
                $config = NULL;
            }
        }
        // $this->sma->print_arrays($data,$_POST);
        if ($this->form_validation->run() == true && $this->manpower_model->updateManpower($id, $data)) {
            $this->session->set_flashdata('message', lang("manpower_updated"));
            admin_redirect('manpower/member');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;
            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'member'), array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('manpower/edit', $meta, $this->data);
        }
    }



    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions(NULL, TRUE);

        admin_redirect('manpower');

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->products_model->deleteProduct($id)) {
            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("manpower_deleted")));
            }
            $this->session->set_flashdata('message', lang('manpower_deleted'));
            admin_redirect('welcome');
        }
    }




    /* --------------------------------------------------------------------------------------------- */

    function modal_view($id = NULL, $status = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $pr_details = $this->site->getManpowerByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            $this->sma->md();
        }

        $this->data['manpower'] = $pr_details;
        if ($status == 1) {
            $this->data['member'] = $this->manpower_model->getMemberByID($id);
            $this->data['status'] = 'Member';
        }
        $this->load->view($this->theme . 'manpower/modal_view', $this->data);
    }

    function view($id = NULL)
    {
        $this->sma->checkPermissions('index');

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);
        $this->data['sold'] = $this->products_model->getSoldQty($id);
        $this->data['purchased'] = $this->products_model->getPurchasedQty($id);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => $pr_details->name));
        $meta = array('page_title' => $pr_details->name, 'bc' => $bc);
        $this->page_construct('products/view', $meta, $this->data);
    }

    function pdf($id = NULL, $view = NULL)
    {
        $this->sma->checkPermissions('index');

        $pr_details = $this->products_model->getProductByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('prduct_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->data['barcode'] = "<img src='" . admin_url('products/gen_barcode/' . $pr_details->code . '/' . $pr_details->barcode_symbology . '/40/0') . "' alt='" . $pr_details->code . "' class='pull-left' />";
        if ($pr_details->type == 'combo') {
            $this->data['combo_items'] = $this->products_model->getProductComboItems($id);
        }
        $this->data['product'] = $pr_details;
        $this->data['unit'] = $this->site->getUnitByID($pr_details->unit);
        $this->data['brand'] = $this->site->getBrandByID($pr_details->brand);
        $this->data['images'] = $this->products_model->getProductPhotos($id);
        $this->data['category'] = $this->site->getCategoryByID($pr_details->category_id);
        $this->data['subcategory'] = $pr_details->subcategory_id ? $this->site->getCategoryByID($pr_details->subcategory_id) : NULL;
        $this->data['tax_rate'] = $pr_details->tax_rate ? $this->site->getTaxRateByID($pr_details->tax_rate) : NULL;
        $this->data['popup_attributes'] = $this->popup_attributes;
        $this->data['warehouses'] = $this->products_model->getAllWarehousesWithPQ($id);
        $this->data['options'] = $this->products_model->getProductOptionsWithWH($id);
        $this->data['variants'] = $this->products_model->getProductOptions($id);

        $name = $pr_details->code . '_' . str_replace('/', '_', $pr_details->name) . ".pdf";
        if ($view) {
            $this->load->view($this->theme . 'products/pdf', $this->data);
        } else {
            $html = $this->load->view($this->theme . 'products/pdf', $this->data, TRUE);
            if (!$this->Settings->barcode_img) {
                $html = preg_replace("'\<\?xml(.*)\?\>'", '', $html);
            }
            $this->sma->generate_pdf($html, $name);
        }
    }


    function memberincreaseexport($process_id, $branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $process = $this->site->getByID('process', 'id', $process_id);


        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');

        /*
                $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);

            if ($branch)
                $this->db->where($this->db->dbprefix('branches') . ".id", $branch);

             */
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member Increase list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_increase_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }





    function memberdecreaseexport($process_id, $branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $process = $this->site->getByID('process', 'id', $process_id);


        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');

        /*
                $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);

            if ($branch)
                $this->db->where($this->db->dbprefix('branches') . ".id", $branch);

             */
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member Increase list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_increase_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }






    function export_OLD($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }






        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('member')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('member')
            ->join('manpower', 'manpower.id=member.manpower_id', 'left')
            ->join('branches', 'branches.id=member.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('manpower.member_oath_date ASC');


        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);


        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'member_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function exportpostpone($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('postpone')
            ->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
            ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1)
            ->join('branches', 'branches.id=postpone.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('postpone.id ASC');

        //  $this->db->where($this->db->dbprefix('postpone') . ".end_date", '2050-12-31');
        $this->db->where($this->db->dbprefix('manpower') . ".orgstatus_id", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);


        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Postpone list');
            $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
            $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
            $this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');

            $this->excel->getActiveSheet()->SetCellValue('D1', 'Date');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');


            $row = 2;
            $sQty = 0;
            $pQty = 0;
            $sAmt = 0;
            $pAmt = 0;
            $bQty = 0;
            $bAmt = 0;
            $pl = 0;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->membercode);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->start_date);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);


                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'postpone_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }






    public function qa_suggestions()
    {
        $term = $this->input->get('term', true);

        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $analyzed = $this->sma->analyze_term($term);
        $sr = $analyzed['term'];
        $option_id = $analyzed['option_id'];

        $rows = $this->products_model->getQASuggestions($sr);
        if ($rows) {
            foreach ($rows as $row) {
                $row->qty = 1;
                $options = $this->products_model->getProductOptions($row->id);
                $row->option = $option_id;
                $row->serial = '';
                $c = sha1(uniqid(mt_rand(), true));
                $pr[] = array(
                    'id' => $c,
                    'item_id' => $row->id,
                    'label' => $row->name . " (" . $row->code . ")",
                    'row' => $row,
                    'options' => $options
                );
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }
}
