<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reportsubmit extends MY_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->loggedIn) {
            $this->session->set_userdata('requested_page', $this->uri->uri_string());
            $this->sma->md('login');
        }
		 
		
		 
		if(  !($this->session->userdata('group_id')== 8 || $this->session->userdata('branch_id')  ||  $this->Owner || $this->Admin)) {   
			admin_redirect('welcome');
		}
		
         
        $this->lang->admin_load('notifications', $this->Settings->user_language);
        $this->load->library('form_validation');
        

    }

    function index()
    {
       

        $this->data['error'] = validation_errors() ? validation_errors() : $this->session->flashdata('error');
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'ছাড়পত্র'));
        $meta = array('page_title' => 'ছাড়পত্র', 'bc' => $bc);
		
		 
          


         if($this->input->get('type') !=null || !empty($this->input->get('type'))){
            //$branch = $this->input->get('branch');
            $report_type = $this->input->get('type');
            $year = $this->input->get('year');
           }else {
            $report_type_info = $this->report_type();  
            $report_type =  $report_type_info['type']; 
            $year =  $report_type_info['year']; 
   
            $check = $this->site->getOneRecord('reportsubmit', "*", array( 'year'=>$year,'report_type'=>$report_type));
            
            if ($check == false) {
                
               //insert
               $branches = $this->site->getAllBranches();

              // $this->sma->print_arrays($branches);
               foreach($branches as $row) {
                  // $this->sma->print_arrays($row->id);
                   $this->site->insertData('reportsubmit', array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$row->id, 'report_type'=>$report_type, 'year'=>$year));
               }
               }
   
   
   
           }
   

 
		 	
		//$this->data['submitinfo'] = $this->site->query_binding('reportsubmit', "*", array( 'year'=>$year,'report_type'=>$report_type), 'id asc');
    
    if($this->session->userdata('group_id')==8) {
        $this->data['branches'] = $this->site->getAllBranches();
		
        $department= 'department_'.$this->session->userdata('department_id');
        $comment = 'comment_'.$this->session->userdata('department_id');
        $branch_comment = 'branch_comment_'.$this->session->userdata('department_id');
        $this->data['department_id'] = $this->session->userdata('department_id');

        $department_id =  $this->data['department_id'];
        $this->data['branch_id'] = $this->input->get('branch_id');
        if($department_id) 
        $this->data['submitinfo'] = $this->site->query_binding('SELECT  '.$department.' as department, '.$branch_comment.' as branch_comment, sma_reportsubmit.id,branch_id ,'.$comment.' as department_comment FROM `sma_reportsubmit`   where report_type = ? AND `year` = ?  ', array($report_type,$year));
        //  $this->sma->print_arrays($this->data['submitinfo']);
        $this->data['departments'] = $this->site->getAllDepartments($this->session->userdata('department_id'));
        $this->page_construct4('reportsubmit/index', $meta, $this->data);
    }
        else if ($this->Owner || $this->Admin){
            $this->data['branches'] = $this->site->getAllBranches();
		
             
            $this->data['submitinfo'] = $this->site->query_binding('SELECT * FROM `sma_reportsubmit`   where report_type = ? AND `year` = ?  ', array($report_type,$year));
        
        //$this->data['submitinfo'] = $this->site->query_binding('SELECT  sma_reportsubmit.* , sma_branches.code FROM `sma_reportsubmit` LEFT JOIN sma_branches ON sma_branches.id = sma_reportsubmit.branch_id   where report_type = ? AND `year` = ? ', array($report_type,$year));
        
        $this->data['departments'] = $this->site->getAllDepartments(null, 1);
        $this->page_construct4('reportsubmit/index_admin', $meta, $this->data);
        }
    
        else { 

           // $this->data['branches'] = (object) array(array('id'=>, 'code'=>, 'name')) ;
		
           
         $this->data['branch_id'] = $this->session->userdata('branch_id');
         $this->data['branch'] =   $this->site->getBranchByID($this->session->userdata('branch_id'));
          
        $this->data['submitinfo'] = $this->site->query_binding('SELECT  *  FROM `sma_reportsubmit`  where report_type = ? AND `year` = ? AND   branch_id = ? ', array($report_type,$year,$this->session->userdata('branch_id')));
        $this->data['departments'] = $this->site->getAllDepartments(null, 1);
        $this->page_construct4('reportsubmit/index_branch', $meta, $this->data);
        }
		
		 
             
       // $this->sma->print_arrays($this->data['submitinfo']);

        
       




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
	
	
	
	
	
	
	
	
		 
	
		
function report_type_old()
{

    $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

    $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

     $type =  $this->input->get('type')=='annual' ?  'annual' : 'half_yearly';

    if ($type == 'half_yearly')
        return array('info'=>$entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
    else
        return array('info'=>$entrytimeinfo2, 'type' => 'annual', 'start' => $entrytimeinfo2->startdate_half, 'end' => $entrytimeinfo2->enddate_annual, 'year' => $entrytimeinfo2->year);
}	
	
	

}
