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

    function indexOLD($branch_id = NULL)
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

        $this->data['institutions'] = $this->organization_model->getAllInstitution();

        $where = " ";

        if ($branch_id) {
            $where = " branch = $branch_id AND ";
            $this->data['detailinfo'] = $this->getEntryInfo($this->data['institutions'], $branch_id);
        } else
            $this->data['detailinfo'] = '';

        $last_year =  date("Y", strtotime("-1 year"));
        $report_type = $this->report_type();

        $this->sma->print_arrays($report_type);

        $this->data['org_summary'] = $this->getorg_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);


        $this->data['org_summary_sma'] = $this->getorg_summary_prev('annual', $report_type['last_year'], $branch_id);

        $this->data['nor_org'] = $this->get_no_org($branch_id);

        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);



        $this->data['institution_manpower_record'] = $this->site->query("SELECT   
        SUM(CASE WHEN orgstatus_id = 2 OR orgstatus_id = 12 THEN 1 ELSE 0 END) associate ,  
        SUM(CASE WHEN orgstatus_id = 1 THEN 1 ELSE 0 END ) member ,  institution_type_child
        FROM `sma_manpower`  WHERE $where  `orgstatus_id` IN (1,2,12) GROUP BY `institution_type_child`");





        //$this->sma->print_arrays($this->data['institution_manpower_record']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization'));
        $meta = array('page_title' => 'Organization', 'bc' => $bc);
        if ($branch_id) {
            $this->page_construct2('organization/index_entry', $meta, $this->data, 'leftmenu/organization');
        } else
            $this->page_construct2('organization/index', $meta, $this->data, 'leftmenu/organization');
    }


    function get_no_org($branch_id = NULL)
    {

        if ($branch_id)
            $result =  $this->site->query_binding("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org WHERE   branch_id = ?  GROUP BY institution_type_id ", array($branch_id));

        else
            $result =  $this->site->query("SELECT COUNT(id) as total, institution_type_id from sma_institution_without_org GROUP BY institution_type_id");


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

        foreach($branches as $branch) {
        $record = $this->site->query("SELECT id,v3_organization_institution_current(id, '2021-12-23' , '2022-12-17',".$branch->id.",2021) current_number from `sma_institution`");
        
       

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

        foreach($branches as $branch) {
        $record = $this->site->query("SELECT id,v3_organization_minimum_one_unit_current(id, '2021-12-23' , '2022-12-17',".$branch->id.",2021) current_number from `sma_institution`");
        
       

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

        foreach($branches as $branch) {
        
        $record = $this->site->query("SELECT    institution_type_child ,   SUM(current_unit) current_unit 
        FROM `sma_institutionlist` WHERE   branch_id = ".$branch->id." AND is_active = 1 
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



        $this->data['institutions'] = $this->organization_model->getAllInstitution();

        $where = " ";


        if ($branch_id) {
            $where = " branch = $branch_id AND ";
        }


        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];

        $prev = $report_type['last_year'];


        $this->data['org_summary_sma'] = $this->getorg_summary_prev('annual', $prev, $branch_id);


        //$this->sma->print_arrays( $this->data['org_summary_sma']);


        if ($branch_id) {


            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", " . $branch_id . ") v3_prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
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

     
     ) a GROUP BY institution_type_child ,v3_prev_institution");




            $this->data['institution_info'] = $this->site->query("SELECT     
     institution_type_child ,  SUM( v3_organization_prev( sma_institutionlist.id, '" . $prev . "', 2," . $branch_id . ")) unit_prev, SUM(current_unit) current_unit, 
    SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 1, " . $branch_id . ")) unit_increase, 
    SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 2, " . $branch_id . ")) unit_decrease ,
    SUM( total_student_number ) total_student_number, SUM( supporter) supporter, 
    SUM(other_org_worker) other_org_worker, 
    SUM(total_female_student) total_female_student, 
    SUM(female_student_supporter) female_student_supporter, 
    SUM(non_muslim_student) non_muslim_student, 
    SUM(total_student_number) total_student_number, 
     SUM( CASE WHEN org_type = 'unit' THEN 1 ELSE 0 END ) AS count_unit, 
      SUM(CASE WHEN org_type = 'thana' THEN 1 ELSE 0 END ) AS count_thana,
     SUM( CASE WHEN org_type = 'ward' THEN 1 ELSE 0 END ) AS count_ward,
     SUM( CASE WHEN org_type = 'branch' THEN 1 ELSE 0 END ) AS count_branch,
    SUM( CASE WHEN is_organization != 1 THEN 1 ELSE 0 END ) AS no_organization 
    FROM `sma_institutionlist` WHERE   branch_id = " . $branch_id . " AND is_active = 1 
    GROUP BY institution_type_child");



            $this->data['organization_info'] = $this->site->query("SELECT     
    t2.institution_type_child ,     SUM(CASE WHEN org_change_type = 1 THEN 1 ELSE 0 END) increase_organization, SUM(CASE WHEN org_change_type = 2 THEN 1 ELSE 0 END) decrease_organization
   FROM `sma_institution_organization`
   LEFT JOIN `sma_institutionlist` `t2` ON t2.id=`sma_institution_organization`.`institution_id` 
   WHERE sma_institution_organization.`date` BETWEEN '" . $start . "' AND '" . $end . "' AND t2.branch_id = " . $branch_id . "
   GROUP BY institution_type_child ");



            $this->data['supporter_org_but_org_info'] = $this->site->query("SELECT a.institution_type_child, v3_prev_support_but_org(a.institution_type_child,'" . $prev . "', " . $branch_id . ") prev_, SUM(a.support_increase_but_org) support_increase_but_org, SUM(a.support_decrease_but_org) support_decrease_but_org
   FROM
   (SELECT `institution_type_child`, COUNT(`sma_institution_supporter_organization`.id) support_increase_but_org, 
   0  support_decrease_but_org
   FROM  `sma_institution_supporter_organization` 
   LEFT JOIN  sma_institutionlist
   ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
   WHERE sma_institution_supporter_organization.change_type = 1 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "' AND sma_institution_supporter_organization.branch_id = " . $branch_id . " 
   GROUP BY institution_type_child
    
   UNION ALL 
    
   SELECT `institution_type_child`, 0 support_increase_but_org, 
   COUNT(`sma_institution_supporter_organization`.id) support_decrease_but_org
   FROM  `sma_institution_supporter_organization` 
   LEFT JOIN  sma_institutionlist
   ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
   WHERE sma_institution_supporter_organization.change_type = 2 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "'  AND sma_institution_supporter_organization.branch_id = " . $branch_id . "
    GROUP BY institution_type_child)a
   GROUP BY a.institution_type_child ");
        } else {

            $this->data['institution_number'] = $this->site->query("SELECT institution_type_child,  v3_prev_institution(institution_type_child, " . $prev . ", -1) v3_prev_institution, SUM(increase_institution) increase,  SUM(decrease_institution) decrease FROM   ( SELECT     
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
       ) a GROUP BY institution_type_child ,v3_prev_institution");




            $this->data['institution_info'] = $this->site->query("SELECT     
       institution_type_child,  SUM( v3_organization_prev( sma_institutionlist.id, '" . $prev . "', 2,-1)) unit_prev, SUM(current_unit) current_unit, 
      SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 1, -1)) unit_increase, 
      SUM( v3_latest_unit_status( sma_institutionlist.id, '" . $start . "', '" . $end . "', 2, -1)) unit_decrease ,
      SUM( total_student_number ) total_student_number, SUM( supporter) supporter, 
      SUM(other_org_worker) other_org_worker, 
      SUM(total_female_student) total_female_student, 
      SUM(female_student_supporter) female_student_supporter, 
      SUM(non_muslim_student) non_muslim_student, 
      SUM(total_student_number) total_student_number, 
       SUM( CASE WHEN org_type = 'unit' THEN 1 ELSE 0 END ) AS count_unit, 
        SUM(CASE WHEN org_type = 'thana' THEN 1 ELSE 0 END ) AS count_thana,
       SUM( CASE WHEN org_type = 'ward' THEN 1 ELSE 0 END ) AS count_ward,
       SUM( CASE WHEN org_type = 'branch' THEN 1 ELSE 0 END ) AS count_branch,
      SUM( CASE WHEN is_organization != 1 THEN 1 ELSE 0 END ) AS no_organization 
      FROM `sma_institutionlist` where is_active = 1 
      GROUP BY institution_type_child");



            $this->data['organization_info'] = $this->site->query("SELECT     
      t2.institution_type_child ,     SUM(CASE WHEN org_change_type = 1 THEN 1 ELSE 0 END) increase_organization, SUM(CASE WHEN org_change_type = 2 THEN 1 ELSE 0 END) decrease_organization
     FROM `sma_institution_organization`
     LEFT JOIN `sma_institutionlist` `t2` ON t2.id=`sma_institution_organization`.`institution_id` 
     WHERE sma_institution_organization.`date` BETWEEN '" . $start . "' AND '" . $end . "'
     GROUP BY institution_type_child ");



            $this->data['supporter_org_but_org_info'] = $this->site->query("SELECT a.institution_type_child, v3_prev_support_but_org(a.institution_type_child,'" . $prev . "', -1) prev_, SUM(a.support_increase_but_org) support_increase_but_org, SUM(a.support_decrease_but_org) support_decrease_but_org
     FROM
     (SELECT `institution_type_child`, COUNT(`sma_institution_supporter_organization`.id) support_increase_but_org, 
     0  support_decrease_but_org
     FROM  `sma_institution_supporter_organization` 
     LEFT JOIN  sma_institutionlist
     ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
     WHERE sma_institution_supporter_organization.change_type = 1 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "' 
     GROUP BY institution_type_child
      
     UNION ALL 
      
     SELECT `institution_type_child`, 0 support_increase_but_org, 
     COUNT(`sma_institution_supporter_organization`.id) support_decrease_but_org
     FROM  `sma_institution_supporter_organization` 
     LEFT JOIN  sma_institutionlist
     ON sma_institution_supporter_organization.institution_id = `sma_institutionlist`.id
     WHERE sma_institution_supporter_organization.change_type = 2 AND DATE(sma_institution_supporter_organization.`date`) BETWEEN '" . $start . "' AND '" . $end . "'  
      GROUP BY institution_type_child)a
     GROUP BY a.institution_type_child ");
        }





        if ($branch_id) {

            $this->data['detailinfo'] = $this->getEntryInfo($this->data['institutions'], $branch_id);
        } else
            $this->data['detailinfo'] = '';


        $this->data['report_info'] = $report_type;

        $this->data['institutiontype'] = $this->organization_model->getAllInstitution(2);



        $this->data['institution_manpower_record'] = $this->site->query("SELECT   
      SUM(CASE WHEN orgstatus_id = 2 OR orgstatus_id = 12 THEN 1 ELSE 0 END) associate ,  
      SUM(CASE WHEN orgstatus_id = 1 THEN 1 ELSE 0 END ) `member` ,  institution_type_child
      FROM `sma_manpower`  WHERE $where  `orgstatus_id` IN (1,2,12) GROUP BY `institution_type_child`");


        $this->data['org_summary'] = $this->getorg_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);





        /// $this->sma->print_arrays($this->data['org_summary']);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Organization'));
        $meta = array('page_title' => 'Organization', 'bc' => $bc);
        if ($branch_id) {
            $this->page_construct2('organization/index_entry', $meta, $this->data, 'leftmenu/organization');
        } else
            $this->page_construct2('organization/index', $meta, $this->data, 'leftmenu/organization');
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

        $report_info =  $reportinfo['info'];



        if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {

            $start = $report_info->startdate_half;
            $end = $report_info->enddate_annual;
        } else  if ($this->input->get('type') && ($this->input->get('type') == 'half_yearly')) {

            $start = $report_info->startdate_half;
            $end = $report_info->enddate_half;
        } else {


            $start = $reportinfo['start'];
            $end = $reportinfo['end'];
        }




        if ($branch_id) {

            if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
                $result =  $this->site->query_binding(" SELECT  `institution_type_id`,
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
                $result2 =  $this->site->query_binding(" SELECT  `institution_type_id`,
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

                $increase_outputinfo  = $merged;



                // $increase_outputinfo->id = 999999999999;
            } else {

                //$increase_outputinfo = $this->site->getOneRecord('organization_record','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);

                $increase_outputinfo = $this->site->query_binding('SELECT *from sma_organization_record  where branch_id = ? AND date BETWEEN ? AND ?', array($branch_id, $start, $end));
            }
        } else {

            if ($this->input->get('type') && ($this->input->get('type') == 'annual')) {
                $result =  $this->site->query_binding("SELECT  `institution_type_id`,
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
                $increase_outputinfo =  $result;
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
            $result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND branch_id = ? AND  calculated_year = ? ", array($report_type, $branch_id, $year));

        else
            $result =  $this->site->query_binding("SELECT * from sma_organization_record_calculated WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $year));


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
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name,  {$this->db->dbprefix('institutionlist')}.org_type as org_type,t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,    v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev, current_unit, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1, " . $branch_id . ") increase, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, " . $branch_id . ") decrease", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 1);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name,  {$this->db->dbprefix('institutionlist')}.org_type as org_type,t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name,    v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',2," . $branch_id . ") prev, current_unit, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',1,-1) increase, v3_latest_unit_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2, -1) decrease", FALSE)
                ->from('institutionlist');
            $this->datatables->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->datatables->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->datatables->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 1);
        }





        $edit_link = anchor('admin/organization/editinstitution/$1', '<i class="fa fa-pencil"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');




        $decrease_link = anchor('admin/organization/decreaseorganization/$1', '<i class="fa fa-info"></i> ' . lang('ঘাটতি'), 'data-toggle="modal" data-target="#myModal"');

        //$supporter_organization = anchor('admin/organization/supporterorganization/$1', '<i class="fa fa-info"></i> ' . lang('supporter organization'),'data-toggle="modal" data-target="#myModal"');

        $unit = anchor('admin/organization/unit/$1', '<i class="fa fa-info"></i> ' . lang('উপশাখা'), 'data-toggle="modal" data-target="#myModal"');


        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
<ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>

<li>' . $edit_link . '</li>
<li>' . $decrease_link . '</li>
<li>' . $unit . '</li>
</ul>
</div></div>';


        $this->datatables->add_column("Decrease", $action, "id"); //$edit_link



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

            $unit  = $this->site->query("SELECT *            
            FROM " . $this->db->dbprefix('institution_unit') . "  WHERE   date  BETWEEN '" . $report_type['start'] . "' AND '" . $report_type['end']  . "' AND  institution_id = $id ");


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
                    $data['user_id'] =   $this->session->userdata('user_id');

                    $data['institution_id'] =   $id;
                    $data['branch_id'] =    $institution_details->branch_id;

                    $this->site->insertData('institution_unit', $data);
                }


                $current_number = $institution_details->current_unit + $this->input->post('unit_increase') - $this->input->post('unit_decrease')  - (count($unit) > 0 ? $unit['0']['unit_increase'] :  0) + (count($unit) > 0 ? $unit['0']['unit_decrease'] : 0);
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

            $supporterorganization  = $this->site->query("SELECT *            
            FROM " . $this->db->dbprefix('institution_supporter_organization') . "  WHERE   date  BETWEEN '" . $report_type['start'] . "' AND '" . $report_type['end']  . "' AND  institution_id = $id ");


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

                $current_number = $institution_details->current_supporter_organization + $this->input->post('supporter_org_increase') - $this->input->post('supporter_org_decrease')  - (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_increase'] :  0) + (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_decrease'] : 0);



                if (isset($supporterorganization['0']['id']))
                    $this->site->updateData('institution_supporter_organization', $data, array('id' => $supporterorganization['0']['id']));
                else {
                    $data['user_id'] =   $this->session->userdata('user_id');

                    $data['institution_id'] =   $id;
                    $data['branch_id'] =    $institution_details->branch_id;

                    if ($current_number == 0 &&  $institution_details->current_supporter_organization > 0) {
                        $data['change_type'] = 2;
                        $data['current_supporter_org'] = $current_number;
                        $data['is_organization'] = $institution_details->is_organization;
                    } elseif ($current_number > 0 &&  $institution_details->current_supporter_organization == 0) {
                        $data['change_type'] = 1;
                        $data['current_supporter_org'] = $current_number;
                        $data['is_organization'] = $institution_details->is_organization;
                    }


                    $this->site->insertData('institution_supporter_organization', $data);
                }


                $current_number = $institution_details->current_supporter_organization + $this->input->post('supporter_org_increase') - $this->input->post('supporter_org_decrease')  - (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_increase'] :  0) + (count($supporterorganization) > 0 ? $supporterorganization['0']['supporter_org_decrease'] : 0);
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
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 1);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
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
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড ');
            $this->excel->getActiveSheet()->SetCellValue('F1', 'মন্তব্য');


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
            $filename = 'institution_with_org';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
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







    function getEntryInfo($institutions, $branch_id = NULL)
    {

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];
        $year = $report_type['year'];
        $cal_type = $report_type['type'];
        $report_info =  $report_type['info'];

        if ($report_type['is_current'] != false) {
            if ($cal_type == 'half_yearly') {
                $organization_recordinfo = $this->site->getOneRecord('organization_record', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $end, 'date > ' => $start), 'id desc', 1, 0);

                if (!$organization_recordinfo &&   (time() >= strtotime($start)   &&  time() <= strtotime($end))) {

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

            $branch =  $this->site->getBranchByID($branch_id);


            //  $institution_code = sprintf('%03d', $branch->code);

            $institution_code =  sprintf('%03d', $branch->code) . sprintf('%05d', $branch->last_institution_code + 1);


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

        if ($institution_details->is_organization == 1  || $institution_details->current_unit != 0) {

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
            $where =  array('id' => $id, 'branch_id' => $this->session->userdata('branch_id'));

        else if ($this->Owner || $this->Admin)
            $where =  array('id' => $id);



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
            $this->data['status'] =  'Member';
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




    function institutionwithoutorgexport($branch_id = NULL)  // with no organization export
    {



        $this->sma->checkPermissions('index', TRUE);

        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }



        if ($branch_id) {

            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
                ->from('institutionlist');
            $this->db->join('institution t1', 'institutionlist.institution_type=t1.id', 'left');
            $this->db->join('institution t2', 'institutionlist.institution_type_child=t2.id', 'left');

            $this->db->join('branches', 'branches.id=institutionlist.branch_id', 'left')
                ->where('branches.id', $branch_id)
                ->where('institutionlist.is_active', 1)
                ->where('institutionlist.is_organization', 2);
        } else {
            $this->db
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('institutionlist')}.notes as notes", FALSE)
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
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1," . $branch_id . ") prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "', '" . $end . "',1) increase, v3_latest_organization_status({$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization, org_type, v3_org_current_session( {$this->db->dbprefix('institutionlist')}.id, '" . $start . "' , '" . $end . "' ) in_current_session , notes, date,current_unit,  
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
                ->select($this->db->dbprefix('institutionlist') . ".id as id,  {$this->db->dbprefix('institutionlist')}.code as code,  institution_name, t1.institution_type as plname, t2.institution_type as rcname,   {$this->db->dbprefix('branches')}.name as branch_name, v3_organization_prev( {$this->db->dbprefix('institutionlist')}.id,'" . $prev . "',1," . $branch_id . ") prev, current_supporter_organization, v3_latest_organization_status( {$this->db->dbprefix('institutionlist')}.id,'" . $start . "', '" . $end . "',1) increase, v3_latest_organization_status({$this->db->dbprefix('institutionlist')}.id,'" . $start . "','" . $end . "',2) decrease, `supporter`,`other_org_worker`,`total_female_student`,`female_student_supporter`,`non_muslim_student`,`total_student_number`,   is_organization, org_type, v3_org_current_session({$this->db->dbprefix('institutionlist')}.id, '" . $start . "' , '" . $end . "' ) in_current_session , notes, date,current_unit,  
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
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('প্রতিষ্ঠান তালিকা');
            $this->excel->getActiveSheet()->SetCellValue('A1', 'প্রতিষ্ঠানের কোড');
            $this->excel->getActiveSheet()->SetCellValue('B1', 'প্রতিষ্ঠানের নাম');
            $this->excel->getActiveSheet()->SetCellValue('C1', 'ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('D1', 'উপ ধরণ');
            $this->excel->getActiveSheet()->SetCellValue('E1', 'শাখা কোড ');

            $this->excel->getActiveSheet()->SetCellValue('F1', 'সমর্থক সংগঠন পূর্ব');
            $this->excel->getActiveSheet()->SetCellValue('G1', 'সমর্থক সংগঠন বর্তমান');
            $this->excel->getActiveSheet()->SetCellValue('H1', 'সমর্থক সংগঠন বৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('I1', 'সমর্থক সংগঠন ঘাটতি');

            $this->excel->getActiveSheet()->SetCellValue('J1', 'সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('K1', 'অন্যান্য ছাত্র সংগঠনের কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('L1', 'মোট ছাত্রী সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('M1', 'ছাত্রী সমর্থক');
            $this->excel->getActiveSheet()->SetCellValue('N1', 'অমুসলিম ছাত্রছাত্রী');
            $this->excel->getActiveSheet()->SetCellValue('O1', 'মোট ছাত্রছাত্রী সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('P1', 'সংগঠন');
            $this->excel->getActiveSheet()->SetCellValue('Q1', 'সংগঠনের ধরণ ');
            $this->excel->getActiveSheet()->SetCellValue('R1', 'বর্তমান সেশনে সংগঠন সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('S1', 'মন্তব্য');
            $this->excel->getActiveSheet()->SetCellValue('T1', 'বর্তমান সেশনে যুক্ত কিনা ?');

            $this->excel->getActiveSheet()->SetCellValue('U1', 'উপশাখা পূর্ব সংখ্যা');
            $this->excel->getActiveSheet()->SetCellValue('V1', 'উপশাখা বৃৃদ্ধি');
            $this->excel->getActiveSheet()->SetCellValue('W1', 'উপশাখা ঘাটতি');
            $this->excel->getActiveSheet()->SetCellValue('X1', 'উপশাখা সংখ্যা');
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
                $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->prev);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->current_supporter_organization);
                $this->excel->getActiveSheet()->SetCellValue('H' . $row, $data_row->increase);
                $this->excel->getActiveSheet()->SetCellValue('I' . $row, $data_row->decrease);
                $this->excel->getActiveSheet()->SetCellValue('J' . $row, $data_row->supporter);
                $this->excel->getActiveSheet()->SetCellValue('K' . $row, $data_row->other_org_worker);
                $this->excel->getActiveSheet()->SetCellValue('L' . $row, $data_row->total_female_student);
                $this->excel->getActiveSheet()->SetCellValue('M' . $row, $data_row->female_student_supporter);
                $this->excel->getActiveSheet()->SetCellValue('N' . $row, $data_row->non_muslim_student);
                $this->excel->getActiveSheet()->SetCellValue('O' . $row, $data_row->total_student_number);
                $this->excel->getActiveSheet()->SetCellValue('P' . $row, $data_row->is_organization);

                $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $data_row->org_type);
                $this->excel->getActiveSheet()->SetCellValue('R' . $row, $data_row->in_current_session == 1 ? 'Increase' : ($data_row->in_current_session == 2 ? 'Decrease' : ''));
                //$this->excel->getActiveSheet()->SetCellValue('R' . $row, $data_row->in_current_session);
                $this->excel->getActiveSheet()->SetCellValue('S' . $row, $data_row->notes);
                $this->excel->getActiveSheet()->SetCellValue('T' . $row, strtotime($data_row->date) > strtotime($start) &&  strtotime($data_row->date) < strtotime($end) ? 'Current' : 'not in current');
                //$this->excel->getActiveSheet()->SetCellValue('T' . $row, $data_row->date); 
                $this->excel->getActiveSheet()->SetCellValue('U' . $row, $data_row->current_unit);
                $this->excel->getActiveSheet()->SetCellValue('V' . $row, $data_row->prev_unit);
                $this->excel->getActiveSheet()->SetCellValue('W' . $row, $data_row->increase);
                $this->excel->getActiveSheet()->SetCellValue('X' . $row, $data_row->decrease);
                $row++;
            }
            //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
            //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
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


        $this->datatables->add_column("View",  $view_link, "institution_id");

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


        $this->datatables->add_column("View",  $view_link, "institution_id");

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
        $this->datatables->add_column("View",  $view_link, "id");



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
            $start =  $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_half;
        } elseif ($type == 'annual') {
            $start =  $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_annual;
        } else {
            $start =  $report_type['info']->startdate_annual;
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
            $start =  $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_half;
        } elseif ($type == 'annual') {
            $start =  $report_type['info']->startdate_half;
            $end = $report_type['info']->enddate_annual;
        } else {
            $start =  $report_type['info']->startdate_annual;
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

            $organization_info =   $this->site->query("SELECT   
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
                'branch_id' =>  $institution_details->branch_id,
                'date' =>   $this->sma->fsd($this->input->post('date')),
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

        if ($this->form_validation->run() == true &&  ($insert_id = $this->site->insertData('institution_organization', $data, 'id'))) {

            $unit_data = array(
                'institution_id' => $id,
                'date' =>   $this->sma->fsd($this->input->post('date')),
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




    function addthana($id = NULL)
    {

        $this->load->admin_model('organization_model');
        //   $this->sma->print_arrays($_POST, $_GET);

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $this->load->admin_model('organization_model');

        $branches = $this->site->getAllBranches();

        $this->form_validation->set_rules('thana_name', 'name', 'required');
        $this->form_validation->set_rules('thana_code', 'code', 'required');


        if ($this->form_validation->run() == true) {


            // $this->sma->print_arrays($branchinfo->last_assocode);

            //new manpower
            $data = array(
                'date' =>  date('Y-m-d'),
                'branch_id' => $this->input->post('branch_id'),
                'thana_name' => $this->input->post('thana_name'),
                'thana_code' => $this->input->post('thana_code'),
                'org_type' => $this->input->post('org_type'),

                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),
                'increase_in_current_session' => $this->input->post('increase_in_current_session'),
                'note' => $this->input->post('note'),


                'user_id' => $this->session->userdata('user_id'),

            );





            $thana_id = $this->site->insertData('thana', $data, 'id');

            $this->session->set_flashdata('message', 'Added');


            admin_redirect('organization/addthana');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = NULL;
                $this->data['branch'] =   NULL;
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }



            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('থানা')));
            $meta = array('page_title' => lang('থানা '), 'bc' => $bc);
            $this->page_construct('organization/addthana', $meta, $this->data, 'leftmenu/organization');
        }
    }



    function getListthana($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();


        $edit_link = anchor('admin/organization/editthana/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');
       
       

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type,member_number,associate_number,worker_number,supporter_number,ward_number,unit_number,increase_in_current_session,   {$this->db->dbprefix('thana')}.note", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana')->where('thana.branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('thana') . ".id as id, t1.name as branch_name, {$this->db->dbprefix('thana')}.thana_name,   thana_code, org_type,member_number,associate_number,worker_number,supporter_number,ward_number,unit_number,increase_in_current_session,   {$this->db->dbprefix('thana')}.note", FALSE)
                ->join('branches as t1', 't1.id=thana.branch_id', 'left')
                ->from('thana');
        }

      //  $start = $report_type['start'];
      //  $end = $report_type['end'];

       // $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
       $this->datatables->add_column("Actions", $edit_link, "id");
       
        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }


    function editthana($id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $thana_details = $this->site->getByID('sma_thana', 'id', $id);


        $this->form_validation->set_rules('thana_name', 'name', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'branch_id' => $this->input->post('branch_id'),
                'thana_name' => $this->input->post('thana_name'),
                'thana_code' => $this->input->post('thana_code'),
                'org_type' => $this->input->post('org_type'),

                'member_number' => $this->input->post('member_number'),
                'associate_number' => $this->input->post('associate_number'),
                'worker_number' => $this->input->post('worker_number'),
                'supporter_number' => $this->input->post('supporter_number'),
                'ward_number' => $this->input->post('ward_number'),
                'unit_number' => $this->input->post('unit_number'),
                'increase_in_current_session' => $this->input->post('increase_in_current_session'),
                'note' => $this->input->post('note'),

                'update_by' => $this->session->userdata('user_id'),
                'update_at' => date("Y-m-d H:i:s"),
                'note' => $this->input->post('note')
            );


         
        } elseif ($this->input->post('edit_thana')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('organization/thanalist');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('thana', $data, array('id' => $id))) {

            $this->session->set_flashdata('message', 'Updated successfully');
            admin_redirect("organization/thanalist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['thana'] = $thana_details;


            $this->data['branches'] = $this->site->getAllBranches();

            if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {

                $this->data['branch_id'] = NULL;
                $this->data['branch'] =   NULL;
            } else {

                $this->data['branch_id'] = $this->session->userdata('branch_id');
                $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            }


            $this->load->view($this->theme . 'organization/thanaedit', $this->data);
        }
    }

}
