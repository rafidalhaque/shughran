<?php defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends MY_Controller
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
        $this->load->admin_model('guest_model');
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
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
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


        if ($report_type['is_current'] != false)
            $this->data['guests'] = $this->guest_model->getAllGuest('current');
        else
            $this->data['guests'] = $this->guest_model->getAllGuest();



        //$this->sma->print_arrays($this->data['guests']);

        if ($branch_id) {
            $this->data['detailinfo'] = $this->getEntryInfo($report_type, $this->data['guests'], $branch_id);
        } else
            $this->data['detailinfo'] = '';



        $this->data['guest_summary'] = $this->getguest_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);


        // $this->sma->print_arrays($this->data['org_summary']);



        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Guest'));
        $meta = array('page_title' => 'Guest', 'bc' => $bc);


        if ($branch_id) {


            $this->page_construct3('guest/index_entry', $meta, $this->data, 'leftmenu/others');
        } else
            $this->page_construct('guest/index', $meta, $this->data, 'leftmenu/others');
    }



    function getguest_summary($report_type, $start_date, $end_date, $branch_id = NULL, $reportinfo = null)
    {


        $report_info =  $reportinfo['info'];



        $start_date = $reportinfo['start'];
        $end_date = $reportinfo['end'];



        //echo 'Multiple'.$start_date.'>>'.$end_date;

        if ($branch_id) {
            if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
                $result =  $this->site->query_binding("SELECT * from sma_guest_record WHERE  branch_id = ? AND date BETWEEN ? AND ? ", array($branch_id, $start_date, $end_date));

            else if ($report_type == 'annual')
                $result =  $this->site->query_binding("SELECT  `guest_id`,SUM(`number`) number, GROUP_CONCAT(notes) notes, SUM(`id`) id from sma_guest_record WHERE  branch_id = ? AND date BETWEEN ? AND ? GROUP BY guest_id", array($branch_id, $start_date, $end_date));
        } else {
            if (($report_type == 'annual' && $reportinfo['last_half']) || $report_type == 'half_yearly')
                $result =  $this->site->query_binding("SELECT * from sma_guest_record WHERE  date BETWEEN ? AND ? ", array($start_date, $end_date));

            else if ($report_type == 'annual')
                $result =  $this->site->query_binding("SELECT `guest_id`,SUM(`number`) number, SUM(`id`) id from sma_guest_record WHERE  date BETWEEN ? AND ?  GROUP BY guest_id", array($start_date, $end_date));
        }


        return $result;
    }







    function guestlist($branch_id = NULL)
    {

        $this->sma->checkPermissions();




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


        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Guest List'));
        $meta = array('page_title' => 'Guest List', 'bc' => $bc);
        $this->page_construct('guest/guestlist', $meta, $this->data, 'leftmenu/guest');
    }








    function getGuest($branch_id = NULL)
    {

        $this->sma->checkPermissions();

        if ((!$this->Owner || !$this->Admin) && !$branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }

        $edit_link = anchor('admin/guest/editGuest/$1', '<i class="fa fa-edit"></i> ' . lang('edit'), 'data-toggle="modal" data-target="#myModal"');


        $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">';

        $action .= '<li class="divider"></li>
            <li>' . $edit_link . '</li>
            </ul>
        </div></div>';




        $this->load->library('datatables');

        $this->datatables
            ->select("id,  guest_name,  priority, is_active", FALSE)
            ->from('guest');







        $this->datatables->add_column("Actions", $action, "id");

        echo $this->datatables->generate();
    }









    function getEntryInfo($report_type, $guests, $branch_id = NULL)
    {





        $start = $report_type['start'];
        $end = $report_type['end'];
        $year = $report_type['year'];
        $type = $report_type['type'];


        if ($report_type['is_current'] != false  && ($report_type['last_half'] || $type == 'half_yearly')) {
            $type =   ($type == 'half_yearly') ? 'half_yearly' : 'annual';



            $guest_recordinfo = $this->site->getOneRecord('guest_record', '*', array('report_type' => $type, 'branch_id' => $branch_id, 'date < ' => $end, 'date > ' => $start), 'id desc', 1, 0);

            if (!$guest_recordinfo) {

                foreach ($guests as $guest)
                    $this->site->insertData('guest_record', array('guest_id' => $guest->id, 'branch_id' => $branch_id, 'report_type' => $type, 'report_year' => $year, 'date' => date('Y-m-d'), 'user_id' => $this->session->userdata('user_id')));
            }
        }







        $guest_recordinfo = $this->site->getOneRecord('guest_record', '*', array('branch_id' => $branch_id, 'date <= ' => $end, 'date >= ' => $start), 'id desc', 1, 0);

        return array(
            'guest_recordinfo' => $guest_recordinfo
        );
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

    function addGuest()
    {


        $this->sma->checkPermissions();

        $this->form_validation->set_rules('guest_name', 'Guest name', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'guest_name' => $this->input->post('guest_name'),
                'branch_id' => $this->input->post('branch_id'),
                'priority' => $this->input->post('priority'),
                'user_id' => $this->session->userdata('user_id'),
                'is_active' => $this->input->post('is_active'),
                'is_current' => $this->input->post('is_current') ?  $this->input->post('is_current') : 2
            );
        } elseif ($this->input->post('guest')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('guest/guestlist');
        }

        if ($this->form_validation->run() == true && $this->guest_model->addGuest($data)) {

            $this->session->set_flashdata('message', 'Added successfully');
            admin_redirect("guest/guestlist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['branches'] = $this->site->getAllBranches();

            $this->load->view($this->theme . 'guest/guestentry', $this->data);
        }
    }







    function editGuest($id = NULL)
    {


        $this->sma->checkPermissions();



        if ($this->input->get('id')) {
            $id = $this->input->get('id');
        }

        $guest_details = $this->site->getByID('guest', 'id', $id);


        $this->form_validation->set_rules('guest_name', 'Guest name', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');



        if ($this->form_validation->run() == true) {
            $data = array(
                'guest_name' => $this->input->post('guest_name'),
                'branch_id' => $this->input->post('branch_id'),
                'priority' => $this->input->post('priority'),
                'user_id' => $this->session->userdata('user_id'),
                'is_active' => $this->input->post('is_active'),
                'is_current' => $this->input->post('is_current') ?  $this->input->post('is_current') : 2
            );
        } elseif ($this->input->post('edit_guest')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect('guest/guestlist');
        }

        if ($this->form_validation->run() == true && $this->site->updateData('guest', $data, array('id' => $id))) {

            $this->session->set_flashdata('message', 'Added successfully');
            admin_redirect("guest/guestlist");
        } else {




            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();

            $this->data['guest'] = $guest_details;

            $this->data['branches'] = $this->site->getAllBranches();

            $this->load->view($this->theme . 'guest/editguest', $this->data);
        }
    }






    function detailupdate()
    {
        $this->sma->checkPermissions('index', TRUE);

        $report_type = $this->report_type();
        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));



        $flag = 1;
        $msg = "done";

        if ($is_changeable) {
            if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
                $is_current = $this->site->getcolumn('guest', 'is_current', array('id' => $this->input->get_post('id')));
                //echo $is_current;
                $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => $this->input->get_post('value'), 'guest_type' => $is_current), array('id' => $this->input->get_post('pk')));
                $flag = 2;  //update
            } elseif ($this->input->get_post('branch_id') && $this->input->get_post('id') && $this->input->get_post('idname')) {

                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => $this->input->get_post('value'), $this->input->get_post('idname') => $this->input->get_post('id'),  'date' => date('Y-m-d')));
                $flag = 3;  //new entry

            }
        } else
            $msg = "failed";


        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }




    function detailupdate_tag()
    {




        $this->sma->checkPermissions('index', TRUE);

        $report_type = $this->report_type();
        $is_changeable = $this->site->check_confirm($this->input->get_post('branch_id'), date('Y-m-d'));



        $flag = 1;
        $msg = "done";

        if ($is_changeable) {
            if ($this->input->get_post('pk') && $this->input->get_post('pk') > 0) {
                $is_current = $this->site->getcolumn('guest', 'is_current', array('id' => $this->input->get_post('id')));
                //echo $is_current;
                $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name') => implode(', ', $this->input->get_post('value')), 'guest_type' => $is_current), array('id' => $this->input->get_post('pk')));
                $flag = 2;  //update
            } elseif ($this->input->get_post('branch_id') && $this->input->get_post('id') && $this->input->get_post('idname')) {

                $this->site->insertData($this->input->get_post('table'), array('user_id' => $this->session->userdata('user_id'), 'branch_id' => $this->input->get_post('branch_id'), 'report_type' => $report_type['type'], $this->input->get_post('name') => implode(', ', $this->input->get_post('value')), $this->input->get_post('idname') => $this->input->get_post('id'),  'date' => date('Y-m-d')));
                $flag = 3;  //new entry

            }
        } else
            $msg = "failed";


        echo json_encode(array('flag' => $flag, 'msg' => $msg));
        exit;
    }



    function export_old($branch_id = NULL)
    {


        $this->sma->checkPermissions('index', TRUE);


        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
        }


        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branch_id'] = $branch_id;
            $branch = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {

            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $branch = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }






        //$this->sma->print_arrays($this->data['branch']);

        $report_type = $this->report_type();



        if ($branch_id) {

            $this->db
                ->select("number, notes,   {$this->db->dbprefix('guest')}.guest_name", FALSE)
                ->from('guest_record');
            $this->db->join('guest', 'guest_record.guest_id=guest.id', 'left');
            $this->db->where('guest_record.branch_id', $branch_id);
            $this->db->where('guest_record.report_type', $report_type['type']);
            $this->db->where($this->db->dbprefix('guest_record') . '.date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
        } else {
            $this->db
                ->select("SUM(number) as number, '' as notes,   {$this->db->dbprefix('guest')}.guest_name", FALSE)
                ->from('guest_record');
            $this->db->join('guest', 'guest_record.guest_id=guest.id', 'left');
            $this->db->where('guest_record.report_type', $report_type['type']);
            $this->db->where($this->db->dbprefix('guest_record') . '.date BETWEEN "' . $report_type['start'] . '" and "' . $report_type['end'] . '"');
            $this->db->group_by('guest_record.guest_id');
        }







        //$this->sma->print_arrays($branch_id);



        $q = $this->db->get();
        //echo $this->db->last_query();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $key => $row) {
                $data[] = $row;
            }
        } else {
            $data = NULL;
        }

        if (!empty($data)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('BM');




            $this->excel->getActiveSheet()->mergeCells('A1:D1');
            $this->excel->getActiveSheet()->mergeCells('A2:D2');
            $this->excel->getActiveSheet()->mergeCells('A3:D3');
            $this->excel->getActiveSheet()->mergeCells('A4:D4');
            $this->excel->getActiveSheet()->mergeCells('A5:D5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
            $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' সফর রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));












            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




            $this->excel->getActiveSheet()->getStyle('A6:G6')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A6', 'Serial');
            $this->excel->getActiveSheet()->SetCellValue('B6', 'Name');
            $this->excel->getActiveSheet()->SetCellValue('C6', 'Number');
            $this->excel->getActiveSheet()->SetCellValue('D6', 'Notes');

            $row = 7;
            $total = 0;
            foreach ($data as $key => $data_row) {
                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->guest_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->number);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->notes);



                $row++;
            }



            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(70);







            $filename = 'Guest';
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }












    function export($branch_id)
    {


        $this->sma->checkPermissions();

        if ($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch_id)) {

            $this->session->set_flashdata('warning', lang('access_denied'));
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
        } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
            admin_redirect('guest/' . $this->session->userdata('branch_id'));
        }


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            
            $branch_id = $branch_id;
            $branch= $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
        } else {
            
            $branch_id = $this->session->userdata('branch_id');
            $branch= $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
        }

        $report_type = $this->report_type();

        if ($report_type == false)
            admin_redirect();

        $report_info = $report_type;


        if ($report_type['is_current'] != false)
            $guests = $this->guest_model->getAllGuest('current');
        else
            $guests = $this->guest_model->getAllGuest();



        //$this->sma->print_arrays($this->data['guests']);

        if ($branch_id) {
            $detailinfo = $this->getEntryInfo($report_type, $guests, $branch_id);
        } else
            $detailinfo = '';



        $guest_summary = $this->getguest_summary($report_type['type'], $report_type['start'], $report_type['end'], $branch_id, $report_type);


     

        if (!empty($guests)) {

            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Safar');




            $this->excel->getActiveSheet()->mergeCells('A1:D1');
            $this->excel->getActiveSheet()->mergeCells('A2:D2');
            $this->excel->getActiveSheet()->mergeCells('A3:D3');
            $this->excel->getActiveSheet()->mergeCells('A4:D4');
            $this->excel->getActiveSheet()->mergeCells('A5:D5');

            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
            $this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold(true);


            $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
            $this->excel->getActiveSheet()->SetCellValue('A3', strtoupper($report_type['type']) . ' সফর রিপোর্ট: from ' . $report_type['start'] . ' to ' . $report_type['end']);
            $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' . ($branch_id ? $branch->name : lang('all_branches')));












            $style = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                )
            );

            $this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);




            $this->excel->getActiveSheet()->getStyle('A6:G6')->getFont()->setBold(true);
            $this->excel->getActiveSheet()->SetCellValue('A6', 'Serial');
            $this->excel->getActiveSheet()->SetCellValue('B6', 'Name');
            $this->excel->getActiveSheet()->SetCellValue('C6', 'Number');
            $this->excel->getActiveSheet()->SetCellValue('D6', 'Notes');

            $row = 7;
            $total = 0;
            foreach ($guests as $key => $data_row) if( (($data_row->branch_id==999) || ( $data_row->branch_id !=  $branch_id)) ) {
                
                $row_info = record_row($guest_summary,'guest_id',$data_row->id);
                $number = $row_info['number'];

                $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key + 1);
                $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->guest_name);
                $this->excel->getActiveSheet()->SetCellValue('C' . $row, $number);
                $this->excel->getActiveSheet()->SetCellValue('D' . $row, $row_info['notes']);



                $row++;
            }



            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(70);





            $filename = 'Guest_' .( $branch_id ? '_'.$branch_id : '_central'). '_' . $this->input->get('year');
            $this->load->helper('excel');
            create_excel($this->excel, $filename);
        }
        $this->session->set_flashdata('error', lang('nothing_found'));
        redirect($_SERVER["HTTP_REFERER"]);
    }
}
