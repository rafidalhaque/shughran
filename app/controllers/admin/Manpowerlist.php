<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Manpowerlist extends MY_Controller
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
        admin_redirect('manpowerlist/' . $this->session->userdata('branch_id'));
    } else if ($branch_id == NULL && !($this->Owner || $this->Admin)) {
        admin_redirect('manpowerlist/' . $this->session->userdata('branch_id'));
    }


        $this->data['error'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('error');
       
	   
	    $this->data['branches'] = $this->site->getAllBranches();
         $this->data['branch_id'] = $branch_id;
           $this->data['branch'] = $branch_id ? $this->site->getBranchByID($branch_id) : NULL;
      
         
        $bc = array(array('link' => base_url(), 'page' => lang('home')), array('link' => '#', 'page' => 'Manpowerlist'));
        $meta = array('page_title' => 'Manpower list', 'bc' => $bc);
        $this->page_construct('manpowerlist/manpowerlist', $meta, $this->data,'leftmenu/left_panel.php');
    
	
	}
	
	
	
	
 
	
	
	 
	
	
	
	
	function postlog($orgstatus,$start,$end,$branch_id){
	
	
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
	
	
	
	
	
	  
	 
	
	
	function associateincreaselist($process_id=NULL)
    {
        
	$this->sma->checkPermissions('index', TRUE);

		$branch_id = $this->input->get('branch_id');
		$process = $this->site->getByID('process','id', $process_id);
 
		
			
		 $this->sma->checkPermissions('index', TRUE);
	if($branch_id != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id')!=$branch_id)){
		 
		$this->session->set_flashdata('warning', lang('access_denied'));
		admin_redirect('manpower/associateincreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
		  
		 } 
		  
		  else if ($branch_id == NULL && !($this->Owner || $this->Admin) ) {
		 admin_redirect('manpower/associateincreaselist/'.$process_id.'?branch_id='.$this->session->userdata('branch_id'));	  
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
        $this->page_construct('associate/associate/increase', $meta, $this->data,'leftmenu/manpower');
    }
	

	
function getIncreaseAssociate($process_id,$branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         
		 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog');
		$this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1);		
        $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog');
		$this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1);		
        $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		 
           
		  echo $this->datatables->generate();
		 
    	
	}
	
	




	function associatedecreaselist($process_id=NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

		$branch_id = $this->input->get('branch_id');
		$process = $this->site->getByID('process','id', $process_id);
 
		
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
        $this->page_construct('associate/associate/decrease', $meta, $this->data,'leftmenu/manpower');
    }
	

	
function getDecreaseAssociate($process_id,$branch_id = NULL)
    { 
	
        $this->sma->checkPermissions('index', TRUE);
         
        if ((! $this->Owner || ! $this->Admin) && ! $branch_id) {
            $user = $this->site->getUser();
            $branch_id = $user->branch_id;
        }
         
		 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog');
		$this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2);		
        $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog');
		$this->datatables->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2);		
        $this->datatables->join('branches', 'branches.id=associatelog.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		 
           
		  echo $this->datatables->generate();
		 
    	
	}
	
	
	 




	
	
