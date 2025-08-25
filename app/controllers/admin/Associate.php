<?php defined('BASEPATH') or exit('No direct script access allowed');

class Associate extends MY_Controller
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
            admin_redirect('associate/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('associate/' . $this->session->userdata('branch_id'));
        }

        //$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>1));


        $this->sma->checkPermissions();
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('associate/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('associate/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Associate'));
        $meta = array('page_title' => 'Associate', 'bc' => $bc);


        $this->page_construct('associate/associate', $meta, $this->data, 'leftmenu/manpower');
    }
    function getvalue($value, $array, $field)
    {


        foreach ($array as $row) {

            if ($row->id == $value)
                return $row->{$field};
        }


        return '';
    }


    public function newName($field,$in_out=null)
    {
        switch ($field) {

            case 'barnch_id_to_from':
                $field = ($in_out == 1) ? 'শাখা হতে' :'স্থানান্তরিত শাখা' ;
                break;
            case 'associatecode':
                $field = 'আইডি';
                break;
            case 'name':
                $field = 'নাম';
                break;
            case 'branch_name':
                $field = 'শাখা কোড';
                break;
            case 'thana_code':
                $field = 'থানা কোড';
                break;
            case 'mobile':
                $field = 'মোবাইল নং';
                break;
            case 'responsibility':
                $field = 'সর্বশেষ দায়িত্ব';
                break;
            case 'orgstatus_at_forum':
                $field = 'বৃহত্তর আন্দোলনের মান';
                break;
            case 'education_qualification':
                $field = 'শিক্ষাগত যোগ্যতা';
                break;
            case 'current_profession':
                $field = 'বর্তমান পেশা';
                break;
            case 'institution_type':
                $field = 'শিক্ষাপ্রতিষ্ঠানের ধরন';
                break;
            case 'institution_type_child':
                $field = 'শিক্ষাপ্রতিষ্ঠানের সাব ধরন';
                break;
                //case 'thana_code': $field = 'থানা কোড'; break;       
            case 'sessionyear':
                $field = 'শ্রেণি/বর্ষ';
                break;
            case 'subject':
                $field = 'বিভাগ/বিষয়';
                break;
            case 'foreign_country':
                $field = 'দেশের নাম';
                break;
            case 'foreign_address':
                $field = 'শহরের নাম';
                break;
            case 'higher_education_institution':
                $field = 'শিক্ষা প্রতিষ্ঠানের নাম';
                break;
            case 'type_higher_education':
                $field = 'উচ্চশিক্ষার ধরন';
                break;
            case 'type_of_profession':
                $field = 'পেশার ধরন';
                break;
            case 'email':
                $field = 'ইমেইল';
                break;
            case 'is_forum':
                $field = 'ফোরামে যুক্ত হয়েছেন কিনা?';
                break;
            case 'date_death':
                $field = 'ইন্তেকালের তারিখ';
                break;
            case 'how_death':
                $field = 'কীভাবে';
                break;
            case 'opposition':
                $field = 'প্রতিপক্ষ';
                break;
            case 'myr_serial':
                $field = 'কততম শহিদ';
                break;
            case 'member_oath_date':
                $field = 'সদস্য হওয়ার তারিখ';
                break;
            case 'prossion_target':
                $field = 'পেশাগত টার্গেট-সেক্টর';
                break;
            case 'prossion_target_sub':
                $field = 'পেশাগত টার্গেট-সাব-সেক্টর';
                break;
            case 'studentlife':
                $field = 'ছাত্রত্ব';
                break;
            case 'district':
                $field = 'নিজ জেলা';
                break;
            case 'upazilla_name':
                $field = 'উপজেলা/থানা ';
                break;
            case 'associate_oath_date':
                $field = 'সাথী হওয়ার তারিখ';
                break;
            case 'thana_code':
                $field = 'থানা কোড';
                break;
            case 'blood_group':
                $field = 'ব্লাড গ্রুপ';
                break;

            default:
                $field = $field;
                break;
        }
        return $field;
    }

    public function sheetcellValue($branch = null, $field_arr = null, $data = null, $process_Title = null,$in_out = null)
    {
        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );



        $institution_type = $this->site->getAll('institution');


        //for cell value
        $exColh = 'B';
        foreach ($field_arr as $field) {
            $newName = $this->newName($field);



            $this->excel->getActiveSheet()->SetCellValue($exColh . '6', $newName);



            $this->excel->getActiveSheet()->getColumnDimension($exColh)->setWidth(20);
            $exColh++;
        }




        $row = 7;
        $sQty = 0;
        $pQty = 0;
        $sAmt = 0;
        $pAmt = 0;
        $bQty = 0;
        $bAmt = 0;
        $pl = 0;
        foreach ($data as $key => $data_row) {

            $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
            $this->excel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($style);



            $exCol = 'B';
            foreach ($field_arr as $field) {

                if ($field == 'institution_type_child') // getvalue($value,$array, $field)
                    $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $this->getvalue($data_row->institution_type_child, $institution_type, 'institution_type'));
                else
                    $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $data_row->{$field});


                $this->excel->getActiveSheet()->getStyle($exCol . $row)->applyFromArray($style);

                $exCol++;
            }
            $row++;

            // $this->sma->print_arrays($field_arr);
        }

        //>>>>>>>>>>>for Title >>>>>>>>>>>>>>>>            
        $lastmarg1 = $exColh . '1';
        $lastmarg2 = $exColh . '2';
        $lastmarg3 = $exColh . '3';
        $lastmarg4 = $exColh . '4';
        $lastmarg5 = $exColh . '5';
        $this->excel->getActiveSheet()->mergeCells("A1:$lastmarg1");
        $this->excel->getActiveSheet()->mergeCells("A2:$lastmarg2");
        $this->excel->getActiveSheet()->mergeCells("A3:$lastmarg3");
        $this->excel->getActiveSheet()->mergeCells("A4:$lastmarg4");
        $this->excel->getActiveSheet()->mergeCells("A5:$lastmarg5");
        $this->excel->getActiveSheet()->getStyle("A1:$lastmarg5")->applyFromArray($style)->getFont()->setBold(true)->setSize(16);
        $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
        $this->excel->getActiveSheet()->SetCellValue('A3', $process_Title);
        $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch ? $branch : lang('all_branches')));

        // >>>>>>>>>>>>>>>>>> for table heading
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->SetCellValue('A6', lang('ক্রম'));
        $lastmarg6 = $exColh . '6';
        $this->excel->getActiveSheet()->getStyle("A6:$lastmarg6")->applyFromArray($style)->getFont()->setBold(true)->setSize(12);

        $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $this->excel->getActiveSheet()->getStyle('C2:AE' . $row)->getAlignment()->setWrapText(true);
    }





    function postlog($orgstatus, $start, $end, $branch_id)
    {


        $this->db
            ->select("COUNT(id) as number", FALSE)
            ->from('postponelog');


        $this->db->where('postpone_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->where('orgstatus_id', $orgstatus);
        $this->db->where('in_out', 1);

        if ($branch_id)
            $this->db->where('branch', $branch_id);


        $q = $this->db->get();


        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }





    function associateincreaselist($process_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        $branch_id = $this->input->get('branch_id');
        $process = $this->site->getByID('process', 'id', $process_id);

        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;



        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
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


        // $this->sma->print_arrays($this->data);

        $this->data['process'] = $process;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Associate increase list'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('associate/associate/increase', $meta, $this->data, 'leftmenu/manpower');
    }



    function getIncreaseAssociate($process_id, $branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $type =  $this->input->get('type');
        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('associatelog') . ".id as id,  {$this->db->dbprefix('manpower')}.id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code, t2.name as from_branch", FALSE)
                ->from('associatelog');
            $this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
                ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left');
            $this->datatables->join('branches t2', 't2.id=associatelog.barnch_id_to_from', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('associatelog') . ".id as id,  {$this->db->dbprefix('manpower')}.id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code, t2.name as from_branch", FALSE)
                ->from('associatelog');
            $this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
                ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left');
            $this->datatables->join('branches t2', 't2.id=associatelog.barnch_id_to_from', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');


        if ($process_id == 2)
            $this->datatables->add_column("Edit Output", "<a class=\"tip\" title='" . 'Edit Output' . "' href='" . admin_url('associate/associateoutput/$1') . "'>Output <i class=\"fa fa-pencil\"></i></a>", "id");
        else
            $this->datatables->add_column("", "");


        $this->datatables->unset_column("id");

        echo $this->datatables->generate();
    }








    function associateoutput($id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $branches = $this->site->getAllBranches();
        $this->load->admin_model('organization_model');


        $associatelog = $this->site->getByID('associatelog', 'id', $id);
        $manpower_id = $associatelog->manpower_id;
        $manpower = $this->site->getByID('manpower', 'id', $manpower_id);


        // $this->sma->print_arrays($manpower);


        $this->form_validation->set_rules('logid', 'ID', 'required');
        $this->form_validation->set_rules('institution_type', 'institution type', 'required');


        if ($this->form_validation->run() == true) {



            $datalog = array(
                'institution_id' => $this->input->post('institution_type_id') ? $this->input->post('institution_type_id') : 0,
                'asso_single_digit' => $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0,
                'asso_jsc_jdc' => $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0,
                'asso_ssc_dhakil' => $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0,
                'asso_hsc_alim' => $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0,
                'asso_department_position' => $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0,
                'asso_department_position_private' => $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0,
                'asso_influential' => $this->input->post('member_influential') ? $this->input->post('member_influential') : 0,
                'asso_hc_science' => $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0,
                'asso_madrasha' => $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0,
                'asso_medical_college' => $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0,
                'asso_ideal_college' => $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0,
                'asso_engineeering' => $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0,
                'asso_agri' => $this->input->post('member_agri') ? $this->input->post('member_agri') : 0,
                'asso_science' => $this->input->post('member_science') ? $this->input->post('member_science') : 0,
                'asso_business' => $this->input->post('member_business') ? $this->input->post('member_business') : 0,
                'asso_arts' => $this->input->post('member_arts') ? $this->input->post('member_arts') : 0
            );


            $manpowerinfolog = array(
                'institution_type' => $this->input->post('institution_type_id') ? $this->input->post('institution_type_id') : 0,
                'single_digit' => $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0,
                'jsc_jdc' => $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0,
                'ssc_dhakil' => $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0,
                'hsc_alim' => $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0,
                'department_position' => $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0,
                'department_position_private' => $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0,
                'influential' => $this->input->post('member_influential') ? $this->input->post('member_influential') : 0,
                'hc_science' => $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0,
                'madrasha' => $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0,
                'medical_college' => $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0,
                'ideal_college' => $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0,
                'engineeering' => $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0,
                'agri' => $this->input->post('member_agri') ? $this->input->post('member_agri') : 0,
                'science' => $this->input->post('member_science') ? $this->input->post('member_science') : 0,
                'business' => $this->input->post('member_business') ? $this->input->post('member_business') : 0,
                'arts' => $this->input->post('member_arts') ? $this->input->post('member_arts') : 0
            );

            // $this->sma->print_arrays($data, $warehouse_qty, $product_attributes);
        }

        if ($this->form_validation->run() == true) {


            // $this->sma->print_arrays($memberlog, $manpower_id,$manpower);

            $this->site->updateData('associatelog', $datalog, array('id' => $id));



            //update manpower
            // $manpower_update = array(
            //      'institution_type' => $datalog['institution_id'],
            // );




            $this->site->updateData('manpower', $manpowerinfolog, array('id' => $manpower_id, 'branch' => $associatelog->branch, 'orgstatus_id' => 2));
            $this->site->updateData('manpower', $manpowerinfolog, array('id' => $manpower_id, 'branch' => $associatelog->branch, 'orgstatus_id' => 12));



            $this->session->set_flashdata('message', 'Updated');
            admin_redirect('associate/associateincreaselist/2');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            //  $this->data['branches'] = $branches;


            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);

            $this->data['associatelog'] = $associatelog;
            $this->data['manpower'] = $manpower;

            // $this->sma->print_arrays($this->data['manpower']);

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('associate/associateincreaselist/2'), 'page' => 'Associate Improve'), array('link' => '#', 'page' => 'বৃদ্ধিকৃতদের আউটপুট'));
            $meta = array('page_title' => 'বৃদ্ধিকৃতদের আউটপুট', 'bc' => $bc);
            $this->page_construct('associate/associate/output', $meta, $this->data, 'leftmenu/manpower');
        }
    }





    function associatedecreaselist($process_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $branch_id = $this->input->get('branch_id');
        $process = $this->site->getByID('process', 'id', $process_id);

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
        // $this->sma->print_arrays($this->data);

        $this->data['process'] = $process;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('associate/associate/decrease', $meta, $this->data, 'leftmenu/manpower');
    }



    function getDecreaseAssociate($process_id, $branch_id = NULL)
    {



        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $type =  $this->input->get('type');
        $report_type = $this->report_type();
        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from, `opposition`", FALSE)
                ->from('associatelog');
            $this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
                ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2);
            $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from, `opposition`", FALSE)
                ->from('associatelog');
            $this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
                ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2);
            $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }



        $start = $report_type['start'];
        $end = $report_type['end'];


        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end  . '"');

        if ($process_id != 15)
            $this->datatables->unset_column("barnch_id_to_from");




        echo $this->datatables->generate();
    }



    function postponelist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('associate/postponelist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('associate/postponelist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('associate'), 'page' => 'Associate'), array('link' => '#', 'page' => 'Postpone'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('associate/postpone/postponelist', $meta, $this->data, 'leftmenu/manpower');
    }





    public function decreaselist($process_id = null)
    {
        $this->sma->checkPermissions('index', TRUE);

        $process_id = $this->input->get('process_id');
        $process = $this->site->getByID('process', 'id', $process_id);
        $branch_id = $this->input->get('branch_id');

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

        $this->data['process'] = $process;

        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'Member'), array('link' => '#', 'page' => $process->process));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/decrease/decreaselist', $meta, $this->data, 'leftmenu/manpower');
    }




    function getPostpone($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }






        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('(manpower.orgstatus_id = 2 OR manpower.orgstatus_id = 12)');
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left')
                ->where('branches.id', $branch_id)->where('is_postpone', 1);

            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('(manpower.orgstatus_id = 2 OR manpower.orgstatus_id = 12)')->where('is_postpone', 1);
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }









        $this->datatables->add_column("Postpone", "<a class=\"tip\" title='" . 'Postpone' . "' href='" . admin_url('associate/associatepostponewithdraw/$1') . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-minus\"></i></a>", "id");
        // $this->datatables->unset_column("manpowerid"); 
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }


    function getAssociate($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('associate/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_manpower') . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('manpowerlist/edit/$1/2') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';

        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';

        $process_list = array(
            8 => 'ছাত্রত্ব শেষ',
            15 => 'স্থানান্তর',
            12 => 'বাতিল',
            11 => 'উচ্চ শিক্ষা',
            14 => 'বিদেশে চাকুরি',
            9 => 'ইন্তেকাল',
            10 => 'শাহাদাৎ',
            // 18=>'পাওয়া যায়নি'
        );

        $li = "";
        foreach ($process_list as $key => $process) {

            $li .= "<li><a class=\"tip\" title='" . $process . "' href='" . admin_url('associate/associatedecrease/$1/' . $key) . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-edit\"></i>" . $process . "</a></li>";
            // $li .='<li><a href="' . admin_url('manpower/memberdecrease/$1'.'/'.$key) . '"><i class="fa fa-edit"></i> ' . $process . '</a></li>';
        }

        $decrease_button = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . 'ঘাটতি ' . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

        $decrease_button .= $li . ' </ul>
        </div></div>';


        $this->load->library('datatables');

        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code, v3_district_upazila({$this->db->dbprefix('manpower')}.upazila) as upazila_name", FALSE)
                ->from('associate');
            $this->datatables->join('manpower', 'manpower.id=associate.manpower_id', 'left')
                ->where('associate.is_associate_now', 1);
            $this->datatables->join('branches', 'branches.id=associate.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code, v3_district_upazila({$this->db->dbprefix('manpower')}.upazila) as upazila_name", FALSE)
                ->from('associate');
            $this->datatables->join('manpower', 'manpower.id=associate.manpower_id', 'left')
                ->where('associate.is_associate_now', 1);
            $this->datatables->join('branches', 'branches.id=associate.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }








        $this->datatables->add_column("Decrease", $decrease_button, "manpowerid");
        $this->datatables->add_column("Postpone", "<a class=\"tip  btn btn-default btn-xs btn-primary\" title='" . 'Postpone' . "' href='" . admin_url('associate/associatepostpone/$1') . "' data-toggle='modal' data-target='#myModal'>মূলতবী <i class=\"fa fa-minus\"></i></a>", "manpowerid");
        $this->datatables->add_column("Actions", $action, "manpowerid");

        echo $this->datatables->generate();
    }




    function associatedecrease($manpower_id = NULL, $process_id = NULL)
    {

        //admin_redirect('manpower/member');
        // $this->sma->print_arrays($_POST);


        $this->sma->checkPermissions('index', TRUE);

        $this->load->admin_model('organization_model');



        $this->load->helper('security');

        $manpower = $this->manpower_model->getManpowerByID($manpower_id);
        $process = $this->site->getByID('process', 'id', $process_id);


        $is_changeable = $this->site->check_confirm($manpower->branch, date('Y-m-d'));


        if ($is_changeable == false) {
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'Report has been confirmed!!! You can\'t update/change info.';
            $this->load->view($this->theme . 'manpower/decrease/pending', $this->data);
        } else if ($manpower->is_pending == 1) {
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'His transfer status is still pending.';
            $this->load->view($this->theme . 'manpower/decrease/pending', $this->data);
        } elseif ($manpower->orgstatus_id == 12 && $process_id != 12) {
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['msg'] = 'ইনি একজন সদস্যপ্রার্থী। সদস্যপ্রার্থী তালিকা থেকে ঘাটতি দিন। ঘাটতি দিতে ' . anchor('admin/membercandidate', 'এখানে ক্লিক করুন');


            $this->data['title'] =  $process->process;
            $this->load->view($this->theme . 'manpower/decrease/pending', $this->data);
        } else {


            $this->form_validation->set_rules('date', lang("date"), 'required');
            if ($process_id == 15)
                $this->form_validation->set_rules('new_branch_id', 'Branch', 'required');


            if ($this->form_validation->run() == true) {
                $manpowerid = $this->input->post('manpower_id');
                $processid = $this->input->post('process_id');
                $branchid =  ($this->Owner || $this->Admin) ?  $this->input->post('branch_id') : $this->session->userdata('branch_id');
                $note = $this->input->post('note');
                $newbranchid = $this->input->post('new_branch_id') ? $this->input->post('new_branch_id') : NULL;






                $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

                $data_associate = array(
                    'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
                    'is_associate_now' => 2
                );
                $associate_where = array(
                    'manpower_id' => $manpowerid,
                    'branch' => $branchid
                );


                $data_associate_log = array(
                    'process_date' => $date,
                    'manpower_id' => $manpowerid,
                    'in_out' => 2,
                    'user_id' => $this->session->userdata('user_id'),
                    'process_id' => $processid,
                    'branch' => $branchid,
                    'note' => $note
                );





                if ($process_id == 15) {


                    $is_changeable_2 = $this->site->check_confirm($newbranchid, date('Y-m-d'));

                    if ($is_changeable_2 == false) {
                        $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                        redirect($_SERVER["HTTP_REFERER"]);
                    }



                    $update_15 = array();
                    if ($this->input->post('sessionyear')) {
                        $update_15['sessionyear'] = $this->input->post('sessionyear');
                    }
                    if ($this->input->post('institution_type')) {
                        $update_15['institution_type'] = $this->input->post('institution_type');
                    }
                    $update_15['is_pending'] = 1;

                    $this->manpower_model->manpowerUpdate('manpower', $update_15, array('id' => $manpowerid));

                    $data_newbranch_member_log = array(
                        'created_by' => $this->session->userdata('user_id'),
                        'from_branch_id' => $branchid,
                        'to_branch_id' => $newbranchid,
                        'manpower_id' => $manpowerid,
                        'note' => $note,
                        'orgstatus_id' => 2,
                        'process_date' => $date
                    );



                    $this->manpower_model->insertData('manpower_transfer', $data_newbranch_member_log);

                    $this->session->set_flashdata('message', 'Notification for transfer has been sent');

                    admin_redirect("associate");
                }
            } elseif ($this->input->post('associatedecrease')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('associate');
            }

            if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('associate', $data_associate, $associate_where) && $this->manpower_model->insertData('associatelog', $data_associate_log)) {










                $manpower_update_arr = array();
                if ($processid != 15)
                    $manpower_update_arr['orgstatus_id'] = NULL;

                else
                    $manpower_update_arr['branch'] = $newbranchid;

                if ($this->input->post('prossion_target_id')) {
                    $prossion_target = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_id')), 'id desc', 1, 0);
                    $manpower_update_arr['prossion_target_id'] = $this->input->post('prossion_target_id');
                    $manpower_update_arr['prossion_target'] = $prossion_target;
                }

                if ($this->input->post('prossion_target_sub_it')) {
                    $prossion_target_sub = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_sub_it')), 'id desc', 1, 0);
                    $manpower_update_arr['prossion_target_sub_it'] = $this->input->post('prossion_target_sub_it');
                    $manpower_update_arr['prossion_target_sub'] = $prossion_target_sub;
                }

                if ($this->input->post('sessionyear')) {
                    $manpower_update_arr['sessionyear'] = $this->input->post('sessionyear');
                }

                if ($this->input->post('responsibility_id')) {
                    $manpower_update_arr['responsibility_id'] = $this->input->post('responsibility_id');
                }

                if ($this->input->post('studentlife')) {
                    $manpower_update_arr['studentlife'] = $this->input->post('studentlife');
                }

                if ($this->input->post('education')) {
                    $manpower_update_arr['education'] = $this->input->post('education');
                }

                if ($this->input->post('district')) {
                    $manpower_update_arr['district'] = $this->input->post('district');
                }
                if ($this->input->post('institution_type')) {
                    $manpower_update_arr['institution_type'] = $this->input->post('institution_type');
                }
                if ($this->input->post('subject')) {
                    $manpower_update_arr['subject'] = $this->input->post('subject');
                }
                if ($this->input->post('education_institution')) {
                    $manpower_update_arr['education_institution'] = $this->input->post('education_institution');
                }
                if ($this->input->post('is_forum')) {
                    $manpower_update_arr['is_forum'] = $this->input->post('is_forum');
                }
                if ($this->input->post('current_profession')) {
                    $manpower_update_arr['current_profession'] = $this->input->post('current_profession');
                }
                if ($this->input->post('orgstatus_at_forum')) {
                    $manpower_update_arr['orgstatus_at_forum'] = $this->input->post('orgstatus_at_forum');
                }
                if ($this->input->post('education_qualification')) {
                    $manpower_update_arr['education_qualification'] = $this->input->post('education_qualification');
                }
                if ($this->input->post('type_of_profession')) {
                    $manpower_update_arr['type_of_profession'] = $this->input->post('type_of_profession');
                }
                if ($this->input->post('type_higher_education')) {
                    $manpower_update_arr['type_higher_education'] = $this->input->post('type_higher_education');
                }
                if ($this->input->post('mobile')) {
                    $manpower_update_arr['mobile'] = $this->input->post('mobile');
                }
                if ($this->input->post('opposition')) {
                    $manpower_update_arr['opposition'] = $this->input->post('opposition');
                }
                if ($this->input->post('date_death')) {
                    $manpower_update_arr['date_death'] = $this->sma->fsd($this->input->post('date_death'));
                }
                if ($this->input->post('higher_education_institution')) {
                    $manpower_update_arr['higher_education_institution'] = $this->input->post('higher_education_institution');
                }
                if ($this->input->post('email')) {
                    $manpower_update_arr['email'] = $this->input->post('email');
                }
                if ($this->input->post('foreign_country')) {
                    $manpower_update_arr['foreign_country'] = $this->input->post('foreign_country');
                }
                if ($this->input->post('foreign_address')) {
                    $manpower_update_arr['foreign_address'] = $this->input->post('foreign_address');
                }
                if ($this->input->post('how_death')) {
                    $manpower_update_arr['how_death'] = $this->input->post('how_death');
                }
                if ($this->input->post('myr_serial')) {
                    $manpower_update_arr['myr_serial'] = $this->input->post('myr_serial');
                }
                if ($this->input->post('note')) {
                    $manpower_update_arr['note'] = $this->input->post('note');
                }

                $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));



                if ($processid == 15) {

                    $data_newbranch_associate_log = array(
                        'process_date' => $date,
                        'manpower_id' => $manpowerid,
                        'in_out' => 1,
                        'user_id' => $this->session->userdata('user_id'),
                        'process_id' => $processid,
                        'branch' => $newbranchid,
                        'barnch_id_to_from' => $branchid,
                        'note' => $note
                    );

                    //log table
                    $this->manpower_model->insertData('associatelog', $data_newbranch_associate_log);

                    //associate table
                    $data_newbranch_associate = array(
                        'start_date' => $date,
                        'manpower_id' => $manpowerid,
                        'user_id' => $this->session->userdata('user_id'),
                        'branch' => $newbranchid
                    );
                    $this->manpower_model->insertData('associate', $data_newbranch_associate);
                } else if ($process_id == 12 && $manpower->orgstatus_id == 12) {


                    $candidatelog = array(
                        'process_date' =>  $date,
                        'in_out' => 2,
                        'process_id' => $processid,
                        'manpower_id' => $manpowerid,
                        'branch' => $branchid,
                        'user_id' => $this->session->userdata('user_id')
                    );
                    $this->site->insertData('member_candidatelog', $candidatelog);


                    //closeing mc from current branch
                    $candidate_info = array(
                        'end_date' =>  $date,
                        'is_member_candidate_now' => 2
                    );
                    $this->site->updateData('member_candidate', $candidate_info, array('is_member_candidate_now' => 1, 'branch' => $branchid, 'manpower_id' => $manpowerid));
                }



                $this->session->set_flashdata('message', 'Decreased successfully');
                admin_redirect("associate");
            } else {
                $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
                $this->data['modal_js'] = $this->site->modal_js();
                $this->data['manpower'] = $manpower;
                $this->data['process'] = $process;

                $this->data['branches'] = $this->site->getAllBranches();

                if ($process_id == 15)
                    if ($this->Owner || $this->Admin) {

                        $this->data['own_branch_id'] = NULL;
                        $this->data['own_branch'] = NULL;
                    } else {

                        $this->data['own_branch_id'] = $this->session->userdata('branch_id');
                        $this->data['own_branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
                    }


                $this->data['districts'] = $this->site->getAll('district');
                $this->data['responsibilities'] = $this->site->getAll('responsibilities');
                $this->data['countries'] = $this->site->getAll('countries');
                $this->data['targets'] = $this->site->getAll('profession_target');
                $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);


                $this->load->view($this->theme . 'associate/decrease/decrease_user', $this->data);
            }
        }
    }






    function associatepostpone($manpower_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');

        $manpower = $this->manpower_model->getManpowerByID($manpower_id);





        $this->form_validation->set_rules('date', lang("date"), 'required');
        $this->form_validation->set_rules('manpower_id', 'Associate', 'required|callback_check_associate[' . $this->input->post('branch_id') . ']');


        if ($this->form_validation->run() == true) {


            $is_changeable = $this->site->check_confirm($manpower->branch, date('Y-m-d'));


            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }



            $manpowerid = $this->input->post('manpower_id');
            $branchid = $this->input->post('branch_id');
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

            $postpone_member = array(
                'start_date' => $date,
                'branch' => $branchid,
                'manpower_id' => $manpowerid,
                'user_id' => $this->session->userdata('user_id'),
                'orgstatus_id' => 2
            );


            $postpone_member_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 1,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpowerid,
                'note' => $note,
                'orgstatus_id' => 2
            );
        } elseif ($this->input->post('associatepostpone')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('associate');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->insertData('postpone', $postpone_member) && $this->manpower_model->insertData('postponelog', $postpone_member_log)) {


            $manpower_update_arr = array();


            $manpower_update_arr['is_postpone'] = 1;

            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));


            $this->session->set_flashdata('message', 'Postponed successfully');
            admin_redirect("associate/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;



            $this->load->view($this->theme . 'associate/postpone/associatepostpone', $this->data);
        }
    }







    function associatepostponewithdraw($id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');

        $info = $this->site->getByID('postpone', 'id', $id);

        $manpower = $this->manpower_model->getManpowerByID($info->manpower_id);




        $this->form_validation->set_rules('date', lang("date"), 'required');


        if ($this->form_validation->run() == true) {
            $id = $this->input->post('id');
            $branchid = $info->branch;
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');


            $data_postpone = array(
                'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date)))
            );
            $postpone_where = array(
                'id' => $id
            );


            $postpone_associate_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 2,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpower->id,
                'note' => $note,
                'orgstatus_id' => 2
            );
        } elseif ($this->input->post('associatepostponewithdraw')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('associate');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('postpone', $data_postpone, $postpone_where) && $this->manpower_model->insertData('postponelog', $postpone_associate_log)) {


            $manpower_update_arr = array();


            $manpower_update_arr['is_postpone'] = 0;

            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower->id));


            $this->session->set_flashdata('message', 'Postpone withdrawn successfully');
            admin_redirect("associate/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
            $this->data['info'] = $info;


            $this->load->view($this->theme . 'associate/postpone/associatepostponewithdraw', $this->data);
        }
    }






    function check_associate($member_id, $branch)
    {


        $info = $this->site->getcolumn('postpone', 'id', array('manpower_id' => $member_id, 'orgstatus_id' => 2, 'end_date' => '2050-12-31', 'branch' => $branch), 'id DESC', 1, 0);


        if ($info != NULL) {
            $this->form_validation->set_message('check_associate', 'Already postponed!');
            return false;
        } else {

            return true;
        }
    }




    /* ------------------------------------------------------- */

    function add($id = NULL)
    {


        //   $this->sma->print_arrays($_POST, $_GET);

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        $this->load->admin_model('organization_model');

        $branches = $this->site->getAllBranches();

        $this->form_validation->set_rules('date', 'Oath date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('sessionyear', 'sessionyear', 'required');
        //$this->form_validation->set_rules('education', 'education', 'required');
        $this->form_validation->set_rules('studentlife', 'studentlife', 'required');



        //$this->sma->print_arrays($lastassocode);
        //$this->sma->print_arrays($branchcode);		

        if ($this->form_validation->run() == true) {

            $branchinfo = $this->site->getOneRecord('branches', '*', array('id' => $this->input->post('branch')));




            $is_changeable = $this->site->check_confirm($this->input->post('branch'), date('Y-m-d'));

            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }


            // $this->sma->print_arrays($branchinfo->last_assocode);

            //new manpower
            $data = array(
                'associate_oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'branch' => $this->input->post('branch'),
                'sessionyear' => $this->input->post('sessionyear'),
                'responsibility_id' => $this->input->post('responsibility_id'),
                'studentlife' => $this->input->post('studentlife'),
                //'education' => $this->input->post('education'),
                'name' => $this->input->post('name'),
                'orgstatus_id' => 2,
                'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
                'user_id' => $this->session->userdata('user_id'),
                // 'notes' => $this->input->post('notes'),
                'associatecode' => sprintf('%03d', $branchinfo->code) . sprintf('%04d', $branchinfo->last_assocode + 1),
                'blood_group' => $this->input->post('blood_group'),
                'thana_code' => $this->input->post('thana_code'),
                'institution_type_child' => $this->input->post('institution_type_child'),

            );





            if ($this->input->post('prossion_target_id')) {
                $prossion_target = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_id')), 'id desc', 1, 0);
                $data['prossion_target_id'] = $this->input->post('prossion_target_id');
                $data['prossion_target'] = $prossion_target;
            }

            if ($this->input->post('prossion_target_sub_it')) {
                $prossion_target_sub = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_sub_it')), 'id desc', 1, 0);
                $data['prossion_target_sub_it'] = $this->input->post('prossion_target_sub_it');
                $data['prossion_target_sub'] = $prossion_target_sub;
            }



            if ($this->input->post('institution_type')) {
                $data['institution_type'] = $this->input->post('institution_type');
            }
            if ($this->input->post('subject')) {
                $data['subject'] = $this->input->post('subject');
            }







            $data['single_digit'] = $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0;
            $data['jsc_jdc'] = $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0;
            $data['ssc_dhakil'] = $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0;
            $data['hsc_alim'] = $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0;
            $data['department_position'] = $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0;
            $data['department_position_private'] = $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0;
            $data['influential'] = $this->input->post('member_influential') ? $this->input->post('member_influential') : 0;
            $data['hc_science'] = $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0;
            $data['madrasha'] = $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0;
            $data['medical_college'] = $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0;
            $data['ideal_college'] = $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0;
            $data['engineeering'] = $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0;
            $data['agri'] = $this->input->post('member_agri') ? $this->input->post('member_agri') : 0;
            $data['science'] = $this->input->post('member_science') ? $this->input->post('member_science') : 0;
            $data['business'] = $this->input->post('member_business') ? $this->input->post('member_business') : 0;
            $data['arts'] = $this->input->post('member_arts') ? $this->input->post('member_arts') : 0;





            $manpower_id = $this->site->insertData('manpower', $data, 'id');


            //new associate
            $assodata = array(
                'branch' => $this->input->post('branch'),
                'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'start_date' => $this->sma->fsd($this->input->post('date')),
                'manpower_id' => $manpower_id,
                'user_id' => $this->session->userdata('user_id')
            );
            $return_id = $this->site->insertData('associate', $assodata, 'id');



            //assolog
            $assolog = array(
                'branch' => $this->input->post('branch'),
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'process_id' => 2,
                'manpower_id' => $manpower_id,
                'user_id' => $this->session->userdata('user_id'),
                'note' => $this->input->post('notes'),
                'institution_id' => $this->input->post('institution_type_id') ? $this->input->post('institution_type_id') : 0,
                'asso_single_digit' => $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0,
                'asso_jsc_jdc' => $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0,
                'asso_ssc_dhakil' => $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0,
                'asso_hsc_alim' => $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0,
                'asso_department_position' => $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0,
                'asso_department_position_private' => $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0,
                'asso_influential' => $this->input->post('member_influential') ? $this->input->post('member_influential') : 0,
                'asso_hc_science' => $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0,
                'asso_madrasha' => $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0,
                'asso_medical_college' => $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0,
                'asso_ideal_college' => $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0,
                'asso_engineeering' => $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0,
                'asso_agri' => $this->input->post('member_agri') ? $this->input->post('member_agri') : 0,
                'asso_science' => $this->input->post('member_science') ? $this->input->post('member_science') : 0,
                'asso_business' => $this->input->post('member_business') ? $this->input->post('member_business') : 0,
                'asso_arts' => $this->input->post('member_arts') ? $this->input->post('member_arts') : 0

            );
            $return_id = $this->site->insertData('associatelog', $assolog, 'id');


            $this->site->updateData('branches', array('last_assocode' => $branchinfo->last_assocode + 1), array('id' => $this->input->post('branch')));


            $this->session->set_flashdata('message', 'Added');
            admin_redirect('associate');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['districts'] = $this->site->getAll('district');
            $this->data['responsibilities'] = $this->site->getAll('responsibilities');

            $this->data['targets'] = $this->site->getAll('profession_target');
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);
            $this->data['institutions'] = $this->organization_model->getAllInstitution(1);

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('associate'), 'page' => 'Associate'), array('link' => '#', 'page' => 'Associate Improve'));
            $meta = array('page_title' => 'Associate Improve', 'bc' => $bc);

            // $this->sma->print_arrays(1111);


            $this->page_construct('associate/associate/improve', $meta, $this->data, 'leftmenu/manpower');
        }
    }

    function suggestions($id = null)
    {


        if ($id != null)
            $this->sma->send_json(array('id' => 1, 'text' => 'Mong'));

        $term = $this->input->get('term', TRUE);

        if (strlen($term) < 1 || !$term) {
            //  die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->manpower_model->getManpowerNames($term);


        if ($rows) {
            foreach ($rows as $row) {
                $pr[] = array('id' => $row->id, 'text' => $row->name . '(' . $row->associatecode . ')');
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'text' => 'Not found')));
        }
    }




    function get_suggestions()
    {
        $term = $this->input->get('term', TRUE);
        if (strlen($term) < 1 || !$term) {
            die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->products_model->getProductsForPrinting($term);
        if ($rows) {
            foreach ($rows as $row) {
                $variants = $this->products_model->getProductOptions($row->id);
                $pr[] = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'name' => $row->name, 'price' => $row->price, 'qty' => 1, 'variants' => $variants);
            }
            $this->sma->send_json($pr);
        } else {
            $this->sma->send_json(array(array('id' => 0, 'label' => lang('no_match_found'), 'value' => $term)));
        }
    }

    function addByAjax()
    {
        if (!$this->sma->checkPermissions('add')) {
            exit(json_encode(array('msg' => lang('access_denied'))));
        }
        if ($this->input->get('token') && $this->input->get('token') == $this->session->userdata('user_csrf') && $this->input->is_ajax_request()) {
            $product = $this->input->get('product');
            if (!isset($product['code']) || empty($product['code'])) {
                exit(json_encode(array('msg' => lang('product_code_is_required'))));
            }
            if (!isset($product['name']) || empty($product['name'])) {
                exit(json_encode(array('msg' => lang('product_name_is_required'))));
            }
            if (!isset($product['category_id']) || empty($product['category_id'])) {
                exit(json_encode(array('msg' => lang('product_category_is_required'))));
            }
            if (!isset($product['unit']) || empty($product['unit'])) {
                exit(json_encode(array('msg' => lang('product_unit_is_required'))));
            }
            if (!isset($product['price']) || empty($product['price'])) {
                exit(json_encode(array('msg' => lang('product_price_is_required'))));
            }
            if (!isset($product['cost']) || empty($product['cost'])) {
                exit(json_encode(array('msg' => lang('product_cost_is_required'))));
            }
            if ($this->products_model->getProductByCode($product['code'])) {
                exit(json_encode(array('msg' => lang('product_code_already_exist'))));
            }
            if ($row = $this->products_model->addAjaxProduct($product)) {
                $tax_rate = $this->site->getTaxRateByID($row->tax_rate);
                $pr = array('id' => $row->id, 'label' => $row->name . " (" . $row->code . ")", 'code' => $row->code, 'qty' => 1, 'cost' => $row->cost, 'name' => $row->name, 'tax_method' => $row->tax_method, 'tax_rate' => $tax_rate, 'discount' => '0');
                $this->sma->send_json(array('msg' => 'success', 'result' => $pr));
            } else {
                exit(json_encode(array('msg' => lang('failed_to_add_product'))));
            }
        } else {
            json_encode(array('msg' => 'Invalid token'));
        }
    }


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



        $this->form_validation->set_rules('date', 'Oath date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('sessionyear', 'sessionyear', 'required');
        $this->form_validation->set_rules('education', 'education', 'required');
        $this->form_validation->set_rules('studentlife', 'studentlife', 'required');





        if ($this->form_validation->run() == true) {

            $data = array(

                'associate_oath_date' =>  $this->sma->fsd($this->input->post('date')),

                'sessionyear' => $this->input->post('sessionyear'),
                'responsibility_id' => $this->input->post('responsibility_id'),
                'studentlife' => $this->input->post('studentlife'),
                'education' => $this->input->post('education'),
                'name' => $this->input->post('name'),

                'district' => $this->input->post('district')
            );
        }
        // $this->sma->print_arrays($data,$_POST);
        if ($this->form_validation->run() == true && $this->manpower_model->updateManpower($id, $data)) {


            $data_update = array(
                'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'start_date' =>  $this->sma->fsd($this->input->post('date')),
            );
            $this->site->updateData('associate', $data_update, array('manpower_id' => $id, 'branch' => $manpower->branch));

            $data_update = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date'))
            );
            $this->site->updateData('associatelog', $data_update, array('manpower_id' => $id, 'branch' => $manpower->branch));



            $this->session->set_flashdata('message', lang("manpower_updated"));

            admin_redirect('associate');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;

            $this->data['districts'] = $this->site->getAll('district');
            $this->data['responsibilities'] = $this->site->getAll('responsibilities');


            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('associate'), 'page' => 'Associate'), array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('associate/associate/edit', $meta, $this->data);
        }
    }

    /* ---------------------------------------------------------------- */

    function import_csv()
    {
        $this->sma->checkPermissions('csv');
        $this->load->helper('security');
        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');

        if ($this->form_validation->run() == true) {

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'csv';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect("products/import_csv");
                }

                $csv = $this->upload->file_name;

                $arrResult = array();
                $handle = fopen($this->digital_upload_path . $csv, "r");
                if ($handle) {
                    while (($row = fgetcsv($handle, 5000, ",")) !== FALSE) {
                        $arrResult[] = $row;
                    }
                    fclose($handle);
                }
                $titles = array_shift($arrResult);
                $updated = 0;
                $items = array();
                foreach ($arrResult as $key => $value) {
                    $item = [
                        'name'              => isset($value[0]) ? trim($value[0]) : '',
                        'code'              => isset($value[1]) ? trim($value[1]) : '',
                        'barcode_symbology' => isset($value[2]) ? mb_strtolower(trim($value[2]), 'UTF-8') : '',
                        'brand'             => isset($value[3]) ? trim($value[3]) : '',
                        'category_code'     => isset($value[4]) ? trim($value[4]) : '',
                        'unit'              => isset($value[5]) ? trim($value[5]) : '',
                        'sale_unit'         => isset($value[6]) ? trim($value[6]) : '',
                        'purchase_unit'     => isset($value[7]) ? trim($value[7]) : '',
                        'cost'              => isset($value[8]) ? trim($value[8]) : '',
                        'price'             => isset($value[9]) ? trim($value[9]) : '',
                        'alert_quantity'    => isset($value[10]) ? trim($value[10]) : '',
                        'tax_rate'          => isset($value[11]) ? trim($value[11]) : '',
                        'tax_method'        => isset($value[12]) ? (trim($value[12]) == 'exclusive' ? 1 : 0) : '',
                        'image'             => isset($value[13]) ? trim($value[13]) : '',
                        'subcategory_code'  => isset($value[14]) ? trim($value[14]) : '',
                        'variants'          => isset($value[15]) ? trim($value[15]) : '',
                        'cf1'               => isset($value[16]) ? trim($value[16]) : '',
                        'cf2'               => isset($value[17]) ? trim($value[17]) : '',
                        'cf3'               => isset($value[18]) ? trim($value[18]) : '',
                        'cf4'               => isset($value[19]) ? trim($value[19]) : '',
                        'cf5'               => isset($value[20]) ? trim($value[20]) : '',
                        'cf6'               => isset($value[21]) ? trim($value[21]) : '',
                        'hsn_code'          => isset($value[22]) ? trim($value[22]) : '',
                        'second_name'       => isset($value[23]) ? trim($value[23]) : '',
                    ];

                    if ($catd = $this->products_model->getCategoryByCode($item['category_code'])) {
                        $tax_details = $this->products_model->getTaxRateByName($item['tax_rate']);
                        $prsubcat = $this->products_model->getCategoryByCode($item['subcategory_code']);
                        $brand = $this->products_model->getBrandByName($item['brand']);
                        $unit = $this->products_model->getUnitByCode($item['unit']);
                        $base_unit = $unit ? $unit->id : NULL;
                        $sale_unit = $base_unit;
                        $purcahse_unit = $base_unit;
                        if ($base_unit) {
                            $units = $this->site->getUnitsByBUID($base_unit);
                            foreach ($units as $u) {
                                if ($u->code == $item['sale_unit']) {
                                    $sale_unit = $u->id;
                                }
                                if ($u->code == $item['purchase_unit']) {
                                    $purcahse_unit = $u->id;
                                }
                            }
                        } else {
                            $this->session->set_flashdata('error', lang("check_unit") . " (" . $item['unit'] . "). " . lang("unit_code_x_exist") . " " . lang("line_no") . " " . ($key + 1));
                            admin_redirect("products/import_csv");
                        }

                        unset($item['category_code'], $item['subcategory_code']);
                        $item['unit'] = $base_unit;
                        $item['sale_unit'] = $sale_unit;
                        $item['category_id'] = $catd->id;
                        $item['purchase_unit'] = $purcahse_unit;
                        $item['brand'] = $brand ? $brand->id : NULL;
                        $item['tax_rate'] = $tax_details ? $tax_details->id : NULL;
                        $item['subcategory_id'] = $prsubcat ? $prsubcat->id : NULL;

                        if ($product = $this->products_model->getProductByCode($item['code'])) {
                            if ($product->type == 'standard') {
                                if ($item['variants']) {
                                    $vs = explode('|', $item['variants']);
                                    foreach ($vs as $v) {
                                        $variants[] = ['product_id' => $product->id, 'name' => trim($v)];
                                    }
                                }
                                unset($item['variants']);
                                if ($this->products_model->updateProduct($product->id, $item, null, null, null, null, $variants)) {
                                    $updated++;
                                }
                            }
                            $item = false;
                        }
                    } else {
                        $this->session->set_flashdata('error', lang("check_category_code") . " (" . $item['category_code'] . "). " . lang("category_code_x_exist") . " " . lang("line_no") . " " . ($key + 1));
                        admin_redirect("products/import_csv");
                    }

                    if ($item) {
                        $items[] = $item;
                    }
                }
            }

            // $this->sma->print_arrays($items);
        }

        if ($this->form_validation->run() == true && !empty($items)) {
            if ($this->products_model->add_products($items)) {
                $updated = $updated ? '<p>' . sprintf(lang("products_updated"), $updated) . '</p>' : '';
                $this->session->set_flashdata('message', sprintf(lang("products_added"), count($items)) . $updated);
                admin_redirect('products');
            }
        } else {
            if (isset($items) && empty($items)) {
                if ($updated) {
                    $this->session->set_flashdata('message', sprintf(lang("products_updated"), $updated));
                    admin_redirect('products');
                } else {
                    $this->session->set_flashdata('warning', lang('csv_issue'));
                }
                admin_redirect('products/import_csv');
            }

            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['userfile'] = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userfile')
            );

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('products'), 'page' => lang('products')), array('link' => '#', 'page' => lang('import_products_by_csv')));
            $meta = array('page_title' => lang('import_products_by_csv'), 'bc' => $bc);
            $this->page_construct('products/import_csv', $meta, $this->data);
        }
    }


    /* ------------------------------------------------------------------------------- */

    function delete($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        admin_redirect('associate');
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

    function view($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

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


    function associateincreaseexport($process_id, $branch = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
            // $this->session->set_flashdata('warning', lang('access_denied'));
            // redirect($_SERVER["HTTP_REFERER"]);
        }






        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        $process = $this->site->getByID('process', 'id', $process_id);

        $type =  $this->input->get('type');
        $report_type = $this->report_type();
        $start = $report_type['start'];
        $end = $report_type['end'];

        // $field_arr = array('education','associatecode','member_oath_date','associate_oath_date','district','institution_type','subject','prossion_target','prossion_target_sub','education_institution','is_forum','current_profession','orgstatus_at_forum','education_qualification','type_of_profession','type_higher_education','mobile','opposition','date_death','higher_education_institution','email','foreign_country','foreign_address','myr_serial','how_death');

        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,barnch_id_to_from, thana_code,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name, {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
            ->from('associatelog')
            ->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
            ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1)
            ->join('branches', 'branches.id=associatelog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.associate_oath_date ASC');

        $this->db->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');


        if ($branch_id)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);


        $q = $this->db->get();


        //echo $q->num_rows();
        //echo 'AAAA';
        //exit();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        //    $this->sma->print_arrays($data);

        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Associate Increase list');

            // bbbbbb

            switch ($process_id) {
                case 2:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'institution_type',
                        'sessionyear',
                        'subject',
                        'responsibility',
                        'associate_oath_date',
                        'prossion_target',
                        'prossion_target_sub',
                        'studentlife',
                        'district',
                        'upazilla_name',
                    );
                    break;
                case 15:



                    $field_arr = array(
                        'associatecode',
                        'name',
                        'associate_oath_date',
                        'branch_name',
                        'thana_code',
                        'institution_type',
                        'sessionyear',
                        'responsibility',
                        'prossion_target',
                        'prossion_target_sub',
                        'barnch_id_to_from',
                        'district',
                    );
                    break;

                default:
                    # code...
                    break;
            }

            //  for cellValue 


            $branch_id = $branch ? $branch->id : lang('all_branches');
            $process_name = $process ? $process->process : '';
            $process_Title = 'সাথী বৃদ্ধি : ' . $process_name;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            $filename = (isset($branch->code) ? $branch->code : '') . 'associate_increase_report_' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');



            //   $this->sma->print_arrays($process);


            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function associatedecreaseexport($process_id, $branch = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
            //  $this->session->set_flashdata('warning', lang('access_denied'));
            // redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];

        $process = $this->site->getByID('process', 'id', $process_id);

        // $field_arr = array('education','associatecode','member_oath_date','associate_oath_date','district','institution_type','subject','prossion_target','prossion_target_sub','education_institution','is_forum','current_profession','orgstatus_at_forum','education_qualification','type_of_profession','type_higher_education','mobile','opposition','date_death','higher_education_institution','email','foreign_country','foreign_address','myr_serial','how_death');

        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,barnch_id_to_from, thana_code,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district, upazilla.name AS upazilla_name, {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
            ->from('associatelog')
            ->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
            ->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2)
            ->join('branches', 'branches.id=associatelog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.associate_oath_date ASC');

        $this->db->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        if ($branch_id)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);


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
            $this->excel->getActiveSheet()->setTitle('Associate Decrease list');

            switch ($process_id) {
                case 8:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'responsibility',
                        'orgstatus_at_forum',
                        'education_qualification',
                        'mobile',
                        'current_profession',
                        'district',
                        'upazilla_name'
                    );
                    break;
                case 15:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'institution_type',
                        'sessionyear',
                        'barnch_id_to_from',
                    );
                    break;
                case 12:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',

                        'responsibility',
                        'orgstatus_at_forum',
                        'education_qualification',
                        'mobile',
                        'current_profession',
                        'district'
                    );
                    break;


                case 11:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'foreign_country',
                        'higher_education_institution',
                        'type_higher_education',
                        'responsibility',
                        'email',
                        'mobile',
                        'is_forum',

                    );
                    break;
                case 14:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'foreign_country',
                        'foreign_address',
                        'type_of_profession',
                        'responsibility',
                        'mobile',
                        'is_forum',
                    );
                    break;
                case 9:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'date_death',
                        'how_death',
                        'responsibility',
                    );
                    break;
                case 10:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'opposition',
                        'myr_serial',
                        'date_death',
                        'responsibility',
                    );
                    break;

                case 18:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'thana_code',
                        'institution_type',
                        'sessionyear',
                        'subject',
                        'responsibility',
                    );
                    break;

                default:
                    # code...
                    break;
            }

            //  for cellValue 
            $branch_id = $branch ? $branch->id : lang('all_branches');
            $process_name = $process ? $process->process : '';
            $process_Title = 'সাথী ঘাটতি : ' . $process_name;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            $filename = (isset($branch->code) ? $branch->code : '') . 'associate_decrease_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function getPrev($report_type, $last_year, $branch_id = NULL)
    {


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
            FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

        else
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
            FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));


        return $result;
    }



    function calculate($data, $process_id, $in_out, $return)
    {

        if ($data)
            foreach ($data as $row) {
                if ($row->in_out == $in_out && $row->process_id == $process_id)
                    return isset($row->{$return}) ? $row->{$return} : 0;
            }

        return 0;
    }


    function export($branch = NULL)
    {
        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->sma->checkPermissions('index', TRUE);



        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('associate')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name,   {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death,institution_type_child,
                thana_code,	
                blood_group,
                single_digit,
                jsc_jdc,
                ssc_dhakil,
                hsc_alim,
                department_position,
                department_position_private,
                influential,
                hc_science,
                madrasha,
                medical_college,
                ideal_college,
                engineeering,
                agri,
                science,
                business,
                arts", FALSE)
            ->from('associate')
            ->join('manpower', 'manpower.id=associate.manpower_id', 'left')
            ->join('branches', 'branches.id=associate.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.associate_oath_date ASC');


        $this->db->where($this->db->dbprefix('associate') . ".is_associate_now", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);

        $this->db->where($this->db->dbprefix('associate') . ".is_associate_now", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);

        $q = $this->db->get();



        

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            if (!empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Associate list');

                // $this->sma->print_arrays($data);

                //aaaa
                $field_arr = array(
                    'associatecode',
                    'name',
                    'branch_name',
                    'institution_type',
                    'institution_type_child',
                    'sessionyear',
                    'subject',
                    'responsibility',
                    'associate_oath_date',
                    'prossion_target',
                    'prossion_target_sub',
                    'studentlife',
                    'district',
                    'upazilla_name',
                    'thana_code',
                    'blood_group',
                    'single_digit',
                    'jsc_jdc',
                    'ssc_dhakil',
                    'hsc_alim',
                    'department_position',
                    'department_position_private',
                    'influential',
                    'hc_science',
                    'madrasha',
                    'medical_college',
                    'ideal_college',
                    'engineeering',
                    'agri',
                    'science',
                    'business',
                    'arts'
                );

                //  for cellValue 

                // $this->sma->print_arrays($data);

                $process_Title = 'সাথী তালিকা';

                $in_out='';

                $this->sheetcellValue($branch, $field_arr, $data, $process_Title, $in_out);

                $filename = 'associate_list' . '_' . $this->input->get('year') . ($branch ? '_' . $branch : '');

                $this->load->helper('excel');


               
             //   $this->sma->print_arrays( $data);

               create_excel($this->excel, $filename);
            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }


    function exportpostpone1($branch = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
            // $this->session->set_flashdata('warning', lang('access_denied'));
            // redirect($_SERVER["HTTP_REFERER"]);
        }

        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Associate list');

            // $this->sma->print_arrays($data);

            //aaaa
            $field_arr = array(
                'associatecode',
                'name',
                'branch_name',
                'institution_type',
                'institution_type_child',
                'sessionyear',
                'subject',
                'responsibility',
                'associate_oath_date',
                'prossion_target',
                'prossion_target_sub',
                'studentlife',
                'district',
                'thana_code',
                'blood_group',
                'single_digit',
                'jsc_jdc',
                'ssc_dhakil',
                'hsc_alim',
                'department_position',
                'department_position_private',
                'influential',
                'hc_science',
                'madrasha',
                'medical_college',
                'ideal_college',
                'engineeering',
                'agri',
                'science',
                'business',
                'arts'
            );

            //  for cellValue 

            // $this->sma->print_arrays($data);

            $process_Title = 'সাথী তালিকা';

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            $filename = 'associate_list' . '_' . $this->input->get('year') . ($branch ? '_' . $branch : '');

            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function exportpostpone($branch = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if (!$this->Owner) {
            // $this->session->set_flashdata('warning', lang('access_denied'));
            // redirect($_SERVER["HTTP_REFERER"]);
        }


        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = $branch;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            $branch_id = $branch;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }





        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
            ->from('postpone')
            ->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
            ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 2)
            ->join('branches', 'branches.id=postpone.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('postpone.id ASC');

        //  $this->db->where($this->db->dbprefix('postpone') . ".end_date", '2050-12-31');
        // $this->db->where($this->db->dbprefix('manpower') . ".orgstatus_id", 1);

        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);


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
            $this->excel->getActiveSheet()->setTitle('Postpone list');


            //eeee

            $field_arr = array(
                'associatecode',
                'name',
                'branch_name',
                // 'institution_type',
                'sessionyear',
                'responsibility',
                'studentlife',
            );

            //  for cellValue 
            $process_Title = 'সাথী মুলতবি';

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            $filename = (isset($branch->code) ? $branch->code : '') . 'postpone_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }






    function sum_manpower($data, $field)
    {
        $sum = 0;
        if (is_array($data)) {
            foreach ($data as $row) {
                $sum += isset($row[$field]) ? $row[$field] : 0;
            }
        }

        return $sum;
    }



    function detailupdate()
    {
        $this->sma->checkPermissions('index', TRUE);
        $report_type = $this->report_type();
        $flag = 1;
        if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
            $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
            $flag = 2;  //update
        } elseif ($this->input->get_post('branch_id')) {
            $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'),   'date' => date('Y-m-d')));
            $flag = 3;  //new entry

        }
        echo json_encode(array('flag' => $flag, 'msg' => ''));
        exit;
    }

    function getName($id = NULL)
    {

        $row = $this->site->getByID('manpower', 'id', $id);
        $this->sma->send_json(array(array('id' => $row->id, 'text' => $row->name . '(' . $row->associatecode . ')')));
    }
}
