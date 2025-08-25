<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Confirmreport extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
         
        $this->lang->admin_load('notifications', $this->Settings->user_language);
        $this->load->library('form_validation');
        

    }
    
    
    

    
    
    

    function index()
    {
       $this->sma->checkPermissions('index', TRUE);

        $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Confirm report'));
        $meta = array('page_title' => 'Confirm report', 'bc' => $bc);
        $this->page_construct('confirmreport/index', $meta, $this->data);
    }

    function getConfirmreport()
    {

	$report_type = $this->report_type();
$type =	$report_type['type'];
$year =	$report_type['year'];
      
	  $this->load->library('datatables');
	  
	  $this->datatables
                ->select($this->db->dbprefix('confirmreport') . ".id as id,  report_type, {$this->db->dbprefix('branches')}.name as branch_name,entry_date,comment", FALSE)
				->from('confirmreport');
		 $this->datatables->join('branches', 'branches.id=confirmreport.branch_id', 'left'); 
		 $this->datatables->add_column("Actions", "<div class=\"text-center\"><a href='#' class='tip po' title='<b>" . "Delete" . "</b>' data-content=\"<p>" . lang('r_u_sure') . "</p><a class='btn btn-danger po-delete' href='" . admin_url('confirmreport/delete/$1') . "'>" . lang('i_m_sure') . "</a> <button class='btn po-close'>" . lang('no') . "</button>\"  rel='popover'><i class=\"fa fa-trash-o\"></i></a></div>", "id");
		 $this->datatables->where('report_type',  $type);
		 $this->datatables->where('year',  $year);
         $this->datatables->unset_column('id');
	  
	  echo $this->datatables->generate();
	   
    }

	
	function check_confirm() {
   $branch = $this->input->post('branch_id');
   $report_type = $this->input->post('report_type');
  $year = $this->input->post('year');
   
   
   $check = $this->site->getOneRecord('confirmreport', "*", array('branch_id'=>$branch,'year'=>$year,'report_type'=>$report_type));
    
   
   if ($check == false) {
       return TRUE;
   }
   $this->form_validation->set_message('check_confirm','Already confirmed');
   return FALSE;
}
	
	
    function add()
    {
		$this->sma->checkPermissions('index', TRUE);


        $this->form_validation->set_rules('branch_id', lang("branch"), 'required');
		$this->form_validation->set_rules('report_type', 'Type', 'required|callback_check_confirm');
		$this->form_validation->set_rules('year', 'Year', 'required');

		
		
        if ($this->form_validation->run() == true) {
            $data = array(
			    'comment' => $this->input->post('comment'),
				'user_id' => $this->session->userdata('user_id') ,
				 'year' => $this->input->post('year'),
                'branch_id' => $this->input->post('branch_id'),
                'report_type' => $this->input->post('report_type')
				);
        } elseif ($this->input->post('confirm')) {
            $this->session->set_flashdata('error', validation_errors());
            admin_redirect("confirmreport");
        }

        if ($this->form_validation->run() == true && $this->site->insertData('confirmreport',$data)) {
            $this->session->set_flashdata('message', 'Added');
            admin_redirect("confirmreport");
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
			 $this->data['branches'] = $this->site->getAllBranches();

			 
			$report_type = $this->report_type();  
			$this->data['report_type'] =  $report_type['type']; 
			$this->data['year'] =  $report_type['year']; 
			 
			 
			 
            $this->load->view($this->theme . 'confirmreport/add', $this->data);

        }
    }

    

    function delete($id = NULL)
    {
		 $this->sma->checkPermissions('index', TRUE);
		 
        if (!$this->Owner && !$this->Admin) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

        if ($this->site->delete('confirmreport', array('id'=>$id))) {
            $this->sma->send_json(array('error' => 0, 'msg' => 'Deleted'));
        }
    }
	
	
	
	
	
	
	
	 
	
function report_type()
    {

        $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

    //    $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

         $type =   ( strtotime($entrytimeinfo->enddate_half) >= time() && strtotime($entrytimeinfo->startdate_half) <= time())   ?   'half_yearly' : 'annual';

        if ($type == 'half_yearly')
            return array('info'=>$entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
        else
            return array('info'=>$entrytimeinfo, 'type' => 'annual', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_annual, 'year' => $entrytimeinfo->year);
    }	
	
	

}
