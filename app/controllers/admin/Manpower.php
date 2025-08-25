<?php defined('BASEPATH') or exit('No direct script access allowed');

class Manpower extends MY_Controller
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

    function indexold($branch_id = NULL)
    {

        $this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
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

        if ($branch_id)
            $currentmanpower = $this->getManpower($branch_id);
        else
            $currentmanpower = $this->getManpower();

        $last_year =  date("Y", strtotime("-1 year"));

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];
        $year = $report_type['year'];
        $cal_type = $report_type['type'];
        $report_info =  $report_type['info'];

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2023') {
            $report_type['start'] = $report_type['info']->startdate_annual;
            $report_type['end'] = $report_type['info']->enddate_annual;
        }


        $this->data['memberlog'] = $this->memberlog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);


        $this->data['membercandidatelog'] = $this->membercandidatelog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        // $this->sma->print_arrays($this->data['memberlog']);

        $this->data['postpone'] = $this->postlog(1, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postponemc'] = $this->postlog(12, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);

        $this->data['manpower_record'] = $this->getmanpower_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);


        $this->data['assolog'] = $this->assolog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postpone_asso'] = $this->postlog(2, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postpone_ac'] = $this->postlog(13, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);

        $this->data['workerlog'] = $this->workerlog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);

        // $this->sma->print_arrays($this->data['workerlog']);

        $this->data['m'] = 'manpowersummary';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);


        // $this->sma->print_arrays($this->data);


        if ($branch_id)
            $this->page_construct('manpower/index_entry', $meta, $this->data, 'leftmenu/manpower');
        else
            $this->page_construct('manpower/index', $meta, $this->data, 'leftmenu/manpower');
    }

    function index($branch_id = NULL)
    {

        $this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
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




        $last_year = $report_type['last_year'];
        $cal_type = $report_type['type'];


        $report_info =  $report_type['info'];

        if ($report_type['type'] == 'annual' && $report_type['year'] == '2022') {
            //  $report_type['start'] = $report_type['info']->startdate_annual;
            //  $report_type['end'] = $report_type['info']->enddate_annual;
        }


        //  $this->sma->print_arrays($report_type ); 
        // $this->sma->print_arrays($report_type['last_half']);

        // memberlog membercandidatelog   manpower_record assolog   workerlog


        $this->data['prev_manpower'] = $this->getPrev('annual', $last_year, $branch_id);

      // $this->data['current_member_n_associate'] = $this->current_member_n_associate();


        $this->data['memberlog'] = $this->manPowerLog('memberlog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['membercandidatelog'] = $this->manPowerLog('membercandidatelog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['assolog'] = $this->manPowerLog('assolog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['workerlog'] = $this->manPowerLog('workerlog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['assocandidatelog'] = $this->manPowerLog('assocandidatelog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);

        $this->data['manpower_record'] = $this->getmanpower_summary($report_type['is_current'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info, $report_type['last_half']);

        if ($branch_id)
            $this->data['associatecandidate_worker_transfer_in_out'] = $this->getassocandidate_worker_transferinfo($report_type['is_current'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info, $report_type['last_half']);


        $this->data['postpone'] = $this->postlog(1, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postponemc'] = $this->postlog(12, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postpone_asso'] = $this->postlog(2, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['postpone_ac'] = $this->postlog(13, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $this->data['m'] = 'manpowersummary';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);


       // $this->sma->print_arrays( $this->data['assocandidatelog']); 



        if ($branch_id)
            $this->page_construct('manpower/index_entry', $meta, $this->data, 'leftmenu/manpower');
        else
            $this->page_construct('manpower/index', $meta, $this->data, 'leftmenu/manpower');
    }


    function manPowerLog($orgstatus, $start, $end, $branch_id, $cal_type = null, $report_type = null)
    {

        // memberlog membercandidatelog   manpower_record assolog   workerlog



        switch ($orgstatus) {
            case 'memberlog':
                $this->db
                    ->select("COUNT(id) as member_number,process_id,in_out ", FALSE)
                    ->from('memberlog');
                $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
                $this->db->where('is_log_pending', 0);
                $this->db->group_by('in_out, process_id');
                
                
                if ($branch_id)
                    $this->db->where('branch', $branch_id);
                $q = $this->db->get();
                break;
            case 'membercandidatelog':
                $this->db
                    ->select("COUNT(id) as member_candidate_number,process_id,in_out ", FALSE)
                    ->from('member_candidatelog');
                $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
                $this->db->where('is_log_pending', 0);
                $this->db->group_by('in_out, process_id');
                if ($branch_id)
                    $this->db->where('branch', $branch_id);
                $q = $this->db->get();
                break;
            case 'assolog':
                $this->db
                    ->select("COUNT(id) as associate_number,process_id,in_out ", FALSE)
                    ->from('associatelog');
                $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
                $this->db->group_by('in_out, process_id');
                if ($branch_id)
                    $this->db->where('branch', $branch_id);
                $q = $this->db->get();
                break;
            case 'workerlog':
                $this->db
                    ->select("COUNT(id) as worker_number,process_id,in_out  ", FALSE)
                    ->from('worker_decrease');
                $this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
                $this->db->group_by('in_out, process_id');
                if ($branch_id)
                    $this->db->where('branch_id', $branch_id);
                $q = $this->db->get();
                break;

             case 'assocandidatelog':
                    $this->db
                        ->select("COUNT(id) as worker_number,process_id,in_out  ", FALSE)
                        ->from('worker_decrease');
                    $this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
                    $this->db->where('orgstatus_id',13);
                    $this->db->group_by('in_out, process_id');
                    if ($branch_id)
                        $this->db->where('branch_id', $branch_id);
                    $q = $this->db->get();
                    break;

        }

        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }

    function postlog($orgstatus, $start, $end, $branch_id)
    {
        $this->db
            ->select("count(sma_postpone.id) as number", FALSE)
            ->from('postpone')
            ->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
            ->where('end_date', '2050-12-31')
            ->where('is_postpone', 1)
            ->where('sma_manpower.orgstatus_id', $orgstatus);

        if ($branch_id)
            $this->db->where('postpone.branch', $branch_id);
        $q = $this->db->get();


        if ($orgstatus == 12) {

            // echo $this->db->last_query();
        }
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }


    function getmanpower_summary($is_current, $start_date, $end_date, $branch_id = NULL, $cal_type = null, $report_date_info = null, $last_half = null)
    {
        // $this->sma->print_arrays($report_date_info);


        $half_start = $report_date_info->startdate_half;
        $half_end = $report_date_info->enddate_half;

        // $this->sma->print_arrays( $report_date_info->startdate_half, $report_date_info->enddate_half); 

        if ($is_current == false) {




            // $this->sma->print_arrays(99999);

            //temporary associate_improvement_target, worker_improvement_target,  member_improvement_target

            if ($branch_id)
                $result =  $this->site->query_binding("SELECT SUM(`associate_candidate_improvement`) associate_candidate_improvement, 
                                                        SUM(`associate_candidate_arrival`) associate_candidate_arrival, 
                                                        SUM(`associate_candidate_improvement_target`) associate_candidate_improvement_target, 
                                                        
                                                        SUM(`associate_improvement_target`) associate_improvement_target, 
                                                        SUM(`worker_improvement_target`) worker_improvement_target, 
                                                        SUM(`member_improvement_target`) member_improvement_target, 


                                                        SUM(associate_candidate_endstd) associate_candidate_endstd, 
                                                        SUM(`associate_candidate_transfer`) associate_candidate_transfer, 
                                                        SUM(`associate_candidate_cancel`) associate_candidate_cancel, 
                                                        SUM(`associate_candidate_abroad_study`) associate_candidate_abroad_study, 
                                                        SUM(`associate_candidate_abroad_job`) associate_candidate_abroad_job, 
                                                        SUM(`associate_candidate_death`) associate_candidate_death, 
                                                        SUM(`associate_candidate_martyr`) associate_candidate_martyr,

                                                        SUM(`associate_candidate_postpone`) associate_candidate_postpone,
                                                        SUM(`associate_candidate_demotion`) associate_candidate_demotion,
                                                        SUM(`worker_improvement`) worker_improvement,
                                                        SUM(`worker_arrival`) worker_arrival,
                                                        SUM(`worker_endstd`) worker_endstd,
                                                        SUM(`worker_transfer`) worker_transfer,
                                                        SUM(`worker_cancel`) worker_cancel,
                                                        SUM(`worker_abroad_study`) worker_abroad_study ,
                                                        SUM(`worker_abroad_job`) worker_abroad_job,
                                                        SUM(`worker_death`) worker_death,
                                                        SUM(`worker_demotion`) worker_demotion ,
                                                        SUM(`member_candidate_candidate_target`) member_candidate_candidate_target ,
                                                        SUM(id) id
         from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));


            else

                $result =  $this->site->query_binding("SELECT SUM(`associate_candidate_improvement`) associate_candidate_improvement, 
                                                    SUM(`associate_candidate_arrival`) associate_candidate_arrival, 
                                                    SUM(`associate_candidate_improvement_target`) associate_candidate_improvement_target, 
                                                    SUM(associate_candidate_endstd) associate_candidate_endstd, 
                                                    SUM(`associate_candidate_transfer`) associate_candidate_transfer, 
                                                    SUM(`associate_candidate_cancel`) associate_candidate_cancel, 
                                                    SUM(`associate_candidate_abroad_study`) associate_candidate_abroad_study, 
                                                    SUM(`associate_candidate_abroad_job`) associate_candidate_abroad_job, 
                                                    SUM(`associate_candidate_death`) associate_candidate_death, 
                                                    SUM(`associate_candidate_martyr`) associate_candidate_martyr,
                                                    
                                                    
                                                    SUM(`associate_improvement_target`) associate_improvement_target, 
                                                    SUM(`worker_improvement_target`) worker_improvement_target, 
                                                    SUM(`member_improvement_target`) member_improvement_target, 



                                                    SUM(`associate_candidate_postpone`) associate_candidate_postpone,
                                                    SUM(`associate_candidate_demotion`) associate_candidate_demotion,
                                                    SUM(`worker_improvement`) worker_improvement,
                                                    SUM(`worker_arrival`) worker_arrival,
                                                    SUM(`worker_endstd`) worker_endstd,
                                                    SUM(`worker_transfer`) worker_transfer,
                                                    SUM(`worker_cancel`) worker_cancel,
                                                    SUM(`worker_abroad_study`) worker_abroad_study ,
                                                    SUM(`worker_abroad_job`) worker_abroad_job,
                                                    SUM(`worker_death`) worker_death,
                                                    SUM(`worker_demotion`) worker_demotion ,
                                                    SUM(`member_candidate_candidate_target`) member_candidate_candidate_target ,
                                                    SUM(id) id
            from sma_manpower_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));
        } else if ($branch_id) {

            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

            //3:2:1
            // $result2 =  $this->site->query_binding("SELECT associate_candidate_improvement_target, member_candidate_candidate_target from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $half_start, $half_end));


            //temporary 
            $result2 =  $this->site->query_binding("SELECT member_improvement_target, worker_improvement_target, associate_improvement_target, associate_candidate_improvement_target, member_candidate_candidate_target from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $half_start, $half_end));


            $result[0]['associate_candidate_improvement_target'] = $result2[0]['associate_candidate_improvement_target'] ?? '';
            $result[0]['member_candidate_candidate_target'] = $result2[0]['member_candidate_candidate_target'] ?? '';



            //temporary 
            $result[0]['associate_improvement_target'] = $result2[0]['associate_improvement_target'] ?? 0;
            $result[0]['member_improvement_target'] = $result2[0]['member_improvement_target'] ?? 0;
            $result[0]['worker_improvement_target'] = $result2[0]['worker_improvement_target'] ?? 0;
        } else {
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE    date BETWEEN ? AND ? ", array($start_date, $end_date));

            //3:2:1
            // $result2 =  $this->site->query_binding("SELECT associate_candidate_improvement_target, member_candidate_candidate_target from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $half_start, $half_end));


            //temporary 
            $result2 =  $this->site->query_binding("SELECT member_improvement_target, worker_improvement_target, associate_improvement_target, associate_candidate_improvement_target, member_candidate_candidate_target from sma_manpower_record WHERE  date BETWEEN ? AND ? ", array($half_start, $half_end));


            $result[0]['associate_candidate_improvement_target'] = $result2[0]['associate_candidate_improvement_target'] ?? '';
            $result[0]['member_candidate_candidate_target'] = $result2[0]['member_candidate_candidate_target'] ?? '';



            //temporary 
            $result[0]['associate_improvement_target'] = $result2[0]['associate_improvement_target'] ?? 0;
            $result[0]['member_improvement_target'] = $result2[0]['member_improvement_target'] ?? 0;
            $result[0]['worker_improvement_target'] = $result2[0]['worker_improvement_target'] ?? 0;
        }


        // $this->sma->print_arrays($result);

        return $result;
    }

    function getassocandidate_worker_transferinfo($is_current, $start_date, $end_date, $branch_id = NULL, $cal_type = null, $report_date_info = null, $last_half = null)
    {
        $arrival_worker =  $this->site->query_binding("SELECT  COUNT(id)  transfer_in_worker
                  from sma_manpower_transfer_assoworker WHERE orgstatus_id IN(3,13) AND `status` = 1  AND to_branch_id = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        $transfer_worker =  $this->site->query_binding("SELECT  COUNT(id)  transfer_out_worker
 from sma_manpower_transfer_assoworker WHERE orgstatus_id IN(3,13) AND from_branch_id = ? AND `status` = 1 AND process_date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));


        $arrival_associatecandidate =  $this->site->query_binding("SELECT  COUNT(id)  transfer_in_aasocuatecandidate
                  from sma_manpower_transfer_assoworker WHERE orgstatus_id =13 AND `status` = 1 AND to_branch_id = ? AND process_date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        $transfer_associatecandidate =  $this->site->query_binding("SELECT  COUNT(id)  transfer_out_aasocuatecandidate
 from sma_manpower_transfer_assoworker WHERE orgstatus_id = 13 AND from_branch_id = ? AND `status` = 1 AND process_date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));


        // $this->sma->print_arrays($result);

        return array(
            'arrival_worker' => $arrival_worker[0]['transfer_in_worker'],

            'transfer_worker' => $transfer_worker[0]['transfer_out_worker'],
            'arrival_associatecandidate' => $arrival_associatecandidate[0]['transfer_in_aasocuatecandidate'],
            'transfer_associatecandidate' => $transfer_associatecandidate[0]['transfer_out_aasocuatecandidate'],
        );
    }

    public function newName($field, $in_out = null)
    {



        switch ($field) {

            case 'barnch_id_to_from':
                $field = ($in_out == 1) ? 'শাখা হতে' : 'স্থানান্তরিত শাখা';
                break;
            case 'membercode':
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
            case 'thana_code':
                $field = 'থানা কোড';
                break;
            case 'blood_group':
                $field = 'ব্লাড গ্রুপ';
                break;
            case 'upazila':
                $field = 'উপজেলা/থানা';
                break;
            case 'upazilla_name':
                $field = 'উপজেলা/থানা';
                break;
            case 'start_date':
                $field = 'তারিখ';
                break;
            case 'note':
                $field = 'নোট';
                break;

            default:
                $field = $field;
                break;
        }
        return $field;
    }


    public function sheetcellValue($branch = null, $field_arr = null, $data = null, $process_Title = null, $in_out = null)
    {
        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );



        // $this->sma->print_arrays($process_Title); 







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

        //  $this->sma->print_arrays($data); 

        foreach ($data as $key => $data_row) {


            $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
            $this->excel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($style);

            $exCol = 'B';
            foreach ($field_arr as $field) {

                if ($field == 'institution_type_child') // getvalue($value,$array, $field)
                    $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $this->getvalue($data_row->institution_type_child, $institution_type, 'institution_type'));
                else
                    $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $field == 'note' ? strip_tags($data_row->{$field}) :  $data_row->{$field});

                $this->excel->getActiveSheet()->getStyle($exCol . $row)->applyFromArray($style);

                $exCol++;
            }
            $row++;
        }


        //   $this->sma->print_arrays($field_arr);
        //   $this->sma->print_arrays($data_row);





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



    function getmanpower_summary3($report_type, $start_date, $end_date, $branch_id = NULL, $cal_type = null, $report_date_info = null)
    {
        if ($this->input->get('type')) {
            if ($cal_type == 'annual') {
                $start_date = $report_date_info->startdate_half;
                $end_date = $report_date_info->enddate_annual;
            } else if ($cal_type == 'half_yearly') {
                $start_date = $report_date_info->startdate_half;
                $end_date = $report_date_info->enddate_half;
            }
        }



        if ($this->input->get('type')) {

            if ($branch_id)
                $result =  $this->site->query_binding("SELECT SUM(`associate_candidate_improvement`) associate_candidate_improvement, 
                                                            SUM(`associate_candidate_arrival`) associate_candidate_arrival, 
                                                            SUM(`associate_candidate_improvement_target`) associate_candidate_improvement_target, 
                                                            SUM(associate_candidate_endstd) associate_candidate_endstd, 
                                                            SUM(`associate_candidate_transfer`) associate_candidate_transfer, 
                                                            SUM(`associate_candidate_cancel`) associate_candidate_cancel, 
                                                            SUM(`associate_candidate_abroad_study`) associate_candidate_abroad_study, 
                                                            SUM(`associate_candidate_abroad_job`) associate_candidate_abroad_job, 
                                                            SUM(`associate_candidate_death`) associate_candidate_death, 
                                                            SUM(`associate_candidate_martyr`) associate_candidate_martyr,

                                                            SUM(`associate_candidate_postpone`) associate_candidate_postpone,
                                                            SUM(`associate_candidate_demotion`) associate_candidate_demotion,
                                                            SUM(`worker_improvement`) worker_improvement,
                                                            SUM(`worker_arrival`) worker_arrival,
                                                            SUM(`worker_endstd`) worker_endstd,
                                                            SUM(`worker_transfer`) worker_transfer,
                                                            SUM(`worker_cancel`) worker_cancel,
                                                            SUM(`worker_abroad_study`) worker_abroad_study ,
                                                            SUM(`worker_abroad_job`) worker_abroad_job,
                                                            SUM(`worker_death`) worker_death,
                                                            SUM(`worker_demotion`) worker_demotion ,
                                                            SUM(`member_candidate_candidate_target`) member_candidate_candidate_target ,
                                                            SUM(id) id
             from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));


            else

                $result =  $this->site->query_binding("SELECT SUM(`associate_candidate_improvement`) associate_candidate_improvement, 
                                                        SUM(`associate_candidate_arrival`) associate_candidate_arrival, 
                                                        SUM(`associate_candidate_improvement_target`) associate_candidate_improvement_target, 
                                                        SUM(associate_candidate_endstd) associate_candidate_endstd, 
                                                        SUM(`associate_candidate_transfer`) associate_candidate_transfer, 
                                                        SUM(`associate_candidate_cancel`) associate_candidate_cancel, 
                                                        SUM(`associate_candidate_abroad_study`) associate_candidate_abroad_study, 
                                                        SUM(`associate_candidate_abroad_job`) associate_candidate_abroad_job, 
                                                        SUM(`associate_candidate_death`) associate_candidate_death, 
                                                        SUM(`associate_candidate_martyr`) associate_candidate_martyr,

                                                        SUM(`associate_candidate_postpone`) associate_candidate_postpone,
                                                        SUM(`associate_candidate_demotion`) associate_candidate_demotion,
                                                        SUM(`worker_improvement`) worker_improvement,
                                                        SUM(`worker_arrival`) worker_arrival,
                                                        SUM(`worker_endstd`) worker_endstd,
                                                        SUM(`worker_transfer`) worker_transfer,
                                                        SUM(`worker_cancel`) worker_cancel,
                                                        SUM(`worker_abroad_study`) worker_abroad_study ,
                                                        SUM(`worker_abroad_job`) worker_abroad_job,
                                                        SUM(`worker_death`) worker_death,
                                                        SUM(`worker_demotion`) worker_demotion ,
                                                        SUM(`member_candidate_candidate_target`) member_candidate_candidate_target ,
                                                        SUM(id) id
                from sma_manpower_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));
        } else if ($branch_id)
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));

        return $result;
    }






    function getmanpower_summary2($report_type, $start_date, $end_date, $branch_id = NULL, $cal_type = null, $report_date_info = null)
    {


        if ($this->input->get('type')) {
            if ($cal_type == 'annual') {
                $start_date = $report_date_info->startdate_half;
                $end_date = $report_date_info->enddate_annual;
            } else if ($cal_type == 'half_yearly') {
                $start_date = $report_date_info->startdate_half;
                $end_date = $report_date_info->enddate_half;
            }
        }



        if ($this->input->get('type')) {
            $result =  $this->site->query_binding("SELECT SUM(`associate_candidate_improvement`) associate_candidate_improvement, 
SUM(`associate_candidate_arrival`) associate_candidate_arrival, 
SUM(`associate_candidate_improvement_target`) associate_candidate_improvement_target, 
SUM(associate_candidate_endstd) associate_candidate_endstd, 
SUM(`associate_candidate_transfer`) associate_candidate_transfer, 
SUM(`associate_candidate_cancel`) associate_candidate_cancel, 
SUM(`associate_candidate_abroad_study`) associate_candidate_abroad_study, 
SUM(`associate_candidate_abroad_job`) associate_candidate_abroad_job, 
SUM(`associate_candidate_death`) associate_candidate_death, 
SUM(`associate_candidate_martyr`) associate_candidate_martyr,

SUM(`associate_candidate_postpone`) associate_candidate_postpone,
SUM(`associate_candidate_demotion`) associate_candidate_demotion,
SUM(`worker_improvement`) worker_improvement,
SUM(`worker_arrival`) worker_arrival,
SUM(`worker_endstd`) worker_endstd,
SUM(`worker_transfer`) worker_transfer,
SUM(`worker_cancel`) worker_cancel,
SUM(`worker_abroad_study`) worker_abroad_study ,
SUM(`worker_abroad_job`) worker_abroad_job,
SUM(`worker_death`) worker_death,
SUM(`worker_demotion`) worker_demotion ,
SUM(`member_candidate_candidate_target`) member_candidate_candidate_target ,
SUM(id) id
from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));
        } else if ($branch_id)
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        else
            $result =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE date BETWEEN ? AND ? ", array($start_date, $end_date));



        return $result;
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











    function memberlog($type, $start, $end, $branch_id, $cal_type = null, $report_type = null)
    {


        $this->db
            ->select("COUNT(id) as member_number,process_id,in_out ", FALSE)
            ->from('memberlog');
        $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');

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






    function assolog($type, $start, $end, $branch_id, $cal_type = null, $report_type = null)
    {





        $this->db
            ->select("COUNT(id) as associate_number,process_id,in_out ", FALSE)
            ->from('associatelog');
        $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');

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




    function workerlog($type, $start, $end, $branch_id, $cal_type = null, $report_type = null)
    {
        $this->db
            ->select("COUNT(id) as worker_number,process_id,in_out  ", FALSE)
            ->from('worker_decrease');
        $this->db->where('date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');

        if ($branch_id)
            $this->db->where('branch_id', $branch_id);


        $q = $this->db->get();


        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }





    function membercandidatelog($type, $start, $end, $branch_id, $cal_type = null, $report_type = null)
    {

        $this->db
            ->select("COUNT(id) as member_candidate_number,process_id,in_out ", FALSE)
            ->from('member_candidatelog');
        $this->db->where('process_date BETWEEN "' . $start . '" and "' . $end . '"');
        $this->db->group_by('in_out, process_id');

        if ($branch_id)
            $this->db->where('branch', $branch_id);


        $q = $this->db->get();

        //  echo $this->db->last_query();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return FALSE;
    }







    function member($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/member/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/member/' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data);



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/member', $meta, $this->data, 'leftmenu/manpower');
    }



    function memberincreaselist($process_id = NULL)
    {

        $branch_id = $this->input->get('branch_id');
        $process = $this->site->getByID('process', 'id', $process_id);

        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/memberincreaselist/' . $process_id . '?branch_id=' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/memberincreaselist/' . $process_id . '?branch_id=' . $this->session->userdata('branch_id'));
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


        // $this->sma->print_arrays($this->data);

        $this->data['process'] = $process;
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/member/increase', $meta, $this->data, 'leftmenu/manpower');
    }



    function getIncreaseMember($process_id, $branch_id = NULL)
    {
        //$type =  $this->input->get('type');
        //$year =  $this->input->get('year');
        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $report_type = $this->report_type();
        //$this->sma->print_arrays($report_type);

        $this->load->library('datatables');

        if ($branch_id) {

            if ($process_id == 15)
                $this->datatables
                    ->select($this->db->dbprefix('memberlog') . ".id as id, {$this->db->dbprefix('manpower')}.id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name,barnch_id_to_from, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                    ->from('memberlog');
            else
                $this->datatables
                    ->select($this->db->dbprefix('memberlog') . ".id as id, {$this->db->dbprefix('manpower')}.id as manpowerid, membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                    ->from('memberlog');

            $this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
                ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {

            if ($process_id == 15)
                $this->datatables
                    ->select($this->db->dbprefix('memberlog') . ".id as id, {$this->db->dbprefix('manpower')}.id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, barnch_id_to_from, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                    ->from('memberlog');
            else
                $this->datatables
                    ->select($this->db->dbprefix('memberlog') . ".id as id, {$this->db->dbprefix('manpower')}.id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility, thana_code", FALSE)
                    ->from('memberlog');

            $this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
                ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1);
            $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }



        $start = $report_type['start'];
        $end = $report_type['end'];



        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        if ($process_id == 2)
            $this->datatables->add_column("Edit Output", "<a class=\"tip\" title='" . 'Edit Output' . "' href='" . admin_url('manpower/memberoutput/$1') . "'>Output <i class=\"fa fa-pencil\"></i></a>", "id");

        else
            $this->datatables->add_column("", "");


        $this->datatables->unset_column("id");


        echo $this->datatables->generate();
    }




    function memberoutput($id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $branches = $this->site->getAllBranches();
        $this->load->admin_model('organization_model');


        $memberlog = $this->site->getByID('memberlog', 'id', $id);
        $manpower_id = $memberlog->manpower_id;
        $manpower = $this->site->getByID('manpower', 'id', $manpower_id);


        // $this->sma->print_arrays($manpower);


        $this->form_validation->set_rules('logid', 'ID', 'required');
        $this->form_validation->set_rules('institution_type', 'institution type', 'required');


        if ($this->form_validation->run() == true) {



            $datalog = array(
                'institution_id' => $this->input->post('institution_type_id') ? $this->input->post('institution_type_id') : 0,
                'member_single_digit' => $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0,
                'member_jsc_jdc' => $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0,
                'member_ssc_dhakil' => $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0,
                'member_hsc_alim' => $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0,
                'member_department_position' => $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0,
                'member_department_position_private' => $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0,
                'member_influential' => $this->input->post('member_influential') ? $this->input->post('member_influential') : 0,
                'member_hc_science' => $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0,
                'member_madrasha' => $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0,
                'member_medical_college' => $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0,
                'member_ideal_college' => $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0,
                'member_engineeering' => $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0,
                'member_agri' => $this->input->post('member_agri') ? $this->input->post('member_agri') : 0,
                'member_science' => $this->input->post('member_science') ? $this->input->post('member_science') : 0,
                'member_business' => $this->input->post('member_business') ? $this->input->post('member_business') : 0,
                'member_arts' => $this->input->post('member_arts') ? $this->input->post('member_arts') : 0
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

            $this->site->updateData('memberlog', $datalog, array('id' => $id));



            //update manpower
            // $manpower_update = array(
            //      'institution_type' => $datalog['institution_id'],
            // );




            $this->site->updateData('manpower', $manpowerinfolog, array('id' => $manpower_id, 'branch' => $memberlog->branch));

            $this->session->set_flashdata('message', 'Updated');
            admin_redirect('manpower/memberincreaselist/2');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            //  $this->data['branches'] = $branches;


            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);

            $this->data['memberlog'] = $memberlog;
            $this->data['manpower'] = $manpower;

            // $this->sma->print_arrays($this->data['manpower']);

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/memberincreaselist/2'), 'page' => 'Member Improve'), array('link' => '#', 'page' => 'বৃদ্ধিকৃতদের আউটপুট'));
            $meta = array('page_title' => 'বৃদ্ধিকৃতদের আউটপুট', 'bc' => $bc);
            $this->page_construct('manpower/member/output', $meta, $this->data, 'leftmenu/manpower');
        }
    }


    function memberdecreaselist($process_id = NULL)
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
        $this->page_construct('manpower/member/decrease', $meta, $this->data, 'leftmenu/manpower');
    }



    function getDecreaseMember($process_id, $branch_id = NULL)
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
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('memberlog');
            $this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
                ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2);
            $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left')
                ->where('branches.id', $branch_id)->where('manpower.is_pending !=', 1)->where('manpower.is_studentship_pending !=', 1);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code,barnch_id_to_from", FALSE)
                ->from('memberlog');
            $this->datatables->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
                ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2)->where('manpower.is_pending !=', 1)->where('manpower.is_studentship_pending !=', 1);
            $this->datatables->join('branches', 'branches.id=memberlog.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }


        $start = $report_type['start'];
        $end = $report_type['end'];


        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');
        //echo $start.' >> '. $end;

        echo $this->datatables->generate();
    }



    function postponelist($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/postponelist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/postponelist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => admin_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'Member'), array('link' => '#', 'page' => 'Postpone'));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpower/postpone/postponelist', $meta, $this->data, 'leftmenu/manpower');
    }





    public function decreaselist($process_id = null)
    {
        $this->sma->checkPermissions();

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
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1);
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left')
                ->where('branches.id', $branch_id);
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code", FALSE)
                ->from('postpone');
            $this->datatables->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
                ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1);
            $this->datatables->join('branches', 'branches.id=postpone.branch', 'left');
            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }









        $this->datatables->add_column("Postpone", "<a class=\"tip\" title='" . 'Postpone' . "' href='" . admin_url('manpower/memberpostponewithdraw/$1') . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-minus\"></i></a>", "id");
        // $this->datatables->unset_column("manpowerid"); 
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }








    function getMember($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $detail_link = anchor('admin/products/view/$1', '<i class="fa fa-file-text-o"></i> ' . lang('manpower_details'));
        $delete_link = "<a href='#' class='tip po' title='<b>" . $this->lang->line("delete_manpower") . "</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1' id='a__$1' href='" . admin_url('manpower/delete/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . lang('delete_manpower') . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('manpowerlist/edit/$1/1') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';



        if ($this->Owner ||  $this->Admin) {
            $action .= '<li class="divider"></li>
            <li>' . $delete_link . '</li>';
        }

        $action .= '</ul>
        </div></div>';


        if ($branch_id)
            $is_changeable = $this->site->check_confirm($branch_id, date('Y-m-d'));

        else
            $is_changeable  = true;


        $process_list = array(
            8 => 'ছাত্রত্ব শেষ',
            15 => 'স্থানান্তর',
            12 => 'বাতিল',
            11 => 'উচ্চ শিক্ষা',
            14 => 'বিদেশে চাকুরি',
            9 => 'ইন্তেকাল',
            10 => 'শাহাদাৎ'
        );
        $li = "";





        foreach ($process_list as $key => $process) {
            $li .= "<li><a class=\"tip\" title='" . $process . "' href='" . admin_url('manpower/memberdecrease/$1/' . $key) . "' data-toggle='modal' data-target='#myModal'><i class=\"fa fa-edit\"></i>" . $process . "</a></li>";
            // $li .='<li><a href="' . admin_url('manpower/memberdecrease/$1'.'/'.$key) . '"><i class="fa fa-edit"></i> ' . $process . '</a></li>';
        }

        $decrease_button = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . 'ঘাটতি' . ' <span class="caret"></span></button>
       <ul class="dropdown-menu pull-right" role="menu">';

        $decrease_button .= $li . ' </ul>
        </div></div>';




        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,{$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code, v3_district_upazila({$this->db->dbprefix('manpower')}.upazila) as upazila_name", FALSE)
                ->from('member');
            $this->datatables->join('manpower', 'manpower.id=member.manpower_id', 'left')
                ->where('member.is_member_now', 1);
            $this->datatables->join('branches', 'branches.id=member.branch', 'left')
                ->where('branches.id', $branch_id);

            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,{$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,thana_code , v3_district_upazila({$this->db->dbprefix('manpower')}.upazila) as upazila_name ", FALSE)
                ->from('member');
            $this->datatables->join('manpower', 'manpower.id=member.manpower_id', 'left')
                ->where('member.is_member_now', 1);
            $this->datatables->join('branches', 'branches.id=member.branch', 'left');

            

            $this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
        }


      

        $postpone = "<a class=\"tip btn btn-default btn-xs btn-primary \" title='" . 'Postpone' . "' href='" . admin_url('manpower/memberpostpone/$1') . "' data-toggle='modal' data-target='#myModal'>মূলতবী <i class=\"fa fa-minus\"></i></a>";
        if (!$is_changeable) {
            $decrease_button = '';
            $postpone = '';
        }


        $this->datatables->add_column("Decrease", $decrease_button, "manpowerid");
        $this->datatables->add_column("Postpone", $postpone, "manpowerid");
        $this->datatables->add_column("Actions", $action, "manpowerid");

        echo $this->datatables->generate();
    }



    function memberdecrease($manpower_id = NULL, $process_id = NULL)
    {

        //admin_redirect('manpower/member');
        //  $this->sma->print_arrays($_POST);


        $this->sma->checkPermissions('index', TRUE);
        $this->load->admin_model('organization_model');


        if (!($this->Owner || $this->Admin))
            $where = array();

        else
            $where = array('branch_id' => $this->session->userdata('branch_id'));

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
            $this->data['msg'] = 'His status is still in pending.';
            $this->data['title'] = 'Member decrease';
            $this->load->view($this->theme . 'manpower/decrease/pending', $this->data);
        } else {
            //exit(json_encode(array('msg' => 'His transfer status is still pending.')));





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

                $data_member = array(
                    'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
                    'is_member_now' => 2
                );
                $member_where = array(
                    'manpower_id' => $manpowerid,
                    'branch' => $branchid
                );


                $data_member_log = array(
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
                        'orgstatus_id' => 1,
                        'process_date' => $date
                    );



                    $this->manpower_model->insertData('manpower_transfer', $data_newbranch_member_log);

                    $this->session->set_flashdata('message', 'Notification for transfer has been sent');

                    //admin_redirect("manpower/member");
                    admin_redirect("manpower/member".( $this->session->userdata('branch_id') ? '/'.$this->session->userdata('branch_id') : ''));

                } else if (in_array($process_id, array(8, 11, 14))) {

                   // $is_changeable_2 = $this->site->check_confirm($newbranchid, date('Y-m-d'));

                    // if ($is_changeable_2 == false) {
                    //     $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                    //     redirect($_SERVER["HTTP_REFERER"]);
                    // }
                    //11 14

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
                    $data_member_log['is_log_pending'] = 1;

                    $this->session->set_flashdata('message', 'কেন্দ্রীয় সভাপতির অনুমোদনের জন্য অপেক্ষা করুন।');

                    $this->manpower_model->insertData('memberlog', $data_member_log);
                    
                    
                    
                    admin_redirect("manpower/member".( $this->session->userdata('branch_id') ? '/'.$this->session->userdata('branch_id') : ''));



                }
            } elseif ($this->input->post('memberdecrease')) {
                $this->session->set_flashdata('error', validation_errors());
                admin_redirect('manpower/member');
            }







            if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('member', $data_member, $member_where) && $this->manpower_model->insertData('memberlog', $data_member_log)) {





                //manpower update
                $manpower_update_arr = array();
                if ($processid != 15 && $processid != 8)
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


                if (in_array($processid, array(9, 10,  12))) { //11 14 8 
                    $manpower_update_arr['studentlife'] = 2;
                }

                if ($this->input->post('caretaker_contact_status')) {
                    $manpower_update_arr['caretaker_contact_status'] = $this->input->post('caretaker_contact_status');
                }

                if ($this->input->post('masters_complete_status')) {
                    $manpower_update_arr['masters_complete_status'] = $this->input->post('masters_complete_status');
                }

                $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));
                //manpower update ends













                $this->session->set_flashdata('message', 'Decrease successfully');







                admin_redirect("manpower/member");
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





                $this->data['districts'] = $this->site->getDistrict();
                $this->data['responsibilities'] = $this->site->getAll('responsibilities');
                $this->data['countries'] = $this->site->getAll('countries');
                $this->data['targets'] = $this->site->getAll('profession_target');
                $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);



                $this->load->view($this->theme . 'manpower/decrease/decrease_user', $this->data);
            }
        }
    }








    function memberpostpone($manpower_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);

        $this->load->helper('security');
        $this->load->admin_model('organization_model');


        $manpower = $this->manpower_model->getManpowerByID($manpower_id);





        $this->form_validation->set_rules('date', lang("date"), 'required');
        $this->form_validation->set_rules('manpower_id', 'Member', 'required|callback_check_member[' . $this->input->post('branch_id') . ']');


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
                'orgstatus_id' => 1
            );


            $postpone_member_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 1,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpowerid,
                'note' => $note,
                'orgstatus_id' => 1
            );

            $manpower_update_arr = array();


            $manpower_update_arr['is_postpone'] = 1;
            if ($this->input->post('sessionyear')) {
                $manpower_update_arr['sessionyear'] = $this->input->post('sessionyear');
            }

            if ($this->input->post('responsibility_id')) {
                $manpower_update_arr['responsibility_id'] = $this->input->post('responsibility_id');
            }
            if ($this->input->post('subject')) {
                $manpower_update_arr['subject'] = $this->input->post('subject');
            }


            if ($this->input->post('institution_type')) {
                $manpower_update_arr['institution_type'] = $this->input->post('institution_type');
            }


            if ($this->input->post('note')) {
                $manpower_update_arr['note'] = $this->input->post('note');
            }






            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));
        } elseif ($this->input->post('memberpostpone')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('manpower/member');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->insertData('postpone', $postpone_member) && $this->manpower_model->insertData('postponelog', $postpone_member_log)) {



            $this->session->set_flashdata('message', 'Postponed successfully');
            admin_redirect("manpower/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;



            $this->data['responsibilities'] = $this->site->getAll('responsibilities');

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);





            $this->load->view($this->theme . 'manpower/postpone/memberpostpone', $this->data);
        }
    }







    function memberpostponewithdraw($id = NULL)
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


            $postpone_member_log = array(
                'postpone_date' => $date,
                'branch' => $branchid,
                'in_out' => 2,
                'user_id' => $this->session->userdata('user_id'),
                'manpower_id' => $manpower->id,
                'note' => $note,
                'orgstatus_id' => 1
            );
        } elseif ($this->input->post('memberpostponewithdraw')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('manpower/member');
        }

        if ($this->form_validation->run() == true && $this->manpower_model->manpowerUpdate('postpone', $data_postpone, $postpone_where) && $this->manpower_model->insertData('postponelog', $postpone_member_log)) {



            $manpower_update_arr = array();


            $manpower_update_arr['is_postpone'] = 0;

            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower->id));



            $this->session->set_flashdata('message', 'Postpone withdrawn successfully');
            admin_redirect("manpower/postponelist");
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['manpower'] = $manpower;
            $this->data['info'] = $info;


            $this->load->view($this->theme . 'manpower/postpone/memberpostponewithdraw', $this->data);
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
                'note' => $this->input->post('notes'),
                'institution_id' => $this->input->post('institution_type_id') ? $this->input->post('institution_type_id') : 0,
                'member_single_digit' => $this->input->post('member_single_digit') ? $this->input->post('member_single_digit') : 0,
                'member_jsc_jdc' => $this->input->post('member_jsc_jdc') ? $this->input->post('member_jsc_jdc') : 0,
                'member_ssc_dhakil' => $this->input->post('member_ssc_dhakil') ? $this->input->post('member_ssc_dhakil') : 0,
                'member_hsc_alim' => $this->input->post('member_hsc_alim') ? $this->input->post('member_hsc_alim') : 0,
                'member_department_position' => $this->input->post('member_department_position') ? $this->input->post('member_department_position') : 0,
                'member_department_position_private' => $this->input->post('member_department_position_private') ? $this->input->post('member_department_position_private') : 0,
                'member_influential' => $this->input->post('member_influential') ? $this->input->post('member_influential') : 0,
                'member_hc_science' => $this->input->post('member_hc_science') ? $this->input->post('member_hc_science') : 0,
                'member_madrasha' => $this->input->post('member_madrasha') ? $this->input->post('member_madrasha') : 0,
                'member_medical_college' => $this->input->post('member_medical_college') ? $this->input->post('member_medical_college') : 0,
                'member_ideal_college' => $this->input->post('member_ideal_college') ? $this->input->post('member_ideal_college') : 0,
                'member_engineeering' => $this->input->post('member_engineeering') ? $this->input->post('member_engineeering') : 0,
                'member_agri' => $this->input->post('member_agri') ? $this->input->post('member_agri') : 0,
                'member_science' => $this->input->post('member_science') ? $this->input->post('member_science') : 0,
                'member_business' => $this->input->post('member_business') ? $this->input->post('member_business') : 0,
                'member_arts' => $this->input->post('member_arts') ? $this->input->post('member_arts') : 0
            );



















            // $this->sma->print_arrays($data, $warehouse_qty, $product_attributes);
        }

        if ($this->form_validation->run() == true) {




            //new member
            $return_id = $this->site->insertData('member', $data, 'id');


            //new memberlog
            $this->site->insertData('memberlog', $datalog);



            //update manpower
            $manpower_update = array(
                'member_oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'orgstatus_id' => 1,
                'institution_type' => $datalog['institution_id'],
                'membercode' => date('y') . $branch->code . $return_id,


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











            //decrease mc log
            $mclog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'in_out' => 2,
                'process_id' => 2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
                'user_id' => $this->session->userdata('user_id')
            );
            $this->site->insertData('member_candidatelog', $mclog);


            //update mc
            $mc = array(
                'end_date' =>  $this->sma->fsd($this->input->post('date')),
                'is_member_candidate_now' => 2
            );
            $this->site->updateData('member_candidate', $mc, array('is_member_candidate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $this->input->post('manpower_id')));




            //decrease asso log
            $assolog = array(
                'process_date' =>  $this->sma->fsd($this->input->post('date')),
                'in_out' => 2,
                'process_id' => 2,
                'manpower_id' => $this->input->post('manpower_id'),
                'branch' => $manpower->branch,
                'user_id' => $this->session->userdata('user_id')
            );
            $this->site->insertData('associatelog', $assolog);


            //update asso
            $asso = array(
                'end_date' =>  $this->sma->fsd($this->input->post('date')),
                'is_associate_now' => 2
            );
            $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $this->input->post('manpower_id')));




            $this->session->set_flashdata('message', 'Added');
            admin_redirect('manpower/member');
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));

            //  $this->data['branches'] = $branches;



            $this->data['districts'] = $this->site->getDistrict();
            $this->data['responsibilities'] = $this->site->getAll('responsibilities');
            $this->data['targets'] = $this->site->getAll('profession_target');
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);



            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('manpower/member'), 'page' => 'Member'), array('link' => '#', 'page' => 'Member Improve'));
            $meta = array('page_title' => 'Member Improve', 'bc' => $bc);
            $this->page_construct('manpower/member/improve', $meta, $this->data, 'leftmenu/manpower');
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


        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $branch_id = null;
        } else {
            $branch_id = $this->session->userdata('branch_id');
        }


        $rows = $this->manpower_model->getManpowerNames($term, 5, $branch_id);


        if ($rows) {
            foreach ($rows as $row) {
                $pr[] = array('id' => $row->id, 'institution_type' => $row->institution_type, 'text' => $row->name . '(' . $row->associatecode . ')');
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
        admin_redirect('manpower');

        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        if ($this->manpower_model->deleteManpower($id)) {
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


    function memberincreaseexport($process_id, $branch = NULL)
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

        // $this->sma->print_arrays($process);



        $this->db
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,thana_code,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, barnch_id_to_from,  {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name, {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)

            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 1)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.member_oath_date ASC');


        $this->db->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');


        if ($branch_id)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);


        $q = $this->db->get();
        //echo $this->db->last_query();
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
            $this->excel->getActiveSheet()->setTitle('Member Increase list');

            $in_out = null;
            //eeee

            switch ($process_id) {
                case 2:
                    $field_arr = array(
                        'membercode',
                        'name',
                        'branch_name',
                        'institution_type',
                        'sessionyear',
                        'subject',
                        'responsibility',
                        'member_oath_date',
                        'prossion_target',
                        'prossion_target_sub',
                        'studentlife',
                        'district',
                        'upazilla_name',
                        'thana_code',
                    );

                    break;
                case 15:
                    $in_out = 1;
                    $field_arr = array(
                        'membercode',
                        'name',
                        'branch_name',
                        'institution_type',
                        'sessionyear',
                        'barnch_id_to_from',
                        'responsibility',
                        'member_oath_date',
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
            $process_Title = 'সদস্য বৃদ্ধি : ' . $process_name;







            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            // $this->sma->print_arrays($field_arr);

            $filename = (isset($branch->code) ? $branch->code : '') . 'member_increase_report_' . str_replace(" ", "", $process->process);


            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }





    function memberdecreaseexport($process_id, $branch = NULL)
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
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,thana_code , barnch_id_to_from, 
                    {$this->db->dbprefix('manpower')}.name, 
                    {$this->db->dbprefix('branches')}.name as branch_name, 
                    {$this->db->dbprefix('manpower')}.member_oath_date as oath_date,sessionyear,  
                    {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name,
                    {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,
                    {$this->db->dbprefix('manpower')}.email,
                    {$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death", FALSE)

            ->from('memberlog')
            ->join('manpower', 'manpower.id=memberlog.manpower_id', 'left')
            ->where('memberlog.process_id', $process_id)->where('memberlog.in_out', 2)
            ->join('branches', 'branches.id=memberlog.branch', 'left')
            ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
            ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
            ->join('countries', 'manpower.foreign_country=countries.id', 'left')
            ->join('district', 'manpower.district=district.id', 'left')
            ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
            ->order_by('manpower.member_oath_date ASC');

        $this->db->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        if ($branch_id)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch_id);


        $q = $this->db->get();
        //echo $this->db->last_query();

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
            $this->excel->getActiveSheet()->setTitle('Member Decrease list');

            //cccc

            // aaaa

            $field_arr = array(
                'membercode',
                'name',
                'branch_name',
                'mobile',
                'thana_code',
                'responsibility'
            );

            //    $this->sma->print_arrays($data);

            switch ($process_id) {

                case 8:
                    $field_arr_add = array(
                        'orgstatus_at_forum',
                        'education_qualification',
                        'current_profession',
                        'district',
                        'upazilla_name'
                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;

                case 15:
                    $field_arr_add = array(
                        'institution_type',
                        'sessionyear',
                        'barnch_id_to_from',

                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;

                case 12:
                    $field_arr_add = array(
                        'institution_type',
                        'sessionyear',
                        'subject'
                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;

                case 11:
                    $field_arr_add = array(
                        'foreign_country',
                        'higher_education_institution',
                        'type_higher_education',
                        'email',
                        'is_forum'
                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;
                case 14:
                    $field_arr_add = array(
                        'foreign_country',
                        'foreign_address',
                        'type_of_profession',
                        'email',
                        'is_forum'
                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;
                case 9:
                    $field_arr_add = array(
                        'date_death',
                        'how_death'
                    );
                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;
                case 10:
                    $field_arr_add = array(
                        'opposition',
                        'myr_serial',
                        'date_death'
                    );


                    $field_arr = array_merge($field_arr, $field_arr_add);
                    break;
            }



            //  for cellValue 
            $branch_id = $branch ? $branch->id : lang('all_branches');
            $process_name = $process ? $process->process : '';

            if ($process_id == 15) {
                $process_name =  '_স্থানান্তর ';
            }


            $process_Title = 'সদস্য ঘাটতি : ' . $process_name;

            $in_out = null;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);


            $filename = (isset($branch->code) ? $branch->code : '') . 'member_decrease_report' . str_replace(" ", "", $process_name);


            $this->load->helper('excel');


            //  $this->sma->print_arrays($process_name); 



            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }









    function getPrev($report_type, $last_year, $branch_id = NULL)
    {

        if ($branch_id) {
            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
            FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type, $branch_id, $last_year));
        } else {

            $result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
            FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type, $last_year));
        }


        //  print_r($this->db->last_query());   
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



    function exportsummary($branch_id)
    {
        // $branch_id = $this->input->get('branch');
        // $this->sma->checkPermissions();
        // $this->sma->print_arrays($branch_id);

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/' . $this->session->userdata('branch_id'));
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



        $last_year = $report_type['last_year'];
        $cal_type = $report_type['type'];


        $report_info =  $report_type['info'];


        $prev_manpower = $this->getPrev('annual', $last_year, $branch_id);



        $memberlog = $this->manPowerLog('memberlog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $membercandidatelog = $this->manPowerLog('membercandidatelog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $assolog = $this->manPowerLog('assolog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $workerlog = $this->manPowerLog('workerlog', $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);

        $manpower_record = $this->getmanpower_summary($report_type['is_current'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info, $report_type['last_half']);

        $postpone = $this->postlog(1, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $postponemc = $this->postlog(12, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $postpone_asso = $this->postlog(2, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);
        $postpone_ac = $this->postlog(13, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info);



        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Manpower Summary');

        $this->excel->getActiveSheet()->mergeCells('A1:T1');
        $this->excel->getActiveSheet()->mergeCells('A2:T2');
        $this->excel->getActiveSheet()->mergeCells('A3:T3');
        $this->excel->getActiveSheet()->mergeCells('A4:T4');
        $this->excel->getActiveSheet()->mergeCells('A5:T5');

        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
        );

        $this->excel->getActiveSheet()->getStyle("A1:T4")->applyFromArray($style);
        $this->excel->getActiveSheet()->getStyle('A1:T4')->getFont()->setBold(true);


        $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
        $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' Manpower Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);
        $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));





        $this->excel->getActiveSheet()->mergeCells('B11:B13');
        $this->excel->getActiveSheet()->SetCellValue('B11', 'জনশক্তি');

        $this->excel->getActiveSheet()->mergeCells('C11:C13');
        $this->excel->getActiveSheet()->SetCellValue('C11', 'পূর্বের সংখ্যা ');

        $this->excel->getActiveSheet()->mergeCells('D11:D13');
        $this->excel->getActiveSheet()->SetCellValue('D11', 'বর্তমান সংখ্যা');


        $this->excel->getActiveSheet()->mergeCells('E11:G11');
        $this->excel->getActiveSheet()->SetCellValue('E11', 'বৃদ্ধি');

        $this->excel->getActiveSheet()->mergeCells('E12:E13');
        $this->excel->getActiveSheet()->SetCellValue('E12', 'সংখ্যা');

        $this->excel->getActiveSheet()->mergeCells('F12:F13');
        $this->excel->getActiveSheet()->SetCellValue('F12', 'মানোন্নয়ন');


        $this->excel->getActiveSheet()->mergeCells('G12:G13');
        $this->excel->getActiveSheet()->SetCellValue('G12', 'আগমন');



        $this->excel->getActiveSheet()->mergeCells('H11:H13');
        $this->excel->getActiveSheet()->SetCellValue('H11', 'টার্গেট');


        $this->excel->getActiveSheet()->mergeCells('I11:I13');
        $this->excel->getActiveSheet()->SetCellValue('I11', 'বাস্তবায়ন হার');




        $this->excel->getActiveSheet()->mergeCells('J11:T11');
        $this->excel->getActiveSheet()->SetCellValue('J11', 'ঘাটতি');



        $this->excel->getActiveSheet()->mergeCells('J12:J13');
        $this->excel->getActiveSheet()->SetCellValue('J12', 'সংখ্যা');

        $this->excel->getActiveSheet()->mergeCells('K12:K13');
        $this->excel->getActiveSheet()->SetCellValue('K12', 'মানোন্নয়ন');

        $this->excel->getActiveSheet()->mergeCells('L12:L13');
        $this->excel->getActiveSheet()->SetCellValue('L12', 'ছাত্রত্ব শেষ ');


        $this->excel->getActiveSheet()->mergeCells('M12:M13');
        $this->excel->getActiveSheet()->SetCellValue('M12', 'স্থানান্তর');

        $this->excel->getActiveSheet()->mergeCells('N12:N13');
        $this->excel->getActiveSheet()->SetCellValue('N12', 'বাতিল');




        $this->excel->getActiveSheet()->mergeCells('O12:P12');
        $this->excel->getActiveSheet()->SetCellValue('O12', 'বিদেশ');


        $this->excel->getActiveSheet()->SetCellValue('O13', 'উচ্চ শিক্ষা');
        $this->excel->getActiveSheet()->SetCellValue('P13', 'বাতিল');




        $this->excel->getActiveSheet()->mergeCells('Q12:Q13');
        $this->excel->getActiveSheet()->SetCellValue('Q12', 'ইন্তেকাল ');

        $this->excel->getActiveSheet()->mergeCells('R12:R13');
        $this->excel->getActiveSheet()->SetCellValue('R12', 'শাহাদাত');


        $this->excel->getActiveSheet()->mergeCells('S12:S13');
        $this->excel->getActiveSheet()->SetCellValue('S12', 'কর্মী মান অবনতি');

        $this->excel->getActiveSheet()->mergeCells('T12:T13');
        $this->excel->getActiveSheet()->SetCellValue('T12', 'postpone');


        $this->excel->getActiveSheet()->SetCellValue('B14', 'সদস্য');
        $this->excel->getActiveSheet()->SetCellValue('B15', 'সদস্য প্রার্থী');
        $this->excel->getActiveSheet()->SetCellValue('B16', 'সাথী');
        $this->excel->getActiveSheet()->SetCellValue('B17', 'সাথী প্রার্থী');
        $this->excel->getActiveSheet()->SetCellValue('B18', 'কর্মী');
        $this->excel->getActiveSheet()->SetCellValue('B19', 'মোট');


        $this->excel->getActiveSheet()->getStyle("B11:T13")->getFont()->setBold(true);

        $this->excel->getActiveSheet()->getStyle("B11:T13")
            ->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()
            ->setRGB('03bb85');

        $member_prev =  $prev_manpower[0]['member'];
        $member_improvement = (!$memberlog) ? 0 :  calculate($memberlog, 2, 1, 'member_number');
        $member_arrival = (!$memberlog) ? 0 :  calculate($memberlog, 15, 1, 'member_number');

        $member_endstd = (!$memberlog) ? 0 :  calculate($memberlog, 8, 2, 'member_number');
        $member_transfer = (!$memberlog) ? 0 :  calculate($memberlog, 15, 2, 'member_number');
        $member_cancel = (!$memberlog) ? 0 :  calculate($memberlog, 12, 2, 'member_number');
        $member_study_abroad = (!$memberlog) ? 0 :  calculate($memberlog, 11, 2, 'member_number');
        $member_job_abroad = (!$memberlog) ? 0 :  calculate($memberlog, 14, 2, 'member_number');
        $member_death = (!$memberlog) ? 0 :  calculate($memberlog, 9, 2, 'member_number');
        $member_martyr = (!$memberlog) ? 0 :  calculate($memberlog, 10, 2, 'member_number');
        $member_demotion = (!$memberlog) ? 0 :  calculate($memberlog, 13, 2, 'member_number');
        $total_member_decrease = $member_endstd  + $member_transfer  + $member_cancel  + $member_study_abroad + $member_job_abroad + $member_death + $member_martyr + $member_demotion;

        //temporary
        $member_improvement_target =  sum_manpower($manpower_record, 'member_improvement_target');



        ///member starts
        $this->excel->getActiveSheet()->SetCellValue('C14', $prev_manpower[0]['member']);
        $this->excel->getActiveSheet()->SetCellValue('D14', $member_prev + $member_improvement + $member_arrival - $total_member_decrease);
        $this->excel->getActiveSheet()->SetCellValue('E14', $member_improvement + $member_arrival);
        $this->excel->getActiveSheet()->SetCellValue('F14', $member_improvement);
        $this->excel->getActiveSheet()->SetCellValue('G14', $member_arrival);


        //3:2:1
        // $this->excel->getActiveSheet()->SetCellValue('H14', $member_prev);
        // $this->excel->getActiveSheet()->SetCellValue('I14', ($member_prev > 0) ? round(100 * $member_improvement / $member_prev, 2) : 0);

        //temporary
        $this->excel->getActiveSheet()->SetCellValue('H14', $member_improvement_target);
        $this->excel->getActiveSheet()->SetCellValue('I14', ($member_improvement_target > 0) ? round(100 * $member_improvement / $member_improvement_target, 2) : 0);




        $this->excel->getActiveSheet()->SetCellValue('J14', $total_member_decrease);
        $this->excel->getActiveSheet()->SetCellValue('K14', '');
        $this->excel->getActiveSheet()->SetCellValue('L14', $member_endstd);
        $this->excel->getActiveSheet()->SetCellValue('M14',  $member_transfer);
        $this->excel->getActiveSheet()->SetCellValue('N14', $member_cancel);
        $this->excel->getActiveSheet()->SetCellValue('O14', $member_study_abroad);
        $this->excel->getActiveSheet()->SetCellValue('P14', $member_job_abroad);
        $this->excel->getActiveSheet()->SetCellValue('Q14', $member_death);
        $this->excel->getActiveSheet()->SetCellValue('R14', $member_martyr);
        $this->excel->getActiveSheet()->SetCellValue('S14', $member_demotion);
        $this->excel->getActiveSheet()->SetCellValue('T14', $postpone[0]->number);

        ///member ends




        ///membercandidate starts


        $membercandidate_improvement = (!$membercandidatelog) ? 0 :  calculate($membercandidatelog, 2, 1, 'member_candidate_number');
        $membercandidate_arrival = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 15, 1, 'member_candidate_number');

        $membercandidate_endstd = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 8, 2, 'member_candidate_number');
        $membercandidate_transfer = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 15, 2, 'member_candidate_number');
        $membercandidate_cancel = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 12, 2, 'member_candidate_number');
        $membercandidate_study_abroad = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 11, 2, 'member_candidate_number');
        $membercandidate_job_abroad = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 14, 2, 'member_candidate_number');
        $membercandidate_death = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 9, 2, 'member_candidate_number');
        $membercandidate_martyr = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 10, 2, 'member_candidate_number');
        $membercandidate_demotion = (!$membercandidatelog) ? 0 : calculate($membercandidatelog, 13, 2, 'member_candidate_number');
        $membercandidate_improvement_d = $member_improvement;

        $total_membercandidate_decrease = $membercandidate_improvement_d + $membercandidate_endstd  + $membercandidate_transfer  + $membercandidate_cancel  + $membercandidate_study_abroad + $membercandidate_job_abroad + $membercandidate_death + $membercandidate_martyr + $membercandidate_demotion;

        $membercandidate_prev = $prev_manpower[0]['member_candidate'];

        $this->excel->getActiveSheet()->SetCellValue('C15', $membercandidate_prev);
        $this->excel->getActiveSheet()->SetCellValue('D15', $membercandidate_prev + $membercandidate_improvement + $membercandidate_arrival - $total_membercandidate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('E15', $membercandidate_improvement + $membercandidate_arrival);
        $this->excel->getActiveSheet()->SetCellValue('F15', $membercandidate_improvement);
        $this->excel->getActiveSheet()->SetCellValue('G15', $membercandidate_arrival);
        if (isset($manpower_record[0])) {
            $arr = $manpower_record[0];
            $membercandidate_target = $arr['member_candidate_candidate_target'];
        } else {
            $membercandidate_target = 0;
        }
        $this->excel->getActiveSheet()->SetCellValue('H15', $membercandidate_target);
        $this->excel->getActiveSheet()->SetCellValue('I15', ($membercandidate_target > 0) ? round(100 * $membercandidate_improvement / $membercandidate_target, 2) : 0);
        $this->excel->getActiveSheet()->SetCellValue('J15', $total_membercandidate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('K15', $membercandidate_improvement_d);
        $this->excel->getActiveSheet()->SetCellValue('L15', $membercandidate_endstd);
        $this->excel->getActiveSheet()->SetCellValue('M15',  $membercandidate_transfer);
        $this->excel->getActiveSheet()->SetCellValue('N15', $membercandidate_cancel);
        $this->excel->getActiveSheet()->SetCellValue('O15', $membercandidate_study_abroad);
        $this->excel->getActiveSheet()->SetCellValue('P15', $membercandidate_job_abroad);
        $this->excel->getActiveSheet()->SetCellValue('Q15', $membercandidate_death);
        $this->excel->getActiveSheet()->SetCellValue('R15', $membercandidate_martyr);
        $this->excel->getActiveSheet()->SetCellValue('S15', $membercandidate_demotion);
        $this->excel->getActiveSheet()->SetCellValue('T15', $postponemc[0]->number);

        ///membercandidate ends






        ///associate starts
        $associate_prev =  $prev_manpower[0]['associate'];

        $associate_improvement = (!$assolog) ? 0 : calculate($assolog, 2, 1, 'associate_number');
        $associate_arrival = (!$assolog) ? 0 : calculate($assolog, 15, 1, 'associate_number');

        $associate_endstd = (!$assolog) ? 0 : calculate($assolog, 8, 2, 'associate_number');
        $associate_transfer = (!$assolog) ? 0 : calculate($assolog, 15, 2, 'associate_number');
        $associate_cancel = (!$assolog) ? 0 : calculate($assolog, 12, 2, 'associate_number');
        $associate_study_abroad =  (!$assolog) ? 0 : calculate($assolog, 11, 2, 'associate_number');
        $associate_job_abroad = (!$assolog) ? 0 :  calculate($assolog, 14, 2, 'associate_number');
        $associate_death = (!$assolog) ? 0 : calculate($assolog, 9, 2, 'associate_number');
        $associate_martyr = (!$assolog) ? 0 : calculate($assolog, 10, 2, 'associate_number');
        //$associate_demotion = (!$assolog) ? 0 : calculate($assolog, 13,2, 'associate_number');
        $associate_demotion = (!$assolog) ? 0 : calculate($assolog, 18, 2, 'associate_number');
        $associate_improvement_d = $member_improvement;

        //temporary
        $associate_improvement_target = sum_manpower($manpower_record, 'associate_improvement_target');


        $total_associate_decrease = $associate_improvement_d +  $associate_endstd  + $associate_transfer  + $associate_cancel  + $associate_study_abroad + $associate_job_abroad + $associate_death + $associate_martyr + $associate_demotion;


        $this->excel->getActiveSheet()->SetCellValue('C16', $associate_prev);
        $this->excel->getActiveSheet()->SetCellValue('D16', $associate_prev + $associate_improvement + $associate_arrival - $total_associate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('E16', $associate_improvement + $associate_arrival);
        $this->excel->getActiveSheet()->SetCellValue('F16', $associate_improvement);
        $this->excel->getActiveSheet()->SetCellValue('G16', $associate_arrival);

        //3:2:1
        // $this->excel->getActiveSheet()->SetCellValue('H16', $associate_prev + $member_prev);
        //$this->excel->getActiveSheet()->SetCellValue('I16', ($associate_prev + $member_prev > 0) ? round(100 * $associate_improvement / ($associate_prev + $member_prev), 2) : 0);

        //temporary
        $this->excel->getActiveSheet()->SetCellValue('H16', $associate_improvement_target);
        $this->excel->getActiveSheet()->SetCellValue('I16', ($associate_improvement_target > 0) ? round(100 * $associate_improvement / ($associate_improvement_target), 2) : 0);




        $this->excel->getActiveSheet()->SetCellValue('J16', $total_associate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('K16', $associate_improvement_d);
        $this->excel->getActiveSheet()->SetCellValue('L16', $associate_endstd);
        $this->excel->getActiveSheet()->SetCellValue('M16', $associate_transfer);
        $this->excel->getActiveSheet()->SetCellValue('N16', $associate_cancel);
        $this->excel->getActiveSheet()->SetCellValue('O16', $associate_study_abroad);
        $this->excel->getActiveSheet()->SetCellValue('P16', $associate_job_abroad);
        $this->excel->getActiveSheet()->SetCellValue('Q16', $associate_death);
        $this->excel->getActiveSheet()->SetCellValue('R16', $associate_martyr);
        $this->excel->getActiveSheet()->SetCellValue('S16', $associate_demotion);
        $this->excel->getActiveSheet()->SetCellValue('T16', $postpone_asso[0]->number + $postponemc[0]->number);

        ///associate ends








        ///associate candidate starts
        $associate_candidate_prev =  $prev_manpower[0]['associate_candidate'];
        $associate_candidate_improvement = sum_manpower($manpower_record, 'associate_candidate_improvement');
        $associate_candidate_arrival = sum_manpower($manpower_record,   'associate_candidate_arrival');
        $associate_candidate_endstd = sum_manpower($manpower_record,   'associate_candidate_endstd');
        $associate_candidate_transfer = sum_manpower($manpower_record,   'associate_candidate_transfer');
        $associate_candidate_cancel = sum_manpower($manpower_record,   'associate_candidate_cancel');
        $associate_candidate_abroad_study = sum_manpower($manpower_record,  'associate_candidate_abroad_study');
        $associate_candidate_abroad_job = sum_manpower($manpower_record,   'associate_candidate_abroad_job');
        $associate_candidate_death = sum_manpower($manpower_record,  'associate_candidate_death');
        $associate_candidate_martyr = sum_manpower($manpower_record,   'associate_candidate_martyr');
        $associate_candidate_demotion = sum_manpower($manpower_record,   'associate_candidate_demotion');
        $associate_candidate_improvement_d = $associate_improvement;
        $total_associate_candidate_decrease = $associate_candidate_improvement_d + $associate_candidate_endstd  + $associate_candidate_transfer  + $associate_candidate_cancel  + $associate_candidate_abroad_study + $associate_candidate_abroad_job + $associate_candidate_death + $associate_candidate_martyr + $associate_candidate_demotion;
        $associate_candidate_improvement_target = sum_manpower($manpower_record, 'associate_candidate_improvement_target');





        $this->excel->getActiveSheet()->SetCellValue('C17', $associate_candidate_prev);
        $this->excel->getActiveSheet()->SetCellValue('D17', $associate_candidate_prev + $associate_candidate_improvement + $associate_candidate_arrival - $total_associate_candidate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('E17', $associate_candidate_improvement + $associate_candidate_arrival);

        if (isset($manpower_record[0])) {
            $associate_candidate_improvement = $arr['associate_candidate_improvement'];
            $associate_candidate_arrival = $arr['associate_candidate_arrival'];
            $associate_candidate_improvement_target = $arr['associate_candidate_improvement_target'];
            $associate_candidate_transfer = $arr['associate_candidate_transfer'];
            $associate_candidate_cancel = $arr['associate_candidate_cancel'];
            $associate_candidate_endstd = $arr['associate_candidate_endstd'];
            $associate_candidate_abroad_study = $arr['associate_candidate_abroad_study'];
            $associate_candidate_abroad_job = $arr['associate_candidate_abroad_job'];
            $associate_candidate_death = $arr['associate_candidate_death'];
            $associate_candidate_martyr = $arr['associate_candidate_martyr'];
            $associate_candidate_postpone = $arr['associate_candidate_postpone'];
        } else {
            $associate_candidate_improvement = 0;
            $associate_candidate_arrival = 0;
            $associate_candidate_improvement_target = 0;
            $associate_candidate_transfer = 0;
            $associate_candidate_cancel = 0;
            $associate_candidate_endstd = 0;
            $associate_candidate_abroad_study = 0;
            $associate_candidate_abroad_job = 0;
            $associate_candidate_death = 0;
            $associate_candidate_martyr = 0;
            $associate_candidate_postpone = 0;
        }


        $this->excel->getActiveSheet()->SetCellValue('F17', $associate_candidate_improvement);
        $this->excel->getActiveSheet()->SetCellValue('G17', $associate_candidate_arrival);
        $this->excel->getActiveSheet()->SetCellValue('H17', $associate_candidate_improvement_target);
        $this->excel->getActiveSheet()->SetCellValue('I17', ($associate_candidate_improvement_target > 0) ? round(100 * $associate_candidate_improvement / $associate_candidate_improvement_target, 2) : 0);
        $this->excel->getActiveSheet()->SetCellValue('J17', $total_associate_candidate_decrease);
        $this->excel->getActiveSheet()->SetCellValue('K17', $associate_candidate_improvement_d);
        $this->excel->getActiveSheet()->SetCellValue('L17', $associate_candidate_endstd);
        $this->excel->getActiveSheet()->SetCellValue('M17', $associate_candidate_transfer);
        $this->excel->getActiveSheet()->SetCellValue('N17', $associate_candidate_cancel);
        $this->excel->getActiveSheet()->SetCellValue('O17', $associate_candidate_abroad_study);
        $this->excel->getActiveSheet()->SetCellValue('P17', $associate_candidate_abroad_job);
        $this->excel->getActiveSheet()->SetCellValue('Q17', $associate_candidate_death);
        $this->excel->getActiveSheet()->SetCellValue('R17', $associate_candidate_martyr);
        $this->excel->getActiveSheet()->SetCellValue('S17', $associate_candidate_demotion);
        $this->excel->getActiveSheet()->SetCellValue('T17', $associate_candidate_postpone);

        ///associate candidate ends











        ///worker ends
        $worker_prev =  $prev_manpower[0]['worker'];
        $worker_improvement = sum_manpower($manpower_record, 'worker_improvement');
        $worker_arrival = sum_manpower($manpower_record,   'worker_arrival');
        $worker_endstd = sum_manpower($manpower_record,   'worker_endstd');
        $worker_transfer = sum_manpower($manpower_record,   'worker_transfer');
        $worker_cancel = sum_manpower($manpower_record,   'worker_cancel');
        $worker_study_abroad = (!$workerlog) ? 0 : calculate($workerlog, 11, 2, 'worker_number');
        $worker_job_abroad = (!$workerlog) ? 0 : calculate($workerlog, 14, 2, 'worker_number');
        $worker_death = (!$workerlog) ? 0 : calculate($workerlog, 9, 2, 'worker_number');
        $worker_martyr = (!$workerlog) ? 0 : calculate($workerlog, 10, 2, 'worker_number');
        $worker_demotion = sum_manpower($manpower_record,   'worker_demotion');
        $worker_improvement_d = $associate_improvement;
        $total_worker_decrease = $worker_improvement_d + $worker_endstd  + $worker_transfer  + $worker_cancel  + $worker_study_abroad + $worker_job_abroad + $worker_death + $worker_martyr + $worker_demotion;

        //3 : 2: 1 
        //$worker_improvement_target = $worker_prev  + $member_prev  + $associate_prev;

        //temporary
        $worker_improvement_target = sum_manpower($manpower_record, 'worker_improvement_target');



        $this->excel->getActiveSheet()->SetCellValue('C18', $worker_prev);
        $this->excel->getActiveSheet()->SetCellValue('D18', $worker_prev + $worker_improvement + $worker_arrival - $total_worker_decrease);
        $this->excel->getActiveSheet()->SetCellValue('E18', $worker_improvement + $worker_arrival);
        if (isset($manpower_record[0])) {
            $worker_improvement = $arr['worker_improvement'];
            $worker_arrival = $arr['worker_arrival'];
            $worker_endstd = $arr['worker_endstd'];
            $worker_transfer = $arr['worker_transfer'];
            $worker_cancel = $arr['worker_cancel'];
            $worker_demotion = $arr['worker_demotion'];
        } else {
            $worker_improvement = 0;
            $worker_arrival = 0;
            $worker_endstd = 0;
            $worker_transfer = 0;
            $worker_cancel = 0;
            $worker_demotion = 0;
        }
        $this->excel->getActiveSheet()->SetCellValue('F18', $worker_improvement);
        $this->excel->getActiveSheet()->SetCellValue('G18', $worker_arrival);
        $this->excel->getActiveSheet()->SetCellValue('H18', $worker_improvement_target);


        $this->excel->getActiveSheet()->SetCellValue('I18', ($worker_improvement_target > 0) ? round(100 * $worker_improvement / $worker_improvement_target, 2) : 0);


        $this->excel->getActiveSheet()->SetCellValue('J18', $total_worker_decrease);
        $this->excel->getActiveSheet()->SetCellValue('K18', $worker_improvement_d);
        $this->excel->getActiveSheet()->SetCellValue('L18', $worker_endstd);
        $this->excel->getActiveSheet()->SetCellValue('M18', $worker_transfer);
        $this->excel->getActiveSheet()->SetCellValue('N18', $worker_cancel);
        $this->excel->getActiveSheet()->SetCellValue('O18', $worker_study_abroad);
        $this->excel->getActiveSheet()->SetCellValue('P18', $worker_job_abroad);
        $this->excel->getActiveSheet()->SetCellValue('Q18', $worker_death);
        $this->excel->getActiveSheet()->SetCellValue('R18', $worker_martyr);
        $this->excel->getActiveSheet()->SetCellValue('S18', $worker_demotion);
        $this->excel->getActiveSheet()->SetCellValue('T18', '');

        ///worker ends








        $this->excel->getActiveSheet()->SetCellValue('C19', "=SUM(C14,C16,C18)");
        $this->excel->getActiveSheet()->SetCellValue('D19', "=SUM(D14,D16,D18)");
        $this->excel->getActiveSheet()->SetCellValue('E19', "=SUM(E14,E16,E18)");
        $this->excel->getActiveSheet()->SetCellValue('F19', "=SUM(F14,F15,F16,F17,F18)");
        $this->excel->getActiveSheet()->SetCellValue('G19', "=SUM(G14,G16,G18)");
        $this->excel->getActiveSheet()->SetCellValue('H19', "=SUM(H14,H15,H16,H17,H18)");
        $this->excel->getActiveSheet()->SetCellValue('I19', '');
        $this->excel->getActiveSheet()->SetCellValue('J19', "=SUM(J14,J16,J18)");
        $this->excel->getActiveSheet()->SetCellValue('K19', "=SUM(K14,K16,K18)");
        $this->excel->getActiveSheet()->SetCellValue('L19', "=SUM(L14,L16,L18)");
        $this->excel->getActiveSheet()->SetCellValue('M19', "=SUM(M14,M16,M18)");
        $this->excel->getActiveSheet()->SetCellValue('N19', "=SUM(N14,N16,N18)");
        $this->excel->getActiveSheet()->SetCellValue('O19', "=SUM(O14,O16,O18)");
        $this->excel->getActiveSheet()->SetCellValue('P19', "=SUM(P14,P16,P18)");
        $this->excel->getActiveSheet()->SetCellValue('Q19', "=SUM(Q14,Q16,Q18)");
        $this->excel->getActiveSheet()->SetCellValue('R19', "=SUM(R14,R16,R18)");
        $this->excel->getActiveSheet()->SetCellValue('S19', "=SUM(S14,S16,S18)");
        $this->excel->getActiveSheet()->SetCellValue('T19', "=SUM(T14,T16,T18)");

        $this->excel->getActiveSheet()->getStyle("B19:T19")->getBorders()
            ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


        $filename = 'manpower_report_' . $this->input->get('year') . '_' . $this->input->get('branch');
        $this->load->helper('excel');
        create_excel($this->excel, $filename);
    }



    function exportsummary_not_in_use($branch_id = NULL)
    {

        if ($this->input->get('branch')) {
            $branch_id = $this->input->get('branch');
        }

        //  $this->sma->print_arrays($branch_id);

        $this->sma->checkPermissions('index', TRUE);

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branch_id'] = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }


        $last_year =  date("Y", strtotime("-1 year"));

        $report_type = $this->report_type();

        $start = $report_type['start'];
        $end = $report_type['end'];
        $year = $report_type['year'];
        $cal_type = $report_type['type'];

        $this->db
            ->select("COUNT(id) as member_number,process_id,in_out ", FALSE)
            ->from('memberlog');
        $this->db->where('process_date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        $this->db->group_by('in_out, process_id');
        if ($branch_id)
            $this->db->where('branch', $branch_id);


        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }


        $postpone = $this->postlog(1, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);
        $datamc = $this->membercandidatelog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);

        // $manpower_record = $this->getmanpower_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);

        $report_info =  $report_type['info'];

        //  $this->sma->print_arrays($report_type);

        $manpower_record = $this->getmanpower_summary($report_type['is_current'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_info, $report_type['last_half']);

        $postponemc = $this->postlog(12, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);

        $dataasso = $this->assolog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);
        $postponeasso = $this->postlog(2, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);
        $postponeac = $this->postlog(13, $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);

        $dataworker = $this->workerlog($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $cal_type, $report_type);


        // $this->sma->print_arrays($branch_id);

        if (1 || !empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Manpower Summary');

            $this->excel->getActiveSheet()->mergeCells('A1:T1');
            $this->excel->getActiveSheet()->mergeCells('A2:T2');
            $this->excel->getActiveSheet()->mergeCells('A3:T3');
            $this->excel->getActiveSheet()->mergeCells('A4:T4');
            $this->excel->getActiveSheet()->mergeCells('A5:T5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:T4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:T4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
            $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' Manpower Report: from ' . $report_type['start'] . ' to ' . $report_type['end']);
            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));





            $this->excel->getActiveSheet()->mergeCells('B11:B13');
            $this->excel->getActiveSheet()->SetCellValue('B11', 'জনশক্তি');

            $this->excel->getActiveSheet()->mergeCells('C11:C13');
            $this->excel->getActiveSheet()->SetCellValue('C11', 'পূর্বের সংখ্যা ');

            $this->excel->getActiveSheet()->mergeCells('D11:D13');
            $this->excel->getActiveSheet()->SetCellValue('D11', 'বর্তমান সংখ্যা');


            $this->excel->getActiveSheet()->mergeCells('E11:G11');
            $this->excel->getActiveSheet()->SetCellValue('E11', 'বৃদ্ধি');

            $this->excel->getActiveSheet()->mergeCells('E12:E13');
            $this->excel->getActiveSheet()->SetCellValue('E12', 'সংখ্যা');

            $this->excel->getActiveSheet()->mergeCells('F12:F13');
            $this->excel->getActiveSheet()->SetCellValue('F12', 'মানোন্নয়ন');


            $this->excel->getActiveSheet()->mergeCells('G12:G13');
            $this->excel->getActiveSheet()->SetCellValue('G12', 'আগমন');



            $this->excel->getActiveSheet()->mergeCells('H11:H13');
            $this->excel->getActiveSheet()->SetCellValue('H11', 'টার্গেট');


            $this->excel->getActiveSheet()->mergeCells('I11:I13');
            $this->excel->getActiveSheet()->SetCellValue('I11', 'বাস্তবায়ন হার');




            $this->excel->getActiveSheet()->mergeCells('J11:T11');
            $this->excel->getActiveSheet()->SetCellValue('J11', 'ঘাটতি');



            $this->excel->getActiveSheet()->mergeCells('J12:J13');
            $this->excel->getActiveSheet()->SetCellValue('J12', 'সংখ্যা');

            $this->excel->getActiveSheet()->mergeCells('K12:K13');
            $this->excel->getActiveSheet()->SetCellValue('K12', 'মানোন্নয়ন');

            $this->excel->getActiveSheet()->mergeCells('L12:L13');
            $this->excel->getActiveSheet()->SetCellValue('L12', 'ছাত্রত্ব শেষ ');


            $this->excel->getActiveSheet()->mergeCells('M12:M13');
            $this->excel->getActiveSheet()->SetCellValue('M12', 'স্থানান্তর');

            $this->excel->getActiveSheet()->mergeCells('N12:N13');
            $this->excel->getActiveSheet()->SetCellValue('N12', 'বাতিল');




            $this->excel->getActiveSheet()->mergeCells('O12:P12');
            $this->excel->getActiveSheet()->SetCellValue('O12', 'বিদেশ');


            $this->excel->getActiveSheet()->SetCellValue('O13', 'উচ্চ শিক্ষা');
            $this->excel->getActiveSheet()->SetCellValue('P13', 'বাতিল');




            $this->excel->getActiveSheet()->mergeCells('Q12:Q13');
            $this->excel->getActiveSheet()->SetCellValue('Q12', 'ইন্তেকাল ');

            $this->excel->getActiveSheet()->mergeCells('R12:R13');
            $this->excel->getActiveSheet()->SetCellValue('R12', 'শাহাদাত');


            $this->excel->getActiveSheet()->mergeCells('S12:S13');
            $this->excel->getActiveSheet()->SetCellValue('S12', 'কর্মী মান অবনতি');

            $this->excel->getActiveSheet()->mergeCells('T12:T13');
            $this->excel->getActiveSheet()->SetCellValue('T12', 'postpone');


            $this->excel->getActiveSheet()->SetCellValue('B14', 'সদস্য');
            $this->excel->getActiveSheet()->SetCellValue('B15', 'সদস্য প্রার্থী');
            $this->excel->getActiveSheet()->SetCellValue('B16', 'সাথী');
            $this->excel->getActiveSheet()->SetCellValue('B17', 'সাথী প্রার্থী');
            $this->excel->getActiveSheet()->SetCellValue('B18', 'কর্মী');
            $this->excel->getActiveSheet()->SetCellValue('B19', 'মোট');


            $this->excel->getActiveSheet()->getStyle("B11:T13")->getFont()->setBold(true);

            $this->excel->getActiveSheet()->getStyle("B11:T13")
                ->getFill()
                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                ->getStartColor()
                ->setRGB('03bb85');

            $total_pre = 0;
            $prev_manpower = $this->getPrev($report_type['type'], $last_year, $branch_id);

            ////member
            $row = 14;
            $org_name = 'member';
            $total_pre += $prev_manpower[0][$org_name];
            $member_prev = $prev_manpower[0][$org_name];
            $improvement = $this->calculate($data, 2, 1, $org_name . '_number');  //record, process, in 
            $improvement_m = $improvement;
            $arrival = $this->calculate($data, 15, 1, $org_name . '_number');  //record, process, in 
            $endstd = $this->calculate($data, 8, 2, $org_name . '_number');  //record, process, in 
            $transfer = $this->calculate($data, 15, 2, $org_name . '_number');  //record, process, in 
            $cancel = $this->calculate($data, 12, 2, $org_name . '_number');  //record, process, in 
            $study_abroad = $this->calculate($data, 11, 2, $org_name . '_number');  //record, process, in 
            $job_abroad = $this->calculate($data, 14, 2, $org_name . '_number');  //record, process, in 
            $death = $this->calculate($data, 9, 2, $org_name . '_number');  //record, process, in 
            $martyr = $this->calculate($data, 10, 2, $org_name . '_number');  //record, process, in 
            $demotion = $this->calculate($data, 13, 2, $org_name . '_number');  //record, process, in 
            $demotion = $this->calculate($data, 13, 2, $org_name . '_number');  //record, process, in 

            $total_member_decrease = $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
            $current_member = $member_prev + $improvement + $arrival - $total_member_decrease;



            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $member_prev);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $current_member);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $improvement + $arrival);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $improvement);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $arrival);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $member_prev);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($member_prev > 0) ? round(100 * $improvement / $member_prev, 2) : 0);
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, $total_member_decrease);
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, '');
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, $endstd);
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, $transfer);
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, $cancel);
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, $study_abroad);
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, $job_abroad);
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $death);
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, $martyr);
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, $demotion);
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, $postpone[0]->number);

            ///member ends





            //mc starts
            $row = 15;
            $org_name = 'member_candidate';
            //$total_pre += $prev_manpower[0][$org_name];  
            $mc_prev = $prev_manpower[0][$org_name];
            $improvement = $this->calculate($datamc, 2, 1, $org_name . '_number');  //record, process, in 
            $arrival = $this->calculate($datamc, 15, 1, $org_name . '_number');  //record, process, in 
            $mc_improvement_d = $improvement_m;
            $endstd = $this->calculate($datamc, 8, 2, $org_name . '_number');  //record, process, in 
            $transfer = $this->calculate($datamc, 15, 2, $org_name . '_number');  //record, process, in 
            $cancel = $this->calculate($datamc, 12, 2, $org_name . '_number');  //record, process, in 
            $study_abroad = $this->calculate($datamc, 11, 2, $org_name . '_number');  //record, process, in 
            $job_abroad = $this->calculate($datamc, 14, 2, $org_name . '_number');  //record, process, in 
            $death = $this->calculate($datamc, 9, 2, $org_name . '_number');  //record, process, in 
            $martyr = $this->calculate($datamc, 10, 2, $org_name . '_number');  //record, process, in 
            $demotion = $this->calculate($datamc, 13, 2, $org_name . '_number');  //record, process, in 

            $total_mc_decrease = $mc_improvement_d +  $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
            $current_mc = $mc_prev + $improvement + $arrival - $total_mc_decrease;
            $mc_target = $this->sum_manpower($manpower_record, 'member_candidate_candidate_target');

            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $mc_prev);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $current_mc);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $improvement + $arrival);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $improvement);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $arrival);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $mc_target);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($mc_target > 0) ? round(100 * $improvement / $mc_target, 2) : 0);
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, $total_mc_decrease);
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, $improvement_m);
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, $endstd);
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, $transfer);
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, $cancel);
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, $study_abroad);
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, $job_abroad);
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $death);
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, $martyr);
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, $demotion);
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, $postponemc[0]->number);

            //mc ends








            //$org_name = 'associate_candidate';
            //$org_name = 'worker';


            //asso starts
            $row = 16;
            $org_name = 'associate';
            $total_pre += $prev_manpower[0][$org_name];
            $asso_prev = $prev_manpower[0][$org_name];
            $improvement = $this->calculate($dataasso, 2, 1, $org_name . '_number');  //record, process, in 
            $arrival = $this->calculate($dataasso, 15, 1, $org_name . '_number');  //record, process, in 
            $asso_improvement_d = $improvement_m;
            $endstd = $this->calculate($dataasso, 8, 2, $org_name . '_number');  //record, process, in 
            $transfer = $this->calculate($dataasso, 15, 2, $org_name . '_number');  //record, process, in 
            $cancel = $this->calculate($dataasso, 12, 2, $org_name . '_number');  //record, process, in 
            $study_abroad = $this->calculate($dataasso, 11, 2, $org_name . '_number');  //record, process, in 
            $job_abroad = $this->calculate($dataasso, 14, 2, $org_name . '_number');  //record, process, in 
            $death = $this->calculate($dataasso, 9, 2, $org_name . '_number');  //record, process, in 
            $martyr = $this->calculate($dataasso, 10, 2, $org_name . '_number');  //record, process, in 
            $demotion = $this->calculate($dataasso, 13, 2, $org_name . '_number');  //record, process, in 

            $total_asso_decrease = $asso_improvement_d +  $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
            $current_asso = $asso_prev + $improvement + $arrival - $total_asso_decrease;
            $asso_target = $asso_prev + $member_prev;
            $asso_improvement  = $improvement;
            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $asso_prev);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $current_asso);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $improvement + $arrival);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $improvement);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $arrival);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $asso_target);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($asso_target > 0) ? round(100 * $improvement / $asso_target, 2) : 0);
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, $total_asso_decrease);
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, $improvement_m);
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, $endstd);
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, $transfer);
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, $cancel);
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, $study_abroad);
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, $job_abroad);
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $death);
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, $martyr);
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, $demotion);
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, $postponeasso[0]->number);
            //asso ends









            //ac starts
            $row = 17;
            $org_name = 'associate_candidate';
            //$total_pre += $prev_manpower[0][$org_name];  
            $ac_prev = $prev_manpower[0][$org_name];
            $improvement = $this->sum_manpower($manpower_record, 'associate_candidate_improvement');
            $arrival = $this->sum_manpower($manpower_record,   'associate_candidate_arrival');


            $endstd = $this->sum_manpower($manpower_record,   'associate_candidate_endstd');
            $transfer = $this->sum_manpower($manpower_record,   'associate_candidate_transfer');
            $cancel = $this->sum_manpower($manpower_record,   'associate_candidate_cancel');
            $study_abroad = $this->sum_manpower($manpower_record,  'associate_candidate_abroad_study');
            $job_abroad = $this->sum_manpower($manpower_record,   'associate_candidate_abroad_job');
            $death = $this->sum_manpower($manpower_record,  'associate_candidate_death');
            $martyr = $this->sum_manpower($manpower_record,   'associate_candidate_martyr');
            $demotion = $this->sum_manpower($manpower_record,   'associate_candidate_demotion');

            $ac_improvement_d = $asso_improvement;
            $total_ac_decrease = $ac_improvement_d + $endstd  + $transfer  + $cancel  + $study_abroad + $job_abroad + $death + $martyr + $demotion;
            $current_ac = $ac_prev + $improvement + $arrival - $total_ac_decrease;

            $ac_target = $this->sum_manpower($manpower_record, 'associate_candidate_improvement_target');



            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $ac_prev);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $current_ac);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $improvement + $arrival);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $improvement);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $arrival);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $ac_target);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($ac_target > 0) ? round(100 * $improvement / $ac_target, 2) : 0);
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, $total_ac_decrease);
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, $ac_improvement_d);
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, $endstd);
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, $transfer);
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, $cancel);
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, $study_abroad);
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, $job_abroad);
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $death);
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, $martyr);
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, $demotion);
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, $postponeac[0]->number);
            //ac ends






            //worker starts
            $row = 18;
            $org_name = 'worker';
            $total_pre += $prev_manpower[0][$org_name];
            $worker_prev = $prev_manpower[0][$org_name];


            $worker_improvement = $this->sum_manpower($manpower_record, 'worker_improvement');
            $worker_arrival = $this->sum_manpower($manpower_record,   'worker_arrival');

            $worker_endstd = $this->sum_manpower($manpower_record,   'worker_endstd');
            $worker_transfer = $this->sum_manpower($manpower_record,   'worker_transfer');
            $worker_cancel = $this->sum_manpower($manpower_record,   'worker_cancel');



            $worker_study_abroad = $this->calculate($dataworker, 11, 2, $org_name . '_number');  //record, process, in 
            $worker_job_abroad = $this->calculate($dataworker, 14, 2, $org_name . '_number');  //record, process, in 
            $worker_death = $this->calculate($dataworker, 9, 2, $org_name . '_number');  //record, process, in 
            $worker_martyr = $this->calculate($dataworker, 10, 2, $org_name . '_number');  //record, process, in 





            $worker_demotion = $this->sum_manpower($manpower_record,   'worker_demotion');

            $worker_improvement_d = $asso_improvement;
            $total_worker_decrease = $worker_improvement_d + $worker_endstd  + $worker_transfer  + $worker_cancel  + $worker_study_abroad + $worker_job_abroad + $worker_death + $worker_martyr + $worker_demotion;

            $worker_target = $worker_prev  + $member_prev  + $asso_prev;

            $current_worker = $worker_prev + $worker_improvement + $worker_arrival - $total_ac_decrease;





            $this->excel->getActiveSheet()->SetCellValue('C' . $row, $worker_prev);
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, $current_worker);
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, $worker_improvement + $worker_arrival);
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, $worker_improvement);
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, $worker_arrival);
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, $worker_target);
            $this->excel->getActiveSheet()->SetCellValue('I' . $row, ($worker_target > 0) ? round(100 * $worker_improvement / $worker_target, 2) : 0);
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, $total_worker_decrease);
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, $worker_improvement_d);
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, $worker_endstd);
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, $worker_transfer);
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, $worker_cancel);
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, $worker_study_abroad);
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, $worker_job_abroad);
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, $worker_death);
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, $worker_martyr);
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, $worker_demotion);
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, '');
            //worker ends


            $row = 19;
            $this->excel->getActiveSheet()->SetCellValue('C' . $row, '=SUM(C14,C16,C18)');
            $this->excel->getActiveSheet()->SetCellValue('D' . $row, '=SUM(D14,D16,D18)');
            $this->excel->getActiveSheet()->SetCellValue('E' . $row, '=SUM(E14,E16,E18)');
            $this->excel->getActiveSheet()->SetCellValue('F' . $row, '=SUM(F14,F16,F18)');
            $this->excel->getActiveSheet()->SetCellValue('G' . $row, '=SUM(G14,G16,G18)');
            $this->excel->getActiveSheet()->SetCellValue('H' . $row, '=SUM(H14,H16,H18)');
            //$this->excel->getActiveSheet()->SetCellValue('I'.$row, '=SUM(I14,I16,I18)');  
            $this->excel->getActiveSheet()->SetCellValue('J' . $row, '=SUM(J14,J16,J18)');
            $this->excel->getActiveSheet()->SetCellValue('K' . $row, '=SUM(K14,K16,K18)');
            $this->excel->getActiveSheet()->SetCellValue('L' . $row, '=SUM(L14,L16,L18)');
            $this->excel->getActiveSheet()->SetCellValue('M' . $row, '=SUM(M14,M16,M18)');
            $this->excel->getActiveSheet()->SetCellValue('N' . $row, '=SUM(N14,N16,N18)');
            $this->excel->getActiveSheet()->SetCellValue('O' . $row, '=SUM(O14,O16,O18)');
            $this->excel->getActiveSheet()->SetCellValue('P' . $row, '=SUM(P14,P16,P18)');
            $this->excel->getActiveSheet()->SetCellValue('Q' . $row, '=SUM(Q14,Q16,Q18)');
            $this->excel->getActiveSheet()->SetCellValue('R' . $row, '=SUM(R14,R16,R18)');
            $this->excel->getActiveSheet()->SetCellValue('S' . $row, '=SUM(S14,S16,S18)');
            $this->excel->getActiveSheet()->SetCellValue('T' . $row, '=SUM(T14,T16,T18)');

            $this->excel->getActiveSheet()->getStyle("B" . $row . ":T" . $row)->getBorders()
                ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);


            $filename = 'manpower_report';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function export($branch = NULL, $type = 'member')
    {
        if (0 && !$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->sma->checkPermissions('index', TRUE);
        if ($type == 'member') {

            $this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('member')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife,education,associatecode,member_oath_date,associate_oath_date,{$this->db->dbprefix('district')}.name as district,  upazilla.name AS upazilla_name, {$this->db->dbprefix('institution')}.institution_type,subject,prossion_target,prossion_target_sub,education_institution,CASE is_forum WHEN 1 THEN 'Yes' ELSE 'No' END as is_forum,current_profession,orgstatus_at_forum,education_qualification,type_of_profession,type_higher_education,mobile,opposition,date_death,higher_education_institution,{$this->db->dbprefix('manpower')}.email,{$this->db->dbprefix('countries')}.name as foreign_country,foreign_address,myr_serial,how_death,prossion_target,prossion_target_sub,thana_code,institution_type_child,institution_type_child,
                thana_code,	blood_group,
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
                ->from('member')
                ->join('manpower', 'manpower.id=member.manpower_id', 'left')
                ->join('branches', 'branches.id=member.branch', 'left')
                ->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
                ->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
                ->join('countries', 'manpower.foreign_country=countries.id', 'left')
                ->join('district', 'manpower.district=district.id', 'left')
                ->join('district upazilla', 'manpower.upazila=upazilla.id', 'left')
                ->order_by('manpower.member_oath_date ASC');

            // $this->db->where($this->db->dbprefix('institution') . ".type", 2);
            $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
        }
        if ($branch)
            $this->db->where($this->db->dbprefix('branches') . ".id", $branch);

        //  $this->db->where($this->db->dbprefix('manpower') . ".id", 7146);

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


            $field_arr = array(
                'membercode',
                'name',
                'branch_name',
                'institution_type',
                'institution_type_child',
                'sessionyear',
                'subject',
                'responsibility',
                'member_oath_date',
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

            //   prossion_target,prossion_target_sub,thana_code,institution_type_child

            //  for cellValue 
            $process_Title = 'সদস্য তালিকা';

            $in_out = null;

            $this->sheetcellValue($branch_id, $field_arr, $data, $process_Title, $in_out);

            //    $filename = 'associate_list'.($branch ? '_'.$branch: '');



            $filename = 'member_list' . '_' . $this->input->get('year') . ($branch ? '_' . $branch : '');
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
            ->select($this->db->dbprefix('manpower') . ".id as manpowerid, {$this->db->dbprefix('postpone')} .id as id,  membercode, thana_code,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('postpone')}.start_date as start_date,
				{$this->db->dbprefix('institution')}.institution_type, sessionyear, subject,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,{$this->db->dbprefix('manpower')}.note", FALSE)
            ->from('postpone')
            ->join('manpower', 'manpower.id=postpone.manpower_id', 'left')
            ->where('postpone.end_date', '2050-12-31')->where('manpower.orgstatus_id', 1)->join('institution', 'manpower.institution_type=institution.id AND institution.type = 2', 'left')
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


        // $this->sma->print_arrays($data);


        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Postpone list');

            //eeeeee
            $field_arr = array(
                'membercode',
                'name',
                'branch_name',
                'thana_code',
                'institution_type',
                'sessionyear',
                'subject',
                'responsibility',
                'start_date',
                'note',

            );

            //  for cellValue 
            $process_Title = 'সদস্য মুলতবি';

            $in_out = null;




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





        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));
        $flag = 1;
        $msg = 'done';

        if ($is_changeable) {

            if ($this->input->get_post('name') == 'member_candidate_candidate_target') {

                $prev_manpower = $this->getPrev('annual', $report_type['prev_record'], $this->input->get_post('branch_id'));


                if ($prev_manpower[0]['member'] > $this->input->get_post('value')) {
                    echo json_encode(array('flag' => $flag, 'msg' => 'Enter larger number than member(' . $prev_manpower[0]['member'] . ').'));
                    exit;
                }
            } else   if ($this->input->get_post('name') == 'associate_candidate_improvement_target') {

                $prev_manpower = $this->getPrev('annual', $report_type['prev_record'], $this->input->get_post('branch_id'));


                if ($prev_manpower[0]['associate'] > $this->input->get_post('value')) {
                    echo json_encode(array('flag' => $flag, 'msg' => 'Enter larger number than associate(' . $prev_manpower[0]['associate'] . ').'));
                    exit;
                }
            }


            if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
                $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value')), array('id' => $this->input->get_post('pk')));
                $flag = 2;  //update
            } elseif ($this->input->get_post('branch_id')) {
                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'),   'date' => date('Y-m-d')));
                $flag = 3;  //new entry
            }
        } else
            $msg = 'failed';

        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }



    function getName($id = NULL)
    {

        $row = $this->site->getByID('manpower', 'id', $id);
        $this->sma->send_json(array(array('id' => $row->id, 'text' => $row->name . '(' . $row->associatecode . ')')));
    }



    function manpower_institution($id = NULL)
    {

        $html =  $this->load->view($this->theme . 'ajax/' . $id, array('institution_type_id' => $id), true);
        $this->sma->send_json(array('html' => $html));
    }



    //


    function manpower_output($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/manpower_output/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/manpower_output/' . $this->session->userdata('branch_id'));
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


        $this->load->admin_model('organization_model');


        $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);


        $where = "";

        if ($branch_id)
            $where = " branch = $branch_id AND ";

        $this->data['output_record'] = $this->site->query("SELECT  
        SUM(`single_digit`) single_digit,
        SUM(`jsc_jdc`) jsc_jdc,
        SUM(`ssc_dhakil`) ssc_dhakil,
        SUM(`hsc_alim`) hsc_alim,
        SUM(`department_position`) department_position,
        SUM(`department_position_private`) department_position_private,
        SUM(`influential`) influential,
        SUM(`hc_science`) hc_science,
        SUM(`madrasha`) madrasha,
        SUM(`medical_college`) medical_college,
        SUM(`ideal_college`) ideal_college,
        SUM(`engineeering`) engineeering,
        SUM(`agri`) agri,
        SUM(`science`) science,
        SUM(`business`) business,
        SUM(`arts`) arts,

        institution_type
        FROM `sma_manpower`  WHERE $where institution_type IS NOT NULL AND `orgstatus_id` IN (1,2,12) GROUP BY `institution_type` ");



        $this->data['output_record_sum_member'] = $this->site->query("SELECT  
SUM(`single_digit`) single_digit,
SUM(`jsc_jdc`) jsc_jdc,
SUM(`ssc_dhakil`) ssc_dhakil,
SUM(`hsc_alim`) hsc_alim,
SUM(`department_position`) department_position,
SUM(`department_position_private`) department_position_private,
SUM(`influential`) influential,
SUM(`hc_science`) hc_science,
SUM(`madrasha`) madrasha,
SUM(`medical_college`) medical_college,
SUM(`ideal_college`) ideal_college,
SUM(`engineeering`) engineeering,
SUM(`agri`) agri,
SUM(`science`) science,
SUM(`business`) business,
SUM(`arts`) arts
FROM `sma_manpower`  WHERE $where institution_type IS NOT NULL AND `orgstatus_id` IN (1) ");



        $this->data['output_record_sum_asso'] = $this->site->query("SELECT  
SUM(`single_digit`) single_digit,
SUM(`jsc_jdc`) jsc_jdc,
SUM(`ssc_dhakil`) ssc_dhakil,
SUM(`hsc_alim`) hsc_alim,
SUM(`department_position`) department_position,
SUM(`department_position_private`) department_position_private,
SUM(`influential`) influential,
SUM(`hc_science`) hc_science,
SUM(`madrasha`) madrasha,
SUM(`medical_college`) medical_college,
SUM(`ideal_college`) ideal_college,
SUM(`engineeering`) engineeering,
SUM(`agri`) agri,
SUM(`science`) science,
SUM(`business`) business,
SUM(`arts`) arts
FROM `sma_manpower`  WHERE $where institution_type IS NOT NULL AND `orgstatus_id` IN (2,12)");




        if ($branch_id)   //&& (  !$this->Owner && !$this->Admin  )
        {
            $this->data['detailinfo'] = $this->getEntryInfoOutput($report_type, $branch_id);
        } else {
            $this->data['detailinfo'] = $this->getEntryInfoOutputSUM($report_type, $branch_id);
        }
        // $this->data['manpoweroutput'] = $this->getManpowerOutput($branch_id); 




        $this->data['m'] = 'manpower_output';
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সকল জনশক্তির আউটপুট')));
        $meta = array('page_title' => lang('সকল জনশক্তির আউটপুট'), 'bc' => $bc);


        //  $this->sma->print_arrays( $this->data['detailinfo']['increase_outputinfo']);


        if ($branch_id)
            $this->page_construct('manpower/manpower_output_entry', $meta, $this->data, 'leftmenu/manpower');
        else
            $this->page_construct('manpower/manpower_output', $meta, $this->data, 'leftmenu/manpower');
    }






    function getEntryInfoOutput($report_type_get, $branch_id = NULL)
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];




        //$report_type_get['is_current']


        if ($report_type_get['is_current'] != false) {
            if ($report_type == 'half_yearly') {


                ///half_yearly starts
                $increase_outputinfo = $this->site->getOneRecord('manpower_output', '*', array('report_type' => 'half_yearly', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$increase_outputinfo) {
                    $this->site->insertData('manpower_output', array('branch_id' => $branch_id, 'report_type' => 'half_yearly', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///half_yearly ends


            } else {


                ///annual starts
                $increase_outputinfo = $this->site->getOneRecord('manpower_output', '*', array('report_type' => 'annual', 'branch_id' => $branch_id, 'date < ' => $report_end, 'date > ' => $report_start), 'id desc', 1, 0);

                if (!$increase_outputinfo) {
                    $this->site->insertData('manpower_output', array('branch_id' => $branch_id, 'report_type' => 'annual', 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
                }



                ///annual ends

            }
        }





        if ($report_type == 'annual' && $report_type_get['last_half']) {


            $increase_outputinfo = $this->site->getOneRecord('sma_manpower_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        } else if ($report_type && $report_type == 'annual') {


            $increaseoutputinfo =  $this->site->query_binding("SELECT  SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
        SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university,  SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential,   SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science, SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,  SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement,   SUM(`worker_department_position_private`) as worker_department_position_private, SUM(`supporter_department_position_private`) as supporter_department_position_private,SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college
        FROM `sma_manpower_output` where  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $report_start, $report_end));
            //$increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$end,'date >= '=>$start),'id desc',1,0);	


            $increase_outputinfo = (object)$increaseoutputinfo[0];
            $increase_outputinfo->id = 999999999999;

            //    $increase_outputinfo = $this->site->getOneRecord('increase_output','*',array('branch_id'=>$branch_id,'date <= '=>$entrytimeinfo->enddate_annual,'date >= '=>$entrytimeinfo->startdate_half),'id desc',1,0);	

        } else if ($report_type  && $report_type  == 'half_yearly') {

            $increase_outputinfo = $this->site->getOneRecord('sma_manpower_output', '*', array('branch_id' => $branch_id, 'date <= ' => $report_end, 'date >= ' => $report_start), 'id desc', 1, 0);
        }



        return array(
            'increase_outputinfo' => isset($increase_outputinfo) ? $increase_outputinfo : ''
        );
    }



    function getEntryInfoOutputSUM($report_type_get, $branch_id = NULL) //branch_id can deleted
    {


        $report_start = $report_type_get['start'];
        $report_end = $report_type_get['end'];
        $report_type = $report_type_get['type'];
        $report_year = $report_type_get['year'];



        $result =  $this->site->query_binding("SELECT 
  SUM(`worker_single_digit`) as worker_single_digit ,SUM(`worker_jsc_jdc`) as worker_jsc_jdc,SUM(`worker_ssc_dhakil`) as worker_ssc_dhakil,SUM(`worker_hsc_alim`) as worker_hsc_alim,SUM(`worker_science`) as worker_science,SUM(`worker_arts`) as worker_arts, SUM(`worker_business`) as worker_business, SUM(`worker_madrasha`) as worker_madrasha,SUM(`worker_department_position`) as worker_department_position, SUM(`worker_medical_college`) as worker_medical_college, SUM(`worker_engineeering`) as worker_engineeering, SUM(`worker_public_university`) as worker_public_university,
        SUM(`supporter_single_digit`) as supporter_single_digit ,SUM(`supporter_jsc_jdc`) as supporter_jsc_jdc,SUM(`supporter_ssc_dhakil`) as supporter_ssc_dhakil,SUM(`supporter_hsc_alim`) as supporter_hsc_alim,SUM(`supporter_science`) as supporter_science,SUM(`supporter_arts`) as supporter_arts, SUM(`supporter_business`) as supporter_business, SUM(`supporter_madrasha`) as supporter_madrasha,SUM(`supporter_department_position`) as supporter_department_position, SUM(`supporter_medical_college`) as supporter_medical_college, SUM(`supporter_engineeering`) as supporter_engineeering, SUM(`supporter_public_university`) as supporter_public_university,  SUM(`worker_influential`) as worker_influential,SUM(`supporter_influential`) as supporter_influential,   SUM(`worker_hc_science`) as worker_hc_science,SUM(`supporter_hc_science`) as supporter_hc_science, SUM(`worker_agri`) as worker_agri,SUM(`supporter_agri`) as supporter_agri,  SUM(`worker_improvement`) as worker_improvement,SUM(`supporter_improvement`) as supporter_improvement,   SUM(`worker_department_position_private`) as worker_department_position_private, SUM(`supporter_department_position_private`) as supporter_department_position_private,SUM(`worker_ideal_college`) as worker_ideal_college, SUM(`supporter_ideal_college`) as supporter_ideal_college
        
FROM `sma_manpower_output` where   date BETWEEN ? AND ? ", array($report_start, $report_end));

        return array(
            'increase_outputinfo' => isset($result[0]) ? $result[0] : ''
        );
    }



    function find_id($value, $array, $field)
    {

        foreach ($array as $row) {


            if ($value == $row->{$field})
                return $row->id;
        }
        return '';
    }

    function find_upazila_id($district, $upazila, $array, $field)
    {


        $district_id = null;

        foreach ($array as $row) {


            if ($district == $row->{$field}) {
                $district_id = $row->id;
                break;
            }
            
        }
        
        
        foreach ($array as $row) {


            if ($upazila == $row->{$field} && $district_id==$row->parent_id)
                return $row->id;
        }
        return '0';
    }


    



    function getvalue($value, $array, $field)
    {


        foreach ($array as $row) {

            if ($row->id == $value)
                return $row->{$field};
        }


        return '';
    }


    function update_info($branch, $org)
    {

        //  exit();
        $this->sma->checkPermissions('index', TRUE);


        $this->form_validation->set_rules('userfile', lang("upload_file"), 'xss_clean');


        // $this->sma->print_arrays(  $csv);


        if ($this->form_validation->run() == true) {

            if (DEMO) {
                $this->session->set_flashdata('message', lang("disabled_in_demo"));
                admin_redirect('welcome');
            }

            if (isset($_FILES["userfile"])) {

                $this->load->library('upload');
                $config['upload_path'] = $this->digital_upload_path;
                $config['allowed_types'] = 'xlsx';
                $config['max_size'] = $this->allowed_file_size;
                $config['overwrite'] = TRUE;
                $config['encrypt_name'] = TRUE;
                $config['max_filename'] = 25;
                $this->upload->initialize($config);

                if (!$this->upload->do_upload()) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    admin_redirect($_SERVER["HTTP_REFERER"]);
                }

                $csv = $this->upload->file_name;

                $arrResult = array();



                $inputFileName = $this->digital_upload_path . $csv;




                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
                // $sheet=$excel->setActiveSheetIndex(0)

                $manpowers = $objPHPExcel->getActiveSheet()->toArray();
                // $this->sma->print_arrays(  $schdeules);


                // $sheet = $excel->getActiveSheet()->toArray(null,true,true,true);


                $districts = $this->site->getDistrictnUpozilla();
                $responsibilities = $this->site->getAll('responsibilities');
                $countries = $this->site->getAll('countries');
                $targets = $this->site->getAll('profession_target');
                $institution_type = $this->site->getAll('institution');


                // $this->sma->print_arrays(  $manpowers[0][0]);
                if (!(isset($manpowers[0][0]) && $manpowers[0][0] == 'import_update')) {

                    $this->session->set_flashdata('error', 'Your are uploading wrong file.');
                    //admin_redirect("system_settings/group_product_prices/".$group_id);
                    redirect($_SERVER["HTTP_REFERER"]);
                }


                $final = array();

                foreach ($manpowers as $key => $value) if ($key > 4 && !empty($value[0])) {
                    $final[] = array(
                        'id' => $value[1],
                        'name' => $value[4],
                        'thana_code' => $value[5],
                        'institution_type' => $this->find_id($value[6], $institution_type, 'institution_type'),  //list
                        'institution_type_child' => $this->find_id($value[7], $institution_type, 'institution_type'), //list
                        'sessionyear' => $value[8],
                        'subject' => $value[9],
                        'responsibility_id' => $this->find_id($value[10], $responsibilities, 'responsibility'),  //list
                        'prossion_target_id' => $this->find_id($value[11], $targets, 'name'),  //list
                        'prossion_target_sub_it' => $this->find_id($value[12], $targets, 'name'),  //list
                        'blood_group' => $value[13],
                        'district' => $this->find_id($value[14], $districts, 'name'),   //list
                        'upazila' => $this->find_upazila_id($value[14],$value[15], $districts, 'name'),   //list
                        'single_digit' =>  $value[16] == 1 ? 1 : 0,
                        'jsc_jdc' => $value[17] == 1 ? 1 : 0,
                        'ssc_dhakil' => $value[18] == 1 ? 1 : 0,
                        'hsc_alim' => $value[19] == 1 ? 1 : 0,
                        'department_position' => $value[20] == 1 ? 1 : 0,
                        'department_position_private' => $value[21] == 1 ? 1 : 0,
                        'influential' => $value[22] == 1 ? 1 : 0,
                        'hc_science' => $value[23] == 1 ? 1 : 0,
                        'madrasha' => $value[24] == 1 ? 1 : 0,
                        'medical_college' => $value[25] == 1 ? 1 : 0,
                        'ideal_college' => $value[26] == 1 ? 1 : 0,
                        'engineeering' => $value[27] == 1 ? 1 : 0,
                        'agri' => $value[28] == 1 ? 1 : 0,
                        'science' => $value[29] == 1 ? 1 : 0,
                        'business' => $value[30] == 1 ? 1 : 0,
                        'arts' => $value[31] == 1 ? 1 : 0
                    );
                }
                 //  $this->sma->print_arrays(  $final);

            }
        } elseif ($this->input->post('update_info')) {
            $this->session->set_flashdata('error', validation_errors());
            //admin_redirect("system_settings/group_product_prices/".$group_id);
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->form_validation->run() == true && !empty($final)) {

            $where = array();

            if ($this->session->userdata('branch_id'))
                $where['branch'] = $this->session->userdata('branch_id');
            //else if($this->Owner || $this->Admin) 

            foreach ($final as $manpower_row) {
                $where['id'] = $manpower_row['id'];
                unset($manpower_row['id']);
                $this->manpower_model->manpowerUpdate('manpower', $manpower_row, $where);
            }

            $this->session->set_flashdata('message', lang("info_updated"));
            redirect($_SERVER["HTTP_REFERER"]);
        } else {

            $this->data['userfile'] = array(
                'name' => 'userfile',
                'id' => 'userfile',
                'type' => 'text',
                'value' => $this->form_validation->set_value('userfile')
            );
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['org'] = $org;
            $this->data['branch'] = $branch;
            $this->load->view($this->theme . 'manpower/update_info', $this->data);
        }
    }
}
