<?php defined('BASEPATH') or exit('No direct script access allowed');

class ManpowerTransfer extends MY_Controller
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





    function add($id = NULL)
    {

        $this->load->admin_model('organization_model');
        //   $this->sma->print_arrays($_POST, $_GET);

        $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
        // $this->load->admin_model('organization_model');

        $branches = $this->site->getAllBranches();

        $this->form_validation->set_rules('date', 'Oath date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('responsibility', 'Responsibility', 'required');
        $this->form_validation->set_rules('sessionyear', 'sessionyear', 'required');
        //$this->form_validation->set_rules('education', 'education', 'required');
        //$this->form_validation->set_rules('notes', 'Note', 'required');



        //$this->sma->print_arrays($lastassocode);
        //$this->sma->print_arrays($branchcode);		

        if ($this->form_validation->run() == true) {


            // $this->sma->print_arrays($branchinfo->last_assocode);

            //new manpower
            $data = array(
                'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'from_branch_id' => $this->input->post('branch'),
                'to_branch_id' => $this->input->post('to_branch'),
                'session' => $this->input->post('sessionyear'),
                'responsibility' => $this->input->post('responsibility'),
                //'education' => $this->input->post('education'),
                'name' => $this->input->post('name'),
                'orgstatus_id' => $this->input->post('orgstatus_id'),
                'process_date' => date('Y-m-d'),
                'user_id' => $this->session->userdata('user_id'),
                'institution_type' =>  $this->input->post('institution_type'),
                'note' => $this->input->post('notes'),
            );



            $is_changeable = $this->site->check_confirm($this->input->post('branch'), date('Y-m-d'));
            $is_changeable_2 = $this->site->check_confirm($this->input->post('to_branch'), date('Y-m-d'));



            if ($is_changeable == false || $is_changeable_2 == false) {
                $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
                redirect($_SERVER["HTTP_REFERER"]);
            }



            $return_id = $this->site->insertData('manpower_transfer_assoworker', $data, 'id');

            $this->session->set_flashdata('message', 'Added');
            admin_redirect('manpowertransfer/add');
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

            $this->data['responsibilities'] = $this->site->getAll('responsibilities');

            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);

            $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সাথী প্রার্থী/কর্মী স্থানান্তর')));
            $meta = array('page_title' => lang('সাথী প্রার্থী/কর্মী স্থানান্তর'), 'bc' => $bc);
            $this->page_construct('manpowertransfer/assoworkertransfer', $meta, $this->data, 'leftmenu/manpower');
        }
    }




    function transfer($branch_id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpower/member/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpower/member/' . $this->session->userdata('branch_id'));
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

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('manpower')));
        $meta = array('page_title' => lang('manpower'), 'bc' => $bc);
        $this->page_construct('manpowertransfer/transfer', $meta, $this->data, 'leftmenu/manpower');
    }




    function getList($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Accept Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/accept/$1/$2') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/cancel/$1/$2') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer') . ".id as id, {$this->db->dbprefix('manpower')}.name,{$this->db->dbprefix('manpower')}.id as manpower_id,{$this->db->dbprefix('manpower')}.membercode as membercode, {$this->db->dbprefix('manpower')}.associatecode as associatecode, t1.name as from_branch, t2.name as to_branch,orgstatus.status_name,{$this->db->dbprefix('manpower_transfer')}.note", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer')->where('manpower_transfer.to_branch_id', $branch_id);
        } else {
            $this->datatables
                ->select("manpower_transfer.id as id, manpower.name, {$this->db->dbprefix('manpower')}.id as manpower_id,{$this->db->dbprefix('manpower')}.membercode as membercode, {$this->db->dbprefix('manpower')}.associatecode as associatecode,t1.name as from_branch, t2.name as to_branch,orgstatus.status_name,manpower_transfer.note", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer');
        }

        $this->datatables->add_column("Actions", $action, "id,manpower_id");
        $this->datatables->unset_column("manpower_id");

        

        echo $this->datatables->generate();
    }


    function getStudentshipList($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Approve</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/stdaccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/stdcancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');
        //is_studentship_pending  => waiting for approval stdend, job at abroad, higher education
        if ($branch_id) {
            $this->datatables
                ->select("manpower.id as id, t5.process,  t1.name as branch,{$this->db->dbprefix('manpower')}.membercode as membercode, manpower.member_oath_date, manpower.name, manpower.sessionyear,manpower.masters_complete_status,t2.responsibility,manpower.current_profession,CASE 
                WHEN t3.process_id = 8 THEN  sma_manpower.note
                WHEN t3.process_id = 11 THEN  CONCAT(COALESCE(sma_manpower.type_higher_education) ,', ' ,  t4.name)
                WHEN t3.process_id = 14 THEN  CONCAT(COALESCE(sma_manpower.foreign_address) ,', ' ,  t4.name) 
               END
               note ,manpower.caretaker_contact_status", FALSE)
                ->join('branches as t1', 't1.id=manpower.branch', 'left')
                ->join('responsibilities as t2', 't2.id=manpower.responsibility_id', 'left')
                ->join('memberlog as t3', 't3.manpower_id=manpower.id', 'left')
                ->join('countries as t4', 't4.id=manpower.foreign_country', 'left')
                ->join('process as t5', 't5.id=t3.process_id', 'left')
                ->from('manpower')
                ->where('manpower.branch', $branch_id)
                ->where('is_studentship_pending', 1)
                ->where('is_log_pending', 1);
        } else {
            $this->datatables
                ->select("manpower.id as id,t5.process, t1.name as branch,{$this->db->dbprefix('manpower')}.membercode as membercode, manpower.member_oath_date, manpower.name, manpower.sessionyear,manpower.masters_complete_status,t2.responsibility,manpower.current_profession,CASE 
                WHEN t3.process_id = 8 THEN  sma_manpower.note
                WHEN t3.process_id = 11 THEN  CONCAT(COALESCE(sma_manpower.type_higher_education) ,', ' ,  t4.name)
                WHEN t3.process_id = 14 THEN  CONCAT(COALESCE(sma_manpower.foreign_address) ,', ' ,  t4.name) 
               END
               note ,manpower.caretaker_contact_status", FALSE)
                ->join('branches as t1', 't1.id=manpower.branch', 'left')
                ->join('responsibilities as t2', 't2.id=manpower.responsibility_id', 'left')
                ->join('memberlog as t3', 't3.manpower_id=manpower.id', 'left')
                ->join('countries as t4', 't4.id=manpower.foreign_country', 'left')
                ->join('process as t5', 't5.id=t3.process_id', 'left')
                ->from('manpower')
                ->where('is_studentship_pending', 1)
                ->where('is_log_pending', 1);
        }

        $this->datatables->add_column("Actions", $action, "id");

        echo $this->datatables->generate();
    }




    function getMembercandidatePendingList($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Approve</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/candidatependingaccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/candidatependingcancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');
        //is_studentship_pending  => waiting for approval stdend, job at abroad, higher education
        if ($branch_id) {
            $this->datatables
                ->select("t3.id as id, t5.process,  t1.name as branch,{$this->db->dbprefix('manpower')}.associatecode as associatecode,  manpower.name, manpower.sessionyear,manpower.masters_complete_status,t2.responsibility,manpower.current_profession,CASE 
                WHEN t3.process_id = 8 THEN  sma_manpower.note
                WHEN t3.process_id = 11 THEN  CONCAT(COALESCE(sma_manpower.type_higher_education) ,', ' ,  t4.name)
                WHEN t3.process_id = 14 THEN  CONCAT(COALESCE(sma_manpower.foreign_address) ,', ' ,  t4.name) 
               END
               note ,manpower.caretaker_contact_status", FALSE)
                ->join('branches as t1', 't1.id=manpower.branch', 'left')
                ->join('responsibilities as t2', 't2.id=manpower.responsibility_id', 'left')
                ->join('member_candidatelog as t3', 't3.manpower_id=manpower.id', 'left')
                ->join('countries as t4', 't4.id=manpower.foreign_country', 'left')
                ->join('process as t5', 't5.id=t3.process_id', 'left')
                ->from('manpower')
                ->where('manpower.branch', $branch_id)
                ->where('is_studentship_pending', 1)
                ->where('is_log_pending', 1);
                $this->datatables->add_column("Actions",$action, "id");
        } else {
            $this->datatables
                ->select("t3.id as id,t5.process, t1.name as branch,{$this->db->dbprefix('manpower')}.associatecode as associatecode,  manpower.name, manpower.sessionyear,manpower.masters_complete_status,t2.responsibility,manpower.current_profession,CASE 
                WHEN t3.process_id = 8 THEN  sma_manpower.note
                WHEN t3.process_id = 11 THEN  CONCAT(COALESCE(sma_manpower.type_higher_education) ,', ' ,  t4.name)
                WHEN t3.process_id = 14 THEN  CONCAT(COALESCE(sma_manpower.foreign_address) ,', ' ,  t4.name) 
               END
               note ,manpower.caretaker_contact_status", FALSE)
                ->join('branches as t1', 't1.id=manpower.branch', 'left')
                ->join('responsibilities as t2', 't2.id=manpower.responsibility_id', 'left')
                ->join('member_candidatelog as t3', 't3.manpower_id=manpower.id', 'left')
                ->join('countries as t4', 't4.id=manpower.foreign_country', 'left')
                ->join('process as t5', 't5.id=t3.process_id', 'left')
                ->from('manpower')
                ->where('is_studentship_pending', 1)
                ->where('is_log_pending', 1);
                $this->datatables->add_column("Actions", $action, "id");
        }

       

        echo $this->datatables->generate();
    }




    function getListPending($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Accept Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/accept/$1/$2') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1OLD' id='a__$1' href='" . admin_url('manpowertransfer/cancel/$1/$2') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');
        // $branch_id = 1;
        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer') . ".id as id,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('manpower')}.membercode as membercode, {$this->db->dbprefix('manpower')}.associatecode as associatecode,{$this->db->dbprefix('manpower')}.id as manpower_id,t1.name as from_branch, t2.name as to_branch,orgstatus.status_name,{$this->db->dbprefix('manpower_transfer')}.note", FALSE)
                ->join('manpower', 'manpower.id=manpower_transfer.manpower_id', 'left')
                ->join('branches as t1', 't1.id=manpower_transfer.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer.orgstatus_id', 'left')
                ->from('manpower_transfer')->where('manpower_transfer.from_branch_id', $branch_id);
        }
        $this->datatables->add_column("Actions", $action, "id,manpower_id");
        $this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }










    function getListAssWorker($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Accept Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/assoworkeraccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/assoworkercancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li>' . $accept . '</li>';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name, {$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type, {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('manpower_transfer_assoworker.to_branch_id', $branch_id)->where('status', 2);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 2);
        }

        $this->datatables->add_column("Actions", $action, "id");
        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }



    function getListAssWorkerPending($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $accept = "<a href='#' class='tip po' title='<b>Accept Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger' id='a__$1' href='" . admin_url('manpowertransfer/assoworkeraccept/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-check\"></i> "
            . 'Accept' . "</a>";

        $cancel = "<a href='#' class='tip po' title='<b>Cancel Transfer</b>' data-content=\"<p>"
            . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete1OLD' id='a__$1' href='" . admin_url('manpowertransfer/assoworkercancel/$1') . "'>"
            . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i> "
            . 'Cancel' . "</a>";

        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>
            <li>' . $cancel . '</li>
            </ul>
        </div></div>';


        $this->load->library('datatables');
        // $branch_id = 1;
        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)

                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('manpower_transfer_assoworker.from_branch_id', $branch_id)->where('status', 2);
        }
        $this->datatables->add_column("Actions", $action, "id");
        $this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }







    function stdaccept($manpower_id = null)
    {

        $this->sma->checkPermissions('index', TRUE);
        $member_info = $this->site->getByID('manpower', 'id', $manpower_id);

        $branch_id =   $member_info->branch;





        $is_changeable = $this->site->check_confirm($member_info->branch, date('Y-m-d'));


        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }

       

        if ( !($this->Owner || $this->Admin)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }


        if ($member_info->orgstatus_id == 1) {


            $data_member = array(
                'end_date' => date('Y-m-d', strtotime('-1 day', time())),
                'is_member_now' => 2
            );
            $member_where = array(
                'manpower_id' => $manpower_id,
                'branch' => $branch_id
            );
            $this->manpower_model->manpowerUpdate('member', $data_member, $member_where);



            $data_member_log = array(
                'process_date' => $data_member['end_date'],
                'is_log_pending' => 0
                //'note' => $note 
            );
            $member_log_where = array(

                'manpower_id' => $manpower_id,
                'in_out' => 2,
                //'process_id' => 8,
                'branch' => $branch_id,
                'is_log_pending' => 1
                //'note' => $note 
            );


            $this->site->updateData('memberlog', $data_member_log, $member_log_where);


            $manpower_update_arr['is_pending'] = 0;
            $manpower_update_arr['is_studentship_pending'] = 0;
            $manpower_update_arr['thana_code'] = '';
            $manpower_update_arr['orgstatus_id'] = NULL;
            $manpower_update_arr['studentlife'] = 2;


            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower_id));



            // $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $manpowerid));

        }




        $this->session->set_flashdata('message', 'Approved successfully.');
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function stdcancel($manpower_id = null)
    {

        $this->sma->checkPermissions('index', TRUE);
        $member_info = $this->site->getByID('manpower', 'id', $manpower_id);

        $branch_id =   $member_info->branch;





        $is_changeable = $this->site->check_confirm($member_info->branch, date('Y-m-d'));


        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }

 
        if ( !($this->Owner || $this->Admin)  && ($member_info->branch != $this->session->userdata('branch_id'))) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }
    

        if ($member_info->orgstatus_id == 1) {

            $member_log_where = array(

                'manpower_id' => $manpower_id,
                'in_out' => 2,
                //'process_id' => 8,
                'branch' => $branch_id,
                'is_log_pending' => 1
                //'note' => $note 
            );

            $this->site->delete('memberlog', $member_log_where);
            $manpower_update_arr['is_pending'] = 0;
            $manpower_update_arr['is_studentship_pending'] = 0;
            $manpower_update_arr['studentlife'] = 1;
            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower_id));
        }




        $this->session->set_flashdata('message', 'Cancelled successfully');
        redirect($_SERVER["HTTP_REFERER"]);
    }


























    function candidatependingaccept($id = null)
    {

        $this->sma->checkPermissions('index', TRUE);
        $membercandidate_log_info = $this->site->getByID('member_candidatelog', 'id', $id);
        $manpower_id = $membercandidate_log_info->manpower_id;
        $membercandidate_info = $this->site->getByID('manpower', 'id', $manpower_id);

        $branch_id =   $membercandidate_info->branch;





        $is_changeable = $this->site->check_confirm($membercandidate_info->branch, date('Y-m-d'));


        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        if ( !($this->Owner || $this->Admin)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }


        if ($membercandidate_info->orgstatus_id == 12) {




            //closeing mc from current branch
            $data_membercandidate = array(
                'end_date' => date('Y-m-d', strtotime('-1 day', time())),
                'is_member_candidate_now' => 2
            );
            $membercandidate_where = array(
                'manpower_id' => $manpower_id,
                'branch' => $branch_id
            );
            $this->manpower_model->manpowerUpdate('member_candidate', $data_membercandidate, $membercandidate_where);







            //updating log for current branch out
            $data_membercandidate_log = array(
                'process_date' => date('Y-m-d', strtotime('-1 day', time())),
                'is_log_pending' => 0
            );
            $membercandidate_log_where = array(
                'manpower_id' => $manpower_id,
                'branch' => $branch_id,
                'in_out' => 2,
                'is_log_pending' => 1,
                'id'=>$id

            );
            $this->manpower_model->manpowerUpdate('member_candidatelog', $data_membercandidate_log, $membercandidate_log_where);






            //decrease asso log
            $assolog = array(
                'process_date' =>  date('Y-m-d', strtotime('-1 day', time())),
                'in_out' => 2,
                'process_id' => $membercandidate_log_info->process_id,
                'manpower_id' => $manpower_id,
                'branch' => $membercandidate_info->branch,
                'note' => $membercandidate_log_info->note,
                'user_id' => $this->session->userdata('user_id')
            );
            $this->site->insertData('associatelog', $assolog);




            //closing asso
            $asso = array(
                'end_date' =>  date('Y-m-d', strtotime('-1 day', time())),
                'is_associate_now' => 2
            );
            $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $membercandidate_info->branch, 'manpower_id' => $manpower_id));







            $manpower_update_arr = array();

            $manpower_update_arr['is_pending'] = 0;
            $manpower_update_arr['is_studentship_pending'] = 0;
            $manpower_update_arr['thana_code'] = '';
            $manpower_update_arr['orgstatus_id'] = NULL;
            $manpower_update_arr['studentlife'] = 2;


            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower_id));



            // $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $manpowerid));

        }




        $this->session->set_flashdata('message', 'Approved successfully.');
        redirect($_SERVER["HTTP_REFERER"]);
    }


    function candidatependingcancel($id = null)
    {

        $this->sma->checkPermissions('index', TRUE);

        $membercandidate_log_info = $this->site->getByID('member_candidatelog', 'id', $id);
        $manpower_id = $membercandidate_log_info->manpower_id;

        $membercandidate_info = $this->site->getByID('manpower', 'id', $manpower_id);
        
        $branch_id =   $membercandidate_info->branch;





        $is_changeable = $this->site->check_confirm($membercandidate_info->branch, date('Y-m-d'));


        if ($is_changeable == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        if ( !($this->Owner || $this->Admin) && ($membercandidate_info->branch != $this->session->userdata('branch_id'))) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }


        if ($membercandidate_info->orgstatus_id == 12) {

            $membercandidate_log_where = array(

                'manpower_id' => $manpower_id,
                'in_out' => 2,
                //'process_id' => 8,
                'branch' => $branch_id,
                'is_log_pending' => 1
                //'note' => $note 
            );

            $this->site->delete('member_candidatelog', $membercandidate_log_where);


            $manpower_update_arr['is_pending'] = 0;
            $manpower_update_arr['is_studentship_pending'] = 0;

            $manpower_update_arr['studentlife'] = 1;


            $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpower_id));
        }




        $this->session->set_flashdata('message', 'Cancelled successfully');
        redirect($_SERVER["HTTP_REFERER"]);
    }




    function accept($transfer_id = NULL, $manpower_id = null)
    {

        $this->sma->checkPermissions('index', TRUE);
        $transfer_info = $this->site->getByID('manpower_transfer', 'id', $transfer_id);

        $branch_id =   $transfer_info->to_branch_id;





        $is_changeable = $this->site->check_confirm($transfer_info->from_branch_id, date('Y-m-d'));
        $is_changeable_2 = $this->site->check_confirm($transfer_info->to_branch_id, date('Y-m-d'));


        if ($is_changeable == false || $is_changeable_2 == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('');
        }


        if ($transfer_info->orgstatus_id == 2)
            $this->associateaccept($transfer_info);
        elseif ($transfer_info->orgstatus_id == 1)
            $this->memberaccept($transfer_info);
        elseif ($transfer_info->orgstatus_id == 12)
            $this->membercandidateaccept($transfer_info);


        $this->session->set_flashdata('message', 'Received successfully.');
        redirect($_SERVER["HTTP_REFERER"]);
    }

    function membercandidateaccept($transfer_info)
    {
        $manpowerid = $transfer_info->manpower_id;
        $manpower = $this->manpower_model->getManpowerByID($manpowerid);
        $processid = 15; //$this->site->getByID('process','id', $process_id);


        $branchid =   $transfer_info->from_branch_id; //old 
        $newbranchid = $transfer_info->to_branch_id;  //new
        $date = date("Y-m-d", strtotime($transfer_info->process_date)); //process_date



        //closeing mc from current branch
        $data_membercandidate = array(
            'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
            'is_member_candidate_now' => 2
        );
        $membercandidate_where = array(
            'manpower_id' => $manpowerid,
            'branch' => $branchid
        );

        $newbranch_info = $this->site->getBranchByID($newbranchid);
        $newbranch_code = $newbranch_info->code;

        $branch_info = $this->site->getBranchByID($branchid);
        $branch_code = $branch_info->code;


        //saving log for current branch out
        $data_membercandidate_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 2,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $branchid,
            'barnch_id_to_from' => $newbranch_code
            //'note' => $note 
        );


        $this->manpower_model->manpowerUpdate('member_candidate', $data_membercandidate, $membercandidate_where);
        $this->manpower_model->insertData('member_candidatelog', $data_membercandidate_log);

        //decrease asso log
        $assolog = array(
            'process_date' =>  $date,
            'in_out' => 2,
            'process_id' => $processid,
            'manpower_id' => $manpowerid,
            'branch' => $manpower->branch,
            'barnch_id_to_from' => $newbranch_code,
            'user_id' => $this->session->userdata('user_id')
        );
        $this->site->insertData('associatelog', $assolog);


        //update asso
        $asso = array(
            'end_date' =>  $date,
            'is_associate_now' => 2
        );
        $this->site->updateData('associate', $asso, array('is_associate_now' => 1, 'branch' => $manpower->branch, 'manpower_id' => $manpowerid));


        $manpower_update_arr['branch'] = $newbranchid;
        $manpower_update_arr['is_pending'] = 0;
        $manpower_update_arr['thana_code'] = '';

        $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));





        //saving log for new branch
        $data_newbranch_membercandidate_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 1,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $newbranchid,
            'barnch_id_to_from' => $branch_code, //$branchid,
            //'note' => $note 
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
            'process_date' =>  $date,
            'in_out' => 1,
            'process_id' => $processid,
            'manpower_id' => $manpowerid,
            'branch' => $newbranchid,
            'barnch_id_to_from' => $branch_code,
            'user_id' => $this->session->userdata('user_id')
        );
        $this->site->insertData('associatelog', $assolog);


        //increase asso new branch

        $asso = array(
            'oath_date' =>  $date,
            'start_date' =>  $date,
            'manpower_id' => $manpowerid,
            'branch' => $newbranchid,
            'user_id' => $this->session->userdata('user_id')
        );
        $this->site->insertData('associate', $asso);




        $this->site->delete('manpower_transfer', array('id' => $transfer_info->id, 'manpower_id' => $manpowerid));

        $this->session->set_flashdata('message', 'Accepted successfully');
        admin_redirect("dashboard");
    }








    function memberaccept($transfer_info)
    {



        $manpowerid = $transfer_info->manpower_id;
        $manpower = $this->manpower_model->getManpowerByID($manpowerid);
        $processid = 15; //$this->site->getByID('process','id', $process_id);


        $branchid =   $transfer_info->from_branch_id; //old 
        $newbranchid = $transfer_info->to_branch_id;  //new
        $date = date("Y-m-d", strtotime($transfer_info->process_date)); //process_date





        $data_member = array(
            'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
            'is_member_now' => 2
        );
        $member_where = array(
            'manpower_id' => $manpowerid,
            'branch' => $branchid
        );

        $newbranch_info = $this->site->getBranchByID($newbranchid);
        $newbranch_code = $newbranch_info->code;

        $branch_info = $this->site->getBranchByID($branchid);
        $branch_code = $branch_info->code;


        $data_member_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 2,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $branchid,
            'barnch_id_to_from' => $newbranch_code
            //'note' => $note 
        );


        $manpower_update_arr['branch'] = $newbranchid;
        $manpower_update_arr['is_pending'] = 0;
        $manpower_update_arr['thana_code'] = '';

        $this->manpower_model->manpowerUpdate('member', $data_member, $member_where);
        $this->manpower_model->insertData('memberlog', $data_member_log);
        $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));

        $data_newbranch_member_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 1,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $newbranchid,
            'barnch_id_to_from' => $branch_code
            //'note' => $note 
        );

        //log table
        $this->manpower_model->insertData('memberlog', $data_newbranch_member_log);

        //member table
        $data_newbranch_member = array(
            'start_date' => $date,
            'manpower_id' => $manpowerid,
            'user_id' => $this->session->userdata('user_id'),
            'branch' => $newbranchid
        );
        $this->manpower_model->insertData('member', $data_newbranch_member);

        $this->site->delete('manpower_transfer', array('id' => $transfer_info->id, 'manpower_id' => $manpowerid));

        $this->session->set_flashdata('message', 'Accepted successfully');
        admin_redirect("dashboard");
    }



    function associateaccept($transfer_info)
    {

        //$this->sma->print_arrays($transfer_info);


        $manpowerid = $transfer_info->manpower_id;
        $manpower = $this->manpower_model->getManpowerByID($manpowerid);
        $processid = 15; //$this->site->getByID('process','id', $process_id);


        $branchid =   $transfer_info->from_branch_id; //old 

        $newbranchid = $transfer_info->to_branch_id;  //new

        $date = date("Y-m-d", strtotime($transfer_info->process_date)); //process_date




        $data_associate = array(
            'end_date' => date('Y-m-d', strtotime('-1 day', strtotime($date))),
            'is_associate_now' => 2
        );
        $associate_where = array(
            'manpower_id' => $manpowerid,
            'branch' => $branchid
        );



        $newbranch_info = $this->site->getBranchByID($newbranchid);
        $newbranch_code = $newbranch_info->code;

        $branch_info = $this->site->getBranchByID($branchid);
        $branch_code = $branch_info->code;


        $data_associate_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 2,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $branchid,
            'barnch_id_to_from' => $newbranch_code
            //'note' => $note 
        );


        $this->manpower_model->manpowerUpdate('associate', $data_associate, $associate_where);
        $this->manpower_model->insertData('associatelog', $data_associate_log);

        $manpower_update_arr['branch'] = $newbranchid;
        $manpower_update_arr['is_pending'] = 0;
        $manpower_update_arr['thana_code'] = '';

        $this->manpower_model->manpowerUpdate('manpower', $manpower_update_arr, array('id' => $manpowerid));


        $data_newbranch_associate_log = array(
            'process_date' => $date,
            'manpower_id' => $manpowerid,
            'in_out' => 1,
            'user_id' => $this->session->userdata('user_id'),
            'process_id' => $processid,
            'branch' => $newbranchid,
            'barnch_id_to_from' => $branch_code //,$branchid,
            //'note' => $note 
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

        $this->site->delete('manpower_transfer', array('id' => $transfer_info->id, 'manpower_id' => $manpowerid));

        // return true;
        $this->session->set_flashdata('message', 'Accepted successfully');
        admin_redirect("dashboard");
    }


    function cancel($transfer_id = NULL, $manpower_id = null)
    {


        $this->sma->checkPermissions('index', TRUE);

        $transfer_info = $this->site->getByID('manpower_transfer', 'id', $transfer_id);

        $is_changeable = $this->site->check_confirm($transfer_info->from_branch_id, date('Y-m-d'));
        $is_changeable_2 = $this->site->check_confirm($transfer_info->to_branch_id, date('Y-m-d'));



        if ($is_changeable == false || $is_changeable_2 == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }




        $this->manpower_model->manpowerUpdate('manpower', array('is_pending' => 0), array('id' => $manpower_id));

        $this->site->delete('manpower_transfer', array('id' => $transfer_id, 'manpower_id' => $manpower_id));

        $this->session->set_flashdata('message', 'Cancelled successfully');
        redirect($_SERVER["HTTP_REFERER"]);
        //$this->sma->send_json(array('msg' => 'success', 'result' => 'Cancelled successfully'));
    }









    function assoworkeraccept($transfer_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        $transfer_info = $this->site->getByID('manpower_transfer_assoworker', 'id', $transfer_id);

        $branch_id =   $transfer_info->to_branch_id;


        $is_changeable = $this->site->check_confirm($branch_id, date('Y-m-d'));
        $is_changeable_2 = $this->site->check_confirm($transfer_info->from_branch_id, date('Y-m-d'));

        if ($is_changeable == false || $is_changeable_2 == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }



        if ($transfer_info->status == 1) {
            $this->session->set_flashdata('message', 'Already accepted.');
            admin_redirect('dashboard');
        }

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('dashboard');
        }



        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);



        if (strtotime($entrytimeinfo->startdate_half) <=  time()   && strtotime($entrytimeinfo->enddate_half) >= time()) {
            $start_date = $entrytimeinfo->startdate_half;
            $end_date = $entrytimeinfo->enddate_half;
            $report_type = 'half_yearly';
        } else {
            $start_date = $entrytimeinfo->startdate_annual;
            $end_date = $entrytimeinfo->enddate_annual;
            $report_type = 'annual';
        }
        $year = $entrytimeinfo->year;


        $current_manpower_record =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

        if ($current_manpower_record == false) {



            $data = array(
                'report_type' =>  $report_type,
                'date' => date("Y-m-d"),
                'branch_id' => $branch_id,
                'user_id' => $this->session->userdata('user_id')
            );
            $record_id_arrival = $this->site->insertData('manpower_record', $data, 'id');
        } else {
            $record_id_arrival =  $current_manpower_record[0]['id'];
        }




        $current_manpower_record_departure =  $this->site->query_binding("SELECT * from sma_manpower_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($transfer_info->from_branch_id, $start_date, $end_date));

        if ($current_manpower_record_departure == false) {



            $data = array(
                'report_type' =>  $report_type,
                'date' => date("Y-m-d"),
                'branch_id' =>  $transfer_info->from_branch_id,
                'user_id' => $this->session->userdata('user_id')
            );
            $record_id_departure = $this->site->insertData('manpower_record', $data, 'id');
        } else {
            $record_id_departure =  $current_manpower_record_departure[0]['id'];
        }



        //$this->sma->print_arrays($current_manpower_record_departure, $record_id_departure );




        if ($transfer_info->orgstatus_id == 13) {
            // $this->sma->print_arrays($record_id_departure,$record_id_arrival);
            $this->site->update("manpower_record", "associate_candidate_transfer", "associate_candidate_transfer+1", array("id" => $record_id_departure));
            $this->site->update("manpower_record", "associate_candidate_arrival", "associate_candidate_arrival+1", array("id" => $record_id_arrival));


            $this->site->update("manpower_record", "worker_transfer", "worker_transfer+1", array("id" => $record_id_departure));
            $this->site->update("manpower_record", "worker_arrival", "worker_arrival+1", array("id" => $record_id_arrival));


            //$transfer_info->from_branch_id
        } else if ($transfer_info->orgstatus_id == 3) {

            $this->site->update("manpower_record", "worker_transfer", "worker_transfer+1", array("id" => $record_id_departure));
            $this->site->update("manpower_record", "worker_arrival", "worker_arrival+1", array("id" => $record_id_arrival));
        }

        $this->site->updateData('manpower_transfer_assoworker', array('status' => 1), array('status' => 2, 'id' => $transfer_id));



        $this->session->set_flashdata('message', 'Received successfully.');
        admin_redirect('dashboard');
    }





    function assoworkercancel($transfer_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);



        $transfer_info = $this->site->getByID('manpower_transfer_assoworker', 'id', $transfer_id);


        $is_changeable = $this->site->check_confirm($transfer_info->from_branch_id, date('Y-m-d'));
        $is_changeable_2 = $this->site->check_confirm($transfer_info->to_branch_id, date('Y-m-d'));

        if ($is_changeable == false || $is_changeable_2 == false) {
            $this->session->set_flashdata('error', 'Report has been confirmed!!! You can\'t update/change info.');
            redirect($_SERVER["HTTP_REFERER"]);
        }






        if ($this->Owner || $this->Admin)
            $this->site->updateData('manpower_transfer_assoworker', array('status' => 3),  array('id' => $transfer_id));
        else if ($this->session->userdata('branch_id')) {
            $this->site->updateData('manpower_transfer_assoworker', array('status' => 3), array('status' => 2, 'id' => $transfer_id, 'from_branch_id' => $this->session->userdata('branch_id')));
            $this->site->updateData('manpower_transfer_assoworker', array('status' => 3), array('status' => 2, 'id' => $transfer_id, 'to_branch_id' => $this->session->userdata('branch_id')));
        }
        // $this->site->updateData('associate',$asso, array('is_associate_now'=>1,'branch'=>$manpower->branch,'manpower_id'=>$manpowerid));  



        $this->session->set_flashdata('message', 'Cancelled successfully');
        redirect($_SERVER["HTTP_REFERER"]);
        //$this->sma->send_json(array('msg' => 'success', 'result' => 'Cancelled successfully'));
    }








    function assocandidatearrivallist($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpowertransfer/assocandidatearrivallist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpowertransfer/assocandidatearrivallist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'সাথীপ্রার্থী আগমন'));
        $meta = array('page_title' => 'সাথীপ্রার্থী আগমন', 'bc' => $bc);
        $this->page_construct('manpowertransfer/assocandidatearrivallist', $meta, $this->data, 'leftmenu/manpower');
    }



    function getListassocandidatearrival($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }


        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name, {$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type, {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('orgstatus_id', 13)->where('manpower_transfer_assoworker.to_branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('orgstatus_id', 13);
        }


        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }















    function assocandidatedeparturelist($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpowertransfer/assocandidatedeparturelist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpowertransfer/assocandidatedeparturelist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'সাথীপ্রার্থী স্থানান্তর'));
        $meta = array('page_title' => 'সাথীপ্রার্থী স্থানান্তর', 'bc' => $bc);
        $this->page_construct('manpowertransfer/assocandidatedeparturelist', $meta, $this->data, 'leftmenu/manpower');
    }



    function getListassocandidatedeparture($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }

        $report_type = $this->report_type();


        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name, {$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type, {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('orgstatus_id', 13)->where('manpower_transfer_assoworker.from_branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('orgstatus_id', 13);
        }

        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }
































    function workerarrivallist($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpowertransfer/workerarrivallist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpowertransfer/workerarrivallist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'কর্মী  আগমন'));
        $meta = array('page_title' => 'কর্মী  আগমন', 'bc' => $bc);
        $this->page_construct('manpowertransfer/workerarrivallist', $meta, $this->data, 'leftmenu/manpower');
    }



    function getListworkerarrival($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }



        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name, {$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type, {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('manpower_transfer_assoworker.to_branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1);
        }

        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }















    function workerdeparturelist($branch_id = NULL)
    {




        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('manpowertransfer/workerdeparturelist/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('manpowertransfer/workerdeparturelist/' . $this->session->userdata('branch_id'));
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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'কর্মী  স্থানান্তর'));
        $meta = array('page_title' => 'কর্মী  স্থানান্তর', 'bc' => $bc);
        $this->page_construct('manpowertransfer/workerdeparturelist', $meta, $this->data, 'leftmenu/manpower');
    }



    function getListworkerdeparture($branch_id = NULL)
    {

        $this->sma->checkPermissions('index', TRUE);
        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            // $user = $this->site->getUser();
            $branch_id = $this->session->userdata('branch_id'); //$user->branch_id;
        }


        $report_type = $this->report_type();

        $this->load->library('datatables');

        if ($branch_id) {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name, {$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type, {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1)->where('manpower_transfer_assoworker.from_branch_id', $branch_id);
        } else {
            $this->datatables
                ->select($this->db->dbprefix('manpower_transfer_assoworker') . ".id as id, {$this->db->dbprefix('manpower_transfer_assoworker')}.name, t1.name as from_branch, t2.name as to_branch, orgstatus.status_name,{$this->db->dbprefix('manpower_transfer_assoworker')}.oath_date, {$this->db->dbprefix('manpower_transfer_assoworker')}.responsibility, {$this->db->dbprefix('manpower_transfer_assoworker')}.session, {$this->db->dbprefix('manpower_transfer_assoworker')}.institution_type,   {$this->db->dbprefix('manpower_transfer_assoworker')}.note", FALSE)
                ->join('branches as t1', 't1.id=manpower_transfer_assoworker.from_branch_id', 'left')
                ->join('branches as t2', 't2.id=manpower_transfer_assoworker.to_branch_id', 'left')
                ->join('orgstatus', 'orgstatus.id=manpower_transfer_assoworker.orgstatus_id', 'left')
                ->from('manpower_transfer_assoworker')->where('status', 1);
        }

        $start = $report_type['start'];
        $end = $report_type['end'];

        $this->datatables->where('DATE(process_date) BETWEEN "' . $start . '" and "' . $end . '"');

        //$this->datatables->unset_column("manpower_id");
        echo $this->datatables->generate();
    }
}
