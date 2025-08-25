<?php defined('BASEPATH') or exit('No direct script access allowed');

class Organization extends MY_Controller
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
        $this->load->admin_model('organization_model');
        $this->digital_upload_path = 'files/';
        $this->upload_path = 'assets/uploads/';
        $this->thumbs_path = 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function get_no_org($branch_id = NULL)
    {

        if ($branch_id)
            $result = $this->site->query_binding("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org WHERE   branch_id = ?  GROUP BY institution_type_id ", array($branch_id));
        else
            $result = $this->site->query("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org GROUP BY institution_type_id");


        return $result;
    }



    function current_calculation_institution()
    {



        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);


        $this->excel->getActiveSheet()->setTitle('institution list calculation');
        $this->excel->getActiveSheet()->SetCellValue('A1', 'Branch ID');
        $this->excel->getActiveSheet()->SetCellValue('B1', 'type_id');
        $this->excel->getActiveSheet()->SetCellValue('C1', 'Number');



        $branches = $this->site->getAllBranches();

        $row = 2;

        foreach ($branches as $branch) {
            $record = $this->site->query("SELECT id,v3_organization_institution_current(id, '2021-12-23' , '2022-12-17'," . $branch->id . ",2021) current_number from `sma_institution`");



            foreach ($record as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $branch->id);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row['id']);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row['current_number']);

                $row++;
            }
        }
        $filename = 'institutionlist_calculation_2021';
        $this->load->helper('excel');
        create_excel($this->excel, $filename);

        // $this->sma->print_arrays( $record);

    }




    function current_calculation_organization()
    {



        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);


        $this->excel->getActiveSheet()->setTitle('organization list calculation');
        $this->excel->getActiveSheet()->SetCellValue('A1', 'Branch ID');
        $this->excel->getActiveSheet()->SetCellValue('B1', 'type_id');
        $this->excel->getActiveSheet()->SetCellValue('C1', 'Number');



        $branches = $this->site->getAllBranches();

        $row = 2;

        foreach ($branches as $branch) {
            $record = $this->site->query("SELECT id,v3_organization_minimum_one_unit_current(id, '2021-12-23' , '2022-12-17'," . $branch->id . ",2021) current_number from `sma_institution`");



            foreach ($record as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $branch->id);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row['id']);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row['current_number']);

                $row++;
            }
        }
        $filename = 'institutionlist_calculation_2021';
        $this->load->helper('excel');
        create_excel($this->excel, $filename);

        // $this->sma->print_arrays( $record);

    }





    function current_calculation_unit()
    {



        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);


        $this->excel->getActiveSheet()->setTitle('Unit calculation');
        $this->excel->getActiveSheet()->SetCellValue('A1', 'Branch ID');
        $this->excel->getActiveSheet()->SetCellValue('B1', 'type_id');
        $this->excel->getActiveSheet()->SetCellValue('C1', 'Number');



        $branches = $this->site->getAllBranches();

        $row = 2;

        foreach ($branches as $branch) {

            $record = $this->site->query("SELECT    institution_type_child ,   SUM(current_unit) current_unit 
        FROM `sma_institutionlist` WHERE   branch_id = " . $branch->id . " AND is_active = 1 
        GROUP BY institution_type_child");



            foreach ($record as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $branch->id);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row['institution_type_child']);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row['current_unit']);

                $row++;
            }
        }
        $filename = 'institutionlist_unit_calculation_2021';
        $this->load->helper('excel');
        create_excel($this->excel, $filename);

        // $this->sma->print_arrays( $record);

    }






    function institutional($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institutional/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institutional/' . $this->session->userdata('branch_id'));
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



        // $this->data['institutions'] = $this->organization_model->getAllInstitution();




        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];

        //echo $start.'>>>>'.$end;



        $this->data['org_summary_sma'] = $this->getorg_summary_prev('annual', $prev, $branch_id);


        // $this->sma->print_arrays( $this->data['org_summary_sma']);


        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);

        $this->data['institutions'] = $this->organization_model->getAllInstitution();
        // $this->sma->print_arrays( $this->data['institutiontype']);

        if ($branch_id) {
            $this->data['institution_number'] = $this->site->query("SELECT 
    institution_type_child,  SUM(prev_institution) prev_institution,SUM(prev_organization) prev_organization,
    SUM(increase_institution) AS total_increase_institution, 
    SUM(decrease_institution) AS total_decrease_institution, 
    SUM(thana_org) AS total_thana_org, 
    SUM(ward_org) AS total_ward_org, 
    SUM(unit_org) AS total_unit_org,
    SUM(current_org_count) AS current_org_count,
    SUM(org_absent_count) AS org_absent_count,
    SUM(org_unit_count) org_unit_count,
    SUM(prev_unit) prev_unit
FROM   ( 

 SELECT institution_type_id institution_type_child, 0 increase_institution,0 decrease_institution,0 thana_org,0 ward_org,0 unit_org,0 current_org_count,0 org_absent_count,
 
 SUM(institution) prev_institution, SUM(orgnization)  prev_organization,0 org_unit_count , unit prev_unit FROM `sma_organization_record_calculated` 
	    WHERE  calculated_year = " . $prev . "  AND branch_id = $branch_id GROUP BY institution_type_id 

UNION ALL 
 
SELECT institution_type_child, 
COUNT(`id`) increase_institution, 0 decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org ,0 current_org_count,0 org_absent_count,0 prev_institution, 0 prev_organization,0 org_unit_count, 0 prev_unit
FROM `sma_institutionlist` WHERE   branch_id = $branch_id AND  `date` BETWEEN  '" . $start . "' AND  '" . $end . "' GROUP BY institution_type_child 

UNION ALL 

SELECT institution_type_child, 0 increase_institution, COUNT(`id`) decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org, 0 current_org_count, 0 org_absent_count,0 prev_institution, 0 prev_organization,0 org_unit_count, 0 prev_unit
FROM `sma_institutionlist` WHERE branch_id = $branch_id AND `close_date` BETWEEN  '" . $start . "' AND  '" . $end . "' GROUP BY institution_type_child 

UNION ALL 

 
SELECT   institution_type_child, 0 increase_institution,0 decrease_institution, SUM( CASE WHEN org_status = 'Thana' THEN 1 ELSE 0 END) thana_org, 
SUM( CASE WHEN org_status = 'Ward' THEN 1 ELSE 0 END) ward_org, SUM( CASE WHEN org_status = 'Unit' THEN 1 ELSE 0 END) unit_org,0 current_org_count,0 org_absent_count,
0 prev_institution, 0 prev_organization, SUM(org_unit_count) org_unit_count, 0 prev_unit
 FROM `sma_institutionlist` 
WHERE branch_id = $branch_id  AND is_active = 1 GROUP BY institution_type_child 

UNION ALL 




 
 SELECT institution_type_child, 0, 0, 0 , 0, 0, 0 current_org_count, COUNT(institution_type_child) org_absent_count,0 prev_institution,
  0 prev_organization , 0 org_unit_count, 0 prev_unit FROM `sma_institutionlist_without_org` WHERE branch_id = $branch_id  GROUP BY institution_type_child

UNION ALL 

SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org ,0 current_org_count,0 org_absent_count,0 prev_institution, 0 prev_organization, 0 org_unit_count, 0 prev_unit
 FROM `sma_institution` WHERE `type` = 1 


) AS combined_data
GROUP BY institution_type_child");
        } else {
            $this->data['institution_number'] = $this->site->query("SELECT 
    institution_type_child,  SUM(prev_institution) prev_institution,SUM(prev_organization) prev_organization,
    SUM(increase_institution) AS total_increase_institution, 
    SUM(decrease_institution) AS total_decrease_institution, 
    SUM(thana_org) AS total_thana_org, 
    SUM(ward_org) AS total_ward_org, 
    SUM(unit_org) AS total_unit_org,
    SUM(current_org_count) AS current_org_count,
    SUM(org_absent_count) AS org_absent_count,
    SUM(org_unit_count) org_unit_count,
    SUM(prev_unit) prev_unit 
FROM   ( 

 SELECT institution_type_id institution_type_child, 0 increase_institution,0 decrease_institution,0 thana_org,0 ward_org,0 unit_org,0 current_org_count,0 org_absent_count,
 
 SUM(institution) prev_institution, SUM(orgnization)  prev_organization,0 org_unit_count, unit  prev_unit FROM `sma_organization_record_calculated` 
	    WHERE  calculated_year = " . $prev . "  GROUP BY institution_type_id 

UNION ALL 
 
SELECT institution_type_child, 
COUNT(`id`) increase_institution, 0 decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org ,0 current_org_count,0 org_absent_count,0 prev_institution, 0 prev_organization,0 org_unit_count,  0 prev_unit
FROM `sma_institutionlist` WHERE `date` BETWEEN  '" . $start . "' AND  '" . $end . "' GROUP BY institution_type_child 

UNION ALL 

SELECT institution_type_child, 0 increase_institution, COUNT(`id`) decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org, 0 current_org_count, 0 org_absent_count,0 prev_institution, 0 prev_organization,0 org_unit_count,  0 prev_unit
FROM `sma_institutionlist` WHERE `close_date` BETWEEN  '" . $start . "' AND  '" . $end . "' GROUP BY institution_type_child 

UNION ALL 

SELECT   institution_type_child, 0 increase_institution,0 decrease_institution, SUM( CASE WHEN org_status = 'Thana' THEN 1 ELSE 0 END) thana_org, 
SUM( CASE WHEN org_status = 'Ward' THEN 1 ELSE 0 END) ward_org, SUM( CASE WHEN org_status = 'Unit' THEN 1 ELSE 0 END) unit_org,0 current_org_count,0 org_absent_count,
0 prev_institution, 0 prev_organization, SUM(org_unit_count) org_unit_count,  0 prev_unit
 FROM `sma_institutionlist` 
WHERE is_active = 1 GROUP BY institution_type_child 

UNION ALL 



SELECT institution_type_child, 0, 0, 0 , 0, 0, COUNT(institution_type_child) current_org_count,0 org_absent_count,0 prev_institution, 0 prev_organization , 0 org_unit_count,  0 prev_unit FROM `sma_institutionlist_with_org`  GROUP BY institution_type_child
UNION ALL 

 
 SELECT institution_type_child, 0, 0, 0 , 0, 0, 0 current_org_count, COUNT(institution_type_child) org_absent_count,0 prev_institution, 0 prev_organization , 0 org_unit_count, 0 prev_unit FROM `sma_institutionlist_without_org`  GROUP BY institution_type_child

UNION ALL 

SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution, 0 thana_org, 0 ward_org, 0 unit_org ,0 current_org_count,0 org_absent_count,0 prev_institution, 0 prev_organization, 0 org_unit_count,  0 prev_unit
 FROM `sma_institution` WHERE `type` = 1 


) AS combined_data
GROUP BY institution_type_child");

        }


        $this->data['report_info'] = $report_type;
        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);

        $this->data['institutions'] = $this->organization_model->getAllInstitution();

        // $this->sma->print_arrays($this->data['institution_number']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization'));
        $meta = array('page_title' => 'Organization', 'bc' => $bc);
        // if ($branch_id) {
        //     $this->page_construct2('organization/index_entry', $meta, $this->data, 'leftmenu/organization');
        // } else

        $this->page_construct('organization/institutional', $meta, $this->data, 'leftmenu/organization');




    }


    function index($branch_id = NULL)
    {


        $this->sma->checkPermissions();
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/' . $this->session->userdata('branch_id'));
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



        // $this->data['institutions'] = $this->organization_model->getAllInstitution();




        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        //$this->sma->print_arrays($report_type);





        $this->data['org_summary_sma'] = $this->getorg_summary_prev('annual', $prev, $branch_id);


        //$this->sma->print_arrays( $this->data['org_summary_sma']);


        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);

        $this->data['institutions'] = $this->organization_model->getAllInstitution();
        // $this->sma->print_arrays( $this->data['institutiontype']);

        if ($branch_id) {

            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", " . $branch_id . ") prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
            institution_type_child,  COUNT(`id`) increase_institution, 0 decrease_institution
           FROM `sma_institutionlist`
           WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "' AND branch_id = " . $branch_id . "
           GROUP BY institution_type_child 
           
           UNION ALL 
           
           SELECT     
            institution_type_child,  0 increase_institution, COUNT(`id`) decrease_institution
           FROM `sma_institutionlist`
           WHERE `close_date` BETWEEN '" . $start . "' AND '" . $end . "' AND branch_id = " . $branch_id . " 
           GROUP BY institution_type_child 
           
           UNION ALL 
      
      SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution FROM `sma_institution` WHERE  `type` = 1 GROUP BY id 
      
           
           ) a GROUP BY institution_type_child ,prev_institution");



            $this->data['institution_info'] = $this->site->query("SELECT institution_type_child ,
SUM(a.total_student_number) total_student_number,
SUM(a.supporter) supporter,
SUM(a.other_org_worker) other_org_worker,
SUM(a.total_female_student) total_female_student,
SUM(a.female_student_supporter) female_student_supporter,
SUM(a.non_muslim_student) non_muslim_student,
SUM(a.worker) worker
 FROM (
SELECT     
           institution_type_child , 
          SUM( total_student_number ) total_student_number, 
          SUM( supporter) supporter,           
          SUM(other_org_worker) other_org_worker,           
          SUM(total_female_student) total_female_student,           
          SUM(female_student_supporter) female_student_supporter,           
          SUM(non_muslim_student) non_muslim_student,           
          0 worker
          FROM `sma_institutionlist` WHERE branch_id = " . $branch_id . " AND    is_active = 1 
          GROUP BY institution_type_child
          
          
 UNION ALL
 
 SELECT  
 institution_type_id, 
 0 total_student_number,
 0 supporter,
 0 other_org_worker,
 0 total_female_student,
 0 female_student_supporter,
 0 non_muslim_student,
 SUM(worker) worker  FROM sma_organization_record WHERE branch_id = " . $branch_id . " AND  `date` BETWEEN '" . $report_type['info']->startdate_annual . "' AND '" . $end . "'   GROUP BY institution_type_id
 ) a GROUP BY a.institution_type_child");




        } else {

            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", -1) prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
                institution_type_child,  COUNT(`id`) increase_institution, 0 decrease_institution
               FROM `sma_institutionlist`
               WHERE `date` BETWEEN '" . $start . "' AND '" . $end . "' 
               GROUP BY institution_type_child 
               
               UNION ALL 
               
               SELECT     
                institution_type_child,  0 increase_institution, COUNT(`id`) decrease_institution
               FROM `sma_institutionlist`
               WHERE `close_date` BETWEEN '" . $start . "' AND '" . $end . "' 
               GROUP BY institution_type_child 
               
               UNION ALL 
        
        SELECT `id` institution_type_child, 0 increase_institution,0 decrease_institution FROM `sma_institution` WHERE  `type` = 1 GROUP BY id 
               ) a GROUP BY institution_type_child ,prev_institution");


            $this->data['institution_info'] = $this->site->query("SELECT institution_type_child ,
SUM(a.total_student_number) total_student_number,
SUM(a.supporter) supporter,
SUM(a.other_org_worker) other_org_worker,
SUM(a.total_female_student) total_female_student,
SUM(a.female_student_supporter) female_student_supporter,
SUM(a.non_muslim_student) non_muslim_student,
SUM(a.worker) worker
 FROM (
SELECT     
           institution_type_child , 
          SUM( total_student_number ) total_student_number, 
          SUM( supporter) supporter,           
          SUM(other_org_worker) other_org_worker,           
          SUM(total_female_student) total_female_student,           
          SUM(female_student_supporter) female_student_supporter,           
          SUM(non_muslim_student) non_muslim_student,           
          0 worker
          FROM `sma_institutionlist` WHERE   is_active = 1 
          GROUP BY institution_type_child
          
          
 UNION ALL
 
 SELECT  
 institution_type_id, 
 0 total_student_number,
 0 supporter,
 0 other_org_worker,
 0 total_female_student,
 0 female_student_supporter,
 0 non_muslim_student,
 SUM(worker) worker  FROM sma_organization_record WHERE  `date` BETWEEN '" . $report_type['info']->startdate_annual . "' AND '" . $end . "'   GROUP BY institution_type_id
 ) a GROUP BY a.institution_type_child");



        }





        if ($branch_id) {

            $this->data['detailinfo'] = '';
        } else
            $this->data['detailinfo'] = '';


        $this->data['report_info'] = $report_type;



        // $this->data['org_summary'] = $this->getorg_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);





        //current member & associate

        $where = " ";

        if ($branch_id) {
            $where = " branch = $branch_id AND ";
        }

        $this->data['institution_manpower_record'] = $this->site->query("SELECT   
      SUM(CASE WHEN orgstatus_id = 2 OR orgstatus_id = 12 THEN 1 ELSE 0 END) associate ,  
      SUM(CASE WHEN orgstatus_id = 1 THEN 1 ELSE 0 END ) `member` ,  institution_type_child
      FROM `sma_manpower`  WHERE $where  `orgstatus_id` IN (1,2,12) GROUP BY `institution_type_child`");











        //  $this->sma->print_arrays($this->data['institution_info']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization'));
        $meta = array('page_title' => 'Organization', 'bc' => $bc);
        // if ($branch_id) {
        //     $this->page_construct2('organization/index_entry', $meta, $this->data, 'leftmenu/organization');
        // } else

        $this->page_construct('organization/index', $meta, $this->data, 'leftmenu/organization');


    }

    function getorg_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
    {

        $report_start = $reportinfo['start'];
        $report_end = $reportinfo['end'];
        $report_type = $reportinfo['type'];
        $report_year = $reportinfo['year'];
        $last_half = $reportinfo['last_half'];



        if ($branch_id) {

            if ($report_type == 'half_yearly' || $last_half)

                $increase_outputinfo = $this->site->query_binding('SELECT worker,institution_type_id,id from sma_organization_record  where branch_id = ? AND date BETWEEN ? AND ?', array($branch_id, $start_date, $end_date));
            else if ($report_type == 'annual') {

                $increase_outputinfo = $this->site->query_binding('SELECT SUM(worker) worker,institution_type_id,id from sma_organization_record  where branch_id = ? AND date BETWEEN ? AND ? GROUP BY institution_type_id,id', array($branch_id, $reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));
            }

            // $this->sma->print_arrays($increase_outputinfo);


        } else {


            if ($report_type == 'half_yearly' || $last_half)

                $increase_outputinfo = $this->site->query_binding('SELECT worker,institution_type_id,id from sma_organization_record   where   date BETWEEN ? AND ?', array($start_date, $end_date));
            else if ($report_type == 'annual')
                $increase_outputinfo = $this->site->query_binding('SELECT SUM(worker) worker,institution_type_id,id from sma_organization_record   where   date BETWEEN ? AND ? GROUP BY institution_type_id,id', array($reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));
        }

        return $increase_outputinfo;
    }

    function getorg_summary2($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
    {

        $report_info = $reportinfo['info'];



        if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {

            $start = $report_info->startdate_half;
            $end = $report_info->enddate_annual;
        } else if ($this->input->get('type') && ($this->input->get('type') == 'half_yearly')) {

            $start = $report_info->startdate_half;
            $end = $report_info->enddate_half;
        } else {


            $start = $reportinfo['start'];
            $end = $reportinfo['end'];
        }




        if ($branch_id) {

            if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
                $result = $this->site->query_binding(" SELECT  `institution_type_id`,
    SUM(`institution_increase`) institution_increase,
    SUM(`institution_decrease`) institution_decrease,
    SUM(`orgnization_increase`) orgnization_increase,
    SUM(`orgnization_decrease`) orgnization_decrease,
    
   
    SUM(`unit_increase`) unit_increase,
    SUM(`unit_decrease`) unit_decrease,
    SUM(`supporter_org_increase`) supporter_org_increase,
    SUM(`supporter_org_decrease`) supporter_org_decrease,
    
       sum(id) as id  FROM sma_organization_record 
    WHERE branch_id = ? AND date BETWEEN ? AND ?  GROUP BY `institution_type_id` ", array($branch_id, $start, $end));

                // last half
                $result2 = $this->site->query_binding(" SELECT  `institution_type_id`,
    SUM(`thana_org`) thana_org,
     SUM(`ward_org`) ward_org,
    SUM(`unit_org`) unit_org,
    SUM(`worker`) worker,
    SUM(`associate`) associate,
	
    SUM(`member`) member,
    SUM(`supporter`) supporter,
    SUM(`other_std_org`) other_std_org,
    SUM(`total_female_std`) total_female_std,
    SUM(`female_std_supporter`) female_std_supporter,
    SUM(`non_mus_std`) non_mus_std,
    SUM(`total_std`) total_std   FROM sma_organization_record 
    WHERE branch_id = ? AND date BETWEEN ? AND ?  GROUP BY `institution_type_id` ", array($branch_id, $reportinfo['info']->startdate_annual, $reportinfo['info']->enddate_annual));





                $merged = array_replace_recursive($result, $result2);

                $increase_outputinfo = $merged;



                // $increase_outputinfo->id = 999999999999;
            } else {

                //$increase_outputinfo = $this->site->getOneRecord('organization_record','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);

                $increase_outputinfo = $this->site->query_binding('SELECT *from sma_organization_record  where branch_id = ? AND date BETWEEN ? AND ?', array($branch_id, $start, $end));
            }
        } else {

            if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
                $result = $this->site->query_binding("SELECT  `institution_type_id`,
SUM(`institution_increase`) institution_increase,
SUM(`institution_decrease`) institution_decrease,
SUM(`orgnization_increase`) orgnization_increase,
SUM(`orgnization_decrease`) orgnization_decrease,
SUM(`thana_org`) thana_org,
SUM(`ward_org`) ward_org,
SUM(`unit_org`) unit_org,
SUM(`unit_increase`) unit_increase,
SUM(`unit_decrease`) unit_decrease,
SUM(`supporter_org_increase`) supporter_org_increase,
SUM(`supporter_org_decrease`) supporter_org_decrease,
SUM(`worker`) worker,
SUM(`associate`) associate,
SUM(`member`) member,
SUM(`supporter`) supporter,
SUM(`other_std_org`) other_std_org,
SUM(`total_female_std`) total_female_std,
SUM(`female_std_supporter`) female_std_supporter,
SUM(`non_mus_std`) non_mus_std,
SUM(`total_std`) total_std , sum(id) as id  FROM sma_organization_record 
WHERE date BETWEEN ? AND ?  GROUP BY `institution_type_id` ", array($start, $end));
                $increase_outputinfo = $result;
                //$increase_outputinfo->id = 999999999999;

            } else {
                // $increase_outputinfo = $this->site->getOneRecord('organization_record','*',array('date <= '=>$end,'date >= '=>$start),'id desc',1,0);
                $increase_outputinfo = $this->site->query_binding('SELECT *from sma_organization_record   where   date BETWEEN ? AND ?', array($start, $end));
            }
        }
        //echo '<pre>'; 
        //  print_r($increase_outputinfo);
        // echo '</pre>'; 
        // exit();

        return $increase_outputinfo;
    }



    function getorg_summary_prev($report_type, $year, $branch_id = NULL)
    {

        if ($branch_id)
            $result = $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));
        else
            $result = $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));


        return $result;
    }





    function institutionbutorg($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institutionbutorg/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institutionbutorg/' . $this->session->userdata('branch_id'));
        }

        $report_type = $this->report_type();

        //$this->sma->print_arrays( $report_type);

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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'যে সব প্রতিষ্ঠানে সংগঠন নেই'));
        $meta = array('page_title' => 'যে সব প্রতিষ্ঠানে সংগঠন নেই', 'bc' => $bc);
        $this->page_construct('organization/institutionbutorg', $meta, $this->data, 'leftmenu/organization');
    }







    function getInstitution($branch_id = NULL) //with no organization
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }



        $edit_link = anchor('admin/organization/increaseorganization/$1', '<i class="fa fa-edit"></i> ' . lang('সংগঠন বৃদ্ধি করুন'), 'data-toggle="modal" data-target="#myModal"');





        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 2);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as  id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 2);
        }








        $this->datatables->add_column("Actions", $edit_link, "id");

        echo $this->datatables->generate();
    }









    //////////////////////////////////////////////
    /////////Institution with organization/////////
    //////////////////////////////////////////////



    function institutionwithorg($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institutionwithorg/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institutionwithorg/' . $this->session->userdata('branch_id'));
        }

        $report_type = $this->report_type();

        //$this->sma->print_arrays( $report_type);

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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'যে সব প্রতিষ্ঠানে সংগঠন আছে'));
        $meta = array('page_title' => 'যে সব প্রতিষ্ঠানে সংগঠন আছে', 'bc' => $bc);
        $this->page_construct('organization/institutionwithorg', $meta, $this->data, 'leftmenu/organization');
    }








    function getInstitutionWithOrg($branch_id = NULL) //with with organization
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }



        $edit_link = anchor('admin/organization/increaseorganization/$1', '<i class="fa fa-edit"></i> ' . lang('সংগঠন বৃদ্ধি করুন'), 'data-toggle="modal" data-target="#myModal"');


        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                //->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name,  {$this->db->dbprefix('institutionlist')}.org_type as org_type,t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,    v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev, current_unit, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1,-1) increase, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, -1) decrease", FALSE)
                ->select("sma_institutionlist_with_org.id as id , sma_institutionlist_with_org.code as code,  sma_institutionlist_with_org.institution_name, 0 as org_type,t1.institution_type as plname,
             t2.institution_type as rcname,  
             {$this->db->dbprefix('branches')}.name as branch_name,   
              v3_organization_prev( sma_institutionlist_with_org.id,'" . $prev . "',-1) as previous,   org_status as current_org,  v3_upashakha_decrease_increase( sma_institutionlist_with_org.id,'" . $start . "','" . $end . "') as  increase_decrease,
             total_unit
              ", FALSE)
                ->from('institutionlist_with_org');
            $this->datatables->join('institution t1', 'sma_institutionlist_with_org.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'sma_institutionlist_with_org.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=sma_institutionlist_with_org.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {



            $this->datatables
                //->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name,  {$this->db->dbprefix('institutionlist')}.org_type as org_type,t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,    v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev, current_unit, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1,-1) increase, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, -1) decrease", FALSE)
                ->select("sma_institutionlist_with_org.id as id , sma_institutionlist_with_org.code as code,  sma_institutionlist_with_org.institution_name, 0 as org_type,t1.institution_type as plname,
                 t2.institution_type as rcname,  
                 {$this->db->dbprefix('branches')}.name as branch_name,   
                  v3_organization_prev( sma_institutionlist_with_org.id,'" . $prev . "',-1) as previous,  org_status as current_org,  v3_upashakha_decrease_increase( sma_institutionlist_with_org.id,'" . $start . "','" . $end . "') as  increase_decrease,
                 total_unit
                  ", FALSE)
                ->from('institutionlist_with_org');
            $this->datatables->join('institution t1', 'sma_institutionlist_with_org.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'sma_institutionlist_with_org.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=sma_institutionlist_with_org.branch_id', 'left');

        }





        //  $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-pencil"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');




        $decrease_link = anchor('admin/organization/decreaseorganization/$1', '<i class="fa fa-info"></i> ' . lang('ঘাটতি'), 'data-toggle="modal" data-target="#myModal"');

        //$supporter_organization = anchor('admin/organization/supporterorganization/$1', '<i class="fa fa-info"></i> ' . lang('supporter organization'),'data-toggle="modal" data-target="#myModal"');

        //  $unit = anchor('admin/organization/unit/$1', '<i class="fa fa-info"></i> ' . lang('উপশাখা'), 'data-toggle="modal" data-target="#myModal"');


        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
<ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>

 
<li>' . $decrease_link . '</li>
 
</ul>
</div></div>';


        $this->datatables->add_column("Action", $action, "id"); //$edit_link



        echo $this->datatables->generate();
    }







    function getInstitutionButOrg($branch_id = NULL) //with with organization
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }




        $this->load->library('datatables');




        if ($branch_id) {

            $this->datatables->select("sma_institutionlist_without_org.id as id , sma_institutionlist_without_org.`code` as ins_code, institution_name, institution_type, institution_type_child, branch_id, supporter_org_number , t2.code", FALSE)
                ->from('institutionlist_without_org');
            $this->datatables->join('branches t2', 't2.id=institutionlist_without_org.branch_id', 'left')
                ->where('t2.id', $branch_id);
        } else {

            $this->datatables->select("sma_institutionlist_without_org.id as id , sma_institutionlist_without_org.`code`  as ins_code, institution_name, institution_type, institution_type_child, branch_id, supporter_org_number , t2.code", FALSE)
                ->from('institutionlist_without_org');
            $this->datatables->join('branches t2', 't2.id=institutionlist_without_org.branch_id', 'left');

        }



        echo $this->datatables->generate();
    }



    function unit($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);
        $report_type = $this->report_type();

        if ($report_type['is_current'] == false) {
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'It\'s not current period.';
            $this->data['title'] = 'Unit';
            $this->load->view($this->theme . 'organization/pending', $this->data);
        } else {

            $unit = $this->site->query("SELECT *            
            FROM " . $this->db->dbprefix('institution_unit') . "  WHERE   date  BETWEEN '" . $report_type['start'] . "' AND '" . $report_type['end'] . "' AND  institution_id = $id ");


            $this->form_validation->set_rules('date', 'date', 'required');



            if ($this->form_validation->run() == true) {
                $data = array(
                    'unit_increase' => $this->input->post('unit_increase'),
                    'unit_decrease' => $this->input->post('unit_decrease'),
                    'date' => $this->sma->fsd($this->input->post('date'))
                );
            } elseif ($this->input->post('unit')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('organization/institutionwithorg');
            }

            if ($this->form_validation->run() == true) {

                if (isset($unit['0']['id']))
                    $this->site->updateData('institution_unit', $data, array('id' => $unit['0']['id']));
                else {
                    $data['user_id'] = $this->session->userdata('user_id');

                    $data['institution_id'] = $id;
                    $data['branch_id'] = $institution_details->branch_id;

                    $this->site->insertData('institution_unit', $data);
                }


                $current_number = $institution_details->current_unit + $this->input->post('unit_increase') - $this->input->post('unit_decrease') - (count($unit) > 0 ? $unit['0']['unit_increase'] : 0) + (count($unit) > 0 ? $unit['0']['unit_decrease'] : 0);
                $this->site->updateData('institutionlist', array('current_unit' => $current_number), array('id' => $id));


                $this->session->set_flashdata('message', 'Updated successfully');
                admin_redirect("organization/institutionwithorg");
            } else {


                //$this->sma->print_arrays($unit);

                $this->data['unit_increase'] = isset($unit[0]['unit_increase']) ? $unit[0]['unit_increase'] : 0;
                $this->data['unit_decrease'] = isset($unit[0]['unit_decrease']) ? $unit[0]['unit_decrease'] : 0;

                $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
                $this->data['modal_js'] = $this->site->modal_js();

                $this->data['institution'] = $institution_details;




                $this->load->view($this->theme . 'organization/unit', $this->data);
            }
        }
    }

    function supporterorganization($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);
        $report_type = $this->report_type();

        if ($report_type['is_current'] == false) {
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'It\'s not current period.';
            $this->data['title'] = 'Support Organization';
            $this->load->view($this->theme . 'organization/pending', $this->data);
        } else {

            $supporterorganization = $this->site->query("SELECT *            
            FROM " . $this->db->dbprefix('institution_supporter_organization') . "  WHERE   date  BETWEEN '" . $report_type['start'] . "' AND '" . $report_type['end'] . "' AND  institution_id = $id ");


            $this->form_validation->set_rules('date', 'date', 'required');



            if ($this->form_validation->run() == true) {
                $data = array(
                    'supporter_org_increase' => $this->input->post('supporter_org_increase'),
                    'supporter_org_decrease' => $this->input->post('supporter_org_decrease'),
                    'date' => $this->sma->fsd($this->input->post('date')),

                );
            } elseif ($this->input->post('supporter_organization')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('organization/institutionlist');
            }

            if ($this->form_validation->run() == true) {

                $current_number = $institution_details->current_supporter_organization + $this->input->post('supporter_org_increase') - $this->input->post('supporter_org_decrease') - (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_increase'] : 0) + (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_decrease'] : 0);



                if (isset($supporterorganization['0']['id']))
                    $this->site->updateData('institution_supporter_organization', $data, array('id' => $supporterorganization['0']['id']));
                else {
                    $data['user_id'] = $this->session->userdata('user_id');

                    $data['institution_id'] = $id;
                    $data['branch_id'] = $institution_details->branch_id;

                    if ($current_number == 0 && $institution_details->current_supporter_organization > 0) {
                        $data['change_type'] = 2;
                        $data['current_supporter_org'] = $current_number;
                        $data['is_organization'] = $institution_details->is_organization;
                    } elseif ($current_number > 0 && $institution_details->current_supporter_organization == 0) {
                        $data['change_type'] = 1;
                        $data['current_supporter_org'] = $current_number;
                        $data['is_organization'] = $institution_details->is_organization;
                    }


                    $this->site->insertData('institution_supporter_organization', $data);
                }


                $current_number = $institution_details->current_supporter_organization + $this->input->post('supporter_org_increase') - $this->input->post('supporter_org_decrease') - (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_increase'] : 0) + (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_decrease'] : 0);
                $this->site->updateData('institutionlist', array('current_supporter_organization' => $current_number), array('id' => $id));


                $this->session->set_flashdata('message', 'Updated successfully');
                admin_redirect("organization/institutionlist");
            } else {


                //$this->sma->print_arrays($supporterorganization);

                $this->data['supporter_org_increase'] = isset($supporterorganization[0]['supporter_org_increase']) ? $supporterorganization[0]['supporter_org_increase'] : 0;
                $this->data['supporter_org_decrease'] = isset($supporterorganization[0]['supporter_org_decrease']) ? $supporterorganization[0]['supporter_org_decrease'] : 0;

                $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
                $this->data['modal_js'] = $this->site->modal_js();

                $this->data['institution'] = $institution_details;




                $this->load->view($this->theme . 'organization/supporterorganization', $this->data);
            }
        }
    }










    function institutionwithorgexport($branch_id = NULL)  // with organization export
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }




        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,{$this->db->dbprefix('institutionlist')}.org_status as org_status,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 1);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,{$this->db->dbprefix('institutionlist')}.org_status as org_status,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 1);
        }




        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //   $this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            $this->excel->getActiveSheet()->setTitle('যে সব প্রতিষ্ঠানে সংগঠন আছে');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড ');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম ');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'সংগঠনের মান');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'শাখা কোড ');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'মন্তব্য');


            $row = 2;

            // $this->sma->print_arrays($data);

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->org_status);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, strip_tags($data_row->notes));

                $row++;
            }
            // $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            // ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);





            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'institution_with_org';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }































    function getInstitutionList_old($branch_id = NULL)  //all active list
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }


        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];



        $decrease_link = anchor('admin/organization/decreaseinstitution/$1', '<i class="fa fa-edit"></i> ' . lang('ঘাটতি'), 'data-toggle="modal" data-target="#myModal"');

        $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');
        $view_link = anchor('admin/organization/instituition_detail/$1', '<i class="fa fa-info"></i> ' . lang('view'), 'data-toggle="modal" data-target="#myModal"');

        $supporter_organization = anchor('admin/organization/supporterorganization/$1', '<i class="fa fa-info"></i> ' . lang('supporter organization'), 'data-toggle="modal" data-target="#myModal"');



        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
    <ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>
    <li>' . $view_link . '</li>

        <li>' . $decrease_link . '</li>
        <li>' . $edit_link . '</li>
        <li>' . $supporter_organization . '</li>
        

        </ul>
    </div></div>';







        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,  thana_code, v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1," . $branch_id . ") prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "', '" . $end . "',1) increase, v3_latest_organization_status({$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, thana_code,  v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1,-1) prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1) increase, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease ,`supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,is_organization", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1);
        }








        $this->datatables->add_column("Actions", $action, "id");

        echo $this->datatables->generate();
    }





    function getInstitutionList($branch_id = NULL)  //all active list
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }


        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];



        $decrease_link = anchor('admin/organization/decreaseinstitution/$1', '<i class="fa fa-edit"></i> ' . lang('ঘাটতি'), 'data-toggle="modal" data-target="#myModal"');

        $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');
        $view_link = anchor('admin/organization/instituitiondetail/$1', '<i class="fa fa-info"></i> ' . lang('detail'));

        $supporter_organization = anchor('admin/organization/supporterorganization/$1', '<i class="fa fa-info"></i> ' . lang('supporter organization'), 'data-toggle="modal" data-target="#myModal"');



        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
    <ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>
    <li>' . $view_link . '</li>

        <li>' . $decrease_link . '</li>
        <li>' . $edit_link . '</li>
        <li>' . $supporter_organization . '</li>
        

        </ul>
    </div></div>';







        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,  thana_code, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, thana_code, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,is_organization", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1);
        }








        $this->datatables->add_column("Actions", $action, "id");

        echo $this->datatables->generate();
    }








    function getEntryInfo($institutions, $branch_id = NULL)
    {

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];
        $year = $report_type['year'];
        $cal_type = $report_type['type'];
        $report_info = $report_type['info'];

        if ($report_type['is_current'] != false) {
            if ($cal_type == 'half_yearly') {
                $organization_recordinfo = $this->site->getOneRecord('organization_record', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $end, 'date > ' => $start), 'id desc', 1, 0);

                if (!$organization_recordinfo && (time() >= strtotime($start) && time() <= strtotime($end))) {

                    foreach ($institutions as $institution)
                        $this->site->insertData('organization_record', array('institution_type_id' => $institution->id, 'branch_id' => $branch_id, 'report_type' => 'half_yearly', 'report_year' => $year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }
            } else {


                $organization_recordinfo = $this->site->getOneRecord('organization_record', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $end, 'date > ' => $start), 'id desc', 1, 0);

                if (!$organization_recordinfo) {

                    foreach ($institutions as $institution)
                        $this->site->insertData('organization_record', array('institution_type_id' => $institution->id, 'branch_id' => $branch_id, 'report_type' => 'annual', 'report_year' => $year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }
            }
        }
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

    function addinstitution($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/addinstitution/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/addinstitution/' . $this->session->userdata('branch_id'));
        }


        $this->form_validation->set_rules('branch_id', lang("branch"), 'required');
        $this->form_validation->set_rules('institution_name', 'Institution name', 'required');
        $this->form_validation->set_rules('institution_parent_id', 'Type', 'required');
        $this->form_validation->set_rules('institution_type_id', 'Sub Type', 'required');



        if ($this->form_validation->run() == true) {

            $branch = $this->site->getBranchByID($branch_id);


            //  $institution_code = sprintf('%03d', $branch->code);

            $institution_code = sprintf('%03d', $branch->code) . sprintf('%05d', $branch->last_institution_code + 1);


            $data = array(
                'institution_name' => $this->input->post('institution_name'),
                'institution_type_child' => $this->input->post('institution_type_id'),
                'institution_type' => $this->input->post('institution_parent_id'),
                'user_id' => $this->session->userdata('user_id'),
                'date' => $this->sma->fsd($this->input->post('date')),
                'code' => $institution_code,
                'branch_id' => $this->input->post('branch_id'),
                'thana_code' => $this->input->post('thana_code'),
                'notes' => $this->input->post('notes'),
                'supporter' => $this->input->post('supporter'),
                'other_org_worker' => $this->input->post('other_org_worker'),
                'total_female_student' => $this->input->post('total_female_student'),
                'female_student_supporter' => $this->input->post('female_student_supporter'),
                'non_muslim_student' => $this->input->post('non_muslim_student'),
                'total_student_number' => $this->input->post('total_student_number'),
                'current_supporter_organization' => $this->input->post('supporter_org_number')
            );
        } elseif ($this->input->post('orginstitution')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/institutionlist/' . $branch_id);
        }

        if ($this->form_validation->run() == true && ($id = $this->site->insertData('institutionlist', $data, 'id'))) {


            $this->site->updateData('branches', array('last_institution_code' => $branch->last_institution_code + 1), array('id' => $branch_id));


            $data_supporter_org = array(
                'supporter_org_increase' => $this->input->post('supporter_org_number') ? $this->input->post('supporter_org_number') : 0,
                'user_id' => $this->session->userdata('user_id'),
                'date' => $this->sma->fsd($this->input->post('date')),
                'institution_id' => $id,
                'branch_id' => $this->input->post('branch_id'),
                'change_type' => 0,
            );

            if ($this->input->post('supporter_org_number') > 0) {
                $data_supporter_org['change_type'] = 1;
                $data_supporter_org['current_supporter_org'] = $this->input->post('supporter_org_number');
                $data_supporter_org['is_organization'] = 2;
            }


            $this->site->insertData('institution_supporter_organization', $data_supporter_org);

            $this->session->set_flashdata('message', 'Added successfully');
            admin_redirect("organization/institutionlist/" . $branch_id);
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['branch_id'] = $branch_id;

            $this->data['institutions'] = $this->organization_model->getAllInstitution(1);
            // $this->data['institutiontype'] = $this->organization_model->getInstitutionType();

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);



            $this->load->view($this->theme . 'organization/institutionentry', $this->data);
        }
    }




    function editinstitution($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);


        $this->form_validation->set_rules('institution_name', 'Institution name', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'institution_name' => $this->input->post('institution_name'),
                'institution_type' => $this->input->post('institution_parent_id'),
                'institution_type_child' => $this->input->post('institution_type_id'),
                'supporter' => $this->input->post('supporter'),
                'thana_code' => $this->input->post('thana_code'),
                'other_org_worker' => $this->input->post('other_org_worker'),
                'total_female_student' => $this->input->post('total_female_student'),
                'female_student_supporter' => $this->input->post('female_student_supporter'),
                'non_muslim_student' => $this->input->post('non_muslim_student'),
                'total_student_number' => $this->input->post('total_student_number'),

                'update_by' => $this->session->userdata('user_id'),

                'notes' => $this->input->post('notes')
            );


            if ($this->input->post('org_type')) {
                $data['org_type'] = $this->input->post('org_type');
            }
        } elseif ($this->input->post('edit_institution')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/institutionlist');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('institutionlist', $data, array('id' => $id))) {

            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect("organization/institutionlist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['institution'] = $institution_details;


            $this->data['institutions'] = $this->organization_model->getAllInstitution(1);
            // $this->data['institutiontype'] = $this->organization_model->getInstitutionType();

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);


            $this->load->view($this->theme . 'organization/institutioneedit', $this->data);
        }
    }




    function decreaseinstitution($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);






        // $organization_history =   $this->site->query("SELECT   
        //  ( COALESCE(SUM(unit_increase) ,0)  -  COALESCE(SUM(unit_decrease),0) ) unit_total
        // FROM `sma_institution_organization`  WHERE institution_id = $id ");


        //     $supporter_organization_history =   $this->site->query("SELECT   
        //   ( COALESCE( SUM(supporter_org_increase) , 0) -  
        //    COALESCE( SUM(supporter_org_decrease) , 0) ) supporter_org_total
        //     FROM `sma_institution_supporter_organization`  WHERE institution_id = $id ");

        // $this->sma->print_arrays($organization_history,$supporter_organization_history);

        if ($institution_details->is_organization == 1 || $institution_details->current_unit != 0) {

            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'This institution already has record(s).';
            $this->data['title'] = 'Organization decrease';
            $this->load->view($this->theme . 'organization/pending', $this->data);
        } else {


            $this->form_validation->set_rules('date', 'Decrease date', 'required');
            $this->form_validation->set_rules('notes', 'Notes', 'required');



            if ($this->form_validation->run() == true) {
                $data = array(
                    'close_date' => $this->sma->fsd($this->input->post('date')),
                    'is_active' => 2,
                    'update_by' => $this->session->userdata('user_id'),
                    'notes' => $this->input->post('notes')
                );
            } elseif ($this->input->post('edit_institution')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('organization/institutionlist');
            }

            if ($this->form_validation->run() == true && $this->site->updateData('institutionlist', $data, array('id' => $id))) {

                $this->session->set_flashdata('message', 'Updated successfully');
                admin_redirect("organization/institutionlist");
            } else {




                $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
                $this->data['modal_js'] = $this->site->modal_js();

                $this->data['institution'] = $institution_details;






                $this->load->view($this->theme . 'organization/institutionclose', $this->data);
            }
        }
    }






    /* -------------------------------------------------------- */

    function edit($id = NULL)
    {
        $this->sma->checkPermissions();
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

    /* ---------------------------------------------------------------- */


    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);


        if (!($this->Owner || $this->Admin))
            $where = array('id' => $id, 'branch_id' => $this->session->userdata('branch_id'));
        else if ($this->Owner || $this->Admin)
            $where = array('id' => $id);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->site->delete('institution_without_org', $where)) {
            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => 'Institution Deleted'));
            }
            $this->session->set_flashdata('message', 'Institution Deleted');
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






    function detailupdate()
    {
        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
        $flag = 1;
        $msg = 'done';
        if ($is_changeable) {
            $flag = 100;
            $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
        } else
            $msg = 'failed';
        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }

    function ticketupdate()
    {
        $flag = 1;
        $msg = 'done';
        if ($this->Owner || $this->Admin) {
            $flag = 100;
            $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
        } else
            $msg = 'failed';
        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }


    function institutionwithoutorgexport($branch_id = NULL)  // with no organization export
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }




        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,{$this->db->dbprefix('institutionlist')}.current_supporter_organization as current_supporter_organization,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 2);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,{$this->db->dbprefix('institutionlist')}.current_supporter_organization as current_supporter_organization,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 2);
        }




        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //   $this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            $this->excel->getActiveSheet()->setTitle('যে সব প্রতিষ্ঠানে সংগঠন নেই');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড ');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম ');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'সর্ম্থক সংগঠন ');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'শাখা কোড ');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'মন্তব্য ');


            $row = 2;

            // $this->sma->print_arrays($data);

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->current_supporter_organization == 0 ? 'নেই' : $data_row->current_supporter_organization);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, strip_tags($data_row->notes));

                $row++;
            }
            // $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            // ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);





            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'ins_without_org';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function institutionexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }


        if (!($this->Owner || $this->Admin)) {
            $branch_id = $this->session->userdata('branch_id');
        }



        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];

        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1," . $branch_id . ") prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "', '" . $end . "',1) increase, v3_latest_organization_status({$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization, org_type, v3_org_current_session( {$this->db->dbprefix('institutionlist')}.id, '" . $start . "' , '" . $end . "' ) in_current_session , notes, date,current_unit,  thana_code,
                v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev_unit,
                v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1, " . $branch_id . ") increase, 
                v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, " . $branch_id . ") decrease
         ", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1," . $branch_id . ") prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "', '" . $end . "',1) increase, v3_latest_organization_status({$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization, org_type, v3_org_current_session({$this->db->dbprefix('institutionlist')}.id, '" . $start . "' , '" . $end . "' ) in_current_session , notes, date,current_unit,  thana_code,
                v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev_unit,
                v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1, " . $branch_id . ") increase, 
                v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, " . $branch_id . ") decrease ", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1);
        }





        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('প্রতিষ্ঠান তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'থানা কোড ');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সমর্থক সংগঠন পূর্ব');
            $this->excel->getActiveSheet()->SetCellValue('H1', 'সমর্থক সংগঠন বর্তমান');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'সমর্থক সংগঠন ঘাটতি');

            $this->excel->getActiveSheet()->SetCellValue('K1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('L1', 'অন্যান্য ছাত্র সংগঠনের কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('M1', 'মোট ছাত্রী সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('N1', 'ছাত্রী সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('O1', 'অমুসলিম ছাত্রছাত্রী');
            $this->excel->getActiveSheet()->SetCellValue('P1', 'মোট ছাত্রছাত্রী সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('Q1', 'সংগঠন (আছে/নেই)');
            $this->excel->getActiveSheet()->SetCellValue('R1', 'সংগঠনের ধরণ ');
            $this->excel->getActiveSheet()->SetCellValue('S1', 'বর্তমান সেশনে সংগঠন সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('T1', 'মন্তব্য');
            $this->excel->getActiveSheet()->SetCellValue('U1', 'বর্তমান সেশনে যুক্ত কিনা ?');

            $this->excel->getActiveSheet()->SetCellValue('V1', 'উপশাখা পূর্ব সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('W1', 'উপশাখা সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('X1', 'উপশাখা বৃৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('Y1', 'উপশাখা ঘাটতি');

            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->thana_code);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->prev);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->current_supporter_organization);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->increase);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->decrease);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->supporter);
                $this->excel->getActiveSheet()->SetCellValue('L' . $row, $data_row->other_org_worker);
                $this->excel->getActiveSheet()->SetCellValue('M' . $row, $data_row->total_female_student);
                $this->excel->getActiveSheet()->SetCellValue('N' . $row, $data_row->female_student_supporter);
                $this->excel->getActiveSheet()->SetCellValue('O' . $row, $data_row->non_muslim_student);
                $this->excel->getActiveSheet()->SetCellValue('P' . $row, $data_row->total_student_number);
                $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $data_row->is_organization == 1 ? "আছে" : 'নেই');

                // $this->excel->getActiveSheet()->SetCellValue('R' . $row, $data_row->org_type);

                // $res = ( $rule1 ? true : $rule2 ? true : false )

                $this->excel->getActiveSheet()->SetCellValue('R' . $row, ($data_row->org_type == 'unit' ? 'উপশাখা' : ($data_row->org_type == 'ward' ? 'ওয়ার্ড' : ($data_row->org_type == 'thana' ? 'থানা' : ($data_row->org_type == 'branch' ? 'শাখা' : 'নেই')))));

                $this->excel->getActiveSheet()->SetCellValue('S' . $row, $data_row->in_current_session == 1 ? 'Increase' : ($data_row->in_current_session == 2 ? 'Decrease' : ''));
                //$this->excel->getActiveSheet()->SetCellValue('R' . $row, $data_row->in_current_session);
                $this->excel->getActiveSheet()->SetCellValue('T' . $row, $data_row->notes);
                $this->excel->getActiveSheet()->SetCellValue('U' . $row, strtotime($data_row->date) > strtotime($start) && strtotime($data_row->date) < strtotime($end) ? 'Current' : 'not in current');
                //$this->excel->getActiveSheet()->SetCellValue('T' . $row, $data_row->date); 

                $this->excel->getActiveSheet()->SetCellValue('V' . $row, $data_row->current_unit);
                $this->excel->getActiveSheet()->SetCellValue('W' . $row, $data_row->prev_unit);
                $this->excel->getActiveSheet()->SetCellValue('X' . $row, $data_row->increase);
                $this->excel->getActiveSheet()->SetCellValue('Y' . $row, $data_row->decrease);
                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:P' . $row)->getAlignment()->setWrapText(true);

            $filename = 'institution_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function institutionlist($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institutionlist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institutionlist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'প্রতিষ্ঠানের  তালিকা'));
        $meta = array('page_title' => 'প্রতিষ্ঠানের  তালিকা', 'bc' => $bc);
        $this->page_construct('organization/institutionlist', $meta, $this->data, 'leftmenu/organization');
    }














    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////institution_org_increase_list /////////////
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////



    function institution_org_increase($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institution_org_increase/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institution_org_increase/' . $this->session->userdata('branch_id'));
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



        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        // $this->sma->print_arrays($start, $end );



        $this->data['institution_org_increase'] = $this->site->query_binding("SELECT c.*, t1.institution_type AS category, t2.institution_type AS sub_category, t3.code FROM (
SELECT DISTINCT a.institution_type, a.institution_type_child, a.institution_id, a.branch_id, a.institution_name, a.ins_code
FROM (
  SELECT sma_institutionlist.code AS ins_code,  institution_type, institution_type_child, institution_id, sma_institutionlist.branch_id, sma_institutionlist.institution_name
  FROM `sma_institutionlist`
  LEFT JOIN sma_thana ON sma_thana.institution_id = sma_institutionlist.id
  LEFT JOIN sma_thana_log ON sma_thana_log.thana_id = sma_thana.id
  WHERE sma_thana_log.in_out = 1 
    AND sma_thana_log.`date` BETWEEN ? AND ?
) a
LEFT JOIN (
  SELECT institution_id
  FROM `sma_institutionlist`
  LEFT JOIN sma_thana ON sma_thana.institution_id = sma_institutionlist.id
  LEFT JOIN sma_thana_log ON sma_thana_log.thana_id = sma_thana.id
  WHERE sma_thana_log.in_out = 1 
    AND sma_thana_log.`date` < ?
) b ON a.institution_id = b.institution_id
WHERE b.institution_id IS NULL) c
LEFT JOIN sma_institution t1 ON t1.id = c.institution_type
LEFT JOIN sma_institution t2 ON t2.id = c.institution_type_child
LEFT JOIN sma_branches t3 ON t3.id = c.branch_id", [$start, $end, $start]);





        //$this->sma->print_arrays($this->data['institution_org_increase']);



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'সংগঠন বৃদ্ধি তালিকা'));
        $meta = array('page_title' => ' সংগঠন বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/institution_org_increase', $meta, $this->data, 'leftmenu/organization');
    }






    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////increase of institution /////////////
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////



    function institution_increase($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institution_increase/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institution_increase/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'শিক্ষাপ্রতিষ্ঠান বৃদ্ধি তালিকা'));
        $meta = array('page_title' => 'শিক্ষাপ্রতিষ্ঠান বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/institution_increase', $meta, $this->data, 'leftmenu/organization');
    }



    function getItitutionOrganizationIncreasedList($branch_id = NULL)  //all active list  , $type=null, $year = null
    {


        $this->sma->checkPermissions('index', TRUE);





        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];





        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institution_organization') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  {$this->db->dbprefix('institutionlist')}.id as institution_id, institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institution_organization');
            $this->datatables->join('institutionlist', 'institution_organization.institution_id=institutionlist.id', 'left');

            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institution_organization') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, {$this->db->dbprefix('institutionlist')}.id as institution_id, institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institution_organization');
            $this->datatables->join('institutionlist', 'institution_organization.institution_id=institutionlist.id', 'left');

            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }





        $this->datatables->where('institution_organization.org_change_type = 1');

        $this->datatables->where('institution_organization.date  BETWEEN "' . $start . '" AND "' . $end . '"');


        $view_link = anchor('admin/organization/instituition_detail/$1', '<i class="fa fa-info"></i> ' . lang('view'), 'data-toggle="modal" data-target="#myModal"');


        $this->datatables->add_column("View", $view_link, "institution_id");

        $this->datatables->unset_column("institution_id");


        echo $this->datatables->generate();
    }





    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////organization of decrease /////////////
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////


    function institution_org_decrease($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institution_org_decrease/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institution_org_decrease/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();



        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->data['report_info'] = $report_type;



        if ($branch_id) {

            $this->data['records'] = $this->site->query_binding(
                "SELECT t1.code AS ins_code,institution_name,category,sub_category,t2.code AS branch_code  FROM sma_institutionlist  t1

LEFT JOIN sma_branches t2 ON t2.id = t1.branch_id

 WHERE  thana_count = 0 
AND t1.id IN (
SELECT  DISTINCT institution_id FROM sma_thana 
LEFT JOIN sma_thana_log ON sma_thana_log.thana_id = sma_thana.id
 WHERE   t1.branch_id = ?  AND DATE(sma_thana_log.`date`) BETWEEN ? AND ? 
 AND sma_thana_log.in_out = 2 AND institution_id IS NOT NULL )",
                [$branch_id, $start, $end]
            );

        } else {


            $this->data['records'] = $this->site->query_binding(
                "SELECT t1.code AS ins_code,institution_name,category,sub_category,t2.code AS branch_code  FROM sma_institutionlist  t1

LEFT JOIN sma_branches t2 ON t2.id = t1.branch_id

 WHERE  thana_count = 0 
AND t1.id IN (
SELECT  DISTINCT institution_id FROM sma_thana 
LEFT JOIN sma_thana_log ON sma_thana_log.thana_id = sma_thana.id
 WHERE DATE(sma_thana_log.`date`) BETWEEN ? AND ? 
 AND sma_thana_log.in_out = 2 AND institution_id IS NOT NULL )",
                [$start, $end]
            );

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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'সংগঠন ঘাটতি তালিকা'));
        $meta = array('page_title' => ' সংগঠন ঘাটতি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/institution_org_decrease', $meta, $this->data, 'leftmenu/organization');
    }




    function getItitutionOrganizationDecreasedList($branch_id = NULL)  //all active list  , $type=null, $year = null
    {


        $this->sma->checkPermissions('index', TRUE);





        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];





        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institution_organization') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  {$this->db->dbprefix('institutionlist')}.id as institution_id, institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institution_organization');
            $this->datatables->join('institutionlist', 'institution_organization.institution_id=institutionlist.id', 'left');

            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institution_organization') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, {$this->db->dbprefix('institutionlist')}.id as institution_id, institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institution_organization');
            $this->datatables->join('institutionlist', 'institution_organization.institution_id=institutionlist.id', 'left');

            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }





        $this->datatables->where('institution_organization.org_change_type = 2');

        $this->datatables->where('institution_organization.date  BETWEEN "' . $start . '" AND "' . $end . '"');


        $view_link = anchor('admin/organization/instituition_detail/$1', '<i class="fa fa-info"></i> ' . lang('view'), 'data-toggle="modal" data-target="#myModal"');


        $this->datatables->add_column("View", $view_link, "institution_id");

        $this->datatables->unset_column("institution_id");


        echo $this->datatables->generate();
    }





















    function getIncreasedInstitutionList($branch_id = NULL)  //all active list  , $type=null, $year = null
    {


        $this->sma->checkPermissions('index', TRUE);





        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];





        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }







        $this->datatables->where('date BETWEEN "' . $start . '" AND "' . $end . '"');


        $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-pencil"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');
        $view_link = anchor('admin/organization/instituition_detail/$1', '<i class="fa fa-info"></i> ' . lang('view'), 'data-toggle="modal" data-target="#myModal"');



        $this->datatables->add_column("Edit", $edit_link, "id");
        $this->datatables->add_column("View", $view_link, "id");



        echo $this->datatables->generate();
    }





    function institutionincreaseexport($branch_id = NULL, $type = null, $year = null)
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $report_type = $this->report_type();


        if ($year == 'year')
            $year = date("Y");


        if ($type == 'half_yearly') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_half;
        } elseif ($type == 'annual') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_annual;
        } else {
            $start = $report_type['info']->startdate_annual;
            $end = $report_type['info']->enddate_annual;
        }



        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }


        $this->db->where('date BETWEEN "' . $start . '" AND "' . $end . '"');
        $q = $this->db->get();



        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //   $this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            $this->excel->getActiveSheet()->setTitle('শিক্ষাপ্রতিষ্ঠান বৃদ্ধি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম ');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'মন্তব্য ');


            $row = 2;

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, strip_tags($data_row->notes));

                $row++;
            }
            // $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            // ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);





            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'increase_list_institution';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }
















    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////
    //////////////////decrease of institution /////////////
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////



    function institution_decrease($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/institution_decrease/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/institution_decrease/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'শিক্ষাপ্রতিষ্ঠান ঘাটতি তালিকা'));
        $meta = array('page_title' => 'শিক্ষাপ্রতিষ্ঠান ঘাটতি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/institution_decrease', $meta, $this->data, 'leftmenu/organization');
    }






    function instituition_detail($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        // $institution_details = $this->site->getByID('institutionlist','id',$id);


        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->db
            ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,  v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1, -1) prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1) increase, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease ,current_unit,is_organization", FALSE);
        $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
        $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

        $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
            ->where('institutionlist.id', $id);

        $q = $this->db->get('institutionlist');


        $this->data['modal_js'] = $this->site->modal_js();
        $this->data['institution'] = $q->row();
        $this->data['title'] = 'Institution detail';
        $this->load->view($this->theme . 'organization/view', $this->data);
    }


    function instituitiondetail($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        // $institution_details = $this->site->getByID('institutionlist','id',$id);


        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->db
            ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,  v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1, -1) prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1) increase, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease ,current_unit,is_organization", FALSE);
        $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
        $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

        $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
            ->where('institutionlist.id', $id);

        $q = $this->db->get('institutionlist');


        $this->data['modal_js'] = $this->site->modal_js();
        $this->data['institution'] = $q->row();
        $this->data['title'] = 'Institution detail';


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => $q->row()->institution_name));
        $meta = array('page_title' => $q->row()->institution_name, 'bc' => $bc);
        $this->page_construct('organization/view_detail', $meta, $this->data, 'leftmenu/organization');


        //  $this->load->view($this->theme . 'organization/view', $this->data);
    }



    function getDecreasedInstitutionList($branch_id = NULL, $type = null, $year = null)  //all active list
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];



        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code, institution_name,  t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }







        $this->datatables->where('close_date BETWEEN "' . $start . '" AND "' . $end . '"');


        $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-pencil"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');




        $view_link = anchor('admin/organization/instituition_detail/$1', '<i class="fa fa-info"></i> ' . lang('view'), 'data-toggle="modal" data-target="#myModal"');


        $this->datatables->add_column("Edit", $edit_link, "id");
        $this->datatables->add_column("Actions", $view_link, "id");


        echo $this->datatables->generate();
    }





    function institutiondecreaseexport($branch_id = NULL, $type = null, $year = null)
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $report_type = $this->report_type();


        if ($year == 'year')
            $year = date("Y");


        if ($type == 'half_yearly') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_half;
        } elseif ($type == 'annual') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_annual;
        } else {
            $start = $report_type['info']->startdate_annual;
            $end = $report_type['info']->enddate_annual;
        }



        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }


        $this->db->where('close_date BETWEEN "' . $start . '" AND "' . $end . '"');
        $q = $this->db->get();



        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }
        //   $this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            $this->excel->getActiveSheet()->setTitle('শিক্ষাপ্রতিষ্ঠান ঘাটতি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড ');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম ');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড ');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'মন্তব্য ');


            $row = 2;

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, strip_tags($data_row->notes));

                $row++;
            }
            // $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            // ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);





            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'decrease_list_institution';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }



    function organizationincreaseexport($branch_id = NULL, $type = null, $year = null)
    {


        // $this->sma->print_arrays();



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $report_type = $this->report_type();


        if ($year == 'year')
            $year = date("Y");


        if ($type == 'half_yearly') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_half;
        } elseif ($type == 'annual') {
            $start = $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_annual;
        } else {
            $start = $report_type['info']->startdate_annual;
            $end = $report_type['info']->enddate_annual;
        }



        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institution_organization') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  {$this->db->dbprefix('institutionlist')}.id as institution_id, institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name", FALSE)
                ->from('institution_organization');
            $this->db->join('institutionlist', 'institution_organization.institution_id=institutionlist.id', 'left');

            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left');
        }


        $this->db->where('institution_organization.org_change_type = 1');

        $this->db->where('institution_organization.date  BETWEEN "' . $start . '" AND "' . $end . '"');


        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }



        $this->sma->print_arrays($this->db->last_query());
        $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            $this->excel->getActiveSheet()->setTitle('শিক্ষাপ্রতিষ্ঠান ঘাটতি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড ');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম ');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড ');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'মন্তব্য ');


            $row = 2;

            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->institution_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->plname);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->rcname);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, strip_tags($data_row->notes));

                $row++;
            }
            // $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            // ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);





            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
            $filename = 'decrease_list_institution';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function decreaseorganization($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);


        $this->form_validation->set_rules('date', 'date', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'update_by' => $this->session->userdata('user_id'),
                'is_organization' => 2,
                'current_unit' => 0
                // 'notes' => $this->input->post('notes') 
            );
        } elseif ($this->input->post('edit_institution')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/institutionwithorg');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('institutionlist', $data, array('id' => $id))) {


            //     $organization_history =   $this->site->query("SELECT   
            //     ( COALESCE(SUM(unit_increase) ,0)  -  COALESCE(SUM(unit_decrease),0) ) unit_total
            //    FROM `sma_institution_organization`  WHERE institution_id = $id ");

            $organization_info = $this->site->query("SELECT   
            * FROM " . $this->db->dbprefix('institution_organization') . "  WHERE org_change_type = 1 AND institution_id = $id order by id desc");

            if ($institution_details->current_unit > 0) {
                $decreasedata = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'date' => $this->sma->fsd($this->input->post('date')),
                    'unit_decrease' => $institution_details->current_unit,
                    'unit_increase' => 0,
                    'branch_id' => $organization_info[0]['branch_id'],
                    'org_type' => $organization_info[0]['org_type'],
                    'institution_id' => $id,
                    'org_change_type' => 2,

                    'notes' => $this->input->post('notes')
                );
                $id = $this->site->insertData('institution_organization', $decreasedata, 'id');
            }



            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect("organization/institutionwithorg");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['institution'] = $institution_details;




            $this->load->view($this->theme . 'organization/decreaseorganization', $this->data);
        }
    }



    function increaseorganization($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        // $branchid =  ($this->Owner || $this->Admin) ?  $this->input->post('branch_id') : $this->session->userdata('branch_id');

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $institution_details = $this->site->getByID('institutionlist', 'id', $id);


        $this->form_validation->set_rules('org_type', 'org type', 'required');
        $this->form_validation->set_rules('unit_increase', 'unit', 'required|numeric');



        if ($this->form_validation->run() == true) {
            $data = array(
                'institution_id' => $id,
                'branch_id' => $institution_details->branch_id,
                'date' => $this->sma->fsd($this->input->post('date')),
                'user_id' => $this->session->userdata('user_id'),
                'org_change_type' => 1,
                'notes' => $this->input->post('notes'),
                'unit_increase' => $this->input->post('unit_increase'),
                'org_type' => $this->input->post('org_type'),

                'unit_decrease' => 0
            );
            // org_type , unit_increase, unit_decrease

        } elseif ($this->input->post('edit_institution')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/institutionbutorg');
        }

        if ($this->form_validation->run() == true && ($insert_id = $this->site->insertData('institution_organization', $data, 'id'))) {

            $unit_data = array(
                'institution_id' => $id,
                'date' => $this->sma->fsd($this->input->post('date')),
                'branch_id' => $institution_details->branch_id,
                'unit_increase' => $this->input->post('unit_increase'),
                'unit_decrease' => 0,
                'user_id' => $this->session->userdata('user_id'),

            );

            $this->site->insertData('institution_unit', $unit_data, 'id');


            $updatedata = array(
                'is_organization' => 1,
                'org_type' => $this->input->post('org_type'),
                'current_unit' => $this->input->post('unit_increase')
            );


            $this->site->updateData('institutionlist', $updatedata, array('id' => $id));

            $this->session->set_flashdata('message', 'Inserted successfully');
            admin_redirect("organization/institutionwithorg");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['institution'] = $institution_details;




            $this->load->view($this->theme . 'organization/increaseorganization', $this->data);
        }
    }







    function thanalist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'থানা তালিকা', 'bc' => $bc);
        $this->page_construct('organization/thanalist', $meta, $this->data, 'leftmenu/organization');
    }






    // for ward  pppppppppppppp




    function ideal_thana($branch_id = NULL)
    {

        //  $this->sma->print_arrays("fuad");

        $branch_id = $this->input->get('branch_id');
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
        }





        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->sma->print_arrays("fuad1");
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            $this->sma->print_arrays("fuad2");
            admin_redirect('organization/thanalist/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;

        // $this->sma->print_arrays("fuad");


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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'থানা তালিকা', 'bc' => $bc);
        $this->page_construct('organization/ideal_thana', $meta, $this->data, 'leftmenu/organization');
    }




    function thana_pending($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/thana_pending/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/thana_pending/' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'থানা পেন্ডিং তালিকা', 'bc' => $bc);
        $this->page_construct('organization/thana_pending', $meta, $this->data, 'leftmenu/organization');
    }








    function addthana($branch_id = null, $id = null)
    {


        //thana_code

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/addthana/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/addthana/' . $this->session->userdata('branch_id'));
        }

        if ($branch_id == NULL && ($this->Owner || $this->Admin)) {
            //admin_redirect('organization/thanalist');
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($id == NULL) {
            //admin_redirect('organization/thanalist');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $this->load->admin_model('organization_model');
        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        $branches = $this->site->getAllBranches();
        $this->form_validation->set_rules('thana_name', 'name', 'required');
        if ($id == 1) {
            $this->form_validation->set_rules('thana_code', 'thana_code', 'required');
        }
        $this->form_validation->set_rules('branch_id', 'branch', 'required');


        // $this->sma->print_arrays($this->input->post());



        if ($this->form_validation->run() == true) {



            $data = array(
                'date' => $this->sma->fsd($this->input->post('date')),
                'branch_id' => $this->input->post('branch_id'),
                'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),
                'thana_code' => $this->input->post('thana_code'),
                'org_type' => $this->input->post('org_type'),
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id'),
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),
                'is_ideal_thana' => $this->input->post('is_ideal_thana'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'note' => $this->input->post('note'),
                'is_setup' => $this->input->post('is_setup'),
                'unit_category' => $this->input->post('unit_category'),
                'user_id' => $this->session->userdata('user_id'),
                'is_current' => ($id == 1 ? 2 : 1)

            );



            //org_type == 'Residential'  prosasonik_details==1,2,3,4  is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Residential'  prosasonik_details==3 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Residential'  prosasonik_details==2,3,4  is_attached !=1 
            //district  upazila  union ward




            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {

                unset($data['is_attached'], $data['institution_parent_id'], $data['sub_category'], $data['institution_id']);

            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                //  unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }


            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }






            //org_type == 'Institutional'  prosasonik_details == 5,6,7
            //district  upazila  union ward


            //org_type == 'Institutional'  prosasonik_details == 6     is_attached !=1 
            //institution_parent_id  sub_category  institution_id







            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {
                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }
                unset($data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                unset($data['is_attached'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    unset($data['institution_parent_id'], $data['sub_category'], $data['institution_id']);
                }

                unset($data['prosasonik_details'], $data['district'], $data['upazila'], $data['union'], $data['ward']);
            }

            //  institution_parent_id sub_category  institution_id



            //$this->sma->print_arrays($data);

            if ($id == 1) {
                $data['is_pending'] = 1;
                $data['level'] = 1;
            } elseif ($id == 2) {
                $data['is_pending'] = 2;
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($id == 3) {
                $data['is_pending'] = 2;
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 3;
            }


            $thana_id = $this->site->insertData('thana', $data, 'id');


            if ($id == 2 || $id == 3) {
                $thana_log = array(
                    'branch_id' => $this->input->post('branch_id'),
                    'date' => $this->sma->fsd($this->input->post('date')),
                    'org_thana_id' => $this->input->post('thana_id'),
                    'org_ward_id' => $this->input->post('ward_id'),
                    'thana_id' => $thana_id,   //thana ward uposhakha
                    'note' => $this->input->post('note'),
                    'in_out' => 1,
                    'level' => $id,
                    'user_id' => $this->session->userdata('user_id')
                );
                $thana_id = $this->site->insertData('thana_log', $thana_log, 'id');


                if (isset($data['institution_id']) && $data['institution_id'] > 0)
                    $this->org_calculate_in_institution($data['institution_id']);

            }


            if ($this->input->post('is_ideal_thana') == 1) {  // will need while approve
                $data_log = array(
                    'branch_id' => ($this->Owner || $this->Admin) ? $this->input->post('branch_id') : $this->session->userdata('branch_id'),
                    'date' => date('Y-m-d'),
                    'user_id' => $this->session->userdata('user_id'),
                    'is_ideal_thana' => 1,
                    'is_pending' => 1,
                    'thana_id' => $thana_id
                );

                $this->site->insertData('thana_ideal_log', $data_log);
            }






            if ($id == 1) {
                $this->session->set_flashdata('message', 'থানা যুক্ত হয়েছে। কেন্দ্রীয় সভাপতির অনুমোদনের জন্য অপেক্ষা করুন।');
                admin_redirect('organization/addthana/' . $branch_id . '/1');
            } elseif ($id == 2) {
                $this->session->set_flashdata('message', 'ওয়ার্ড যুক্ত হয়েছে।');
                admin_redirect('organization/addthana/' . $branch_id . '/2');
            } elseif ($id == 3) {
                $this->session->set_flashdata('message', 'উপশাখা যুক্ত হয়েছে।');
                admin_redirect('organization/addthana/' . $branch_id . '/3');
            }
        } else {


            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $branch_id;
                $this->data['branch'] = $this->site->getBranchByID($branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }

            $this->data['districts'] = $this->site->getDistrict();

            //$this->sma->print_arrays($this->data['districts']);



            if ($id != 1) {  //org thana
                if ($this->Owner || $this->Admin)
                    $this->data['thanas'] = $this->site->getThanaByBranch($branch_id);
                else
                    $this->data['thanas'] = $this->site->getThanaByBranch($this->session->userdata('branch_id'));
            }


            $this->data['institutions'] = $this->organization_model->getAllInstitution(1);
            // $this->data['institutiontype'] = $this->organization_model->getInstitutionType();
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);


            // $this->sma->print_arrays($this->data);

            if ($id == 1) {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('থানা')));
                $meta = array('page_title' => lang('থানা '), 'bc' => $bc);


                $this->page_construct('organization/addthana', $meta, $this->data, 'leftmenu/organization');
            } elseif ($id == 2) {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('ওয়ার্ড')));
                $meta = array('page_title' => lang('ওয়ার্ড '), 'bc' => $bc);

                $this->page_construct('organization/addward', $meta, $this->data, 'leftmenu/organization');
            } elseif ($id == 3) {
                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('উপশাখা')));
                $meta = array('page_title' => lang('উপশাখা '), 'bc' => $bc);
                $this->page_construct('organization/adduposhakha', $meta, $this->data, 'leftmenu/organization');
            } else {

                $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সমর্থক সংগঠন')));
                $meta = array('page_title' => lang('সমর্থক সংগঠন '), 'bc' => $bc);
                $this->page_construct('organization/addsupporter', $meta, $this->data, 'leftmenu/organization');
            }
        }
    }



    function org_calculate_in_institution($institution_id = null, $new_id = null)
    {


        if ($institution_id) {
            //   echo 'DMMD';

            $q = $this->site->query_binding('SELECT 
COALESCE(SUM(CASE WHEN `level` = 1 THEN 1 ELSE 0 END ),0) thana_org_count,
COALESCE(SUM(CASE WHEN `level` = 2 THEN 1 ELSE 0 END ),0) ward_org_count,
COALESCE(SUM(CASE WHEN `level` = 3 THEN 1 ELSE 0 END ),0) unit_org_count
FROM sma_thana WHERE institution_id  = ? AND is_current = 1', [$institution_id]);




            $total_org_thana = $q[0]['thana_org_count'];
            $total_org_ward = $q[0]['ward_org_count'];
            $total_org_unit = $q[0]['unit_org_count'];
            $org_status = $total_org_thana > 0 ? 'Thana' : ($total_org_ward > 0 ? 'Ward' : ($total_org_unit > 0 ? 'Unit' : ''));


            $this->site->updateData(
                'institutionlist',
                array(
                    'org_status' => $org_status,
                    'org_thana_count' => $total_org_thana,
                    'org_ward_count' => $total_org_ward,
                    'org_unit_count' => $total_org_unit,
                    'thana_count' => $total_org_thana + $total_org_ward + $total_org_unit

                ),
                array('id' => $institution_id)
            );

        }


        if ($new_id != null && ($institution_id != $new_id || $institution_id == null)) {

            // echo 'OKAY';
            $this->org_calculate_in_institution($new_id);
        }

        // exit();

    }

    public function get_sub_categoryList($institution_parent_id = null)
    {
        $institution_parent_id = $this->input->get('institution_parent_id');
        if ($institution_parent_id && is_numeric($institution_parent_id)) {
            $sub_category = $this->db->where('type_id', $institution_parent_id)->get('institution')->result();
            echo json_encode($sub_category);
        } else {
            echo json_encode([]);
        }
    }

    public function getWardList($thana_id = null)
    {
        $thana_id = $this->input->get('thana_id');
        $branch_id = $this->input->get('branch_id');
        if ($thana_id && is_numeric($thana_id)) {

            if ($branch_id)
                $wards = $this->db->where('org_thana_id', $thana_id)->where('level', 2)->where('branch_id', $branch_id)->get('thana')->result();
            else
                $wards = $this->db->where('org_thana_id', $thana_id)->where('level', 2)->get('thana')->result();


            echo json_encode($wards);
        } else {
            echo json_encode([]);
        }
    }



    function increaseidealthana($id)
    {

        // $this->load->admin_model('organization_model');
        //   $this->sma->print_arrays($_POST, $_GET);

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $this->load->admin_model('organization_model');

        $branches = $this->site->getAllBranches();

        $this->form_validation->set_rules('thana_id', 'thana', 'required');

        $this->form_validation->set_rules('date', 'date', 'required');


        if ($this->form_validation->run() == true) {


            // $this->sma->print_arrays($branchinfo->last_assocode);

            //new manpower
            $data = array(
                'date' => $this->sma->fsd($this->input->post('date')),
                'branch_id' => ($this->Owner || $this->Admin) ? $this->input->post('branch_id') : $this->session->userdata('branch_id'),
                'thana_id' => $this->input->post('thana_id'),
                'is_pending' => 2,
                'is_ideal_thana' => 1,
                'user_id' => $this->session->userdata('user_id'),

            );



            $this->site->insertData('thana_ideal_log', $data);

            $this->site->updateData('thana', array('is_ideal_thana' => 1), array('id' => $this->input->post('thana_id')));

            $this->session->set_flashdata('message', 'Added');


            admin_redirect('organization/ideal_thana/' . $id);
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));




            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
                $this->data['branch_id'] = $id;
                $this->data['branch'] = $this->site->getBranchByID($id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }


            // getList($table, $item = "*", $where = null, $order = null, $limit = null, $offset = null)

            $this->data['branches'] = $this->site->getList('branches', '*', array('id' => $id));  //apatoto
            // $this->data['branches'] = $this->site->getAllBranches();
            $this->data['thanalist'] = $this->site->query("SELECT * from `sma_thana` where branch_id = $id AND is_ideal_thana != 1  AND ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ");





            //  $this->datatables->where('((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ');



            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('থানা')));
            $meta = array('page_title' => lang('থানা '), 'bc' => $bc);
            $this->page_construct('organization/increaseidealthana', $meta, $this->data, 'leftmenu/organization');
        }
    }









    function getListward($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }
        $report_type = $this->report_type();

        // $this->sma->print_arrays($report_type);
        // exit();
        $edit_link = anchor('admin/organization/editward/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');

        //
        $this->load->library('datatables');

        // ->join('sma_thana AS th1', 'th1.id = sma_thana.parent_id', 'left')

        // th1.thana_name AS parent_thana_name,


        if ($branch_id) {

            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS ward_name,sma_thana.org_type, sma_thana.prosasonik_details,  th1.thana_name AS parent_thana_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number, sma_thana.supporter_number, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 2)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
        } else {
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS ward_name, sma_thana.org_type, sma_thana.prosasonik_details,  th1.thana_name AS parent_thana_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number, sma_thana.supporter_number, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 2)->where('thana.is_current', 1);
        }
        //$this->datatables->where(" (  {$this->db->dbprefix('thana')}.is_pending = 2 AND  {$this->db->dbprefix('thana')}.in_out = 1) ");
        $this->datatables->where('thana.is_current', 1);
        // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
        $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Decrease' . "' href='" . admin_url('organization/thanadecrease/$1') . "' data-toggle='modal' data-target='#myModal'>ঘাটতি <i class=\"fa fa-minus\"></i></a>";

        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_product") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1_bk' id='a__$1' href='" . admin_url('organization/deleteward/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_ward') . "</a>";


        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Delete", $delete_link, "id");
        $this->datatables->add_column("Actions", $edit_link, "id");

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }



    function getListthana($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();

        // $this->sma->print_arrays($report_type);
        // exit();



        $edit_link = anchor('admin/organization/editthana/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');

        // SELECT sma_thana.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code, sma_thana.org_type, d1.name AS district, d3.name AS upazila, d4.name AS unions, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.ins_name AS institute, v3_member_thana_count( sma_thana.branch_id, sma_thana.thana_code) AS member_number, v3_associate_thana_count( sma_thana.branch_id, sma_thana.thana_code ) AS associate_number, worker_number, supporter_number, ward_number, unit_number, is_ideal_thana, sma_thana.note FROM `sma_thana` LEFT JOIN sma_district AS d1 ON d1.id = sma_thana.district LEFT JOIN sma_district AS d3 ON d3.id = sma_thana.upazila LEFT JOIN sma_district AS d4 ON d4.id = sma_thana.union LEFT JOIN sma_district AS d5 ON d5.id = sma_thana.ward LEFT JOIN sma_institution AS i1 ON i1.id = sma_thana.institution_parent_id LEFT JOIN sma_institution AS i2 ON i2.id = sma_thana.sub_category LEFT JOIN sma_institutionlist AS i3 ON i3.id = sma_thana.institution_id LEFT JOIN `sma_branches` AS `t1` ON `t1`.`id`=`sma_thana`.`branch_id` WHERE ((is_pending = 1 AND `in_out` = 2) OR (`is_pending` = 2 AND `in_out` = 1)) ORDER BY `branch_name` ASC LIMIT 25

        $this->load->library('datatables');


        if ($branch_id) {

            //  $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name  , sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details, th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.ins_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 1)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, 
           v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number,   ward_number, unit_number, CASE WHEN is_ideal_thana = 1 THEN "Yes" ELSE "No" END is_ideal ', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.branch_id', $branch_id)->where('thana.level', 1)->where('thana.is_current', 1);


        } else {
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name, sma_thana.thana_code,  sma_thana.org_type, sma_thana.prosasonik_details,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, v3_member_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) `member`, 
v3_associate_thana_count(`sma_thana`.branch_id, sma_thana.thana_code) associate, sma_thana.worker_number,  sma_thana.supporter_number,    ward_number,   unit_number, CASE WHEN is_ideal_thana = 1 THEN "Yes" ELSE "No" END is_ideal ', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 1)->where('thana.is_current', 1);

        }



        // if ($branch_id) {


        //     $this->datatables
        //         ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`,  sma_thana.prosasonik_details,   v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
        //     v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit ,
        //      `is_ideal_thana`", false)
        //         ->join('branches', 'branches.id=thana.branch_id', 'left')
        //         ->from('thana')->where('thana.branch_id', $branch_id)->where('`level`', 1)->where('`is_current`', 1);
        // } else {

        //     $this->datatables
        //         ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`, sma_thana.prosasonik_details,v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
        //     v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit , 
        //   `is_ideal_thana`", false)
        //         ->join('branches', 'branches.id=thana.branch_id', 'left')
        //         ->from('thana')->where('`level`', 1)->where('`is_current`', 1);
        // }

        //$this->datatables->where('((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ');

        // is_pending => 2
        //  $start = $report_type['start'];
        //  $end = $report_type['end'];

        // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
        $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Decrease' . "' href='" . admin_url('organization/thanadecrease/$1') . "' data-toggle='modal' data-target='#myModal'>ঘাটতি <i class=\"fa fa-minus\"></i></a>";
        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Actions", $edit_link, "id");

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }

    function getListthanaideal($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();

        // $this->sma->print_arrays($report_type);
        // exit();



        $edit_link = anchor('admin/organization/editidealinfo/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');

        //

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, v3_ideal_id({$this->db->dbprefix('thana')}.id) as v3_ideal_id,  t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type, v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,worker_number,supporter_number,ward_number,unit_number,is_ideal_thana,   {$this->db->dbprefix('thana')}.note", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, v3_ideal_id({$this->db->dbprefix('thana')}.id) as v3_ideal_id, t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type,v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code) as member_number, v3_associate_thana_count(  {$this->db->dbprefix('thana')}.branch_id, thana_code )  as associate_number,worker_number,supporter_number,ward_number,unit_number,is_ideal_thana,   {$this->db->dbprefix('thana')}.note", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana');
        }

        $this->datatables->where('is_ideal_thana', 1);


        $this->datatables->where(' ((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ');

        // is_pending => 2
        //  $start = $report_type['start'];
        //  $end = $report_type['end'];

        // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
        $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Decrease' . "' href='" . admin_url('organization/idealthanadecrease/$1') . "' data-toggle='modal' data-target='#myModal'>ঘাটতি <i class=\"fa fa-minus\"></i></a>";
        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Actions", $edit_link, "v3_ideal_id");
        //$this->datatables->add_column("Actions", "", "v3_ideal_id");
        $this->datatables->unset_column("v3_ideal_id");
        echo $this->datatables->generate();
    }



    function check_thana($thana_id)
    {


        $info = $this->site->getcolumn('thana', 'id', array('id' => $thana_id, 'is_pending' => 1, 'level' => 1), 'id DESC', 1, 0);


        if ($info != NULL) {
            $this->form_validation->set_message('check_thana', 'Already in pending status');
            return false;
        } else {

            return true;
        }
    }




    function thanadecrease($thana_id)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');





        $thana_info = $this->site->getByID('thana', 'id', $thana_id);


        $this->form_validation->set_rules('date', lang("date"), 'required');
        // $this->form_validation->set_rules('branch_id', 'Member', 'required|callback_check_branch[' . $this->input->post('branch_id') . ']');
        $this->form_validation->set_rules('thana_id', 'Thana', 'required|callback_check_thana[' . $thana_id . ']');
        $this->form_validation->set_rules('branch_id', 'Branch', 'required');



        if ($this->form_validation->run() == true) {

            $is_changeable = $this->site->check_confirm($thana_info->branch_id, date('Y-m-d'));


            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }


            $branch_id = $this->input->post('branch_id');
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

            $thana_data = array(
                'is_pending' => ($thana_info->level == 1 ? 1 : 2),
                'in_out' => 2, //($thana_info->level == 1 ? 2 : 1),
                'note' => $note,
                'is_current' => ($thana_info->level == 1 ? 1 : 2),
                'update_at' => date('Y-m-d H:i:s')
            );



            $thana_log = array(
                'branch_id' => $branch_id,
                'date' => $date,
                'thana_id' => $thana_id,
                'org_thana_id' => $thana_info->org_thana_id,   //thana ward union
                'org_ward_id' => $thana_info->org_ward_id,
                'note' => $note,
                'in_out' => 2,
                'level' => $thana_info->level,
                'user_id' => $this->session->userdata('user_id')
            );
        } elseif ($this->input->post('thanadecrease')) {



            $this->session->set_flashdata('error', validation_errors());
            if ($thana_info->level == 1)

                admin_redirect("organization/thanalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            else if ($thana_info->level == 1)

                admin_redirect("organization/wardlist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            else if ($thana_info->level == 1)
                admin_redirect("organization/uposhakhalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        }


        if ($this->form_validation->run() == true && $this->site->updateData('thana', $thana_data, array('id' => $thana_id)) && $this->site->insertData('thana_log', $thana_log)) {


            if (isset($thana_info->institution_id) && $thana_info->institution_id > 0)
                $this->org_calculate_in_institution($thana_info->institution_id);


            if ($thana_info->level == 1) {
                $this->session->set_flashdata('message', 'কেন্দ্রীয় সভাপতির অনুমোদনের জন্য অপেক্ষা করুন।');
                admin_redirect("organization/thanalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            } else if ($thana_info->level == 2) {
                $this->session->set_flashdata('message', 'ঘাটতি সম্পন্ন হয়েছে।');
                admin_redirect("organization/wardlist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            } else if ($thana_info->level == 3) {
                $this->session->set_flashdata('message', 'ঘাটতি সম্পন্ন হয়েছে।');
                admin_redirect("organization/uposhakhalist" . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
            }
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['thana'] = $thana_info;



            $this->load->view($this->theme . 'organization/thanadecrease', $this->data);
        }
    }


    function idealthanadecrease($thana_id)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');





        $thana_info = $this->site->getByID('thana', 'id', $thana_id);

        if (!($this->Owner || $this->Admin) && ($thana_info->branch_id != $this->session->userdata('user_id'))) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }

        $this->form_validation->set_rules('date', lang("date"), 'required');
        // $this->form_validation->set_rules('branch_id', 'Member', 'required|callback_check_branch[' . $this->input->post('branch_id') . ']');
        $this->form_validation->set_rules('thana_id', 'Thana', 'required');
        $this->form_validation->set_rules('branch_id', 'Branch', 'required');


        if ($this->form_validation->run() == true) {


            $is_changeable = $this->site->check_confirm($thana_info->branch_id, date('Y-m-d'));


            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }


            $branch_id = $this->input->post('branch_id');
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

            $thana_data = array(
                'note' => $note,
                'update_at' => date('Y-m-d H:i:s'),
                'is_ideal_thana' => 2
            );

            $ideal_log = array(
                'branch_id' => $branch_id,
                'date' => $date,
                'thana_id' => $thana_id,
                'note' => $note,
                'in_out' => 2,
                'is_pending' => 2,
                'is_ideal_thana' => 2,
                'user_id' => $this->session->userdata('user_id')
            );
        } elseif ($this->input->post('idealthanadecrease')) {


            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/ideal_thana/' . $thana_info->branch_id);
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $thana_data, array('id' => $thana_id)) && $this->site->insertData('thana_ideal_log', $ideal_log)) {

            $this->session->set_flashdata('message', 'Saved successfully.');
            admin_redirect("organization/ideal_thana/" . $thana_info->branch_id);
        } else {

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['thana'] = $thana_info;



            $this->load->view($this->theme . 'organization/idealthanadecrease', $this->data);
        }
    }


    function getListPendingthana($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();
        if ($report_type['is_current'] == 'annual')
            $from = $report_type['info']->startdate_half;
        else
            $from = $report_type['start'];

        $to = $report_type['end'];
        $prev = $report_type['last_year'];


        $accept = "<a href='#' class='tip po' title='<b>Accept Thana</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('organization/thanaaccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Thana</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('organization/thanacancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button> <ul class="dropdown-menu pull-right" role="menu"> <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li> <li>' . $cancel . '</li> </ul> </div></div>';


        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type, v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number, worker_number,supporter_number,ward_number,unit_number,is_ideal_thana,   {$this->db->dbprefix('thana')}.note, in_out", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type, v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code )  as associate_number,worker_number,supporter_number,ward_number,unit_number,is_ideal_thana,   {$this->db->dbprefix('thana')}.note, in_out", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana');
        }

        $this->datatables->where('is_pending', 1);
        //  $start = $report_type['start'];
        //  $end = $report_type['end'];

        // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        // if ($branch_id)
        //     $this->datatables->add_column("Actions", "", "id");
        // else
        $this->datatables->add_column("Actions", $action, "id");
        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }



    function thanaaccept($thana_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if (!($this->Owner || $this->Admin)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }


        $thana_info = $this->site->getByID('thana', 'id', $thana_id);






        $is_changeable = $this->site->check_confirm($thana_info->branch_id, date('Y-m-d'));



        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }






        if ($thana_info->is_pending == 1) {

            $thana_log = array(
                'branch_id' => $thana_info->branch_id,
                'date' => date('Y-m-d'),
                'user_id' => $this->session->userdata('user_id'),
                'thana_id' => $thana_id,
                'in_out' => 1,
                'note' => $thana_info->note,
                //'org_thana_id' => $thana_info->org_thana_id,  // thana ward union org
                //'org_ward_id' => $thana_info->org_ward_id,
                'level' => $thana_info->level
            );





            $this->site->updateData('thana', array('is_pending' => 2, 'is_current' => $thana_info->in_out == 2 ? 2 : 1), array('id' => $thana_id));

            if ($thana_info->in_out == 1)
                $this->site->updateData('thana_ideal_log', array('is_pending' => 2, 'date' => date('Y-m-d')), array('thana_id' => $thana_id));
            if ($thana_info->in_out == 1)
                $this->site->insertData('thana_log', $thana_log);


            if (isset($thana_info->institution_id) && $thana_info->institution_id > 0)
                $this->org_calculate_in_institution($thana_info->institution_id);

            //  is_pending => 2
            //  ideal table is_pending => 2 if ideal_status = 1
            //  thana_log insert 

        } else {
            $this->session->set_flashdata('warning', 'Already decision has been made.');
            redirect($_SERVER["HTTP_REFERER"]);
        }


        $this->session->set_flashdata('message', 'Approved successfully.');
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function thanacancel($thana_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);




        $thana_info = $this->site->getByID('thana', 'id', $thana_id);

        if (!($this->Owner || $this->Admin) && ($thana_info->branch_id != $this->session->userdata('branch_id'))) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }

        $is_changeable = $this->site->check_confirm($thana_info->thana_id, date('Y-m-d'));



        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }


        if ($thana_info->is_pending == 1) {


            $thana_log = array(
                'branch_id' => $thana_info->branch_id,
                'date' => date('Y-m-d'),
                'user_id' => $this->session->userdata('user_id'),
                'thana_id' => $thana_id,  // //thana ward union
                'in_out' => 1,
                'level' => $thana_info->level
            );

            if ($thana_info->in_out == 1)
                $this->site->updateData('thana', array('is_pending' => 3), array('id' => $thana_id));
            elseif ($thana_info->in_out == 2)
                $this->site->updateData('thana', array('is_pending' => 2, 'in_out' => 1), array('id' => $thana_id));


            if ($thana_info->in_out == 1)
                $this->site->delete('thana_ideal_log', array('thana_id' => $thana_id));
            //$this->site->updateData('thana_ideal_log', array('is_pending' => 3, 'date' => date('Y-m-d')), array('thana_id' => $thana_id, 'is_ideal_thana' => 1));

            if ($thana_info->in_out == 2)
                $this->site->delete('thana_log', array('thana_id' => $thana_id));

            //  is_pending => 3
            //  ideal table is_pending => 3 if ideal_status = 1

            if (isset($thana_info->institution_id) && $thana_info->institution_id > 0)
                $this->org_calculate_in_institution($thana_info->institution_id);


        } else {
            $this->session->set_flashdata('warning', 'Already decision has been made.');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        $this->session->set_flashdata('message', 'Cancelled successfully');
        redirect($_SERVER["HTTP_REFERER"]);
        //$this->sma->send_json(array('msg' => 'success', 'result' => 'Cancelled successfully'));
    }


    function editthana($id = NULL, $type_id = null)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $thana_details = $this->site->getByID('thana', 'id', $id);


        $this->form_validation->set_rules('thana_name', 'name', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'branch_id' => $this->input->post('branch_id'),  //all time.

                'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),  //all time.
                'thana_code' => $this->input->post('thana_code'),  //all time.
                'org_type' => $this->input->post('org_type'),   //all time.
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id') ? $this->input->post('institution_id') : null,
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'note' => $this->input->post('note'), //all time.
                'update_by' => $this->session->userdata('user_id'), //all time.
                'update_at' => date("Y-m-d H:i:s"), //all time.
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),



            );









            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {


                $data['is_attached'] = $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                //  $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }






            //org_type == 'Institutional'  prosasonik_details == 5,6,7
            //district  upazila  union ward


            //org_type == 'Institutional'  prosasonik_details == 6     is_attached !=1 
            //institution_parent_id  sub_category  institution_id







            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }

                $data['prosasonik_details'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            //  institution_parent_id sub_category  institution_id


            // if ($this->input->post('org_type') == 'Departmental') {
            //     //done
            //     $data['district'] = null;
            //     $data['upazila'] = null;
            //     $data['union'] = null;
            //     $data['ward'] = null;
            //     $data['educational_details'] = null;
            //     $data['institution_parent_id'] = null;
            //     $data['prosasonik_details'] = null;
            //     $data['institution_id'] = null;
            //     $data['sub_category'] = null;

            // } else if ($this->input->post('org_type') == 'Institutional') {
            //     //educational_details
            //     //institution_parent_id 
            //     //sub_category
            //     //institution_id 
            //     $data['educational_details'] = $this->input->post('educational_details');
            //     $data['institution_parent_id'] = $this->input->post('institution_parent_id');
            //     $data['institution_id'] = $this->input->post('institution_id');
            //     $data['sub_category'] = $this->input->post('sub_category');

            //     $data['district'] = null;//
            //     $data['upazila'] = null;//
            //     $data['union'] = null;//
            //     $data['ward'] = null;       //         
            //     $data['prosasonik_details'] = null;//


            // } else if ($this->input->post('org_type') == 'Residential') {



            //     $data['district'] = $this->input->post('district');//
            //     $data['upazila'] = $this->input->post('upazila');///
            //     $data['union'] = $this->input->post('union');//
            //     $data['ward'] = $this->input->post('ward');//
            //     $data['educational_details'] = $this->input->post('educational_details'); //
            //     $data['institution_parent_id'] = $this->input->post('institution_parent_id');//
            //     $data['prosasonik_details'] = $this->input->post('prosasonik_details'); //
            //     $data['institution_id'] = $this->input->post('institution_id');//
            //     $data['sub_category'] = $this->input->post('sub_category');//

            // }






            if ($type_id == 1) {

                $data['level'] = 1;
            } elseif ($type_id == 2) {

                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($type_id == 3) {
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);
                $data['level'] = 3;
            }













            $thana_log = array();

            if (1 || $this->Owner || $this->Admin) {  //apatoto
                $data['date'] = $this->sma->fsd($this->input->post('date'));
                $thana_log['date'] = $this->sma->fsd($this->input->post('date'));
            }



            if ($type_id == 2 || $type_id == 3) {
                $thana_log = array(
                    'branch_id' => $this->input->post('branch_id'),
                    'org_thana_id' => $this->input->post('thana_id'),
                    'org_ward_id' => $this->input->post('ward_id'),
                    'thana_id' => $id,   //thana ward uposhakha
                    'note' => $this->input->post('note'),
                    //'in_out' => 1,
                    'level' => $type_id,
                    // 'user_id' => $this->session->userdata('user_id')
                );
                //  $thana_id = $this->site->insertData('thana_log', $thana_log, 'id');
            }



            //  $this->sma->print_arrays($data,$thana_log);

        } elseif ($this->input->post('edit_thana')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/thanalist');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $data, array('id' => $id))) {




            if (1 || $this->Owner || $this->Admin) {
                $this->site->updateData('thana_log', $thana_log, array('thana_id' => $id, 'in_out' => 1));
            }



            if (isset($thana_details->institution_id) && $thana_details->institution_id > 0)
                $this->org_calculate_in_institution($thana_details->institution_id, $data['institution_id']);
            else if ($thana_details->institution_id == null || empty($thana_details->institution_id))
                $this->org_calculate_in_institution(null, $data['institution_id']);



            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect("organization/thanalist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['thana'] = $thana_details;

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);



            //$zone = $this->site->getByID('district', 'id', $thana_details->district);

            // $this->sma->print_arrays($thana_details);

            //top level list
            $this->data['districts'] = $this->site->getDistrict();

            //2nd level list
            //$this->data['second_level'] = $zone->parent_second_level != null ? $this->site->getByID('district','id',$zone->parent_second_level) : null;

            // $second_level = $thana_details->upazila != null ? $this->site->getByID('district','id',$thana_details->upazila) : null;
            $this->data['second_level'] = $thana_details->upazila != null ? $this->site->getList('district', '*', ['parent_top_level' => $thana_details->district, 'level' => 2]) : null;
            // $this->data['second_level'] = 
            //3rd level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['third_level'] = $thana_details->union != null ? $this->site->getList('district', '*', ['parent_second_level' => $thana_details->upazila, 'level' => 3]) : null;

            //4th level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['fourth_level'] = $thana_details->ward != null ? $this->site->getList('district', '*', ['parent_third_level' => $thana_details->union, 'level' => 4]) : null;

            $this->data['sub_category'] = $thana_details->institution_parent_id != null ? $this->db->where('type_id', $thana_details->institution_parent_id)->get('institution')->result() : null;


            $this->data['institutionlist'] = $thana_details->sub_category ? $this->db->where('institution_type_child', $thana_details->sub_category)->where('branch_id', $thana_details->branch_id)->get('institutionlist')->result() : null;


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $thana_details->branch_id;
                $this->data['branch'] = $this->site->getBranchByID($thana_details->branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }


            $this->load->view($this->theme . 'organization/thanaedit', $this->data);
        }
    }




    function editward($id = NULl, $type_id = null)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $thana_details = $this->site->getByID('thana', 'id', $id);





        $this->form_validation->set_rules('thana_name', 'name', 'required');



        if ($this->form_validation->run() == true) {








            $data = array(
                'branch_id' => $this->input->post('branch_id'),  //all time.

                //'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),  //all time.
                'thana_code' => $this->input->post('thana_code'),  //all time.
                'org_type' => $this->input->post('org_type'),   //all time.
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id'),
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'supporter_organization' => $this->input->post('supporter_organization'),

                'note' => $this->input->post('note'), //all time.
                'update_by' => $this->session->userdata('user_id'), //all time.
                'update_at' => date("Y-m-d H:i:s"), //all time.
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),



            );







            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                // $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }






            //org_type == 'Institutional'  prosasonik_details == 5,6,7
            //district  upazila  union ward


            //org_type == 'Institutional'  prosasonik_details == 6     is_attached !=1 
            //institution_parent_id  sub_category  institution_id







            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }

                $data['prosasonik_details'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }








            if ($type_id == 1) {

                $data['level'] = 1;
            } elseif ($type_id == 2) {

                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($type_id == 3) {
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);
                $data['level'] = 3;
            }


            if (1 || $this->Owner || $this->Admin) {
                $data['date'] = $this->sma->fsd($this->input->post('date'));
            }




            $datalog = array();

            if (1 || $this->Owner || $this->Admin) {
                $datalog['date'] = $this->sma->fsd($this->input->post('date'));
            }
            $datalog['org_thana_id'] = $this->input->post('thana_id');
            $datalog['org_ward_id'] = $this->input->post('ward_id');
        } elseif ($this->input->post('edit_ward')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/wardlist' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $data, array('id' => $id))) {

            if ($this->Owner || $this->Admin) {
                $this->site->updateData('thana_log', $datalog, array('thana_id' => $id, 'in_out' => 1));
            }



            if (isset($thana_details->institution_id) && $thana_details->institution_id > 0)
                $this->org_calculate_in_institution($thana_details->institution_id, $data['institution_id']);
            else if ($thana_details->institution_id == null || empty($thana_details->institution_id))
                $this->org_calculate_in_institution(null, $data['institution_id']);



            $this->session->set_flashdata('message', 'Updated successfully');

            admin_redirect('organization/wardlist' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['thana'] = $thana_details;

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);




            if ($this->Owner || $this->Admin)
                $this->data['thanas'] = $this->site->getThanaByBranch($thana_details->branch_id);
            else
                $this->data['thanas'] = $this->site->getThanaByBranch($this->session->userdata('branch_id'));

            $this->data['branches'] = $this->site->getAllBranches();


            // $this->sma->print_arrays( $thana_details->branch_id);
            //d$this->sma->print_arrays($this->data['thanas']);


            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $thana_details->branch_id;
                $this->data['branch'] = $this->site->getBranchByID($thana_details->branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }




            //top level list
            $this->data['districts'] = $this->site->getDistrict();

            //2nd level list
            //$this->data['second_level'] = $zone->parent_second_level != null ? $this->site->getByID('district','id',$zone->parent_second_level) : null;

            // $second_level = $thana_details->upazila != null ? $this->site->getByID('district','id',$thana_details->upazila) : null;
            $this->data['second_level'] = $thana_details->upazila != null ? $this->site->getList('district', '*', ['parent_top_level' => $thana_details->district, 'level' => 2]) : null;
            // $this->data['second_level'] = 
            //3rd level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['third_level'] = $thana_details->union != null ? $this->site->getList('district', '*', ['parent_second_level' => $thana_details->upazila, 'level' => 3]) : null;

            //4th level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['fourth_level'] = $thana_details->ward != null ? $this->site->getList('district', '*', ['parent_third_level' => $thana_details->union, 'level' => 4]) : null;

            $this->data['sub_category'] = $thana_details->institution_parent_id != null ? $this->db->where('type_id', $thana_details->institution_parent_id)->get('institution')->result() : null;


            $this->data['institutionlist'] = $thana_details->sub_category ? $this->db->where('institution_type_child', $thana_details->sub_category)->where('branch_id', $thana_details->branch_id)->get('institutionlist')->result() : null;




            $this->load->view($this->theme . 'organization/wardedit', $this->data);
        }
    }



    function edituposhakha($id = NULL, $type_id = null)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $uposhakha_details = $this->site->getByID('thana', 'id', $id);


        $this->form_validation->set_rules('thana_name', 'name', 'required');



        if ($this->form_validation->run() == true) {



            $data = array(
                'branch_id' => $this->input->post('branch_id'),  //all time.

                //'parent_id' => $this->input->post('thana_id'),  // need to delete
                'org_thana_id' => $this->input->post('thana_id'),
                'org_ward_id' => $this->input->post('ward_id'),
                'sub_category' => $this->input->post('sub_category'),
                'thana_name' => $this->input->post('thana_name'),  //all time.
                'thana_code' => $this->input->post('thana_code'),  //all time.
                'org_type' => $this->input->post('org_type'),   //all time.
                'prosasonik_details' => $this->input->post('prosasonik_details'),
                'is_attached' => $this->input->post('is_attached'),
                'institution_id' => $this->input->post('institution_id'),
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'union' => $this->input->post('union'),
                'ward' => $this->input->post('ward'),
                //'educational_details' => $this->input->post('educational_details'),
                'institution_parent_id' => $this->input->post('institution_parent_id'),
                'institution_type_id' => $this->input->post('institution_type_id'),
                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'supporter_organization' => $this->input->post('supporter_organization'),
                'is_setup' => $this->input->post('is_setup'),
                'note' => $this->input->post('note'), //all time.
                'update_by' => $this->session->userdata('user_id'), //all time.
                'update_at' => date("Y-m-d H:i:s"), //all time.
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),



            );




            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 1) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 2) {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 3) {

                // $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }

            if ($this->input->post('org_type') == 'Residential' && $this->input->post('prosasonik_details') == 4) {
                if ($this->input->post('is_attached') == 1) {

                } else {

                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }






            //org_type == 'Institutional'  prosasonik_details == 5,6,7
            //district  upazila  union ward


            //org_type == 'Institutional'  prosasonik_details == 6     is_attached !=1 
            //institution_parent_id  sub_category  institution_id







            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 5) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 6) {

                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;

                }
                $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;

            }

            if ($this->input->post('org_type') == 'Institutional' && $this->input->post('prosasonik_details') == 7) {

                $data['is_attached'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }



            //org_type == 'Departmental'    is_attached !=1 
            //institution_parent_id  sub_category  institution_id

            //org_type == 'Departmental'  
            //prosasonik_details  district  upazila  union ward


            if ($this->input->post('org_type') == 'Departmental') {
                if ($this->input->post('is_attached') == 1) {
                } else {
                    $data['institution_parent_id'] = $data['sub_category'] = $data['institution_id'] = null;
                }

                $data['prosasonik_details'] = $data['district'] = $data['upazila'] = $data['union'] = $data['ward'] = null;
            }







            if ($type_id == 1) {

                $data['level'] = 1;
            } elseif ($type_id == 2) {

                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);

                $data['level'] = 2;
            } elseif ($type_id == 3) {
                $data['thana_code'] = $this->site->getcolumn('thana', 'thana_code', array('id' => $this->input->post('thana_id'), 'level' => 1), 'id DESC', 1, 0);
                $data['level'] = 3;
            }

            if (1 || $this->Owner || $this->Admin) {
                $data['date'] = $this->sma->fsd($this->input->post('date'));
            }



            $datalog = array();

            if (1 || $this->Owner || $this->Admin) {
                $datalog['date'] = $this->sma->fsd($this->input->post('date'));

            }
            $datalog['org_thana_id'] = $this->input->post('thana_id');
            $datalog['org_ward_id'] = $this->input->post('ward_id');
        } elseif ($this->input->post('edit_ward')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/uposhakhalist' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $data, array('id' => $id))) {

            if ($this->Owner || $this->Admin) {
                $this->site->updateData('thana_log', $datalog, array('thana_id' => $id, 'in_out' => 1));
            }


            if (isset($uposhakha_details->institution_id) && $uposhakha_details->institution_id > 0)
                $this->org_calculate_in_institution($uposhakha_details->institution_id, $data['institution_id']);
            else if ($uposhakha_details->institution_id == null || empty($uposhakha_details->institution_id))
                $this->org_calculate_in_institution(null, $data['institution_id']);





            $this->session->set_flashdata('message', 'Updated successfully');

            admin_redirect('organization/uposhakhalist' . ($this->session->userdata('branch_id') ? '/' . $this->session->userdata('branch_id') : ''));
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['uposhakha'] = $uposhakha_details;

            //  echo $uposhakha_details->org_thana_id.'DMMMMM';


            if ($this->Owner || $this->Admin) {
                $this->data['thanas'] = $this->site->getThanaByBranch($uposhakha_details->branch_id);
                $this->data['wards'] = $this->site->getAllwards($uposhakha_details->org_thana_id, 2);
            } else {
                $this->data['thanas'] = $this->site->getThanaByBranch($this->session->userdata('branch_id'));
                $this->data['wards'] = $this->site->getAllwards($uposhakha_details->org_thana_id, 2);
            }


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = $uposhakha_details->branch_id;
                $this->data['branch'] = $this->site->getBranchByID($uposhakha_details->branch_id);
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }




            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);

            //top level list
            $this->data['districts'] = $this->site->getDistrict();

            //2nd level list
            //$this->data['second_level'] = $zone->parent_second_level != null ? $this->site->getByID('district','id',$zone->parent_second_level) : null;

            // $second_level = $thana_details->upazila != null ? $this->site->getByID('district','id',$thana_details->upazila) : null;
            $this->data['second_level'] = $uposhakha_details->upazila != null ? $this->site->getList('district', '*', ['parent_top_level' => $uposhakha_details->district, 'level' => 2]) : null;
            // $this->data['second_level'] = 
            //3rd level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['third_level'] = $uposhakha_details->union != null ? $this->site->getList('district', '*', ['parent_second_level' => $uposhakha_details->upazila, 'level' => 3]) : null;

            //4th level list
            //$this->data['third_level'] = $zone->parent_third_level != null ? $this->site->getByID('district','id',$zone->parent_third_level) : null;
            $this->data['fourth_level'] = $uposhakha_details->ward != null ? $this->site->getList('district', '*', ['parent_third_level' => $uposhakha_details->union, 'level' => 4]) : null;

            $this->data['sub_category'] = $uposhakha_details->institution_parent_id != null ? $this->db->where('type_id', $uposhakha_details->institution_parent_id)->get('institution')->result() : null;


            $this->data['institutionlist'] = $uposhakha_details->sub_category ? $this->db->where('institution_type_child', $uposhakha_details->sub_category)->where('branch_id', $uposhakha_details->branch_id)->get('institutionlist')->result() : null;



            $this->load->view($this->theme . 'organization/uposhakhaedit', $this->data);
        }
    }

















    function editidealinfo($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        $ideal_info = $this->site->getByID('thana_ideal_log', 'id', $id);
        $thana_details = $this->site->getByID('thana', 'id', $ideal_info->thana_id);


        $this->form_validation->set_rules('date', 'date', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'date' => $this->sma->fsd($this->input->post('date')),
                'update_by' => $this->session->userdata('user_id'),
                'update_at' => date("Y-m-d H:i:s")
            );
            //new manpower
            $datawhere = array(

                'branch_id' => $this->session->userdata('branch_id'),
                'id' => $id
            );

            if ($this->Owner || $this->Admin) {
                unset($datawhere['branch_id']);
            }
        } elseif ($this->input->post('edit_ideal_thana')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/ideal_thana' . ($this->session->userdata('branch_id') ? '?branch_id=' . $this->session->userdata('branch_id') : ''));
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana_ideal_log', $data, $datawhere)) {

            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect('organization/ideal_thana' . ($this->session->userdata('branch_id') ? '?branch_id=' . $this->session->userdata('branch_id') : ''));
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['thana'] = $thana_details;
            $this->data['ideal_info'] = $ideal_info;

            $this->load->view($this->theme . 'organization/idealthanaedit', $this->data);
        }
    }


    function increaselist_ideal_thana()
    {


        $branch_id = $this->input->get('branch_id');

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/increaselist_ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/increaselist_ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'আদর্শ থানা বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/increaselist_ideal_thana', $meta, $this->data, 'leftmenu/organization');
    }



    function getListIdealIncrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana_ideal_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_ideal_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_ideal_log');
            $this->datatables->join('thana', 'thana.id=thana_ideal_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_ideal_log.branch_id', 'left')
                ->where('branches.id', $branch_id);

            $this->datatables->where('thana_ideal_log.in_out', 1);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana_ideal_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_ideal_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_ideal_log');
            $this->datatables->join('thana', 'thana.id=thana_ideal_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_ideal_log.branch_id', 'left');
            $this->datatables->where('thana_ideal_log.in_out', 1);
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where("DATE({$this->db->dbprefix('thana_ideal_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }




    function decreaselist_ideal_thana()
    {


        $branch_id = $this->input->get('branch_id');

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/decreaselist_ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/decreaselist_ideal_thana?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'আদর্শ থানা ঘাটতি  তালিকা', 'bc' => $bc);
        $this->page_construct('organization/decreaselist_ideal_thana', $meta, $this->data, 'leftmenu/organization');
    }



    function getListIdealDecrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana_ideal_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_ideal_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_ideal_log');
            $this->datatables->join('thana', 'thana.id=thana_ideal_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_ideal_log.branch_id', 'left')
                ->where('branches.id', $branch_id);

            $this->datatables->where('thana_ideal_log.in_out', 2);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana_ideal_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_ideal_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_ideal_log');
            $this->datatables->join('thana', 'thana.id=thana_ideal_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_ideal_log.branch_id', 'left');
            $this->datatables->where('thana_ideal_log.in_out', 2);
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where("DATE({$this->db->dbprefix('thana_ideal_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }





    function increaselist_thana()
    {


        $branch_id = $this->input->get('branch_id');

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/increaselist_thana?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/increaselist_thana?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'থানা বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/increaselist_thana', $meta, $this->data, 'leftmenu/organization');
    }



    function getListThanaIncrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_log.branch_id', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->where('thana.level', 1);
            $this->datatables->where('thana_log.in_out', 1);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_log.branch_id', 'left');
            $this->datatables->where('thana.level', 1);
            $this->datatables->where('thana_log.in_out', 1);
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }






    function decreaselist_thana()
    {


        $branch_id = $this->input->get('branch_id');
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/decreaselist_thana?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/decreaselist_thana?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'থানা বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/decreaselist_thana', $meta, $this->data, 'leftmenu/organization');
    }



    function getListThanaDecrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_log.branch_id', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->where('thana.level', 1);
            $this->datatables->where('thana_log.in_out', 2);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->datatables->join('branches', 'branches.id=thana_log.branch_id', 'left');
            $this->datatables->where('thana.level', 1);
            $this->datatables->where('thana_log.in_out', 2);
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }


    //////////////////////////////////////////////////////////////////
    //////////////////////  ward start ///////////////////////////
    //////////////////////////////////////////////////////////////// 






    function wardlist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/wardlist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/wardlist/' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'ওয়ার্ড তালিকা'));
        $meta = array('page_title' => 'ওয়ার্ড তালিকা', 'bc' => $bc);
        $this->page_construct('organization/wardlist', $meta, $this->data, 'leftmenu/organization');
    }




    function ward_pending($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/ward_pending/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/ward_pending/' . $this->session->userdata('branch_id'));
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

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'ওয়ার্ড তালিকা'));
        $meta = array('page_title' => 'ওয়ার্ড পেন্ডিং তালিকা', 'bc' => $bc);

        $this->page_construct('organization/ward_pending', $meta, $this->data, 'leftmenu/organization');
    }
    function getListPendingWard($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();
        if ($report_type['is_current'] == 'annual')
            $from = $report_type['info']->startdate_half;
        else
            $from = $report_type['start'];

        $to = $report_type['end'];
        $prev = $report_type['last_year'];

        $accept = "<a href='#' class='tip po' title='<b>Accept Ward</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('organization/wardaccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Ward</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('organization/wardcancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button> <ul class="dropdown-menu pull-right" role="menu"> <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li> <li>' . $cancel . '</li> </ul> </div></div>';

        $this->load->library('datatables');


        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('ward') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('ward')}.ward_name, {$this->db->dbprefix('ward')}.org_type, v3_member_ward_count( {$this->db->dbprefix('ward')}.branch_id, {$this->db->dbprefix('ward')}.id) as member_number, v3_associate_ward_count( {$this->db->dbprefix('ward')}.branch_id, {$this->db->dbprefix('ward')}.id)  as associate_number, {$this->db->dbprefix('ward')}.worker_number, {$this->db->dbprefix('ward')}.supporter_number, {$this->db->dbprefix('ward')}.ward_number, {$this->db->dbprefix('ward')}.unit_number, {$this->db->dbprefix('ward')}.is_ideal_ward, {$this->db->dbprefix('ward')}.note, {$this->db->dbprefix('ward')}.in_out", FALSE)
                ->join('branches as t1', 't1.id=ward.branch_id', 'left')
                ->from('ward')
                ->where('ward.branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('ward') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('ward')}.ward_name, {$this->db->dbprefix('ward')}.org_type, v3_member_ward_count( {$this->db->dbprefix('ward')}.branch_id, {$this->db->dbprefix('ward')}.id) as member_number, v3_associate_ward_count( {$this->db->dbprefix('ward')}.branch_id, {$this->db->dbprefix('ward')}.id)  as associate_number, {$this->db->dbprefix('ward')}.worker_number, {$this->db->dbprefix('ward')}.supporter_number, {$this->db->dbprefix('ward')}.ward_number, {$this->db->dbprefix('ward')}.unit_number, {$this->db->dbprefix('ward')}.is_ideal_ward, {$this->db->dbprefix('ward')}.note, {$this->db->dbprefix('ward')}.in_out", FALSE)
                ->join('branches as t1', 't1.id=ward.branch_id', 'left')
                ->from('ward');
        }





        $this->datatables->where('is_pending', 1);
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    //////////////////////////////////////////////////////////////////
    //////////////////////  ward end///////////////////////////
    //////////////////////////////////////////////////////////////// 



    //////////////////////////////////////////////////////////////////
    //////////////////////  uposhakhalist start ///////////////////////////
    //////////////////////////////////////////////////////////////// 

    function uposhakhalist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/uposhakhalist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/uposhakhalist/' . $this->session->userdata('branch_id'));
        }


        $report_type = $this->report_type();
        // $this->sma->print_arrays($report_type);

        // exit();

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

        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Uposhakha List'));
        $meta = array('page_title' => 'Uposhakha List', 'bc' => $bc);
        $this->page_construct('organization/uposhakhalist', $meta, $this->data, 'leftmenu/organization');
    }

    function getUposhakhaList($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $edit_link = anchor('admin/organization/edituposhakha/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('uposhakha') . ".id , t1.name as branch_name, {$this->db->dbprefix('uposhakha')}.uposhakha_name, {$this->db->dbprefix('uposhakha')}.uposhakha_code, {$this->db->dbprefix('uposhakha')}.org_type, 0 as member_number, 0 as associate_number, {$this->db->dbprefix('uposhakha')}.worker_number, {$this->db->dbprefix('uposhakha')}.supporter_number, {$this->db->dbprefix('uposhakha')}.uposhakha_number, {$this->db->dbprefix('uposhakha')}.subunit_number, {$this->db->dbprefix('uposhakha')}.is_ideal_uposhakha, {$this->db->dbprefix('uposhakha')}.note", FALSE)
                ->join('branches as t1', 't1.id=uposhakha.branch_id', 'left')
                ->from('uposhakha')->where('uposhakha.branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('uposhakha') . ".id , t1.name as branch_name, {$this->db->dbprefix('uposhakha')}.uposhakha_name, {$this->db->dbprefix('uposhakha')}.uposhakha_code, {$this->db->dbprefix('uposhakha')}.org_type, 0 as member_number, 0 as associate_number, {$this->db->dbprefix('uposhakha')}.worker_number, {$this->db->dbprefix('uposhakha')}.supporter_number, {$this->db->dbprefix('uposhakha')}.uposhakha_number, {$this->db->dbprefix('uposhakha')}.subunit_number, {$this->db->dbprefix('uposhakha')}.is_ideal_uposhakha, {$this->db->dbprefix('uposhakha')}.note", FALSE)
                ->join('branches as t1', 't1.id=uposhakha.branch_id', 'left')
                ->from('uposhakha');
        }

        $this->datatables->where('((is_pending = 1 AND in_out = 2) OR (is_pending = 2 AND in_out = 1))');

        $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary\" title='" . 'Decrease' . "' href='" . admin_url('organization/uposhakhadecrease/$1') . "' data-toggle='modal' data-target='#myModal'>Decrease <i class=\"fa fa-minus\"></i></a>";
        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Actions", $edit_link, "id");
        echo $this->datatables->generate();
    }





    public function getUpazilas()
    {
        $district_id = $this->input->get('district_id');
        if ($district_id && is_numeric($district_id)) {
            $upazilas = $this->db->where('parent_id', $district_id)->get('district')->result();
            echo json_encode($upazilas);
        } else {
            echo json_encode([]);
        }
    }





    public function get_unions($upazila_id = null)
    {
        $upazila_id = $this->input->get('upazila_id');

        if ($upazila_id && is_numeric($upazila_id)) {
            $unions = $this->db->where('parent_id', $upazila_id)->get('district')->result();
            echo json_encode($unions);
        } else {
            echo json_encode([]);
        }
    }


    public function get_wards($union_id = null)
    {
        $union_id = $this->input->get('union_id');

        if ($union_id && is_numeric($union_id)) {
            $wards = $this->db->where('parent_id', $union_id)->get('district')->result();
            echo json_encode($wards);
        } else {
            echo json_encode([]);
        }
    }

    public function get_institutionlist($sub_category = null)
    {


        $sub_category = $this->input->get('sub_category');
        $branch_id = $this->input->get('branch_id');

        if ($sub_category && is_numeric($sub_category)) {

            $institutionlist = $this->db->where('institution_type_child', $sub_category)->where('branch_id', $branch_id)->get('institutionlist')->result();




            echo json_encode($institutionlist);
        } else {
            echo json_encode([]);
        }
    }






    //////////////////////////////////////////////////////////////////
    //////////////////////  uposhakhalist end///////////////////////////
    //////////////////////////////////////////////////////////////// 







    function getListUposhakha($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }
        $report_type = $this->report_type();

        // $this->sma->print_arrays($report_type);
        // exit();
        $edit_link = anchor('admin/organization/edituposhakha/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');
        //
        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS upothakha_name,  sma_thana.org_type, sma_thana.prosasonik_details, th1.thana_name AS parent_thana_name,th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_thana AS th2', 'th2.id = sma_thana.org_ward_id', 'left')->where('thana.level', 3)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
        } else {
            $this->datatables->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS upothakha_name,  sma_thana.org_type,  sma_thana.prosasonik_details, th1.thana_name AS parent_thana_name,th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_thana AS th2', 'th2.id = sma_thana.org_ward_id', 'left')->where('thana.level', 3)->where('thana.is_current', 1);
        }
        $this->datatables->where('thana.is_current', 1);
        // $this->datatables->where('((is_pending = 1 AND in_out = 2) OR ( is_pending = 2 AND in_out = 1)) ');

        // is_pending => 2
        //  $start = $report_type['start'];
        //  $end = $report_type['end'];

        // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
        $decrease = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Decrease' . "' href='" . admin_url('organization/thanadecrease/$1') . "' data-toggle='modal' data-target='#myModal'>ঘাটতি <i class=\"fa fa-minus\"></i></a>";
        // $this->datatables->add_column("Decrease", $decrease, "id");
        // $this->datatables->add_column("Actions", $edit_link, "id");
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_uposhakha") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1_bk' id='a__$1' href='" . admin_url('organization/deleteuposhakha/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_uposhakha') . "</a>";

        $this->datatables->add_column("Decrease", $decrease, "id");
        $this->datatables->add_column("Delete", $delete_link, "id");
        $this->datatables->add_column("Actions", $edit_link, "id");

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }


    function deleteuposhakha($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if (($this->Admin || $this->Owner) && $this->site->delete('thana', array('id' => $id))) {
            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("uposhakha_deleted")));
            }
            $this->session->set_flashdata('message', lang('uposhakha_deleted'));
            admin_redirect('organization/uposhakhalist');
        } else if ($this->site->delete('thana', array('id' => $id, 'branch_id' => $this->session->userdata('branch_id')))) {
            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("uposhakha_deleted")));
            }
            $this->session->set_flashdata('message', lang('uposhakha_deleted'));
            admin_redirect('organization/uposhakhalist/' . $this->session->userdata('branch_id'));
        }
    }


    function deleteward($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if (($this->Admin || $this->Owner) && $this->site->delete('thana', array('id' => $id))) {
            $this->site->delete('thana', array('org_ward_id' => $id));
            $this->site->delete('thana_log', array('thana_id' => $id));


            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("ward_deleted")));
            }
            $this->session->set_flashdata('message', lang('ward_deleted'));
            admin_redirect('organization/wardlist');
        } else if ($this->site->delete('thana', array('id' => $id, 'branch_id' => $this->session->userdata('branch_id')))) {

            $this->site->delete('thana', array('org_ward_id' => $id, 'branch_id' => $this->session->userdata('branch_id')));


            if ($this->input->is_ajax_request()) {
                $this->sma->send_json(array('error' => 0, 'msg' => lang("ward_deleted")));
            }
            $this->session->set_flashdata('message', lang('ward_deleted'));
            admin_redirect('organization/wardlist/' . $this->session->userdata('branch_id'));
        }
    }























    //////////////////////////////////////////////////////////////////////////////
    ///////////////ward increase decrease list////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////


    function increaselist_ward()
    {


        $branch_id = $this->input->get('branch_id');

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/increaselist_ward?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/increaselist_ward?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'ওয়ার্ড তালিকা'));
        $meta = array('page_title' => 'ওয়ার্ড বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/increaselist_ward', $meta, $this->data, 'leftmenu/organization');
    }



    function getListWardIncrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->datatables->where('thana.level', 2);
        $this->datatables->where('thana_log.in_out', 1);




        $start = $report_type['start'];
        $end = $report_type['end'];


        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");

        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }






    function decreaselist_ward()
    {


        $branch_id = $this->input->get('branch_id');
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/decreaselist_ward?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/decreaselist_ward?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'ওয়ার্ড ঘাটতি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/decreaselist_ward', $meta, $this->data, 'leftmenu/organization');
    }


    function getListWardDecrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->datatables->where('thana.level', 2);
        $this->datatables->where('thana_log.in_out', 2);



        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }







    //////////////////////////////////////////////////////////////////////////////
    ///////////////uposhakha increase decrease list////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////


    function increaselist_uposhakha()
    {


        $branch_id = $this->input->get('branch_id');

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/increaselist_uposhakha?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/increaselist_uposhakha?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'উপশাখা বৃদ্ধি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/increaselist_uposhakha', $meta, $this->data, 'leftmenu/organization');
    }

    function getListUposhakhaIncrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');


        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id), v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id),  {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->datatables->where('thana.level', 3);
        $this->datatables->where('thana_log.in_out', 1);




        $start = $report_type['start'];
        $end = $report_type['end'];


        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");

        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }





    function decreaselist_uposhakha()
    {


        $branch_id = $this->input->get('branch_id');
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('organization/decreaselist_uposhakha?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('organization/decreaselist_uposhakha?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data['branch']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'থানা তালিকা'));
        $meta = array('page_title' => 'উপশাখা ঘাটতি তালিকা', 'bc' => $bc);
        $this->page_construct('organization/decreaselist_uposhakha', $meta, $this->data, 'leftmenu/organization');
    }




    function getListUposhakhaDecrease($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type = $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),  v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id),    {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id),  v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id),   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->datatables->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->datatables->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->datatables->where('thana.level', 3);
        $this->datatables->where('thana_log.in_out', 2);



        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }



    function data_import()
    {

        $ward = $this->site->query('select  sma_thana.id  , sma_thana.org_ward_id, sma_thana.level from sma_thana left join sma_thana_log on sma_thana_log.thana_id = sma_thana.id where  sma_thana.org_ward_id is not null AND  sma_thana_log.org_ward_id is null  AND sma_thana_log.`level` = 3 AND is_new =1 limit 1000');

        foreach ($ward as $row) {


            $data = [
                //'date' => $row['date'],
                //'level' => 2,
                //'branch_id' =>  $row['branch_id'],
                //'thana_id' =>  $row['id'],
                //'org_thana_id' =>  $row['org_thana_id'],
                'org_ward_id' => $row['org_ward_id']
                // 'in_out' => 1,
                //'is_new'=>1
            ];

            //  $this->site->updateData('thana_log', $data, array('thana_id' =>$row['id'], 'level'=> 3));
            //  $this->site->insertData('thana_log', $data);
            // echo "Name=>'', zone_type => 2, Level=>4, Parent_id => " . $row['id'] . '<br/>';

        }

        // $this->sma->print_arrays($data);
    }


    function thana_type($type)
    {

        return $type == 'Residential' ? 'আবাসিক' : ($type == 'Institutional' ? 'প্রাতিষ্ঠানিক' : 'বিভাগীয়');
    }



    ///////////////////////////////////////////////////////////////
    //////////////////Export///////////////////////////////////////
    /////////////////////////////////////////////////////////////// 

    function thanaexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();
        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;

        if ($branch_id) {


            $this->db
                ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`,v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
            v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit ,
             `is_ideal_thana`", false)
                ->join('branches', 'branches.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id)->where('`level`', 1)->where('`is_current`', 1);
        } else {

            $this->db
                ->select($this->db->dbprefix('thana') . ".`id` as id,sma_branches.code,`thana_name`,`thana_code`,`org_type`,v3_member_thana_count(branch_id,thana_code) `member`, v3_associate_thana_count(branch_id,thana_code) associate,`worker_number`,`supporter_number`, 
            v3_ward_or_unit_in_thana(2,{$this->db->dbprefix('thana')}.id) ward, v3_ward_or_unit_in_thana(3,{$this->db->dbprefix('thana')}.id) unit , 
          `is_ideal_thana`", false)
                ->join('branches', 'branches.id=thana.branch_id', 'left')
                ->from('thana')->where('`level`', 1)->where('`is_current`', 1);
        }









        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);




            $this->excel->getActiveSheet()->setTitle('থানা তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানার নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'থানা কোড');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('H1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'উপশাখা');

            $this->excel->getActiveSheet()->SetCellValue('K1', 'আদর্শ থানা');
            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->code);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->thana_code);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->member);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->associate);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->ward);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->unit);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->is_ideal_thana == 1 ? 'Yes' : 'No');

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_thana_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function thanaincreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;




        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->db->join('branches', 'branches.id=thana_log.branch_id', 'left')
                ->where('branches.id', $branch_id);
            $this->db->where('thana.level', 1);
            $this->db->where('thana_log.in_out', 1);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->db->join('branches', 'branches.id=thana_log.branch_id', 'left');
            $this->db->where('thana.level', 1);
            $this->db->where('thana_log.in_out', 1);
        }


        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");







        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //  $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);



            $this->excel->getActiveSheet()->setTitle('থানা বৃদ্ধি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'থানা নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা কোড');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('K1', 'উপশাখা');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->thana_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->thana_code);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->member_number);

                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->ward_number);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->unit_number);

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_thana_increase_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function thanadecreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;




        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,  v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->db->join('branches', 'branches.id=thana_log.branch_id', 'left')
                ->where('branches.id', $branch_id);
            $this->db->where('thana.level', 1);
            $this->db->where('thana_log.in_out', 2);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana_log') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as thana_name, thana_code,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana_log')}.date,   v3_member_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code ) as member_number, v3_associate_thana_count( {$this->db->dbprefix('thana')}.branch_id, thana_code)  as associate_number,   worker_number, supporter_number,ward_number,unit_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');

            $this->db->join('branches', 'branches.id=thana_log.branch_id', 'left');
            $this->db->where('thana.level', 1);
            $this->db->where('thana_log.in_out', 2);
        }



        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");







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



            $this->excel->getActiveSheet()->setTitle('থানা ঘাটতি  তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'থানা নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা কোড');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('K1', 'উপশাখা');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->thana_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->thana_code);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->member_number);

                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->ward_number);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->unit_number);

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_thana_decrease_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function wardexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();
        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS ward_name,sma_thana.org_type, th1.thana_name AS parent_thana_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number, sma_thana.supporter_number, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 2)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
        } else {
            $this->db->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS ward_name, sma_thana.org_type, th1.thana_name AS parent_thana_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number, sma_thana.supporter_number, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->where('thana.level', 2)->where('thana.is_current', 1);
        }
        //$this->datatables->where(" (  {$this->db->dbprefix('thana')}.is_pending = 2 AND  {$this->db->dbprefix('thana')}.in_out = 1) ");
        $this->db->where('thana.is_current', 1);




        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);





            $this->excel->getActiveSheet()->setTitle('ওয়ার্ড তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'ওয়ার্ডের নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'সংগঠনের ধরন');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'সাংগঠনিক থানা');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'জেলা');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'উপজেলা');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'ইউনিয়ন');
            $this->excel->getActiveSheet()->SetCellValue('H1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'বিভাগ');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'উপ বিভাগ');

            $this->excel->getActiveSheet()->SetCellValue('K1', 'প্রতিষ্ঠান');
            $this->excel->getActiveSheet()->SetCellValue('L1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('M1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('N1', 'মন্তব্য');
            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->ward_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->parent_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->district);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->upazila);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->union);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->ward);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->category);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->sub_category);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->institute);
                $this->excel->getActiveSheet()->SetCellValue('L' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('M' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('N' . $row, $data_row->note);

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:N' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_ward_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function wardincreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->db->where('thana.level', 2);
        $this->db->where('thana_log.in_out', 1);

        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");



        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //  $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);



            //	 	 	 	 	 	 
            $this->excel->getActiveSheet()->setTitle('ওয়ার্ড বৃদ্ধি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'ওয়ার্ড নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->ward_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->org_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->member_number);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->supporter_number);
                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_ward_increase_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }



    function warddecreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as ward_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->db->where('thana.level', 2);
        $this->db->where('thana_log.in_out', 2);

        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");



        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //  $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);



            //	 	 	 	 	 	 
            $this->excel->getActiveSheet()->setTitle('ওয়ার্ড ঘাটতি  তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'ওয়ার্ড নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->ward_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->org_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->member_number);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->supporter_number);
                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:K' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_ward_decrease_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function uposhakhaexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();
        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS upothakha_name,  sma_thana.org_type, th1.thana_name AS parent_thana_name,th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_thana AS th2', 'th2.id = sma_thana.org_ward_id', 'left')->where('thana.level', 3)->where('thana.is_current', 1)->where('thana.branch_id', $branch_id);
        } else {
            $this->db->select($this->db->dbprefix('thana') . '.id AS id, t1.name AS branch_name, sma_thana.thana_name AS upothakha_name,  sma_thana.org_type, th1.thana_name AS parent_thana_name,th2.thana_name AS parent_ward_name,  d1.name AS district, d3.name AS upazila, d4.name AS `union`, d5.name AS ward, i1.institution_type AS category, i2.institution_type AS sub_category, i3.institution_name AS institute, sma_thana.worker_number,  sma_thana.supporter_number, sma_thana.is_setup, sma_thana.unit_category, sma_thana.note', FALSE)->from('thana')->join('sma_branches AS t1', 't1.id = sma_thana.branch_id', 'left')->join('sma_district AS d1', 'd1.id = sma_thana.district', 'left')->join('sma_district AS d3', 'd3.id = sma_thana.upazila', 'left')->join('sma_district AS d4', 'd4.id = sma_thana.union', 'left')->join('sma_district AS d5', 'd5.id = sma_thana.ward', 'left')->join('sma_institution AS i1', 'i1.id = sma_thana.institution_parent_id', 'left')->join('sma_institution AS i2', 'i2.id = sma_thana.sub_category', 'left')->join('sma_institutionlist AS i3', 'i3.id = sma_thana.institution_id', 'left')->join('sma_thana AS th1', 'th1.id = sma_thana.org_thana_id', 'left')->join('sma_thana AS th2', 'th2.id = sma_thana.org_ward_id', 'left')->where('thana.level', 3)->where('thana.is_current', 1);
        }
        $this->db->where('thana.is_current', 1);




        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);





            $this->excel->getActiveSheet()->setTitle('উপশাখা তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'উপশাখার নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'সংগঠনের ধরন');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'সাংগঠনিক থানা');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'সাংগঠনিক ওয়ার্ড');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'জেলা');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'উপজেলা');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'ইউনিয়ন');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'বিভাগ');
            $this->excel->getActiveSheet()->SetCellValue('K1', 'উপ বিভাগ');

            $this->excel->getActiveSheet()->SetCellValue('L1', 'প্রতিষ্ঠান');
            $this->excel->getActiveSheet()->SetCellValue('M1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('N1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('O1', 'সেট-আপ');
            $this->excel->getActiveSheet()->SetCellValue('P1', 'মান');

            $this->excel->getActiveSheet()->SetCellValue('Q1', 'মন্তব্য');
            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->branch_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->upothakha_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->parent_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->parent_ward_name);
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->district);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->upazila);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->union);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->ward);

                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->category);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->sub_category);
                $this->excel->getActiveSheet()->SetCellValue('L' . $row, $data_row->institute);
                $this->excel->getActiveSheet()->SetCellValue('M' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('N' . $row, $data_row->supporter_number);
                $this->excel->getActiveSheet()->SetCellValue('O' . $row, $data_row->is_setup == 1 ? 'Yes' : 'No');
                $this->excel->getActiveSheet()->SetCellValue('P' . $row, $data_row->unit_category);
                $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $data_row->note);

                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:N' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_uposhakha_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function uposhakhaincreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id) org_ward_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id) org_ward_name,  {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->db->where('thana.level', 3);
        $this->db->where('thana_log.in_out', 1);

        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");



        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //  $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            //	 	 	 	 	 	 
            $this->excel->getActiveSheet()->setTitle('উপশাখা বৃদ্ধি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'উপশাখার নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('I1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'সমর্থক');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->uposhakha_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->org_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->org_ward_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->branch_name);

                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->member_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->supporter_number);
                $row++;
            }



            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:J' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_uposhakha_increase_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }



    function uposhakhadecreaseexport($branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);



        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();

        $type = $this->input->get('type');

        $start = $report_type['start'];
        $end = $report_type['end'];




        $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;


        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name,v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id) org_ward_name,   {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left')
                ->where('branches.id', $branch_id);
        } else {
            $this->db
                ->select($this->db->dbprefix('thana') . ".id as id,  {$this->db->dbprefix('thana')}.thana_name as uposhakha_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_thana_id) org_thana_name, v3_org_thana_name({$this->db->dbprefix('thana')}.org_ward_id) org_ward_name,  {$this->db->dbprefix('branches')}.name as branch_name, org_type, {$this->db->dbprefix('thana')}.date,  member_number as member_number, associate_number  as associate_number,   worker_number, supporter_number", FALSE)
                ->from('thana_log');
            $this->db->join('thana', 'thana.id=thana_log.thana_id', 'left');
            $this->db->join('branches', 'branches.id=thana.branch_id', 'left');
        }
        $this->db->where('thana.level', 3);
        $this->db->where('thana_log.in_out', 2);

        $this->db->where("DATE({$this->db->dbprefix('thana_log')}.date) BETWEEN '" . $start . "' and '" . $end . "'");



        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //  $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);


            //	 	 	 	 	 	 
            $this->excel->getActiveSheet()->setTitle('উপশাখা ঘাটতি তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'উপশাখার নাম');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'থানা');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ওয়ার্ড');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'শাখা');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'ধরন');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'তারিখ');

            $this->excel->getActiveSheet()->SetCellValue('G1', 'সদস্য');

            $this->excel->getActiveSheet()->SetCellValue('H1', 'সাথী');

            $this->excel->getActiveSheet()->SetCellValue('I1', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('J1', 'সমর্থক');


            //  `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`
            // ,`non_muslim_student`,`total_student_number`,   is_organization
            // prev, current_supporter_organization
            // branch_name increase decrease
            $row = 2;
            foreach ($data as $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->uposhakha_name);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->org_thana_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->org_ward_name);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->branch_name);

                $this->excel->getActiveSheet()->SetCellValue('E' . $row, $this->thana_type($data_row->org_type));
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->date);
                $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->member_number);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->associate_number);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->worker_number);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->supporter_number);
                $row++;
            }



            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);


            $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
            $this->excel->getActiveSheet()->getStyle('C2:J' . $row)->getAlignment()->setWrapText(true);

            $filename = 'org_uposhakha_decrease_list_branch_' . ($branch_id ? $branch->name : 'all') . '_' . date("Y_m");

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function worker_entry($branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);

        //$branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;



        $report_type = $this->report_type();

        //  $this->sma->print_arrays( $report_type);
        $year = $report_type['year'];
        $type = $report_type['type'];

        if ($this->Admin || $this->Owner) {

            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;

        } else {

            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;


        }

        $this->data['institutions'] = $this->organization_model->getAllInstitution();
        $this->data['records'] = $this->site->query("SELECT id,worker,institution_type_id from sma_organization_record where branch_id = " . $branch_id . " and report_type = '" . $type . "' AND report_year = " . $year . " ");


        if (count($this->data['records']) == 0) {

            $batch_arr = [];
            foreach ($this->data['institutions'] as $institution) {
                $insData = array(
                    'institution_type_id' => $institution->id,
                    'user_id' => $this->session->userdata('user_id'),
                    'report_year' => date('Y'),
                    'branch_id' => $branch_id,
                    'report_type' => $report_type['type'],
                    'worker' => '0',
                    'date' => date('Y-m-d')
                );

                $batch_arr[] = $insData;

            }

            if (count($batch_arr) > 0) {

                $this->db->insert_batch('organization_record', $batch_arr);
            }

            echo count($batch_arr);
            $this->data['records'] = $this->site->query("SELECT id,worker,institution_type_id from sma_organization_record where branch_id = " . $branch_id . " and report_type = '" . $type . "' AND report_year = " . $year . " ");

        }



        $this->data['branch'] = $branch;
        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);



        $this->data['modal_js'] = $this->site->modal_js();

        // $this->sma->print_arrays( $this->data['institutions']);
        $this->load->view($this->theme . 'organization/worker_entry', $this->data);
    }

}
