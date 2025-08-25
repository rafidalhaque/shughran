<?php defined('BASEPATH') or exit('No direct script access allowed');

class Membercandidate extends MY_Controller
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
            admin_redirect('membercandidate/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('membercandidate/' . $this->session->userdata('branch_id'));
        }



        //$this->manpower_model->manpowerUpdate('manpower',array('orgstatus_id'=>NULL),array('id'=>1)); 



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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Membercandidate'));
        $meta = array('page_title' => 'Membercandidate', 'bc' => $bc);
        $this->page_construct('membercandidate/membercandidate', $meta, $this->data, 'leftmenu/manpower');
    }



    public function newName($field, $in_out = null)
    {
        switch ($field) {
            case 'barnch_id_to_from':
                $field = ($in_out == 1) ? 'শাখা হতে' : 'স্থানান্তরিত শাখা';
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
                $field = 'উপজেলা/থানা';
                break;
            case 'oath_date':
                $field = 'সদস্যপ্রার্থী হওয়ার তারিখ';
                break;
            case 'membercandidate_oath_date':
                $field = 'সদস্যপ্রার্থী হওয়ার তারিখ';
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



    function getvalue($value, $array, $field)
    {


        foreach ($array as $row) {

            if ($row->id == $value)
                return $row->{$field};
        }


        return '';
    }




    public function sheetcellValue($branch = null, $field_arr = null, $data = null, $process_Title = null, $in_out = null)
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
            $newName = $this->newName($field, $in_out);
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









    function membercandidateincreaselist($process_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        $branch_id = $this->input->get('branch_id');
        $process = $this->site->getByID('process', 'id', $process_id);


        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $this->data['report_info'] = $report_type;


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('membercandidate/membercandidateincreaselist/' . $process_id . '?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('membercandidate/membercandidateincreaselist/' . $process_id . '?branch_id=' . $this->session->userdata('branch_id'));
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

        // $this->sma->print_arrays(3333);

        $this->data['process'] = $process;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Membercandidate increase list'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('membercandidate/membercandidate/increase', $meta, $this->data, 'leftmenu/manpower');
    }



    function getIncreaseMembercandidate($process_id, $branch_id = NULL)
    {

        



        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }


        $report_type = $this->report_type();

        $this->load->library('datatables');



        if ($branch_id) {

            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('member_candidatelog');
            $this->datatables->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
                ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=member_candidatelog.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('member_candidatelog');
            $this->datatables->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
                ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=member_candidatelog.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }




        $start = $report_type['start'];
        $end = $report_type['end'];



        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');


        echo $this->datatables->generate();
    }






    function membercandidatedecreaselist($process_id = NULL)
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



        $this->data['process'] = $process;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('membercandidate/membercandidate/decrease', $meta, $this->data, 'leftmenu/manpower');
    }



    function getDecreaseMembercandidate($process_id, $branch_id = NULL)
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
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('member_candidatelog');
            $this->datatables->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
                ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 2);
            $this->datatables->join('branches', 'branches.id=member_candidatelog.branch', 'left')
                ->where('branches.id', $branch_id)->where('manpower.is_pending !=', 1)->where('manpower.is_studentship_pending !=', 1);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('member_candidatelog');
            $this->datatables->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
                ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 2)->where('manpower.is_pending !=', 1)->where('manpower.is_studentship_pending !=', 1);
            $this->datatables->join('branches', 'branches.id=member_candidatelog.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }




        $start = $report_type['start'];
        $end = $report_type['end'];




        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');



        echo $this->datatables->generate();
    }



    function postponelist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('membercandidate/postponelist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('membercandidate/postponelist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('membercandidate'), 'page' => 'membercandidate'), array('link' => '#', 'page' => 'Postpone'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('membercandidate/postpone/postponelist', $meta, $this->data, 'leftmenu/manpower');
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
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 12);
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 12);
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }









        $this->datatables->add_column("Postpone", "<a class=\"tip\" title='" . 'Postpone' . "' href='" . admin_url('membercandidate/membercandidatepostponewithdraw/$1') . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-minus\"></i></a>", "id");
        // $this->datatables->unset_column("manpowerid"); 
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }








    function getMembercandidate($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('membercandidate/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_manpower') . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('manpowerlist/edit/$1/12') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';

        $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>
            </ul>
        </div></div>';

        $process_list = array(
            8 => 'ছাত্রত্ব শেষ',
            15 => 'স্থানান্তর',
            12 => 'ফরম বাতিল',
            11 => 'উচ্চ শিক্ষা',
            14 => 'বিদেশে চাকুরি',
            9 => 'ইন্তেকাল',
            10 => 'শাহাদাৎ'
        );

        $li = "";
        foreach ($process_list as $key => $process) {

            $li .= "<li><a class=\"tip\" title='" . $process . "' href='" . admin_url('membercandidate/membercandidatedecrease/$1/' . $key) . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-edit\"></i>" . $process . "</a></li>";
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
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('member_candidate');
            $this->datatables->join('manpower', 'manpower.id=member_candidate.manpower_id', 'left')
                ->where('member_candidate.is_member_candidate_now', 1);
            $this->datatables->join('branches', 'branches.id=member_candidate.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('member_candidate');
            $this->datatables->join('manpower', 'manpower.id=member_candidate.manpower_id', 'left')
                ->where('member_candidate.is_member_candidate_now', 1);
            $this->datatables->join('branches', 'branches.id=member_candidate.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }








        $this->datatables->add_column("Decrease", $decrease_button, "manpowerid");
        //  $this->datatables->add_column("Postpone", "<a class=\"tip  btn btn-default btn-xs btn-primary\" title='" . 'Postpone' . "' href='" . admin_url('membercandidate/membercandidatepostpone/$1') . "' data-toggle='modal' data-target='#myModal'>মূলতবী <i class=\"fa fa-minus\"></i></a>", "manpowerid");
        $this->datatables->add_column("Actions", $action, "manpowerid");

        echo $this->datatables->generate();
    }




    function membercandidatedecrease($manpower_id = NULL, $process_id = NULL)
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
            $this->data['msg'] = 'His status is still pending.';
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



                //closeing mc from current branch
                $data_membercandidate = array(
                    'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
                    'is_member_candidate_now' => 2
                );
                $membercandidate_where = array(
                    'manpower_id' => $manpowerid,
                    'branch' => $branchid
                );


                //saving log for current branch out
                $data_membercandidate_log = array(
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
                        'orgstatus_id' => 12,
                        'process_date' => $date
                    );



                    $this->manpower_model->insertData('manpower_transfer', $data_newbranch_member_log);

                    $this->session->set_flashdata('message', 'Notification for transfer has been sent');
                    admin_redirect("membercandidate".( $this->session->userdata('branch_id') ? '/'.$this->session->userdata('branch_id') : ''));

                    //admin_redirect("membercandidate");
                } else if ( in_array($process_id, array( 8, 11, 14 )) ){


                    


                    $update_8_11_14 = array();
                    // if ($this->input->post('sessionyear')) {
                    //     $update_8['sessionyear'] = $this->input->post('sessionyear');
                    // }
                    if ($this->input->post('institution_type')) {
                        $update_8_11_14['institution_type'] = $this->input->post('institution_type');
                    }


                    if ($this->input->post('caretaker_contact_status')) {
                        $update_8_11_14['caretaker_contact_status'] = $this->input->post('caretaker_contact_status');
                    }

                    if ($this->input->post('masters_complete_status')) {
                        $update_8_11_14['masters_complete_status'] = $this->input->post('masters_complete_status');
                    }



                    if ($this->input->post('prossion_target_id')) {
                        $prossion_target = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_id')), 'id desc', 1, 0);
                        $update_8_11_14['prossion_target_id'] = $this->input->post('prossion_target_id');
                        $update_8_11_14['prossion_target'] = $prossion_target;
                    }

                    if ($this->input->post('prossion_target_sub_it')) {
                        $prossion_target_sub = $this->site->getcolumn('profession_target', 'name', array('id' => $this->input->post('prossion_target_sub_it')), 'id desc', 1, 0);
                        $update_8_11_14['prossion_target_sub_it'] = $this->input->post('prossion_target_sub_it');
                        $update_8_11_14['prossion_target_sub'] = $prossion_target_sub;
                    }

                    if ($this->input->post('sessionyear')) {
                        $update_8_11_14['sessionyear'] = $this->input->post('sessionyear');
                    }

                    if ($this->input->post('responsibility_id')) {
                        $update_8_11_14['responsibility_id'] = $this->input->post('responsibility_id');
                    }

                    if ($this->input->post('studentlife')) {
                        $update_8_11_14['studentlife'] = $this->input->post('studentlife');
                    }

                    if ($this->input->post('education')) {
                        $update_8_11_14['education'] = $this->input->post('education');
                    }

                    if ($this->input->post('district')) {
                        $update_8_11_14['district'] = $this->input->post('district');
                    }
                    if ($this->input->post('institution_type')) {
                        $update_8_11_14['institution_type'] = $this->input->post('institution_type');
                    }
                    if ($this->input->post('subject')) {
                        $update_8_11_14['subject'] = $this->input->post('subject');
                    }
                    if ($this->input->post('education_institution')) {
                        $update_8_11_14['education_institution'] = $this->input->post('education_institution');
                    }
                    if ($this->input->post('is_forum')) {
                        $update_8_11_14['is_forum'] = $this->input->post('is_forum');
                    }
                    if ($this->input->post('current_profession')) {
                        $update_8_11_14['current_profession'] = $this->input->post('current_profession');
                    }
                    if ($this->input->post('orgstatus_at_forum')) {
                        $update_8_11_14['orgstatus_at_forum'] = $this->input->post('orgstatus_at_forum');
                    }
                    if ($this->input->post('education_qualification')) {
                        $update_8_11_14['education_qualification'] = $this->input->post('education_qualification');
                    }
                    if ($this->input->post('type_of_profession')) {
                        $update_8_11_14['type_of_profession'] = $this->input->post('type_of_profession');
                    }
                    if ($this->input->post('type_higher_education')) {
                        $update_8_11_14['type_higher_education'] = $this->input->post('type_higher_education');
                    }
                    if ($this->input->post('mobile')) {
                        $update_8_11_14['mobile'] = $this->input->post('mobile');
                    }
                    if ($this->input->post('opposition')) {
                        $update_8_11_14['opposition'] = $this->input->post('opposition');
                    }
                    if ($this->input->post('date_death')) {
                        $update_8_11_14['date_death'] = $this->sma->fsd($this->input->post('date_death'));
                    }
                    if ($this->input->post('higher_education_institution')) {
                        $update_8_11_14['higher_education_institution'] = $this->input->post('higher_education_institution');
                    }
                    if ($this->input->post('email')) {
                        $update_8_11_14['email'] = $this->input->post('email');
                    }
                    if ($this->input->post('foreign_country')) {
                        $update_8_11_14['foreign_country'] = $this->input->post('foreign_country');
                    }
                    if ($this->input->post('foreign_address')) {
                        $update_8_11_14['foreign_address'] = $this->input->post('foreign_address');
                    }
                    if ($this->input->post('how_death')) {
                        $update_8_11_14['how_death'] = $this->input->post('how_death');
                    }
                    if ($this->input->post('myr_serial')) {
                        $update_8_11_14['myr_serial'] = $this->input->post('myr_serial');
                    }
                    if ($this->input->post('note')) {
                        $update_8_11_14['note'] = $this->input->post('note');
                    }


                    $update_8_11_14['is_pending'] = 1;
                    $update_8_11_14['is_studentship_pending'] = 1;


                    $this->manpower_model->manpowerUpdate('manpower', $update_8_11_14, array('id' => $manpowerid));
                    $data_membercandidate_log['is_log_pending'] = 1;

                   
                    $this->manpower_model->insertData('member_candidatelog', $data_membercandidate_log);

                     
                    $this->session->set_flashdata('message', 'সেক্রেটারি জেনারেলের সিদ্ধান্তের জন্য অপেক্ষা করুন।');

                    admin_redirect("membercandidate".( $this->session->userdata('branch_id') ? '/'.$this->session->userdata('branch_id') : ''));

                }
            } elseif ($this->input->post('membercandidatedecrease')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('membercandidate');
            }

            if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('member_candidate', $data_membercandidate, $membercandidate_where) && $this->manpower_model->insertData('member_candidatelog', $data_membercandidate_log)) {

                //closing associateinfo of current branch



                if ($process_id != 12) {
                    //decrease asso log
                    $assolog = array(
                        'process_date' =>  $this->sma->fsd($this->input->post('date')),
                        'in_out' => 2,
                        'process_id' => $processid,
                        'manpower_id' => $manpowerid,
                        'branch' => $manpower->branch,
                        'user_id' => $this->session->userdata('user_id')
                    );
                    $this->site->insertData('associatelog', $assolog);


                    //update asso
                    $asso = array(
                        'end_date' =>  $this->sma->fsd($this->input->post('date')),
                        'is_associate_now' => 2
                    );
                    $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $manpowerid));
                }






                //manpower update
                $manpower_update_arr = array();

                if ($processid == 12)
                    $manpower_update_arr['orgstatus_id'] = 2;
                elseif ($processid == 15)
                    $manpower_update_arr['branch'] = $newbranchid;
                else
                    $manpower_update_arr['orgstatus_id'] = NULL;

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










                $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));    //setting to new branch or org_status null





                if ($processid == 15) { ///not from here now. transfer controller


                    //saving log for new branch
                    $data_newbranch_membercandidate_log = array(
                        'process_date' => $date,
                        'manpower_id' => $manpowerid,
                        'in_out' => 1,
                        'user_id' => $this->session->userdata('user_id'),
                        'process_id' => $processid,
                        'branch' => $newbranchid,
                        'barnch_id_to_from' => $branchid,
                        'note' => $note
                    );

                    $this->manpower_model->insertData('member_candidatelog', $data_newbranch_membercandidate_log);


                    //new entry for new branch membercandidate table
                    $data_newbranch_membercandidate = array(
                        'start_date' => $date,
                        'manpower_id' => $manpowerid,
                        'user_id' => $this->session->userdata('user_id'),
                        'branch' => $newbranchid
                    );
                    $this->manpower_model->insertData('member_candidate', $data_newbranch_membercandidate);








                    //weclome associateinfo to new branch

                    //increase asso log
                    $assolog = array(
                        'process_date' =>  $this->sma->fsd($this->input->post('date')),
                        'in_out' => 1,
                        'process_id' => $processid,
                        'manpower_id' => $manpowerid,
                        'branch' => $newbranchid,
                        'user_id' => $this->session->userdata('user_id')
                    );
                    $this->site->insertData('associatelog', $assolog);


                    //increase asso new branch

                    $asso = array(
                        'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                        'start_date' =>  $this->sma->fsd($this->input->post('date')),
                        'manpower_id' => $manpowerid,
                        'branch' => $newbranchid,
                        'user_id' => $this->session->userdata('user_id')
                    );
                    $this->site->insertData('associate', $asso);
                }



                $this->session->set_flashdata('message', 'Decrease successfully');
                admin_redirect("membercandidate");
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

                $this->load->view($this->theme . 'membercandidate/decrease/decrease_user', $this->data);
            }
        }
    }






    function membercandidatepostpone($manpower_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');

        $manpower = $this->manpower_model->getManpowerByID($manpower_id);





        $this->form_validation->set_rules('date', lang("date"), 'required');
        $this->form_validation->set_rules('manpower_id', 'Member', 'required|callback_check_member[' . $this->input->post('branch_id') . ']');


        if ($this->form_validation->run() == true) {
            $manpowerid = $this->input->post('manpower_id');
            $branchid = $this->input->post('branch_id');
            $note = $this->input->post('note');

            $date = $this->sma->fld($this->input->post('date') . ' 00:00:00');

            $postpone_membercandidate = array(
                'start_date' => $date,
                'branch' => $branchid,
                'manpower_id' => $manpowerid,
                'user_id' => $this->session->userdata('user_id'),
                'orgstatus_id' => 12
            );


            $postpone_membercandidate_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 1,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpowerid,
                'note' => $note,
                'orgstatus_id' => 12
            );
        } elseif ($this->input->post('membercandidatepostpone')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('membercandidate');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->insertData('postpone', $postpone_membercandidate) && $this->manpower_model->insertData('postponelog', $postpone_membercandidate_log)) {



            $this->session->set_flashdata('message', 'Postponed successfully');
            admin_redirect("membercandidate/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;



            $this->load->view($this->theme . 'membercandidate/postpone/membercandidatepostpone', $this->data);
        }
    }







    function membercandidatepostponewithdraw($id = NULL)
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


            $postpone_membercandidate_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 2,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpower->id,
                'note' => $note,
                'orgstatus_id' => 12
            );
        } elseif ($this->input->post('membercandidatepostponewithdraw')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('membercandidate');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('postpone', $data_postpone, $postpone_where) && $this->manpower_model->insertData('postponelog', $postpone_membercandidate_log)) {

            $this->session->set_flashdata('message', 'Postpone withdrawn successfully');
            admin_redirect("membercandidate/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
            $this->data['info'] = $info;


            $this->load->view($this->theme . 'membercandidate/postpone/membercandidatepostponewithdraw', $this->data);
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

    function add($id = NULL)
    {
        //sleep(100);
        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $branches = $this->site->getAllBranches();
        $this->load->admin_model('organization_model');

        $this->form_validation->set_rules('manpower_id', 'Member Candidate', 'required');
        $this->form_validation->set_rules('date', 'Oath date', 'required');


        if ($this->form_validation->run() == true) {

            $manpower = $this->site->getByID('manpower', 'id', $this->input->post('manpower_id'));
            $branch = $this->site->getByID('branches', 'id', $manpower->branch);

            $is_changeable = $this->site->check_confirm($manpower->branch, date('Y-m-d'));

            if ($is_changeable == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }


            $data = array(
                'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'start_date' => $this->sma->fsd($this->input->post('date')),
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
                'user_id' => $this->session->userdata('user_id'),
                'notes' => $this->input->post('notes')
            );

            $datalog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'process_id' => 2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
                'user_id' => $this->session->userdata('user_id'),
                'note' => $this->input->post('notes')
            );




            // $this->sma->print_arrays($data, $warehouse_qty, $product_attributes);
        }

        if ($this->form_validation->run() == true) {


            //new mc
            $return_id = $this->site->insertData('member_candidate', $data, 'id');


            //new mclog
            $this->site->insertData('member_candidatelog', $datalog);



            //update manpower
            $manpower_update = array(
                'orgstatus_id' => 12,
                'membercandidate_oath_date' => $this->sma->fsd($this->input->post('date'))
            );

            //sessionyear
            //studentlife
            //subject
            //district
            //institution_type
            //responsibility_id
            //prossion_target_id
            //prossion_target_sub_it
            // education
            //education_institution






            $this->site->updateData('manpower', $manpower_update, array('id' => $this->input->post('manpower_id')));














            $this->session->set_flashdata('message', 'Added');
            admin_redirect('membercandidate');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            //  $this->data['branches'] = $branches;

            $this->data['districts'] = $this->site->getAll('district');
            $this->data['responsibilities'] = $this->site->getAll('responsibilities');
            $this->data['targets'] = $this->site->getAll('profession_target');
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);




            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('membercandidate'), 'page' => 'Member Candidate'), array('link' => '#', 'page' => 'Member Candidate Improve'));
            $meta = array('page_title' => 'Member Candidate Improve', 'bc' => $bc);
            $this->page_construct('membercandidate/membercandidate/improve', $meta, $this->data);
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

        $rows = $this->manpower_model->getAssociateNames($term);


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



        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('district', 'District', 'required');
        $this->form_validation->set_rules('sessionyear', 'sessionyear', 'required');
        $this->form_validation->set_rules('education', 'education', 'required');
        $this->form_validation->set_rules('studentlife', 'studentlife', 'required');





        if ($this->form_validation->run() == true) {

            $data = array(

                'membercandidate_oath_date' =>  $this->sma->fsd($this->input->post('date')),
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
            $this->site->updateData('member_candidate', $data_update, array('manpower_id' => $id, 'branch' => $manpower->branch));

            $data_update = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date'))
            );
            $this->site->updateData('member_candidatelog', $data_update, array('manpower_id' => $id, 'branch' => $manpower->branch));



            $this->session->set_flashdata('message', lang("manpower_updated"));

            admin_redirect('membercandidate');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;

            $this->data['districts'] = $this->site->getAll('district');
            $this->data['responsibilities'] = $this->site->getAll('responsibilities');


            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('membercandidate'), 'page' => 'Membercandidate'), array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('membercandidate/membercandidate/edit', $meta, $this->data);
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
        admin_redirect('membercandidate');
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


    function membercandidateincreaseexport($process_id, $branch = NULL)
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

        $report_type = $this->report_type();
        $type =  $this->input->get('type');



        $start = $report_type['start'];
        $end = $report_type['end'];


        $process = $this->site->getByID('process', 'id', $process_id);
        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,barnch_id_to_from, thana_code, membercandidate_oath_date,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district, upazilla.name AS upazilla_name, {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
            ->from('member_candidatelog')
            ->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
            ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 1)
            ->join('branches', 'branches.id=member_candidatelog.branch', 'left')
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
            $this->excel->getActiveSheet()->setTitle('Membercandidate Increase list');

            // bbbbbb

            // $this->sma->print_arrays($process); 
            $in_out = null;
            switch ($process_id) {
                case 2:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'institution_type',
                        'sessionyear',
                        'subject',
                        'responsibility',
                        'oath_date',
                        'prossion_target',
                        'prossion_target_sub',
                        'studentlife',
                        'district',
                        'upazilla_name'
                    );
                    break;
                case 15:
                    $in_out = 1;
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'institution_type',
                        'sessionyear',
                        'barnch_id_to_from',
                        'responsibility',
                        'membercandidate_oath_date',
                        'prossion_target',
                        'prossion_target_sub',
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
            $process_Title = 'সদস্যপ্রার্থী বৃদ্ধি : ' . $process_name;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            // $this->sma->print_arrays($in_out);


            $filename = (isset($branch->code) ? $branch->code : '') . 'membercandidate_increase_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function membercandidatedecreaseexport($process_id, $branch = NULL)
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
        $type =  $this->input->get('type');



        $start = $report_type['start'];
        $end = $report_type['end'];


        $process = $this->site->getByID('process', 'id', $process_id);

        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,barnch_id_to_from, thana_code,    {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name,{$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)
            ->from('member_candidatelog')
            ->join('manpower', 'manpower.id=member_candidatelog.manpower_id', 'left')
            ->where('member_candidatelog.process_id', $process_id)->where('member_candidatelog.in_out', 2)
            ->join('branches', 'branches.id=member_candidatelog.branch', 'left')
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
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Membercandidate Decrease list');


            //cccc

            switch ($process_id) {
                case 8:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
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
                        'institution_type',
                        'sessionyear',
                    );
                    break;
                case 12:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
                        'institution_type',
                        'sessionyear',
                        'subject',
                        'responsibility',
                    );
                    break;
                case 11:
                    $field_arr = array(
                        'associatecode',
                        'name',
                        'branch_name',
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
                        'opposition',
                        'myr_serial',
                        'date_death',
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
            $process_Title = 'সদস্যপ্রার্থী ঘাটতি : ' . $process_name;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            $filename = (isset($branch->code) ? $branch->code : '') . 'membercandidate_decrease_report' . str_replace(" ", "", $process->process);
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function getPrev($report_type, $last_year, $branch_id = NULL)
    {


        if ($branch_id)
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`membercandidate`) as membercandidate , SUM(`membercandidate_candidate`) as membercandidate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));

        else
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`membercandidate`) as membercandidate , SUM(`membercandidate_candidate`) as membercandidate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
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

        $field_arr = array(
            'education', 'associatecode', 'member_oath_date', 'associate_oath_date', 'district', 'upazilla_name', 'institution_type', 'institution_type_child', 'thana_code', 'subject', 'prossion_target', 'prossion_target_sub', 'education_institution', 'is_forum', 'current_profession', 'orgstatus_at_forum', 'education_qualification', 'type_of_profession', 'type_higher_education', 'mobile', 'opposition', 'date_death', 'higher_education_institution', 'email', 'foreign_country', 'foreign_address', 'myr_serial', 'how_death', 'thana_code',
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

        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.membercandidate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,upazilla.name AS upazilla_name,{$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death,prossion_target,prossion_target_sub,thana_code,institution_type_child,
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
            ->from('member_candidate')
            ->join('manpower', 'manpower.id=member_candidate.manpower_id', 'left')
            ->join('branches', 'branches.id=member_candidate.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.associate_oath_date ASC');

        $this->db->where($this->db->dbprefix('member_candidate') . ".is_member_candidate_now", 1);

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




        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Member list');




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
                'oath_date',
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
            $process_Title = 'সদস্যপ্রার্থী';
            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);
            $filename = 'membercandidate_report' . '_' . $this->input->get('year') . ($branch ? '_' . $branch : '');
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
            ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 12)
            ->join('branches', 'branches.id=postpone.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->order_by('postpone.id ASC');

        //  $this->db->where($this->db->dbprefix('postpone') . ".end_date", '2050-12-31');
        $this->db->where($this->db->dbprefix('manpower') . ".orgstatus_id", 1);

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
        //$this->sma->print_arrays($data);
        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Postpone list');


            //ppppp
            $field_arr = array(
                'membercode',
                'name',
                'branch_name',
                'institution_type',
                'sessionyear',
                'subject',
                'responsibility',
            );

            //  for cellValue 
            $process_Title = 'সদস্যপ্রার্থী মুলতবি';
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