function getManpowerList($branch_id = NULL)
    { 
	
        //$this->sma->checkPermissions('index', TRUE);
         
         
        
		 $action = '<div class="text-center"><div class="btn-group text-left">'
            . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
            . lang('actions') . ' <span class="caret"></span></button>
        <ul class="dropdown-menu pull-right" role="menu">
             <li><a href="' . admin_url('manpowerlist/edit/$1') . '"><i class="fa fa-edit"></i> ' . lang('edit_manpower') . '</a></li>';
        $action .='<li><a href="' . admin_url('manpowerlist/view/$1') . '"><i class="fa fa-search"></i> ' . lang('view_manpower') . '</a></li>';
        $action .= '</ul>
        </div></div>';
		
		  
		if ($this->Owner || $this->Admin || !$this->session->userdata('branch_id')) {
              $branch_id = NULL;
        } else {
              $branch_id = $this->session->userdata('branch_id');
             
        }
		 
		
	 
        $this->load->library('datatables');
		
        if ($branch_id) {
         
        $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('orgstatus')}.status_name,  {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('manpower');
                $this->datatables->join('orgstatus', 'manpower.orgstatus_id=orgstatus.id', 'left');
	//	$this->datatables->join('manpower', 'manpower.id=associate.manpower_id', 'left')
			//	->where('associate.is_associate_now', 1);		
        $this->datatables->join('branches', 'branches.id=manpower.branch', 'left')
                ->where('branches.id', $branch_id);
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
		
		} else {
           $this->datatables
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  membercode,   {$this->db->dbprefix('orgstatus')}.status_name,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('manpower');
		 $this->datatables->join('orgstatus', 'manpower.orgstatus_id=orgstatus.id', 'left');
		//	$this->datatables->join('manpower', 'manpower.id=associate.manpower_id', 'left')
			//	->where('associate.is_associate_now', 1);		
        $this->datatables->join('branches', 'branches.id=manpower.branch', 'left');
		$this->datatables->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left');
		 
        }
		
		
		
		
		
		
				
		 
            $this->datatables->add_column("Actions", $action, "manpowerid");
          
		  echo $this->datatables->generate();
		 
    	
	}
	
	
	 
	
 

 
 
 
 
 
 
 
 
 
 function check_associate($member_id,$branch)
 {
  
   
   $info = $this->site->getcolumn('postpone','id', array('manpower_id'=>$member_id,'orgstatus_id'=>2,'end_date'=>'2050-12-31','branch'=>$branch),'id DESC',1,0);
	 	
    
  if ($info!=NULL)
  {
	 $this->form_validation->set_message('check_associate', 'Already postponed!');
	return false; 
   
  
  }
  else{
	 
	  return true; 
	
 	 }
 
 }	
 

       
 
    function suggestions($id = null)
    {
		
		
		if($id!=null)
		 $this->sma->send_json(array('id'=>1, 'text'=>'Mong'));
	
       $term = $this->input->get('term', TRUE);
	   
        if (strlen($term) < 1 || !$term) {
          //  die("<script type='text/javascript'>setTimeout(function(){ window.top.location.href = '" . admin_url('welcome') . "'; }, 10);</script>");
        }

        $rows = $this->manpower_model->getManpowerNames($term);
		

        if ($rows) {
            foreach ($rows as $row) {
                $pr[] = array('id' => $row->id, 'text' => $row->name .'('.$row->associatecode.')');
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

    function edit($id = NULL,$ref_id=null)
    {
         $this->sma->checkPermissions('index', TRUE);
        $this->load->helper('security');
		$this->load->admin_model('organization_model');
		
        if ($this->input->post('id')) {
            $id = $this->input->post('id');
        }
        $branches = $this->site->getAllBranches();
        $manpower = $this->site->getManpowerByID($id);
        if (!$id || !$manpower) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            redirect($_SERVER["HTTP_REFERER"]);
        }
         
        
		 
		// $this->form_validation->set_rules('date', 'Oath date', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        //$this->form_validation->set_rules('district', 'District', 'required');
		$this->form_validation->set_rules('sessionyear', 'sessionyear', 'required');
		//$this->form_validation->set_rules('education', 'education', 'required');
		$this->form_validation->set_rules('studentlife', 'studentlife', 'required');
		
		 
		 
		 
          
        if ($this->form_validation->run() == true) {


		if($this->input->post('prossion_target_id'))
			 $prossion_target = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_id')),'id desc',1,0);
		if($this->input->post('prossion_target_sub_it'))
			 $prossion_target_sub = $this->site->getcolumn('profession_target','name',array('id'=>$this->input->post('prossion_target_sub_it')),'id desc',1,0);
		 
		 
            $data = array(
			
				//'associate_oath_date' =>  $this->sma->fsd($this->input->post('date')),
                 
				'sessionyear' => $this->input->post('sessionyear'),
                'responsibility_id' => $this->input->post('responsibility_id'),
                'studentlife' => $this->input->post('studentlife'),
				//'education' => $this->input->post('education'),
				'name' => $this->input->post('name'),
				 
				'district' => $this->input->post('district'),
                'upazila' => $this->input->post('upazila'),
				
				'institution_type' => $this->input->post('institution_type'),		
				'subject' => $this->input->post('subject'),
				'prossion_target_id' => $this->input->post('prossion_target_id'),
				'prossion_target_sub_it' => $this->input->post('prossion_target_sub_it'),
				
				'prossion_target' => isset($prossion_target) ? $prossion_target : NULL,
				'prossion_target_sub' =>  isset($prossion_target_sub) ? $prossion_target_sub : NULL,
				//'education_institution' => $this->input->post('education_institution'),
				'is_forum' => $this->input->post('is_forum'),
				'current_profession' => $this->input->post('current_profession'),
				'orgstatus_at_forum' => $this->input->post('orgstatus_at_forum'),
				'education_qualification' => $this->input->post('education_qualification'),
				'type_of_profession' => $this->input->post('type_of_profession'),
				'type_higher_education' => $this->input->post('type_higher_education'),
				'mobile' => $this->input->post('mobile'),
				'opposition' => $this->input->post('opposition'),
				'date_death' => $this->sma->fsd($this->input->post('date_death')),  
				'higher_education_institution' => $this->input->post('higher_education_institution'),
				'email' => $this->input->post('email'),
				'foreign_country' => $this->input->post('foreign_country'),
				'foreign_address' => $this->input->post('foreign_address'),
				'how_death' => $this->input->post('how_death'),
				'myr_serial' => $this->input->post('myr_serial'),

                'blood_group' => $this->input->post('blood_group'),
                'thana_code' => $this->input->post('thana_code'),
                'institution_type_child' => $this->input->post('institution_type_child'),


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
            
                
            if($this->input->post('member_oath_date'))    
                $data['member_oath_date'] =  $this->sma->fsd($this->input->post('member_oath_date'));
            else if($this->input->post('associate_oath_date'))    
                $data['associate_oath_date'] =  $this->sma->fsd( $this->input->post('associate_oath_date'));
            else if($this->input->post('membercandidate_oath_date'))    
                $data['membercandidate_oath_date'] =  $this->sma->fsd($this->input->post('membercandidate_oath_date'));
 
             
            }
			// $this->sma->print_arrays($data,$_POST);


       
        $is_changeable = $this->site->check_confirm($manpower->branch, date('Y-m-d')); 

      



        if ( $is_changeable && $this->form_validation->run() == true && $this->manpower_model->updateManpower($id, $data)) {
            
         $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

         if($manpower->responsibility_id !=$data['responsibility_id']){
            $this->site->insertData('responsibility_log', array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$manpower->branch, 'responsibility_id'=>$data['responsibility_id'], 'manpower_id'=>$id,  'date'=>date('Y-m-d')));
	     }

         if( strtotime($entrytimeinfo->startdate_half) <=  time()   && strtotime($entrytimeinfo->enddate_half) >= time()){
             $start_date = $entrytimeinfo->startdate_half;
             $end_date = $entrytimeinfo->enddate_half;
             $report_type = 'half_yearly';
         }else {
             $start_date = $entrytimeinfo->startdate_annual;
             $end_date = $entrytimeinfo->enddate_annual;
             $report_type = 'annual';
 
         }
          $year = $entrytimeinfo->year;



            if($manpower->orgstatus_id == 2 || $manpower->orgstatus_id == 12)  {
            
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


           $this->site->updateData('associatelog', $datalog , array('manpower_id'=>$id, 'branch'=>$manpower->branch ,'in_out' =>1, 'process_id'=>2, 'process_date <='=> $end_date , 'process_date >='=> $start_date));

           
           
            }

else  if($manpower->orgstatus_id == 1)  {
            
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


$this->site->updateData('memberlog', $datalog , array('manpower_id'=>$id, 'branch'=>$manpower->branch ,'in_out' =>1, 'process_id'=>2, 'process_date <='=> $end_date , 'process_date >='=> $start_date));



}







           




            /*
             $data_update = array(
			    'oath_date' =>  $this->sma->fsd($this->input->post('date')),
                'start_date' =>  $this->sma->fsd($this->input->post('date')), 
			 );
			$this->site->updateData('associate',$data_update, array('manpower_id'=>$id,'branch'=>$manpower->branch));  
			
			$data_update = array(
			    'process_date' =>  $this->sma->fsd($this->input->post('date')) 
             );
			$this->site->updateData('associatelog',$data_update, array('manpower_id'=>$id,'branch'=>$manpower->branch));  
			*/
			
			
			$this->session->set_flashdata('message', lang("manpower_updated"));
            
			
			$ref_id = $this->input->post('ref_id');
			
			
			//$this->sma->print_arrays($ref_id);
			if($ref_id==1)
				admin_redirect('manpower/member');
			else if($ref_id==2)
				admin_redirect('associate');
			else if($ref_id==12)
				admin_redirect('membercandidate');
			else
				admin_redirect('manpowerlist');
			
			
        } else {

            if($is_changeable ==false)
            $this->data['error'] =  'Report has been confirmed!!! You can\'t update/change info.' ;
            else 
            $this->data['error'] = (validation_errors() ? validation_errors() : $this->session->flashdata('error'));
       
            $this->data['branches'] = $branches;
            $this->data['manpower'] = $manpower;
			
		   $this->data['districts'] = $this->site->getDistrict();
           $this->data['upozillas'] = $this->site->getUpozilla();
           

		   $this->data['responsibilities'] = $this->site->getAll('responsibilities');
			$this->data['countries'] = $this->site->getAll('countries');
			$this->data['targets'] = $this->site->getAll('profession_target');
			
            
            
            $this->data['institution_types'] = $this->organization_model->getAllInstitution(2);
			$this->data['institutions'] = $this->organization_model->getAllInstitution(1);
            //$this->data['institution_types'] = $this->organization_model->getInstitutionType();

            $this->data['branch'] =  $this->site->getBranchByID($manpower->branch) ;


			 $this->data['ref_id'] = $ref_id;
			
			
            $bc = array(array('link' => base_url(), 'page' => lang('home')),  array('link' => '#', 'page' => lang('edit_manpower')));
            $meta = array('page_title' => lang('edit_manpower'), 'bc' => $bc);
            $this->page_construct('manpowerlist/edit', $meta, $this->data);
        }
    }

    /* ---------------------------------------------------------------- */
 
    /* ------------------------------------------------------------------------------- */
 

    
   
    
    /* --------------------------------------------------------------------------------------------- */

    function modal_view($id = NULL,$status=NULL)
    {
        $this->sma->checkPermissions('index', TRUE);

        $pr_details = $this->site->getManpowerByID($id);
        if (!$id || !$pr_details) {
            $this->session->set_flashdata('error', lang('manpower_not_found'));
            $this->sma->md();
        }
        
        $this->data['manpower'] = $pr_details;
		if($status==1) {
        $this->data['member'] = $this->manpower_model->getMemberByID($id);
		$this->data['status'] =  'Member';
		}
        $this->load->view($this->theme.'manpower/modal_view', $this->data);
    }

    function view($id = NULL)
    {
        $this->sma->checkPermissions('index', TRUE);
        echo '<h1>coming soon....</h1>';
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
            if (! $this->Settings->barcode_img) {
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
     
		$process = $this->site->getByID('process','id', $process_id);
 
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog')
				->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 1)
				->join('branches', 'branches.id=associatelog.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.associate_oath_date ASC');
		  
		  /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    */ 
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
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Associate Increase list');
				
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Associate Increase :'.$process->process);
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->associatecode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_increase_report'.str_replace(" ","",$process->process);
                $this->load->helper('excel');
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
     
		$process = $this->site->getByID('process','id', $process_id);
 
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('manpower')}.associate_oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associatelog')
				->join('manpower', 'manpower.id=associatelog.manpower_id', 'left')
				->where('associatelog.process_id', $process_id)->where('associatelog.in_out', 2)
				->join('branches', 'branches.id=associatelog.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.associate_oath_date ASC');
		  
		  /*
		        $this->db->where($this->db->dbprefix('member') . ".is_member_now", 1);
		    */ 
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
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Associate Decrease list');
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Associate Decrease :'.$process->process);
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

 
 
 
                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->associatecode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_increase_report'.str_replace(" ","",$process->process);
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

	



    
function report_type()
{

    $entrytimeinfo = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')), 'id desc', 1, 0);

    $entrytimeinfo2 = $this->site->getOneRecord('entry_settings', '*', array('year' => date('Y')-1), 'id desc', 1, 0);

     $type =  $this->input->get('type')=='annual' ?  'annual' : 'half_yearly';

    if ($type == 'half_yearly')
        return array('info'=>$entrytimeinfo, 'type' => 'half_yearly', 'start' => $entrytimeinfo->startdate_half, 'end' => $entrytimeinfo->enddate_half, 'year' => $entrytimeinfo->year);
    else
        return array('info'=>$entrytimeinfo2, 'type' => 'annual', 'start' => $entrytimeinfo2->startdate_half, 'end' => $entrytimeinfo2->enddate_annual, 'year' => $entrytimeinfo2->year);
}





function getPrev($report_type,$last_year,$branch_id = NULL){
		
	 
if($branch_id) 
	$result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND branch_id = ? AND calculated_year = ? ", array($report_type,$branch_id,$last_year));

else 	
	$result =  $this->site->query_binding("SELECT SUM(`member`) as  member, SUM(`member_candidate`) as member_candidate , SUM(`associate`) as associate , SUM(`associate_candidate`) as associate_candidate , SUM(`worker`) as worker , SUM(`supporter`) as supporter , SUM(`friend`) as friend , SUM(`non_muslim_supporter`) as  non_muslim_supporter, SUM(`non_muslim_friend`) as non_muslim_friend , SUM(`wellwisher`) as  wellwisher           
FROM `sma_calculated_mapower` WHERE `report_type` = ? AND calculated_year = ? ", array($report_type,$last_year));
		
	 
	return $result;
	}


	
	function calculate($data,$process_id,$in_out,$return){
		 
		if($data)
		 foreach($data as $row){
			if($row->in_out==$in_out && $row->process_id==$process_id)
				return isset($row->{$return}) ? $row->{$return} : 0;
		}
		
		return 0;
	}
	
	
	
	
	
	
	
 
	
	
    function export($branch = NULL)
    {
        if (!$this->Owner) {
            $this->session->set_flashdata('warning', lang('access_denied'));
            redirect($_SERVER["HTTP_REFERER"]);
        }

    
    

		
		
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid,  associatecode,   {$this->db->dbprefix('manpower')}.name, {$this->db->dbprefix('branches')}.name as branch_name, {$this->db->dbprefix('associate')}.oath_date as oath_date,sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,CASE studentlife WHEN 1 THEN 'Running'  WHEN 2 THEN 'Completed' END as studentlife", FALSE)
				->from('associate')
				->join('manpower', 'manpower.id=associate.manpower_id', 'left')
				->join('branches', 'branches.id=associate.branch', 'left')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				->order_by('manpower.associate_oath_date ASC');
		  
		  
		        $this->db->where($this->db->dbprefix('associate') . ".is_associate_now", 1);
		    
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
 //$this->sma->print_arrays($data);
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Associate list');
                $this->excel->getActiveSheet()->SetCellValue('A1', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B1', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C1', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D1', 'Oath Date');
                $this->excel->getActiveSheet()->SetCellValue('E1', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F1', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G1', 'Std Life');
 

                $row = 2;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->associatecode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->oath_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'member_report';
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
            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Postpone list');
				
				
				
				
				
				$this->excel->getActiveSheet()->mergeCells('A1:G1');
				$this->excel->getActiveSheet()->mergeCells('A2:G2');
				$this->excel->getActiveSheet()->mergeCells('A3:G3');
				$this->excel->getActiveSheet()->mergeCells('A4:G4');
				$this->excel->getActiveSheet()->mergeCells('A5:G5');
				
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A1:D4")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle('A1:D4')->getFont()->setBold( true );
                
				
				$this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim');
				$this->excel->getActiveSheet()->SetCellValue('A3', 'Postpone List');
				$this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: '.($branch ? $branch->name : lang('all_branches')));
				 
				 $style = array(
					'alignment' => array(
						'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					)
						);
				
				$this->excel->getActiveSheet()->getStyle("A6")->applyFromArray($style);
				$this->excel->getActiveSheet()->getStyle("A6:G6")->getFont()->setBold( true );
				
				
				
				
				
				
				
				
                $this->excel->getActiveSheet()->SetCellValue('A6', lang('manpower_code'));
                $this->excel->getActiveSheet()->SetCellValue('B6', lang('manpower_name'));
				$this->excel->getActiveSheet()->SetCellValue('C6', 'Branch');
				
                $this->excel->getActiveSheet()->SetCellValue('D6', 'Date');
                $this->excel->getActiveSheet()->SetCellValue('E6', 'Session');
                $this->excel->getActiveSheet()->SetCellValue('F6', 'Responsibility');
                $this->excel->getActiveSheet()->SetCellValue('G6', 'Std Life');
 

                $row = 7;
                $sQty = 0;
                $pQty = 0;
                $sAmt = 0;
                $pAmt = 0;
                $bQty = 0;
                $bAmt = 0;
                $pl = 0;
                foreach ($data as $data_row) {
                    $this->excel->getActiveSheet()->SetCellValue('A' . $row, $data_row->associatecode);
                    $this->excel->getActiveSheet()->SetCellValue('B' . $row, $data_row->name);
                    $this->excel->getActiveSheet()->SetCellValue('C' . $row, $data_row->branch_name);
                    $this->excel->getActiveSheet()->SetCellValue('D' . $row, $data_row->start_date);
                    $this->excel->getActiveSheet()->SetCellValue('E' . $row, $data_row->sessionyear);
                    $this->excel->getActiveSheet()->SetCellValue('F' . $row, $data_row->responsibility);
                    $this->excel->getActiveSheet()->SetCellValue('G' . $row, $data_row->studentlife);
                   
  				     
                    $row++;
                }
              //  $this->excel->getActiveSheet()->getStyle("C" . $row . ":G" . $row)->getBorders()
                //    ->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_MEDIUM);
            

                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(25);
                $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C2:G' . $row)->getAlignment()->setWrapText(true);
                $filename = 'postpone_report';
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}

	
	
	
	  

   function sum_manpower($data, $field) {
         $sum = 0;
		 if(is_array($data)){
			 foreach($data as $row){
				$sum += isset($row[$field]) ? $row[$field] : 0 ; 
				 
			 }
			 
		 }
		 
        return $sum;
    }

      
 
  function detailupdate()
    {
		 $this->sma->checkPermissions('index', TRUE);
	$report_type = $this->report_type(); 
	$flag = 1; 	 
	 if($this->input->get_post('pk') && $this->input->get_post('pk')>0){ 
	    $this->site->updateData($this->input->get_post('table'), array($this->input->get_post('name')=>$this->input->get_post('value')),array('id'=>$this->input->get_post('pk')));
		$flag = 2;  //update
		}
	 elseif($this->input->get_post('branch_id')){
		 $this->site->insertData($this->input->get_post('table'), array('user_id'=>$this->session->userdata('user_id'),'branch_id'=>$this->input->get_post('branch_id'), 'report_type'=>$report_type['type'],$this->input->get_post('name')=>$this->input->get_post('value'),   'date'=>date('Y-m-d')));
	     $flag = 3;  //new entry
		 
	 }    	
        echo json_encode(array('flag'=>$flag,'msg'=>''));
        exit;
	 
	}		
	   
	   
	   
 function getName($id = NULL)
    {
         
        $row = $this->site->getByID('manpower','id',$id);
        $this->sma->send_json(array(array('id' => $row->id, 'text' => $row->name.'('.$row->associatecode.')' )));
    }
	
	








    function download($branch = NULL, $orgstatus_id)
    {
        
            $this->sma->checkPermissions('index', TRUE);
    


            if ($branch != NULL && !($this->Owner || $this->Admin) && ($this->session->userdata('branch_id') != $branch)) {
                $this->session->set_flashdata('warning', lang('access_denied'));
                admin_redirect($_SERVER["HTTP_REFERER"]);
            } else if ($branch == NULL && !($this->Owner || $this->Admin)) {
                admin_redirect($_SERVER["HTTP_REFERER"]);
            }
        




		// $field_arr = array('education','associatecode','member_oath_date','associate_oath_date','district','institution_type','subject','prossion_target','prossion_target_sub','education_institution','is_forum','current_profession','orgstatus_at_forum','education_qualification','type_of_profession','type_higher_education','mobile','opposition','date_death','higher_education_institution','email','foreign_country','foreign_address','myr_serial','how_death');
       
		$this->db
                ->select($this->db->dbprefix('manpower') . ".id as manpowerid, membercode, associatecode, thana_code, blood_group, institution_type_child,institution_type,   {$this->db->dbprefix('manpower')}.name,   sessionyear,  {$this->db->dbprefix('responsibilities')}.responsibility as responsibility,  studentlife,education, {$this->db->dbprefix('district')}.name as district,  v3_district_upazila(upazila) as thana_name, subject,prossion_target,prossion_target_sub,education_institution,  education_qualification,type_of_profession,     {$this->db->dbprefix('manpower')}.email, single_digit ,
                jsc_jdc ,
                ssc_dhakil ,
                hsc_alim ,
                department_position ,
                department_position_private,
               influential ,
                hc_science ,
                madrasha,
                medical_college,
                ideal_college,
                engineeering,
                agri ,
                science ,
                business,
                arts", FALSE)
				->from('manpower')
				->join('responsibilities', 'manpower.responsibility_id=responsibilities.id', 'left')
				 ->join('countries', 'manpower.foreign_country=countries.id', 'left')
				->join('district', 'manpower.district=district.id', 'left');
		  
               
                if($orgstatus_id ==2)
		        $this->db->where_in($this->db->dbprefix('manpower') . ".orgstatus_id", array(2,12) );
                else
                 $this->db->or_where($this->db->dbprefix('manpower') . ".orgstatus_id", $orgstatus_id);
		    
			if ($branch)
			    $this->db->where( "branch", $branch);
            

            $q = $this->db->get();

          // echo $this->db->last_query();
           //  exit();
            if ($q->num_rows() > 0) {
                foreach (($q->result()) as $row) {
                   // $row->upazila = $row->district.'_'.$row->thana_name;
                   // unset($row->thana_name);
                    $data[] = $row;
                }
            } else {
                $data = NULL;
            }

            if (  !empty($data)) {

                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Associate list');

               
               
				
                //aaaa
                $field_arr = array(
                    'manpowerid',
                    'membercode', 
                    'associatecode',
                    'name',
                    'thana_code' ,
                    'institution_type',  
                    'institution_type_child',
                    'sessionyear',
                    'subject',
                    'responsibility',
                    'prossion_target',
                    'prossion_target_sub' ,
                    'blood_group' , 
                    'district' ,
                    'thana_name' ,

                    'single_digit' ,
                    'jsc_jdc' ,
                    'ssc_dhakil' ,
                    'hsc_alim' ,
                    'department_position' ,
                    'department_position_private' ,
                    'influential' ,
                    'hc_science' ,
                    'madrasha' ,
                    'medical_college' ,
                    'ideal_college' ,
                    'engineeering' ,
                    'agri' ,
                    'science' ,
                    'business' ,
                    'arts' ,
 

                );
               
                //  for cellValue 

                // $this->sma->print_arrays($data);


               
                $process_Title = 'Manpower তালিকা';                            
                $this->sheetcellValue($branch,$field_arr,$data,$process_Title); 
                
				$filename = 'manpower_list_'.($branch ? '_'.$branch: '');
  
                $this->load->helper('excel');
                create_excel($this->excel, $filename);

            }
            $this->session->set_flashdata('error', lang('nothing_found'));
            redirect($_SERVER["HTTP_REFERER"]);

       



	}



public function institution_value($value, $institutions) {

    if($value=='' || $value == null) 
        return '';

    else {

        foreach($institutions as $row) {
                if($row->id == $value) 
                    return $row->institution_type;

        }


    }

    
    return '';

}

    public function sheetcellValue($branch=null,$field_arr=null,$data=null,$process_Title=null )
    {






        $institutions = $this->site->getAll('institution');





        $style = array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
            )
        );


        // $this->excel->getActiveSheet()->SetCellValue('A1', 'import');
        // $this->excel->getActiveSheet()->mergeCells('B1:M1');
        // $this->excel->getActiveSheet()->SetCellValue('B1', 'Please do not delete this line. This is for update purpose');

        //for cell value
        $exColh = 'B';
        foreach ($field_arr as $field) { 
            $newName =   $this->newName($field);
            $this->excel->getActiveSheet()->SetCellValue($exColh . '6', $newName);
            $this->excel->getActiveSheet()->getColumnDimension($exColh)->setWidth(20);
            $exColh++;
        }

        $row = 7; 
        foreach ($data as $key=> $data_row) {

            $this->excel->getActiveSheet()->SetCellValue('A' . $row, $key+1);


            
            $this->excel->getActiveSheet()->getStyle('A' . $row)->applyFromArray($style);

            $exCol = 'B';
            foreach ($field_arr as $field) {



                if($field=='institution_type' || $field=='institution_type_child') 
                     $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $this->institution_value($data_row->{$field},$institutions));
                    
                else 
                    $this->excel->getActiveSheet()->SetCellValue($exCol . $row, $data_row->{$field});



                $this->excel->getActiveSheet()->getStyle($exCol . $row)->applyFromArray($style);




                $exCol++;
            }
            $row++;
        } 
 
        //>>>>>>>>>>>for Title >>>>>>>>>>>>>>>>            
        $lastmarg1= $exColh.'1'; $lastmarg2= $exColh.'2';  $lastmarg3= $exColh.'3';  $lastmarg4= $exColh.'4';  $lastmarg5= $exColh.'5';
        
        
      //  $this->excel->getActiveSheet()->mergeCells("A1:$lastmarg1");
          $this->excel->getActiveSheet()->SetCellValue('A1', 'import_update');
         $this->excel->getActiveSheet()->mergeCells("B1:$lastmarg1");
         $this->excel->getActiveSheet()->SetCellValue('B1', 'Please do not delete this line. This is for update purpose');

        
        
        $this->excel->getActiveSheet()->mergeCells("A2:$lastmarg2");$this->excel->getActiveSheet()->mergeCells("A3:$lastmarg3");$this->excel->getActiveSheet()->mergeCells("A4:$lastmarg4");$this->excel->getActiveSheet()->mergeCells("A5:$lastmarg5");
        //$this->excel->getActiveSheet()->getStyle("A1:$lastmarg5")->applyFromArray($style)->getFont()->setBold(true)->setSize(16); 
        $this->excel->getActiveSheet()->SetCellValue('A2', 'Bismillahir Rahmanir Rahim'); 
        $this->excel->getActiveSheet()->SetCellValue('A3', $process_Title);        
        $this->excel->getActiveSheet()->SetCellValue('A4', 'Branch: ' .($branch ? $branch : lang('all_branches')));

       // >>>>>>>>>>>>>>>>>> for table heading
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
       // $this->excel->getActiveSheet()->SetCellValue('A6', lang('ক্রম'));
       $this->excel->getActiveSheet()->SetCellValue('A6', '');
        $lastmarg6= $exColh.'6';
        $this->excel->getActiveSheet()->getStyle("A6:$lastmarg6")->applyFromArray($style)->getFont()->setBold(true)->setSize(12);

       $this->excel->getDefaultStyle()->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
       $this->excel->getActiveSheet()->getStyle('C2:AE' . $row)->getAlignment()->setWrapText(true);

    }
	
	
 
	
	
	
    public function newName($field)
    {
 



        switch ($field) {

                    case 'manpowerid': $field = 'আইডি'; break;

                    case 'membercode': $field = 'সদস্য কোড'; break;
                    case 'associatecode': $field = 'সাথী কোড'; break;
                   // membercode, associatecode
                    case 'name': $field = 'নাম'; break;
                    case 'thana_code': $field = 'থানা কোড'; break;
                    case 'institution_type': $field = 'শিক্ষাপ্রতিষ্ঠান ক্যাটাগরি'; break;
                    case 'institution_type_child': $field = 'শিক্ষাপ্রতিষ্ঠান সাব ক্যাটাগরি'; break;
                    case 'sessionyear': $field = 'শ্রেণি/বর্ষ'; break;
                    case 'subject': $field = 'বিভাগ/বিষয়'; break;

                    case 'responsibility': $field = 'সর্বশেষ দায়িত্ব'; break;
                    case 'prossion_target': $field = 'পেশাগত টার্গেট-সেক্টর'; break;
                    case 'prossion_target_sub': $field = 'পেশাগত টার্গেট-সাব-সেক্টর'; break;
                    case 'blood_group': $field = 'রক্তের গ্রুপ'; break;
                    case 'district': $field = 'নিজ জেলা'; break;

                     
                    case 'single_digit': $field = 'সিঙ্গেল ডিজিটধারী'; break;
                    case  'jsc_jdc' : $field = 'JSC/JDC GPA-5'; break;
                    case 'ssc_dhakil' : $field = 'SSC/Dhakil GPA-5'; break;
                    case 'hsc_alim': $field = 'HSC/Alim  GPA-5'; break;
                    case 'department_position' : $field = 'ডিপার্টমেন্টে প্লেসধারী-সরকারি'; break;
                    case 'department_position_private' : $field = 'ডিপার্টমেন্টে প্লেসধারী-বেসরকারি'; break;
                    case 'influential' : $field = 'প্রভাবশালী পরিবারের সন্তান'; break;
                    case 'hc_science' : $field = 'মাধ্যমিক ও উচ্চ মাধ্যমিক বিজ্ঞানে অধ্যয়নরত'; break;
                    case 'madrasha' : $field = 'কওমী মাদরাসায় অধ্যয়নরত'; break;
                    case 'medical_college' : $field = 'মেডিকেল কলেজে অধ্যয়নরত'; break;
                    case 'ideal_college' : $field = 'আদর্শ কলেজে অধ্যয়নরত'; break;
                    case 'engineeering' : $field = 'প্রকৌশল'; break;
                    case 'agri' : $field = 'কৃষি শিক্ষা'; break;
                    case 'science' : $field = 'সাধারণ বিজ্ঞান'; break;
                    case 'business' : $field = 'ব্যবসায় শিক্ষা'; break;
                    case 'arts' : $field = 'মানবিক'; break;
            default: $field = $field; break;

        }
        return $field;
    }

	
}
