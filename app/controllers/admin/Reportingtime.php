<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reportingtime extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
        $this->lang->admin_load('notifications', $this->Settings->user_language);
        $this->load->library('form_validation');
        

    }

    function index()
    {
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Reporting Schedule'));
        $meta = array('page_title' => 'Reporting Schedule', 'bc' => $bc);
        $this->page_construct('reportingtime/index', $meta, $this->data);
    }

    function getReportingtime()
    {

	if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
	
	
        $this->load->library('datatables');
        $this->datatables
            ->select("id, year, startdate_half, enddate_half, startdate_annual, enddate_annual")
            ->from("entry_settings")
            //->where('notification', 1)
            ->add_column("Actions", "<div class=\"text-center\"><a href='" . admin_url('reportingtime/edit/$1') . "' data-toggle='modal' data-target='#myModal' class='tip' title='" . 'Edit' . "'><i class=\"fa fa-edit\"></i></a> <a href='#' class='tip po' title='<b>" . 'Schedule' . "</b>' data-content=\"<p>" . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . admin_url('reportingtime/delete/$1') . "'>" . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i></a></div>", "id");
        $this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    function add()
    {

        $this->form_validation->set_rules('startdate_half',"Half year start date", 'required');
		$this->form_validation->set_rules('enddate_half', "Half year end date", 'required');
		$this->form_validation->set_rules('startdate_annual', "Annual start date", 'required');
		$this->form_validation->set_rules('enddate_annual', "Annual end date", 'required');
		$this->form_validation->set_rules('year', 'Year', 'required|is_unique[entry_settings.year]');

        if ($this->form_validation->run() == true) {
            $data = array(
                'comment' => $this->input->post('comment'),
                'startdate_half' => $this->input->post('startdate_half') ? $this->sma->fld($this->input->post('startdate_half')) : NULL,
                'enddate_half' => $this->input->post('enddate_half') ? $this->sma->fld($this->input->post('enddate_half')) : NULL,
                'startdate_annual' => $this->input->post('startdate_annual') ? $this->sma->fld($this->input->post('startdate_annual')) : NULL,
                'enddate_annual' => $this->input->post('enddate_annual') ? $this->sma->fld($this->input->post('enddate_annual')) : NULL,
                'year' => $this->input->post('year')
            );
        } elseif ($this->input->post('schedule')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("reportingtime");
        }

        if ($this->form_validation->run() == true && $this->site->insertData('entry_settings',$data)) {
            $this->session->set_flashdata('message', 'Schedule added');
            admin_redirect("reportingtime");
        } else {

            $this->data['comment'] = array('name' => 'comment',
                'id' => 'comment',
                'type' => 'textarea',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('comment'),
            );

            $this->data['error'] = validation_errors();
            $this->data['modal_js'] = $this->site->modal_js();
            $this->load->view($this->theme . 'reportingtime/add', $this->data);

        }
    }

     function edit($id = NULL)
    {
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }

        $this->form_validation->set_rules('comment', 'Notes', 'required|min_length[3]');

        if ($this->form_validation->run() == true) {
            $data = array(
                'comment' => $this->input->post('comment'),
                 'startdate_half' => $this->input->post('startdate_half') ? $this->sma->fld($this->input->post('startdate_half')) : NULL,
                'enddate_half' => $this->input->post('enddate_half') ? $this->sma->fld($this->input->post('enddate_half')) : NULL,
                'startdate_annual' => $this->input->post('startdate_annual') ? $this->sma->fld($this->input->post('startdate_annual')) : NULL,
                'enddate_annual' => $this->input->post('enddate_annual') ? $this->sma->fld($this->input->post('enddate_annual')) : NULL,
                'year' => $this->input->post('year')
            );
        } elseif ($this->input->post('schedule')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("reportingtime");
        }
 
        if ($this->form_validation->run() == true && $this->site->updateData('entry_settings', $data, array('id'=>$id))) {

            $this->session->set_flashdata('message', 'Updated');
            admin_redirect("reportingtime");

        } else {

            $schedule = $this->site->getByID('entry_settings','id',$id);

            $this->data['comment'] = array('name' => 'comment',
                'id' => 'comment',
                'type' => 'textarea',
                'class' => 'form-control',
                'required' => 'required',
                'value' => $this->form_validation->set_value('comment', $schedule->comment),
            );


            $this->data['schedule'] = $schedule;
            $this->data['id'] = $id;
            $this->data['modal_js'] = $this->site->modal_js();
            $this->data['error'] = validation_errors();
            $this->load->view($this->theme . 'reportingtime/edit', $this->data);

        }
    }
	
	
	

    function delete($id = NULL)
    {
        
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->site->delete('entry_settings', array('id'=>$id))) {
            $this->sma->send_json(array('error' => 0, 'msg' => 'Deleted'));
        }
    }

}
