<?php defined('BASEPATH') or exit('No direct script access allowed');

class Support extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        $this->lang->admin_load('pages', $this->Settings->user_language);
        $this->load->library('form_validation');
        $this->load->admin_model('pages_model');
        $this->digital_upload_path = $this->config->item('upload_location') . 'files/pages/';
        $this->upload_path = $this->config->item('upload_location') . 'files/pages/';
        $this->thumbs_path = $this->config->item('upload_location') . 'assets/uploads/thumbs/';
        $this->image_types = 'gif|jpg|jpeg|png|tif';
        $this->digital_file_types = 'zip|psd|ai|rar|pdf|doc|docx|xls|xlsx|ppt|pptx|gif|jpg|jpeg|png|tif|txt';
        $this->allowed_file_size = '1024';
        $this->popup_attributes = array('width' => '900', 'height' => '600', 'window_name' => 'sma_popup', 'menubar' => 'yes', 'scrollbars' => 'yes', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0');
    }

    function index($branch_id = NULL)
    {
        // $this->sma->checkPermissions();

        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->data['branches'] = $this->site->getAllBranches();
            $this->data['branch_id'] = $branch_id;
            $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
            $this->data['tickets'] = $this->site->query_binding('SELECT sma_support_ticket.*,  sma_branches.code from sma_support_ticket left join sma_branches on sma_branches.id = sma_support_ticket.branch_id  where is_status != ? AND ticket_id = 0 order by update_at desc limit 500', array('Closed'));
        } else {
            $this->data['branches'] = NULL;
            $this->data['branch_id'] = $this->session->userdata('branch_id');
            $this->data['branch'] = $this->session->userdata('branch_id') ? $this->site->getBranchByID($this->session->userdata('branch_id')) : NULL;
            $this->data['tickets'] = $this->site->query_binding('SELECT sma_support_ticket.*,  sma_branches.code from sma_support_ticket left join sma_branches on sma_branches.id = sma_support_ticket.branch_id  where is_status != ? and branch_id = ? AND ticket_id = 0 order by update_at desc limit 500', array('Closed', $this->session->userdata('branch_id')));
        }


        $this->data['supports'] = $this->site->query_binding('SELECT id, title from sma_pages where status = ? order by priority desc', array(1));



        //$this->sma->print_arrays($this->data['tickets']);

        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => lang('সহায়িকা')));
        $meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);

        if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
            $this->page_construct('support/index', $meta, $this->data);
        } else {
            $this->page_construct('support/index_branch', $meta, $this->data);
        }
    }





    function detail($id)
    {
        // $this->sma->checkPermissions();

        $this->data['supportdetail'] = $this->site->getOneRecord('pages', '*', array('id' => $id, 'status' => 1), 'id asc', 1, 0);
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => admin_url('support'), 'page' => lang('সহায়িকা')), array('link' => '#', 'page' => $this->data['supportdetail']->title));

        $meta = array('page_title' => lang('সহায়িকা'), 'bc' => $bc);
        $this->page_construct('support/detail', $meta, $this->data);
    }









    function add($branch_id = null)
    {

        //  $this->sma->checkPermissions('index', TRUE);

        // $this->load->helper('security');





        $this->form_validation->set_rules('ticket_caption', 'Ticket caption', 'required');
        $this->form_validation->set_rules('note', 'Ticket detail', 'required');


        if ($this->form_validation->run() == true) {





            $ticket_caption = $this->input->post('ticket_caption');
            $ticket_detail = $this->input->post('note');
            $page = $this->input->post('page');
            $is_status = 'New';
            $department_id = $this->input->post('department');
            $user_id = $this->session->userdata('user_id');

            if ($this->Owner || $this->Admin) {
                $branch_id = $this->input->post('branch_id');
            } else
                $branch_id = $this->session->userdata('branch_id') ? $this->session->userdata('branch_id') : $branch_id;


            $ticket_data = array(
                'ticket_caption' => $ticket_caption,
                'ticket_detail' => $this->sma->clear_tags($ticket_detail),
                'page' => $page,
                'is_status' => $is_status,
                //'department_id' => $department_id,
                'category' =>   $department_id,
                'user_id' => $user_id,
                'branch_id' => $branch_id
            );
            if ($this->Owner || $this->Admin) {
                $ticket_data['is_read_admin'] = 'Yes';
                $ticket_data['is_read_reply_admin'] = 'Yes';
            } elseif ($this->session->userdata('branch_id')) {
                $ticket_data['is_read_branch'] = 'Yes';
                $ticket_data['is_read_reply_branch'] = 'Yes';
            }

            $ticket_data['update_at'] = date('Y-m-d H:i:s');
        } elseif ($this->input->post('ticket')) {
            $this->session->set_flashdata('error', validation_errors());
            //admin_redirect("support" . ($branch_id ? '/' . $branch_id : ''));
            admin_redirect("support");
        }

        if ($this->form_validation->run() == true && $this->site->insertData('support_ticket', $ticket_data)) {



            $this->session->set_flashdata('message', 'Submitted successfully');
            admin_redirect("support");
            //admin_redirect("support" . ($branch_id ? '/' . $branch_id : ''));
        } else {
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['branch_id'] = $branch_id;
            $this->data['departments'] = $this->site->getAll('ticket_category');
            $this->data['branches'] = $this->site->getAll('branches');


            $this->load->view($this->theme . 'support/add', $this->data);
        }
    }


    function reply()
    {

        //$this->sma->checkPermissions('index', TRUE);

        // $this->load->helper('security');

        if ($this->input->is_ajax_request()) {

            $ticket_main_data = array();
            $ticket_reply_data = array(
                'ticket_detail' => $this->sma->clear_tags($this->input->post('reply_text')),
                'ticket_id' => $this->input->post('ticket_id'),
                'user_id' => $this->session->userdata('user_id'),
                'branch_id' => $this->input->post('branch_id')
            );
            if ($this->Owner || $this->Admin) {
                $ticket_reply_data['is_read_admin'] = 'Yes';
                $ticket_reply_data['is_read_reply_admin'] = 'Yes';

                $ticket_main_data['is_read_reply_admin'] = 'Yes';
                $ticket_main_data['is_read_reply_branch'] = 'No';
            } elseif ($this->session->userdata('branch_id')) {
                $ticket_reply_data['is_read_branch'] = 'Yes';
                $ticket_reply_data['is_read_reply_branch'] = 'Yes';

                $ticket_main_data['is_read_reply_admin'] = 'No';
                $ticket_main_data['is_read_reply_branch'] = 'Yes';
            }

            $ticket_main_data['update_at'] = date('Y-m-d H:i:s');


            $this->site->insertData('support_ticket', $ticket_reply_data);
            $this->site->updateData('support_ticket', $ticket_main_data, array('id' => $this->input->post('ticket_id')));

            $this->sma->send_json(array('error' => 0, 'msg' => 'Replied successfully'));
        } else {
            $this->sma->send_json(array('error' => 1, 'msg' => 'There was an error'));
        }
    }



    function ticketdetail($id = null)
    {

        //$this->sma->checkPermissions('index', TRUE);

        // $this->load->helper('security');



        $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
        $this->data['modal_js'] = $this->site->modal_js();

        $this->data['departments'] = $this->site->getAll('ticket_category');

        if ($this->Owner || $this->Admin) {

            $this->site->updateData('support_ticket', array('is_read_admin' => 'Yes', 'is_read_reply_admin' => 'Yes'), array('id' => $id));
            $this->site->updateData('support_ticket', array('is_read_admin' => 'Yes', 'is_read_reply_admin' => 'Yes'), array('ticket_id' => $id));
        } elseif ($this->session->userdata('branch_id')) {
            $this->site->updateData('support_ticket', array('is_read_branch' => 'Yes', 'is_read_reply_branch' => 'Yes'), array('id' => $id, 'branch_id' => $this->session->userdata('branch_id')));
            $this->site->updateData('support_ticket', array('is_read_branch' => 'Yes', 'is_read_reply_branch' => 'Yes'), array('ticket_id' => $id));
        }



        $this->data['ticketdetail'] = $this->site->getByID('support_ticket', 'id', $id);


        $this->data['replies'] =  $this->site->query_binding("select * from `sma_support_ticket` 
        left join `sma_users` on sma_users.id = sma_support_ticket.user_id 
        where  ticket_id = ? order by sma_support_ticket.id asc", array($id));



        // $this->sma->print_arrays($this->data['replies']);
        $this->data['user'] = $this->site->getByID('users', 'id', $this->data['ticketdetail']->user_id);

        $this->data['branch'] =  $this->site->getBranchByID($this->data['ticketdetail']->branch_id);


        $this->load->view($this->theme . 'support/ticketdetail', $this->data);
    }
}
